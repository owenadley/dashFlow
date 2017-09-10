<?php
//header("Location: Campus0.html");
//exit;
//Sample Database Connection Syntax for PHP and MySQL.
//Connect To Database
session_start();
  include 'connectionStrings.php';
$usertable="users";



// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$newfirstname = $_POST['first_name'];
$newlastname = $_POST['last_name'];
$newpassword = $_POST['password'];
$newpassword1 = $_POST['password1'];
$newemail = $_POST['email'];
$newcategory = null;
$registerdate = date("Y-m-d H:i:s"); // If your mysql column is datetime


//***********************************************************************
//CHECK FOR ERRORS
//RETURN THESE TO USER WITH NOTIFICATION DIALOG OF SORT
if ($newpassword != $newpassword1) {
  echo "Passwords do not match!";
}

//***********************************************************************

if ($newpassword == $newpassword1) {

    if ($newemail &&newfirstname && newlastname) {

        $newfirstname = mysqli_real_escape_string($conn, $newfirstname);
        $newlastname = mysqli_real_escape_string($conn, $newlastname);
        $newemail = mysqli_real_escape_string($conn, $newemail);
        $newpassword = mysqli_real_escape_string($conn, $newpassword);
        $newpassword1 = mysqli_real_escape_string($conn, $newpassword1);



        //Add user login details to the users db table.
        $sql = "INSERT INTO $usertable (password, date, firstname, lastname, email) VALUES ('$newpassword', '$registerdate', '$newfirstname', '$newlastname', '$newemail')";

        //Finish query and verify user created in db
        if (mysqli_query($conn, $sql)) {
          $sqlcheck = "SELECT * FROM  `users` WHERE  `email` =  '$newemail' AND  `password` =  '$newpassword'LIMIT 0 , 30";

          $run_user = mysqli_query($conn, $sqlcheck);
          while ($check_user = mysqli_fetch_assoc($run_user)) {
            $userID = $check_user['id'];



            $_SESSION['user_on'] = $newfirstname;
            $_SESSION['userid_on'] = $userID;
            echo ("<script>window.location.replace ('https://www.dashflow.net');</script>");
          }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }



    }
}






?>
