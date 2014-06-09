<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-3-24
 * Time: 下午10:23
 */

namespace Home\Model;

use Think\Model;
class UserMessagesModel extends Model{
    protected $tableName =array('messages','user');
    protected $tablePrefix = '';
} 