<?php

namespace Peg\Domain\Commands;


class PegCreateHandler
{

    /**
     * @var PegCreate
     */
    private $pegCreate;

    public function __construct(PegCreate $pegCreate)
    {
        $this->pegCreate = $pegCreate;
    }


    public function handle()
    {
        //
    }
}
