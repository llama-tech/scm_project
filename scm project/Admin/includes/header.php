<html lang="en">
  <head>
    <title>Welcome To Llama Plug</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.png" type="image/png" />
  </head>
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all"><@import "./includes/layout.css";
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;

}
* basic menu styles */
.block-menu {
	display: block;
	background: #000;
}

.block-menu li {
	display: inline-block;
}

.block-menu li a {
	color: #fff;
	display: block;
	text-decoration: none;
	font-family: 'Passion One', Arial, sans-serif;
	font-smoothing: antialiased;
	text-transform: uppercase;
	overflow: visible;
	line-height: 20px;
	font-size: 10px;
	padding: 15px 10px;
}

/* animation domination */
.three-d {
	perspective: 200px;
	transition: all .07s linear;
	position: relative;
	cursor: pointer;
}
	/* complete the animation! */
	.three-d:hover .three-d-box,
	.three-d:focus .three-d-box {
		transform: translateZ(-25px) rotateX(90deg);
	}

.three-d-box {
	transition: all .3s ease-out;
	transform: translatez(-25px);
	transform-style: preserve-3d;
	pointer-events: none;
	position: absolute;
	top: 0;
	left: 0;
	display: block;
	width: 100%;
	height: 100%;
}

/*
	put the "front" and "back" elements into place with CSS transforms,
	specifically translation and translatez
*/
.front {
	transform: rotatex(0deg) translatez(25px);
}

.back {
	transform: rotatex(-90deg) translatez(25px);
	color: #ffe7c4;
}

.front, .back {
	display: block;
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	background: black;
	padding: 15px 10px;
	color: white;
	pointer-events: none;
	box-sizing: border-box;
}
</style>
</head>
<body>
<ul class="block-menu" align="center">
	<li><a href="indexAdmin.php" class="three-d">
		<img width="50px" src="images/Final-Sneakeranity-IconRed.png" />
		<span aria-hidden="true" class="three-d-box">
			<span class="front"><img width="50px" src="images/Final-Sneakeranity-IconRed1.png" /></span>
			<span class="back"><img width="50px" src="images/Final-Sneakeranity-IconRed1.png" /></span>
		</span>
	</a></li>
	<li><a href="Admin.php" class="three-d">
		Register Admin
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Register Admin</span>
			<span class="back">Register Admin</span>
		</span>
	</a></li>
	<li><a href="adminUpdate.php" class="three-d">
		Update Admin
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Update Admin</span>
			<span class="back">Update Admin</span>
		</span>
	</a></li>
	<li><a href="membersUpdate.php" class="three-d">
		View Members
		<span aria-hidden="true" class="three-d-box">
			<span class="front">View Members</span>
			<span class="back">View Members</span>
		</span>
	</a></li>

	<li><a href="AddProduct.php" class="three-d">
		Add Product
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Add Product</span>
			<span class="back">Add Product</span>
		</span>
	</a></li>
	<li><a href="ProductUpdate.php" class="three-d">
		Update Product
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Update Product</span>
			<span class="back">Update Product</span>
		</span>
	</a></li>
	<li><a href="ViewQuantitySize.php" class="three-d">
		Add Quantity & Size
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Add Quantity & Size</span>
			<span class="back">Add Quantity & Size</span>
		</span>
	</a></li>
	<li><a onclick="return confirm('Are you sure you want to Log Out?')" href="/project/Public/index.php" class="three-d">
		Log Out
		<span aria-hidden="true" class="three-d-box">
			<span class="front">Log Out</span>
			<span class="back">Log Out</span>
		</span>
	</a></li>
	<!-- more items here -->
</ul>


</body>
</html>
