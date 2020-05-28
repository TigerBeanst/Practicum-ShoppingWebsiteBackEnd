<?php
include "../base/config.inc.php";
$data = json_decode(file_get_contents('php://input'), true);
$row = toArray(select("*","user","username='${data['username']}'"));
if (!empty($row)) {
    //不为空，说明存在此用户
    $result['reg_status'] = -1;
    $result['reg_msg'] = "user exists";
    echo(json_encode($result));
} else {
    //用户不存在
    $result['reg_status'] = 1;
    $result['reg_msg'] = 'reg success';
    $time = time();
    insert("user","username,password,name,email,bought_goods,status,reg_time,log_time","'${data['username']}','${data['password']}','${data['username']}','${data['email']}','',1,$time,$time");
    echo(json_encode($result));
}
