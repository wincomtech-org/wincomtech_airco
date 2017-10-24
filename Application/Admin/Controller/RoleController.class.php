<?php
namespace Admin\Controller;
use Admin\Controller;
class RoleController extends myTopController{
    public function index(){
        $RoleModel=D("role");
        $count      = $RoleModel->count();// 查询满足要求的总记录数
        $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        // 实例化分页类 传入总记录数和每页显示的条数
        $this->pageStr       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $RoleModel->order('rid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->arr=$list;
        //p($show);
        $this->display();
    }
    function add(){
        $this->display();
    }
    function addTodo(){
        $RoleModel=D("role");
        if($data=$RoleModel->create()){

            $resid=$RoleModel->add($data);
            if($resid>0){
                $this->success("亲，添加成功",U('role/index'));
            }else{
                $this->error("亲，添加失败");
            }
        }else{
            $this->error($RoleModel->getError());
        }
    }
    function update(){
        $RoleModel=D("role");
        $id=intval($_GET['rid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $this->resone=$resone=$RoleModel->where("rid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $RoleModel=D("role");
        $id=intval($_GET['rid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$RoleModel->where("rid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        if($data=$RoleModel->create()){
            $result=$RoleModel->save($data);
            if($result){
                $this->success("亲，角色更新成功",U('role/index'));
            }else{
                $this->error("亲，角色更新失败");
            }
        }else{
            $this->error($RoleModel->getError());
        }
    }
    function delete(){
        $RoleModel=D("role");
        $id=intval($_GET['rid']);
        if($id<=0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$RoleModel->where("rid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $resid=$RoleModel->delete($id);
        if($resid>0){
            $this->success("亲，角色删除成功",U('role/index'));
        }else{
            $this->error("亲，角色删除失败");
        }
    }
    function set(){
        $id=$_GET['rid'];
        $RoleModel=D("role");
        $this->RoleArr = $RoleModel->where("rid=$id")->find();
        $NoteModel=D("note");
        $this->NoteArr = $NoteModel->select();
        $Categories=D("Categories");
        $this->CategoriesArr = $Categories->select();
        $this->display();
    }
    function setTodo(){
        $RoleModel=D("role");
        $NoteModel=D("note");
        $id=intval($_GET['rid']);
        if($id<0){
            $this->error("亲，ID的有效性有问题");
        }
        $resone=$RoleModel->where("rid=$id")->find();
        if(empty($resone)){
            $this->error("亲，ID的真实性有问题");
        }
        $nids=I("post.nids");
        foreach($nids as $k=>$v){
            $noteone=$NoteModel->where("nid=".$v)->find();
            if(empty($noteone['rids'])){
                $NoteModel->where("nid=".$v)->save(array('rids'=>$id));
            }else{
                $ridsArr=explode(",",$noteone['rids']);
                if(!in_array($id,$ridsArr)){
                    $str=$noteone['rids'].",".$id;
                    $NoteModel->where("nid=".$v)->save(array('rids'=>$str));
                }
            }
        }
        //删除
        $note=$NoteModel->where("find_in_set('".$id."',rids)")->select();
        foreach($note as $key=>$val){
            if(!in_array($val['nid'],$nids)){
                $delArr=explode(",",$val['rids']);
                unset($delArr[array_search($id,$delArr)]);
                $del=implode(",",$delArr);
                $NoteModel->where("nid=".$val['nid'])->save(array('rids'=>$del));
            }
        }
        $this->success("亲，角色配置成功",U('role/index'));
    }
}