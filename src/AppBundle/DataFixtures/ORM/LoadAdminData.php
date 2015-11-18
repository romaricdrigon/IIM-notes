<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Admin;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class LoadAdminData
 */
class LoadAdminData extends AbstractFixture
{
    use ContainerAwareTrait;

    public function load(ObjectManager $manager)
    {
        // à compléter
        $admin = new Admin();

        // La sauvegarde est différente ici
        $this->container->get('fos_user.user_manager')->updateUser($admin);
    }
}
