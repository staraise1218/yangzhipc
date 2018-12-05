<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Contact extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        $info = Db::name('page')
            ->where('id', 6)
            ->find();

        $this->assign('info', $info);
        return $this->fetch();
    }
 }