<?php include __DIR__. '/__connect_db.php';

if (isset($_GET['animal'])) {
  $animal = isset($_GET['animal']) ? $_GET['animal'] : '';
  $sql = "SELECT * FROM `products` WHERE `animal`= '$animal'";
} else {
  $mottotype = isset($_GET['mottotype']) ? $_GET['mottotype'] : '';
  $sql = "SELECT * FROM `products` WHERE `mottotype`= '$mottotype'";
}
$result = $mysqli->query($sql);

?>
<?php
while($row = $result->fetch_assoc()): ?>
<div class="one_product" id="<?= $row['sid'] ?>">
						<div class="one_product_img" style="background-image:url(<?= $row['pic_id'] ?>00.png);">
						</div>
						<div class="one_product_info">
							<p class="product_name"><?= $row['productname'] ?></p>
							<p class="product_motto"><?= $row['motto'] === '1' ? '' : $row['motto'] ?></p>
							<div class="product_price">NT <?= $row['price'] ?></div>
							<div class="add_to_cart"></div>
							<div class="add_to_love"></div>
						</div>
</div>
<script>
  $('.one_product').click(function() {
    location.href = 'single_product.php?sid=' + $(this).attr('id');
  })
</script>
<?php endwhile; ?>
