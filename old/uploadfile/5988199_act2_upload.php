<?php

    if(isset($_FILES['filebox'])){
        $errors = "";
        $file_name = $_FILES['filebox']['name'];
        $file_size = $_FILES['filebox']['size'];
        $file_tmp = $_FILES['filebox']['tmp_name'];
        $file_type = $_FILES['filebox']['type'];

        $nameArray = explode('/',$file_type);
        $file_ext = strtolower(end($nameArray));

        $expensions = array('plain');
        if(in_array($file_ext,$expensions)===false){
            $errors="extension not allowed,please choose a text file";
        }
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"upload/".$file_name);
            $file = fopen("upload/".$file_name, "r") or exit("Unable to open file!");
            $content = '';
            while(!feof($file))
            {
                $content .= fgets($file);
            }
            fclose($file);
        }
    }
?>
<!DOCTYPE html>
<html>
<body>

<h1>This is an upload file exercise</h1>
<form action="5988199_act1_display.php" method="post" enctype="multipart/form-data">
    <input type="file" name="filebox" id="filebox">
    <input type="submit" value="Submit">
</form>
    <?php

        if(isset($errors))echo $errors;
        
        if (isset($content)) {
            echo "sucess";
            echo "<h2>Please find the content of the uploaded file below</h2>";
            echo $content;
        }
        
    ?>
</body>
</html>