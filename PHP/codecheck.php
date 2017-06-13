<?php
session_start();//session start, only done if submit button is pressed
$_SESSION['Error'] = '';

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists

if (isset($_POST['sub'])){
    if (empty($_POST['code'])){
      echo "error occured somewhere";
    }
    else {
      check();

    }
}
function check(){
  $query = mysql_query("SELECT classcode FROM classes where classcode = '$_POST[code]'") or die(mysql_error()); //checks if user and password is avaible
  $row = mysql_fetch_array($query);
    if($row['classcode'] == $_POST['code']){
      header("Location: ../HTML/StudentForm.html");
    } else {
      echo "Classcode does not exist";
    }
}

?>
