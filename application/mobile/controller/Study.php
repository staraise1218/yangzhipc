<?php

namespace app\mobile\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Study extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function knowledgeDetail(){
        $id = input('id');

        $info = Db::name('knowledge')
            ->where('id', $id)
            ->find();

        $this->assign('info', $info);
        return $this->fetch();
    }

    public function knowledgeAll(){
        $page = input('page', 1);

        $list = Db::name('knowledge')
            ->page($page)
            ->limit(10)
            ->select();

        $this->assign('list', $list);
        return $this->fetch();
    }
 }