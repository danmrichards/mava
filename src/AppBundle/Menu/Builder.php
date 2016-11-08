<?php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Builder extends ContainerBuilder
{
    public function topMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-top-links navbar-right');

        $dropdown = $menu->addChild(' ', array(
            'icon' => 'bell',
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header.
        $dropdown->addChild('notfications', array('dropdown-header' => true))
            ->setAttribute('divider_append', true);

        // Ceate a dropdown with a caret.
        $dropdown2 = $menu->addChild('', array(
            'icon' => 'user',
            'dropdown' => true,
            'caret' => true,
        ));

        // Create a dropdown header.
        $dropdown2->addChild('Edit Profile', array('route' => 'sonata_user_profile_edit'));
        $dropdown2->addChild('Change Password', array('route' => 'sonata_user_change_password'));
        $dropdown2->addChild('Logout', array('route' => 'sonata_user_security_logout'));

        return $menu;
    }
}