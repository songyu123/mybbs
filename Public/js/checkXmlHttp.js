/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-12-24
 * Time: 下午10:58
 * To change this template use File | Settings | File Templates.
 */
var xmlHttp;
function checkXmlHttp(){
    try{
        xmlHttp = new XMLHttpRequest();//w3c
    }catch (e){
        try{
        xmlHttp= new ActiveXObject("Msxml2.XMLHTTP"); //ie 7  ie6
        }catch (e){
            try{
        xmlHttp=new ActiveXObject("microsoft.XMLHTTP"); // ie6 以下
            }catch (e){
            alert("没有了!");
            }
        }
    }
}