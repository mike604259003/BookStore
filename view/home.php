<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <title>Book Store</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Maven+Pro"rel="stylesheet'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/manageinfo2.css">
<link rel="stylesheet" href="css/card.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.boxxx{
  height:490px;
  overflow:auto;
}
</style>
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
        <a href="home.php?CID=<?php echo $id ?>"><i class="fa fa-book" aria-hidden="true"></i> <span>Home</span></a>
				</li>
				<li>
					<a href="cart.php?C_ID=<?php echo $id ?>"><i class="fa fa-code" aria-hidden="true"></i> <span>Cart</span></a>
                </li>
                
                <li>
					<a href="changepassword.php?C_ID=<?php echo $id ?>"><i class="fa fa-code" aria-hidden="true"></i> <span>Change Password</span></a>
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
        <?php 
        
       
        $sql1 = "select * from category";
        $query1 = $conDB->prepare($sql1);
        $query1->execute();
       
        ?>
       
		<div class="container" style="margin-top:350px">
      <!-- Button trigger modal -->
      <div>
  
        

  <h3 style="margin-top:-250px">Books</h3>
  <?php
  
  $SQLs = "SELECT * from category";
  
	$Querys = $conDB->prepare($SQLs);
  $Querys->execute();	
  $x=1;
  while ($Results = $Querys->fetch(PDO ::FETCH_ASSOC)){
    
  ?>
<div class="boxxx">

		<?php echo $Results['ca_name']?>
<div class="card-wrap<?php echo $x ?>">


  <?php
  $SQL = "SELECT B_ID,B_name,B_Price,B_author,B_publisher,ca_name,B_ISBN,B_numberpage,B_year,B_amounta,B_pic from book,category where book.B_category_id = category.ca_id and ca_name = '".$Results['ca_name']."'";
  
	$Query = $conDB->prepare($SQL);
  $Query->execute();
  
	while($Result = $Query->fetch(PDO ::FETCH_ASSOC)){
	?>
  
  
	<a class="card" href="detailbook.php?B_ID=<?php echo $Result['B_ID'] ?>&C_ID=<?php echo $id ?>" target="_Blank" style="background-image: url('../view/images/<?php echo $Result['B_pic'] ?>');">
    <div class="card__overlay"></div>
    <div class="card__info">
      <div style="font-size: 0.9rem;" class="card__title"><?php echo $Result['B_name'] ?></div>
      <div style="font-size: 0.7rem;" class="card__text"><?php echo $Result['B_Price'] ?> บาท</div>
    </div></a>

   
   
	
<?php 

}
	
?>
 </div>	

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
  </div>
  
  
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.1/flickity.pkgd.js'></script>

<script  src="js/manageinfo.js"></script>
<script  src="js/card.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
