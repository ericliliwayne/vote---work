<!-- 圖片區 -->
<?php
$color = ['lightblue','lightgreen','lightyellow','lightpink','lightskyblue','lightgray','lightsalmon','chartreuse','mediumaquamarine'];
?>
<style>
    body{
        background-color: <?=$color[rand(0,8)];?>;
    }
    h1{
        font-size: 70px;
        text-align: center;
    }
</style>
<div>
    <h1>歡迎光臨線上投票系統</h1>
</div>