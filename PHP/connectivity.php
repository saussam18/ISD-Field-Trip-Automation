<?php
  session_start();//session start, only done if submit button is pressed
  $error = '';

  define('HOST', 'localhost');//defines host varible, will need to change to server to implement
  define('NAME', 'practice');//finds table sql in code
  define('USER', 'root');//user name to access database, default is always root
  define('PASSWORD', '');//password to access user name, default is always blank

  if (isset($_POST['Submit'])){
      if (empty($_POST['Username']) || empty($_POST['Password'])){
          $error = "You forgot your username and/or password numb nuts";
      }
      else {
          $error = SignIn();
      }
  }

  function SignIn() {
      $connect = mysql_connect(HOST, USER, PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
      $find = mysql_select_db(NAME, $connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists
      $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[Username]' AND pass = '$_POST[Password]'
        AND type = '$_POST[combo]'") or die(mysql_error()); //checks if user and password is avaible
      $row = mysql_fetch_array($query); // fetches data
          include ('user.php');
      if ($row['type'] == 's' && $row['type'] == $_POST['combo']){
        $user = new user ($_POST['Username'], 's');
          $_SESSION['user'] = $user;
          header("Location: ../HTML/student-page.html");
      }
      else if ($row['type'] == 't' && $row['type'] == $_POST['combo']){
        $user = new user ($_POST['Username'], 't');
        $_SESSION['user'] = $user;
          header("Location: ../HTML/teacher-page.html");
      }
      else {
        return $error = "You entered the wrong username or password and/or wrong login portal.";
      }
  }



?>
