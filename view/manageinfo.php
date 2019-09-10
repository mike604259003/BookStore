<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Store</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Maven+Pro"rel="stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/manageinfo.css">
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
			<center><h1>Hello, <?php echo $result['C_Name'] ?></center>
            
			<center><p>You can manage categorys and manage books click menu please !</p></center>

			
		</div>
	</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="js/manageinfo.js"></script>

</body>
</html>