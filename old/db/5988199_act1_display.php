<?php
	//open connection 
    $conn = new mysqli("localhost","root","","product");
    // $conn = new mysqli($servername, $username, $password, $dbname);

	if (!$conn){
        die("Could not connect: ".$conn->connect_error);
    }


	$count =0;
	$total=0;
// Create connection

$sql = "SELECT * from product";
$result = $conn->query($sql);

if ($result->num_rows > 0):?>
<style>
    table,td,th{
        border:  1px solid black;
    }
</style>
<table>
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Number of Stocks</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['pname']; ?></td>    
            <td><?= $row['description']; ?></td>    
            <td><?= $row['price']; ?></td>    
            <td><?= $row['no_instock']; ?></td>    
        </tr>
		<?php $total = $total + ($row['price']*$row['no_instock']);?>
    <?php endwhile;?>
</table>
    <?= "Total value of all products is ".$total;?>
<?php else:?>
    echo "0 results";
<?php endif;
$conn->close();
?>

