<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

class PegEventResolver
{
    public function resolveEventsByPeg(array $peg): array
    {
        return [
            [
                'id' => 'b614f268-6d73-462c-b4fd-708e804f1f91',
                'action' => 'Some action',
                'user_id' => 'a945977e-0a57-490f-93c9-7673877927e3',
                'happenedAt' => (new \DateTime())->format(DATE_ATOM),
            ],
        ];
    }
}
