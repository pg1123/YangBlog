<meta charset="utf8">
<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

//cat_id
$cat_id = $_GET['cat_id'];
//echo $cat_id;

//连接数据库
$conn = mysqli_connect('localhost' , 'root' , '123456', 'blog');
mysqli_query($conn, 'set names utf8');

//检测 栏目id 是否为数字
//var_dump($cat_id);
if(!is_numeric($cat_id)) {
	echo '栏目不合法';
	exit();
}

//检测 栏目是否存在
$sql = "select count(*) from cat where cat_id=$cat_id";
$rs = mysqli_query($conn,$sql);
if(mysqli_fetch_row($rs)[0] == 0) {
	echo '栏目不存在';
	exit();
}

//检测栏目下是否有文章
$sql = "select count(*) from art where cat_id=$cat_id";
$rs = mysqli_query($conn,$sql);
if(mysqli_fetch_row($rs)[0] != 0) {
	echo '栏目下有文章,不能删除';
	exit();
}

//检测完毕,删除栏目
$sql = "delete from cat where cat_id=$cat_id";
if(!mysqli_query($conn,$sql)) {
	echo '栏目删除失败';
} else {
	echo '栏目删除成功';
}



?>