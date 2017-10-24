<?php
namespace Admin\Controller;
use Admin\Controller;
class BlogsController extends myTopController {
    public function index(){
        $BlogsModel=D("Blogs");
        $count      = $BlogsModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $BlogsModel->order('bid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $BlogsModel=D("Blogs");
        if($data=$BlogsModel->create()){
            if($_FILES['blogimage']['error']!=4) {
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
                        $data['blogimage'] = $uploadurl;
                    }
            }else{
                $this->error("亲，新闻图片没上传");
            }
            $resid=$BlogsModel->add($data);
            if($resid>0){
                $this->success("亲，新闻添加成功",U('blogs/index'));
            }else{
                $this->error("亲，新闻添加失败");
            }
        }else{
            $this->error($BlogsModel->getError());
        }
    }
    function views(){
        $BlogsModel=D("Blogs");
        $id=intval($_GET['bid']);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->resone=$resone=$BlogsModel->where("bid=$id")->find();
        $this->display();
    }
    function update(){
        $BlogsModel=D("Blogs");
        $id=intval($_GET['bid']);
        if($id<=0){
            $this->error("亲，新闻的有效性有问题");
        }
        $this->resone=$resone=$BlogsModel->where("bid=$id")->find();
        if(empty($resone)){
            $this->error("亲，新闻的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $BlogsModel=D("Blogs");
        $id=intval($_GET['bid']);
        if($id<=0){
            $this->error("亲，新闻的有效性有问题");
        }
        $resone=$BlogsModel->where("bid=$id")->find();
        if(empty($resone)){
            $this->error("亲，新闻的真实性有问题");
        }
        if($data=$BlogsModel->create()){
            if($_FILES['blogimage']['error']!=4) {
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
                    $data['blogimage'] = $uploadurl;
                }
            }
            $resid=$BlogsModel->save($data);
            if($resid>0){
                $this->success("亲，新闻更新成功",U('blogs/index'));
            }else{
                $this->error("亲，新闻更新失败");
            }
        }else{
            $this->error($BlogsModel->getError());
        }
    }
    function delete(){
        $BlogsModel=D("Blogs");
        $id=intval($_GET['bid']);
        if($id<=0){
            $this->error("亲，新闻的有效性有问题");
        }
        $resone=$BlogsModel->where("bid=$id")->find();
        if(empty($resone)){
            $this->error("亲，新闻的真实性有问题");
        }
        $resid=$BlogsModel->delete($id);
        if($resid>0){
            $this->success("亲，新闻删除成功",U('blogs/index'));
        }else{
            $this->error("亲，新闻删除失败");
        }
    }
}