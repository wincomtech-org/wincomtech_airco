<?php
namespace Admin\Controller;
use Think\Controller;
class myTopController extends Controller {
    public function __construct(){
        parent::__construct();

        $sql1 = "select * from ".C('DB_PREFIX')."note  where find_in_set('".$_SESSION['rid']."',rids)";
        $nav= D('Note')->query($sql1);
        foreach ($nav as $k=>$v){
            $controller[]=$v['controllername'];
            $pid[]=$v['pid'];
        }
        $controller=array_unique($controller);
        $controller=implode(',',$controller);
        $pid=array_unique($pid);
        $pid=implode(',',$pid);
        if(empty($pid)){
            $pid=0;
        }
        $CategoriesModel=D('Categories');
        $plist=$CategoriesModel->where("pid in ($pid)")->select();
        foreach ($plist as $kk=>$vv){
            $pname[]=$vv['pname'];
        }
        $pname=implode(',',$pname);

        $this->pname=$p=$pname;
//        p($pname);
        $this->nav=$a=$controller;

        $sql = "select * from ".C('DB_PREFIX')."note  where find_in_set('".CONTROLLER_NAME."',controllername) && find_in_set('".ACTION_NAME."',actionname) && find_in_set('".$_SESSION['rid']."',rids)";
        $findOne = D('Note')->query($sql);
        $allow= array('reg','regTodo','login','loginTodo','views','loginOut','yzm','forgotpassword','forgotpasswordTodo');
        if(CONTROLLER_NAME!='Index' && !in_array(ACTION_NAME,$allow) && empty($findOne)){$this->error('亲,您还没有权限');}
        $allow_login= array('reg','reTodo','login','loginTodo','yzm','forgotpassword','forgotpasswordTodo');
        if(!in_array(ACTION_NAME,$allow_login) && empty($_SESSION['uid'])){
            $this->error("亲，请登录",U('users/login'));
        }
        $this->controller=strtolower(CONTROLLER_NAME);
    }
    function _empty(){
        $this->error("亲，您输入的网址不正确",__ROOT__."/index.php");
    }
}