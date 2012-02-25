<?php
require_once("main.php");

/*Consultation*/
if($_GET["action"]==1){
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
}
/*Modification*/
if($_GET["action"]==3){
	echo "modification";
}
/*Suppression*/
if($_GET["action"]==4){
	echo "suppression";
}


?>





















<?php
html_fin_page();
?>
