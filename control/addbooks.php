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
$bookname = $_POST['txtbname'];
$author = $_POST['txtbauthor'];
$publisher = $_POST['txtbpublisher'];
$category = $_POST['selectcategory'];
$IBNS = $_POST['txtIBNS'];
$page = $_POST['txtbpage'];
$year = $_POST['txtbyear'];
$amount = $_POST['txtbamount'];
$price = $_POST['txtbprice'];






$db1->addbooks($bookname,$price,$author,$publisher,$category,$IBNS,$page,$year,$amount,$newname);
}
?>