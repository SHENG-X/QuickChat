<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
$groupnames=DB::query('SELECT group_name FROM groupmembers gm, groups g WHERE  gm.groupid=g.id AND memberid=:memberid',array(':memberid'=>$userid));
$groups=array();
foreach ($groupnames as $g) {
	array_push($groups,$g['group_name']);
}
echo implode(',', $groups);

?>