<html>
 <head>
  <meta charset="UTF-8">
  <title>Update an item</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 </head>

 <body>
	<p class="topbar">
        <span class="logo">i-Exchange</span>
		<span class="nav">
			<ul class="navbar">
				<li class="navlink"><a class="nava" href="index.html">Home</a>
				<li class="navlink"><a class="nava" href="login.html">Login</a>
				<li class="navlink"><a class="nava" href="signup.html">Signup</a>
				<li class="navlink"><a class="nava" href="profile.php">View Profile</a>
			</ul>
			</span>
	</p>
<center>
<h2>Update an Item</h2>

<form action="#" method="post" /> <!-- TODO. Use session variable to keep track of user. Insert successful: redirect to user's profile page.-->
<p>Title: <input type="text" name="title" /> </p>
<p>Category: <select name="dropdown">

	<option value="Apparel">Apparel</option>
	<option value="Computers">Computers</option>
	<option value="Books">Books</option>
	<option value="Accessories">Accessories</option>
	<option value="Misc.">Misc.</option>
</select>

</p>
<p>Price: $<input type="number" step="0.01" name="price" /> </p>
<input type="submit" value="Post" />
</form>
</center>
<!-- after this, user should be redirected to the user's profile page. Pass user's email? (clumsy!) No, use session!-->

 </body>
</html>
