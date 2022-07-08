<?php
//載入共用的函式庫檔案
include_once "functionall.php";
//從網址取得要刪除的資料表名稱
$table=$_GET['table'];
//從網址取得要刪除的資料id
$id=$_GET['id'];

    del($table,$id);
    del('options',['voteid'=>$id]);
//將網頁請求導回後台首頁
to("../index.php");
?>