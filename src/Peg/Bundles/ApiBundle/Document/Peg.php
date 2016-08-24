<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Peg
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\Document
 */
class Peg
{
    /**
     * @var string
     *
     * @MongoDB\Id(strategy="UUID")
     */
    private $id;

    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $shortcode;

    protected function __construct(string $shortCode)
    {
        $this->shortcode = $shortCode;
    }

    /**
     * Register a new peg.
     *
     * @param string $shortCode
     *
     * @return Peg
     */
    public static function register(string $shortCode)
    {
        return new self($shortCode);
    }

    /**
     * Get id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get shortcode
     *
     * @return string $shortcode
     */
    public function getShortcode()
    {
        return $this->shortcode;
    }
}
