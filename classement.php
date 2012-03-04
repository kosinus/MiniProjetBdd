<?php
require_once("main.php");
/*suppression*/
if($_GET['action']==3)
	$sup=mysql_query("delete from CLASSEMENT where noCompet=".$_GET['comp']." and noDiscipline=".$_GET['dis']." and noAthlete=".$_GET['ath'],$link);
/*insertion*/
if($_GET['action']==1){
	$noAthlete=$_POST['noAthlete'];
	$noDiscipline=$_POST['noDiscipline'];
	$noCompet=$_POST['noCompet'];
	$classement=$_POST['classement'];
	$add=mysql_query("INSERT INTO CLASSEMENT VALUES ($noAthlete,$noCompet,$noDiscipline,$classement)",$link);
}
?>
<form method="post" id="formClassement" action="classement.php?action=1">
<table border=1 style="position:absolute;left:5%;right:5%">
	<caption>Classement</caption>
	<thead>
		<tr>
			<th>Compétition</th>
			<th>Discipline</th>
			<th>Classement</th>
		</tr>
	</thead>
	<tbody>
<?php
// nom des competitions possèdant un classement
$comp=mysql_query("select distinct(c.nomCompet) from COMPETITION c, CLASSEMENT cl where cl.noCompet=c.noCompet",$link);
while($lcomp=mysql_fetch_array($comp)){
	// liste des disciplines de la competition courante
	$dis=mysql_query("	select distinct(d.libelleDiscipline) 
											from CLASSEMENT cl, DISCIPLINE d, COMPETITION c
											where c.nomCompet='".$lcomp[0]."'
											and d.noDiscipline=cl.noDiscipline
											and cl.noCompet=c.noCompet",$link);
	// nombre de classements pour la compétition courante
	$nbcompart=mysql_query("select count(*) 
													from CLASSEMENT cl, COMPETITION c
													where c.nomCompet='".$lcomp[0]."'
													and c.noCompet=cl.noCompet",$link);


	$lnbcompart=mysql_fetch_array($nbcompart);
		echo "<tr>\n";
		echo "	<td rowspan =\"".$lnbcompart[0]."\">\n";
		echo 			$lcomp[0];
		echo "	</td>\n";

	while($ldis=mysql_fetch_array($dis)){
		// liste des participants à l'épreuve courante
		$part=mysql_query("select distinct(a.nomAthlete)
												from CLASSEMENT cl, ATHLETE a, COMPETITION c, DISCIPLINE d
												where c.nomCompet='".$lcomp[0]."'
												and d.libelleDiscipline='".$ldis[0]."'
												and a.noAthlete=cl.noAthlete
												and cl.noCompet=c.noCompet
												and d.noDiscipline=cl.noDiscipline
												order by cl.classement",$link);

		// nombre de participants à l'épreuve courante
		$nbpart=mysql_query("select count(distinct(a.nomAthlete))
												from CLASSEMENT cl, ATHLETE a, COMPETITION c, DISCIPLINE d
												where c.nomCompet='".$lcomp[0]."'
												and d.libelleDiscipline='".$ldis[0]."'
												and a.noAthlete=cl.noAthlete
												and cl.noCompet=c.noCompet
												and d.noDiscipline=cl.noDiscipline",$link);

		$lnbpart=mysql_fetch_array($nbpart);
		echo "	<td rowspan =\"".$lnbpart[0]."\">\n";
		echo 			$ldis[0];
		echo "	</td>\n";
		$i=1;
		while($lpart=mysql_fetch_array($part)){
			echo "	<td>\n";
			if($i==1)
				echo 		"<div id=\"first\" style=\"font-weight:bold\">".$i."er - ".$lpart[0]."</div>";
			else
				echo 		"<div id=\"notfirst\">".$i."e - ".$lpart[0]."</div>";
			echo "	</td>\n";
			echo "		<td>\n
								<a
									href=\"classement.php?action=2&no=$l[0]\"/>
									<img src=\"ressources/ico_edit.gif\"/>
								</a>\n";
$r=mysql_query("select noCompet from COMPETITION where nomCompet='".$lcomp[0]."'",$link);
$nocom=mysql_fetch_array($r);
$r=mysql_query("select noDiscipline from DISCIPLINE where libelleDiscipline='".$ldis[0]."'",$link);
$nodis=mysql_fetch_array($r);
$r=mysql_query("select noAthlete from ATHLETE where nomAthlete='".$lpart[0]."'",$link);
$noath=mysql_fetch_array($r);
			echo "		<a
									href=\"classement.php?action=3&comp=".$nocom[0]."&dis=".$nodis[0]."&ath=".$noath[0]."\"
									onclick=\"return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));\"/>
									<img src=\"ressources/ico_delete.gif\"/>
								</a>\n
							</td>\n";
			echo "</tr>\n";
			$i++;
		}
	}
}
/*barre d'ajout*/
if($_GET['ajout']==1){
	echo "<tr>\n";
	echo "<td><select name=\"noCompet\"><option selected>Choisissez la compétition</option>";
	$res=mysql_query("select * from COMPETITION",$link);
	while($l=mysql_fetch_array($res))
		echo "<option value=\"".$l[0]."\">".$l[1]."</option>";
	echo "</select></td>\n";
	echo "<td><select name=\"noDiscipline\"><option selected>Choisissez la discipline</option>";
	$res=mysql_query("select * from DISCIPLINE",$link);
	while($l=mysql_fetch_array($res))
		echo "<option value=\"".$l[0]."\">".$l[1]."</option>";
	echo "</select></td>\n";
	echo "<td><select name=\"noAthlete\"><option selected>Choisissez l'athlete</option>";
	$res=mysql_query("select * from ATHLETE",$link);
	while($l=mysql_fetch_array($res))
		echo "<option value=\"".$l[0]."\">".$l[1]."</option>";
	echo "</select>\n";
	echo "<input type=\"text\"name=\"classement\" /></td>\n";
	echo"<td><input type=\"image\" src=\"ressources/ico_ok.gif\" alt=\"valider\"/></td>\n";
	echo "</tr>\n";
}
?>
	</tbody>
</table>
<a href="classement.php?ajout=1"><img src="ressources/ico_add2.png"style="position:absolute;bottom:5%;right:5%"/></a>
</form>




<?php
html_fin_page();
?>

