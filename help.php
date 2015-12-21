<head>
	<title>Help</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
	<link rel="shortcut icon" href="images/logo.png">
    <?php
	$starttime = explode(' ', microtime());
    $starttime = $starttime[1] + $starttime[0];
	?>
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-color:#BDBDBD; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 2% 33%; padding:2.5%; background-color:white;">
     <h3>Troubleshooting Tips<h3>
     <p><i>For anything not listed below, email it@w-o-l.ml</i></p>
       <br>
       <hr>
     <h3>Making an Account-</h3>
     <p>Simply go to our register page and fill in your information.</p>
     <a href="register.php">Register</a>
       <br>
       <hr>
     <h3>Activation Email</h3>
     <p>If you do not receive an activation email, try again and make sure you entered your email correctly. If this doesn't work please email us, as there is a problem with the code.</p>
       <br>
       <hr>
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
