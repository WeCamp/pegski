<?php

namespace Peg\Bundles\PersistenceBundle;

use Doctrine\ODM\MongoDB\Types\Type;
use Peg\Bundles\PersistenceBundle\MongoDb\Type\EmailType;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PegPersistenceBundle extends Bundle
{
    public function __construct()
    {
        Type::registerType(EmailType::NAME, EmailType::class);
    }
}
