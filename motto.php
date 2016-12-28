<?php include __DIR__ . '/__connect_db.php';

// 友情
$sql = "SELECT * FROM `products` WHERE `introduction`= 'True' AND `mottotype`='friendship' ORDER BY RAND() LIMIT 1";	
// echo($sql);
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

// 勵志
$sql2 = "SELECT * FROM `products` WHERE `introduction`= 'True' AND `mottotype`='encourage' ORDER BY RAND() LIMIT 1";	
// echo($sql2);
$result2 = $mysqli->query($sql2);
$row2 = $result2->fetch_assoc();

// 愛情

// $type =isset($_POST['type']) ? ($_POST['type']) :'';
// echo('tttt'.$type);

// if($type=='3'){
// 	echo('ggggg');
// 	$sql3 = "SELECT * FROM `products` WHERE `introduction`= 'True' AND `mottotype`='love'  ORDER BY RAND() LIMIT 1";	

// 	$result3 = $mysqli->query($sql3);
// 	$row3 = $result3->fetch_assoc();

// }

$sql3 = "SELECT * FROM `products` WHERE `introduction`= 'True' AND `mottotype`='love'  ORDER BY RAND() LIMIT 1";	

$result3 = $mysqli->query($sql3);
$row3 = $result3->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>UniSay</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/motto.css" rel="stylesheet" type="text/css">


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
					<li class="icon_aboutus">
						<a href="aboutus.html"></a>
					</li>
					<li class="icon_product">
						<a href="product.html"></a>
					</li>
					<li class="icon_custom">
						<a href="custom.html"></a>
					</li>
					<li class="icon_inspire here">
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
		<div class="big_frame">
			<div class="select_frame">
				<!-- 第一類 -->
				<div class="frames friend">
					<div class="group bg_friend">
						<div class="hug hug1">
							<!-- 格言圖片-->
							<div class="img_friend">
								<!-- 格言 -->
								<div class="motto">
									<p><?= $row['motto'] ?></p>
									<p><?= $row['motto_translate'] ?></p> 
								</div>
								<div class="author">- <?= $row['author'] ?> -</div>
							</div>
							<!-- 相關商品 -->
							<div class="down">
								<div class="middle">
									<p>相關商品</p>
									<div class="shareBar">
										<div class="share_icons">
										<ul class="share-buttons">
											<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Facebook</span></a></li>
											<li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fminimony.bitbucket.org&text=UniSay:%20http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i><span class="sr-only">Tweet</span></a></li>
											<li><a href="https://plus.google.com/share?url=http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Share on Google+"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Google+</span></a></li>
											<li><a href="http://www.tumblr.com/share?v=3&u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay&s=" target="_blank" title="Post to Tumblr"><i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i><span class="sr-only">Post to Tumblr</span></a></li>
											<li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fminimony.bitbucket.org&description=%E7%94%B1%E4%BD%A0%E8%AA%AA%20%3A%3A%20%E7%B6%93%E5%85%B8%E6%9C%A8%E8%B3%AA%E6%89%8B%E6%A9%9F%E6%AE%BC%0A%E4%BE%86%E6%89%BE%E5%B0%88%E5%B1%AC%E6%96%BC%E8%87%AA%E5%B7%B1%E7%8D%A8%E4%B8%80%E7%84%A1%E4%BA%8C%E7%9A%84%E6%89%8B%E6%A9%9F%E6%AE%BC%E5%90%A7%3AD" target="_blank" title="Pin it"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i><span class="sr-only">Pin it</span></a></li>
										</ul>
										</div>
									</div>
									<div class="playAgain" id="f"></div>
								</div>
								<div class="item">
									<div class="item1" id="<?= $row['sid'] ?>" style="background-image: url(<?= $row['pic_id'].'/00.png' ?>);"></div>
								</div>
							</div>
						</div>
					</div>

					
					<div class="icon_img"></div>					
				</div>
				<!-- 第二類 -->
				<div class="frames encourage">
					<div class="group bg_encourage">
						<div class="hug hug2">
							<!-- 格言圖片-->
							<div class="img_encourage">
								<!-- 格言 -->
								<div class="motto">
									<p><?= $row2['motto'] ?></p>
									<p><?= $row2['motto_translate'] ?></p> 
								</div>
								<div class="author">- <?= $row2['author'] ?> -</div>
							</div>
							<!-- 相關商品 -->
							<div class="down">
								<div class="middle">
									<p>相關商品</p>
									<div class="shareBar">
										<div class="share_icons">
										<ul class="share-buttons">
											<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Facebook</span></a></li>
											<li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fminimony.bitbucket.org&text=UniSay:%20http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i><span class="sr-only">Tweet</span></a></li>
											<li><a href="https://plus.google.com/share?url=http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Share on Google+"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Google+</span></a></li>
											<li><a href="http://www.tumblr.com/share?v=3&u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay&s=" target="_blank" title="Post to Tumblr"><i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i><span class="sr-only">Post to Tumblr</span></a></li>
											<li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fminimony.bitbucket.org&description=%E7%94%B1%E4%BD%A0%E8%AA%AA%20%3A%3A%20%E7%B6%93%E5%85%B8%E6%9C%A8%E8%B3%AA%E6%89%8B%E6%A9%9F%E6%AE%BC%0A%E4%BE%86%E6%89%BE%E5%B0%88%E5%B1%AC%E6%96%BC%E8%87%AA%E5%B7%B1%E7%8D%A8%E4%B8%80%E7%84%A1%E4%BA%8C%E7%9A%84%E6%89%8B%E6%A9%9F%E6%AE%BC%E5%90%A7%3AD" target="_blank" title="Pin it"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i><span class="sr-only">Pin it</span></a></li>
										</ul>
										</div>
									</div>
									<div class="playAgain" id="e"></div>
								</div>
								<div class="item">
									<div class="item1" id="<?= $row2['sid'] ?>" style="background-image: url(<?= $row2['pic_id'].'/00.png' ?>);"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="icon_img"></div>
				</div>
				<!-- 第三類 -->
				<div class="frames love">

					<div class="group bg_love">
						<div class="hug hug3">
							<!-- 格言圖片-->
							<div class="img_love">
								<!-- 格言 -->
								<div class="motto">
									<p><?= $row3['motto'] ?></p>
									<p><?= $row3['motto_translate'] ?></p> 
								</div>
								<div class="author">- <?= $row3['author'] ?> -</div>
							</div>
							<!-- 相關商品 -->
							<div class="down">
								<div class="middle">
									<p>相關商品</p>
									<div class="shareBar">
										<div class="share_icons">
										<ul class="share-buttons">
											<li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Facebook</span></a></li>
											<li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fminimony.bitbucket.org&text=UniSay:%20http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i><span class="sr-only">Tweet</span></a></li>
											<li><a href="https://plus.google.com/share?url=http%3A%2F%2Fminimony.bitbucket.org" target="_blank" title="Share on Google+"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i><span class="sr-only">Share on Google+</span></a></li>
											<li><a href="http://www.tumblr.com/share?v=3&u=http%3A%2F%2Fminimony.bitbucket.org&t=UniSay&s=" target="_blank" title="Post to Tumblr"><i class="fa fa-tumblr-square fa-2x" aria-hidden="true"></i><span class="sr-only">Post to Tumblr</span></a></li>
											<li><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fminimony.bitbucket.org&description=%E7%94%B1%E4%BD%A0%E8%AA%AA%20%3A%3A%20%E7%B6%93%E5%85%B8%E6%9C%A8%E8%B3%AA%E6%89%8B%E6%A9%9F%E6%AE%BC%0A%E4%BE%86%E6%89%BE%E5%B0%88%E5%B1%AC%E6%96%BC%E8%87%AA%E5%B7%B1%E7%8D%A8%E4%B8%80%E7%84%A1%E4%BA%8C%E7%9A%84%E6%89%8B%E6%A9%9F%E6%AE%BC%E5%90%A7%3AD" target="_blank" title="Pin it"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i><span class="sr-only">Pin it</span></a></li>
										</ul>
										</div>
									</div>
									<div class="playAgain" id="l"></div>
								</div>
								<div class="item">
									<div class="item1" id="<?= $row3['sid'] ?>" style="background-image: url(<?= $row3['pic_id'].'/00.png' ?>);"></div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="icon_img"></div>
				</div>
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
<script src="js/motto.js"></script>

<script>
  $('.item1').click(function() {
    location.href = 'single_product.php?sid=' + $(this).attr('id');
  })



</script>

</body>
</html>