<?php
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 25/12/2016
 * Time: 12:15 PM
 */
require __DIR__ . '/__connect_db.php';

if (empty($_SESSION['cart'])) {
    header('Location: product_list.php');
    exit();
}

$sids = array_keys($_SESSION['cart']);

//$sql = "SELECT * FROM `products` WHERE `sid` IN (". implode(',', $sids). ") ";
$sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s) ", implode(',', $sids));
//echo $sql;
$result = $mysqli->query($sql);
$p_data = array();

while ($row = $result->fetch_assoc()) {
    $row['qty'] = $_SESSION['cart'][$row['sid']];
    $p_data[$row['sid']] = $row;
}

?>
<!-- fixed的按鈕 -->

<div class="cart_sidebar_content">

    <div class="buy_products">
        <?php foreach ($sids as $sid): ?>
            <div class="one_product" id="<?= $sid ?>" data-sid="<?= $sid ?>">

                <!-- 移除商品按鈕 -->
                <div class="product_remove remove-item" style="z-index:100;" onclick="remove_item_click">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <!-- 產品照 -->
                <div class="product_img">
                    <img src="images/product/classic/01-cherry-wood.png">
                </div>

                <!-- 產品介紹區 -->
                <div class="product_info">

                    <div class="product_name"><?= $p_data[$sid]['productname'] ?></div>

                    <div class="product_motto"><?= $p_data[$sid]['motto'] === '1' ? '' : $p_data[$sid]['motto'] ?></div>

                    <!-- 單價 -->
                    <div class="product_price">
                        NT <?= $p_data[$sid]['price'] ?>

                        <!-- 數量 -->
                        <div class="product_qty">數量：
                            <select name="qty" class="qty qty_sel" data-qty="<?= $p_data[$sid]['qty'] ?>"
                                    data-sid="<?= $p_data[$sid]['sid'] ?>" data-price="<?= $p_data[$sid]['price'] ?>">
                                <?php for ($i = 1; $i <= 9; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                    </div>


                    <!-- 小計 -->
                    <div class="calculate_price">小計：
                        <div class="price">NT
                            <span data-sid="<?= $sid ?>"><?= $p_data[$sid]['qty'] * $p_data[$sid]['price'] ?></span>
                        </div>
                    </div>


                </div>

            </div>
        <?php endforeach; ?>

    </div>


    <!-- 總金額結帳區 -->
    <div class="check_total_price">
        <div class="total_price">總金額
            <div class="price">NT <span id="totalPrice">0</span></div>
        </div>
        <div class="check_button" onclick="location.href='cartshoppinglist.php'">
            結&nbsp;&nbsp;&nbsp;帳
        </div>
    </div>


</div>

<script>
    // 初始化選取數量
    var qty_sel = $('.qty_sel');
    qty_sel.each(function () {
        var qty = $(this).attr('data-qty');
        $(this).val(qty);
    });
    // 選取數量一改變執行下面
    qty_sel.change(function () {

        var sid = $(this).attr('data-sid');
        var qty = $(this).val();
        var price = $(this).attr('data-price');
        var total_price = price * qty;

        $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
            console.log(data);
            calTotalQty(data);
            // main: shopping cart
            $('.p8 div[data-sid=' + sid + ']').text(total_price);

            // side: shopping cart
            console.log($('.calculate_price div span[data-sid=' + sid + ']'))
            $('.calculate_price div span[data-sid=' + sid + ']').text(total_price);
            calTotal();
        }, 'json');

    });

</script>