<?php 
ini_set('session.save_path', '../tmp');
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Survey</title>
        <link rel="stylesheet" href="../css/bulma.min.css">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <?php require('../server/db_connect.php'); ?>
    </head>
    <body>
        <?php if (!is_null($_SESSION['user'])) { ?>
            <nav class="navbar is-light">
                <div class="navbar-brand">
                    <a class="navbar-item" href="index.php">
                        <h1 style="font-size: xx-large;">EDUCATOR</h1>
                    </a>
            <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </a>
                </div>

                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                                    <a class="button is-success" href="upload_students.php">
                                        <span class="icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span>UPLOAD STUDENTS</span>
                                    </a>
                                    <a class="button is-success" href="view_students.php">
                                        <span class="icon">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <span>VIEW STUDENTS</span>
                                    </a>
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
        <form method="post" enctype="multipart/form-data">
            <div class="container is-medium has-text-centered">
                <div class="content is-medium">
                    <h2 class="title">Welcome <?php echo $_SESSION["user"];?></h2>

                    <h4 class="sub-title">Would you like to participate in this survey now???</h4>
                    <h5 class="sub-title"> Click
                    <input type="submit" class="button is-info" value="start" name="submit1">
                        To begin
                    </h5>
                </div>        
            </div>
            <div class="content is-medium" style="padding-left:25px;">
            <?php 
                if (isset($_POST['submit1'])){
                    global $rowNumber;
                    $user_id = $_SESSION['id'];
                    $question_query = " SELECT * FROM questions WHERE questions.targets_id = 2";
                    $results = $conn->query($question_query);
                    $rowNumber = $results->num_rows;
                    $_SESSION['rowNumber'] = $rowNumber;
                    if ($rowNumber > 0){
                        $i = 1;
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
                ?>
                        <div class="field">
                            <div class='submit is-large'>
                                <input class='button is-large is-success' type='submit' name='submit2' value='Submit' />
                            </div>
                        </div>
            <?php
                  }
                }      
            ?>
            </div>
        </form>
        <?php
            } else {
                header("Location:index.php");
            }
            if (isset($_POST['submit2'])) {
               //echo $_SESSION['rowNumber'];
               $row_num =  $_SESSION['rowNumber'];
               //echo $row_num;
              for ($k=1;$k<=$row_num ;$k++) {
                  $response = $_POST[$k];
                  $response = intval($response);
                  $questions_id = $_POST["question".$k];
                  $questions_id = intval($questions_id);
                  $targets_id = intval(2);
                  $users_id = $_SESSION['id'];
                  $users_id = intval($users_id);
                  //$results = array($response,$questions_id,$targets_id,$users_id);
                  //echo $results[1];
                  $sql = "INSERT INTO responses (response_tab,questions_id,targets_id,users_id) VALUES (?,?,?,?)";
                  $stmt= $conn->prepare($sql);
                  $stmt->bind_param("dddd",$response,$questions_id,$targets_id,$users_id);
                  $stmt->execute();
                //var_dump($_POST["question".$k]);
              }
                unset($_SESSION["id"]);
                unset($_SESSION["user"]);
                header("Location:response.php");
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

