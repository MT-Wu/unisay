<?php include __DIR__. '/__connect_db.php';

$price = isset($_GET['price']) ? $_GET['price'] : '';

$where = " WHERE 1 ";


$price_param = '';
if(! empty($price)){
    switch($price){
        case 'p1':
            $where .= " AND `price`<=200 ";
            break;
        case 'p2':
            $where .= " AND `price`<=400 AND `price`>200 ";
            break;
        case 'p3':
            $where .= " AND `price`<=600 AND `price`>400 ";
            break;
        case 'p4':
            $where .= " AND `price`<=800 AND `price`>600 ";
            break;
        case 'p5':
            $where .= " AND `price`<=1000 AND `price`>800 ";
            break;
    }

}


$sql = "SELECT * FROM `products` $where";


$result = $mysqli->query($sql);

            while($row = $result->fetch_assoc()): ?>
            <div class="col-lg-3">
                <div class="thumbnail" style="height:280px; margin:10px 0;">
                    <a class="single_product" href="single-product.php?sid=<?= $row['sid'] ?>">
                        <img src="imgs/small/<?= $row['book_id'] ?>.jpg" style="width: 100px; height: 135px;">
                    </a>
                    <div class="caption">
                        <h5><?= $row['bookname'] ?></h5>
                        <h5><?= $row['author'] ?></h5>
                        <p>
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
                        </p>
                    </div>
                </div>
            </div>
            <?php endwhile;