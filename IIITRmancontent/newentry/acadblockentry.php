<?php
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

if ($_SESSION['adloggedin'] != 1) {
    header('location:index.php');
} else {
    $name = $_POST['entreename'];
    $rollno = $_POST['rollno'];
    $mobno = $_POST['mobno'];
    $roomno = $_POST['roomno'];
    $email = $_POST['email'];
    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO acadblockentry (entreename,rollno,room,mobno,email) VALUE ('$name','$rollno','$roomno','$mobno','$email')";
        if (mysqli_query($con, $sql)) {
            $msg = "entry successful";
        } else {
            echo "ERROR in inserting data to database";
            mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Add New Entry</title>
</head>

<body>
    <div class="signup d-flex flex-row justify-content-center" style="background-size:cover; ;
    height:100vh; background-image:url(https://cdn1.vectorstock.com/i/1000x1000/15/80/triangle-web-page-background-vector-4661580.jpg); ">
        <div class="signup-box " style="background-color:#e8e8e8; color:black; border-style:solid; margin-top:90px; width:700px; height:450px; text-align:center; padding:20px; border-radius: 100px;  border-width:2px; 
">
            <div class="" >
                <a href="https://iiitr.ac.in" target="_blank" style="font-size:28px; color:black; font-family:sans-serif;">
                    <b>IIIT RAICHUR ENTRY MANAGEMENT SYSTEM</b>
                </a>
                <p style="font-size:25px ;color:black; font-family:sans-serif;"> <b>NEW ENTRY (ACADEMIC BLOCK)</b></p>

                <p style="font-size:16px; color:black" text-align="center">

                </p>
                <label>
                    <div class="update" style=" color:red; font-weight:bold; width:250px;">
                        <?php if ($msg) {
                            echo $msg;
                        }  ?>
                    </div>
                </label>
                <div>
                    <form action="" method="post" name="acadblockentry" style="text-align:center;margin-bottom:2px ;">
                        <div>
                            <label for="entreename" style="padding: 5px;"> Name</label>
                            <input type="text" name="entreename" id="entreename" placeholder="Name" required="true">
                        </div>
                        <div>
                            <label for="rollno" style="padding: 5px; "> Roll no.</label>
                            <input class="" type="text" name="rollno" id="rollno" placeholder="Roll no." required="true">
                        </div>
                        <div>
                            <label for="roomno" style="padding: 5px; ">Room No.</label>
                            <input type="roomno" id="roomno" name="roomno" placeholder="Room no." required="true">
                        </div>
                        <div>
                            <label for="mobno" style="padding: 5px; ">Mobile No.</label>
                            <input type="mobno" id="mobno" name="mobno" placeholder="Mobile No." required="true">
                        </div>
                        <div>
                            <label for="email" style="padding: 5px;"> Email ID</label>
                            <input type="text" id="email" name="email" placeholder="email" required="true">
                        </div>
                </div>
                <button class="submit" style="margin:5px; width:150px; height:40px; font-size:20px; background-color:blue; color:white; font-weight:bold; border-radius:15px;" type="submit"  name="submit">Submit</button>

            </div>
            </form>
        </div>


    </div>
    </div>
    </div>
</body>

</html>