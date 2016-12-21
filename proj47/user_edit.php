<?php
include __DIR__. '/__connect_db.php';
$page_name = 'user_edit';

//判斷是否是post，有值才會執行
if(isset($_POST['password'])){
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $password = sha1($password);

    $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s' AND `password`='%s'",
        $mysqli->escape_string($_SESSION['user']['email_id']),
        $mysqli->escape_string($password)
    );


    $result = $mysqli->query($sql);

    $success = $result->num_rows>0;

    if($success){
        $row = $result->fetch_assoc();
        //看是否更新密碼，給定不同的$sql語法
        if(empty($new_password)){
            $sql = sprintf("UPDATE `members` SET `nickname`='%s',`mobile`='%s',`address`='%s' WHERE `sid`='%s'",
                $mysqli->escape_string($nickname),
                $mysqli->escape_string($mobile),
                $mysqli->escape_string($address),
                $row['sid']
                );
        } else {
            $sql = sprintf("UPDATE `members` SET `password`='%s', `nickname`='%s',`mobile`='%s',`address`='%s' WHERE `sid`='%s'",
                sha1($new_password),
                $mysqli->escape_string($nickname),
                $mysqli->escape_string($mobile),
                $mysqli->escape_string($address),
                $row['sid']
            //根據sid改最準確WHERE `sid`='%s'
            );
        }
        //執行$sql
        if($mysqli->query($sql)){
            $msg = array(
                'success' => true,
                'info' => '修改完成',
            );
            //更新修改資料到$_SESSION
            $_SESSION['user']['nickname'] = $nickname;
            $_SESSION['user']['mobile'] = $mobile;
            $_SESSION['user']['address'] = $address;

        }else{
            $msg = array(
                'success' => false,
                'info' => '錯誤, 請找開發人員',
            );
        }
    //沒有抓到這個人的帳號密碼
    } else {
        $msg = array(
            'success' => false,
            'info' => '密碼錯誤',
        );


    }

}


?>
<?php include __DIR__. '/__html_head.php'; ?>
    <div class="container">
        <?php include __DIR__. '/__navbar.php'; ?>

        <!--上面訊息有設定就要顯示在這裡-->
        <?php if(isset($msg)): ?>

            <div class="alert alert-<?= $msg['success'] ? 'success' : 'danger' ?>" role="alert"><?= $msg['info'] ?></div>

        <?php endif; ?>

        <!--判斷$msg是否有值是否有效-->
        <?php if(!isset($msg) or $msg['success']==false): ?>
        <div class="col-lg-6 col-lg-offset-3">

            <div class="panel panel-default" style="margin-top: 50px">
                <div class="panel-heading">
                    <h3 class="panel-title">會員資料修改</h3>
                </div>
                <div class="panel-body">
                    <form name="form1" class="form-horizontal" method="post" onsubmit="return checkForm();"><!-- 先不要讓表單送出 -->
                        <!--帳號不能修改  disabled-->
                        <div class="form-group">
                            <label for="email_id" class="col-sm-2 control-label">* 帳號</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_id" name="email_id" value="<?= $_SESSION['user']['email_id'] ?>" disabled>
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
                            <label for="new_password" class="col-sm-2 control-label">更新密碼</label><span id="password_info" style="color:red">不修改請留白</span>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="請填新密碼">
                                <span class="label label-danger" style="display: none;">Danger</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nickname" class="col-sm-2 control-label">* 匿稱</label> <span id="nickname_info" style="color:red;display:none;">暱稱長度請設定大於 2 !</span>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="匿稱"
                                       value="<?= $_SESSION['user']['nickname'] ?>">
                                <span class="label label-danger" style="display: none;">Danger</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">手機號碼</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手機號碼"
                                       value="<?= $_SESSION['user']['mobile'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" name="address" id="address" cols="30" rows="10"><?= $_SESSION['user']['address'] ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">確認修改</button>
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
          //  確認格式是否正確
            var password = form1.password.value;
            var nickname = form1.nickname.value;

            var isPass = true;

            //先把提示字元藏起來
            var info2 = $('#password_info');
            var info3 = $('#nickname_info');
            info2.hide();
            info3.hide();


            if(password.length < 6) {
                info2.show();
                isPass = false;
            }
            if(nickname.length < 2) {
                info3.show();
                isPass = false;
            }


            return true;
        }


    </script>

<?php include __DIR__. '/__html_foot.php'; ?>