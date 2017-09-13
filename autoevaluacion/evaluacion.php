<?
echo'<html>
<body>';
if($_POST)
{
		$nombre_parque=$_POST["nombre"];
		$contacto_parque=$_POST["contacto"];
		$correo_parque=$_POST["correo"];
		$comite1_parque=$_POST["comite1"];
		if($comite1_parque=="1"){ $puntos_comite1=33;}
		if($comite1_parque=="2"){$puntos_comite1=67;}
		if($comite1_parque=="3 o mas personas"){$puntos_comite1=100;}
		if($comite1_parque=="No hay comité"){$puntos_comite1=0;}
		$comite2_parque=$_POST["comite2"];
		if($comite2_parque=="Tenemos contrato como dato"){ $puntos_comite2=100;}
		if($comite2_parque=="Tenemos escrito"){$puntos_comite2=100;}
		if($comite2_parque=="Estan enterados"){$puntos_comite2=75;}
		if($comite2_parque=="No"){$puntos_comite2=50;}
		$comite3_parque=$_POST["comite3"];
		if($comite3_parque=="Si"){ $puntos_comite3=100;}
		if($comite3_parque=="Más o menos"){$puntos_comite3=50;}
		if($comite3_parque=="No"){$puntos_comite3=0;}
		$comite4_parque=$_POST["comite4"];
		if($comite4_parque=="Si"){ $puntos_comite4=100;}
		if($comite4_parque=="Suficientes"){$puntos_comite4=75;}
		if($comite4_parque=="Muy pocas"){$puntos_comite4=50;}
		if($comite4_parque=="Casi nunca"){$puntos_comite4=25;}
		if($comite4_parque=="Nunca"){ $puntos_comite4=0;}
		$comite5_parque=$_POST["comite5"];
		if($comite5_parque=="Si"){ $puntos_comite5=100;}
		if($comite5_parque=="Solo los planes"){$puntos_comite5=50;}
		if($comite5_parque=="Solo ideas"){$puntos_comite5=25;}
		if($comite5_parque=="No"){$puntos_comite5=0;}
		$instalaciones1_parque=$_POST["instalaciones1"];
		if($instalaciones1_parque=="Suficientes"){ $puntos_instalaciones1=100;}
		if($instalaciones1_parque=="Varias"){$puntos_instalaciones1=67;}
		if($instalaciones1_parque=="Pocas"){$puntos_instalaciones1=33;}
		if($instalaciones1_parque=="Nada"){$puntos_instalaciones1=0;}
		$instalaciones2_parque=$_POST["instalaciones2"];
		if($instalaciones2_parque=="Si"){ $puntos_instalaciones2=100;}
		if($instalaciones2_parque=="Más o menos"){$puntos_instalaciones2=50;}
		if($instalaciones2_parque=="no"){$puntos_instalaciones2=0;}
		$ingresos1_parque=$_POST["ingresos1"];
		if($ingresos1_parque=="Suficientes"){ $puntos_ingresos1=100;}
		if($ingresos1_parque=="Más o menos"){$puntos_ingresos1=75;}
		if($ingresos1_parque=="Pocos"){$puntos_ingresos1=50;}
		if($ingresos1_parque=="Muy pocos"){$puntos_ingresos1=25;}
		if($ingresos1_parque=="Nada"){$puntos_ingresos1=0;}
		$ingresos2_parque=$_POST["ingresos2"];
		if($ingresos2_parque=="Si"){ $puntos_ingresos2=100;}
		if($ingresos2_parque=="Más o menos"){$puntos_ingresos2=50;}
		if($ingresos2_parque=="no"){$puntos_ingresos2=0;}
		$eventos1_parque=$_POST["eventos1"];
		if($eventos1_parque=="Suficientes"){ $puntos_eventos1=100;}
		if($eventos1_parque=="Varios"){$puntos_eventos1=80;}
		if($eventos1_parque=="Pocos"){$puntos_eventos1=60;}
		if($eventos1_parque=="Muy pocos"){$puntos_eventos1=40;}
		if($eventos1_parque=="Casi ninguno"){$puntos_eventos1=20;}
		if($eventos1_parque=="Ninguno"){$puntos_eventos1=0;}
		$eventos2_parque=$_POST["eventos2"];
		if($eventos2_parque=="Culturales"){ $puntos_eventos2=0;}
		if($eventos2_parque=="Recreativos"){$puntos_eventos2=0;}
		if($eventos2_parque=="Deportivos"){$puntos_eventos2=0;}
		if($eventos2_parque=="Ecologicos"){$puntos_eventos2=0;}
		$verdes1_parque=$_POST["verdes1"];
		if($verdes1_parque=="Árboles grandes"){ $puntos_verdes1=0;}
		if($verdes1_parque=="Árboles chicos"){$puntos_verdes1=0;}
		if($verdes1_parque=="Matas y arbustos"){$puntos_verdes1=0;}
		if($verdes1_parque=="Flores"){$puntos_verdes1=0;}
		if($verdes1_parque=="Frutos"){$puntos_verdes1=0;}
		if($verdes1_parque=="Pasto"){$puntos_verdes1=0;}
		$verdes2_parque=$_POST["verdes2"];
		if($verdes2_parque=="Si"){ $puntos_verdes2=100;}
		if($verdes2_parque=="Falta un poco más"){$puntos_verdes2=75;}
		if($verdes2_parque=="Hay muy poco"){$puntos_verdes2=50;}
		if($verdes2_parque=="Casi no hay nada"){$puntos_verdes2=25;}
		if($verdes2_parque=="No hay nada"){$puntos_verdes2=0;}
		$verdes3_parque=$_POST["verdes3"];
		if($verdes3_parque=="Si"){ $puntos_verdes3=100;}
		if($verdes3_parque=="Más o menos"){$puntos_verdes3=50;}
		if($verdes3_parque=="Mal"){$puntos_verdes3=25;}
		if($verdes3_parque=="Pesimo"){$puntos_verdes3=0;}
		$verdes4_parque=$_POST["verdes4"];
		if($verdes4_parque=="Constante"){ $puntos_verdes4=100;}
		if($verdes4_parque=="Ocacional"){$puntos_verdes4=50;}
		if($verdes4_parque=="No se riega"){$puntos_verdes4=0;}
		$afluencia1_parque=$_POST["afluencia1"];
		if($afluencia1_parque=="Si mucha"){ $puntos_afluencia1=100;}
		if($afluencia1_parque=="Más o menos"){$puntos_afluencia1=60;}
		if($afluencia1_parque=="Poco"){$puntos_afluencia1=30;}
		if($afluencia1_parque=="Casi nada"){$puntos_afluencia1=15;}
		if($afluencia1_parque=="Nada"){$puntos_afluencia1=0;}
		$afluencia2_parque=$_POST["afluencia2"];
		if($afluencia2_parque=="Si bastante"){ $puntos_afluencia2=100;}
		if($afluencia2_parque=="Regular"){$puntos_afluencia2=50;}
		if($afluencia2_parque=="Casi nada"){$puntos_afluencia2=25;}
		$afluencia3_parque=$_POST["afluencia3"];
		if($afluencia3_parque=="De Lunes a Viernes"){ $puntos_afluencia3=0;}
		if($afluencia3_parque=="Sabado"){$puntos_afluencia3=0;}
		if($afluencia3_parque=="Domingo"){$puntos_afluencia3=0;}
		$afluencia4_parque=$_POST["afluencia4"];
		if($afluencia4_parque=="Si"){ $puntos_afluencia4=100;}
		if($afluencia4_parque=="A veces"){$puntos_afluencia4=50;}
		if($afluencia4_parque=="Casi nada"){$puntos_afluencia4=25;}
		if($afluencia4_parque=="Nada"){$puntos_afluencia4=0;}
		$orden1_parque=$_POST["orden1"];
		if($orden1_parque=="Si"){ $puntos_orden1=100;}
		if($orden1_parque=="Regularmente"){$puntos_orden1=80;}
		if($orden1_parque=="Casi Nada"){$puntos_orden1=25;}
		if($orden1_parque=="No"){$puntos_orden1=0;}
		$orden2_parque=$_POST["orden2"];
		if($orden2_parque=="Si"){ $puntos_orden2=100;}
		if($orden2_parque=="Regularmente"){$puntos_orden2=80;}
		if($orden2_parque=="Poco"){$puntos_orden2=25;}
		if($orden2_parque=="No"){$puntos_orden2=0;}
		
		$suma_comite=$puntos_comite1+$puntos_comite2+$puntos_comite3+$puntos_comite4+$puntos_comite5;
		$suma_instalaciones=$puntos_instalaciones1+$puntos_instalaciones2;
		$suma_ingresos=$puntos_ingresos1+$puntos_ingresos2;
		$suma_eventos=$puntos_eventos1+$puntos_eventos2;
		$suma_verdes=$puntos_verdes1+$puntos_verdes2+$puntos_verdes3+$puntos_verdes4;
		$suma_afluencia=$puntos_afluencia1+$puntos_afluencia2+$puntos_afluencia3+$puntos_afluencia4;
		$suma_orden=$puntos_orden1+$puntos_orden2;
		$suma_puntos=$suma_comite+$suma_instalaciones+$suma_ingresos+$suma_eventos+$suma_verdes+$suma_afluencia+$suma_orden;
		$promedio=($suma_puntos/1800)*100;
		echo'Nombre del parque:';echo$nombre_parque;echo'<br>';
		echo'Contacto:';echo$contacto_parque;echo'<br>';
		echo'Correo:';echo$correo_parque;echo'<br>';
		echo'Calificacion:';echo round($promedio);echo'<br>';
		/*
		 echo'Comite respuesta a pregunta 1:';echo$comite1_parque;echo'<br>';
		 echo'Comite respuesta a pregunta 2:';echo$comite2_parque;echo'<br>';
		 echo'Comite respuesta a pregunta 3:';echo$comite3_parque;echo'<br>';
		 echo'Comite respuesta a pregunta 4:';echo$comite4_parque;echo'<br>';
		 echo'Comite respuesta a pregunta 5:';echo$comite5_parque;echo'<br>';
		 */
		echo'<br>
<br> ';
echo'<h2>Fortalezas:</h2><br>'; //FORTALEZAS
echo'<ul>';
if($comite1_parque=="3 o mas personas"){
echo'<li>Su comit&eacute; opera con las personas correctas</li>';
}
if($comite2_parque=="Tenemos contrato como dato"){
echo'<li>Usted tiene un comit&eacute; formalizado y ser&aacute; considerado para programas de apoyo institucional.</li>';
}
if($comite2_parque=="Tenemos escrito"){
echo'<li>Usted tiene un comit&eacute; formalizado y ser&aacute; considerado para programas de apoyo institucional.</li>';
}
if($comite3_parque=="Si"){
echo'<li>Cuenta con un comit&eacute; organizado.</li>';
}
if($comite4_parque=="Si"){
echo'<li>Su comit&eacute; esta muy organizado ya que se reune con regularidad.</li>';
}
if($comite4_parque=="Suficientes"){
echo'<li>Su comit&eacute; esta muy organizado ya que se reune con regularidad.</li>';
}
if($comite5_parque=="Si"){
echo'<li>Su comit&eacute; esta muy organizado ya que cuenta con proyectos en proceso en su parque.</li>';
}
if($instalaciones1_parque=="Suficientes"){
echo'<li>Su comit&eacute; cuenta con instalaciones.</li>';
}
if($instalaciones2_parque=="Si"){
echo'<li>Su parque esta en buen estado.</li>';
}
if($ingresos1_parque=="Suficientes"){
echo'<li>Su parque cuenta con ingresos.</li>';
}
if($ingresos2_parque=="Si"){
echo'<li>Su comit&eacute; opera bien.</li>';
}
if($eventos1_parque=="Suficientes"){
echo'<li>Su comit&eacute; realiza eventos con regularidad</li>';
}
if($verdes2_parque=="Si"){
echo'<li>Existe suficiente &aacute;rea verde en su parque </li>';
}
if($verdes3_parque=="Si"){
echo'<li>Su parque esta en buen estado</li>';
}
if($verdes4_parque=="Constante"){
echo'<li>Su vegetaci&oacute;n se riega con frecuencia</li>';
}
if($afluencia1_parque=="Si mucha"){
echo'<li>En su parque asiste gente</li>';
}
if($afluencia2_parque=="Bastante"){
echo'<li>En su parque asiste gente</li>';
}
if($afluencia4_parque=="Si"){
echo'<li>En su parque asiste gente de noche</li>';
}
if($orden1_parque=="Si"){
echo'<li>Su parque se mantiene limpio</li>';
}
if($orden2_parque=="Si"){
echo'<li>En su parque se respetan las instalaciones</li>';
}
echo'</ul>';
echo'<br><h2>&Aacute;reas de oportunidad:</h2><br>'; //AREAS DE OPORTUNIDAD
echo'<ul>';
if($comite1_parque=="No hay comite"){
echo'<li>Se recomienda que participen al menos 3 o m&aacute;s personas comprometidas con el proyecto ya que esto generar&aacute; una fortaleza que permanecer&aacute; atravez del tiempo.</li>';
}
if($comite1_parque=="1"){
echo'<li>Debe desarrollar un comit&eacute;.</li>';
echo'<li>Se recomienda que participen al menos 3 o m&aacute;s personas comprometidas con el proyecto ya que esto generar&aacute; una fortaleza que permanecer&aacute; atravez del tiempo.</li>';
}
if($comite2_parque=="No"){
echo'<li>Se recomienda formalizar ante la instituci&oacute;n gubernamnetal correspondiente para efecto de formalidad y ser considerado en programas de apoyo institucional</li>';
}
if($comite3_parque=="Mas o menos"){
echo'<li>Es importante que existan responsabilidades claras por cada integrante, de esta manera ser&aacute; m&aacute;s f&aacute;cil presentar informes solicitados.</li>';
}
if($comite4_parque=="Muy pocas"){
echo'<li>Es recomendable realizar minimamente una reuni&oacute;n mensual donde se pueda plantear la situaci&oacute;n actual del espacio as&iacute; como el cumplimiento de metas que se han establecido a esa fecha.</li>';
}
if($comite4_parque=="Nunca"){
echo'<li>Es recomendable realizar minimamente una reuni&oacute;n mensual donde se pueda plantear la situaci&oacute;n actual del espacio as&iacute; como el cumplimiento de metas que se han establecido a esa fecha.</li>';
}
if($comite5_parque=="Solo los planes"){
echo'<li>Es importante contar siempre con proyectos en proceso ya que esto permitir&aacute; mantenerse en actividad continua</li>';
}
if($comite5_parque=="Solo ideas"){
echo'<li>Es importante contar siempre con proyectos en proceso ya que esto permitir&aacute; mantenerse en actividad continua</li>';
}
if($instalaciones1_parque=="Pocas"){
echo'<li>Parques alegres recomienda contar con servicios b&aacute;sicos m&iacute;nimos como lo son agua,banquetas,arboles,iluminaci&oacute;n,juegos infantiles.</li>';
}
if($instalaciones1_parque=="Varias"){
echo'<li>Parques alegres recomienda contar con servicios b&aacute;sicos m&iacute;nimos como lo son agua,banquetas,arboles,iluminaci&oacute;n,juegos infantiles.</li>';
}
if($instalaciones2_parque=="Mas o menos"){
echo'<li>El mantener en buen estado lo que existe le permitir&aacute; contar con un ambiente agradable para los usuarios.</li>';
}
if($ingresos1_parque=="Mas o menos"){
echo'<li>Es muy importante que el comit&eacute; cuente con sistemas de recaudaci&oacute;n de ingresos ejemplo Kermesses,rifas,torneos,aportaciones directas de vecinos,donaciones,renta.</li>';
}
if($ingresos1_parque=="Pocos"){
echo'<li>Es muy importante que el comit&eacute; cuente con sistemas de recaudaci&oacute;n de ingresos ejemplo Kermesses,rifas,torneos,aportaciones directas de vecinos,donaciones,renta.</li>';
}
if($ingresos1_parque=="Nada"){
echo'<li>Es muy importante que el comit&eacute; cuente con sistemas de recaudaci&oacute;n de ingresos ejemplo Kermesses,rifas,torneos,aportaciones directas de vecinos,donaciones,renta.</li>';
}
if($ingresos2_parque=="Mas o menos"){
echo'<li>Es muy importante conocer la cantidad econ&oacute;mica que requiere nuestro espacio anualmente para mantenerse en buenas condiciones , sobre eso se debe construir un plan anual.</li>';
}
if($eventos1_parque=="Varios"){
echo'<li>Es muy importante contar con un calendario anual e irlo posicionando atraves del tiempo.</li>';
}
if($eventos1_parque=="Casi ninguno"){
echo'<li>Es muy importante contar con un calendario anual e irlo posicionando atraves del tiempo.</li>';
}
if($eventos1_parque=="Muy pocos"){
echo'<li>Es muy importante contar con un calendario anual e irlo posicionando atraves del tiempo.</li>';
}
if($verdes2_parque=="Falta un poco mas"){
echo'<li>Es muy importante contar con un plano donde se determine la ubicaci&oacute;n,cantidad,tipo de &aacute;rbol y plantas, as&iacute; podr&aacute; saber que porcentaje lleva de avances en &aacute;reas verdes.</li>';
}
if($verdes2_parque=="Casi no hay nada"){
echo'<li>Es muy importante contar con un plano donde se determine la ubicaci&oacute;n,cantidad,tipo de &aacute;rbol y plantas, as&iacute; podr&aacute; saber que porcentaje lleva de avances en &aacute;reas verdes.</li>';
}
if($verdes2_parque=="No hay nada"){
echo'<li>Es muy importante contar con un plano donde se determine la ubicaci&oacute;n,cantidad,tipo de &aacute;rbol y plantas, as&iacute; podr&aacute; saber que porcentaje lleva de avances en &aacute;reas verdes.</li>';
}
if($verdes4_parque=="Ocasional"){
echo'<li>Es recomendable trabajar con un sistema de riego eficiente que permita contar con &aacute;reas verdes en optimas condiciones.</li>';
}
if($verdes4_parque=="No se riega"){
echo'<li>Es recomendable trabajar con un sistema de riego eficiente que permita contar con &aacute;reas verdes en optimas condiciones.</li>';
}
if($afluencia1_parque=="Mas o menos"){
echo'<li>Te recomendamos la activaci&oacute;n eficiente de tus espacios en temas deportivos,culturales y talleres en coordinaci&oacute;n con asociaciones civiles y programas gubernamentales.</li>';
}
if($afluencia1_parque=="Casi nada"){
echo'<li>Te recomendamos la activaci&oacute;n eficiente de tus espacios en temas deportivos,culturales y talleres en coordinaci&oacute;n con asociaciones civiles y programas gubernamentales.</li>';
}
if($afluencia2_parque=="Regular"){
echo'<li>Es importante contar con instalaciones que sean aprovechables cualquier d&iacute;a de la semana como lo son juegos infantiles,palapas los fines de semana,canchas y ejercitadores.</li>';
}
if($afluencia2_parque=="Casi nada"){
echo'<li>Es importante contar con instalaciones que sean aprovechables cualquier d&iacute;a de la semana como lo son juegos infantiles,palapas los fines de semana,canchas y ejercitadores.</li>';
}
if($afluencia4_parque=="Aveces"){
echo'<li>Es importante contar con un buen sistema de iluminaci&oacute;n que permita llevar acabo eventos nocturnos bajo el cumplimiento de la normatividad del espacio publico.</li>';
}
if($afluencia4_parque=="Casi nada"){
echo'<li>Es importante contar con un buen sistema de iluminaci&oacute;n que permita llevar acabo eventos nocturnos bajo el cumplimiento de la normatividad del espacio publico.</li>';
}
if($afluencia4_parque=="Nada"){
echo'<li>Es importante contar con un buen sistema de iluminaci&oacute;n que permita llevar acabo eventos nocturnos bajo el cumplimiento de la normatividad del espacio publico.</li>';
}
if($orden1_parque=="Regularmente"){
echo'<li>Es importante el tema de la limpieza ya que un parque limpio genera un aspecto de tranquilidad y confort.</li>';
}
if($orden1_parque=="Casi nada"){
echo'<li>Es importante el tema de la limpieza ya que un parque limpio genera un aspecto de tranquilidad y confort.</li>';
}
if($orden1_parque=="No"){
echo'<li>Es importante el tema de la limpieza ya que un parque limpio genera un aspecto de tranquilidad y confort.</li>';
}
if($orden2_parque=="Regularmente"){
echo'<li>Es importante contar con un reglamento de orden y señalizaciones siendo estos de conocimiento general de los usuarios.</li>';
}
if($orden2_parque=="No"){
echo'<li>Es importante contar con un reglamento de orden y señalizaciones siendo estos de conocimiento general de los usuarios.</li>';
}
echo'</ul>';
echo'<br><h2>Recomendaciones:</h2><br>';   //RECOMENDACIONES
echo'<ul>';
if($comite1_parque=="1"){

echo'<li>Te recomendamos visitar <a href="http://www.parquesalegres.org/comite">www.parquesalegres/comite</a></li>';
}
if($comite1_parque=="2"){
echo'<li>Se recomienda que participen al menos 3 o m&aacute; personas comprometidas</li>';
echo'<li>Te recomendamos visitar <a href="http://www.parquesalegres.org/comite">www.parquesalegres/comite</a></li>';
}
if($comite1_parque=="No hay comite"){
echo'<li>Te recomendamos visitar <a href="http://www.parquesalegres.org/comite">www.parquesalegres/comite</a></li>';
}
if($comite2_parque=="Tenemos escrito"){
echo'<li>Se recomienda estar formalizado ante el h ayuntamiento</li>';
}
if($comite2_parque=="Estan enterados"){
echo'<li>Te recomendamos checar la metodolog&iacute;a para conformar comit&eacute; de vecinos y formatos.<br>Visita este enlace 
<a href="http://parquesalegres.org/wp-content/uploads/2011/11/METODOLOGIA-PARA-CONFORMAR-COMITE-DE-VECINOS.pdf ">Solicitud para conformar comit&eacute; de vecinos</a></li>
<a href="http://parquesalegres.org/wp-content/uploads/2011/11/SOLICITUD-FORMATO-PARA-REGISTRO-DE-COMITES-DE-PARQUES-DPTO.-PARQUES-Y-JARDINES.pdf ">Solicitud de registro de comit&eacute;</a></li>';
}

if($comite3_parque=="No"){
echo'<li>Visita esta pagina donde te mostramos la experiencia exitosa del parque Universidad 94 etapa II ejemplo de un comit&eacute; con una buena organizaci&oacute;n <a href="http://www.parquesalegres.org/universidad-94-etapa-ii">da click aqu&iacute;</a></li>';
}
if($comite4_parque=="Casi nunca"){
echo'<li>Es recomendable tener reuniones con mas regularidad y que cuenten con un calendario anual de actividades.<a href="http://www.parquesalegres.org/reuniones-con-regularidad">da click aqu&iacute;</a></li>';
}
if($comite5_parque=="No"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/parque-los-helechos"> http://www.parquesalegres.org/parque-los-helechos</a> ah&iacute; encontraras algunos ejemplos de proyectos y/o eventos.</li>';
}
if($instalaciones1_parque=="Nada"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/catalogo"> http://www.parquesalegres.org/catalogo</a> ah&iacute; encontraras fotos de catalogo de parques.</li>
<a href="http://www.parquesalegres.org/catalogo-de-equipamiento"> http://www.parquesalegres.org/catalogo-de-equipamiento</a> ah&iacute; encontraras fotos de catalogo de equipamiento.</li>';
}
if($instalaciones2_parque=="No"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/oxxo"> http://www.parquesalegres.org/oxxo</a> ah&iacute; encontraras fotos del voluntariado oxxo trabajando con los parques.</li>';
}
if($ingresos1_parque=="Muy pocos"){
echo'<li>Te invitamos a que visites estas paginas <a href="http://www.parquesalegres.org/universidad-94"> http://www.parquesalegres.org/universidad-94</a> ah&iacute; encontraras informaci&oacute;n de como le hiso este comit&eacute; para generar ingresos.</li>
<a href="http://www.parquesalegres.org/club-deportivo-terranova"> http://www.parquesalegres.org/club-deportivo-terranova</a> ah&iacute; encontraras informaci&oacute; de como le hiso este comit&eacute; para generar ingresos.</li>
<a href="http://www.parquesalegres.org/bugambilias"> http://www.parquesalegres.org/bugambilias</a> ah&iacute; encontraras informaci&oacute; de como le hiso este comit&eacute; para generar ingresos.</li>';
}
if($ingresos2_parque=="No"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/universidad-94"> http://www.parquesalegres.org/universidad-94</a> ah&iacute; encontraras informaci&oacute;n de como le hiso este comit&eacute; para generar ingresos.</li>';
}
if($eventos1_parque=="Pocos"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/tip"> http://www.parquesalegres.org/tip</a> ah&iacute; encontraras informaci&oacute;n de como hacer un calendario</li>';
}
if($eventos2_parque=="Culturales"){
echo'<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/c-n-o-p"> http://www.parquesalegres.org/c-n-o-p</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/club-deportivo-terranova"> http://www.parquesalegres.org/club-deportivo-terranova</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/ribera"> http://www.parquesalegres.org/ribera</a> ah&iacute; encontraras informaci&oacute;n</li>';
}
if($eventos2_parque=="Recreativos"){
echo'<li>Te invitamos a que visites estas p&aacute;ginas <a href="http://www.parquesalegres.org/club-deportivo-terranova"> http://www.parquesalegres.org/club-deportivo-terranova</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/ribera"> http://www.parquesalegres.org/ribera</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/universidad94etapa2"> http://www.parquesalegres.org/universidad94etapa2</a> ah&iacute; encontraras informaci&oacute;n</li>';
}
if($eventos2_parque=="Deportivos"){
echo'<li>Te invitamos a que visites estas p&aacute;ginas <a href="http://www.parquesalegres.org/c-n-o-p"> http://www.parquesalegres.org/c-n-o-p</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/ribera"> http://www.parquesalegres.org/ribera</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/universidad94etapa2"> http://www.parquesalegres.org/universidad94etapa2</a> ah&iacute; encontraras informaci&oacute;n</li>';
}
if($eventos2_parque=="Ecologicos"){
echo'<li>Te invitamos a que visites estas p&aacute;ginas <a href="http://www.parquesalegres.org/c-n-o-p"> http://www.parquesalegres.org/c-n-o-p</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/club-deportivo-terranova"> http://www.parquesalegres.org/club-deportivo-terranova</a> ah&iacute; encontraras informaci&oacute;n</li>
<li>Te invitamos a que visites esta pagina <a href="http://www.parquesalegres.org/universidad94etapa2"> http://www.parquesalegres.org/universidad94etapa2</a> ah&iacute; encontraras informaci&oacute;n</li>';
}
if($verdes2_parque=="Hay muy poco"){
echo'<li>Te invitamos a que visites estas p&aacute;ginas <a href="http://www.parquesalegres.org/planos/1.jpg"> http://www.parquesalegres.org/planos/1.jpg</a> ah&iacute; encontraras un ejemplo de un plano para un parque</li>';
}
if($verdes3_parque=="Mas o menos"){
echo'<li>Si tienes alguna duda en materia de salud de las &aacute;reas verdes contacta a Erika Pagaza directora y curadora de Jard&iacute;n Bot&aacute;nico <a href="http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p"> http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p</li>';
}
if($verdes3_parque=="Mal"){
echo'<li>Si tienes alguna duda en materia de salud de las &aacute;reas verdes contacta a Erika Pagaza directora y curadora de Jard&iacute;n Bot&aacute;nico <a href="http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p"> http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p</li>';
}
if($verdes3_parque=="Pesimo"){
echo'<li>Si tienes alguna duda en materia de salud de las &aacute;reas verdes contacta a Erika Pagaza directora y curadora de Jard&iacute;n Bot&aacute;nico <a href="http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p"> http://www.parquesalegres.org/sociedad-botanica-y-zoologica-de-sinaloa-i-a-p</li>';
}
if($afluencia1_parque=="Poco"){
echo'<li>Disciplina con Amor <a href="http://www.parquesalegres.org/disciplina-con-amor"> http://www.parquesalegres.org/disciplina-con-amor</li>';
}
if($orden2_parque=="Poco"){
echo'<li>Visite estas p&aacute;ginas <a href="http://www.parquesalegres.org/fotos-de-anuncios"> http://www.parquesalegres.org/fotos-de-anuncios
<a href="http://www.parquesalegres.org/reglamento-para-espacios-publicos"> http://www.parquesalegres.org/reglamento-para-espacios-publicos</li>';
}
echo'</ul>';
echo'<br>';

		}else{
		echo'<form action="" method="post" name="forma" id="forma">';
echo'<h1>Cuestionario autoevaluaci&oacute;n</h1>

<div>Estas preguntas te ayudaran para Autoevaluar tu parque</div>
<hr>
<br>
Nombre del parque<input type="text" name="nombre" >
<br> 
Contacto<input type="text" name="contacto">
<br> 
Correo<input type="text" name="correo" >
<br>
<h2>Comit&eacute;</h2>
<br> 
<b>&iquest;Con cuantas personas opera su comit&eacute;?</b><br>
<br><input type="radio" name="comite1" checked value="No hay comit&eacute;">No hay comit&eacute; 
<br><input type="radio" name="comite1" value="1">1
<br><input type="radio" name="comite1" value="2">2
<br><input type="radio" name="comite1" value="3 o mas personas">3 o m&aacute;s personas
<br> 
<br><b>&iquest;Su comit&eacute; esta formalizado con el ayuntamiento?</b><br>
<br><input type="radio" name="comite2" value="Tenemos contrato como dato">Tenemos contrato como dato
<br><input type="radio" name="comite2" value="Tenemos escrito">Tenemos escrito
<br><input type="radio" name="comite2" value="Estan enterados">Estan enterados
<br><input type="radio" name="comite2" value="No">No
<br> 
<br><b>&iquest;En su comit&eacute; hay buena organizaci&oacute;n?</b><br>
<br><input type="radio" name="comite3" value="Si" id="group_7_1">Si
<br><input type="radio" name="comite3" value="Mas o menos" id="group_7_2">M&aacute;s o menos
<br><input type="radio" name="comite3" value="No" id="group_7_3">No
<br> 
<br><b>&iquest;En su comit&eacute; hacen reuniones con regularidad?</b><br>
<br><input type="radio" name="comite4" value="Si" id="group_8_1">Si
<br><input type="radio" name="comite4" value="Suficientes" id="group_8_2">Suficientes
<br><input type="radio" name="comite4" value="Muy pocas" id="group_8_3">Muy pocas
<br><input type="radio" name="comite4" value="Casi nunca" id="group_8_4">Casi nunca
<br><input type="radio" name="comite4" value="Nunca" id="group_8_5">Nunca
<br> 
<br><b>&iquest;Tienen alg&uacute;n proyecto en marcha para su parque?</b><br>
<br><input type="radio" name="comite5" value="Si" id="group_9_1">Si
<br><input type="radio" name="comite5" value="Solos los planes" id="group_9_2">Solos los planes
<br><input type="radio" name="comite5" value="Solo ideas" id="group_9_3">Solo ideas
<br><input type="radio" name="comite5" value="No" id="group_9_4">No
<br> 
<h2>Instalaciones</h2>
<br> 
<b>&iquest;Cuentan con instalaciones en su parque?  (bancas, canchas, &aacute;reas verdes, luminarias, etc.)</b><br>
<br><input type="radio" name="instalaciones1" value="Suficientes" id="group_12_1">Suficientes
<br><input type="radio" name="instalaciones1" value="Varias" id="group_12_2">Varias
<br><input type="radio" name="instalaciones1" value="Pocas" id="group_12_3">Pocas
<br><input type="radio" name="instalaciones1" value="Nada" id="group_12_4">Nada
<br> 
<br><b>&iquest;Lo que existe est&aacute; en buen estado?</b><br>
<br><input type="radio" name="instalaciones2" value="Si" id="group_13_1">Si
<br><input type="radio" name="instalaciones2" value="Mas o menos" id="group_13_2">M&aacute;s o menos
<br><input type="radio" name="instalaciones2" value="No" id="group_13_3">No
<br> 
<h2>Ingresos</h2>
<br> 
<b>&iquest;Cuentan con ingresos regulares para su parque?</b><br>
<br><input type="radio" name="ingresos1" value="Suficientes" id="group_16_1">Suficientes
<br><input type="radio" name="ingresos1" value="Mas o menos" id="group_16_2">M&aacute;s o menos
<br><input type="radio" name="ingresos1" value="Pocos" id="group_16_3">Pocos
<br><input type="radio" name="ingresos1" value="Muy pocos" id="group_16_4">Muy pocos
<br><input type="radio" name="ingresos1" value="Nada" id="group_16_5">Nada
<br> 
<br><b>&iquest;Es suficiente lo ingresado para operar bien?</b><br>
<br><input type="radio" name="ingresos2" value="Si" id="group_17_1">Si
<br><input type="radio" name="ingresos2" value="Mas o menos" id="group_17_2">M&aacute;s o menos
<br><input type="radio" name="ingresos2" value="No" id="group_17_3">No
<br> 
<h2>Eventos</h2>
<br> 
<b>&iquest;Realizan eventos con regularidad en el a&ntilde;o?</b><br>
<br><input type="radio" name="eventos1" checked value="Suficientes" id="group_19_1">Suficientes
<br><input type="radio" name="eventos1" value="Varios" id="group_19_2">Varios
<br><input type="radio" name="eventos1" value="Pocos" id="group_19_3">Pocos
<br><input type="radio" name="eventos1" value="Muy pocos" id="group_19_4">Muy pocos
<br><input type="radio" name="eventos1" value="Casi ninguno" id="group_19_5">Casi ninguno
<br><input type="radio" name="eventos1" value="Ninguno" id="group_19_6">Ninguno
<br> 
<br><b>&iquest;Qu&eacute; tipo de eventos han realizado?(puede elegir dos o m&aacute;s opciones)</b><br>
<br><input type="checkbox" name="eventos2" value="Culturales" id="group_20_1">Culturales
<br><input type="checkbox" name="eventos2" value="Recreativos" id="group_20_2">Recreativos
<br><input type="checkbox" name="eventos2" value="Deportivos " id="group_20_3">Deportivos
<br><input type="checkbox" name="eventos2" value="Ecologicos" id="group_20_4">Ecologicos
<br> 
<h2>&Aacute;reas verdes</h2>
<br> 
<b>&iquest;Su parque cuenta con vegetacion? (puede elegir dos o m&aacute;s opciones)</b><br>
<br><input type="checkbox" name="verdes1" value="Arboles grandes" id="group_23_1">Arboles grandes
<br><input type="checkbox" name="verdes1" value="Arboles chicos" id="group_23_2">Arboles chicos
<br><input type="checkbox" name="verdes1" value="Matas y arbustos" id="group_23_3">Matas y arbustos
<br><input type="checkbox" name="verdes1" value="Flores" id="group_23_4">Flores
<br><input type="checkbox" name="verdes1" value="Frutos " id="group_23_5">Frutos
<br><input type="checkbox" name="verdes1" value="Pasto" id="group_23_6">Pasto
<br> 
<br><b>&iquest;El &aacute;rea verde y vegetacion es suficiente?</b><br>
<br><input type="radio" name="verdes2" value="Si" id="group_24_1">Si
<br><input type="radio" name="verdes2" value="Falta un poco mas" id="group_24_2">Falta un poco m&aacute;s
<br><input type="radio" name="verdes2" value="Hay muy poco" id="group_24_3">Hay muy poco
<br><input type="radio" name="verdes2" value="Casi no hay nada" id="group_24_4">Casi no hay nada
<br><input type="radio" name="verdes2" value="No hay nada" id="group_24_5">No hay nada
<br> 
<br><b>&iquest;Lo que existe est&aacute; en buen estado?</b><br>
<br><input type="radio" name="verdes3" value="Si" id="group_25_1">Si
<br><input type="radio" name="verdes3" value="Mas o menos" id="group_25_2">M&aacute;s o menos
<br><input type="radio" name="verdes3" value="Mal" id="group_25_3">Mal
<br><input type="radio" name="verdes3" value="Pesimo" id="group_25_4">Pesimo
<br> 
<br><b>&iquest;Con que frecuencia riega su vegetaci&oacute;n?</b><br>
<br><input type="radio" name="verdes4" value="Constante" id="group_26_1">Constante
<br><input type="radio" name="verdes4" value="Ocasional" id="group_26_2">Ocasional
<br><input type="radio" name="verdes4" value="No se riega" id="group_26_3">No se riega
<br> 
<h2>Afluencia</h2>
<br> 
<b>&iquest;Va suficiente gente a su parque?</b><br>
<br><input type="radio" name="afluencia1" value="Si mucha" id="group_29_1">Si mucha
<br><input type="radio" name="afluencia1" value="Mas o menos" id="group_29_2">M&aacute;s o menos
<br><input type="radio" name="afluencia1" value="Poco" id="group_29_3">Poco 
<br><input type="radio" name="afluencia1" value="Casi nada" id="group_29_4">Casi nada
<br><input type="radio" name="afluencia1" value="nada" id="group_29_4">Nada
<br>
<br><b>&iquest;Va gente a su parque diario?</b><br>
<br><input type="radio" name="afluencia2" value="Si bastante" id="group_30_1">Si bastante
<br><input type="radio" name="afluencia2" value="Regular" id="group_30_2">Regular
<br><input type="radio" name="afluencia2" value="Casi nada" id="group_30_3">Casi nada
<br> 
<br><b>&iquest;Qu&eacute; d&iacute;as va m&aacute;s gente?</b><br>
<br><input type="radio" name="afluencia3" value="De lunes a viernes " id="group_31_2">De Lunes a Viernes 
<br><input type="radio" name="afluencia3" value="Sabado" id="group_31_3">Sabado
<br><input type="radio" name="afluencia3" value="Domingo" id="group_31_4">Domingo
<br> 
<br><b>&iquest;Se usa su parque de noche?</b><br>
<br><input type="radio" name="afluencia4" value="Si" id="group_32_1">Si
<br><input type="radio" name="afluencia4" value="A veces" id="group_32_2">A veces
<br><input type="radio" name="afluencia4" value="Casi nada" id="group_32_4">Casi nada
<br><input type="radio" name="afluencia4" value="Nada" id="group_32_5">Nada
<br> 
<h2>Orden</h2>
<br> 
<b>&iquest;Su parque se mantiene limpio?</b><br>
<br><input type="radio" name="orden1" value="Si" id="group_34_1">Si
<br><input type="radio" name="orden1" value="Regularmente" id="group_34_2">Regularmente
<br><input type="radio" name="orden1" value="Casi nada" id="group_34_3">Casi nada
<br><input type="radio" name="orden1" value="No" id="group_34_4">No
<br> 
<br><b>&iquest;Se respetan y cuidan las instalaciones de su parque?</b><br>
<br><input type="radio" name="orden2" value="Si" id="group_35_1">Si
<br><input type="radio" name="orden2" value="Regularmente" id="group_35_2">Regularmente
<br><input type="radio" name="orden2" value="Poco " id="group_35_3">Poco
<br><input type="radio" name="orden2" value="No" id="group_35_4">No
<br>
<input type="submit" name="submit" value="Enviar"></form>';
}
echo'</form></body></html>';
?>