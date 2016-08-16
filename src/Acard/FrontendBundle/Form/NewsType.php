<?php

namespace Acard\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateFrom', 'date', array('label' => 'Publikacja od:', 'required' => true ) )
            ->add('file', 'file', array('label' => 'Zdjęcie:', 'required' => false, 'data_class' => null ) )
            ->add('fileThumb1', 'hidden', array('label' => 'Zdjęcie miniatury (lista aktualności):', 'required' => false ) )
            ->add('fileThumb2', 'hidden', array('label' => 'Zdjęcie miniatury (główne zdjęcie w widoku aktualności):', 'required' => false) )
            ->add('title', 'text', array('label' => 'Tytuł', 'required' => true ) )
            ->add('sneakPeak', 'textarea', array('label' => 'Zajawka', 'required' => true) )
            ->add('body', 'textarea', array('label' => 'Treść', 'required' => false, 'attr' => array('class' => 'tinymce', 'data-theme' => 'advanced' ) ) )
            ->add('hidden', 'checkbox', array('label' => 'Ukryta', 'required' => false ))
            ->add('slug', 'text', array('label' => 'Slug (url):', 'required' => true ) )
            ->add('submit', 'submit', array('label' => 'Zapisz', 'attr' => array(
                    'value' => 'Zapisz'
            )));
        
        return $builder->getForm();
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acard_frontendbundle_news';
    }
}
