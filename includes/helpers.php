
<?php

function returnErrors($errors, $field){
	$errormessage = '';
	if(isset($errors[$field]) && !empty($campo)){
		$errormessage = "<div class='alert alert-error'>" . $errors[$field] . "</div>";
	}
	return $errormessage;
}


function sessionDeleteErrors(){
	$_SESSION['errors'] = null;
	$delete = session_unset();
	return $delete;
}

function sessionDeleteUserSaved(){
	$_SESSION['usersaved'] = null;
	$delete = session_unset();
	return $delete;
}


?>
