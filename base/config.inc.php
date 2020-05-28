<?php
/*
 * 数据库配置文件
 */
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//MySQL 路径
$mysql_url = "localhost";
//MySQL 用户
$mysql_user = "store";
//MySQL 密码
$mysql_pw = "123456";
//MySQL 数据库
$mysql_db = "store";
//连接 MySQL
$conn = new Mysqli($mysql_url, $mysql_user, $mysql_pw,$mysql_db) or die("数据库服务器连接错误" . mysqli_error());
$conn->set_charset("utf8");
include "sql.php";
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=utf-8');
?>
