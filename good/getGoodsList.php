<?php
include "../base/config.inc.php";
if(isset($_GET['query'])){
    $where = "sell_status=1 AND title LIKE '%${_GET['query']}%'";
}else{
    $where = "sell_status=1";
}
$select = select("*", "goods", $where);
if (!empty($select)) {
    $result = array();
    while ($row = $select->fetch_assoc()) {
        $result[] = $row;
    }
    //没买过
    $result['getList_status'] = 1;
    $result['getList_msg'] = 'get bought list success, but never purchase anything';
    echo(json_encode($result));
} else {
    $result['getList_status'] = -1;
    $result['getList_msg'] = 'get bought list fail';
    echo(json_encode($result));
}
