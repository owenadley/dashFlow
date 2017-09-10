<?php
          header("Location:index.php");
          
session_start();
if (isset($_SESSION['user_on'])) {


  include 'connectionStrings.php';

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
      date_default_timezone_set("America/Toronto");
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  //gets all variables for creating a new forum row in the database
  $color = $_POST['cor'];
  $user = $_SESSION['userid_on'];
  $date = date("Y-m-d H:i:s");    // If your mysql column is datetime
  $userid = $_SESSION['userid_on'];


  // escape the color incase user attempts to change input value for color radio
  $colorEscaped = mysqli_real_escape_string($conn, $color);
  // creates sql to add the new site to the database
  $sqlnewevent = "SELECT `color` FROM `users` WHERE `id` = '$userid'";


  // attempt to add the new forum to the database
  if ($result = mysqli_query($conn, $sqlnewevent)) {

      $sqlUpdateColor = "UPDATE `users` SET `color` = '$color' WHERE `id` = '$userid'";

      if (mysqli_query($conn, $sqlUpdateColor)) {
          //successful
          exit;
      }


  } else {


  	echo ("<script>alert('Were sorry, we can't seem to create your forum right now..');</script>");
      echo mysqli_error($conn);
  }

} else {


	echo ("<script>alert('You must be logged in to create a forum!');</script>");
echo mysqli_error($conn);
}

  mysqli_close($conn);

?>
