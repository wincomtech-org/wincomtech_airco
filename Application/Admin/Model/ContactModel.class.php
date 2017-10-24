<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ContactModel extends RelationModel{
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('title','require','亲,公司名称必须填写'),   //用户名必填
        array('title','','公司名称已经存在!',0,'unique'), //验证用户名唯一性 更新必须增加主键隐藏框
        array('hot','require','亲,全国热线必须填写'),
        array('tel','require','亲,电话必须填写'),
        array('address','require','亲,地址必须填写'),
        array('youbian','require','亲,邮编必须填写'),
        array('fax','require','亲,传真必须填写'),
        array('email','require','亲,邮箱必须填写'),
        array('email','email','亲,邮件格式错误!'),
        array('qq','require','亲,qq必须填写!'),
        array('lat','require','亲,经度必须填写!'),
        array('lng','require','亲,纬度必须填写!')
    );

  
}