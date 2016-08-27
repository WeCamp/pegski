<?php

namespace Peg\Bundles\ApiBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\SharedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MongoDBODMProxies\__CG__\Peg\Bundles\ApiBundle\Document\PictureEvent;
use Peg\Bundles\ApiBundle\Document\Peg;
use Symfony\Component\Finder\Finder;

class LoadPegEvents extends AbstractFixture implements SharedFixtureInterface, DependentFixtureInterface
{
    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies()
    {
        return [LoadInitialPegs::class];
    }


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (LoadInitialPegs::$shortcodes as $shortcode) {
            /** @var Peg $peg */
            $peg = $this->getReference('peg:' . $shortcode);

            $basePath = "/pics/$shortcode";
            $path     = dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/web$basePath";
            if (!is_dir($path)) {
                continue;
            }

            $finder = new Finder();
            $finder->files()->in($path);

            foreach ($finder as $file) {
                $relativePath = preg_replace('#^.*' . $basePath . '#', $basePath, $file);
                $pictureEvent = PictureEvent::create($peg, "You know… a picture", $relativePath, 'WeCamp');
                $manager->persist($pictureEvent);
            }
        }

        $manager->flush();
    }
}