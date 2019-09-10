<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Store</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Maven+Pro"rel="stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/manageinfo1.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<?php 
        include('../classConDB.php');
        $con= new ConDB();
        $con->connect();
        $conDB = $con->conn;
        $id = $_GET['UC_ID'];
        $sql = "select * from customer where C_ID = '".$id."'";
        $query = $conDB->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO ::FETCH_ASSOC);
        ?>
<!-- partial:index.partial.html -->
<div class="menu">
		<nav id="slide-menu" class="slide-menu">
			<img src='../view/images/<?php echo $result['C_pic'] ?>' width="100px" style="border-radius: 15px 50px;margin-left:50px">
            <h1 style="margin-left:50px">Hello, <?php echo $result['C_Name'] ?></h1>
			<ul>
				<li>
					<a href="managecategory.php?UC_ID=<?php echo $id ?>"><i class="fa fa-book" aria-hidden="true"></i> <span>Categorys</span></a>
				</li>
				<li>
					<a href="managebook.php?UC_ID=<?php echo $id ?>"><i class="fa fa-code" aria-hidden="true"></i> <span>Books</span></a>
        </li>
        <li>
					<a href="login.php"><i class="fa fa-code" aria-hidden="true"></i> <span>Logout</span></a>
				</li>
				
			</ul>

			
	        <section class="slide-menu-social">
	            <a href="https://www.facebook.com/profile.php?id=100009215760955" target="_blank" class="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
	            <a href="https://www.linkedin.com/in/leo-jaimesson-4523ba123/" target="_blank" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
	            <a href="https://twitter.com/leojaimesson" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	            <a href="https://github.com/leojaimesson" target="_blank" class="github"><i class="fa fa-github" aria-hidden="true"></i></a>
	        </section>
		</nav>		
	</div>
	
	 

	<div class="content">
		<div class="hamburguer" data-icon="hamburguer" id="hamburguer">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
        </div>
       

		<div class="container">
			<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="margin-left:100px">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../control/addcategory.php" method="POST">
  
  <div class="form-group">
    <label for="exampleInput">Category name</label>
    <input name="txtct" type="text" class="form-control" id="exampleInput" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      
    </div>
  </div>
</div>
<br>
<br>
<div style="margin-left:250px">
  <h3>Category</h3>
  <?php
  $sql = "SELECT * FROM category";
	$stmt = $conDB->prepare($sql);
	$stmt->execute();	
  ?>

	<?php
  $x=0;
	while($result = $stmt->fetch(PDO ::FETCH_ASSOC)){
	?>

  <div class="btn-group dropright">
  <button style="margin-left:50px" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $result['ca_name']?>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong<?php echo $x ?>">Edit</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../control/deletecategory.php?ca_id=<?php echo $result["ca_id"];?>';}">Delete</a>
  </div>
</div>
<div class="modal fade" id="exampleModalLong<?php echo $x ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle<?php echo $x ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle<?php echo $x ?>">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../control/editecategory.php?ca_id=<?php echo $result['ca_id'] ?>" method="POST">
  
  <div class="form-group">
    <label for="exampleInput">Category name</label>
    <input name="txteditname" type="text" class="form-control" id="exampleInput" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      
    </div>
  </div>
</div> 
  
<br>
<br>
	<br>
<?php 
$x++;
	}
?>
</div>

<?php 
$conn=null;
?>
			
		</div>
  </div>
  
  
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="js/manageinfo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>