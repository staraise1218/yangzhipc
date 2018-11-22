<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Resource extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    // 行业会展
    public function exhibition(){
        // 轮播图
        $adList = Db::name('ad')
            ->where('ad_position_id', 1)
            ->field('title, image, link')
            ->select();

        $this->assign('adList', $adList);

        // 行业会展
        $list = Db::name('exhibition')
            ->field('id, title, description, createtime')
            ->order('id desc')
            ->paginate(10);

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 行业会展详情
    public function exhibitionDetail(){
        $id = input('id');
        // 行业会展
        $info = Db::name('exhibition')
            ->field('id, title, description, content, createtime')
            ->where('id', $id)
            ->find();

        $this->assign('info', $info);
        return $this->fetch();
    }

    // 重要链接
    public function link(){
        $list = Db::name('link')
            ->field('id, title, description, url')
            ->order('id desc')
            ->paginate(10);

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 工作机会
    public function job(){
        $list = Db::name('job')
            ->order('id desc')
            ->paginate(9);

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 工作机会详情
    public function jobDetail(){
        $id = input('id');
        $info = Db::name('job')
            ->where('id', $id)
            ->find();

        $this->assign('info', $info);
        return $this->fetch();
    }
 }