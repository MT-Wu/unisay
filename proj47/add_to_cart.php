<?php
session_start();

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_GET['sid'])){
    $sid = intval($_GET['sid']);

    $qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;

    if(empty($qty)){
        unset( $_SESSION['cart'][$sid] ); // 移除設定
    } else {
        $_SESSION['cart'][$sid] = $qty; // 設定商品的數量
    }


}

echo json_encode($_SESSION['cart']);




