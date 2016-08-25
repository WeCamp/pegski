<?php

namespace Peg\Domain\Commands;

use Peg\Bundles\ApiBundle\Document\Peg;

class PegCreate
{
    /**
     * @var Peg
     */
    private $peg;

    public function __construct(Peg $peg)
    {
        $this->peg = $peg;
    }

    public function getPeg(): Peg
    {
        return $this->peg;
    }
}
