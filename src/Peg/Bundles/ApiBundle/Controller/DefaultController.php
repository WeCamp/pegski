<?php

namespace Peg\Bundles\ApiBundle\Controller;

use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Domain\Commands\PegCreate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PegApiBundle:Default:index.html.twig');
    }
}
