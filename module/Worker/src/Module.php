<?php
/**
 * Created by PhpStorm.
 * User: Karolina
 * Date: 2018-12-09
 * Time: 14:47
 */
namespace Worker;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\WorkerTable::class => function($container) {
                    $tableGateway = $container->get(Model\WorkerTableGateway::class);
                    return new Model\WorkerTable($tableGateway);
                },
                Model\WorkerTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Worker());
                    return new TableGateway('worker', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\WorkerController::class => function($container) {
                    return new Controller\WorkerController(
                        $container->get(Model\WorkerTable::class)
                    );
                },
            ],
        ];
    }
}