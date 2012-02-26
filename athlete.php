<?php
require_once("main.php");

/*applique la suppression*/
if($_GET['action']==3)
	$sup=mysql_query("DELETE FROM ATHLETE WHERE noAthlete=".$_GET['no'],$link);
/*applique la modification*/
if($_GET['modif']==1){
	$nomAthlete=$_POST['modNom'];
	$clubAthlete=$_POST['modClub'];
	$mod=mysql_query("UPDATE ATHLETE SET nomAthlete='".$nomAthlete."', noClub='".$clubAthlete."' WHERE noAthlete='".$_GET['no']."'",$link);
}
if($_GET['action']==2){
	$editNo=$_GET['no'];
	echo "<form id=\"formAthletes\" method=\"post\" action=\"athlete.php?modif=1&no=$editNo\">\n";
}
else{
	echo "<form id=\"formAthletes\" method=\"post\" action=\"athlete.php?ajout=1\">\n";
	$editNo=-1;
}
/*applique l'ajout*/
if($_GET['ajout']==1){
	$nomAthlete=$_POST['newNom'];
	$clubAthlete=$_POST['club'];
	$add=mysql_query("INSERT INTO ATHLETE VALUES (null,'$nomAthlete','$clubAthlete')",$link);
}
?>
<table id="tabAthletes" border="1">
	<caption>
		Athletes
	</caption>
	<thead>
		<tr>
			<th>No Athlète</th>
			<th>Nom</th>
			<th>Club</th>
		</tr>
	</thead>
	<tbody>
<?php
$res0=mysql_query("SELECT * FROM ATHLETE",$link);
while($l=mysql_fetch_array($res0)){
	echo"<tr>\n";
	/*No Athlètes*/
	echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[0]\"/></td>\n";
	/*Si Mode Edition*/
	if($l[0]==$editNo){
		/*Nom Athlète modifiable*/
		echo"		<td><input name=\"modNom\"type=\"text\"value=\"$l[1]\"/></td>\n";
		/*Club modifiable*/
		echo"		<td>\n";
		echo"			<select name=\"modClub\">\n";
		$res1=mysql_query("SELECT * FROM CLUB WHERE noClub=$l[2]",$link);
		$n=mysql_fetch_array($res1);
		echo"					<option selected value=\"$n[0]\">$n[1]</option>\n";
		$res1=mysql_query("SELECT * FROM CLUB",$link);
		while($m=mysql_fetch_array($res1)){
			echo"				<option value=\"$m[0]\">$m[1]</option>\n";
		}
		echo"			</select>\n";
		echo"		</td>\n";
		/*Boutons (submit)*/
		echo"<td><input type=\"image\" src=\"ressources/ico_ok.gif\" alt=\"valider\"/></td>\n";
	}
	/*Sinon*/
	else {
		/*Nom disabled*/
		echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[1]\"/></td>\n";
		/*Club disabled*/
		echo"		<td>\n";
		echo"			<select disabled=\"disabled\">\n";
		$res1=mysql_query("SELECT * FROM CLUB WHERE noClub=$l[2]",$link);
		$m=mysql_fetch_array($res1);
		echo"				<option selected>$m[1]</option>\n";
		echo"			</select>\n";
		echo"		</td>\n";
		/*Boutons (liens)*/
		echo"		<td>\n
							<a
								href=\"athlete.php?action=2&no=$l[0]\"/>
								<img src=\"ressources/ico_edit.gif\"/>
							</a>\n
							<a
								href=\"athlete.php?action=3&no=$l[0]\"
								onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\"/>
								<img src=\"ressources/ico_delete.gif\"/>
							</a>\n
					</td>\n";
	}
	echo"</tr>\n";
}
/*barre d'ajout*/
if($_GET['action']==1){
	echo"<tr>\n";
	echo"<td><input type=\"text\" disabled=\"disabled\" value=\"-\" /></td>\n";
  echo"<td><input type=\"text\" name=\"newNom\" /></td>\n";
	echo"<td><select name=\"club\"><option selected>...</option>\n";
	$res1=mysql_query("select * from CLUB",$link);
	while($m=mysql_fetch_array($res1))
		echo"<option value=$m[0]>$m[1]</option>\n";
	echo"</select></td>\n";
	echo"<td><input type=\"image\" src=\"ressources/ico_ok.gif\" alt=\"valider\"/></td>\n";
	echo"</tr>\n";
}//fin barre d'ajout
?>
	</tbody>
</table>
<a href="athlete.php?action=1"><img src="ressources/ico_add.png"/></a>
</form>

<?php
html_fin_page();
?>
