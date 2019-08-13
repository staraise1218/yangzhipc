<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $adList = Db::name('ad')
            ->where('ad_position_id', 'in', [1, 3])
            ->field('title, image, link')
            ->select();

        foreach ($adList as $item) {
            // 轮播图
            if($item['ad_position_id'] == 1) $bannerList[] = $item;
            // 合作伙伴
            if($item['ad_position_id'] == 3) $parterList[] = $item;
        }

        // 行业知识
        $knowledge = Db::name('knowledge')->order('id desc')->limit(5)->select();
        // 热门项目
        $project = Db::name('project')->where('is_delete', 0)->order('id desc')->limit(5)->select();
         // 行业知识
        $exhibition = Db::name('exhibition')->order('id desc')->limit(5)->select();
        // 

        $this->assign('bannerList', $bannerList);
        $this->assign('parterList', $parterList);
        $this->assign('knowledge', $knowledge);
        $this->assign('project', $project);
        $this->assign('exhibition', $exhibition);
        return $this->view->fetch();
    }

}
