<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <title>SURVEY</title>
        <?php 
        
            require('db_connect.php'); 
        ?>

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
    </head>
    <body>
        <div class="box has-text-centered" style="margin-top:100px;">
            <h1 class="is-size-1 is-success">Thanks for participating in this survey!!!</h1>
            <p class="is-size-4">Click <a href="../logout.php" class="is-size-4"> OK </a> to continue... 
        </div>
    </body>
</html>