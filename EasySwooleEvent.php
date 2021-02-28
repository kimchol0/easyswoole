<?php


namespace EasySwoole\EasySwoole;


use App\Exception\ExceptionHandler;
use EasySwoole\Component\Di;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class EasySwooleEvent implements Event
{
    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
        //Di::getInstance()->set(SysConst::HTTP_EXCEPTION_HANDLER,[ExceptionHandler::class,'handle']);
    }

    public static function mainServerCreate(EventRegister $register)
    {

    }
    public static function onRequest(Request $request,Response $response):bool
    {

    }
}