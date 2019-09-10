<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Store</title>
  <link rel="stylesheet" href="../view/css/login_register.css">
</head>

<body class="align">

  <div class="site__container">

    <div class="grid__container">

      <form action="../control/register.php" method="POST" class="form form--login" enctype="multipart/form-data">

        <div class="form__field">
          <label style="background:#33FF00" class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input style="background:#99FF66" name="txtusername" id="login__username" type="text" class="form__input" placeholder="Username"  required>
        </div>

        <div class="form__field">
          <label style="background:#CC33FF" class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input style="background:#CC99FF" name="txtpassword" id="login__password" type="password" class="form__input" placeholder="Password"  required>
        </div>

        <div class="form__field">
          <label style="background:#33FFFF" class="fontawesome-user" for="login__fname"><span class="hidden">First Name</span></label>
          <input style="background:#CCFFFF" name="txtfname" id="login__fname" type="text" class="form__input" placeholder="Frist Name"  required>
        </div>

        <div class="form__field">
          <label style="background:#FF9999" class="fontawesome-user" for="login__lname"><span class="hidden">Last Name</span></label>
          <input style="background:#FFCCFF" name="txtlname" id="login__lname" type="text" class="form__input" placeholder="Last Name"  required>
        </div>
        

    
    <input type="file" name="img" id="img">
  
<br>
<br>
<div class="form-check" style="text-align:left;padding-left:90px">

  <input class="form-check-input" type="radio" name="statususer" id="exampleRadios1" value="USER" checked>
  USER
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input class="form-check-input" type="radio" name="statususer" id="exampleRadios2" value="ADMIN">
  ADMIN
</div>



        
 
<br>

        <div class="form__field">
          <input type="submit" value="Register">
        </div>

      </form>

      

    </div>

  </div>

</body>
</html>