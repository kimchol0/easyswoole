<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use mysql_xdevapi\Exception;

class Hello extends Controller
{

    function index()
    {

        throw new Exception('ControllerExcption');
    }


    function onException(\Throwable $throwable): void
    {
        var_dump($throwable->getMessage());
    }

    //当请求方法未找到时，自动调用此方法
    protected function actionNotFound(?string $action)
    {
        $class = static::class;
        $this->writeJson(\EasySwoole\Http\Message\Status::CODE_NOT_FOUND,null,"{$class} has not action for {$action}");
    }
}