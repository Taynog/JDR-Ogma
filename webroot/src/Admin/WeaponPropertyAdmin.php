<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class WeaponPropertyAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('property')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('property')
            ->add('description')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('property')
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('effect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('example', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('property')
            ->add('description')
            ->add('effect')
            ->add('example')
        ;
    }
}
