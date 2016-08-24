<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

use Doctrine\ODM\MongoDB\Cursor;
use Doctrine\ODM\MongoDB\DocumentManager;
use Peg\Bundles\ApiBundle\Document\Peg;

class PegResolver
{
    /**
     * @var DocumentManager
     */
    private $documentManager;


    /**
     * PegResolver constructor.
     *
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }


    public function resolvePegs(): array
    {
        $qb = $this->documentManager->createQueryBuilder(Peg::class);
        $query = $qb->sort('id', 'desc')
            ->getQuery();

        /** @var Cursor $result */
        $result = $query->getIterator();

        return $result->toArray();
    }

    public function resolvePeg(string $shortcode): array
    {
        $item = array_filter($this->resolvePegs(), function($item) use ($shortcode) {
           return $item['shortcode'] === $shortcode;
        });

        return current($item) ?? [];
    }
}
