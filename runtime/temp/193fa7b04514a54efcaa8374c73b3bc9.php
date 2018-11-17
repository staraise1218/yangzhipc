<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"E:\PHPTools\www\yangzhipc\public/../application/index\view\index\index.html";i:1542446355;s:67:"E:\PHPTools\www\yangzhipc\application\index\view\common\header.html";i:1542445262;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo (isset($title) && ($title !== '')?$title:''); ?>-首页</title>
    <?php if(isset($keywords)): ?>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <?php endif; if(isset($description)): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="statics/css/reset.css">
    <link rel="stylesheet" type="text/css" href="statics/css/common.css">
    <link rel="stylesheet" type="text/css" href="statics/css/index.css">
    <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="statics/js/bootstrap.js"></script>

</head>
<body>
    <!-- 顶部菜单 -->
        <header>
        <div class="header_logo">LOGO</div>
        <ul class="header_ul">
            <li class="header_ul_act"><a href="#">首页</a></li>
            <li>
                <a href="#">项目与服务</a>
                <ul class="header_ul_sel">
                    <li><a href="#">培训项目</a></li>
                    <li><a href="#">专业咨询</a></li>
                    <li><a href="#">专业培训</a></li>
                    <li><a href="#">国际商务</a></li>
                    <li><a href="#">参与学习</a></li>
                </ul>
            </li>
            <li>
                <a href="#">学习中心</a>
                <ul class="header_ul_sel">
                    <li><a href="#">培训视频</a></li>
                    <li><a href="#">学习资料</a></li>
                    <li><a href="#">研究进展</a></li>
                    <li><a href="#">行业知识</a></li>
                </ul>
            </li>
            <li>
                <a href="#">资源中心</a>
                <ul class="header_ul_sel">
                    <li><a href="#">行业会展</a></li>
                    <li><a href="#">重要链接</a></li>
                    <li><a href="#">工作机会</a></li>
                    <li><a href="#">合作伙伴</a></li>
                </ul>
            </li>
            <li><a href="#">关于我们</a></li>
            <li><a href="#">联系我们</a></li>
        </ul>
        <div class="header_login">
            <img src="statics/images/icons/login_name.png">
            <a href="#">登录</a> / <a href="#">注册</a>
        </div>
    </header>
    <!-- 轮播图 -->
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <?php if(is_array($adList) || $adList instanceof \think\Collection || $adList instanceof \think\Paginator): if( count($adList)==0 ) : echo "" ;else: foreach($adList as $k=>$item): ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>" <?php echo $k==0?' class="active"' : ''; ?>></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ol>   
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <?php if(is_array($adList) || $adList instanceof \think\Collection || $adList instanceof \think\Paginator): if( count($adList)==0 ) : echo "" ;else: foreach($adList as $k=>$item): ?>
            <div class="item <?php echo $k==0?'active' : ''; ?>">
                <a href="<?php echo !empty($item['link'])?$item['link'] : 'javascript:;'; ?>"><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>"></a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> 
    <!-- 中间主要内容 -->
    <div class="index_flex main">
        <!-- 左边 -->
        <div class="index_l">
            <!-- 新闻展示 -->
            <!-- 标题 -->
            <div class="index_title index_flex">
                <div class="index_title_l">新闻展示</div>
                <a href="#" class="index_title_r">更多 <img class="index_img" src="statics/images/icons/you.png"></a>
            </div>
            <!-- 内容 -->
            <div class="index_content">
                <div class="index_position index_flex">
                    <div class="index_l"><img src="statics/images/img/img_236_136.png"></div>
                    <div class="index_r">
                        <div><a class="index_content_title" href="#">新五丰：前三季度净利下，百分之182全年扭亏无望</a></div>
                        <div class="index_content_div index_small">
                            10月29日，湖南生猪养殖企业新五丰发布2018年三季报显示，其1-9月实现营业收入12.15亿元，同比下降6.28%;净利润为-4345.37万元，同比下降182.61%。
                        </div>
                        <div class="index_content_date index_small">2018-11-06</div>
                    </div>
                </div>
                <ul class="index_content_ul">
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                </ul>
            </div>

            <!-- 热门项目 -->
            <!-- 标题 -->
            <div class="index_title index_flex">
                <div class="index_title_l">热门项目</div>
                <a href="#" class="index_title_r">更多 <img class="index_img" src="statics/images/icons/you.png"></a>
            </div>
            <!-- 内容 -->
            <div class="index_content">
                <div class="index_position index_flex">
                    <div class="index_l"><img src="statics/images/img/img_236_136.png"></div>
                    <div class="index_r">
                        <div><a class="index_content_title" href="#">新五丰：前三季度净利下，百分之182全年扭亏无望</a></div>
                        <div class="index_content_div index_small">
                            10月29日，湖南生猪养殖企业新五丰发布2018年三季报显示，其1-9月实现营业收入12.15亿元，同比下降6.28%;净利润为-4345.37万元，同比下降182.61%。
                        </div>
                        <div class="index_content_date index_small">2018-11-06</div>
                    </div>
                </div>
                <ul class="index_content_ul">
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                </ul>
            </div>
        </div>

        <div class="index_r">
            <!-- 企业宣传片 -->
            <div class="index_flex index_title">
                <div class="index_title_l">企业宣传片</div>
                <a href="#" class="index_title_r">更多 <img class="index_img" src="statics/images/icons/you.png"></a>
            </div>
            <!-- 内容 -->
            <div class="index_content index_position">
                <img src="statics/images/img/img_480_290.png">
                <img class="index_content_start" src="statics/images/icons/start.png">
            </div>

            <!-- 项目推荐 -->
            <!-- 标题 -->
            <div class="index_title index_flex">
                <div class="index_title_l">项目推荐</div>
                <a href="#" class="index_title_r">更多 <img class="index_img" src="statics/images/icons/you.png"></a>
            </div>
            <!-- 内容 -->
            <div class="index_content">
                <div class="index_position index_flex">
                    <div class="index_l"><img src="statics/images/img/img_236_136.png"></div>
                    <div class="index_r">
                        <div><a class="index_content_title" href="#">新五丰：前三季度净利下，百分之182全年扭亏无望</a></div>
                        <div class="index_content_div index_small">
                            10月29日，湖南生猪养殖企业新五丰发布2018年三季报显示，其1-9月实现营业收入12.15亿元，同比下降6.28%;净利润为-4345.37万元，同比下降182.61%。
                        </div>
                        <div class="index_content_date index_small">2018-11-06</div>
                    </div>
                </div>
                <ul class="index_content_ul">
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                    <li><a class="over" href="#">名气源于实力，揭秘双胞胎性价比之王100是什么情况</a> <span class="index_small">2018-09-11</span></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- 底部 -->
    <footer>
        <p>版权所有： **集团有限公司</p>
        <p>
            <img class="footer_img" src="statics/images/icons/beianbgs.png">
            <span>备案号　京ICP证00000000号</span>
            <span>联系电话：010-84187577</span>
        </p> 
    </footer>
    <script type="text/javascript" src="statics/js/common.js"></script>
</body>
</html>