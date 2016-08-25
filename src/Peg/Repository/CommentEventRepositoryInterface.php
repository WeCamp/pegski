<?php

namespace Peg\Repository;

use Peg\Bundles\ApiBundle\Document\CommentEvent;

interface CommentEventRepositoryInterface
{
    public function save(CommentEvent $event, $sync = true);
}
