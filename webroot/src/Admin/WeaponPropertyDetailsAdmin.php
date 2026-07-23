<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class WeaponPropertyDetailsAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('X')
            ->add('Y')
            ->add('Z')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('weaponProperty', null, [
                'label' => 'weapon_property.property',
            ])
            ->add('X')
            ->add('Y')
            ->add('Z')
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
            ->add('weaponProperty', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => \App\Entity\WeaponProperty::class,
                'choice_label' => 'property',
            ])
            ->add('X')
            ->add('Y')
            ->add('Z')
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('weaponProperty')
            ->add('X')
            ->add('Y')
            ->add('Z')
        ;
    }
}
