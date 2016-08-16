<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/14/14
 * Time: 3:03 AM
 */

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\Event;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $futureDate = new \DateTime('+7 days');

        for($i = 0; $i < 7; $i++) {
            $event = new Event();
            $event->setStartDate($futureDate);
            $event->setPlace('M1 Centrum Handlowe Poznań' . $i);
            $event->setLat(52.387965);
            $event->setLng(16.99258);
            $event->setAddress('ul. Szwajcarska');
            $event->setTimeDetails("Godziny otwarcia:\nponiedziałek - sobota: 9-17\nniedziela: 10-14");
            $event->setCity($this->getReference('poznan'));
            $event->setInfo('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

            $manager->persist($event);
        }

        $pastDate = new \DateTime('-1 days');

        for($i = 0; $i < 7; $i++) {
            $event = new Event();
            $event->setStartDate($pastDate);
            $event->setPlace('M1 Centrum Handlowe Poznań' . $i);
            $event->setLat(52.387965);
            $event->setLng(16.99258);
            $event->setAddress('ul. Szwajcarska');
            $event->setTimeDetails("Godziny otwarcia:\nponiedziałek - sobota: 9-17\nniedziela: 10-14");
            $event->setCity($this->getReference('poznan'));
            $event->setInfo('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

            $manager->persist($event);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}