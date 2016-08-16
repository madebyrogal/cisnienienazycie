<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/14/14
 * Time: 10:59 PM
 */

namespace Acard\FrontendBundle\Handler;

use Acard\FrontendBundle\Entity\City;
use Acard\FrontendBundle\Entity\Event;
use Doctrine\ORM\QueryBuilder;

class CityHandler extends Handler
{
    public function findEventCitiesByProvinceId($provinceId)
    {
        if (empty($provinceId)) {
            return array();
        }

        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->createQueryBuilder('e');

        $events = $queryBuilder->where('e.start_date >= :startDate')
            ->leftJoin('e.city', 'city')
            ->andWhere('city.province = :provinceId')
            ->setParameters(array('provinceId' => $provinceId, 'startDate' => date('Y-m-d')))
            ->getQuery()
            ->getResult();



        $results = array();
        /** @var $event Event */
        foreach ($events as $event) {
            $city = $event->getCity();
            $results[$city->getId()] = $city;
        }

        return $results;
    }

    /**
     * @param City $cityToSave
     *
     * @return City
     */
    public function createCity(City $cityToSave)
    {
        $this->getDoctrine()->persist($cityToSave);
        $this->getDoctrine()->flush();

        return $cityToSave;
    }
} 