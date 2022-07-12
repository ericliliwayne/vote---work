<?php
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{
?>
<style>
    .box{
        width: 100%;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
        background-color: rgb(255, 255, 255,0.7);
    }
    .center{
        /* display: inline-block; */
        width: 45%;
        height: 40%;
        text-align: center;
        margin: 20px auto;
        border: 2px solid black;
        float: left;
    }
</style>
<div class="box">
<h1 style="width: 100%;font-size:50px;color:blueviolet">會員管理中心</h1>
<div class="center"><a href="?do=editmem">編輯會員</a></div>
<div class="center"><a href="?do=delmem">刪除會員</a></div>
<div class="center"><a href="?do=newvote">新增投票</a></div>
<div class="center"><a href="?do=votescenter">投票列表</a></div>
</div>
<!-- <div><a href=""></a></div>
<div><a href=""></a></div> -->
<?php
}
?>