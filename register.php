<?php 
require('includes/config.php');
?>

<head>
	<title>Register</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
	<link rel="shortcut icon" href="images/logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-image: url(images/background2.jpg); background-repeat:no-repeat; background-size:100%; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 0 33%; padding:2.5%; background-color:white;">
	<div class="row">
			<form role="form" method="post" action="index.php" autocomplete="on">
				<h2>Please Sign Up</h2>
				<hr>
                    <p>Username</p>
					<input type="text" name="username" id="username" placeholder="User Name" tabindex="1">
                    <p>Email</p>
					<input type="email" name="email" id="email" placeholder="Email Address" tabindex="2">
					<p>Password</p>
					<input type="password" name="password" id="password"  placeholder="Password" tabindex="3">
					<input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirm Password" tabindex="4">
                <hr>
				<div class="row"  style="margin-bottom:8%;">
					<input type="submit" name="submit" value="Register" tabindex="5">
				</div>
                                <a href="index.php">Back to Login</a>
			</form>
	</div>
</div>
</div>
<div class="bottom">
     <a href="memberpage.php"><h6 style="display:inline;">My Account</h6></a>
     <a href="help.php"><h6 style="display:inline; margin-left:5%;">Help</h6></a>
     <a href="devs.php"><h6 style="display:inline;">Developers</h6></a>
     <a href="sinfo.php"><h6 style="display:inline;">Site Info</h6></a>
     <a href="translate.php"><h6 style="display:inline;">Translate</h6></a>
<div style="font-size:12px; margin-top:.75%;">
	 <?php
	 $load = microtime();
	 echo 'Page generated in ';
	 print ( number_format($load,2));
	 echo 's';
	 ?>
</div>
</div>
</body>		
