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
  $sites = $_POST['sites'];
  $numChecked = count($sites);
  $userid = $_SESSION['userid_on'];
            echo $numChecked;
  $sqlGetSites = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav'";
  $sqlCheckSites = mysqli_query($conn, $sqlGetSites);

  if (mysqli_num_rows($sqlCheckSites) > 0) {

      $count = 0;
      while ($row = mysqli_fetch_assoc($sqlCheckSites)) {
        // get site from database one at a time and see if it is contained in the array of sites to delete
        $id = $row['id'];
        $count++;

        for ($i = 0; $i < $numChecked; $i++) {
          $currId = $sites[$i];

         if ($currId === $id) {
            $sqlcheck = "DELETE FROM `site-urls` WHERE `id` = '$id'"; 
            if (mysqli_query($conn, $sqlcheck)) {
              echo 'iconSites1'.$id;

              //echo ("<script>window.location.replace ('http://www.tentoesdwn.com/PSitev2/index.php');</script>");
            } 
          }
        }
    }
  }
        
       // $count++; 

            //echo $count;






  mysqli_close($conn);
} else {

       // echo ("<script>window.location.replace ('http://www.tentoesdwn.com/PSitev2/index.php');</script>");

}

?>
