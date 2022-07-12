<style>
.forget{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        width: 30%;
        height: 30%;
        margin: 20px auto;
        background-color: rgb(255,255,255,0.7);
        text-align: center;
        /* font-size: 30px; */
        padding: 5px;
        box-shadow: 5px 5px 2px;
        font-size: 15px;
    }
    label{
        font-size: 15px;
    }
    input{
        font-size: 15px;
    }
    p{
        font-size: 30px;
        margin: 10px auto;
    }
    .submit{
        width: 20%;
        height: 50%;
        background-color: lightblue;
        color: red;
        margin: 5px 10px;
        font-size: 25px;
    }
    .reset{
        width: 20%;
        height: 50%;
        background-color: lightblue;
        color:blue;
        margin: 15px 10px;
        font-size: 25px;
    }
    .back{
        width: 50%;
        height: 30%;
        font-size: 25px;
        margin: auto;
        text-decoration: none;
        color: gold;
        background-color: darkcyan;
    }
    .a{
        color: gold;
        font-weight: bold;
    }
    .submit:hover{
        background-color:darkgreen;
        color: lightpink;
    }
    .reset:hover{
        background-color:darkgreen;
        color: lightblue;
    }
    .back:hover{
        background-color: gold;
    }
    .a:hover{
        color: green;
        font-weight: bold;
    }
</style>

<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=votesystem";
$pdo=new PDO($dsn,'root','');
$user = all('users');
if(!isset($_POST['acc'])){
?>
<h1 style="font-size: 50px;">找回密碼提示</h1>
<div class="forget">
<form action="./?do=forget" method="post">
    <label for="acc">輸入帳號: </label>
    <input type="text" name="acc" id="acc" value="" required>
    <br>
    <button type="submit" class="submit">送出</button>
    <button type="reset" class="reset">清除</button>
</form>
<p>&nbsp;</p>
<button class="back"><a href="./index.php" class="a">回首頁</a></button>
</div>

<?php
}else{
?>
<h1 style="font-size: 50px;">找回密碼提示</h1>
<div class="forget">
<?php
    $acc=$_POST['acc'];

    $sql="SELECT * FROM `users` WHERE `acc`='$acc'";
    
    $note=$pdo->query($sql)->fetch();
    
    //$user=0,null,[],""  //true
    
    if(empty($note)){
        echo "<p>查無此帳號</p>";
    }else{
       echo "<p>你當初提供的密碼提示為:<br>".$note['pwnote']."</p>";
    }
    echo "<button class='back'><a href='./index.php' class='a'>回首頁</a></button>";
    
}
?>
    
</div>

