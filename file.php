<?php
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<body><iframe src="http://parquesalegres.org/formatos/'.$_POST['nom'].'.pdf" width="99%" height="90%"></iframe><br/>';
$url = 'http://parquesalegres.org/formatos/'.$_POST['nom'].'.doc';
$url2 = 'http://parquesalegres.org/formatos/'.$_POST['nom'].'.docx';
$handle = @fopen($url,'r');
$handle2= @fopen($url2,'r');
if($handle !== false){
   echo '<div style="float:left;margin-left:50px;"><a href="http://parquesalegres.org/formatos/'.$_POST['nom'].'.pdf">Descargar en PDF</a></div>
    <div style="float:right;margin-right:50px;"><a href="http://parquesalegres.org/formatos/'.$_POST['nom'].'.doc">Descargar en Word</a></div>';
}
elseif($handle2 !== false){
   echo '<div style="float:left;margin-left:50px;"><a href="http://parquesalegres.org/formatos/'.$_POST['nom'].'.pdf">Descargar en PDF</a></div>
    <div style="float:right;margin-right:50px;"><a href="http://parquesalegres.org/formatos/'.$_POST['nom'].'.docx">Descargar en Word</a></div>';
} 
else{
    echo '<div style="text-align: center;"><a href="http://parquesalegres.org/formatos/'.$_POST['nom'].'.pdf">Descargar en PDF</a></div>';
}
echo '<br/>&nbsp;<br/>
</body>
</html>';
?>