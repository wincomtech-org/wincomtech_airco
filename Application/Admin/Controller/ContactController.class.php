<?php
namespace Admin\Controller;
use Admin\Controller;
class ContactController extends myTopController {
    public function index(){
        $ContactModel=D("Contact");
        $count      = $ContactModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $ContactModel->order('cid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $ContactModel=D("Contact");
        if($data=$ContactModel->create()){
            if($_FILES['erweima']['error']!=4) {
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
                        $data['erweima'] = $uploadurl;
                    }
            }else{
                $this->error("亲，二维码图片没上传");
            }
            $resid=$ContactModel->add($data);
            if($resid>0){
                $this->success("亲，联系我们添加成功",U('contact/index'));
            }else{
                $this->error("亲，联系我们添加失败");
            }
        }else{
            $this->error($ContactModel->getError());
        }
    }
    function update(){
        $ContactModel=D("Contact");
        $id=intval($_GET['cid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$ContactModel->where("cid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $ContactModel=D("Contact");
        $id=intval($_GET['cid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ContactModel->where("cid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$ContactModel->create()){
            if($_FILES['erweima']['error']!=4) {
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
                    $data['erweima'] = $uploadurl;
                }
            }
            $resid=$ContactModel->save($data);
            if($resid){
                $this->success("亲，联系我们更新成功",U('contact/index'));
            }else{
                $this->error("亲，联系我们更新失败或没有修改");
            }
        }else{
            $this->error($ContactModel->getError());
        }
    }
    function delete(){
        $ContactModel=D("Contact");
        $id=intval($_GET['cid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ContactModel->where("cid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$ContactModel->delete($id);
        if($resid>0){
            $this->success("亲，联系我们删除成功",U('contact/index'));
        }else{
            $this->error("亲，联系我们删除失败");
        }
    }
}