<?php

include_once '../vendor/autoload.php';
use Swoole\Coroutine as co;

go (function(){
    $chan = new co\Channel(12);

    $wait = new \EasySwoole\Component\WaitGroup();

    //并发查询数据，将数据push到channel
    for ($i=1;$i<=12;$i++){
        $wait->add();
        go(function () use ($wait,$chan,$i){
            co::sleep(rand(1,3));
            $chan->push('第($i)个月的数据！');
            $wait->done();
        });
    }

    $wait->wait();

    //将channel中的数据都拿出来输出到文件
    while (true){
        if ($chan->isEmpty()){
            break;
        }
        $res = $chan->pop();
        error_log($res.PHP_EOL,3,'channel.log');
    }
    error_log('--------------------'.PHP_EOL,3,'channel.log');
});