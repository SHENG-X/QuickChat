<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
//this page kick all users out if logoutall is selected
echo "Retry:500\n";
include('classes/Login.php');
if(Login::isLoggedin()){
	echo "data:1\n\n";
 }
 else{
 	echo "data:0\n\n";
}
flush();
?>