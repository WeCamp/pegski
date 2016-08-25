<?php

namespace Peg\Bundles\ApiBundle\Repository\Doctrine\ODM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\DocumentRepository;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Repository\PegRepositoryInterface;

/**
 * The Peg MongoDB repository using Doctrine ODM.
 */
final class PegRepository extends DocumentRepository implements PegRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findUsedShortCodes()
    {
        /** @var ArrayCollection $collection */
        $collection = $this->dm
            ->createQueryBuilder(Peg::class)
            ->distinct('shortcode')
            ->getQuery()
            ->execute();

        return $collection->toArray();
    }

    /**
     * Find on peg by a short code.
     *
     * @param string $shortCode
     *
     * @return Peg
     */
    public function findOneByShortCode(string $shortCode)
    {
        return $this->dm->getRepository(Peg::class)->findOneBy(['shortcode' => $shortCode]);
    }
}
