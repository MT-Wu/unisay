<?php
require __DIR__ . '/__connect_db.php';

//if (empty($_SESSION['cart'])) {
//    header('Location: product_list.php');
//    exit();
//}

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

<div class="cart_sidebar">
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
                                <select name="qty" class="qty qty_sel" data-qty="<?= $p_data[$sid]['qty'] ?>"  data-sid="<?= $p_data[$sid]['sid'] ?>" data-price="<?= $p_data[$sid]['price'] ?>">
                                    <?php for($i=1; $i<=9; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>

                        </div>


                        <!-- 小計 -->
                        <div class="calculate_price">小計：
                            <div class="price">NT <spac data-sid="<?= $sid ?>"><?= $p_data[$sid]['qty']*$p_data[$sid]['price'] ?></spac></div>
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
</div>


<div class="member_sidebar">
    <?php if (!isset($_SESSION['user'])): ?>
        <div class="member_sidebar_content">
            <div class="say_hello">
                嗨～歡迎來到UniSay<br>
                趕快加入我們吧：）
            </div>

            <div class="member_info">
                <div class="login" onclick="location.href='login.php'">登入</div>
                <div class="register" onclick="location.href='login.php'">註冊</div>
            </div>

            <div class="member_note">
                ＊UniSay提供手機殼終身保固<br>
                <br>
                ＊現在加入立即取得首購禮<br>
                <br>
                ＊會員獨享舊殼換新殼現賺購物金<br>
                &nbsp;&nbsp;&nbsp;&nbsp;環保愛地球也讓自己有好新情<br>
                &nbsp;&nbsp;&nbsp;&nbsp;詳情請見->舊換新回收制度<br>
            </div>

        </div>
    <?php else: ?>
        <div class="member_sidebar_content">
            <div class="say_hello">
                嗨，<?= $_SESSION['user']['nickname'] ?><br>
                歡迎加入UniSay：） <br>
                今天想說些什麼呢？
            </div>

            <div class="member_info">
                <div onclick="location.href='memberaccountmember.php'">會員專區</div>
                <div onclick="location.href='memberaccounteditinfopw.php'">修改資料</div>
                <div>訂單查詢</div>
                <div onclick="location.href='logout.php'">登出</div>

            </div>

            <div class="member_note">
                ＊UniSay提供手機殼終身保固<br>
                <br>
                ＊現在加入立即取得首購禮<br>
                <br>
                ＊會員獨享舊殼換新殼現賺購物金<br>
                &nbsp;&nbsp;&nbsp;&nbsp;環保愛地球也讓自己有好新情<br>
                &nbsp;&nbsp;&nbsp;&nbsp;詳情請見->舊換新回收制度<br>
            </div>

        </div>
    <?php endif ?>

</div>
