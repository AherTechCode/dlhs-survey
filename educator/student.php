<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <title>STUDENT INFORMATION UPDATE</title>
        <style>
            *{
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-brand">
                <a class="navbar-item" href="view_students.php">
                    <h1 style="font-size: xx-large;">VIEW STUDENTS</h1>
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
                                <a class="bd-tw-button button" href="educator.php">
                                    <span class="icon">
                                        <i class="fas fa-arrow-left"></i>
                                    </span>
                                    <span>
                                        BACK
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
            require('../server/getQuestions.php');
            require('../server/db_connect.php');
            $client_id = $_GET['page'];
            $profile = json_decode(getStudent($client_id))[0];        
        ?>
        <div class="container">
            <div class="columns">
                <div></div>
                <div class="column">
                    <div class="box is-large">
                    <p class="is-size-5"><?php echo "<b>First Name:</b> ".$profile->first_name; ?></p><br/>
                    <p class="is-size-5">
                    <p class="is-size-5"><?php echo "<b>Last Name:</b> ".$profile->last_name; ?></p><br/>
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
                     <p class="is-size-5"><?php echo "<b>Admission Number:</b> ".$profile->admission_num; ?></p><br/>
                    </div>
                    <div class="field">
                        <a class="button is-info" onclick="doFileUpload();">Update Students Details</a>
                    </div>
                </div>
            </div>   
        </div>
        <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Update Students</p>
                    <button id="btnClose" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="field">
                            <label for="first_name" class="label is-medium">Enter First Name </label> 
                            <div class="control">
                                <input type="text" class="input" name="first_name" id="first_name" value="<?php echo $profile->first_name; ?>">
                            </div>
                        </div>
                        <div class="field">
                            <label for="last_name" class="label is-medium">Last Name</label>
                            <div class="control">
                                <input type="text" class="input" name="last_name" id="last_name" value="<?php echo $profile->last_name; ?>">
                            </div>
                        </div>
                        <div class="field">
                            <label for="student_class" class="label is-medium">Select students class:</label> 
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
                            <label for="admission_num" class="label is-medium">Admission Number</label>
                            <div class="control">
                                <input type="text" class="input" name="admission_num" id="admission_num" value="<?php echo $profile->admission_num; ?>">
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
                $firstname = $_POST['first_name'];
                $lastname = $_POST['last_name'];
                $std_class = $_POST['std_class'];
                $admission_num = $_POST['admission_num'];
                
                

                $sql = "UPDATE users SET first_name = '" . $firstname . "',last_name = '" . $lastname . "',admission_num = '" . $admission_num . "',classes_id = '" . $std_class . "'  WHERE  users.id = $client_id ";
                $result = $conn->query($sql);
                
                if(!isset($result))
                {
                    echo "<script type=\"text/javascript\">
                        alert(\"Oops!!!Students not Updated\");
                        </script>";    
                 }
                else {
                    echo "<script>
                         alert(\"Students Info updated successfully!!!.\");
                        </script>";    
                    header("Location: view_students.php");                
                }


            }
        ?>
    </body>
</html>


