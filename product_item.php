<?php include __DIR__. '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// if(empty($sid)){
//     header("Location: product_list.php");
//     exit;
// }

$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


?>



  <!-- 經典木頭名字title -->
  <div class="this_woodname">
    <div><?= $row['animal'] ?></div>
  </div>


  <!-- 篩選過後的產品 -->
  <div class="product_item_filter">

    <div class="one_wood_product">

      <div class="one_product_img" id="<?= $row['pic_id'] ?>" style="background-image:url(images/single_product/wood/<?= $row['pic_id'] ?>.png);">
      </div>

      <div class="one_product_info">
        <p class="product_name">經典木質手機殼&nbsp;&nbsp;|&nbsp;&nbsp;<?= $row['productname'] ?></p>
        <p class="product_motto"><?= $row['introduction'] ?></p>
        <div class="product_price">NT <?= $row['price'] ?></div>
        <div class="add_to_cart"></div>
        <div class="add_to_love"></div>
      </div>

    </div>

  </div>
  <script>

  $('.one_product_img').click(function() {
    location.href = 'single_product.php?sid=6&type=' + $(this).attr('id').slice(3);
  })

  </script>
