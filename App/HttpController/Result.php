<?php


namespace App\HttpController;

use App\Model\Users;
use EasySwoole\ORM\Exception\Exception;
use EasySwoole\Http\AbstractInterface\Controller;
use Throwable;

class Result extends Controller
{
    function index()
    {

    }

    /*
     * 模型结果-以获取总数为例
     * @throws \EasySwoole\ORM\Exception\Exception
     * @throws \Throwable
     */

    public function modelResult()
    {
        $user = Users::create();
        $user->where('id',[18,19],'in')->withTotalCount()->all();
        $lastResult = $user->lastQueryResult();
        $res = $lastResult->getTotalCount();
        $this->writeJson(200,$res);
    }

    /*
     * 连贯操作
     * @throws \EasySwoole\Mysqli\Exception\Exception
     * @throws \EasySwoole\ORM\Exception\Exception
     * @throws \Throwable
     */
    public function chainOperation()
    {
        /*
         * $user = Users::create();
         * $user->where();
         * $user->order();
         * $user->all();
         * 以上四句相当于
         * Users::create()->where()->order()->all();
         */
        $user = Users::create()->where('id',[17,18],'in')->all();
        $this->writeJson(200,$user);
    }

    /*
     * 最后执行的SQL语句
     * @throws \EasySwoole\Mysqli\Exception\Exception
     * @throws \EasySwoole\ORM\Exception\Exception
     * @throws \Throwable
     */
    public function lastSql()
    {
        $user = Users::create();
        $user->all([17,18]);
        $res = $user->lastQuery()->getLastQuery();
        $this->writeJson(200,$res);
    }
}