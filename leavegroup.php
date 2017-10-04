<?php
include('classes/Login.php');
$groupname=$_POST['groupname'];
$userid=Login::isLoggedin();
//confirm if groupname exits

//confirm if user in the group

//if user in the group remove user from the group
if(DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$groupname))){
	$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$groupname))[0]['id'];
	if(DB::query('SELECT id FROM groupmembers WHERE memberid=:memberid AND groupid=:groupid',array(':memberid'=>$userid,':groupid'=>$groupid))){
		DB::query('DELETE FROM groupmembers WHERE memberid=:memberid AND groupid=:groupid',array(':memberid'=>$userid,':groupid'=>$groupid));
		echo 'Success!';
	}
	else{
		echo 'Forbidden!';
	}
}
else{
	echo 'Forbidden!';
}









?>