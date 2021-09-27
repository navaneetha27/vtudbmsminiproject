<?php 
require "database/config.php";
include('server.php'); ?>
<html>
<head>
<title>admin</title>
<link rel="stylesheet" href="css/sign-in.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/script.js"></script>
</head>
<style>
 body{

         .submit{
            background-color: cadetblue;
            width: 95%;
            
        
            border: none;
            border-radius: 20px;
            box-sizing:content-box;
            box-shadow: 2px 2px 2px 2px;
           
        }
         .reg{
             color: aliceblue;
		
		</style>
<body>

<nav class="menu">

<ul>
<li ><a href="home.php">HOME</a></li>



<li class="contact"><a href="contact-us.php">CONTACT US</a></li>

<li class="faq"><a href="faq.php">FAQ</a></li>
<li class="work"><a href="ulogin.php">USER LOGIN</a></li>

<li class="sign"><a href="alogin.php">ADMIN LOGIN</a></li>
</ul>
</nav>


<center><h1>USER LOGIN</h1></center>

 <div id="form">
       <form method="POST" enctype="multipart/form-data">
           


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="passwd" required>
        
    <button type="submit" class="btn" name="login_user">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#ffffff">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
    <p class="reg">Not a member?<a href="reg.php">REGISTER</a></p>
  </div>
           
       </form>
        
        </div> 
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

</body>
</html>
<?php
if (isset($_POST['login_user'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $passwd = mysqli_real_escape_string($con, $_POST['passwd']);

  if (empty($name)) {
  	array_push($errors, "Username is required");
  }
  if (empty($passwd)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM usr WHERE name='$name' AND passwd='$passwd'";
  	$results = mysqli_query($con, $query);
	$rows=mysqli_fetch_array($results);
	$uid=$rows['uid'];
	$name=$rows['name'];
  	if (mysqli_num_rows($results) == 1) {
		$s="CALL userlog('$uid','$name')";
		$ss=mysqli_query($con,$s);
  	  $_SESSION['uid'] = $uid;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ulogin-form.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>



