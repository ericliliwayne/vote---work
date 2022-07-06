<?php
include_once "../other/functionall.php";
//接收來自表單傳來的投票主題文字內容
$subject_id=$_POST['id'];
$new_subject=$_POST['votename'];
$new_endtime=$_POST['end'];
$new_type=$_POST['category'];
$oc=$_POST['show'];
$subject=find('votes',$subject_id);

$subject['votename']=$new_subject;
$subject['multiples']=$_POST['multiples'];
$subject['categoryid']=$new_type;
$subject['end']=$new_endtime;
$subject['show']=$oc;
//echo $sql;
//使用save()函式把投票主題存至資料表votes中
save('votes',$subject);

$opts=all("options",['voteid'=>$subject_id]);

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
            $ot['options']=$opt;
            save("options",$ot);
        }else{
            //新增選項
            if($_POST['option']!=''){
                $add_option=[
                    'options'=>$opt,
                    'voteid'=>$subject_id
                ];
            }
            
            save("options",$add_option);
        }
    }


//使用to()函式來取代header，請參考base.php中的函式to($url)
to('../index.php');
?>