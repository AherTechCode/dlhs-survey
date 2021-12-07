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
        ?>
    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <h1 style="font-size: xx-large;">UPLOAD</h1>
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
                    <div class="column">
                        <div class="file is-centered is-large">
                            <label class="file-label">
                                <input class="file-input" type="file" name="file">
                                <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    Choose an excel file…
                                </span>
                                </span>
                            </label>
                        </div><br/><br/> 
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

<?php
     if(isset($_POST["submit_file"])){
        
        $filename=$_FILES["file"]["tmp_name"];    
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
                 $date =  date("Y-n-j G:i:s ");
                 $question_tab = $getData[0];
                 $targets_id = $getData[1];
                 $classes_id = $getData[2];
                 $sql = "INSERT into questions (question_tab,targets_id,classes_id,date_created) 
                       VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$date_created."')";
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
                        </script>";
                    }
                }
          
            fclose($file);  
         }
      }   
?>