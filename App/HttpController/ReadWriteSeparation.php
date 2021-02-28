<?php


namespace App\HttpController;

use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;
use http\Client\Curl\User;

class ReadWriteSeparation extends Controller
{
    function index()
    {

    }
    /*
     * 外部使用
     * @throws \EasySwoole\Mysqli\Exception\Exception
     * @throws \EasySwoole\ORM\Exception\Exception
     * @throws \Throwable
     */

    public function externalConn()
    {
        $res = Users::create()
            //->conncetion('read',true)
            ->get(19);
        $this->writeJson(200,$res);
    }
}