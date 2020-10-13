<html> <body>
<form method="post">
<center>
<BR> <BR>
<table cellpadding='10'>
<font size="4" face="High tower text">
<h2> CHOOSE PRODUCTS :</h2>

<?php include 'DBconnect.php'; 
$user1 =$_REQUEST['user'];
$id1 =$_REQUEST['id'];
$batch_no1 =$_REQUEST['batch'];
static $price1=0;
$query = "select * from product_details where product_id = '$id1' && batch_no= '$batch_no1'";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult); 
if($rowCount > 0)
{		
	while($row = mysqli_fetch_array($queryResult))
	{
		echo "<tr>";
		echo "<td> <td><td><td><td> Product ID: </td> </td></td></td></td>";
		echo "<td>  $id1 </td> ";
		echo "</tr> ";
		
		echo "<tr>";
		echo "<td> <td><td><td><td> Batch No.: </td> </td></td></td></td>";
		echo "<td>  $batch_no1 </td>";
		echo "</tr> ";
		
		echo "<tr>";
		echo "<td> <td><td><td><td> Unit rate: </td> </td></td></td></td>";
		$unit_rate1=$row['price'];
		echo "<td> $row[price]</td>";
		echo "</tr> ";
		
		echo "<tr>";
		echo "<td> <td><td><td><td> Available Quantity: </td> </td></td></td></td>";
		$oldq=$row['quantity'];
		echo "<td> $row[quantity]</td>";
		echo "</tr> ";
		
		echo "<tr>";
		echo "<td> <td><td><td><td>  Enter Quantity: </td> </td></td></td></td>";
		echo "<td> <input type='number' name='quantity'></td>";
		echo "</tr> ";
	}
	echo "</table>";
	echo "<br>";
	echo "<table>";
	echo "<tr><td><td><td> <button type='submit' name='back'> Back </button> </td></td></td> ";
	echo "<td><td><td> <button type='submit' name='addcart'> Add to cart </button> </td></td></td></tr>";
	
	echo "</table>";	
	



if(isset($_POST['addcart']))
{
	try{	
	$quantity1=$_POST["quantity"];
	$price1=$quantity1*$unit_rate1;
	if (empty($quantity1)) {
	
	echo "<script>alert('Please enter quantity')</script>";
    return false;
		}
		else {
				if($quantity1<=$oldq)
					{
					$sql= "INSERT INTO product_bought_list (email_id, product_id, quantity, unit_rate, price,batch_no) VALUES ('$user1', '$id1', '$quantity1', '$unit_rate1', '$price1', $batch_no1)";
					$conn->query($sql);
					$newq= $oldq-$quantity1;
					$sql11="UPDATE product_details SET quantity = '$newq' WHERE product_id = '$id1' && batch_no= '$batch_no1'";
						$conn->query($sql11);
					}
					else { echo "<script>alert('Quantity exceeding available stock')</script>";}
				
			}
		
		
		}

catch (Exception $e) {
  print "some Exception\n";
} finally {
  $conn->close();
}
}
}

if(isset($_POST['back']))
{
	redirect("http://localhost/product_finder/search_products.php?user=$user1");
}


function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


?>



</table>
</form>
</body>
</html>
