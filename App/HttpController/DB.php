<?php


namespace App\HttpController;


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

}