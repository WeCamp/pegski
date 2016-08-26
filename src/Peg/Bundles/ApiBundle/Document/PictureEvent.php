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

    public static function create(
        Peg $peg,
        string $description,
        string $pictureUrl,
        string $location = null,
        string $comment = null
    ) : PictureEvent
    {
        $pictureEvent = new self($peg, $description, $location, $comment);
        $pictureEvent->pictureUrl = $pictureUrl;

        return $pictureEvent;
    }


    public function getPictureUrl() : string
    {
        return $this->pictureUrl;
    }
}
