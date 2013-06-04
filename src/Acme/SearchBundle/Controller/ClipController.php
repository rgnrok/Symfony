<?php

namespace Acme\SearchBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\SearchBundle\Entity\Clip;

class ClipController extends Controller
{
    /**
     * @Route("/clip/create")
     * @Template("AcmeSearchBundle:Clip:create.html.twig")
     */
    public function createAction()
    {
        $clip = new Clip();
        $clip->setUrl('http://www.youtube.com/watch?v=PYtXuBN1Hvc');
        $clip->setTimeStart(52);
        $clip->setTimeEnd(54);

        $em = $this->getDoctrine()->getManager();
        $em->persist($clip);
        $em->flush();

        return new Response('Create clip' . $clip->getId());
    }
}
