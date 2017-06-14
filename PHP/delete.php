<?php
require('user.php');
session_start();//session start, only done if submit button is pressed

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists

if (isset($_POST['del'])){
  $type = $_SESSION['user']->getType();
  if($type == 't'){
    delT();
  } else if ($type == 's'){
  delS();
  }else{
    echo "WTF idk what happened";
  }


}
function delT(){

  $sql =
}

function delS(){

}






?>
