<? 
require("config.php");
//html form osv

if(isset($_POST['submit'])){
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$mail = strip_tags($_POST['mail']);
	
	if((!$username) || (!$password) || (!$mail)){
		header("Location: error.php");
	}
	$sql_email_check = mysql_query("SELECT mail FROM users WHERE mail='$mail'"); 
	$sql_username_check = mysql_query("SELECT username FROM users WHERE username='$username'"); 
	
	$email_check = mysql_num_rows($sql_email_check); 
	$username_check = mysql_num_rows($sql_username_check); 
	
	if(($email_check > 0) || ($username_check > 0)){ 
		header("Location: error.php");
	}
	$password = md5($password);

	$sql = mysql_query("INSERT INTO users (username, password, mail) VALUES ('$username', '$password', '$mail')") or die(mysql_error());

	if(!$sql){
		header("Location: error.php");
	} else {
		$subject = "Your Membership at Northern*!"; 
		$message = "Hi $username !!! 
		Thank you for registering at our website, http://$domene 
		
		We have registered the following info:
			Username: $username
			Password: $password
		
		You can now login at our website.
     
		Thanks! 
		The Webmaster 
     
		This is an automated response, please do not reply!"; 
		mail($mail, $subject, $message,  
        "From: Northern* Webmaster<admin@".$domene.">\n 
        X-Mailer: PHP/" . phpversion()); 
		header("Location: index.php");
}
}

?> 