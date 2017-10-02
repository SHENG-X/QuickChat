<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
if(DB::query('SELECT group_name FROM groups WHERE group_name=:group_name',array(':group_name'=>$_POST['groupname']))){
	//check if user is already in the group(no repeated group adding)
	$groupid=DB::query('SELECT id FROM groups WHERE group_name=:group_name',array(':group_name'=>$_POST['groupname']))[0]['id'];
	if(!DB::query('SELECT id FROM groupmembers WHERE groupid=:groupid AND memberid=:memberid',array(':groupid'=>$groupid,':memberid'=>$userid))){
		DB::query('INSERT INTO groupmembers(groupid,memberid) VALUES(:groupid,:memberid)',array(':groupid'=>$groupid,':memberid'=>$userid));
			echo 'Success!';
	}
	else{
		echo 'Already A member of the group';
	}
}
else{
	echo 0;
}
?>