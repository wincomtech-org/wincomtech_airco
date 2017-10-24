<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class NoteModel extends RelationModel{
    //自动验证
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('nname','require','亲,节点名称须填写'),   //用户名必填
        array('nname','','节点名称已经存在!',0,'unique'), //验证用户名唯一性 更新必须增加主键隐藏框
        array('controllername','require','亲,节点控制器须填写'),
        array('actionname','require','亲,节点方法器须填写'),
        array('pid','require','亲,分类必须选择')
    );
    
}