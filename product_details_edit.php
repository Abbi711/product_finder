<html>
<body>
<form action="" method="post" >
<center>
<br>

<br>
<h2> PRODUCT DETAILS :</h2>
<br>


<?php include 'DBconnect.php'; 
$id =$_REQUEST['id'];
$name=$_GET['name'];
$query = "select * from product_details where product_id = '$id'";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult); 

 echo "<table cellpadding='10'>";
 echo "<tr>";
 echo "<td> Product ID: </td> ";
				echo "<td> $id </td> </tr>";
	echo "<tr>";
			echo "<td> Select Batch number: </td> ";
		// $i=0;  $array1= array(); 
		 if($rowCount > 0)
		 {		//$flag1=0;
			echo " <td> <select name='batch'>";
			 while($row = mysqli_fetch_array($queryResult)) 
			 {
				echo " <option value ='". $row['batch_no'] . "'> " . $row['batch_no']. "</option> " ;
				
			 }
			 
			 echo "</select> </td>";
			 echo "</tr>";
				
			} 
		 
		 else
		 {
				echo "<tr>";
				echo "<td colspan='7' align='center'> No product(s) found</td>";
				echo "</tr>";
		 }
		 
       
		
	   
	   
try{
	
				echo "<tr>";
				echo "<td> Quantity: </td> ";
				echo "<td> <input type='text' name='quantity' autocomplete='off' required='yes'></td>";
				echo "</tr> ";
				echo "<tr>";
				echo "<td> Unit Rate: </td> ";
				echo "<td>  <input type='text' name='price' autocomplete='off' required='yes'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Date of arrival: </td> ";
				echo "<td>  <input type='text' name='date_of_arrival' autocomplete='off' required='yes'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Product Expiry: </td> ";
				
				echo "<td>  <input type='radio' id='1' name='expiry_flag' value='Yes'> Yes </td></td>";
				echo "<td>  <input type='radio' id='2' name='expiry_flag' value='No'> No </td></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Expiry date: </td> ";
				echo "<td>  <input type='text' name='expiry_date' autocomplete='off'></td>";
				echo "</tr>";
				
				echo "<tr> <td> <button type='reset' name='btnReset1'>Reset</button></td>";
				echo "<td> <button type='submit' name='btnSubmit1'>Edit Details </button></td></tr>";
	
			if(isset($_POST['btnSubmit1']))
			{    
				$batch_no1 = $_POST["batch"];
				$date_of_arrival1 = $_POST["date_of_arrival"];
				$quantity1 = $_POST["quantity"];
				$price1 = $_POST["price"];
				$expiry_flag1= $_POST["expiry_flag"];
				$expiry_date1 = $_POST["expiry_date"];

				if (empty($batch_no1) ||empty($date_of_arrival1) || empty($quantity1) || empty($price1) || empty($expiry_flag1) )
				{
					echo "<script>alert('Please Enter all inputs')</script>";
					return false;
				}
				else
				{
	
					if($expiry_flag1 === "Yes")
					{
						if(empty($expiry_date1))
							{echo "<script>alert('Please Enter expiry date')</script>";}
			
		
						else
						{
							$sql="UPDATE product_details SET date_of_arrival = '$date_of_arrival1', quantity = '$quantity1', price = '$price1', expiry_flag = '$expiry_flag1', expiry_date = '$expiry_date1'
							WHERE product_id = '$id' && batch_no = '$batch_no1' ";
						
						if ($conn->query($sql) === TRUE) 
	
						{echo "<script>confirm('Product details edited successfully')</script>"; }
   

						else 
						{echo "Error: " . $sql . "<br>" . $conn->error;}

						}
					}
	
					else 
					{
					$sql="UPDATE product_details SET date_of_arrival = '$date_of_arrival1', quantity = '$quantity1', price = '$price1', expiry_flag = '$expiry_flag1'
							WHERE product_id = '$id' && batch_no = '$batch_no1'";
					if ($conn->query($sql) === TRUE) 
	
						{echo "<script>confirm('Product details edited successfully')</script>";}
   
		
					else 
					{echo "Error: " . $sql . "<br>" . $conn->error;}
				
		
					}


		
				}
				
				
				
		 
			}
	
	
}catch (Exception $e) {
print "some Exception\n";}
 finally 
	{$conn->close();}

  
 


?>
</table>
<table>
<tr>
		<td></td><td></td><td></td><td></td><td></td>
		<td><br><br><a href="product_details_list.php?name=  <?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=  <?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
	</form> 
</body>
</html>
