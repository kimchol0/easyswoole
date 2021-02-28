<?php


namespace App\HttpController;

use App\Business\SearchBusiness;
use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\ORM\AbstractModel;
use EasySwoole\ORM\Concern\Attribute;

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

}