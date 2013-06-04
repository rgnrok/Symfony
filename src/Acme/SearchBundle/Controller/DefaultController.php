<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Google_Client;
use Google_YouTubeService;
use Acme\SearchBundle\Form\Search;




class DefaultController extends Controller
{

    /**
     * @Route("/google/search")
     * @Template("AcmeSearchBundle:Default:google.html.twig")
     */
    public function googleSearch()
    {
        $request = $this->getRequest();

        $form = $this->createForm(new Search());

        $videos = '';
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $arrData =  $form->getData();

                $DEVELOPER_KEY = 'AIzaSyCVYHBPJhyqWRpqkxVvOcBsVqpJf_SAruQ';
                $resultCount = 10;
                $client = new Google_Client();
                $client->setDeveloperKey($DEVELOPER_KEY);

                $youtube = new Google_YouTubeService($client);

                    $searchResponse = $youtube->search->listSearch('snippet', array(
                        'q' => $arrData['search'],
                        'maxResults' => $resultCount,
                    ));
                    $videos = '';


                    foreach ($searchResponse['items'] as $searchResult) {
                        switch ($searchResult['id']['kind']) {
                            case 'youtube#video':
                                $videoStr = sprintf('<li>%s (<a href="http://www.youtube.com/watch?v=' . '%s' . '">Show</a>)</li>', $searchResult['snippet']['title'],
                                    $searchResult['id']['videoId']);
                                $videos .= $videoStr;
                                break;
                        }
                    }

                }
        }


        return array(
            'form' => $form->createView(),
            'videos' => $videos,
        );

    }
}
