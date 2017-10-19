<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class ProductModel extends RelationModel{
    //自动连表
    protected $_validate = array(
        // array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('keywords','require','亲,关键字必须填写'),
        array('certificate','require','亲,证书编号必须填写'),
        array('certificate','','证书编号已经存在!',0,'unique'),
        array('title','require','亲,产品名称必须填写'),
        array('title','','产品名称已经存在!',0,'unique'),
        array('num','require','亲,型号必须填写'),
        array('ktype','require','亲,空调类型必须填写'),
        array('wtype','require','亲,冷暖类型必须填写'),
        array('power','require','亲,功率必须填写'),
        array('area','require','亲,适用面积必须填写'),
        array('func','require','亲,工作方式必须填写'),
        array('description','require','亲,产品描述必须填写'),
        array('specification','require','亲,功能规格必须填写')
    );
}