<?php
/**
 * Created by PhpStorm.
 * User: a1ku
 * Date: 3/17/14
 * Time: 10:01 PM
 */

namespace Acard\BackendBundle\DataFixtures\ORM;



use Acard\BackendBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setUsername('admin');
        $user->setSuperAdmin(true);
        $user->setSalt(md5(uniqid()));
        $user->setEmail('aleksander.tarraro@gmail.com');
        $user->setEnabled(true);

        /** @var $encoder EncoderFactory */
        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
        ;
        $user->setPassword($encoder->encodePassword('passw0rd', $user->getSalt()));

        $manager->persist($user);
        $manager->flush();
    }
}