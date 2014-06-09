/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-28
 * Time: 下午10:17
 * To change this template use File | Settings | File Templates.
 */
//注册验证
//用户注册判断
var userName,userPwd,userPwds,userSname,userEmail,userPhone,userQQ,userYzm;
var userNameReg=/^[a-zA-Z]\w{5,11}$/;
var userPwdReg=/^[a-zA-Z0-9_!@#$%^&*]{6,20}$/;
var userSnameRge=/^[\u4e00-\u9fa5]{2,10}$/;
var userEmailReg=/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
var userPhoneReg=/^(13)\d{9}$|^(15)\d{9}$|^(18)\d{9}$/;
var userQQReg=/^\d{5,12}$/;
var _user=document.getElementById('users');
var _input=_user.getElementsByTagName('input');
var _span=_user.getElementsByTagName('span');
var _div=document.getElementById('qiangdu');
for(var i=0;i<_input.length;i++){
    switch (i){
        case 0:_input[0].onblur=function(){
         if(_input[0].value !=""){
            if(userNameReg.test(_input[0].value)){
                _span[0].innerHTML="用户名正确!";
                _span[0].setAttribute('class','right');
                userName=true;
            }else{
                _span[0].innerHTML="用户名不正确!";
                _span[0].setAttribute('class','wrong');
                userName=false;
            }
         }else{
             _span[0].innerHTML="请输入以字母开头6-12位用户名!";
             _span[0].setAttribute('class','wrong');
             userName=false;
        }
        };break;
        case 1:_input[1].onblur=function(){
            if(_input[1].value !=""){
                if(userPwdReg.test(_input[1].value)){
                    _span[1].innerHTML="密码正确!";
                    _span[1].setAttribute('class','right');
                    if(_input[1].value.length>=6){
                        _div.style.display="block";
                        qiang();
                    }
                    userPwd=true;
                }else{
                    _span[1].innerHTML="密码不正确!";
                    _span[1].setAttribute('class','wrong');
                    userPwd=false;
                }
            }else{
                _span[1].innerHTML="请输入6-20位密码!";
                _span[1].setAttribute('class','wrong');
                userPwd=false;
            }
    };
    //键盘密码强度验证
            _input[1].onkeyup=function(){
                if(_input[1].value.length>=6){
                    _div.style.display="block";
                    qiang();
                }else{
                    _div.style.display="none";
                }
            };break;
        case 2:_input[2].onblur=function(){
            if(_input[2].value !=""){
                if(_input[1].value == _input[2].value){
                    _span[2].innerHTML="确认密码正确!";
                    _span[2].setAttribute('class','right');
                    userPwds=true;
                }else{
                    _span[2].innerHTML="两次密码不一致!";
                    _span[2].setAttribute('class','wrong');
                    userPwds=false;
                }
            }else{
                _span[2].innerHTML="请输入确认密码!";
                _span[2].setAttribute('class','wrong');
                userPwds=false;
            }
        };break;
        case 3:_input[3].onblur=function(){
            if(_input[3].value !=""){
                if(userSnameRge.test(_input[3].value)){
                    _span[3].innerHTML="输入正确!";
                    _span[3].setAttribute('class','right');
                    userSname=true;
                }else{
                    _span[3].innerHTML="输入不正确!";
                    _span[3].setAttribute('class','wrong');
                    userSname=false;
                }
            }else{
                _span[3].innerHTML="请输入真实姓名!";
                _span[3].setAttribute('class','wrong');
                userSname=false;
            }
        };break;
        case 4:_input[4].onblur=function(){
          if(_input[4].value !=""){
            if(userEmailReg.test(_input[4].value)){
                _span[4].innerHTML="邮箱正确!";
                _span[4].setAttribute('class','right');
                userEmail=true;
            }else{
                _span[4].innerHTML="邮箱不正确!";
                _span[4].setAttribute('class','wrong');
                userEmail=false;
            }
          }else{
              _span[4].innerHTML="请输入正确的邮箱!";
              _span[4].setAttribute('class','wrong');
              userEmail=false;
          }
        };break;
        case 5:_input[5].onblur=function(){
          if(_input[5].value !=""){
            if(userPhoneReg.test(_input[5].value)){
                _span[5].innerHTML="手机号码正确!";
                _span[5].setAttribute('class','right');
                userPhone=true;
            }else{
                _span[5].innerHTML="手机号码不正确!";
                _span[5].setAttribute('class','wrong');
                userPhone=false;
            }
          }else{
              _span[5].innerHTML="请输入正确的手机号码!";
              _span[5].setAttribute('class','wrong');
              userPhone=false;
          }
        };break;
        case 6:_input[6].onblur=function(){
          if(_input[6].value !=""){
            if(userQQReg.test(_input[6].value)){
                _span[6].innerHTML="QQ号码正确!";
                _span[6].setAttribute('class','right');
                userQQ=true;
            }else{
                _span[6].innerHTML="QQ号码不正确!";
                _span[6].setAttribute('class','wrong');
                userQQ=false;
            }
          }else{
              _span[6].innerHTML="请输入正确的QQ号码!";
              _span[6].setAttribute('class','wrong');
              userQQ=false;
          }
        };break;
        case 7:_input[7].onblur=function(){
            if(_input[7].value !=""){
                _span[7].innerHTML="已输入验证码!";
                _span[7].setAttribute('class','right');
                userYzm=true;
            }else{
                _span[7].innerHTML="请输入图片中的验证码!";
                _span[7].setAttribute('class','wrong');
                userYzm=false;
            }

        };break;
    }
}
//密码强度验证
var _p=_div.getElementsByTagName('p');
function qiang(){
    var regex_1=/(^\d+$)|(^[a-zA-Z]+$)/; //如果全是数字或者全是字母的情况下就是弱
    var regex_2=/(^[a-zA-Z0-9]+$)|(^[a-zA-Z_!@#$%^&*]+$)|(^[0-9_!@#$%^&*]+$)/; //密码强度为中的情况
    if(regex_1.test(_input[1].value)){
        _p[0].style.background="#FF0000";
        _p[1].style.background="#cccccc";
        _p[2].style.background="#cccccc";
    }else if(regex_2.test(_input[1].value)){
        _p[0].style.background="#FB9100";
        _p[1].style.background="#FB9100";
        _p[2].style.background="#cccccc";
    }else{
        _p[0].style.background="#00CC00";
        _p[1].style.background="#00CC00";
        _p[2].style.background="#00CC00";
    }
}
//验证码
function checkImage(obj){
    var src=obj.src;
    obj.src=src+"?"+Math.random();
}

//表单提交
function subs(){
    if(userName==true && userPwd==true && userPwds==true &&
        userSname==true && userEmail==true && userPhone==true &&
        userQQ==true && userYzm==true){
        return true;
    }
    return false;
}


