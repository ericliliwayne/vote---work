<?php
//include_once "../other/functionall.php";
$id=$_GET['id'];
$subject=find('votes',$id);
$category=all('categorys');
$options=all('options',['voteid'=>$id]);
?>
<script src="../style/jquery.js"></script>
<h1>編輯投票</h1>
<form action="./other/edit_vote.php" method="post">
    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="votename" id="votename" value="<?=$subject['votename'];?>">
        <input type="button" value="新增選項" id="new">
        <input type="button" value="刪除新增選項" id="del">
        <!-- <input type="button" value="選項全部刪除" id="del2"> -->
        <input type="hidden" name="id" value="<?=$subject['id'];?>">
    </div>
    <div id="selector">
        <input type="radio" name="multiples" value="0" <?=($subject['multiples']==0)?'checked':'';?>>
        <label>單選</label>
        <input type="radio" name="multiples" value="1" <?=($subject['multiples']==1)?'checked':'';?>>
        <label>複選</label><br>
        <label>類別:</label>
        <select name="category" id="category">
            <?php
                //使用迴圈顯示所有的分類資料
                foreach($category as $type){
                //根據主題資料中的id來判斷主題所屬的分類
                    $selected=($subject['categoryid']==$type['id'])?'selected':'';

                    //在選單中加上$selected來讓下拉選單可以直接顯示主題的分類
                    echo "<option value='{$type['id']}' $selected>";
                    echo $type['categorys'];
                    echo "</option>";
            }
            ?>
        </select>
    </div>

    <div id="options">
        <?php 
        foreach($options as $option){
        ?>
        <div class="opt1">
            <label>選項:</label><input type="text" name="option[<?=$option['id'];?>]" value="<?=$option['options'];?>">
        </div>
        <?php 
        }
        ?>
    </div>
    <div>
            <label for="enddate">結束時間:</label>
            <input type="datetime-local" name="end" id="enddate" value="<?=$subject['end'];?>">
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
    //     $('#del2').click(function () {
    //         $('.opt').remove();
    //         $('.opt1').remove();
    // });
    });
    
</script>
        <label for="show">顯示投票項目開啟或關閉:</label>
        <input type="radio" name="show" value="1" <?=($subject['show']==1)?'checked':'';?>>
        <label>開啟</label>
        <input type="radio" name="show" value="0" <?=($subject['show']==0)?'checked':'';?>>
        <label>關閉</label>
        <br>
    <input type="submit" value="修改">

</form>