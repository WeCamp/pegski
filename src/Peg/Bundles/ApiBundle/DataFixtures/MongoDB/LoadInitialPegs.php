<?php

namespace Peg\Bundles\ApiBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\SharedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Peg\Bundles\ApiBundle\Document\Peg;

class LoadInitialPegs extends AbstractFixture implements SharedFixtureInterface
{
    static public $coaches = ['catalyst', 'flexman', 'giant', 'puppetmaster', 'tacticus', 'voltra'];


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::$coaches as $coach) {
            $peg = Peg::register($coach);

            $this->addReference('peg:' . $coach, $peg);

            $manager->persist($peg);

            $pegEventBorn = CommentEvent::create($peg, 'PegCreated', 'A Peg has been born! Give it a nice lifetime');

            $manager->persist($pegEventBorn);
        }

        $manager->flush();
    }
}