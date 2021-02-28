<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\Controller;
use mysql_xdevapi\Exception;

class Hello extends Controller
{

    function index()
    {
        throw new Exception('控制器级别的异常处理');
    }

    protected function onException(\Throwable $throwable): void
    {
        var_dump('控制器级别');
        var_dump($throwable->getMessage());
        //注意，当控制器级别和全局级别都开启时，异常到了控制器级别之后就不再往全局级别上面抛了。
    }

    //当请求方法未找到时，自动调用此方法
    protected function actionNotFound(?string $action)
    {
        $class = static::class;
        $this->writeJson(\EasySwoole\Http\Message\Status::CODE_NOT_FOUND,null,"{$class} has not action for {$action}");
    }
}