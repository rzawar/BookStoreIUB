<?php
session_start();
if(!isset($_SESSION['username']))
	header("Location: login.php"); 
else
	$user = $_SESSION['username'];
	
if(isset($_POST['search'])){
	include '../model/Book.php';
	$query = $_POST['query'];
	$book = new Book();
	$result = $book->getResult($query);
	
}
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
		  <form class = "form-search" method = "post" action="BuyBooks.php">
		  <div class="input-group">
				<input type="text" class="form-control" placeholder="Search for books here ..." id="query" name="query" value=""></input>
				<div class="input-group-btn">
					<button type="submit" class="btn btn-success" name = "search"><span class="glyphicon glyphicon-search"></span></button>
				</div>
		  </div>
		  </form>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
	   <div class="container marketing">
       <div class="row">
	   <?php
	   if(isset($result)){
	   while ($row = mysql_fetch_assoc($result)) {?>
        <div class="col-lg-3">
          <h2><?php echo $row['title'];?></h2>
          <h4><p><?php echo $row['author'];?></p></h4>
		  <p><a class="open-displayBook btn btn-default" data-target= "#viewBook" role="button" data-toggle = "modal" data-id = "<?php echo $row['bookid'] ?>" >View Book Details&raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <?php
		}
		}
		?>
      </div><!-- /.row -->
	  </div>
	  
	<div class="modal fade" id="viewBook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <label  name="book_title" id="book_title">	</label>
        </div>
        <div class="modal-body">
           <label>Author    :</label><label  name="author" id="author"></label><hr>
		   <label>publisher :</label><label  name="publisher" id="publisher"></label><hr>
		   <label>Edition   :</label><label  name="edition" id="edition"></label><hr>
		   <label>Sold by   :</label><label  name="sold_by" id="sold_by"></label><hr>
		   <label>Price	    :</label><label  name="price" id="price"></label><hr>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
	  
	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap-3.1.1/dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.1.1/docs/assets/js/docs.min.js"></script>
	<script>
	$(document).on("click", ".open-displayBook", function () {
		var bookid = $(this).data('id');
		//alert(bookid);
		$.ajax({
        url: 'GetBooks.php',
        data: {id:bookid},
		success: function(data){
			//alert(data);
			var row =  $.parseJSON(data);
			$(".modal-header #book_title").text( row[2]);
			$(".modal-body #author").text( row[4]);
			$(".modal-body #publisher").text( row[6]);
			$(".modal-body #edition").text( row[3]);
			$(".modal-body #price").text( row[7]);
			$(".modal-body #sold_by").text( row[9]);
			
			//relocation.reload(true);
						// Load the content in to the page.
			},
		error:function(data){
			alert("in error"+data);
		}
		});
     //$(".modal-body #noteId").val( myNoteContents );
	 //$(".modal-header #notetitle").val( myNoteTitle )
	 
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
      //$('#addBookDialog').modal('show');
	  
	});
	</script>
  </body>
</html>
