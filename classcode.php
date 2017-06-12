<?php

session_start();//session start, only done if submit button is pressed
$_SESSION['Error'] = '';

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists

if (isset($_POST['cc'])){
    if (empty($_POST['class'])){
        $_SESSION['Error'] = "Form not fully filled out, please fill all boxes";
        //echo $_SESSION['Error'];
        header("Location: class-creator.html");
    }
    else {
      classcode();
    }
}

function classcode(){
    $randNumber = randNumGen();
      $check = mysql_query ("SELECT Classcode FROM classes") or die(mysql_error());
      $res = mysql_fetch_array($check);
      if ($randNumber == $res){
        $randNumber = randNumGen();
      }
      $sql = "INSERT INTO classes (classcode, classname)
              VALUES ('".$randNumber."', '".$_POST['class']."')";
      $result = mysql_query($sql) or die(mysql_error());
    if (isset($result)){
                  echo "You have created a new class called  {$_POST['class']}. Your Classcode is $randNumber";
    } else {
                  echo "Something went wrong";
      }

}
function randNumGen (){
  $randNumberLength = 6;  // length of your giant random number
    $randNumber = NULL;

      for ($i = 0; $i < $randNumberLength; $i++) {
        $randNumber .= rand(0, 9);  // add random number to growing giant random number
      }

      return $randNumber;
}









?>
