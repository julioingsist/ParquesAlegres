<?php
require_once('../wp-config.php');
echo '<html><body>';
$f=fopen("cart50.txt","r");
$c=0;$t=0;
while ($a=fgets($f)) {
	if (substr($a,0,1)=='c') {
		echo $c.'<br>';
		echo $a.' = ';
		$t+=$c;
		$c=0;
	} else {
		if ($p[$a]!='') echo 'E'.$a;
		$p[$a]=1;
		$sql="select id, post_title, post_type, post_status, post_author from wp_posts where id=$a";
		$res=mysql_query($sql);
		$row=mysql_fetch_array($res);
		if ($row['post_status']!='publish') echo '-p'.$row['post_status'];
		if ($row['post_type']!='parque') echo '-t';
		echo $row[0].'<br>';
		echo $row[1].'<br>';
		echo $row[2].'<br>';
		echo $row[3].'<br>';
		echo $row[4].'<br>';
		echo $sql;
		exit;
		$c++;
	}
}
	$sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='1478' order by post_title ASC";
	$res0=mysql_query($sql0);
	while($row0=mysql_fetch_array($res0)){
		$parque[$row0["id"]]=$row0["post_title"];
	}
echo $c.'<br><br>Total: '.$t.'<br>';
fclose($f);
echo '</body></html>';

?>