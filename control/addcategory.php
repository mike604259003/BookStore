<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_POST['txtct'])){
$categoryname = $_POST['txtct'];

;



$db1->insertcategory($categoryname);
}else{
    echo "error";
}
?>