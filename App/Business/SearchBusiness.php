<?php


namespace App\Business;
use App\Model\Users;
use EasySwoole\Mysqli\QueryBuilder;

class SearchBusiness
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new Users();
    }

    public function testGet()
    {
        //$res = $this->usersModel->get(1);//默认找主键为1的
        //$res = $this->usersModel->get([3]);//找主键为3的
        //$res = $this->usersModel->get(['id'=>2]);//找大于等于2的第一条
        $res = $this->usersModel->get(['id'=>[2,'>']]);//找大于2的第一条
        return $res;
    }

    public function testfindOne()
    {
        $res = $this->usersModel->findOne(2);//查询ID是2的
        return $res;
    }

    public function testAll()
    {
        $res = $this->usersModel->all(['id' =>[1,'>']]); //查询ID大于1(不含1)的所有记录
        return $res;
    }

    public function testSelect()
    {
        $res = $this->usersModel->select(['id'=>[1,'>']]); //查询ID大于1(不含1)的所有记录
        return $res;
    }

    public function testFindAll()
    {
        $res = $this->usersModel->findAll(['id'=>[1,'>']]);//查询ID大于1(不含1)的所有记录
        return $res;
    }

    public function testVal()
    {
        return $this->usersModel->where('id',3)->val('name');//查询ID等于3的name
    }

    public function testScalar()
    {
        return $this->usersModel->where('id',3)->scalar('name');//查询ID等于3的name
    }

    public function testColumn()
    {
        return $this->usersModel->where('id',[1,2,3],'in')->column('name');//查询ID为1,2,3的name
    }

    public function testIndexBy()
    {
        return $this->usersModel->where('id',[3,4,5],'in')->column('id');//查询ID为3,4,5的id
    }

    public function testWhere()
    {
        $res = $this->usersModel::create()->select(function (QueryBuilder $queryBuilder){
            $queryBuilder->where('id',2,'<>');//查询ID不等于2的
        });

        //$res = $this->usersModel::create()->where('id',2,'<>')->select();//查询ID不等于2的
        return $res;
    }
    public function testPage()
    {
        $res = $this->usersModel::create()->limit(0,2)->withTotalCount()->select();
        return $res;
    }

    public function testFindInSet()
    {
        return $this->usersModel::create()->where('find_in_set(?,id)',[3])->get();//查询ID=3的
    }

    public function testWhereOr()
    {
        return $this->usersModel::create()
            ->where('id=3 or id=1')
            ->select();
    }


}