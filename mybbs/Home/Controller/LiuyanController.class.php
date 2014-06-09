<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-23
 * Time: 下午4:56
 */

namespace Home\Controller;
use Think\Controller;

class LiuyanController extends  Controller{
  public  function liuyan(){
      $this->display();
  }
   //发布留言
    public function addLiuYan(){
        if(IS_POST){
        $Message=M('Message');// 实例化Message对象
            $data['mbid']='null';
            $data['uid']=session('uid');
            $data['mbtitle']=$_POST['subjectTitle'];
            $data['mbdate']=get_time_now();
            $data['mbcontent']=$_POST['content'];
            $data['mbip']=get_client_ip();
            $data['	mcount']='null';
            $data['	mbtype']='null';
            $data['	mdelete']=1;
            $addMessage= $Message->add($data);
           if($addMessage){
               header('content-type: text/html; charset=utf-8');
               $this->redirect('Index/index', '', 3, '发表留言成功....页面将跳转到首页...');
           }
        }
    }
} 