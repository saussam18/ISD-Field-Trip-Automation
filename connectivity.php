<?php
define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds table sql in code
 define('USER','root');//user name to access database, default is always root
 define('PASSWORD','');//password to access user name, default is always blank
 $connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
 $find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists
  function SignIn() { session_start();//session start, only done if submit button is pressed
     if(!empty($_POST['Username']))  { //checks if username and password has text and if it exists
       $query = mysql_query("SELECT * FROM UserName where userName = '$_POST[Username]' AND pass = '$_POST[Password]'") or die(mysql_error()); //checks if user and password is avaible
        $row = mysql_fetch_array($query); // fetches data
         if(!empty($row['userName']) AND !empty($row['pass'])) {//checks if user and password is correct
           $_SESSION['userName'] = $row['pass'];
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; //success
           } else {
             echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; //fail
           }
         }
       } if(isset($_POST['Submit'])) { //button that runs the function
         SignIn();
       }
       ?>
