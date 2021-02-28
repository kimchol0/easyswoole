<?php


namespace App\HttpController;

use App\Task\TaskTemp;
use Easyswoole\EasySwoole\Task\TaskManager;
use EasySwoole\Http\AbstractInterface\Controller;
use Swoole\Coroutine;

class task extends Controller
{
    function index()
    {

    }
    public function async()
    {
        TaskManager::getInstance()->async($this->asyncStart(),$this->asyncFinish());
        echo '完成'.PHP_EOL;
    }
    private function asyncStart(){
        return function (){
            Coroutine::sleep(3);
            echo time().'异步任务开始执行'.PHP_EOL;
        };
    }
    private function asyncFinish(){
        return function (){
            echo time().'异步任务执行完成'.PHP_EOL;
        };
    }
    public function sync()
    {
        TaskManager::getInstance()->sync(function (){
            echo time().'同步任务开始执行'.PHP_EOL;
            Coroutine::sleep(1);
        });
        echo '完成'.PHP_EOL;
    }

    public function taskTemp()
    {
        TaskManager::getInstance()->async(new TaskTemp());
        echo '任务模板执行完成'.PHP_EOL;
    }

}