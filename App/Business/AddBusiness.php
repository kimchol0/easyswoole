<?php


namespace App\Business;


use App\Model\Users;
use EasySwoole\ORM\Tests\ModelCloneCreateTest;

class AddBusiness
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users();
    }

    public function add()
    {
        $this->usersModel->setAttr('name','es');
        $this->usersModel->age = 24;
        $this->usersModel['height'] = 177;
        return $this->usersModel->save();
    }

    public function createAdd()
    {
        return $this->usersModel::create([
            'name'=>'create',
            'age'=> 24,
            'height'=> 177
        ])->save();
    }

    public function dataadd()
    {
        return $this->usersModel::create()->data([
            'name' => 'data',
            'age'=>24,
            'height'=> 177
        ])->save();
    }

    public function adds()
    {
        return $this->usersModel::create()->saveAll([
            [
                'name'=>'data1',
                'age'=>24,
                'height'=>177
            ],
            [
                'name'=>'data2',
                'age'=>24,
                'height'=>177
            ],
        ],true);
    }

}