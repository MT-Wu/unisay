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


            
<div class="cart_sidebar_content">

    <div class="products_qty_note">
        <div class="qty_note_number">0</div>
    </div>

    <div class="buy_products">
        <?php if(isset($sids)): ?>
        <?php foreach ($sids as $sid): ?>
            <div class="one_product" id="<?= $sid ?>" data-sid="<?= $sid ?>">

                <!-- 移除商品按鈕 -->
                <div class="product_remove remove-item" style="z-index:100;">
                    <i class="fa fa-times" aria-hidden="true" data-sid="<?= $sid ?>"></i>
                </div>
                <!-- 產品照 -->
                <div class="product_img">
                    <img src="<?= $sid > 102 ? $p_data[$sid]['pic_id']  : $p_data[$sid]['pic_id'] . $p_data[$sid]['type_pic']?>">
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

<script src="js/shopping_cart.js"></script>