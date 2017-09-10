<?php

session_start();
  include 'connectionStrings.php';


// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $enteremail = $_POST['email'];
    $enterpassword = $_POST['password'];

if ($enteremail && $enterpassword) {

    $enteremail = mysqli_real_escape_string($conn, $enteremail);
    $enterpassword = mysqli_real_escape_string($conn, $enterpassword);

    $sqlcheck = "SELECT * FROM  `users` WHERE  `email` =  '$enteremail' AND  `password` =  '$enterpassword'LIMIT 0 , 30";
    $run_user = mysqli_query($conn, $sqlcheck);

    if (mysqli_num_rows($run_user) > 0) {

        while ($row = mysqli_fetch_assoc($run_user)) {

            $checkEmail = $row['email'];
            $checkPass = $row['password'];
            $userName = $row['firstname'];
            $userID = $row['id'];
            //   echo "<script>alert('$userID');</script>";

          
            if ($checkEmail == $enteremail && $checkPass == $enterpassword) {
              
                date_default_timezone_set('America/Toronto');
              
                $_SESSION['user_on'] = $userName;
                $_SESSION['userid_on'] = $userID;
                $_SESSION['sysFeedback_on'] = '';
                $_SESSION['current_day'] = date('l'); 
            }

          header("Location:index.php");
            exit;

        }

    } else {
        $_SESSION['sysFeedback_off'] = 'Incorrect credentials';

        header("Location:index.php");
        exit;
    }
} else {
        $_SESSION['sysFeedback_off'] = 'Missing info';

        header("Location:index.php");
        exit;
}

mysqli_close($conn);

?>
