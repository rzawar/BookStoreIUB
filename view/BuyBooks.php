<?php
session_start();
if(!isset($_SESSION['username']))
	header("Location: login.php"); 
else
	$user = $_SESSION['username'];
?>
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
	#search{
	margin-left:460px;
	margin-top:50px;
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
                <li class="active"><a href="#"><?php echo $user;?></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
				<li><a href="Logout.php">Sign Out</a></li>
				<li>
				</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>
	
	<br>
	<br>
	<br>
	<div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row" id ="search">
        <div class="col-lg-4 col-centered">
          <h4>Search for books</h4>
		  <div class="input-group">
				<input type="text" class="form-control" placeholder="Search for books here ..." id="query" name="query" value=""></input>
				<div class="input-group-btn">
					<button type="button" class="btn btn-success" name = "search"><span class="glyphicon glyphicon-search"></span></button>
				</div>
		  </div>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	   <div class="container marketing">
       <div class="row">
        <div class="col-lg-4">
          <h2>Book1</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>Book2</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <h2>Book3</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	  </div>
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	<script>
	$(document).ready(function() {
		$("#search").click(function() {
		var searchQuery =  $("#query").val();
		//alert(searchQuery);
		$.ajax({                                      
			url: 'GetBooks.php',                  //the script to call to get data          
			data: {query:searchQuery},                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
			dataType: 'json',                //data format      
			success: function(data)          //on recieve of reply
			{
				var id = data[0];              //get id
				var vname = data[1];
                alert("here in success "+id + " "+vname); 				//get name
        //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
			$('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html
			//recommend reading up on jquery selectors they are awesome 
        // http://api.jquery.com/category/selectors/
			},
			error: function(data){
			 alert("in error");
			}
		});
});
});
	</script>
  </body>
</html>
