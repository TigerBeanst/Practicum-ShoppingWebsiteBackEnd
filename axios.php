<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=utf-8');
$mysqli = new Mysqli('localhost','store','123456','store');
$mysqli->set_charset("utf8");
$sql = "select * from user";
$res = $mysqli->query($sql);
$arr = array();
while ($row = $res->fetch_assoc()){
    $arr[]=$row;
}
$res->free();
$mysqli->close();
echo(json_encode($arr));
