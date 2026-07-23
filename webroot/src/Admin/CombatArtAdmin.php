<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class CombatArtAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('cost')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('name')
            ->add('cost')
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
            ->add('name')
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('conditions', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('effect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('cost')
            ->add('assaillantTest', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('defenderTest', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('weaponCategories', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => \App\Entity\WeaponCategory::class,
                'choice_label' => 'category',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('name')
            ->add('description')
            ->add('conditions')
            ->add('effect')
            ->add('cost')
            ->add('assaillantTest')
            ->add('defenderTest')
            ->add('weaponCategories')
        ;
    }
}
