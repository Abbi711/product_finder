<?php include 'DBconnect.php'; 
session_start();
$_SESSION["login"]=false;?>
<html>
<head>
<script>
function mouseoverPass(obj) {
  var obj = document.getElementById('mypassword');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('mypassword');
  obj.type = "password";
}
</script>
</head>

<body> 
<br> <br>
<center>
<h1> PRODUCT FINDER AND BILLING </H1>
<br><br>

<form method="post">
<font size="6" style="High Tower Text" color="black"><b>Store user Login:</b></font>
<br> <br> <br>
<table width = "25%" cellpadding="10">
		
		<tr>
			<td> </td> <td><font size="5" style="High Tower Text" color="black">Email id: </font> </td> <td><input type="text" name="userid" autofocus placeholder="abc@example.com" required="on" ></td>
			

			
		</tr>
		<tr>
			<td> </td> <td><font size="5" style="High Tower Text" color="black">Password</font> </td> <td><input type="password" name="password" required="on" id="mypassword"  onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></td>
		</tr>
		<tr>
		<td></td>
		<td><br><br><button type="reset" name="btnReset">Reset</button> </td>
		<td><br><br><button type="submit" name="btnSubmit">Login</button> </td>
		
		
		</tr>
</table>
<br>

</form>

<?php
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

if(isset($_POST['btnSubmit']))
{
try { 

$userid1 = $_POST["userid"];
$password1 = $_POST["password"];


if (empty($userid1) || empty($password1)) {
   echo "<script>alert('Please Enter all inputs')</script>";
	
    return false;
}
else
{
	
	
// Create connection
$sql = "SELECT user_id, password FROM store_user WHERE user_id='$userid1' and password ='$password1'";

$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
    // output data of each row
	echo "success";
	$_SESSION["login"]=true;
	$sql1 = "SELECT username FROM store_user WHERE user_id='$userid1' and password ='$password1'";
	$res1=$conn->query($sql1);
	$row1 = mysqli_fetch_array($res1);
	 $_SESSION["username"]=$row1["username"];
	 if((isset($_SESSION["username"]))&&(isset($_SESSION["login"])))
	 {redirect("http://localhost/product_finder/home.php?name=$row1[username]");}
} 
else{
    
    echo "Please enter the valid username and password";
}
//if($_SESSION["login"]==false){echo "<script>alert('Please login first')</script>";}
}
}catch (Exception $e) {
  print "some Exception\n";
} finally {
  $conn->close();
}
}
?>

<form method="post">
<br><br>
<font face="high tower text" size="4">
SEARCH FOR PRODUCTS: 
<table width = "25%" cellpadding="10">
		
		<tr>
			<td><font size="4" style="High Tower Text" color="black" > Enter Email id: </font> </td> <td><input type="text" name="userid1" placeholder="abc@example.com"></td>
		</tr>
		<tr>
			<br>

<br>
		
       <tr>
		<td> <td> <input type="submit" name="butsub" value="Go"> </td>  </td>		
		</tr>
		
<?php

if(isset($_POST['butsub']))
{	$mailid1 = $_POST["userid1"];
	//$product1= $_POST["list"];
	//echo "HELLO USER";
	redirect("http://localhost/product_finder/search_products.php?user=$mailid1");
	
}
?>
</table>
</form>


</body>
</html>
