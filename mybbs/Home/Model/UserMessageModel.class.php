<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-24
 * Time: 下午8:20
 */

namespace Home\Model;
use Think\Model;

class UserMessageModel extends Model{
    protected $tableName =array('meessage','user');
    protected $tablePrefix = '';
} 