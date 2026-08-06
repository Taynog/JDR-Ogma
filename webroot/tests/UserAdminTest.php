<?php

namespace App\Tests;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserAdminTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $em;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->em = self::getContainer()->get(EntityManagerInterface::class);

        $this->em->createQuery('DELETE FROM App\Entity\User u WHERE u.email LIKE :pattern')
            ->setParameter('pattern', '%@test.local')
            ->execute();
    }

    private function createUser(string $email, string $username, array $roles): User
    {
        $hasher = self::getContainer()->get(UserPasswordHasherInterface::class);
        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setRoles($roles);
        $user->setPassword($hasher->hashPassword($user, 'password-123'));
        $user->setIsVerified(true);
        $this->em->persist($user);
        $this->em->flush();

        return $user;
    }

    private function setRoles(\Symfony\Component\DomCrawler\Form $form, array $roles): void
    {
        $roleFields = [];
        $roleValues = [];
        foreach ($form->all() as $name => $field) {
            if (str_contains($name, '[roles]') && $field instanceof \Symfony\Component\DomCrawler\Field\ChoiceFormField) {
                $optionValues = $field->availableOptionValues();
                $roleFields[] = $field;
                $roleValues[] = $optionValues[0] ?? null;
            }
        }
        self::assertNotEmpty($roleFields, 'Champ roles introuvable dans le formulaire.');

        foreach ($roleFields as $field) {
            $field->untick();
        }
        foreach ($roleFields as $i => $field) {
            if (\in_array($roleValues[$i], $roles, true)) {
                $field->tick();
            }
        }
    }

    public function testEditorCannotAccessUserAdmin(): void
    {
        $editor = $this->createUser('editor@test.local', 'Editor', ['ROLE_EDITOR']);
        $this->client->loginUser($editor);

        $this->client->request('GET', '/admin/app/user/list');
        self::assertSame(403, $this->client->getResponse()->getStatusCode());
    }

    public function testSuperAdminCannotDemoteHimself(): void
    {
        $super = $this->createUser('super@test.local', 'Super', ['ROLE_SUPER_ADMIN']);
        $this->client->loginUser($super);

        $crawler = $this->client->request('GET', sprintf('/admin/app/user/%d/edit', $super->getId()));
        $form = $crawler->selectButton('btn_update_and_list')->form();
        $this->setRoles($form, ['ROLE_EDITOR']);

        $this->client->submit($form);
        self::assertStringContainsString(
            'Vous ne pouvez pas retirer le rôle super admin de votre propre compte',
            $this->client->getResponse()->getContent()
        );

        $this->em->clear();
        $fresh = $this->em->getRepository(User::class)->find($super->getId());
        self::assertNotNull($fresh);
        self::assertContains('ROLE_SUPER_ADMIN', $fresh->getRoles());
    }

    public function testSuperAdminCanUpdateRolesOfAnotherUser(): void
    {
        $super = $this->createUser('super2@test.local', 'Super', ['ROLE_SUPER_ADMIN']);
        $editor = $this->createUser('editor2@test.local', 'Editor', ['ROLE_EDITOR']);
        $this->client->loginUser($super);

        $crawler = $this->client->request('GET', sprintf('/admin/app/user/%d/edit', $editor->getId()));
        $form = $crawler->selectButton('btn_update_and_list')->form();
        $this->setRoles($form, ['ROLE_ADMIN']);

        $this->client->submit($form);
        self::assertTrue($this->client->getResponse()->isRedirect());

        $this->em->clear();
        $fresh = $this->em->getRepository(User::class)->find($editor->getId());
        self::assertNotNull($fresh);
        self::assertContains('ROLE_ADMIN', $fresh->getRoles());
        self::assertNotContains('ROLE_EDITOR', $fresh->getRoles());
    }
}
