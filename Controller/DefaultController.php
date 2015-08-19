<?php

namespace ConnectHolland\PiccoloContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\Menu;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ODM\PHPCR\DocumentManager;
use PHPCR\Util\NodeHelper;
use Ivory\GoogleMapBundle\Model\Map;
use Ivory\GoogleMap\Overlays\Marker;
use Ivory\GoogleMap\Overlays\InfoWindow;

class DefaultController extends Controller
{
    public function getRelatedPageAction()
    {
        $dm = $this->get('doctrine_phpcr')->getRepository('ConnectHollandPiccoloContentBundle:NewsPage');
        $pages = $dm->findAll();

        /*
        kijk in elke opgehaalde $page wat de keywords zijn
        vergelijk de eerder opgehaalde $page[keywords] met de huidige
        als ze overeenkomen, plaats $page[name] in $relatedPages
        als ze niet overeenkomen, ga door naar volgende en zorg dat er wordt gechecked op de op een na laatste
        */

        $relatedPages = array();
        foreach ($pages as $page) {
            $keywords = $page->getKeywords();
            if (isset($prevKeywords)) {
                foreach ($prevKeywords as $keyword) {
                    if (in_array($keyword, $keywords)) {
                        $relatedPages[$page->getName()] = $page->getName();
                    }
                }
            }
            $prevKeywords = $keywords;
            echo "----------------";
        }

        return new Response($this->get('translator')->trans('settings_saved'));
    }

    /** @var Ivory\GoogleMapBundle\Model\Map */
    public function generateGoogleMapAction($address) {
        $input = $address;
        $map = $this->get('ivory_google_map.map');
        $curl = new \Ivory\HttpAdapter\CurlHttpAdapter();
        
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

        $json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address));
        $obj = json_decode($json);
        if (count($obj->results) === 0)
            return $this->render('ConnectHollandPiccoloContentBundle:Block:googlemap.html.twig', array('map' => $map));

        $address = $geocoder->geocode($address)->first();

        $latitude = $address->getLatitude();
        $longitude = $address->getLongitude();
        
        $map->setCenter($latitude, $longitude, true);
        $map->setMapOption('zoom', 12);
        
        $marker = new Marker();
        $marker->setPosition($latitude, $longitude, true);
        $marker->setOption('clickable', true);
        $map->addMarker($marker);

        $infoWindow = new InfoWindow();
        $infoWindow->setContent('<p>'.$input.'</p>');
        $infoWindow->setAutoClose(true);
        $marker->setInfoWindow($infoWindow);

        return $this->render('ConnectHollandPiccoloContentBundle:Block:googlemap.html.twig', array('map' => $map));
    }
}