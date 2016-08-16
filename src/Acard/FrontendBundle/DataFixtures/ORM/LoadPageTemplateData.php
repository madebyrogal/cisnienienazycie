<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 13.03.14
 * Time: 20:25
 */

namespace Acard\FrontendBundle\DataFixtures;

use Acard\FrontendBundle\Entity\PageTemplate;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPageTemplateData extends AbstractFixture implements OrderedFixtureInterface
{
    function load(ObjectManager $manager)
    {
        $pageTemplates = array(
            array('name' => 'main', 'label' => 'Layout strony głównej'),
            array('name' => 'page', 'label' => 'Layout podstrony'),
        );

        foreach ($pageTemplates as $pageTemplate) {
            $pageTemplateEntity = new PageTemplate();
            $pageTemplateEntity->setName($pageTemplate['name']);
            $pageTemplateEntity->setLabel($pageTemplate['label']);

            $this->addReference('page-template-'.$pageTemplate['name'], $pageTemplateEntity);

            $manager->persist($pageTemplateEntity);
        }
        $manager->flush();
    }


    public function getOrder()
    {
        return 1;
    }
}