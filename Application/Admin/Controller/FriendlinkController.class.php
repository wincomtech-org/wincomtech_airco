<?php
namespace Admin\Controller;
use Admin\Controller;
class FriendlinkController extends myTopController {
    public function index(){
        $FriendlinkModel=D("Friendlink");
        $count      = $FriendlinkModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $FriendlinkModel->order('fid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $FriendlinkModel=D("Friendlink");
        if($data=$FriendlinkModel->create()){
            $resid=$FriendlinkModel->add($data);
            if($resid>0){
                $this->success("亲，友情链接添加成功",U('friendlink/index'));
            }else{
                $this->error("亲，友情链接添加失败");
            }
        }else{
            $this->error($FriendlinkModel->getError());
        }
    }
    function update(){
        $FriendlinkModel=D("Friendlink");
        $id=intval($_GET['fid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$FriendlinkModel->where("fid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $FriendlinkModel=D("Friendlink");
        $id=intval($_GET['fid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$FriendlinkModel->where("fid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$FriendlinkModel->create()){
            $resid=$FriendlinkModel->save($data);
            if($resid){
                $this->success("亲，友情链接更新成功",U('friendlink/index'));
            }else{
                $this->error("亲，友情链接更新失败");
            }
        }else{
            $this->error($FriendlinkModel->getError());
        }
    }
    function delete(){
        $FriendlinkModel=D("Friendlink");
        $id=intval($_GET['fid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$FriendlinkModel->where("fid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$FriendlinkModel->delete($id);
        if($resid>0){
            $this->success("亲，友情链接删除成功",U('friendlink/index'));
        }else{
            $this->error("亲，友情链接删除失败");
        }
    }
}