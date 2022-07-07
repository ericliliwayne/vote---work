<?php
include_once "functionall.php";
//接收來自表單傳來的投票主題文字內容
$new_subject=$_POST['votename'];
$new_endtime=$_POST['end'];
$new_type=$_POST['category'];
$oc=$_POST['show'];
$new_multiples=$_POST['multiples'];


$add_subject=[
    'votename'=>$new_subject,
    'categoryid'=>$new_type,
    'multiples'=>$new_multiples,
    'end'=>$new_endtime,
    'show'=>$oc,
];



//echo $sql;
//使用save()函式把投票主題存至資料表votes中
//save('votes',$add_subject);

//利用剛才存入的投票主題文字來找出該筆資料並取得id，請參考base.php中的函式find($table,$id)
$id=find('votes',['votename'=>$new_subject])['id'];
echo $id;

//判斷表單資料有沒有option這個項目，如果有，則使用迴圈把選項一個一個取出
if(isset($_POST['option'])){
    foreach($_POST['option'] as $opt){
        if($opt != ""){
            //如果選項的文字內容不是空的 ,則建立資料陣列,並將主題對應的id代入
            $add_option=[
                'options'=>$opt,
                'voteid'=>$id,
            ];
            //使用save()函式把投票選項存至資料表options中
            save('options',$add_option);  
        }
    }
    
}
 
//使用to()函式來取代header，請參考base.php中的函式to($url)
//to('../index.php');
?>