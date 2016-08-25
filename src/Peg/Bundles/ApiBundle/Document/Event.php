<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Event
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\Document(repositoryClass="Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\EventRepository")
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
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $pictureUrl;

    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $location;

//    /**
//     *
//     * @ReferenceMany(targetDocument="Comment")
//     */
//    private $comment;

    protected function __construct(
        string $description,
        string $pictureUrl = '',
        string $location = ''
)
    {
        $this->description = $description;
        $this->pictureUrl = $pictureUrl;
        $this->location = $location;
    }

    /**
     * Register a new event
     *
     * @return Event
     */
    public static function register(string $description)
    {
        return new self($description);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPictureUrl(): string
    {
        return $this->pictureUrl;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

//    public function getComment()
//    {
//        return $this->comment;
//    }

}
