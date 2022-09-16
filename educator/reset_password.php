<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
    <title>Password Reset</title>
</head>
<body>
    <nav class="navbar is-info xx-large">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                <h1 class="title xx-large" style="color:white;text-align:center; padding:15px;">EDUCATORS SURVEY</h1>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <a href="index.php" class="navbar-item">
                    Sign In
                </a>
                <a href="register.php" class="navbar-item">
                    Register
                </a>
            </div>
        </div>
    </nav>
    <div class="columns is-vcentered is-centered" style="height: 100vh;">
        <div class="column is-one-third">
            <form method="post">
                <h3 class="title is-4"></h3>
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
                <div class="field has-text-centered">
                    <p class="control">
                        <input type="submit" class="button is-primary is-fullwidth" name="submit"  id="submit" value="Reset password">
                    </p>
                </div>
            </form>
        </div>
    </div>

    <?php
        require('../server/db_connect.php');
        require('../server/getQuestions.php');

        if (isset($_POST['submit'])) {
            $phone_no = $_POST['phone'];
            $password = $_POST['password'];
            $password = md5($password);
            $query = mysqli_query($conn,"select * from users where phone = '$phone_no'");
            $result = mysqli_num_rows($query);
            if($result == 0) {
                echo "<script>window.alert('Not a registered User')</script>";
            } else {
                $sql = "UPDATE users set pass = '$password' where phone = '$phone_no'";
                $stmt= $conn->query($sql);
                if (isset($stmt)) {
                    echo "
                        <script>
                            window.alert('Password reset successful');
                            window.location.assign('index.php');
                        </script>
                    ";
                }
            }
        }
    ?>
</body>
</html>
