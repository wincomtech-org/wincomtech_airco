<?php
namespace Admin\Controller;
use Admin\Controller;
class LogoController extends myTopController {
    public function index(){
        $LogoModel=D("logo");
        $count      = $LogoModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $LogoModel->order('lid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
//        p($list);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $LogoModel=D("Logo");
            if($_FILES['logoimage']['error']!=4) {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 1 * 1024 * 1024;// 设置附件上传大小
                $upload->exts = array('bmp', 'jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = ''; // 设置附件上传目录    // 上传文件
                $info = $upload->upload();
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    foreach ($info as $file) {
                        $uploadurl = "Uploads/" . $file['savepath'] . $file['savename'];
                    }
                    $data['logoimage'] = $uploadurl;
                }
            }else{
                $this->error("亲，LOGO没上传");
            }
            $resid=$LogoModel->add($data);
            if($resid>0){
                $this->success("亲，LOGO添加成功",U('logo/index'));
            }else{
                $this->error("亲，LOGO添加失败");
            }
    }
    function views(){
        $LogoModel=D("logo");
        $id=intval($_GET['lid']);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->resone=$resone=$LogoModel->where("lid=$id")->find();
        $this->display();
    }
    function update(){
        $LogoModel=D("logo");
        $id=intval($_GET['lid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$LogoModel->where("lid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $LogoModel=D("Logo");
        $id=intval($_GET['lid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$LogoModel->where("lid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
            if($_FILES['logoimage']['error']!=4){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     1*1024*1024 ;// 设置附件上传大小
                $upload->exts      =     array('bmp','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      ''; // 设置附件上传目录    // 上传文件
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }else{// 上传成功
                    foreach($info as $file){
                        $uploadurl = "Uploads/".$file['savepath'].$file['savename'];
                    }
                    $data['logoimage'] = $uploadurl;
                }
            }
            $result=$LogoModel->where("lid=$id")->save($data);
            if($result){
                $this->success("亲，LOGO更新成功",U('logo/index'));
            }else{
                $this->error("亲，LOGO更新失败");
            }
    }
    function delete(){
        $LogoModel=D("logo");
        $id=intval($_GET['lid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$LogoModel->where("lid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$LogoModel->delete($id);
        if($resid>0){
            @unlink($resone['logoImage']);
            $this->success("亲，LOGO删除成功",U('logo/index'));
        }else{
            $this->error("亲，LOGO删除失败");
        }
    }
}