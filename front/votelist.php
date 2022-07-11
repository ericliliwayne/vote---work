<?php
    //include_once "./other/functionall.php";
    //先設定一個空的分頁字串變數
    $page = "";
    

        //如果網址中帶有分頁的參數則將變數設為參數的值
    if (isset($_GET['page'])) {
        $page = "&page={$_GET['page']}";
    }
    //先設定一個空的排序字串變數
    $sortstr = "";

    //如果網址中帶有排序的參數則將變數設為參數的值
    if (isset($_GET['order'])) {
        $sortstr = "&order={$_GET['order']}&type={$_GET['type']}";
    }

    //先設定一個空的分類字串變數
    $sortfilter = "";
    //判斷網址中是否帶有分類參數
    

    
    //如果網址中帶有分類的參數則將變數設為參數的值
    if (isset($_GET['filter'])) {
        $sortfilter = "&filter={$_GET['filter']}";
    }else{
        $_GET['filter'] = 0; //若沒有則預設值為0(filter=0)
    }
    
    
?>
<div>
    <label for="categorys">分類排序: </label>
    <!--建立一個選單事件，當選單被選擇到不一樣的項目時會觸發onchange事件，此事件會在網址中帶入相關的參數-->
    <select name="categorys" id="categorys" onchange="location.href=`?filter=${this.value}<?=$page;?><?=$sortstr;?>`">
        <option value="0">全部</option>
        <?php
        //顯示分類下拉選單，根據網址的分類參數值，可以讓每次重整分類時都維持之前的選擇
        $categorys = all("categorys");
        foreach ($categorys as $category) {
            $selected = (isset($_GET['filter']) && $_GET['filter'] == $category['id']) ? 'selected' : '';
            echo "<option value='{$category['id']}' $selected>";
            echo $category['categorys'];
            echo "</option>";
        }
        ?>
    </select>
    <?php
        if (isset($_GET['type']) && $_GET['type'] == 'asc') {
    ?>
    <button id="date"><a href="?order=remain&type=desc<?=$page;?><?=$sortfilter;?>">依剩餘日期排序</a></button>
    <?php
        } else {
    ?>
    <button id="date"><a href="?order=remain&type=asc<?=$page;?><?=$sortfilter;?>">依剩餘日期排序</a></button>
    <?php
        }
    ?>
</div>
<?php
            //建立一個分類過濾用的空陣列
            $filter = [];

            //判斷網址中是否帶有分類參數
            if (isset($_GET['filter'])) {
                //如果分類項目不是0，則在空陣列中加入分類id
                if (!$_GET['filter'] == 0) {
                    $filter = ['categoryid' => $_GET['filter']];
                }
            }
            $total = math('votes', 'count', 'id');  //計算指定條件的資料總筆數
            echo $total;
            $div = 6;                                           //每頁資料筆數
            $pages = ceil($total / $div);                       //計算總頁數
            $now = isset($_GET['page']) ? $_GET['page'] : 1;          //從網址參數取得目前所在頁數
            $start = ($now - 1) * $div;                         //計算要從那個索引開始取得資料
            $page_rows = " limit $start,$div";                  //建立SQL語法的limit字串
?>
<session class='card'>
        <?php
            //使用all()函式來取得資料表votes中的所有資料，請參考functionall.php中的函式all($table,...$arg)
            $subjects = all('votes');
            $category=all('categorys');
            
            //使用迴圈將每一筆資料的內容顯示在畫面上
            foreach($subjects as $subject){
                echo "<a href='?do=voteresult&id={$subject['id']}'>";
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

                if($_GET['filter'] == 0     || !isset($_GET['filter'])){
                    echo "<div class='voteslist {$border}'>";
                    echo "<div class='votestitle'>{$subject['votename']}</div>";
                    echo "<div>類別 : ".$string."</div>";
                    if($subject['multiples']==1){
                        echo "<div class='text-center'>單/複選題 : 複選題</div>";
                    }else {
                        echo "<div class='text-center'>單/複選題 : 單選題</div>";
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
                
                if(isset($_GET['filter']) && $_GET['filter']==$subject['categoryid']){
                    echo "<div class='voteslist {$border}'>";
                    echo "<div class='votestitle'>{$subject['votename']}</div>";
                    echo "<div>類別 : ".$string."</div>";
                    if($subject['multiples']==1){
                        echo "<div class='text-center'>單/複選題 : 複選題</div>";
                    }else{
                        echo "<div class='text-center'>單/複選題 : 單選題</div>";
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
                
            }
            
            
        ?>
        </session>
        <div class="text-center">
        <?php
        //在列表下方顯示頁碼及連結
        if ($pages > 1) {
            for ($i = 1; $i <= $pages; $i++) {
                
                //同時帶入網址的分頁及排序參數，用edfrdcvf憶頁面行為的狀態
                echo "<a href='?page={$i}{$sortstr}{$sortfilter}'>&nbsp;";
                echo $i;
                echo "&nbsp;</a>";
            }
        }

?>
    </div>    