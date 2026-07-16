<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\WebContentCategory;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class WebContentAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('page')
            ->add('title')
            ->add('content')
            ->add('category')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('page')
            ->add('title')
            ->add('content')
            ->add('category')
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
            ->add('page')
            ->add('title')
            ->add('content', CKEditorType::class, [
                //'style' => 'app.css'
            ])
            ->add('category', ChoiceType::class, [
                'choices' => WebContentCategory::cases(),
                'choice_label' => 'value'
            ])
            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('page')
            ->add('title')
            ->add('content')
            ->add('category')
            ;
    }
}
