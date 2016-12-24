<?php
// `$page_name` = 'login';

require __DIR__. '/__connect_db.php';

if(isset($_POST['type'])){
  if($_POST['type'] === 'info') {

    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s'",
        $mysqli->escape_string($_SESSION['user']['email_id'])
    );

    $result = $mysqli->query($sql);

    $success = $result->num_rows>0;

    if($success){
        $row = $result->fetch_assoc();

            $sql = sprintf("UPDATE `members` SET `nickname`='%s',`mobile`='%s',`address`='%s' WHERE `sid`=%s",
                    $mysqli->escape_string($nickname),
                    $mysqli->escape_string($mobile),
                    $mysqli->escape_string($address),
                    $row['sid']
                );

        if($mysqli->query($sql)){
            $msg = array(
                'success' => true,
                'info' => '修改完成',
            );
            $_SESSION['user']['nickname'] = $nickname;
            $_SESSION['user']['mobile'] = $mobile;
            $_SESSION['user']['address'] = $address;


        }else{
            $msg = array(
                'success' => false,
                'info' => '錯誤, 請找開發人員',
            );
        }


    } else {
        $msg = array(
            'success' => false,
            'info' => '找不到這個人',
        );


    }

	} else if($_POST['type'] === 'password') {

		$password = $_POST['password'];
    $new_password = $_POST['new_password'];

    $password = sha1($password);

    $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s' AND `password`='%s'",
        $mysqli->escape_string($_SESSION['user']['email_id']),
        $mysqli->escape_string($password)
    );

    $result = $mysqli->query($sql);

    $success = $result->num_rows>0;

    if($success){

        $row = $result->fetch_assoc();

        $sql = sprintf("UPDATE `members` SET `password`='%s' WHERE `sid`=%s",
            sha1($new_password),
            $row['sid']);

        if($mysqli->query($sql)){
            $msg = array(
                'success' => true,
                'info' => '修改完成',
            );
        }else{
            $msg = array(
                'success' => false,
                'info' => '錯誤, 請找開發人員',
            );
        }


    } else {
        $msg = array(
            'success' => false,
            'info' => '密碼錯誤',
        );


    }


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
	<div class="con2">
	<!-- 麵包屑 -->
		<div class="loginnav">
			<p>ACCOUNT-MEMBER</p>
			<img src="images/member/line.svg">
		</div>

	<!-- 中間內容 -->

	<!-- 上方的bar -->
		<div class="upframe">
			<div class="up1">
				<img src="images/member/mushroom.svg">
				<a href="memberaccountmember.php">會員專區</a>
			</div>
			<div class="up2">
				<a href="memberaccounteditinfopw.php">修改資料</a>
			</div>
			<div class="up3">
				<a href="#">訂單查詢</a>
			</div>
		</div>

	<!-- 下方欄位 -->
		<div class="downframe1">
			<p>Edit Account Info  修改帳號資料</p>
			<img src="images/member/line2-01.svg">
		    <div class="editinfo">
			    <form class="editinfoarea" name="form1"  method="post">
						<div class="form-group">
                <label for="email_id">Email address</label>
                <input type="email" class="form-control" id="email_id" value="<?= $_SESSION['user']['email_id'] ?>" disabled>
            </div>
            <div class="form-group">
                <label for="nickname">* Nickname</label> <span id="nickname_info" style="color:red;display:none;">暱稱長度請設定大於 2 !</span>
                <input type="text" class="form-control" id="nickname" name="nickname"  value="<?= $_SESSION['user']['nickname'] ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile"  value="<?= $_SESSION['user']['mobile'] ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address"><?= $_SESSION['user']['address'] ?></input>
            </div>
					<div class="tab-editok">
						<input type="hidden" name="type" value="info">
						<a href="#" onclick="$(this).closest('form').submit()">確認修改</a>
					</div>
				</form>
			</div>
		</div>

		<div class="downframe3">
			<p>Edit Account Password  修改密碼</p>
			<img src="images/member/line2-01.svg">
			<form name="form1"  method="post">
				<div class="editpwarea">

					<div class="form-group">
							<label for="password">* Password</label> <span id="password_info" style="color:red;display:none;">密碼長度請設定大於 6 !</span>
							<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
							<label for="new_password">New password</label> <span id="password_info" style="color:red">不修改請留白</span>
							<input type="password" class="form-control" id="new_password" name="new_password">
					</div>

					<div class="tab-pweditok">
						<input type="hidden" name="type" value="password">
							<a href="#" onclick="$(this).closest('form').submit()">確認修改</a>
						</div>
				</div>
			</form>

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
