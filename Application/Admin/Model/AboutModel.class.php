<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class AboutModel extends RelationModel{
    //自动连表
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('story','require','亲,品牌故事必须填写'),
        array('philosophy','require','亲,品牌理念必须填写')
    );

}