<?php
include('classes/Login.php');
$url=$_POST['url'];
$userid=Login::isLoggedin();
if(getimagesize($url)){
	if(!DB::query('SELECT userid FROM profile_image WHERE userid=:userid',array(':userid'=>$userid))){
	    DB::query('INSERT INTO profile_image(img_url, userid) VALUES(:img_url,:userid)',array(':img_url'=>$url,':userid'=>$userid));
	}else{
	    DB::query('UPDATE profile_image SET img_url=:img_url WHERE userid=:userid',array(':img_url'=>$url,':userid'=>$userid));
	}
	    echo 1;
	}
	else{
	    echo 2;
}
?>
