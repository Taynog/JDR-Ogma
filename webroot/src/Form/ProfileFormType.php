<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => "Nom d'utilisateur",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom d\'utilisateur.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Le nom d\'utilisateur doit contenir au moins {{ limit }} caractères.',
                        'max' => 255,
                        'maxMessage' => 'Le nom d\'utilisateur ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse e-mail',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse e-mail.',
                    ]),
                    new Email([
                        'message' => 'Veuillez saisir une adresse e-mail valide.',
                    ]),
                ],
            ])
            ->add('avatarFile', VichImageType::class, [
                'label' => 'Avatar',
                'required' => false,
                'allow_delete' => false,
                'download_label' => false,
                'constraints' => [
                    new Image([
                        'mimeTypes' => ['image/png', 'image/jpeg', 'image/webp', 'image/gif'],
                        'mimeTypesMessage' => 'Le fichier doit être une image (PNG, JPEG, WebP ou GIF).',
                        'maxSize' => '2M',
                        'maxSizeMessage' => 'L\'image ne doit pas dépasser {{ limit }} {{ suffix }}.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}