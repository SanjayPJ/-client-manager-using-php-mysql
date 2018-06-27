<?php

//here we create manual functions
//clean the form to prevent injections

//mysqli_real_escape_string()


function validateFormData($formData){
	return mysqli_real_escape_string($formData);
}

function alertCreator($message){
	return "<div class='alert alert-danger'>" . $message . "<div>";
}

?>