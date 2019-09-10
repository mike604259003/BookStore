<?php
include('../model/function.php');

$db1 = new ManageDB();
if(isset($_GET['CD_Number'])){
$id = $_GET['CD_Number'];

;



$db1->deleteitem($id);
}else{
    echo "error";
}
?>