<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ArmorAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('category')
            ->add('protection')
            ->add('protectionMagical')
            ->add('price')
            ->add('enc')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('category')
            ->add('protection')
            ->add('protectionMagical')
            ->add('price')
            ->add('enc')
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
            ->add('category')
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('protection')
            ->add('protectionMagical')
            ->add('price')
            ->add('enc')
            ->add('speedPenalty')
            ->add('movementCheckDisadvantage')
            ->add('materials', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => \App\Entity\Material::class,
                'choice_label' => 'material',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('category')
            ->add('description')
            ->add('protection')
            ->add('protectionMagical')
            ->add('price')
            ->add('enc')
            ->add('speedPenalty')
            ->add('movementCheckDisadvantage')
            ->add('materials')
        ;
    }
}
