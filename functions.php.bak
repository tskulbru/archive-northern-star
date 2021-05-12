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
			header("Location: index2.php");
			}
		}
	}
}

function lostpw() {
	if(isset($_POST['submit'])){
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
     <td>&nbsp; <input type=\"submit\" name=\"submit\" value=\"Submit\" style=\"FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7\"></td>
    </tr>
	</form>
    <tr>
     <td>&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index.php?action=register\">Register</a></font></td>
    </tr>
    <tr>
     <td>&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index.php?action=lostpw\">Forgot Your password?</a></font></td>
    </tr>
   </table>"; } } 

function news_header() {
	echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){
	echo "&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=addnews\">[Add news]</a>";
}
	$news_header_sql = "SELECT * FROM news ORDER BY id DESC LIMIT 5";
	$news_header_result = mysql_query($news_header_sql) or DIE("FEIL ".mysql_error());
	while($r=mysql_fetch_array($news_header_result)){
		$id = $r['id'];
		$username = $r['username'];
		$title = $r['title'];
		$header = $r['header'];
		$date = $r['date'];

$header = str_replace("[b]", "<b>", $header);
$header = str_replace("[/b]", "</b>", $header);
$header = str_replace("[u]", "<u>", $header);
$header = str_replace("[/u]", "</u>", $header);
$header = str_replace("[i]", "<i>", $header);
$header = str_replace("[/i]", "</i>", $header);
$header = str_replace("[small]", "<small>", $header);
$header = str_replace("[/small]", "</small>", $header);
$header = str_replace("[no]", "<img src=\"country/no.gif\">", $header);
$header = str_replace("[se]", "<img src=\"country/se.gif\">", $header);
$header = str_replace("[br]", "<img src=\"country/br.gif\">", $header);
$header = str_replace("[de]", "<img src=\"country/de.gif\">", $header);
$header = str_replace("[dk]", "<img src=\"country/dk.gif\">", $header);
$header = str_replace("[fi]", "<img src=\"country/fi.gif\">", $header);
$header = str_replace("[fr]", "<img src=\"country/fr.gif\">", $header);
$header = str_replace("[uk]", "<img src=\"country/uk.gif\">", $header);
$header = str_replace("[us]", "<img src=\"country/us.gif\">", $header);

$comment_sql = "SELECT count(id) as ant_comments FROM comments WHERE newsid=$id";
$comment_result = mysql_query($comment_sql) or die("ERROR: ".mysql_error());

while($r=mysql_fetch_array($comment_result)){
    $ant_comments = $r['ant_comments'];
}
echo "<table width=\"500\" border=\"0\">
  <tr> 
    <td width=\"60\" height=\"22\">&nbsp;</td>
    <td width=\"480\" height=\"22\"><font size=\"2\" face=\"tahoma\"><b>".$title." / </b></font><font size=\"1\" face=\"tahoma\"> 
      ".$date."</font></td>
    <td rowspan=\"7\" width=\"160\">&nbsp;</td>
  </tr>
  <tr> 
    <td width=\"60\" rowspan=\"6\">&nbsp;</td>
    <td width=\"480\"><font size=\"1\" face=\"tahoma\">by ".$username.". (".$ant_comments." comments)</font></td>
  </tr>
  <tr> 
    <td width=\"480\">&nbsp;</td>
  </tr>
  <tr> 
    <td width=\"480\" height=\"10\"><font size=\"1\" face=\"tahoma\">".$header."</font></td>
  </tr>
  <tr>
    <td width=\"480\" height=\"10\"><font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=news&disp=".$id."\">Read more..</a></font></td>
  </tr>

</table><br><br>";
}
echo "</body>";
}

function news() {
	$id = $_GET['disp'];
	$news_sql = "SELECT * FROM news WHERE id='$id'";
	$news_result = mysql_query($news_sql) or DIE("FEIL ".mysql_error());
		while($r=mysql_fetch_array($news_result)){
		$id = $r['id'];
		$username = $r['username'];
		$title = $r['title'];
		$header = $r['header'];
		$date = $r['date'];
		$news = $r['news'];
		}
$n_id = $id;
$header = str_replace("[b]", "<b>", $header);
$header = str_replace("[/b]", "</b>", $header);
$header = str_replace("[u]", "<u>", $header);
$header = str_replace("[/u]", "</u>", $header);
$header = str_replace("[i]", "<i>", $header);
$header = str_replace("[/i]", "</i>", $header);
$header = str_replace("[small]", "<small>", $header);
$header = str_replace("[/small]", "</small>", $header);
$header = str_replace("[no]", "<img src=\"country/no.gif\">", $header);
$header = str_replace("[se]", "<img src=\"country/se.gif\">", $header);
$header = str_replace("[br]", "<img src=\"country/br.gif\">", $header);
$header = str_replace("[de]", "<img src=\"country/de.gif\">", $header);
$header = str_replace("[dk]", "<img src=\"country/dk.gif\">", $header);
$header = str_replace("[fi]", "<img src=\"country/fi.gif\">", $header);
$header = str_replace("[fr]", "<img src=\"country/fr.gif\">", $header);
$header = str_replace("[uk]", "<img src=\"country/uk.gif\">", $header);
$header = str_replace("[us]", "<img src=\"country/us.gif\">", $header);

$news = str_replace("[b]", "<b>", $news);
$news = str_replace("[/b]", "</b>", $news);
$news = str_replace("[u]", "<u>", $news);
$news = str_replace("[/u]", "</u>", $news);
$news = str_replace("[i]", "<i>", $news);
$news = str_replace("[/i]", "</i>", $news);
$news = str_replace("[small]", "<small>", $news);
$news = str_replace("[/small]", "</small>", $news);
$news = str_replace("[no]", "<img src=\"country/no.gif\">", $news);
$news = str_replace("[se]", "<img src=\"country/se.gif\">", $news);
$news = str_replace("[br]", "<img src=\"country/br.gif\">", $news);
$news = str_replace("[de]", "<img src=\"country/de.gif\">", $news);
$news = str_replace("[dk]", "<img src=\"country/dk.gif\">", $news);
$news = str_replace("[fi]", "<img src=\"country/fi.gif\">", $news);
$news = str_replace("[fr]", "<img src=\"country/fr.gif\">", $news);
$news = str_replace("[uk]", "<img src=\"country/uk.gif\">", $news);
$news = str_replace("[us]", "<img src=\"country/us.gif\">", $news);	

$text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=\"_blank\">\\0</a>", $header);
$news2 = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=\"_blank\">\\0</a>", $news);
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] > 7)){
	echo "&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=editnews&id=".$id."\">[Edit]</a>&nbsp; <a href=\"index2.php?action=delnews&id=".$id."\">[Delete]</a>";
}
echo "<table width=\"500\" border=\"0\">
  <tr> 
    <td width=\"60\" height=\"22\">&nbsp;</td>
    <td width=\"480\" height=\"22\"><font size=\"2\" face=\"tahoma\"><b>".$title." / </b></font><font size=\"1\" face=\"tahoma\"> 
      ".$date."</font></td>
    <td rowspan=\"7\" width=\"160\">&nbsp;</td>
  </tr>
  <tr> 
    <td width=\"60\" rowspan=\"6\">&nbsp;</td>
    <td width=\"480\"><font size=\"1\" face=\"tahoma\">by ".$username.".</font></td>
  </tr>
  <tr> 
    <td width=\"480\">&nbsp;</td>
  </tr>
  <tr> 

    <td width=\"480\" height=\"10\"><font size=\"1\" face=\"tahoma\">".nl2br($text)."</font></td>
  </tr>
  <tr> 
    <td width=\"480\" height=\"4\">&nbsp;</td>
  </tr>
  <tr>
    <td width=\"480\" height=\"4\"><font size=\"1\" face=\"tahoma\">".nl2br($news2)."</font></td>
  </tr>

</table>
</body>
<table width=\"80%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\" align=\"center\">
<tr><td><br><br>";

include('comments.php');
news_c();
echo "<form action=\"commentsupdate.php?add_id=".$n_id."\" method=\"post\">
<input type=\"hidden\" name=\"ip\" value=\"".$_SERVER['REMOTE_ADDR']."\">
<table width=\"100%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\">";
if (!isset($_COOKIE['online'])) {
echo "<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nick:</td>
<td><input type=\"text\" name=\"nick\" size=\"20\"></font></td>
</tr>";
} 
if (isset($_COOKIE['online'])) { 
echo "<input type=\"hidden\" name=\"nick\" value=\"".$_COOKIE['username']."\"><br>
<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nick:</font></td>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".$_COOKIE['username']."</font></td>
</tr>";
}
echo "<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Comment:</td>
<td><textarea name=\"comment\" rows=\"6\" cols=\"20\"></textarea></font></td>
</tr>
</table>
<input type=\"submit\" name=\"submit\" value=\"Submit\" style=\"border: 1px solid #000000; border-style: solid; background-color: #FFFFFF\" class=\"text\">
</form>
</td></tr></table>
";
}

function feature() {
	if(isset($_GET['disp'])){
		//display
	} else {
		$feature_header_sql = "SELECT * FROM features ORDER BY id DESC";
		$feature_result = mysql_query($feature_header_sql) or DIE("FEIL ".mysql_error());
		while($r=mysql_fetch_array($feature_result)){
			$id = $r['id'];
			$username = $r['username'];
			$user_id = $r['user_id'];
			$date = $r['date'];
			$header = $r['header'];
			$header_pic = $r['header_pic'];

echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp; 
<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"458\">
<tr>
    <td valign=\"middle\" colspan=\"3\" width=\"458\" height=\"21\"> 
      &nbsp; Teams of Tomorrow: omg!&nbsp; </td>
</tr>
<tr>
<td valign=\"middle\" colspan=\"3\"  width=\"458\" height=\"20\">
&nbsp;??<a href=\"\">Comments</a> / Posted @ ".$date."<a href=\"\">mossad</a><br>
    </td>
</tr>
<tr>
<td width=1 ><img src=\"img/pix.gif\" width=1 height=1></td>
<td valign=\"top\" style=\"padding: 8px\" width=438>

<img src=\"".$header_pic."\" border=0 hspace=10 align=\"right\">".$header."
<div align=\"right\"><a href=\"index2.php?action=features&disp=".$id."\">Read More</a></div>

</td>
</table>
</body>";
		}
	}
}

function addnews() {
if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 7)){
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_POST['submit'])){
$id = $_POST['id'];
$date = date("Y-m-d H:i:s");
$username = $_COOKIE['username'];
$title = $_POST['title'];
$header = $_POST['header'];
$news = $_POST['news'];

if(($_POST['id'] = '') || ($_POST['title'] = '') || ($_POST['header'] = '') || ($_POST['news'] = '')){
echo "You have to fill in all fields.<br>";
} else {
$sql = mysql_query("INSERT INTO news (id, date, username, title, header, news) VALUES ('$id', '$date', '$username', '$title', '$header', '$news')");
if(!$sql) {
echo "An error occured while inserting the news into the database. Please contact the webmaster.";
} else {
echo "News succesfully submitted.<br>";
echo "<a href=\"index2.php\">Back to index</a>";
}
}
}
echo "<form action=\"?action=addnews\" method=\"post\">";
echo "<input type=\"hidden\" name=\"id\" value=\"\"><br>";
echo "<table width=\"90%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\" align=\"center\">";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Title:</font></td>";
echo "  <td><input type=\"text\" name=\"title\" size=\"20\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Header:</font></td>";
echo "  <td><textarea name=\"header\" rows=\"10\" cols=\"30\"></textarea></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">News:</font></td>";
echo "  <td><textarea name=\"news\" rows=\"10\" cols=\"30\"></textarea></td>";
echo "</tr>";
echo "<tr>";
echo "  <td>&nbsp;</td>";
echo "  <td><input type=\"submit\" name=\"submit\" value=\"Post\"></td>";
echo "</tr></form>";
echo "<tr>";
echo "<td><font size=\"1\" face=\"tahoma\">Tags that you can use:</font></td>";
echo "<td><font size=\"1\" face=\"tahoma\">[b]bold[/b] - [i]italic[/i] - [u]underline[/u]<br>
[no] norwegian flag - [se] swedish flag - [de] german flag<br>
[dk] danish flag - [us] Us flag - [uk] english flag<br>
[fr] french flag - [fi] finish flag - [br] brasillian flag<br><br>
</font></td>";
echo "</table>";
}
}
function editnews($id){
	if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 7)){
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_POST['submit'])){
$id = $_GET['id'];
$title = $_POST['title'];
$header = $_POST['header'];
$news = $_POST['news'];

if(($_POST['title'] = '') || ($_POST['header'] = '') || ($_POST['news'] = '')){
echo "You have to fill in all fields.<br>";
} else {
$sql = mysql_query("UPDATE news SET title='$title', header='$header', news='$news' WHERE id='$id'");
if(!$sql) {
echo "An error occured while inserting the news into the database. Please contact the webmaster.";
} else {
echo "News succesfully submitted.<br>";
echo "<a href=\"index2.php\">Back to index</a>";
}
}
}
$sql = "SELECT * FROM news WHERE id='$id'";
$result = mysql_query($sql) or DIE("FEIL ".mysql_error());
while($r=mysql_fetch_array($result)){
	$title = $r['title'];
	$header = $r['header'];
	$news = $r['news'];
echo "<form action=\"?action=editnews&id=".$id."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"id\" value=\"\"><br>";
echo "<table width=\"90%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\" align=\"center\">";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Title:</td></font>";
echo "  <td><input type=\"text\" name=\"title\" value=\"".$title."\" size=\"20\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Header:</td></font>";
echo "  <td><textarea name=\"header\" rows=\"10\" cols=\"30\">".$header."</textarea></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">News:</td></font>";
echo "  <td><textarea name=\"news\" rows=\"10\" cols=\"30\">".$news."</textarea></td>";
echo "</tr>";
echo "<tr>";
echo "  <td>&nbsp;</td>";
echo "  <td><input type=\"submit\" name=\"submit\" value=\"Post\"></td>";
echo "</tr></form>";
echo "</table>";
}
}
}

function delnews($id){
	echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" 	link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\"><p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>&nbsp;";
	if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 7)){
		if(isset($_GET['id'])){
				$sql = mysql_query("DELETE FROM news WHERE id='$id'") or DIE("FEIL ".mysql_error());
					if(!$sql){
						echo "An error appeared while trying to delete the news post.";
					} else {
						echo "<font size=\"1\" face=\"tahoma\">&nbsp; News deleted</font>";
						echo "<meta http-equiv=\"Refresh\" content=\"3;url=index2.php\">";
					}
		}
	}
}

function demo(){
	echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$demo_sql = "SELECT * FROM demo WHERE id='$id'";
		$demo_res = mysql_query($demo_sql) or DIE("FEIL ".mysql_error());
		while($d=mysql_fetch_array($demo_res)){
			$country1 = $d['cteam1'];
			$country2 = $d['cteam2'];

			$country_sql = "SELECT * FROM country WHERE id='$country1'";
			$country_res = mysql_query($country_sql);
			$c1 = mysql_fetch_array($country_res);
			$cteam1 = $c1['img'];

			$country_sql2 = "SELECT * FROM country WHERE id='$country2'";
			$country_res2 = mysql_query($country_sql2);
			$c2 = mysql_fetch_array($country_res2);
			$cteam2 = $c2['img'];

echo "<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"458\" height=\"331\">
  <tr> 
    <td width=1 height=\"512\"></td>
    <td valign=\"top\" style=\"padding: 8px\" width=\"458\" height=\"395\">
	  ";
  if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 9)){
	  echo " &nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=deldemo&id=".$id."\">[Delete]</a> <a href=\"index2.php?action=editdemo&id=".$id."\">[Edit]</a></font>";
  }
  echo "<center>
        <p> <img src=\"".$cteam1."\" width=\"22\" height=\"13\" align=\"absmiddle\"> <a href=\"\">".$d['team1']."</a><br>
          vs<br>
          <img src=\"".$cteam2."\" width=\"22\" height=\"13\" align=\"absmiddle\"> <a href=\"\">".$d['team2']."</a><br>
      </center>
      <p> 
      <table cellspacing=0 cellpadding=0 border=0 width=100% height=\"163\">
        <tr> 
          <td valign=\"top\" height=\"158\"><font size=\"1\" face=\"tahoma\"> <b>POV:</b> <a href=\"\">".$d['pov']."</a><br>
            <b>Uploaded By:</b> <a href=\"\">".$d['uploaded']."</a><br>
            <b>Event:</b> ".$d['event']."<br>
            <b>Game:</b> Counter-Strike<br>
            <b>Type:</b> ".$d['type']."<br>
            <b>Map:</b> ".$d['map']."<br></font>
			<a href
          </td>
          <td valign=\"top\" align=\"right\" height=\"264\"> <img src=\"map_img/".$d['map'].".jpg\" width=\"150\" border=\"1\" vspace=\"4\"><br>
          </td>
        </tr>
      </table><i><font size=\"2\" face=\"tahoma\">
  ".$d['info']."<br><br></i>";
  if(isset($_COOKIE['online'])) {
	  echo "<a href=\"".$d['path']."\">Download</a></font>";
	  } else {
		  echo "You have to be registered to download a demo..";
	  }
  echo "</td>
    <td width=1 height=\"395\"></td>
  </tr>
  <tr> 
    <td valign=\"top\" colspan=\"3\" height=\"2\"></td>
  </tr>
</table>

</body>";
		}
	} else {
		if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 9)){
	echo "&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=adddemo\">[Add demo]</a><br><br></font>";
		}
		$demo_sql = "SELECT * FROM demo ORDER BY id DESC";
		$demo_res = mysql_query($demo_sql) or DIE("FEIL ".mysql_error());
		if(mysql_num_rows($demo_res) == 0) { 
			echo "<font size=\"1\" face=\"tahoma\">&nbsp; Nothing here yet..</font>";
			}
		while($d=mysql_fetch_array($demo_res)){
			$info = $d['info'];
			$info = substr($info, 0, 70);
			

echo "<table width=\"482\" border=\"0\">
<tr> 
	<td width=\"16\">&nbsp;</td><td bgcolor=\"#3F3F3F\" colspan=\"2\"><font size=\"2\" face=\"tahoma\"><b>&nbsp; <a href=\"index2.php?action=demo&id=".$d['id']."\">".$d['team1']." VS ".$d['team2']."</a></b></font></td>
    <td bgcolor=\"#3F3F3F\" width=\"84\"><font size=\"1\" face=\"tahoma\"> </font></td>
    <td width=\"21\">&nbsp;</td>
  </tr>
  <tr> 
    <td width=\"16\">&nbsp;</td>
    <td bgcolor=\"#666666\" width=\"155\">&nbsp; <font size=\"1\" face=\"tahoma\">POV: <b>".$d['pov']."</b></font></td>
    <td bgcolor=\"#666666\" width=\"184\">&nbsp; <font size=\"1\" face=\"tahoma\"><b>".$d['map']."</b></font></td>
    <td bgcolor=\"#666666\" width=\"84\">&nbsp; <font size=\"1\" face=\"tahoma\">Event: <b>".$d['event']."</b></font></td>
    <td width=\"21\">&nbsp;</td>
  </tr>
  <tr> 
    <td width=\"16\">&nbsp;</td>
    <td colspan=\"2\"><font size=\"1\" face=\"tahoma\">".$info."...</font></td>
    <td width=\"84\">&nbsp;</td>
    <td width=\"21\">&nbsp;</td>
  </tr>
</table>
</body>";
		}
	}
}

function deldemo($id) {
		echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" 	link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\"><p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>&nbsp;";
	if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 9)){
		if(isset($_GET['id'])){
				$sql = mysql_query("DELETE FROM demo WHERE id='$id'") or DIE("FEIL ".mysql_error());
					if(!$sql){
						echo "An error appeared while trying to delete the news post.";
					} else {
						echo "<font size=\"1\" face=\"tahoma\">&nbsp; Demo deleted</font>";
						echo "<meta http-equiv=\"Refresh\" content=\"3;url=index2.php\">";
					}
		}
	}
}

function adddemo() {
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_COOKIE['online']) || ($_COOKIE['user_lvl'] >= '9')){
	if(isset($_POST['submit'])){
		if((!$_POST['team1']) || (!$_POST['team2']) || (!$_POST['cteam1']) || (!$_POST['cteam2']) || (!$_POST['pov']) || (!$_POST['map']) || (!$_POST['type']) || (!$_FILES['dfile'])){
			echo "You must fill inn ALL the fields...";
			exit();
			} else {
	$username = $_POST['username'];
	$team1 = $_POST['team1'];
	$team2 = $_POST['team2'];
	$cteam1 = $_POST['cteam1'];
	$cteam2 = $_POST['cteam2'];
	$pov = $_POST['pov'];
	$map = $_POST['map'];
	$event = $_POST['event'];
	$type = $_POST['type'];
	$info = $_POST['info'];
	$info = str_replace("\n", "<br>", $info);
	$info = str_replace("[b]", "<b>", $info);
	$info = str_replace("[/b]", "</b>", $info);
	$info = str_replace("[i]", "<i>", $info);
	$info = str_replace("[/i]", "</i>", $info);
	$info = str_replace("[small]", "<small>", $info);
	$info = str_replace("[/small]", "</small>", $info);
			
			$update_table1 = mysql_query("INSERT INTO demo (team1, team2, pov, map, event, info, cteam1, cteam2, uploaded, type) VALUES ('$team1', '$team2', '$pov', '$map', '$event', '$info', '$cteam1', '$cteam2', '$username', '$type')") or DIE("FEIL ".mysql_error());
			
			if(isset($_FILES['dfile'])){
			$storeDir = '/hsphere/local/home/ninja/mestninja.com/north/demo/';

			$filename = $_FILES['dfile']['name'];
			$tempName = $_FILES['dfile']['tmp_name'];
			$fileType = $_FILES['dfile']['type'];
			$fileSize = $_FILES['dfile']['size'];
					if(move_uploaded_file($tempName, $storeDir.$filename)){
						print("&nbsp; <h1>File was succesfully uploaded</h1>");
					}
				
				$path_parts = pathinfo($filename);
				$ext = $path_parts["extension"];
				$dempath = "demo/".$filename;
				$insert_dem = mysql_query("UPDATE demo SET path='$dempath' WHERE info='$info'") or DIE("ERROR ".mysql_error());
			}
		}
	} else {
		?>
<table cellspacing=0 cellpadding=0 border=0 width=458>
<tr>
<td valign="top"  width=458>

<form enctype="multipart/form-data" method="post">
<p><b><font size=2" face="tahoma">&nbsp; Team 1 name</b><br>
          &nbsp; Clan name. Example: Schroet Kommando</font><br>
          &nbsp; <input name="team1" value="" size=32 maxlength=32>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Team 2 name</b><br>
          &nbsp; Clan name. Example: Ninjas in Pyjamas</font><br>
          &nbsp; <input name="team2" value="" size=32 maxlength=32>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Team 1 country</b></font><br>
          &nbsp; <select name="cteam1">
            <option value="af">Afghanistan 
            <option value="al">Albania 
            <option value="dz">Algeria 
            <option value="as">American Samoa 
            <option value="ad">Andorra 
            <option value="ao">Angola 
            <option value="ai">Anguilla 
            <option value="aq">Antarctica 
            <option value="ag">Antigua And Barbuda 
            <option value="ar">Argentina 
            <option value="am">Armenia 
            <option value="aw">Aruba 
            <option value="au">Australia 
            <option value="at">Austria 
            <option value="az">Azerbaijan 
            <option value="bs">Bahamas 
            <option value="bh">Bahrain 
            <option value="bd">Bangladesh 
            <option value="bb">Barbados 
            <option value="by">Belarus 
            <option value="be">Belgium 
            <option value="bz">Belize 
            <option value="bj">Benin 
            <option value="bm">Bermuda 
            <option value="bt">Bhutan 
            <option value="bo">Bolivia 
            <option value="ba">Bosnia And Herzegovina 
            <option value="bw">Botswana 
            <option value="bv">Bouvet Island 
            <option value="br">Brazil 
            <option value="io">British Indian Ocean Territory 
            <option value="bn">Brunei Darussalam 
            <option value="bg">Bulgaria 
            <option value="bf">Burkina Faso 
            <option value="bi">Burundi 
            <option value="kh">Cambodia 
            <option value="cm">Cameroon 
            <option value="ca">Canada 
            <option value="cv">Cape Verde 
            <option value="ky">Cayman Islands 
            <option value="cf">Central African Republic 
            <option value="td">Chad 
            <option value="cl">Chile 
            <option value="cn">China 
            <option value="cx">Christmas Island 
            <option value="cc">Cocos (Keeling) Islands 
            <option value="co">Colombia 
            <option value="km">Comoros 
            <option value="cg">Congo 
            <option value="cd">Congo, The Democratic Republic Of The 
            <option value="ck">Cook Islands 
            <option value="cr">Costa Rica 
            <option value="ci">Cote D'Ivoire 
            <option value="hr">Croatia 
            <option value="cu">Cuba 
            <option value="cy">Cyprus 
            <option value="cz">Czech Republic 
            <option value="dk">Denmark 
            <option value="dj">Djibouti 
            <option value="dm">Dominica 
            <option value="do">Dominican Republic 
            <option value="tp">East Timor 
            <option value="ec">Ecuador 
            <option value="eg">Egypt 
            <option value="sv">El Salvador 
            <option value="gq">Equatorial Guinea 
            <option value="er">Eritrea 
            <option value="ee">Estonia 
            <option value="et">Ethiopia 
            <option value="fk">Falkland Islands (Malvinas) 
            <option value="fo">Faroe Islands 
            <option value="fj">Fiji 
            <option value="fi">Finland 
            <option value="fr">France 
            <option value="gf">French Guiana 
            <option value="pf">French Polynesia 
            <option value="tf">French Southern Territories 
            <option value="ga">Gabon 
            <option value="gm">Gambia 
            <option value="ge">Georgia 
            <option value="de">Germany 
            <option value="gh">Ghana 
            <option value="gi">Gibraltar 
            <option value="gr">Greece 
            <option value="gl">Greenland 
            <option value="gd">Grenada 
            <option value="gp">Guadeloupe 
            <option value="gu">Guam 
            <option value="gt">Guatemala 
            <option value="gn">Guinea 
            <option value="gw">Guinea-Bissau 
            <option value="gy">Guyana 
            <option value="ht">Haiti 
            <option value="hm">Heard Island And Mcdonald Islands 
            <option value="va">Holy See (Vatican City State) 
            <option value="hn">Honduras 
            <option value="hk">Hong Kong 
            <option value="hu">Hungary 
            <option value="is">Iceland 
            <option value="in">India 
            <option value="id">Indonesia 
            <option value="ir">Iran, Islamic Republic Of 
            <option value="iq">Iraq 
            <option value="ie">Ireland 
            <option value="il">Israel 
            <option value="it">Italy 
            <option value="jm">Jamaica 
            <option value="jp">Japan 
            <option value="jo">Jordan 
            <option value="kz">Kazakstan 
            <option value="ke">Kenya 
            <option value="ki">Kiribati 
            <option value="kp">Korea, Democratic People'S Republic Of 
            <option value="kr">Korea, Republic Of 
            <option value="kw">Kuwait 
            <option value="kg">Kyrgyzstan 
            <option value="la">Lao People'S Democratic Republic 
            <option value="lv">Latvia 
            <option value="lb">Lebanon 
            <option value="ls">Lesotho 
            <option value="lr">Liberia 
            <option value="ly">Libyan Arab Jamahiriya 
            <option value="li">Liechtenstein 
            <option value="lt">Lithuania 
            <option value="lu">Luxembourg 
            <option value="mo">Macau 
            <option value="mk">Macedonia 
            <option value="mg">Madagascar 
            <option value="mw">Malawi 
            <option value="my">Malaysia 
            <option value="mv">Maldives 
            <option value="ml">Mali 
            <option value="mt">Malta 
            <option value="mh">Marshall Islands 
            <option value="mq">Martinique 
            <option value="mr">Mauritania 
            <option value="mu">Mauritius 
            <option value="yt">Mayotte 
            <option value="mx">Mexico 
            <option value="fm">Micronesia, Federated States Of 
            <option value="md">Moldova, Republic Of 
            <option value="mc">Monaco 
            <option value="mn">Mongolia 
            <option value="ms">Montserrat 
            <option value="ma">Morocco 
            <option value="mz">Mozambique 
            <option value="mm">Myanmar 
            <option value="na">Namibia 
            <option value="nr">Nauru 
            <option value="np">Nepal 
            <option value="nl">Netherlands 
            <option value="an">Netherlands Antilles 
            <option value="nc">New Caledonia 
            <option value="nz">New Zealand 
            <option value="ni">Nicaragua 
            <option value="ne">Niger 
            <option value="ng">Nigeria 
            <option value="nu">Niue 
            <option value="nf">Norfolk Island 
            <option value="mp">Northern Mariana Islands 
            <option value="no">Norway 
            <option value="om">Oman 
            <option value="pk">Pakistan 
            <option value="pw">Palau 
            <option value="ps">Palestinian Territory, Occupied 
            <option value="pa">Panama 
            <option value="pg">Papua New Guinea 
            <option value="py">Paraguay 
            <option value="pe">Peru 
            <option value="ph">Philippines 
            <option value="pn">Pitcairn 
            <option value="pl">Poland 
            <option value="pt">Portugal 
            <option value="pr">Puerto Rico 
            <option value="qa">Qatar 
            <option value="re">Reunion 
            <option value="ro">Romania 
            <option value="ru">Russian Federation 
            <option value="rw">Rwanda 
            <option value="sh">Saint Helena 
            <option value="kn">Saint Kitts And Nevis 
            <option value="lc">Saint Lucia 
            <option value="pm">Saint Pierre And Miquelon 
            <option value="vc">Saint Vincent And The Grenadines 
            <option value="ws">Samoa 
            <option value="sm">San Marino 
            <option value="st">Sao Tome And Principe 
            <option value="sa">Saudi Arabia 
            <option value="sn">Senegal 
            <option value="sc">Seychelles 
            <option value="sl">Sierra Leone 
            <option value="sg">Singapore 
            <option value="sk">Slovakia 
            <option value="si">Slovenia 
            <option value="sb">Solomon Islands 
            <option value="so">Somalia 
            <option value="za">South Africa 
            <option value="gs">South Georgia And The South Sandwich Islands 
            <option value="es">Spain 
            <option value="lk">Sri Lanka 
            <option value="sd">Sudan 
            <option value="sr">Suriname 
            <option value="sj">Svalbard And Jan Mayen 
            <option value="sz">Swaziland 
            <option value="se">Sweden 
            <option value="ch">Switzerland 
            <option value="sy">Syrian Arab Republic 
            <option value="tw">Taiwan, Province Of China 
            <option value="tj">Tajikistan 
            <option value="tz">Tanzania, United Republic Of 
            <option value="th">Thailand 
            <option value="tg">Togo 
            <option value="tk">Tokelau 
            <option value="to">Tonga 
            <option value="tt">Trinidad And Tobago 
            <option value="tn">Tunisia 
            <option value="tr">Turkey 
            <option value="tm">Turkmenistan 
            <option value="tc">Turks And Caicos Islands 
            <option value="tv">Tuvalu 
            <option value="ug">Uganda 
            <option value="ua">Ukraine 
            <option value="ae">United Arab Emirates 
            <option value="uk">United Kingdom 
            <option value="us">United States 
            <option value="um">United States Minor Outlying Islands 
            <option value="uy">Uruguay 
            <option value="uz">Uzbekistan 
            <option value="vu">Vanuatu 
            <option value="ve">Venezuela 
            <option value="vn">Viet Nam 
            <option value="vg">Virgin Islands, British 
            <option value="vi">Virgin Islands, U.S. 
            <option value="wf">Wallis And Futuna 
            <option value="eh">Western Sahara 
            <option value="ye">Yemen 
            <option value="yu">Yugoslavia 
            <option value="zm">Zambia 
            <option value="zw">Zimbabwe 
          </select>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Team 2 country</b></font><br>
          &nbsp; <select name="cteam2">
            <option value="af">Afghanistan 
            <option value="al">Albania 
            <option value="dz">Algeria 
            <option value="as">American Samoa 
            <option value="ad">Andorra 
            <option value="ao">Angola 
            <option value="ai">Anguilla 
            <option value="aq">Antarctica 
            <option value="ag">Antigua And Barbuda 
            <option value="ar">Argentina 
            <option value="am">Armenia 
            <option value="aw">Aruba 
            <option value="au">Australia 
            <option value="at">Austria 
            <option value="az">Azerbaijan 
            <option value="bs">Bahamas 
            <option value="bh">Bahrain 
            <option value="bd">Bangladesh 
            <option value="bb">Barbados 
            <option value="by">Belarus 
            <option value="be">Belgium 
            <option value="bz">Belize 
            <option value="bj">Benin 
            <option value="bm">Bermuda 
            <option value="bt">Bhutan 
            <option value="bo">Bolivia 
            <option value="ba">Bosnia And Herzegovina 
            <option value="bw">Botswana 
            <option value="bv">Bouvet Island 
            <option value="br">Brazil 
            <option value="io">British Indian Ocean Territory 
            <option value="bn">Brunei Darussalam 
            <option value="bg">Bulgaria 
            <option value="bf">Burkina Faso 
            <option value="bi">Burundi 
            <option value="kh">Cambodia 
            <option value="cm">Cameroon 
            <option value="ca">Canada 
            <option value="cv">Cape Verde 
            <option value="ky">Cayman Islands 
            <option value="cf">Central African Republic 
            <option value="td">Chad 
            <option value="cl">Chile 
            <option value="cn">China 
            <option value="cx">Christmas Island 
            <option value="cc">Cocos (Keeling) Islands 
            <option value="co">Colombia 
            <option value="km">Comoros 
            <option value="cg">Congo 
            <option value="cd">Congo, The Democratic Republic Of The 
            <option value="ck">Cook Islands 
            <option value="cr">Costa Rica 
            <option value="ci">Cote D'Ivoire 
            <option value="hr">Croatia 
            <option value="cu">Cuba 
            <option value="cy">Cyprus 
            <option value="cz">Czech Republic 
            <option value="dk">Denmark 
            <option value="dj">Djibouti 
            <option value="dm">Dominica 
            <option value="do">Dominican Republic 
            <option value="tp">East Timor 
            <option value="ec">Ecuador 
            <option value="eg">Egypt 
            <option value="sv">El Salvador 
            <option value="gq">Equatorial Guinea 
            <option value="er">Eritrea 
            <option value="ee">Estonia 
            <option value="et">Ethiopia 
            <option value="fk">Falkland Islands (Malvinas) 
            <option value="fo">Faroe Islands 
            <option value="fj">Fiji 
            <option value="fi">Finland 
            <option value="fr">France 
            <option value="gf">French Guiana 
            <option value="pf">French Polynesia 
            <option value="tf">French Southern Territories 
            <option value="ga">Gabon 
            <option value="gm">Gambia 
            <option value="ge">Georgia 
            <option value="de">Germany 
            <option value="gh">Ghana 
            <option value="gi">Gibraltar 
            <option value="gr">Greece 
            <option value="gl">Greenland 
            <option value="gd">Grenada 
            <option value="gp">Guadeloupe 
            <option value="gu">Guam 
            <option value="gt">Guatemala 
            <option value="gn">Guinea 
            <option value="gw">Guinea-Bissau 
            <option value="gy">Guyana 
            <option value="ht">Haiti 
            <option value="hm">Heard Island And Mcdonald Islands 
            <option value="va">Holy See (Vatican City State) 
            <option value="hn">Honduras 
            <option value="hk">Hong Kong 
            <option value="hu">Hungary 
            <option value="is">Iceland 
            <option value="in">India 
            <option value="id">Indonesia 
            <option value="ir">Iran, Islamic Republic Of 
            <option value="iq">Iraq 
            <option value="ie">Ireland 
            <option value="il">Israel 
            <option value="it">Italy 
            <option value="jm">Jamaica 
            <option value="jp">Japan 
            <option value="jo">Jordan 
            <option value="kz">Kazakstan 
            <option value="ke">Kenya 
            <option value="ki">Kiribati 
            <option value="kp">Korea, Democratic People'S Republic Of 
            <option value="kr">Korea, Republic Of 
            <option value="kw">Kuwait 
            <option value="kg">Kyrgyzstan 
            <option value="la">Lao People'S Democratic Republic 
            <option value="lv">Latvia 
            <option value="lb">Lebanon 
            <option value="ls">Lesotho 
            <option value="lr">Liberia 
            <option value="ly">Libyan Arab Jamahiriya 
            <option value="li">Liechtenstein 
            <option value="lt">Lithuania 
            <option value="lu">Luxembourg 
            <option value="mo">Macau 
            <option value="mk">Macedonia 
            <option value="mg">Madagascar 
            <option value="mw">Malawi 
            <option value="my">Malaysia 
            <option value="mv">Maldives 
            <option value="ml">Mali 
            <option value="mt">Malta 
            <option value="mh">Marshall Islands 
            <option value="mq">Martinique 
            <option value="mr">Mauritania 
            <option value="mu">Mauritius 
            <option value="yt">Mayotte 
            <option value="mx">Mexico 
            <option value="fm">Micronesia, Federated States Of 
            <option value="md">Moldova, Republic Of 
            <option value="mc">Monaco 
            <option value="mn">Mongolia 
            <option value="ms">Montserrat 
            <option value="ma">Morocco 
            <option value="mz">Mozambique 
            <option value="mm">Myanmar 
            <option value="na">Namibia 
            <option value="nr">Nauru 
            <option value="np">Nepal 
            <option value="nl">Netherlands 
            <option value="an">Netherlands Antilles 
            <option value="nc">New Caledonia 
            <option value="nz">New Zealand 
            <option value="ni">Nicaragua 
            <option value="ne">Niger 
            <option value="ng">Nigeria 
            <option value="nu">Niue 
            <option value="nf">Norfolk Island 
            <option value="mp">Northern Mariana Islands 
            <option value="no">Norway 
            <option value="om">Oman 
            <option value="pk">Pakistan 
            <option value="pw">Palau 
            <option value="ps">Palestinian Territory, Occupied 
            <option value="pa">Panama 
            <option value="pg">Papua New Guinea 
            <option value="py">Paraguay 
            <option value="pe">Peru 
            <option value="ph">Philippines 
            <option value="pn">Pitcairn 
            <option value="pl">Poland 
            <option value="pt">Portugal 
            <option value="pr">Puerto Rico 
            <option value="qa">Qatar 
            <option value="re">Reunion 
            <option value="ro">Romania 
            <option value="ru">Russian Federation 
            <option value="rw">Rwanda 
            <option value="sh">Saint Helena 
            <option value="kn">Saint Kitts And Nevis 
            <option value="lc">Saint Lucia 
            <option value="pm">Saint Pierre And Miquelon 
            <option value="vc">Saint Vincent And The Grenadines 
            <option value="ws">Samoa 
            <option value="sm">San Marino 
            <option value="st">Sao Tome And Principe 
            <option value="sa">Saudi Arabia 
            <option value="sn">Senegal 
            <option value="sc">Seychelles 
            <option value="sl">Sierra Leone 
            <option value="sg">Singapore 
            <option value="sk">Slovakia 
            <option value="si">Slovenia 
            <option value="sb">Solomon Islands 
            <option value="so">Somalia 
            <option value="za">South Africa 
            <option value="gs">South Georgia And The South Sandwich Islands 
            <option value="es">Spain 
            <option value="lk">Sri Lanka 
            <option value="sd">Sudan 
            <option value="sr">Suriname 
            <option value="sj">Svalbard And Jan Mayen 
            <option value="sz">Swaziland 
            <option value="se">Sweden 
            <option value="ch">Switzerland 
            <option value="sy">Syrian Arab Republic 
            <option value="tw">Taiwan, Province Of China 
            <option value="tj">Tajikistan 
            <option value="tz">Tanzania, United Republic Of 
            <option value="th">Thailand 
            <option value="tg">Togo 
            <option value="tk">Tokelau 
            <option value="to">Tonga 
            <option value="tt">Trinidad And Tobago 
            <option value="tn">Tunisia 
            <option value="tr">Turkey 
            <option value="tm">Turkmenistan 
            <option value="tc">Turks And Caicos Islands 
            <option value="tv">Tuvalu 
            <option value="ug">Uganda 
            <option value="ua">Ukraine 
            <option value="ae">United Arab Emirates 
            <option value="uk">United Kingdom 
            <option value="us">United States 
            <option value="um">United States Minor Outlying Islands 
            <option value="uy">Uruguay 
            <option value="uz">Uzbekistan 
            <option value="vu">Vanuatu 
            <option value="ve">Venezuela 
            <option value="vn">Viet Nam 
            <option value="vg">Virgin Islands, British 
            <option value="vi">Virgin Islands, U.S. 
            <option value="wf">Wallis And Futuna 
            <option value="eh">Western Sahara 
            <option value="ye">Yemen 
            <option value="yu">Yugoslavia 
            <option value="zm">Zambia 
            <option value="zw">Zimbabwe 
          </select>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">POV</b><br>
          &nbsp; Nick with abbreviation/tag, "CHASE" or "HLTV".<br>
          &nbsp; Example: SK|HeatoN</font><br>
         &nbsp;  <input name="pov" value="" size=32 maxlength=64>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Map </font></b><br>
          &nbsp; <input name="map" value="" size=20 maxlength=32>
          <br>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Event</font></b><br>
		  &nbsp; <input name="event" value="" size=20 maxlength=32>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Type</font></b><br>
         &nbsp;  <select name="type">
            <option value="1on1">1on1 
            <option value="2on2">2on2 
            <option value="3on3">3on3 
            <option value="4on4">4on4 
            <option value="5on5">5on5
            <option value="public">Public 
			<option value="mix">Mix
          </select>
          <br>
          &nbsp; <input type="hidden" name="username" value="<? echo $_COOKIE['username']; ?>" size=4 maxlength=20>
          <br>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Description</b></font><br>
         &nbsp;  As much described as possible.</font><br>
          &nbsp; <textarea name="info" rows=12 cols=35 style="width: 350px"></textarea>
        <p>
&nbsp; <b><font size=2" face="tahoma">Demo (must be .zip)</font></b><br>
&nbsp; <input type="file" name="dfile" size=45 width=350px"><p>
&nbsp; <input type="submit" name="submit" value="Upload">
</form>


</td>
</table>
</body>
<?
	}
}
}

function matches() {
if(isset($_GET['id'])){
?>
<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF" link="#86BEF7" vlink="#83C1F5" alink="#2567BB">
<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
<?php 
$id = $_GET['id'];

$query = "SELECT * FROM matches WHERE id='$id'";
$result = mysql_query($query) or die ("Feil: ".mysql_error());

 while($r=mysql_fetch_array($result)){
        $id = $r['id'];
	$date = $r['date'];
	$opponent = $r['opponent'];
	$event = $r['event'];
	$maps = $r['maps'];
	$us = $r['us'];
	$them = $r['them'];
	$usl = $r['usl'];
	$el = $r['el'];
	$report = $r['report'];
}
?>
<table cellspacing="2" cellpadding="2" border="0">
<tr>
<td></td>
<td width="400" valign="top">
<table width="80%" cellspacing="0" cellpadding="0" border="0">
  <tr>
   <td><font face="tahoma" size="1">Northern* VS <? echo $opponent; ?></font><br><br></td>
  </tr>
</table>
<table width="80%" cellspacing="0" cellpadding="0" border="0">
  <tr>
   <td><font face="tahoma" size="1"><b>Match report:</b></font><br><br></td>
  </tr>
</table>
<table width="80%" cellspacing="0" cellpadding="0" border="0">
  <tr>
    <td width="32%"><font face="tahoma" size="1">Date:</font></td>
    <td><font face="tahoma" size="1"><? echo $date; ?>.</font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Opponent:</font></td>
    <td><font face="tahoma" size="1"><? echo $opponent; ?>.</font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Result:</font></td>
    <td><font face="tahoma" size="1">
<?
 if ($us > $them) { 
  echo "<font color=\"#00FF00\">"; echo $us; echo "</font>:<font color=\"#FF0000\">"; echo $them; echo "</font>"; 
 } 
 if ($them > $us) {
  echo "<font color=\"#FF0000\">"; echo $us; echo "</font>:<font color=\"#00FF00\">"; echo $them;  
 } 
 if ($them == $us) {
  echo "<font color=\"#0080FF\">"; echo $us; echo ":"; echo $them; 
}
?>
</font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Event/league:</font></td>
    <td><font face="tahoma" size="1"><? echo $event; ?>.</font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Map(s):</font></td>
    <td><font face="tahoma" size="1"><? echo $maps; ?>.</font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Lineup:</font></td>
    <td><font face="tahoma" size="1"><? echo $usl; ?></font></td>
  </tr>
  <tr>
    <td><font face="tahoma" size="1">Op. Lineup:</font></td>
    <td><font face="tahoma" size="1"><? echo $el; ?></font></td>
  </tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td><br><font face="tahoma" size="1">Report:</font></td>
</tr>
<tr>
<td><font face="tahoma" size="1">
<? echo $report; ?></font></td>
</tr>
</table>
<br>
<font face="tahoma" size="2">
<a href="index2.php?action=matches">Back to matches page</a>.<br>
<? if (isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 8)) { ?>
<a href="index2.php?action=delmatch&id=<? echo $id ?>">Delete match</a>.<br>
<a href="index2.php?action=editmatch&id=<? echo $id ?>">Edit match</a>.<br>
<? } ?>
</font><br><br>
<?
include("comments.php");
match_c();
echo "</td></tr></table>";
echo "<form action=\"commentsupdate.php?match_id=".$id."\" method=\"post\">
<input type=\"hidden\" name=\"ip\" value=\"".$_SERVER['REMOTE_ADDR']."\">
<table width=\"80%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\" align=\"center\">";
if (!isset($_COOKIE['online'])) {
echo "<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nick:</td>
<td><input type=\"text\" name=\"nick\" size=\"20\"></font></td>
</tr>";
} 
if (isset($_COOKIE['online'])) { 
echo "<input type=\"hidden\" name=\"nick\" value=\"".$_COOKIE['username']."\"><br>
<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Nick:</font></td>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">".$_COOKIE['username']."</font></td>
</tr>";
}
echo "<tr>
<td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Comment:</td>
<td><textarea name=\"comment\" rows=\"6\" cols=\"20\"></textarea></font></td>
</tr><tr><td></td><td>
<input type=\"submit\" name=\"submit\" value=\"Submit\" style=\"border: 1px solid #000000; border-style: solid; background-color: #FFFFFF\" class=\"text\">
</form>
</td></tr>
</table>
</td></tr></table>";

} else {

$query = "SELECT * FROM matches ORDER BY id DESC";
$result = mysql_query($query) or die ("Feil: ".mysql_error());
?>
<body topmargin="0" leftmargin="0" background="images/middlebg.jpg" text="#FFFFFF" link="#86BEF7" vlink="#83C1F5" alink="#2567BB">
<p><img border="0" src="images/northernstartop.jpg" width="503" height="17"></p>
<? if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 8)){
	echo "&nbsp; <font face=\"tahoma\" size=\"1\"><a href=\"index2.php?action=addmatch\">[Add match]</a></font>";
}
$query2 = "SELECT count(id) as ant_matches FROM matches";
$result2 = mysql_query($query2) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result2)){
 $ant_matches = $r['ant_matches'];
}
?>
<table cellspacing="2" cellpadding="2" border="0">
  <tr> 
    <td></td>
    <td width="400" valign="top"> 
      <table width="100%" cellspacing="1" cellpadding="1" border="0">
        <tr> 
          <td><font face="tahoma" size="1">Date:</font></td>
          <td><font face="tahoma" size="1">Opponent:</font></td>
          <td><font face="tahoma" size="1">Event/league:</font></td>
          <td><font face="tahoma" size="1">Outcome:</font></td>
          <td><font face="tahoma" size="1">Details:</font></td>
        </tr>
        <? while($r=mysql_fetch_array($result)){
	$id = $r['id'];
	$date = $r['date'];
	$opponent = $r['opponent'];
	$event = $r['event'];
	$maps = $r['maps'];
	$us = $r['us'];
	$them = $r['them'];
	$report = $r['report'];
?>
        <tr> 
          <td><font face="tahoma" size="1">
            <? echo $date; ?>
            </font></td>
          <td><font face="tahoma" size="1">
            <? echo $opponent; ?>
            </font></td>
          <td><font face="tahoma" size="1">
            <? echo $event; ?>
            </font></td>
          <td><font face="tahoma" size="1"> 
            <? 
if ($us > $them) { 
 echo "<font color=\"#00FF00\">WIN</font>"; 
} 
if ($them > $us) {
 echo "<font color=\"#FF0000\">LOSS</font>";  
} 
if ($them == $us) {
 echo "<font color=\"#0080FF\">DRAW</font>";
}
?>
            </font></td>
          <td><font face="tahoma" size="1"><a href="index2.php?action=matches&id=<? echo $id; ?>">Yes</a></font></td>
        </tr>
        <? } ?>
      </table>
      <br>
      <br>
      <? 
$query3 = "SELECT count(*) as ant_wonmatches FROM matches WHERE us > them";
$result3 = mysql_query($query3) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result3)){
 $ant_wonmatches = $r['ant_wonmatches'];
}

$query5 = "SELECT count(*) as ant_drawmatches FROM matches WHERE us = them";
$result5 = mysql_query($query5) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result5)){
 $ant_drawmatches = $r['ant_drawmatches'];
}
?>
      <font face="tahoma" size="1"> <u> Match statistics</u>:<br>
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr> 
          <td width="150" valign="top"><font face="tahoma" size="1">Matches played:</font></td>
          <td valign="top"><font face="tahoma" size="1"> 
            <? echo $ant_matches; ?>
            .</font></td>
        </tr>
        <tr> 
          <td valign="top"><font face="tahoma" size="1">Matches won:</font></td>
          <td valign="top"><font face="tahoma" size="1"> 
            <? echo $ant_wonmatches; ?>
            .</font></td>
        </tr>
        <tr> 
          <td valign="top"><font face="tahoma" size="1">Matches drawed:</font></td>
          <td valign="top"><font face="tahoma" size="1"> 
            <? echo $ant_drawmatches; ?>
            .</font></td>
        </tr>
      </table>
      </font> </td>
  </tr>
</table>
</body>
<?
}
}

function delmatch($id){
	echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" 	link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\"><p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>&nbsp;";
	if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 7)){
		if(isset($_GET['id'])){
				$sql = mysql_query("DELETE FROM matches WHERE id='$id'") or DIE("FEIL ".mysql_error());
					if(!$sql){
						echo "An error appeared while trying to delete the match.";
					} else {
						echo "<font size=\"1\" face=\"tahoma\">&nbsp; Match deleted</font>";
						echo "<meta http-equiv=\"Refresh\" content=\"3;url=index2.php?action=matches\">";
					}
		}
	}
}

function editmatch($id){
	if(isset($_COOKIE['online']) && ($_COOKIE['user_lvl'] >= 7)){
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
if(isset($_POST['submit'])){
$id = $_GET['id'];
$opponent = $_POST['opponent'];
$usl = $_POST['usl'];
$el = $_POST['el'];
$us = $_POST['us'];
$them = $_POST['them'];
$maps = $_POST['maps'];
$event = $_POST['event'];
$report = $_POST['report'];


$update_table1 = mysql_query("UPDATE matches SET opponent='$opponent', usl='$usl', el='$el', us='$us', them='$them', maps='$maps', event='$event', report='$report' WHERE id='$id'") or DIE("FEIL ".mysql_error());
echo "<br><br>";
echo "Match succesfully edited.<br>";
echo "<a href=\"index2.php?action=matches\">Back to matches index</a>";
} else {
$sql = "SELECT * FROM matches WHERE id='$id'";
$result = mysql_query($sql) or DIE("FEIL ".mysql_error());
while($r=mysql_fetch_array($result)){
        $id = $r['id'];
	$opponent = $r['opponent'];
	$usl = $r['usl'];
	$el = $r['el'];
	$us = $r['us'];
	$them = $r['them'];
	$maps = $r['maps'];
	$event = $r['event'];
	$report = $r['report'];
echo "<form action=\"?action=editmatch&id=".$id."\" method=\"post\">";
echo "<input type=\"hidden\" name=\"id\" value=\"\"><br>";
echo "<table width=\"90%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\" align=\"center\">";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Northern* lineup:</td></font>";
echo "  <td><input type=\"text\" name=\"usl\" value=\"".$usl."\" size=\"30\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Enemy clan name (Shortened. ex SK)</td></font>";
echo "  <td><input type=\"text\" name=\"opponent\" value=\"".$opponent."\" size=\"32\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Enemy lineup</td></font>";
echo "  <td><input type=\"text\" name=\"el\" value=\"".$el."\" size=\"30\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Northern* score</td></font>";
echo "  <td><input type=\"text\" name=\"us\" value=\"".$us."\" size=\"20\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Enemy score</td></font>";
echo "  <td><input type=\"text\" name=\"them\" value=\"".$them."\" size=\"20\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Map</td></font>";
echo "  <td><input type=\"text\" name=\"maps\" value=\"".$maps."\" size=\"30\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Event</td></font>";
echo "  <td><input type=\"text\" name=\"event\" value=\"".$event."\" size=\"30\"></td>";
echo "</tr>";
echo "<tr>";
echo "  <td><font size=\"1\" face=\"tahoma\">Report</td></font>";
echo "  <td><textarea name=\"report\" rows=\"12\" cols=\"35\" style=\"width: 350px\">".$report."</textarea></td>";
echo "</tr>";
echo "<tr>";
echo "  <td>&nbsp;</td>";
echo "  <td><input type=\"submit\" name=\"submit\" value=\"Post\"></td>";
echo "</tr></form>";
echo "</table>";
}
}
}
}

function addmatch() {
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;";
	if(isset($_COOKIE['online']) || ($_COOKIE['user_lvl'] >= 8)){
		if(isset($_POST['submit'])){
			$opponent = $_POST['opponent'];
			$usl = $_POST['usl'];
			$el = $_POST['el'];
			$us = $_POST['us'];
			$them = $_POST['them'];
			$maps = $_POST['maps'];
			$event = $_POST['event'];
			$report = $_POST['report'];
			$report = str_replace("\n", "<br>", $report);
			$update_table1 = mysql_query("INSERT INTO matches (date, opponent, event, maps, us, them, usl, el, report) VALUES (now(), '$opponent', '$event', '$maps', '$us', '$them', '$usl', '$el', '$report')") or DIE("FEIL ".mysql_error());
		} else {
?>
<table cellspacing=0 cellpadding=0 border=0 width=458>
<tr>
<td valign="top" width=458>

<form method="post">
<p><b><font size=2" face="tahoma">&nbsp; Northern* lineup:</b></font><br>
          &nbsp; <input name="usl" value="" size=32 maxlength=32>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Enemy clan name:</b><br>
          &nbsp; Clan name. Example: Ninjas in Pyjamas</font><br>
          &nbsp; <input name="opponent" value="" size=32 maxlength=32>
          <br>
		  <b><font size=2" face="tahoma">&nbsp; Enemy linepu:</b></font><br>
          &nbsp; <input name="el" value="" size=32 maxlength=32>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Northern* Score:</b><br>
          &nbsp;  <input name="us" value="" size=20 maxlength=2>
          <br>
          <br>
		  <br>
		  &nbsp; <b><font size=2" face="tahoma">Enemy Score:</b><br>
          &nbsp;  <input name="them" value="" size=20 maxlength=2>
          <br>
		  <br>
		  <br>
          &nbsp; <b><font size="2" face="tahoma">Map </font></b><br>
          &nbsp; <input name="maps" value="" size=20 maxlength=32>
          <br>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Event</font></b><br>
		  &nbsp; <input name="event" value="" size=20 maxlength=32>
          <br>
          <br>
          <br>
          &nbsp; <b><font size=2" face="tahoma">Report</b></font><br>
          &nbsp; <textarea name="report" rows=12 cols=35 style="width: 350px"></textarea>
        <p>
&nbsp; <input type="submit" name="submit" value="Submit">
</form>
</td>
</table>
</body>
<?
		}
	}
}
?>