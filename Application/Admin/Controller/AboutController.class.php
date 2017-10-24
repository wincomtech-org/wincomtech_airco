<?php
namespace Admin\Controller;
use Admin\Controller;
class AboutController extends myTopController {
    public function index(){
        $AboutModel=D("About");
        $count      = $AboutModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $AboutModel->order('aid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $AboutModel=D("About");
        if($data=$AboutModel->create()){
            if($_FILES['aimage']['error']!=4) {
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
                    $data['aimage'] = $uploadurl;
                }
            }else{
                $this->error("亲，产品图片没有上传");
            }
            $resid=$AboutModel->add($data);
            if($resid>0){
                $this->success("亲，关于我们添加成功",U('about/index'));
            }else{
                $this->error("亲，关于我们添加失败");
            }
        }else{
            $this->error($AboutModel->getError());
        }
    }
    function views(){
        $AboutModel=D("About");
        $id=intval($_GET['aid']);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->resone=$resone=$AboutModel->where("aid=$id")->find();
        $JourneyModel=D("Journey");
        $this->Journeyarr=$JourneyModel->order("jid asc")->select();
        $this->display();
    }
    function update(){
        $AboutModel=D("About");
        $id=intval($_GET['aid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$AboutModel->where("aid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $AboutModel=D("About");
        $id=intval($_GET['aid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$AboutModel->where("aid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$AboutModel->create()){
            if($_FILES['aimage']['error']!=4) {
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
                    $data['aimage'] = $uploadurl;
                }
            }
            $resid=$AboutModel->save($data);
            if($resid>0){
                $this->success("亲，关于我们更新成功",U('about/index'));
            }else{
                $this->error("亲，关于我们更新失败");
            }
        }else{
            $this->error($AboutModel->getError());
        }
    }
    function delete(){
        $AboutModel=D("About");
        $id=intval($_GET['aid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$AboutModel->where("aid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$AboutModel->delete($id);
        if($resid>0){
            @unlink($resone['aimage']);
            $this->success("亲，关于我们删除成功",U('about/index'));
        }else{
            $this->error("亲，关于我们删除失败");
        }
    }
}