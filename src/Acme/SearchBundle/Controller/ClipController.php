<?php

namespace Acme\SearchBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\SearchBundle\Form\Clip\Edit;
use Acme\SearchBundle\Entity\Clip;

class ClipController extends Controller
{

    /**
     * @Route("/clip/create", name="clip_create")
     * @Template("AcmeSearchBundle:Clip:create.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $clip = new Clip();
        $form = $this->createForm(new Edit());

            $form->handleRequest($request);
            if ($form->isValid()) {
                /* @var $clip \Acme\SearchBundle\Entity\Clip */
                $clip =  $form->getData();

//
//                $clip->setUrl($arrData->getUrl());
//                $clip->setTimeStart($arrData->getTimeStart());
//                $clip->setTimeEnd($arrData->getTimeEnd());
//                $clip->setTags($arrData->getTags());

                $em = $this->getDoctrine()->getManager();
                $em->persist($clip);
                $em->flush();

                return $this->redirect($this->generateUrl('clip_list'));
            }


        return array(
            'form' => $form->createView()
        );
    }


    /**
     * @Route("/clip/list", name="clip_list")
     * @Template("AcmeSearchBundle:Clip:list.html.twig")
     */
    public function listAction()
    {
        /* @var $repository \Doctrine\ORM\EntityRepository */
        $repository = $this->getDoctrine()
            ->getRepository('AcmeSearchBundle:Clip');

        $query = $repository->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')

            ->getQuery();
        $clips = $query->getResult();

        return array(
            'clips' =>  $clips
        );
    }
}
