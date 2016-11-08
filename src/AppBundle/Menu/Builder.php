<?php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Build the top menu.
     *
     * @param FactoryInterface $factory
     *   Menu building factory.
     * @param array $options
     *   Array of menu options.
     *
     * @return \Knp\Menu\ItemInterface
     *   The constructed menu.
     */
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
        $dropdown2->addChild('Edit Profile', array('route' => 'fos_user_profile_edit'));
        $dropdown2->addChild('Change Password', array('route' => 'fos_user_change_password'));
        $dropdown2->addChild('Logout', array('route' => 'fos_user_security_logout'));

        return $menu;
    }

    /**
     * Build the sidebar menu.
     *
     * @param FactoryInterface $factory
     *   Menu building factory.
     * @param array $options
     *   Array of menu options.
     *
     * @return \Knp\Menu\ItemInterface
     *   The constructed menu.
     */
    public function sideMenu(FactoryInterface $factory, array $options)
    {
        // Menu will be a navbar menu anchored to right
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('id', 'side-menu');
        $menu->setChildrenAttribute('class', 'nav');

        // Create a dropdown with a caret
        $menu->addChild('Dashboard', array(
            'icon' => 'dashboard',
            'route' => 'dashboard_index'
        ));

        // Create a dropdown header
        $dropdown = $menu->addChild('Project', array(
            'icon'  => 'tasks',
            'dropdown' => true,
            'caret' => true,
        ));

        $dropdown->setChildrenAttribute('class', 'nav nav-second-level');

        // Get the list of projects.
        $em = $this->container->get('doctrine')->getManager();
        $projects = $em->getRepository('AppBundle:Project')->findAll();

        // Add a link for each project.
        foreach ($projects as $project) {
            $dropdown->addChild($project->getTitle(), array(
                'route' => 'project_show',
                'routeParameters' => array('id' => $project->getId()),
            ));
        }

        $menu->addChild('Team', array(
            'icon' => 'thumbs-up',
            'uri'  => '#',
        ));

        return $menu;
    }
}