<?php

namespace Peg\Bundles\ApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Peg\Domain\Events\PictureEventInterface;

/**
 * Class PictureEvent
 *
 * @package Peg\Bundles\ApiBundle
 *
 * @MongoDB\Document(repositoryClass="Peg\Bundles\ApiBundle\Repository\Doctrine\ODM\PictureEventRepository")
 */
class PictureEvent extends Event implements PictureEventInterface
{
    /**
     * @var string
     *
     * @MongoDB\Field(type="string")
     */
    private $pictureUrl;

    /**
     * @var Comment
     *
     * @MongoDB\ReferenceMany(targetDocument="Comment")
     */
    protected $comment;

    protected function __construct(
        string $description,
        string $pictureUrl
    ) {
        parent::__construct($description);
        $this->pictureUrl = $pictureUrl;
    }

    public static function updatePicture(
        string $description,
        string $pictureUrl
    ) : PictureEvent
    {
        return new self($description, $pictureUrl);
    }

    public function getPicture() : string
    {
        return $this->pictureUrl;
    }

}
