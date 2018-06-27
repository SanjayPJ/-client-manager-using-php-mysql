
<?php 
session_start();

include "includes/functions.php";

if(empty($_SESSION['loggedName'])){
	//not logged in
	header("Location: index.php");
}
$title = "Page";
include "includes/header.php";
include "includes/connection.php";

if(isset($_GET['rmid'])){
	$deleteAlert = alertCreator("Are you sure you want to delete this client? No take backs! 
				<br> 
				<button class='btn btn-danger mt-2'><a href='clients.php?dalert=". $_GET['rmid'] . "' class='text-white'>Yes, delete!</a></button>
				<button class='btn btn-light mt-2'><a href='clients.php' class='text-dark'>No thanks!</a></button>"
				,"danger");
}
if(isset($_GET['dalert'])){

	$rm_id = $_GET['dalert'];
	$query = "DELETE FROM clients WHERE id='$rm_id'";
	$rm_result = mysqli_query($connection, $query);
}

$query = "SELECT * FROM clients";
$result = mysqli_query($connection, $query);

mysqli_close($connection);
?>

</head>

<body>

<div class="container clearfix">
	<h2 class="pt-3 d-inline-block mb-3"><i class="fas fa-address-book"></i> Client Address Book</h2>
	<a href="add.php" class="btn btn-success float-right mt-3"><i class="fas fa-user-plus"></i> Add Client</a>
	<?php 
	if(isset($_GET['alert'])){
		if(($_GET['alert']) == "success"){
			echo alertCreator("New client added!", "success");
		}	
	}
	if(isset($deleteAlert)){
		echo $deleteAlert;
	}
	if(isset($rm_result)){
		if($rm_result){
		echo alertCreator("Client removed!", "danger");
	}
}
	?>
	<table class="table table-bordered">
	  <thead>
		<tr>
		  <th scope="col">Name</th>
		  <th scope="col">Email</th>
		  <th scope="col">Phone</th>
		  <th scope="col">Address</th>
		  <th scope="col">Company</th>
		  <th scope="col">Notes</th>
		  <th scope="col">Edit</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
	  
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>" . $row['name'] . '</td>' . '<td>' . $row['email'] . '</td>'. '<td>' . $row['phone'] . '</td>'. '<td>' . $row['address'] . '</td>' . '<td>' . $row['company'] . '</td>'. '<td>' . $row['notes'] . '</td>' . '<td width="120px;">' . '<a href="edit.php?id='. $row['id'].'" class="btn btn-primary"><i class="fas fa-edit"></i></a><a href="clients.php?rmid='. $row['id'].'" class="btn btn-danger ml-2"><i class="fas fa-trash-alt"></i></a>' . '</td>' . '</tr>';
			}	
		}else{
			//nothing in the database
			echo alertCreator("You have no clients!","warning");
		}
	  ?>		
	  </tbody>
	</table>
</div>

<?php 
include "includes/footer.php";
?>
<script>
	$('.close').click(function(event) {
		window.location = "clients.php";
	});
	
</script>
</body>

</html>