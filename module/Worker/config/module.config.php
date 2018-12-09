<?php
/**
 * Created by PhpStorm.
 * User: Karolina
 * Date: 2018-12-09
 * Time: 14:50
 */
namespace Worker;

use Zend\Router\Http\Segment;
//use Zend\ServiceManager\Factory\InvokableFactory;

return [
//    'controllers' => [
//        'factories' => [
//            Controller\WorkerController::class => InvokableFactory::class,
//        ],
//    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'worker' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/worker[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\WorkerController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];