<?php
header('content-type:text/html;charset=utf-8');
$str = 'abcdefg';
$st=md5($str);
echo $st;
?>