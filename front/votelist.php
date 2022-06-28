<?php
    include_once "./other/functionall.php";
?>
<session class='card'>
        <?php
            //使用all()函式來取得資料表votes中的所有資料，請參考functionall.php中的函式all($table,...$arg)
            $subjects=all('votes');

            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){
                echo "<a href='?do=vote_result&id={$subject['id']}'>";
                echo "<div class='voteslist'>";
                echo "<div>投票主題 : {$subject['votename']}</div>";
                if($subject['multiple']==0){
                    echo "<div class='text-center'>單/複選題 : 單選題</div>";
                }else{
                    echo "<div class='text-center'>單/複選題 : 複選題</div>";
                }
                echo "<div class='text-center'>";
                echo "投票期間為 : ".$subject['start']. " ~ ".$subject['end'];
                echo "</div>";
                echo "<div class='text-center'>";
                    $today=strtotime("now");
                    $end=strtotime($subject['end']);
                    if(($end-$today)>0){
                        $remain=floor(($end-$today)/(60*60*24));
                        echo "倒數".$remain."天結束";
                    }else{
                        echo "<span style='color:grey'>投票已結束</span>";
                    }
                
                echo "</div>";
                echo "<div class='text-center'>已投票人數 : {$subject['total']}</div>";
                echo "</div>";
                echo "</a>";
            }

        ?>
        </session>