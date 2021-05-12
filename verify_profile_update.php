<?
require("config.php");
echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\">
<p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>
&nbsp;<font size=\2\" face=\"tahoma\">";
if(isset($_COOKIE['online'])){
	if(isset($_POST['submit'])){
		if(empty($_POST['country'])){
			echo "You must select witch country you are from!";
			exit();
		}
		$id = $_POST['id'];
		$username = $_COOKIE['username'];
		$email = $_POST['email'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$age = $_POST['age'];
		$gameres = $_POST['gameres'];
		$gamesens = $_POST['gamesens'];
		$winsens = $_POST['winsens'];
		$country = $_POST['country'];
		$info = $_POST['info'];
		$info = strip_tags($info);
		$info = str_replace("\n", "<br>", $info);
		$info = str_replace("[b]", "<b>", $info);
		$info = str_replace("[/b]", "</b>", $info);
		$info = str_replace("[i]", "<i>", $info);
		$info = str_replace("[/i]", "</i>", $info);
		$info = str_replace("[small]", "<small>", $info);
		$info = str_replace("[/small]", "</small>", $info);
		$motherboard = $_POST['motherboard'];
		$mouse = $_POST['mouse'];
		$mousepad = $_POST['mousepad'];
		$headphones = $_POST['headphones'];
		$monitor = $_POST['monitor'];
		$cpu = $_POST['cpu'];
		$mem = $_POST['mem'];
		$gfxcard = $_POST['gfxcard'];
		$os = $_POST['os'];
		$soundcard = $_POST['soundcard'];
		$connection = $_POST['connection'];
		
		$country_sql = "SELECT * FROM country WHERE id='$country'";
		$country_result = mysql_query($country_sql) or DIE("Feil ".mysql_error());
		while($c=mysql_fetch_array($country_result)){
			$country = $c['name'];

		if(isset($_FILES['pfile'])){
			$storeDir = '/hsphere/local/home/ninja/mestninja.com/north/user_img/';
			$contentTypes = array('image/jpeg', 'image/gif');

			$filename = $_FILES['pfile']['name'];
			$tempName = $_FILES['pfile']['tmp_name'];
			$fileType = $_FILES['pfile']['type'];
			$fileSize = $_FILES['pfile']['size'];
				if(in_array($fileType, $contentTypes)){
					if($fileSize > 250000){ 
						echo "<p>The picture is larger than the 250kb limit"; 
						exit(); 
					} 
					if(move_uploaded_file($tempName, $storeDir.$filename)){
						print("<h1>File was succesfully uploaded</h1>");
					}

				} else print 'Incorrect filetype';

				$path_parts = pathinfo($filename);
				$ext = $path_parts["extension"];
				$new_img_name = $id.".".$ext;
				rename($storeDir.$filename, $storeDir.$new_img_name);

				$user_pic = "user_img/".$id.".".$ext;
				$update_pic = mysql_query("UPDATE users SET user_pic='$user_pic' WHERE id='$id'") or DIE("Feil ".mysql_error());
		}
		if(isset($_FILES['cfile'])){
			$storeDir = '/hsphere/local/home/ninja/mestninja.com/north/user_cfg/';
			$contentTypes = array('application/x-zip');

			$filename = $_FILES['cfile']['name'];
			$tempName = $_FILES['cfile']['tmp_name'];
			$fileType = $_FILES['cfile']['type'];
			$fileSize = $_FILES['cfile']['size'];
				if(in_array($fileType, $contentTypes)){
					if($fileSize > 10000){ 
						echo "<p>The .zip file is larger than the 10kb limit";
						exit();
					} 
					if(move_uploaded_file($tempName, $storeDir.$filename)){
						print("<h1>File was succesfully uploaded</h1>");
					}

				} else { print 'Incorrect filetype'; }
				
				$path_parts = pathinfo($filename);
				$ext = $path_parts["extension"];
				$new_cfg_name = $id.".".$ext;
				rename($storeDir.$filename, $storeDir.$new_cfg_name);
				$cfgpath = "user_cfg/".$id.".".$ext;
				$update_cfg = mysql_query("UPDATE users SET user_cfg='$cfgpath' WHERE id='$id'") or DIE("ERROR ".mysql_error());
		}
				$update_table1 = mysql_query("UPDATE users SET username='$username', country='$country', mail='$email', lastname='$lastname', firstname='$firstname', age='$age', gameres='$gameres', gamesens='$gamesens', winsens='$winsens', info='$info' WHERE id='$id'") or DIE("FEIL ".mysql_error());

				$update_table2 = mysql_query("UPDATE users SET motherboard='$motherboard', mouse='$mouse', mousepad='$mousepad', headphones='$headphones', monitor='$monitor', cpu='$cpu', mem='$mem', gfxcard='$gfxcard', os='$os', soundcard='$soundcard', connection='$connection' WHERE id='$id'") or DIE("FEIL ".mysql_error());
		}
		echo "&nbsp; Profile updated<br><br>";
		echo "&nbsp; <a href=\"index2.php?action=members&disp=".$_COOKIE['online']."\">Back to member page</a>";
		echo "</font></table></body>";
	}
}

?>