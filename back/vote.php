<style>
    .voteitem{
        text-align: left;
        background-color: rgb(255, 255, 255,0.8);
        width: 50%;
        margin: 20px auto;
        padding: 5px;
        box-shadow: 3px 3px 2px black;
    }
    span:hover{
        font-size: 30px;
        color: red;
    }
    .submit2{
        color: darkgreen;
        background-color: lightgreen;
        font-size: 25px;
        cursor: pointer;
    }
    .reset2{
        color: darkblue;
        background-color: lightblue;
        font-size: 25px;
        cursor: pointer;
    }
    .move{
        color: darkred;
        background-color: gold;
        font-size: 25px;
        cursor: pointer;
    }
    .submit2:hover{
        color: lightgreen;
        background-color: darkgreen;
    }
    .reset2:hover{
        color: lightblue;
        background-color: darkblue;
    }
    .move:hover{
        color: gold;
        background-color: darkred;
    }
</style>
<?php
include_once "./other/functionall.php";
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{

//取得主題資料
$subject=find("votes",$_GET['id']);
$ip = GetIP();
$now = date('y-m-d');
$note = find('voted',['votesid'=>$_GET['id']]);
$id = $_GET['id'];
// $pdo=pdo();
// $query = "select count(*) form voted where `ip`='$ip' AND `votetime`='$now' AND `votesid`='$id'";
// $stmt = $pdo->prepare($query);
// $stmt = $pdo->execute($query);
// $vote_num = $stmt->fetchColumn();

//取得選項資料
$options=all('options',['voteid'=>$_GET['id']]);
?>

<h1 style="font-size: 50px;color:indigo"><?=$subject['votename'];?></h1>
<div class="voteitem">
<form action="./other/vote.php" method="post">
    <input type="hidden" name="id" value="<?= $subject['id']; ?>">
<?php
foreach($options as $option){
?>
    
        <?php
        //根據主題資料的multiple來決定這邊要顯示的是radio單選按鈕還是checked複選按鈕
         if($subject['multiples']==0){
        ?>
            <input type="radio" name="option" value="<?=$option['id'];?>">
        <?php
        }else{
        ?>
            <input type="checkbox" name="option[]" value="<?=$option['id'];?>">
        <?php
        }
        ?>
        <span><?=$option['options'];?></span>
        <p>&nbsp;</p>

<?php
}
//if($ip==$note['usersip'] && $now==$note['votetime'] && $id==$note['votesid']){
   // echo "<p>今日已投過票，請明日再來~</p>";

//}else{
?>
    <input type="submit" value="投票去" class="submit2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
//}
?>

<input type="reset" value="重置" class="reset2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="放棄" onclick="location.href='index.php'" class="move">
</form>
<?php
}
?>
</div>