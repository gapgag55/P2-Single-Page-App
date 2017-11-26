<!DOCTYPE html>
<?php
    if(!$_POST) header('Location: index.php');
?>
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
            
            //adding your code here
            $text = "<header><h1>THANK YOU FOR REGISTRATION <br> YOUR USERNAME IS <span>{$_POST['usernamesignup']}</span><br> YOUR EMAIL ADDRESS IS <span>{$_POST['emailsignup']}</span></h1><header>";
            echo $text;
            //adding your code here
        ?>
	</div>
    </body>
</html>
