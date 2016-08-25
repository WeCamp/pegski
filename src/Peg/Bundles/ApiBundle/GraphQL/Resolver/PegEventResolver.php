<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

use Peg\Bundles\ApiBundle\Document\Event;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Repository\CommentEventRepositoryInterface;
use Peg\Repository\LocationEventRepositoryInterface;

class PegEventResolver
{
    /**
     * @var CommentEventRepositoryInterface
     */
    private $commentEventRepository;

    /**
     * @var LocationEventRepositoryInterface
     */
    private $locationEventRepository;


    public function __construct(
        CommentEventRepositoryInterface $commentEventRepository,
        LocationEventRepositoryInterface $locationEventRepository
    ) {
        $this->commentEventRepository  = $commentEventRepository;
        $this->locationEventRepository = $locationEventRepository;
    }


    /**
     * @param Peg $peg
     *
     * @return Event[]
     */
    public function resolveEventsByPeg(Peg $peg): array
    {
        $commentEvents = $this->commentEventRepository->findAllForPeg($peg);
        $locationEvents = $this->locationEventRepository->findAllForPeg($peg);

        $events = array_merge($commentEvents, $locationEvents);

        usort($events, function(Event $a, Event $b) {
            return ($a->getHappenedAt() < $b->getHappenedAt());
        });

        return $events;
    }
}
