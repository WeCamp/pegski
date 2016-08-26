<?php

namespace Peg\Bundles\WebBundle\Controller;

use Peg\Bundles\ApiBundle\Document\Peg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PegWebBundle:Default:index.html.twig');
    }

    public function timelineAction($shortcode)
    {
        if (!$this->get('peg.api_bundle.repository.doctrine.odm.peg')->findOneByShortCode($shortcode) instanceof Peg) {
            $this->addFlash('warning', 'This peg isn\'t registered yet!');
            return $this->redirectToRoute('web_homepage');
        }

        return $this->render('PegWebBundle:Default:timeline.html.twig', ['shortcode' => strtolower($shortcode)]);
    }
}
