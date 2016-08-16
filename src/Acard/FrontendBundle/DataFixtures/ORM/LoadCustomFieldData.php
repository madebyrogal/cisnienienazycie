<?php

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\CustomField;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCustomFieldData extends AbstractFixture  implements OrderedFixtureInterface
{

    function load(ObjectManager $manager)
    {
        $customFields = array(
            array('name' => 'examination_count', 'label' => 'Liczba przeprowadzonych badań', 'value' => '200567'),
        );

        foreach ($customFields as $customField) {
            $customFieldEntity = new CustomField();
            $customFieldEntity->setName($customField['name']);
            $customFieldEntity->setLabel($customField['label']);
            $customFieldEntity->setValue($customField['value']);
            $customFieldEntity->setIsProtected(true);

            $manager->persist($customFieldEntity);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}