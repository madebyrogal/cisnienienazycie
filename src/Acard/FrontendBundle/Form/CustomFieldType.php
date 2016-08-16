<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/19/14
 * Time: 12:56 AM
 */

namespace Acard\FrontendBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomFieldType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $builder->add('name', 'text', array(
//            'label' => 'Klucz'
//        ));
        $builder->add('value', 'text', array(
            'label' => 'Wartość'
        ));
//        $builder->add('label', 'text', array(
//            'label' => 'Nazwa'
//        ));
        $builder->add('submit', 'submit');

        return $builder->getForm();
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\CustomField',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'custom_field';
    }
}