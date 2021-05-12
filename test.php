<?
include('config.php');
$query3 = "SELECT * FROM matches WHERE 'us' > 'them'";
$result3 = mysql_query($query3) or die ("Feil: ".mysql_error());

while($r=mysql_fetch_array($result3)){
 $id = $r['id'];
 $opponent = $r['opponent'];

echo "ID: ".$id."<br>Motstander: ".$opponent."<br>";
}
?>