<?php
    //upload a file
    if(isset($_FILES['filebox'])){// check that you enter a file
        $errors = "";
        $file_name = $_FILES['filebox']['name'];
        $file_size = $_FILES['filebox']['size'];
        $file_tmp = $_FILES['filebox']['tmp_name'];
        $file_type = $_FILES['filebox']['type'];

        $nameArray = explode('/',$file_type);//get a file type
        $file_ext = strtolower(end($nameArray));// change into lower case

        $expensions = array('plain');//type of txt file
        if(in_array($file_ext,$expensions)===false){// check a file is a text file or not 
            $errors="extension not allowed,please choose a text file";
        }
        if(empty($errors)==true){// if it doesn't have a error text save and load the file
            move_uploaded_file($file_tmp,"upload/".$file_name);// save the file
            $file = fopen("upload/".$file_name, "r") or exit("Unable to open file!");//open the file
            $content = '';
            while(!feof($file))// read the file for each line
            {
                $content .= fgets($file);
            }
            fclose($file);//close the file
        }
    }
?>
<!DOCTYPE html>
<html>
<body>

<h1>Please upload a file </h1>
<form action="index.php" method="post" enctype="multipart/form-data"><!-- the input file form -->
    <input type="file" name="filebox" id="filebox">
    <input type="submit" value="Submit">
</form>
    <?php

        if(isset($errors))echo $errors;//if there are any errors, print them out
        
        if (isset($content)): // if the file hava save and load successful ?>

            Upload Successful<br>
            <h2>Please find the content of the uploaded file below:</h2><br>
            <?php echo $content."<br>"; 
            $content = strtolower($content);
            // replace the Extract words with " "
            $content = preg_replace('/(\b(a|an|the|that|this|those|these|is|am|are|isn\'t|aren\'t|not|has|have|had|hasn\'t|haven\'t|hadn\'t|will|won\'t|shall|after|in|to|on|with|into)\b)|\d|\'s|s\'|\'re|#|%|&|\*|\!|\?|\.|\'ll|\\n|\\r|,|<br>|"|\\\\n|\\\\r|:/',' ',$content);
            // replace many space("   ") in to a space(" ")
            $content = preg_replace('/\s+/'," ",$content);
            ?>
            <br><h2>Extracted word:</h2><br>
            <?php echo $content;// echo it out to html?>
            <br><br>
            <!-- Display Frequency button-->
            <button type="button" onclick="process('<?= $content;?>')">Display Frequency</button><br>

        
    <div id="area"></div>
    <script>
        function process(str)
        {
            if(window.XMLHttpRequest){// check the browser
                xmlhttp = new XMLHttpRequest();
            }else{// check the browser
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
            }
            //AJAX to display table after clicking Display Frequency button
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                    document.getElementById("area").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","output.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
    <?php endif; ?>

</body>

</html>