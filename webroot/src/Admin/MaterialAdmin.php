<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class MaterialAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('material')
            ->add('weaponBonusDmg')
            ->add('armorBonusProtection')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('material')
            ->add('weaponBonusDmg')
            ->add('armorBonusProtection')
            ->add('weaponPriceMultiplier')
            ->add('armorPriceMultiplier')
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
            ->add('material')
            ->add('description', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('weaponBonusDmg')
            ->add('weaponPassiveEffect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('weaponActiveEffect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('armorBonusProtection')
            ->add('armorBonusProctectionMagical')
            ->add('armorPassiveEffect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('armorActiveEffect', \FOS\CKEditorBundle\Form\Type\CKEditorType::class)
            ->add('weaponPriceMultiplier')
            ->add('armorPriceMultiplier')
            ->add('armorCategory', \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, [
                'class' => \App\Entity\Armor::class,
                'choice_label' => 'category',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('material')
            ->add('description')
            ->add('weaponBonusDmg')
            ->add('weaponPassiveEffect')
            ->add('weaponActiveEffect')
            ->add('armorBonusProtection')
            ->add('armorBonusProctectionMagical')
            ->add('armorPassiveEffect')
            ->add('armorActiveEffect')
            ->add('weaponPriceMultiplier')
            ->add('armorPriceMultiplier')
            ->add('armorCategory')
        ;
    }
}
