<?php
header('Content-Type: text/css');

//header("Location: Campus0.html");
//exit;


//Connect To Database

session_start();
if (isset($_SESSION['user_on'])) {


  include '../connectionStrings.php';

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  //gets all variables for creating a new forum row in the database

  $user = $_SESSION['userid_on']; 
  $date = date("Y-m-d H:i:s");    // If your mysql column is datetime
  $userid = $_SESSION['userid_on'];

  // creates sql to add the new site to the database
  $sqlgetColor = "SELECT * FROM `users` WHERE `id` = '$userid'";


  // attempt to add the new forum to the database
  if ($result = mysqli_fetch_assoc(mysqli_query($conn, $sqlgetColor))) {

      $colorSet = $result['color'];


  } else {

  	echo ("<script>alert('Were sorry, we can't seem to create your forum right now..');</script>");
      echo mysqli_error($conn);
  }

  $currentDay = $_SESSION['current_day'];
  $currentDaynum = $_SESSION['current_daynum'];


  $sqlCheckEvents = "SELECT * FROM `schedule` WHERE `user` = '$userid'";








if ($currentDay=="Monday") {
    $monBorder = "bold";

} else if ($currentDay=="Tuesday") {
    $tueBorder = "bold";

} else if ($currentDay=="Wednesday") {
    $wedBorder = "bold";

} else if ($currentDay=="Thursday") {
    $thuBorder = "bold";

} else if ($currentDay=="Friday") {
    $friBorder = "bold";

} else if ($currentDay=="Saturday") {
    $weeBorder = "bold";

} else if ($currentDay=="Sunday") {
    $weeBorder = "bold";
}

} else {


	echo ("<script>alert('You must be logged in to create a forum!');</script>");
echo mysqli_error($conn);
}

  mysqli_close($conn);



?>

#weekdayfriTxt {
    padding-bottom: 10px;
    font-weight: <?php echo $friBorder; ?>;
}
#weekdaythuTxt {
    padding-bottom: 10px;
    font-weight: <?php echo $thuBorder; ?>;
}
#weekdaywedTxt {
    padding-bottom: 10px;
    font-weight: <?php echo $wedBorder; ?>;
}
#weekdaytueTxt {
    padding-bottom: 10px;
    font-weight: <?php echo $tueBorder; ?>;
}
#weekdaymonTxt {
    padding-bottom: 10px;
    font-weight:<?php echo $monBorder; ?>;
}
#weekendTxt {
    padding-bottom: 10px;
    font-weight: <?php echo $weeBorder; ?>;
}
<?php

  if ($colorSet != null) {

   ?>
.todoTodayWrap {
    border-left: 4px solid <?php if (isset($colorSet)) { echo $colorSet; } else { echo '#378237'; } ?>;
    border-top: 4px solid <?php if (isset($colorSet)) { echo $colorSet; } else { echo '#378237'; } ?>;
}
.today-todo:hover {
    border-bottom: 5px solid <?php echo $colorSet; ?>;
}
input[id='rb1']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb2']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}

input[id='rb-event-1']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-2']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-3']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-4']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-5']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-6']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
input[id='rb-event-7']:checked + label#myRadioLabel::before {
  top: 0;
  width: 100%;
  height: 100%;
  background: <?php echo $colorSet; ?>;
}
label#myRadioLabel::before {
  content: " ";
  position: absolute;
  top: 6px;
  left: 0;
  display: block;
  width: 24px;
  height: 24px;
  border: 2px solid <?php echo $colorSet; ?>;
  border-radius: 4px;
  z-index: -1;
}
#event-weeklyEvent:hover {
    border: 2px solid <?php echo $colorSet; ?>;
    cursor: pointer;
}
#event-weeklyEvent:active, #event-weeklyEvent:visited{
    border: 2px solid <?php echo $colorSet; ?>;
    cursor: pointer;
}
#event-specificEvent:hover {
    border: 2px solid <?php echo $colorSet; ?>;
    cursor: pointer;
}
p#viewAllEventTxt {
    border: 2px solid <?php echo $colorSet; ?>;
}
input.create-newsite-input{
    border: 1px solid <?php echo $colorSet; ?>;

}
input.create-newsite-input{
    border: 1px solid <?php echo $colorSet; ?>;

}
input.create-newsite-input:focus {
    border-left: 4px solid <?php echo $colorSet; ?>;
}
input.create-todo-input{
    border: 1px solid <?php echo $colorSet; ?>;

}
input.create-todo-input{
    border: 1px solid <?php echo $colorSet; ?>;

}
input.create-todo-input:focus {
    border-left: 4px solid <?php echo $colorSet; ?>;
}
div#event-weeklyEvent.selectedEventBox {
    background-color: <?php echo $colorSet; ?>;
    border: <?php echo $colorSet; ?>;
    color: white;
}
div#event-specificEvent.selectedEventBox {
    background-color: <?php echo $colorSet; ?>;
    border: <?php echo $colorSet; ?>;
    color: white;
}
div#event-specificEvent1.selectedEventBox {
    background-color: <?php echo $colorSet; ?>;
    border: <?php echo $colorSet; ?>;
    color: white;
}
div#event-weeklyEvent1.selectedEventBox {
    background-color: <?php echo $colorSet; ?>;
    border: <?php echo $colorSet; ?>;
    color: white;
}
#numEvents {
    background-color: <?php echo $colorSet; ?>;
}
p#viewAllEventTxt:hover {
    background-color: <?php echo $colorSet; ?>;
    color: white;
}
.sites-noIcon {
  border: 2px solid <?php echo $colorSet; ?>;
}

.notification {
    background-color: <?php echo $colorSet; ?>;
}
.upcomingEvents .date {
  border-bottom: 3px solid <?php echo $colorSet; ?>;
}
.weekDay .day {
  border-bottom: 3px solid  <?php echo $colorSet; ?>;
}
.upcomingWeekly::-webkit-scrollbar-thumb {
  border-radius: 8px;
  background-color: <?php echo $colorSet; ?>;
}
.defBtn {
  background-color: <?php echo $colorSet; ?>;
}
#delSiteBtn {
  border-color: <?php echo $colorSet; ?>;
}
form#signOutF {
  border-color: <?php echo $colorSet; ?>;
}
form#signOutF:hover {
  background-color: <?php echo $colorSet; ?>;
}
<?php } ?>
