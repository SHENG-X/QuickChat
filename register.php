<?php
include('classes/DB.php');
if(isset($_POST['username'])&&!empty($_POST['username'])){
	if(DB::query('SELECT username FROM user WHERE username=:username',array(':username'=>$_POST['username']))||!preg_match("/[a-zA-Z0-9_]/",$_POST['username'])||strlen($_POST['username'])<3||strlen($_POST['username'])>32){
		echo 0;
	}
	else{
		echo 1;
	}
}

if(isset($_POST['email'])&&!empty($_POST['email'])){
	if(DB::query('SELECT email FROM user WHERE email=:email',array(':email'=>$_POST['email']))){
		echo 'Email exist!';
	}
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		echo 'Please enter valid email!';
	}
	else{
		echo 1;
	}
}
if(isset($_POST['password'])&&!empty($_POST['password'])){
	if(strlen($_POST['password'])<6){
		echo 0;
	}
	else{
		echo 1;
	}
}
if(isset($_POST['dob-dd'])){
		$dd=$_POST['dob-dd'];
		$mm=$_POST['dob-mm'];
		if(empty($mm)){
			if(!is_numeric($dd)||$dd<1||$dd>31){
			echo 0;
		}
		else{
			echo 1;
		}
		}else{
			if($mm!=2){
				echo 1;
			}
			else if($dd>29){
				echo 0;
			}
		}
}
if(isset($_POST['dob-mm'])){
		$mm=$_POST['dob-mm'];
		if(!is_numeric($mm)||$mm<1||$mm>12){
			echo 0;
		}
		else if($mm==2&&$_POST['dob-dd']>29){
				echo 0;			
		}
		else{
				echo 1;
			}
}
if(isset($_POST['dob-yy'])){
		$yy=$_POST['dob-yy'];
		if(!is_numeric($yy)||$yy>date('Y')||$yy<1900){
			echo 0;
		}
		else{
			echo 1;
		}
}

if(isset($_POST['signup'])){
	 $username=$_POST['username2'];
     $password=$_POST['password2'];
     $email=$_POST['email2'];
     $dobdd=$_POST['dobdd'];
     $dobmm=$_POST['dobmm'];
     $dobyy=$_POST['dobyy'];
     $dateOfBirth =$dobyy."-".$dobmm."-".$dobdd;
     $gender=$_POST['gender'];
     $language=$_POST['language'];
     $country=$_POST['country'];
	if(DB::query("INSERT INTO user (username, password, email, dob, gender, language, country) VALUES (:username, :password, :email, :dob, :gender, :language, :country)",array(':username'=>$username,":password"=>password_hash($password,PASSWORD_BCRYPT),":email"=>$email,":dob"=>$dateOfBirth,":gender"=>$gender,":language"=>$language,":country"=>$country))){
	}
			echo 1;
}

?>
