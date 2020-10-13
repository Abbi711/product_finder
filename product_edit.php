<html>
<body>
<form method="post"> 
<center>
<br>

<br>
<h2> EDIT THE PRODUCT INFORMATION </h2>
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
			<td><font size="4" style="High Tower Text" color="black">Product Name: </font> </td> <td><input type="text" autofocus name="product_name" id="a" autocomplete="off"></td>
		</tr>
		<tr>
			<td> <font size="4" style="High Tower Text" color="black">Product Description: </font> </td> <td><input type="text" name="product_description" id="a" autocomplete="off" > </textarea> </td>
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
		<td><br><br><a href="product_list.php?name=<?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
	
<?php
if(isset($_POST['btnSubmit']))
{
try { 

$product_name1 = $_POST["product_name"];
$product_description1 = $_POST["product_description"];



if (empty($product_name1) && empty($product_description1)) {
	
   echo "<script>alert('Please enter inputs')</script>";
	//echo 'Please enter inputs';
	//echo "hello";
    return false;
}
elseif(empty($product_name1))
{
	$sql="UPDATE product_master SET product_description = '$product_description1' WHERE product_id = '$id'";

}
elseif(empty($product_description1))
{
	$sql="UPDATE product_master SET product_name = '$product_name1' WHERE product_id = '$id'";

}


else
{	$sql="UPDATE product_master SET product_name = '$product_name1', product_description = '$product_description1' WHERE product_id = '$id'";
	//$sql= "UPDATE product_master ". "SET product_name = $product_name1". "WHERE product_id = $id" ;  
}

if ($conn->query($sql) === TRUE) {
	
	echo "<script>confirm('Product edited successfully')</script>";
   
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
 
