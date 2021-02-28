<?php


namespace App\Model;
use EasySwoole\ORM\AbstractModel;

class Goods extends AbstractModel
{
    protected $tableName = 'goods';
    protected $connectionName = 'read';
}