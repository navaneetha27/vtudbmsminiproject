<?php include('server.php') ?>
<html lang="en">
    <title>REGISTER</title>
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/script.js"></script>
     
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

   <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="name" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">	
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="passwd_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="passwd_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="ulogin.php">Sign in</a>
  	</p>
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
