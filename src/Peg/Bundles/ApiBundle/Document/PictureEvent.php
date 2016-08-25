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

    protected function __construct(
        Peg $peg,
        string $description,
        string $pictureUrl,
        string $location = null
    ) {
        parent::__construct($peg, $description, $location);

        $this->pictureUrl = $pictureUrl;
    }

    public static function create(
        Peg $peg,
        string $description,
        string $pictureUrl,
        string $location = null
    ) : PictureEvent
    {
        return new self($peg, $description, $pictureUrl, $location);
    }

    public function getPicture() : string
    {
        return $this->pictureUrl;
    }

}
