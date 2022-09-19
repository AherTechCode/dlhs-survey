<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
    <title>User Registration</title>
</head>
<body>
    <nav class="navbar is-info xx-large">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <h1 class="title xx-large" style="color:white;text-align:center; padding:15px;">EDUCATORS SURVEY</h1>
            </a>
        </div>
    </nav>
    <div class="columns is-vcentered is-centered" style="height: 100vh;">
        <div class="column is-one-third">
            <form method="post">
                <div class="field">
                    <label for="firstname" class="label">First Name</label>
                    <div class="control">
                        <input class="input" id="firstname" name="firstname" type="text">
                    </div>
                </div>
                <div class="field">
                    <label for="lastname" class="label">Last Name</label>
                    <div class="control">
                        <input class="input" id="lastname" name="lastname" type="text">
                    </div>
                </div>
                <div class="field">
                    <label for="phone" class="label">Phone Number</label>
                    <div class="control">
                        <input class="input" id="phone" name="phone" type="text">
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input class="input" id="password" name="password" type="password">
                    </div>
                </div>
                <div class="field">
                    <label for="campus" class="label">Campus:</label>
                    <div class="control">
                        <select class="input" name="campus_id" id="campus_id" >
                            <option disabled selected style="text-align:center">------Select Campus------</option>
                            <?php
                                require('../server/db_connect.php');
                                $camp_list = "select * from campuses";
                                $camp_query = $conn->query($camp_list);
                                while($row = $camp_query->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['campus'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="field has-text-centered">
                    <p class="control">
                        <input type="submit" class="button is-primary is-fullwidth" name="submit"  id="submit" value="Register">
                    </p>
                </div>
                <p>
                  Already have an account? <a href="educator.php"> Sign in.</a>
                </p>
            </form>
        </div>
    </div>

    <?php 
        require('../server/db_connect.php');
        //require('../server/getQuestions.php');

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone_no = $_POST['phone'];
            $password = $_POST['password'];
            $campus = $_POST['campus_id'];
            $password = md5($password);
            $targets_id = 2;
            $targets_id = (int) $targets_id;

            $query = mysqli_query($conn,"select * from users where phone = '$phone_no'");
            $result = mysqli_num_rows($query);
            if($result > 0) {
                echo "<script>window.alert('Phone number already exist, Please use another phone number')</script>";
            } else {
                $sql = "INSERT INTO users (first_name, last_name, phone, targets_id, pass,campus_id) VALUES (?,?,?,?,?,?)";
                $stmt= $conn->prepare($sql);
                $stmt->bind_param("sssdss", $firstname, $lastname, $phone_no,$targets_id,$password,$campus);
                $stmt->execute();
                if (!isset($stmt)) {
                    echo "Registration not successful";
                    header("Location:registration.php");
                }
                else {
                    echo "
                        <script>
                            window.alert('registration successful');
                            window.location.assign('index.php');
                        </script>
                    ";
                }
            }
        }
    ?>
</body>
</html>
