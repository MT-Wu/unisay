<?php include __DIR__. '/__connect_db.php';

if(! isset($_SESSION['user'])){
    header('Location: cart_list.php');
    exit;
}

if(empty($_SESSION['cart'])){
    header('Location: product_list.php');
    exit;
}

$sids = array_keys($_SESSION['cart']);
$sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s) ", implode(',', $sids));
$result = $mysqli->query($sql);
$p_data = array();

$totalPrice = 0;

while($row=$result->fetch_assoc()){
    $row['qty'] = $_SESSION['cart'][$row['sid']];
    $p_data[$row['sid']] = $row;

    $totalPrice += $row['qty']*$row['price'];
}


$sql = "INSERT INTO `orders`(
          `member_sid`, `amount`, `order_date`
        ) VALUES (
            {$_SESSION['user']['sid']},
            $totalPrice,
            NOW()
        )";
$mysqli->query($sql);
$order_sid = $mysqli->insert_id; //取得訂單編號


foreach($sids as $sid){
    $sql = "INSERT INTO `order_details`(
              `order_sid`, `product_sid`, `price`, `quantity`
            ) VALUES (
                $order_sid,
                $sid,
                {$p_data[$sid]['price']},
                {$p_data[$sid]['qty']}
            )";

    $mysqli->query($sql);
}

unset($_SESSION['cart']); //清空購物車

?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">
    <?php include __DIR__. '/__navbar.php' ?>

    <div class="alert alert-danger" role="alert">謝謝購買</div>
</div>
<?php include __DIR__. '/__html_foot.php' ?>