<?php
//header("Location: Campus0.html");
//exit;

//Connect To Database

session_start();
if (isset($_SESSION['user_on'])) {

  include 'connectionStrings.php';
  
  //	echo ("<script>alert('Were sorry, we can't seem to create your forum right now..');</script>");

  // Create connection
  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  //gets all variables for creating a new forum row in the database
  if (isset($_POST['todo'])) {
    $todo_value = $_POST['todo'];
  } else {
  //echo 'noo'; 
  }
  date_default_timezone_set('America/Toronto');

  $todo_user = $_SESSION['userid_on'];
  $todo_day = $_POST['todo-day'];
  $todo_date = date("Y-m-d H:i:s"); // If your mysql column is datetime

  //escape the todo title if set
  if ($todo_value) {
   // echo "<script>alert('to do value');</script>";
     $todo_value = mysqli_real_escape_string($conn, $todo_value);
  }
  if ($todo_day) {
      $todo_day = mysqli_real_escape_string($conn, $todo_day);
  }

  // creates sql to add the new forum to the database
  $sqlnewtodo = "INSERT INTO  `todos`
					( `todo` ,  `date` ,  `userid`, `tododay` ) VALUES
					('$todo_value',  '$todo_date',  '$todo_user', '$todo_day')";

  // attempt to add the new forum to the database
  if (mysqli_query($conn, $sqlnewtodo)) {
     //   echo "<script>alert('to do value');</script>";

    $todoid = mysqli_insert_id($conn);
    
echo "                  <div class='today-todo' id='todo-".$todoid."'>
                          <ul id='todosul1'>
                              <li><form style='display:inline;' id='delToDoF'  method='POST'>
                              <button onclick='ajaxDelToDo(".$todoid.");' id='del-todo' name='todoidn' class='fa fa-times-circle' aria-hidden='true'></button>
                              </form></li>
                              <li id='todocontent'>".$todo_value."</li>
                          </ul>
                      </div>";
    
        echo mysqli_error($conn);
  } else {

      echo mysqli_error($conn);
  }

} else {

	//echo ("<script>alert('You must be logged in to create a forum!');</script>");

}

  mysqli_close($conn);

?>
