<?php

namespace Peg\Domain\Commands;

use Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\CommentEventRepository;
use Peg\Repository\PegRepositoryInterface;

final class AddCommentHandler extends EventHandler
{
    /**
     * @var CommentEventRepository
     */
    private $commentEventRepository;

    /**
     * @param PegRepositoryInterface $pegRepository
     * @param CommentEventRepository $commentEventRepository
     */
    public function __construct(PegRepositoryInterface $pegRepository, CommentEventRepository $commentEventRepository)
    {
        parent::__construct($pegRepository);
        $this->commentEventRepository = $commentEventRepository;
    }

    /**
     * @param AddComment $command
     */
    public function handle(AddComment $command)
    {
        $event = $command->getPegEvent();
        $this->commentEventRepository->save($event);
    }
}
