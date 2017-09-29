<?php
include('classes/DB.php');
if(isset($_POST['email'])&&$_POST['email']!=''&&filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	if(DB::query("SELECT email FROM user WHERE email=:email",array(":email"=>$_POST['email']))){
		$userid=DB::query("SELECT id FROM user WHERE email=:email",array(":email"=>$_POST['email']))[0]['id'];
		$cstrong=true;
		$token=openssl_random_pseudo_bytes(64,$cstrong);
		$token=sha1($token);
		DB::query('INSERT INTO vcode(code,userid) VALUES(:code,:userid)',array(":code"=>sha1($token),":userid"=>$userid));
		//echo $userid;
		$data=array($userid,$token);
		echo implode(',,',$data);
	}
	else{
		echo "Email does not exists!";
	}

}
else{
	echo 'Please enter valid email!';
}

?>