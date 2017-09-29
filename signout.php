<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
if(isset($_POST['signoutall'])&&$_POST['signoutall']==1){
	DB::query('DELETE FROM token WHERE userid=:userid',array(':userid'=>$userid));
}else{
DB::query('DELETE FROM token WHERE token=:token',array(':token'=>sha1($_COOKIE['QUICKCHAT'])));
}
?>