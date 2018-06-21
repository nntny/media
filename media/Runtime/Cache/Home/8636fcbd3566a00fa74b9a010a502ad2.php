<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>写文章</title>
    <link rel="stylesheet" type="text/css" href="/project/media/Public/icon/iconfont.css">
    <link rel="stylesheet" href="/project/media/Public/css/trumbowyg.css">
    <link rel="stylesheet" href="/project/media/Public/css/layui.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/laydate.css" media="all">
    <link rel="stylesheet" href="/project/media/Public/css/public.css">
</head>
<style>
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
    
   .icon-house {
        font-family: "iconfont" !important;
        color: #a6a8ad;
        font-size: 24px;
        left: 40px;
        line-height: 50px;
        top: 0;
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
        margin-top: 0;
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

    /* 文本编辑器 */

    .editall {
        position: relative;
        padding: 15px 0 10px 0;
        margin: 0 auto;

    }

    #odiv {
        display: none;
        position: absolute;
        z-index: 100;
        top: 10px;
        left: 20px
    }

    .editall .editor {
        clear: both;
        overflow: auto;
        height: 500px;
    }

   

    /* 写文章部分 */

    .content {
        width: 870px;
        border: 1px solid #eee;
        background-color: #fff;
        display: inline-block;
        vertical-align: top;
        margin-left: 24px;
        border-top-color: #fff;
        margin-bottom: 100px;
       position: absolute;
    }

    .content .content_all {
        height: 65px;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 15px;
    }

    .content .content_all>a {
        position: absolute;
        bottom: 2px;
        font-size: 18px;
        color: #232323;
        text-decoration: none;
    }

    .content .content_all>span {
        width: 56px;
        height: 3px;
        background-color: #3db9ac;
        position: absolute;
        bottom: 0;
    }

    /* 封面 */

    .bigcover {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bigcover .cover {
        height: 310px;
        border: 1px solid #e1e1e1;
        position: relative;
        width: 96%;
    }

    .cover .cover_page span {
        padding: 0 40px 0 20px;
        position: relative;
        font-size: 12px;
        color: #232323;
    }

    .cover_page {
        padding-top: 40px;
    }

    .cover .cover_page span>i {
        background-color: #3bb9ad;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 1px solid #fff;
        position: absolute;
        left: 0;
        top: 0;
    }

    .cover .pic {
        text-align: center;
        position: absolute;
        bottom: 10px;
        right: 20%;
        font-size: 12px;
        color: #6f6f6f;
    }

    .add {
        display: flex;
        position: absolute;
        left: 14%;
    }

    .add_pic {
        position: relative;
        background-color: #eee;
        width: 130px;
        height: 90px;
        margin: 32px 15px 0 15px;

    }

    .add_pic .h {
        width: 42px;
        height: 2px;
        background: #bfc6d6;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%)
    }

    .add_pic .v {
        width: 2px;
        height: 42px;
        position: absolute;
        background: #bfc6d6;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%)
    }

    /* 发布 */

    footer {
        border: 1px solid #e1e1e1;
        width: 1600px;
        height: 100px;
        background-color: #fefefe;
        position: fixed;
        left: 0;
        bottom: 0;
    }

    .publishall {
        justify-content: center;
        align-items: center;
        line-height: 100px;
        position: absolute;
        right: 16%;
    }

    footer span {

        display: inline-block;
        width: 122px;
        height: 46px;
        border: 1px solid #a5a5a5;
        font-size: 14px;
        color: #4f4f4f;
        line-height: 46px;
        text-align: center;
        margin: 0 24px 0 24px;
        border-radius: 8px;
    }
</style>

<body>
    <div class="writeartical">
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
                            <a href="javascript:;" id="">评论管理</a>
                            <a href="javascript:;" id="message">互动消息</a>
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
            <!-- 写文章部分 -->
            <div class="content_all">
                <h4>写文章</h4>
                <input type="text" id="title" style="border: 0px;padding: 10px 5px;" value="<?php echo ($data['title']); ?>" placeholder="请输入标题">
            </div>
            <div class="editall">
                <div id="odiv">
                    <img src="/project/media/Public/pic/sx.png" title="缩小" border="0" alt="缩小" onclick="sub(-1);" />
                    <img src="/project/media/Public/pic/fd.png" title="放大" border="0" alt="放大" onclick="sub(1)" />
                    <img src="/project/media/Public/pic/cz.png" title="重置" border="0" alt="重置" onclick="sub(0)" />
                    <img src="/project/media/Public/pic/sc.png" title="删除" border="0" alt="删除" onclick="del();odiv.style.display='none';" />
                </div>
                <div class="editor" id="customized-buttonpane" onmousedown="show_element(event)">
                    <?php echo ($data['content']); ?>
                </div>
            </div>
            <!-- 封面 -->
            <div class="bigcover">
                <div class="cover">
                    <div class="choose" style="padding: 30px 0 0 15px;position: relative;">
                        <div class="choose_img">
                            <span style="font-size: 16px;color: #232323;">频道栏目</span>
                            <select id="catid" name="cars" style="position:absolute;color:#232323;font-size: 12px;padding-left: 10px; border:1px solid #a5a5a5;background-color:#fff;width:100px;height:38px;top: 20px;left: 16%;">
                                <?php if(is_array($catname)): foreach($catname as $key=>$v): ?><option value="<?php echo ($v['catid']); ?>"><?php echo ($v['catname']); ?></option><?php endforeach; endif; ?>
                            </select>

                        </div>
                    </div>

                    <div class="cover_page">
                        <span style="font-size: 16px;">封面</span>
                        <span>默认封面</span>
                        <span>单图</span>
                        <span>
                            <i></i>三图</span>
                    </div>
                    <div class="pic">
                        <p>优质的封面有利于推荐，请使用清晰度较高的图片，避免使用GIF&nbsp;、带大量文字的图片</p>
                    </div>
                    <div class="add">
                        <div class="add_pic">
                            <div class="h"></div>
                            <div class="v"></div>
                        </div>
                        <div class="add_pic">
                            <div class="h"></div>
                            <div class="v"></div>
                        </div>
                        <div class="add_pic">
                            <div class="h"></div>
                            <div class="v"></div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        </div>
     

        <footer>
            <div class="publishall">
                <span style="background-color: #3bb9ad;font-weight: bold;color: #fff;width: 92px;border: 1px solid #fff;" onclick="sentData()">发布</span>
                <span>定时发送</span>
                <span>存草稿</span>
                <span>预览</span>

            </div>
        </footer>
    </div>


    <script src="/project/media/Public/js/jquery-3.3.1.min.js"></script>
    <script src="/project/media/Public/js/jquery.min.js"></script>
    <script src="/project/media/Public/js/trumbowyg.js"></script>
    <script src="/project/media/Public/js/trumbowyg.base64.js"></script>
    <script type="text/javascript">
    function sentData(){
        var title = $('#title').val();
        var catid = $('#catid').val();
        var content = $('#customized-buttonpane').html();
        console.log(content);
        $.ajax({
            url: '<?php echo U("Home/main/doEdit");?>',
            type: 'POST',
            data: {'title':title,'content': content,'catid':catid},
            dataType:"json",
            success:function(ret){
                alert(ret.msg);
            }
        })
    }
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