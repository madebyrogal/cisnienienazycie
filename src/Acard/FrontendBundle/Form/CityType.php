<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/16/14
 * Time: 6:53 PM
 */

namespace Acard\FrontendBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('label', 'text', array('label' => 'Nazwa'));
        $builder->add('province', 'entity', array(
            'label' => 'Województwo',
            'class' => 'AcardFrontendBundle:Province'
        ));
        $builder->add('lat', 'hidden');
        $builder->add('lng', 'hidden');
        $builder->add('find_location', 'button');
        $builder->add('submit', 'submit');

        return $builder->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\City',
        ));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'city';
    }
}