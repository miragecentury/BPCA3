<?php

return array(
    'router' => array(
        'routes' => array(
            'home_login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'AppPlayer\Controller\Authentification',
                        'action' => 'login',
                    ),
                ),
            ),
            'home_logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'AppPlayer\Controller\Authentification',
                        'action' => 'logout',
                    ),
                ),
            ),
            'home_inscription' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/inscription',
                    'defaults' => array(
                        'controller' => 'AppPlayer\Controller\Authentification',
                        'action' => 'inscription',
                    ),
                ),
            ),
            'home_connected' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/gamehub[/:controller[/:action]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'AppPlayer\Controller\Index',
                        'action' => 'index'
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
        ),
        'invokables' => array(
            //--Mapper:
            "BPC\Authentication\Adapter\BPCAdapter" => "BPC\Authentication\Adapter\BPCAdapter",
        //--Service:
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'AppPlayer\Controller\Index' => 'AppPlayer\Controller\IndexController',
            'AppPlayer\Controller\Authentification' => 'AppPlayer\Controller\AuthentificationController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout_gamehub' => __DIR__ . '/../view/layout/layout_gamehub.phtml',
            'layout/layout_login' => __DIR__ . '/../view/layout/layout_login.phtml',
            'layout/layout_gamehub_part_inbox' => __DIR__ . '/../view/layout/part/part_gamehub_inbox.phtml',
            'layout/layout_gamehub_part_menuleft' => __DIR__ . '/../view/layout/part/part_gamehub_menuleft.phtml',
            'layout/layout_gamehub_part_notification' => __DIR__ . '/../view/layout/part/part_gamehub_notification.phtml',
            'layout/layout_gamehub_part_todo' => __DIR__ . '/../view/layout/part/part_gamehub_todo.phtml',
            'layout/layout_gamehub_part_user' => __DIR__ . '/../view/layout/part/part_gamehub_user.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'appplayer_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array ',
                'paths' => array(__DIR__ . '/../src/AppPlayer/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'AppPlayer\Entity' => 'appplayer_entities'
                )
            )
        ),
    ),
);
