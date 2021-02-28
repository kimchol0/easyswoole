<?php


namespace App\HttpController;


use App\Model\Users;
use EasySwoole\Http\AbstractInterface\Controller;

class Aggr extends Controller
{
    function index()
    {

    }
    /*
     * 最大值
     */
    public function max()
    {
        $res = Users::create()->where('id',10,'>')->get()->max('total');
        $this->writeJson(200,$res);
    }
    /**
     * 最小值
     */
    public function min()
    {
        $res = Users::create()->where('id',18,'>')->get()->min('total');
        $this->writeJson(200,$res);
    }
    /*
     * 总数
     */
    public function count()
    {
        $res = Users::create()->where('id',18,'>')->get()->count('total');
        $this->writeJson(200,$res);
    }
    /*
     * 平均值
     */
    public function avg()
    {
        $res = Users::create()->where('id',18,'>')->get()->avg('total');
        $this->writeJson(200,$res);
    }
    /*
     *
     */
    public function sum()
    {
        $res = Users::create()->where('id',18,'>')->get()->sum('total');
        $this->writeJson(200,$res);
    }
}