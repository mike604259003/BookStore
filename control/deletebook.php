<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_GET['B_ID'])){
$id = $_GET['B_ID'];

;



$db1->deletebook($id);
}else{
    echo "error";
}
?>