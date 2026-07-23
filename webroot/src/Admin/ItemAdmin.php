<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ItemAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('item')
            ->add('price')
            ->add('enc')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('item')
            ->add('category', null, [
                'label' => 'item.category',
            ])
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
            ->add('item')
            ->add('category', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => \App\Entity\ItemCategory::class,
                'choice_label' => 'category',
            ])
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('price')
            ->add('enc')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('item')
            ->add('category')
            ->add('description')
            ->add('price')
            ->add('enc')
        ;
    }
}
