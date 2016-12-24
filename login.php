<?php
// `$page_name` = 'login';

require __DIR__. '/__connect_db.php';

if(isset($_POST['email_id'])){
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    if(!empty($email_id) and !empty($password) ) {
        $password = sha1($password);

        $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s' AND `password`='%s'",
            $mysqli->escape_string($email_id),
            $mysqli->escape_string($password)
            );

//        echo $sql;
//        exit;

        $result = $mysqli->query($sql);

        $success = $result->num_rows>0;

        if($success){
            $_SESSION['user'] = $result->fetch_assoc();
        }



/*        $sql = "INSERT INTO `members`(
            `email_id`, `password`, `nickname`, `mobile`,
            `address`, `created_at`, `certification`
            ) VALUES (
            ?, ?, ?, ?,
            ?, NOW(), '$cert'
            )
            ";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssss', $email_id, $password, $nickname, $mobile, $address);
        $success = $stmt->execute();
        $stmt->close();*/

    }

}




?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>UniSay</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/login_main.css" rel="stylesheet" type="text/css">


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

 	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
 	<!-- font-family: 'Titillium Web', sans-serif; -->


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
					<li class="icon_aboutus">
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


	<?php if(isset($success)): ?>
				<?php if($success): ?>
					<div class="con">
					<!-- 麵包屑 -->
						<div class="loginnav">
							<p>LOG IN</p>
							<img src="images/member/line.svg">
						</div>

					<!-- 中間提示內容 -->
					<div class="sign5">
						<img src="images/member/signframe5-1-01.png">
					 </div>

					<div class="btn-groups">
						<div class="btn-keepgoing">
							<a href="">繼續選購</a>
						</div>

						<div class="btn-back">
							<a href="">返回會員中心</a>
						</div>

						<div class="btn-logout">
							<a href="logout.php">會員登出</a>
						</div>
					</div>
					</div>
				<?php endif; ?>
			<?php else: ?>
				<div class="con">
				<!-- 麵包屑 -->
					<div class="loginnav">
						<p>LOG IN</p>
						<img src="images/member/line.svg">
					</div>

				<!-- 會員登入 -->



					<div class="signin" id="loginRight">
						<form class="mainbody1" name="form1" method="post"> <!-- 不要讓表單送出 -->
							<div class="picsignin">
								<img src="images/member/picsignin.svg">
							</div>
							<div class="form-group">
								<label for="">帳號：</label>
								<input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="">密碼：</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
							<a href="#">忘記密碼？</a>
							<div class="loginmember">

								<a href="#" onclick="$(this).closest('form').submit()">登入會員</a>

						</div>
					</form>
					</div>
				<!-- 加入會員 -->
					<div class="joinus" id="loginRight">
						<form class="mainbody2">
							<div class="piclogin">
								<img src="images/member/picjoinin.svg">
							</div>
							<div class="form-group">
								<label for="name">姓名：</label>
								<input type="text" name="" >
							</div>
							<div class="form-group">
								<label for="email_id">帳號：</label>
								<input type="text" name="" >
								<!-- <img src="../版/會員中心的版/ans.svg"> -->
							</div>
							<div class="form-group">
								<label for="passwrod">密碼：</label>
								<input type="text" name="">
							</div>
							<div class="form-group">
								<label for="pwagain">再確認：</label>
								<input type="text" name="">
							</div>
							<div class="form-group">
								<label for="birthday">生日：</label>
								<input type="date" class="form-control" name="birthday" id="birthday" placeholder="YYY-MM-DD">
							</div>
							<div class="form-group">
								<label for="mobile">電話：</label>
								<input type="text" name="">
							</div>
							<div class="joinmenber">
							<a href="#">加入會員</a>
							</div>
						</form>
					</div>

				</div>
	<?php endif; ?>




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
