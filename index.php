<?php
//include config
require_once('includes/config.php');

//check if already logged in move to home page
if( $user->is_logged_in() ){ header('Location: register.php'); } 

//process login form if submitted
if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
	$username = mysql_escape_string($_POST['username']);
	$password = mysql_escape_string(md5($_POST['password']));
                 
	$search = mysql_query("SELECT username, password, active FROM members WHERE username='".$username."' AND password='".$password."' AND active='1'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
            }

if($match > 0){
		$msg = 'Login Complete! Thanks';
		$_SESSION['username'] = $username;
		header('Location: memberpage.php');
		exit;
}else{
    $msg = 'Login Failed! Wrong username or password or your account has not been activated.';
}
//end if submit
?>
<head>
	<title>Way Of Life</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
        <link rel="shortcut icon" href="logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-image: url(images/background.jpg); background-repeat:no-repeat; background-size:100%; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 6% 33%; padding:2.5%; background-color:white;">
	<div class="row" style="margin:0 5%">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" method="post" action="" autocomplete="on">
			<h2>Please Login</h2>
			<hr>
			<?php
			//check for any errors
			if(isset($error)){
				foreach($error as $error){
					echo '<p class="bg-danger">'.$error.'</p>';
				}
			}
			if(isset($_GET['action'])){
				//check the action
				switch ($_GET['action']) {
					case 'active':
						echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
						break;
					case 'reset':
						echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
						break;
					case 'resetAccount':
						echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
						break;
				}
			}	
			?>

			<div class="form-group">
                                <p>Username</p>
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
			</div>
			<div class="form-group">
                                <p>Password</p>
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
			</div>
			<hr>
			<div class="row" style="margin-bottom:4%;">
				<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
			</div>
                        <br>
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
					 <a href='reset.php' style="float:left;">Forgot your Password?</a><a href="register.php" style="float:right;">Or Register Here</a>
				</div>
			</div>
		</form>
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
