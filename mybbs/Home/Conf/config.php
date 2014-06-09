<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stu
 * Date: 14-3-22
 * Time: 上午10:13
 * To change this template use File | Settings | File Templates.
 */
return  array(
    'URL_ROUTER_ON'   => true,#开启路由
    'URL_ROUTE_RULES'=>array(
      ),
    #数据库配置
   
    'DB_TYPE'      =>  'mysql',     // 数据库类型
    'DB_HOST'      =>  'localhost',     // 服务器地址
    'DB_NAME'      =>  'bbs',     // 数据库名
    'DB_USER'      =>  'root',     // 用户名
    'DB_PWD'       =>  '',     // 密码
    'DB_PORT'      =>  '3306',     // 端口
    'DB_PREFIX'    =>  '',     // 数据库表前缀
    
    'TMPL_PARSE_STRING'  =>array(
         '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则 
         '__JS__'     => '/mybbs/Public/js/', // 增加新的JS类库路径替换规则
         '__CSS__'     => '/mybbs/Public/css/', // 增加新的css类库路径替换规则
         '__IMAGES__'  => '/mybbs/Public/img/', // 增加新的JS类库路径替换规则
         '__UPLOAD__' => '/mybbs/Public/Uploads/', // 增加新的上传路径替换规则)
      ),
   );