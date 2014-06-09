/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-25
 * Time: 下午7:51
 * To change this template use File | Settings | File Templates.
 */
//回复权限验证
function yanzhen(){
    var _userid=document.getElementById('userID');
    var _zhe=document.getElementById('zhe');
    if(_userid.innerHTML==""){
        alert("你还没有登录,不能进行回复!");
        _zhe.style.display="block";
    }
}
