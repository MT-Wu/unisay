<?php
require __DIR__ . '/__connect_db.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$mid = $_SESSION['user']['sid'];
$sql = "SELECT * FROM `orders` JOIN members ON members.sid=orders.member_sid WHERE `member_sid` = $mid";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>UniSay</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/login_main.css" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"


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
					<li class="icon_aboutus ">
						<a href="aboutus.html"></a>
					</li>
					<li class="icon_product">
						<a href="product.html"></a>
					</li>
					<li class="icon_custom">
						<a href="custom.html"></a>
					</li>
					<li class="icon_inspire">
						<a href="inspire.html"></a>
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
	<!-- 麵包屑 -->
		<div class="loginnav">
			<p>ACCOUNT-MEMBER</p>
			<img src="images/member/line.svg">
		</div>

	<!-- 上方的bar -->
		<div class="upframe">
			<div class="up1">
				<a href="memberaccountmember.php">會員專區</a>
			</div>
			<div class="up2">
				<a href="memberaccounteditinfopw.php">修改資料</a>
			</div>
			<div class="up3 here">
				<img src="images/member/mushroom.svg">
				<a href="">訂單查詢</a>
			</div>
		</div>

	<!-- 下方欄位 -->
		<div class="downframe2">
			<p>ORDERS  訂單查詢</p>
			<img src="images/member/line2-01.svg">
		</div>
		
		<table class="table table-condensed"> 
			<thead> 
				<tr> 
					<th>訂購日期</th> 
    				<th>訂購編號</th> 
    				<th>訂單狀態</th> 
    				<th>應付金額</th> 
    				<th>退貨</th>
    				<th>發票</th> 
				</tr> 
			</thead> 

			<tbody>
                <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td scope="row"><?=$row['order_date']?></td>
                        <td><?= ''?></td>
                        <td>已出貨</td>
                        <td>$ <?=$row['amount']?></td>
                        <td><a href="#">申請退貨</a></td>
                        <td><a href="member_ordered_detail.php">查詢</a></td>
                    </tr>
                <?php endwhile; ?>
			</tbody> 
		</table>
		

		</div>
		


	
	</div>

	

	

	</content>


<!-- ====================================================================================== -->


	<footer>
	


	</footer>


<!-- ====================================================================================== -->


</div><!-- wrap的結尾 -->



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="js/nav_icon.js"></script>



</body>
</html>