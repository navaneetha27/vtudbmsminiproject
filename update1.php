<?php 
require "database/config.php";

	if (isset($_POST['update'])) {
		
		$uid = $_POST['uid'];
		$appno = $_POST['appno'];
		$stat = $_POST['stat'];
		

		
		$sql = "UPDATE `lpayment` SET `stat`='$stat' WHERE `uid`='$uid' and `appno`='$appno'";
	
		$result = mysqli_query($con,$sql);
		
		

		if ($result == TRUE) {
			header('Location: lpayment.php');
			
		}else{
			echo "Sorry some error occured:" ;
		}
	}



if (isset($_GET['uid'])) {
	$uid = $_GET['uid'];
	$appno= $_GET['appno'];
	$sql = "SELECT * FROM lpayment WHERE uid='$uid' and appno='$appno'";

	//Execute the sql
	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0) {
		
		while ($row = mysqli_fetch_assoc($result)) {
			
			$stat=$row['stat'];
			
			
		}

	?>
		<title>update</title>
		<style>
		body{
						background-color: antiquewhite;
						}
		#form{
			
			width: 50%;
			padding: 5% 10% 10% 10%;
			margin-left: 25%;
			margin-right: 20%;
			margin-top: 10%;
			box-shadow: 0 9px 13px 5px   green;
			border-radius: 12%;
			background-color: #33C6FF;
			box-sizing: border-box;
		}
		input,textarea{
						border: none;
						outline:none;
						border-bottom: 1px dotted blue;
					background-color: rgba(0,0,0,0.8);
						color: white;
						width: 100%;
						}
		.submit{
						background-color: cadetblue;
					width:50%;
						}
					.submit:hover{
						color:wheat;
						}
		</style>

		<div id="form">
		<form action="" method="post">
		  <input type="hidden" name="uid" value="<?php echo $uid; ?>">
		
		    <br>
		   ApplicationNumber:<br>
		    <input type="text" name="appno" value="<?php echo $appno; ?>">
		    <br>
		  
			 ApplicationStatus:<br>
		    <input type="text" name="stat" value="<?php echo $stat; ?>">
		    <br>
			 <br>
		    
		    
		    <center>
		    <input type="submit" 	class="submit" value="Update" name="update"></center>
		
		</form>
		</div>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: adhome.php');
	}

}
?>