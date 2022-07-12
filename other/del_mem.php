<?php
//載入共用的函式庫檔案
include_once "functionall.php";
//從網址取得要刪除的資料表名稱
$table='users';
//從網址取得要刪除的資料id
$name=['name'=>$_SESSION['name']];
    del($table,$name);
//將網頁請求導回後台首頁
unset($_SESSION['name']);
to("../index.php");
?>
