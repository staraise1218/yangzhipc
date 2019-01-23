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
        $user_id = $this->auth->id;

    	$id = input('id');

    	$info = Db::name('video')
    		->where('id', $id)
    		->where('is_delete', 0)
    		->find();

        $is_buyed = 0;
        if($info['price'] == 0){
            $is_buyed = 1;
        } else {
            if($user_id){
                $count = Db::name('video_order')->where('user_id', $user_id)
                    ->where('video_id', $id)
                    ->where('paystatus', 1)
                    ->count();
                $is_buyed = $count > 0 ? 1 : 0;
            } else {
                $is_buyed = 0;
            }
        }

        $this->assign('info', $info);
        $this->assign('is_buyed', $is_buyed);
    	return $this->fetch();
    }

    public function submitOrder(){
        $video_id = input('video_id');
        $user_id = $this->auth->id;

        if($user_id == '') die(json_encode(array('code'=>400, 'msg'=>'请先登录')));

        // 检测数据是否存在
        $video = Db::name('video')
            ->where('id', $video_id)
            ->find();
        if(empty($video)) die(json_encode(array('code'=>400, 'msg'=>'数据不存在')));

        // 检测是否已购买
        $count = Db::name('video_order')
            ->where('user_id', $user_id)
            ->where('video_id', $video_id)
            ->count();
        if($count) die(json_encode(array('code'=>400, 'msg'=>'您已购买')));

        $order_sn = $this->generateOrderSn();
        $data = array(
            'video_id' => $video_id,
            'price' => $video['price'],
            'user_id' => $user_id,
            'order_sn' => $order_sn,
            'createtime' => time(),
        );

        if(Db::name('video_order')->insert($data)){
            $resultData = array(
                'order_sn' => $order_sn,
            );
            die(json_encode(array('code'=>200, 'msg'=>'下单成功')));
        } else {
            die(json_encode(array('code'=>400, 'msg'=>'下单失败')));
        }
    }


    public function generateOrderSn(){
        $order_sn = date('YmdHis').mt_rand(1000, 9999);

        $count = Db::name('video_order')->where('order_sn', $order_sn)->count();
        if($count) $this->generateOrderSn();

        return $order_sn;
    }
 }