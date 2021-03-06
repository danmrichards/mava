<?php

namespace AppBundle\Form;

use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('dueDate')
            ->add('attachment', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.file',
                'context' => 'default'
            ))
            ->add('project')
            ->add('user')
            ->add('status', ChoiceType::class, array(
                'choices' => array(
                    'new' => 'new',
                    'in progress' => 'in progress',
                    'completed' => 'completed',
                )
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
