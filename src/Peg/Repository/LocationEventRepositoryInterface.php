<?php

namespace Peg\Repository;

use Peg\Bundles\ApiBundle\Document\LocationEvent;

interface LocationEventRepositoryInterface
{
    public function save(LocationEvent $event, $sync = true);
}
