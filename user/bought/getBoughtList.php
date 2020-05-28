<?php
include "../../base/config.inc.php";
$data = json_decode(file_get_contents('php://input'), true);
$row = toArray(select("bought_goods","user","username='${data['username']}'"));
if (!empty($row)) {
    if($row['bought_goods']==''){
        //没买过
        $result['bought_status'] = 1;
        $result['bought_msg'] = 'get bought list success, but never purchase anything';
    }else{
        //买过
        $result['bought_status'] = 2;
        $result['bought_msg'] = 'get bought list success, and has purchased something';
        $boughtList = json_encode($row['bought_goods']);
    }
    echo(json_encode($result));
} else {
    $result['bought_status'] = -1;
    $result['bought_msg'] = 'get bought list fail';
    echo(json_encode($result));
}
