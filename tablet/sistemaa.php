<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
//$asesores=array(13563=>1478, 14602=>1536, 24066=>1537, 26390=>1538, 29384=>1539, 32487=>1540, 47689=>1541, 48239=>1542, 50205=>1543, 51492=>1544, 51954=>1545,
//                56838=>1546, 62493=>1547, 65093=>1548, 80139=>1549, 80859=>1550, 84375=>1551, 87396=>1552);
$asesores=array(""=>"",13563=>1478, 14602=>168, 24066=>38, 26390=>1225, 29384=>1232, 32487=>1438, 47689=>1512, 48239=>59, 50205=>1515, 51492=>11,56838=>1581,
                62493=>1582, 65093=>1583, 80139=>1584, 80859=>1585, 84375=>1586, 87396=>1587);
$i=0;
$asesor=$_GET['tablet'];
$flag=0;
foreach($asesores as $k=>$v){
    if($k==$asesor){
        $flag=1;
    }
}
if($flag==0){
    echo 'Lo sentimos, no puedes entrar a esta p&aacute;gina. Por favor ponte en contacto con el administrador de la aplicaci&oacute;n o con el director de Parques Alegres.';
    exit();
}
if($_POST['cmd']==4){
    $my_post = array('post_name' => $_POST['nom_parque'],
    'post_title' => $_POST['nom_parque'],
    'post_status' => 'publish',
    'post_author' => $asesores[$asesor],
    'post_type' => 'parque',
    'post_date' => date("Y-m-d").' 00:00:00'
    );
    $id_post = wp_insert_post( $my_post );
    if($id_post>0){
        add_post_meta($id_post, '_parque_ubic', $_POST['ubicacion'], true );
        add_post_meta($id_post, '_parque_col', $_POST['colonia'], true );
        add_post_meta($id_post, '_parque_sup', $_POST['superficie'], true );
        add_post_meta($id_post, '_parque_colin', $_POST['colindancias'], true );
        add_post_meta($id_post, '_parque_sec', $_POST['sector'], true );
        add_post_meta($id_post, '_parque_nivel', $_POST['nivel'], true );
        add_post_meta($id_post, '_parque_regimen', $_POST['regimen'], true );
        add_post_meta($id_post, '_parque_legal', $_POST['legal'], true );
        add_post_meta($id_post, '_parque_tipo', $_POST['tipo'], true );
        add_post_meta($id_post, '_parque_estado', $_POST['state'], true );
        add_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'], true );
        if($_POST['apoyado']==1){
            add_post_meta($id_post, '_parque_seg', $_POST['apoyado'], true );    
        }
        else{
            update_post_meta($id_post, '_parque_seg', 0);
        }
        add_post_meta($id_post, '_parque_obs', $_POST['obsgenerales'], true );
        echo 'Parque guardado exitosamente';
    }
    else{
        echo 'Error';
    }
}
if($id_post>1){
    $_POST['parque']=$id_post;
}
$visita=array("reforzamiento"=>1,"seguimiento"=>2,"evento"=>3,"prospectacion"=>4,"formacion"=>5);
$sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$asesores[$asesor]."' order by post_title ASC";
$res0=mysql_query($sql0);
while($row0=mysql_fetch_array($res0)){
	$parque[$row0["id"]]=$row0["post_title"];
    //echo $row0["post_title"].'<br>';
}

$sql00="select * from wp_postmeta where post_id='".$_POST['parque']."'";
$res00=mysql_query($sql00);
while($row00=mysql_fetch_array($res00)){
    $meta[$row00['meta_key']]=$row00['meta_value'];
}
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
/*$arrcomite=array(1=>"Formalizar el comité; ante el ayuntamiento",2=>"Registrar el parque en la p&aacute;gina de Parques Alegres",3=>"Reestructuraci&oacute;n de comit&eacute;",
4=>"Calendario de reuniones del comit&eacute;. (Se sugiere una cada 30 d&iacute;as)",5=>"Elaborar por escrito las pol&iacute;ticas de trabajo del comit&eacute;",
6=>"Plan de trabajo (por lo menos para un periodo de seis meses)",7=>"Programa de reuniones vecinales (se sugiere una cada tres meses)",
8=>"Verificar el estatus legal del parque",9=>"Minuta de reuniones de comit&eacute;",10=>"Expediente de parque",11=>"Sello y/o hojas membretadas",12=>"Logotipo del parque",
13=>"Tarjetas de presentaci&oacute;n",14=>"Playeras",15=>"Cuenta de Facebook del parque",16=>"Visitar la p&aacute;gina web de Parques Alegres");
$arrinstalaciones=array(17=>"Elaborar visi&oacute;n del espacio",18=>"Gesti&oacute;n dise&ntilde;o del espacio",19=>"Gesti&oacute;n proyecto ejecutivo",20=>"Gesti&oacute;n rehabilitaci&oacute;n del parque. Pintar",
21=>"Pintar",22=>"Reparar",23=>"Renovar o sustituir",24=>"Gesti&oacute;n de pago para mano de obra ante ayuntamiento",25=>"Gesti&oacute;n de recursos materiales",
26=>"Gesti&oacute;n de toma de agua potalble",27=>"Gesti&oacute;n de toma de electricidad",28=>"Gesti&oacute;n Infraestructura",29=>"Espacio de usos multiples",30=>"Cancha basquetbol",
31=>"Cancha futbol",32=>"Palapa",33=>"Ba&ntilde;os",34=>"Cerca",35=>"Juegos infantiles");
$arringresos=array(36=>"Cuenta macomunada",37=>"Informe mensual de ingresos y egresos",38=>"Generar recibos de ingresos",39=>"Archivar comprobantes de gastos",
40=>"Programa de pago vecinal por mantenimiento del parque",41=>"Organizaic&oacute;n de cooperaci&oacute;n vecianl pro - rehabilitaci&oacute;n del parque",
42=>"Organizaci&oacute;n de cooperaci&oacute;n vecinal pro - adquisici&oacute;n infraestructura",43=>"Gesti&oacute;n de recibos deducibles de impuestos",44=>"Realizar eventos para generar fondos.",
45=>"Torneos deportivos",46=>"Concursos culturales",47=>"Tianguis",48=>"Kermesses",49=>"Celebraci&oacute;n de d&iacute;as festivos",50=>"Rifa",51=>"Evento cultural",
52=>"Funci&oacute;n de cine",53=>"Carrera pedestre",54=>"Noche bohemia");
$arreventos=array(55=>"Calendario anual de eventos",56=>"Participaci&oacute;n activa en la organizaci&oacute;n de eventos (tener asignado un rol y una responsabilidad)",
57=>"Particpaci&oacute;n activa en la promoci&oacute;n de los eventos",58=>"Expediente de evidencias fotogr&aacute;ficas de eventos",59=>"Publicar en Facebook los eventos",
60=>"Eventos para generar tejido social",61=>"Celebraci&oacute;n de d&iacute;as festivos",62=>"Evento deportivo",63=>"Evento cultural",64=>"Funci&oacute;n de cine",65=>"Carrera pedestre",
66=>"Noche bohemia",67=>"Convivio recreativo");
$arrareas=array(68=>"Gestionar &aacute;rboles  en Ayuntamiento y Parque Bot&aacute;nico",69=>"Gestionar plantas de ornanto en Ayuntamiento",70=>"Siembra de &aacute;rboles",
71=>"Poda de &aacute;rboles y/o cesped",72=>"Elaborar visi&oacute;n de &aacute;reas verdes",73=>"Protecci&oacute;n para &aacute;rboles peque&ntilde;os",74=>"Campa&ntilde;a de limpieza",
75=>"Ferlilizar &aacute;rboles con componentes orgn&aacute;nicos",76=>"Colocaci&oacute;n de cesped natural y/o sint&eacute;tico",77=>"Nomeclatura de la vegetaci&oacute;n en el parque",
78=>"Adquisici&oacute;n de herramientas de limpieza",79=>"Fumigaci&oacute;n",80=>"Instalar sistema de riego",81=>"Adquisici&oacute;n de herramientas de jardiner&iacute;a");
$arrafluencia=array(82=>"Promotor deportivo",83=>"Clases y/o talleres deporivos",84=>"Futbol",85=>"Basquetbol",86=>"Zumba",87=>"Clases y/o talleres culturales",
88=>"Pintura",89=>"Danza",90=>"Clubes con diversos objetivos para ni&ntilde;os, adolescentes y adultos",91=>"Club de ciclismo",92=>"Campa&ntilde;a de invita a un vecino",
93=>"Torneos",94=>"Deportivo",95=>"Cultural",96=>"Art&iacute;stico",97=>"Comit&eacute; de ni&ntilde;os",98=>"Invitaci&oacute;n a Voluntariado",99=>"Curso de verano deportivo o cultural",
100=>"Ciclo de pl&aacute;ticos y conferencias para Padres, Adolescentes y ni&ntilde;os",101=>"Campa&ntilde;mentos",102=>"Murales");
$arraorden=array(103=>"Creaci&oacute;n de reglamento del parque",104=>"Instalaci&oacute;n de reglamento de parque",105=>"Instalaci&oacute;n de se&ntilde;alizaci&oacute;n",106=>"Jornada de limpieza",
107=>"Gesti&oacute;n de vigilancia para el parque",108=>"Delimitaci&oacute;n de espacios",109=>"Bot&oacute;n de p&aacute;nico",110=>"Contratar jardinero",111=>"Contratar velador",
112=>"Instalaci&oacute;n de Timer para control de recursos");
$resultado = array_merge($arrcomite, $arrinstalaciones,$arringresos,$arreventos,$arrareas,$arrafluencia,$arraorden);
*/
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");

if($_POST['cmd']==2){
    if($_POST['parque']){
        $conti=0;
        $sSQL222="SELECT * from comite_parque where cve_parque='".$_POST['parque']."'";
        $res222=mysql_query($sSQL222);
        if(mysql_num_rows($res222)>0){
            $row222=mysql_fetch_array($res222);
            $conti=1;
            $id_comite=$row222['id'];
        }
        else{
            $sSQL2="INSERT INTO `comite_parque`(`cve_parque`, `fecha_reg`, `fecha_alta`, `telefono`,`celular`,`email`, `facebook`, `twitter`, `instagram`, `skype`,`otro`) VALUES ('$_POST[parque]','".date("Y-m-d H:i:s")."','".$_POST['fecha_comite']."','".$_POST['telefono'][0]."','".$_POST['celular'][0]."','".$_POST['email'][0]."','".$_POST['facebook'][0]."','".$_POST['twitter'][0]."','".$_POST['instagram'][0]."','$_POST[skype]','$_POST[otro]')";
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL2);
            $id_comite=mysql_insert_id();
        }
        //echo $sSQL2.'<br>';
        
        for($i=1;$i<=count($_POST['nombre']);$i++){
            $fecha_nac=$_POST['anio'][$i].'-'.$_POST['mes'][$i].'-'.$_POST['dia'][$i];
            $sSQL3="INSERT INTO `comite_miembro`(`cve_comite`, `nombre`,`fecha_nac`,`sexo`, `nivel`, `rol`, `telefono`, `celular`,`email`, `facebook`, `megusta`,`twitter`, `siguemet`, `instagram`,`siguemei`, `contacto`) VALUES ('$id_comite','".$_POST['nombre'][$i]."','$fecha_nac','".$_POST['sexo'][$i]."','".$_POST['educacion'][$i]."','".$_POST['rol'][$i]."','".$_POST['telefono'][$i]."','".$_POST['celular'][$i]."','".$_POST['email'][$i]."','".$_POST['facebook'][$i]."','".$_POST['megusta'][$i]."','".$_POST['twitter'][$i]."','".$_POST['siguemet'][$i]."','".$_POST['instagram'][$i]."','".$_POST['siguemei'][$i]."','".$_POST['contacto'][$i]."')";
            //echo $sSQL3.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL3);
        }
        if($_POST['enviacorreo']==1){
            if($conti==0){
                $sql002="select * from comite_miembro where cve_comite='".$id_comite."'";
                $res002=mysql_query($sql002);
                $f=1;
                $roles=array(1=>"Presidente",2=>"Secretario",3=>"Tesorero",4=>"Vocal",5=>"Comunicación",6=>"Vecino");
                while($row002=mysql_fetch_array($res002)){
                    if($row002['rol']==4){
                        $miembro[$roles[$row002['rol']].' '.$f]=array("nombre"=>$row002['nombre'],"telefono"=>$row002['telefono'],"email"=>$row002['email'],"contacto"=>$row002['contacto']);
                        $f++;
                    }
                    else{
                        $miembro[$roles[$row002['rol']]]=array("nombre"=>$row002['nombre'],"telefono"=>$row002['telefono'],"email"=>$row002['email'],"contacto"=>$row002['contacto']);   
                    }
                }
                    class PDF extends FPDF
                    {
                    // Page header
                        function Header()
                        {
                            // Logo
                            $this->SetFont('Arial','B',8);
                            // Title
                            //PG - ACP-1-1-4.
                            $this->Cell(55,5,'Formato formación de comité.');
                            // Line break
                            $this->Ln(10);
                        }
                    }
                    $fechaac=explode('-',$_POST['fecha_alta']);
                    $ano=$fechaac[0];
                    $mes=$fechaac[1];
                    $dia=$fechaac[2];
                    $mes=str_replace(array("01","02","03","04","05","06","07","08","09","10","11","12"),array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"),$mes);
                    $pdf = new PDF();
                    $pdf->AddPage('L','Letter');
                    $pdf->SetFont('Arial','',7);
                    $pdf->Image('logo_gobierno.png',10,20);
                    $pdf->SetXY(20,25);
                    $pdf->Cell(30,5,'COMITÉS DE VECINOS',0,2);
                    $pdf->Cell(70,5,'DEPARTAMENTO DE PARQUES Y JARDINES',0,0);
                    $pdf->SetXY(150,10);
                    $pdf->Cell(60,5,'Fraccionamiento o colonia',1,0);
                    $pdf->Cell(60,5,'Fecha',1,1);
                    $pdf->SetX(150);
                    $pdf->Cell(60,5,$meta['_parque_col'],1);
                    $pdf->Cell(60,5,$dia.'-'.$mes.'-'.$ano,1,1);
                    $pdf->SetX(150);
                    $pdf->Cell(60,5,' ',1);
                    $pdf->Cell(60,5,' ',1,1);
                    $pdf->SetX(150);
                    $pdf->Cell(60,5,'Fraccionamiento o colonia',1,0);
                    $pdf->Cell(60,5,'Fecha',1,1);
                    $pdf->SetX(150);
                    $pdf->Cell(60,5,' ',1);
                    $pdf->Cell(60,5,' ',1,1);
                    $pdf->Line(10, 38, 260, 38);
                    $pdf->Cell(30,4,' ',0,1);
                    $pdf->Cell(13,7,'Siendo las',0,0);
                    $pdf->SetFont('Arial','U',7);
                    $pdf->Cell(9,7,' '.date("H:i").' ',0,0);
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(44,7,'horas, en el lugar que ocupa el parque',0,0);
                    $pdf->SetFont('Arial','U',7);
                    $cellwidth=$pdf->GetStringWidth($parque[$_POST['parque']]);
                    $pdf->Cell($cellwidth+6,7,'   '.$parque[$_POST['parque']].'   ,',0,0);
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(27,7,'ubicado entre las calles',0,0);
                    $pdf->SetFont('Arial','U',7);
                    $cellwidth=$pdf->GetStringWidth($meta['_parque_colin']);
                    $pdf->Cell($cellwidth+6,7,'   '.$meta['_parque_colin'].'   ',0,1);
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(15,7,'De la colonia',0,0);
                    $pdf->SetFont('Arial','U',7);
                    $cellwidth=$pdf->GetStringWidth($meta['_parque_col']);
                    $pdf->Cell($cellwidth+6,7,'   '.$meta['_parque_col'].'   ',0,0);
                    $pdf->SetFont('Arial','',7);
                    $pdf->Cell(215,7,'se reunieron los vecinos de dicho lugar con el propósito de constituir un comité de organización vecina para realizar la(s) obra(s) de mejora pertinente(s) para el espacio.',0,1);
                    $pdf->Cell(95,7,'Dicho comité queda constituido por el consenso de los vecinos presentes.',0,1);
                    $arreglo=array("Presidente","Secretario","Tesorero");
                    $i=0;
                    foreach($arreglo as $v){
                        $pdf->SetY(59+$i);
                        $pdf->Cell(13,7,$v,0,1);
                        $pdf->SetXY(25,59+$i);
                        $pdf->Cell(60,7,$miembro[$v]['nombre'],0,1);
                        $pdf->Line(24, 64+$i, 120, 64+$i);
                        $pdf->Cell(10,7,'Domicilio',0,1);
                        $pdf->Line(22, 71+$i, 120, 71+$i);
                        $pdf->Line(11, 78+$i, 70, 78+$i);
                        $pdf->SetX(70);
                        $pdf->Cell(5,7,'Tel.',0,1);
                        $pdf->SetXY(77,73+$i);
                        $pdf->Cell(60,7,$miembro[$v]['telefono'],0,1);
                        $pdf->Line(75, 78+$i, 120, 78+$i);
                        $pdf->Cell(23,7,'Correo Electrónico',0,1);
                        $pdf->SetXY(33,80+$i);
                        $pdf->Cell(60,7,$miembro[$v]['email'],0);
                        $pdf->Line(33, 85+$i, 120, 85+$i);
                        $pdf->Cell(25,9,' ',0,1);
                        $i=$i+37;
                    }
                    $i=0;
                    for($e=1;$e<=3;$e++){
                        $pdf->SetXY(130,60+$i);
                        $pdf->Cell(10,7,'Vocal '.$e,0,1);
                        $pdf->SetXY(141,59+$i);
                        $pdf->Cell(60,7,$miembro["Vocal ".$e]['nombre'],0,1);
                        $pdf->Line(140, 64+$i, 250, 64+$i);
                        $pdf->SetX(130);
                        $pdf->Cell(10,7,'Domicilio',0,1);
                        $pdf->Line(142, 71+$i, 250, 71+$i);
                        $pdf->Line(131, 78+$i, 200, 78+$i);
                        $pdf->SetX(200);
                        $pdf->Cell(5,7,'Tel.',0,1);
                        $pdf->Line(205, 78+$i, 250, 78+$i);
                        $pdf->SetXY(208,73+$i);
                        $pdf->Cell(60,7,$miembro["Vocal ".$e]['telefono'],0,1);
                        $pdf->SetX(130);
                        $pdf->Cell(23,7,'Correo Electrónico',0,1);
                        $pdf->SetXY(153,80+$i);
                        $pdf->Cell(60,7,$miembro["Vocal ".$e]['email'],0,1);
                        $pdf->Line(153, 85+$i, 250, 85+$i);
                        $pdf->Cell(25,9,' ',0,1);
                        $i=$i+37;
                    }
                    $pdf->Cell(21,7,'Ubicación del área ',0,0);
                    $pdf->Cell(90,7,'________________________________________________________________',0,1);
                    $pdf->SetXY(130,180);
                    $pdf->Cell(105,3,'____________________________________________________________________________',0,2);
                    $pdf->Cell(105,4,'C. Leonel Duarte Echavarría',0,2,'C');
                    $pdf->Cell(105,5,'JEFE DEL DEPARTAMENTO DE PARQUES Y JARDINES',0,0,'R');
                    $pdf->AddPage('L','Letter');
                    $pdf->SetFont('Arial','',9);
                    $pdf->MultiCell(0,5,"Apoyo para comité de vecinos los abajo firmantes nos comprometemos a apoyar los acuerdos y decisiones que para el mejoramiento del área tome el comité de vecinos. Favor de señalar nombre, firma y correo electrónico.");
                    $pdf->Cell(80,5,'NOMBRE',1,0);
                    $pdf->Cell(80,5,'FIRMA',1,0);
                    $pdf->Cell(80,5,'CORREO ELECTRÓNICO',1,1);
                    for($a=0;$a<21;$a++){
                        $pdf->Cell(80,7,' ',1,0);
                        $pdf->Cell(80,7,' ',1,0);
                        $pdf->Cell(80,7,' ',1,1);
                    }
                    $pdf->AddPage('L','Letter');
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(115,5,'DESCRIPCIÓN DE LOS ROLES DE COMITÉ DE VECINOS',0,1);
                    $pdf->Ln();
                    $pdf->Cell(60,5,'ROL',1,0);
                    $pdf->Cell(180,5,'DESCRIPCIÓN',1,1);
                    $pdf->SetFont('Arial','',10);
                    $pdf->MultiCell(60,100,"Presidente",1);
                    $pdf->SetXY(70,35);
                    $pdf->MultiCell(180,5,"Forma de Elección:
                El presidente deberá ser elegido de manera democrática por los vecinos asistentes a la junta convocada por el Asesor de Comités de Parques con el propósito de Conformar un Comité. Los asistentes a la junta deberán proponer al menos dos candidatos para ocupar el puesto de Presidente. Una vez establecidos los dos candidatos, se organizará un procedimiento de votación democrática, quedando electo aquel vecino que obtenga la mayoría de votos, la cual se define por la mitad de asistentes más uno. En caso de que no sea posible realizar el procedimiento anterior, entonces se puede realizar la elección de presidente de comité de vecinos a través de auto-propuesta o propuesta directa entre los asistentes.
                
                Funciones: 
                a. convocar a los vecinos a reuniones de comité o a asambleas generales de vecinos.
                b. Cumplir y hacer cumplir los acuerdos y disposiciones del comité.
                c. Desempeñar fiel y responsablemente las actividades que se establezcan en el plan de acción del comité.
                d. Representar ante organismos Municipales, Estatales y Nacionales en la gestión de programas y proyectos sociales, culturales y económicos en conjunto con los miembros del Comité.
                e. Informar a los miembros del comité y a la comunidad de las gestiones realizadas y presentar el informe anual de labores.
                f. Dar seguimiento a los programas y proyectos que se estén ejecutando.
                g. Firmar convenios con instituciones y actuar como testigo de honor según el caso, previo conocimiento de los miembros del Comité.",1,'L');
                    $pdf->MultiCell(60,40,"Secretario",1);
                    $pdf->SetXY(70,135);
                    $pdf->MultiCell(180,5,"Forma de Elección:
                El Secretario deberá ser elegido de manera democrática por los vecinos asistentes a la junta convocada por el Asesor de Comités de Parques con el propósito de Conformar un Comité. Los asistentes a la junta deberán proponer al menos dos candidatos para ocupar el puesto de Secretario. Una vez establecidos los dos candidatos, se organizará un procedimiento de votación democrática, quedando electo aquel vecino que obtenga la mayoría de votos, la cual se define por la mitad de asistentes más uno. En caso de que no sea posible realizar el procedimiento anterior, entonces se puede realizar la elección de Secretario de comité de vecinos a través de auto-propuesta o propuesta directa entre los asistentes.",1,'L');
                    $pdf->MultiCell(60,35," ",1);
                    $pdf->SetXY(70,20);
                    $pdf->MultiCell(180,5,"Funciones:
                a. Llevar el libro de actas y resoluciones de las reuniones realizadas por el Comité de Vecinos.
                b. Dar lectura a la orden del día.
                c. Llevar el libro de actas, acuerdos y resoluciones.
                d. Redactar, firmar y lanzar convocatorias junto con el presidente.
                e. Tener bajo su resguardo los documentos que son de interés para el comité.
                f. Registrar la participación de los miembros de la asamblea.",1,'L');
                    $pdf->MultiCell(60,70,"Comunicación",1);
                    $pdf->SetXY(70,55);
                    $pdf->MultiCell(180,5,"Forma de Elección:
                El encargado de Comunicación deberá ser elegido de manera democrática por los vecinos asistentes a la junta convocada por el Asesor de Comités de Parques con el propósito de Conformar un Comité. Los asistentes a la junta deberán proponer al menos dos candidatos para ocupar el puesto de encargado de Comunicación. Una vez establecidos los dos candidatos, se organizará un procedimiento de votación democrática, quedando electo aquel vecino que obtenga la mayoría de votos, la cual se define por la mitad de asistentes más uno. En caso de que no sea posible realizar el procedimiento anterior, entonces se puede realizar la elección del encargado de  Comunicación de comité de vecinos a través de auto-propuesta o propuesta directa entre los asistentes.
                
                Funciones:
                a. Tener a su cargo las redes sociales y canales de comunicación del Comité de Vecinos.
                b. Publicar evidencias de eventos y actividades realizadas en redes sociales.
                c. Cuidar que los mensajes en redes sociales se apeguen a criterios cívicos y morales.",1,'L');
                    $pdf->MultiCell(60,40,"Vocal",1);
                    $pdf->SetXY(70,125);
                    $pdf->MultiCell(180,5,"Forma de Elección:
                El Vocal deberá ser elegido de manera democrática por los vecinos asistentes a la junta convocada por el Asesor de Comités de Parques con el propósito de Conformar un Comité. Los asistentes a la junta deberán proponer al menos dos candidatos para ocupar el puesto de Vocal. Una vez establecidos los dos candidatos, se organizará un procedimiento de votación democrática, quedando electo aquel vecino que obtenga la mayoría de votos, la cual se define por la mitad de asistentes más uno. En caso de que no sea posible realizar el procedimiento anterior, entonces se puede realizar la elección de Vocal de comité de vecinos a través de auto-propuesta o propuesta directa entre los asistentes.",1,'L');
                    $pdf->MultiCell(60,40,"",1);
                    $pdf->SetXY(70,20);
                    $pdf->MultiCell(180,5,"Funciones:
                a. Asistir a todas las reuniones convocadas por el Comité Ciudadano que administra el Parque.
                b. Contribuir a mantener la correcta participación de todos los miembros del Comité.
                c. Coordinar acciones con las distintas comisiones que se hayan conformado en juntas del comité, junto con el Presidente y Secretario.
                d. Apoyar en la elaboración y gestión de programas y proyectos que permitan alcanzar los fines y objetivos del comité.
                e. Las que resulten derivadas de las juntas del Comité.",1,'L');
                
                $to="gudart@gmail.com";
                foreach($miembro as $k=>$V){
                    if($miembro[$k]['contacto']==1){
                        $to = $miembro[$k]['email']; 
                    }
                }
                $email="contacto@parquesalegres.org";
                $from = "Parques Alegres $email"; 
                $subject = "Formato de registro comité"; 
                $message = "<p>El formato esta adjunto en PDF.</p>";
                
                // a random hash will be necessary to send mixed content
                $separator = md5(time());
                
                // carriage return type (we use a PHP end of line constant)
                $eol = PHP_EOL;
                
                // attachment name
                $filename = "alta_comite.pdf";
                
                // encode data (puts attachment in proper format)
                $pdfdoc = $pdf->Output("", "S");
                $attachment = chunk_split(base64_encode($pdfdoc));
                
                // main header
                $headers  = "From: ".$from.$eol;
                $headers .= "MIME-Version: 1.0".$eol; 
                $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
                
                // no more headers after this, we start the body! //
                
                $body = "--".$separator.$eol;
                $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
                //$body .= "This is a MIME encoded message.".$eol;
                
                // message
                $body .= "--".$separator.$eol;
                $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
                $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
                $body .= $message.$eol;
                
                // attachment
                $body .= "--".$separator.$eol;
                $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
                $body .= "Content-Transfer-Encoding: base64".$eol;
                $body .= "Content-Disposition: attachment".$eol.$eol;
                $body .= $attachment.$eol;
                $body .= "--".$separator."--";
                
                // send message
                mail($to, $subject, $body, $headers);
                echo 'Comite registrado exitosamente! Revisa el correo electónico.';
            }
        }
        else {
            echo 'Comité registrado exitosamente';
        }
    }
    else{
        echo 'No ha seleccionado ningun parque';
    }
}
if($_POST['cmd']==3){
    if($_POST['parque']){
        $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";
        $ress=mysql_query($sqll);
        $rowz=mysql_fetch_array($ress);
        $sSQL8="UPDATE wp_visitascom_parques SET opera='$_POST[comopera]', formaliza='$_POST[comformaliza]', organiza='$_POST[comorganiza]', reunion='$_POST[comreunion]', proyecto='$_POST[comproyecto]', disenio='$_POST[comdisenio]', ejecutivo='$_POST[comejecutivo]', vespacio='$_POST[comvespacio]', instalaciones='$_POST[cominstalaciones]', estado='$_POST[comestado]', ingresop='$_POST[comingresop]', ingresadop='$_POST[comingresadop]', mancomunado='$_POST[commancomunado]', eventos='$_POST[comeventos]', eventosr='$_POST[comeventosr]', averdes='$_POST[comaverdes]', estaver='$_POST[comestaver]', gente='$_POST[comgente]', limpieza='$_POST[comlimpieza]', orden='$_POST[comorden]', respint='$_POST[comrespint]', genvisita='$_POST[comgenvisita]' WHERE cve_visita='".$rowz['cve']."'";
        //echo $sSQL8.'<br>';
        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL8);
        $entro=0;
        foreach($_POST as $k=>$v){
            if(substr($k, 0, 4)=="meta"){
                if($_POST['comp'.substr($k, 5)]!=""){
                    if(substr($k, 5)=="instalaciones"){
                        $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compinstal']."','".$v."','".$_POST['fecha_cumplimiento']."')";
                    }
                    else if(substr($k, 5)=="estado"){
                        $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compest']."','".$v."','".$_POST['fecha_cumplimiento']."')";
                    }
                    else if(substr($k, 5)=="eventosr"){
                        $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compevent']."','".$v."','".$_POST['fecha_cumplimiento']."')";
                    }
                    else{
                        $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)]."','".$v."','".$_POST['fecha_cumplimiento']."')";
                    }
                    $entro=1;
                    //echo $sSQL9.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL9);
                }
            }
        }
        if($entro==1){
            class PDF extends FPDF{
                // Page header
                function Header(){
                    // Logo
                    $this->SetFont('Arial','',9);
                    // Title
                    $this->Image('logo_parques.png',170,10);
                    //Anexo PG-ACP-1-1-5-
                    $this->Cell(55,5,'Formato de Compromiso solidario.');
                    // Line break
                    $this->Ln(10);
                }
            }
            $fechav=explode('-',$rowz['fecha_visita']);
            $ano=$fechav[0];
            $mes=$meses[$fechav[1]];
            $dia=$fechav[2];
            $mes=str_replace(array("01","02","03","04","05","06","07","08","09","10","11","12"),array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"),$mes);
            $pdf = new PDF();
            $pdf->AddPage('P','Letter');
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(30,5,'CARTA DE COMPROMISO SOLIDARIO',0,1);
            $pdf->Ln();
            $pdf->SetX(130);
            $pdf->Cell(50,5,'Culiacán, Sin. a____ de_____________ del_______.',0,1);
            $pdf->SetXY(160,30);
            $pdf->Cell(30,5,$dia,0,1);
            $pdf->SetXY(172,30);
            $pdf->Cell(29,5,$mes,0,1,'C');
            $pdf->SetXY(207,30);
            $pdf->Cell(29,5,$ano,0,1,'C');
            $pdf->Ln(30);
            $pdf->MultiCell(0,7,"Por medio del presente, el comité del parque ____________________________________________________ de la colonia ______________________________________________________, ubicado entre las calles __________________________________________________________, Nos comprometemos a realizar las actividades siguientes. ",0,'J');
            $pdf->MultiCell(0,7,"___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
    Dichos acuerdos para llevarlos a cabo a la fecha de ______________________, sabiendo lo importante que es el cumplimiento de estos compromisos solidarios para el desarrollo de nuestro espacio público. Con el cumplimiento de estos acuerdos nuestro espacio público aumentaría de _____ a _____ en puntaje de parámetros.
    
    Nota. Es importante cuidar los avances con los que ya contamos, para que nuestra calificación sea favorable en nuestra siguiente visita. 
        ",0,'J');
            $pdf->SetFont('Arial','BU',11);
            $pdf->Ln(18);
            $pdf->Cell(190,5,'Hacemos el compromiso solidario para dar nuestro mejor esfuerzo para el cumplimiento de acuerdos.',0,1);
            $pdf->SetFont('Arial','',11);
            $pdf->Ln(25);
            $pdf->Cell(200,5,'Firma del comité y/o vecinos.',0,1,'C');
            $pdf->Ln(25);
            $pdf->Cell(200,5,'Firma de Asesor de Parques Alegres.',0,1,'C');
            $pdf->SetXY(90,65);
            $pdf->Cell(110,5,$parque[$_POST['parque']],0,1,'C');
            $pdf->SetXY(40,72);
            $pdf->Cell(113,5,$meta['_parque_col'],0,1,'C');
            $pdf->SetXY(13,79);
            $pdf->Cell(122,5,$meta['_parque_colin'],0,1,'C');
            $sql003="select * from compromisos where cve_parque='".$_POST['parque']."' and cve_visita='".$rowz['cve']."'";
            $res003=mysql_query($sql003);
            $c=0;
            $h=0;
            while($row003=mysql_fetch_array($res003)){
                if($row003['parametro']=="instalaciones" || $row003['parametro']=="estado" || $row003['parametro']=="eventosr"){
                    $fecha_cumpl=$row003['fecha_cumplimiento'];
                    $comp=explode(",",$row003['compromiso']);
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
                    $cellwidth=$pdf->GetStringWidth($compromisos[$comp[0]].': '.$namee);
                    if($c+$cellwidth>=177){
                        $h=$h+7;
                        $c=0;
                    }
                    if($h<20){
                        $pdf->SetXY(13+$c,93+$h);
                        $pdf->Cell($cellwidth,5,$compromisos[$comp[0]].': '.$namee,0,0,'C');
                        $c=$c+$cellwidth;
                    }
                }
                else{
                    $fecha_cumpl=$row003['fecha_cumplimiento'];
                    $cellwidth=$pdf->GetStringWidth($compromisos[$row003['compromiso']]);
                    if($c+$cellwidth>=177){
                        $h=$h+7;
                        $c=0;
                    }
                    if($h<20){
                        $pdf->SetXY(13+$c,93+$h);
                        $pdf->Cell($cellwidth,5,$compromisos[$row003['compromiso']],0,0,'C');
                        $c=$c+$cellwidth;
                    }
                }
            }
            $pdf->SetXY(105,114);
            $pdf->Cell(43,5,$fecha_cumpl,0,1,'C');
            $pdf->SetXY(145,129);
            $pdf->Cell(9,5,$_POST['totalvis'],0,1,'C');
            $pdf->SetXY(162,129);
            $pdf->Cell(9,5,$_POST['totalmeta'],0,1,'C');
            $sql005="SELECT c.email,c.contacto FROM comite_miembro c INNER JOIN comite_parque c2 ON c.cve_comite = c2.id WHERE c2.cve_parque='".$_POST['parque']."' and c.contacto='1'";
            $res005=mysql_query($sql005);
            $row005=mysql_fetch_array($res005);
            if($row005['email']!=""){
                $to=$row005['email'];
            }
            else{
                $to="gudart@gmail.com";    
            }
            $email="contacto@parquesalegres.org";
            $from = "Parques Alegres $email"; 
            $subject = "Formato compromisos solidarios"; 
            $message = "<p>El formato esta adjunto en PDF.</p>";
            
            // a random hash will be necessary to send mixed content
            $separator = md5(time());
            
            // carriage return type (we use a PHP end of line constant)
            $eol = PHP_EOL;
            
            // attachment name
            $filename = "compromisos.pdf";
            
            // encode data (puts attachment in proper format)
            $pdfdoc = $pdf->Output("", "S");
            $attachment = chunk_split(base64_encode($pdfdoc));
            
            // main header
            $headers  = "From: ".$from.$eol;
            $headers .= "MIME-Version: 1.0".$eol; 
            $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
            
            // no more headers after this, we start the body! //
            
            $body = "--".$separator.$eol;
            $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
            //$body .= "This is a MIME encoded message.".$eol;
            
            // message
            $body .= "--".$separator.$eol;
            $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
            $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
            $body .= $message.$eol;
            
            // attachment
            $body .= "--".$separator.$eol;
            $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
            $body .= "Content-Transfer-Encoding: base64".$eol;
            $body .= "Content-Disposition: attachment".$eol.$eol;
            $body .= $attachment.$eol;
            $body .= "--".$separator."--";
            
            // send message
            mail($to, $subject, $body, $headers);
            echo 'Compromisos registrados exitosamente! Revisa el correo electónico.';
        }
        else{
            echo 'Comentarios registrados exitosamente!';
        }
    }
    else{
        echo 'No ha seleccionado ningun parque';
    }
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema tablet Parques Alegres</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="qtip/jquery.qtip.min.css" />
<link type="text/css" rel="stylesheet" href="slideout-0.1.9/index.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type="text/javascript" src="qtip/jquery.qtip.min.js"></script>
<script src="slideout-0.1.9/dist/slideout.min.js"></script>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>';
//<link href="form_style_mob.css" rel="stylesheet" type="text/css" />
if($_POST['cmd']==1){
    if($_POST['parque']){
        $result = count($_POST[averdes]);
        if($result>0){
            $coma=implode(',',$_POST[averdes]);   
        }
        //echo$coma;
        $averdes21= array(1,2);
        $averdes22= array(1,3);
        $averdes23= array(2,3);
        if($result==1){
            $averdes1=17;
        }
        if($result==2){
	    //echo'entraaaaa 2';
            if($averdes21==$_POST[averdes]){
                //if($coma=="1,2"){
                //echo'entraaaaa 34';
                $averdes1=34;
            }
            if($averdes22==$_POST[averdes]){
                //echo'entraaaaa 35';
                $averdes1=35;
            }
            if($averdes23==$_POST[averdes]){
                //echo'entraaaaa 36';
                $averdes1=36;
            }
        }
        if($result==3){
            $averdes1=50;
        }
	//date("Y-m-d H:i:s");
        $disenio="";
        $ejecutivo="";
        $vespacio="";
	$fec=''.date("Y-m-d H:i:s").'';
        if($_POST['tipo_proyecto']=="disenio"){
            $disenio=40;
        }
        if($_POST['tipo_proyecto']=="ejecutivo"){
            $ejecutivo=40;
        }
        if($_POST['tipo_proyecto']=="vespacio"){
            $vespacio=40;
        }
        if($_POST['formaliza']!=""){
            if($_POST['formaliza']=="interno"){
                $formal=10;
            }
            else{
                $formal=20;
            }
        }
        $cal=$_POST[opera]+$formal+$_POST[organiza]+$_POST[reunion]+$_POST[proyecto]+$disenio+$ejecutivo+$vespacio+$_POST[instalaciones]+$_POST[estado]+$_POST[ingresop]+$_POST[ingresadop]+$_POST[mancomunado]+$_POST[eventos]+$_POST[eventosr]+$averdes1+$_POST[estaver]+$_POST[gente]+$_POST[limpieza]+$_POST[orden]+$_POST[respint];
        $cal=$cal/7;
        $sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`, `fec`,`fecha_visita`,`opera`, `formaliza`, `tipoformaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`,`vespacio`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `limpieza`, `orden`, `respint`) VALUES ('$_POST[parque]','$fec','$_POST[fecha_visita]','$_POST[opera]','$formal','$_POST[formaliza]','$_POST[organiza]','$_POST[reunion]','$_POST[proyecto]','$disenio','$ejecutivo','$vespacio','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$_POST[eventos]','$_POST[eventosr]','$averdes1','$_POST[estaver]','$_POST[gente]','$_POST[limpieza]','$_POST[orden]','$_POST[respint]')";
        //,'$_POST[semana]','$_POST[finsem]' `semana`, `finsem`,
        //`riego`,'$riego',
        //`gente`, `diario`,
        //'$gente','$diario',
        //echo $sSQL;
        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);
        $id_visita=mysql_insert_id();
        $sSQL1="INSERT INTO `wp_visitascom_parques`(`cve_parque`, `cve_visita`,`tipo_visita`,clasvisita) VALUES ('$_POST[parque]','$id_visita','".$visita[$_POST['visita']]."','".$_POST['clasvisita']."')";
        //echo $sSQL1;
        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL1);
        echo'<p align="center">';
        echo'Visita guardada';
        echo'</p>';
        $sql005="SELECT c.email,c.contacto FROM comite_miembro c INNER JOIN comite_parque c2 ON c.cve_comite = c2.id WHERE c2.cve_parque='".$_POST['parque']."' and c.contacto='1'";
        $res005=mysql_query($sql005);
        $row005=mysql_fetch_array($res005);
        if($row005['email']!=""){
            $to=$row005['email'];
        }
        else{
            $to="gudart@gmail.com";    
        }
        $email="contacto@parquesalegres.org";
        $from = "Parques Alegres $email"; 
        $subject = "Calificación de Visita al parque"; 
        $message = "La calificación de tu parque es: ".round($cal);
        mail($to, $subject, $message, $from);
    }
    else{
        echo'No ha seleccionado ningun parque';
    }
    /*$sql="select * from wp_posts where ID='$_POST[parque]'";
	$res=mysql_query($sql);
	$row3 = mysql_fetch_array($res);
            $cuerpob = "El usuario: " . $current_user->user_email . "\n<br>";
            $cuerpob .= "Ha agregado una nueva visita al parque: " . $_POST['parque'] . "\n<br>";
            $cuerpob .= "Nombre del parque: " . $row3["post_title"] . "\n<br>";
            $cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
            $fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";

            //$res2=mail($current_user->user_email,"Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
            //este es el que se envia segun $res2=mail("mikee.vale@gmail.com","Parques Alegres(Parametros nuevos)",$cuerpob,$fromb);
            //$res2=mail("contacto@parquesalegres.org","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
            //$res2=mail("albertocoppel@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);

            if($res2){
                echo'<p align="center">';
                echo'Par&aacute;metros guardados con exito<input type="button" value="Cerrar" onClick="window.close()">';
                echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
            }*/
}

echo '<body>
<nav id="menu" class="menu">
    <ul class="menu-section-list">
      <li><a href="javascript:void(0)" onclick="cambio(1)">Visita</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(8)">Asistencia</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(3)">Compromisos</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(4)">Alta Parque</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(2)">Alta Comit&eacute</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(6)">Experiencia Exitosa</a></li>
      <li><a href="javascript:void(0)" onclick="cambio(5)">Check list</a></li>
      </ul>
    </nav>

    <main id="panel" class="panel">
      <header>
        <span class="toggle-button" style="cursor:pointer;">☰</span>
      </header>
<div id="contenedor">';
 $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";
    $ress=mysql_query($sqll);
    $rowz=mysql_fetch_array($ress);
echo '<div style="clear:both;"></div>
<form name="forma" method="post" class="white-envolve">
<label id="parque">
    <span>Parque:</span>
    <select type="text" name="parque" onchange="document.forma.submit();"><option value=""> -- Seleccione -- </option>';
    foreach($parque as $k=>$v){
	echo '<option value="'.$k.'"';
	if($id_post>1){
	    if($id_post==$k){
		echo ' selected';   
	    }
	}
	else {
	    if($_POST['parque']==$k){
		echo ' selected';
	    }
	}
	echo '>'.$v.'</option>';
    }
    echo '</select>
</label>
<div id="screen1">
<div class="white-half">
    <h1>Visita
        <span>Ingrese los parametros del parque</span>
    </h1>
    <label class="full">
        <span>Fecha de la visita: </span><input name="fecha_visita" type="text" readonly id="datepicker4" value="'.date("Y-m-d").'">
    </label>
    <label class="full">
        <span>Tipo de visita: </span><select name="visita"><option value="" selected> -- Seleccione --</option>
        <option value="prospectacion">Prospectacion</option>
        <option value="seguimiento">Seguimiento</option>
        <option value="reforzamiento">Reforzamiento</option>
        </select>
    </label>
    <label class="full">
        <span>Clasificación de visita: </span><select name="clasvisita"><option value="" selected> -- Seleccione --</option>
        <option value="1">Repartir volantes</option>
        <option value="2">Formación del comité</option>
        <option value="3">Reestructuración del comité</option>
        <option value="4">Elaboración de la visión del espacio</option>
        <option value="5">Presentación de la visión del espacio a los vecinos</option>
        <option value="6">Reestructuración de la visión del espacios</option>
        <option value="7">Presentación del diseño del espacio a los vecinos</option>
        <option value="8">Eventos organizados por el comité</option>
        <option value="9">Eventos rganizados por parques alegres</option>
        <option value="10">Talleres</option>
        <option value="11">Elaboración del calendario anual de actividades</option>
        <option value="12">Presentación de la planeación del calendario anual de actividades</option>
        <option value="13">Asesoría para realizar el reglamento de orden</option>
        </select>
    </label>
    <h2><label class="white-pinkon"><span>Comit&eacute;</span><span>Anterior</span><span>Actual</span></label></h2>
    <label>
        <span>El comit&eacute; opera con: </span><select disabled>
        <option value="" selected> -- Selecciona --</option>
        <option value=20'; if($rowz['opera']==20){echo ' selected';} echo '>Tres o m&aacute;s personas</option>
        <option value=14'; if($rowz['opera']==14){echo ' selected';} echo '>Dos personas</option>
        <option value=7'; if($rowz['opera']==7){echo ' selected';} echo '>Una persona</option>
        <option value=0'; if($rowz['opera']==0 && $rowz['opera']!=""){echo ' selected';} echo '>No hay comit&eacute;</option>
        </select><select name="opera">
        <option value="" selected> -- Selecciona --</option>
        <option value=20>Tres o m&aacute;s personas</option>
        <option value=14>Dos personas</option>
        <option value=7>Una persona</option>
        <option value=0>No hay comit&eacute;</option>
        </select>
    </label>
    <label>
        <span>C&oacutemo est&aacute; formalizado? </span><select disabled>
        <option value="interno"'; if($rowz['tipoformaliza']=="interno"){echo ' selected';} echo '>Solo comit&eacute interno</option>
        <option value="ayuntamiento"'; if($rowz['formaliza']==20){if($rowz['tipoformaliza']=="ayuntamiento" || $rowz['tipoformaliza']==""){echo ' selected';}} echo '>Solo registro en Ayuntamiento</option>
        <option value="AC"'; if($rowz['tipoformaliza']=="AC"){echo ' selected';} echo '>Solo es una AC</option>
        <option value="AC_ayuntamiento"'; if($rowz['tipoformaliza']=="AC_ayuntamiento"){echo ' selected';} echo '>AC con registro en Ayuntamiento</option>
        <option value=""'; if($rowz['formaliza']==0){echo ' selected';} echo '>Ninguna de las anteriores</option>
        </select><select name="formaliza">
        <option value="interno">Solo comit&eacute interno</option>
        <option value="ayuntamiento">Solo registro en Ayuntamiento</option>
        <option value="AC">Solo es una AC</option>
        <option value="AC_ayuntamiento">AC con registro en Ayuntamiento</option>
        <option value="" selected>Ninguna de las anteriores</option>
        </select>
    </label>
    <label>
        <span>Cuenta con buena organizaci&oacute;n(con orden-formalidad): </span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=20'; if($rowz['organiza']==20){echo ' selected';} echo '>Buena</option>
        <option value=10'; if($rowz['organiza']==10){echo ' selected';} echo '>Regular</option>
        <option value=0'; if($rowz['organiza']==0 && $rowz['organiza']!=""){echo ' selected';} echo '>Sin organizaci&oacute;n</option>
        </select><select name="organiza">
        <option value="" selected> -- Selecciona -- </option>
        <option value=20>Buena</option>
        <option value=10>Regular</option>
        <option value=0>Sin organizaci&oacute;n</option>
        </select>
    </label><br>
    <label>
        <span>Existen reuniones:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=20'; if($rowz['reunion']==20){echo ' selected';} echo '>Frecuentemente</option>
        <option value=10'; if($rowz['reunion']==10){echo ' selected';} echo '>Regularmente</option>
        <option value=0'; if($rowz['reunion']==0 && $rowz['reunion']!=""){echo ' selected';} echo '>No hay reuniones</option>
        </select><select name="reunion">
        <option value="" selected> -- Selecciona -- </option>
        <option value=20>Frecuentemente</option>
        <option value=10>Regularmente</option>
        <option value=0>No hay reuniones</option>
        </select>
    </label>
    <label>
        <span>Tienen proyectos en proceso:</span><label class="half-pinked"><input type="radio" '; if($rowz['proyecto']==20){echo ' checked';} echo ' value=20 disabled><span>S&iacute</span><input type="radio" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){echo ' checked';} echo ' value=0 disabled><span>No</span></label><label class="half-pinked"><input type="radio" id="proyectos" name="proyecto" value=20><span>S&iacute</span><input type="radio" id="proyecton" name="proyecto" value=0><span>No</span></label>
    </label>
    <h2>Instalaciones</h2>
    <label>
        <span>Cuenta con Proyecto:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value="vespacio"'; if($rowz['vespacio']==40){echo ' selected';} echo '>Visi&oacute;n de espacio</option>
        <option value="disenio"'; if($rowz['disenio']==40){echo ' selected';} echo '>Dise&ntilde;o</option>
        <option value="ejecutivo"'; if($rowz['ejecutivo']==40){echo ' selected';} echo '>Ejecutivo</option>
        <option value=0'; if($rowz['ejecutivo']==0 && $rowz['disenio']==0 && $rowz['vespacio']==0 && $rowz['ejecutivo']!="" && $rowz['disenio']!="" && $rowz['vespacio']!=""){echo' selected';}echo'>No</option>
        </select><select name="tipo_proyecto">
        <option value="" selected> -- Selecciona -- </option>
        <option value="vespacio">Visi&oacute;n de espacio</option>
        <option value="disenio">Dise&ntilde;o</option>
        <option value="ejecutivo">Ejecutivo</option>
        <option value=0>No</option>
        </select>
    </label>
    <label>
        <span>Estado actual de las instalaciones:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=30'; if($rowz['estado']==30){echo ' selected';} echo '>Excelente</option>
        <option value=25'; if($rowz['estado']==25){echo ' selected';} echo '>Muy bueno</option>
        <option value=20'; if($rowz['estado']==20){echo ' selected';} echo '>Bueno</option>
        <option value=15'; if($rowz['estado']==15){echo ' selected';} echo '>Regular</option>
        <option value=10'; if($rowz['estado']==10){echo ' selected';} echo '>Malo</option>
        <option value=5'; if($rowz['estado']==5){echo ' selected';} echo '>Muy malo</option>
        <option value=0'; if($rowz['estado']==0 && $rowz['estado']!=""){echo ' selected';} echo '>P&eacute;simo</option>
        </select><select name="estado">
        <option value="" selected> -- Selecciona -- </option>
        <option value=30>Excelente</option>
        <option value=25>Muy bueno</option>
        <option value=20>Bueno</option>
        <option value=15>Regular</option>
        <option value=10>Malo</option>
        <option value=5>Muy malo</option>
        <option value=0>P&eacute;simo</option>
        </select>
    </label>
    <label>
        <span>Hay instalaciones en la mayoria del espacio, cancha, andador, banquetas, etc:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=30'; if($rowz['instalaciones']==30){echo ' selected';} echo '>100%</option>
        <option value=25'; if($rowz['instalaciones']==25){echo ' selected';} echo '>80%</option>
        <option value=20'; if($rowz['instalaciones']==20){echo ' selected';} echo '>64%</option>
        <option value=15'; if($rowz['instalaciones']==15){echo ' selected';} echo '>48%</option>
        <option value=10'; if($rowz['instalaciones']==10){echo ' selected';} echo '>32%</option>
        <option value=5'; if($rowz['instalaciones']==5){echo ' selected';} echo '>16%</option>
        <option value=0'; if($rowz['instalaciones']==0 && $rowz['instalaciones']!=""){echo ' selected';} echo '>0%</option>
        </select><select name="instalaciones">
        <option value="" selected> -- Selecciona -- </option>
        <option value=30>100%</option>
        <option value=25>80%</option>
        <option value=20>64%</option>
        <option value=15>48%</option>
        <option value=10>32%</option>
        <option value=5>16%</option>
        <option value=0>0%</option>
        </select>
    </label>
    <h2>Ingresos</h2>
    <label>
        <span>Tienen fuente de ingresos permanentes:</span><label class="half-pinked"><input type="radio" value=30'; if($rowz['ingresop']==30){echo ' checked';} echo ' disabled><span>S&iacute</span><input type="radio" value=0'; if($rowz['ingresop']==0 && $rowz['ingresop']!=""){echo ' checked';} echo ' disabled><span>No</span></label><label class="half-pinked"><input type="radio" id="ingresops" name="ingresop" value=30><span>S&iacute</span><input type="radio" id="ingresopn" name="ingresop" value=0><span>No</span></label>
    </label>
    <label>
        <span>Es suficiente lo ingresado para operar bien:</span><select disabled>
        <option value="" selected> -- Seleccione -- </option>
        <option value=40'; if($rowz['ingresadop']==40){echo ' selected';} echo '>S&iacute;</option>
        <option value=20'; if($rowz['ingresadop']==20){echo ' selected';} echo '>Regular</option>
        <option value=0'; if($rowz['ingresadop']==0 && $rowz['ingresadop']!=""){echo ' selected';} echo '>No</option>
        </select><select name="ingresadop">
        <option value="" selected> -- Seleccione -- </option>
        <option value=40>S&iacute;</option>
        <option value=20>Regular</option>
        <option value=0>No</option>
        </select>
    </label>
    <label>
        <span>Tienen cuenta mancomunada:</span><label class="half-pinked"><input type="radio" value=30'; if($rowz['mancomunado']==30){echo ' checked';} echo ' disabled><span>S&iacute</span><input type="radio" value=0'; if($rowz['mancomunado']==0 && $rowz['mancomunado']!=""){echo ' checked';} echo ' disabled><span class="white-pinked">No</span></label><label class="half-pinked"><input type="radio" id="mancomunados" name="mancomunado" value=30><span>S&iacute</span><input type="radio" id="mancomunadon" name="mancomunado" value=0><span>No</span></label>
    </label>
    <h2>Eventos</h2>
    <label>
        <span>Hay eventos con regularidad:</span><select disabled>
        <option value="" selected> -- Seleccione -- </option>
        <option value=50'; if($rowz['eventosr']==50){echo ' selected';} echo '>4 al a&ntilde;o o 1 cada 3 meses</option>
        <option value=25'; if($rowz['eventosr']==25){echo ' selected';} echo '>Menos de 4 al a&ntilde;o</option>
        <option value=0'; if($rowz['eventosr']==0 && $rowz['eventosr']!=""){echo ' selected';} echo '>Ninguno</option>
        </select><select name="eventosr">
        <option value="" selected> -- Seleccione -- </option>
        <option value=50>4 al a&ntilde;o o 1 cada 3 meses</option>
        <option value=25>Menos de 4 al a&ntilde;o</option>
        <option value=0>Ninguno</option>
        </select>
    </label>
    <label>
        <span>Cuentan con un calendario anual de actividades:</span><label class="half-pinked"><input type="radio" value=50'; if($rowz['eventos']==50){echo ' checked';} echo ' disabled><span>S&iacute</span><input type="radio" value=0'; if($rowz['eventos']==0 && $rowz['eventos']!=""){echo ' checked';} echo ' disabled><span>No</span></label><label class="half-pinked"><input type="radio" id="eventoss" name="eventos" value=50><span>S&iacute</span><input type="radio" id="eventosn" name="eventos" value=0><span>No</span></label>
    </label>
    <h2>&Aacute;reas verdes</h2>
    <label>
        <span>Cuenta con:</span><label class="text-pinked">'; if($rowz['averdes']==0 && $rowz['averdes']!=""){ echo '<span>Ninguno</span>';}
        if($rowz['averdes']==17){echo '<span>17</span>';}
        if($rowz['averdes']==34){echo'<span>Árboles, cesped</span>';}
        if($rowz['averdes']==35){echo'<span>Árboles, jardín</span>';}
        if($rowz['averdes']==36){echo'<span>Cesped, jardín</span>';}
        if($rowz['averdes']==50){echo'<span>Árboles, cesped, jardín</span>';}echo '</label><label class="third-pinked"><input type="checkbox" id="arboles" name="averdes[]" value="1"><span>&aacute;rboles</span>
        <input type="checkbox" id="cesped" name="averdes[]" value="2"><span>c&eacute;sped</span>
        <input type="checkbox" id="jardin" name="averdes[]" value="3"><span>jard&iacute;n</span></label>
    </label>
    <label>
        <span>Se encuentra en buen estado:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=50'; if($rowz['estaver']==50){echo ' selected';} echo '>Excelente</option>
        <option value=40'; if($rowz['estaver']==40){echo ' selected';} echo '>Muy bueno</option>
        <option value=32'; if($rowz['estaver']==32){echo ' selected';} echo '>Bueno</option>
        <option value=24'; if($rowz['estaver']==24){echo ' selected';} echo '>Regular</option>
        <option value=16'; if($rowz['estaver']==16){echo ' selected';} echo '>Malo</option>
        <option value=8'; if($rowz['estaver']==8){echo ' selected';} echo '>Muy malo</option>
        <option value=0'; if($rowz['estaver']==0 && $rowz['estaver']!=""){echo ' selected';} echo '>P&eacute;simo</option>
        </select><select name="estaver">
        <option value="" selected> -- Selecciona -- </option>
        <option value=50>Excelente</option>
        <option value=40>Muy bueno</option>
        <option value=32>Bueno</option>
        <option value=24>Regular</option>
        <option value=16>Malo</option>
        <option value=8>Muy malo</option>
        <option value=0>P&eacute;simo</option>
        </select>
    </label>
    <h2>Afluencia</h2>
    <label>
        <span>Porcentaje de afluencia sobre lo existente:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=100'; if($rowz['gente']==100){echo ' selected';} echo '>100%</option>
        <option value=90'; if($rowz['gente']==90){echo ' selected';} echo '>90%</option>
        <option value=80'; if($rowz['gente']==80){echo ' selected';} echo '>80%</option>
        <option value=70'; if($rowz['gente']==70){echo ' selected';} echo '>70%</option>
        <option value=60'; if($rowz['gente']==60){echo ' selected';} echo '>60%</option>
        <option value=50'; if($rowz['gente']==50){echo ' selected';} echo '>50%</option>
        <option value=40'; if($rowz['gente']==40){echo ' selected';} echo '>40%</option>
        <option value=30'; if($rowz['gente']==30){echo ' selected';} echo '>30%</option>
        <option value=20'; if($rowz['gente']==20){echo ' selected';} echo '>20%</option>
        <option value=10'; if($rowz['gente']==10){echo ' selected';} echo '>10%</option>
        <option value=0'; if($rowz['gente']==0 && $rowz['gente']!=""){echo ' selected';} echo '>0%</option>
        </select><select name="gente">
        <option value="" selected> -- Selecciona -- </option>
        <option value=100>100%</option>
        <option value=90>90%</option>
        <option value=80>80%</option>
        <option value=70>70%</option>
        <option value=60>60%</option>
        <option value=50>50%</option>
        <option value=40>40%</option>
        <option value=30>30%</option>
        <option value=20>20%</option>
        <option value=10>10%</option>
        <option value=0>0%</option>
        </select>
    </label>
    <h2>Orden</h2>
    <label>
        <span>Las instalaciones se respetan:</span><select disabled>
        <option value="" selected> -- Seleccione -- </option>
        <option value=40'; if($rowz['respint']==40){echo ' selected';} echo '>S&iacute;</option>
        <option value=20'; if($rowz['respint']==20){echo ' selected';} echo '>Regular</option>
        <option value=0'; if($rowz['respint']==0 && $rowz['respint']!=""){echo ' selected';} echo '>No</option>
        </select><select name="respint">
        <option value="" selected> -- Seleccione -- </option>
        <option value=40>S&iacute;</option>
        <option value=20>Regular</option>
        <option value=0>No</option>
        </select>
    </label>
    <label>
        <span>Se cuenta con un reglamento de orden:</span><select disabled>
    <option value="" selected> -- Seleccione -- </option>
    <option value=30'; if($rowz['orden']==30){echo ' selected';} echo '>Instalado en el parque</option>
    <option value=15'; if($rowz['orden']==15){echo ' selected';} echo '>Solo compatido por escrito</option>
    <option value=0'; if($rowz['orden']==0 && $rowz['orden']!=""){echo ' selected';} echo '>No</option>
    </select><select name="orden">
    <option value="" selected> -- Seleccione -- </option>
    <option value=30>Instalado en el parque</option>
    <option value=15>Solo compatido por escrito</option>
    <option value=0>No</option>
    </select>
    </label>
    <label>
        <span>Se mantiene limpio:</span><select disabled>
        <option value="" selected> -- Selecciona -- </option>
        <option value=30'; if($rowz['limpieza']==30){echo ' selected';} echo '>Excelente</option>
        <option value=25'; if($rowz['limpieza']==25){echo ' selected';} echo '>Muy bueno</option>
        <option value=20'; if($rowz['limpieza']==20){echo ' selected';} echo '>Bueno</option>
        <option value=15'; if($rowz['limpieza']==15){echo ' selected';} echo '>Regular</option>
        <option value=10'; if($rowz['limpieza']==10){echo ' selected';} echo '>Malo</option>
        <option value=5'; if($rowz['limpieza']==5){echo ' selected';} echo '>Muy malo</option>
        <option value=0'; if($rowz['limpieza']==0 && $rowz['limpieza']!=""){echo ' selected';} echo '>P&eacute;simo</option>
        </select><select name="limpieza">
        <option value="" selected> -- Selecciona -- </option>
        <option value=30>Excelente</option>
        <option value=25>Muy bueno</option>
        <option value=20>Bueno</option>
        <option value=15>Regular</option>
        <option value=10>Malo</option>
        <option value=8>Muy malo</option>
        <option value=0>P&eacute;simo</option>
        </select>
    </label>
    <label>
        <span id="promedio">Promedio: </span><span id="total"></span>
    </label>
    <div align="center"><input class="button" type="button" value="Calcular Promedio" name="boton_calcular" onclick="calcular();">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="button" value="Guardar Par&aacute;mentros" name="boton_enviar" onclick="validar(1);"></div>
'; echo '<input type=hidden name="cmd"><input type=hidden name="pods_meta__cmb_parque"><input type=hidden name="buscarvisita" value="0">'; echo '
</div>
</div>
<div id="screen2"><div class="white-pink">
<h1>Comit&eacute; de Parque</h1>
    <label>
        <span>Fecha de alta:</span><input type="text" readonly id="datepicker5" value="'.date("Y-m-d").'" name="fecha_comite"/>
    </label>
<h2>Miembros</h2>
<div id="miembros">
<h2>Miembro 1</h2>
    <label>
        <span>Nombre Completo:</span><input type="text" id="nombre1" name="nombre[1]" size="50"/>
    </label>
    <label>
        <span>Fecha de nacimiento:</span><label class="white-pinkt" for="dia[1]">D&iacute;a</label>&nbsp;<select class="pinked" name="dia[1]">';
        for($i=0;$i<=31;$i++){
            if($i==0){
                echo '<option value="" selected> -- </option>';
            }
            else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        }
        echo '</select>&nbsp<label class="white-pinkt" for="mes[1]">Mes</label>&nbsp;<select class="pinked" name="mes[1]">';
        for($i=0;$i<=12;$i++){
            if($i==0){
                echo '<option value="" selected> -- </option>';
            }
            else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        }
        echo '</select>&nbsp<label class="white-pinkt" for="anio[1]">A&ntildeo</label>&nbsp<select class="pinked" name="anio[1]">';
        for($i=1909;$i<=2015;$i++){
            if($i==1909){
                echo '<option value="" selected> ---- </option>';
            }
            else{
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        }
        echo '</select></label>
    <label>
        <span>Sexo:</span><input type="radio" id="masculino[1]" name="sexo[1]" value="Masculino"><label class="white-pinked" for="masculino[1]">Masculino</label><input type="radio" id="femenino[1]" name="sexo[1]" value="Femenino"><label class="white-pinked" for="femenino[1]">Femenino</label>
    </label>
    <label>
        <span>Nivel Educativo:</span><select name="educacion[1]">
        <option value="" selected> -- Seleccione -- </option>
        <option value="primaria">Primaria</option>
        <option value="secundaria">Secundaria</option>
        <option value="preparatoria">Preparatoria</option>
        <option value="profesional">Carrera Profesional</option>
        <option value="tecnicos">Estudios T&eacute;cnicos</option>
        </select>
    </label>
    <label>
        <span>Rol en el comit&eacute;:</span><select name="rol[1]">
        <option value="" selected> -- Seleccione -- </option>
        <option value="1">Presidente</option>
        <option value="2">Secretario</option>
        <option value="3">Tesorero</option>
        <option value="4">Vocal</option>
        <option value="5">Comunicaci&oacute;n</option>
        <option value="6">Vecino</option>
        </select>
    </label>
    <label>
        <span>Tel&eacute;fono:</span><input type="text" name="telefono[1]">
    </label>
    <label>
        <span>Celular:</span><input type="text" name="celular[1]">
    </label>
    <label>
        <span>Tiene Facebook?</span><input type="checkbox" class="megusta" name="facebook[1]" value="1">
    </label>
    <label>
        <span>"Me gusta" a Parques Alegres en Facebook?</span><input type="checkbox" class="megusta" name="megusta[1]" value="1">
    </label>
    <label>
        <span>Tiene Twitter?</span><input type="checkbox" class="megusta" name="twitter[1]" value="1">
    </label>
    <label>
        <span>"Sigue" a Parques Alegres en Twitter?</span><input type="checkbox" class="megusta" name="siguemet[1]" value="1">
    </label>
    <label>
        <span>Tiene Instagram?</span><input type="checkbox" class="megusta" name="instagram[1]" value="1">
    </label>
    <label>
        <span>"Sigue" a Parques Alegres en Instagram?</span><input type="checkbox" class="megusta" name="siguemei[1]" value="1">
    </label>
    <label>
        <span>Correo electr&oacute;nico:</span><input type="text" name="email[1]">
    </label>
    <label>
        <span>Contacto:</span><input type="radio" value="1" id="cont_a[1]" name="contacto[1]" onclick="contacto(1);"><label class="white-pinked" for="cont_a[1]">S&iacute;</label><input type="radio" value="0" id="cont_b[1]" name="contacto[1]"><label class="white-pinked" for="cont_b[1]">No</label>
    </label>
</div>
<div align="center"><input type="button" class="button" value="Agregar miembro" name="agregar_miembro" onclick="agregar(document.getElementById(\'num_miembro\').value);"></div>
<h2>Comit&eacute;</h2>
    <label>
        <span>Tel&eacute;fono:</span><input type="text" name="telefono[0]">
    </label>
    <label>
        <span>Celular:</span><input type="text" name="celular[0]">
    </label>
    <label>
        <span>Correo electr&oacute;nico:</span><input type="text" name="email[0]">
    </label>
<h2>Redes sociales</h2>
    <label>
        <span>Facebook (del comité):</span><input type="text" name="facebook[0]">
    </label>
    <label>
        <span>Twitter (del comité):</span><input type="text" name="twitter[0]">
    </label>
    <label>
        <span>Instagram (del comité):</span><input type="text" name="instagram[0]">
    </label>
    <label>
        <span>Skype (del comité):</span><input type="text" name="skype">
    </label>
    <label>
        <span>Otro (del comité):</span><input type="text" name="otro">
    </label>
    <label>
        <span>Enviar correo:</span><input type="checkbox" class="megusta" value="1" name="enviacorreo">
    </label>
<div align="center"><input type="button" class="button" value="Guardar" name="boton_guardar" onclick="validar(2);"></div>
<input type="hidden" name="num_miembro" id="num_miembro" value=1>
</div>
</div>';
    $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1,1";
    $ress=mysql_query($sqll);
    $roww=mysql_fetch_array($ress);
    if(is_array($roww)){
        foreach($roww as $k=>$v){
            if(!is_int($k)){
                if($k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){
                    $totala=$totala+$v;
                }
            }
        }
    }
    $totala=$totala/7;
    if(is_array($rowz)){
        foreach($rowz as $k=>$v){
            if(!is_int($k)){
                if($k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){
                    $total=$total+$v;
                }
            }
        }
    }
    $total=$total/7;
    $parametros=array("opera"=>array(0,7,14,20),"formaliza"=>array(0,10,20),"organiza"=>array(0,10,20),"reunion"=>array(0,10,20),"proyecto"=>array(0,20),
                      "disenio"=>array(0,40),"ejecutivo"=>array(0,40),"vespacio"=>array(0,40),"instalaciones"=>array(0,5,10,15,20,25,30),
                      "estado"=>array(0,5,10,15,20,25,30),"ingresop"=>array(0,30),"ingresadop"=>array(0,20,40),"mancomunado"=>array(0,30),"eventos"=>array(0,50),
                      "eventosr"=>array(0,25,50),"averdes"=>array(17,34,35,36,50),"estaver"=>array(0,8,16,24,32,40,50),"gente"=>array(0,10,20,30,40,50,60,70,80,90,100),
                      "limpieza"=>array(0,5,10,15,20,25,30),"orden"=>array(0,15,30),"respint"=>array(0,20,40));
echo '<div id="screen3"><div class="white-coment">
<label><span>Fecha de cumplimiento: </span><input type="text" readonly id="datepicker3" value="'.date("Y-m-d").'" name="fecha_cumplimiento"/></label>
    <table border="0" width="940px" style="table-layout:fixed;">
    <tr><th colspan="1" width="14%">Comit&eacute;</th><th colspan="1" width="11%">Visita anterior</th><th colspan="1" width="11%">Visita</th><th colspan="1" width="11%">Meta</th><th colspan="1" width="26%">Compromisos</th><th colspan="1" width="26%">Comentarios</th></tr>
    <tr>
        <td>Opera con 3 personas o m&aacute;s:</td>
        <td align="center">'.$roww['opera'].'</td>
        <td align="center">'.$rowz['opera'].'</td>
        <td align="center">';
        if($rowz['opera']==max($parametros['opera'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_opera" value="'.max($parametros['opera']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_opera" value="'.$rowz['opera'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['opera']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compopera"><option value="" selected> -- Seleccione --</option><option value="1">'.$compromisos[1].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comopera"></textarea></td>
    </tr>
    <tr>
        <td>C&oacute;mo est&aacute; formalizado?:</td>
        <td align="center">'.$roww['formaliza'].'</td>
        <td align="center">'.$rowz['formaliza'].'</td>
        <td align="center">';
        if($rowz['formaliza']==max($parametros['formaliza'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_formaliza" value="'.max($parametros['formaliza']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_formaliza" value="'.$rowz['formaliza'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['formaliza']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compformaliza"><option value="" selected> -- Seleccione --</option><option value="2">'.$compromisos[2].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comformaliza"></textarea></td>
    </tr>
    <tr>
        <td>Cuenta con buena organizaci&oacute;n:</td>
        <td align="center">'.$roww['organiza'].'</td>
        <td align="center">'.$rowz['organiza'].'</td>
        <td align="center">';
        if($rowz['organiza']==max($parametros['organiza'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_organiza" value="'.max($parametros['organiza']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_organiza" value="'.$rowz['organiza'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['organiza']).'"><img src="help.png" border="0"></a></td>';
        }
       echo '<td><select name="comporganiza"><option value="" selected> -- Seleccione --</option><option value="3">'.$compromisos[3].'</option><option value="4">'.$compromisos[4].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comorganiza"></textarea></td>
    </tr>
    <tr>
        <td>Existen reuniones con regularidad:</td>
        <td align="center">'.$roww['reunion'].'</td>
        <td align="center">'.$rowz['reunion'].'</td>
        <td align="center">';
        if($rowz['reunion']==max($parametros['reunion'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_reunion" value="'.max($parametros['reunion']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_reunion" value="'.$rowz['reunion'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['reunion']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compreunion"><option value="" selected> -- Seleccione --</option><option value="5">'.$compromisos[5].'</option><option value="6">'.$compromisos[6].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comreunion"></textarea></td>
    </tr>
    <tr>
        <td>Tienen proyectos en proceso:</td>
        <td align="center">'.$roww['proyecto'].'</td>
        <td align="center">'.$rowz['proyecto'].'</td>
        <td align="center">';
        if($rowz['proyecto']==max($parametros['proyecto'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_proyecto" value="'.max($parametros['proyecto']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_proyecto" value="'.$rowz['proyecto'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['proyecto']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compproyecto"><option value="" selected> -- Seleccione --</option><option value="7">'.$compromisos[7].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comproyecto"></textarea></td>
    </tr>
    <tr><th colspan="1">Instalaciones</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Cuenta con Visi&oacute;n del espacio:</td>
        <td align="center">'.$roww['vespacio'].'</td>
        <td align="center">'.$rowz['vespacio'].'</td>
        <td align="center">';
        if($rowz['vespacio']==max($parametros['vespacio'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_vespacio" value="'.max($parametros['vespacio']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_vespacio" value="'.$rowz['vespacio'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['vespacio']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compvespacio"><option value="" selected> -- Seleccione --</option><option value="8">'.$compromisos[8].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comvespacio"></textarea></td>
    </tr>
    <tr>
        <td>Cuenta con Proyecto de dise&ntilde;o:</td>
        <td align="center">'.$roww['disenio'].'</td>
        <td align="center">'.$rowz['disenio'].'</td>
        <td align="center">';
        if($rowz['disenio']==max($parametros['disenio'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_disenio" value="'.max($parametros['disenio']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_disenio" value="'.$rowz['disenio'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['disenio']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compdisenio"><option value="" selected> -- Seleccione --</option><option value="9">'.$compromisos[9].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comdisenio"></textarea></td>
    </tr>
    <tr>
        <td>Cuenta con Proyecto ejecutivo:</td>
        <td align="center">'.$roww['ejecutivo'].'</td>
        <td align="center">'.$rowz['ejecutivo'].'</td>
        <td align="center">';
        if($rowz['ejecutivo']==max($parametros['ejecutivo'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_ejecutivo" value="'.max($parametros['ejecutivo']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_ejecutivo" value="'.$rowz['ejecutivo'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['ejecutivo']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compejecutivo"><option value="" selected> -- Seleccione --</option><option value="10">'.$compromisos[10].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comejecutivo"></textarea></td>
    </tr>
    <tr>
        <td>Esta en buen estado lo que existe:</td>
        <td align="center">'.$roww['estado'].'</td>
        <td align="center">'.$rowz['estado'].'</td>
        <td align="center">';
        if($rowz['estado']==max($parametros['estado'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_estado" value="'.max($parametros['estado']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_estado" value="'.$rowz['estado'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['estado']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compestado" id="compestado" onchange="addsel(3);"><option value="" selected> -- Seleccione --</option><option value="11">'.$compromisos[11].'</option>
        <option value="12">'.$compromisos[12].'</option><option value="13">'.$compromisos[13].'</option><option value="14">'.$compromisos[14].'</option></select><select name="compest" id="compest">
        <option value="" selected> -- Seleccione -- </option>';
        foreach($compesp as $k=>$v){
            if($k==1){
                echo '<option value="111">Instalaciones</option>';
            }
            if($k==12){
                echo '<option value="112">Deportiva</option>';
            }
            if($k==30){
                echo '<option value="113">Áreas de esparcimiento</option>';
            }
            if($k==41){
                echo '<option value="114">Áreas verdes</option>';
            }
            echo '<option value="'.$k.'">'.$v.'</option>';
        }
        echo '</select></td>
        <td><textarea style="width:200px;height:90px;" name="comestado"></textarea></td>
    </tr>
    <tr>
        <td width="35%" style="word-wrap:break-word;">Hay instalaciones en la mayoria del espacio cancha, &aacute;reas verdes, banquetas:</td>
        <td align="center">'.$roww['instalaciones'].'</td>
        <td align="center">'.$rowz['instalaciones'].'</td>
        <td align="center">';
        if($rowz['instalaciones']==max($parametros['instalaciones'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_instalaciones" value="'.max($parametros['instalaciones']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_instalaciones" value="'.$rowz['instalaciones'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['instalaciones']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compinstalaciones"><option value="" selected> -- Seleccione --</option><option value="14">'.$compromisos[14].'</option></select><select name="compinstal">
        <option value="" selected> -- Seleccione -- </option>';
        foreach($compesp as $k=>$v){
            if($k==1){
                echo '<optgroup label="Instalaciones">';
            }
            if($k==12){
                echo '<optgroup label="Deportiva">';
            }
            if($k==30){
                echo '<optgroup label="Áreas de esparcimiento">';
            }
            if($k==41){
                echo '<optgroup label="Áreas verdes">';
            }
            echo '<option value="'.$k.'">'.$v.'</option>';
        }
        echo '</select></td>
        <td><textarea style="width:200px;height:90px;" name="cominstalaciones"></textarea></td>
    </tr>
    <tr><th colspan="1">Ingresos</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Tienen fuente de ingresos permanentes:</td>
        <td align="center">'.$roww['ingresop'].'</td>
        <td align="center">'.$rowz['ingresop'].'</td>
        <td align="center">';
        if($rowz['ingresop']==max($parametros['ingresop'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_ingresop" value="'.max($parametros['ingresop']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_ingresop" value="'.$rowz['ingresop'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['ingresop']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compingresop"><option value="" selected> -- Seleccione --</option>';
        for($i=15;$i<=25;$i++){
            echo '<option value="'.$i.'">'.$compromisos[$i].'</option>';
        }
        echo '</select></td>
        <td><textarea style="width:200px;height:90px;" name="comingresop"></textarea></td>
    </tr>
    <tr>
        <td>Es suficiente lo ingresado para operar bien:</td>
        <td align="center">'.$roww['ingresadop'].'</td>
        <td align="center">'.$rowz['ingresadop'].'</td>
        <td align="center">';
        if($rowz['ingresadop']==max($parametros['ingresadop'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_ingresadop" value="'.max($parametros['ingresadop']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_ingresadop" value="'.$rowz['ingresadop'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['ingresadop']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compingresadop"><option value="" selected> -- Seleccione --</option><option value="26">'.$compromisos[26].'</option><option value="27">'.$compromisos[27].'</option>
        <option value="28">'.$compromisos[28].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comingresadop"></textarea></td>
    </tr>
    <tr>
        <td>Tienen cuenta mancomunada:</td>
        <td align="center">'.$roww['mancomunado'].'</td>
        <td align="center">'.$rowz['mancomunado'].'</td>
        <td align="center">';
        if($rowz['mancomunado']==max($parametros['mancomunado'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_mancomunado" value="'.max($parametros['mancomunado']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_mancomunado" value="'.$rowz['mancomunado'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['mancomunado']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compmancomunado"><option value="" selected> -- Seleccione --</option><option value="29">'.$compromisos[29].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="commancomunado"></textarea></td>
    </tr>
    <tr><th colspan="1">Eventos</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Hay eventos con regularidad:</td>
        <td align="center">'.$roww['eventosr'].'</td>
        <td align="center">'.$rowz['eventosr'].'</td>
        <td align="center">';
        if($rowz['eventosr']==max($parametros['eventosr'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_eventosr" value="'.max($parametros['eventosr']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_eventosr" value="'.$rowz['eventosr'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['eventosr']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compeventosr" id="compeventosr" onchange="addsel(4);">
        <option value="" selected> -- Seleccione --</option>
        <option value="84">Campa&ntilde;as</option>
        <option value="85">Fondos econ&oacute;micos</option>
        <option value="86">Tejido social</option></select>
        <select name="compevent" id="compevent"><option value="" selected> -- Seleccione --</select></td>
        <td><textarea style="width:200px;height:90px;" name="comeventosr"></textarea></td>
    </tr>
    <tr>
        <td>Cuentan con un calendario anual de actividades:</td>
        <td align="center">'.$roww['eventos'].'</td>
        <td align="center">'.$rowz['eventos'].'</td>
        <td align="center">';
        if($rowz['eventos']==max($parametros['eventos'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_eventos" value="'.max($parametros['eventos']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_eventos" value="'.$rowz['eventos'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['eventos']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compeventos"><option value="" selected> -- Seleccione --</option><option value="36">'.$compromisos[36].'</option><option value="37">'.$compromisos[37].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comeventos"></textarea></td>
    </tr>
    <tr><th colspan="1">&Aacute;reas verdes</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Cuenta con &aacute;reas verdes, c&eacute;sped y jard&iacute;n etc:</td>
        <td align="center">'.$roww['averdes'].'</td>
        <td align="center">'.$rowz['averdes'].'</td>
        <td align="center">';
        if($rowz['averdes']==max($parametros['averdes'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_averdes" value="'.max($parametros['averdes']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_averdes" value="'.$rowz['averdes'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['averdes']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compaverdes"><option value="" selected> -- Seleccione --</option><option value="38">'.$compromisos[38].'</option><option value="39">'.$compromisos[39].'</option>
        <option value="40">'.$compromisos[40].'</option><option value="41">'.$compromisos[41].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comaverdes"></textarea></td>
    </tr>
    <tr>
        <td>Se encuentra en buen estado:</td>
        <td align="center">'.$roww['estaver'].'</td>
        <td align="center">'.$rowz['estaver'].'</td>
        <td align="center">';
        if($rowz['estaver']==max($parametros['estaver'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_estaver" value="'.max($parametros['estaver']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_estaver" value="'.$rowz['estaver'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['estaver']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compestaver"><option value="" selected> -- Seleccione --</option>';
        for($i=42;$i<=50;$i++){
            echo '<option value="'.$i.'">'.$compromisos[$i].'</option>';
        }
        echo '</select></td>
        <td><textarea style="width:200px;height:90px;" name="comestaver"></textarea></td>
    </tr>
    <tr><th colspan="1">Afluencia</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Porcentaje de afluencia sobre lo existente:</td>
        <td align="center">'.$roww['gente'].'</td>
        <td align="center">'.$rowz['gente'].'</td>
        <td align="center">';
        if($rowz['gente']==max($parametros['gente'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_gente" value="'.max($parametros['gente']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_gente" value="'.$rowz['gente'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['gente']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="compgente"><option value="" selected> -- Seleccione --</option>';
        for($i=51;$i<=71;$i++){
            echo '<option value="'.$i.'">'.$compromisos[$i].'</option>';
        }
        echo '</select></td>
        <td><textarea style="width:200px;height:90px;" name="comgente"></textarea></td>
    </tr>
    <tr><th colspan="1">Orden</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Meta</th><th colspan="1">Compromisos</th><th colspan="1">Comentarios</th></tr>
    <tr>
        <td>Las instalaciones se respetan:</td>
        <td align="center">'.$roww['respint'].'</td>
        <td align="center">'.$rowz['respint'].'</td>
        <td align="center">';
        if($rowz['respint']==max($parametros['respint'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_respint" value="'.max($parametros['respint']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_respint" value="'.$rowz['respint'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['respint']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="comprespint"><option value="" selected> -- Seleccione --</option><option value="72">'.$compromisos[72].'</option><option value="73">'.$compromisos[73].'</option>
        <option value="74">'.$compromisos[74].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comrespint"></textarea></td>
    </tr>
    <tr>
        <td>Se cuenta con un reglamento de orden:</td>
        <td align="center">'.$roww['orden'].'</td>
        <td align="center">'.$rowz['orden'].'</td>
        <td align="center">';
        if($rowz['orden']==max($parametros['orden'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_orden" value="'.max($parametros['orden']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_orden" value="'.$rowz['orden'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['orden']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="comporden"><option value="" selected> -- Seleccione --</option><option value="75">'.$compromisos[75].'</option><option value="76">'.$compromisos[76].'</option>
        <option value="77">'.$compromisos[77].'</option><option value="78">'.$compromisos[78].'</option><option value="79">'.$compromisos[79].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comorden"></textarea></td>
    </tr>
    <tr>
        <td>Se mantiene limpio:</td>
        <td align="center">'.$roww['limpieza'].'</td>
        <td align="center">'.$rowz['limpieza'].'</td>
        <td align="center">';
        if($rowz['limpieza']==max($parametros['limpieza'])){
            echo '<img src="bien.png"><input type="hidden" name="meta_limpieza" value="'.max($parametros['limpieza']).'" disabled></td>';
        }
        else {
            echo '<input type="text" name="meta_limpieza" value="'.$rowz['limpieza'].'"><a href="javascript:void(0);" title="'.implode(",",$parametros['limpieza']).'"><img src="help.png" border="0"></a></td>';
        }
        echo '<td><select name="complimpieza"><option value="" selected> -- Seleccione --</option><option value="80">'.$compromisos[80].'</option><option value="81">'.$compromisos[81].'</option></select></td>
        <td><textarea style="width:200px;height:90px;" name="comlimpieza"></textarea></td>
    </tr>
    <tr><th colspan="6">Visita</th></tr><tr><td>Comentarios generales de la visita:</td><td align="center">'; if($totala>0){echo round($totala);} echo '</td><td align="center">'; if($total>0){echo '<input type="hidden" name="totalvis">'; echo round($total);} echo '</td>
        <td align="center"><span id="totalm"></span><input type="hidden" name="totalmeta"></td><td align="right" colspan="2"><textarea style="width:400px;height:90px;" name="comgenvisita"></textarea></td></tr>
    </table>
<div><input type="button" class="button" value="Guardar" name="boton_compromisos" onclick="validar(3);"></div>
</div></div>
<div id="screen4"><div class="white-pink">
    <h1>Parque
        <span>Ingrese los datos del parque</span>
    </h1>
    <label>
        <span>Nombre del Parque:</span>
        <input type="text" name="nom_parque" />
    </label>
    <label>
        <span>Ubicaci&oacute;n: </span><input name="ubicacion" type="text">
    </label>
    <label>
        <span>Colonia: </span><input name="colonia" type="text">
    </label>
    <label>
        <span>Superficie (M2): </span><input name="superficie" type="text">
    </label>
    <label>
        <span>Colindancias: </span><input name="colindancias" type="text">
    </label>
    <label>
        <span>Sector: </span><select name="sector">
            <option value="" selected> -- Seleccione -- </option>
            <option value="1">Noreste (NE)</option>
            <option value="2">Noroeste (NO)</option>
            <option value="3">Sureste (SE)</option>
            <option value="4">Suroeste (SO)</option>
            </select>
    </label>
    <label>
        <span>Estado: </span><select name="state" id="state" onchange="addsel(5);">
            <option value=""> -- Seleccione -- </option>
            <option value="1">Aguascalientes</option>
            <option value="2">Baja California</option>
            <option value="3">Baja California Sur</option>
            <option value="4">Campeche</option>
            <option value="5">Coahuila de Zaragoza</option>
            <option value="6">Colima</option>
            <option value="7">Chiapas</option>
            <option value="8">Chihuahua</option>
            <option value="9">Distrito Federal</option>
            <option value="10">Durango</option>
            <option value="11">Guanajuato</option>
            <option value="12">Guerrero</option>
            <option value="13">Hidalgo</option>
            <option value="14">Jalisco</option>
            <option value="15">México</option>
            <option value="16">Michoacán de Ocampo</option>
            <option value="17">Morelos</option>
            <option value="18">Nayarit</option>
            <option value="19">Nuevo León</option>
            <option value="20">Oaxaca</option>
            <option value="21">Puebla</option>
            <option value="22">Querétaro</option>
            <option value="23">Quintana Roo</option>
            <option value="24">San Luis Potosí</option>
            <option value="25" selected>Sinaloa</option>
            <option value="26">Sonora</option>
            <option value="27">Tabasco</option>
            <option value="28">Tamaulipas</option>
            <option value="29">Tlaxcala</option>
            <option value="30">Veracruz de Ignacio de la Llave</option>
            <option value="31">Yucatán</option>
            <option value="32">Zacatecas</option>
            </select>
    </label>
    <label>
        <span>Ciudad: </span><select name="ciudad" id="ciudad">
            <option value=""> -- Seleccione -- </option>
            <option value="Culiacán" selected>Culiacán</option>
            <option value="Navolato">Navolato</option>
            </select>
    </label>
    <label>
        <span>Nivel socioecon&oacute;mico de la zona:</span><select name="nivel">
            <option value="" selected> -- Seleccione -- </option>
            <option value="1">Alto (AB)</option>
            <option value="2">Medio alto (C+)</option>
            <option value="3">Medio ( C )</option>
            <option value="4">medio bajo (D+)</option>
            <option value="5">Bajo (D)</option>
            <option value="6">Pobreza extrema (E)</option>
            </select>
    </label>
    <label>
        <span>R&eacute;gimen del parque: </span><select name="regimen">
            <option value="" selected> -- Seleccione -- </option>
            <option value="1">P&uacute;blico</option>
            <option value="2">Condominal</option>
            <option value="3">Concesionado</option>
            </select>
    </label>
    <label>
        <span>Situaci&oacute;n legal del parque: </span><select name="legal">
            <option value="" selected> -- Seleccione -- </option>
            <option value="1">Propiedad Gobierno Federal</option>
            <option value="2">Gobierno del Estado</option>
            <option value="3">Gobierno Municipal</option>
            <option value="4">Propiedad Ejidal</option>
            <option value="5">Propiedad Fraccionadora</option>
            </select>
    </label>
    <label>
        <span>Tipo de parque: </span><select name="tipo">
            <option value="" selected=> -- Seleccione -- </option>
            <option value="1">&Aacute;rea verde</option>
            <option value="2">Centro barrio</option>
            <option value="3">De bolsillo</option>
            <option value="4">Lineal</option>
            <option value="5">Mixto</option>
            <option value="6">Parque urbano</option>
            <option value="7">Plazuela</option>
            <option value="8">Unidad deportiva</option>
            </select>
    </label>
    <label>
        <span>Apoyado por Parques Alegres: </span><input type="checkbox" class="megusta" value="1" name="apoyado">
    </label>
    <label>
        <span>Observaciones generales: </span><textarea name="obsgenerales"></textarea>
    </label>
    <div align="center"><input class="button" type="buton" value="Guardar Parque" name="guardar_parque" onclick="validar(4)"></div>
</div></div>
<div id="screen5"><div class="white-check">
<h2>Instalaciones</h2>
<label>
<span>&nbsp;</span><span class="titu">Cantidad</span><span class="titu">Bueno</span><span class="titu">Regular</span><span class="titu">Malo</span><span class="titu">&nbsp;Faltante</span></label>';
$instalaciones= array("Bancas","Cerca","Alumbrado","Ba&ntilde;os","Fuentes","Botes de basura","Banqueta","Acceso para capacidades diferentes","Anclaje para bicicletas",
                      "Cajones de estacionamiento","Canasta de reciclaje");
$esparcimiento= array("Techumbres","&Aacute;area de adoqu&iacute;n","Bordillo de concreto","Pi&ntilde;ateros","Comedores",
                      "Asadores","Juegos infantiles","Palapa","Alberca","Camastros","Regaderas");
$deportiva= array("Cancha de usos m&uacute;ltiples","Cancha de voleibol","Cancha de soccer","Cancha de Basquetbol","Cancha de beisbol","Cancha de softbol",
                  "Mesa de ping pong","Back stop","Andadores","Gradas","Ejercitadores","Ciclov&iacute;a","Gimnasio","Promotor deportivo","Porter&iacute;as",
                  "Tableros","Aros","Losa","Pintura");
$acentos=array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;");
$sinacentos=array("a","e","i","o","u","n");
    
foreach ($instalaciones as $k=>$v) {
    $b=explode(' ',$v);
    $a=strtolower($b[0]);
    $a=str_replace($acentos, $sinacentos, $a);
    if($v=="Cajones de estacionamiento"){
        echo '<label><span>'.$v.'</span>Cantidad: <input type="text" name="ccajones">Faltante: <input type="text" name="fcajones"></label>';
    }
    elseif($v=="Canasta de reciclaje"){
        echo '<label><span>'.$v.'</span><input type="radio" name="canasta" id="canasta" value="1"><label class="white-pinked" for="canasta">S&iacute;</label><input type="radio" id="canastan" name="canasta" value="2"><label class="white-pinked" for="canastan">No</label></label>';
    }
    else{
        echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'"><input type="radio" name="'.$a.'" value="1"><input type="radio" name="'.$a.'" value="2"><input type="radio" name="'.$a.'" value="3"><input type="text" name="f'.$a.'"></label>';
    }
}
echo '<h2>&Aacute;rea esparcimiento</h2>';
foreach ($esparcimiento as $k=>$v) {
    $b=explode(' ',$v);
    $a=strtolower($b[0]);
    $a=str_replace($acentos, $sinacentos, $a);
    echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'"><input type="radio" name="'.$a.'" value="1"><input type="radio" name="'.$a.'" value="2"><input type="radio" name="'.$a.'" value="3"><input type="text" name="f'.$a.'"></label>';
}
echo '<h2>&Aacute;rea de deportiva</h2>';
foreach ($deportiva as $k=>$v) {
    $b=explode(' ',$v);
    if($b[0]=="Cancha"){
        $a=strtolower($b[2]);
    }
    else{
       $a=strtolower($b[0]); 
    }
    $a=str_replace($acentos, $sinacentos, $a);
    if($v=="Gimnasio"){
        echo '<label><span>'.$v.'</span><input type="radio" name="gimnasio" id="gimnasio" value="1"><label class="white-pinked" for="gimnasio">S&iacute;</label><input type="radio" id="gimnasion" name="gimnasio" value="2"><label class="white-pinked" for="gimnasion">No</label></label>';
    }
    elseif($v=="Promotor deportivo"){
        echo '<label><span>'.$v.'</span>Cu&aacute;ntos Promotores: <input type="text" name="promotores">Cu&aacute;ntos deportes: <input type="text" name="deportes"></label>';
    }
    else{
        echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'"><input type="radio" name="'.$a.'" value="1"><input type="radio" name="'.$a.'" value="2"><input type="radio" name="'.$a.'" value="3"><input type="text" name="f'.$a.'"></label>';
    }
}
echo '<h2>&Aacute;rea Verde</h2>
<label class="chico">
    <span>C&eacute;sped: </span><input type="radio" name="cesped" id="cespeda" value="1"><label class="white-pinky" for="cespeda">&Aacute;rea verde</label><input type="radio" id="cespeds" name="cesped" value="2"><label class="white-pinky" for="cespeds">Sint&eacute;tico</label><input type="radio" id="cespedd" name="cesped" value="3"><label class="white-pinky" for="cespedd">Deportivo</label>
</label>
<label class="chico">
    <span>Arboles: </span><input type="text" name="carboles" placeholder="Cant" ><input type="radio" name="arboles" id="arbolesc" value="1"><label class="white-pinky" for="arbolesc">Chico</label><input type="radio" id="arbolesm" name="arboles" value="2"><label class="white-pinky" for="arbolesm">Mediano</label><input type="radio" id="arbolesg" name="arboles" value="3"><label class="white-pinky" for="arbolesg">Grande</label><input type="text" name="farboles" placeholder="Falta" >
</label class="chico">
<label>
    <span>Arbusto: </span><input type="radio" name="arbusto" id="arbustoc" value="1"><label class="white-pinky" for="arbustoc">Chico</label><input type="radio" id="arbustog" name="arbusto" value="2"><label class="white-pinky" for="arbustog">Grande</label>
</label class="chico">
<label>
    <span>Sistema de riego: </span><input type="radio" name="riego" id="riegog" value="1"><label class="white-pinky" for="riegog">Por goteo</label><input type="radio" id="riegoa" name="riego" value="2"><label class="white-pinky" for="riegoa">Automatizado</label> 
</label>
<div align="center"><input class="button" type="button" value="Guardar" name="guardar_check" onclick="validar(5);"></div>
</div></div>
<div id="screen6"><div class="white-pink">
<label>
    <span>Nombre del evento: </span><input type="text" name="nom_evento"/>
</label>
<label>
    <span>Fecha del evento: </span><input type="text" readonly id="datepicker" value="'.date("Y-m-d").'" name="fecha_evento"/>
</label>
<label>
    <span>Propósito: </span><select name="proposito" id="proposito" onchange="addsel(1);">
    <option value="" selected> -- Seleccione --</option>
    <option value="1">Campa&ntilde;as</option>
    <option value="2">Fondos econ&oacute;micos</option>
    <option value="3">Tejido social</option></select>
</label>
<label>
    <span>Tipo de evento: </span><select name="tipo_evento" id="tipo_evento"><option value="" selected> -- Seleccione --</select>
</label>
<label>
    <span>Personas involucradas(comite): </span><input type="text" name="involucrados_comite">
</label>
<label>
    <span>Personas involucradas(vecinos): </span><input type="text" name="involucrados_vecinos">
</label>
<label>
    <span>Descripcion de actividades:</span><textarea name="actividades"></textarea>
</label>
<label>
    <span>N&uacute;mero de asistentes:</span><input type="text" name="asistentes">
</label>
<label>
    <span>Beneficios obtenidos:</span><textarea name="beneficios"></textarea>
</label>
<label>
    <span>&Aacute;rea de impacto:</span><select name="impacto" id="impacto" onchange="addsel(2);">
    <option value=""> -- Seleccione --</option>
    <option value="1">Servicios p&uacute;blicos</option>
    <option value="2">Mobiliarios de parques</option>
    <option value="3">Canchas deportivas</option>
    <option value="4">Espacios de convivencia social</option>
    <option value="5">Elementos urbanos</option>
    </select>
</label>
<label>
    <span>Descripción área de impacto:</span><select name="descimpacto" id="descimpacto"">
    <option value=""> -- Seleccione --</option>
    </select>
</label>
<label>
    <span>Clave de &eacute;xito:</span><textarea name="clave"></textarea>
</label>
<label>
    <span>Aspectos a mejorar:</span><textarea name="mejorar"></textarea>
</label>
<h2>Inversi&oacute;n</h2>
<label>
    <span>Costo de los recursos y materiales utilizados:</span><input type="text" name="costos">
</label>
<label>
    <span>Ingresos obtenidos por venta de boletos:</span><input type="text" name="boletos">
</label>
<label>
    <span>Ingresos obtenidos por patrocinios:</span><input type="text" name="patrocinios">
</label>
<div align="center"><input class="button" type="button" value="Guardar" name="guardar_experiencia" onclick="validar(6);"></div>
</div></div>
<div id="screen8"><div class="white-pink">
<label>
    <span>Fecha: </span><input type="text" readonly id="datepicker2" value="'.date("Y-m-d").'" name="fecha_asistencia"/>
</label>
<label>
    <span class="asists">Nombre</span><span class="asists" style="text-align:left;">Asisti&oacute;</span><span class="asists">&nbsp;</span>
</label>';
$sql01="select id from comite_parque where cve_parque='".$_POST['parque']."'";
$res01=mysql_query($sql01);
$row01=mysql_fetch_array($res01);
$sql02="select id, nombre from comite_miembro where cve_comite='".$row01['id']."'";
$res02=mysql_query($sql02);
$i=1;
while($row02=mysql_fetch_array($res02)){
    echo '<label>
        <span>'.$row02['nombre'].'</span><input type="checkbox" value="'.$row02['id'].'" name="asist['.$i.']">
    </label>';
    $i++;
}
echo '<div align="center"><input class="button" type="button" value="Guardar" name="guardar_asistencia" onclick="validar(7);"></div>
</div></div>
</form>
</div></main>';
$parquesito=$_POST['parque'];
echo '
<script>
$(function() {
    $("[title]").qtip({
        show: "click",
        hide: "click"
    });
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    $( "#datepicker4" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    $( "#datepicker5" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
  });
function addsel(t){
    if(t==1){
        if($("#proposito").val()==1){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Limpieza",
            "2": "Árboles"
            };
        }
        else{
            var newOptions = {"0": "-- Seleccione --",
            "1": "Torneos",
            "2": "Tianguis",
            "3": "Kermes",
            "4": "Dias festivos",
            "5": "Rifa",
            "6": "Evento cultural",
            "7": "Funcion de cine",
            "8": "Carrera pedestre",
            "9": "Noche bohemia",
            };
        }
        var $el = $("#tipo_evento");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        });
    }
    else if(t==2){
        if($("#impacto").val()==1){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Agua",
            "2": "Electricidad"
            };
        }
        else if($("#impacto").val()==2){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Bancas",
            "2": "Jardineras",
            "3": "Juegos infantiles"
            };
        }
        else if($("#impacto").val()==3){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Futbol",
            "2": "Béisbol",
            "3": "Volibol",
            "4": "Otro"
            };
        }
        else if($("#impacto").val()==4){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Palapa",
            "2": "Área de usos múltiples",
            "3": "Asadores",
            "4": "Piñateros"
            };
        }
        else if($("#impacto").val()==5){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Estacionamiento",
            "2": "Rampas",
            "3": "Topes en calles aledañas",
            "4": "Pavimentación de calles aledañas",
            "5": "Nivelación de terreno"
            };
        }
        var $el = $("#descimpacto");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        });
    }
    else if(t==3){
        if($("#compestado").val()==13){';
            $arrjs="";
            foreach($compespecial as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            var $el = $("#compest");
            $el.empty();
            $.each(newOptions, function(value,key) {
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
        else{';
            $arrjs="";
            foreach($compesp as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            var $el = $("#compest");
            $el.empty();
            $.each(newOptions, function(value,key) {
                if(value==1){
                    $el.append($("<option></option>").attr("value", 111).text("Instalaciones"));
                }
                if(value==12){
                    $el.append($("<option></option>").attr("value", 112).text("Deportiva"));
                }
                if(value==30){
                    $el.append($("<option></option>").attr("value", 113).text("Áreas de esparcimiento"));
                }
                if(value==41){
                    $el.append($("<option></option>").attr("value", 114).text("Áreas verdes"));
                }
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
    }
    else if(t==4){
        if($("#compeventosr").val()==84){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Limpieza",
            "2": "Árboles"
            };
        }
        else{
            var newOptions = {"0": "-- Seleccione --",
            "1": "Torneos",
            "2": "Tianguis",
            "3": "Kermes",
            "4": "Dias festivos",
            "5": "Rifa",
            "6": "Evento cultural",
            "7": "Funcion de cine",
            "8": "Carrera pedestre",
            "9": "Noche bohemia",
            };
        }
        var $el = $("#compevent");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        });
    }
    else{
        if($("#state").val()==25){
            var newOptions = {"0": "-- Seleccione --",
            "Culiacán": "Culiacán",
            "Navolato": "Navolato"
            };
        }
        else{
            var newOptions = {"0": "-- Seleccione --"
            };
        }
        var $el = $("#ciudad");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        });
    }
}
function cortatexto(){
    $("#compoera option:selected").text("hola");
}
function validar(n){
    document.getElementsByName("cmd")[0].value=n;
    if(n==1){
        document.getElementsByName("buscarvisita")[0].value=1;
    }
    if(n==6){
        document.getElementsByName("pods_meta__cmb_parque")[0].value=document.getElementsByName("parque")[0].value;
    }
    document.forma.submit();
}
function cambio(s){
    for(m=0;m<9;m++){
        if(s==4){
            $("#parque").hide("slow");
        }
        else{
            $("#parque").show("slow");
        }
        if(m==s){
            $("#screen"+m).show("slow").css("display", "inline");;
        }
        else{
            $("#screen"+m).hide("slow");
        }
    }
}
var totalm=0;
$("input[name^=\'meta_\']").each(function(){
    if($(this).val()>0){
        totalm=parseInt(totalm)+parseInt($(this).val());
    }
});
$("#totalm").text(Math.round(totalm/7));
document.getElementsByName("totalmeta")[0].value=Math.round(totalm/7);';
if($total!=""){
    echo 'document.getElementsByName("totalvis")[0].value='.round($total).';';
}
echo '$("input[name^=\'meta_\']").each(function(){
    $(this).keyup(function(){
        totalm=0;
        $("input[name^=\'meta_\']").each(function(){
            if($(this).val()>0){
                totalm=parseInt(totalm)+parseInt($(this).val());
            }
        });
        $("#totalm").text(Math.round(totalm/7));
        document.getElementsByName("totalmeta")[0].value=Math.round(totalm/7);
        ';
        if($total!=""){
            echo 'document.getElementsByName("totalvis")[0].value='.round($total).';';
        }
        echo '
    });
});
function calcular(){
    var chk_arr =  document.getElementsByName("averdes[]");
    var chklength = chk_arr.length;             
    var c=0;
    var valores = new Array();
    var areasverdes=0;
    var total=0;
    for(k=0;k< chklength;k++)
    {
        if(chk_arr[k].checked == true){
            valores.push(chk_arr[k].value);
            c++;
        }
    } 
    if(c==1){
            areasverdes=17;
    }
    if(c==2){
            if(valores[0]==1 && valores[1]==2){
                    areasverdes=34;
            }
            if(valores[0]==1 && valores[1]==3){
                    areasverdes=35;
            }
            if(valores[0]==2 && valores[1]==3){
                    areasverdes=36;
            }
    }
    if(c==3){
            areasverdes=50;
    }
    var nombres = ["opera","organiza","reunion","estado","instalaciones","ingresadop","eventosr","estaver","gente","respint","orden","limpieza"]
    if($("input[name=\'proyecto\']:checked").val()!=undefined){
        total = total+parseInt($("input[name=\'proyecto\']:checked").val());
    }
    if($("input[name=\'ingresop\']:checked").val()!=undefined){
        total = total+parseInt($("input[name=\'ingresop\']:checked").val());
    }
    if($("input[name=\'mancomunado\']:checked").val()!=undefined){
        total = total+parseInt($("input[name=\'mancomunado\']:checked").val());
    }
    if($("input[name=\'eventos\']:checked").val()!=undefined){
        total = total+parseInt($("input[name=\'eventos\']:checked").val());
    }
    if(document.getElementsByName("tipo_proyecto")[0].value!=""){
        if(document.getElementsByName("tipo_proyecto")[0].value!="0"){
            total= total+40;
        }
    }
    if(document.getElementsByName("formaliza")[0].value!=""){
        if(document.getElementsByName("formaliza")[0].value=="interno"){
            total= total+10;
        }
        else{
            total=total+20;
        }
    }
    for (index = 0; index < nombres.length; ++index) {
        if(document.getElementsByName(nombres[index])[0].value!=""){
            total= total + parseInt(document.getElementsByName(nombres[index])[0].value);
        }
    }
    total = (total+areasverdes)/7;
    if(total<=100){
        if(total<=80){
            if(total<=59){
                document.getElementById("total").style.color = "#FF6565";
            }
            else{
                document.getElementById("total").style.color = "#EEA740";
            }
        }
        else{
            document.getElementById("total").style.color = "#9DC45F";
        }
    }
    document.getElementById("total").innerHTML = Math.round(total);
}
function agregar(num){
    document.getElementById(\'num_miembro\').value++;
    var i = document.getElementById(\'num_miembro\').value;
    var miembro = \'<h2>Miembro \'+ document.getElementById(\'num_miembro\').value + \'</h2><label><span>Nombre Completo:</span><input type="text" id="nombre[\'+ document.getElementById(\'num_miembro\').value + \']" name="nombre[\'+ document.getElementById(\'num_miembro\').value + \']" size="50"/></label><label><span>Fecha de nacimiento:</span><label class="white-pinkt" for="dia[\'+ document.getElementById(\'num_miembro\').value + \']">D&iacute;a</label>&nbsp;<select class="pinked" name="dia[\'+ document.getElementById(\'num_miembro\').value + \']">\';
        for(var e=0;e<=31;e++){
            if(e==0){
                miembro += \'<option value="" selected> -- </option>\';
            }
            else{
                miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
            }
        }
        miembro += \'</select>&nbsp<label class="white-pinkt" for="mes[\'+ document.getElementById(\'num_miembro\').value + \']">Mes</label>&nbsp;<select class="pinked" name="mes[\'+ document.getElementById(\'num_miembro\').value + \']">\';
        for(var e=0;e<=12;e++){
            if(e==0){
                miembro += \'<option value="" selected> -- </option>\';
            }
            else{
                miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
            }
        }
        miembro += \'</select>&nbsp<label class="white-pinkt" for="anio[\'+ document.getElementById(\'num_miembro\').value + \']">A&ntildeo</label>&nbsp<select class="pinked" name="anio[\'+ document.getElementById(\'num_miembro\').value + \']">\';
        for(var e=1909;e<=1998;e++){
            if(e==1909){
                miembro += \'<option value="" selected> -- </option>\';
            }
            else{
                miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
            }
        }
        miembro += \'</select></label><label><span>Sexo:</span><input type="radio" id="masculino[\'+ document.getElementById(\'num_miembro\').value + \']" name="sexo[\'+ document.getElementById(\'num_miembro\').value + \']" value="Masculino"><label class="white-pinked" for="masculino[\'+ document.getElementById(\'num_miembro\').value + \']">Masculino</label><input type="radio" id="femenino[\'+ document.getElementById(\'num_miembro\').value + \']" name="sexo[\'+ document.getElementById(\'num_miembro\').value + \']" value="Femenino"><label class="white-pinked" for="femenino[\'+ document.getElementById(\'num_miembro\').value + \']">Femenino</label>\';
        miembro += \'</label><label><span>Nivel Educativo:</span><select name="educacion[\'+ document.getElementById(\'num_miembro\').value + \']"><option value="" selected> -- Seleccione -- </option>        <option value="primaria">Primaria</option>        <option value="secundaria">Secundaria</option>        <option value="preparatoria">Preparatoria</option>        <option value="profesional">Carrera Profesional</option>        <option value="tecnicos">Estudios T&eacute;cnicos</option></select></label>\';
        miembro += \'<label><span>Rol en el comit&eacute;:</span><select name="rol[\'+ document.getElementById(\'num_miembro\').value + \']"><option value="" selected> -- Seleccione -- </option>        <option value="1">Presidente</option>        <option value="2">Secretario</option>        <option value="3">Tesorero</option>        <option value="4">Vocal</option>        <option value="5">Comunicaci&oacute;n</option><option value="6">Vecino</option></select></label>\';
        miembro += \'<label><span>Tel&eacute;fono:</span><input type="text" name="telefono[\'+ document.getElementById(\'num_miembro\').value + \']"></label>\';
        miembro += \'<label><span>Celular:</span><input type="text" name="celular[\'+ document.getElementById(\'num_miembro\').value + \']"></label>\';
        miembro += \'<label><span>Tiene Facebook?</span><input type="checkbox" class="megusta" name="facebook[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>"Me gusta" a Parques Alegres en Facebook?</span><input type="checkbox" class="megusta" name="megusta[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>Tiene Twitter?</span><input type="checkbox" class="megusta" name="twitter[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>"Sigue" a Parques Alegres en Twitter?</span><input type="checkbox" class="megusta" name="siguemet[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>Tiene Instagram?</span><input type="checkbox" class="megusta" name="instagram[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>"Sigue" a Parques Alegres en Instagram?</span><input type="checkbox" class="megusta" name="siguemei[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';
        miembro += \'<label><span>Correo electr&oacute;nico:</span><input type="text" name="email[\'+ document.getElementById(\'num_miembro\').value + \']"></label>\';
        miembro += \'<label><span>Contacto:</span><input type="radio" value="1" id="cont_a[\'+ document.getElementById(\'num_miembro\').value + \']" name="contacto[\'+ document.getElementById(\'num_miembro\').value + \']" onclick="contacto(\'+ document.getElementById(\'num_miembro\').value + \');"><label class="white-pinked" for="cont_a[\'+ document.getElementById(\'num_miembro\').value + \']">S&iacute;</label><input type="radio" value="0" id="cont_b[\'+ document.getElementById(\'num_miembro\').value + \']" name="contacto[\'+ document.getElementById(\'num_miembro\').value + \']"><label class="white-pinked" for="cont_b[\'+ document.getElementById(\'num_miembro\').value + \']">No</label></label>\';
        $("#miembros").append(miembro);
    }
    function contacto(i){
        for(var e=1;e<=document.getElementById(\'num_miembro\').value;e++){
            if(e!=i){
                $("input[name=\'contacto["+e+"]\']").attr(\'checked\', \'checked\');
            }        
        }
        document.getElementsByName("telefono[0]")[0].value=document.getElementsByName("telefono["+i+"]")[0].value;
        document.getElementsByName("celular[0]")[0].value=document.getElementsByName("celular["+i+"]")[0].value;
        document.getElementsByName("email[0]")[0].value=document.getElementsByName("email["+i+"]")[0].value;
    }

</script>
<script>
    var slideout = new Slideout({
	"panel": document.getElementById("panel"),
	"menu": document.getElementById("menu"),
	"padding": 256,
	"tolerance": 70
    });
    document.querySelector(".toggle-button").addEventListener("click", function() {
	slideout.toggle();
    });
</script>';

if($_POST['cmd']==5){
    if($_POST['parque']){
        foreach ($instalaciones as $k=>$v) {
            $b=explode(' ',$v);
            $a=strtolower($b[0]);
            $a=str_replace($acentos, $sinacentos, $a);
            if($v=="Cajones de estacionamiento"){
                if($_POST['ccajones']!="" || $_POST['fcajones']=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',1,'cajones','".$_POST['ccajones'].", ".$_POST['fcajones']."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
            elseif($v=="Canasta de reciclaje"){
                if($_POST['canasta']!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',1,'canasta','".$_POST['canasta']."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
            else{
                if($_POST['c'.$a]!="" || $_POST[$a]!="" || $_POST['f'.$a]!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',1,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
        }
        foreach ($esparcimiento as $k=>$v) {
            $b=explode(' ',$v);
            $a=strtolower($b[0]);
            $a=str_replace($acentos, $sinacentos, $a);
            if($_POST['c'.$a]!="" || $_POST[$a]!="" || $_POST['f'.$a]!=""){
                $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',2,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";
                //echo $sSQL4.'<br>';
                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
            }
        }
    
        foreach ($deportiva as $k=>$v) {
            $b=explode(' ',$v);
            if($b[0]=="Cancha"){
                $a=strtolower($b[2]);
            }
            else{
               $a=strtolower($b[0]); 
            }
            $a=str_replace($acentos, $sinacentos, $a);
            if($v=="Gimnasio"){
                if($_POST['gimnasio']!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',3,'gimnasio','".$_POST['gimnasio']."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
            elseif($v=="Promotor deportivo"){
                if($_POST['promotores']!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',3,'promotores','".$_POST['promotores']."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
                if($_POST['deportes']!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',3,'deportes','".$_POST['deportes']."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
            else{
                if($_POST['c'.$a]!="" || $_POST[$a]!="" || $_POST['f'.$a]!=""){
                    $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',3,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";
                    //echo $sSQL4.'<br>';
                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
                }
            }
        }
        if($_POST['cesped']!=""){
            $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',4,'cesped','".$_POST['cesped']."')";
            //echo $sSQL4.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
        }
        if($_POST['arboles']!=""){
            $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',4,'arboles','".$_POST['carboles'].",".$_POST['arboles'].",".$_POST['farboles']."')";
            //echo $sSQL4.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
        }
        if($_POST['arbusto']!=""){
            $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',4,'arbusto','".$_POST['arbusto']."')";
            //echo $sSQL4.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
        }
        if($_POST['riego']!=""){
            $sSQL4="INSERT INTO checklist(cve_parque,clasificacion,parametro,data) VALUES ('".$_POST['parque']."',4,'riego','".$_POST['riego']."')";
            //echo $sSQL4.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
        }
    }
    else{
        echo 'No ha seleccionado ningun parque';
    }
}
if($_POST['cmd']==6){
    if($_POST['parque']){
        $mypost = array('post_name' => $_POST['nom_evento'],
        'post_title' => $_POST['nom_evento'],
        'post_status' => 'draft',
        'post_author' => $asesores[$asesor],
        'post_type' => 'experiencia_exitosa',
        'post_date' => date("Y-m-d H:i:s")
        );
        $idpost = wp_insert_post( $mypost , true);
        //echo $idpost;
        if($idpost>0){
            add_post_meta($idpost, '_cmb_parque', $_POST['parque'], true );
            add_post_meta($idpost, '_cmb_event_date', $_POST['fecha_evento'], true );
            add_post_meta($idpost, '_cmb_event_type', $_POST['tipo_evento'], true );
            add_post_meta($idpost, '_cmb_event_proposito', $_POST['proposito'], true );
            add_post_meta($idpost, '_cmb_participants_comite', $_POST['involucrados_comite'], true );
            add_post_meta($idpost, '_cmb_participants_vecinos', $_POST['involucrados_vecinos'], true );
            add_post_meta($idpost, '_cmb_actividades', $_POST['actividades'], true );
            add_post_meta($idpost, '_cmb_asistentes', $_POST['asistentes'], true );
            add_post_meta($idpost, '_cmb_benefits', $_POST['beneficios'], true );
            add_post_meta($idpost, '_cmb_impacto', $_POST['impacto'], true );
            add_post_meta($idpost, '_cmb_success_key', $_POST['clave'], true );
            add_post_meta($idpost, '_cmb_mejorar', $_POST['mejorar'], true );
            add_post_meta($idpost, '_cmb_costos', $_POST['costos'], true );
            add_post_meta($idpost, '_cmb_boletos', $_POST['boletos'], true );
            add_post_meta($idpost, '_cmb_patrocinios', $_POST['patrocinios'], true );
            echo 'Experiencia exitosa guardada exitosamente';
        }
        else{
            echo 'Error';
        }
    }
    else{
        echo 'No ha seleccionado ningun parque';
    }
}
if($_POST['cmd']==7){
    if($_POST['parque']){
        for($i=1;$i<=count($_POST['asist']);$i++){
            $sSQL5="INSERT INTO `comite_asistencia`(`cve_comite`, `fecha`,`miembro`) VALUES ('".$row01['id']."','".$_POST['fecha_asistencia']."','".$_POST['asist'][$i]."')";
            //echo $sSQL5.'<br>';
            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);
        }
    }
    else{
        echo 'No ha seleccionado ningun parque';
    }
}
echo '</body>
</html>';
?>