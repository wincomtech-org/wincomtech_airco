<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class RoleModel extends RelationModel{
    //自动验证
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('rname','require','亲,角色名称须填写'),   //用户名必填
        array('rname','','角色名称已经存在!',0,'unique'), //验证用户名唯一性 更新必须增加主键隐藏框
    );
    
}