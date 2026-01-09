<?php

namespace KarlitoWeb\Blurp\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package KarlitoWeb\Blurp\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder(): TreeBuilder
	{
        // Le nom acme_hello doit être le même que le root de ta classe Configuration.
		$treeBuilder = new TreeBuilder('blurp');

        $node = $treeBuilder->getRootNode();
        $node
            ->children()
                ->stringNode('name')->isRequired()->cannotBeEmpty()->end()
                ->stringNode('color')->defaultNull()->end()
                ->arrayNode('images')
                    ->children()
                        ->stringNode('avatar')->end()
                    ->end()
                ->end()
                ->arrayNode('metas')
                    ->children()
                        ->stringNode('title')->end()
                        ->stringNode('author')->end()
                        ->stringNode('email')->end()
                        ->stringNode('description')->end()
                        ->stringNode('generator')->end()
                    ->end()
                ->end()
            ->end()
        ;

		return $treeBuilder;
	}
}
