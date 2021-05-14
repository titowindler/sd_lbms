<?php
session_start();

function setSession($id,$username,$usertype,$isActive){
	$_SESSION["user_id"] =$id;
	$_SESSION["user_username"] = $username;
	$_SESSION["user_type"]=$usertype;
	$_SESSION["user_isActive"]=$isActive;
	
}


function unsetSession(){
	session_unset();
	session_destroy(); 
}

?>