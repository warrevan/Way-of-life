<?php
require_once('includes/config.php');
?>
<head>
	<title>Way Of Life</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
	<link rel="shortcut icon" href="images/logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-image: url(images/background.jpg); background-repeat:no-repeat; background-size:100%; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 6% 33%; padding:2.5%; background-color:white;">
	<div class="row" style="margin:0 5%">
		<form role="form" method="post" action="" autocomplete="on">
			<h2>Please Login</h2>
			<hr>
            <p>Username</p>
			<input type="text" name="username" id="username" placeholder="User Name"  tabindex="1">
            <p>Password</p>
			<input type="password" name="password" id="password" placeholder="Password" tabindex="3">
		<hr>
		<div class="row"  style="margin-bottom:4%;">
			<input type="submit" name="submit" tabindex="5">
		</div>
            <br>
		<a href='reset.php' style="float:left;">Forgot your Password?</a><a href="register.php" style="float:right;">Or Register Here</a>
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
