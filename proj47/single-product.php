<?php include __DIR__. '/__connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

//如果首頁是空值，導回產品列表
if(empty($sid)){
    header("Location: product_list.php");
    exit;
}

$sql = "SELECT * FROM `products` WHERE `sid`= $sid";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


?>
<?php include __DIR__. '/__html_head.php' ?>
<div class="container">
    <?php include __DIR__. '/__navbar.php' ?>

    <div class="col-lg-12">
        <div class="thumbnail" style=" margin:10px 0;">
            <img src="imgs/big/<?= $row['book_id'] ?>.png" style="">
            <div class="caption">
                <h5><?= $row['bookname'] ?></h5>
                <h5><?= $row['author'] ?></h5>
                <div>
                    <span class="glyphicon glyphicon-search"></span>
                    <span class="label label-info">$ <?= $row['price'] ?></span>
                    
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
                    <button class="btn btn-warning btn-sm buy_btn" data-sid="<?= $row['sid'] ?>">買</button>
                    <p>
                        <?= $row['introduction'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__. '/__html_foot.php' ?>