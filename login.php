<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

require('./lib/init.php');
if(empty($_POST)) {
    require(ROOT . '/view/front/login2.html');
} else {
    $user['name'] = $_POST['name'];
    $user['password'] = $_POST['password'];
    //$user['password'] = cCode(addslashes($_POST['password']))
    //print($user);exit;
    //echo $user['name'];exit;


    //$sql = "select * from user where name='$user[name]' and password='$user[password]'";
    $sql = "select * from user where name='$user[name]'";
    $row = mGetRow($sql);
    //print_r($row);exit();
    if(!$row) {
        echo 0;
    } else {
        //echo cCode(addslashes($user['password'])). ' '.$row['password'];exit;
        //if(md5($user['password'].$row['salt']) === $row['password']){
        if(cCode(addslashes($user['password'])) === $row['password']){
            setcookie('name' , $user['name']);
            setcookie('ccode' , cCode($user['name']));
            //header('Location: artlist.php');
            echo 1;
        } else {
            echo 2;
        }
    }
     close();
}

?>