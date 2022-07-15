<?php
//帳號登出
session_start();
//echo $_SESSION['name'];
unset($_SESSION['name']);
header('location:../index.php');

?>