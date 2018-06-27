<?php

$server = "localhost";
$database_username = "root";
$database_password = "";
$database_name = "db_client_address_book";

$connection = mysqli_connect($server, $database_username, $database_password, $database_name);

if(!$connection){
	die("Database connection failed! <br>" . mysqli_connect_error());
}

?>