<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\WebContentSection;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WebContentSectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('position', IntegerType::class, [
                'label' => 'Position',
                'attr' => ['style' => 'width: 80px'],
            ])
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Titre (heading)',
            ])
            ->add('level', IntegerType::class, [
                'label' => 'Niveau (h1–h6)',
                'attr' => ['style' => 'width: 80px'],
            ])
            ->add('anchor', TextType::class, [
                'required' => false,
                'label' => 'Ancre HTML',
            ])
            ->add('collapsible', CheckboxType::class, [
                'required' => false,
                'label' => 'Repliable',
            ])
            ->add('content', CKEditorType::class, [
                'required' => false,
                'label' => false,
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WebContentSection::class,
        ]);
    }
}
