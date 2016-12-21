<?php
include __DIR__. '/__connect_db.php';
$page_name = 'login';

//判斷是否是post，有值才會執行
if(isset($_POST['email_id'])){
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];

    /*判斷必填欄位，是否不是空值*/
    if(!empty($email_id) and !empty($password)) {
        $password = sha1($password);

        $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s' AND `password`='%s'",
            $mysqli->escape_string($email_id),
            $mysqli->escape_string($password)
        );

//        echo $sql;
//        exit;
        $result = $mysqli->query($sql);

        //有抓到就是true，沒有就是0就是false
        $success = $result->num_rows>0;

        //存進SESSION
        if($success){
            $_SESSION['user'] = $result->fetch_assoc();
        }

    }

}


?>

<?php include __DIR__. '/__html_head.php'; ?>
    <div class="container">
        <?php include __DIR__. '/__navbar.php'; ?>

        <!--判斷$success是否有值且是有效值-->
        <?php if(isset($success)): ?>
            <?php if($success): ?>
                <div class="alert alert-success" role="alert">登入成功</div>
            <?php else: ?>
                <div class="alert alert-success" role="alert">登入失敗</div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(! isset($success) or $success==false): ?>
            <div class="col-lg-6 col-lg-offset-3">

                <div class="panel panel-default" style="margin-top: 50px">
                    <div class="panel-heading">
                        <h3 class="panel-title">會員登入</h3>
                    </div>
                    <div class="panel-body">
                        <form name="form1" class="form-horizontal" method="post" onsubmit="return checkForm();"><!-- 不要讓表單送出 -->
                            <div class="form-group">
                                <label for="email_id" class="col-sm-2 control-label">* 帳號</label> <span id="email_id_info" style="color:red;display:none;">請填寫正確的 email 格式</span>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email_id" name="email_id" placeholder="電子郵件帳號"
                                           value="<?= isset($_POST['email_id']) ? $_POST['email_id'] : '' ?>">
                                    <span class="label label-danger" style="display: none;">Danger</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">* 密碼</label> <span id="password_info" style="color:red;display:none;">密碼長度請設定大於 6 !</span>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="密碼">
                                    <span class="label label-danger" style="display: none;">Danger</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">登入</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <script>
//      格式確認
        function checkForm(){
          //  確認Email格式是否正確
            var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            var email_id = form1.email_id.value;
            var password = form1.password.value;

            var isPass = true;

            //先把提示字元藏起來
            var info1 = $('#email_id_info');
            var info2 = $('#password_info');
            info1.hide();
            info2.hide();

            //test() 方法用于检测一个字符串是否匹配某个格式.
            if(! pattern.test(email_id)) {
                info1.show();
                isPass = false;
            }
            if(password.length < 6) {
                info2.show();
                isPass = false;
            }

            return isPass;
        }


    </script>

<?php include __DIR__. '/__html_foot.php'; ?>