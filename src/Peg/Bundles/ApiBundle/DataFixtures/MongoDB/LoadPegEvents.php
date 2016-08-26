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
        foreach (LoadInitialPegs::$coaches as $coach) {
            /** @var Peg $peg */
            $peg = $this->getReference('peg:' . $coach);

            $path = dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/web/pics/$coach";
            if (!is_dir($path)) {
                continue;
            }

            $finder = new Finder();
            $finder->files()->in($path);

            foreach ($finder as $file) {
                $pictureEvent = PictureEvent::create($peg, "You know… a picture", $file);
                $manager->persist($pictureEvent);
            }
        }

        $manager->flush();
    }
}