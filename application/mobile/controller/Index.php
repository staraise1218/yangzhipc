<?php

namespace app\mobile\controller;

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
            ->where('ad_position_id', 2)
            ->field('title, image, link')
            ->select();

        // 行业知识
        $knowledge = Db::name('knowledge')->order('id desc')->limit(3)->select();
        // 热门项目
        $project = Db::name('project')->where('is_delete', 0)->order('id desc')->limit(4)->select();
         // 培训视频
        $video = Db::name('video')->where('is_delete', 0)->order('id desc')->select(2);

        $this->assign('adList', $adList);
        $this->assign('knowledge', $knowledge);
        $this->assign('project', $project);
        $this->assign('video', $video);
        // $this->assign('', $);
        return $this->view->fetch();
    }

}
