<!-- 測面sidebar區 -->
<style>
    .time{
        text-align: center;
        margin: 10px;
    }
    .sidebar{
        background-color: rgb(255, 255, 255,0.5);
        padding: 1px;
        margin-bottom: 10px;
        font-size: 20px;
    }
    input{
        font-size: 15px;
    }
    .fn{
        color: black;
        text-decoration: none;
    }
    .fn:hover{
        color: gold;
        font-weight: bold;
        text-decoration: none;
    }
    .submit{
        font-size: 20px;
        color: red;
        border-radius: 20% 20%;
    }
    .submit:hover{
        font-size: 20px;
        color: white;
        background-color: red;
        cursor: pointer;
    }
    .reset{
        font-size: 20px;
        color: blue;
        border-radius: 20% 20%;
    }
    .reset:hover{
        font-size: 20px;
        color: white;
        background-color: blue;
        cursor: pointer;
    }
    .in{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
    }
    .logout{
        margin: 20px auto;
        width:50%;
        font-size: 25px;
    }
    .out{
        text-decoration: none;
        color: black;
    }
    .logout:hover{
        background-color: darkred;
    }
    .out:hover{
        color:gold;
    }
</style>
<?php
    $user = all('users');
    if(!isset($_SESSION['name'])){
?>
<div class="sidebar">
    <form action="./other/check.php" method="post" style="text-align: center;">
        <p style="text-align: center;font-size:large;margin-top:10px;font-size:30px;font-weight:bolder;text-decoration:underline;color:indigo">會員登入</p>
        <lable>帳號:
            <input type="text" name="acc" id="acc">
        </lable><br><br>
        <lable>密碼:
            <input type="password" name="pw" id="pw">
        </lable><br><br>
        <a href="?do=forget" class="fn">忘記密碼</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?do=register" class="fn">註冊會員</a><br><br>
        <button type="submit" class="submit">會員登入</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="reset">清除重填</button>
    </form>
</div>
<?php
    }else{
?>
    <div class="in">
    <p style="padding:1px;text-align:center;margin:20px 10px 10px 10px;height:30%;font-size:20px;color:red;background:rgb(255, 255, 255,0.5)">
        您好，<span style="color:gold;font-weight:bold;font-size:30px;"><?=$_SESSION['name'];?></span><br>
        歡迎來到我的線上投票系統。
    </p>
    <button class="logout"><a href="./back/logout.php" class="out">會員登出</a></button>
    </div>
    
<?php
    }
?>
<div class="time">
<iframe src="https://free.timeanddate.com/clock/i8eit3wn/n241/tltw8/fn15/fs20/fc90f/ftb/pl2/pr2/pt2/pb2/tt0/tw0/tm2/td1/th2/ta1/tb4" frameborder="0" width="154" height="50"></iframe>
<iframe src="https://free.timeanddate.com/clock/i8eit3wn/n241/szw210/szh210/hoc222/hbw6/hfc0ff/cf100/hncf9f/hwc000/hcw2/hcd88/fas20/fdi70/mqc000/mqs3/mql13/mqw4/mqd94/mhc009/mhs4/mhl13/mhw4/mhd94/mmc000/mml5/mmw1/mmd94/hhs2/hhb18/hms2/hml80/hmb18/hmr7/hscf09/hsl90/hsr5" frameborder="0" width="210" height="210"></iframe>
</div>

