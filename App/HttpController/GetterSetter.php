<?php


namespace App\HttpController;


use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;
use http\Client\Curl\User;

class GetterSetter extends Controller
{
    protected $tableName = 'users';
    protected $connectionName = 'read';
    function index()
    {

    }
    /*
     * 获取器
     */
    public function getter()
    {
        $res = Users::create()->where('id',[17,18],'in')->all();
        $this->writeJson(200,$res);
    }

    /*
    * 获取器
    */
    public function setter()
    {
        $user = Users::create()->get(17);
        $user->name='张三';
        $user->update();
    }
}