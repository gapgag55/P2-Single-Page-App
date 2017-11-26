<?php session_start();?>
<!DOCTYPE html>
 <html>
    <head>
        <title>Login and Registration Form</title>

        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
        
        <?php
            if(!isset($_SESSION['user']))$text = '<header><h1> PLEASE LOGIN FIRST </h1></header>';
            else $text = '<header><h1> Welcome to our System </h1></header>';
            echo $text;
            //adding your code here
        ?>
            
	</div>
    </body>
</html>
