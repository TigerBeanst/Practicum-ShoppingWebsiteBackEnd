<?php
include "../base/config.inc.php";
$data = json_decode(file_get_contents('php://input'), true);
$row = toArray(select("*","user","username='${data['username']}' AND password = '${data['password']}'"));
// 只有一个的时候说明用户名和密码匹配
if (!empty($row)) {
    //echo "登录成功";
    $log_time = time();
    update("user","log_time = $log_time","username='${data['username']}'"); //保存本次登录时间
    $result = $row;
    $result['login_status'] = 1;
    $result['login_msg'] = 'login success';
    echo(json_encode($result));
} else {
    $result['login_status'] = -1;
    $result['login_msg'] = 'login fail';
    echo(json_encode($result));
}
