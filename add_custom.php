<?php
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 24/12/2016
 * Time: 8:29 PM
 */
include __DIR__ . '/__connect_db.php';

$picture = $_POST['picture'];
$price = $_POST['price'];

$sql = "INSERT INTO `products` (`sid`, `productname`, `pic_id`, `price`)
                            VALUES (NULL, '客製化手機殼', '$picture', '$price');";

$mysqli->query($sql);
$order_sid = $mysqli->insert_id; //取得訂單編號

echo $order_sid;






