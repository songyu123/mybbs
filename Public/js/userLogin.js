/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-30
 * Time: 下午10:30
 * To change this template use File | Settings | File Templates.
 */
/**
 * 登陆
 */
    var login,logpwd;
    var  uname=document.getElementById('userName');
    var upwd=document.getElementById('userPwd');
    uname.onblur=function(){
        if(uname.value==""){
            login=false;
        }else{
            login=true;
        }
    }
    upwd.onblur=function(){
    if(upwd.value==""){
        logpwd=false;
    }else{
        logpwd=true;
    }
}
function logins(){
    if(login == true && logpwd == true){
        return true;
    }else{
        alert('用户名和密码不能为空!');
        return false;
    }
}
