<?php
session_start();
error_reporting(0);

session_start();
error_reporting(0);
$host = "localhost";
$user = "root";
$password = '';
$db_name = "iiitrentry";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}
?>
<?php
if ($_SESSION['stloggedin'] != 1) {
    header('location:index.php');
} else {
    $stid = $_SESSION['stID'];
    $ret = mysqli_query($con, "select * from stlogin where id='$stid'");
    $row = mysqli_fetch_array($ret);
    $roll = $row['rollno'];
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Hostel Entries</title>
    </head>

    <body>
                        
                                <div class="table">
                                    <table class="table table-borderless table-striped table-earning table-dark">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Name</th>

                                                <th>Roll No.</th>
                                                <th>Request</th>
                                                <th>Email ID</th>
                                                <th>Response</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select *from requests where rollno='$roll'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                            
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['rollno']; ?></td>
                                                <td><?php echo $row['requests']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['response']; ?></td>
                                            
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        } ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-center copyright-section">
            <span style="color:red;">&#169</span> <span style="font-style:italic;"><b> MANAGING MASTERS 2022.All rights reserved</b></span>
        </div>


    </body>

    </html>
<?php } ?>