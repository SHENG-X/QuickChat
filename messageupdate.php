<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
$group=$_POST['group'];
$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$group))[0]['id'];
$allmessage=DB::query('SELECT * FROM chatroom WHERE groupid=:groupid',array(':groupid'=>$groupid));
foreach($allmessage as $i){
	if($i['userid']==$userid){
	echo $i['message'].'---@@@@@---'.$i['time'].'<br>';
	}
	else{
		echo $i['message'].'-------'.$i['time'].'<br>';}
}

?>