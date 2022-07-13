<style>
    body{
        display: flex;
        flex-direction: column;
        background-color: black;
    }
    h1{
        text-align: center;
        font-size: 80px;
        color: red;
        display: block;
    }
    button{
        display: block;
        text-decoration: none;
        font-size: 50px;
        margin: auto;
    }
</style>
<?php
include_once "functionall.php";
//接收來自表單傳來的投票主題文字內容
$users = find('users', ['name' => $_POST['name']]);
$users2 = find('users', ['acc' => $_POST['acc']]);

$newname=$_POST['name'];
$newacc=$_POST['acc'];
$newpw=md5($_POST['pw']);
$newgender=$_POST['gender'];
$newbirthday=$_POST['birthday'];
$newemail=$_POST['email'];
$neweducation=$_POST['education'];
$newpwnote=$_POST['pwnote'];
if($_POST['pw'] != $_POST['pw2']){
echo "<p>&nbsp;</p>";
echo "<p>&nbsp;</p>";
echo "<h1>密碼和確認密碼不一致，請重新輸入!!<h1><br>";
echo "<button><a href='../index.php?do=register'>回註冊頁面</a></button>";
    
}
if($newname==$users['name'] || $newacc==$users2['acc']){
    echo "<p>&nbsp;</p>";
    echo "<p>&nbsp;</p>";
    echo "<h1>輸入的帳號或名稱有重複，請重新輸入!!<h1><br>";
    echo "<button><a href='../index.php?do=register'>回註冊頁面</a></button>";
}else{
    $add_subject=[
        'name'=>$newname,
        'acc'=>$newacc,
        'pw'=>$newpw,
        'gender'=>$newgender,
        'birthday'=>$newbirthday,
        'email'=>$newemail,
        'education'=>$neweducation,
        'pwnote'=>$newpwnote,
    ];
    save('users',$add_subject);
    to('../index.php');
}




