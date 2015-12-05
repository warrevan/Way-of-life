<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); } 
?>
<head>
	<title>My Account</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
        <link rel="shortcut icon" href="logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-color:#BDBDBD; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container">
	<div class="row">
	     <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<h2>Member only page - Welcome <?php echo $_SESSION['username']; ?></h2>
			<p><a href='logout.php'>Logout</a></p>
			<hr>
	     </div>
	</div>
</div>
</div>
<div class="bottom">
     <a href="memberpage.php"><h6 style="display:inline;">My Account</h6></a>
     <a href="help.php"><h6 style="display:inline; margin-left:5%;">Help</h6></a>
     <a href="devs.php"><h6 style="display:inline;">Developers</h6></a>
     <a href="sinfo.php"><h6 style="display:inline;">Site Info</h6></a>
     <a href="translate.php"><h6 style="display:inline;">Translate</h6></a>
</div>
</body>
