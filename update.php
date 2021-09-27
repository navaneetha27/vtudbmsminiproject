<?php 
require "database/config.php";

	if (isset($_POST['update'])) {
		
		$uid = $_POST['uid'];
		$appno = $_POST['appno'];
		$apstat = $_POST['apstat'];
		

		
		$sql = "UPDATE `appl` SET `apstat`='$apstat' WHERE `uid`='$uid' and `appno`='$appno'";
	
		$result = mysqli_query($con,$sql);
		
			$ss="SELECT a.month b,amt,intrest  from appl a join loanp b ON(a.month=b.month and a.lid=b.lid and appno='$appno') ";
			$res = mysqli_query($con,$ss);
			$ro = mysqli_fetch_assoc($res);
			$b=$ro['b'];
			$amt=$ro['amt'];
			$intrest=$ro['intrest'];
			
			
			
			$x=date("Y-m-d");
			$duedate = date("Y-m-d", strtotime("+$b months", strtotime(date("Y-m-d")."+$b")));

			$s="CALL uplpay('$intrest','$amt','$duedate','$uid','$appno','$b')";
			$res = mysqli_query($con,$s);
		
		

		if ($result == TRUE) {
			header('Location: application1.php');
			
		}else{
			echo "Sorry some error occured,May be already updated....:" ;
		}
	}



if (isset($_GET['uid'])) {
	$uid = $_GET['uid'];
	$appno= $_GET['appno'];
	$sql = "SELECT * FROM appl WHERE uid='$uid' and appno='$appno'";

	//Execute the sql
	$result = mysqli_query($con,$sql);

	if (mysqli_num_rows($result) > 0) {
		
		while ($row = mysqli_fetch_assoc($result)) {
			$amt=$row['amt'];
			$apstat=$row['apstat'];
			$month=$row['month'];
			
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
		    <input type="text" name="apstat" value="<?php echo $apstat; ?>">
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