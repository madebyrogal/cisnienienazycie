<?php

namespace Acard\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('meta_title', 'text', array(
            'label' => 'Meta tytuł strony'
        ));
        $builder->add('meta_description', 'text', array(
            'label' => 'Meta opis'
        ));
        $builder->add('meta_keywords', 'text', array(
            'label' => 'Słowa kluczowe'
        ));
        $builder->add('url_title', 'hidden', array(
            'label' => 'Nazwa strony w URL ({nazwa}.html)',
        ));

        $builder->add('text', 'textarea', array(
            'label' => 'Treść strony',
            'attr' => array(
                'class' => 'tinymce',
                'data-theme' => 'advanced'
            )
        ));
        $builder->add('wrapper_css_class', 'text', array(
            'label' => 'Klasa css okalająca treść',
            'required' => false
        ));
        $builder->add('submit', 'submit');

        return $builder->getForm();

    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\Page',
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'page';
    }
}