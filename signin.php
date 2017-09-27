<?php
include('classes/DB.php');
if(isset($_POST['username'])&&isset($_POST['password'])&&$_POST['username']!=''&&$_POST['password']!=''){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(DB::query('SELECT password FROM user WHERE username=:username',array(':username'=>$username))){
		if(password_verify($password,DB::query('SELECT password FROM user WHERE username=:username',array(':username'=>$username))[0]['password'])){
			echo 1;
		}
		else{
			echo 'Wrong password!';
		}
	}else{
		echo 'User does not exists!';
	}
}
else{
	echo 'Please fill your username and password!';
}
?>