<?php
//include ("cnx_db.php");
// BACKGROUND="http://pacoelchato.com/imagenes/confetti.png"
//---------------------el contenido del correo "archivo.htlm"
			$cuerpob = '<html>
<body>
<table border=0>
<tr>
<td><A HREF="http://parquesalegres.org/" TARGET="_blank"><img src="http://parquesalegres.org/boletin/parque.jpg"></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td colspan="2"><table><tr><td style="background-color: #feb80a; color:#fff; font-weight: bold; font-size: 40px;">&nbsp;Boletín informativo Agosto-Septiembre&nbsp;</td></tr></table></td>
</tr>
<tr>
<td align="right" colspan="3" style=" font-weight: bold; font-size: 25px;">
&nbsp;<A HREF="http://facebook.com/parquesalegres/" TARGET="_blank"><img src="http://parquesalegres.org/boletin/facebook.png"></a>&nbsp;<A HREF="http://twitter.com/parquesalegres/" TARGET="_blank"><img src="http://parquesalegres.org/boletin/logo_twitter.jpg"></a>&nbsp;<A HREF="http://youtube.com/parquesalegres/" TARGET="_blank"><img src="http://parquesalegres.org/boletin/youtube.png"></a>
</td>
</tr>


<tr>
<td colspan="3" style="background-color: #a9cf46; color:#fff; font-weight: bold; font-size: 30px;">Noticias</td>
</tr>
<tr>
<td><br><img src="http://parquesalegres.org/boletin/zoo.png"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style=" font-weight: bold; font-size: 20px;">Parques Alegres asistió al zoológico de Culiacán<br> a la donación de tres bancas de pet otorgadas por<br> Ciel.  <br><br><A HREF="http://parquesalegres.org/zoo/" TARGET="_blank"> ver más</a></td>
</tr>
<tr>
<td>&nbsp;<br>&nbsp;</td>
</tr>
<tr>
<td><br><img src="http://parquesalegres.org/boletin/sinergia1.png"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style=" font-weight: bold; font-size: 20px;">Parques Alegres participa en la muestra física de<br> Sinergia Sinaloense 2012.<br><br><A HREF="http://parquesalegres.org/sinergia2012/" TARGET="_blank"> ver más</a></td>
</tr>
<tr>
<td>&nbsp;<br>&nbsp;</td>
</tr>
<tr>
<td><br><img src="http://parquesalegres.org/boletin/dca1.png"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style=" font-weight: bold; font-size: 20px;">Parques Alegres asistió como invitado especial en el<br> evento “Competencias Disciplina con Amor 2012".<br><br><A HREF="http://parquesalegres.org/dca2012/" TARGET="_blank"> ver más</a></td>
</tr>
<tr>
<td>&nbsp;<br>&nbsp;</td>
</tr>

<tr>
<td>&nbsp;<br>&nbsp;</td>
</tr>
<tr>
<td><br><img src="http://parquesalegres.org/boletin/infojardin.png"></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td style=" font-weight: bold; font-size: 20px;">Tips para mejorar tu área verde.<br><br><A HREF="http://articulos.infojardin.com/boletin/agosto-12-12400.htm" TARGET="_blank"> ver más</a></td>

</tr>
</table>


</body>
</html>';

			//".$HTTP_POST_VARS["email"]."
			//de quien lo manda
			//----------------------------quien lo esta mandando
			$email="mikee.vale@gmail.com";
			//--------------------------------la linea de abajo se queda igual
			$fromb = "From: ".$email."\r\nContent-type: text/html\r\n";
			
			//$con = mysql_connect("pacoelch.ipowermysql.com","pacoelch_datos","upRCeS73");
					
				//	mysql_select_db("pacoelch_datos", $con);
					//$sql='select email from emails';
					//$db='paco_datos'; 
					
					
				//	$sql=mysql_db_query("$db","select email from emails where email='yuki.gudi@gmail.com'");
					//$sql=mysql_db_query("$db","select email from pec_usu");
			// $sql=mysql_db_query("$db","select email from paco_usuarios_reg");
						//mysql_query($sql);
					
		//while($row = mysql_fetch_array($sql)){
			
			//mando el correo...
			//$email2="".$row["email"]."";
			//---------------------------------a quien le va a llegar el correo
			$email2="mikee.vale@gmail.com";
			
			//$res2=mail("".$email2."","Boletín Paco El Chato",$cuerpob,$fromb);
			//----------------------------------el asunto del correo
			$res2=mail("".$email2."","Boletin informativo de Agosto y septiembre",$cuerpob,$fromb);
			echo'<br><br>Email enviado a: ';
			echo $email2;
			
			//}
			//$filasDevueltas = mysql_num_rows($sql);
			//mysql_close($con);
?>