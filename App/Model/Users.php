<?php


namespace App\Model;
use EasySwoole\ORM\AbstractModel;
use EasySwoole\ORM\Utility\Schema\Table;

class Users extends AbstractModel
{
    protected $tableName = 'users';
    protected $connectionName = 'read';//可以在此处定义，也可以在下面的get方法中定义。get方法中为临时定义。本工程中如果将本行去掉会导致default方法未注册错误，原因未知。
    /*
     * 重新get方法
     */
    public function get($where = null,bool $returnAsArray=true)
    {
        $this->connection('read',true);
        return parent::get($where,$returnAsArray); // TODO: Change the autogenerated stub
    }

}