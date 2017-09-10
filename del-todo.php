<?php
//header("Location: Campus0.html");
//exit;
//Sample Database Connection Syntax for PHP and MySQL.
//Connect To Database

session_start();
if (isset($_SESSION['user_on'])) {


  include 'connectionStrings.php';

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }




  $todoid = $_POST['todoidn'];
  $sqlcheck = "DELETE FROM `todos` WHERE `todoid` = '$todoid'";

  if (mysqli_query($conn, $sqlcheck)) {

     // echo ("<script>window.location.replace ('http://www.tentoesdwn.com/PSitev2/index.php');</script>");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
      echo ("<script>alert(".$todoid."</script>");
}




  mysqli_close($conn);
} else {

  //echo ("<script>window.location.replace ('http://www.tentoesdwn.com/PSite/indexv2.php');</script>");

}

?>
