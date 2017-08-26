<?php
require_once('main.php');
require_once('wp-config.php');
/*
 $_sql0=mysql_db_query("parquesa_ParquesAlegresWP","SELECT ID FROM wp_posts WHERE post_type='success_case'");
while($row1=mysql_fetch_array($_sql0)){
	$term_list = wp_get_post_terms($row1['ID'], 'post_tag', array("fields" => "names"));
	if(count($term_list)>0){
		echo $row1['ID'];
		print_r($term_list);
		echo '<br>';
	}
}
*/
$page = $_SERVER['PHP_SELF'];
$sec = "10";
header("Refresh: $sec; url=$page"); 
mysql_query("SET character_set_client=utf8", $MySQL);
mysql_query("SET character_set_results=utf8", $MySQL);
$_sql1=mysql_db_query("$db","SELECT nombrebien,corto FROM codificar");
while($row1=mysql_fetch_array($_sql1)){
	$slugs[$row1["corto"]]=$row1["nombrebien"];
}
$_sq=mysql_db_query("$db","SELECT MAX(id) as id FROM wp1_posts WHERE post_author=80");
$ro=mysql_fetch_array($_sq);
$id=$ro['id'];
$_sq2=mysql_db_query("$db","SELECT post_content FROM wp1_posts WHERE id=".$id."");
$ro2=mysql_fetch_array($_sq2);
$id_post=substr($ro2['post_content'],11,5);
$max_id=intval($id_post)+20;
if(intval($id_post)==2116){
	exit();
}
$_sql2=mysql_db_query("$db","SELECT id, name FROM wp1_wp_pro_quiz_master WHERE id>".intval($id_post)." AND id<".$max_id."");
echo "SELECT id, name FROM wp1_wp_pro_quiz_master WHERE id>".intval($id_post)." AND id<".$max_id."";
$nom="";
while($row2=mysql_fetch_array($_sql2)){
	$categorias=array("Primero"=>18,"Segundo"=>19,"Tercero"=>20,"Cuarto"=>21,"Quinto"=>22,"Sexto"=>23,"Estado"=>125);
	$nombres = explode(" - ", $row2["name"]);
	$post=array('post_content'=>'[WpProQuiz '.$row2["id"].'] [nggallery id='.$row2["id"].']',
		'post_title'=>$row2["name"],
		'post_status'=>'publish',
		'post_type'=>'post',
		'post_date'=>'2014-01-28 07:08:00',
		'comment_status'=>'open',
		'post_category'=>array(17,$categorias[$nombres[0]]),
		'tags_input'=>array($slugs[$nombres[1]]),
	);
	$post_id = wp_insert_post($post, true);
}
if($post_id != 0)
{
	echo 'success!';

}else{
	die('error');
}
?>