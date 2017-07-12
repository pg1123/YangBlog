<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');
if(empty($_POST)) {
	require(ROOT . '/view/front/register.html');
} else {
	$user['name'] =addslashes($_POST['name']);
	$user['password'] = cCode(addslashes($_POST['password']));
	$user['email'] = addslashes($_POST['email']);
	$user['reg_date'] = date('Y-m-d h:i:s',time());
	//print($user);exit;

	if(!mExec('user' , $user)) {
		echo 0;
	} else {
		echo 1;
	}
	

}

?>