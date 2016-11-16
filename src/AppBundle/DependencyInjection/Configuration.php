<?php
namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package AppBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('app');

        // Check validity
        $rootNode
            ->children()
            ->arrayNode('params')
            ->children()
            ->integerNode('param_1')->end()
            ->scalarNode('param_2')->end()
            ->end()
            ->end() // params
            ->end();

        # This tree is available in AppExtension.php.
        return $treeBuilder;
    }
}