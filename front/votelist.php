<?php
    include_once "./other/functionall.php";
?>
<session class='card'>
        <?php
            //使用all()函式來取得資料表votes中的所有資料，請參考functionall.php中的函式all($table,...$arg)
            $subjects=all('votes');
            $category=all('categorys');
            
            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){
                echo "<a href='?do=vote_result&id={$subject['id']}'>";
                //判定類ID來賦與對應的CSS美化
                if($subject['categoryid']==1){
                    $border = 'colora';
                    $string = "生活";
                }else if($subject['categoryid']==2){
                    $border = 'colorb';
                    $string = "經濟";
                }else if($subject['categoryid']==3){
                    $border = 'colorc';
                    $string = "政治";
                }else if($subject['categoryid']==4){
                    $border = 'colord';
                    $string = "科技";
                }else if($subject['categoryid']==5){
                    $border = 'colore';
                    $string = "動漫";
                }else if($subject['categoryid']==6){
                    $border = 'colorf';
                    $string = "其他";
                }
                //
                echo "<div class='voteslist {$border}'>";
                echo "<div class='votestitle'>{$subject['votename']}</div>";
                echo "<div>類別 : ".$string."</div>";
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