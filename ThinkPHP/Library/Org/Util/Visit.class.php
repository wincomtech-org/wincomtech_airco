<?php
namespace Org\Util;	//命名空间
class Visit{
    var $VisitModel;
    var $tbname;
    function __construct($VisitModel,$tbname){
        $this->VisitModel=$VisitModel;
        $this->tbname=$tbname;
    }
    function visitAdd($requreArr){
        $findone=$this->VisitModel->where("username='".$_SESSION['username']."'")->find();
        if (empty($findone)){
            $this->VisitModel->add($requreArr);
        }else{
            $this->VisitModel->execute("update ".$this->tbname." set vitime=".time()." where vid=".$findone['vid']);
        }
    }
    function get_visit_list(){
        $time=date("Y-m-d",time());
        $stime=strtotime($time."0:0:0");
        $view=array();
        $this->view['arr']=$this->VisitModel->order("vitime desc")->where("vitime>".$stime."&&vitime<".($stime+86400))->select();
        $this->view['num']=$this->VisitModel->where("vitime>".$stime."&&vitime<".($stime+86400))->count();
       return $this->view;
    }
}