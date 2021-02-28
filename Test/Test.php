<?php

/*
 * 链式操作如何实现的
 */
class Test
{
    private $where;
    private $order;
    public $sql;
    private $result;
    public static function create()
    {
        return new Test();
    }
    public function where($where) : Test
    {
        $this ->where = $where;
        return $this;
    }
    public function order($order) : Test
    {
        $this ->order = $order;
        return $this;
    }
    public function select()
    {
        $this->sql = "select * from table where {$this->where} order by {$this->order}";
        $this->result = ['result'];
        return $this;

    }

}

$res = Test::create()->where('id=18')->order('id')->select();
var_dump($res->sql);