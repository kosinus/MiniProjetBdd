<?php
require_once("main.php");

/*Consultation*/
if($_GET["action"]==1){
	if($_GET["ajout"]==1){
		$nomAthlete=$_POST["nomAthlete"];
		$clubAthlete=$_POST["clubAthlete"];
		$ajout = mysql_query("insert into ATHLETE values (null,'$nomAthlete','$clubAthlete')",$link);
	}
	echo "consultation";
	$res0 = mysql_query("select * from ATHLETE",$link);
	echo "<br/>
				<table id=\"consultAthlete\" border=1><caption>Athletes</caption>
				<thead>
					<tr>
						<th>No Athlète</th>
						<th>Nom</th>
						<th>Club</th>
					</tr>
				</thead>
				<tbody>";
				while($l0 = mysql_fetch_array($res0)){
					$res1 = mysql_query("select nomClub from CLUB where noClub=$l0[2]",$link);
					$l1 = mysql_fetch_array($res1);
					echo "<tr>
						<td>$l0[0]</td>
						<td>$l0[1]</td>
						<td>$l1[0]</td>
								</tr>";
				}
	echo "</tbody>
				</table>";
}
/*Insertion*/
if($_GET["action"]==2){
	echo "insertion";
	$res0 = mysql_query("select * from ATHLETE",$link);
	echo "<br/><form id=\"insertAthlete\" method=\"post\" action=\"athlete.php?action=1&ajout=1\">
				<table id=\"consultAthlete\" border=1><caption>Athletes</caption>
				<thead>
					<tr>
						<th>No Athlète</th>
						<th>Nom</th>
						<th>Club</th>
					</tr>
				</thead>
				<tbody>";
				while($l0 = mysql_fetch_array($res0)){
					$res1 = mysql_query("select nomClub from CLUB where noClub=$l0[2]",$link);
					$l1 = mysql_fetch_array($res1);
					echo "<tr>
						<td>$l0[0]</td>
						<td>$l0[1]</td>
						<td>$l1[0]</td>
								</tr>";
				}
	echo "</tbody>
				<tfoot>
					<tr>
						<td>-</td>
						<td><input type=\"text\" name=\"nomAthlete\"></td>
						<td><select name=\"clubAthlete\" id=\"clubAthlete\">";
							$res = mysql_query("select * from CLUB",$link);
							while ($l = mysql_fetch_array($res))
								echo "<option value=\"$l[0]\">$l[1]</option>";
							echo "</select></td>
					</tr>
				</tfoot>
				</table><input type=\"submit\" id=\"newAthlete\" value=\"Valider\"></form>";
}
/*Modification*/
if($_GET["action"]==3){
	echo "modification";
}
/*Suppression*/
if($_GET["action"]==4){
	if($_GET["suppr"]==1){
		$suppression = mysql_query("delete from ATHLETE where noAthlete='".$_GET["athlete_a_suppr"]."'",$link);
	}
	echo "suppression";
	$res0 = mysql_query("select * from ATHLETE",$link);
	echo "<br/>
				<table id=\"consultAthlete\" border=1><caption>Athletes</caption>
				<thead>
					<tr>
						<th>No Athlète</th>
						<th>Nom</th>
						<th>Club</th>
					</tr>
				</thead>
				<tbody>";
				while($l0 = mysql_fetch_array($res0)){
					$res1 = mysql_query("select nomClub from CLUB where noClub=$l0[2]",$link);
					$l1 = mysql_fetch_array($res1);
					echo "<tr>
						<td>$l0[0]</td>
						<td>$l0[1]</td>
						<td>$l1[0]</td>
						<td style=\"border:0\"><a href=\"athlete.php?action=4&suppr=1&athlete_a_suppr=$l0[0]\" onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\"><img src=\"ressources/ico_delete.gif\"/></a></td>
								</tr>";
				}
	echo "</tbody>
				</table>";
}


?>





















<?php
html_fin_page();
?>
