<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-24
 * Time: 下午5:58
 */

namespace Home\Controller;
use Think\Controller;

class ShowController extends Controller{
    //关联查询话题和回复
     public function showManage(){
         if(IS_GET){
             session('mbid',$_GET['mbid']);//将提交过来的mbid写入session中以便回复表使用
         }
         $ShowData=$this->showMessage(session('mbid'));
         $this->assign(array('MessData'=>$ShowData[0],'ShowData'=>$ShowData[1],'showHui'=>$ShowData[2]));
         $this->assign('page',$ShowData[3]);
         $this->display();
     }
    //显示留言信息及该留言的回复
    public function showMessage($mbid){
        $Message=M('UserMessage');// 实例化UserMessage对象
        //关联查询话题
        $MessData=$Message->field('user.upic,user.sname,message.mbip,message.mbdate,message.mbtitle,message.mbcontent')
            ->table('user,message')->where("message.mbid=$mbid and user.uid=message.uid")->select();
        //被回复
        $ShowData=$Message->field('user.sname,user.upic')->table('message,user')->where("message.mbid=$mbid and user.uid=message.uid")->select();
        $showMessages=M('UserMessages');
        //统计该留言回复
        $count= $showMessages->where("messages.mbid=$mbid and user.uid=messages.uid")->table('user,messages')->count('messages.uid');// 查询满足要求的总记录数
        $Page=new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        //回复者
        $showHui=$showMessages->field('user.sname,messages.hcontent,messages.htime,user.upic')->table('user,messages')->where("messages.mbid=$mbid and user.uid=messages.uid")->limit($Page->firstRow.','.$Page->listRows)->select();
        return array($MessData,$ShowData,$showHui,$show);
    }

    //添加用户回复
    public function addHFMessage(){
        if(IS_POST){
            $data['hid']='null';
            $data['mbid']=session('mbid');
            $data['uid']=session('uid');
            $data['sname']=session('sname');
            $data['hcontent']=$_POST['userText'];
            $data['htime']=get_time_now();
            $Messages= M('Messages');// 实例化HuiMessage对象
            $addHuiMessage=$Messages->add($data);

            if($addHuiMessage){
                //如果回复成功就统计该留言的回复数量
                $conts=$Messages->where('mbid=%s',array(session('mbid')))->count('hid');
                //将统计的数字写入到该留言作为热点条件
                $MessageMcount=M('Message');
                $datas['mcount']=$conts;
                $MessageMcount->data($datas)->where('mbid=%s',array(session('mbid')))->save();
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Show/showManage', '', 3, '回复成功....页面跳转中...');
            }else{
                header('content-type: text/html; charset=utf-8');
                $this->redirect('Show/showManage','',3,'回复失败...页面跳转中....');
            }
        }
    }

} 