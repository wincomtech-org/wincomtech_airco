<?php
namespace Admin\Controller;
use Admin\Controller;
class ProductController extends myTopController {
    public function index(){
        $ProductModel=D("Product");
        $count      = $ProductModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $ProductModel->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $ProductModel=D("Product");
        if($data=$ProductModel->create()){
            if($_FILES['productimage']['error']!=4) {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 2 * 1024 * 1024;// 设置附件上传大小
                $upload->exts = array('bmp', 'jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = ''; // 设置附件上传目录    // 上传文件
                $info = $upload->upload();
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    foreach ($info as $file) {
                        $uploadurl = "Uploads/" . $file['savepath'] . $file['savename'];
                    }
                    $data['productimage'] =$uploadurl;
                }
           }else{
                $this->error("亲，产品图片没有上传");
            }
            $resid=$ProductModel->add($data);
            if($resid>0){
                $this->success("亲，产品添加成功",U('product/index'));
            }else{
                $this->error("亲，产品添加失败");
            }
        }else{
            $this->error($ProductModel->getError());
        }
    }
    function views(){
        $ProductModel=D("Product");
        $id=intval($_GET['pid']);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->resone=$resone=$ProductModel->where("pid=$id")->find();
        $this->display();
    }
    function update(){
        $ProductModel=D("Product");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$ProductModel->where("pid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $ProductModel=D("Product");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ProductModel->where("pid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$ProductModel->create()){
            if($_FILES['productimage']['error']!=4) {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 2 * 1024 * 1024;// 设置附件上传大小
                $upload->exts = array('bmp', 'jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = ''; // 设置附件上传目录    // 上传文件
                $info = $upload->upload();
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    foreach ($info as $file) {
                        $uploadurl = "Uploads/" . $file['savepath'] . $file['savename'];
                    }
                    $data['productimage'] =$uploadurl;
                }
            }
            $resid=$ProductModel->save($data);
            if($resid){
                $this->success("亲，产品更新成功",U('product/index'));
            }else{
                $this->error("亲，产品更新失败");
            }
        }else{
            $this->error($ProductModel->getError());
        }
    }
    function delete(){
        $ProductModel=D("Product");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ProductModel->where("pid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$ProductModel->delete($id);
        if($resid>0){
            @unlink($resone['productimage']);
            $this->success("亲，产品删除成功",U('product/index'));
        }else{
            $this->error("亲，产品删除失败");
        }
    }
}