<?php
namespace Home\Controller;
use Think\Controller;
class TopController extends Controller {
    public function __construct(){
        parent::__construct();
        //站点管理
        $WebModel=D("Web");
        $this->Webarr = $WebModel->order("wid desc")->limit(1)->select();
        //Logo
        $LogoModel=D("Logo");
        $this->Logoarr = $LogoModel->order("lid desc")->limit(1)->select();
        //产品中心
        $ProductModel=D("Product");
        $this->Productarr = $ProductModel->order('pid asc')->limit(24)->select();
        //关于环球
        $AboutModel=D("About");
        $this->Aboutarr = $AboutModel->order('aid desc')->limit(1)->select();
        //新闻资讯
        $BlogsModel=D("Blogs");
        $this->Blogsarr = $BlogsModel->order('bid desc')->limit(4)->select();
        //联系我们
        $ContactModel=D("Contact");
        $this->Contactarr = $ContactModel->order('cid desc')->limit(1)->select();
        //联系我们
        $FriendlinkModel=D("Friendlink");
        $this->Friendlinkarr = $FriendlinkModel->order('fid desc')->select();
        $this->controller=CONTROLLER_NAME;
    }
    function _empty(){
        $this->error("亲，您输入的网址不正确",__ROOT__."/index.php");
    }
}