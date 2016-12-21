<?php
$page_name = isset($page_name)? $page_name:'';
?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">UniSay</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php  if($page_name=='product_list')
                        echo 'class="active"';
                    ?>><a href="product_list.php">商品列表</a></li>
                    <li <?= ($page_name=='cart_list') ? 'class="active"' : '' ?>>
                        <a href="cart_list.php">購物車 <span class="label label-info cart_qty"></span></a></li>


                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['user'])): ?>
                        <li <?= ($page_name=='user_edit') ? 'class="active"' : '' ?>>
                            <a href="user_edit.php"><?= $_SESSION['user']['nickname'] ?></a></li>
                        <li>
                            <a href="logout.php">登出</a></li>
                    <?php else: ?>
                        <li <?= ($page_name=='login') ? 'class="active"' : '' ?>>
                            <a href="login.php">會員登入</a></li>
                        <li <?= ($page_name=='register') ? 'class="active"' : '' ?>>
                            <a href="register.php">會員註冊</a></li>
                    <?php endif ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<script>
    //算目前購物車裡面的總數
    function calTotalQty(data) {
        var count = 0;

        //for(key in array)
        for(var s in data) {
            //data[s]=這個key(sid)對應的數量
            count += data[s];
        }

        //nav購物車旁邊的數字
        $('.cart_qty').text(count);
    }

</script>