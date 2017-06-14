<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php require_once('../PHP/user.php');
require_once('../PHP/course.php');
require_once('../HTML/teacher-page.php');
session_start();//session start, only done if submit button is pressed
ob_start();
define('HOST', 'localhost');//defines host varible, will need to change to server to implement
define('NAME', 'practice');//finds database sql in code
define('USER','root');//user name to access database, default is always root
define('PASSWORD','');//password to access user name, default is always blank

$connect = mysql_connect(HOST,USER,PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); //checks that it can connect to server
$find = mysql_select_db(NAME,$connect) or die("Failed to find to MySQL Server:" . mysql_error()); //checks if database exists
$courseArr= array ();
  $per = $_SESSION['user']->getName();
$sql =  mysql_query("SELECT classname, classcode FROM classes where username = '$per'") or die(mysql_error());
$num = mysql_num_rows($sql);
if($num !=0 ) {
  while ($get = mysql_fetch_assoc($sql)){
      $class = new course ($get['classname'], $per, $get['classcode']);
      array_push($courseArr,$class);
  }
}
?>




<html>
    <head>
        <title>Teacher Page</title>
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
                padding-top: 10px;

            }
            .password {
                margin: auto;
                width: 58%;
                padding: 10px;
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
            .login {
                margin: auto;
                border: 3px solid green;
                padding: 10px;
                background-color: palegreen;
            }
            body {
                background-color: #defdde;
            }
			input {
				font-family: "Quattrocento Sans";
                font-size: 100%;
                background-color: palegreen;
                border: 3px solid green;

				align: right;
				position: absolute;
			}
            p {
                padding: 10px;
				text-align: center;
                margin: auto;
            }
			input.notbutton {
                border: 3px solid green;
                margin-left: 35%;
                margin-right: 35%;
                width: 30%;
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
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action= "../PHP/login.php">
          <input type="submit" value="Logout" />
        </form>
        <div class="container">
            <p>Welcome Teacher!</p>
      			<div class=login> <?php
            if (!empty($_SESSION['delete']) || !empty($_SESSION['create'])){
              echo "<p>".$_SESSION['delete']."</p>";
              $_SESSION['delete'] = NULL;
              echo "<p>".$_SESSION['create']."</p>";
              $_SESSION['create'] = NULL;
            }
             ?>
              <button onClick= "window.location='form-customizer.html'">Create Form</button>
              <br>
              <br>
              <button onCLick = "window.location='class-creator.html'">Create new class</button>
              <br>
				<div class="greenoutline">
                  <p>Choose the class you want to view:</p>
                    <form method="POST" action="">
                  <p><select class="class" name = "combo"> </p>
          					<option value="empty">--Select Class--</option>
                    <?php
                        $cou = array();
                              for ($i = 0; $i < sizeof($courseArr); $i++){
                               $cour = $courseArr[$i]->getName();
                               array_push($cou, $cour);
                                echo "<option value=".$cour." name=".$i.">".$cour."</option>";
                              }
                          ?>
          				</select>
                  <br>
                  <br>
                  <button type="sumbit" name = "view" >View Class</button>
                  <?php
                if (isset($_POST['view'])){
                for ($j = 0; $j < sizeof($courseArr); $j++){
                    if ($_POST['combo'] == $cou[$j]){
                        $_SESSION['course'] = $courseArr[$j];
                        header("Location:class-viewer.php");
                    }
                  }
                }
                 ?>
                </div>
      			</div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!--jquery library-->
      <script src="../JS/teacher.js"></script>
    </body>
</html>
