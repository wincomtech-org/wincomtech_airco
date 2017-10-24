<?php
namespace Org\Util;	//命名空间
class Tree{
    var $CategoriesModel;
    var $tbname;
    var $TreeArr;
    function __construct($CategoriesModel,$tbname){
        $this->CategoriesModel=$CategoriesModel;
        $this->tbname=$tbname;
    }
    function get_tree_list($cid=0){
        $arr=$this->CategoriesModel->where("fid=$cid")->select();
        if(!empty($arr)){
            foreach($arr as $k=>$v){
                $this->TreeArr[]=$v;
                $this->get_tree_list($v['cid']);
            }
        }
        return $this->TreeArr;
    }
    function TreeAdd($requreArr){
        $fresone=$this->CategoriesModel->where("cid=".$requreArr['fid'])->find();
        $level=intval($fresone['level']);
        $requreArr['level']=($level+1);
        return $this->CategoriesModel->add($requreArr);
    }
    function Treedelete($id){
        $arr=$this->CategoriesModel->where("fid=$id")->select();
        if(!empty($arr)){
            foreach($arr as $k=>$v){
                $this->CategoriesModel->delete($v['cid']);
                $this->Treedelete($v['cid']);
            }
        }
       return $this->CategoriesModel->delete($id);
    }
    function resetTreeArr(){
        $TreeArr=array();
    }
    function Treeupdate($updateArr){
        $oldlevel=$this->CategoriesModel->where("cid=".$updateArr['cid'])->find();
        $oldlevel=intval($oldlevel['level']);
        $newlevel=$this->CategoriesModel->where("cid=".$updateArr['fid'])->find();
        $newlevel=intval($newlevel['level'])+1;
        $updateArr['level']=$newlevel;
        $result=$this->CategoriesModel->save($updateArr);
        $difflevel=$newlevel-$oldlevel;
        $this->resetTreeArr();
        $TreeArr=$this->get_tree_list($updateArr['cid']);
        if(!empty($TreeArr)){
            foreach($TreeArr as $k=>$v){
                $this->CategoriesModel->execute("update ".$this->tbname." set level=level+".$difflevel." where cid=".$v['cid']);
                $this->get_tree_list($v['cid']);
            }
        }
        return $result;
    }
}