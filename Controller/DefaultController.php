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
    /** @var Ivory\GoogleMapBundle\Model\Map */
    public function generateGoogleMapAction($address, $city) {
        $locationInfo = [$address, $city];
        $map = $this->get('ivory_google_map.map');
        $curl = new \Ivory\HttpAdapter\CurlHttpAdapter();
        
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

        $json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($locationInfo[0]) . '+' . urlencode($locationInfo[1]));
        $obj = json_decode($json);
        if (count($obj->results) === 0)
            return $this->render('ConnectHollandPiccoloContentBundle:Block:googlemap.html.twig', array('map' => $map));

        $location = $geocoder->geocode($locationInfo[0] . ' ' . $locationInfo[1])->first();

        $latitude = $location->getLatitude();
        $longitude = $location->getLongitude();
        
        $map->setCenter($latitude, $longitude, true);
        $map->setMapOption('zoom', 12);
        
        $marker = new Marker();
        $marker->setPosition($latitude, $longitude, true);
        $marker->setOption('clickable', true);
        $map->addMarker($marker);

        $infoWindow = new InfoWindow();
        $infoWindow->setContent('<p>'.$locationInfo[0].'<br/>'.$locationInfo[1].'</p>');
        $infoWindow->setAutoClose(true);
        $marker->setInfoWindow($infoWindow);

        return $this->render('ConnectHollandPiccoloContentBundle:Block:googlemap.html.twig', array('map' => $map));
    }
}