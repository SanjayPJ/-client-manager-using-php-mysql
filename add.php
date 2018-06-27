<?php

session_start();
if (empty($_SESSION['loggedName'])) {
header("Location: index.php");
}
$title = "Add";
include 'includes/connection.php';
include 'includes/header.php';

if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($connection,  $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$phone = mysqli_real_escape_string($connection, $_POST['phone']);
$address = mysqli_real_escape_string($connection, $_POST['address']);
$company = mysqli_real_escape_string($connection, $_POST['company']);
$notes = mysqli_real_escape_string($connection, $_POST['notes']);

$query = "INSERT INTO clients ( name, email, phone, address, company, notes ) VALUES ( '$name', '$email', '$phone', '$address', '$company', '$notes' )";
$result = mysqli_query($connection, $query);

if($result){
  header("Location: clients.php?alert=success");
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
  <h2 class="pt-3"><i class="fas fa-user-plus"></i> Add Client</h2>
  <form class="mt-4" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="row mt-2">
      <div class="col">
        <label for="form_name">Name*</label>
        <input name="name" type="text" class="form-control" id="form_name" required="required">
      </div>
      <div class="col">
        <label for="form_email">Email*</label>
        <input name="email" type="email" class="form-control" id="form_email" required="required">
      </div>
      <div class="w-100"></div>
      <div class="col pt-1">
        <label for="form_phone">Phone</label>
        <input name="phone" type="text" class="form-control" id="form_phone">
      </div>
      <div class="col pt-1">
        <label for="form_address">Address</label>
        <input name="address" type="text" class="form-control" id="form_address">
      </div>
      <div class="w-100"></div>
      <div class="col pt-1">
        <label for="form_name">Comapany</label>
        <input name="company" type="text" class="form-control" id="form_name">
      </div>
      <div class="col pt-1">
        <label for="form_phone">Notes</label>
        <textarea name="notes" id="" cols="30" rows="5" class="form-control"></textarea>
      </div>
    </div>
    <a href="<?php echo "clients.php";?>" class="btn btn-dark mt-4">Cancel</a>
    <button class="btn btn-success mt-4 float-right" type="submit" name="submit"><i class="fas fa-user-plus"></i> Add client</button>
  </form>
</div>

<?php
include "includes/footer.php";
?>

</body>

</html>