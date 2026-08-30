<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\WebContent;
use App\Entity\WebContentSection;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class WebContentSectionAdmin extends AbstractAdmin
{
    protected function configure(): void
    {
        $this->setTemplate('edit', 'admin/webcontent_section_edit.html.twig');
    }

    public function prePersist(object $object): void
    {
    }

    public function preUpdate(object $object): void
    {
    }

    private function resolveWebContent(WebContentSection $object): void
    {
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('title')
            ->add('webContent', null, [
                'label' => 'Page',
                'show_filter' => true,
            ])
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('webContent.page', null, [
                'label' => 'Page',
                'sortable' => false,
            ])
            ->add('position')
            ->addIdentifier('title')
            ->add('level')
            ->add('anchor')
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
        $subject = $form->getAdmin()->getSubject();
        $isEdit = $subject && $subject->getId() !== null;
        $webContentId = $this->getRequest()->query->get('webContentId');

        $webContentOptions = [
            'label' => 'Page',
            'choice_label' => 'title',
        ];

        if ($isEdit) {
            $webContentOptions['disabled'] = true;
        } elseif ($webContentId) {
            $em = $this->getModelManager()->getEntityManager(WebContent::class);
            $defaultPage = $em->find(WebContent::class, (int) $webContentId);
            if ($defaultPage) {
                $webContentOptions['data'] = $defaultPage;
            }
        }

        $form
            ->with('Paramètres', ['class' => 'col-md-8'])
                ->add('webContent', null, [
                    'label' => 'Page',
                    'choice_label' => 'title',
                    'disabled' => $isEdit,
                ])
                ->add('position', IntegerType::class, [
                    'label' => 'Position',
                    'attr' => ['style' => 'width: 80px'],
                ])
                ->add('title', TextType::class, [
                    'required' => false,
                    'label' => 'Titre (heading)',
                ])
                ->add('level', IntegerType::class, [
                    'label' => 'Niveau (h1=1, h2=2, h3=3)',
                    'attr' => ['style' => 'width: 80px'],
                ])
            ->end()
            ->with('Options', ['class' => 'col-md-4'])
                ->add('anchor', TextType::class, [
                    'required' => false,
                    'label' => 'Ancre HTML',
                ])
                ->add('collapsible', CheckboxType::class, [
                    'required' => false,
                    'label' => 'Repliable',
                ])
            ->end()
            ->with('Contenu')
                ->add('content', CKEditorType::class, [
                    'required' => false,
                    'label' => 'Contenu HTML',
                    'attr' => ['style' => 'min-height: 300px'],
                    'config' => [
                        'toolbar' => [
                            ['name' => 'styles', 'items' => ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Format']],
                            ['name' => 'paragraph', 'items' => ['NumberedList', 'BulletedList', '-', 'Blockquote']],
                            ['name' => 'links', 'items' => ['Link', 'Unlink', 'Anchor']],
                            ['name' => 'insert', 'items' => ['Image', 'Table', 'HorizontalRule']],
                            ['name' => 'tools', 'items' => ['Maximize', 'Source']],
                        ],
                        'filebrowserBrowseRoute' => 'elfinder',
                        'filebrowserBrowseRouteParameters' => [],
                    ],
                ])
            ->end()
        ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('webContent.page', null, ['label' => 'Page'])
            ->add('position')
            ->add('title')
            ->add('level')
            ->add('anchor')
            ->add('collapsible')
        ;
    }
}
