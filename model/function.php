<?php
include('../classConDB.php');


class manageDB{
		private $conDB;
		public function ManageDB(){
			$con= new ConDB();
			$con->connect();
			$this->conDB = $con->conn;
		}
		
		public function checkLogin($user,$pass){

			session_start();
			$passencode = sha1(md5($pass));
    		
			$strSQL = "SELECT * FROM userinformation WHERE UC_username = '".$user."'
			and UC_Password = '".$passencode."'  ";
			

			$objQuery = $this->conDB->prepare($strSQL);
			$objQuery->execute();
			$objResult = $objQuery->fetch(PDO ::FETCH_ASSOC);

	if(!$objResult)
	{
		echo "<script>";
		echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
	else
	{
			$_SESSION["UC_ID"] = $objResult["UC_ID"];
			$_SESSION["UC_status"] = $objResult["UC_status"];

			session_write_close();
			
			if($objResult["UC_status"] == "ADMIN")
			{
				header("location:../view/manageinfo.php?UC_ID=".$objResult['UC_ID']."");
			}
			else
			{
				header("location:../view/home.php?UC_ID=".$objResult['UC_ID']."");
			}
	}
	$this->conDB=null;

		}

	

	

	public function insertProduct($name,$price,$img){

		

		$sql = "insert into product (P_List,P_price,P_pic) values ('".$name."',".$price.",'".$img."');";

		$query = $this->conDB->query($sql);
			

			if($query === true)
	{
		echo "<script>";
		echo "alert(\"Add Successful\");"; 
		
		echo "</script>";
		header("location:view/view_home_admin.php");
	}
	else
	{
		echo "<script>";
		echo "alert(\" Add ล้มเหลว\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
	$this->conDB->close();
	}

	public function editproduct($name,$price,$img,$id){
		$sql = "UPDATE product ";

		$sql .=" SET P_pic = '".$img."' ";
		$sql .=" ,P_List = '".$name."' ";
		$sql .=" , P_price = ".$price." ";
		$sql .=" WHERE P_ID = ".$id." ";
		$query = $this->conDB->query($sql);
			

			if($query === true)
	{
		echo "<script>";
		echo "alert(\"Edit Successful\");"; 
		
		echo "</script>";
		header("location:view/view_home_admin.php");
	}
	else
	{
		echo "<script>";
		echo "alert(\" Edit ล้มเหลว\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
	$this->conDB->close();
	}


	public function register($name,$lname,$user,$pass,$image,$status){
        $sql2 = "insert into userinformation (UC_username,UC_password,UC_status) values ('".$user."','".$pass."','".$status."');";
        $queryr = $this->conDB->prepare($sql2);
        $queryr->execute();
        if($queryr == TRUE){
		$sql = "select * from userinformation where UC_username = '".$user."' ";
		$query = $this->conDB->prepare($sql);
		$query->execute();
		
		if($query){
		$result = $query->fetch(PDO ::FETCH_ASSOC);
		$sql1 = "INSERT INTO `customer` VALUES ('".$result['UC_ID']."','".$name."','".$lname."','".$image."')";
		
		$query1 = $this->conDB->prepare($sql1);
		$query1->execute();	

			if($query1 == true)
	{
		echo "<script>";
		echo "alert(\"Add Successful\");"; 
		
		echo "</script>";
		header("location:../view/login.php");
	}
	else
	{
		echo "<script>";
		echo "alert(\" Add ล้มเหลว\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
}
        }
	$this->conDB=null;

	}


	

	public function addProductToCart($userid,$pnumber,$pname){
		$sql ="select * from product where P_List = '".$pname."'";
		$query = $this->conDB->query($sql);

		$sql2 = "select * from customer where C_ID = ".$userid."";
		$query2 = $this->conDB->query($sql2);

		$result= $query->fetch_array();
		$result2= $query2->fetch_array();
		
		if($result2){

		$sql1 = "INSERT INTO `cart`(  `CA_CID`) VALUES (".$result2['C_ID'].")";
		$this->conDB->query($sql1);
			

		
			echo $userid;
		$sql3="select * from cart where CA_CID = ".$userid."";
		$query3 = $this->conDB->query($sql3);
		$result3 = $query3->fetch_array();
		if($result3){
			$sql4 ="INSERT INTO `cartdetail`(`CD_Number`, `CD_PID`, `CD_Amount`) VALUES (".$result3['CA_Number'].",".$result['P_ID'].",".$pnumber.")";
			$query4 = $this->conDB->query($sql4);
			echo $sql4;
			if($query4 === true )
				{
					echo "<script>";
					echo "alert(\"Add Successful\");"; 
					
					echo "</script>";
					header("location:view/view_home_user.php?UC_ID=".$userid."");
				}
				else
				{
					echo "<script>";
					echo "alert(\" Add ล้มเหลว\");"; 
					echo "window.history.back()";
					echo "</script>";
				}
		}
	
	
}
	$this->conDB->close();


		}



		public function addDetail($cnumber,$pid,$amount){

			$sql ="INSERT INTO `cartdetail`(`CD_Number`, `CD_PID`, `CD_Amount`) VALUES (".$cnumber.",".$pid.",".$amount.")";
			$query = $this->conDB->query($sql);
			$result = $query->fetch_array();
			if($result)
				{
					echo "<script>";
					echo "alert(\"Add Successful\");"; 
					
					echo "</script>";
					header("location:view/view_home_user.php?UC_ID=".$result['UC_ID']."");
				}
				else
				{
					echo "<script>";
					echo "alert(\" Add ล้มเหลว\");"; 
					echo "window.history.back()";
					echo "</script>";
				}
				$this->conDB->close();
			}

			public function insertcategory($ctname){
				$sql = "insert into category (ca_name) values ('".$ctname."')";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				
				if($query == TRUE){
					echo "<script>";
					echo "alert(\"Add Successful\");"; 
					echo "window.history.back()";
					echo "</script>";
				}

			} 

			public function deletecategory($id){
				$sql = "DELETE FROM category  WHERE ca_id = '".$id."' ";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				



	if($query == TRUE) { 
		echo "<script>";
		echo "alert(\"delete Successful\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
	

			} 

			public function editcategory($ca_name,$id){
				$sql = "update category set ca_name = '".$ca_name."' where ca_id = $id ";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				



	if($query == TRUE) { 
		echo "<script>";
		echo "alert(\"update Successful\");"; 
		echo "window.history.back()";
		echo "</script>";
	}
	

			} 

			public function addbooks($bname,$price,$author,$publisher,$category,$ISBN,$page,$year,$amount,$pic){
				$sql = "insert into book (B_name,B_Price,B_author,B_publisher,B_category_id,B_ISBN,B_numberpage,B_year,B_amounta,B_pic) values ('".$bname."','".$price."','".$author."','".$publisher."','".$category."','".$ISBN."','".$page."','".$year."','".$amount."','".$pic."') ";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				



	if($query == TRUE) { 
		echo "<script>";
		echo "alert(\"update Successful\");"; 
		echo "window.history.back()";
		echo "</script>";
		
	}
	

			} 

			public function deletebook($id){
				$sql = "DELETE FROM book  WHERE B_ID = '".$id."' ";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				



	if($query == TRUE) { 
		echo "<script>";
		echo "alert(\"delete Successful\");"; 
		echo "window.close()";
		echo "</script>";
		
	}
	

			} 


			public function editbooks($bookname,$price,$author,$publisher,$category,$IBNS,$page,$year,$amount,$id,$pic){
				$sql = "update book set B_name = '".$ca_name."', B_Price ='".$price."', B_author = '".$author."' , B_publisher = '".$publisher."', B_category_id ='".$category."', B_ISBN = '".$IBNS."',B_numberpage='".$page."',B_year = '".$year."',B_amounta = '".$amount."',B_pic = '".$pic."' where B_ID = $id ";
				$query = $this->conDB->prepare($sql);
				$query->execute();
				



	if($query == TRUE) { 
		echo "<script>";
		echo "alert(\"update Successful\");"; 
		echo "window.close()";
		echo "</script>";
		
	}
	

			} 


			public function addcart($cid,$bid,$amount){

				$sql1 = "select * from cart where CA_CID = $cid";
				$query1 = $this->conDB->prepare($sql1);
				$query1->execute();
				$result = $query1->fetch(PDO ::FETCH_ASSOC);
				if($result['CA_CID'] == NULL){

				$sql = "insert into cart (CA_CID) values ($cid)";
				$query = $this->conDB->prepare($sql);
				$query->execute();


				
				$sql2 ="insert into cartdetail values ('".$result['CA_Number']."','".$bid."','".$amount."')";
				$query2 = $this->conDB->prepare($sql2);
				$query2->execute();	
					
				}else{
				$sql2 ="insert into cartdetail values ('".$result['CA_Number']."','".$bid."','".$amount."')";
				$query2 = $this->conDB->prepare($sql2);
				$query2->execute();

				}

				if($query2 == TRUE){
					echo "<script>";
					echo "alert(\"update Successful\");"; 
					echo "window.close()";
					echo "</script>";
				}
			}



public function deleteitem($id){
	$sql = "delete from cartdetail where CD_PID = '".$id."'";
	$query = $this->conDB->prepare($sql);
	$query->execute();	

	if($query == TRUE){
		echo "<script>";
		echo "alert(\"update Successful\");"; 
		echo "window.location.reload(true);";
		echo "</script>";
	}
}


public function changepassword($id,$opass,$npass,$rnpass){
	$encode = sha1(md5($opass));
	$sql = "select * from userinformation where UC_ID = '".$id."' and UC_password = '".$encode."'";
	$query = $this->conDB->query($sql);

	
	 $encode1 = sha1(md5($npass));
	 $encode2 = sha1(md5($rnpass));

	if($result = $query->fetch(PDO ::FETCH_ASSOC)){
	
		if($encode1 == $encode2){
			$SQL ="update userinformation set UC_password = '".$encode1."' where UC_ID = '".$id."'";
			$QUERY = $this->conDB->query($SQL);
			
			if($QUERY == TRUE){
				echo "<script>";
				echo "alert(\"update Successful\");"; 
				
				echo "</script>";
				header("location:../view/home.php?UC_ID=".$id."");
			}else{
				echo "<script>";
				echo "alert(\"update Fail\");"; 
				echo "window.history.back()";
				echo "</script>";
				}
		
		}else{
			echo "<script>";
				echo "alert(\"update Fail\");"; 
				echo "window.history.back()";
				echo "</script>";
		}
	}else{
		echo "<script>";
				echo "alert(\"update Fail\");"; 
				echo "window.history.back()";
				echo "</script>";
	}
}





				
		}
	




?>