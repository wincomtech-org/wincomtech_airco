<?php
namespace Home\Controller;
use Home\Controller;
class ContactController extends TopController {
    public function index(){
        $ContactModel=D("Contact");
        $this->Contactarr =$a= $ContactModel->order('cid desc')->limit(1)->select();
        $this->b=(float)$a[0]['lat'];
        $this->c=(float)$a[0]['lng'];
        $this->display();
    }
}