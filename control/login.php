<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_POST['txtusername'])){
$user = $_POST['txtusername'];
$pass = $_POST['txtpassword'];
;



$db1->checkLogin($user,$pass);
}else{
    echo "error";
}
?>