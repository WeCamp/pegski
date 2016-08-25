<?php

namespace Peg\Domain\Commands;

use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Domain\Exception\PegNotFoundException;
use Peg\Repository\PegRepositoryInterface;

abstract class EventHandler
{
    /**
     * @var PegRepositoryInterface
     */
    private $pegRepository;

    /**
     * @param PegRepositoryInterface $pegRepository
     */
    public function __construct(PegRepositoryInterface $pegRepository)
    {
        $this->pegRepository = $pegRepository;
    }

    /**
     * @param string $shortCode
     *
     * @return Peg
     *
     * @throws PegNotFoundException
     */
    protected function getPegByShortCode(string $shortCode): Peg
    {
        // Find the peg by the short code
        if (!($peg = $this->pegRepository->findOneByShortCode($command->getShortCode())) instanceof Peg) {
            throw new PegNotFoundException("Peg with short code '{$command->getShortCode()}' is not found.");
        }

        return $peg;
    }
}
