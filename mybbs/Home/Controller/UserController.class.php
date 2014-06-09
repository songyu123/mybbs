<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-23
 * Time: 下午5:11
 */

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    //读取用户信息
        public function user(){
            $User = M("User"); // 实例化User对象
            $data=$User->where("uname='%s'",array(session('user')))->field("uname,upwd,sname,upic,uemail,uphone,uqq")->select();
            $this->assign('user',$data);
            $this->display();
        }
    //修改资料
    public function update(){
        if(IS_POST){
            $data['upwd']=$_POST['upwd'];
            $data['sname']=$_POST['sname'];
            $data['uemail']=$_POST['uemail'];
            $data['uphone']=$_POST['uphone'];
            $data['uqq']=$_POST['uqq'];
            $file=$_FILES['userPic']['name'];
            if($file !=""){
                $data['upic']=$this->upload($_FILES['userPic']);
                $update=$this->updateUser($data);
                if($update){
                    //修改成功后将新的头像写入session;
                    $this->updatePicSession();
                    //修改成功后将跳转到用户中心
                    header('content-type: text/html; charset=utf-8');
                    $this->redirect('User/user', '', 3, '资料修改成功....页面跳转中...');
                }
            }else{
                $data['upic']="NULL";
                $update=$this->updateUser($data);
                if($update){
                    //修改成功后将新的头像写入session;
                    $this->updatePicSession();
                    //修改成功后将跳转到用户中心
                    header('content-type: text/html; charset=utf-8');
                    $this->redirect('User/user', '', 3, '资料修改成功....页面跳转中...');
                }
            }

      }
    }

    //头像上传
    public function upload($file){
        $upload = new \Think\Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->saveName = 'userPic'.time();//保存文件名
        $upload->autoSub = false;//是否自动子目录保存文件
        $upload->savePath = "../Public/Uploads/" ; // 设置附件上传目录
        $info   =   $upload->uploadOne($file);// 上传文件
        if(!$info) // 上传错误提示错误信息
        {
            $this->error($upload->getError());
        }else
        { // 上传成功 获取上传文件信息,将文件名写入数据库
            $fileName= $info['savename'];
        }
        return $fileName;
    }



    //修改用户信息
    public function updateUser($data){
        $UpdateUser = M("User"); // 实例化User对象
        $UpdateUsers=$UpdateUser->data($data)->where('uid=%s',array(session('uid')))->save();
        return $UpdateUsers;
    }

    //修改成功后将新的头像写入session;
    public function updatePicSession(){
     $UserPic = M("User"); // 实例化User对象
     $data=$UserPic->where('uid=%s',array(session('uid')))->field("upic,sname")->select();
     session('upic',$data[0]['upic']);
     session('sname',$data[0]['sname']);
    }
}

