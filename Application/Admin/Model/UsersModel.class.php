<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UsersModel extends RelationModel{
            //自动连表
    protected $_link = array(
    'blogs' => array(
    'mapping_type' => self::HAS_MANY, //他们的之间 关系  HAS_MANY 一对多关系   BELONGS_TO 多对一关系  HAS_ONE 一对一  这个地方一定要写对 错误  那么自动连表是无法完成的  是一个常量 BELONGS_TO
    'mapping_name'=>'blogs', //关联的表名
    'class_name' => 'Blogs', //关联的类名
    'foreign_key' => 'uid', //关联的字段
    'mapping_order' => ''  //可不填
    //'mapping_fields' =>'' //关联表的字段,默认全部字段
    //'as_fields' => ''  //关联的字段值移动到用户数组中去,只有在BELONGS_TO情况才有用
    )
    );
    //自动验证
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('username','require','亲,用户名必须填写'),   //用户名必填
        array('username','','用户名已经存在!',0,'unique'), //验证用户名唯一性 更新必须增加主键隐藏框
        array('username','3,20','用户名长度不符！',0,'length'),   //验证长度[可以验证中文]
        array('password','checkPwd','密码长度不符合规范',0,'callback',1), //最后一个参数1代表新增的时候判断,2代表更新的时候验证,如果不加代表全部情况验证 model类中自定义函数
        array('sex','require','性别必须选择',1),//代表验证条件,默认情况:存在字段就验证,1必须验证,2值不为空的时候验证
        array('email','email','亲,邮件格式错误!'),
        //array('num','number','亲,不是纯数字'),
        //array('username','checkUsername','亲,你的用户名的长度不合法',0,'callback'),  //length
        array('code','require','验证码必须填写！',0), //默认情况下用正则进行验证
        //array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        //array('password','checkPwd','密码不符合规范',0,'function'),    //自定义or内置函数
    );
    //自动完成
//array(完成字段1,完成规则,[完成条件,附加规则])
//第三个参数: 1代表新增数据的时候处理（默认）  2代表更新数据的时候处理  3代表所有情况都进行处理
//md5($password)更新的时候手动处理,不然密码为空的时候自动md5
    protected $_auto = array(
        array('password','md5',1,'function'),  //php的md5加密方法
        array('regtime','time',1,'function')  //PHPtime方法
    );
    
    //自定义函数
    function checkPwd($password){
        if(strlen($password) < 3){
            return false;   //如果符合条件 返回false 报错
        }else{
            return true;
        }
    }
    function checkUsername($username){
        if(strlen($username) < 3 || strlen($username) > 20){
            return false;   //如果符合条件 返回false 报错
        }else{
            return true;
        }
    }
    function checkEmpty($data){
        if(empty($data)){
            return false;
        }else{
            return true;
        }
    }
     

}