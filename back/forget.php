
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=votesystem";
$pdo=new PDO($dsn,'root','');
$user = all('users');
if(!isset($_POST['acc'])){
?>
<h1 style="font-size: 50px;">找回密碼提示</h1>
<form action="./?do=forget" method="post">
    <label for="acc">輸入帳號: </label>
    <input type="text" name="acc" id="acc" value="" required>
    <button type="submit">送出</button>
    <button type="reset">清除</button>
</form>
<?php
}else{
?>
<h1 style="font-size: 50px;">找回密碼提示</h1>
<?php
    $acc=$_POST['acc'];

    $sql="SELECT * FROM `users` WHERE `acc`='$acc'";
    
    $note=$pdo->query($sql)->fetch();
    
    //$user=0,null,[],""  //true
    
    if(empty($note)){
        echo "查無此帳號";
    }else{
       echo "<p>你當初提供的密碼提示為:".$note['pwnote']."</p>";
    }
    
    
}
?>
    <button><a href="./index.php">回首頁</a></button>
