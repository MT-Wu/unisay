<?php
require __DIR__ . '/__connect_db.php';
/**
 * Created by PhpStorm.
 * User: ying-raylu
 * Date: 25/12/2016
 * Time: 1:37 PM
 */
?>

<?php if (!isset($_SESSION['user'])): ?>
    <div class="member_sidebar_content">
        <div class="say_hello">
            嗨～歡迎來到UniSay<br>
            趕快加入我們吧：）
        </div>

        <div class="member_info">
            <div class="login" onclick="location.href='login.php'">登入</div>
            <div class="register" onclick="location.href='login.php'">註冊</div>
        </div>

        <div class="member_note">
            ＊UniSay提供手機殼終身保固<br>
            <br>
            ＊現在加入立即取得首購禮<br>
            <br>
            ＊會員獨享舊殼換新殼現賺購物金<br>
            &nbsp;&nbsp;&nbsp;&nbsp;環保愛地球也讓自己有好新情<br>
            &nbsp;&nbsp;&nbsp;&nbsp;詳情請見->舊換新回收制度<br>
        </div>

    </div>
<?php else: ?>
    <div class="member_sidebar_content">
        <div class="say_hello">
            嗨，<?= $_SESSION['user']['nickname'] ?><br>
            歡迎加入UniSay：） <br>
            今天想說些什麼呢？
        </div>

        <div class="member_info">
            <div onclick="location.href='memberaccountmember.php'">會員專區</div>
            <div onclick="location.href='memberaccounteditinfopw.php'">修改資料</div>
            <div onclick="location.href='cartshoppinglist.php'">訂單查詢</div>
            <div onclick="location.href='logout.php'">登出</div>

        </div>

        <div class="member_note">
            ＊UniSay提供手機殼終身保固<br>
            <br>
            ＊會員獨享舊殼換新殼現賺購物金<br>
            &nbsp;&nbsp;&nbsp;&nbsp;環保愛地球也讓自己有好新情<br>
            &nbsp;&nbsp;&nbsp;&nbsp;詳情請見->舊換新回收制度<br>
        </div>

    </div>
<?php endif ?>
