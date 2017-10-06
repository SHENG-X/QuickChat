<?php
include('classes/Login.php');
$url=$_POST['url'];
$userid=Login::isLoggedin();
if(getimagesize($url)){
if(!DB::query('SELECT id FROM profile_image WHERE id=:id',array(':id'=>$userid))){
    DB::query('INSERT INTO profile_image(img_url, userid) VALUES(:img_url,:userid)',array(':img_url'=>$url,':userid'=>$userid));
}else{
    DB::query('UPDATE profile_image SET img_url=:img_url WHERE id=:id',array(':img_url'=>$url,':id'=>$userid));
}
    echo 1;
}
else{
    echo 2;
}
?>
