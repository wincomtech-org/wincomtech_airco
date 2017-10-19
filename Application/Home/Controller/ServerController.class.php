<?php
namespace Home\Controller;
use Home\Controller;
class ServerController extends TopController {
    public function index(){
        $ServerModel=D("Server");
        $this->Serverarr = $ServerModel->order('sid asc')->limit(1)->select();
        $this->display();
    }
}