<?php include __DIR__. '/__connect_db.php';

$MBTI = isset($_GET['mbti']) ? ($_GET['mbti']) :'';
// $MBTI='EPST';

$sql = "SELECT * FROM `products` WHERE `mbti`= '$MBTI' AND `mottotype`='1'";	
echo($sql);
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


?>

	
	<div class="up_img">
		<div class="ani_icon">
			<div class="ani_icon_img"></div>
		</div>

		<div class="ani_wrap">
			<div class="ani_name">

				<p>守護精靈&nbsp;&nbsp;&nbsp;<?= $row['mbti_result'] ?></p>
			</div>
			<div class="ani_say">
				<?= $row['mbti_answer'] ?>
			</div>
		</div>
	</div>

	<div class="might_like">
		<p>你可能會喜歡</p>
		<div class="ani_item">
			<div class="item" id="<?= $row['sid'] ?>" style="background-image: url(<?= $row['pic_id'].'00.png' ?>);"></div>

			<?php  while($row = $result->fetch_assoc()): ?>
			<div class="item" id="<?= $row['sid'] ?>" style="background-image: url(<?= $row['pic_id'].'00.png' ?>);"></div>
			<?php endwhile; ?>
			
		</div>
	</div>

<script>
  $('.item').click(function() {
    location.href = 'single_product.php?sid=' + $(this).attr('id');
  })
</script>




