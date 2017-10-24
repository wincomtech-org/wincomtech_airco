<?php
namespace Home\Controller;
use Home\Controller;
class ProductController extends TopController {
    public function index(){
        $ProductModel=D("Product");
        $count      = $ProductModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $ProductModel->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->Productarr=$list;
        //p($show);
        $this->display();
    }
    function views(){
        $id=$_GET['pid'];
        $ProductModel=D("Product");
        $this->arr = $ProductModel->where("pid=$id")->find();
        $this->display();
    }
}