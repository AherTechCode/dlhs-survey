<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bulma.min.css">
    <script src="https://kit.fontawesome.com/e225876d23.js" crossorigin="anonymous"></script>
    <title>VIEW STUDENT</title>
    <style>
        *{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php
        require('../server/getQuestions.php');
        $page = $_GET['page'] ?? 1;
        $perPage = 20;
        $targ = 1;
        $customers = getStudents($perPage, $page,$targ);
        $clients = json_decode($customers[0]);
        $total = (int)$customers[1];
    ?>
    <nav class="navbar is-light">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <h1 style="font-size: xx-large;">STUDENTS</h1>
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
                        <p class="control">
                            <a class="button is-success" href="upload_students.php">
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
    <div class="container p-4">
    <div class="field">
        <div class="control has-icons-right">
            <input id="myInput" name="myInput" onkeyup="doSearch();" class="input" type="text" placeholder="Search client by name.">
            <span class="icon is-small is-right">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="table-container">
        <table id="myTable" name="myTable" class="table is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Students ID</th>
                    <th>Students First Name</th>
                    <th>Students Last Name</th>
                    <th>Admission Number</th>
                    <th>Classes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach($clients as $client) {
                    $index++;
                    ?>
                    <tr>
                        <td style="text-align: centre;"><?php echo $client->id; ?></td>
                        <td><a href="student.php?page=<?php echo $client->id; ?>"><?php echo $client->first_name; ?></a></td>
                        <td><a href="student.php?page=<?php echo $client->id; ?>"><?php echo $client->last_name; ?></a></td>
                        <td><a href="student.php?page=<?php echo $client->id; ?>"><?php echo $client->admission_num; ?></a></td>
                        <td>
                            <?php 
                                if ($client->targets_id == 1){
                                    echo "students";
                                }
                                else {
                                    echo "Educators";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                switch ($client->classes_id) {
                                    case "1" :
                                        echo "Basic 7";
                                        break;
                                    case "2" :
                                        echo "Basic 8";
                                        break;
                                    case "3" :
                                        echo "Basic 9";
                                        break;
                                    case "4" :
                                        echo "SSS 1";
                                        break;
                                    case "5" :
                                        echo "SSS 2";
                                        break;
                                    case "6" :
                                        echo "SSS 3";
                                        break;
                                    default:
                                        echo "educator";
                                }
                             ?>
                             </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <span class="pl-3">Page <?php echo $_GET['page'] ?? 1; ?> of <?php echo ceil($total/20); ?></span>
    </div>
    <div class="field is-grouped" style="overflow-x: auto;">
        <?php
            $btnNo = $total/20;
            for($t=0; $t<$btnNo; $t++) {
                ?>
                <a class="button ml-1" href="view_students.php?page=<?php echo $t+1; ?>"><?php echo $t+1; ?></a>
                <?php
            }
        ?>
    </div>
    </div>
    <script>
        function doSearch() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>