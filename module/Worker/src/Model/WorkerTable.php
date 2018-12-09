<?php
/**
 * Created by PhpStorm.
 * User: Karolina
 * Date: 2018-12-09
 * Time: 15:32
 */

namespace Worker\Model;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class WorkerTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getWorker($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveWorker(Worker $worker)
    {
        $data = [
            'name' => $worker->name,
            'lastname'  => $worker->lastname,
            'position'  => $worker->position,
        ];

        $id = (int) $worker->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getWorker($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update worker with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteWorker($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}