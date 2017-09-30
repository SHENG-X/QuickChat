<?php
include('classes/Login.php');
$uid=Login::isLoggedin();
if(DB::query('SELECT group_name FROM groups WHERE group_name=:group_name',array(':group_name'=>$_POST['groupname']))){
	echo 0;
}
else{
	DB::query('INSERT INTO groups(group_name,owner_id) VALUES(:group_name,:ownerid)',array(':group_name'=>$_POST['groupname'],':ownerid'=>$uid));
	$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$_POST['groupname']))[0]['id'];
	DB::query('INSERT INTO groupmembers(groupid,memberid) VALUES(:groupid,:memberid)',array(':groupid'=>$groupid,':memberid'=>$uid));
	echo 1;
}
?>