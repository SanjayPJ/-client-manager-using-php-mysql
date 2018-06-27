<?php

if(!isset($_GET['id'])){
    header("Location: clients.php");
}

$title = "Edit";
session_start();

include 'includes/header.php';

include 'includes/connection.php';

$id = $_GET['id'];

$query = "SELECT * FROM clients WHERE id='$id'";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
        $company = $row['company'];
        $notes = $row['notes'];
    }
}


if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($connection,  $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $company = mysqli_real_escape_string($connection, $_POST['company']);
    $notes = mysqli_real_escape_string($connection, $_POST['notes']);

    $query = "UPDATE clients SET name='$name',email='$email',phone='$phone',address='$address',company='$company',notes='$notes' WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if($result){
      header("Location: clients.php?ualert=success");
    }else{
      echo mysqli_error($connection);
    }
}

?>

<style>

form{
border: 1px solid #ebebeb;
padding: 10px;
}

</style>
</head>

<body>

<div class="container pb-4">
  <h2 class="pt-3"><i class="fas fa-user-edit"></i> Edit Client</h2>
  <form class="mt-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$id";?>" method="post">
    <div class="row mt-2">
      <div class="col">
        <label for="form_name">Name*</label>
        <input name="name" type="text" class="form-control" id="form_name" required="required" value="<?php echo $name; ?>">
      </div>
      <div class="col">
        <label for="form_email">Email*</label>
        <input name="email" type="email" class="form-control" id="form_email" required="required" value="<?php echo $email; ?>">
      </div>
      <div class="w-100"></div>
      <div class="col pt-1">
        <label for="form_phone">Phone</label>
        <input name="phone" type="text" class="form-control" id="form_phone" value="<?php echo $phone; ?>">
      </div>
      <div class="col pt-1">
        <label for="form_address">Address</label>
        <input name="address" type="text" class="form-control" id="form_address" value="<?php echo $address; ?>">
      </div>
      <div class="w-100"></div>
      <div class="col pt-1">
        <label for="form_name">Comapany</label>
        <input name="company" type="text" class="form-control" id="form_name" value="<?php echo $company; ?>">
      </div>
      <div class="col pt-1">
        <label for="form_phone">Notes</label>
        <textarea name="notes" id="" cols="30" rows="5" class="form-control"><?php echo $notes; ?></textarea>
      </div>
    </div>
    <a href="<?php echo "clients.php";?>" class="btn btn-dark mt-4">Cancel</a>
    <button class="btn btn-success mt-4 float-right" name="submit"><i class="fas fa-user-edit"></i> Update</button>
  </form>
</div>

<?php 
include "includes/footer.php";
?>

</body>

</html>