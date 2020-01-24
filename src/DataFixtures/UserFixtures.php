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
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
// Création d'utilisateur pour dev env
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('test');
        $user->setPassword($this->encoder->encodePassword($user, '1234'));
        $user->setRoles(array('ROLE_ADMIN'));

        $manager->persist($user);

        $manager->flush();
    }
}
