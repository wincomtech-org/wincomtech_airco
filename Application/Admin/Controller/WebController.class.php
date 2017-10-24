<?php
namespace Admin\Controller;
use Admin\Controller;
class WebController extends myTopController {
    public function index(){
        $WebModel=D("Web");
        $count      = $WebModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $WebModel->order('wid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $WebModel=D("Web");
        if($data=$WebModel->create()){
            $resid=$WebModel->add($data);
            if($resid>0){
                $this->success("亲，站点添加成功",U('web/index'));
            }else{
                $this->error("亲，站点添加失败");
            }
        }else{
            $this->error($WebModel->getError());
        }
    }
    function update(){
        $WebModel=D("Web");
        $id=intval($_GET['wid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$WebModel->where("wid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $WebModel=D("Web");
        $id=intval($_GET['wid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$WebModel->where("wid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$WebModel->create()){
            $resid=$WebModel->save($data);
            if($resid){
                $this->success("亲，站点更新成功",U('web/index'));
            }else{
                $this->error("亲，站点更新失败");
            }
        }else{
            $this->error($WebModel->getError());
        }
    }
    function delete(){
        $WebModel=D("Web");
        $id=intval($_GET['wid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$WebModel->where("wid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$WebModel->delete($id);
        if($resid>0){
            $this->success("亲，站点删除成功",U('web/index'));
        }else{
            $this->error("亲，站点删除失败");
        }
    }
}