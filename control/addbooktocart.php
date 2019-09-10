<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_GET['C_ID'])){
$id = $_GET['B_ID'];
$cid = $_GET['C_ID'];
$amount = $_POST['numamount'];




$db1->addcart($cid,$id,$amount);
}else{
    echo "error";
}
?>