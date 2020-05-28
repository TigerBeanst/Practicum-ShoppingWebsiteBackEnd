<?php
include "../../base/config.inc.php";
if(isset($_GET['query'])){
    $where = " AND title LIKE '%${_GET['query']}%'";
}
$select = select("*", "goods,shop", "goods.shop_id=shop.shopid AND shop.owner='${_GET["username"]}'".$where);
if (!empty($select)) {
    $result = array();
    while ($row = $select->fetch_assoc()) {
        $result[] = $row;
    }
    //没买过
    $result['getList_shop'] = $result['0']['shop_name'];
    $result['getList_status'] = 1;
    $result['getList_msg'] = 'get good list success, but never purchase anything';
    echo(json_encode($result));
} else {
    $result['getList_status'] = -1;
    $result['getList_msg'] = 'get good list fail';
    echo(json_encode($result));
}
