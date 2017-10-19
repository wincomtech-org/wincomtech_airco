<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends TopController {
    public function index(){
        $BannerModel=D("Banner");
        $this->Bannerarr = $BannerModel->order("bid desc")->limit(4)->select();
        $Ip=  get_client_ip();
        $visitArr['ip']=$Ip;
        $visitArr['vtime']=time();
//        p($visitArr);
        $VisitModel=D("Visit");
        $time=date("Y-m-d",time());
        $stime=strtotime($time."0:0:0");
        $findip=$VisitModel->where("vtime>".$stime."&&vtime<".($stime+86400)."&&ip='".$Ip."'")->select();
        if(empty($findip)){
            $VisitModel->add($visitArr);
        }
       
        $this->display();
    }
}