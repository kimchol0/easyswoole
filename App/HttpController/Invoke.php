<?php


namespace App\HttpController;


use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\ORM\DbManager;

class Invoke extends Controller
{
    function index()
    {
        parent::index(); // TODO: Change the autogenerated stub
    }
    public function invokeMethod()
    {
        DbManager::getInstance()->invoke(function ($client){
            $user = Users::invoke($client)->get(17);
            $user->status = 2;
            $user->update();
        },'read');
    }
}