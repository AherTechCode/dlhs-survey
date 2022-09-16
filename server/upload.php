<!DOCTYPE html>
<html>
    <head>
        <title>Upload Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <?php
            require('db_connect.php');
            require ('getQuestions.php');


             if(isset($_POST["submit_file"])){

        $filename=$_FILES["file"]["tmp_name"];
         if($_FILES["file"]["size"] > 0)
         {
            $count = 0;
            $file = fopen($filename, "r");
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
                 $count++;
                 if ($count == 1) { continue; }
                 $question_tab = $getData[0];
                 $question_tab = mysqli_real_escape_string($conn,$question_tab);
                 $targets_id = $_POST["target_id"];
                 $classes_id = $_POST["class_id"];
                 $sql = "INSERT into questions(question_tab,targets_id,classes_id)
                       VALUES('$question_tab','$targets_id','$classes_id')";
                       $result = $conn->query($sql);
                    if(!isset($result))
                    {
                        echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        </script>";
                    }
                    else {
                        echo "<script>
                         alert(\"File has been successfully Imported.\");
                         window.location.assign('admin.php');
                        </script>";
                    }
                }

            fclose($file);
         }
      }
        ?>
    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <h1 style="font-size: xx-large;">UPLOAD QUESTIONS</h1>
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
                                <a class="bd-tw-button button" href="admin.php">
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
        <div class="container has-text-centered" style="margin-top: 50px;">
            <form method="POST" action="upload.php" enctype="multipart/form-data">
                <div class="columns is-centered">
                    <div class="column"></div>
                    <div class="column mt-4">
                        <div class="has-background-info mb-3"><a style="color:white" href="../templates/    questions_template.csv">Download Template</a></div>
                        <div class="field" id="target">
                          <select class="input" name="target_id" id="target_id" onchange="showStudent('class_stud', this)" >
                            <option disabled selected style="text-align:center">------Select Target------</option>
                                    <?php
                                        require('../server/db_connect.php');
                                        $target = "select * from targets";
                                        $target_query = $conn->query($target);
                                        while($row = $target_query->fetch_assoc()) {
                                    ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['personnel'] ?></option>
                                    <?php
                                    }
                                    ?>
                          </select>
                        </div>
                        <div class="field" id="class_stud" style="display: none;">
                          <select class="input" name="class_id" id="class_id" >
                            <option disabled selected style="text-align:center">------Select  Class------</option>
                                    <?php
                                        require('../server/db_connect.php');
                                        $camp_list = "select * from classes";
                                        $camp_query = $conn->query($camp_list);
                                        while($row = $camp_query->fetch_assoc()) {
                                    ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['student_class'] ?></option>
                                    <?php
                                    }
                                    ?>
                          </select>
                        </div>
                        <div class="file is-centered is-large">
                            <input type="file" id="file" name="file" class="input is-large is-info" accept=".csv">
                        </div><br/>
                        <div class="file is-grouped is-centered">
                            <div class="submit is=large">
                                <input class="button is-large is-success" Type="submit" name="submit_file" value="Upload" />
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="submit is=large">
                                <input class="button is-large is-warning" Type="reset" name="reset_file" value="Cancel" />
                            </div>
                        </div>
                    </div>

                    <div class="column"></div>
                </div>
            </form>
        </div>
    </body>
</html>




<script type="text/javascript">
    function showStudent(div_id,element) {
        document.getElementById(div_id).style.display = element.value == 1 ? "block" : "none";
    }
</script>