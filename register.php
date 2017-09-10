<?php
//header("Location: Campus0.html");
//exit;
//Sample Database Connection Syntax for PHP and MySQL.
//Connect To Database
session_start();
  include 'connectionStrings.php';



// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$newfirstname = $_POST['first_name'];
$newlastname = $_POST['last_name'];
$newusername = $_POST['username'];
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

if ((isset($_POST['new_reg_as_artist'])) && (isset($_POST['new_reg_as_entrepreneur']))) {
    
    echo "Please just select one category!";
}
//***********************************************************************



//Check to see if the user registering is an artist or entrepreneur
if (isset($_POST['new_reg_as_artist'])) {
    $newcategory = $_POST['new_reg_as_artist'];
    $designatedtable = 'ttdartists';
}

if (isset($_POST['new_reg_as_entrepreneur'])) {
    $newcategory = $_POST['new_reg_as_entrepreneur'];
    $designatedtable = 'ttdentrepreneurs';
}


if ($newpassword == $newpassword1) {
    if ($newusername && $newemail &&newfirstname && newlastname) {

        $newusername = mysqli_real_escape_string($conn, $newusername);
        $newfirstname = mysqli_real_escape_string($conn, $newfirstname);
        $newlastname = mysqli_real_escape_string($conn, $newlastname);
        $newemail = mysqli_real_escape_string($conn, $newemail);
        $newpassword = mysqli_real_escape_string($conn, $newpassword);
        $newpassword1 = mysqli_real_escape_string($conn, $newpassword1);

        
        
        //Add user login details to the users db table.
        $sql = "INSERT INTO $usertable (username, password, email, usrcategory) VALUES ('$newusername', '$newpassword', '$newemail', '$newcategory')";

        //Finish query and verify user created in db
        if (mysqli_query($conn, $sql)) {
          $sqlcheck = "SELECT * FROM  `ttd` WHERE  `username` =  '$newusername' AND  `password` =  '$newpassword'LIMIT 0 , 30";

          $run_user = mysqli_query($conn, $sqlcheck);
          $check_user = mysqli_fetch_row($run_user);

          if ($check_user>0) {
            $_SESSION['user_name_on'] = $newusername;
            echo ("<script>window.location.replace ('http://www.tentoesdwn.com/Campus0.php');</script>");
          }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }



        //Add user login details to the entrepreneurship or artist db table
        if ($designatedtable == 'ttdentrepreneurs') {
            //Add user to entrepreneurship table
            $sqladd_entrepreneur = "INSERT INTO  `tentoesdown`.`$designatedtable` (eNameF, eNameL, eEmail, eSchool, eCompany, eJoindate) VALUES ('$newfirstname', '$newlastname', '$newemail', '', '', '$registerdate')";

            //add the registrant to entrepreneurship page
            if (mysqli_query($conn, $sqladd_entrepreneur)) {

              $sqlcheck_e = "SELECT * FROM  `$designatedtable` WHERE  `eNameF` =  '$newfirstname' AND  `eJoinate` =  '$registerdate' LIMIT 0 , 30";

              $run_entrpreneur = mysqli_query($conn, $sqlcheck_e);
              $check_entrepreneur = mysqli_fetch_row($run_entrepreneur);

              if ($check_entrepreneur > 0) {

                echo ("<script>window.location.replace ('http://www.tentoesdwn.com/Campus0.php');</script>");
              }


            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        } else if ($designatedtable == 'ttdartists') {

            //Add user to artist table
            $sqladd_artist = "INSERT INTO  `tentoesdown`.`$designatedtable` (aNameF, aNameL, aEmail, aSchool, aJoindate) VALUES ('$newfirstname', '$newlastname', '$newemail', '', '$registerdate')";

            //add the registrant to artist page
            if (mysqli_query($conn, $sqladd_artist)) {
              $sqlcheck_a = "SELECT * FROM  `$designatedtable` WHERE  `aNameF` =  '$newfirstname' AND  `aJoinate` =  '$registerdate' LIMIT 0 , 30";

              $run_artist = mysqli_query($conn, $sqlcheck_a);
              $check_artist = mysqli_fetch_row($run_artist);

              if ($check_artist > 0) {
                echo ("<script>window.location.replace ('http://www.tentoesdwn.com/Campus0.php');</script>");
              }

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
}







echo ("<script>window.location.replace ('http://www.tentoesdwn.com/index.php');</script>");



?>

