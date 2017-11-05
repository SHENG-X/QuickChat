<?php
//echo $obj;
$command=$_POST['command'];
if(isset($command)){
	switch ($command) {
		case 'sigin':
			include('signin.php');
			break;

		case 'register':
			include('register.php');
			break;
	
		case 'signout':
			include('signout.php');
			break;

		case 'changepassword':
			include('changepassword.php');
			break;
			
		case 'changeprofileimage':
			include('upload.php');
			break;

		case 'create-a-group':
			include('creategroup.php');
			break;

		case 'addgroup':
			include('addgroup.php');
			break;

		case 'lookupuser':
			include('checkuserinfo.php');
			break;
		case 'leavegroup':
			include('leavegroup.php');
			break;
			
		case 'sendmessage':
			include('messagecontrol.php');
			break;
	}
}

?>