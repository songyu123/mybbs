<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   public function index(){
       //查询话题
        $Message=M('Message');// 实例化Message对象
       //最新话题
        $NewMessData=$Message->where('mdelete=1')->field("mbid,mbtitle,mbdate")->order('mbid desc')->limit(20)->select();
        $this->assign('NewMess',$NewMessData);
       //最热话题
       $HostMessData=$Message->where('mdelete=1 and mcount>=20')->field("mbid,mbtitle,mbdate")->limit(20)->select();
       $this->assign('HostMess',$HostMessData);
       //推荐话题
       $TuiMessData=$Message->where('mdelete=1 and mbtype=1')->field("mbid,mbtitle,mbdate")->limit(20)->select();
       $this->assign('TuiMess',$TuiMessData);
       $this->display();
    }
    //登录验证
    public function login(){
        if(IS_POST){
            $username= $_POST['uname'];
            $pwd=$_POST['upwd'];
            $User = M("User"); // 实例化User对象
            $data=$User->where("uname='%s' and upwd='%s'",array($username,$pwd))->field("uid,uname,upwd,sname,upic")->select();
            if($data){
                session('uid',$data[0]['uid']);
                session('user',$username);
                session('sname',$data[0]['sname']);
                session('upic',$data[0]['upic']);
                //查询管理员权限
                $UserGroup=M('Group');
                $UserGroup=$UserGroup->where("uid='%s'",array(session('uid')))->field("rtype")->select();
                session('rtype',$UserGroup[0]['rtype']);
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Index/index', '', 3, '登录成功....页面跳转中...');
            }else{
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Zhuce/zhuce','',3,'登录失败...3秒后跳入到注册页面....');
            }
        }

    }
    //退出登陆
    public function quit(){
        session('[destroy]');
        header('content-type: text/html; charset=utf-8');
        $this->redirect('Index/index','', 3, '退出成功....页面跳转中...');
    }



    /**
     * 设置你的验证码
     */
    public  function yzm(){
        $Verify =new \Think\Verify();
        $Verify->fontSize = 10;
        $Verify->length   = 6;
        $Verify->useNoise = false;
        $Verify->entry();
    }
    //用户注册
    public function reg(){
        if(IS_POST){
            $data['uid']='null';
            $data['uname']=$_POST['userName'];
            $data['upwd']=$_POST['userPwd'];
            $data['upic']='NULL';
            $data['sname']=$_POST['userSname'];
            $data['uemail']=$_POST['userEmail'];
            $data['uphone']=$_POST['userPhone'];
            $data['uqq']=$_POST['userQQ'];
            $User = M("User"); // 实例化User对象
            //判断是否已注册
            $datas=$User->where("uname='%s'",array($data['uname']))->field("uname")->select();
            if($datas){
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Index/index', '', 3, '用户已经注册....页面跳转中...');
            }else{
                //注册用户
                $addUser= $User->add($data);
                if($addUser){
                    header('content-type: text/html; charset=utf-8');
                    $this->redirect('Index/index', '', 3, '注册成功....页面跳转中...');
                }else{
                    header('content-type: text/html; charset=utf-8');
                    $this->redirect('Index/index','',3,'注册失败...页面跳转中....');
                }
            }
        }
    }
}