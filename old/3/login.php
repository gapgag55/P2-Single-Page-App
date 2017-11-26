<?php session_start();

//setting username and password

	ob_start();
	$username = array("admin","user","sale");
    $password = array("123","456","789");
    
    for($i = 0 ; $i<3;$i++){
        if($username[$i]==$_POST["username"]&&$password[$i]==$_POST["password"]){
            header("Location: http://".$_SERVER["HTTP_HOST"]."/LoginRegistrationFormStudent/welcome.php");
        }
        
    }
//adding your code here

?>

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
            //adding your code here
            $errortext = "<p>Wrong Username Or Password ! </p>
            <p>Please GO Back TO Re-Enter Them Again </p>
            <a href=\"index.php\">HOME</a>";
            echo $errortext;
        ?>
	</div>
    </body>
</html>
