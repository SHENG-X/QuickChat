<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
if(DB::query('SELECT group_name FROM groups WHERE group_name=:group_name',array(':group_name'=>$_POST['groupname']))){
	//check if user is already in the group(no repeated group adding)
	echo 'Allowed to add';
}
else{
	echo 0;
}
?>