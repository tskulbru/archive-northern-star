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
	setcookie("online", $uid,time()+3600, "/", '', 0);
	setcookie("username", $username,time()+3600, "/", '', 0);
	setcookie("user_lvl", $user_lvl,time()+3600, "/", '', 0);
	header("Location: index.php");
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="no">
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
</head>

<body text="#FFFFFF" bgcolor="#565656" topmargin="50" leftmargin="100" link="#86BEF7" vlink="#83C1F5" alink="#2567BB" onload="dynAnimation()" language="Javascript1.2">

<table border="0" cellspacing="0" cellpadding="0" width="758" height="668">
 <tr>
  <td height="6" width="143" valign="top">
  <img border="0" src="images/topleft.jpg" width="143" height="6"></td>
  <td height="175" width="112" valign="top" rowspan="7">
  <img border="0" src="images/logoleft.jpg" width="112" height="175"></td>
  <td height="175" width="503" valign="top" rowspan="7" colspan="2">
  <img border="0" src="images/logoright.jpg" width="503" height="175"></td>
 </tr>
<tr>
		<td height="113" width="143" valign="top" background="images/topleftbg.jpg">
<? include("login.php"); 
echo "<table width=\"90%\" cellspacing=\"2\" cellpadding=\"2\" border=\"0\">";
echo "<tr><td valign=\"top\"><font size=\"2\" face=\"tahoma\">";
if(isset($_COOKIE['online'])){
	echo "Nick: ".$_COOKIE['username']."<br />";
	echo "<a href=\"logout.php\">Log out</a>.<br />";
	echo "<br />";
	}
if($_COOKIE['user_lvl'] >= "8"){
	echo "Admin menu:";
	echo "<br />";
	echo "<a href=\"index.php?action=addnews\">- Add news</a><br />";
	echo "<a href=\"index.php?action=adddemo\">- Add demo</a><br />";
	echo "<a href=\"war.php?acction=addwar\">- Add war</a><br />";
	echo "<a href=\"awards.php?=add\">- Add award</a><br />";
	echo "<a href=\"downloads.php=?add\">-Add Download</a><br />";
	}
echo "</font></td></tr></table>";
?>
		</td>
	</tr>
	<tr>
		<td height="9" width="143" valign="top" background="images/topleftbg.jpg">
		<font size="2">
		<img border="0" src="images/topmiddle.jpg" width="143" height="9"></font></td>
	</tr>
	<tr>
		<td height="17" width="143" valign="top" background="images/topleftbg.jpg"></td>
	</tr>
	<tr>
		<td height="9" width="143" valign="top" background="images/topleftbg.jpg"></td>
	</tr>
	<tr>
		<td height="15" width="143" valign="top" background="images/topleftbg.jpg">
		<font size="2">&nbsp; Search Box: [<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</u>]</font></td>
	</tr>
 <tr>
  <td height="6" width="143" valign="top">
   <img border="0" src="images/topbottom.jpg" width="143" height="6"></td>
 </tr>
 <tr>
<!-- menu start --> 
  <td height="115" width="143" valign="top" background="images/leftmenubg.jpg" rowspan="4">
<img border="0" src="images/maintop.jpg" width="143" height="16"><br>
<a onmouseover="var img=document['fpAnimswapImgFP1'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP1'].src=document['fpAnimswapImgFP1'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/home.jpg" width="143" height="10" id="fpAnimswapImgFP1" name="fpAnimswapImgFP1" dynamicanimation="fpAnimswapImgFP1" lowsrc="images/home2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP2'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP2'].src=document['fpAnimswapImgFP2'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/archive.jpg" width="143" height="10" id="fpAnimswapImgFP2" name="fpAnimswapImgFP2" dynamicanimation="fpAnimswapImgFP2" lowsrc="images/archive2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP3'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP3'].src=document['fpAnimswapImgFP3'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/features.jpg" width="143" height="10" id="fpAnimswapImgFP3" name="fpAnimswapImgFP3" dynamicanimation="fpAnimswapImgFP3" lowsrc="images/features2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP4'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP4'].src=document['fpAnimswapImgFP4'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/coverage.jpg" width="143" height="10" id="fpAnimswapImgFP4" name="fpAnimswapImgFP4" dynamicanimation="fpAnimswapImgFP4" lowsrc="images/coverage2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP5'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP5'].src=document['fpAnimswapImgFP5'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/downloads.jpg" width="143" height="10" id="fpAnimswapImgFP5" name="fpAnimswapImgFP5" dynamicanimation="fpAnimswapImgFP5" lowsrc="images/downloads2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP6'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP6'].src=document['fpAnimswapImgFP6'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/forum.jpg" width="143" height="10" id="fpAnimswapImgFP6" name="fpAnimswapImgFP6" dynamicanimation="fpAnimswapImgFP6" lowsrc="images/forum2.jpg"></a><br>
<a onmouseover="var img=document['fpAnimswapImgFP7'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP7'].src=document['fpAnimswapImgFP7'].imgRolln" href="javascript:void(0)">
<img border="0" src="images/demos.jpg" width="143" height="10" id="fpAnimswapImgFP7" name="fpAnimswapImgFP7" dynamicanimation="fpAnimswapImgFP7" lowsrc="images/demos2.jpg"></a></td>
<!-- menu slutt -->

  <td height="216" width="112" valign="top" rowspan="6" background="images/2ndmenubg.jpg">
   <font size="1" face="tahoma">
	<img border="0" src="images/latestnewstop.jpg" width="112" height="17"><br>
    &nbsp; Bla bla bla</font></td>
  <td width="503" valign="top" background="images/middlebg.jpg" height="84" colspan="2">
   <img border="0" src="images/northernstartop.jpg" width="503" height="17"><br>
   &nbsp;</td>
 </tr>
 <tr>
  <td width="47" valign="top" background="images/middlebg.jpg" height="31" rowspan="3">
   <img border="0" src="images/middlethingleft.jpg" width="47" height="31"></td>
  <td width="456" valign="top" height="3">
   <img border="0" src="images/middlethingtop.jpg" width="456" height="3"></td>
 </tr>
 <tr>
  <td width="456" height="25" background="images/middlethingbg.jpg">
   <font size="1" face="tahoma">&nbsp;News 24.10-2003 - New site</font></td>
 </tr>
 <tr>
  <td width="456" valign="top" height="3">
   <img border="0" src="images/middlethingbottom.jpg" width="456" height="3"></td>
 </tr>
 <tr>
  <td height="104" width="143" valign="top" background="images/leftmenubg.jpg">
   <img border="0" src="images/teamtop.jpg" width="143" height="18"><br>
	<a onmouseover="var img=document['fpAnimswapImgFP8'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP8'].src=document['fpAnimswapImgFP8'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/members.jpg" width="143" height="10" id="fpAnimswapImgFP8" name="fpAnimswapImgFP8" dynamicanimation="fpAnimswapImgFP8" lowsrc="images/members2.jpg"></a><br>
	<a onmouseover="var img=document['fpAnimswapImgFP9'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP9'].src=document['fpAnimswapImgFP9'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/matches.jpg" width="143" height="10" id="fpAnimswapImgFP9" name="fpAnimswapImgFP9" dynamicanimation="fpAnimswapImgFP9" lowsrc="images/matches2.jpg"></a><br>
	<a onmouseover="var img=document['fpAnimswapImgFP10'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP10'].src=document['fpAnimswapImgFP10'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/calendar.jpg" width="143" height="10" id="fpAnimswapImgFP10" name="fpAnimswapImgFP10" dynamicanimation="fpAnimswapImgFP10" lowsrc="images/calendar2.jpg"></a><br>
	<a onmouseover="var img=document['fpAnimswapImgFP11'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP11'].src=document['fpAnimswapImgFP11'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/awards.jpg" width="143" height="10" id="fpAnimswapImgFP11" name="fpAnimswapImgFP11" dynamicanimation="fpAnimswapImgFP11" lowsrc="images/awards2.jpg"></a><br>
	<a onmouseover="var img=document['fpAnimswapImgFP12'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP12'].src=document['fpAnimswapImgFP12'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/partners.jpg" width="143" height="10" id="fpAnimswapImgFP12" name="fpAnimswapImgFP12" dynamicanimation="fpAnimswapImgFP12" lowsrc="images/partners2.jpg"></a><br>
	<a onmouseover="var img=document['fpAnimswapImgFP13'];img.imgRolln=img.src;img.src=img.lowsrc?img.lowsrc:img.getAttribute?img.getAttribute('lowsrc'):img.src;" onmouseout="document['fpAnimswapImgFP13'].src=document['fpAnimswapImgFP13'].imgRolln" href="javascript:void(0)">
   <img border="0" src="images/contact.jpg" width="143" height="10" id="fpAnimswapImgFP13" name="fpAnimswapImgFP13" dynamicanimation="fpAnimswapImgFP13" lowsrc="images/contact2.jpg"></a></td>
  <td width="47" rowspan="4" valign="top" background="images/middlebg.jpg">&nbsp; <font size="1" face="tahoma">
</font></td>
  <td width="456" rowspan="4" valign="top" background="images/middlebg2.jpg">
<?
switch ($_GET['action']){
case 'register':
?>
<table width="90%" cellspacing="1" cellpadding="0" border="0">
    <tr><td>&nbsp; <font size="1" face="tahoma"><b>Register:</b><br>
	&nbsp; To fully use the NorthernStar system you need to register as a member. Every field needs to be filled out. <br><br></font></td>
	<tr>
	<td>&nbsp; <font size="1" face="tahoma">Nick (without clantag)</font></td>
	</tr>
	<tr><form action="index.php?action=register" method="post">
     <td>&nbsp; <input type="text" name="username" style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp; <font size="1" face="tahoma">Password</font></td></tr>
    <tr>
     <td>&nbsp; <input type="password" name="password"  style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp; <font size="1" face="tahoma">Email address (must be valid)</font></td></tr>
	<tr> 
	<td>&nbsp; <input type="text" name="mail"  style="FONT-SIZE: 12px; WIDTH: 150px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr>
     <td>&nbsp; <input type="submit" name="submit"  style="FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7">
	 </form>
   </table>
<?
break;
case 'lostpw':
?>  
<table width="90%" cellspacing="1" cellpadding="0" border="0">
    <tr><td>&nbsp; <font size="1" face="tahoma"><b>Lost my password</b><br>
	&nbsp; If you are a member but do not remember your password, enter your username below and submit. <br>
	&nbsp; The password will be emailed to that user: <br><br></font></td>
	<tr>
	<td>&nbsp; <font size="1" face="tahoma">Username</font></td>
	</tr>
	<tr><form action="index.php?action=lostpw method="post">
     <td>&nbsp; <input type="text" name="username" style="FONT-SIZE: 12px; WIDTH: 100px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7"></td>
    </tr>
	<tr><td>&nbsp; </td></tr>
	<tr>
     <td>&nbsp; <input type="submit" name="submit"  style="FONT-SIZE: 12px; WIDTH: 70px; FONT-FAMILY: tahoma; BACKGROUND-COLOR: #C1D6E7">
   </form>
   </table>
<? break; } ?>
</td>
 </tr>
 <tr>
  <td width="143" valign="top" rowspan="3" background="images/leftmenubg.jpg">
<!-- lastest forum -->
	<img border="0" src="images/latestforumtop.jpg" width="143" height="16"><br>
	<font size="1" face="tahoma">&nbsp; heh heh heh.</font>
<!-- lastest forum end -->
  </td>
 </tr>
 <tr>
  <td height="107" width="112" valign="top" background="images/2ndmenubg.jpg">
   <font size="1" face="tahoma">
	<img border="0" src="images/latestwarstop.jpg" width="112" height="19"><br>
    &nbsp; X-Pec - 
	 <font color="#00FF00">24 - 00</font></font></td>
 </tr>
 <tr>
  <td height="106" width="112" valign="top" background="images/2ndmenubg.jpg">
	<font size="1" face="tahoma">
	 <img border="0" src="images/sponsorstop.jpg" width="112" height="19"><br>
     &nbsp; someone.</font></td>
 </tr>
 <tr>
  <td height="17" width="143" valign="top">
	<img border="0" src="images/leftbottom.jpg" width="143" height="17"></td>
  <td height="17" width="112" valign="top">
	<img border="0" src="images/2ndleftbottom.jpg" width="112" height="17"></td>
  <td height="17" width="503" valign="top" colspan="2">
	<img border="0" src="images/middlebottom.jpg" width="503" height="16"></td>
 </tr>
 <tr>
  <td height="43" width="758" valign="middle" colspan="4" background="images/bottom.jpg">
   <p align="center"><br>
   <font size="1" face="tahoma">
   </font>
  </td>
 </tr>
</table>
</body>
</html>
