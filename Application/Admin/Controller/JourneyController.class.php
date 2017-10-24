<?php
namespace Admin\Controller;
use Admin\Controller;
class JourneyController extends myTopController {
    public function index(){
        $JourneyModel=D("Journey");
        $count      = $JourneyModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $JourneyModel->order('jid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $JourneyModel=D("Journey");
        if($data=$JourneyModel->create()){
            $resid=$JourneyModel->add($data);
            if($resid>0){
                $this->success("亲，发展历程添加成功",U('Journey/index'));
            }else{
                $this->error("亲，发展历程添加失败");
            }
        }else{
            $this->error($JourneyModel->getError());
        }
    }
    function update(){
        $JourneyModel=D("Journey");
        $id=intval($_GET['jid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$JourneyModel->where("jid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $JourneyModel=D("Journey");
        $id=intval($_GET['jid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$JourneyModel->where("jid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$JourneyModel->create()){
            $resid=$JourneyModel->save($data);
            if($resid>0){
                $this->success("亲，发展历程更新成功",U('journey/index'));
            }else{
                $this->error("亲，发展历程更新失败");
            }
        }else{
            $this->error($JourneyModel->getError());
        }
    }
    function delete(){
        $JourneyModel=D("Journey");
        $id=intval($_GET['jid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$JourneyModel->where("jid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$JourneyModel->delete($id);
        if($resid>0){
            $this->success("亲，发展历程删除成功",U('journey/index'));
        }else{
            $this->error("亲，发展历程删除失败");
        }
    }
}