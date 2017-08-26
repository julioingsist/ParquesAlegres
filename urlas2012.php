<?php
require_once "main.php"; 
 // $_sql=mysql_db_query("$db","SELECT * from pec_lecciones ");
$nombresGrado=array("primero","segundo","tercero","cuarto","quinto","sexto");
//echo'$datos=array(';
//		while($row=mysql_fetch_array($_sql)){


		//echo$row["cve"];
		//echo"=>'";
		//echo'http://www.pacoelchato.com/leccion/';
		////echo'/';
		//echo$row["urla"];
		//echo"/<br>";
		//$result=consulta("update paco_lec_pag set urla='".$row["urlaaa"]."' where cve_lec='".$row["clave_leccion"]."'");
		
		//$result=consulta("insert into paco_lec_pag (cve_lec,num_pag,libro_pag,contenido) values (".$cve_leccion.",".$f.",".$i.",'".$editor2."')");
//		}
		//echo")";
		echo'<br><br>'; 
		$_sql2=mysql_db_query("$db","SELECT a.*,b.cve as cve_secc,b.urla as urlaa,a.cve as libro from pec_libros as a, pec_libros_sec as b where a.cve=b.cve_libro");
		while($row2=mysql_fetch_array($_sql2)){

		//echo"insert into paco_lec_pag (cve_lec,num_pag,libro_pag,contenido) values (".$cve_leccion.",".$f.",".$i.",'".$editor2."');";
		//echo'<br><br><br>';
		//echo"update paco_lec_pag set urla='".$row["urlaaa"]."' where cve_lec='".$row["clave_leccion"]."';";
		//echo'<hr>';
		//echo'<br><br><br>';
		//echo'<url><loc>http://www.pacoelchato.com/leccion/'.$row2["urla"].'/</loc></url>';
		echo'<br>';
		// echo$row2["cve_secc"];
		//echo"=>'";
                echo'RewriteRule ^primaria/';
		echo$nombresGrado[$row2["grado"]-1];
		echo'/';
		echo$row2["urla"];
                echo'$';
                echo'&nbsp;';
                echo'index.php?nivel=2&libro=';
                echo$row2["libro"];
                //-----------------bloques
                //echo'/';
		//echo$row2["urlaa"];
		//echo"',"; 
		//-------------------------
                //$result=consulta("update paco_lec_pag set urla='".$row["urlaaa"]."' where cve_lec='".$row["clave_leccion"]."'");
		
		//$result=consulta("insert into paco_lec_pag (cve_lec,num_pag,libro_pag,contenido) values (".$cve_leccion.",".$f.",".$i.",'".$editor2."')");
		}
?>