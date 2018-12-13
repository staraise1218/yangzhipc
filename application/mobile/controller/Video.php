<?php

namespace app\mobile\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Video extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index(){

        $page = input('page', 1);

        $offset = 10; // 每页显示条数
        $count = Db::name('video')->where('is_delete', 0)->count();
        $pages = ceil($count/$offset);

        $list = Db::name('video')
            ->where('is_delete', 0)
            ->field('id, title, thumbimage, description, createtime')
            ->order('id desc')
            ->page($page)
            ->limit($offset)
            ->select();

        if(is_array($list) && !empty($list)){
            foreach ($list as &$item) {
                $item['createtime'] = date('Y-m-d', $item['createtime']);
            }
        }

    	if(request()->isPost()){
            die(json_encode(array('list' => $list, 'pages' => $pages)));
        } else {
            $this->assign('list', $list);
            return $this->fetch();
        }
    }

    public function detail(){
    	$id = input('id');

    	$info = Db::name('project')
    		->where('id', $id)
    		->where('is_delete', 0)
    		->find();

    	$this->assign('info', $info);
    	return $this->fetch();
    }
    
    public function enroll(){
    	$project_id = input('project_id');

    	if($this->request->isPost()){
    		$params = input('post.');
    		if(Db::name('project_enroll')->insert($params)){
    			die(json_encode(array('status'=>1, 'msg'=>'报名成功')));
    		} else {
    			die(json_encode(array('status'=>0, 'msg'=>'报名失败')));
    		}
    	}
    	$this->assign('project_id', $project_id);
    	return $this->fetch();
    }
 }