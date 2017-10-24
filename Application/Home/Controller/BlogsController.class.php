<?php
namespace Home\Controller;
use Home\Controller;
class BlogsController extends TopController {
    function index(){
        $BlogsModel=D("Blogs");
        $count      = $BlogsModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,4);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $BlogsModel->order('bid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->Blogsarr=$list;
        //p($show);
        $this->display();
    }
    public function views(){
        $id=$_GET['bid'];
        $BlogsModel=D("Blogs");
        $list = $BlogsModel->where("bid=$id")->find();
        $this->arr=$list;
        $this->display();
    }
}