/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-5
 * Time: 下午8:53
 * To change this template use File | Settings | File Templates.
 */
//用户彻底删除留言
function thoroughDelete(liuyan){
 if(confirm("确定要删除吗?")==true){
    checkXmlHttp();
    var names=liuyan.parentNode.children;
    var name=names[0].innerHTML;
    var url="http://"+window.location.host+"/bbs/server/server.php?deleteId="+ name+"&"+Math.random();
    xmlHttp.open("GET",url,true);
    xmlHttp.onreadystatechange=thoroughDate;
    xmlHttp.send(null);
 }
}
//数据回调
function thoroughDate(){
    if(xmlHttp.status==200 && xmlHttp.readyState==4){
        var txt=xmlHttp.responseText;
        if(txt==1){
            location.reload();
        }
    }
}


//恢复留言
function recoverDelete(recover){
    checkXmlHttp();
    var names=recover.parentNode.children;
    var name=names[0].innerHTML;
    var url="http://"+window.location.host+"/bbs/server/server.php?recoverId="+ name+"&"+Math.random();
    xmlHttp.open("GET",url,true);
    xmlHttp.onreadystatechange=recoverDate;
    xmlHttp.send(null);
}
//数据回调
function recoverDate(){
    if(xmlHttp.status==200 && xmlHttp.readyState==4){
        var txt=xmlHttp.responseText;
        alert(txt);
        location.reload();
    }

}