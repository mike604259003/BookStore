<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Store</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Maven+Pro"rel="stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/manageinfo3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .container2{
        margin-top:220px
    }
    
    div h3{
        margin:0px;
        margin-left:300px
    }
</style>
</head>
<body>
<?php 
        include('../classConDB.php');
        $con= new ConDB();
        $con->connect();
        $conDB = $con->conn;
        $id = $_GET['B_ID'];
        $sql = "select * from book where B_ID = '".$id."'";
        $query = $conDB->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO ::FETCH_ASSOC);

        $sql2 ="select * from category ";
        $query2 = $conDB->prepare($sql2);
        $query2->execute();

        $sql3 = "select * from category where ca_id = '".$result['B_category_id']."'";
        $query3 = $conDB->prepare($sql3);
        $query3->execute();
        $result3 = $query3->fetch(PDO ::FETCH_ASSOC);
        
        ?>


	 


        

		<div class="container2">
            <form action="../control/editbook.php?B_ID=<?php echo $result['B_ID']?>" method="post">
            <h3 style="color:red;font-size:20px">ชื่อหนังสือ :   <span style="color:#666666;font-size:16px"><input name="txtnamebook" style="width:300px" type="text" value="<?php echo $result['B_name'] ?>"></span></h3>
            <h3 style="color:red;font-size:20px">ผู้แต่ง :   <span style="color:#666666;font-size:16px"><input name="txtauthor" style="width:200px" type="text" value="<?php echo $result['B_author'] ?>"></span></h3>
            
            <h3 style="color:red;font-size:20px">สำนักพิมพ์ :   <span style="color:#666666;font-size:16px"><input name="txtpublisher" style="width:200px" type="text" value="<?php echo $result['B_publisher'] ?>"></span></h3>
            <br>
            <h3 style="color:red;font-size:20px">หมวดหมู่ :   <span style="color:#666666;font-size:16px">
    
    <select style="width:150px;position:fixed;top:318px;left:400px" name="selectcategory" class="form-control" id="exampleFormControlSelect1">
    <option value="<?php echo $result3['ca_id'];?>"><?php echo $result3['ca_name'];?></option>
     <?php
	while($result2 = $query2->fetch(PDO ::FETCH_ASSOC)){
	?>   
      <option value="<?php echo $result2['ca_id'];?>"><?php echo $result2['ca_name'];?></option>
    <?php }  ?>
    </select>
    
 
  
</span></h3><br>
            <h3 style="color:red;font-size:20px">ISBN :   <span style="color:#666666;font-size:16px"><input name="txtisbn" style="width:200px" type="text" value="<?php echo $result['B_ISBN'] ?>"></span></h3>
            <h3 style="color:red;font-size:20px">จำนวนหน้า :   <span style="color:#666666;font-size:16px"><input name="txtpage" style="width:50px" type="text" value="<?php echo $result['B_numberpage'] ?>"></span></h3>
            <h3 style="color:red;font-size:20px">ปี :   <span style="color:#666666;font-size:16px"><input name="txtyear" style="width:70px" type="text" value="<?php echo $result['B_year'] ?>"></span></h3>
            <h3 style="color:red;font-size:20px">จำนวน :   <span style="color:#666666;font-size:16px"><input name="txtamount" style="width:50px" type="text" value="<?php echo $result['B_amounta'] ?>"></span></h3>
            <h3 style="color:red;font-size:20px">ราคา :   <span style="color:#666666;font-size:16px"><input name="txtprice" style="width:50px" type="text" value="<?php echo $result['B_Price'] ?>"></span></h3>
            <br>
            <input type="file" name="imagebook" style="position:fixed;top:490px;left:720px">
              <button style="position:fixed;top:500px;right:800px" type="submit" class="btn btn-warning">แก้ไข</button>
            </form>
           
           

            
			
        </div>
        <img style="width:200px;height:250px;position:fixed;top:220px;right:450px" src="../view/images/<?php echo $result['B_pic'] ?>">
	 

     
     <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../control/deletebook.php?B_ID=<?php echo $result["B_ID"];?>';}"><button style="position:fixed;top:500px;right:700px" type="button" class="btn btn-danger">ลบ</button></a>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="js/manageinfo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>