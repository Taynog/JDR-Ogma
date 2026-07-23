<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class SkillAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('skill')
            ->add('mainCarac')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('skill')
            ->add('mainCarac')
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
            ->add('skill')
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('mainCarac')
            ->add('specialisationExample', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('testExample', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('skill')
            ->add('description')
            ->add('mainCarac')
            ->add('specialisationExample')
            ->add('testExample')
        ;
    }
}
