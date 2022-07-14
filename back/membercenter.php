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
    .center1{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        width: 45%;
        height: 40%;
        text-align: center;
        margin: 20px auto;
        border: 2px solid black;
        float: left;
        background-image: url(./images/pexels-david-bartus-1166209.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size:cover;
        box-shadow: 10px 10px 2px black;
        border: 10px outset lightgray;
    }
    .center2{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        width: 45%;
        height: 40%;
        text-align: center;
        margin: 20px auto;
        border: 2px solid black;
        float: left;
        background-image: url(./images/pexels-david-bartus-1166209.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size:cover;
        box-shadow: 10px 10px 2px black;
        border: 10px outset lightgray;
    }
    .center3{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        width: 45%;
        height: 40%;
        text-align: center;
        margin: 20px auto;
        border: 2px solid black;
        float: left;
        background-image: url(./images/pexels-david-bartus-1166209.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size:cover;
        box-shadow: 10px 10px 2px black;
        border: 10px outset lightgray;
    }
    .center4{
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        width: 45%;
        height: 40%;
        text-align: center;
        margin: 20px auto;
        border: 2px solid black;
        float: left;
        background-image: url(./images/pexels-david-bartus-1166209.jpg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size:cover;
        box-shadow: 10px 10px 2px black;
        border: 10px inset lightgray;
    }
    .acenter{
        text-align: center;
        display: block;
        width: 100%;
        color: darkslateblue;
        font-weight: bold;
        font-size: 100px;
    }
    .center1:hover{
        box-shadow: -10px -10px 2px black;
        border: 10px inset lightgray;
    }
    .center2:hover{
        box-shadow: -10px -10px 2px black;
        border: 10px inset lightgray;
    }
    .center3:hover{
        box-shadow: -10px -10px 2px black;
        border: 10px inset lightgray;
    }
    .center4:hover{
        box-shadow: -10px -10px 2px black;
        border: 10px inset lightgray;
    }
    .acenter:hover{
        height: 100%;
    }
</style>
<div class="box">
<h1 style="width: 100%;font-size:50px;color:blueviolet">會員管理中心</h1>
<div class="center1"><a href="?do=editmem" class="acenter">編輯會員</a></div>
<div class="center2"><a href="?do=delmem" class="acenter" style="color: darkred;">刪除會員</a></div>
<div class="center3"><a href="?do=newvote" class="acenter">新增投票</a></div>
<div class="center4"><a href="?do=votescenter" class="acenter">投票列表</a></div>
</div>
<!-- <div><a href=""></a></div>
<div><a href=""></a></div> -->
<?php
}
?>