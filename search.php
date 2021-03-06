<?php
session_start();

# edit: Since we show listings with email buttons, we can't let users access it unless they're logged in.
# if user is not logged in, redirect to login.html
if (!isset($_SESSION['user_email'])) {

	header("Location: http://iexchange.web.engr.illinois.edu/login.php");	
	exit();
}

# User is logged in, display the profile page. Username saved in session variable.
include 'dbconnect.php';

# DB connected.
$gl_user = $_SESSION["user_email"];

# Grab all the title from item table which includes the search key
# Fetch the data sent from the HTML form
$search_key = $_POST['search'];
if (isset($search_key)) {

	$search_query = mysql_query("SELECT * from item I, post P WHERE P.email!=('$gl_user') AND I.id=P.id AND I.title RLIKE ('$search_key')");
}

?>

<html>
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
			<!-- jQuery Libraries -->
	   		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	   		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 

 </head>

  <body>

	<!-- topbar -->
 	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">i-Exchange</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <?php if(!isset($_SESSION['user_email'])){ ?>
	        <li><a href="login.php">Login</a></li>
	        <li><a href="signup.php">Signup</a></li>
	        <?php } ?>
	        <li><a href="profile.php">Profile</a></li>
	        <li class="active"><a href="search.php">Search</a></li>
	        <?php if(isset($_SESSION['user_email'])) {?>
	        <li><a href="wishlist.php">Wishlist</a></li>
	        <li><a href="history.php">Recommended</a></li>
	        <li><a href="logout.php">Logout</a></li>
	        <?php } ?>
	      </ul>
	    </div>
	  </div>
    </nav>
<div class="container">
	<center>
	<h3>Search for Items</h3>
	<br>
	</center>
	
	<!-- -->
	<form action="#" method="post" />
	<div class="row">
    	<div class="col-lg-4 col-lg-offset-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" /> 
                    <span class="input-group-btn">
                    <input class="btn btn-default" type="submit" value="Go" />
                    </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        </form>
		
	<!-- -->

<br>
<table class="table table-hover">
<thead>
	<tr>
	<th>Title</th>
	<th>Price</th>
	<th>Category</th>
	<th>Contact Seller</th>
	</tr>
</thead>
<tbody>
<?php
	if(isset($search_query)){
		while ($record=mysql_fetch_assoc($search_query)) {
?>
		<tr>
		<td><?=$record['title']?></td>
		<td>$<?=$record['price']?></td>
		<td><?=$record['category']?></td>
		<td><input class="btn btn-info" type="submit" name="EmailUser" value="Send Email" 
		 onclick="window.location.href='mailto:<?=$record['email']?>';"/> </td>
		</tr>
<?php
		}
	}
?>
</tbody>
</table>
</div>
 </body>
</html>