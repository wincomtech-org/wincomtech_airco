<?php
    header("Content-type:text/html; charset=utf-8");
//    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('PRC');
    session_start();//开启session
    setcookie(session_name(),session_id(),time()+86400*7);//设置session的生存时间
    define("HUCHUANG","PHP");//定义项目常量,防止恶意调用
return array(
    'URL_MODEL' => 1,  //默认是1  便于SEO  0代表参数写法 如果写成1,那么下面的TP和MB模版参数必须写成__ROOT__.'/Application/Home/View/'而且上传路径修改 __ROOT__/{$resOne.thumb}
    'URL_CASE_INSENSITIVE'  =>  false,
    'DB_PREFIX' => 'huanqiu_', //表前缀
    'DB_FIELDS_CACHE' => false, //不需要缓存字段   把数据库中的表的字段给修改了
    'DB_HOST' => 'localhost', //主机名
    'DB_TYPE' => 'mysql', //nosql oracle mongodb
    'DB_PORT' => '3306', //mysql端口号
    'DB_USER' => 'root', //用户名
    'DB_PWD' => 'root', //密码
    'DB_NAME' => 'airco', //数据库名
    'DB_CHARSET' => 'utf8', //字符集设置
    'SHOW_PAGE_TRACE' =>false,//TP自带的调试Trace
    //tp框架支持很多的模版引擎 smarty 还有 smart
    'TMPL_PARSE_STRING'  => array(
        'TP' =>__ROOT__.'/Application/Home/View/', //模版里面直接写 TP 不需要写成 {TP}
        'MB' => __ROOT__.'/Application/Admin/View/'
    )
);
