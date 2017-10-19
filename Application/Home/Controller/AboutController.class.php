<?php
namespace Home\Controller;
use Home\Controller;
class AboutController extends TopController {
    public function index(){
        $AboutModel=D("About");
        $this->Aboutarr = $AboutModel->order('aid desc')->limit(1)->select();
        $JourneyModel=D("Journey");
        $this->Journeytarr = $JourneyModel->order('jid asc')->select();
        $this->display();
    }
}