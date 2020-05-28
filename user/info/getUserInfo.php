<?php
include "../base/config.inc.php";
$id = $_GET['id'];
$select = select("*", "goods,cate_s,cate,shop", "id=$id AND goods.cate=cate_s.sid AND cate_s.cid=cate.cid AND goods.shop_id=shop.shopid");
if (!empty($select)) {
    $result = array();
    while ($row = $select->fetch_assoc()) {
        $result[] = $row;
    }
    $result['get_good_status'] = 1;
    $result['get_good_msg'] = 'get good detail success';
    echo(json_encode($result));
} else {
    $result['get_good_status'] = -1;
    $result['get_good_msg'] = 'get good detail fail';
    echo(json_encode($result));
}
