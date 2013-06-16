<?php

namespace Acme\SearchBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Acme\SearchBundle\Form\Tag\Edit;
use Acme\SearchBundle\Entity\Tag;
use Acme\SearchBundle\Entity;

class TagController extends Controller
{

    /**
     * @Route("/tag/create", name="tag_create")
     * @Template("AcmeSearchBundle:Tag:create.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $form = $this->createForm(new Edit());

        $form->handleRequest($request);
            if ($form->isValid()) {
                $arrData =  $form->getData();

                $tag = new Tag();
                $tag->setName($arrData['name']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($tag);
                $em->flush();
            }


        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/tag/list", name="tag_list")
     * @Template("AcmeSearchBundle:Tag:list.html.twig")
     */
    public function listAction()
    {
        /* @var $repository \Doctrine\ORM\EntityRepository */
        $repository = $this->getDoctrine()
            ->getRepository('AcmeSearchBundle:Tag');

        $query = $repository->createQueryBuilder('t')
            ->select('tag, count(clips) clips_count')
            ->from('AcmeSearchBundle:Tag', 'tag')
                ->innerJoin('tag.clips', 'clips')
                ->groupBy('tag.id')
                ->getQuery();

        $tags = $query->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_SCALAR);

        return array(
            'tags' =>  $tags
        );

    }

}
