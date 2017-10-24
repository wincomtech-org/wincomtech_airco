<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class WebModel extends RelationModel{
    //自动连表
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('keywords','require','亲,关键字必须填写'),
        array('title','require','亲,站点名称必须填写'),
        array('title','','站点名称已经存在!',0,'unique'),
        array('description','require','亲,描述必须填写')
        
    );
}