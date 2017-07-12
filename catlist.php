<meta charset="utf8">
<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/
//连接数据库
$conn = mysqli_connect('localhost' , 'root' , '123456' , 'blog');
mysqli_query($conn,'set names utf8');

$sql = "select * from cat";
$rs = mysqli_query($conn,$sql);
$cat = array();
while($row = mysqli_fetch_assoc($rs)) {
	$cat[] = $row;
}
//print_r($cat);

require('./view/admin/catlist.html');

?>