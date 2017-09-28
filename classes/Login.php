<?php
include('DB.php');
class Login{
	public static function isLoggedin(){
	if(isset($_COOKIE['QUICKCHAT'])){
		if(DB::query("SELECT userid FROM token WHERE token=:token",array(':token'=>sha1($_COOKIE['QUICKCHAT'])))){
			$userid=DB::query("SELECT userid FROM token WHERE token=:token",array(':token'=>sha1($_COOKIE['QUICKCHAT'])))[0]['userid'];
			if(isset($_COOKIE['QUICKCHAT_'])){
				return $userid;
			}
			else{
				$strong=true;
				$token=bin2hex(openssl_random_pseudo_bytes(64,$cstrong));
				DB::query('INSERT INTO token(token, userid) VALUES(:token,:userid)',array(':token'=>sha1($token),':userid'=>$userid));
				DB::query('DELETE FROM token WHERE token=:token',array(':token'=>sha1($_COOKIE['QUICKCHAT'])));
				setcookie('QUICKCHAT',$token,time()+1800);
				setcookie('QUICKCHAT_',1,time()+900);
				return $userid;
			}	
		}
	}
	return false;
}
}
?>