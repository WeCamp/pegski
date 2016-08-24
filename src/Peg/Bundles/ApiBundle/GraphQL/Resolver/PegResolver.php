<?php

namespace Peg\Bundles\ApiBundle\GraphQL\Resolver;

class PegResolver
{
    /**
     * @var DocumentManager
     */
    private $documentManager;


    /**
     * PegResolver constructor.
     *
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }


    public function resolvePegs(): array
    {
        return [
            [
                'id' => 'a1dd9640-f371-47ff-b134-0082b70ffb82',
                'shortcode' => 'a1dd9640'
            ],
            [
                'id' => '610ca2a0-7d67-4a45-bf64-4eaf80d48902',
                'shortcode' => '610ca2a0'
            ],
            [
                'id' => 'ab5e8cfe-4ffa-41af-91e4-db09108611af',
                'shortcode' => 'ab5e8cfe'
            ],
        ];
    }

    public function resolvePeg(string $shortcode): array
    {
        $item = array_filter($this->resolvePegs(), function($item) use ($shortcode) {
           return $item['shortcode'] === $shortcode;
        });

        return current($item) ?? [];
    }
}
