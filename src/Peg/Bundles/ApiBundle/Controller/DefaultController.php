<?php

namespace Peg\Bundles\ApiBundle\Controller;

use Peg\Bundles\ApiBundle\Document\Peg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $peg = new Peg();
        $peg->setShortcode('uygjytkyf');

        $dm = $this->get('doctrine_mongodb')->getManager();

        $dm->persist($peg);
        $dm->flush();

        $savedPeg = $dm->find(Peg::class, $peg->getId());

        dump($savedPeg);

        return $this->render('PegApiBundle:Default:index.html.twig');
    }
}
