<?php

require __DIR__. '/__connect_db.php';

if(isset($_GET['email_id'])){
    $sql = sprintf("SELECT * FROM members WHERE `email_id`='%s'",
        $mysqli->escape_string($_GET['email_id']));

    $result = $mysqli->query($sql);

    echo $result->num_rows > 0 ? 'yes' : 'no';

}

