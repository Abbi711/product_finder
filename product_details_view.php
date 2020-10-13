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
				/* $array1['$i']=$row['batch_no'];
				echo "<td> $array1['$i'] </td>";
				$i++;
				$flag1++; */
			} 
		 
		 else
		 {
				echo "<tr>";
				echo "<td colspan='7' align='center'> No product(s) found</td>";
				echo "</tr>";
		 }
		 
         echo "<tr> <td> </td><td> <button type='submit' name='btnSubmit'> View Details </button> </td> </tr>";
		
	   
	   
	   
	   
if(isset($_POST['btnSubmit']))
{
try { 

$batch_no1 = $_POST["batch"];
$query1 = "select * from product_details where product_id = '$id' && batch_no = '$batch_no1' ";
$queryResult1 = $conn->query($query1);
$rowCount1 = mysqli_num_rows($queryResult1);


if($rowCount1 > 0)
		 {		
			
			 while($row1 = mysqli_fetch_array($queryResult1)) 
			 {
				 echo "<tr>";
				echo "<td> Batch no: </td> ";
				echo "<td> $batch_no1 </td>";
				echo "</tr> ";

				echo "<tr>";
				echo "<td> Quantity: </td> ";
				echo "<td> $row1[quantity]</td>";
				echo "</tr> ";
				echo "<tr>";
				echo "<td> Unit Rate: </td> ";
				echo "<td> $row1[price]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Date of arrival: </td> ";
				echo "<td> $row1[date_of_arrival]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Product Expiry: </td> ";
				echo "<td> $row1[expiry_flag]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Expiry date: </td> ";
				echo "<td> $row1[expiry_date]</td>";
				echo "</tr>";

			 }
		 }
		 
}catch (Exception $e) {
  print "some Exception\n";
} finally {
  $conn->close();
}
}  
 
	
?>
</table>
<table>
<tr>
		<td></td><td></td><td></td><td></td><td></td>
		<td><br><br><a href="product_details_list.php?name=<?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
	</form> 
</body>
</html>
