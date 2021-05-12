<?

function makeRandomPassword() { 
          $salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
				} 
          return $pass; 
}
function register() {
	if(isset($_POST['submit'])){
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$mail = strip_tags($_POST['mail']);
	
	if((!$username) || (!$password) || (!$mail)){
		if(!headers_sent()) {
		header("Location: error.php");
		}
	}
	$sql_email_check = mysql_query("SELECT mail FROM users WHERE mail='$mail'"); 
	$sql_username_check = mysql_query("SELECT username FROM users WHERE username='$username'"); 
	
	$email_check = mysql_num_rows($sql_email_check); 
	$username_check = mysql_num_rows($sql_username_check); 
	
	if(($email_check > 0) || ($username_check > 0)){ 
		if(!headers_sent()) {
		header("Location: error.php");
		}
	}
	$password = md5($password);

	$sql = mysql_query("INSERT INTO users (username, password, mail) VALUES ('$username', '$password', '$mail')") or die(mysql_error());

	if(!$sql){
		if(!headers_sent()) {
		header("Location: error.php");
		}
	} else {
		$subject = "Your Membership at Northern*!"; 
		$message = "Hi $username !!! <br>Thank you for registering at our website, http://<br><br>We have registered the following info:<br><br>Username:".$username."<br>Password: ".$password."<br>You can now login at our website.<br><br>Thanks! <br>The Webmaster <br><br>This is an automated response, please do not reply!"; 

		mail($mail, $subject, $message, "From: Northern* Webmaster<admin@".$domene.">\n X-Mailer: PHP/" . phpversion()); 
		if(!headers_sent()) {
		header("Location: index.php");
		}
	}
	}
}

function lostpw() { 
	if(!$mail){
		if(!headers_sent()) {
			header("Location: error.php");
			}
			}
$sql_check = mysql_query("SELECT * FROM users where mail='$mail'");
$sql_check_num = mysql_num_rows($sql_check); 

$random_password = makeRandomPassword(); 
$db_password = md5($random_password); 
     
    $sql = mysql_query("UPDATE users SET password='$db_password' WHERE mail='$mail'"); 
     
    $subject = "Your Password at NorthernStar!"; 
    $message = "Hi, we have reset your password. 
     
    New Password: $random_password 
     
    http://$domene/
     
    Thanks! 
    The Webmaster 
     
    This is an automated response, please do not reply!"; 
     
    mail($email_address, $subject, $message, "From: NorthernStar Webmaster<admin@".$domene.">\n X-Mailer: PHP/" . phpversion()); 
}

function login() {
	if(!isset($_COOKIE['online'])){

	echo "<table width=\"90%\" cellspacing=\"1\" cellpadding=\"0\" border=\"0\">
    <tr><form action=\"index.php\" method=\"post\">
     <td>&nbsp; <input type=\"text\" name=\"username\" value=\"Username\" style=\"FONT-SIZE: 12px; WIDTH: 90px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7\"></td>
    </tr>
    <tr>
     <td>&nbsp; <input type=\"password\" name=\"password\" value=\"Password\" style=\"FONT-SIZE: 12px; WIDTH: 90px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7\"></td>
    </tr><tr><td>&nbsp;</td></tr>
	<tr>
     <td>&nbsp; <input type=\"submit\" name=\"submit\"  style=\"FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7\"></td>
    </tr>
	</form>
    <tr>
     <td>&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index.php?action=register\">Register</a></font></td>
    </tr>
    <tr>
     <td>&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index.php?action=lostpw\">Forgot Your password?</a></font></td>
    </tr>
   </table>";

		 }
	 if((!$_POST['username']) || (!$_POST['password'])){
		 if(!headers_sent()) {
		 header("Location: error.php");
		 }
	 }
	$sql2 = mysql_query("SELECT * FROM users where username='$username'");
	$sql_check_num = mysql_num_rows($sql2); 
	if($sql_check_num < 0){
		if(!headers_sent()) {
		header("Location: error.php");
		}
	} else {
	$user_array = mysql_fetch_array($sql2);
	$uid = $user_array['id'];
	$user_lvl = $user_array['user_lvl'];
	setcookie ("online", $uid, time()+315360000, "/", '', 0);
	setcookie ("username", $username, time()+315360000, "/", '', 0);
	setcookie ("user_lvl", $user_lvl, time()+315360000, "/", '', 0);
	}
if(isset($_COOKIE['online'])){
	echo "Nick:".$_COOKIE['username']."<br />";
	echo "<br />";
	}
if($_COOKIE['user_lvl'] >= "8"){
	echo "Admin menu:";
	echo "<br />";
	echo "<a href=\"index.php?=add\">- Add news</a><br />";
	echo "<a href=\"demos.php?=add\">- Add demo</a><br />";
	echo "<a href=\"war.php?=add\">- Add war</a><br />";
	echo "<a href=\"awards.php?=add\">- Add award</a><br />";
	echo "<a href=\downloads.php=?add\">-Add Download</a><br />";
	}
}
?>