<?php 
session_start();

if(!empty($_SESSION['loggedName'])){
	header("Location: clients.php");
}

include "includes/functions.php";

if(isset($_POST['submit'])){
	
	include "includes/connection.php";
	
	$form_email = mysqli_real_escape_string($connection, $_POST['email']);
	$form_password = mysqli_real_escape_string($connection, $_POST['password']);
	
	$query = "SELECT name, pass FROM users WHERE email='$form_email'";
	
	$result = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($result) > 0){
		
		//email found
		while($row = mysqli_fetch_assoc($result)){
			$username = $row['name'];
			$hashed_password = $row["pass"];
		}
		if(password_verify($form_password, $hashed_password)){
			$_SESSION['loggedName'] = $username;
			header("Location: clients.php");
		}else{
			//password verification failed
			$errorlogin = alertCreator("Invalid username or password","danger");
		}
	}else{
		//there is no result in that database
		$errorlogin = alertCreator("Invalid username or password", "danger");
	}
	//after completing close database connection
	mysqli_close($connection);
}

$title = "Log In";
?>

	<style>

		.form-container {
			margin-top: 150px;
			margin-bottom: 150px;
			width: 40%;
			margin-left: auto;
			margin-right: auto;
			border: 1px solid #EEE;
			padding: 20px;
			border-radius: 5px;
		}
		
	</style>
</head>

<body>
	<?php include "includes/header.php"; ?>
	<div class="container">
		<form class="pt-3 form-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php if(!empty($form_email)){echo $form_email;}?>">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
			</div>
			<?php 
			if(!empty($errorlogin)){
				echo $errorlogin;
			}
			?>
			<button type="submit" class="btn btn-dark w-100" name="submit"><i class="fas fa-sign-in-alt"></i> Log in</button>
		</form>
	</div>
	
<?php include "includes/footer.php"; ?>

</body>

</html>
