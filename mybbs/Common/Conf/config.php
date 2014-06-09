<?php
/**
 * 网站全局配置项目
 *  网站采用分组的方式
 */
$appconf=array(
	//'配置项'=>'配置值'
    #模块配置项目
     'MODULE_ALLOW_LIST'=>array('Home','Admin','User'),#模块分组
     'DEFAULT_MODULE' =>'Home',  // 默认模块
     'MODULE_DENY_LIST'      =>  array('Common','Runtime','User'),#配置禁止访问模块
     #url配置项目
    'URL_MODEL'             =>  2,
    #日志配置
    'LOG_RECORD'            =>   true,   // 默认不记录日志
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别'LOG_EXCEPTION_RECORD'  =>  false,    // 是否记录异常信息日志
   
        );


