<?php
namespace Admin\Controller;
use Admin\Controller;
class IndexController extends myTopController {
    public function index(){
        $VisitModel=D("Visit");
        $time=date("Y-m-d",time());
        $stime=strtotime($time."0:0:0");
        for($i=0;$i<=6;$i++){
            $v=$VisitModel->where("vtime>".($stime-$i*86400)."&&vtime<".($stime-($i-1)*86400))->select();
            $visit[$i]['num']=count($v);
            $visit[$i]['vtime']=($stime-$i*86400);
        }
        $this->visitArr=$x=$visit;
//        p($x);

        $this->display();
    }
    function _empty(){
        $this->error("亲，您输入的网址不正确",__ROOT__."/index.php");
    }
}