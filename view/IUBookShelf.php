<?php

session_start();
if(isset($_SESSION['username']))
	$user =  $_SESSION['username'];
else 
$user = "Guest";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../bootstrap-3.1.1/docs/assets/ico/IU_Logo.ico">

    <title>IU Book Shelf</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../bootstrap-3.1.1/docs/examples/carousel/carousel.css" rel="stylesheet">
	<style>
	.navbar-nav > li{
	margin-left:30px;
	margin-right:30px;
	}
	</style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand" href="IUBookShelf.php">IU Book Shelf</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="User.php"><span class="glyphicon glyphicon-user"></span>    <?php echo $user;?></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                
				<?php
				if($user == "Guest"){?>
				<li><a href="Login.php">Sign In</a></li>
				<?php
				}else {?>
				<li><a href="Logout.php"><span class="glyphicon glyphicon-off"></span>  Sign Out</a></li>
				<?php
				}
				?>
				<li>
				</li>

				<!-- Login form dropdown ends -->
				
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:Buy Some Books" alt="Buy books">
          <div class="container">
            <div class="carousel-caption">
              <h1>Buy Some Books</h1>
              <h2><p>Hey, wanna buy books cheap? Search here. Search for book you need and we could find the appropriate seller for you.</p></h2>
              <p><a class="btn btn-lg btn-success" href="BuyBooks.php" role="button"name="buy" id ="save">Let's Buys</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:Sell Some Books" alt="Sell books">
          <div class="container">
            <div class="carousel-caption">
              <h1>Sell Some Books</h1>
              <h2><p>Hey, wanna get rid of old books? help needful. Sell books here at rate you quote. Necessary buyer may contact you.</p></h2>
              <p><a class="btn btn-lg btn-danger" href="SellBooks.php" role="button">Let's Sell</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Book1</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Book2</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" data-src="holder.js/140x140" alt="Generic placeholder image">
          <h2>Book3</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      <!-- START THE FEATURETTES -->
      <hr class="featurette-divider">
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
		$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
		});  
		function raiseLoginError(){
			alert("Wrong username or password, Please try again!!!");
		}
		
		$(document).ready(function() {
			$("#buy").click(function() {
				alert("gere iasjfbka");
    });
});
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	<script src="../bootstrap-3.1.1/js/modal.js"></script>
	
	<!-- script below submits Registration form contents to process.php and shows the processed results in the 'registerModal' div -->
	<script>
		/*
		$(function() {
			$("#doRegister").click(function() {
			var username = $("#user_name").val();
			var fname = $("#first_name").val();
			var lname = $("#last_name").val();
			var email = $("#usr_email").val();
			var password = $("#pwd").val();
			var address = $("#address").val();
			var phoneno = $("#phoneno").val();
			var dob = $("#dob").val();
			$.ajax({
				url: 'process.php',
				data: "data1=" + username,
				//cache: false,
				//data:{user:username, fnam:fname},//, lname:lname, email:email, password:password, address:address, phoneno:phoneno, dob:dob},
				success: function(data){
					alert("in success "+data);
					location.reload(true);							// Load the content in to the page.
				},
				error: function(data) {
					alert("in error"+data);
				}
			});
		});
		}); */
		
		
	</script>
  </body>
</html>
