<?php

namespace app\admin\model;

use think\Model;

class Ad extends Model
{
    // 表名
    protected $name = 'ad';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [

    ];
    

    

    
    public function adPosition()
    {
        return $this->belongsTo('AdPosition', 'ad_position_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
    







}
