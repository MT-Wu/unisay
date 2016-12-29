<?php include __DIR__ . '/__connect_db.php';

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
while ($row = $result->fetch_assoc()): ?>
    <div class="one_product production_item" id="<?= $row['sid'] ?>">
        <div class="one_product_img production_link"  data-sid="<?= $row['sid'] ?>" style="background-image:url(<?= $row['pic_id'] ?>00.png);">
        </div>
        <div class="one_product_info">
            <p class="product_name"><?= $row['productname'] ?></p>
            <p class="product_motto"><?= $row['motto'] === '1' ? '' : $row['motto'] ?></p>
            <div class="product_price">NT <?= $row['price'] ?></div>
            <div class="add_to_cart production_link" data-sid="<?= $row['sid'] ?>"></div>
            <div class="add_to_love"></div>
        </div>
    </div>
    <script>
        $('.one_product_img.production_link').click(function () {
            location.href = 'single_product.php?sid=' + $(this).attr('data-sid');
        })
        $('.add_to_cart.production_link').click(function () {
            location.href = 'single_product.php?sid=' + $(this).attr('data-sid');
        })
    </script>
<?php endwhile; ?>
