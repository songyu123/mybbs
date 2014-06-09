<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="copyright" content="http://www.mybbs.com" />
    <meta http-equiv="Contest-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="robots" content="xxxx,yyy" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,minimum-scale=1.0,maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="no" />
    <meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
    
        <title>
        <?php if(is_array($MessData)): $i = 0; $__LIST__ = $MessData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Messdata): $mod = ($i % 2 );++$i; echo ($Messdata["sname"]); ?>的留言(<?php echo ($Messdata["mbtitle"]); ?>)<?php endforeach; endif; else: echo "" ;endif; ?>
    </title>
    <link rel="stylesheet" type="text/css" href="/mybbs/Public/css/index.css" />
    <script type="text/javascript" src="/mybbs/Public/js/jquery.js"></script>
</head>
<body>
<div class="ensemble">
<div class="title">
    <div class="log"><a href="#"><img src="/mybbs/Public/img/logocs.gif" title="星辰在线"></a></div>

    <div class="row" style="width: 120px;float: right;margin-top: 10px;">
        <span class="openLogon" style="cursor: pointer;">用户注册</span>
        <span class="openLogin" style="cursor: pointer;margin-left: 10px;">登陆</span>
    </div>
    <div class="container">
    <div id="userPicImg">
        <?php if(empty($_SESSION['upic'])): $_SESSION['upic'] = 'NULL'; endif; ?>
        <?php if(($_SESSION['upic']) == "NULL"): ?><img src="/mybbs/Public/Uploads/001.gif" width="40" height="30" />
            <?php else: ?>
            <img src="/mybbs/Public/Uploads/<?php echo (session('upic')); ?>" width="40" height="30" /><?php endif; ?>
    </div>
    <label class="top_label">
        <span id="userID" style="visibility: hidden"><?php echo (session('uid')); ?></span>
        <span id="userTypes" style="visibility: hidden"><?php echo (session('rtype')); ?></span>
        <span id="userNames">
            <?php if(empty($_SESSION['sname'])): ?>你好!你是游客,请登录或注册!
                <?php else: ?>
                欢迎: <?php echo (session('sname')); ?> 进入星辰在线!<?php endif; ?>
        </span>
        <?php switch($_SESSION['rtype']): case "a": ?><span style="color: darkmagenta">你是管理员</span><?php break;?>
            <?php case "b": ?><span style="color: red">你是版主</span><?php break;?>
            <?php case "c": ?><span style="color: gold">你是会员用户</span><?php break;?>
            <?php case "d": ?><span style="color: forestgreen">你是普通用户</span><?php break;?>
            <?php default: endswitch;?>
        <span id="userType" style="color: red"></span>
        <a href="<?php echo U('Index/quit');?>"><span style="cursor: pointer;color: blue">退出登录</span></a></label>
</div>
 </div>
    <!--客服部分-->
    <div id="keFu">
        <span class="close">关闭</span>
        <div>
            <a href="#"><img src="/mybbs/Public/img/kefu.gif" title="星辰在线客服"></a>
        </div>
    </div>
    <script type="text/javascript" src="/mybbs/Public/js/kefu.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#keFu').kefu();
        });
        //关闭客服窗口
        $('.close').click(function(){
            $('#keFu').css({visibility:'hidden'});
        });
    </script>
    <!--登录注册-->
    <div class="login_logon_insulate">
        <div class="bgColorBox">
        </div>
        <form action="<?php echo U('Index/login');?>" method="post" onsubmit="return logins();">
        <div class="login_insulate">
            <div class="login_logon_Box_hidden">
            </div>
            <table id="userLogin">
                <caption style="color: gray;font-weight: bold">用户登录</caption>
                <tr><td align="right">用户名:</td><td><input class="input" type="text" name="uname" id="userName"  placeholder="请输入您的用户名"/></td></tr>
                <tr><td align="right">密 码:</td><td><input class="input" type="password" id="userPwd" name="upwd" placeholder="请输入您的密码"/></td></tr>
                <tr><td colspan="2"> <button type="submit" name="sub" class="go_login_btn"></button></td></tr>
            </table>
        </div>
        </form>
        <script type="text/javascript" src="/mybbs/Public/js/userLogin.js"></script>
        <!--注册-->
        <div class="logon_content">
            <div class="login_logon_Box_hidden">
            </div>
            <div class="go_loginBox">
                <div class="go_login_content">
                    <ul>
                        <li class="logon_no_qualification">没有注册码?</li>
                        <li><button class="application_logon_qualification" type="button"></button></li>
                        <li class="logon_no_qualification loginTextTitle">已经有账号?</li>
                        <li><button type="button" class="go_login_btns"></button></li>
                    </ul>
                </div>
            </div>
            <div class="logonBox">
                <div style="width: 150px;height: 40px;background: silver;margin-left: 150px;color: white;font-weight: bold;line-height: 40px;text-align: center;font-size: 20px">注册帐号</div>
                <form action="<?php echo U('Index/reg');?>" method="post" name="from1" onsubmit="return subs();" >
                    <table id="users">
                        <tr><td align='right'class="td">用户名:</td><td class="tds"><input class="input" type="text" name="userName"/></td><td><span></span></td></tr>
                        <tr><td align='right'class="td">密 码:</td><td class="tds"><input class="input" type="password" name="userPwd"/></td><td><span></span></td></tr>
                        <tr><td align='right'class="td">密码强度:</td>
                            <td  class="tdss" colspan="2">
                            <div class="qiangdu" id="qiangdu">
                                <p>弱</p>
                                <p>中</p>
                                <p>强</p>
                            </div>
                        </td></tr>
                        <tr><td align='right'class="td">确认密码:</td><td class="tds"><input class="input" type="password" name="userPwds"/></td><td><span></span></td></tr>
                        <tr><td align='right'class="td">昵 称:</td><td class="tds"><input class="input" type="text" name="userSname"/></td><td colspan="2"><span></span></td></tr>
                        <tr><td align='right'class="td">Email:</td><td class="tds"><input class="input" type="text" name="userEmail"/></td><td colspan="2"><span></span></td></tr>
                        <tr><td align='right'class="td">电 话:</td><td class="tds"><input class="input" type="text" name="userPhone"/></td><td colspan="2"><span></span></td></tr>
                        <tr><td align='right'class="td">QQ:</td><td class="tds"><input class="input" type="text" name="userQQ"/></td><td colspan="2"><span></span></td></tr>
                        <tr><td align='right'class="td">验证码:</td><td class="tds">
                            <img style="margin-left: 30px;cursor: pointer" src="<?php echo U('Index/yzm');?>" title="看不清,换一张!" onclick="checkImage(this)"/>
                            <input style="margin-left: 10px;margin-top: 5px;float: left" type="text" name="yzm"/>
                        </td><td><span></span></td></tr>
                        <tr><td colspan="3"><button type="submit" name="sub" class="logonButton"></button></td></tr>
                    </table>
                    <script type="text/javascript" src="/mybbs/Public/js/userRegister.js"></script>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="JavaScript">
        //页面加载完后为元素绑定事件
        $(document).ready(function(){
            $(".openLogin").bind('click',openLogin);
            $('.openLogon').bind('click',openLogon);
            $('.login_logon_Box_hidden').bind('click',open_login_logon_box);
        });
        function open_login_logon_box(){
            $('.login_insulate').css({display:"none"});
            $('.logon_content').css({display:"none"});
            close_login_logOn_box();
        }
        //显示登陆模块
        function openLogin(){
            $('.login_insulate').css({display:"block"});
            open_login_logOn_box();//显示登陆容器
        }
        //显示注册模块
        function openLogon(){
            $('.logon_content').css({display:"block"});
            open_login_logOn_box();//显示登陆容器
        }
        //显示注册和登陆的容器,并设置滚动条不可滚动
        function open_login_logOn_box(){
            $('html').addClass("html_overflow");
            $("body").addClass("body_height_overflow");
            $(".login_logon_insulate").slideDown(300);
            right = null;
        }
        //关闭注册和登陆容器,并恢复滚动条
        function close_login_logOn_box(){
            var right = window.screen.width;
            $(".login_logon_insulate").slideUp(300);
            $('html').removeClass("html_overflow");
            $("body").removeClass("body_height_overflow");
        }
    </script>
    <!--导航栏-->
    <div class="navigation">
        <ul id="navList">
            <li><a href="<?php echo U('Index/index');?>">星辰首页</a></li>
            <li class="UserMessage"><a href="<?php echo U('User/user');?>">用户中心</a></li>
            <li class="Userliuyan"><a href="<?php echo U('liuyan/liuyan');?>">我要留言</a></li>
            <li><a href="<?php echo U('About/about');?>">关于我们</a></li>
            <li class="Messages"><a href="<?php echo U('Manage/manage');?>">管理中心</a></li>
        </ul>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var uid=document.getElementById('userID');
            if(uid.innerHTML==''){
            $(".UserMessage").bind('mouseover',openLogin);
            $('.Userliuyan').bind('mouseover',openLogin);
            $('.Messages').bind('mouseover',openLogin);
            $('.login_logon_Box_hidden').bind('click',open_login_logon_box);
            }
        });
    </script>
 
      <div class="caoZuo"><div class="content">
          <span id="pags" style="display: none">0</span>
          <div class="userMessage">
              <table border="1" style="position: relative; left:75px;">
                  <tr><td class="td">用户头像</td><td class="td">用户昵称</td><td class="td">发布时间</td><td class="td">用户IP</td></tr>
                  <?php if(is_array($MessData)): $i = 0; $__LIST__ = $MessData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Messdata): $mod = ($i % 2 );++$i;?><tr>
                      <td rowspan="3" width="200" height="200">
                          <?php if(($Messdata["upic"]) == "NULL"): ?><img src="/mybbs/Public/Uploads/001.gif" width="200" height="200">
                              <?php else: ?>
                              <img src="/mybbs/Public/Uploads/<?php echo ($Messdata["upic"]); ?>" width="200" height="200"><?php endif; ?>
                      </td>
                      <td width="150" height="20" class="td"><?php echo ($Messdata["sname"]); ?></td>
                      <td width="200" class="td">
                         <?php echo ($Messdata["mbdate"]); ?>          </td><td width="150" class="td">  <?php echo ($Messdata["mbip"]); ?>  </td>
                  </tr>
                  <tr>
                      <td colspan="3" height="40px">
                          帖子主题: <?php echo ($Messdata["mbtitle"]); ?>           </td></td>
                  </tr>
                  <tr>
                      <td colspan="3">
                          内容:  <span style="color:#E53333;"><?php echo ($Messdata["mbcontent"]); ?></span><span style="color:#E56600;"></span>                </td></td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </table>
          </div>
          <!--显示回复内容 并分页--->
          <div class="showMessage">
              <ul>
                  <li>
                      <?php if(is_array($showHui)): $i = 0; $__LIST__ = $showHui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$showhui): $mod = ($i % 2 );++$i; if(($showhui["upic"]) == "NULL"): ?><img src="/mybbs/Public/Uploads/001.gif" width="20" height="20">
                              <?php else: ?>
                              <img src="/mybbs/Public/Uploads/<?php echo ($showhui["upic"]); ?>" width="20" height="20"><?php endif; ?>
                            <?php echo ($showhui["sname"]); ?>
                      回复
                      <?php if(is_array($ShowData)): $i = 0; $__LIST__ = $ShowData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$showdata): $mod = ($i % 2 );++$i; if(($showdata["upic"]) == "NULL"): ?><img src="/mybbs/Public/Uploads/001.gif" width="20" height="20">
                              <?php else: ?>
                        <img src="/mybbs/Public/Uploads/<?php echo ($showdata["upic"]); ?>" width="20" height="20"><?php endif; ?>
                      <?php echo ($showdata["sname"]); endforeach; endif; else: echo "" ;endif; ?>
                      :&nbsp;&nbsp;
                          <?php echo ($showhui["hcontent"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($showhui["htime"]); ?></br><?php endforeach; endif; else: echo "" ;endif; ?>
                  </li>
              </ul>
              </volist>
              <?php if(!empty($page)): ?><div id="filePag">第 <span><?php echo ($page); ?></span> 页</div><?php endif; ?>
          </div>
          <!-- 回复-->
          <form action="<?php echo U('Show/addHFMessage');?>" method="post" name="userMsgForm" >
              <div class="userHui">
                  回复主题:<br/>
                  <textarea style="width:280px;height: 55px;" name="userText" onclick="yanzhen();"></textarea>
                  <input type="submit" name="userTexts" value="回复"/>
              </div>
          </form>
          <div id="zhe"></div>
      </div>
          <script type="text/javascript" src="/mybbs/Public/js/pagMain.js"></script>
      </div>
  


    <div class="footer">
        <div class="footerDao">
            <ul>
                <li>小黑屋</li>
                <li>Archiver</li>
                <li>手机版</li>
                <li style="width: 250px">星辰在线 ( 蜀ICP备09015919号 ) </li>
            </ul>
        </div>
        <div class="footerImg">
            <a href="#"><img src="/mybbs/Public/img/lnqq_ft_01.gif"></a>
            <a href="#"><img src="/mybbs/Public/img/lnqq_ft_02.gif"></a>
            <a href="#"><img src="/mybbs/Public/img/lnqq_ft_03.gif"></a>
            <a href="#"><img src="/mybbs/Public/img/lnqq_ft_04.gif"></a>
            <a href="#"><img src="/mybbs/Public/img/lnqq_ft_05.gif"></a>
        </div>
    </div>
</div>
</body>
</html>