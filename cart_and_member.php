<?php
require __DIR__. '/__connect_db.php';
?>
<!-- fixed的按鈕 -->

<div class="cart_sidebar">
	<div class="cart_sidebar_content">

		<div class="buy_products">

			<div class="one_product">

				<!-- 移除商品按鈕 -->
				<div class="product_remove">
					<i class="fa fa-times" aria-hidden="true"></i>
				</div>

				<!-- 產品照 -->
				<div class="product_img">
					<img src="images/product/classic/01-cherry-wood.png">
				</div>

				<!-- 產品介紹區 -->
				<div class="product_info">

					<div class="product_name">貓頭鷹的決心</div>

					<div class="product_motto">可以哭，但絕對不能輸</div>

					<!-- 單價 -->
					<div class="product_price">
						NT 1000

						<!-- 數量 -->
						<div class="product_qty">數量：
							<select name="qty" class="qty">
		                        <option value="1">1</option>
		                        <option value="2">2</option>
		                        <option value="3">3</option>
		                        <option value="4">4</option>
		                        <option value="5">5</option>
		                        <option value="6">6</option>
		                        <option value="7">7</option>
		                        <option value="8">8</option>
		                        <option value="9">9</option>
		                    </select>
		                </div>

					</div>


	                <!-- 小計 -->
					<div class="calculate_price">小計：
						<div class="price">NT 1000</div>
					</div>



				</div>

			</div>


		</div>



		<!-- 總金額結帳區 -->
		<div class="check_total_price">
			<div class="total_price">總金額
				<div class="price">NT 4000</div>
			</div>
			<div class="check_button">
				結&nbsp;&nbsp;&nbsp;帳
			</div>
		</div>


	</div>
</div>



<div class="member_sidebar">
	<?php if(! isset($_SESSION['user'])): ?>
		<div class="member_sidebar_content">
			<div class="say_hello">
				嗨～歡迎來到UniSay<br>
				趕快加入我們吧：）
			<!-- 	嗨，Hana
				歡迎加入UniSay
				今天想說些什麼呢？ -->
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
