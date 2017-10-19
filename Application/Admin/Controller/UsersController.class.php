<?php
namespace Admin\Controller;
use Admin\Controller;
class UsersController extends myTopController {
    public function index(){
        $UsersModel=D("Users");
        if($_SESSION['uid']==1){
            $count      = $UsersModel->count();// 查询满足要求的总记录数
            $Page       = new \Org\Util\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            // 实例化分页类 传入总记录数和每页显示的条数
            $this->pageStr       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $UsersModel->order('uid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            $list = $UsersModel->where("uid=".$_SESSION['uid'])->select();
        }

        $this->arr=$list;
        $this->display();
    }
    function reg(){
        $this->display();
    }
    function regTodo(){
        $UsersModel=D("Users");
        if($data=$UsersModel->create()){
            $Verify = new \Think\Verify();
            if(!$Verify->check($_POST['code'])){
                $this->error("验证码错误！");
            }
            if($_FILES['avatar']['error']!=4) {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 1 * 1024 * 1024;// 设置附件上传大小
                $upload->exts = array('bmp', 'jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = ''; // 设置附件上传目录    // 上传文件
                $info = $upload->upload();
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    foreach ($info as $file) {
                        $uploadurl = "Uploads/" . $file['savepath'] . $file['savename'];
                    }
                    $data['avatar'] = $uploadurl;
                }
            }
            $resid=$UsersModel->add($data);
            if($resid>0){
                $this->success("亲，用户注册成功",U('users/login'));
            }else{
                $this->error("亲，用户注册失败");
            }
        }else{
        $this->error($UsersModel->getError());
        }
    }
    function login(){
        $this->display();
    }
    function loginTodo(){
        $UsersModel=D("Users");
        $username=I('post.username');
        $password=I('post.password');
        if(empty($username)||empty($password)||empty($_POST['code'])){
            $this->error("亲，用户登录信息填写不完整");
        }
        $findone=$UsersModel->where("username='".$username."'")->find();
        if(empty($findone)){
            $this->error("亲，用户名不存在");
        }
        if(md5($password)!=$findone['password']){
            $this->error("亲，密码不正确");
        }
        $Verify = new \Think\Verify();
        if(!$Verify->check($_POST['code'])){
            $this->error("验证码错误！");
        }
        $_SESSION['uid']=$findone['uid'];
        $_SESSION['username']=$findone['username'];
        $_SESSION['avatar']=$findone['avatar'];
        $_SESSION['rid']=$findone['rid'];
        $this->success("亲，登录成功",U('index/index'));
    }
    function loginOut(){
        unset( $_SESSION['uid']);
        unset( $_SESSION['rid']);
        unset( $_SESSION['username']);
        unset( $_SESSION['avatar']);
        $this->success("亲，注销成功",__ROOT__."/index.php");
    }
    function update(){
        $UsersModel=D("Users");
        $RoleModel=D("Role");
        $this->RoleArr = $RoleModel->order('rid desc')->select();
        $id=intval($_GET['uid']);
        if($id<=0){
            $this->error("亲，用户的有效性有问题");
        }
        $this->resone=$resone=$UsersModel->where("uid=$id")->find();
        if(empty($resone)){
            $this->error("亲，用户的真实性有问题");
        }
        $this->display();
    }
    function updateTodo(){
        $UsersModel=D("Users");
        $id=intval($_GET['uid']);
        if($id<=0){
            $this->error("亲，用户的有效性有问题");
        }
        $this->resone=$resone=$UsersModel->where("uid=$id")->find();
        if(empty($resone)){
            $this->error("亲，用户的真实性有问题");
        }
        if($data=$UsersModel->create()){

        if($_FILES['avatar']['error']!=4){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     1*1024*1024 ;// 设置附件上传大小
            $upload->exts      =     array('bmp','jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath  =      ''; // 设置附件上传目录    // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                foreach($info as $file){
                    $uploadurl = "Uploads/".$file['savepath'].$file['savename'];
                }
                $data['avatar'] = $uploadurl;
            }
        }
        if(empty($data['password'])){
            unset($data['password']);
        }else{
            $data['password']=md5($data['password']);
        }
        $result=$UsersModel->save($data);
            if($result){
                $this->success("亲，用户更新成功",U('users/index'));
            }else{
                $this->error("亲，用户更新失败");
            }
        }else{
            $this->error($UsersModel->getError());
        }
    }
    function delete(){
        $UsersModel=D("Users");
        $id=intval($_GET['uid']);
        if($id<=0){
            $this->error("亲，用户的有效性有问题");
        }
        $resone=$UsersModel->where("uid=$id")->find();
        if(empty($resone)){
            $this->error("亲，用户的真实性有问题");
        }
        $resid=$UsersModel->delete($id);
        if($resid>0){
            @unlink($resone['avatar']);
            $this->success("亲，用户删除成功",U('users/index'));
        }else{
            $this->error("亲，用户删除失败");
        }
    }
    function yzm(){
        ob_clean();//缓冲区不加有时候验证码图片不显示出来
        $config = array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    //忘记密码
    function forgotpassword(){
        $this->display() ;
    }
    function forgotpasswordTodo(){
        $UsersModel=D("Users");
        $email=trim($_POST['email']);
        $username=trim($_POST['username']);
        if(empty($email)||empty($username)){
            $this->error("亲，信息填写不完整");
        }
        $findone=$UsersModel->where("username='$username'")->find();
        if($findone['email']!=$email){
            $this->error("亲，邮箱填写不正确");
        }
        Vendor('Mail.MySendMail','','.class.php');
        $mail=new \MySendMail;
        $mail->setServer("smtp.exmail.qq.com", "xcx@kenuoedu.com", "designphp65531331");
        $mail->setFrom("xcx@kenuoedu.com");
        $mail->setReceiver($email);
        $password=rand(100000,999999);
        $updateArr=array(
            'uid'=>$findone['uid'],
            'password'=>md5($password)
        );
        $UsersModel->save($updateArr);
        $mail->setMailInfo("环球新密码重置", "尊敬 ".$findone['username']." 会员您好,您的新密码为: ".$password." ,请妥善保管好你的新密码,请勿告诉你的团伙!");
        $mail->sendMail();
        $this->success("亲，密码更新成功",U('users/login'));
    }
}