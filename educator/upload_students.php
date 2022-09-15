<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload Page</title>
        <link rel="stylesheet" href="../css/bulma.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
        <?php
            require('../server/db_connect.php');
        ?>
    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    <h3 class="title is-3">UPLOAD STUDENTS</h3>
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
        <div class="container has-text-centered" style="margin-top: 50px;">
            <form method="POST" enctype="multipart/form-data">
                <div class="columns is-centered">
                    <div class="column"></div>
                    <div class="column">
                    	<div class="field">
			    <select class="input" name="class_id" id="class_id" >
                                    <option disabled selected style="text-align:center">------Select Class------</option>
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
                        <div class="file  is-centered">
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
                    $firstname = $getData[0];
                    $lastname = $getData[1];
                    $admissionNumber = $getData[2];
                    $classes_id = $_POST["class_id"];
                    $targets_id = 1;
                    $targets_id = (int) $targets_id;
                    $password = '12345'; 
                    $campus_id = $_SESSION["campus"];
                    $sql = "INSERT into users (first_name,last_name,admission_num,classes_id,targets_id,pass,campus_id) VALUES (?,?,?,?,?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->bind_param("sssddsd", $firstname, $lastname, $admissionNumber,$classes_id,$targets_id,$password,$campus_id);
                    $stmt->execute();

                }
                
                if(!isset($stmt))
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
          
            fclose($file);  
         }
      }   
?>
