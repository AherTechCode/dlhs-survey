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
        <style>
            *{
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-brand">
                <a class="navbar-item" href="admin.php">
                    <h1 style="font-size: xx-large;">ADMIN</h1>
                </a>
                <div class="navbar-burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navbarExampleTransparentExample" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <a class="button is-success" href="upload.php">
                                    <span class="icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span>UPLOAD</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
            require 'db_connect.php';
            require 'getQuestions.php';

            $client_id = $_GET['page'];
            $profile = json_decode(getQuestion($client_id))[0];        
        ?>
        <div class="container">
            <div class="columns">
                <div></div>
                <div class="column">
                    <div class="box is-large">
                    <p class="is-size-5"><?php echo "<b>Question:</b> ".$profile->question_tab; ?></p><br/>
                    <p class="is-size-5">
                    <?php 
                        if ($profile->targets_id == 1){
                            echo "<b>Candidate Type:</b> Students";
                        }
                        elseif ($profile->targets_id == 2) {
                            echo "<b>Candidate Type:</b> Educator";
                        }
                     
                    ?>
                    </p><br/>
                    <p class="is-size-5">
                    <?php
                        switch ($profile->classes_id) {
                            case "1" :
                                echo "Class: Basic 7";
                                break;
                            case "2" :
                                echo "Class: Basic 8";
                                break;
                            case "3" :
                                echo "Class: Basic 9";
                                break;
                            case "4" :
                                echo "Class: SSS 1";
                                break;
                            case "5" :
                                echo "Class: SSS 2";
                                break;
                            case "6" :
                                echo "Class: SSS 3";
                                break;
                            default:
                                echo "educator";
                        } 
                     ?>
                     </p>
                     <br/>
                    </div>
                    <div class="field">
                        <a href="admin.php" class="button ml-1">Return To Admin</a>
                        <a class="button" onclick="doFileUpload();">Update Question</a>
                    </div>
                </div>
            </div>   
        </div>
        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Question</p>
                    <button id="btnClose" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label for="candidate" class="label is-medium">Select Candidate type: </label> 
                            <div class="select">
                                <select id="candidate" name="candidate" class="select">
                                    <option disabled selected value="">--select candidate type--</option>
                                    <option value="1">Student </option>
                                    <option value="2">Educator </option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label for="student_class" class="label is-medium">Select your class:<span class="is-danger">(Students Only)</span> </label> 
                            <div class="select">
                                <select id="std_class" name="std_class" class="select">
                                    <option disabled selected value="">--select a class--</option>
                                    <option value="1">Basic 7 </option>
                                    <option value="2">Basic 8 </option>
                                    <option value="3">Basic 9 </option>
                                    <option value="4">SSS 1 </option>
                                    <option value="5">SSS 2 </option>
                                    <option value="6">SSS 3 </option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label for="new_question" class="label is-medium">New Question</label>
                            <div class="control">
                                <input type="text" class="input" name="new_question" id="new_question" placeholder="Enter your question here...">
                            </div>
                        </div>
                        <div class="file is-grouped is-centered">
                            <div class="submit is=large">
                                <input class="button is-medium is-success" type="submit" name="submit_file" id="submit_file" value="Update" />
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="submit is=large">
                                <input class="button is-medium is-warning" type="reset" name="reset_file" value="Cancel" />
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    
        <script>
            var myBtn = document.getElementById("btnClose");
            myBtn.addEventListener('click', () => {
                var modal = document.getElementsByClassName('modal');
                modal[0].classList.remove('is-active');
            });

            function doFileUpload() {
                var modal = document.getElementsByClassName('modal');
                modal[0].classList.add('is-active');
            }
        </script>


        <?php

            if (isset($_POST['submit_file'])) {
                $candidate = $_POST['candidate'];
                $std_class = $_POST['std_class'];
                $new_question = $_POST['new_question'];
                
                

                $sql = "UPDATE questions SET question_tab = '" . $new_question . "',targets_id = '" . $candidate . "',classes_id = '" . $std_class . "'  WHERE  questions.id = $client_id ";
                $result = $conn->query($sql);
                
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                        alert(\"Oops!!!Questions not Updated\");
                        </script>";    
                 }
                else {
                    echo "<script>
                         alert(\"Question has been successfully Updated.\");
                        </script>";
                }
            }
        ?>
    </body>
</html>


