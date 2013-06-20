<?php

namespace Volcano\VideoStatusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Google_Client;
use Google_YouTubeService;
use Volcano\VideoStatusBundle\Form\Search;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     * @Template("VolcanoVideoStatusBundle:Default:google.html.twig")
     */
    public function googleSearch()
    {
        $request = $this->getRequest();

        $form = $this->createForm(new Search());

        $videos = '';
        $form->handleRequest($request);
        if ($form->isValid()) {
            $arrData = $form->getData();

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

                        $videoInfo = $this->_parseVideoEntry($searchResult['id']['videoId']);

                        $videoDuration = gmdate("H:i:s", (int)$videoInfo->length);
                        $videoStr = sprintf('<li>%s - %s (<a href="http://www.youtube.com/watch?v=' . '%s' . '">Show</a>)</li>', $searchResult['snippet']['title'],
                            $videoDuration, $searchResult['id']['videoId']);
                        $videos .= $videoStr;

                        break;
                }
            }

        }


        return array(
            'form' => $form->createView(),
            'videos' => $videos,
        );

    }

    /**
     * @Route("/get-video-info", name="get_video")
     */
    public function getVideoInfo()
    {
        $request = $this->getRequest();
        $videoId = $request->get('id', 'EtVRvulCRF8');
        $response = new Response(json_encode($this->_parseVideoEntry($videoId)));
        //$response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    protected function _parseVideoEntry($youtubeVideoID)
    {
        $obj = new \stdClass();

        // set video data feed URL
        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $youtubeVideoID;

        // read feed into SimpleXML object
        $entry = simplexml_load_file($feedURL);

        // get nodes in media: namespace for media information
        $media = $entry->children('http://search.yahoo.com/mrss/');
        $obj->title = $media->group->title;
        $obj->description = $media->group->description;

        // get video player URL
        $attrs = $media->group->player->attributes();
        $obj->watchURL = $attrs['url'];

        // get video thumbnail
        $attrs = $media->group->thumbnail[0]->attributes();
        $obj->thumbnailURL = $attrs['url'];

        // get <yt:duration> node for video length
        $yt = $media->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->duration->attributes();
        $obj->length = $attrs['seconds'];

        // get <yt:stats> node for viewer statistics
        $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->statistics->attributes();
        $obj->viewCount = $attrs['viewCount'];

        // get <gd:rating> node for video ratings
        $gd = $entry->children('http://schemas.google.com/g/2005');
        if ($gd->rating) {
            $attrs = $gd->rating->attributes();
            $obj->rating = $attrs['average'];
        } else {
            $obj->rating = 0;
        }

        // get <gd:comments> node for video comments
        $gd = $entry->children('http://schemas.google.com/g/2005');
        if ($gd->comments->feedLink) {
            $attrs = $gd->comments->feedLink->attributes();
            $obj->commentsURL = $attrs['href'];
            $obj->commentsCount = $attrs['countHint'];
        }

        return $obj;
    }


}
