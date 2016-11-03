<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProjectAdmin extends AbstractAdmin
{
    /**
     * Fields to be shown on the create/edit form.
     *
     * @param FormMapper $formMapper
     *   Form API mapper.
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title' , 'text')
            ->add('description', 'textarea')
            ->add('workspace', 'entity',
                array(
                    'class' => 'AppBundle\Entity\Workspace',
                    'choice_label' => 'name'
                ))
            ->add('dueDate', 'date',
                array(
                    'input'  => 'datetime',
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ));
    }

    /**
     * Fields to be shown on filter forms.
     *
     * @param DatagridMapper $datagridMapper
     *   Data grid mapper.
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('description');
    }

    /**
     * Fields to be shown on lists.
     *
     * @param ListMapper $listMapper
     *   List mapper.
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
        $listMapper->addIdentifier('description');
    }
}