<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Mutation;

use League\Tactician\CommandBus;
use Peg\Domain\Commands\UpdateLocation;
use Peg\Domain\Commands\UpdatePicture;

final class PegEventMutation
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function updateLocation()
    {
        
    }

    public function updatePictureUrl()
    {

    }
}
