

 
 <!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
  <link rel="stylesheet" href="/css/adminstyle.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
	  
<?php
 //~ session_start();
if(!isset($_SESSION["userInfo"])){
?>
	<span style=" text-align: center; color: #FF0000;"> <br> <?php if(isset($_SESSION["successMessage"])){ echo $_SESSION["successMessage"];$_SESSION["successMessage"]='';
		} echo validation_errors(); ?></span> 
    <div class="login">
      <h1>Login to Web App</h1>
      <form name="loginForm" action="/dashboard/login" method="post" id="loginFormId" >

        <p><input type="text" name="user_name" value="" placeholder="Username or Email"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="">Click here to reset it</a>.</p>
    </div>
  </section>

</body>
</html>

<?php
}

else {
	
?>

   
<?php
 header("Location:/dashboard");
}?>

</div>
