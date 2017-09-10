<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <title>myDash</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:800|Roboto+Mono|Roboto+Condensed|Asap|Bitter|Ropa+Sans|Work+Sans|Ubuntu|Alegreya+Sans+SC:400,700,800,900|Montserrat|Droid+Serif|Sintony|Bevan|Merriweather:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/stylephp.php">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
</head>

<body id="theGodlyBody" onload="startTime();">
<div class="se-pre-con"></div>
  <div class="owen-homedash">
 
<?php  
  
  include 'connectionStrings.php';

    // Create connection
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    
    if (isset($_SESSION['user_on'])) {
      date_default_timezone_set("America/Toronto");
      $_SESSION['current_day'] = date('l'); 
      $_SESSION['current_daynum'] = date('j'); 
    ?>

      <div id="mydash-home">
        <div class="mydash-body">

          <div class='headerBar' id='headBar'>
            <div class='row'> 
              <div class='col-md-12'>
                <div class='settingsIcon'>
                      <i class="fa fa-caret-square-o-right" id='nextBG' onclick='changeBackground();' aria-hidden="true"></i>&nbsp;&nbsp;
                      <i class='fa fa-cog' onclick='showSettings()' id='settingsIco' aria-hidden='true'></i>
                </div> 
              </div>
            </div>
          </div> 
          
          <div id='settingsWrapper' class='settingsPopUp'>
            <p id='settingsTxt'>Settings</p>
            <i class='fa fa-times closePopUp' id='closePopUpX' onclick='showSettings()' aria-hidden='true'></i>
            <hr>
            <div id='colorSelectorWrap'>
              <form id='selectNewColor' method='POST' action='save-PreferredColor.php' role='form'>
                <div class='form-group'>
                  <label id='pickAColorTxt' for='exampleInputEmail1'>Pick a Color</label>
                  <div id='colorslideid'>


                    <div>
                      <input type='radio' name='cor' id='cor1' value='#4986E7' />
                      <label for='cor1' onclick='changecol1();' class='cor1'></label>
                      <input type='radio' name='cor' id='cor2' value='#5484ED' />
                      <label for='cor2' onclick='changecol2();' class='cor2'></label>
                      <input type='radio' name='cor' id='cor3' value='#A4BDFC' />
                      <label for='cor3' onclick='changecol3();' class='cor3'></label>
                      <input type='radio' name='cor' id='cor4' value='#46D6DB' />
                      <label for='cor4' onclick='changecol4();' class='cor4'></label>
                      <input type='radio' name='cor' id='cor5' value='#7AE7BF' />
                      <label for='cor5' onclick='changecol5();' class='cor5'></label>
                      <input type='radio' name='cor' id='cor6' value='#51B749' />
                      <label for='cor6' onclick='changecol6();' class='cor6'></label>
                      <input type='radio' name='cor' id='cor7' value='#FBD75B' />
                      <label for='cor7' onclick='changecol7();' class='cor7'></label>
                      <input type='radio' name='cor' id='cor8' value='#FFB878' />
                      <label for='cor8' onclick='changecol8();' class='cor8'></label>
                      <input type='radio' name='cor' id='cor9' value='#FF887C' />
                      <label for='cor9' onclick='changecol9();' class='cor9'></label>
                      <input type='radio' name='cor' id='cor10' value='#DC2127' />
                      <label for='cor10' onclick='changecol10();' class='cor10'></label>
                      <input type='radio' name='cor' id='cor11' value='#DBADFF' />
                      <label for='cor11' onclick='changecol11();' class='cor11'></label>
                      <input type='radio' name='cor' id='cor12' value='#E1E1E1' />
                      <label for='cor12' onclick='changecol12();' class='cor12'></label>
                    </div>


                  </div>
                  <button class='defBtn' id='front' type='submit'>Save</button>
                </div>
              </form>
            </div>
            <form id='signOutF' action='sign-out.php'><button id='mydash-signout' type='Submit'>Sign Out</button></form>
          </div>


          <!-- Core content: ToDo, Date/Time/Msg, Sites -->
          <div class="row" style='height:100%;'>
            
            <!-- Users To Do List : Left -->
            <div class="col-xs-3 col-sm-3 col-md-3 nopad">

              <div class='todo-All'>
                <p id='todo-text'>ToDo&nbsp;&nbsp;&nbsp;<i class='fa fa-plus rotate' onclick='showAddToDo();clrTDName();' id='addToDoIcon' aria-hidden='true'></i></p>

                <div id='addToDoWrapper' class='createEventPopup'>
                  <p id='createToDoTxt'>Create To Do</p> <i class='fa fa-times closePopUp' id='closePopUpX' onclick='showAddToDo()' aria-hidden='true'></i>
                  <hr>
                  <form name='newTDF' id='newtodoform' onsubmit='return createNewToDo(event);'> 
                    <input type='text' name='todo' id='newToDoTitle' placeholder='Title' class='create-todo-input' />
                    <br><br>

                    <input type='radio' name='todo-day' id='rb2' value='nsd' checked='checked' />
                    <label id='myRadioLabel' for='rb2'>General</label>

                    <input type='radio' name='todo-day' id='rb1' value='tod' />
                    <label id='myRadioLabel' for='rb1'>Important</label><br>

                    <button type='submit' class='defBtn' value='Add'>Add</button>
                  </form>
                </div>

                <div id='todowrap' class='todo-wrapper'>
                  <?php

                  $userid = $_SESSION['userid_on'];

                  if ($userid) {
                      $sqlgettodos = "SELECT * FROM `todos` WHERE `userid` = $userid AND `tododay` = 'tod' ORDER BY `date` DESC";
                      $sqlchecktodos = mysqli_query($conn, $sqlgettodos);

                      if (mysqli_num_rows($sqlchecktodos) > 0) {
                          echo "<p id='todocat-txt'>Imprtant:</p>";
                          echo "<div id='todo-imp'>";
                          while ($row = mysqli_fetch_assoc($sqlchecktodos)) { 
                              $todovalue = $row['todo'];
                              $todoid = $row['todoid'];

                              echo "
                                  <div class='today-todo' id='todo-".$todoid."'>
                                      <ul id='todosul1'>
                                          <li><form style='display:inline;' id='delToDoF'  method='POST'>
                                          <button onclick='ajaxDelToDo(".$todoid.");' id='del-todo' name='todoidn' class='fa fa-times-circle' aria-hidden='true'></button>
                                          </form></li>
                                          <li id='todocontent'>".$todovalue."</li>
                                      </ul>
                                  </div>";
                           }
                          echo "</div>";
                      } else {
                          mysqli_error($conn);
                      }
                  } 
 



                    $sqlgettodos = "SELECT * FROM `todos` WHERE `userid` = $userid AND `tododay` = 'nsd' ORDER BY `date` DESC";
                    $sqlchecktodos = mysqli_query($conn, $sqlgettodos);

                    if (mysqli_num_rows($sqlchecktodos) > 0) {
                        echo "<p id='todocat-txt'>General:</p>";
                        echo "<div id='todo-gen'>";
                        while ($row = mysqli_fetch_assoc($sqlchecktodos)) {
                            $todovalue = $row['todo'];
                            $todoid = $row['todoid'];

                            echo "
                                <div class='today-todo' id='todo-".$todoid."'>
                                    <ul id='todosul'>
                                    <li><form style='display:inline;' id='delToDoF'  method='POST'>
                                     <button onclick='ajaxDelToDo(".$todoid.");' id='del-todo' name='todoidn' class='fa fa-times-circle' aria-hidden='true'></button>
                                    </form></li>
                                      <li id='todocontent'>".$todovalue."</li>
                                    </ul>
                                </div>";
                         }
                        echo "</div>";
                    } else {
                        mysqli_error($conn);
                    }



                     
                    ?>
                </div>
              </div>
            </div>

            <!-- Users Time, Date, Greeting, News : Middle -->
            <div class="col-xs-6 col-sm-6 col-md-6 nopad" style='display:relative;'>
              
              <!-- date, time, greeting -->
              <div class='currentdateandtime'>

                 <ul id='dateandtime'>
                   <li><div id='clockbox'></div></li>
                   <li><div id='datetimebreak'></div></li>
                   <li><div id='txt'></div>
                </ul>
                
                <div class="welcomeandsignin">
                  <?php
                    date_default_timezone_set("America/Toronto");//set you countary name from below timezone list
                     /* This sets the $time variable to the current hour in the 24 hour clock format */
                     /* This sets the $time variable to the current hour in the 24 hour clock format */ 
                        $time = date("H");
                        /* Set the $timezone variable to become the current timezone */
                        $timezone = date("e");
                        /* If the time is less than 1200 hours, show good morning */
                        ?> <p id='userGreetingTxt'> <?php
                        if ($time < "12") {
                            echo "Good Morning, ";
                            $_SESSION['todayNow'] = "morn";
                        } else
                        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                        if ($time >= "12" && $time < "17") {
                            echo "Good Afternoon, ";
                            $_SESSION['todayNow'] = "day";
                        } else
                        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                        if ($time >= "17" && $time < "19") {
                            echo "Good Evening, ";
                            $_SESSION['todayNow'] = "night";
                        } else
                        /* Finally, show good night if the time is greater than or equal to 1900 hours */
                        if ($time >= "19") {
                            echo "Good Night, ";
                            $_SESSION['todayNow'] = "night";
                        } 

                        echo $_SESSION['user_on']; 
                        echo "</p>";
                      ?>
                </div>    
              </div>

              <div id='dashFun1'>
                <!-- RSS Feed : World News --> 
                <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" data-fw-param="38447/"></script> 
                <!-- end RSS -->
              </div>

            </div>

            <!-- Users Websites : Right -->
            <div class='col-xs-3 col-sm-3 col-md-3 nopad'>
              <div class='socialMedia-All'>


                        <p id='socialmedia-text'>Sites&nbsp;&nbsp;&nbsp;<i class='fa fa-plus rotate' onclick='showaddsocialmedia();clrNSName();' id='addSMAccIcon' aria-hidden='true'></i>&nbsp;&nbsp;&nbsp;&nbsp;<i id='editSitesIco' onclick='delSitesForm();' class='fa fa-pencil-square-o' aria-hidden='true'></i></p>

                        <div id='addSocialMediaAcc' class='newSocialMedia'>
                            <p id='createToDoTxt'>Add A Site</p> <i class='fa fa-times closePopUp2' id='closePopUpX' onclick='showaddsocialmedia();' aria-hidden='true'></i>
                            <hr>
                            <form name='newSITEF' onsubmit='return validateNewSite(event);'>
                               <input type='text' id='newSiteUrl' name='url' placeholder='www.' class='create-newsite-input' /><br>
                                <div class='suggestedSites'> 
                                   <p>Suggested:</p> 
                                   <div class='row'>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.twitter.com/favicon.ico' id='sgs1' style='width:30px;height:30px;'><span class='tooltiptext'>Twitter</span>
                                     </div>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.facebook.com/favicon.ico' id='sgs2' style='width:30px;height:30px;'><span class='tooltiptext'>Facebook</span>
                                     </div>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.instagram.com/favicon.ico' id='sgs3' style='width:30px;height:30px;'><span class='tooltiptext'>Instagram</span>
                                     </div>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.amazon.com/favicon.ico' id='sgs4' style='width:30px;height:30px;'><span class='tooltiptext'>Amazon</span>
                                     </div>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.reddit.com/favicon.ico' id='sgs5' style='width:30px;height:30px;'><span class='tooltiptext'>Reddit</span>
                                     </div>
                                     <div class='suggestedSite col-xs-4 col-sm-4 col-md-4'>
                                         <img src='http://www.stackoverflow.com/favicon.ico' id='sgs6' style='width:30px;height:30px;'><span class='tooltiptext'>StackOverflow</span>
                                     </div>
                                    </div>
                                </div>
                               <button type='submit' class='defBtn' value='Add'>Add</button>     
                            </form>
                        </div>

               


                  <?php

                    $userid = $_SESSION['userid_on'];

                    $sqlGetSites = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '1' order by `date` desc";
                    $sqlCheckSites = mysqli_query($conn, $sqlGetSites);

                    $sqlGetSites2 = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '0'";
                    $sqlCheckSites2 = mysqli_query($conn, $sqlGetSites2);
 
                   echo "<div id='myFavSites' class='show'>";
      
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
                    } else {
                        echo mysqli_error($conn);
                    }
                echo "</div>";





                        echo "<div id='delSitesForm'>";

                                $sqlGetSites = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '1' order by `date` desc";
                                $sqlCheckSites = mysqli_query($conn, $sqlGetSites);

                                $sqlGetSites2 = "SELECT * FROM `site-urls` WHERE `userId` = $userid AND `category` = 'fav' AND `iconT` = '0'";
                                $sqlCheckSites2 = mysqli_query($conn, $sqlGetSites2);

                                if (mysqli_num_rows($sqlCheckSites) > 0 || mysqli_num_rows($sqlCheckSites2) > 0) {

         
                                  echo "<div id='myFavSitesDel'>
                                <form action='deleteSites.php' method='post'>";
                                  
                                    echo "<p id='delSites'></p>";
                                      echo "<div id='delIconSitesChild' class='row'>";
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($sqlCheckSites)) {
                                        $site = $row['url'];
                                        $siteIco = $row['icon'];
                                        $siteId = $row['id'];
                                        $siteId = mysqli_real_escape_string($conn, $siteId);

                                            echo "
                                            <div class='col-xs-4 col-sm-4 col-md-4 iconFoundSites' id='iconF".$siteId."'> 
                                                <label class='delSiteIco'><input id='dsi' class='delSiteInput' type='checkbox' name='delSiteCheckBox".$count."' value='".$siteId."'><img class='imgIcoDel' src='".$siteIco."'></label>
                                            </div>
                                                ";
                                          $count++;
                                    }
                                      echo "</div>";


                                    if (mysqli_num_rows($sqlCheckSites2) > 0) {
                                      echo "<hr><div id='delnoIconSitesChild' class='row'>";
                                      while ($row2 = mysqli_fetch_assoc($sqlCheckSites2)) {
                                          $site = $row2['url'];
                                          $siteIcon = $row2['icon'];
                                          $siteName = $row2['url'];
                                          $siteName = parse_url($siteName);
                                          $siteName = $siteName['host'];
                                          if (substr($siteName, 0, 4) == 'www.') { 
                                            $siteName = substr($siteName, 4);
                                          }
                                        $siteId = $row2['id'];
                                        $siteId = mysqli_real_escape_string($conn, $siteId);

                                        echo "
                                        <div class='col-xs-4 col-sm-4 col-md-4 tttrig noiconFoundSites' id='iconNF".$siteId."'>
                                            <label class='delSiteIco'><input id='dsi' type='checkbox' class='sites-noIcon' name='delSiteCheckBox".$count."' value='".$siteId."'><p class='sites-noIcon'>".$siteIcon."</p></label> 
                                        </div>
                     
                                            ";
                                            $count++;
                                      }
                                   
                                  }
                                     echo "</div><button class='defBtn' onclick='ajaxDelSite(event);' value='Delete'>Delete</button>";
                                  echo"  </form>"; 
                                echo"</div>";
                                } else {
                                    echo mysqli_error($conn);
                                }



                           

                              echo"</div>";



                              mysqli_close($conn);
                        echo "</div>";


                ?>

              </div>


            </div>
          </div>

          <!-- Core content: Events : Bottom -->
          <!-- removed -->
      </div> 
    </div>
    


      <?php

    // if the user is not signed in: sign in / register screen 
    } else { ?>

        <!-- Sign In And Register Screen -->
        <div id="signin-display" class="signin-displaybox">
          <h1 id='site-title'>myDASH</h1>
          <div class='row' id='registernsignin'>
            <div class='col-md-6 col-sm-6'>
              <div id="signintxt" onclick="showSigninForm();" class="register-button">
                <p id="signinbut">Sign in</p>
              </div>
            </div>
            <div class='col-md-6 col-sm-6'>
              <div id="registertxt" onclick="showRegisterForm();" class="register-button">
                <p id="registerbut">Register</p>
              </div>
            </div>
          </div>

          <form id="signup-form" method="POST" action="signup.php">
            <input type="text" class="signup-field" name="first_name" placeholder="First Name" /><br>
            <input type="email" class="signup-field" name="email" placeholder="Email" /><br>
            <input type="password" class="signup-field" name="password" placeholder="Password" /><br>
            <input type="password" class="signup-field" name="password1" placeholder="Password Again" /><br>
            <input class='defBtn' type="Submit" />
          </form>

          <form id="signin-form" method="POST" action="signin.php">
            <input type="text" class="signin-field" name="email" placeholder="email" /><br>
            <input type="password" class="signin-field" name="password" placeholder="password" />
            <br>
            <input class='defBtn' type="Submit" />
          </form>

        </div>

    <?php } ?>

        
    <!-- incomplete ... -->
    <div class='usr-notifications2'>
      <?php
      if (!isset($_SESSION['user_on'])) {
        if (isset($_SESSION['sysFeedback_off'])) {
          $sysOffL = $_SESSION['sysFeedback_off'];
         // $arr = $_SESSION['sysFeedback_off'];
          //for($x=1;$x<$sysOffL;$x++)
          //  {
            echo "<p class='notification'>".$sysOffL."&nbsp;&nbsp;<i class='fa fa-times' onclick='closenotif();' aria-hidden='true'></i></p>";

           // }
        }
      }
    ?>
    </div>


  </div>


</body>

  <footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webshim/1.16.0/dev/polyfiller.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/reallysimpleweather/reallysimpleweather-1.1.0.min.js"></script>
    <script src='https://cdn.rawgit.com/monkeecreate/jquery.simpleWeather/master/jquery.simpleWeather.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.4/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="js/index.js"></script>
  </footer>
</html>
