<?php


namespace App\HttpController;


use EasySwoole\Http\AbstractInterface\AbstractRouter;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use FastRoute\RouteCollector;

class Router extends AbstractRouter
{
    function initialize(RouteCollector $routeCollector)
    {
        /*
          * eg path : /router/index.html  ; /router/ ;  /router
         */
        #$routeCollector->get('/router','/test');
        /*
         * eg path : /closure/index.html  ; /closure/ ;  /closure
         */
        #$routeCollector->get('/closure',function (Request $request,Response $response){
        #    $response->write('this is closure router');
            //不再进入控制器解析
        #    return false;
        $routeCollector->get('/test','/Hello/index/');
        $routeCollector->get('/async','/task/async');
        $routeCollector->get('/File','/File/');
        $routeCollector->get('/db1','/DB/db1');
        $routeCollector->get('/add','/DB/add');
        $routeCollector->get('/update','/DB/update');
        $routeCollector->get('/search','/DB/search');
        $routeCollector->get('/quickSeaarch','/DB/quickSeaarch');
        $routeCollector->get('/specialSearch','/DB/specialSearch');
        $routeCollector->get('/add1','/DB/add1');
        $routeCollector->get('/delByModel','/DB/delByModel');
        $routeCollector->get('/delById','/DB/delById');
        $routeCollector->get('/delByWhere','/DB/delByWhere');
        $routeCollector->get('/delAll','/DB/delAll');
        $routeCollector->get('/updateOne','/DB/updateOne');
        $routeCollector->get('/updateMulti','/DB/updateMulti');
        $routeCollector->get('/updateFaster','/DB/updateFaster');
        $routeCollector->get('/updateRows','/DB/updateRows');
        $routeCollector->get('/modelResult','/Result/modelResult');
        $routeCollector->get('/chainOperation','/Result/chainOperation');
        $routeCollector->get('/lastSql','/Result/lastSql');
        $routeCollector->get('/externalConn','/ReadWriteSeparation/externalConn');
        $routeCollector->get('/max','/Aggr/max');
        $routeCollector->get('/min','/Aggr/min');
        $routeCollector->get('/count','/Aggr/count');
        $routeCollector->get('/avg','/Aggr/avg');
        $routeCollector->get('/sum','/Aggr/sum');
        $routeCollector->get('/example','/Trans/example');
        $routeCollector->get('/getter','/GetterSetter/getter');
        $routeCollector->get('/setter','/GetterSetter/setter');
        $routeCollector->get('/invokeMethod','/Invoke/invokeMethod');
    }
}