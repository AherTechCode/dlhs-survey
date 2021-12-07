<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" href="../css/bulma.min.css">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <title>SURVEY</title>
        <style>
            *{
                font-size: 14px;
            }
            .box {
                height :200%;
                width : 60%;
                margin-top:100px;
                margin-left : 20%;
            }
        </style>
        <?php require('../server/db_connect.php'); ?>
    </head>
    <body>
        <?php 
            
            //$question_id = $_POST[];
           // $target_id = (int)2;
            //$class_id = 
        ?>
        <div class="box has-text-centered" style="margin-top:100px;">
            <h1 class="is-size-1 is-success">Thanks for participating in this survey!!!</h1>
            <p class="is-size-4">Click <a href="index.php" class="is-size-4"> OK </a> to continue... 
        </div>
    </body>
</html>