<?php
include_once "functionall.php";
$user = all('users',['acc'=>$_POST['acc']]);
$acc = $_POST['acc']; 
$pw = md5($_POST['pw']);
foreach($user as $a){
    $row_pw =   $a['pw'];
    $row_acc =  $a['acc'];
    $row_name =  $a['name'];
}
if($acc == $row_acc && $pw == $row_pw){
    $_SESSION["name"] = $a['name'] ;
    to("../?do=membercenter");
}else{
    to("../index.php");
}

?>