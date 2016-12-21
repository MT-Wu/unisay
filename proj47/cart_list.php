<?php include __DIR__ . '/__connect_db.php';

$page_name = 'cart_list';
//若購物車沒有東西，就轉回產品頁
if(empty($_SESSION['cart'])){
    header('Location: product_list.php');
    exit();
}

//存陣列裡面所有的keys(就是各項商品SID
//這裡回傳的是書的編號，並且會按照USER加入的順序排，例如：12,5,6
$sids = array_keys($_SESSION['cart']);

//implode(',', $sids) 用逗號串接$sids
//從SQL抓的資料，會依序排列，不會按照加入的順序排，後面要想辦法解決此問題
//$sql = "SELECT * FROM `products` WHERE `sid` IN (". implode(',', $sids). ") ";
$sql = sprintf("SELECT * FROM `products` WHERE `sid` IN (%s) ", implode(',', $sids));
echo $sql;
$result = $mysqli->query($sql);
$p_data = array();

while($row=$result->fetch_assoc()){
    //存數量到當前的$row裡面(增加一個KEY為qty)
    $row['qty'] = $_SESSION['cart'][$row['sid']];
    //新增$p_data來解決 SQL抓出來的資料順序與加入購物車順序 不一樣的問題
    $p_data[$row['sid']] = $row;
}

//輸出來看$p_data長相(除錯方式)
//print_r($p_data);

?>
    <style>
        .remove-item {
            font-size: 36px;
            color: mediumvioletred;
            cursor: pointer;
        }
    </style>
<?php include __DIR__ . '/__html_head.php' ?>
    <div class="container">
        <?php include __DIR__ . '/__navbar.php' ?>


        <div class="bs-example" data-example-id="striped-table">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>取消</th>
                    <th>封面</th>
                    <th>書名</th>
                    <th>價格</th>
                    <th>數量</th>
                    <th>小計</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($sids as $sid): ?>
                    <tr data-sid="<?= $sid ?>">
                        <!--  移除商品或修改數量時，皆需要拿到該書編號，因此在這裡加上該書編號 -->
                        <td>
                            <span class="glyphicon glyphicon-remove-sign remove-item" aria-hidden="true"></span>
                        </td>
                        <td><img src="imgs/small/<?= $p_data[$sid]['book_id'] ?>.jpg" alt=""></td>
                        <td><?= $p_data[$sid]['bookname'] ?></td>
                        <td><?= $p_data[$sid]['price'] ?></td>
                        <td>
                            <!-- 數量使用combo box -->
                            <select class="qty_sel" data-qty="<?= $p_data[$sid]['qty'] ?>">
                                <?php for($i=1;$i<=10;$i++) : ?>
                                    <!-- 前端做法 -->
                                    <!-- select加上class和data-qty(訂購數量)，再用JQ抓 -->
                                    <option value="<?= $i ?>"><?= $i ?></option>

                                    <!-- 後端做法 -->
                                    <!-- 當數字跑到和訂購數量相同時，該optoin設定selected，面板就會顯示該訂購數量 -->
                                    <!--
                                <option value="<?= $i ?>" <?= $i==$p_data[$sid]['qty']?  'selected':'' ?>><?= $i ?></option>
                            -->
                            <?php endfor; ?>
                        </select>
                        <!--?= $p_data[$sid]['qty'] ?-->
                    </td>
                    <!--  算小計總金額  -->
                    <td><?= $p_data[$sid]['qty']*$p_data[$sid]['price'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="alert alert-info" role="alert"> 共計: <strong id="totalPrice"></strong> 台幣</div>

            <?php if(! isset($_SESSION['user'])): ?>
                <a type="button" class="btn btn-default" href="login.php">結帳前請先登入</a>
            <?php else: ?>
                <a type="button" class="btn btn-danger" href="buy.php">結帳</a>
            <?php endif; ?>
        </div>

</div>
<script>
    //移除商品的方法
    $('.remove-item').click(function () {
        //得到目前該書的編號
        var sid =$(this).closest('tr').attr('data-sid');
        //方便下面區域函式抓取到該行tr
        var tr = $(this).closest('tr');

        //呼叫ajax，去刪除該書
        //add_to_cart.php裡有設定，輸入產品但沒有輸入數量時，就移除此商品
        $.get('add_to_cart.php', {sid:sid}, function(data){
            console.log(data);
            //更新購物車數量
            calTotalQty(data);
            //location.href = location.href; //刷新頁面, 第一種作法

            tr.remove(); // 移除 tr 元素, 第二種作法

            //更新總價
            calTotal();
        }, 'json');
    });


    var qty_sel = $('.qty_sel')
    //顯示商品訂購數量(前端方法)
    qty_sel.each(function () {
        //抓到數量
        var qty = $(this).attr('data-qty');
        //把值塞進去
        $(this).val(qty);
    });


    //當訂購數量改變時
    qty_sel.change(function () {
        //取得書編、數量
        var tr = $(this).closest('tr');
        var sid = tr.attr('data-sid');
        var qty = $(this).val();
        //找到tr下面的第四個(index=3)內容值
        var price = tr.find('td').eq(3).text();

        //呼叫AJAX更新資訊
        $.get('add_to_cart.php', {sid:sid, qty:qty}, function(data){
            console.log(data);
            //更新購物車數量
            calTotalQty(data);

            //回傳新的小計到小計欄位。找到tr下面的第六個(index=5)td欄位，將內容值更新
            tr.find('td').eq(5).text(price * qty);

            //更新總價
            calTotal();
        }, 'json');
    });

    //算總價
    var calTotal = function () {
        //先設總價為0
        var total = 0;
        //  $('tr[data-sid]')  可以抓到有data-sid屬性的tr
        // 將每一列的價格加總
        $('tr[data-sid]').each(function(){
            total += $(this).find('td').eq(3).text() * $(this).find('.qty_sel').val();
            //console.log($(this).find('td').eq(3).text(),  $(this).find('.qty_sel').val());
        });

        $('#totalPrice').text(total);
    };

    calTotal();
</script>
<?php include __DIR__ . '/__html_foot.php' ?>