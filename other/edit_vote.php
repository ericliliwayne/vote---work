<h1>123</h1>
<?php
include_once "../other/functionall.php";
//接收來自表單傳來的投票主題文字內容
$subject_id=$_POST['id'];
$new_subject=$_POST['votename'];
$new_endtime=$_POST['end'];
$oc=$_POST['show'];
$subject=find('votes',$subject_id);
$option=find('categorys',$subject_id);

$subject['votename']=$new_subject;
$subject['multiples']=$_POST['multiples'];
$subject['end']=$new_endtime;
$subject['show']=$oc;
//echo $sql;
//使用save()函式把投票主題存至資料表votes中
save('votes',$subject);

$opts=all("options",['id'=>$subject_id]);

    foreach($_POST['option'] as $key => $opt){
         $exist=false;
        foreach($opts as $ot){
            if($ot['id']==$key){
                $exist=true;
                break;
            }
        }

        if($exist){
            //更新選項
            $ot['option']=$opt;
            save("options",$ot);
        }else{
            //新增選項
            $add_option=[
                'option'=>$opt,
                'id'=>$subject_id
            ];
            save("options",$add_option);
        }
    }


//使用to()函式來取代header，請參考base.php中的函式to($url)
//to('../back.php');
?>