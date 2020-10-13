<?php include 'DBconnect.php';
$id =$_REQUEST['id'];
$name=$_GET['name'];
 ?>
<html>

<body>
<form method="post"> 
<br>
<center><font size="7" style="High Tower Text" color="black"><b>Add product details:</b></font>
<br> <br> <br> <br> <br>
<table width = "25%" cellpadding="10">

	<tr>
		
		<tr>
			<td><font size="4" style="High Tower Text" color="black"> Batch Number: </font> </td> <td><input type="number" name="batch_no" autocomplete="off" required="yes" autofocus></td>
		</tr>
		<tr>
			<td> <font size="4" style="High Tower Text" color="black">Date of arrival: </font> </td> <td><input type="text" name="date_of_arrival" autocomplete="off" required="yes" placeholder="YYYY/MM/DD"></td>
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black">Quantity: </font> </td> <td><input type="number" name="quantity" autocomplete="off" required="yes"></td>
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black">Price: </font> </td> <td><input type="text" name="price" autocomplete="off" required="yes"></td>
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black">Product Expiry: </font> </td><td> <input type="radio" id="1" name="expiry_flag" value="Yes"> Yes </td></tr>
			<tr> <td> </td><td> <input type="radio" id="2" name="expiry_flag" value="No"> No </td> 
			
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black">If yes, Expiry date: </font> </td> <td><input type="text" name="expiry_date" autocomplete="off" placeholder="YYYY/MM/DD"></td>
		</tr>
	</tr>
	<tr>
		<td><br><br><button type="reset" name="btnReset">Reset</button> </td>
		<td><br><br><button type="submit" name="btnSubmit">Submit</button> </td>
		
	</tr>	
	<tr>
		<td><br><a href="product_details_list.php?name=<?php echo $name ?>"> <font size="" style="High Tower Text" color="black"><b>BACK</b></font></a></td>		
		<td><br><a href="home.php?name=<?php echo $name ?>"> <font size="" style="High Tower Text" color="black"><b>HOME PAGE</b></font></a></td>		
	</tr> 

</table>

</form>
<?php
if(isset($_POST['btnSubmit']))
{
try { 

$batch_no1 = $_POST["batch_no"];
$date_of_arrival1 = $_POST["date_of_arrival"];
$quantity1 = $_POST["quantity"];
$price1 = $_POST["price"];
$expiry_flag1= $_POST["expiry_flag"];
$expiry_date1 = $_POST["expiry_date"];

if (empty($batch_no1) || empty($date_of_arrival1) || empty($quantity1) || empty($price1) ||  empty($expiry_flag1) )
{
   echo "<script>alert('Please Enter all inputs')</script>";
	//echo 'Please enter all inputs';
	//echo "hello";
    return false;
}
else
{
	
	if($expiry_flag1 === "Yes")
	{
		if(empty($expiry_date1))
		{
			echo "<script>alert('Please Enter expiry date')</script>";
			
		}
		else
		{
		$sql = "INSERT INTO product_details (product_id,batch_no, date_of_arrival, quantity, price, expiry_flag, expiry_date) 
		VALUES ('$id','$batch_no1', '$date_of_arrival1', '$quantity1','$price1', '$expiry_flag1', '$expiry_date1')";
			if ($conn->query($sql) === TRUE) 
	
			{echo "<script>confirm('Product details added successfully')</script>"; }
   

			else {
			echo "Error: " . $sql . "<br>" . $conn->error;}

		}
	}
	
	else 
	{
		$sql = "INSERT INTO product_details (product_id,batch_no, date_of_arrival, quantity, price, expiry_flag) 
		VALUES ('$id','$batch_no1', '$date_of_arrival1', '$quantity1','$price1', '$expiry_flag1')";	
		if ($conn->query($sql) === TRUE) {
	
		echo "<script>confirm('Product details added successfully')</script>";
   
		} 
		else 
		{echo "Error: " . $sql . "<br>" . $conn->error;}
				
		
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
