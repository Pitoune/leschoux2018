<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $passwordEncoder;

    /**
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager): void
    {
        $admin = $this->createUser('admin', 'admin', 'admin@email.com', ['ROLE_ADMIN']);
        $manager->persist($admin);

        $user = $this->createUser('pierre', 'pierre', 'pierre@email.com');
        $manager->persist($user);

        $manager->flush();
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $email
     * @param array  $roles
     *
     * @return User
     */
    protected function createUser(string $username, string $password, string $email, array $roles = ['ROLE_USER']): User
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setEmail($email);
        $user->setRoles($roles);
        $password = $this->passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);

        return $user;
    }
}
