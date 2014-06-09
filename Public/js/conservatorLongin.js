/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-5
 * Time: 下午5:38
 * To change this template use File | Settings | File Templates.
 */
/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-30
 * Time: 下午10:30
 * To change this template use File | Settings | File Templates.
 */
//进入管理员
var url="http://"+window.location.host+"/bbs/userManage.php";
function conservatorRegister(){
    var _userType=document.getElementById('userType');
    if(_userType.innerHTML=='你是管理员'){
        location.href=url; //进入管理员中心
    }else{
        alert('你不是管理员,不能进入管理员中心!');
    }
}
//用户删除留言
function deleteUserLiuYan(liuyan){

    checkXmlHttp();
    var names=liuyan.parentNode.children;
    var name=names[0].innerHTML;
    var url="http://"+window.location.host+"/mybbs/Home/Manage/updateMessage?userDeleteId="+ name+"&"+Math.random();
    alert(url)
    xmlHttp.open("GET",url,true);
    xmlHttp.onreadystatechange=userDeleteDate;
    xmlHttp.send(null);
}
//数据回调
function userDeleteDate(){
    if(xmlHttp.status==200 && xmlHttp.readyState==4){
        var txt=xmlHttp.responseText;
        if(txt==1){
            alert('该留言已移入回收站!');
            location.reload();
        }
    }

}