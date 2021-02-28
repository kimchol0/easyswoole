<?php


namespace App\HttpController;


use App\Model\Users;
use App\Model\Goods;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\QueryBuilder;
use EasySwoole\ORM\DbManager;

class Trans extends Controller
{
    function index()
    {

    }
    /*
     * 订单：用户买一瓶矿泉水需要 库存减1 用户消费总额增加3
     */
    public function example()
    {
        //开启事务
        DbManager::getInstance()->startTransaction('read');
        echo '事务开启.............................'.PHP_EOL;
        //库存-1
        Goods::create()->update(['num'=>QueryBuilder::dec(1)],['id'=>1]);
        echo '库存-1'.PHP_EOL;
        //用户消费总额-3
        $upUserResult = Users::create()->update(['total'=>QueryBuilder::inc(3)],['id'=>17]);
        echo '用户消费总额-3'.PHP_EOL;
        if ($upUserResult){
            echo '回滚'.PHP_EOL;
            //回滚
            DbManager::getInstance()->rollback('read');
        }
        //关闭事务
        DbManager::getInstance()->commit('read');
        echo '事务关闭'.PHP_EOL;
    }
}