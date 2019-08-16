<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class About extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        // 轮播图
        $bannerList = Db::name('ad')
            ->where('ad_position_id', 1)
            ->field('title, image, link')
            ->select();

        $info = Db::name('page')
            ->where('id', 5)
            ->find();

        $this->assign('bannerList', $bannerList);
        $this->assign('info', $info);
        return $this->fetch();
    }

    public function member(){
        $info = Db::name('page')
            ->where('id', 8)
            ->find();

        $this->assign('info', $info);
        return $this->fetch();
    }
 }