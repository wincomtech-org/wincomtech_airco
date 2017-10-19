<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class BlogsModel extends RelationModel{
    //自动连表
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('title','require','亲,新闻标题必须填写'),   //用户名必填
        array('title','','新闻标题已经存在!',0,'unique'), //验证用户名唯一性 更新必须增加主键隐藏框
        array('contents','require','亲,新闻内容必须填写')
    );
    //自动完成
//array(完成字段1,完成规则,[完成条件,附加规则])
//第三个参数: 1代表新增数据的时候处理（默认）  2代表更新数据的时候处理  3代表所有情况都进行处理
//md5($password)更新的时候手动处理,不然密码为空的时候自动md5
    protected $_auto = array(
        array('createtime','time',1,'function')
    );
}