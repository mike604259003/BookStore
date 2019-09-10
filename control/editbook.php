<?php
include('../model/function.php');

$db1 = new ManageDB();
$date = date("d-m-Y");
$img= $_FILES['imagebook'];

if($img <> '') { 
$path="../view/images/";    
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['imagebook']['name']);
    
    $newname = time().'-'.$newname;
    $path_copy=$path.$newname;
    $path_link="images/".$newname;

    move_uploaded_file($_FILES['imagebook']['tmp_name'],$path_copy);
$id = $_GET['B_ID'];
$bookname = $_POST['txtnamebook'];
$author = $_POST['txtauthor'];
$publisher = $_POST['txtpublisher'];
$category = $_POST['txtcategory'];
$IBNS = $_POST['txtisbn'];
$page = $_POST['txtpage'];
$year = $_POST['txtyear'];
$amount = $_POST['txtamount'];
$price = $_POST['txtprice'];


$db1->editbooks($bookname,$price,$author,$publisher,$category,$IBNS,$page,$year,$amount,$id,$newname);
}
?>