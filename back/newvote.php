<?php
//include_once "../other/functionall.php";
$subject=all('votes');
$category=all('categorys');
$options=all('options');
?>
<script src="../style/jquery.js"></script>

<h1>新增投票</h1>
<form action="./other/new_vote.php" method="post">
    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="votename" id="votename" value="">
        <input type="button" value="新增選項" id="new">
        <input type="button" value="刪除選項" id="del">
        <!-- <input type="hidden" name="id" value="<?=$subject['id'];?>"> -->
    </div>
    <script>
    $(document).ready(function() {
        let countNum = 0;
        let add = $('#new');
        let opt=`<div class="opt"><label>選項:</label><input type="text" name="option[]"></div>`;
        $('#new').click(function () {
            countNum += 1;
            if(countNum<=20){
                $('#options').append(opt);
            }
    });
        $('#del').click(function () {
            $('.opt').remove();
    });
    });
    
</script>
    <div id="selector">
        <input type="radio" name="multiples" value="0">
        <label>單選</label>
        <input type="radio" name="multiples" value="1">
        <label>複選</label><br>
        <label>類別:</label>
        <select name="category" id="category">
            <?php
                //使用迴圈顯示所有的分類資料
                foreach($category as $type){

                    //在選單中加上$selected來讓下拉選單可以直接顯示主題的分類
                    echo "<option value='{$type['id']}'>";
                    echo $type['categorys'];
                    echo "</option>";
            }
            ?>
        </select>
    </div>

    <div id="options">
        <div class="opt1">
            <label>選項:</label><input type="text" name="option[]" value="">
        </div>
    </div>
    <div>
            <label for="enddate">結束時間:</label>
            <input type="datetime-local" name="end" id="enddate" value="">
        </div>
        
        <label for="show">顯示投票項目開啟或關閉:</label>
        <input type="radio" name="show" value="1">
        <label>開啟</label>
        <input type="radio" name="show" value="0">
        <label>關閉</label>
        <br>
    <input type="submit" value="新增投票">

</form>