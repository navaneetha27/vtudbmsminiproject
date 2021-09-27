<?php
require "database/config.php";
session_start();


$q="select * from loant";
$result=mysqli_query($con,$q);
?>
<html>
<style>
body {
  margin: 0;
  background-color:white;
  overflow:auto;
}

.top{
	width:100%;
	height:30px;
	background-color: #33C6FF;
	font-size:auto;
	  position: sticky;
  top: 0;
  color:white;
  font-weight:bold;
  padding-top:8px;
  font-size:25px;
  display: flex;
  justify-content: space-around;
}
.top a{
	float:right;
	text-decoration:none;
	color:white;
	font-size:15px;
	background-color:grey;
	padding-bottom:5px;
	border-radius:20%;
	margin-bottom:5px;
}
.left a{
	text-decoration:none;
	color:white;
	line-height: 1.3em;

}

 .left a.active {
  background-color: #4CAF50;
  width:100%;
  color: white;
}

 a:hover:not(.active) {
  background-color: #555;
  width:100%;
  color: white;
}


.left {

  margin: 0;
  padding: 0;
  width: 20%;
  background-color: #323232;
  overflow:auto;
  height: 100%;
  float:left;
  display: flex;
        flex-direction: column;
        
		font-size: 24px;
  color:white;
  
  transition: 0.3s;
  
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

.le {
  width: 25%;
  margin:20px;
  
}

.ri {
	background-color:white;
  width: 70%;
   margin:20px;
   margin-left:0;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


 input[type=text], input[type=number]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=submit] {
  background-color: red;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
 
  text-align: left;
  border-bottom: 1px solid #ddd;
}
hr{
	border: 0.2px groove white;
	width:100%;
}

tr:hover {background-color:#f5f5f5;}

/* Responsive columns */
@media screen and (max-width: 900px) {
	.body{
		min-height:500px;
	}
  .column {
    width: 90%;
    display: block;
    margin: 10px;
	
	overflow:auto;
	
  }
  .left{
	  font-size:auto;
  }
  .ri{
	  margin-left:10;
  }
  
 input[type=text], input[type=number]{
  width: 100%;
  padding: 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding:0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}


}
</style>
</head>
<body>
<div class="top">

<div><B><center>PROLOAN</center></B></div>
<a href="alogout.php">logout</a>
</div>
<div class="left">
 <hr>
  <a  href="adhome.php">Home</a><hr>
  <a href="users.php" >users</a><hr>
  <a href="lplans.php">Loan Plan</a><hr>
  <a href="application1.php">application</a><hr>
  <a href="ltype.php" class="active">Loan Types</a><hr>
  <a href="lpayment.php">Loan Payment</a><hr>
   </div>
   </div>
<div class="right">
  <div class="column le " style="background-color:#aaa;">
   <center>LOANTYPE FORM</center>
    <form method="post">
	<hr>
	<label for="loanid">LoanId</label>
	<input type="number" name="lid"><hr>
	<label for="loanname">LoanName</label>
	<input type="text" name="lname">
	<hr>
	<center><input type="submit" name="save" value="save"></center>
	</form>
  </div>
  <div class="column ri" style="background-color:#green;">
    <table align="center">
		<tr>
		<th colspan="2" class="hdr"><center>LoanType</center></th>
		</tr>
		<tr>
		<th>LoanId </th>
		<th> NAME </th>
		</tr>
		<?php
		while($rows=mysqli_fetch_array($result)){
			?>
			<tr>
			<td><?php echo $rows['lid'] ?></td>
			<td><?php echo $rows['lname'] ?></td>
			<tr>
			<?php
		}?>

		</table>
  </div>
</div>




</body>
</html>
<?php
if(isset($_POST['save'])){

$x=$_POST['lid'];
$y=$_POST['lname'];
$query2="insert into loant values('$x','$y')";
$runquery2=mysqli_query($con,$query2);
if($runquery2){
		header('location:ltype.php');
		$_SESSION['username']=$username;
	}

}


?>