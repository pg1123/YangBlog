<meta charset="utf8">
<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/


$cat_id = $_GET['cat_id'];
//连接数据库
$conn = mysqli_connect('localhost' , 'root' , '123456', 'blog');;
mysqli_query($conn,'set names utf8');

//检测 栏目id 是否为数字
//var_dump($cat_id);
if(!is_numeric($cat_id)) {
	echo '栏目不合法';
	exit();
}

//检测 栏目是否存在
$sql = "select count(*) from cat where cat_id=$cat_id";
$rs = mysqli_query($conn, $sql);
if(mysqli_fetch_row($rs)[0] == 0) {
	echo '栏目不存在';
	exit();
}

if(empty($_POST)){
	$sql = "select catname from cat where cat_id=$cat_id";
	$rs = mysqli_query($conn, $sql);
	$cat = mysqli_fetch_assoc($rs);
	require('./view/admin/catedit.html');
} else {
	$sql = "update cat set catname='$_POST[catname]' where cat_id=$cat_id";
	if(!mysqli_query($conn, $sql)){
		echo '栏目修改失败';
	} else {
		echo '栏目修改成功';
	}
}


?>