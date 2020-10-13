<html>
<body>
<form method="post"> 
<center>
<br>

<br>
<h2> LOCATION OF THE PRODUCT </h2>
<br>


<?php include 'DBconnect.php'; 
$id =$_REQUEST['id'];
$name=$_GET['name'];
$query = "select * from product_location where product_id = '$id'";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult);


	   
	  
				echo " Product ID: ";
				echo " $id";
				 
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "Rack no: ";
			
		 if($rowCount > 0)
		 {
			 
			 while($row = mysqli_fetch_array($queryResult)) 
			 {
				
				echo "<td> ,$row[rack_no] </td>";
				
				
			 }
	
		 }
		 else
		 {
				echo "<tr>";
				echo "<td colspan='7' align='center'> No product(s) available</td>";
				echo "</tr>";
		 }
         
       echo "</table>";
	   
	   
$conn->close();
?>
<table>
<tr>
		<td></td><td></td><td></td><td></td><td></td>
		<td><br><br><a href="product_location.php?name=<?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
</body>
</html>
 
