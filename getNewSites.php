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
  
  date_default_timezone_set('America/Toronto');

  $numChecked = count($sites);
  $userid = $_SESSION['userid_on']; 
  
  $sqlGetSites = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '1' order by `date` desc";
  $sqlCheckSites = mysqli_query($conn, $sqlGetSites);
 
  if (mysqli_num_rows($sqlCheckSites) > 0) { 


      while ($row = mysqli_fetch_assoc($sqlCheckSites)) {
        $siteId = $row['id'];
        $siteIco = $row['icon'];
        echo "
        <div class='col-xs-4 col-sm-4 col-md-4 iconFoundSites' id='iconF".$siteId."'> 
            <label class='delSiteIco'><input id='dsi' class='delSiteInput' type='checkbox' name='delSiteCheckBox' value='".$siteId."'><img class='imgIcoDel' src='".$siteIco."'></label>
        </div>
            ";
    }
  }
        
       // $count++; 

            //echo $count;






  mysqli_close($conn);
} else {

       // echo ("<script>window.location.replace ('http://www.tentoesdwn.com/PSitev2/index.php');</script>");

}

?>
