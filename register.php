<?php require('includes/config.php');

//if logged in redirect to members page
if( $user->is_logged_in() ){ header('Location: memberpage.php'); }

//if form has been submitted process it
if(isset($_POST['submit'])){

	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}
	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}

	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}
	}

	//if no errors have been created carry on
	if(!isset($error)){

                $to = 'email';
                $subject = 'Account Verification';
                $message = '
                Thank you for joining the community at Way of Life. You must first verify your identity.
                
                Please click this link to verify your account: http://www.w-o-l.ml/verify.php?email='.email.'&hash='.$activasion.'  

                Be sure to join a Calling once you log in!
                ';

                mail($to,$subject,$message);
                
		//hash the password
		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		$activasion = md5( rand(0,1000) );

		try {
			//insert into database with a prepared statement
			$stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			//redirect to login page
			header('Location: memberpage.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
	}
}
?>

<head>
	<title>Register</title>
	<link type="text/css" rel="stylesheet" href="style/main.css" >
        <link rel="shortcut icon" href="logo.png">
</head>
<body >
<div class="top">
    <a href="index.php"><img src="images/logo.png" style="margin-left:42%; margin-right:auto; height:100%;"></a>
</div>
<div class="main" style="background-image: url(images/background2.jpg); background-repeat:no-repeat; background-size:100%; margin:0 -.6% 0 -.6%; padding-bottom:10%;">
<br>
<div class="container" style="margin:5% 33% 0 33%; padding:2.5%; background-color:white;">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Please Sign Up</h2>
				<hr>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				//if action is joined show success
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>

				<div class="form-group">
                                        <p>Username</p>
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
                                        <p>Email</p>
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                                                <p>Password</p>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
						</div>
					</div>
				</div>
                                <hr>
				<div class="row"  style="margin-bottom:4%;">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
                                <a href="index.php">Back to Login</a>
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
</div>
</body>		
