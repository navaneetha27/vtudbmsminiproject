<?php
require "database/config.php";
session_start();
$q="select count(*) as count from appl where apstat='pending'";
$result=mysqli_query($con,$q);
$rows=mysqli_fetch_array($result);
$x=$rows['count'];
$q1="select  sum(ampaid) from lpayment";
$res=mysqli_query($con,$q1);
$rows=mysqli_fetch_array($res);
$y=$rows['sum(ampaid)'];
?>
<html>
<title>admin|home</title>
<head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
body {
  margin: 0;
  background-color:#323232;
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

}hr{
	border: 0.2px groove white;
	width:100%;
}
.left a.active {
  background-color: #4CAF50;
  width:100%;
  color: white;
}

 a:hover:not(.active) {
  background-color: #555;
  
  color: white;
}
.row{
	margin:2%;
box-sizing: border-box;
border-style:hidden;
background-color:white;
}
.left {
	margin: 0;
    padding: 0;
    width: 20%;
    background-color: #323232;
	height: 100%;
    float:left;
    display: flex;
    flex-direction: column;
    font-size: 25px;
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
  width: 25%;
  padding:5% 2%;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 700px) {
  .column {
    width: 80%;
   display: flex;
        flex-direction: column;
    margin-bottom: 5%;
	margin-left:5%;
  }
 }
.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 5%;
  text-align: center;
  background-color: #444;
  color: white;
  height:250px;
  width:80%;
  
}
.card1:hover{
	background-color: #4CAF50;
}
.card3 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding:5%;
  text-align: center;
  background-color: #3e82f7;
  color: white;
  height:250px;
  width:80%;
}
.fa {font-size:50px;}

</style>
</head>
<body>
<div class="top">

<div><B><center>PROLOAN</center></B></div>
<a href="alogout.php">logout</a>
</div>
<div class="left"><hr>
  <a  href="adhome.php" class="active">Home</a><hr>
  <a href="users.php" >users</a><hr>
  <a href="lplans.php">Loan Plan</a><hr>
  <a href="application1.php" >application</a><hr>
  <a href="ltype.php" >Loan Types</a><hr>
  <a href="lpayment.php">Loan Payment</a><hr>
  <a href="loanpbk.php">loanpDeleted</a><hr>
</div>
<div class="right">
<div class="row">
  <a href="application1.php"><div class="column">
    <div class="card1">
      <p><i class="fa fa-user"></i></p>
      <p>NEW APPLICATION</p>
	  <p><?php echo $x ;?></P>
	  <hr style="width:100%">
	  <p> view application </p>
	   <i style='font-size:24px;color:white;' class='fas'>&#xf105;</i>
    </div>
  </div></a>
 <div class="column">
    <div class="card3">
      <p><i style="font-size:24px" class="fa">&#xf156;</i></p>
      <p>TOTAL <br>AMOUNT <br>RECEIVABLE<br><br></p>
	  <hr>
	 <?php echo $y; ?>
    </div>
  </div>
</div>
</div>
</body>
