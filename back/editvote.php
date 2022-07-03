<?php
$id=$_GET['id'];
$subject=find('subjects',$id);
$options=all('options',['subject_id'=>$id]);
?>
<script src="../style/jquery.js"></script>
<script>
    function add(){
        $(document).ready(function() {
        let addoption = $("#new"); //Add button ID
        let opt=`<div><label>選項:</label><input type="text" name="option[]"><button id='del'>-</button></div>`;
        $(addoption).click(function (){ //on add input button click
        $('#options').append(opt);
        });
    })
    };
    function del(){
        $("#del").click(function(e){ //user click on remove text
        $(this).parent('#options').remove(); //刪除選項
        });
    };
</script>
<h1>編輯投票</h1>
<form action="editvote.php" method="post">
    <div>
        <label for="subject">投票主題：</label>
        <input type="text" name="subject" id="subject" value="<?=$subject['subject'];?>">
        <input type="button" value="新增選項" id="new">
        <input type="hidden" name="subject_id" value="<?=$subject['id'];?>">
    </div>
    <div id="selector">
        <input type="radio" name="multiple" value="1" <?=($subject['multiple']==0)?'checked':'';?>>
        <label>單選</label>
        <input type="radio" name="multiple" value="1" <?=($subject['multiple']==1)?'checked':'';?>>
        <label>複選</label>
    </div>
    <div id="options">
        <?php 
        foreach($options as $option){
        ?>
        <div>
            <label>選項:</label><input type="text" name="option[<?=$options['id'];?>]" value="<?=$options['option'];?>">
        </div>
        <?php 
        }
        ?>
    </div>
    <input type="submit" value="修改">

</form>