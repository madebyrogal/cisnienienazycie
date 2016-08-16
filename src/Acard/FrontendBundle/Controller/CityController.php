<?php

namespace Acard\FrontendBundle\Controller;

use Acard\FrontendBundle\Entity\City;
use Acard\FrontendBundle\Handler\CityHandler;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    public function findByProvinceAction()
    {
        /** @var $request Request */
        $request = $this->get('request');

        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Strona nie istnieje');
        }

        $provinceId = $request->query->get('wojewodztwo', null);

        /** @var $cityHandler CityHandler */
        $cityHandler = $this->getHandlerFactory()->createHandler('City');

        /** @var $cities ArrayCollection */
        $cities = $cityHandler->findEventCitiesByProvinceId($provinceId);

        $response = array();
        /** @var $city City */
        foreach ($cities as $city) {
            $response[] = $city->toArray();
        }

        return new JsonResponse($response);
    }
}
