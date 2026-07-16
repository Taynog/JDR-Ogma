<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class WeaponAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('type')
            ->add('damageType')
            ->add('damage')
            ->add('handling')
            ->add('reach')
            ->add('enc')
            ->add('price')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('type', null, [
	            'label' => 'weapon.type'
            ])
            ->add('damageType', null, [
				'label' => 'weapon.damage_type'
            ])
            ->add('damage', null, [
				'label' => 'weapon.damage'
            ])
            ->add('handling', null, [
				'label' => 'weapon.handling'
            ])
            ->add('reach', null, [
				'label' => 'weapon.reach'
            ])
            ->add('enc', null, [
	            'label' => 'enc'
            ])
            ->add('price', null, [
	            'label' => 'weapon.price'
            ])
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
            ->add('type', null, [
	            'label' => 'weapon.type'
            ])
	        ->add('category', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
		        'class' => \App\Entity\WeaponCategory::class,
		        'choice_label' => 'category',
		        'label' => 'weapon.category',
	        ])
            ->add('damageType', null, [
	            'label' => 'weapon.damage_type'
            ])
            ->add('damage', null, [
	            'label' => 'weapon.damage'
            ])
            ->add('handling', null, [
	            'label' => 'weapon.handling'
            ])
            ->add('reach', null, [
	            'label' => 'weapon.reach'
            ])
            ->add('enc')
            ->add('price', null, [
	            'label' => 'weapon.price'
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('type')
            ->add('damageType')
            ->add('damage')
            ->add('handling')
            ->add('reach')
            ->add('enc')
            ->add('price')
        ;
    }
}
