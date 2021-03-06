<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>转发</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <!-- <link href="/project/media/Public/css/bootstrap.min.css" rel="stylesheet"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css" media="all">
</head>
<style>
    * {
        padding: 0;
    }

    body,
    html {
        background-color: #f7f9fb;
        min-width: 1375px;
    }


    ul li {
        list-style-type: none;
    }

    i {
        font-style: normal;
    }
    .icon-house {
        font-family: "iconfont" !important;
        color: #a6a8ad;
        font-size: 24px;
        left: 40px;
        line-height: 50px;
        top: 0;
    }

    .icon {
        font-family: "iconfont" !important;
        font-style: normal;
        color: #52ade2;
        font-size: 20px;
    }

    .icon-bianji {
        position: absolute;
        right: 5%;
        color: #707070;
    }
  
    /* 头部 */
    .header {
        width: 100%;
        height: 72px;
        border-bottom: 1px solid #e9e9e9;
    }

    .header .top_first {
        width: 1100px;
        height: 70px;
        background-color: #fff;
        margin-left: 20%;
        display: inline-flex;
        align-items: center;
        border-bottom: 4px solid #3cb9ac;
    }

    .header .top_first .lxznlogo{
        font-size: 60px;
        padding: 0 10px;
    }

    .header .top_first .lxzntt {
        font-size: 24px;
    }

    .header .top_first .top_main {
        display: inline-flex;
        padding: 0 50px 0 686px;
        position: relative;
    }

    .header .top_first .top_main .information_num {
        width: 18px;
        height: 18px;
        background-color: #fc6f53;
        border-radius: 50%;
        position: absolute;
        right: 43px;
        top: -5px;
        text-align: center;
        color: #fff;
    }

    .header .top_first .sculpture {
        display: inline-flex;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        border: 1px solid #dcdcdc;
        justify-content: center;
        align-items: center;
        margin-right: 16px;
    }

    .header .top_first .sculpture i {
        font-size: 28px;
    }

    .header .top_first .share .sharett {
        text-align: center;
        border-radius: 10px;
        border: 1px solid #143371;
        color: #143371;
        margin-top: 10px;
    }

    .header .top_first .share {
        position: relative;
    }

    .header .top_first .share a {
        font-size: 16px;
        color: #666;
        text-decoration: none;
    }

    .header .top_first .share .triangle-down {
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 10px solid #999;
        position: absolute;
        right: -40%;
        top: 22px;
    }

  
  

    /* 左侧导航栏 */
    .container {
        padding-left: 20%;
        margin-top: 1px;
    }

    .container .container_left {
        width: 200px;
        display: inline-block;
        vertical-align: top;
    }

    .container .container_left ul {
        background-color: #32363f;
    }

    .container .container_left ul li {
        padding: 6px 0 6px 37px;
        border-top: 2px solid #3b404c;
        border-bottom: 2px solid #2b2e37;
    }

    .container .container_left ul li>a {
        color: #a6a8ad;
        display: inline-block;
        width: 100%;
        font-size: 18px;
        text-decoration: none;
    }

    .container .container_left .firstpage:hover {
        color: #3db9ac;
    }

    .container_left .menu {
        padding-left: 45px;
    }

    .container_left .menu a {
        display: flex;
        padding: 10px 0;
        color: #f7f9ff;
        font-size: 14px;
        text-decoration: none;
    }

    .container_left .menu a:hover {
        color: #3cb9ac;
    }

    .container .container_left li span {
        margin-left: 10px;
    }
   
  
/*................*/

    .content {
        width: 870px;
        border: 1px solid #eee;
        border-top-color: #fff;
        background-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 24px;
        margin-bottom: 30px;
       
    }

    .content .content_all {
        display: flex;
        flex-wrap: nowrap;
        height: 65px;
        border-bottom: 1px solid #e1e1e1;
        position: relative;
        padding-left: 25px;
        line-height: 100px;

    }

    .content .content_all div>a {
        font-size: 17px;
        color: #232323;
        text-decoration: none;
        margin: 0 42px 0 0;
    }

    .content .content_all .transform span {
        width: 38px;
        height: 3px;
        background-color: #3db9ac;
        position: absolute;
        bottom: 0;
        right: 36px;
      
    }

    .content .content_all .collection {
        position: relative;
    }

    #infostyle {
        position: absolute;
        top: 40px;
        left: 50%;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background-color: red;
        /* display: none; */
    }

    /* 消息总计 */

    .allinformation .allinformation_number {
        padding: 20px 0 5px 25px;
        font-size: 16px;
        color: #111;

    }

    /* 粉丝转发部分 */

    .contentitem {
        padding: 0 0 20px 0;
    }

    .contentitem .usercomment {
        padding: 20px 10px 10px 25px;
        border-bottom: 1px solid #e1e1e1;
        position: relative;
    }

    .contentitem .usercomment img {
        width: 40px;
        height: 40px;
        margin-right: 15px;
        border-radius: 50%;
        margin-top: -30px;
    }

    .contentitem .commentcontent {
        display: inline-block;
        width: 80%;
    }

    .contentitem .commentcontent span {
        color: #232323;
        font-size: 14px;
    }

    .contentitem .commentcontent>p {
        margin-bottom: 6px;
        color: #232323;
        font-size: 12px;
    }

    .contentitem .commentcontent p>a {
        color: #52ade2;
        font-size: 12px;
        text-decoration: none;
    }

    .contentitem .time {
        font-size: 10px;
        color: #808080;
        position: absolute;
        right: 20px;
        top: 44%;
    }

    /* 跳转页面 */

    .pageall {
        height: 60px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pageall>span {
        font-size: 14px;
        color: #545454;
    }

    .pageall .choose_page {
        width: 25px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 10px;
        position: absolute;
        right: 36%;
    }

    .pageall .choose_page a>i {
        border-right: 1px solid #545454;
        border-top: 1px solid #545454;
        width: 14px;
        height: 14px;
        position: absolute;
        transform: rotate(45deg);
        top: 8px;
    }

    .pageall .pageall_number {
        font-size: 14px;
        color: #545454;
        position: absolute;
        right: 15%;
    }

    .pageall .pageall_number .search-page {
        width: 25px;
        height: 30px;
        border: 1px solid #ebebeb;
        border-radius: 10px;
        position: absolute;
        right: 27%;
        top: -5px;
        text-align: center;
    }

    .pageall .allright {
        width: 38px;
        height: 30px;
        border: 1px solid #ebebeb;
        position: absolute;
        right: 20px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pageall .allright>a {
        text-decoration: none;
        font-size: 14px;
        color: #545454;
    }
</style>

<body>
    <div class="interactivemessage">
        <!-- 头部 -->
            <div class="header">
                    <div class="top_first">
                        <i class="iconfont lxznlogo">&#xe615;</i>
                        <div class="lxzntt">章鱼先生</div>
                        <!-- 信息数量 -->
                        <div class="top_main">
                            <i class="iconfont" style="font-size: 30px;">&#xe63a;</i>
                            <div class="information_num">2</div>
                        </div>
                        <!-- 头像部分 -->
                        <div class="sculpture">
                            <i class="iconfont">&#xe61f;</i>
                        </div>
                        <!-- 智能企业部分 -->
                        <div class="share">
                            <a href="javascript:;">乐享智能</a>
                            <div class="sharett">企业</div>
                            <div class="triangle-down"></div>
                        </div>
                    </div>
                </div>
        <!-- 左侧导航栏 -->
        <div class="container">
            <div class="container_left">
                <ul>
                    <li>
                        <a href="javascript:;" class="firstpage">
                            <i class="iconfont icon-house" style="font-size: 26px;">&#xe603;</i>
                            <span class="status">首页</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont icon-house">&#xe65c; </i>
                            <span>管理</span>
                        </a>
                        <div class="menu">
                            <a href="javascript:;" id="content">我的内容</a>
                            <a href="javascript:;" id="attachment">我的素材</a>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont icon-house">&#xe61c; </i>
                            <span>数据</span>
                        </a>
                        <div class="menu">
                            <a href="javascript:;" id="totalsingle">图文统计</a>
                            <a href="javascript:;" id="fansnumcount">粉丝量统计</a>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont icon-house" style="font-size: 32px;">&#xe63c; </i>
                            <span>互动</span>
                        </a>
                        <div class="menu">
                            <a href="javascript:;" id="comment">评论管理</a>
                            <a href="javascript:;" id="message" style="color: #3cb9ac;">互动消息</a>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont icon-house" style="font-size: 30px;">&#xe639; </i>
                            <span>设置</span>
                        </a>
                        <div class="menu">
                            <a href="javascript:;" id="accountset">账号设置</a>
                        </div>
                    </li>
                </ul>
            </div>
              <div class="content">
            <!-- 转发部分 -->
            <div class="content_all">
                <div>
                    <a href="javascript:;" id="fans">粉丝</a>
                </div>

                <div class="collection">
                    <a href="javascript:;" id="collect">收藏</a>
                    <div id="infostyle"></div>
                </div>
                <div class="transform" style="position: relative;">
                    <a href="javascript:;" id="transform">转发</a>
                    <span></span>
                </div>
               
            </div>
            <!-- 消息总计 -->
            <div class="allinformation">
                <div class="allinformation_number" id="fansnum">
                    <p>共3条消息</p>
                </div>

            </div>

            <!-- 粉丝转发部分 -->
            <div class="contentitem" id="contentitem">
                <div class="usercomment">
                    <img src="/project/media/Public/images/index/banner_one.png" alt="">
                    <div class="commentcontent">
                        <p>
                            <span>沈思安好帅</span>
                        </p>
                        <p>转发了你的文章&nbsp; [&nbsp;
                            <a href="javascript:;">如果腾讯阿里消失了，世界将会变成什么样 &nbsp;?</a> &nbsp; ] </p>
                        <div class="time">1小时前</div>
                    </div>
                </div>
                <div class="usercomment">
                    <img src="/project/media/Public/images/index/banner_one.png" alt="">
                    <div class="commentcontent">
                        <p>
                            <span>沈思安好帅</span>
                        </p>
                        <p>转发了你的文章&nbsp; [&nbsp;
                            <a href="javascript:;">如果腾讯阿里消失了，世界将会变成什么样 &nbsp;?</a> &nbsp; ] </p>
                        <div class="time">1小时前</div>
                    </div>
                </div>
            </div>

            <!-- 跳转页面 -->
            <div class="pageall" id="page">
                <span>1&nbsp;/&nbsp;2</span>
                <div class="choose_page">
                    <a href="javascript:;">
                        <i></i>
                    </a>
                </div>
                <div class="pageall_number">
                    <span>到第 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="text" class="search-page" maxlength="4"> 页
                    </span>
                </div>
                <div class="allright">
                    <a href="javascript:;">确定</a>
                </div>

            </div>

        </div>
        </div>
      
    </div>



    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        //  // 限制输入框长度
        //  var input = document.querySelector("#input")
        //    console.log(input.maxLength);
        var num = 1;
        var total = 1;
        window.onload = function(){
            fans(num);
        }
        
        function fans(num){
            if(num>total){
                alert('已经到最后一页');return;
            }
            $.ajax({
                url: '<?php echo U("Home/Messages/fansData");?>',
                type: 'post',
                data: {'type': 3,'num':num},
                success:function(event) {
                var html = '';
                var page = '';
                var fansnum = '';
                    if(event.status == 1){
                        var data = event.data;
                        total = event.page;
                        for(var i=0;i<data.length;i++){
                            html += '<div class="usercomment">';
                                html += '<img src="'+data[i]['avatar']+'" alt="">';
                                html += '<div class="commentcontent">';
                                    html += '<p>';
                                        html += '<span>'+data[i]['username']+'</span>';
                                    html += '</p>';
                                    html += '<p>'+data[i]['title']+'</p>';
                                    html += '<div class="time">'+data[i]['dateline']+'</div>';
                                html += '</div>';
                            html += '</div>';
                        };

                        page += '<span>1&nbsp;/&nbsp;'+event.page+'</span>';
                        page += '<div class="choose_page" onclick="nextpage()">';
                            page += '<a href="javascript:;">';
                                page += '<i></i>';
                            page += '</a>';
                        page += '</div>';
                        page += '<div class="pageall_number">';
                            page += '<span>到第 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;';
                                page += '<input type="text" class="search-page" maxlength="4"> 页';
                            page += '</span>';
                        page += '</div>';
                        page += '<div class="allright">';
                            page += '<a href="javascript:;" onclick="pageskip()">确定</a>';
                        page += '</div>';

                        fansnum += '<p>共'+data.length+'条消息</p>';

                        $('#contentitem').html(html);
                        $('#page').html(page);
                        $('#fansnum').html(fansnum);
                    }else{
                        html = '<p>暂无数据</p>'
                        $('#contentitem').html(html);
                        $('#page').html(page);
                        $('#fansnum').html(fansnum);
                    }
                }
            });            
        }

        //下一页
        function nextpage(){
            num += 1;
            fans(num);
        }
        //页数跳转
        function pageskip(){
            var pagenum = $('.search-page').val();
            num = pagenum;
            fans(num);
        }

        $('.firstpage').click(function(event) {
             window.location.href = "<?php echo U('Home/Admin/index');?>";
        });
        $('#fans').click(function(event) {
            window.location.href = "<?php echo U('Home/Messages/fans');?>";
        });

        $('#collect').click(function(event) {
            window.location.href = "<?php echo U('Home/Messages/collect');?>";
        });  

        //首页
        $('.status').click(function() {
            window.location.href = "<?php echo U('Home/Admin/index');?>";
        });
        //互动消息
        $('#message').click(function() {
            window.location.href = "<?php echo U('Home/Messages/fans');?>";
        });
        //粉丝量统计
        $('#fansnumcount').click(function() {
            window.location.href = "<?php echo U('Home/fans/index');?>";
        });
        //图文统计
        $('#totalsingle').click(function() {
            window.location.href = "<?php echo U('Home/Count/single');?>";
        });
        //我的素材
        $('#attachment').click(function() {
            window.location.href = "<?php echo U('Home/Attachment/index');?>";
        });
        //写文章
        $('#edit').click(function() {
            window.location.href = "<?php echo U('Home/Main/edit');?>";
        });
        //我的内容
        $('#content').click(function() {
            window.location.href = "<?php echo U('Home/Main/main');?>";
        });
        //账号设置
        $('#accountset').click(function() {
            window.location.href = "<?php echo U('Home/Account/index');?>";
        });
        //评论管理
        $('#comment').click(function() {
           window.location.href = "<?php echo U('Home/comment/newmsg');?>"; 
        });
    </script>
</body>

</html>