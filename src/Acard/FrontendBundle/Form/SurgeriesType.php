<?php

namespace Acard\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class SurgeriesType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array('label' => 'Nazwa gabinetu'))
                ->add('drName', 'text', array('label' => 'Imię i nazwisko doktora'))
                ->add('address', 'text', array('label' => 'Adres gabinetu'))
                ->add('postcode', 'text', array('label' => 'Kod pocztowy'))
                ->add('city', 'entity', array(
                    'class' => 'AcardFrontendBundle:City',
                    'property' => 'name',
                    'empty_value' => 'Wybierz miasto',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                                ->orderBy('c.name', 'ASC');
                    },
                    'label' => 'Miasto'))
                ->add('submit', 'submit', array('label' => 'Zapisz', 'attr' => array(
                        'value' => 'Zapisz'
            )));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\Surgeries'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'acard_backendbundle_surgeries';
    }

}
