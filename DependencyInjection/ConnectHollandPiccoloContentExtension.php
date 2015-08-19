<?php

namespace ConnectHolland\PiccoloContentBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * This is the class that loads and manages thebundle configuration
 */
class ConnectHollandPiccoloContentExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $bundles = $container->getParameter('kernel.bundles');
		// Fancy up the block output
		// @todo re-add this
//        if (isset($bundles['CmfCreateBundle'])) {
//            $blockLoader = $container->getDefinition('connectholland_piccolocontent.block.content');
//            $blockLoader->addMethodCall('setTemplate', array('CmfBlockBundle:Block:block_simple_createphp.html.twig'));
//        }
    }
}
