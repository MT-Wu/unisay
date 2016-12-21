<?php
//確認EMAIL有沒有重複，用AJAX呼叫再回傳..註解要打在裡面QAQ


require __DIR__. '/__connect_db.php';

if(isset($_GET['email_id'])){
    $sql = sprintf("SELECT * FROM members WHERE `email_id`='%s'",
        $mysqli->escape_string($_GET['email_id']));

    $result = $mysqli->query($sql);

    echo $result->num_rows > 0 ? 'yes' : 'no';

}


