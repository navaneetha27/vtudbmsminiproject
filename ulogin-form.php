<?php
session_start();
$uid=$_SESSION['uid'];

?><!DOCTYPE html> 
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
</style>
<body>



<nav class="menu">

<ul>




<li class="appl"><a href="appl.php">APPLICATION FORM</a></li>

<li class="status"><a href="applstat.php">APPLICATION STATUS</a></li>
<li ><a href="loan-payment.php">LOAN PAYMENT</a></li>
<li><a href="login-history.php">LOGIN HISTORY</a></li>
<li class="ulogin"><a href="ulogin.php">LOGOUT</a></li>


</ul>
</nav>

<img   class="im1" src="images/backimage.jpg">

<div class="hold">
<div class="first">
<h1> Proloan </h1>
<div class="first1">
<a href="contact-us.php">Contact Us</a>

<a href="faq.php">Faq</a>
</div>
</div>
<div class="second">
<h2> LEGAL </h2>
<div class="second1">
<a href="tc">Terms And Condition</a>
<a href="pp">Privacy Policy</a>
</div>
</div>



<div class="third">
<h3> Follow </h3>
<a><href="#" class="fa fa-facebook"></a>
<a><href="#" class="fa fa-twitter"></a>
<a><href="#" class="fa fa-youtube"></a>
<a><href="#" class="fa fa-instagram"></a>
<div class="copyright">
&copy 2019 website <span class="separator">|</span> designed by 
</div>
</div>


















</div>
</body>