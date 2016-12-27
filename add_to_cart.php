<?php
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 24/12/2016
 * Time: 8:29 PM
 */
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);
    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;
    $type = isset($_GET['type']) ? intval($_GET['type']) : 1;
    $spec = isset($_GET['spec']) ? intval($_GET['spec']) : 1;

    if (empty($qty)) {
        unset($_SESSION['cart'][$sid]); // 移除設定
    } else {
//        $_SESSION['cart'][$sid] = $qty; // 設定商品的數量
        $_SESSION['cart'][$sid] = [$qty, $type, $spec]; // 設定商品的數量
    }


}
// print_r($_SESSION['cart']);


echo json_encode($_SESSION['cart']);




