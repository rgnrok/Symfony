<?php

namespace Acme\SearchBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Collections\ArrayCollection;
use Acme\SearchBundle\Form\Clip\Edit;
use Acme\SearchBundle\Entity\Clip;

class ClipController extends Controller
{

    /**
     * @Route("/clip/edit/{id}", name="clip_create", requirements={"id" = "\d+"}, defaults={"id" = 0})
     * @Template("AcmeSearchBundle:Clip:create.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $clip = new Clip();
        $clipId = $request->get('id');
        $existsTags = array();
        if (!empty($clipId)) {
            $repository = $this->getDoctrine()
                ->getRepository('AcmeSearchBundle:Clip');

            $clip = $repository->find($clipId);

            // Create an array of the current Tag objects in the database
            foreach ($clip->getTags() as $tag) {
                $existsTags[] = $tag;
            }


        }
        $form = $this->createForm(new Edit(), $clip);


        $form->handleRequest($request);

        if ($form->isValid()) {
            /* @var $clip \Acme\SearchBundle\Entity\Clip */
            $em = $this->getDoctrine()->getManager();
            $clip = $form->getData();
            $tagRepository = $this->getDoctrine()
                ->getRepository('AcmeSearchBundle:Tag');
            $collectionTags = new ArrayCollection();
            foreach ($clip->getTags()->toArray() as $tag) {
                $tagId = $tag->getId();
                if (empty($tagId)) {
                    $exTag = $tagRepository->findOneBy(array('name' => $tag->getName()));
                    if (!empty($exTag)) {
                        $exTag->addClip($clip);
                        $collectionTags[] = $exTag;
                    } else {
                        $collectionTags[] = $tag;
                        $em->persist($tag);
                    }
                }
            }
            $clip->setTags($collectionTags);


            $em->persist($clip);
            $em->flush();

            return $this->redirect($this->generateUrl('clip_list'));
        }


        return array(
            'form' => $form->createView(),
            'clip_tags' => $existsTags,
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
            'clips' => $clips
        );
    }
}
