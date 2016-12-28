<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>UniSay｜由你說</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/shoppingcart_main.css" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<!-- bootstrap -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="source/css/bootstrap.min.css" rel="stylesheet">
	<script src="source/js/bootstrap.min.js"></script> -->


<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
 	rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">	


<!-- fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
 	<!-- font-family: 'Cinzel Decorative', cursive; -->

 	<link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
 	<!-- font-family: 'Amita', cursive; -->

 	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
 	<!-- font-family: 'IM Fell English SC', serif; -->

 	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
 	<!-- font-family: 'Fredericka the Great', cursive; -->


</head>


<!-- ====================================================================================== -->


<body>
	


<!-- 主頁面內容 -->
<div class="wrap">
	
	<header>

		<!-- 平板手機會fixed的banner -->
		<div class="banner">

			<!-- 三明治選單 -->
			<div class="sandwich"></div>
			

			<!-- fixed的按鈕 -->
			
			<div class="cart_icon"></div>
			<div class="cart_sidebar"></div>

			<div class="member_icon"></div>
			<div class="member_sidebar"></div>

			<div class="totop_icon"></div>
			

			<!-- 中央logo -->
			<div class="logo"><img src="images/header/header_logo.svg" alt=""></div>
			
		


			<!-- 上方選單列 -->
			<nav> 
				<ul>
					<!-- 當前頁面掛上here的class -->
					<li class="icon_aboutus here">
						<a href="aboutus.html"></a>
					</li>
					<li class="icon_product">
						<a href="product.html"></a>
					</li>
					<li class="icon_custom">
						<a href=""></a>
					</li>
					<li class="icon_inspire">
						<a href=""></a>
					</li>
				</ul>
			</nav>


			<!-- 暗幕的背景 -->
			<div class="fixed_shadowbg"></div>

		</div><!-- banner包全部 -->

	</header>


<!-- ====================================================================================== -->


	<content>
	<div class="con">
	<!-- 進度navbar -->
	<div class="cart_navbar">
		<ul>
			<li class="cart_light on"><
				<div class="light_image"></div>
				<div class="light_text"><p class="doubleline">購物清單<br>與修改商品明細</p></div>
			</li>
			<li class="cart_light"><
				<div class="light_image"></div>
				<div class="light_text"><p>配送與付款方式</p></div>
			</li>
			<li class="cart_light"><
				<div class="light_image"></div>
				<div class="light_text"><p>填寫配送資料</p></div>
			</li>
			<li class="cart_light"><
				<div class="light_image"></div>
				<div class="light_text"><p>完成訂購</p></div>
			</li>
		</ul>
	</div>
	<!-- 下方內容 -->
	<div class="list">
		<!-- <img src="images/shoppingcart/shoppingbar.svg"> -->
		<div class="oneproduct_top">
			<div class="oneproduct_01">
				<div class="p1">
					<img src="images/member/squirrel.png">
				</div>
			</div>

			<div class="oneproduct_02">
				<div class="p2">商品名稱
					<div>
						貓頭鷹的決心
					</div>
				</div>

				<div class="p6">規格
					<div>
						iPhone
					</div>
				</div>

				<div class="wood">
					<div class="p7">材質</div>
					<div class="sel">
						<select name="wood" class="sel">
							<option selected="true">櫻桃木</option>
							<option>胡桃木</option>
							<option>楓木</option>
							<option>花梨木</option>
							<option>白橡木</option>
						</select>
					</div>
				</div>

			</div>
		</div>
		
		<div class="oneproduct_03">

			<div class="qty">
				<div class="p3">數量</div>
				<select name="qty" class="sel1">
					<option selected="true">1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>

			<div class="p4">單價
				<div>
					1000
				</div>
			</div>

			<div class="p5">折扣
				<div>
					200
				</div>
			</div>

			<div class="p8">小計金額
				<div>
					1200
				</div>
			</div>
		</div>
	</div>

	<div class="totalmoney2">
		<p>金額總計:1200元</p>
		<p>運費[7-11門市付款取貨服務,店配]</p>
		<p span style="color:red; font-size: 16px">應付總金額:1200元</p>
	</div>	

	<div class="filldata1">
		<div class="box-fill1">
			<p>填寫配送資料</p>
		</div>

		<div class="p11">
			<p>注意事項：請按下面按鈕選擇店配取貨門市。</p>
		</div>
		
		<div class="choosestore">
			<a href="http://emap.pcsc.com.tw/ecmap/default.aspx">選擇店配門市(將連結至7-11網站)</a>
		</div>

		<div class="textarea1">
			<form class="fillarea1">
				<div class="edit-group1">
						<label for="">提貨人姓名</label>
						<input type="text" name="">
				</div>

				<div class="edit-group1">
						<label for="">提貨人行動電話</label>
						<input type="text" name="">
				</div>

				<div class="edit-group1">
						<label for="">提貨通知email信箱</label>
						<input type="text" name="">
				</div>

				<div class="edit-group1">
						<label for=" ">備註說明</label>
						<input type="text" name="">
				</div>

				<!-- 這兩個要連結超商 -->
				<div class="edit-group1">
						<label for=" ">指定門市</label>
				</div>

				<!-- 這兩個要連結超商 -->
				<div class="edit-group1">
						<label for=" ">門市地址</label>
				</div>

				<div class="rechoose">
					<a href="http://emap.pcsc.com.tw/ecmap/default.aspx">上一步：重新選擇門市</a>
				</div>

				<div class="edit-group1">
						<label for="">發票資訊：託管電子發票</label>
				</div>
			</form>
		</div>

		<!-- 光箱提示 -->
			<a href="#0" class="cd-popup-trigger">確認結帳</a>

			<div class="cd-popup" role="alert">
			<div class="cd-popup-container">
				<p>訂單送出後即無法修改，<br>請確認訂單再送出。</p>
				<ul class="cd-buttons">
					<li><a href="#0">取消</a></li>
					<li><a href="#0">確認</a></li>
				</ul>
			<a href="#0" class="cd-popup-close img-replace">Close</a>
			</div> <!-- cd-popup-container -->
			</div> <!-- cd-popup -->
			
	</div>

	

	

	
	
	






	</div>
	

	</content>


<!-- ====================================================================================== -->


	<footer>
	


	</footer>


<!-- ====================================================================================== -->


</div><!-- wrap的結尾 -->



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="js/modernizr.js"></script> <!-- Modernizr -->
<script src="js/main.js"></script>


<script src="js/member.js"></script>


</body>
</html>