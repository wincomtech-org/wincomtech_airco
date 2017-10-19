<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class JourneyModel extends RelationModel{
    //自动连表
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('contents','require','亲,发展历程必须填写')
    );

}