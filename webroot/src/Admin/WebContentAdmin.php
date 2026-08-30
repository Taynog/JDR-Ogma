<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\WebContentCategory;
use App\Form\WebContentSectionType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\FieldDescription\FieldDescriptionInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

final class WebContentAdmin extends AbstractAdmin
{
    protected function configure(): void
    {
        $this->setTemplate('edit', 'admin/webcontent_edit.html.twig');
        $this->setTemplate('show', 'admin/web_content_show.html.twig');
    }

    public function prePersist(object $object): void
    {
        $this->resolveSections($object);
    }

    public function preUpdate(object $object): void
    {
        $this->resolveSections($object);
    }

    private function resolveSections(object $object): void
    {
        $position = 0;
        foreach ($object->getSections() as $section) {
            $section->setWebContent($object);
            $section->setPosition($position++);
        }
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('page')
            ->add('title')
            ->add('category')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('page')
            ->add('title')
            ->add('category')
            ->add('sectionsCount')
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
            ->add('category', ChoiceType::class, [
                'choices' => WebContentCategory::cases(),
                'choice_label' => 'value',
            ])
            ->add('sections', CollectionType::class, [
                'entry_type' => WebContentSectionType::class,
                'by_reference' => false,
                'required' => false,
                'label' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('page')
            ->add('title')
            ->add('category')
        ;
    }
}
