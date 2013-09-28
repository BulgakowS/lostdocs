<?php

namespace Lostdocs\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;

class AnnouncementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
                'label'=>'Что нашли/потеряли?',
                'required' => true
            ))
            ->add('announcement_type', 'choice', array(
                'choices' => array('Потеряно', 'Найдено'),
                'empty_value' => 'Выберите значение',
                'required' => true,
                'label'=>'Тип объявления'
            ))
            ->add('description', 'textarea', array(
                'label' => 'Описание'
            ))
            ->add('reward', 'number', array(
                'required' => false,
                'label' => 'Вознагражение (грн.)',
                'precision'=> 0, 
                'attr' => array('min'=>0, 'value'=>0)
            ))
            ->add('document_type', 'choice', array(
                'choices' => $this->getDocTypes(),
                'empty_value' => 'Выберите значение',
                'required' => true,
                'label'=>'Тип документа'
            ))
            ->add('lat')
            ->add('long')
            ->add('active')
            ->add('region')
            ->add('city')
            ->add('street')
            ->add('build')
            
            
            ->add('user')
            ->add('photos');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lostdocs\MainBundle\Entity\Announcement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lostdocs_mainbundle_announcementtype';
    }
    
    private function getDocTypes()
    {
        return array(
            'Паспорт', 'Загранпаспорт', 'Удостоверение водителя',  
            'Свидетельство о рождении', 'Справка об освобождении из места лишения свободы',
            'Военный билет', 'Студенческий билет', 'Вид на жительство', 
            'Временное удостоверение личности', 'Пенсионное удостоверение',
            'Удостоверение инвалидности', 
            'Иные документы'
        );
    }
}

