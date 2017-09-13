<?php
ini_set('display_errors',1);
ini_set('error_reporting',E_ERROR);
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
if (is_user_logged_in()){
    $user = wp_get_current_user();
    echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte Parques Alegres</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    <style>
    .CSSTableGenerator {
            margin:0px;padding:0px;
    
            border:1px solid #3f7f00;
            
            -moz-border-radius-bottomleft:10px;
            -webkit-border-bottom-left-radius:10px;
            border-bottom-left-radius:10px;
            
            -moz-border-radius-bottomright:10px;
            -webkit-border-bottom-right-radius:10px;
            border-bottom-right-radius:10px;
            
            -moz-border-radius-topright:10px;
            -webkit-border-top-right-radius:10px;
            border-top-right-radius:10px;
            
            -moz-border-radius-topleft:10px;
            -webkit-border-top-left-radius:10px;
            border-top-left-radius:10px;
    }.CSSTableGenerator table{
        border-collapse: collapse;
            border-spacing: 0;
            width:100%;
            margin:0px;padding:0px;
    }.CSSTableGenerator tr:last-child td:last-child {
            -moz-border-radius-bottomright:10px;
            -webkit-border-bottom-right-radius:10px;
            border-bottom-right-radius:10px;
    }
    .CSSTableGenerator table tr:first-child td:first-child {
            -moz-border-radius-topleft:10px;
            -webkit-border-top-left-radius:10px;
            border-top-left-radius:10px;
    }
    .CSSTableGenerator table tr:first-child td:last-child {
            -moz-border-radius-topright:10px;
            -webkit-border-top-right-radius:10px;
            border-top-right-radius:10px;
    }.CSSTableGenerator tr:last-child td:first-child{
            -moz-border-radius-bottomleft:10px;
            -webkit-border-bottom-left-radius:10px;
            border-bottom-left-radius:10px;
    }
    .CSSTableGenerator tr:nth-child(odd){ background-color:#d4ffaa; }
    .CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
            vertical-align:middle;
            
            
            border:1px solid #3f7f00;
            border-width:0px 1px 1px 0px;
            text-align:left;
            padding:7px;
            font-size:12px;
            font-family:Arial;
            font-weight:normal;
            color:#000000;
    }.CSSTableGenerator tr:last-child td{
            border-width:0px 1px 0px 0px;
    }.CSSTableGenerator tr td:last-child{
            border-width:0px 0px 1px 0px;
    }.CSSTableGenerator tr:last-child td:last-child{
            border-width:0px 0px 0px 0px;
    }
    .CSSTableGenerator tr:first-child td{
                    background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
            background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);
    
            background-color:#5fbf00;
            border:0px solid #3f7f00;
            text-align:center;
            border-width:0px 0px 1px 1px;
            font-size:15px;
            font-family:Arial;
            font-weight:bold;
            color:#ffffff;
    }
    .CSSTableGenerator tr:first-child td:first-child{
            border-width:0px 0px 1px 0px;
    }
    .CSSTableGenerator tr:first-child td:last-child{
            border-width:0px 0px 1px 1px;
    }
    .reset tr:last-child td:last-child {
            -moz-border-radius-bottomright:0px;
            -webkit-border-bottom-right-radius:0px;
            border-bottom-right-radius:0px;
    }
    .reset table tr:first-child td:first-child {
            -moz-border-radius-topleft:0px;
            -webkit-border-top-left-radius:0px;
            border-top-left-radius:0px;
    }
    .reset table tr:first-child td:last-child {
            -moz-border-radius-topright:0px;
            -webkit-border-top-right-radius:0px;
            border-top-right-radius:0px;
    }.reset tr:last-child td:first-child{
            -moz-border-radius-bottomleft:0px;
            -webkit-border-bottom-left-radius:0px;
            border-bottom-left-radius:0px;
    }
    .reset tr:nth-child(odd){ background-color: rgba(0, 0, 0, 0); }
    .reset tr:nth-child(even)    { background-color: rgba(0, 0, 0, 0); }.reset td{
            vertical-align:middle;
            
            
            border:0px;
            border-width:0px 0px 0px 0px;
            text-align:left;
            padding:7px;
            font-size:12px;
            font-family:Arial;
            font-weight:normal;
            color:#000000;
    }
    .reset tr:last-child td{
            border-width:0px 0px 0px 0px;
    }.reset tr td:last-child{
            border-width:0px 0px 0px 0px;
    }.reset tr:first-child td{
                    background:-o-linear-gradient(bottom, rgba(0, 0, 0, 0) 5%, rgba(0, 0, 0, 0) 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, rgba(0, 0, 0, 0)), color-stop(1, rgba(0, 0, 0, 0)) );
            background:-moz-linear-gradient( center top, rgba(0, 0, 0, 0) 5%, rgba(0, 0, 0, 0) 100% );
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);
    
            background-color:rgba(0, 0, 0, 0);
            border:0px solid #3f7f00;
            text-align:center;
            border-width:0px 0px 1px 1px;
            font-size:12px;
            font-family:Arial;
            font-weight:normal;
            color:#000000;
    }
    .reset tr:last-child td:last-child{
            border-width:0px 0px 0px 0px;
    }
    .reset tr:first-child td:first-child{
            border-width:0px 0px 0px 0px;
    }
    .reset tr:first-child td:last-child{
            border-width:0px 0px 0px 0px;
    }
    
    </style>
    </head>';
    echo '<body>';
    /*<script>
        (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,"script","https://www.google-analytics.com/analytics.js","ga");
      
        ga("create", "UA-2870347-29", "auto");
        ga("send", "pageview");
      
    </script>';*/
    if($_GET['rep']==1){
    echo '<!-- Se determina y escribe la localizacion -->
    <div id="ubicacion"></div>
    <script type="text/javascript">
            if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(mostrarUbicacion);
            } else {alert("¡Error! Este navegador no soporta la Geolocalización.");}
    function mostrarUbicacion(position) {
        var times = position.timestamp;
            var latitud = position.coords.latitude;
            var longitud = position.coords.longitude;
        var altitud = position.coords.altitude;	
            var exactitud = position.coords.accuracy;	
            var div = document.getElementById("ubicacion");
            div.innerHTML = "Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;}	
    function refrescarUbicacion() {	
            navigator.geolocation.watchPosition(mostrarUbicacion);}	
    </script>
    
    <!-- Se escribe un mapa con la localizacion anterior-->
    <div id="demo"></div>
    <div id="mapholder"></div>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <button onclick="cargarmap()">Cargar mapa</button>
    <script type="text/javascript">
    var x=document.getElementById("demo");
    function cargarmap(){
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    function showPosition(position)
      {
      lat=position.coords.latitude;
      lon=position.coords.longitude;
      latlon=new google.maps.LatLng(lat, lon)
      mapholder=document.getElementById(\'mapholder\')
      mapholder.style.height=\'250px\';
      mapholder.style.width=\'500px\';
      var myOptions={
      center:latlon,zoom:10,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      mapTypeControl:false,
      navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
      };
      var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
      var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
      }
    function showError(error)
      {
      switch(error.code) 
        {
        case error.PERMISSION_DENIED:
          x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML="La información de la localización no esta disponible."
          break;
        case error.TIMEOUT:
          x.innerHTML="El tiempo de petición ha expirado."
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML="Ha ocurrido un error desconocido."
          break;
        }
      }}
    </script>';
    }
    function iniciosemana(){
        $diaact=date("N");
        $diaact=$diaact-1;
        if(date("N")!=7){
            $diaact=$diaact+7;
        }
        return date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$diaact.' days'));
    }
    echo '<form method="post">';
    if($_POST['fecha_inicial']){
        $fecha=$_POST['fecha_inicial'];
    }
    else{
        $fecha=iniciosemana();
    }
    $meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
                 "11"=>"Noviembre","12"=>"Diciembre");
    $fechafin=date('Y-m-d', strtotime($fecha. ' + 6 days'));
    $fecha2sem=date('Y-m-d', strtotime($fecha. ' - 7 days'));
    $fecha3sem=date('Y-m-d', strtotime($fecha. ' - 14 days'));
    $fecha4sem=date('Y-m-d', strtotime($fecha. ' - 21 days'));
    $fecha5sem=date('Y-m-d', strtotime($fecha. ' - 28 days'));
    $tipovisita=array(1=>"Reforzamiento",2=>"Seguimiento",3=>"Evento",4=>"Prospectación",5=>"Formacion de comité");
    $paramcomite=array("Opera"=>"opera","Formaliza"=>"formaliza","Organización"=>"organiza","Reuniones"=>"reunion","Proyecto"=>"proyecto");
    $paraminst=array("Visión del espacio"=>"vespacio","Diseño"=>"disenio","Ejecutivo"=>"ejecutivo","Estado"=>"estado","Instalaciones"=>"instalaciones");
    $paramingre=array("Ingresos permanentes"=>"ingresop","Es suficiente"=>"ingresadop","Mancomunado"=>"mancomunado");
    $parameven=array("Eventos con regularidad"=>"eventosr","Calendario"=>"eventos");
    $paramverdes=array("Áreas verdes"=>"averdes","Estado"=>"estaver");
    $paramorden=array("Respeto"=>"respint","Orden"=>"orden","Limpieza"=>"limpieza");
    $compromisos=array(1=>"Reestructuración del comité","Formalizar el comité ante el ayuntamiento","Elaborar por escrito las políticas de trabajo del comité",
                       "Plan de trabajo (por lo menos para un periodo de seis meses)","Calendario de reuniones del comité. (Se sugiere una cada 30 días)",
                       "Programa de reuniones vecinales (se sugiere una cada tres meses)","Verificar el estatus legal del parque","Elaborar la visión del espacio",
                       "Gestionar el diseño arquitectónico","Gestionar el proyecto ejecutivo","Mantenimiento","Rehabilitación","Remodelación","Nueva adquisición",
                       "Programa de pago vecinal para mantenimineto del parque","Organización cooperación vecinal pro rehabilitación del parque",
                       "Organización de cooperación vecinal pro - adquisición infraestructura","Gestión de recibos deducibles de impuestos","Torneos deportivos",
                       "Celebración de días festivos","Rifa","Evento cultural","Función de cine","Carrera pedestre","Noche bohemia","Informe de ingresos y egresos",
                       "Generar recibos de ingresos","Archivar comprobante de gastos","Abrir cuenta mancomunada",
                       "Participación activa en la organización de eventos (tener asignado un rol y una responsabilidad)","Particpación activa en la promoción de los eventos",
                       "Función de cine","Carrera pedestre","Noche bohemia","Convivio recreativo","Calendario anual de eventos",
                       "Expediente de evidencias fotográficas de eventos","Gestionar árboles en Ayuntamiento y Parque Botánico","Gestionar plantas de ornanto en Ayuntamiento",
                       "Siembra de árboles","Colocación de cesped natural y/o sintético","Protección para árboles pequeños","Campaña de limpieza",
                       "Ferlilizar árboles con componentes orgnánicos","Nomeclatura de la vegetación en el parque","Adquisición de herramientas de limpieza","Fumigación",
                       "Instalar sistema de riego","Adquisición de herramientas de jardinería","Poda de árboles y/o cesped","Promotor deportivo","Clases y/o talleres deporivos",
                       "Futbol","Basquetbol","Zumba","Clases y/o talleres culturales","Pintura","Danza","Clubes con diversos objetivos para niños, adolescentes y adultos",
                       "Club de ciclismo",'Campaña de "invita a un vecino"',"Torneos","Deportivo","Cultural","Artístico","Comité de niños","Invitación a Voluntariado",
                       "Curso de verano deportivo o cultural","Ciclo de pláticas y conferencias para Padres, Adolescentes y niños","Campañmentos","Murales",
                       "Gestión de vigilancia para el parque","Delimitación de espacios","Contratar velador","Creación de reglamento del parque",
                       "Instalación de reglamento de parque","Instalación de señalización","Botón de pánico","Instalación de Timer para control de recursos",
                       "Jornada de limpieza","Contratar jardinero",84=>"Campañas",85=>"Fondos económicos",86=>"Tejido social");
    $compesp=array(1=>"Bancas","Cerca","Alumbrado","Baños","Fuentes","Botes de basura","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas",
                   "Cajones de estacionamiento","Canasta de reciclaje","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol",
                   "Cancha de beisbol","Cancha de softbol","Mesa de ping pong","Back Stop","Porterias","Tableros","Aros","Losa","Pintura","Andadores","Gradas","Ejercitadores",
                   "Ciclovía","Gimnasio","Techumbre","Área de adoquín","Bordillo de concreto","Piñateros","Comedores","Asadores","Juegos infantiles","Palapa","Alberca",
                   "Camastros","Regaderas","Césped","Árboles","Arbustos","Toma de agua","Sistema de riego");
    $compespecial=array(1=>"Instalaciones","Baños","Fuentes","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas","Cajones de estacionamiento",
                        "Deportiva","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol","Cancha de beisbol","Cancha de softbol",
                        "Porterias","Losa","Andadores","Gradas","Ciclovía","Gimnasio","Areas de esparcimiento","Techumbre","Área de adoquín","Comedores");
    $compesp2=array(1=>"Limpieza","Árboles");
    $compesp3=array(1=>"Torneos","Tianguis","Kermes","Dias festivos","Rifa","Evento cultural","Funcion de cine","Carrera pedestre","Noche bohemia");
    //$asesores=array(168,38,1225,1232,1438,1581,1582,1512,59,1583,1515,1584,1585,1586,1587,11,1842);
    $asesores=array();
    if(trim($user->ID)==1842 || trim($user->ID)==1478){
        $sql="select ID,cod from asesores where stat<1";
        $res=mysql_query($sql);
        while($row=mysql_fetch_array($res)) {
                $asesores[$row['cod']]=$row['ID'];
        }
    }
    else{
        $sql="select ID,cod from asesores where stat<1 and ID='".trim($user->ID)."'";
        $res=mysql_query($sql);
        while($row=mysql_fetch_array($res)) {
                $asesores[$row['cod']]=$row['ID'];
        }
    }
    if(count($asesores)<1){
        echo 'Al parecer no tienes acceso a este sitio. <a href="http://parquesalegres.org/tablet/reporte.php">Reintentar</a><br>';
        exit();
    }
    echo 'Fecha de inicio de la semana: <input type="text" readonly id="datepicker" value="'.$fecha.'" name="fecha_inicial"/>&nbsp;<input type="submit" onclick="this.form.action = \'reporte.php\'" value="Filtrar">&nbsp;<input type="submit" onclick="this.form.action = \'repexcel.php\'" value="Generar Reporte"><br>';
    function compararFechas($primera, $segunda){
        $valoresPrimera = explode ("-", $primera);   
        $valoresSegunda = explode ("-", $segunda); 
        
        $anyoPrimera = $valoresPrimera[0];  
        $mesPrimera = $valoresPrimera[1];  
        $diaPrimera = $valoresPrimera[2]; 
        $anyoSegunda = $valoresSegunda[0];  
        $mesSegunda = $valoresSegunda[1];  
        $diaSegunda = $valoresSegunda[2];
        $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);
        $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
        if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
            // "La fecha ".$primera." no es válida";
            return 0;
        }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
            // "La fecha ".$segunda." no es válida";
            return 0;
        }else{
            return  $diasPrimeraJuliano - $diasSegundaJuliano;
        }
    }
    
    foreach($asesores as $k=>$v){
        $sql1="select display_name from wp_users where id=".$v."";
        $res1=mysql_query($sql1);
        $row1=mysql_fetch_array($res1);
        $sql2="select SUM(visitas) as totvisitas,COUNT(visitas) as parques,(SUM(suma)/7) as promedio from (select COUNT(v.cve) as visitas, (SUM(v.opera)+SUM(v.formaliza)+SUM(v.organiza)+SUM(v.reunion)+SUM(v.proyecto)+SUM(v.disenio)+SUM(v.ejecutivo)+SUM(v.vespacio)+SUM(v.instalaciones)+SUM(v.estado)+SUM(v.ingresop)+SUM(v.ingresadop)+SUM(v.mancomunado)+SUM(v.eventos)+SUM(v.eventosr)+SUM(v.averdes)+SUM(v.estaver)+SUM(v.gente)+SUM(v.limpieza)+SUM(v.orden)+SUM(v.respint)) as suma from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita<='".$fechafin."' group by v.cve_parque) as a";
        $res2=mysql_query($sql2);
        $row2=mysql_fetch_array($res2);
        $sql3="select v.cve_parque,MIN(v.fecha_visita) as primera from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND parque.post_author=".$v." GROUP BY v.cve_parque";
        $res3=mysql_query($sql3);
        $visita=0;
        while($row3=mysql_fetch_array($res3)){
            $dias=compararFechas($row3['primera'],$fecha);
            if($dias<=6 && $dias>=0 && $row3['primera']!="0000-00-00"){
                $visita++;
            }
        }
        $sql4="select COUNT(v.cve) as visitas from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."'";
        $res4=mysql_query($sql4);
        $row4=mysql_fetch_array($res4);
        $sql44="select COUNT(v.cve) as visitas from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id INNER JOIN wp_visitascom_parques c ON c.cve_visita=v.cve where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."' AND c.tipo_visita='2'";
        $res44=mysql_query($sql44);
        $row44=mysql_fetch_array($res44);
        $sql45="select COUNT(v.cve) as visitas from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id INNER JOIN wp_visitascom_parques c ON c.cve_visita=v.cve where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."' AND c.tipo_visita='4'";
        $res45=mysql_query($sql45);
        $row45=mysql_fetch_array($res45);
        $sql499="select COUNT(v.cve) as visitas from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id INNER JOIN wp_visitascom_parques c ON c.cve_visita=v.cve where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."' AND c.tipo_visita='1'";
        $res499=mysql_query($sql499);
        $row499=mysql_fetch_array($res499);
        $sql498="select COUNT(v.id) as visitas from wp_visitas_reforzamiento v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."' AND cve_parametros=0";
        $res498=mysql_query($sql498);
        $row498=mysql_fetch_array($res498);
        $sql497="select COUNT(v.id) as visitas from wp_visitas_standby v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."'";
        $res497=mysql_query($sql497);
        $row497=mysql_fetch_array($res497);
        //select COUNT(cve_parque), SUM(fecha) from (select v.cve_parque,IF((fecha_visita>"2015-04-24" AND fecha_visita<"2015-04-30"),1,0) as fecha from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_author="38" AND v.opera>=7 GROUP by v.cve_parque) as a
        //$sql5="select cve from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_author=".$v." AND v.opera>=7 GROUP by v.cve_parque";
        /*$sql5="select COUNT(id) as comites, SUM(fecha) as semana from (select c.id,IF((c.fecha_alta>='".$fecha."' AND c.fecha_alta<='".$fechafin."'),1,0) as fecha from comite_parque c INNER JOIN wp_posts parque ON c.cve_parque=parque.id where parque.post_author=".$v." GROUP by c.cve_parque) as a";
        $res5=mysql_query($sql5);
        $row5=mysql_fetch_array($res5);
        */
        $numcomites=0;
        $semcomites=0;
        $sql5="select id,post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$v."' order by post_title ASC";
        $res5=mysql_query($sql5);
        //echo '<table border=1>';
        while($row5=mysql_fetch_array($res5)){
                $sqlss="select cve, cve_parque, fecha_visita, opera,IF((fecha_visita>='".$fecha."' AND fecha_visita<='".$fechafin."'),1,0) as fecha from wp_comites_parques where cve_parque='".$row5['id']."' AND fecha_visita<='".$fechafin."' order by fecha_visita DESC, cve DESC limit 1";
                $ress=mysql_query($sqlss);
                $rows=mysql_fetch_array($ress);
                if($rows['opera']>=7){
                    //echo '<tr><td>Parque:</td><td>'.$row5['post_title'].'</td><td>Fecha de la visita:</td><td>'.$rows['fecha_visita'].'</td><td>Valor de opera:</td><td>'.$rows['opera'].'</td></tr>';
                    $numcomites++;
                    if($rows['fecha']>0){
                        $sqlss2="select cve, cve_parque, fecha_visita, opera from wp_comites_parques where cve_parque='".$rows['cve_parque']."' AND fecha_visita<'".$fecha."' order by fecha_visita DESC, cve DESC limit 1";
                        $ress2=mysql_query($sqlss2);
                        $rows2=mysql_fetch_array($ress2);
                        if($rows2['opera']==0){
                            $semcomites++;
                        }
                    }
                }
        }
        //echo '</table>';
        $sql6="select c.cve,c.cve_parque,c.cve_visita,c.parametro,c.compromiso from compromisos c INNER JOIN wp_posts parque ON c.cve_parque=parque.id INNER JOIN wp_comites_parques v ON c.cve_visita=v.cve where parque.post_status='publish' AND parque.post_author=".$v." AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."'";
        $res6=mysql_query($sql6);
        /*while($row6=mysql_fetch_array($res6)){
            $compromiso[$row6['cve']]=array($row['cve_parque']);
            $visita[$row6['cve_visita']][]=array($row6['parametro']=>$row6['compromiso']);
            $parques[$row6['cve_parque']][]=array($row6['cve_visita']=>array($row6['parametro']=>$row6['compromiso']));
        }*/
        echo '<font size="4"><b>Asesor: </b>'.$row1['display_name'].'<br>';
        echo '<b>Cartera: </b><br>';
        echo '<b>Reporte de evidencias</b><br>';
        echo '<div class="CSSTableGenerator"><table>
        <tr>
        <td colspan="7">Datos generales de la visita</td><td colspan="4">Evaluación del parque</td><td colspan="7">Observaciones por subparámetro</td>';
        //echo '<td>Compromisoso establecidos en la semana</td><td>Compromisos en seguimiento</td><td>Compromisos cumplidos</td>';
        echo '<td colspan="3">Compromisos en números</td><td colspan="5">Experiencias Exitosas</td>
        </tr>
        <td>#</td><td>Dia</td><td>Mes</td><td>Año</td><td>Nombre del parque</td><td>Tipo de visita</td><td>Ingresos</td>
        <td>Calificación anterior</td><td>Calificación actual</td><td>Diferencia</td><td>Número de visitas</td>
        <td style="min-width:200px">Comité</td><td style="min-width:200px">Instalaciones</td><td style="min-width:200px">Ingresos</td><td style="min-width:200px">Eventos</td>
        <td style="min-width:200px">Áreas Verdes</td><td style="min-width:200px">Afluencia</td><td style="min-width:200px">Orden</td>';
        /* echo '<td style="min-width:200px">Compromisos</td><td style="min-width:200px">Compromisos</td><td style="min-width:200px">Compromisos</td>';
        <td>No. Compromisos en la semana</td><td>No. Compromisoso en seguimiento</td><td>No. de compromisos cumplidos en la semana</td>
        <td>No. de compromisos no cumplidos</td>';
        */
        echo '<td>No. de compromisos acumulados</td><td>No. de compromisos cumplidos acumulados</td><td>Porcentaje de cumplimiento</td><td>Link del parque</td>
        <td>Experiencia exitosa</td><td>Link experiencia exitosa</td><td>Experiencias exitosas replicadas</td><td>Link experiencia exitosa replicada</td>
        </tr>';
        $total3sem=0;
        $sql7="select v.cve as cve_visita,v.cve_parque,v.fecha_visita,t.*,p.post_title, v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as sumactual from wp_comites_parques v INNER JOIN wp_posts p ON v.cve_parque=p.id LEFT JOIN wp_visitascom_parques t ON v.cve=t.cve_visita WHERE post_status='publish' AND post_author='".$v."' AND v.fecha_visita>='".$fecha."' AND v.fecha_visita<='".$fechafin."' ORDER BY v.cve_parque,v.fecha_visita DESC";
        $res7=mysql_query($sql7);
        $sql77="select v.cve,v.cve_parque,v.fecha_visita, v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma2sem from wp_comites_parques v INNER JOIN wp_posts p ON v.cve_parque=p.id WHERE post_status='publish' AND post_author='".$v."' AND v.fecha_visita>='".$fecha2sem."' AND v.fecha_visita<'".$fecha."'";
        $res77=mysql_query($sql77);
        if(mysql_num_rows($res77)>0){
            $totvisitaact2=0;
            $totvisitaant2=0;
            while($row77=mysql_fetch_array($res77)){
                $sql88="select v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma from wp_comites_parques v where cve_parque='".$row77['cve_parque']."' AND fecha_visita<'".$fecha2sem."' order by fecha_visita DESC, cve DESC limit 1";
                $res88=mysql_query($sql88);
                if(mysql_num_rows($res88)>0){    
                    while($row88=mysql_fetch_array($res88)){
                        $totvisitaant2=$totvisitaant2+round($row88['suma']/7);
                    }
                }
                $totvisitaact2=$totvisitaact2+round($row77['suma2sem']/7);
            }
            $incremento2=round(($totvisitaact2-$totvisitaant2)/mysql_num_rows($res77));
        }
        else{
            $incremento2=0;
        }
        $sql777="select v.cve,v.cve_parque,v.fecha_visita, v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma3sem from wp_comites_parques v INNER JOIN wp_posts p ON v.cve_parque=p.id WHERE post_status='publish' AND post_author='".$v."' AND v.fecha_visita>='".$fecha3sem."' AND v.fecha_visita<'".$fecha2sem."'";
        $res777=mysql_query($sql777);
        if(mysql_num_rows($res777)>0){
            $totvisitaact3=0;
            $totvisitaant3=0;
            while($row777=mysql_fetch_array($res777)){
                $sql888="select v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma from wp_comites_parques v where cve_parque='".$row777['cve_parque']."' AND fecha_visita<'".$fecha3sem."' order by fecha_visita DESC, cve DESC limit 1";
                $res888=mysql_query($sql888);
                if(mysql_num_rows($res888)>0){    
                    while($row888=mysql_fetch_array($res888)){
                        $totvisitaant3=$totvisitaant3+round($row888['suma']/7);
                    }
                }
                $totvisitaact3=$totvisitaact3+round($row777['suma3sem']/7);
            }
            $incremento3=round(($totvisitaact3-$totvisitaant3)/mysql_num_rows($res777));
        }
        else{
            $incremento3=0;
        }
        $sql7777="select v.cve,v.cve_parque,v.fecha_visita, v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma4sem from wp_comites_parques v INNER JOIN wp_posts p ON v.cve_parque=p.id WHERE post_status='publish' AND post_author='".$v."' AND v.fecha_visita>='".$fecha4sem."' AND v.fecha_visita<'".$fecha3sem."'";
        $res7777=mysql_query($sql7777);
        if(mysql_num_rows($res7777)>0){
            $totvisitaact4=0;
            $totvisitaant4=0;
            while($row7777=mysql_fetch_array($res7777)){
                $sql8888="select v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma from wp_comites_parques v where cve_parque='".$row7777['cve_parque']."' AND fecha_visita<'".$fecha4sem."' order by fecha_visita DESC, cve DESC limit 1";
                $res8888=mysql_query($sql8888);
                if(mysql_num_rows($res8888)>0){    
                    while($row8888=mysql_fetch_array($res8888)){
                        $totvisitaant4=$totvisitaant4+round($row8888['suma']/7);
                    }
                }
                $totvisitaact4=$totvisitaact4+round($row7777['suma4sem']/7);
            }
            $incremento4=round(($totvisitaact4-$totvisitaant4)/mysql_num_rows($res7777));
        }
        else{
            $incremento4=0;
        }
        $totvisitaant=0;
        $totvisitaact=0;
        $e=0;
        $h=0;
        $postid=array(0=>"",1=>"");
        $filtro="";
        $cve_parque="";
        if(mysql_num_rows($res7)>0){
            while($row7=mysql_fetch_array($res7)){
                $fecha_visita=explode('-',$row7['fecha_visita']);
                echo '<tr><td>'.$row7['cve_parque'].'</td><td>'.$fecha_visita[2].'</td><td>'.$meses[$fecha_visita[1]].'</td><td>'.$fecha_visita[0].'</td><td>'.$row7['post_title'].'</td><td>'.$tipovisita[$row7['tipo_visita']].'</td><td></td>';
                if($cve_parque==$row7['cve_parque']){
                    $filtro_vis.="AND v.cve!='".$cve_visita."' ";
                }
                else{
                    $filtro_vis="";
                }
                $sql8="select v.opera+v.formaliza+v.organiza+v.reunion+v.proyecto+v.disenio+v.ejecutivo+v.vespacio+v.instalaciones+v.estado+v.ingresop+v.ingresadop+v.mancomunado+v.eventos+v.eventosr+v.averdes+v.estaver+v.gente+v.limpieza+v.orden+v.respint as suma from wp_comites_parques v where cve_parque='".$row7['cve_parque']."' AND fecha_visita<='".$fechafin."' AND v.cve!='".$row7['cve_visita']."' $filtro_vis order by fecha_visita DESC, cve DESC limit 1";
                $res8=mysql_query($sql8);
                $cve_parque=$row7['cve_parque'];
                $cve_visita=$row7['cve_visita'];
                if(mysql_num_rows($res8)>0){    
                    while($row8=mysql_fetch_array($res8)){
                        $diferencia=round($row7['sumactual']/7)-round($row8['suma']/7);
                        echo '<td>'.round($row8['suma']/7).'</td>';
                        $totvisitaant=$totvisitaant+round($row8['suma']/7);
                        $suma=round($row8['suma']/7);
                    }
                }
                else{
                    $diferencia=round($row7['sumactual']/7);
                    echo '<td>0</td>';
                    $suma="0";
                }
                $sql9="select count(cve) as visit from wp_comites_parques where cve_parque='".$row7['cve_parque']."' AND fecha_visita<='".$row7['fecha_visita']."'";
                $res9=mysql_query($sql9);
                $row9=mysql_fetch_array($res9);
                $comentcomite="";
                foreach($paramcomite as $k=>$val){
                    if($row7[$val]!=""){
                        if($comentcomite==""){
                            $comentcomite=$k.': '.$row7[$val];
                        }
                        else{
                            $comentcomite.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $comentinst="";
                foreach($paraminst as $k=>$val){
                    if($row7[$val]!=""){
                        if($comentinst==""){
                            $comentinst=$k.': '.$row7[$val];
                        }
                        else{
                            $comentinst.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $comentingre="";
                foreach($paramingre as $k=>$val){
                    if($row7[$val]!=""){
                        if($comentingre==""){
                            $comentingre=$k.': '.$row7[$val];
                        }
                        else{
                            $comentingre.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $comenteven="";
                foreach($parameven as $k=>$val){
                    if($row7[$val]!=""){
                        if($comenteven==""){
                            $comenteven=$k.': '.$row7[$val];
                        }
                        else{
                            $comenteven.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $comentverdes="";
                foreach($paramverdes as $k=>$val){
                    if($row7[$val]!=""){
                        if($comentverdes==""){
                            $comentverdes=$k.': '.$row7[$val];
                        }
                        else{
                            $comentverdes.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $comentorden="";
                foreach($paramorden as $k=>$val){
                    if($row7[$val]!=""){
                        if($comentorden==""){
                            $comentorden=$k.': '.$row7[$val];
                        }
                        else{
                            $comentorden.=' - '.$k.': '.$row7[$val];   
                        }
                    }
                }
                $totvisitaact=$totvisitaact+round($row7['sumactual']/7);
                echo '<td>'.round($row7['sumactual']/7).'</td><td>'.$diferencia.'</td><td>'.$row9['visit'].'</td><td>'.$comentcomite.'</td><td>'.$comentinst.'</td>
                <td>'.$comentingre.'</td><td>'.$comeneven.'</td><td>'.$comentverdes.'</td><td>'.$row7['gente'].'</td><td>'.$comentorden.'</td>';
                /*echo '<td><div class="reset"><table><tr>';
                $sql10="select * from compromisos where cve_parque='".$row7['cve_parque']."' AND cve_visita='".$row7['cve_visita']."'";
                $res10=mysql_query($sql10);
                $ch=0;
                $comprotemp="";
                if(mysql_num_rows($res10)>0){
                    while($row10=mysql_fetch_array($res10)){
                        if($row10['parametro']=="instalaciones" || $row10['parametro']=="estado" || $row10['parametro']=="eventosr"){
                            $fecha_cumpl=$row10['fecha_cumplimiento'];
                            $comp=explode(",",$row10['compromiso']);
                            if($comp[0]==13){
                                $namee=$compespecial[$comp[1]];
                            }
                            elseif($comp[0]==84){
                                $namee=$compesp2[$comp[1]];
                            }
                            elseif($comp[0]==85 || $comp[0]==86){
                                $namee=$compesp3[$comp[1]];
                            }
                            else{
                                $namee=$compesp[$comp[1]];
                            }
                            echo '<td>'.$compromisos[$comp[0]].': '.$namee.'</td>';
                            $comprotemp.="'".$compromisos[$comp[0]].": ".$namee."'|";
                        }
                        else{
                            $fecha_cumpl=$row10['fecha_cumplimiento'];
                            echo '<td>'.$compromisos[$row10['compromiso']].'</td>';
                            $comprotemp.="'".$compromisos[$row10['compromiso']]."'|";
                        }
                        $ch++;
                    }
                }
                else{
                    echo '<td></td>';
                    $comprotemp="''";
                }
                echo '</tr></table></div></td><td><table class="reset"><tr><td></td></tr></table></td><td><table class="reset"><tr><td></td></tr></table></td>';
                */
                $sql11="select * from compromisos where cve_parque='".$row7['cve_parque']."'";
                $res11=mysql_query($sql11);
                $chc=0;
                $pjec=0;
                if(mysql_num_rows($res11)>0){
                    while($row11=mysql_fetch_array($res11)){
                        if($row11['estatus']==3){
                            $chc++;
                        }
                    }
                    $pjec=round(($chc*100)/mysql_num_rows($res11));
                }
                //echo '<td>'.$ch.'</td><td></td><td></td><td></td><td>'.mysql_num_rows($res11).'</td><td></td>';
                echo '<td>'.mysql_num_rows($res11).'</td><td>'.$chc.'</td><td>'.$pjec.'%</td>';
                echo '<td><a href="'.get_permalink($row7['cve_parque']).'" target="_blank">'.get_permalink($row7['cve_parque']).'</a></td>';
                /*$sql12="select p.ID, p.post_title from wp_posts p INNER JOIN wp_postmeta m ON p.ID=m.post_id WHERE p.post_type='experiencia_exitosa' AND m.meta_key='_cmb_parque' AND m.meta_value='".$row7['cve_parque']."'";
                $res12=mysql_query($sql12);
                $row12=mysql_fetch_array($res12);*/
                $sql12="select p.ID, p.post_title from wp_posts p INNER JOIN wp_postmeta m ON p.ID=m.post_id WHERE p.post_author='".$v."' AND p.post_type='experiencia_exitosa' AND m.meta_key='_cmb_event_date' AND m.meta_value>='".$fecha."' AND m.meta_value<='".$fechafin."' $filtro limit 1";
                $res12=mysql_query($sql12);
                //echo $sql12.'<br>';
                $titexperiencia="";
                $linkexperiencia="";
                if(mysql_num_rows($res12)>0){
                    while($row12=mysql_fetch_array($res12)){
                        echo '<td>'.$row12['post_title'].'</td><td><a href="'.get_permalink($row12['ID']).'" target="_blank">'.get_permalink($row12['ID']).'</a></td>';
                        $titexperiencia=$row12['post_title'];
                        $linkexperiencia=get_permalink($row12['ID']);
                        $filtro.="AND p.ID!='".$row12['ID']."' ";
                    }
                }else{
                    echo '<td></td><td></td>';
                }
                /*$args = array(
                        'post_author' => $v,
                        'post_type'  => 'experiencia_exitosa',
                        'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                        'key' => '_cmb_event_date',
                                        'value' => $fecha,
                                        'compare' => '>=',
                                ),
                                array(
                                        'key' => '_cmb_event_date',
                                        'value' => $fechafin,
                                        'compare' => '<=',
                                )
                        ),
                        'posts_per_page'=>1
                );
                $query = new WP_Query( $args );
                
                $titexperiencia="";
                $linkexperiencia="";
                //$fila=0;
                //$yalopuso=0;
                if($query->have_posts()){
                    while($query->have_posts()){
                        /*if($fila==0){
                            foreach($postid as $llavesita=>$valuesito){
                                if($valuesito==$post->ID){
                                    $yalopuso=1;
                                }
                            }
                            if($yalopuso==0){
                                $query->the_post();
                                echo '<td>'.get_the_title().'</td><td><a href="'; the_permalink(); echo'" target="_blank">'; the_permalink(); echo'</a></td>';
                                $titexperiencia=get_the_title();
                                $linkexperiencia=the_permalink();
                                /*$postid[$h]=$post->ID;
                                $h++;
                                $fila=1;
                            }
                        }
                    }
                }
                else{
                    echo '<td></td><td></td>';
                }
                */
                echo '<td></td><td></td>';
                echo '</tr>';
                /*$evidencias[$v][$e]=$row7['cve_parque']."|".$fecha_visita[2]."|".$fecha_visita[1]."|".$fecha_visita[0]."|".$row7['post_title']."|
                ".$tipovisita[$row7['tipo_visita']]."||".$suma."|".round($row7['sumactual']/7)."|".$diferencia."|".$row9['visit']."|".$comentcomite."|
                ".$comentinst."|".$comentingre."|".$comeneven."|".$comentverdes."|".$row7['gente']."|".$comentorden."|".$comprotemp."||".$ch."||||
                ".mysql_num_rows($res11)."||".get_permalink($row7['cve_parque'])."|".$titexperiencia."|".$linkexperiencia."||";
                */
                $evidencias[$v][$e]=$row7['cve_parque']."|".$fecha_visita[2]."|".$fecha_visita[1]."|".$fecha_visita[0]."|".$row7['post_title']."|
                ".$tipovisita[$row7['tipo_visita']]."||".$suma."|".round($row7['sumactual']/7)."|".$diferencia."|".$row9['visit']."|".$comentcomite."|
                ".$comentinst."|".$comentingre."|".$comeneven."|".$comentverdes."|".$row7['gente']."|".$comentorden."|".mysql_num_rows($res11)."|".$chc."|".$pjec."%|".get_permalink($row7['cve_parque'])."|".$titexperiencia."|".$linkexperiencia."||";
                $e++;
            }
            $incremento=round(($totvisitaact-$totvisitaant)/mysql_num_rows($res7));
            $promactual=$totvisitaact/mysql_num_rows($res7);
        }
        else{
            $evidencias[$v]="";
            $incremento=0;
            $promactual=0;
        }
        $incremento4sem=round(($promactual-$prom3sem)/2);
        if(mysql_num_rows($res5)>0){
            $porcentaje=($numcomites*100)/mysql_num_rows($res5);
            $totparques=$totparques+mysql_num_rows($res5);
        }
        else{
            $porcentaje=0;
        }
        $calprom=0;
        $incremento4sem=round(($incremento+$incremento2+$incremento3+$incremento4)/4);
        echo '</table></div>';
        echo '<b>Reporte semanal de Parques Alegres</b></font><br>';
        echo '<b>Datos Acumulados</b><br>Visitas: '.$row2['totvisitas'].'<br>';
        echo 'Parques. Primer contacto: '.$row2['parques'].'<br>';
        echo 'Calificación Promedio de PA: '; if($row2['promedio']>0 && $row2['totvisitas']>0){ echo round($row2['promedio']/$row2['totvisitas']); $calprom=round($row2['promedio']/$row2['totvisitas']);} echo '<br>';
        echo 'Parques con comite: '.$numcomites.'<br>';
        echo '% de Parques con comite: '.round($porcentaje).'%<br>';
        echo '<b>En la semana: </b><br>';
        echo 'Primeras Visitas: '.$visita.'<br>';
        $vis_totales=$row4['visitas']+$row498['visitas'];
        echo 'Visitas: '.$vis_totales.'<br>';
        //if(trim($user->ID)==1842){
            echo 'Visitas Seguimiento: '.$row44['visitas'].'<br>';
            echo 'Visitas Prospectación: '.$row45['visitas'].'<br>';
            echo 'Visitas Reforzamiento con parametros: '.$row499['visitas'].'<br>';
            echo 'Visitas Reforzamiento sin parametros: '.$row498['visitas'].'<br>';
            echo 'Visitas Stand By: '.$row497['visitas'].'<br>';
        //}
        echo 'Incremento en Calificación: '.$incremento.'<br>';
        echo 'Asesores: <br>';
        echo 'Visitas por Asesor: <br>';
        echo 'Incremento de Calificación en 4 semanas: '.$incremento4sem.'<br>';
        echo 'Tangibles: <br>';
        echo 'Nuevos comites en parques de la semana: '.$semcomites.'<br>';
        echo '<b>Compromisos </b><br>';
        echo 'Número de compromisos en la semana: '.mysql_num_rows($res6).'<br>';
        echo 'Número de compromisos cumplidos en la semana: <br>';
        echo '<br><hr><br>';
        $valores[$v]=$row1['display_name'].",Datos Acumulados:negritas,Visitas:".$row2['totvisitas'].",Parques. Primer contacto:".$row2['parques'].",Calificación Promedio de PA:".$calprom.",
        Parques con comite:".$numcomites.",% de Parques con comite:".round($porcentaje)."%,En la semana:negritas,Primeras Visitas:".$visita.",Visitas:".$row4['visitas'].",
        Incremento en Calificación:".$incremento.",Asesores:,Visitas por Asesor:,Incremento de Calificación en 4 semanas:".$incremento4sem.",Tangibles:,
        Nuevos comites en parques de la semana:".$semcomites.",Compromisos:negritas,No. de compromisos en la semana:".mysql_num_rows($res6).",No. de compromisos cumplidos en la semana:";
        $totgenvisitas=$totgenvisitas+$row2['promedio'];
        $totcantvisitas=$totcantvisitas+$row2['totvisitas'];
        $totgenparques=$totgenparques+$row2['parques'];
        $totcomites=$totcomites+$numcomites;
        $totsempvisita=$totsempvisita+$visita;
        $totsemvisita=$totsemvisita+$row4['visitas']+$row498['visitas'];
        $totsemvisitas=$totsemvisitas+$row44['visitas'];
        $totsemvisitap=$totsemvisitap+$row45['visitas'];
        $totsemvisitar=$totsemvisitar+$row498['visitas'];
        $totsemvisitarf=$totsemvisitarf+$row499['visitas'];
        $totsemvisitast=$totsemvisitast+$row497['visitas'];
        $totincremento=$totincremento+$incremento;
        $totincremento4sem=$totincremento4sem+$incremento4sem;
        $totsemcomites=$totsemcomites+$semcomites;
        $totcompromisos=$totcompromisos+mysql_num_rows($res6);
    }
    if(trim($user->ID)==1842 || trim($user->ID)==1478){
    //if($_POST['digit']==13563 || $_POST['digit']=="Carlos" || $_POST['digit']=="Guillermo"){
        $totpromedio=$totgenvisitas/$totcantvisitas;
        $totporcentaje=($totcomites*100)/$totparques;
        echo '<b>Reporte general de Parques Alegres</b></font><br>';
        echo '<b>Datos Acumulados</b><br>Visitas: '.$totcantvisitas.'<br>';
        echo 'Parques. Primer contacto: '.$totgenparques.'<br>';
        echo 'Calificación Promedio de PA: '.round($totpromedio).'<br>';
        echo 'Parques con comite: '.$totcomites.'<br>';
        echo '% de Parques con comite: '.round($totporcentaje).'%<br>';
        echo '<b>En la semana: </b><br>';
        echo 'Primeras Visitas: '.$totsempvisita.'<br>';
        echo 'Visitas: '.$totsemvisita.'<br>';
        echo 'Visitas Seguimiento: '.$totsemvisitas.'<br>';
        echo 'Visitas Prospectación: '.$totsemvisitap.'<br>';
        echo 'Visitas Reforzamiento con parametros: '.$totsemvisitar.'<br>';
        echo 'Visitas Reforzamiento sin parametros: '.$totsemvisitarf.'<br>';
        echo 'Visitas Stand By: '.$totsemvisitast.'<br>';
        echo 'Incremento en Calificación: '.$totincremento.'<br>';
        echo 'Asesores: <br>';
        echo 'Visitas por Asesor: <br>';
        echo 'Incremento de Calificación en 4 semanas: '.$totincremento4sem.'<br>';
        echo 'Tangibles: <br>';
        echo 'Nuevos comites en parques de la semana: '.$totsemcomites.'<br>';
        echo '<b>Compromisos </b><br>';
        echo 'Número de compromisos en la semana: '.$totcompromisos.'<br>';
        echo 'Número de compromisos cumplidos en la semana: <br>';
        echo '<br>';
        $valores['general']="Datos Acumulados:negritas,Visitas:".$totcantvisitas.",Parques. Primer contacto:".$totgenparques.",Calificación Promedio de PA:".round($totpromedio).",
        Parques con comité:".$totcomites.",% de Parques con comite:".round($totporcentaje)."%,En la semana:negritas,Primeras Visitas:".$totsempvisita.",Visitas:".$totsemvisita.",
        Incremento en Calificación:".$totincremento.",Asesores:,Visitas por Asesor:,Incremento de Calificación en 4 semanas:".$totincremento4sem.",Tangibles:,
        Nuevos comites en parques de la semana:".$totsemcomites.",Compromisos:negritas,No. de compromisos en la semana:".$totcompromisos.",No. de compromisos cumplidos en la semana:";
        if($_GET['temp']==1){
            $query="SELECT p.id,post_title,u.display_name,m.meta_value as ciudad FROM wp_posts p INNER JOIN wp_users u ON p.post_author=u.id LEFT JOIN wp_postmeta m ON p.id = m.post_id AND m.meta_key = '_parque_ciudad' WHERE post_author NOT IN(SELECT id FROM asesores WHERE stat<1) AND post_status='publish' AND post_type='parque'";
            $rquery=mysql_query($query);
            echo '<table><tr>
            <th>ID</th><th>Parque</th><th>Asesor</th><th>Ciudad</th></tr>';
            while($roq=mysql_fetch_array($rquery)){
                $sqlss11="select cve, cve_parque, fecha_visita, opera,IF((fecha_visita>='".$fecha."' AND fecha_visita<='".$fechafin."'),1,0) as fecha from wp_comites_parques where cve_parque='".$roq['id']."' AND fecha_visita<='".$fechafin."' order by fecha_visita DESC, cve DESC limit 1";
                $ress11=mysql_query($sqlss11);
                $rows11=mysql_fetch_array($ress11);
                if($rows11['opera']>=7){
                    echo '<tr><td>'.$roq['id'].'</td><td>'.$roq['post_title'].'</td><td>'.$roq['display_name'].'</td><td>'.$roq['ciudad'].'</td></tr>';
                    $numcomites11++;
                }
            }
            echo '</table>';
            echo $numcomites11;
        }
        /*foreach($valores as $key=>$value){
            $generales=explode(',',$value);
            foreach($generales as $llave=>$valor){
                if($llave!=0){
                    $acumulados=explode(':',$valor);
                    if($acumulados[1]=="negritas"){
                        $sep=$acumulados[0];
                    }
                    else{
                        $valacum[$sep][$acumulados[0]]+=$acumulados[1];
                    }
                }
            }
        }
        if($_GET['rep']==1){
            echo '<pre>';
            print_r($valacum);
            echo '</pre>';    
        }*/
        /*echo '<pre>';
        print_r($evidencias);
        echo '</pre>';
        */
        if($_GET['com']==1){
            $operac=array(20=>"Tres o más personas",14=>"Dos personas",7=>"Una persona",0=>"No hay comité");
            $sql55="select id,post_title from wp_posts where post_type='parque' and post_status='publish' order by post_title ASC";
            $res55=mysql_query($sql55);
            echo '<table border=1>
            <tr><th>Parque</th><th>Comité</th></tr>';
            $z=0;
            $v0=0;
            $c0=0;
            $c1=0;
            $c2=0;
            $c3=0;
            while($row55=mysql_fetch_array($res55)){
                $sqlss5="select cve, cve_parque, fecha_visita, opera from wp_comites_parques where cve_parque='".$row55['id']."' AND fecha_visita<='".$fechafin."' order by fecha_visita DESC, cve DESC limit 1";
                $ress5=mysql_query($sqlss5);
                if(mysql_num_rows($ress5)>0){
                    $rows5=mysql_fetch_array($ress5);
                    if($rows5['opera']>=7){
                        echo '<tr><td>'.$row55['post_title'].'</td><td>'.$operac[$rows5['opera']].'</td></tr>';
                        if($rows5['opera']>=14){
                            if($rows5['opera']>=20){
                                $c3++;
                            }
                            else{
                                $c2++;
                            }
                        }
                        else{
                            $c1++;
                        }
                        $z++;
                    }
                    else{
                        $c0++;
                    }
                }
                else{
                    $v0++;
                }
            }
            echo '<tr><td colspan="2">Total parques con comite: '.$z.'</td></tr>
            <tr><td colspan="2">Total parques con comite operando con 1 persona: '.$c1.'</td></tr>
            <tr><td colspan="2">Total parques con comite operando con 2 personas: '.$c2.'</td></tr>
            <tr><td colspan="2">Total parques con comite operando con 3 o más personas: '.$c3.'</td></tr>
            <tr><td colspan="2">Total parques sin comite: '.$c0.'</td></tr>
            <tr><td colspan="2">Total parques sin visita: '.$v0.'</td></tr>
            </table>';
        }
    }
    echo '<input type="hidden" name="cmd" value="0"><input type="hidden" name="valores" value="'; echo base64_encode(serialize($valores)); echo '"><input type="hidden" name="evidencias" value="'; echo base64_encode(serialize($evidencias)); echo '"></form>';
    echo '<script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        });
        function buscar(){
        }
    </script>';
    echo '</body>
    </html>';
}
else {
    echo '<!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="cleartype" content="on">
            <meta name="MobileOptimized" content="320">
            <meta name="HandheldFriendly" content="True">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="http://parquesalegres.org/wp-admin/css/login.min.css?ver=4.4.2" rel="stylesheet" type="text/css" />
            <title>Reporte Parques Alegres</title>
            <style>
            input[type="submit"] {
                -webkit-appearance: none; -moz-appearance: none;
                display: inline-block;
                font-size:15px;
                text-align:center;
                background-color: #9DC45F;
                border-radius: 5px;
                -webkit-border-radius: 5px;
                -moz-border-border-radius: 5px;
                border: none;
                padding: 10px 25px 10px 25px;
                color: #FFF;
                text-shadow: 1px 1px 1px #949494;
            }
            input[type="submit"]:hover {
                background-color:#80A24A;
            }
            input[type="submit"]:active {
                position:relative;
                top:1px;
            }
            </style>
            </head>
            <body class="login login-action-login wp-core-ui  locale-es-es">';
    echo '<div id="login"><center><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png"></center>';
    $args = array(
	'echo'           => true,
	'remember'       => true,
	'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	'form_id'        => 'loginform',
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'label_username' => __( 'Nombre de Usuario' ),
	'label_password' => __( 'Contraseña' ),
	'label_remember' => __( 'Recuérdame' ),
	'label_log_in'   => __( 'Acceder' ),
	'value_username' => '',
	'value_remember' => false
    );
    wp_login_form($args);
    echo '</div></body></html>';
}
?>