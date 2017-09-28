<?php
include('classes/DB.php');
if(isset($_POST['username'])&&isset($_POST['password'])&&$_POST['username']!=''&&$_POST['password']!=''){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(DB::query('SELECT password FROM user WHERE username=:username',array(':username'=>$username))){
		if(password_verify($password,DB::query('SELECT password FROM user WHERE username=:username',array(':username'=>$username))[0]['password'])){
			$userid=DB::query('SELECT id FROM user WHERE username=:username',array(':username'=>$username))[0]['id'];
			$cstrong=True;
			$token=bin2hex(openssl_random_pseudo_bytes(64,$cstrong));
			DB::query('INSERT INTO token(token,userid) VALUES(:token,:userid)',array(':token'=>sha1($token),':userid'=>$userid));
			setcookie('QUICKCHAT',$token,time()+1800);
			setcookie('QUICKCHAT_',1,time()+900);
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