<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_POST['txteditname'])){
$id = $_GET['ca_id'];
$name = $_POST['txteditname'];
;



$db1->editcategory($name,$id);
}else{
    echo "error";
}
?>