<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

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


    public function resolveEventsByPeg(Peg $peg): array
    {
        return [
            [
                'id' => 'b614f268-6d73-462c-b4fd-708e804f1f91',
                'action' => 'Some action',
                'user_id' => '87baac55-3cb4-4d00-af3f-fc466faa899a',
                'happenedAt' => (new \DateTime('2016-08-24 10:10:10'))->format(DATE_ATOM),
            ],
        ];
    }
}
