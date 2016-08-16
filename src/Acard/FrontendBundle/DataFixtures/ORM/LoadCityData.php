<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/15/14
 * Time: 1:44 AM
 */

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\City;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCityData extends AbstractFixture  implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $city = new City();
        $city->setProvince($this->getReference('wojewodztwo-wielkopolskie'));
        $city->setLabel('Poznań');
        $city->setName('Poznań');
        $city->setLat(52.387965);
        $city->setLng(16.99258);

        $manager->persist($city);
        $manager->flush();

        $this->setReference('poznan', $city);
    }

    public function getOrder()
    {
        return 2;
    }
}