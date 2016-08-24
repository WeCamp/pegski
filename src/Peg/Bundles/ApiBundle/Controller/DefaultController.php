<?php

namespace Peg\Bundles\ApiBundle\Controller;

use Peg\Bundles\ApiBundle\Document\Peg;
use Peg\Domain\Commands\PegCreate;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $peg = Peg::register($this->get('peg.util.short_code_generator')->generateUniqueShortCode());

        $commandBus = $this->get('tactician.commandbus');
        $commandBus->handle(new PegCreate($peg));

        return $this->render('PegApiBundle:Default:index.html.twig');
    }
}
