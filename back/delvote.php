<?php
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{
?>
<style>
    body{
        display: flex;
        justify-content: center;
        align-content: center;
    }
    .confirm{
        display: flex;
        flex-direction: column;
        /* justify-content: center;
        align-content: center; */
        width:100%;
        height:100%;
        padding: 10px;
        background-color: rgb(255, 255, 255,0.7);
    }
    #go{
        margin: -12px auto;
        width: 50%;
        height: 10%;
        text-align: center;
        font-size: 25px;
        border-radius: 25% 25%;
        background-color: lightcoral;
        box-shadow: 3px 3px 1px black;
    }
    #back{
        margin: auto;
        width: 50%;
        height: 10%;
        text-align: center;
        font-size: 25px;
        border-radius: 25% 25%;
        background-color: lightgreen;
        box-shadow: 3px 3px 1px black;
        margin-top: -10px;
    }
    #go:hover{
        font-size: 35px;
        height: 15%;
        box-shadow: 6px 6px 1px black;
        cursor: pointer;
    }
    #back:hover{
        font-size: 35px;
        height: 15%;
        box-shadow: 6px 6px 1px black;
        cursor: pointer;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php

//從網址的參數中取得指定id的主題資料
$subject=find("votes",$_GET['id']);
?>
<div class="confirm">
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
    <h2 style="text-align:center;color:red;font-weight:bolder;font-size:70px;">你確定要刪除這份投票嗎?</h2>
    <div style="text-align:center;font-weight:bold;font-size:50px;">主題:</div>
    <p>&nbsp;</p>
    <!--顯示主題內容做為確認之用-->
    <div style="font-size:1.5rem;text-align:center;font-size:30px;"><?=$subject['votename'];?></div>
    <!--根據使用者選擇的按鈕不同，將使用者導向刪除或回首頁-->
    <p>&nbsp;</p><p>&nbsp;</p>
    <button onclick="location.href='./other/del_vote.php?table=votes&id=<?=$_GET['id'];?>'" id="go">確定刪除!!</button>
    <p>&nbsp;</p><p>&nbsp;</p>
    <button onclick="location.href='index.php'" id="back">後悔取消!!</button>
</div>
<script>
    $(document).ready(function () {
        $('#go').mouseover(function () {
            $('.confirm').css('background','pink');
        });
        $('#go').mouseout(function () {
            $('.confirm').css('background','rgb(255, 255, 255,0.7)');
        });
        $('#back').mouseover(function () {
            $('.confirm').css('background','green');
        });
        $('#back').mouseout(function () {
            $('.confirm').css('background','rgb(255, 255, 255,0.7)');
        });
    });
</script>
<?php
}
?>