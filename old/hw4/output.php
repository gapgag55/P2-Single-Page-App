<?php
    $q = $_GET["q"];
    $q = explode(" ",$q);//sperate the extracted text with a speace
    $q = array_count_values($q);// count a frequency of all words
    arsort($q);// sort it in descending 
    echo "<h2>Table of words and frequencies of the up loaded file</h2>";
    echo "<table>
    <tr><th>Word</th><th>Frequency</th></tr>";// print the table of word frequency
    foreach($q as $word => $count)
    {
        echo "<tr><td>".$word."</td><td>".$count."</td><tr>";
    }
    echo "</table>";
    echo "<style>
        table,td,tr,th{
            border: 1px solid black;
        }
        <\style>";
?>