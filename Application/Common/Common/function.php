<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/11/011
 * Time: 20:50
 */
header("Content-type:text/html;charset=UTF-8");
date_default_timezone_set("PRC");
/************换行输出*****************/
function p($a){
    echo '<pre>';
    print_r($a);
    die;
}
/***URL跳转函数***/
function msg($tip,$gotoStr='',$waiting=3){
    if(empty($gotoStr)){
        $gotoStr="history.go(-1);";
    }else{
        $gotoStr="location.href='".$gotoStr."';" ;
    }
    require_once ("msg.php");
    die;
}
/*******************mysql执行函数********************/
function mysql_exec($sql){
    global $link;
    $result=mysqli_query($link,$sql);
    if(is_bool($result)){
        if($result==false){
            require_once("notice.php");
            die;
        }else{
            return $result;
        }
    }else{
        $arr=array();
        while($row=mysqli_fetch_assoc($result)){
            $arr[]=$row;
        }
        return $arr;
    }
}
/**************字符串转数组**********************/
function string2array($data){
    if($data==""){
        return array();
    }else{
        eval("\$array=$data;");
        return $array;
    }
}
/**************数组转字符串******************/
function array2string($data){
    if($data==""){
        return ;
    }else{
        return var_export($data,true);
    }
}
/**
 * 可以统计中文字符串长度的函数
 * @param $str 要计算长度的字符串
 * @param $type 计算长度类型，0(默认)表示一个中文算一个字符，1表示一个中文算两个字符
 *
 */
function abslength($str){
    if(empty($str)){
        return 0;
    }
    if(function_exists('mb_strlen')){
        return mb_strlen($str,'utf-8');
    }else{
        preg_match_all("/./u", $str, $ar);
        return count($ar[0]);
    }
}
function trimall($str){
    $qian=array(" ","　","\t","\n","\r");
    $hou=array("","","","","");
    return str_replace($qian,$hou,$str);
}
/**
 * 中文截取字符串  输入字符串和截取字数，生成带有...的字符串
 * 说明：该函数套用了网友使用在smarty中的内置函数。
 * $string  = 字符串内容
 * $sublen  = 字符串长度
 * @param str $string 字符串
 * @param str $sublen 截取中文字符串的长度
 * @param str $etc 默认为''
 * @return str  截断后的字符串
 **/

function truncate_zh($string, $sublen = 80, $etc = '') {
    $start = 0;
    $code = "UTF-8";
    if ($code == 'UTF-8') {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);

        if (count($t_string[0]) - $start > $sublen)
            return join('', array_slice($t_string[0], $start, $sublen)) . $etc;
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else {
        $start = $start * 2;
        $sublen = $sublen * 2;
        $strlen = strlen($string);
        $tmpstr = '';

        for ($i = 0; $i < $strlen; $i++) {
            if ($i >= $start && $i < ($start + $sublen)) {
                if (ord(substr($string, $i, 1)) > 129) {
                    $tmpstr.= substr($string, $i, 2);
                } else {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if (ord(substr($string, $i, 1)) > 129)
                $i++;
        }
        if (strlen($tmpstr) < $strlen) {
            $tmpstr.= $etc;
        }
        return $tmpstr;
    }
}
/*************转义****************/
function new_addslashes($var){
    if(get_magic_quotes_gpc()){
        return $var;
    }else{
        if(is_array($var)){
            foreach($var as $k=>$v){
                $var[$k]=new_addslashes($v);
            }
        }else{
            $var=addslashes($var);
        }
        return $var;
    }
}
/*************反转义****************/
function new_stripslashes($var){
    if(get_magic_quotes_gpc()){
        return $var;
    }else{
        if(is_array($var)){
            foreach($var as $k=>$v){
                $var[$k]=new_stripslashes($v);
            }
        }else{
            $var=stripslashes($var);
        }
        return $var;
    }
}
/*******************************文件上传***************************/
function upload($fileName,$fileSize,$fileType,$fileDir){
    /*************上传是否成功****************/
    if(!is_uploaded_file($_FILES[$fileName]['tmp_name'])||$_FILES[$fileName]['error']==3||$_FILES[$fileName]['error']==4){
        die("文件上传失败") ;
    }
    /*************文件大小是否合法****************/
    if($_FILES[$fileName]['size']>$fileSize||$_FILES[$fileName]['error']==1||$_FILES[$fileName]['error']==2){
        die("文件过大");
    }
    /*************文件类型是否合法****************/
    $a=pathinfo($_FILES[$fileName]['name']);
    $b=strtolower($a['extension']);
    if(!in_array($b,$fileType)){
        die("文件格式不正确");
    }
    /*************移-动文件****************/
    $newName =time().".".$b;
    if(!file_exists($fileDir)){
        mkdir($fileDir,0777,true);
    }
    $result= move_uploaded_file($_FILES[$fileName]['tmp_name'],$fileDir.'/'.$newName);
    $lujing=$fileDir.'/'.$newName;
    if($result==false){
        die('文件移动失败');
    }else{
        echo '文件上传成功';
        return $lujing;
    }
}
/**********************字段过滤********************/
function mysql_columns($tbname){
    $sql="show columns from $tbname";
    $colu=mysql_exec($sql);
    foreach($colu as $key=>$value){
        if($value['Key']=='PRI'){
            $pri=$value['Field'];
        }else{
            $colArr[]=$value['Field'];
        }
    }
    return array(
        'pri'=>$pri,
        'colArr'=>$colArr
    );
}
/********************增加数据************************/
function mysql_add($tbname,$insertArr){
    $col=mysql_columns($tbname);
    $sql="insert into $tbname set ";
    foreach($insertArr as $k=>$v){
        if(in_array($k,$col['colArr'])){
            $sql .="$k='$v',";
        }
    }
    $sql=substr($sql,0,-1);
    mysql_exec($sql);
    global $link;
    return mysqli_insert_id($link);
}
/********************更新数据************************/
function mysql_update($tbname,$updateArr){
    $col=mysql_columns($tbname);
    $sql="update $tbname set ";
    foreach($updateArr as $k=>$v){
        if(in_array($k,$col['colArr'])){
            $sql .="$k='$v',";
        }
    }
    $sql=substr($sql,0,-1);
    $sql .= " where ".$col['pri']."=".$updateArr[$col['pri']];
    return mysql_exec($sql);
}
/********************查询数据************************/
function mysql_getOne($tbname,$where,$join='',$columns='*'){
    $where=empty($where) ? 1 : $where;
    $sql="select $columns from $tbname $join where $where";
    $findone= mysql_exec($sql);
    $findone=array_pop($findone);
    return $findone;
}
/********************检查数据真实性和有效性************************/
function mysql_checkid($tbname,$id){
    $col=mysql_columns($tbname);
    if ($id <= 0) {
        msg("id有效性有问题");
    }
    $resone = mysql_getOne($tbname,$col['pri']."='$id'");
    if (empty($resone)) {
        msg("id真实性有问题");
    }
    return $resone;
}
/********************数据真删除************************/
function mysql_delete($tbname,$id){
    $col=mysql_columns($tbname);
    $sql="delete from $tbname where ".$col['pri']."='$id'";
    mysql_exec($sql);
    global $link;
    return mysqli_affected_rows($link);
}
/********************打印数据表************************/
function mysql_getAll($tbname,$where='',$order='',$join='',$limit='',$columns="*"){
    $where=empty($where) ? 1 : $where;
    $order=empty($order) ? "" : "order by ".$order;
    $limit=empty($limit) ? "" : "limit $limit";
    $sql="select $columns from $tbname $join where $where $order $limit";
    return mysql_exec($sql);
}
/***********************数据总数***********************/
function mysql_getCount($tbname, $where = '') {
    $where=empty($where) ? 1 : $where;
    $count=mysql_getOne($tbname,$where,$join='',"count(*)");
    $count=intval($count['count(*)']);

    return $count;
}
/******************分页****************/
function mysql_pagination($pageid,$maxpage){
    if(empty($url)){
        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
    if(strstr($url,"pageid")){
        $url=explode("&",$url);
        array_pop($url);
        $url=implode("&",$url);
    }
    if(strstr($url,"?")){
        $a="&";
    }else{
        $a="?";
    }
    $_html='';
    if($maxpage>1){
        $_html .='<a href="'.$url.$a.'pageid=1">首页 </a>&nbsp;&nbsp;';
        $_html .='<a href="'.$url.$a.'pageid='.($pageid-1).'">上一页 </a> &nbsp;&nbsp;';
        $_html .='<a href="'.$url.$a.'pageid='.($pageid+1).'">下一页</a>&nbsp;&nbsp;';
        $_html .='<a href="'.$url.$a.'pageid='.$maxpage.'">末页</a> &nbsp;&nbsp; ';
    }
    return $_html;
}
/***********************分页***********************/
function mysql_pagebar($tbname,$perpage,$where='',$order="",$join='',$columns="*"){
    if(!isset($_GET['pageid'])||empty($_GET['pageid'])||$_GET['pageid']<=0){
        $pageid=1;
    }else{
        $pageid=intval($_GET['pageid']);
    }
    $count=mysql_getCount($tbname, $where);
    $maxpage=ceil($count/$perpage);
    if($pageid>$maxpage){
        $pageid=$maxpage;
    }
    $pagestar=($pageid-1)*$perpage;
    if($pagestar<0){
        $pagestar=0;
    }
    $arr=mysql_getAll($tbname,$where,$order,$join,"$pagestar,$perpage");
    $pagestr=mysql_pagination($pageid,$maxpage);
    return array(
        'arr'=>$arr,
        'pagestr'=>$pagestr
    );
}
function checked_login(){
    if(empty($_SESSION['uid'])){
        msg("亲，请登录",U('users/login'));
    }
    //获取ip地址
    function get_client_ip($type = 0) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}
































