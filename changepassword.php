<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
if(password_verify($_POST['oldpassword'],DB::query('SELECT password FROM user WHERE id=:id',array(':id'=>$userid))[0]['password'])){
		DB::query('UPDATE user SET password=:password WHERE id=:id',array(':password'=>password_hash($_POST['newpassword'],PASSWORD_BCRYPT),':id'=>$userid));
		echo 'Password Changed!';
	
}
else{
	echo 'Orginal password wrong!';
}
?>