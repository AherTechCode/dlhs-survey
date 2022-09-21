<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Survey</title>
        <link rel="stylesheet" href="css/bulma.min.css">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <?php require('server/db_connect.php'); ?>
        <style>
            .navbar-brand {
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                text-align: center;
                font-weight: bolder;
                float: left;
                color:white;
            }
            
        </style>
    </head>
    <body>
        <?php if (isset($_SESSION["user"])) { ?>
    <nav class="navbar is-info">
        <div class="navbar-brand">
            <div class="navbar-item">
            <a href="index.php">
                <h1 class="title xx-large" style="color:white;text-align:center; padding:15px;">STUDENTS SURVEY</h1>
            </a>
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </a>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu">
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                            <a class="button is-danger" href="logout.php">
                                <span class="icon">
                                    <i class="fa fa-times"></i>
                                </span>
                                <span>LOG OUT</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
        <?php } ?>
    <?php 
        if (!isset($_SESSION['user'])) {
            ?>
    <nav class="navbar is-info xx-large">
        <div class="navbar-brand">
            <div class="navbar-item">
            <a href="index.php">
                <h1 class="title xx-large" style="color:white;text-align:center; padding:15px;">STUDENTS SURVEY</h1>
            </a>
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </a>
            </div>
        </div>
    </nav>
            <div class="columns is-vcentered is-centered" style="height: 100vh; ">
                
                <div class="column is-one-fifth">
                    <div class="container">
                        <form method="post">
                            <div class="field">
                                <label for="username" class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input class="input" id="username" name="username" type="text">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input class="input" id="password" name="password" type="password">
                                    <span class="icon is-small is-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="control">
                                <input type="submit" class="button is-primary" name="login" id="login" value="Login">
                            </p>
                        </form>
                    </div>
                </div>
                
            </div>
            <?php
        } else  {
            ?>
            <form method="post" enctype="multipart/form-data">
            <div class="content is-medium" style="padding-left:30px; margin-top:55px;">
            <div class="columns is-centered">
                <div class="column">

                    <h1 class="title"> Welcome <?php echo $_SESSION["user"];?> </h1>
                    <br/>
                    <?php 

                        $question_query = " SELECT * FROM questions WHERE classes_id = '". $_SESSION["classes"]."'";
                        $results = $conn->query($question_query);
                        $rowNumber = $results->num_rows;
                        $_SESSION['rowNumber'] = $rowNumber;
                        $i = 1;
                        if ($results->num_rows > 0){
                            while ($rows = $results -> fetch_assoc()){
                            ?>
                                    <div class="box">
                                        <input type="hidden" id="question_id" name="question<?php echo $i; ?>" value='<?php echo $rows['id']; ?>' >
                                        <p style="font-size:1.2em;"><b><?php echo "$i. &nbsp; ".$rows['question_tab']."" ?></b></p>
                                        <input type = 'radio' id="survey_replies" <?php echo "name = $i" ?> value='4' >
                                        <label for = 'strongly_agree'>Strongly_agree</label><br/> 
                                        <input type = 'radio' id="survey_replies" <?php echo "name = $i" ?> value='3' >
                                        <label for = 'Agree'>Agree</label><br/> 
                                        <input type = 'radio' id="survey_replies" <?php echo "name = $i" ?> value='2' >
                                        <label for = 'Disagree'>Disagree</label><br/>
                                        <input type = 'radio' id="survey_replies" <?php echo "name = $i" ?> value='1' >
                                        <label for = 'strongly_disagree'>Strongly_disagree</label><br/> 
                                    </div>
                        <?php    
                                   $i++;
                            }
                        }

                        ?>
                    <div class='field'>
                        <div class='submit is-large'>
                            <input class='button is-large is-success' type='submit' name='submit' value='Submit' />
                        </div>
                    </div>
                </div>
            </div>        
            </div>
            </form>
            <?php
        }
    ?>
    <?php

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM users WHERE admission_num ='". $_POST["username"]."' and pass = '". md5($_POST["password"]) ."'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            if($row) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["user"] = $row['first_name'];
                $_SESSION["classes"] = $row['classes_id'];
                header("Location:index.php");
            } else {
                echo "<script>alert('Invalid Admission number or password')</script>";
            }
            
            
        }


        if (isset($_POST['submit'])) {

            $row_num =  $_SESSION['rowNumber'];

           for ($k=1;$k<=$row_num ;$k++) {
                $response = $_POST[$k];
                $response = intval($response);
                $questions_id = $_POST["question".$k];
                $questions_id = intval($questions_id);
                $targets_id = intval(1);
                $users_id = $_SESSION['id'];
                $users_id = intval($users_id);
                $std_class = $_SESSION["classes"];
                $std_class = intval($std_class);
                $sql = "INSERT INTO responses (response_tab,questions_id,classes_id,targets_id,users_id) VALUES (?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->bind_param("ddddd",$response,$questions_id,$std_class,$targets_id,$users_id);
                $stmt->execute();
           }
            session_unset();
            session_destroy();
           
            ?>
            <script>
                setTimeout(() => { window.location.href = "server/response.php"; }, 500);
            </script>
            <?php
        }

    ?>
    </body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Add a click event on each of them
$navbarBurgers.forEach( el => {
  el.addEventListener('click', () => {

    // Get the target from the "data-target" attribute
    const target = el.dataset.target;
    const $target = document.getElementById(target);

    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    el.classList.toggle('is-active');
    $target.classList.toggle('is-active');

  });
});

});
</script>


