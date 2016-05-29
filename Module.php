<?php

namespace Petrinet;

use Zend\Loader;
use Zend\Console\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature;

/**
 * Petrinet
 */
class Module implements
    Feature\ConfigProviderInterface,
    Feature\DependencyIndicatorInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getModuleDependencies()
    {
        return array('DoctrineORMModule');
    }
}
