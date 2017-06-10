<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form action= "login.php">
          <input type="submit" value="Logout" />
        </form>
        <div class="container">
            <p>Welcome Teacher!</p>

			<div class=login>
        <form method="POST" action=""> <!-- DOOOO NOTTTT REMOVE, THIS SHIT MAKES IT WORK -->
            <button type="submit" name = "move">Create Form</button>
            <?php
            if(isset($_POST['move']))
              header('Location: form-customizer.html');
            ?>
            <br>
            <br>
            <button type="button">Edit Existing Form</button>
            <br>

			</div>
        </div>
    </body>
</html>
