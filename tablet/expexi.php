<?php
require_once('../wp-config.php');
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>';
//pod id 19646
//field id 19655
$id_parques=array(15015,15016,14986,14987,14718,16161,15835,16236,16233,16233,14803,14789,15112,14774,14636,14636,15296,15480,15480,15282,15285,14905,15033,14812,14812,
14767,14767,14933,14933,14933,14933,14933,14678,14986,14681,14762,16287,14912,15079,14884,14884,14884,14884,14697,14697,14697,14697,14695,14852,14804,15069,14874,14851,
14827,14805,14805,0,15099,15100,15139,14918,14636,15482,15282,15477,15271,15270,14810,14767,14933,14933,14933,14933,14933,14688,14676,14681,14800,15073,15073,15073,
15073,14881,14881,14884,14884,14884,14884,14884,14884,14884,14884,14697,14695,14695,14695,14993,14993,14656,19620,14730,15139,15153,15275,15477,15271,15285,15033,14810,
14664,14693,14657,15294,15294,14816,15098,15125);
foreach($id_parques as $k=>$v){
$sql0="select a.post_id,a.meta_value,b.post_title,b.post_author from wp_postmeta as a INNER JOIN wp_posts as b ON a.post_id=b.ID where meta_key='_cmb_parque' AND meta_value='".$v."'";
$res0=mysql_query($sql0);
echo 'Experiencias exitosas del parque '.$v.': <br>';
    while($row=mysql_fetch_array($res0)){
        echo 'ID exp: '.$row['post_id'].'<br>';
        echo 'ID parque: '.$row['meta_value'].'<br>';
        echo 'Titulo: '.$row['post_title'].'<br>';
    }
    echo '<br>';
}
echo '</body>
</html>';
?>