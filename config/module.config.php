<?php
namespace Petrinet;

return [
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Model'],
            ],
            'orm_default' => [
                'drivers' => [
                     __NAMESPACE__ . '\Model' =>  __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];
