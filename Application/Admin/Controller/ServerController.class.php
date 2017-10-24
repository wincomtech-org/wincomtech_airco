<?php
namespace Admin\Controller;
use Admin\Controller;
class ServerController extends myTopController {
    public function index(){
        $ServerModel=D("Server");
        $count      = $ServerModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $ServerModel->order('sid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
//        p($list);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $ServerModel=D("Server");
        if (empty($_POST['contents'])){
            $this->error("亲，服务和支持不能为空");
        }
        $resid=$ServerModel->add($_POST);
        if($resid>0){
            $this->success("亲，服务和支持添加成功",U('server/index'));
        }else{
            $this->error("亲，服务和支持添加失败");
        }
    }
    function views(){
        $ServerModel=D("Server");
        $id=intval($_GET['sid']);
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->resone=$resone=$ServerModel->where("sid=$id")->find();
        $this->display();
    }
    function update(){
        $ServerModel=D("Server");
        $id=intval($_GET['sid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$ServerModel->where("sid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $ServerModel=D("Server");
        $id=intval($_GET['sid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ServerModel->where("sid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
            $result=$ServerModel->where("sid=$id")->save($_POST);
            if($result){
                $this->success("亲，服务和支持更新成功",U('server/index'));
            }else{
                $this->error("亲，服务和支持更新失败");
            }
    }
    function delete(){
        $ServerModel=D("Server");
        $id=intval($_GET['sid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$ServerModel->where("sid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$ServerModel->delete($id);
        if($resid>0){
            $this->success("亲，服务和支持删除成功",U('server/index'));
        }else{
            $this->error("亲，服务和支持删除失败");
        }
    }
}