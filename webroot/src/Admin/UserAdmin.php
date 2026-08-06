<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\SecurityBundle\Security;

final class UserAdmin extends AbstractAdmin
{
    public const EDITOR_ROLE = 'ROLE_EDITOR';
    public const ADMIN_ROLE = 'ROLE_ADMIN';
    public const SUPER_ADMIN_ROLE = 'ROLE_SUPER_ADMIN';

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly Security $security
    ) {
        parent::__construct();
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('email')
            ->add('username');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('email')
            ->add('username')
            ->add('roles', 'array')
            ->add('isVerified')
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
        /** @var User|null $user */
        $user = $this->hasSubject() ? $this->getSubject() : null;
        $isNew = null === $user || null === $user->getId();

        $form
            ->add('email')
            ->add('username')
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'required' => $isNew,
                'label' => $isNew ? 'Mot de passe' : 'Nouveau mot de passe (laisser vide pour ne pas changer)',
                'help' => $isNew ? null : 'Laisser vide pour conserver le mot de passe actuel.',
            ])
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Éditeur (pages du site)' => self::EDITOR_ROLE,
                    'Administrateur (contenus)' => self::ADMIN_ROLE,
                    'Super admin (tout)' => self::SUPER_ADMIN_ROLE,
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('isVerified', CheckboxType::class, [
                'required' => false,
            ]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('email')
            ->add('username')
            ->add('roles', 'array')
            ->add('isVerified');
    }

    public function prePersist(object $user): void
    {
        $this->setPassword($user);
    }

    public function preUpdate(object $user): void
    {
        if ($user instanceof User && $this->isCurrentUser($user)) {
            $roles = $this->getForm()->get('roles')->getData() ?? [];

            if (!\in_array(self::SUPER_ADMIN_ROLE, $roles, true)) {
                throw new \RuntimeException('Vous ne pouvez pas retirer le rôle super admin de votre propre compte.');
            }
        }

        $this->setPassword($user);
    }

    public function preRemove(object $user): void
    {
        if ($user instanceof User && $this->isCurrentUser($user)) {
            throw new \RuntimeException('Vous ne pouvez pas supprimer votre propre compte.');
        }
    }

    private function setPassword(object $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        $plainPassword = $this->getForm()->get('plainPassword')->getData();

        if (null !== $plainPassword && '' !== $plainPassword) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));
        }
    }

    private function isCurrentUser(User $user): bool
    {
        $currentUser = $this->security->getUser();

        return $currentUser instanceof User && $currentUser->getId() === $user->getId();
    }
}
