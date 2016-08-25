<?php

namespace Peg\Domain\Commands;

use Doctrine\ODM\MongoDB\DocumentManager;
use Peg\Bundles\ApiBundle\Document\Peg;

class PegCreateHandler
{
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {

        $this->documentManager = $documentManager;
    }

    public function handle(PegCreate $pegCreate)
    {
        $peg = $pegCreate->getPeg();

        $this->documentManager->persist($peg);
        $this->documentManager->flush();

        $savedPeg = $this->documentManager->find(Peg::class, $peg->getId());

        # @TODO remove debug code and give sane return value
        dump($savedPeg);
    }
}
