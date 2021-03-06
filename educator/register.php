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
    <div class="columns is-vcentered is-centered" style="height: 100vh;">
        <div class="column is-one-fifth">
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
                <p class="control">
                    <input type="submit" class="button is-primary" name="submit"  id="submit" value="Register">
                </p>
            </form>
        </div>
    </div>

    <?php 
        require('../server/db_connect.php');
        require('../server/getQuestions.php');

        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone_no = $_POST['phone'];
            $password = $_POST['password'];
            //$password = md5($password);
            $targets_id = 2;
            $targets_id = (int) $targets_id;
            $sql = "INSERT INTO users (first_name, last_name, phone, targets_id, pass) VALUES (?,?,?,?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->bind_param("sssds", $firstname, $lastname, $phone_no,$targets_id,$password);
            $stmt->execute();
            if (!isset($stmt)) {
                echo "Registration not successful";
                header("Location:registration.php");
            }
            else {
                echo "Registration Successful";
                header("Location:index.php");
            }

        }
    ?>
</body>
</html>