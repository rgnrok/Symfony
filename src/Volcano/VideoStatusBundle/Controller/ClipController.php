<?php

namespace Volcano\VideoStatusBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\Common\Collections\ArrayCollection;
use Volcano\VideoStatusBundle\Form\Clip\Edit;
use Volcano\VideoStatusBundle\Entity\Clip;

class ClipController extends Controller
{

    /**
     * @Route("/clip/edit/{id}", name="clip_create", requirements={"id" = "\d+"}, defaults={"id" = 0})
     * @Template("VolcanoVideoStatusBundle:Clip:create.html.twig")
     */
    public function createAction()
    {
        $request = $this->getRequest();
        $clip = new Clip();
        $clipId = $request->get('id');
        $existsTags = array();
        if (!empty($clipId)) {
            $repository = $this->getDoctrine()
                ->getRepository('VolcanoVideoStatusBundle:Clip');

            $clip = $repository->find($clipId);

            // Create an array of the current Tag objects in the database
            foreach ($clip->getTags() as $tag) {
                $existsTags[] = $tag;
            }
        }
        $form = $this->createForm(new Edit(), $clip);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /* @var $clip \Volcano\VideoStatusBundle\Entity\Clip */
            $em = $this->getDoctrine()->getManager();
            $clip = $form->getData();
            $tagRepository = $this->getDoctrine()
                ->getRepository('VolcanoVideoStatusBundle:Tag');
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
            'isEdit' => !empty($clipId),
        );
    }


    /**
     * @Route("/clip/list", name="clip_list")
     * @Template("VolcanoVideoStatusBundle:Clip:list.html.twig")
     */
    public function listAction()
    {
        /* @var $repository \Doctrine\ORM\EntityRepository */
        $repository = $this->getDoctrine()
            ->getRepository('VolcanoVideoStatusBundle:Clip');

        $query = $repository->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->getQuery();
        $clips = $query->getResult();

        return array(
            'clips' => $clips
        );
    }
}
