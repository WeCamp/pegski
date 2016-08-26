<?php

namespace Peg\Domain\Commands;

use Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\PictureEventRepository;
use Peg\Repository\PegRepositoryInterface;

final class AddPictureHandler extends EventHandler
{
    /**
     * @var PictureEventRepository
     */
    private $commentEventRepository;

    /**
     * @param PegRepositoryInterface $pegRepository
     * @param PictureEventRepository $commentEventRepository
     */
    public function __construct(PegRepositoryInterface $pegRepository, PictureEventRepository $commentEventRepository)
    {
        parent::__construct($pegRepository);
        $this->commentEventRepository = $commentEventRepository;
    }

    /**
     * @param AddPicture $command
     */
    public function handle(AddPicture $command)
    {
        $event = $command->getPegEvent();
        $this->commentEventRepository->save($event);
    }
}
