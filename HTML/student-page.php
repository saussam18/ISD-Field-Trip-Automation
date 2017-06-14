<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require_once('../PHP/user.php');
session_start();//session start, only done if submit button is pressed

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists
$courseArr= array ();
  $per = $_SESSION['user']->getName();
$sql =  mysql_query("SELECT class1, class2, class3, class4, class5, class6, class7 FROM username where userName = '$per' AND type = 's'") or die(mysql_error());
$num = mysql_num_rows($sql);
$classArr = array();
if($num !=0 ) {
  $get = mysql_fetch_assoc($sql);
  for ($i = 1; $i <= 7; $i++){
    $str = $get['class' . $i];
    while ($str != NULL){
        $push = $str;
          array_push($classArr,$push);
          $str = NULL;
    }
  }

} else{
  echo "nothing";
}
?>

<html>
    <head>
        <title>Student Page</title>
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
        <style>
            .container {
                margin: auto;
                width: 50%;
                background-color: white;
                border: 3px solid green;
                padding: 10px;
                font-family: "Quattrocento Sans";
            }
            img {
                margin-left: auto;
                margin-right: auto;
                padding: 10px;
                display: block;

            }
            .name {
                margin: auto;

            }
            .password {
                margin: auto;
                width: 58%;
                padding: 10px;
            }
			button.top {
				font-family: "Quattrocento Sans";
				font-size: 100%;
				background-color: palegreen;
                border: 3px solid green;
				position: absolute;
			}
            button.mid {
				font-family: "Quattrocento Sans";
                font-size: 20%
                width: 20%;
                text-align: center;
                padding: 10px;
                background-color: palegreen;
                border: 3px solid green;
            }
			input.buttoninput {
				font-family: "Quattrocento Sans";
				font-size: 100%;
				background-color: palegreen;
                border: 3px solid green;
			}
            .login {
                margin: auto;
                border: 3px solid green;
                padding: 10px;
                background-color: palegreen;
            }
            body {
                background-color: #defdde;

            }
            input.notbutton {
                border: 3px solid green;
				width: 30%;
            }
            p {
                padding: 10px;
                text-align: center;
                margin: auto;
            }
			.profile {
				margin-right: 10px;
				position: absolute;
				margin-bottom: 10px;
			}
			.buttoninput {
				border: 3px solid green;
				background-color: palegreen;
				font-family: "Quattrocento Sans";
                font-size: 100%;
				margin-left: 70px;
			}
			.classcode {
				text-align: center;
				margin-bottom: 10px;
			}
			.buttonalign {
				text-align: center;
			}
			.enter {
				margin-bottom: 10px;
			}
      .greenoutline {
        border: 3px solid green;
        margin: 5px;
        padding: 5px;
      }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <button class="top" type="button" name="Profile">Profile</button>
        <form action= "../PHP/login.php">
          <input class="buttoninput" type="submit" value="Logout" />
        </form>
        <div class="container">
            <p>Welcome Student!</p>
            <div class="login">
                <div class="name">
                <p>Enter Classcode:</p>
                  <form method="POST" action="../PHP/codecheck.php">
                <div class="classcode" ><input class="notbutton" type="text" name = "code"></div>
                </div>
                <div class="buttonalign"><button class="mid enter" type="submit" name="sub">Enter</button></div>
                <div class="greenoutline">
                          <p>Choose the class you want to view:</p>
                        <p>  <select class="form"> </p>
                  					<option value="empty">--Select Form--</option>
                            <?php
                                      for ($i = 0; $i < sizeof($classArr); $i++){
                                       $cl = $classArr[$i];
                                        echo "<option value=".$i.">".$cl."</option>";
                                      }
                                  ?>
                  				</select>
                            <div class="buttonalign"><button class="mid" type="button" name="del">Delete Class</button></div>
                <div class="buttonalign"><button class="mid" type="button" name="Change">Change Class Forms</button></div>
            </div>
        </div>
    </body>
</html>
