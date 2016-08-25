<?php
namespace Peg\Domain\Events;

interface PictureEventInterface
{
    public function getPicture() : string;
}
