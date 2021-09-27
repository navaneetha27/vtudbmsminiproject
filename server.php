<?php
require "database/config.php";
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $passwd_1 = mysqli_real_escape_string($con, $_POST['passwd_1']);
  $passwd_2 = mysqli_real_escape_string($con, $_POST['passwd_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($passwd_1)) { array_push($errors, "Password is required"); }
  if ($passwd_1 != $passwd_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM usr WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_array($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO usr (name, email, passwd) 
  			  VALUES('$name', '$email', '$passwd_1')";
  	mysqli_query($con, $query);
  	$_SESSION['username'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ulogin.php');
  }
}
?>
