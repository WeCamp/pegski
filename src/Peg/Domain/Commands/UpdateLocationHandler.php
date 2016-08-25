<?php

namespace Peg\Domain\Commands;

use Doctrine\ODM\MongoDB\DocumentManager;
use Peg\Bundles\ApiBundle\Document\LocationEvent;
use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\LocationEventRepository;
use Peg\Domain\Exception\PegNotFoundException;
use Peg\Repository\PegRepositoryInterface;

final class UpdateLocationHandler extends EventHandler
{
    /**
     * @var LocationEventRepository
     */
    private $eventRepository;

    /**
     * @param PegRepositoryInterface $pegRepository
     * @param LocationEventRepository $eventRepository
     */
    public function __construct(PegRepositoryInterface $pegRepository, LocationEventRepository $eventRepository)
    {
        parent::__construct($pegRepository);

        $this->eventRepository = $eventRepository;
    }

    /**
     * Handle the update location command.
     *
     * @param UpdateLocation $command
     *
     * @throws PegNotFoundException
     */
    public function handle(UpdateLocation $command)
    {
        $event = LocationEvent::create(
            $this->getPegByShortCode($command->getShortCode()),
            $command->getDescription(),
            $command->getLocation()
        );

        $this->eventRepository->save($event);
    }
}
