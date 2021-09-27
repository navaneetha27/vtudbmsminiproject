 <?php
require "database/config.php";

?>
<html>
<title>admin</title>
<style>
 body{
            background:linear-gradient(green,yellow);
			
     }
		 #form {
    
    width: 50%;
    padding: 10% 10% 10% 10%;
    margin-left: 20%;
        margin-right: 10%;
        margin-top: 10%;
          

    box-shadow: 0 9px 13px 5px;
    border-radius: 12%;
        background:radial-gradient(green,orange);
		background-size: cover;
        box-sizing: border-box;
    }
  input{
             border: none;
            outline:none;
            border-bottom: 1px dotted blue;
             background-color: rgba(0,0,0,0.8);
            color: white;
             width:100%;
         }
    
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
<center><h1>ADMINISTRATOR LOGIN</h1></center>
<div id="form">
       <form method="POST" enctype="multipart/form-data">
           
             
             <p><label for="username" class="">Username</label>
			 <input type="text" id="username" name="adname" placeholder="enter username "  required></p>
           
             <p> <label for="password" class="">password </label><input type="password" name="passwd" placeholder="password" required></p>
           
         <p>  <input id="submit" type="submit" name="SignIn" class="submit" value="login"></p>
       </form>
     </div>
<center><a href="index.php"><h1>go back</h1></center>		
</body>
</html>
<?php

if(isset($_POST['SignIn']))
{
	$username=$_POST['adname'];
	$password=$_POST['passwd'];
	$query1="select * from ad10 where adname='$username' AND passwd='$password'";
	$runquery1=mysqli_query($con,$query1);
	if(mysqli_num_rows($runquery1)>0)
	{
		header('location:adhome.php');
		$_SESSION['username']=$username;
	}
	else
	{
		?>abc()<?php
		
	}
}

?>
<script>
function abc(){
	alert("invalid password or username");
}
</script>


