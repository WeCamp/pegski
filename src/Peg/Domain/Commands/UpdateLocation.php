<?php

namespace Peg\Domain\Commands;

final class UpdateLocation
{
    /**
     * @var string
     */
    private $shortCode;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    /**
     * @param string $pegUuid
     * @param string $description
     * @param string $location
     */
    public function __construct(string $shortCode, string $description, string $location)
    {
        $this->shortCode = $shortCode;
        $this->description = $description;
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getShortCode(): string
    {
        return $this->shortCode;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }
}
