<?php

namespace Peg\Repository;

use Peg\Bundles\ApiBundle\Document\PictureEvent;

interface PictureEventRepositoryInterface
{
    public function save(PictureEvent $event, $sync = true);
}
