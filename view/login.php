<?php
if(isset($_SESSION['username']))
	header("Location: IUBookShelf.php"); 
include '../model/Login.php';

	if(isset($_POST['submit'])){
	$login = new Login($_POST['username'] ,$_POST['password']);
	try{
	$var =$login->getData();
	}
	catch (Exception $e){
	$var = 0;
	$fail = 1;
	
	}
	if($var ){
		$user = $_POST['username'];
		session_start();
		$_SESSION['username'] = $user;
		echo "here in if";
		header("Location: IUBookShelf.php"); 
	}
	else
	echo "should be here";
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../bootstrap-3.1.1/docs/assets/ico/IU_logo.ico">

    <title>IUBookshelf LoginPage</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.1.1/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action = "login.php" method = "post" role="form">
        <h3 class="form-signin-heading">Sign in to IU Book Shelf</h3>
        <input type="text" class="form-control" placeholder="User name" name = "username" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name = "submit" >Sign in</button>
		<h5 class="text-muted">New to IUBookshelf ?</h5>
		<button class="btn btn-lg btn-success btn-block" type="submit" name = "submit" value ="signin">Create Account</button>
      </form>

	 
    </div> <!-- /container -->
	<hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
  </body>
</html>