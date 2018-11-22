<?php

namespace app\index\controller;

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

    public function index(){
    	// 轮播图
    	$adList = Db::name('ad')
            ->where('ad_position_id', 1)
            ->field('title, image, link')
            ->select();

        


        // 项目列表
    	$now_month = date('Ym');
    	$pre_month = date('Ym', strtotime('-1 month'));
    	$nowMonthProjectList = $this->getMonthProject($now_month);
    	$preMonthProjectList = $this->getMonthProject($pre_month);

    	$this->assign('adList', $adList);
    	$this->assign('now_month', $now_month);
    	$this->assign('pre_month', $pre_month);
    	$this->assign('nowMonthProjectList', $nowMonthProjectList);
    	$this->assign('preMonthProjectList', $preMonthProjectList);
    	return $this->fetch();
    }

    // 研究进展
    public function progress(){
        $list = Db::name('progress')
            ->field('id, title, description, createtime')
            ->limit(4)
            ->order('id desc')
            ->select();

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 研究进展更多
    public function progressAll(){
        $list = Db::name('progress')
            ->field('id, title, description, createtime')
            ->order('id desc')
            ->paginate(15);

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 研究进展详情
    public function progressDetail(){
    	$id = input('id');

    	$info = Db::name('progress')
    		->where('id', $id)
    		->find();

    	$this->assign('info', $info);
    	return $this->fetch();
    }

    // 行业知识
    public function industryKnowledge(){
        $category = Db::name('category')
            ->where('type', 'industry_knowledge')
            ->field('id, name')
            ->select();

        $result = array();
        if(is_array($category) && !empty($category)){
            foreach ($category as $item) {
                $knowledge = Db::name('knowledge')
                    ->where('category_id', $item['id'])
                    ->field('id, title, description, createtime')
                    ->limit(3)
                    ->select();
                if(!empty($knowledge)){
                    $result[] = array(
                        'category_name' => $item['name'],
                        'list' => $knowledge,
                    );
                }
            }
        }

        $this->assign('result', $result);

        return $this->fetch();
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

        $list = Db::name('knowledge')
            ->paginate(15);

        $this->assign('list', $list);
        return $this->fetch();
    }

    // 研究进展更多
    public function video(){
        $category_id = input('category_id', 0);
        $time = input('time');

        $where = array();
        if($category_id) $where['category_id'] = $category_id;
        if($time){
            $start_time = strtotime($time);
            $end_time = $start_time + 3600*24-1;
            $where['createtime'] = array('between', "$start_time, $end_time");
        }

        $category = Db::name('category')
            ->where('type', 'video_type')
            ->field('id, name')
            ->select();

        $list = Db::name('video')
            ->where($where)
            ->field('id, title, thumbimage')
            ->order('id desc')
            ->paginate(1, false, ['query'=>request()->param()]);

        $this->assign('list', $list);
        $this->assign('category_id', $category_id);
        $this->assign('time', $time);
        $this->assign('category', $category);
        return $this->fetch();
    }

    public function videoDetail(){
        $id = input('id');

        $info = Db::name('video')
            ->where('id', $id)
            ->find();

        $isLogin = $this->auth->isLogin();
        $buyed = 0;
        if($isLogin){
            $user_id = $this->auth->id;
            $count = Db::name('video_order')
                ->where('video_id', $id)
                ->where('user_id',$user_id)
                ->count();
            if($count) $buyed = 1;
        }
        // 如果价格为0 则可以看视频
        if($info['price'] == 0) $buyed = 1;

        $this->assign('info', $info);
        $this->assign('buyed', $buyed);
        return $this->fetch();
    }

    // 研究进展更多
    public function ziliao(){
        $category_id = input('category_id', 0);
        $time = input('time');

        $where = array();
        if($category_id) $where['category_id'] = $category_id;
        if($time){
            $start_time = strtotime($time);
            $end_time = $start_time + 3600*24-1;
            $where['createtime'] = array('between', "$start_time, $end_time");
        }

        $category = Db::name('category')
            ->where('type', 'data_type')
            ->field('id, name')
            ->select();

        $list = Db::name('ziliao')
            ->where($where)
            ->field('id, title, thumbimage')
            ->order('id desc')
            ->paginate(1, false, ['query'=>request()->param()]);

        $this->assign('list', $list);
        $this->assign('category_id', $category_id);
        $this->assign('time', $time);
        $this->assign('category', $category);
        return $this->fetch();
    }

    public function ziliaoDetail(){
        $id = input('id');

        $info = Db::name('ziliao')
            ->where('id', $id)
            ->find();

        $isLogin = $this->auth->isLogin();
        $buyed = 0;
        if($isLogin){
            $user_id = $this->auth->id;
            $count = Db::name('ziliao_order')
                ->where('ziliao_id', $id)
                ->where('user_id',$user_id)
                ->count();
            if($count) $buyed = 1;
        }
        // 如果价格为0 则可以看视频
        if($info['price'] == 0) $buyed = 1;

        $this->assign('info', $info);
        $this->assign('buyed', $buyed);
        return $this->fetch();
    }

    // 购买视频
    public function ajaxBuyVideo(){
        $video_id = input('video_id');
        // 检测用户是否登录
        $user_id = $this->auth->id;
        if(!$user_id) die(json_encode(array('status'=>'-1', 'msg'=>'请先登录')));

        // 检测数据是否存在
        $video = Db::name('video')
            ->where('id', $video_id)
            ->find();
        if(empty($video)) die(json_encode(array('status'=>'0', 'msg'=>'数据不存在')));

        // 检测是否已购买
        $count = Db::name('video_order')
            ->where('user_id', $user_id)
            ->where('video_id', $video_id)
            ->count();
        if($count) die(json_encode(array('status'=>'0', 'msg'=>'您已购买')));

        $order_sn = $this->generateOrderSn();
        $data = array(
            'video_id' => $video_id,
            'price' => $video['price'],
            'user_id' => $user_id,
            'order_sn' => $order_sn,
            'createtime' => time(),
        );

        if(Db::name('video_order')->insert($data)){
            die(json_encode(array('status'=>'1', 'msg'=>'购买成功')));
        } else {
            die(json_encode(array('status'=>'0', 'msg'=>'购买失败')));
        }
    }

    // 购买资料
    public function ajaxBuyZiliao(){
        $ziliao_id = input('ziliao_id');
        // 检测用户是否登录
        $user_id = $this->auth->id;
        if(!$user_id) die(json_encode(array('status'=>'-1', 'msg'=>'请先登录')));

        // 检测数据是否存在
        $ziliao = Db::name('ziliao')
            ->where('id', $ziliao_id)
            ->find();
        if(empty($ziliao)) die(json_encode(array('status'=>'0', 'msg'=>'数据不存在')));

        // 检测是否已购买
        $count = Db::name('ziliao_order')
            ->where('user_id', $user_id)
            ->where('ziliao_id', $ziliao_id)
            ->count();
        if($count) die(json_encode(array('status'=>'0', 'msg'=>'您已购买')));

        $order_sn = $this->generateOrderSn();
        $data = array(
            'ziliao_id' => $ziliao_id,
            'price' => $ziliao['price'],
            'user_id' => $user_id,
            'order_sn' => $order_sn,
            'createtime' => time(),
        );

        if(Db::name('ziliao_order')->insert($data)){
            die(json_encode(array('status'=>'1', 'msg'=>'购买成功')));
        } else {
            die(json_encode(array('status'=>'0', 'msg'=>'购买失败')));
        }
    }



    public function generateOrderSn(){
        $order_sn = date('YmdHis').mt_rand(1000, 9999);

        $count = Db::name('video_order')->where('order_sn', $order_sn)->count();
        if($count) $this->generateOrderSn();

        return $order_sn;
    }
 }