<?php
include('classes/DB.php');
if(DB::query('SELECT * FROM vcode WHERE code=:code',array(':code'=>sha1($_POST["code"])))){
	$time=DB::query('SELECT code_ini FROM vcode WHERE code=:code',array(':code'=>sha1($_POST["code"])))[0]['code_ini'];
	$date =strtotime(Date('Y-m-d H:i:s'));
	$time=strtotime(Date($time));
	//$timediff is the seconds past from original token set from now
	$timediff = $date-$time;
	//check if token expired	
	if($timediff>300){
		DB::query('DELETE FROM vcode WHERE code=:code',array(':code'=>sha1($_POST['code'])));
		echo $timediff;
	}
	if($timediff<300){
		if($_POST['userid']==DB::query('SELECT userid FROM vcode WHERE userid=:userid AND code=:code',array(':userid'=>$_POST['userid'],':code'=>sha1($_POST['code'])))[0]['userid']){
			DB::query('DELETE FROM vcode WHERE code=:code AND userid=:userid ',array(':code'=>sha1($_POST['code']),':userid'=>$_POST['userid']));
			echo 1;
	}
}
}
else{
	echo 'Invalid Code!';
	//*n�r��T�>�a1�=f� Զ�s��hΩ��� �1B8�#����צ��9�P��gx���s����1^�P
	//�J�~A����΄?�:�L)@K!����]����3#���l�!���'W{ojPe���
}
?>
