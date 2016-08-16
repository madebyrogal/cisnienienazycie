<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/14/14
 * Time: 2:18 AM
 */

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\Province;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProvinceData extends AbstractFixture implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $provinces = array(
            1 => array('name' => 'dolnoslaskie', 'label' => 'dolnośląskie'),
            2 => array('name' => 'kujawsko-pomorskie', 'label' => 'kujawsko-pomorskie'),
            3 => array('name' => 'lubelskie', 'label' => 'lubelskie'),
            4 => array('name' => 'lubuskie', 'label' => 'lubuskie'),
            5 => array('name' => 'lodzkie', 'label' => 'łódzkie'),
            6 => array('name' => 'malopolskie', 'label' => 'małopolskie'),
            7 => array('name' => 'mazowieckie', 'label' => 'mazowieckie'),
            8 => array('name' => 'opolskie', 'label' => 'opolskie'),
            9 => array('name' => 'podkarpackie', 'label' => 'podkarpackie'),
            10 => array('name' => 'podlaskie', 'label' => 'podlaskie'),
            11 => array('name' => 'pomorskie', 'label' => 'pomorskie'),
            12 => array('name' => 'slaskie', 'label' => 'śląskie'),
            13 => array('name' => 'swietokrzyskie', 'label' => 'świętokrzyskie'),
            14 => array('name' => 'warminsko-mazurskie', 'label' => 'warmińsko-mazurskie'),
            15 => array('name' => 'wielkopolskie', 'label' => 'wielkopolskie'),
            16 => array('name' => 'zachodniopomorskie', 'label' => 'zachodniopomorskie'),
        );

        foreach ($provinces as $province) {
            $provinceEntity = new Province();
            $provinceEntity->setName($province['name']);
            $provinceEntity->setLabel($province['label']);
            $manager->persist($provinceEntity);

            $this->setReference('wojewodztwo-'.$province['name'], $provinceEntity);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}