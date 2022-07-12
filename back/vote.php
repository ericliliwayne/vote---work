<?php
include_once "./other/functionall.php";
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{

//取得主題資料
$subject=find("votes",$_GET['id']);

//取得選項資料
$options=all('options',['voteid'=>$_GET['id']]);
?>

<h1><?=$subject['votename'];?></h1>
<form action="./other/vote.php" method="post">
<?php
foreach($options as $option){
?>
    <div class="voteitem">
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
        <?=$option['options'];?>
    </div>

<?php
}
?>
<input type="submit" value="投票去">
<input type="reset" value="重置">
<input type="button" value="放棄" onclick="location.href='index.php'">
</form>
<?php
}
?>