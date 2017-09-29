<?php
include('classes/DB.php');
$userid=$_POST['userid'];
$password=$_POST['password'];
DB::query('UPDATE user SET password=:password WHERE id=:id',array(':password'=>password_hash($password,PASSWORD_BCRYPT),':id'=>$userid));
echo 'Success!';
?>