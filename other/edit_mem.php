<?php
include_once "functionall.php";
$mem = find('users', ['name' => $_SESSION['name']]);
//接收來自表單傳來的會員內容
if($_POST['pw'] != $_POST['pw2']){
    echo "<p>&nbsp;</p>";
    echo "<p>&nbsp;</p>";
    echo "<h1>密碼和確認密碼不一致，請重新輸入!!<h1><br>";
    echo "<button><a href='../index.php?do=editmem'>回修改會員頁面</a></button>";
        
    }else{
$newname=(isset($_POST['name']) && $_POST['name'] != "")?$_POST['name']:$mem['name'];
$newpw=(isset($_POST['pw']) && $_POST['pw'] != "")?md5($_POST['pw']):$mem['pw'];
$newacc=(isset($_POST['acc']) && $_POST['acc'] != "")?$_POST['acc']:$mem['acc'];
$newgender=(isset($_POST['gender']) && $_POST['gender'] != "")?$_POST['gender']:$mem['gender'];
$newbirthday=(isset($_POST['birthday']) && $_POST['birthday'] != "")?$_POST['birthday']:$mem['birthday'];
$newemail=(isset($_POST['email']) && $_POST['email'] != "")?$_POST['email']:$mem['email'];
$neweducation=(isset($_POST['education']) && $_POST['education'] != "")?$_POST['education']:$mem['education'];
$newpwnote=(isset($_POST['pwnote']) && $_POST['pwnote'] != "")?$_POST['pwnote']:$mem['pwnote'];

$mem['name'] = $newname;
$mem['pw'] = $newpw;
$mem['acc'] = $newacc;
$mem['gender'] = $newgender;
$mem['birthday'] = $newbirthday;
$mem['email'] = $newemail;
$mem['education'] = $neweducation;
$mem['pwnote'] = $newpwnote;
//echo $sql;
//使用save()函式把投票主題存至資料表votes中
save('users',$mem);
//使用to()函式來取代header，請參考base.php中的函式to($url)
to('../?do=membercenter');
}
?>