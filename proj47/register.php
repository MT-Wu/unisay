<?php
include __DIR__. '/__connect_db.php';
$page_name = 'register';

//判斷是否是post，有值才會執行
if(isset($_POST['email_id'])){
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    /*判斷必填欄位，是否不是空值*/
    if(!empty($email_id) and !empty($password) and !empty($nickname) ) {

      /*隨機產出一個驗證碼，在他的email後面加上uniqid()，再做sha1產生40碼的亂數
      uniqid()是和毫秒數有關的隨機變數，註冊時間不同即不同*/
        $cert = sha1($email_id.uniqid());
        $password = sha1($password);


/*變數需要加單引號，NOW()是現在註冊時間*/
        $sql = "INSERT INTO `members`(
            `email_id`, `password`, `nickname`, `mobile`, 
            `address`, `created_at`, `certification`
            ) VALUES (
            ?, ?, ?, ?,
            ?, NOW(), '$cert'
            )
           ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssss', $email_id, $password, $nickname, $mobile, $address);
        $success = $stmt->execute();
        $stmt->close();

    }

}


?>

<?php include __DIR__. '/__html_head.php'; ?>
    <div class="container">
        <?php include __DIR__. '/__navbar.php'; ?>

        <!--判斷$success是否有值且是有效值-->
        <?php if(isset($success) and $success): ?>
            <div class="alert alert-success" role="alert">註冊成功</div>
        <?php else: ?>
        <div class="col-lg-6 col-lg-offset-3">

            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    <h3 class="panel-title">會員註冊</h3>
                </div>
                <div class="panel-body">
                    <form name="form1" class="form-horizontal" method="post" onsubmit="return checkForm();"><!-- 不要讓表單送出 -->
                        <div class="form-group">
                            <label for="email_id" class="col-sm-2 control-label">* 帳號</label> <span id="email_id_info" style="color:red;display:none;">請填寫正確的 email 格式</span>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_id" name="email_id" placeholder="電子郵件帳號"
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
                            <label for="password2" class="col-sm-2 control-label">* 密碼確認</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="密碼確認">
                                <span class="label label-danger" style="display: none;">Danger</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nickname" class="col-sm-2 control-label">* 匿稱</label> <span id="nickname_info" style="color:red;display:none;">暱稱長度請設定大於 2 !</span>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="匿稱"
                                       value="<?= isset($_POST['nickname']) ? $_POST['nickname'] : '' ?>">
                                <span class="label label-danger" style="display: none;">Danger</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手機號碼</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手機號碼"
                                       value="<?= isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" name="address" id="address" cols="30" rows="10"><?= isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">註冊</button>
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
            var nickname = form1.nickname.value;
            var pattern2 = /^[a-z]\d{3}/;

            var isPass = true;

            //先把提示字元藏起來
            var info1 = $('#email_id_info');
            var info2 = $('#password_info');
            var info3 = $('#nickname_info');
            info1.hide();
            info2.hide();
            info3.hide();

            //test() 方法用于检测一个字符串是否匹配某个格式.
            if(! pattern.test(email_id)) {
                info1.show();
                info1.text('請填寫正確的 email 格式');
                isPass = false;
            }
            if(password.length < 6) {
                info2.show();
                isPass = false;
            }
            if(nickname.length < 2) {
                info3.show();
                isPass = false;
            }

            //格式都通過再檢查是否註冊過，用AJAX呼叫
            if(isPass) {
                $.get('aj__check_email_id.php', {email_id: email_id}, function(data){
                    if(data==='yes'){
                        info1.show();
                        info1.text('此 email 已註冊過');
                    } else if(data==='no') {
                        form1.submit();
                    }
                });
            }
            //前面如果通過就會直接submit，如果沒有通過回來就是false
            return false;
        }


    </script>

<?php include __DIR__. '/__html_foot.php'; ?>