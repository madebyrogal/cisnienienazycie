<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/14/14
 * Time: 4:02 AM
 */

namespace Acard\FrontendBundle\Handler;


use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\Query;

class CalendarHandler extends Handler
{
    const FUTURE_EVENTS_PER_RESPONSE_COUNT = 6;
    const PAST_EVENTS_PER_RESPONSE_COUNT = 3;

    /**
     * @return array
     */
    public function fetchClosestFutureEvents()
    {
        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->createQueryBuilder('e');
        $queryBuilder
            ->where('e.end_date >= :now')
            ->setParameter('now', date('Y-m-d'))
            ->orderBy('e.end_date', 'ASC')
            ->setMaxResults(self::FUTURE_EVENTS_PER_RESPONSE_COUNT);

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @return array
     */
    public function fetchRandomPastEvents()
    {
        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->createQueryBuilder('e');
        $queryBuilder
            ->where('e.end_date < :now')
            ->setParameter('now', date('Y-m-d'))
            ->orderBy('e.end_date', 'DESC');

        $eventsCollection = $queryBuilder->getQuery()->getResult();

        if (empty($eventsCollection)) {
            return array();
        }

        shuffle($eventsCollection);
        return array_slice($eventsCollection, 0, self::PAST_EVENTS_PER_RESPONSE_COUNT);
    }
    public function fetchPastEvents() {

        /** @var $queryBuilder QueryBuilder */
        $queryBuilder = $this->getDoctrine()->getRepository('AcardFrontendBundle:Event')->createQueryBuilder('e');

        $queryBuilder
                ->where('e.end_date < :now')
                ->setParameter('now', date('Y-m-d'))
                ->orderBy('e.end_date', 'DESC')
                ->setMaxResults(6);



        $eventsCollection = $queryBuilder->getQuery()->getResult();
        return $eventsCollection;
    }

} 