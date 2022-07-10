<?php
//include_once "../other/functionall.php";
$user = all('users');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<h1 style="font-size: 50px;">註冊會員</h1>
<form action="./other/new_user.php" method="post">
    <div>
        <label for="name">名稱: </label>
        <input type="text" name="name" id="name" value="" required>
    </div>
    <div>
        <label for="acc">帳號: </label>
        <input type="text" name="acc" id="acc" value="" required>
    </div>
    <div>
        <label for="pw">密碼: </label>
        <input type="password" name="pw" id="pw" value="" required>
    </div>
    <div>
        <label for="pw2">確認密碼: </label>
        <input type="password" name="pw2" id="pw2" value="" required>
    </div>
    <div id="gender">
        <label>性別: </label>
        <input type="radio" name="gender" value="1">
        <label>男</label>
        <input type="radio" name="gender" value="0">
        <label>女</label><br>
    </div>
    <div>
        <label for="birthday">生日: </label>
        <input type="date" name="birthday" id="birthday" value="" require><br>
    </div>
    <div>
        <label for="email">E-mail： </label>
        <input type="email" name="email" id="email" value="" required>
    </div>
    <div>
        <label for="education">最高學歷： </label>
        <select name="education" id="education">
            <option value="小學">小學</option>
            <option value="中學">中學</option>
            <option value="高中/職">高中/職</option>
            <option value="大學/專科">大學/專科</option>
            <option value="碩士">碩士</option>
            <option value="博士">博士</option>
        </select>
    </div>
    <div>
        <label for="pwnote">忘記密碼提示： </label><br>
        <textarea name="pwnote" id="pwnote" cols="30" rows="10" require></textarea>
    </div>
    <div>
        <button type="reset">清除資料</button>
        <button type="submit">送出</button>
    </div>

    

</form>