<?php
require_once("main.php");

/*applique la suppression*/
if($_GET['action']==3)
	$sup=mysql_query("DELETE FROM COMPETITION WHERE noCompet=".$_GET['no'],$link);
/*applique la modification*/
if($_GET['modif']==1){
	$nomCompetition=$_POST['modNom'];
	$dateCompetition=$_POST['modDate'];
	$clubCompetition=$_POST['modClub'];
	$noCompetition=$_GET['no'];
	$mod=mysql_query("UPDATE COMPETITION SET nomCompet='".$nomCompetition."',dateCompet='".$dateCompetition."', noClub='".$clubCompetition."' WHERE noCompet='".$noCompetition."'",$link);
}
if($_GET['action']==2){
	$editNo=$_GET['no'];
	echo "<form id=\"formCompetitions\" method=\"post\" action=\"competition.php?modif=1&no=$editNo\">\n";
}
else{
	echo "<form id=\"formCompetitions\" method=\"post\" action=\"competition.php?ajout=1\">\n";
	$editNo=-1;
}
/*applique l'ajout*/
if($_GET['ajout']==1){
	$nomCompetition=$_POST['newNom'];
	$dateCompetition=$_POST['newDate'];
	$clubCompetition=$_POST['club'];
	$add=mysql_query("INSERT INTO COMPETITION VALUES (null,'$nomCompetition','$dateCompetition','$clubCompetition')",$link);
}
?>
<table id="tabCompetitions" border="1">
	<caption>
		Competitions
	</caption>
	<thead>
		<tr>
			<th>No Competition</th>
			<th>Nom</th>
			<th>Date</th>
			<th>Organisateur</th>
		</tr>
	</thead>
	<tbody>
<?php
$res0=mysql_query("SELECT * FROM COMPETITION",$link);
while($l=mysql_fetch_array($res0)){
	echo"<tr>\n";
	/*No Compétitions*/
	echo"		<td><input type=\"text\"disabled=\"disabled\"value=\"$l[0]\"/></td>\n";
	/*Si Mode Edition*/
	if($l[0]==$editNo){
		/*Nom Compétition modifiable*/
		echo"		<td><input name=\"modNom\"type=\"text\"value=\"$l[1]\"/></td>\n";
		/*Date Compétition modifiable*/
		echo"		<td><input name=\"modDate\"type=\"date\"value=\"$l[2]\"/></td>\n";
		/*Club modifiable*/
		echo"		<td>\n";
		echo"			<select name=\"modClub\">\n";
		$res1=mysql_query("SELECT * FROM CLUB WHERE noClub=$l[3]",$link);
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
		/*Date Compétition modifiable*/
		echo"		<td><input name=\"modDate\"disabled=\"disabled\"type=\"date\"value=\"$l[2]\"/></td>\n";
		/*Club disabled*/
		echo"		<td>\n";
		echo"			<select disabled=\"disabled\">\n";
		$res1=mysql_query("SELECT * FROM CLUB WHERE noClub=$l[3]",$link);
		$m=mysql_fetch_array($res1);
		echo"				<option selected>$m[1]</option>\n";
		echo"			</select>\n";
		echo"		</td>\n";
		/*Boutons (liens)*/
		echo"		<td>\n
							<a
								href=\"competition.php?action=2&no=$l[0]\"/>
								<img src=\"ressources/ico_edit.gif\"/>
							</a>\n
							<a
								href=\"competition.php?action=3&no=$l[0]\"
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
  echo"<td><input type=\"text\" name=\"newDate\" /></td>\n";
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
<a href="competition.php?action=1"><img src="ressources/ico_add2.png"/></a>
</form>

<?php
html_fin_page();
?>
