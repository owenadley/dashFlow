<?php
//header("Location: Campus0.html");
//exit;


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

  //gets all variables for creating a new site
  $site = $_POST['url'];

  $site_user = $_SESSION['userid_on'];
  $site_date = date("Y-m-d H:i:s");    // If your mysql column is datetime


  if ($site) {
    $site = mysqli_real_escape_string($conn, $site);
  
    // check if the user inputted 'http(s)' and remove if they did
    $check1 = strpos($site, 'https');
    $check2 = strpos($site, 'http');
    $check3 = strpos($site, 'www.');
    
    // if http(s) is included (starts at index 0)
    if ($check1 === 0 || $check2 === 0) {
      $siteUrl = $site;
      
    // if http(s) is not included.. check for www
    } else {

      $siteUrl = "http://".$site.""; // add http(s) to site
    }

    //echo $siteUrl;
    //echo "<br>";
    $siteUrlI = parse_url($siteUrl);
    $siteUrlI = $siteUrlI['host'];
    $siteUrlI = "".$siteUrlI.""; // add http to site
    
    // attempt to find the shortcut icon on website
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML(file_get_contents($siteUrl));
    libxml_clear_errors();
    $xml = simplexml_import_dom($doc);
    $scIconFound;
    if ($xml) {
      $arr = $xml->xpath('//link[@rel="shortcut icon"]');
      $scIconFound = $arr[0]['href'];
    } 
    
    $check4 = strpos($scIconFound, 'https');
    $check5 = strpos($scIconFound, 'http');
    
    // if http(s) is included (starts at index 0)
    if ($check4 === 0 || $check5 === 0) {
      $scIconFound = $scIconFound;
    } else {
      $scIconFound = "https:".$scIconFound;
    }
      
   // echo $scIconFound;
    if (@getimagesize($scIconFound)) {
     //echo 'file found';
     //       echo $scIconFound;

      $siteIco = $scIconFound;
      $iconT = '1'; 
    } else {
    
      // try to get the site icon, else, classify it as no icon webiste and grab a name to display from url
      $siteIco1 = "".$siteUrl."/favicon.ico";
      $siteIco2 = "".$siteUrl."/favicon.png";
      $siteIco3 = "".$siteUrl."/img/favicon.ico";
      $siteIco4 = "".$siteUrl."/images/favicon.ico";
      $siteIco5 = "".$siteUrl."/assets/ico/favicon.ico";
      $siteIco6 = "".$siteUrl."/img/favicon.png";


      if (@getimagesize($siteIco1)) {
          $siteIco = $siteIco1;
          $iconT = '1';
      } else if (@getimagesize($siteIco2)){
          $siteIco = $siteIco2;
          $iconT = '1';
      } else if (@getimagesize($siteIco3)){ 
          $siteIco = $siteIco3;
          $iconT = '1';
      } else if (@getimagesize($siteIco4)){
          $siteIco = $siteIco4;
          $iconT = '1';
        } else if (@getimagesize($siteIco5)){
            $siteIco = $siteIco5;
            $iconT = '1';
      } else if (@getimagesize($siteIco6)){
          $siteIco = $siteIco6;
          $iconT = '1';
      } else {
          $siteIco = $siteUrl;
          $siteIco = parse_url($siteIco);
          $siteIco = $siteIco['host'];
          if (substr($siteIco, 0, 4) == 'www.') {
            $siteIco = substr($siteIco, 4);
          }
          $siteIco = substr($siteIco, 0, 1);
          $siteIco = strtoupper($siteIco);
          $iconT = '0';
      }
    }
    
    $siteUrl = mysqli_real_escape_string($conn, $siteUrl);
    $siteIco = mysqli_real_escape_string($conn, $siteIco);
    // creates sql to add the new site to the database
    $sqlnewsite = "INSERT INTO `site-urls`
  					( `url`, `userId`, `date`, `category`, `icon`, `iconT`) VALUES
  					('$siteUrl', '$site_user', '$site_date', 'fav', '$siteIco', '$iconT')";



  // attempt to add the new forum to the database
  if (mysqli_query($conn, $sqlnewsite)) {
    $id = mysqli_insert_id($conn);
    $siteAdded = true;
    //echo "<script>alert('".$id."');</script>";
  //	echo ("<script>window.location='http://www.tentoesdwn.com/PSitev2/index.php';</script>");
  } else {
    $siteAdded = false;
  }
    
  if ($siteAdded != false) {
    $userid = $_SESSION['userid_on']; 

    $sqlGetSites = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '1' order by `date` desc";
    $sqlCheckSites = mysqli_query($conn, $sqlGetSites);

    $sqlGetSites2 = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '0'";
    $sqlCheckSites2 = mysqli_query($conn, $sqlGetSites2);

    if (mysqli_num_rows($sqlCheckSites) > 0 || mysqli_num_rows($sqlCheckSites2) > 0) {

    echo "<div class='row'> <div id='iconSites1'>";
    while ($row2 = mysqli_fetch_assoc($sqlCheckSites)) {
        $site = $row2['url'];
        $siteIco = $row2['icon'];
        $siteId = $row2['id'];

        echo "
        <div class='col-xs-4 col-sm-4 col-md-4' id='iconFoundSites".$siteId."'>
            <a target='_blank' href='".$site."'><img class='editonHov' src='".$siteIco."' style='width:30px;height:30px;'></a>
        </div>
            ";
    }
    echo "</div></div>";

      if (mysqli_num_rows($sqlCheckSites2) > 0) {
        echo "<hr>";
        echo "<div class='row'>";
        while ($row2 = mysqli_fetch_assoc($sqlCheckSites2)) {
            $site = $row2['url'];
            $siteIcon = $row2['icon'];
            $siteName = $row2['url'];
            $siteName = parse_url($siteName);
            $siteName = $siteName['host'];
            if (substr($siteName, 0, 4) == 'www.') {
              $siteName = substr($siteName, 4);
            }
            $noIconSiteId = $row2['id'];

        echo "
        <div class='col-xs-4 col-sm-4 col-md-4 tttrig' id='noiconFoundSites".$noIconSiteId."'>
            <a target='_blank' id='noIcoSite' href='".$site."'><p class='sites-noIcon'>".$siteIcon."</p></a><span class='tooltiptext'>".$siteName."</span>
        </div>
            ";
        }
    echo "</div>";
      }
    }
    
    
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
