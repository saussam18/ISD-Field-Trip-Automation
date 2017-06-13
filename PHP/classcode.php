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

if (isset($_POST['cc'])){
    if (empty($_POST['class'])){
      echo "error occured somewhere";
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
      $per = $_SESSION['user']->getName();
      $sql = "INSERT INTO classes (username, classcode, classname)
              VALUES ('".$per."','".$randNumber."', '".$_POST['class']."')";
      $result = mysql_query($sql) or die(mysql_error());
    if (isset($result)){
                  $class = new course ($randNumber, $_POST['class'], $_SESSION['user']);
                  echo "You have created a new class called  {$_POST['class']}. Your Classcode is $randNumber";
    } else {
                  echo "Something went wrong";
      }
      echo "                        ";
          echo $class->getClasscode();


}
function randNumGen (){
  $randNumberLength = 6;  // length of your giant random number
    $randNumber = NULL;

      for ($i = 0; $i < $randNumberLength; $i++) {
        $randNumber .= rand(0, 9);  // add random number to growing giant random number
      }

      return $randNumber;
}

class course {

  private $classcode;
  private $classname;
  private $users = 0;
  private $user;

  public function  __construct($code, $name, $user) {
    $this->classcode = $code;
    $this->classname = $name;
    $this->user = $user;
  }
  public function addstudent ($student){
    array_push($students, $student);
    $this->users = $users + 1;
  }
  public function getName(){
    return $this ->classname;
  }
  public function getUsers(){
    return $this->users;
  }
  public function getClasscode(){
    return $this->classcode;
  }
  public function getUser(){
      return $this->user;
  }
}








?>
