<?php
namespace Admin\Controller;
use Admin\Controller;
class CategoriesController extends myTopController{
    public function index(){
        $CategoriesModel=D("categories");
        $list = $CategoriesModel->order('pid desc')->select();
        $this->arr=$list;
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $CategoriesModel=D("categories");
        if($data=$CategoriesModel->create()){
            $resid=$CategoriesModel->add($data);
            if($resid>0){
                $this->success("亲，添加成功",U('categories/index'));
            }else{
                $this->error("亲，添加失败");
            }
        }else{
            $this->error($CategoriesModel->getError());
        }
    }
    function delete(){
        $CategoriesModel=D("categories");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，分类的有效性有问题");
        }
        $findone=$CategoriesModel->where("pid=$id")->find();
        if(empty($findone)){
            $this->error("亲，分类的真实性有问题");
        }
        $resid=$CategoriesModel->delete($id);
        if($resid>0){
            $this->success("亲，删除成功",U('categories/index'));
        }else{
            $this->error("亲，删除失败");
        }
    }
    function update(){
        $CategoriesModel=D("categories");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，分类的有效性有问题");
        }
        $this->resone=$findone=$CategoriesModel->where("pid=$id")->find();
        if(empty($findone)){
            $this->error("亲，分类的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $CategoriesModel=D("categories");
        $id=intval($_GET['pid']);
        if($id<=0){
            $this->error("亲，分类的有效性有问题");
        }
        $findone=$CategoriesModel->where("pid=$id")->find();
        if(empty($findone)){
            $this->error("亲，分类的真实性有问题");
        }
        if($data=$CategoriesModel->create()){
            $result=$CategoriesModel->save($data);
            if($result){
                $this->success("亲，分类更新成功",U('categories/index'));
            }else{
                $this->error("亲，分类更新失败");
            }
        }else{
            $this->error($CategoriesModel->getError());
        }
    }
}