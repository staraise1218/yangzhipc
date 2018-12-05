<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\library\Token;
use think\Db;

class Project extends Frontend
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

        $projectList = Db::name('project')
            ->where('is_delete', 0)
            ->field('id, title, description, createtime')
            ->limit(10)
            ->page($page)
            ->order('id desc')
            ->select();

    	$this->assign('projectList', $projectList);
    	return $this->fetch();
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

    public function page(){
    	$id = input('id');

    	$info = Db::name('page')
    		->where('id', $id)
    		->find();

    	$this->assign('info', $info);
    	return $this->fetch();
    }

    public function all(){
    	$list = Db::name('project')
    		->where('is_delete', 0)
    		->field('id, title, description, createtime')
    		->order('id desc')
    		->paginate(15);

    	$this->assign('list', $list);
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