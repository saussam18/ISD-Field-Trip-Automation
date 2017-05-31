<!-- my name jeff -->
<!-- my name jeff -->
<?php include ('connectivity.php'); ?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
        <style>
            .combo {
                position: absolute;
                left: 550px;
                top: 580px;
                margin: auto;
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
                margin-left: auto;
                margin-right: auto;
                padding: 10px;
                display: block;

            }
            .name {
                margin: auto;
                width: 50%;
                padding-top: 10px;

            }
            .password {
                margin: auto;
                width: 58%;
                padding: 10px;
            }
            button {
                font-family: "Quattrocento Sans";
                font-size: 100%;
                width: 10%;
                margin-left: 45%;
                margin-right: 45%;
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
            }
            p {
                padding: 10px;
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
                <form method="POST" action="connectivity.php"> <!-- DOOOO NOTTTT REMOVE, THIS SHIT MAKES IT WORK -->
                <div class="name">Enter your name:
                    <input type="text" name="Username">
                </div>
                <br>
                <div class="password">Enter your password:
                    <input type="password" name="Password">
                </div>
                <br>
                <button type="submit" name="Submit">Login</button>
                <br>
                <span style="color:red"> <?php echo $error;//error message will go in here ?></span>
            </div>
            <br>
            <select class="combo">
              <option value="Student/Guardian Access">Student/Guardian Acess</option>
                <option value="Employee Access">Employee Access</option>
                <option value="Secured Access">Secured Access</option>
            </select>
            <br>
            <br>
        </div>
    </body>
</html>
