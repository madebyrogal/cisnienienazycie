<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/17/14
 * Time: 4:35 PM
 */

namespace Acard\FrontendBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('place', 'text', array('label' => 'Nazwa miejsca'));
        $builder->add('city', 'entity', array(
            'label' => 'Miasto',
            'class' => 'AcardFrontendBundle:City'
        ));
        $builder->add('start_date', 'date', array('label' => 'Data początkowa'));
        $builder->add('end_date', 'date', array('label' => 'Data końcowa'));
        $builder->add('address', 'text', array('label' => 'Adres'));
        $builder->add('time_details', 'textarea', array('label' => 'Termin'));
        $builder->add('info', 'textarea', array('label' => 'Dodatkowe informacje', 'required' => false));
        $builder->add('lat', 'hidden', array('label' => ''));
        $builder->add('lng', 'hidden', array('label' => ''));

        $builder->add('find_location', 'button');
        $builder->add('submit', 'submit');

        return $builder->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\Event',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'event';
    }
}