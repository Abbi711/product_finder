<html>
<body>
<form method="post"> 
<center>
<br>

<br>
<h2> ABOUT THE PRODUCT </h2>
<br>


<?php include 'DBconnect.php'; 
$name=$_GET['name'];
$id =$_REQUEST['id'];
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
				echo "<tr>";
				echo "<td> Product Name: </td> ";
				echo "<td> $row[product_name]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Product Description: </td> ";
				echo "<td> $row[product_description]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Date created: </td> ";
				echo "<td> $row[date_created]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> Date last modified: </td> ";
				echo "<td> $row[date_last_modified]</td>";
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
$conn->close();
?>
<table>
<tr>
		<td></td><td></td><td></td><td></td><td></td>
		<td><br><br><a href="product_list.php?name=<?php echo $name ?>"> <b> BACK</b></a></td> <td></td><td></td><td></td>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <b>HOME PAGE</b></a></td>
	</tr> </table>
</body>
</html>
 
