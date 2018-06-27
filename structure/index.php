<?php

//always start the sessions at the top
session_start();

if(isset($_POST['login'])){
	
	include "includes/functions.php";
	include "includes/connection.php";
		
	//create variables
	//wrap variables within the validate function
	$formEmail = $_POST["email"];
	$formPass = $_POST["password"];
	
	//connect to database
	
	$query = "SELECT name, pass FROM users where email='$formEmail'";
	$result = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$name = $row['name'];
			$hashedPassword = $row['pass'];
		}
		if(password_verify($formPass, $hashedPassword)){
		
		//store data in session variable
		$_SESSION['loggedUser'] = $name;
		
		//redirect to client.php
		
		header("Location: clients.php");
		}else{//hashed passwoed didnt varify
			$loginError = alertCreator("Wrong username or password combination.");
		}
	}else{//there is no result in database
		//error message
		$loginError = alertCreator("There is no such user data in database, Try again");
	}
	
}
//close database connection
//mysqli_close($connection);

include('includes/header.php');
?>

<h1>Client Address Book</h1>
<p class="lead">Log in to your account.</p>

<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php
include('includes/footer.php');
?>