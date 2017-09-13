<?php
require_once('../wp-config.php');
$cmd=$_POST['cmd'];$ag=$_POST['ag'];$agc=$_POST['agc'];
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><form name="forma" method="post"><input type="hidden" name="cmd" value="0">';
echo '<h3 align="center">Cambios de Parque por Asesor</h3>';

if ($cmd==2) {
	$par=$_POST["par"];
	$c=0;
	for ($i=0;$i<$par;$i++) {
		$p=$_POST["par$i"];
		if ($p>0) {
			$c++;
			mysql_query("update wp_posts set post_author='$agc' where ID='$p'");
		}
	}
	if ($c>0) echo '<font color="red">'.$c.' Parques cambiados.</font><br>';
	$cmd=0;
}

if ($cmd<1) {
	// Si no se ha seleccionado Asesor usar admin
	if ($ag<1) $ag=4;
	$sql="select a.ID, b.display_name from asesores as a, wp_users as b where a.ID=b.ID order by b.display_name";
	$res=mysql_query($sql);
	echo 'Asesor: <select name="ag" onchange="document.forma.submit();">';
	while($row=mysql_fetch_array($res)) {
		echo '<option value="'.$row["ID"].'"';
		if ($row["ID"]==$ag) echo ' selected';
		echo '>'.$row["display_name"].'</option>';
	}
	echo '</select><br><br>';
	$sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='$ag' order by post_title ASC";
	$res=mysql_query($sql);
	$c=0;
	while($row=mysql_fetch_array($res)){
		echo '<input type="checkbox" name="par'.$c.'" value="'.$row['id'].'">'.$row["id"].' '.$row["post_title"].'<br>';
		$c++;
	}
	echo '<br>Total: '.$c.'<br><br>';
	echo '<input type="hidden" name="par" value="'.$c.'">';
	$sql="select a.ID, b.display_name from asesores as a, wp_users as b where a.ID=b.ID order by b.display_name";
	$res=mysql_query($sql);
	echo 'Cambia para Asesor: <select name="agc">';
	while($row=mysql_fetch_array($res)) {
		echo '<option value="'.$row["ID"].'"';
		if ($row["ID"]==$ag) echo ' selected';
		echo '>'.$row["display_name"].'</option>';
	}
	echo '</select>&nbsp;';
	echo '<input type="submit" value="Asignar seleccionados" onclick="document.forma.cmd.value=2;"><br>';
}

if ($cmd==1) {
}

echo '</form></body></html>';

?>