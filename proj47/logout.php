<?php
session_start();

//清空資料
unset($_SESSION['user']);
//導回上一層
header("Location: ./");