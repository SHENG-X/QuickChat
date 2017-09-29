<?php
include('classes/Login.php');
$uid=Login::isLoggedin();
if(DB::query('SELECT id FROM user WHERE username=:username',array(':username'=>$_POST['username']))){
	$contactid=DB::query('SELECT id FROM user WHERE username=:username',array(':username'=>$_POST['username']))[0]['id'];
	if($uid==$contactid){
		echo 'You can not add yourself';
	}
	else{
		DB::query('INSERT INTO contacts(userid,contactid) VALUES (:userid,:friendid)',array(':userid'=>$uid,':friendid'=>$contactid));
		echo 'Success';
	}
}
else{
	echo 'Invalid Username!';

}

?>