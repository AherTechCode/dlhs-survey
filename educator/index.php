<?php 
    session_start(); 
    require('../server/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
       
    <title>Educator</title>
</head>
<body>
    <nav class="navbar is-info xx-large is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <h1 class="title xx-large" style="color:white;text-align:center; padding:15px;">EDUCATORS SURVEY</h1>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <a href="educator.php" class="navbar-item">
                    Give Feedback
                </a>
                <a class="navbar-item">
                    Upload Students
                </a>
            </div>
        </div>
    </nav>
    <?php 
        if (!isset($_SESSION['user'])) {
            ?>
                <div class="columns is-vcentered is-centered" style="height: 100vh;">
                <div class="column is-one-fifth">
                    <div class="container">
                        <form method="post">
                            <div class="field">
                                <label for="username" class="label">Phone Number</label>
                                <div class="control has-icons-left">
                                    <input class="input" id="username" name="username" type="text" placeholder="enter your phone number">
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
                            <div class="field">
                                No account? <a href="register.php"> Register here.</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM users WHERE phone ='". $_POST["username"]."' and pass = '". $_POST["password"]."'";
            $result = $conn->query($query);
            $row = $result -> fetch_assoc();
            if(is_array($row)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["user"] = $row['first_name'];
                $_SESSION["campus"] = $row['campus_id'];
            } else {
                $message = "Invalid Phone number or Password!";
            }
        }
        if(isset($_SESSION["id"])) {
            header("Location:educator.php");
        }
    ?>
</body>
</html>