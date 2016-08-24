<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

class UserResolver
{
    public function resolveUsers()
    {
        return [
            [
                'id' => 'a945977e-0a57-490f-93c9-7673877927e3',
                'email' => 'renato@mefi.in',
            ],
            [
                'id' => '87baac55-3cb4-4d00-af3f-fc466faa899a',
                'email' => 'roxana.m.cristian@gmail.com',
            ]
        ];
    }

    public function resolveUser(string $email)
    {
        $item = array_filter($this->resolveUsers(), function($item) use ($email) {
            return $item['email'] === $email;
        });

        return current($item) ?? [];
    }
}
