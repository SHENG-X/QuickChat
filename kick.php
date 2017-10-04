<?php
//this page kick all users out if logoutall is selected
include('classes/Login.php');
if(Login::isLoggedin()){
	echo 1;
 }
 else{
 	echo 0;
}

?>