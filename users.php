<?php
require "database/config.php";
session_start();
$q="select * from usr";
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
hr{
	border: 0.2px groove white;
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
  width: 25%;
  padding:5% 2%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
  .left{
	  font-size:auto;
  }
 }
	table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  border-bottom: 1px solid #ddd;
}
tr:hover {background-color:#f5f5f5;}
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
  <a href="users.php" class="active">users</a><hr>
  <a href="lplans.php">Loan Plan</a><hr>
  <a href="application1.php">application</a><hr>
  <a href="ltype.php">Loan Types</a><hr>
  <a href="lpayment.php">Loan Payment</a><hr>
</div>
<div class="right">
<table align="center">
		<tr>
		<th colspan="4" class="hdr"><center>USERLIST</center></th>
		</tr>
		<tr>
		<th>UID </th>
		<th> NAME </th>
		<th>EMAIL</th>
		<th> PASSWORD </th>
		
		</tr>
		<?php
		while($rows=mysqli_fetch_array($result)){
			?>
			<tr>
			<td><?php echo $rows['uid'] ?></td>
			<td><?php echo $rows['name'] ?></td>
			<td><?php echo $rows['email'] ?></td>
			<td><?php echo $rows['passwd'] ?></td>
			<tr>
			<?php
		}?>
		</table>
</div>
</body>
</html>
<?php
?>