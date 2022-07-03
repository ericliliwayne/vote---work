
<style>
    table{
        border: 2px solid black;
        margin: 10px auto;
    }
    tr td{
        border: 1px solid black;
        padding: 3px;
    }
    .center{
        text-align: center;
        background-color: lightgray;
        font-size: large;
        font-weight: bold;
        color: black;
    }
    .center2{
        text-align: center;
    }
    tr:nth-child(odd){
        background-color: lightpink;
    }
    tr:nth-child(even){
        background-color: lightgreen;
    }
    tr:hover{
        background-color: black;
        color: white;
        cursor: pointer;
        
    }
    
</style>
<h1>後台投票項目列表</h1>
<?php
            //使用all()函式來取得資料表votes中的所有資料，請參考functionall.php中的函式all($table,...$arg)
            $subjects=all('votes');
            $category=all('categorys');
            
            //使用迴圈將每一筆資料的內容顯示在畫面上
            echo "<table>";
            echo "<tr><td class='center'>編號</td>
                      <td class='center'>投票名稱</td>
                      <td class='center'>類別</td>
                      <td class='center'>單/複選題</td>
                      <td class='center'>投票期間</td>
                      <td class='center'>投票剩餘時間</td>
                      <td class='center'>投票人數</td>
                      <td class='center'>開啟/關閉投票</td>
                      <td class='center'>操作</td>
                      </tr>";
            foreach($subjects as $key => $subject){
                echo "<tr>";
                echo "<td class='center2'>".($key+1)."</td>";
                echo "<td>{$subject['votename']}</td>";
                //判定類ID來賦與對應的類別
                if($subject['categoryid']==1){
                    $string = "生活";
                }else if($subject['categoryid']==2){
                    $string = "經濟";
                }else if($subject['categoryid']==3){
                    $string = "政治";
                }else if($subject['categoryid']==4){
                    $string = "科技";
                }else if($subject['categoryid']==5){
                    $string = "動漫";
                }else if($subject['categoryid']==6){
                    $string = "其他";
                }
                //
                echo "<td class='center2'>".$string."</td>";
                if($subject['multiple']==0){
                    echo "<td class='center2'>複選題</td>";
                }else{
                    echo "<td class='center2'>單選題</td>";
                }
                echo "<td>".$subject['start']. " ~ ".$subject['end']."</td>";
                    $today=strtotime("now");
                    $end=strtotime($subject['end']);
                    if(($end-$today)>0){
                        $remain=floor(($end-$today)/(60*60*24));
                        echo "<td class='center2'>倒數".$remain."天結束</td>";
                    }else{
                        echo "<td class='center2'><span style='color:grey'>投票已結束</span></td>";
                    }
                echo "<td class='center2'>已投票人數 : {$subject['total']}</td>";
                if($subject['show']==1){
                    echo "<td class='center2'>投票顯示開啟</td>";
                }else{
                    echo "<td class='center2'>投票顯示關閉</td>";
                }
                echo "<td>";
?>
                <button class="edit" onclick="location.href='?do=editvote&id=<?=$subject['id'];?>'">修改</button>
                <button class="del">刪除</button>
<?php
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>

        <button><a href="index.php">返回首頁</a></button>