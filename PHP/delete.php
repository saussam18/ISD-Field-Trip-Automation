<?php
require_once('user.php');
require_once('course.php');
/*session_start();//session start, only done if submit button is pressed

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists
*/
if (isset($_POST['del']) || isset($_GET['del'])){
  $type = $_SESSION['user']->getType();
  if($type == 't'){
    delT();
        header('Location:../HTML/teacher-page.php');
  } else if ($type == 's'){
  delS();
    header('Location:../HTML/student-page.php');
  }else{
    echo "WTF idk what happened";
  }


}
function delT(){
  $name = $_SESSION['course']->getName();
  $code = $_SESSION['course']->getClasscode();
  $sql = mysql_query ("DELETE FROM classes WHERE classname = '$name' AND classcode = '$code'");
  if ($sql){
    $_SESSION['delete'] = "Class Successfully Deleted";
  }else{
    echo "Error: Class does not exist";
  }
}

function delS(){
  $per = $_SESSION['user']->getName();
    if ($_SESSION['col'] == 'class1' ){
      $insert = "UPDATE username SET class1 = NULL WHERE userName = '$per'";
        $sql = mysql_query($insert) or die(mysql_error());
    }else if ($_SESSION['col'] == 'class2' ){
          $insert = "UPDATE username SET class2 = NULL WHERE userName = '$per'";
          $sql = mysql_query($insert) or die(mysql_error());
      }else if ($_SESSION['col'] == 'class3' ){
            $insert = "UPDATE username SET class3 = NULL WHERE userName = '$per'";
            $sql = mysql_query($insert) or die(mysql_error());
        }else if ($_SESSION['col'] == 'class4' ){
              $insert = "UPDATE username SET class4 = NULL WHERE userName = '$per'";
              $sql = mysql_query($insert) or die(mysql_error());
          }else if ($_SESSION['col'] == 'class5' ){
                $insert = "UPDATE username SET class5 = NULL WHERE userName = '$per'";
                $sql = mysql_query($insert) or die(mysql_error());
            }else if ($_SESSION['col'] == 'class6' ){
                  $insert = "UPDATE username SET class6 = NULL WHERE userName = '$per'";
                  $sql = mysql_query($insert) or die(mysql_error());
              }else if ($_SESSION['col'] == 'class7' ){
                    $insert = "UPDATE username SET class7 = NULL WHERE userName = '$per'";
                    $sql = mysql_query($insert) or die(mysql_error());
                }else {
                  $_SESSION['delete'] = "Error: Class does not exist";
                  return;
                }
                $_SESSION['delete'] = "Class Succesfully removed";
}






?>
