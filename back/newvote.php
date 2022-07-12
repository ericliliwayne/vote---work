<?php
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{
?>
<style>
    .new{
        width: 30%;
        margin: 20px auto;
        background-color: rgb(255,255,255,0.7);
        text-align: center;
        /* font-size: 30px; */
        padding: 5px;
        box-shadow: 5px 5px 2px;
        font-size: 20px;
    }
</style>
<?php
//include_once "../other/functionall.php";
$subject = all('votes');
$category = all('categorys');
$options = all('options');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h1 style="font-size: 50px;">新增投票</h1>
<div class="new">
<form action="./other/new_vote.php" method="post">
    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="votename" id="votename" value="" required>
        <div id="showBlock">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
    <p>&nbsp;</p>
    <input type="button" id="btn" value="新增選項" />
    <script>
        // 動態新增欄位id編號預設值
        let num = 1;
        let txtId = 1;
        
        // 動態新增選項
        $("#btn").click(function () {
            if(num<=10){ //選項最多10項
                $("#showBlock").append('<div id="div' + txtId + '">選項: <input type="text" name="option[]" required /> <input type="button" value="刪除" onclick="deltxt('+txtId+')"></div>');
                txtId++;
                num ++;
            }
        });
      
        // 動態刪除欄位
        function deltxt(id) {
            $("#div"+id).remove();
        }
      </script> 
    </div>
    <p>&nbsp;</p>
    <div id="selector">
        <input type="radio" name="multiples" value="0">
        <label>單選</label>
        <input type="radio" name="multiples" value="1">
        <label>複選</label><br>
        <p>&nbsp;</p>
        <label>類別:</label>
        <select name="category" id="category">
            <?php
            //使用迴圈顯示所有的分類資料
            foreach ($category as $type) {

                //在選單中加上$selected來讓下拉選單可以直接顯示主題的分類
                echo "<option value='{$type['id']}'>";
                echo $type['categorys'];
                echo "</option>";
            }
            ?>
        </select>
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="enddate">結束時間:</label>
        <input type="datetime-local" name="end" id="enddate" value="">
    </div>
    <p>&nbsp;</p>
    <label for="show">顯示投票項目開啟或關閉:</label>
    <input type="radio" name="show" value="1">
    <label>開啟</label>
    <input type="radio" name="show" value="0">
    <label>關閉</label>
    <br>
    <p>&nbsp;</p>
    <input type="submit" value="新增投票">

</form>
</div>
<?php
}
?>
