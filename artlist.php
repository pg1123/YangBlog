<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/
require('./lib/init.php');

/*if(!acc()) {
	//error('请登录');
	header('Location: login.php');
}*/

$sql = "select art_id,title,pubtime,comm,catname from art left join cat on art.cat_id=cat.cat_id";
$arts = mGetAll($sql);
//print_r($arts);exit();

include(ROOT . '/view/admin/artlist.html');


?>