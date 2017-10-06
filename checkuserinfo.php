<?php
include('classes/Login.php');
$userid=Login::isLoggedin();
$user2search=$_POST['username'];
if(DB::query('SELECT id FROM user WHERE username=:username',array(':username'=>$user2search))){
	$user2search_id=DB::query('SELECT id FROM user WHERE username=:username',array(':username'=>$user2search))[0]['id'];
	if(DB::query('SELECT groupid FROM groupmembers WHERE memberid=:memberid',array(':memberid'=>$userid))){
		$usergroupids=DB::query('SELECT groupid FROM groupmembers WHERE memberid=:memberid',array(':memberid'=>$userid));
		if(DB::query('SELECT groupid FROM groupmembers WHERE memberid=:memberid',array(':memberid'=>$user2search_id))){
			$user2searchgroups_ids=DB::query('SELECT groupid FROM groupmembers WHERE memberid=:memberid',array(':memberid'=>$user2search_id));
			foreach ($usergroupids as $id1) {
				foreach ($user2searchgroups_ids as $id2) {
					if($id1['groupid']==$id2['groupid']){
						//echo 'Success!';
						$username=DB::query('SELECT username FROM user WHERE id=:id',array(':id'=>$user2search_id))[0]['username'];
						$dob=DB::query('SELECT dob FROM user WHERE id=:id',array(':id'=>$user2search_id))[0]['dob'];
						$gender=DB::query('SELECT gender FROM user WHERE id=:id',array(':id'=>$user2search_id))[0]['gender'];
						$language=DB::query('SELECT language FROM user WHERE id=:id',array(':id'=>$user2search_id))[0]['language'];
						$country=DB::query('SELECT country FROM user WHERE id=:id',array(':id'=>$user2search_id))[0]['country'];
						switch ($gender) {
						    case 0:
						    	$gender='Male';
						        break;
						    case 1:
						        $gender='Female';
						        break;
						}

						switch ($language) {
						    case 0:
						    	$language='English';
						        break;
						    case 1:
						        $language='French';
						        break;
						}

						switch ($country) {
						    case 0:
						    	$country='Canada';
						        break;
						    case 1:
						        $country='USA';
						        break;
						}
						if(DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$user2search_id))){
							$url=DB::query('SELECT img_url FROM profile_image WHERE userid=:userid',array(':userid'=>$user2search_id))[0]['img_url'];
						}
						else{
							$url='https://www.w3schools.com/w3css/img_avatar3.png';
						}
						echo "<img src='".$url."' width='50%' height='100vh' class='img-circle'><br><br><table style='width: 100%''><tr><td>Name:</td><td>".$username."</td></tr><tr><td>Date of Birth:</td><td>".$dob."</td></tr><tr><td>Gender:</td><td>".$gender."</td></tr><tr><td>Country:</td><td>".$country."</td></tr><tr><td>Language:</td><td>".$language."</td></tr></table><hr>";
						exit();
					}
				}		
			}

		}
		else{
				echo 0;
		}
	}
}
else{
	echo 0;
}










?>