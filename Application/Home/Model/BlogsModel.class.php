<?php
namespace Home\Model;
use Think\Model\RelationModel;
class BlogsModel extends RelationModel{
    //自动连表
    protected $_link = array(
        'users' => array(
            'mapping_type' => self::BELONGS_TO, //他们的之间 关系  HAS_MANY 一对多关系   BELONGS_TO 多对一关系  HAS_ONE 一对一  这个地方一定要写对 错误  那么自动连表是无法完成的  是一个常量 BELONGS_TO
            'mapping_name'=>'users', //关联的表名
            'class_name' => 'users', //关联的类名
            'foreign_key' => 'uid', //关联的字段
            'mapping_order' => '' , //可不填
            //'mapping_fields' =>'' //关联表的字段,默认全部字段
//            'as_fields' => 'username'  //关联的字段值移动到用户数组中去,只有在BELONGS_TO情况才有用
        ),
        'categories' => array(
            'mapping_type' => self::BELONGS_TO, //他们的之间 关系  HAS_MANY 一对多关系   BELONGS_TO 多对一关系  HAS_ONE 一对一  这个地方一定要写对 错误  那么自动连表是无法完成的  是一个常量 BELONGS_TO
            'mapping_name'=>'categories', //关联的表名
            'class_name' => 'categories', //关联的类名
            'foreign_key' => 'cid', //关联的字段
            'mapping_order' => '' , //可不填
            //'mapping_fields' =>'' //关联表的字段,默认全部字段
//            'as_fields' => 'name'  //关联的字段值移动到用户数组中去,只有在BELONGS_TO情况才有用
        )
    );
}