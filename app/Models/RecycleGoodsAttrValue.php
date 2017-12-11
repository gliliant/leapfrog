<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecycleGoodsAttrValue extends Model
{
    //模型关联的表 ，如果命名符合规范可以不定义
    public $table = 'data_recycle_goods_attr';
    //定义主键  , 默认值就是id
    public $primaryKey = 'goods_attr_id';

    // 定义时间戳  larval会自动维护create_at update_at两个表字段，所以如果表中没有这两个字段，一定要关闭自维护
    public $timestamps = false;

    // 不允许批量修改的字段
    public $guarded = [];
}
