<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once('../PHP/user.php');
require_once('../PHP/course.php');
ob_start();
session_start();//session start, only done if submit button is pressed

define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists

  $current = $_SESSION['course'];
?>
<html>
    <head>
        <title>Viewing class</title>
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
            .form {
      			     font-family: "Quattrocento Sans";
                 font-size: 100%;
                 border: 3px solid green;
      			        margin-left: 30%;
                    margin-right: 30%;
                    width: 40%;
            }
            .greenoutline {
                border: 3px solid green;
                margin: 5px;
                padding: 5px;
            }
            button {
              font-family: "Quattrocento Sans";
              width: 20%;
              margin-left: 40%;
              margin-right: 40%;
              padding: 10px;
              font-size: 100%;
              background-color: palegreen;
              border: 3px solid green;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action= "../PHP/login.php">
          <input class="buttoninput" type="submit" value="Logout" />
        </form>
        <div class="container">
          <?php
          $cn = $current->getName();
          echo "<p class=classcode name=classcode>".$cn."</p>"
           ?>
            <div class="login">
                <div class="name">
                <p>Classcode:</p>
                <?php
                $code = $current->getClasscode();
                echo "<p class=classcode name=classcode>".$code."</p>"
                 ?>
                <p>Students enrolled:</p>
                <?php
                $sql = mysql_query("SELECT userName FROM username WHERE type = 's' AND (class1 = '$cn' OR class2 = '$cn' OR class3 = '$cn' OR class4 = '$cn' OR class5 = '$cn' OR class6 = '$cn' OR class7 = '$cn')");
                $num = mysql_num_rows($sql);
                if($num !=0 ) {
                  while ($get = mysql_fetch_assoc($sql)){
                      $student = $get['userName'];
                      echo "<p class=student name=students>".$student."</p>";
                  }
                }else{
                  echo "<p class=students> No students currently enrolled </p>";
                }
                 ?>
                </div>
                <div class="greenoutline">
                <p>Choose a form you want to send to this class:</p>
                <select class="form">
                  <option value="empty">--Select Form--</option>
                  <option value="form_1">Form 1</option>
                  <option value="form_2">Form 2</option>
                  <option value="form_3">Form 3</option>
                  <option value="form_4">Form 4</option><
                  <option value="form_5">Form 5</option>
                  <option value="form_6">Form 6</option>
                  <option value="form_7">Form 7</option>
                  <option value="form_8">Form 8</option>
                  <option value="form_9">Form 9</option>
                  <option value="form_10">Form 10</option>
                </select>
                <br>
                <br>
                <button type="button">Send Form</button>
                <br>
                  <br>
                    <form method="POST">
                  <?php
                  include_once('../PHP/delete.php');
                  ?>
                  <form method="GET"action="teacher-page.php">
                <button type="submit" vaule="redirect" name="del">Delete Class</button>
                  </form>
              </div>
                </div>
            </div>
        </div>
    </body>
</html>
