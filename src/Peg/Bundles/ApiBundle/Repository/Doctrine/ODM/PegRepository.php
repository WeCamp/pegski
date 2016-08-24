<?php


namespace Peg\Bundles\ApiBundle\Repository\Doctrine\ODM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\DocumentManager;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Repository\PegRepositoryInterface;

/**
 * The Peg MongoDB repository using Doctrine ODM.
 */
final class PegRepository implements PegRepositoryInterface
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->documentManager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function findUsedShortCodes()
    {
        /** @var ArrayCollection $collection */
        $collection = $this->documentManager
            ->createQueryBuilder(Peg::class)
            ->distinct('shortcode')
            ->getQuery()
            ->execute();

        return $collection->toArray();
    }
}
