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
        Di::getInstance()->set(SysConst::HTTP_EXCEPTION_HANDLER,[ExceptionHandler::class,'handle']);
    }

    public static function mainServerCreate(EventRegister $register)
    {
        $processConfig = new Config();
        $processConfig->setProcessName('test1');
        $processConfig->setArg([
            'size'>=3
        ]);
        $obj = new ProcessOne($processConfig);
        try{
            ServerManager::getInstance()->addProcess($obj);
        }catch (\Exception $e){
        }
    }
    public static function onRequest(Request $request,Response $response):bool
    {
        $process = ServerManager::getInstance()->getProcess('test1');
        $process->write('clear');
    }
}