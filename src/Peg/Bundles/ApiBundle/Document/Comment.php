<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class Comment
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\Document(repositoryClass="Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\CommentRepository")
 */
class Comment
{
    /**
     * @var string
     *
     * @MongoDB\Id(strategy="UUID")
     */
    private $id;

    /**
     * @var User
     *
     * @MongoDB\ReferenceOne(targetDocument="User")
     */
    private $user;

    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $comment;


    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $timestamp;

    /**
     * @var Event
     */
    private $event;


    public static function register(User $user,
        string $commentString
    ) : Comment
    {
        $comment = new self();

        $comment->user = $user;
        $comment->comment = $commentString;

        return $comment;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEvent(): Event
    {
        return $this->event;
    }

    public function setEvent(Event $event)
    {
        $this->event = $event;
    }

}
