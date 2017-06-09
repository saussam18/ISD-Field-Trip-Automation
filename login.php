<?php
  include ('connectivity.php');

  if (isset($_SESSION['login_user'])){
    header("location: connectivity.php");
  }

  echo $_SESSION['Error'];
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
        <style>
            .combo {
                width: 40%;
				margin-left: 30%;
                margin-right: 30%;
                border: 3px solid green;
                padding: 10px;
                font-family: "Quattrocento Sans";
                font-size: 100%;
            }
            .container {
                margin: auto;
                width: 50%;
                background-color: white;
                border: 3px solid green;
                padding: 10px;
            }
            img {
				width: 70%;
                margin-left: auto;
                margin-right: auto;
                padding: 10px;
                display: block;

            }
            .name {
                text-align: center;
            }
            .password {
                text-align: center;
            }
			.buttonalign {
				text-align: center;
			}
            button {
                font-family: "Quattrocento Sans";
                font-size: 20%
                width: 20%;
                text-align: center;
                padding: 10px;
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
                font-family: "Quattrocento Sans";
            }
            input {
                border: 3px solid green;
				width: 50%;
            }
            p {

            }
			.textboxes {
				text-align: center;
			}
        </style>
        <title>JohnCarr.gov</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img src="http://www.cerebro.com/store/pc/catalog/2JOHN-CARR1.jpg">
            <div class="login">
                <form method="POST" action=""> <!-- DOOOO NOTTTT REMOVE, THIS SHIT MAKES IT WORK -->
                <p class="name">Enter your name:</p>
                <div class="textboxes"><input type="text" name="Username"></div>
                <p class="password">Enter your password:</p>
                <div class="textboxes"><input type="password" name="Password"></div>
				        <br>
                <div class="buttonalign"><button type="submit" name="Submit">Login</button></div>
                <span style="color:red">
                    <?php
                        if (isset($_SESSION['Error'])){
                          echo $_SESSION['Error'];
                        }
                    ?>
                </span>
            </div>
            <br>
            <select class="combo" name="combo" >
				<option value="s">Student/Guardian Access</option>
				<option value="t">Employee Access</option>
				<option value="a">Secured Access</option>
            </select>
            <br>
        </div>
    </body>
</html>
