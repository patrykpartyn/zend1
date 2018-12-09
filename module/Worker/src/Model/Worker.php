<?php
/**
 * Created by PhpStorm.
 * User: Karolina
 * Date: 2018-12-09
 * Time: 15:30
 */
namespace Worker\Model;

class Worker
{
    public $id;
    public $name;
    public $lastname;
    public $position;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->lastname  = !empty($data['lastname']) ? $data['lastname'] : null;
        $this->position = !empty($data['position']) ? $data['position'] : null;
    }

}