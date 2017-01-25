<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;


class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        for($i=1;$i<=3;$i++){
            $user = new User();

            $user->setUsername('user_'.$i);
            $user->setPlainPassword('pass');
            $user->setEmail('user_'.$i.'@gmail.com');
            $user->setEnabled(true);
            $user->setRoles(["ROLE_USER"]);
            $user->setName('name_'.$i);
            $user->setSurname('surname_'.$i);

            $manager->persist($user);
        }


        $user = new User();

        $user->setUsername('admin');
        $user->setPlainPassword('123');
        $user->setEmail('kretowicz14@gmail.com');
        $user->setEnabled(true);
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setName('Artur');
        $user->setSurname('Piotrowski');

        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}