<?php

namespace Peg\Domain\Commands;

final class UpdatePicture
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
    private $picture;

    /**
     * @param string $shortCode
     * @param string $description
     * @param string $picture
     */
    public function __construct(string $shortCode, string $description, string $picture)
    {
        $this->shortCode = $shortCode;
        $this->description = $description;
        $this->picture = $picture;
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
    public function getPicture(): string
    {
        return $this->picture;
    }
}
