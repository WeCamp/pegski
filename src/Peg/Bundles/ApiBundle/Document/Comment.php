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
     * @ReferenceOne(targetDocument="User")
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


    public static function register(User $user,
        string $comment
    ) : Comment
    {
        $comment = new self();

        $comment->user = $user;
        $comment->comment = $comment;

        return $comment;
    }

    public function getId(): string
    {
        return $this->id;
    }

}
