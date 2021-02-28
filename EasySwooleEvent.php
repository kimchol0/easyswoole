<?php


namespace EasySwoole\EasySwoole;


use App\Exception\ExceptionHandler;
use EasySwoole\Component\Di;
use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\Http\Request;
use EasySwoole\Http\Response;
use MongoDB\Driver\Manager;
use EasySwoole\ORM\DbManager;
use EasySwoole\ORM\Db\Config;
use EasySwoole\ORM\Db\Connection;
use EasySwoole\HotReload\HotReloadOptions;
use EasySwoole\HotReload\HotReload;

class EasySwooleEvent implements Event
{
    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
        //Di::getInstance()->set(SysConst::HTTP_EXCEPTION_HANDLER,[ExceptionHandler::class,'handle']);
    }

    public static function mainServerCreate(EventRegister $register)
    {
        $hotReloadOptions = new HotReloadOptions();
        $hotReload = new HotReload($hotReloadOptions);
        $hotReloadOptions->setMonitorFolder([EASYSWOOLE_ROOT.'/App']);

        $server = ServerManager::getInstance()->getSwooleServer();
        $hotReload->attachToServer($server);

        //读库配置
        $config = (new Config())
            ->setDatabase('es') //数据库名
            ->setUser('root') //用户名
            ->setPassword('htgCXtd1!') //密码
            ->setHost('localhost') //地址
            ->setPort(3306) //端口
            ->setCharset('utf8') //编码
            ->setTimeout(10) //超时时间
            ->setFetchMode(false) //fetch类型
            ->setStrictType(false) //mysql 严格模式
            ->setIntervalCheckTime(3) //连接池检测间隔
            ->setExtraConf([]) //额外配置信息
            ->setGetObjectTimeout(3.0) //连接池的超时时间
            ->setMaxIdleTime(15) //连接池对象最大闲置时间
            ->setMaxObjectNum(20) //连接池最大数量
            ->setMinObjectNum(5); //连接池最小数量
        DbManager::getInstance()->addConnection(new Connection($config),'read');

        //写库配置
        $config = (new Config())
            ->setDatabase('es') //数据库名
            ->setUser('root') //用户名
            ->setPassword('htgCXtd1!') //密码
            ->setHost('localhost') //地址
            ->setPort(3306) //端口
            ->setCharset('utf8') //编码
            ->setTimeout(10) //超时时间
            ->setFetchMode(false) //fetch类型
            ->setStrictType(false) //mysql 严格模式
            ->setIntervalCheckTime(3) //连接池检测间隔
            ->setExtraConf([]) //额外配置信息
            ->setGetObjectTimeout(3.0) //连接池的超时时间
            ->setMaxIdleTime(15) //连接池对象最大闲置时间
            ->setMaxObjectNum(20) //连接池最大数量
            ->setMinObjectNum(5); //连接池最小数量
        DbManager::getInstance()->addConnection(new Connection($config),'write');
    }
    public static function onRequest(Request $request,Response $response):bool
    {

    }
}