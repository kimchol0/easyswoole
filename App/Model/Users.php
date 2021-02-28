<?php


namespace App\Model;
use EasySwoole\ORM\AbstractModel;
use EasySwoole\ORM\Utility\Schema\Table;

class Users extends AbstractModel
{
    protected $tableName = 'users';
    protected $connectionName = 'write';
    protected $autoTimeStamp = true;
    protected $createTime = 'create_at';
    protected $updateTime = 'update_at';

    public function schemaInfo(bool $isCache = true): Table
    {
        $table = new Table($this->tableName);
        $table->colInt('id')->setIsPrimaryKey();
        $table->colVarChar('name',255);
        $table->colInt('age');
        $table->colInt('create_at');
        $table->colInt('update_at');
        return $table;
    }
}