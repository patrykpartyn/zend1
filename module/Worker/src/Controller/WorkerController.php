<?php
/**
 * Created by PhpStorm.
 * User: Karolina
 * Date: 2018-12-09
 * Time: 14:53
 */

namespace Worker\Controller;
use Worker\Model\Worker;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Worker\Model\WorkerTable;

class WorkerController extends AbstractActionController
{
    private $table;

    public function __construct(WorkerTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'workers' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        return new ViewModel();

    }

    public function editAction()
    {
        return new ViewModel();

    }

    public function deleteAction()
    {
        return new ViewModel();

    }


}