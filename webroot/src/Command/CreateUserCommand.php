<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Crée un utilisateur (et lui attribue éventuellement des rôles d\'administration).'
)]
final class CreateUserCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly UserRepository $userRepository
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Adresse e-mail de l\'utilisateur')
            ->addArgument('username', InputArgument::REQUIRED, 'Nom d\'utilisateur')
            ->addArgument('password', InputArgument::REQUIRED, 'Mot de passe')
            ->addOption('super-admin', null, InputOption::VALUE_NONE, 'Accorde le rôle ROLE_SUPER_ADMIN (accès complet)')
            ->addOption('admin', null, InputOption::VALUE_NONE, 'Accorde le rôle ROLE_ADMIN (tous les contenus, pas les utilisateurs)')
            ->addOption('editor', null, InputOption::VALUE_NONE, 'Accorde le rôle ROLE_EDITOR (pages du site uniquement)')
            ->addOption('verified', null, InputOption::VALUE_NONE, 'Marque le compte comme e-mail vérifié');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $input->getArgument('email');
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        if (null !== $this->userRepository->findOneBy(['email' => $email])) {
            $io->error(sprintf('Un utilisateur avec l\'adresse "%s" existe déjà.', $email));

            return Command::FAILURE;
        }

        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPassword($this->passwordHasher->hashPassword($user, $password));

        $roles = [];
        if ($input->getOption('super-admin')) {
            $roles[] = 'ROLE_SUPER_ADMIN';
        }
        if ($input->getOption('admin')) {
            $roles[] = 'ROLE_ADMIN';
        }
        if ($input->getOption('editor')) {
            $roles[] = 'ROLE_EDITOR';
        }
        $user->setRoles(array_unique($roles));

        $user->setIsVerified($input->getOption('verified'));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success(sprintf('Utilisateur "%s" (%s) créé avec les rôles : %s',
            $username,
            $email,
            [] === $user->getRoles() ? 'ROLE_USER' : implode(', ', $user->getRoles())
        ));

        return Command::SUCCESS;
    }
}
