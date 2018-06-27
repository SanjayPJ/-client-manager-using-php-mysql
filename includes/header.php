
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
	    crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<title>Client Manager - <?php echo $title;?></title>
	<link href="https://fonts.googleapis.com/css?family=Scada" rel="stylesheet">

	<style>
		body {
			font-family: 'Scada', sans-serif;
			color: #343a40;
		}
	</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
	  <a class="navbar-brand text-uppercase" href="index.php"><i class="fab fa-gitkraken"></i> client<b>manager</b></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <?php 
	  if(!empty($_SESSION['loggedName'])){
		  
	  ?>
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="clients.php"><i class="fas fa-users"></i> My Clients</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="add.php"><i class="fas fa-user-plus"></i> Add Client</a>
		  </li>
		</ul>
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link" href="#"><i class="fas fa-user"></i> Hi, <?php echo $_SESSION['loggedName'] . "!";?></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="log_out.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
		  </li>
		</ul>
		<?php 
	  }
		?>
	  </div>
  </div>
</nav>

