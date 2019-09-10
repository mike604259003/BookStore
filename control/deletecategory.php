<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_GET['ca_id'])){
$id = $_GET['ca_id'];

;



$db1->deletecategory($id);
}else{
    echo "error";
}
?>