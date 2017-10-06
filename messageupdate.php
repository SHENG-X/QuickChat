<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
$group=$_POST['group'];
$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$group))[0]['id'];
$allmessage=DB::query('SELECT * FROM chatroom,user WHERE groupid=:groupid AND user.id=chatroom.userid',array(':groupid'=>$groupid));
foreach($allmessage as $i){
	if($i['userid']==$userid){
		if(DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$userid))){
			$url=DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$userid))[0]['img_url'];
		}
		else{
			$gender=DB::query('SELECT gender FROM user WHERE id=:id',array(':id'=>$userid))[0]['gender'];
			if($gender==0){
				$url='https://www.w3schools.com/w3css/img_avatar3.png';
			}
			else{
				$url='https://www.w3schools.com/howto/img_avatar2.png';
			}
		}
		echo "<div class=\"media\" style=\"width:100%;\"> <div class=\"media-body\"><h4 class=\"media-heading\" style='text-align:right'>".$i['username']."<small><i style='font-size:9px'> (".$i['time'].")</i></small></h4><hr style='margin:0px;'><div style='background:blue;'><p style='width: 29vw;float:right;text-align:right'>".$i['message']."</p></div></div><div class=\"media-right\"><img class='img-circle' src='".$url."' class=\"media-object\" style=\"width:45px;height:45px\"></div></div>";
		}
	else{
		if(DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$i['userid']))){
			$url=DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$i['userid']))[0]['img_url'];
		}
		else{
			$gender=DB::query('SELECT gender FROM user WHERE id=:id',array(':id'=>$i['userid']))[0]['gender'];
			if($gender==0){
				$url='https://www.w3schools.com/w3css/img_avatar3.png';
			}
			else{
				$url='https://www.w3schools.com/howto/img_avatar2.png';
			}
		}
		echo "<div class=\"media\" style=\"width:100%;\"> <div class=\"media-left\"><img class='img-circle' src='".$url."' class=\"media-object\" style=\"width:45px;height:45px\"></div><div class=\"media-body\"><h4 class=\"media-heading\">".$i['username']."<small><i style='font-size:9px'> (".$i['time'].")</i></small></h4><hr style='margin:0px;'><p style='width: 30vw;text-align:left'>".$i['message']."</p></div></div>";
	}
}
?>