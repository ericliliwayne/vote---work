<?php
//紀錄投票結果
//載入共用函式庫檔案
include_once "functionall.php";

//判斷送來的資料是否是選項
if (isset($_POST['option'])) {

    //判斷傳來的資料是單一值(單選)還是陣列(複選)
    if (is_array($_POST['option'])) {
        
        //如果是複選題，則使用迴圈把陣列中的id值逐一取出
        foreach ($_POST['option'] as $key => $options) {

            //取得資料表中指定id選項的資料
            $option = find("options", $options);

            //將資料中的total欄位加1
            $option['total']++;

            //將資料存回資料表中
            save("options", $option);
            //如果是第一筆選項目資料，則取出主題資料
            if ($key == 0) {
                $subject = find("votes", $option['voteid']);
                
                //將主題資料中的total欄位也加1
                $subject['total']++;
                save("votes", $subject);
            }
        }

        //將投票資料寫入voted,記錄使用者的ip位置和投票項目ID來做為避免重複投票的依據
        $log = ['usersip' => GetIP(),
        'votesid' => $subject['id'],];
        //儲存投票紀錄
        save("voted", $log);

    } else {
        //如果是單選，則直接取出選項資料
        $option = find("options", $_POST['option']);

        //total欄位加1
        $option['total']++;

        //儲存選項
        save("options", $option);

        //取得主題資料
        $subject = find("votes", $option['voteid']);

        //total欄位加1
        $subject['total']++;

        //儲存主題
        save("votes", $subject);

   //將投票資料寫入voted,記錄使用者的ip位置和投票項目ID來做為避免重複投票的依據
   $log = ['usersip' => GetIP(),
   'votesid' => $subject['id'],];
    //儲存投票紀錄
    save("voted", $log);
}
}

//將頁面導回前台的投票結果頁,記得在網址中代入該投票的主題的id
to("../index.php?do=voteresult&id={$option['voteid']}");

?>