<?php

namespace KarlitoWeb\Blurp\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class BlurpExtension
 *
 * @package KarlitoWeb\Blurp\DependencyInjection
 * php bin/console debug:container --parameters | grep blurp
 * php bin/console debug:config blurp
 */
class BlurpExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        // Charger les services YAML du bundle
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config')
        );
        $loader->load('services.yaml');

        // Merge + validation de la config venant de config/packages/blurp.yaml
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Exposer en paramètres si besoin
        $container->setParameter('blurp.name', $config['name']);
        $container->setParameter('blurp.color', $config['color']);
        $container->setParameter('blurp.metas', $config['metas']);
        $container->setParameter('blurp.images', $config['images']);
        $container->setParameter('blurp.folders', $config['folders']);
    }
}
