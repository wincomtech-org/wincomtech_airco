<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller {
    function _empty(){
        $this->error("亲，您输入的网址不正确",__ROOT__."/index.php");
    }
}