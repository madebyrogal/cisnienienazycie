<?php

namespace Acard\BackendBundle\Handler;

use Acard\FrontendBundle\Entity\City;

class CityHandler extends Handler
{
    public function getAllCities()
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:City')->findAll();
    }

    public function getCityById($id)
    {
        return $this->getDoctrine()->getRepository('AcardFrontendBundle:City')->find($id);
    }

    public function persistCity(City $city)
    {
        $this->getDoctrine()->getManager()->persist($city);
        $city->setName($city->getLabel());
        $this->getDoctrine()->getManager()->flush();

        return true;
    }

    public function deleteCity(City $city)
    {
        $existingEvents = $this->getDoctrine()->getManager()->getRepository('AcardFrontendBundle:Event')->findBy(array('city' => $city));
        if (count($existingEvents) > 0) {
            throw new \Exception('Istnieją wydarzenia, które korzystają z tego miasta. Jesli chcesz usunąć miasta, najpierw usuń powiązane wydarzenia.');
        }

        $this->getDoctrine()->getManager()->remove($city);
        $this->getDoctrine()->getManager()->flush();

        return true;
    }
} 