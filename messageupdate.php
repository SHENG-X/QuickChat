<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
$group=$_POST['group'];
$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$group))[0]['id'];
$allmessage=DB::query('SELECT * FROM chatroom,user WHERE groupid=:groupid AND user.id=chatroom.userid',array(':groupid'=>$groupid));
foreach($allmessage as $i){
	if($i['userid']==$userid){
	echo "<div class=\"media\" style=\"width: 60%;position: relative;left:40%;\"> <div class=\"media-body\"><h4 class=\"media-heading\">".$i['username']."<small><i style='font-size:9px'> (".$i['time'].")</i></small></h4><hr style='margin:0px;'><p>".$i['message']."</p></div><div class=\"media-left\"><img class='img-circle' src=\"https://www.w3schools.com/w3css/img_avatar3.png\" class=\"media-object\" style=\"width:45px\"></div></div>";
		}
	else{
	echo "<div class=\"media\" style=\"width: 60%\"> <div class=\"media-left\"><img class='img-circle' src=\"https://www.w3schools.com/w3css/img_avatar3.png\" class=\"media-object\" style=\"width:45px\"></div><div class=\"media-body\"><h4 class=\"media-heading\">".$i['username']."<small><i style='font-size:9px'> (".$i['time'].")</i></small></h4><hr style='margin:0px;'><p>".$i['message']."</p></div></div>";
}
}
?>