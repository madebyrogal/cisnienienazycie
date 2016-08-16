<?php

namespace Acard\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryNewsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', 'file', array('label' => 'Zdjęcie:', 'required' => false, 'data_class' => null ) )
            ->add('fileThumb', 'hidden', array('label' => 'Zdjęcie miniatury (lista aktualności):', 'required' => false ) )
            ->add('alt', 'text', array('label' => 'Tekst alternatywny', 'required' => false ) )
            ->add('news', 'hidden')
            ->add('submit', 'submit', array('label' => 'Zapisz', 'attr' => array(
                    'value' => 'Zapisz'
            )));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\GalleryNews'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acard_frontendbundle_gallerynews';
    }
}
