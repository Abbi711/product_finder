<html>
<body>
<form method="post"> 
<center>
<br>

<br>
<h2> ADD A PRODUCT LOCATION </h2>
<br>


<?php include 'DBconnect.php'; 
$id =$_REQUEST['id'];
$name=$_GET['name'];
$query = "select * from product_master where product_id = '$id'";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult);


 echo "<table cellpadding='10'>";
 
		 if($rowCount > 0)
		 {
			 while($row = mysqli_fetch_array($queryResult)) 
			 {
				echo "<tr>";
				echo "<td> Product ID: </td> ";
				echo "<td> $row[product_id]</td>";
				echo "</tr>";
			 }
			
				
			 }
		 
		 else
		 {
				echo "<tr>";
				echo "<td colspan='7' align='center'> No product(s) found</td>";
				echo "</tr>";
		 }
         
       echo "</table>";

?>
<table width = "25%" cellpadding="10">

	<tr>
		
		<tr>
			<td><font size="4" style="High Tower Text" color="black">Rack Number: </font> </td> <td><input type="text" name="rack_no" id="a" autocomplete="off" required="yes" autofocus></td>
		</tr>
		
		
		
		
	</tr>
	<tr> 
		<td><br><br><button type="reset" name="btnReset">Reset</button> </td>
		<td><br><br><button type="submit" name="btnSubmit">Submit</button> </td>
		
	</tr>	
	

</table>
<table>
<tr>
		<td></td><td></td><td></td><td></td><td></td>
		<td><br><br><a href="product_location.php?name=<?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
	
<?php
if(isset($_POST['btnSubmit']))
{
try { 

$rack_no1 = $_POST["rack_no"];




if (empty($rack_no1)) {
	
   echo "<script>alert('Please enter rack number')</script>";
    return false;
}

else
{	
	$sql= "INSERT INTO product_location (product_id, rack_no) VALUES ('$id', '$rack_no1')";
	//$sql= "UPDATE product_location ". "SET rack_no = $rack_no1". "WHERE product_id = $id" ;  
}

if ($conn->query($sql) === TRUE) {
	
	echo "<script>confirm('Location added successfully')</script>";
   
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}catch (Exception $e) {
  print "some Exception\n";
} finally {
  $conn->close();
}
}
?>	
	
	
	
	
	
</body>
</html>
 
