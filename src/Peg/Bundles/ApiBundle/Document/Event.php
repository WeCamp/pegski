<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Event
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\MappedSuperclass
 */
class Event
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
    private $description;

    /**
     * @var Comment
     */
    protected $comment;

    /**
     * @var Peg
     *
     * @MongoDB\ReferenceOne(targetDocument="Peg")
     */
    private $peg;

    protected function __construct(
        Peg $peg,
        string $description
    ) {
        $this->peg = $peg;
        $this->description = $description;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getPeg(): Peg
    {
        return $this->peg;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getComment() : Comment
    {
        return $this->comment;
    }

}
