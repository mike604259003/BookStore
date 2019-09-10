<?php
include('../model/function.php');

$db1 = new ManageDB();
$fileupload = $_REQUEST['img'];
$date = date("d-m-Y");
$img= $_FILES['img'];

if($img <> '') { 
$path="../view/images/";    
    $remove_these = array(' ','`','"','\'','\\','/','_');
    $newname = str_replace($remove_these, '', $_FILES['img']['name']);
    
    $newname = time().'-'.$newname;
    $path_copy=$path.$newname;
    $path_link="images/".$newname;

    move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);

$user = $_POST['txtusername'];
$pass = sha1(md5($_POST['txtpassword']));
$name = $_POST['txtfname'];
$lname = $_POST['txtlname'];


$status = $_POST["statususer"];

$db1->register($name,$lname,$user,$pass,$newname,$status);
}
?>