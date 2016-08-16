<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/15/14
 * Time: 1:11 AM
 */

namespace Acard\FrontendBundle\Handler;

use Doctrine\ORM\QueryBuilder;

class EventHandler extends Handler
{
    public function getActiveEventsByCity($cityId)
    {
        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->createQueryBuilder('e');
        return $queryBuilder->where('e.city = :cityId')
            ->setParameter('cityId', $cityId)
            ->andWhere('e.start_date >= :startDate')
            ->setParameter('startDate', date('Y-m-d'))
            ->getQuery()
            ->getResult();
    }

    public function getAllActiveEvents()
    {
        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')
            ->createQueryBuilder('e');
        return $queryBuilder->where('e.end_date >= :endDate')
            ->leftJoin('e.city', 'city')
            ->setParameter('endDate', date('Y-m-d'))
            ->orderBy('city.label', 'ASC')
            ->getQuery()
            ->getResult();
    }
} 