<?php


namespace App\Exception;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;

class ExceptionHandler
{
    public static function handle( \Throwable $exception, Request $request, Response $response )
    {
        var_dump('全局异常处理');
        var_dump($exception->getMessage());
    }
}