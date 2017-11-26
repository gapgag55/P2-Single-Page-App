<?php session_start();

//setting username and password

	ob_start();
	$username = array("admin","user","sale");
	$password = array("123","456","789");
//adding your code here
for($i = 0;$i<3;$i++){
   if(isset($_POST['username'])&&isset($_POST['password'])){
        if($_POST['username']==$username[$i]&&$_POST['password']==$password[$i]){
             $_SESSION['user'] = $_POST['username'];
             header('Location: welcome.php');
        } 
   }
    
}
    

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
            $_SESSION['errormsg'] = 'wrong username or password ?';
            //adding your code here
            $text = 'wrong username or password<br>';
            $text .= 'pls go back to re enter them again<br>';
            $text .='<a href="index.php"> Home page</a>';
            echo $text;
        ?>
	</div>
    </body>
</html>
