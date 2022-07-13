<?php
$color = ['lightblue','lightgreen','lightgray','cadetblue','lightpink','lightyellow','aquamarine','burlywood','darkturquoise','gold','khaki','orange'];
?>
<style>
    
    table{
        background-color: rgb(red, green, blue,0.1);
        text-align: center;
        margin: 10px auto;
    }
    td{
        padding: 5px;
        border-bottom: 2px solid black;
    }
    .bar{
        /* border: 1px solid black; */
        border-radius: 0 50% 50% 0;
    }
    .per{
        text-align:left;
        border-left:2px solid black;
    }
    .btn2{
        margin: 20px auto;
        color:darkblue;
        background-color: lightblue;
        font-size: larger;
        cursor: pointer;
    }
    .btn2:hover{
        color:lightblue;
        background-color: darkblue;
        font-size: larger;
    }
</style>
<?php
//取得主題資料
$subject=find("votes",$_GET['id']);
$now = date('Y-m-d H-i-s');

//取得主題所屬的所有選項資料
$options=all("options",['voteid'=>$_GET['id']]);
?>
                <!--顯示主題文字-->
<h1 class="text-center"><?=$subject['votename'];?></h1>
<div style="width:600px;margin:auto;background:rgb(255,255,255,0.6);text-align:center">
    <div style="margin: 20px auto;color:red;font-size:20px;font-weight:bold;">總投票數: <?=$subject['total'];?></div>
    <table>
        <tr>
            <td>選項</td>
            <td>投票數</td>
            <td style="text-align:left;">比例</td>
        </tr>
        <?php 
        foreach($options as $option){
            $total=($subject['total']==0)?1:$subject['total'];
            $rate=$option['total']/$total;
        ?>
        <tr>
            <td><?=$option['options'];?></td>
            <td><?=$option['total'];?></td>
            <td class="per">
                                                 <!--利用css屬性來建立一個長條bar，並代入投票比例來計算長度-->
                <div style="display:inline-block;height:24px;background-color:<?=$color[rand(0,11)]?>;width:<?=300*$rate;?>px;margin-left:0px; z-index:-1;" class="bar"><span style = "z-index:99" class="bar"><?=($rate*100) . "%";?></span></div>
                
            </td>
        </tr>
        <?php 
        }
        ?>
    </table>
                                 <!--在按鈕上建立點擊事件並帶入主題id-->
<?php
    if(!isset($_SESSION['name'])){
        echo "<p style='color:red;font-weight:bold;'>請先登入再投票!!</p>";
    }else if($subject['end'] <= $now){
        echo "<p style='color:red;font-weight:bold;'>投票時間已結束!!</p>";
    }else{
?>                             
    <button class="btn2" onclick="location.href='?do=vote&id=<?=$_GET['id'];?>'">我要投票</button>
<?php
}
?>
</div>