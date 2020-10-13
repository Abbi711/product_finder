<?php 
include 'DBconnect.php';
session_start(); 
$name =$_SESSION["username"];	
?>
<SCRIPT type="text/javascript">  //for Prevent user from seeing previously visited secured page after logout
    window.history.forward();
    //function noBack() { window.history.forward(); }
</SCRIPT>
<html>
<body>
<center>
<br><br><br><br><br><br>
<br><br><br>
<font size="6" face="high tower text">WELCOME, <?php if ($_SESSION["username"]) echo $_SESSION["username"] ?>  </font>
<br><br> 
<font face="high tower text" size="5"> HOME PAGE 


<table width = "25%" cellpadding="10">
		<tr>
		
		 <td><br><br><form action="product_list.php?name=<?php echo $name ?>" method="post" > <input type="submit" value="Product List"> </form> </td> 
		<td><br><br><form action="product_details_list.php?name=<?php echo $name ?>" method="post"> <input type="submit" value="Product Details"> </form>  </td>
		
		</tr>	
		<tr>
		
		<td><br><br><form action="store_user_add.php?name=<?php echo $name ?>" method="post"> <input type="submit" value="Register Store user"> </form></td>
		<td><br><br><form action="product_location.php?name=<?php echo $name ?>" method="post"> <input type="submit" value="Product Location"> </form> </td>
		
		
</table>

<table>
<br>
<!--<tr> <td> <form> <button type="submit" name="btnLogout"> LOGOUT </button> </form>-->
<tr> <td> <form action="logout.php" method="post"> <input type="submit" value="LOGOUT">  </form>
</table>
</font>
 

</body>
</html>
