<?php
$mysqli = new mysqli("localhost", "root", "", "unisay");

$mysqli->query("SET NAMES utf8");

// 如果沒有啟用 session, 就啟用
if(! isset($_SESSION)){
    session_start();
}
