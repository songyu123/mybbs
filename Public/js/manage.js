/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-3
 * Time: 下午7:53
 * To change this template use File | Settings | File Templates.
 */
    //切换管理模式
var yinyong=document.getElementById('manage')
var huyingyong=yinyong.getElementsByTagName('div');
function huanyingyong(y){
    for(var i=0;i<huyingyong.length;i++)
    {
        huyingyong[i].style.display='none';
    }
    huyingyong[y].style.display='block';
}

//管理员权限判断
function message(type){
    if(type != 'a'){
        huyingyong[0].style.display='block';
        huyingyong[1].style.display='none';
        alert('你不是管理员,不能进入用户管理!')
    }
}
