<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['rnewpass'])){
$id = $_GET['C_ID'];
$opass = $_POST['oldpass'];
$npass = $_POST['newpass'];
$rnpass = $_POST['rnewpass'];






$db1->changepassword($id,$opass,$npass,$rnpass);
}else{
    echo "error";
}
?>