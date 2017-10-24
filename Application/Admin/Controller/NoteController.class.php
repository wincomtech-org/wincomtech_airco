<?php
namespace Admin\Controller;
use Admin\Controller;
class NoteController extends myTopController{
    public function index(){
        $NoteModel=D("note");
        $count      = $NoteModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $NoteModel->order('nid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $CategoriesModel=D("Categories");
        $this->arr = $CategoriesModel->order('pid desc')->select();
        $this->display();
    }
    function addTodo(){
        $NoteModel=D("note");
        if($data=$NoteModel->create()){

            $resid=$NoteModel->add($data);
            if($resid>0){
                $this->success("亲，添加成功",U('note/index'));
            }else{
                $this->error("亲，添加失败");
            }
        }else{
            $this->error($NoteModel->getError());
        }
    }
    function update(){
        $CategoriesModel=D("Categories");
        $this->arr = $CategoriesModel->order('pid desc')->select();
        $NoteModel=D("note");
        $id=intval($_GET['nid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$NoteModel->where("nid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $NoteModel=D("note");
        $id=intval($_GET['nid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$NoteModel->where("nid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$NoteModel->create()){
            $result=$NoteModel->save($data);
            if($result){
                $this->success("亲，节点更新成功",U('note/index'));
            }else{
                $this->error("亲，节点更新失败");
            }
        }else{
            $this->error($NoteModel->getError());
        }
    }
    function delete(){
        $NoteModel=D("note");
        $id=intval($_GET['nid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$NoteModel->where("nid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$NoteModel->delete($id);
        if($resid>0){
            $this->success("亲，节点删除成功",U('note/index'));
        }else{
            $this->error("亲，节点删除失败");
        }
    }
}