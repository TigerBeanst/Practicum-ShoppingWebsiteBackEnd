<?php
include "../../base/config.inc.php";
$row = toArray(select("bought_goods","user","username='${_GET['username']}'"));
if (!empty($row)) {
    if($row['bought_goods']==''){
        //没买过
        $result['bought_status'] = 1;
        $result['bought_msg'] = 'get bought list success, but never purchase anything';
    }else{
        //买过
        //$result['bought_list'] = json_decode($row['bought_goods']);
        $result['bought_list'] = json_decode($row['bought_goods']);
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
