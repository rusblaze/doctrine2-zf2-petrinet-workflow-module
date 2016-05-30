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
    Feature\ConsoleBannerProviderInterface,
    Feature\ConsoleUsageProviderInterface,
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
    public function getConsoleBanner(AdapterInterface $console)
    {
        return 'Petrinet Workflow';
    }

    /**
     * {@inheritDoc}
     */
    public function getConsoleUsage(AdapterInterface $console)
    {
        return array(
            'petrinet <workflowName> --start' => 'Init new workflow case',
            'petrinet <workflowName> --process' => 'Process the workflow case',
            'petrinet <workflowName> --recover [--executionTime=]' => 'Recover long running workitems',

            array('<workflowName>', 'Workflow\'s name to process'),
            array('<executionTime>', 'Time (in minutes) after which the job gets recovered'),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getModuleDependencies()
    {
        return array('DoctrineORMModule', 'SlmQueueDoctrine');
    }
}
