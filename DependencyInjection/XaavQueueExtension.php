<?php

namespace Xaav\QueueBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class XaavQueueExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
    	$configuration = new Configuration();
    	$config = $this->processConfiguration($configuration, $configs);
    	$config['adapter']['options']['service_container'] = new Reference('service_container');

    	$adapter = new Definition($config['adapter']['class']);
    	$adapter->setArguments(array($config['adapter']['options']));

    	$container->setDefinition('xaav.queue.adapter', $adapter);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}