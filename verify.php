<?php
	mysql_select_db("members") or die(mysql_error()); // Select registration database.
             
	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	    // Verify data
	    $email = mysql_escape_string($_GET['email']); // Set email variable
	    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
                 
 	   $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
 	   $match  = mysql_num_rows($search);
                 
 	   if($match > 0){
 	       // We have a match, activate the account
 	       mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
 	       echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
	    }else{
 	       // No match -> invalid url or account has already been activated.
 	       echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
	    }
	                 
	}else{
	    // Invalid approach
	    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
	}

	//redirect to login page
	header('Location: login.php?action=active');
	exit;
?>