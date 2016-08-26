<?php

namespace Peg\Repository;

use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Bundles\ApiBundle\Document\PictureEvent;

interface PictureEventRepositoryInterface
{
    /**
     * @param Peg $peg
     *
     * @return PictureEvent[]|array
     */
    public function findAllForPeg(Peg $peg): array;

    public function save(PictureEvent $event, $sync = true);
}
