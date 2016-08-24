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
     * @MongoDB\Id(strategy="")
     */
    private $id;

    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $shortcode;


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
     * Set shortcode
     *
     * @param string $shortcode
     *
     * @return $this
     */
    public function setShortcode($shortcode)
    {
        $this->shortcode = $shortcode;

        return $this;
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
