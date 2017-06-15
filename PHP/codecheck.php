<?php
require('user.php');
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
      $find = mysql_query("SELECT * FROM username");
      $get = mysql_fetch_array($find);
      findNull($get, $_POST['code']);

    $_SESSION['try'] = "You have Successfully entered the classcode";
      header("Location: ../HTML/student-page.php");
    } else {
    $_SESSION['try'] = "Classcode does not exist";
      header("Location: ../HTML/student-page.php");
    }
}
function findNull ($get, $code){
  $find =  mysql_query("SELECT classname FROM classes WHERE classcode = '$code'") or  die(mysql_error());
  $res =  mysql_fetch_array($find);
  $per = $_SESSION['user']->getName();
  $name = $res['classname'];
    if ($get['class1'] == NULL){
      $insert = "UPDATE username SET class1 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  } else if ($get['class2'] == NULL){
    $insert = "UPDATE username SET class2 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  }else if ($get['class3'] == NULL){
    $insert = "UPDATE username SET class3 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  }else if ($get['class4'] == NULL){
    $insert = "UPDATE username SET class4 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  }else if ($get['class5'] == NULL){
    $insert = "UPDATE username SET class5 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  }else if ($get['class6'] == NULL){
    $insert = "UPDATE username SET class6 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  }else if ($get['class7'] == NULL){
    $insert = "UPDATE username SET class7 = '$name' WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
  } else {
    echo "You are out of classes, please delete a class";
  }
}

?>
