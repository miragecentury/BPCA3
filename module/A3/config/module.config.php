<?php

return array(
    'service_manager' => array(
        'invokables' => array(
        //--Mapper:
        "A3\Mapper\User" => "A3\Mapper\UserMapper",
        //--Service:
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'a3_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array ',
                'paths' => array(__DIR__ . '/../src/A3/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'A3\Entity' => 'a3_entities'
                ),
            ),
        ),
    ),
);
