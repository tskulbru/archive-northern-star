<?
require('config.php');
if(isset($_POST['submit'])){
if((!$_POST['username']) || (!$_POST['password'])){
		 if(!headers_sent()) {
		 header("Location: error.php");
		 }
	 }

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$sql2 = mysql_query("SELECT * FROM users where username='$username' AND password='$password'");
	$sql_check_num = mysql_num_rows($sql2); 
	if($sql_check_num < 0){
		if(!headers_sent()) {
		header("Location: error.php");
		}
	} else {
	$user_array = mysql_fetch_array($sql2);
	$uid = $user_array['id'];
	$user_lvl = $user_array['user_lvl'];
	setcookie("online", $uid,time()+(3600*24*7), "/", '', 0);
	setcookie("username", $username,time()+(3600*24*7), "/", '', 0);
	setcookie("user_lvl", $user_lvl,time()+(3600*24*7), "/", '', 0);
	header("Location: index.php");
	}
}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>NorthernStar</title>
<script language="JavaScript" fptype="dynamicanimation">
<!--
function dynAnimation() {}
function clickSwapImg() {}
//-->
</script>
<script language="JavaScript1.2" fptype="dynamicanimation" src="images/animate.js">
</script>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body text="#FFFFFF" bgcolor="#565656" topmargin="50" leftmargin="100" onload="dynAnimation()" language="Javascript1.2">

<table border="0" cellspacing="0" cellpadding="0" width="758" height="668">
  <tr> 
    <td height="6" width="144" valign="top"> <img border="0" src="images/topleft.jpg" width="143" height="6"></td>
    <td height="175" width="132" valign="top" rowspan="3"> <img border="0" src="images/logoleft.jpg" width="112" height="175"></td>
    <td height="175" width="503" valign="top" rowspan="3"> <img border="0" src="images/logoright.jpg" width="503" height="175"></td>
  </tr>
  <tr> 
    <td height="163" valign="top" background="images/topleftbg.jpg" width="144"> 
      <? include("login.php");
echo "<table width=\"90%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\">";
echo "<tr><td valign=\"top\"><font size=\"2\" face=\"tahoma\">";
if(isset($_COOKIE['online'])){
    echo "<font size=\"1\" face=\"tahoma\">";
	echo "Nick: ".$_COOKIE['username']."<br />";
	echo "<a href=\"logout.php\">Log out</a>.<br />";
	echo "<br />";
	echo "</font>";
	}
if($_COOKIE['user_lvl'] >= "7"){
    echo "<font size=\"1\" face=\"tahoma\">";
	echo "Admin menu:";
	echo "<br />";
	echo "<a href=\"index2.php?action=editprofile\" target=\"middle\"><b>- Edit profile</b></a><br />";
	echo "<a href=\"index2.php?action=addnews\" target=\"middle\">- Add news</a><br />";
	echo "<a href=\"index2.php?action=adddemo\" target=\"middle\">- Add demo</a><br />";
	echo "<a href=\"index2.php?action=addmatch\" target=\"middle\">- Add war</a><br />";
	echo "<a href=\"awards.php?=add\">- Add award</a><br />";
	echo "<a href=\"downloads.php=?add\">- Add Download</a><br />";
	echo "</font>";
	}
echo "</font></td></tr></table>";
?>
      <p><font size="1" face="tahoma"> </font></p>
    </td>
  </tr>
  <tr> 
    <td height="6" width="144" valign="top"> <img border="0" src="images/topbottom.jpg" width="143" height="6"></td>
  </tr>
  <tr> 
    <td height="115" width="144" valign="top" background="images/leftmenubg.jpg"> 
      <img border="0" src="images/maintop.jpg" width="143" height="16"><br>
      <a onmouseover="var img=document['fpAnimswapImgFP1'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP1'].src=document['fpAnimswapImgFP1'].imgRolln" href="index.php"> 
      <img border="0" src="images/home.jpg" width="143" height="10" id="fpAnimswapImgFP1" name="fpAnimswapImgFP1" dynamicanimation="fpAnimswapImgFP1" lowsrc="images/home2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP2'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP2'].src=document['fpAnimswapImgFP2'].imgRolln" href="index.php?action=archive"> 
      <img border="0" src="images/archive.jpg" width="143" height="10" id="fpAnimswapImgFP2" name="fpAnimswapImgFP2" dynamicanimation="fpAnimswapImgFP2" lowsrc="images/archive2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP3'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP3'].src=document['fpAnimswapImgFP3'].imgRolln" href="index.php"> 
      <img border="0" src="images/features.jpg" width="143" height="10" id="fpAnimswapImgFP3" name="fpAnimswapImgFP3" dynamicanimation="fpAnimswapImgFP3" lowsrc="images/features2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP4'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP4'].src=document['fpAnimswapImgFP4'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/coverage.jpg" width="143" height="10" id="fpAnimswapImgFP4" name="fpAnimswapImgFP4" dynamicanimation="fpAnimswapImgFP4" lowsrc="images/coverage2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP5'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP5'].src=document['fpAnimswapImgFP5'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/downloads.jpg" width="143" height="10" id="fpAnimswapImgFP5" name="fpAnimswapImgFP5" dynamicanimation="fpAnimswapImgFP5" lowsrc="images/downloads2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP6'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP6'].src=document['fpAnimswapImgFP6'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/forum.jpg" width="143" height="10" id="fpAnimswapImgFP6" name="fpAnimswapImgFP6" dynamicanimation="fpAnimswapImgFP6" lowsrc="images/forum2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP7'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP7'].src=document['fpAnimswapImgFP7'].imgRolln" href="index.php?action=demo"> 
      <img border="0" src="images/demos.jpg" width="143" height="10" id="fpAnimswapImgFP7" name="fpAnimswapImgFP7" dynamicanimation="fpAnimswapImgFP7" lowsrc="images/demos2.jpg"></a></td>
    <td height="216" width="132" valign="top" rowspan="3" background="images/2ndmenubg.jpg"> 
     <img border="0" src="images/latestnewstop.jpg" width="112" height="17"><br>
      <? $news_title_sql = "SELECT * FROM news ORDER by id DESC LIMIT 10";
	$news_title_res = mysql_query($news_title_sql) or die("ERROR ".mysql_error());
	
	while($r=mysql_fetch_array($news_title_res)){
		$title = $r['title'];
		$id = $r['id'];
echo "&nbsp;&nbsp;<font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=news&disp=".$id."\" target=\"middle\">".$title."</a></font><br>"; } ?>
    </td>
    <td width="503" valign="top" background="images/middlebg.jpg" rowspan="5"> 
      <?
		$page = $_GET['action'];
		if(!isset($_GET['action'])){
			echo "<iframe height=\"600\" width=\"503\" src=\"index2.php\" frameborder=2 name=\"middle\"></iframe></td>";
		}else{
			echo "<iframe height=\"600\" width=\"503\" src=\"index2.php?action=".$page. "\"frameborder=2 name=\"middle\"></iframe></td>";
		} if(!empty($_GET['disp'])){
			$page2 = $_GET['disp'];
			echo "<iframe height=\"450\" width=\"503\" src=\"index2.php?action=".$page."&disp=".$page2."\"frameborder=2 name=\"middle\"></iframe></td>";
		}
		?>
  </tr>
  <tr> 
    <td height="104" width="144" valign="top" background="images/leftmenubg.jpg"> 
      <img border="0" src="images/teamtop.jpg" width="143" height="18"><br>
      <a onmouseover="var img=document['fpAnimswapImgFP8'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP8'].src=document['fpAnimswapImgFP8'].imgRolln" href="index.php?action=members"> 
      <img border="0" src="images/members.jpg" width="143" height="10" id="fpAnimswapImgFP8" name="fpAnimswapImgFP8" dynamicanimation="fpAnimswapImgFP8" lowsrc="images/members2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" href="index.php?action=matches"> 
      <img border="0" src="images/matches.jpg" width="143" height="10" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="images/matches2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP10'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP10'].src=document['fpAnimswapImgFP10'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/calendar.jpg" width="143" height="10" id="fpAnimswapImgFP10" name="fpAnimswapImgFP10" dynamicanimation="fpAnimswapImgFP10" lowsrc="images/calendar2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP11'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP11'].src=document['fpAnimswapImgFP11'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/awards.jpg" width="143" height="10" id="fpAnimswapImgFP11" name="fpAnimswapImgFP11" dynamicanimation="fpAnimswapImgFP11" lowsrc="images/awards2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP12'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP12'].src=document['fpAnimswapImgFP12'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/partners.jpg" width="143" height="10" id="fpAnimswapImgFP12" name="fpAnimswapImgFP12" dynamicanimation="fpAnimswapImgFP12" lowsrc="images/partners2.jpg"></a><br>
      <a onmouseover="var img=document['fpAnimswapImgFP13'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP13'].src=document['fpAnimswapImgFP13'].imgRolln" href="javascript:void(0)"> 
      <img border="0" src="images/contact.jpg" width="143" height="10" id="fpAnimswapImgFP13" name="fpAnimswapImgFP13" dynamicanimation="fpAnimswapImgFP13" lowsrc="images/contact2.jpg"></a></td>
  </tr>
  <tr> 
    <td width="144" valign="top" rowspan="3" background="images/leftmenubg.jpg"> 
      <img border="0" src="images/latestforumtop.jpg" width="143" height="16"><br>
      &nbsp; <font face="tahoma" size="1">Not up yet.</font></td>
  </tr>
  <tr> 
    <td height="107" width="132" valign="top" background="images/2ndmenubg.jpg"> <font size="2"> 
      <img border="0" src="images/latestwarstop.jpg" width="112" height="19"><br>
	  <? $match_sql = "SELECT * FROM matches ORDER by id DESC";
		 $match_res = mysql_query($match_sql);
		 		if(mysql_num_rows($match_res) == 0){
				 echo "&nbsp; <font size=\"1\" face=\"tahoma\">No matches</font";
			 }
		 while($m=mysql_fetch_array($match_res)){
			 $opponent = $m['opponent'];
			 $them = $m['them'];
			 $us = $m['us'];
			 $id = $m['id'];

echo "&nbsp; <font size=\"1\" face=\"tahoma\"><a href=\"index2.php?action=matches&id=".$id."\" target=\"middle\">";
 if ($us > $them) { 
  echo "<font color=\"#00FF00\">"; echo $us; echo "</font> - <font color=\"#FF0000\">"; echo $them; echo "</font>"; 
 } 
 if ($them > $us) {
  echo "<font color=\"#FF0000\">"; echo $us; echo "</font> - <font color=\"#00FF00\">"; echo $them."</font>"; 
 } 
 if ($them == $us) {
  echo "<font color=\"#0080FF\">"; echo $us; echo " - "; echo $them."</font>"; 
}
echo "</a> vs ".$opponent."<br>";
		 }
?>
  </tr>
  <tr> 
    <td height="273" width="132" valign="top" background="images/2ndmenubg.jpg"> 
      <img border="0" src="images/sponsorstop.jpg" width="112" height="19"><br>
      &nbsp; <font face="tahoma" size="1">someone.</font></td>
  </tr>
  <tr> 
    <td height="17" width="144" valign="top"> <img border="0" src="images/leftbottom.jpg" width="143" height="17"></td>
    <td height="17" width="132" valign="top"> <img border="0" src="images/2ndleftbottom.jpg" width="112" height="17"></td>
    <td height="17" width="503" valign="top"> <img border="0" src="images/middlebottom.jpg" width="503" height="16"></td>
  </tr>
  <tr> 
    <td height="43" valign="middle" colspan="3" background="images/bottom.jpg"> 
      <p align="center"><br>
        <font size="1" face="tahoma"> 
        <?php 
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime; 

// Her kommer selve siden 

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
printf("Generated in %f seconds.", $totaltime); 
?>
        </font> 
    </td>
  </tr>
</table>

</body>

</html>
