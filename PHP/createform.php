<?php
echo "test";
//need to do all the crap still, will be creating classcode and filling in the pdf, so majoirty of work will be on this

session_start();//session start, only done if submit button is pressed
$_SESSION['Error'] = '';

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds table sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists

if (isset($_POST['create'])){
    if (empty($_POST['place']) || empty($_POST['purp']) || empty($_POST['school']) || empty($_POST['date'])  || empty($_POST['time'])){//sam I added way more atributes please check sampleform.php
        $_SESSION['Error'] = "Form not fully filled out, please fill all boxes";
        //echo $_SESSION['Error'];
        header("Location: form-customizer.html");
    }
    else {
      CreateForm();
    }
}

function CreateForm(){
  //fills the form out in the pdf

}

?>
