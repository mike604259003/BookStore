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
        
        $cid= $_GET['C_ID'];
        
        ?>


	 <form action="../control/changepassword.php?C_ID=<?php echo $cid ?>" method="POST" style="margin-top:120px;margin-left:525px">
        <h1>Change Password</h1>
            <div class="form-group">
                <label for="oldpass">Old Password</label>
                <input type="password" id="oldpass" name="oldpass" class="form-control">
            </div>

            <div class="form-group">
                <label for="newpass">New Password</label>
                <input type="password" id="newpass" name="newpass" class="form-control">
            </div>

            <div class="form-group">
                <label for="rnewpass">Renew Password</label>
                <input type="password" id="rnewpass" name="rnewpass" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary">
            
     
     </form>
      <a href="home.php?UC_ID=<?php echo $cid ?>"><button class="btn btn-danger" style="margin-top:435px;margin-left:-190px">ยกเลิก</button></a>

        

		
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="js/manageinfo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>