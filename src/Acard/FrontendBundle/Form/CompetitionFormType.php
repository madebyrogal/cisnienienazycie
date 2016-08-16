<?php

namespace Acard\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompetitionFormType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Pełna nazwa jednostki samorządu terytorialnego:', 'required' => false))
            ->add('street', 'text', array('label' => 'Ulica i numer:', 'required' => true))
            ->add('buildingNr', 'text', array('label' => '', 'required' => true))
            ->add('flatNr', 'text', array('label' => '', 'required' => false))
            ->add('postCode', 'hidden', array('label' => 'Kod pocztowy i miasto:', 'required' => true))
            ->add('city', 'text', array('label' => '', 'required' => true))
            ->add('firstName', 'text', array('label' => 'Imię osoby zgłaszającej:', 'required' => true))
            ->add('lastName', 'text', array('label' => 'Nazwisko osoby zgłaszającej:', 'required' => true))
            ->add('email', 'email', array('label' => 'Adres e-mail:', 'required' => true))
            ->add('phone', 'text', array('label' => 'Numer telefonu:', 'required' => true))
            ->add('descTime', 'textarea', array('label' => 'Czas trwania programu i jego edycje (Czy program był jednorazowy?<br/>Czy realizowany w poszczególnych latach?):', 'required' => true))
            ->add('descAim', 'textarea', array('label' => 'Cele, idea, działania, sposób realizacji (np. akcja informacyjna, plakaty, ulotki itp.):', 'required' => true))
            ->add('descPeople', 'textarea', array('label' => 'Jaki % mieszkańców został objęty programem?', 'required' => true))
            ->add('descEfect', 'textarea', array('label' => 'Osiągnięte efekty np. liczba przebadanych osób, liczba osób skierowanych na dodatkowe konsultacje:', 'required' => true))
            ->add('accept1', 'checkbox', array('label' => 'Zgadzam się z regulaminem konkursu oraz wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do przeprowadzenia Konkursu pod nazwą „Samorząd od serca”, zgodnie z ustawą z dnia 29.08.1997 r.  o ochronie danych osobowych (Dz. U. Nr 133, poz. 883 z późn. zm.). Jednocześnie oświadczam, że wszelkie przekazane przeze mnie informacje są prawdziwe.', 'required' => true))
        ;
        return $builder->getForm();
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acard\FrontendBundle\Entity\CompetitionForm'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acard_frontendbundle_competitionform';
    }
}
