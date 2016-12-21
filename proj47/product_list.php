<?php include __DIR__. '/__connect_db.php';
$page_name = 'product_list';

//$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$price = isset($_GET['price']) ? $_GET['price'] : '';

//串接頁面網址的後面GET部分
$where = " WHERE 1 ";  //表示true，後面接很多層過濾的AND比較順
$cate_param = '';
if(! empty($cate)){
    $where .= " AND `category_sid`=$cate "; //串接字串.=
    $cate_param = '&cate='. $cate;
}

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
    $price_param = '&price='. $price; //要秀在網址列的
}


$perPage = 4;
$sql = "SELECT count(1) FROM `products` $where"; //已經濾掉類別
//echo "$sql <br>";
$result = $mysqli->query($sql);
$totalRows = $result->fetch_row()[0];
$totalPages = ceil($totalRows/$perPage);

$page = $page>$totalPages ? $totalPages : $page; //避免輸入的頁碼過大
$beginIndex = $perPage * ($page-1);

//取出當頁商品LIMIT 當頁開始的index,總共幾筆
$sql = "SELECT * FROM `products` $where LIMIT $beginIndex, $perPage";
//echo "$sql <br>";

$result = $mysqli->query($sql);



?>
<?php include __DIR__. '/__html_head.php' ?>
    <div class="container">
        <?php include __DIR__. '/__navbar.php' ?>

    <div class="col-sm-12">
        <div class="col-sm-3">
        <div class="btn-group-vertical col-sm-12" role="group" aria-label="...">
            <a type="button" class="btn btn-default" href="product_list.php">所有商品</a>
            <a type="button" class="btn btn-default" href="?cate=1">程式設計</a>
            <a type="button" class="btn btn-default" href="?cate=2">繪圖軟體</a>
            <a type="button" class="btn btn-default" href="?cate=3">網際網路應用</a>
        </div>
        <div  style="margin-top: 40px;">
            <form action="">
                <div class="form-group">
                    <select name="price_sel" id="price_sel" class="form-control">
                        <option value="">所有價格</option>
                        <option value="p1">200 元以下</option>
                        <option value="p2">201~400元</option>
                        <option value="p3">401~600元</option>
                        <option value="p4">601~800元</option>
                        <option value="p5">801~1000元</option>
                    </select>
                </div>
            </form>
        </div>
    </div>

        <div class="col-sm-9">
            <div class="col-sm-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="?page=<?= $page-1>0 ? $page-1 : 1  ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for($i=1; $i<=$totalPages; $i++):?>
                            <li <?= $i==$page ? 'class="active"' : ''?>>
                                <a href="?page=<?= $i. $cate_param. $price_param ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li>
                            <a href="?page=<?= $page+1<$totalPages? $page+1: $totalPages?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
            <?php
            if($totalPages)
            while($row = $result->fetch_assoc()): ?>
            <div class="col-sm-6">
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
            <?php endwhile; ?>

        </div>


    </div>


    </div>
    <script>
        var params = <?= json_encode($_GET) ?>;

        $('#price_sel').on('change', function(){
            //alert( $(this).val() );

            var qs = '?price=' + $(this).val();

            if(params.cate){
                qs += '&cate=' + params.cate;
            }

            location.href = qs;
        });
        //讓換頁不要閃掉
        if(params.price){
            $('#price_sel').val( params.price );
        }

        $('.buy_btn').click(function(){
            //要買的sid(要用data-存起來sid才會跟著那顆鈕)
            var sid = $(this).attr('data-sid');

            //要買的數量
            //var qty = $(this).prev().val();
            var qty = $(this).closest('.caption').find('.qty').val();


            //alert(sid+":"+qty);

            $.get('add_to_cart.php', {sid:sid, qty:qty}, function(data){
                console.log(data);

                calTotalQty(data);

                alert('商品已加入購物車');
            }, 'json');

        });

    </script>
<?php include __DIR__. '/__html_foot.php' ?>