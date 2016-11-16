<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class AppExtension
 * @package AppBundle\DependencyInjection
 */
class AppExtension extends Extension {

    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container) {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // The Tree in Configuration.php.
        // $config = array('param_1' => 123, 'param2' => 'Bar')

        $loader = new YamlFileLoader($container,
            new FileLocator(array(__DIR__ . '/../Resources/config'))
        );
        $loader->load('config.yml');

        // Add Mava class to /var/cache/[ENV]/classes.php
        $this->addClassesToCompile(array(
            'AppBundle\\Util\\Mava'
        ));
    }
}