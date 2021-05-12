<?
$maxfilesize = 1000; #filesize in kbyte
$storeDir = '/home/tyken/web/www.tyken.net/images/';
$contentTypes = array('image/jpeg', 'image/gif', 'application/x-zip-compressed');

echo "<body topmargin=\"0\" leftmargin=\"0\" background=\"images/middlebg.jpg\" text=\"#FFFFFF\" link=\"#86BEF7\" vlink=\"#83C1F5\" alink=\"#2567BB\"><p><img border=\"0\" src=\"images/northernstartop.jpg\" width=\"503\" height=\"17\"></p>&nbsp;";

//Hvis skjemaet er brukt
if(isset($_POST['submit'])) {
    //Lagre fil variablene i enklere og mer forståelige navn
    $filename1 = $_FILES['pfile']['name'];
    $tempName1 = $_FILES['pfile']['tmp_name'];
    $fileType1 = $_FILES['pfile']['type'];
    $fileSize1 = $_FILES['pfile']['size'];

	$filename2 = $_FILES['cfile']['name'];
    $tempName2 = $_FILES['cfile']['tmp_name'];
    $fileType2 = $_FILES['cfile']['type'];
    $fileSize2 = $_FILES['cfile']['size'];

        //Sjekk om filtypen finnes i tabellen som inneholder de godkjente file typene
        if (in_array($fileType1, $contentTypes) && in_array($fileType2, $contentTypes)){
            //Sjekk om filstørrelsen er for stor
            if ($fileSize1 <= ($maxFileSize * 1024) && $fileSize2 <= ($maxFileSize * 1024)){
                //Flytt fila fra temp mappen til lagrings mappen
                if (move_uploaded_file($tempName1, $storeDir.$filename1) && move_uploaded_file($teamName2, $storeDir.$filename2)){
                    print("<h1>Files Stored</h1>");
                }
                else print 'File could not be moved';
            }
            else print 'File is to large';
        }
        else print 'Wrong filetype';
    }
else {
echo "<table cellspacing=0 cellpadding=0 border=0 width=504>
  <tr>
<td width=1><img src=\"img/pix.gif" width=1 height=1></td>
    <td valign=\"top\" style=\"padding: 8px\" width=644 class=\"LargeText\"> 
      <p>

<b>My Info</b><p>
<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" enctype=\"multipart/form-data\">
        <p>
		  <input type=\"hidden\" name=\"id\" value=\"".$r['id']."\">
          <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".$my_max_file_size."\">
          <b<font size=\"1\" face=\"tahoma\">>Nick</b> (only A-Z and 0-9 allowed)<br></font>
          <input name=\"nick\" value=\"\" size=24 maxlength=32>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Email</b> (<small>not public)</small><br></font>
          <input name=\"email\" value=\"".$r['mail']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">First name</b><br></font>
          <input name=\"name\" value=\"".$r['name']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Location</b><br></font>
          <input name=\"location\" value=\"".$r['location']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Age</b><br></font>
          <input name=\"age\" value=\"".$r['age']."\" size=10 maxlength=2>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Played Since</b><br></font>
          <input name=\"played\" value=\"".$r['played_since']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Former Clans</b><br></font>
          <input name=\"former\" value=\"".$r['former_clans']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Game Resolution</b><br></font>
          <input name=\"gameres\" value=\"".$r['game_resolution']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">Game Sensitivity</b><br></font>
          <input name=\"gamesens\" value=\"".$r['game_sens']."\" size=48 maxlength=128>
          <br>
          <b><font size=\"1\" face=\"tahoma\">GFX Card</b><br></font>
          <input name=\"gfxcard\" value=\"".$r['gfx']."\" size=48 maxlength=128>
          <br>
        </p>
        <p> <b>Password</b></p>
        <p>

<b><font size=\"1\" face=\"tahoma\">New password</b><br></font>
<input name=\"password\" size=16 maxlength=16><br>
<b><font size=\"1\" face=\"tahoma\">Retype new password</b><br></font>
<input name=\"password2\" size=16 maxlength=16>
<p>
<b><font size=\"1\" face=\"tahoma\">Image (".$image_max_width."x".$image_max_height." gif/jpg):</b><br></font>
<input type=\"file\" name=\"pfile\" style=\"width:350px\"><br>
<font size=\"1\" face=\"tahoma\">Del image</font> <input type=checkbox name=pdel value=1>
        <p> <b><font size=\"1\" face=\"tahoma\">Config (.zip Maximum file size: 10KB):</b><br></font>
          <input type=\"file\" name=\"cfile\" style=\"width:350px\">
          <br>
          <font size=\"1\" face=\"tahoma\">Del config </font>
          <input type=checkbox name=cdel value=1>
        <p>
<input type=\"submit\" value=\"Save\">
</form></td></table></body>";
    ?>