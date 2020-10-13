<html> <body>
<form method="post">
<center>
<BR> <BR>
<table cellpadding='10'>
<font size="6" face="High tower text">
<h2> SEARCH PRODUCTS :</h2>
<?php include 'DBconnect.php'; 
$user1 =$_REQUEST['user'];
//$product =$_REQUEST['product'];
$rowCount1=99;
static $count=0;
$query = "select * from product_master";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult); 

 echo "<table cellpadding='10'>";
 
		
		 if($rowCount > 0)
		 {		echo "<tr>";
				ECHO "<TD><font size='5' face='High tower text'> Select product name: </td>" ;
			echo " <td> <select name='list'>";
			 while($row = mysqli_fetch_array($queryResult)) 
			 {
				echo " <option value ='". $row['product_name'] . "'> " . $row['product_name']. "</option> " ;
				
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
		 
			echo "<tr> <td> <button type='submit' name='getout'> BACK </button> </td> ";
		  echo "<td> <button type='submit' name='buttonSub'> GO </button> </td> ";
		  echo "<td> <button type='submit' name='placeorder'> PLACE ORDER </button> </td> </tr>";
		  
			//echo "</form>";
			
if(isset($_POST['placeorder']))
{
	redirect("http://localhost/product_finder/bill_summary.php?user=$user1");
}

			
			
if(isset($_POST['getout']))
{
	redirect("http://localhost/product_finder/index.php");
}
if(isset($_POST['buttonSub']))
{
	//echo "<form method=post''>";
$product_name1=$_POST["list"];
$query = "select * from product_master where product_name = '$product_name1'";
$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult); 
				

if($rowCount > 0)
{
	 while($row = mysqli_fetch_array($queryResult)) 
			{	
	

				echo "<tr> ";
				echo "<td><font size='4' face='High tower text'> Product ID: </td> ";
				
				echo "<td><font size='4' face='High tower text'> $row[product_id]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<tr>";
				echo "<td> <font size='4' face='High tower text'> Product Name: </td> ";
				echo "<td> <font size='4' face='High tower text'> $product_name1</td>";
				echo "</tr> ";
				echo "</table>";
				echo "<br>";
				$query1 = "select * from product_details where product_id = '$row[product_id]'";
				$queryResult1 = $conn->query($query1);
				$rowCount1 = mysqli_num_rows($queryResult1);
				//$pls=$rowCount1;
				if($rowCount1 > 0)
				{		
						while($row1 = mysqli_fetch_array($queryResult1))
						
						{
							
							$count++;
							echo "<table cellpadding='7'>";
							echo "<tr>";
							echo "<td><font size='4' face='High tower text'> Batch no: </td>";
							
							//echo "<td><font size='4' face='High tower text'> <input type='checkbox' name='c1[]' value='". $row1['batch_no']."' id'". $row1['batch_no']."'> Batch no: </td>";
							echo "<td><font size='4' face='High tower text'>  $row1[batch_no] </td>";
							//echo "<td> <td><td><td><td>  Enter Quantity: <input type='number' name='".$count."'> </td> </td></td></td></td>";
							//echo " <td> <td> <button type='submit' name='".$count."'> ADD TO CART </button> </td> </td>";
							echo "<td> <td> <a href='http://localhost/product_finder/display_products.php?user=$user1&id=$row[product_id]&batch=$row1[batch_no]'> Enter Quantity </a> </td> </td>";
							//echo "b"."$count";
							echo "</tr> ";

							echo "<tr>";
							echo "<td><font size='4' face='High tower text'>  Quantity available: </td> ";
							if($row1['quantity']<=0) {echo "<td><font size='4' face='High tower text'> Out of Stock </td>";}
							else {echo "<td><font size='4' face='High tower text'>  $row1[quantity]</td>";}
							echo "</tr> ";
							echo "<tr>";
							echo "<td><font size='4' face='High tower text'>  Unit Rate: </td> ";
							echo "<td><font size='4' face='High tower text'>  $row1[price]</td>";
							echo "</tr>";
						
							
							
							echo "<tr> </tr>";

							echo "</table>";
							echo "<br>";
							
						}
							

					
				}
				else
				{
				echo "<tr>";
				echo "<td colspan='7' align='center'> No product(s) found</td>";
				echo "</tr>";
				}
				
			}
			echo "<br>";
		echo "<button type='submit' name='productadd'> SEARCH ANOTHER PRODUCT </button>";
		echo "<td> </td><td> </td><td> </td><td> </td><td> </td><td>";
		

}




}

	
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

if(isset($_POST['productadd']))
{
	redirect("http://localhost/product_finder/search_products.php?user=abc@gmail.com");
}
if(isset($_POST['placeorder']))
{
	
}
?>

</form>
</body>
</html>
