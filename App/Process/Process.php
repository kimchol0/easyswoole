<?php
namespace App\Process;

use EasySwoole\Component\Process\AbstractProcess;
use Swoole\Process;

class CustomProcess extends AbstractProcess
{

    private $data = [];

    protected function run($arg)
    {
        //接收参数
        $size = $arg['size'];
        go(function () use ($size){
            while (true){
                //写入数据
                $this->data[] = 'EasySwoole';
                //判断>参数则进行报警
                if (count($this->data)>$size){
                    echo '报警邮件提示'.PHP_EOL;
                }
                var_dump(count($this->data));
                //sleep
                Coroutine::sleep(1);
            }
        });
    }

    protected function onPipeReadable(Process $process)
    {
        // 该回调可选
        // 当主进程对子进程发送消息的时候 会触发
        $command = $process->read();
        switch ($command){
            case 'clear':
                $this->data = [];
                break;
            default:
                echo '命令非法';
        }
    }

    protected function onException(\Throwable $throwable, ...$args)
    {
        // 该回调可选
        // 捕获 run 方法内抛出的异常
        // 这里可以通过记录异常信息来帮助更加方便地知道出现问题的代码
    }

    protected function onShutDown()
    {
        // 该回调可选
        // 进程意外退出 触发此回调
        // 大部分用于清理工作
    }

    protected function onSigTerm()
    {
        // 当进程接收到 SIGTERM 信号触发该回调
    }
}