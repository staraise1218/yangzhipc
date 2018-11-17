<?php

namespace app\admin\model\ad;

use think\Model;

class Position extends Model
{
    // 表名
    protected $name = 'ad_position';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [

    ];
    

    







}
