<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-23
 * Time: 下午5:33
 */

namespace Home\Controller;
use Think\Controller;

class ManageController extends Controller{
    //个人留言中心
        public function manage(){
            $uid=session('uid');
            $GMessage=M('Message');// 实例化Message对象
            $UserMessData=$GMessage->where("mdelete=1 and uid=$uid")->field("mbid,mbtitle,mbdate,mbip")->select();
            $this->assign('UserMess',$UserMessData);
            $this->display();
        }
    //个人留言回收站
    public function recycle(){
        $uid=session('uid');
        $HMessage=M('Message');// 实例化Message对象
        $RecMessData=$HMessage->where("mdelete=0 and uid=$uid")->field("mbid,mbtitle,mbdate,mbip")->select();
        $this->assign('RecMess',$RecMessData);
        $this->display();
    }
    //用户管理中心
    public function usermanage(){
        $User = M("User"); // 实例化User对象
        $data=$User->field("uid,uname,sname,upic,uemail,uphone,uqq")->select();
        $this->assign('userManage',$data);
        //管理员管理留言
        //关联查询话题
        $adminMessage=M('UserMessage');// 实例化UserMessage对象
        $ShowMessData=$adminMessage->field('message.mbid,user.upic,user.sname,message.mbip,message.mbdate,message.mbtitle')
            ->table('user,message')->where('user.uid=message.uid')->select();
        $this->assign('ShowMessData',$ShowMessData);
        $this->display();
    }
    //用户权限管理
    public function setrole(){
        if(IS_GET){
            $uid= $_GET['uid'];
            $User = M("User"); // 实例化User对象
            $UserManage=$User->where("uid=$uid")->field("uid,sname,upic")->select();
            $this->assign('UserQX',$UserManage);
            $this->display();
        }
    }
    //管理员删除用户留言
    public function UserMessageDel(){
        if(IS_GET){
            $mbid=$_GET['mbid'];
            $UserDelMessage=$this->delMessages($mbid);
            if($UserDelMessage){
                echo "df";
            }
        }

    }
    //管理员设置留言为推荐话题
    public function TuiJianMessage(){
        $mbid= $_GET['mbid'];
        $data['mbtype']=1;//1表示推荐话题
        $TuiMessage=$this->THMessage($data,$mbid);
        if($TuiMessage){
            header('content-type: text/html; charset=utf-8');
            $this->redirect('Index/index','',3,'设为推荐成功...3秒后跳入到主页....');
        }
    }
    //用户删除留言到回收站
    public function updateMessage(){
            if(IS_GET){
                $mbid= $_GET['mbid'];
                $data['mdelete']=0;//0表示删除到回收站
                $DelHuiMessage=$this->THMessage($data,$mbid);
                if($DelHuiMessage){
                    header('content-type: text/html; charset=utf-8');
                    $this->redirect('Manage/recycle','',3,'删除到回收站成功...3秒后跳入到回收站....');
                }
            }
    }
    //从回收站恢复留言
    public function huifuMessage(){
        if(IS_GET){
            $mbid= $_GET['mbid'];
            $data['mdelete']=1;//1表示从回收站恢复
            $HuiMessage=$this->THMessage($data,$mbid);
            if($HuiMessage){
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Manage/manage','',3,'恢复成功...3秒后跳入到个人留言中心....');
            }
        }
    }
    //用户彻底删除个人留言
    public function delMessage(){
        if(IS_GET){
            $mbid= $_GET['mbid'];
            $DelMessage=$this->delMessages($mbid);
            if($DelMessage){
                echo "df";
            }
        }
    }

    //彻底删除留言公共方法
    public function delMessages($mbid){
        //在删除该留言是先删除该留言的所有回复信息
        $Messages=M('Messages');// 实例化Message对象
        $Messages->where("mbid=$mbid")->delete();
        //再删除该留言
        $Message=M('Message');// 实例化Message对象
        $DelMessage=$Message->where("mbid=$mbid")->delete();
        return $DelMessage;
    }

    //删除留言到回收站和管理员设置推荐话题公共方法
    public function THMessage($data,$mbid){
        $Message=M('Message');// 实例化Message对象
        $THMessage=$Message->data($data)->where("mbid=$mbid")->save();
        return $THMessage;
    }
} 