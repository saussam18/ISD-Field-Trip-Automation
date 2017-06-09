<?php
  session_start();//session start, only done if submit button is pressed
  $_SESSION['Error'] = '';

  define('HOST', 'localhost');//defines host varible, will need to change to server to implement
  define('NAME', 'practice');//finds table sql in code
  define('USER','root');//user name to access database, default is always root
  define('PASSWORD','');//password to access user name, default is always blank

  $connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
  $find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists


  if (isset($_POST['Submit'])){
      if (empty($_POST['Username']) || empty($_POST['Password'])){
          $_SESSION['Error'] = "You forgot your username and/or password numb nuts";
          //echo $_SESSION['Error'];
          header("Location: login.php");
      }
      else {
        SignIn();
      }
  }

  function SignIn() {
      if(!empty($_POST['Username']) && !empty($_POST['Password']))  { //checks if username and password has text and if it exists
          $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[Username]' AND pass = '$_POST[Password]' AND type = '$_POST[combo]'") or die(mysql_error()); //checks if user and password is avaible
          $row = mysql_fetch_array($query); // fetches data
              if(!empty($row['userName']) AND !empty($row['pass'])) {//checks if user and password is correct
                  $_SESSION['userName'] = $row['pass'];

                  if ($row['type'] == 's' && $row['type'] == $_POST['combo']){
                    header("Location: student-page.html");
                  }
                  else if ($row['type'] == 't'){
                      header("Location: teacher-page.html");
                  }
              }
              else {
                  $error = "You entered the wrong username and/or password.";
                  //header("Location: login.php"); //fail
              }
      }
  }
?>
