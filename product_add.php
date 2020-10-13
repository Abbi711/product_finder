<?php include 'DBconnect.php'; 
$name=$_GET['name'];
?>
<html>

<body>
<form method="post"> 
<br><br>
<center><font size="30" style="High Tower Text" color="black"><b>Add a new product:</b></font>
<br> <br> <br> <br> <br>
<table width = "25%" cellpadding="10">

	<tr>
		
		<tr>
			<td><font size="4" style="High Tower Text" color="black">Product Name: </font> </td> <td><input type="text" name="product_name" id="a" autocomplete="off" required="yes"></td>
		</tr>
		<tr>
			<td> <font size="4" style="High Tower Text" color="black">Product Description: </font> </td> <td><input type="text" name="product_description" autocomplete="off" required="yes"> </td>
		</tr>
		
		
		
	</tr>
	<tr>
		<td><br><br><button type="reset" name="btnReset">Reset</button> </td>
		<td><br><br><button type="submit" name="btnSubmit">Submit</button> </td>
		
	</tr>	
	<tr>
		<td><br><br><a href="product_list.php?name=<?php echo $name ?>"> <font size="" style="High Tower Text" color="black"><b> BACK</b></font></a></td>	
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <font size="" style="High Tower Text" color="black"><b>HOME PAGE</b></font></a></td>		
	</tr> 

</table>

</form>
<?php
if(isset($_POST['btnSubmit']))
{
try { 

$product_name1 = $_POST["product_name"];
$product_description1 = $_POST["product_description"];



if (empty($product_name1) || empty($product_description1)) {
   echo "<script>alert('Please Enter all inputs')</script>";
	//echo 'Please enter all inputs';
	//echo "hello";
    return false;
}
else
{
$sql = "INSERT INTO product_master (product_name, product_description, username) VALUES ('$product_name1', '$product_description1', '$name')";

if ($conn->query($sql) === TRUE) {
	//echo "green";
	echo "<script>confirm('Product added successfully')</script>";
    //echo "Product added successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
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
