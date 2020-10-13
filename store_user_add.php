<?php include 'DBconnect.php'; 
$name=$_GET['name']; 
session_start();
if ($_SESSION['login']==false)
{
  
    echo 'You are not logged in. <a href="index.php">Click here</a> to log in.';
}
else 
{
?>
<html>

<body>
<form method="post"> 
<br><br>
<center><font size="30" style="High Tower Text" color="black"><b>Register new Store user</b></font>
<br> <br> <br> <br> <br>
<table width = "25%" cellpadding="10">

	<tr>
		
		<tr>
			<td><font size="4" style="High Tower Text" color="black"></font> Email id: </td> <td><input type="text" name="user_id" autocomplete="off" required="on"></td>
		</tr>
		<tr>
			<td> <font size="4" style="High Tower Text" color="black"> Password: </td> <td><input type="password" name="password" required="on" autocomplete="off" ></td>
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black"> Username: </font> </td> <td><input type="text" name="username" required="on" autocomplete="off" ></td>
		</tr>
		<tr>
			<td><font size="4" style="High Tower Text" color="black"> Phone number: </font> </td> <td><input type="text" name="phone_number" required="on" autocomplete="off" ></td>
		</tr>
		
	</tr>
	<tr>
		<td><br><br><button type="reset" name="btnReset">RESET</button> </td>
		<td><br><br><button type="submit" name="btnSubmit">ADD</button> </td>
		
	</tr>	
	<tr>
		<td><br><br><a href="home.php?name=<?php echo $name ?>"> <font size="" style="High Tower Text" color="black"><b>HOME PAGE</b></font></a></td>		
	</tr> 

</table>

</form>
<?php
if(isset($_POST['btnSubmit']))
{
try { 

$userid1= $_POST["user_id"];
$password1 = $_POST["password"];
$username1 = $_POST["username"];
$phonenumber1 = $_POST["phone_number"];


if (empty($userid1) || empty($password1) || empty($username1)|| empty($phonenumber1)) {
   echo "<script>alert('Please Enter all inputs')</script>";
	//echo 'Please enter all inputs';
	
    return false;
}
else
{
	$flag=0;
$sql = "INSERT INTO store_user (user_id,password,username,phone_number) VALUES ('$userid1', '$password1', '$username1','$phonenumber1')";  
$chec="select * from store_user where user_id='$userid1';";
  $checkresult=$conn->query($chec);
   $rowCount = mysqli_num_rows($checkresult);
   if($rowCount > 0)
   {
	   $flag=1;echo "Record already exists";
   }
   if (($flag==0) && ($conn->query($sql) === TRUE))   //same aa nu check pantu add pannu db la
    {
	
	  echo "<script>confirm('New Store user added successfully')</script>";
     //echo "Product added successfully";
    }   
   /*else  {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }*/

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
<?php
}
?>
