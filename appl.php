<?php 
session_start();
$uid=$_SESSION['uid'];

require "database/config.php";
$q="select ll.lname,l.* from loanp l join loant ll on(l.lid=ll.lid)";

$result=mysqli_query($con,$q);
?>
<!DOCTYPE html> 
<html lang="en">

<head>

<meta charset="UTF-8">
<title>HOME</title>
<link rel="stylesheet" href="css/appl.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/script.js"></script>

</head>
<style>
.body{
width:100%;
}
.im1{
width:100%;
}
.right{
	float:right;
	width:80%;
	background-color:#bebebe;
	height:100%;
}
.column {
  float: left;
  height:40%;
  
}
.ri {
	background-color:white;
  width: 60%;
   margin:20px;
   margin-left:0px;
}
</style>
<body>



<nav class="menu">

<ul>
<li class="appl"><a href="appl.php">APPLICATION FORM</a></li>

<li class="status"><a href="applstat.php">APPLICATION STATUS</a></li>
<li ><a href="loan-payment.php">LOAN PAYMENT</a></li>
<li><a href="login-history.php">LOGIN HISTORY</a></li>
<li class="ulogin"><a href="ulogout.php">LOGOUT</a></li>


</ul>
</nav>
<div class="column ri" style="background-color:#green;">
    <table align="center">
		<tr>
		<th colspan="5" class="hdr"><center>LoanType</center></th>
		</tr>
		<tr>
		<th>loan name</th>
		<th>LoanId </th>
		<th> Month </th>
		
		<th >intrest</th>
		</tr>
		<?php
		while($rows=mysqli_fetch_array($result)){
			?>
			<tr>
			<td><?php echo $rows['lname']?></td>
			<td><?php echo $rows['lid'] ?></td>
			<td><?php echo $rows['month'] ?></td>
			<td><?php echo $rows['intrest'] ?></td>
			<tr>
			<?php
		}?>

 
	<div class="right">
  <form method="post">
  	
  	
  	
  	  <input type="hidden" name="uid" value="<?php echo $uid ?>">
  	
  	
   
         <label>AMOUNT</label><br>
  	  <input type="number" name="amt" >	<br>
  	

         
         <label>LOAN-ID</label><br>
  	  <input type="text" name="lid"><br>	
  	
         <label>MONTH</label><br>
  	  <input type="number" name="month">	<br>
  
       	
 
         <label>ACCOUNT-NUMBER</label><br>
  	  <input type="number" name="accno" ><br>	
      <label>PAN-NUMBER</label><br>
  	  <input type="text" name="panno">	<br>
	  <input type="submit" value="apply" name="apply">
  
  	
  </form>
        
        </div>
<?php

if(isset($_POST['apply'])){
$uid=$_POST['uid'];
$amt=$_POST['amt'];
$lid=$_POST['lid'];
$accno=$_POST['accno'];
$panno=$_POST['panno'];

$y=$_POST['month'];

$query2="insert into appl(uid,amt,lid,month,apstat,accno,panno) values('$uid','$amt','$lid','$y','pending','$accno','$panno')";
$runquery2=mysqli_query($con,$query2);
if($runquery2){

	
		header('location:appl.php');
		$_SESSION['uid']=$uid;
	}
}


?>
		




    </body>
</html>

