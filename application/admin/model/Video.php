<?php

namespace app\admin\model;

use think\Model;

class Video extends Model
{
    // 表名
    protected $name = 'video';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'upadatetime_text'
    ];
    

    



    public function getUpadatetimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['upadatetime']) ? $data['upadatetime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setUpadatetimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


}
