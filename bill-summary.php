<html> <body>
<form method="post">
<center>
<BR> <BR>
<table cellpadding='10'>
<font size="4" face="High tower text">
<h2> BILL SUMMARY :</h2>

<?php include 'DBconnect.php'; 
$user1 =$_REQUEST['user'];
$tcost=0;
$query = "select * from product_bought_list where email_id = '$user1' && paid='no'";

$queryResult = $conn->query($query);
$rowCount = mysqli_num_rows($queryResult);
if($rowCount>0)
{
	while($row = mysqli_fetch_array($queryResult))
	{
		
		$tcost=$tcost+$row['price'];
		
	}
	//$row['paid']="yes";
		echo "The bill amout is $tcost";
		$query1 = "UPDATE product_bought_list SET paid='yes' where email_id='$user1'";
		$queryResult1 = $conn->query($query1);
	
}



?>

</form>
</body>
</html>
