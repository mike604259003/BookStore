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

      <form action="../control/login.php" method="post" class="form form--login">

        <div class="form__field">
          <label style="background:#FF9999" class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
          <input style="background:#FFCCFF" name="txtusername" id="login__username" type="text" class="form__input" placeholder="Username" required>
        </div>

        <div class="form__field">
          <label style="background:#FF9999" class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
          <input style="background:#FFCCFF" name="txtpassword" id="login__password" type="password" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Sign In">
        </div>

      </form>

      <p class="text--center">Not a member? <a style="color:orange" href="register.php">Sign up now</a> <span class="fontawesome-arrow-right"></span></p>

    </div>

  </div>

</body>
</html>