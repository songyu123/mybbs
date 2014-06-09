/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-31
 * Time: 下午9:16
 * To change this template use File | Settings | File Templates.
 */
//用户权限修改
/**
 * 登陆:
 */
var type=document.getElementById('type');
var xuan=document.getElementById('xuan');
var options=xuan.children;
options[3].style.display="none";
options[4].style.display="none";
type.onchange=function(){
    switch (type.value)
    {
        case 'a':options[0].style.display="block";
            options[1].style.display="block";
            options[2].style.display="block";
            options[3].style.display="none";
            options[4].style.display="none";break;
        case 'b':options[0].style.display="none";
            options[1].style.display="none";
            options[2].style.display="none";
            options[3].style.display="block"
            options[4].style.display="block";;break;
    }
}