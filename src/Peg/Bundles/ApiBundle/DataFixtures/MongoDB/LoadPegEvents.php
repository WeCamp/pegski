<?php

namespace Peg\Bundles\ApiBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\SharedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Peg\Bundles\ApiBundle\Document\Event;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Bundles\ApiBundle\Document\PictureEvent;
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

        $eventReflection    = new \ReflectionClass(Event::class);
        $happenedAtReflProp = $eventReflection->getProperty('happenedAt');
        $happenedAtReflProp->setAccessible(true);

        foreach (LoadInitialPegs::$shortcodes as $shortcode) {

            var_dump("\$shortcode: $shortcode");

            /** @var Peg $peg */
            $peg = $this->getReference('peg:' . $shortcode);

            $basePath = "/pics/$shortcode";
            $path     = dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/web$basePath";
            if (!is_dir($path)) {
                continue;
            }

            $finder = new Finder();
            $finder->files()->in($path);

            $fileCount = $finder->count();

            // We can't use $fileNo => $file in the foreach loop, as Finder returns the file name as the index, so use
            // manual index no
            $fileNo = 0;
            foreach ($finder as $file) {
                $fileNo++;

                $relativePath = preg_replace('#^.*' . $basePath . '#', $basePath, $file);
                $pictureEvent = PictureEvent::create($peg, "You know… a picture", $relativePath, 'WeCamp');

                $happenedAtString      = '-' . ($fileCount - $fileNo) . ' hours';
                $happenedAtDateTime    = new \DateTime($happenedAtString);
                $happenedAtValueString = $happenedAtDateTime->format(\DateTime::ATOM);
                var_dump("\$happenedAtString: $happenedAtString");
                var_dump("\$happenedAtValueString: $happenedAtValueString");
                $happenedAtReflProp->setValue($pictureEvent, $happenedAtValueString);

                $manager->persist($pictureEvent);
            }
        }

        $manager->flush();
    }
}