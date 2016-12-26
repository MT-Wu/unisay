<?php
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 25/12/2016
 * Time: 12:15 PM
 */
require __DIR__ . '/__connect_db.php';
require __DIR__ . '/cart.php';



?>
<!-- fixed的按鈕 -->

<!-- <div class="cart_icon">
    <div class="products_qty_note">
        <div class="qty_note_number">1</div>
    </div>
</div> -->
            
<div class="cart_sidebar_content">

    <div class="buy_products">
        <?php if(isset($sids)): ?>
        <?php foreach ($sids as $sid): ?>
            <div class="one_product" id="<?= $sid ?>" data-sid="<?= $sid ?>">

                <!-- 移除商品按鈕 -->
                <div class="product_remove remove-item" style="z-index:100;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
                <!-- 產品照 -->
                <div class="product_img">
                    <img src="<?= $p_data[$sid]['pic_id'] ?><?= $p_data[$sid]['type_pic'] ?>">
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
        <?php endif; ?>

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

    $('.remove-item').click(function () {
        console.log('remove item!');
        var sid = $(this).closest('i').attr('data-sid');
        var one_product = $(this).closest('.one_product');
        var sid = one_product.attr('data-sid');

        $.get('add_to_cart.php', {sid: sid}, function (data) {
            console.log(data);
            calTotalQty(data);
            one_product.remove();
            calTotal();
        }, 'json');

    });

    function calTotalQty(data) {
        var count = 0;
        for (var s in data) {
            count += data[s];
        }
        $('.cart_qty').text(count);
    }

    var calTotal = function () {

        var total = 0;
        $('.one_product').each(function () {
            total += parseInt($(this).children('div.product_info').children('div.calculate_price').children('div').children('span').text(), 10);
            console.log(total);
        });

        $('#totalPrice').text(total);
    };

    calTotal();



</script>