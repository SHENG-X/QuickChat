<?php
include('classes/Login.php');
if(Login::isLoggedin()){
	$userid=Login::isLoggedin();
$username=DB::query('SELECT username FROM user WHERE id=:id',array(':id'=>$userid))[0]['username'];
$dob=DB::query('SELECT dob FROM user WHERE id=:id',array(':id'=>$userid))[0]['dob'];
$gender=DB::query('SELECT gender FROM user WHERE id=:id',array(':id'=>$userid))[0]['gender'];
$language=DB::query('SELECT language FROM user WHERE id=:id',array(':id'=>$userid))[0]['language'];
$country=DB::query('SELECT country FROM user WHERE id=:id',array(':id'=>$userid))[0]['country'];


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

echo "<table style='width: 100%''><tr><td>Name:</td><td>".$username."</td></tr><tr><td>Date of Birth:</td><td>".$dob."</td></tr><tr><td>Gender:</td><td>".$gender."</td></tr><tr><td>Country:</td><td>".$country."</td></tr><tr><td>Language:</td><td>".$language."</td></tr></table>";
}
else{
	echo "<script>alert('Connection Error');</script>";
}

?>