<?php
if(!isset($_SESSION['name'])){
    header("location:./index.php");
}else{
?>
<style>
    .edit{
        width: 30%;
        margin: 20px auto;
        background-color: rgb(255,255,255,0.7);
        text-align: left;
        /* font-size: 30px; */
        padding: 5px;
        box-shadow: 5px 5px 2px;
        font-size: 15px;
    }
    input{
        font-size: 15px;
    }
    .submit2{
        color: darkgreen;
        background-color: lightgreen;
        font-size: 25px;
        cursor: pointer;
    }
    .reset2{
        color: darkblue;
        background-color: lightblue;
        font-size: 25px;
        cursor: pointer;
    }
    .submit2:hover{
        color: lightgreen;
        background-color: darkgreen;
    }
    .reset2:hover{
        color: lightblue;
        background-color: darkblue;
    }
</style>
<?php
//include_once "../other/functionall.php";
$mem = find('users', ['name' => $_SESSION['name']]);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h1 style="font-size: 50px;color:darkmagenta">編輯會員資料</h1>
<div class="edit">
<form action="./other/edit_mem.php" method="post">
    <div>
        <label for="acc">會員帳號：</label>
        <input type="text" name="acc" id="acc" value="<?= $mem['acc']; ?>">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="pw">新會員密碼：</label>
        <input type="password" name="pw" id="pw" value="">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="pw2">確認新會員密碼：</label>
        <input type="password" name="pw2" id="pw2" value="">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="name">會員姓名：</label>
        <input type="text" name="name" id="name" value="<?= $mem['name']; ?>">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="gender">會員性別：</label>
        <input type="radio" name="gender" value="1" <?= ($mem['gender'] == 1) ? 'checked' : ''; ?>>
        <label>男</label>
        <input type="radio" name="gender" value="0" <?= ($mem['gender'] == 0) ? 'checked' : ''; ?>>
        <label>女</label>
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="birthday">會員生日：</label>
        <input type="date" name="birthday" id="birthday" value="<?= $mem['birthday']; ?>">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="email">會員email：</label>
        <input type="text" name="email" id="email" value="<?= $mem['email']; ?>">
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="education">會員學歷：</label>
        <select name="education" id="education">
            <option value="小學" <?=($mem['education']=="小學")?'selected':'';?>>小學</option>
            <option value="中學" <?=($mem['education']=="中學")?'selected':'';?>>中學</option>
            <option value="高中/職" <?=($mem['education']=="高中/職")?'selected':'';?>>高中/職</option>
            <option value="大學/專科" <?=($mem['education']=="大學/專科")?'selected':'';?>>大學/專科</option>
            <option value="碩士" <?=($mem['education']=="碩士")?'selected':'';?>>碩士</option>
            <option value="博士" <?=($mem['education']=="博士")?'selected':'';?>>博士</option>
        </select>
    </div>
    <p>&nbsp;</p>
    <div>
        <label for="pwnote">密碼備註：</label><br>
        <textarea name="pwnote" id="pwnote" cols="30" rows="10"><?= $mem['pwnote']; ?></textarea>
    </div>
    <p>&nbsp;</p>
    <input type="submit" value="修改" class="submit2">
    <input type="reset" value="重置" class="reset2">
    

</form>
</div>
<?php
}
?>