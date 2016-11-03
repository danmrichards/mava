<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class WorkspaceAdmin extends AbstractAdmin
{
    /**
     * Fields to be shown on the create/edit form.
     *
     * @param FormMapper $formMapper
     *   Form API mapper.
     */
    function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text')
            ->add('description', 'textarea');
    }

    /**
     * Fields to be shown on filter forms.
     *
     * @param DatagridMapper $datagridMapper
     *   Data grid mapper.
     */
    function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description');
    }

    /**
     * Fields to be shown on lists.
     *
     * @param ListMapper $listMapper
     *   List mapper.
     */
    function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description');
    }
}