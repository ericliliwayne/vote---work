<?php
    include_once "./other/functionall.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>歡迎光臨線上投票所</title>
    <script src="./style/jquery.js"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="top">
        <?php
            include "./block/header.php";
        ?>
    </div>

    <div class="side">
    <?php
            include "./block/sidebar.php";
        ?>
    </div>

    <section>
        <div class="menu">
            <?php
                include "./block/headerindex.php";
            ?>
        </div>

        <div class="container">
        <?php
        if(isset($_GET['do'])){
            $file='./back/'.$_GET['do'].".php";
        }
        if(isset($file) && file_exists($file)){
            include $file;
        }else{
            include "./front/votelist.php";
        }
            
        ?>
        </div>
    </section>

    <div class="footer">
    <?php
            include "./block/footer.php";
        ?>
    </div>
</body>
</html>