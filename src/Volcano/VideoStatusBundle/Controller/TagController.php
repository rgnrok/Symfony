<?php

namespace Volcano\VideoStatusBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Volcano\VideoStatusBundle\Form\Tag\Edit;
use Volcano\VideoStatusBundle\Entity\Tag;
use Volcano\VideoStatusBundle\Entity;

class TagController extends Controller
{

    /**
     * @Route("/tag/create", name="tag_create")
     * @Template("VolcanoVideoStatusBundle:Tag:create.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $tag = new Tag();
        $form = $this->createForm(new Edit(), $tag);

        $form->handleRequest($request);
            if ($form->isValid()) {
                $tag =  $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($tag);
                $em->flush();

                return $this->redirect($this->generateUrl('tag_list'));
            }


        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/tag/list", name="tag_list")
     * @Template("VolcanoVideoStatusBundle:Tag:list.html.twig")
     */
    public function listAction()
    {
        /* @var $repository \Doctrine\ORM\EntityRepository */
        $repository = $this->getDoctrine()
            ->getRepository('VolcanoVideoStatusBundle:Tag');

        $query = $repository->createQueryBuilder('tag')
            ->select('tag, count(clips) clips_count')
                ->leftJoin('tag.clips', 'clips')
                ->groupBy('tag.id')
                ->orderBy('clips_count', 'DESC')
                ->getQuery();
        $tags = $query->getScalarResult();
        return array(
            'tags' =>  $tags
        );

    }

}
