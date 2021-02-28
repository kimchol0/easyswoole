<?php


namespace App\HttpController;

use App\Business\AddBusiness;
use App\Business\SearchBusiness;
use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\QueryBuilder;
use EasySwoole\ORM\AbstractModel;
use EasySwoole\ORM\Concern\Attribute;
use http\Client\Curl\User;

class DB extends Controller
{
    function db1()
    {
        $usersModel = new Users();
        $res = $usersModel->schemaInfo()->getColumns();
        $this->writeJson(200,$res);
    }

    //添加
    public function add()
    {
        $res = Users::create([
            'name'=>'huizhang',
            'age'=>'24'
        ])->save();
        $this->writeJson(200,$res);
    }

    //更新
    function update()
    {
        $res = Users::create()
            ->get(5)
            ->update([
                'name'=>'huizhang678'
            ]);
        $this->writeJson(200,$res);
    }

    public function search()
    {
        $searchBusiness = new SearchBusiness();

        //查询一行
        //$result = $searchBusiness->testGet();
        //$result = $searchBusiness->testfindOne();
        //查询多行
        //$result = $searchBusiness->testAll();
        //$result = $searchBusiness->testSelect();
        //$result = $searchBusiness->testFindAll();
        //多种传参方式
        //$result = $searchBusiness->testWhere();
        //分页
        //$result = $searchBusiness->testPage();
        $this->writeJson(200,$result);
    }

    function quickSeaarch()
    {
        $searchBusiness = new SearchBusiness();

        //查询单行指定字段值
        //$result = $searchBusiness->testVal();
        //$result = $searchBusiness->testScalar();
        //查询多行指定字段值
        //$result = $searchBusiness->testColumn();
        //$result = $searchBusiness->testIndexBy();
        $this->writeJson(200,$result);
    }

    function specialSearch()
    {
        $searchBusiness = new SearchBusiness();

        //find_in_set
        //$result = $searchBusiness->testFindInSet();//查询ID=3的

        //复杂where or
        $result = $searchBusiness->testWhereOr();

        $this->writeJson(200,$result);
    }

    public function add1()
    {
        $AddBusiness = new AddBusiness();
        //$result = $AddBusiness->add();//新增一条
        //$result = $AddBusiness->createAdd();//数组方式create插入
        //$result = $AddBusiness->dataadd();//数组方式data插入
        $result = $AddBusiness->adds();//批量插入
    }
    public function delByModel()
    {
        $usersModel = new Users();
        $user = $usersModel->get(1);
        $res = $user->destroy();
        $this->writeJson(200,$res);
    }

    public function delById()
    {
        $usersModel = new Users();
        $res = $usersModel->destroy(2);
        $this->writeJson(200,$res);
    }

    public function delByWhere()
    {
        $usersModel = new Users();
        //$res = $usersModel->destroy(['id'>=3]);
        //$res = $usersModel->where('id',4)->destroy();
        $res = $usersModel->destroy(function (QueryBuilder $builder){
            $builder->where('id',5);
        });
        $this->writeJson(200,$res);
    }
    public function delAll()
    {
        $usersModel = new Users();
        $res = $usersModel->destroy(null,true);
        $this->writeJson(200,$res);
    }
    public function updateOne()
    {
        $user = Users::create()->get(17);
        $user->name = 'one';
        $res = $user->update();
        $this->writeJson(200,$res);
    }
    public function updateMulti()//批量更新
    {
        $res = Users::create()->update(
            [
                'name'=>'multi'
            ],
            [
                'id'=>['20','>']
            ]
        );
        $this->writeJson(200,$res);
    }
    public function updateFaster() //凡是ID大于10的height字段都自增1
    {
        $res = Users::create()->update(
            [
                'height'=>QueryBuilder::inc(1)
            ],
            ['id'=>['10','>']]
        );
        $this->writeJson(200,$res);
    }

    public function updateRows()//凡是ID大于10的name全都改成rows
    {
        $users = Users::create();
        $users->update(
            [
                'name'=>'rows'
            ],
            [
                'id'=>['10','>']
            ]
        );
        $res = $users->lastQueryResult()->getAffectedRows();
        $this->writeJson(200,$res);
    }
}