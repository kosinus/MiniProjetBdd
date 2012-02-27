<?php
require_once("main.php");


$no=$_GET['no'];
echo "<form method=\"post\" action=\"estSpecialiste.php?modif=1&no=$no\">\n";


$res0=mysql_query("select * from ATHLETE where noAthlete=".$_GET['no'],$link);
$l=mysql_fetch_array($res0);
echo "<H2>$l[1]</H2>\n";

$res1=mysql_query("select * from DISCIPLINE order by libelleDiscipline asc",$link);
while($m=mysql_fetch_array($res1)){
	$res2=mysql_query("select d.noDiscipline from DISCIPLINE d, ESTSPECIALISTE e
										where e.noDiscipline=d.noDiscipline
										and e.noAthlete=".$l[0],$link);
	while($n=mysql_fetch_array($res2)){
		if($n[0]==$m[0]){
			echo "<label>$m[1]</label><input type=\"checkbox\"name=\"cases[]\"value=\"$m[0]\"checked=\"checked\"/><br/>\n";
			$pop=true;
			break;			
		}
		else
			$pop=false;
	}
	if(!($pop))
			echo "<label>$m[1]</label><input type=\"checkbox\"name=\"cases[]\"value=\"$m[0]\"/><br/>\n";
}
?>
<br/>
<input type="image" src="ressources/ico_ok.gif" alt="valider"/>
</form>


<?php
html_fin_page();






?>
