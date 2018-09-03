<?php

ini_set('display_errors',1);

ini_set('error_reporting',E_ERROR);

require_once('../wp-config.php');

require('fpdf17/fpdf.php');

date_default_timezone_set("America/Mazatlan");

if (is_user_logged_in()){

    $user = wp_get_current_user();

    

    $subtipo=array(1=>array(1=>"Torneos",2=>"Tianguis",3=>"Kermesse",4=>"Días Festivos",5=>"Cooperación vecinal",6=>"Rifa",7=>"Kermesse cultural",8=>"Función de cine",9=>"Carrera pedestre",10=>"Noche bohemia",11=>"Visita al MIA",12=>"Visita a Jardín Botánico",13=>"Activación Santa Ana",14=>"Activación Trizalet"),2=>array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda"),3=>array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua"),4=>array(1=>"Honorable Ayuntamiento",2=>"Empresa"),5=>array(1=>"Orden"));

    $tipoevento=array(1=>"Generar ingresos y tejido social",2=>"Crear y mantener áreas verdes", 3=>"Organización", 4=>"Gestión", 5=>"Orden");

    $param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",

                      11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");

    $nomparametros=array(1=>"El comité opera con",2=>"¿Cómo está formalizado?",3=>"Cuenta con buena organización",4=>"Existen reuniones",5=>"Tienen proyectos en proceso",

                         6=>"Cuenta con Visión de Espacio",62=>"Cuenta con Proyecto de Diseño",63=>"Cuenta con Proyecto Ejecutivo",7=>"Estado actual de las instalaciones",8=>"Hay instalaciones en la mayoria del espacio",

                         9=>"Tienen fuente de ingresos permanentes",10=>"Es suficiente lo ingresado para operar bien",11=>"Tienen cuenta mancomunada",

                         12=>"Hay eventos con regularidad",13=>"Cuentan con un calendario anual de actividades",14=>"Cuenta con",15=>"Se encuentra en buen estado",

                         16=>"Porcentaje de afluencia sobre lo existente",17=>"Las instalaciones se respetan",18=>"Se cuenta con un reglamento de orden",19=>"Se mantiene limpio");

    $inparametros=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"vespacio",62=>"disenio",63=>"ejecutivo",7=>"estado",8=>"instalaciones",9=>"ingresop",10=>"ingresadop",

                      11=>"mancomunado",12=>"eventosr",13=>"eventos",14=>"averdes",15=>"estaver",16=>"gente",17=>"respint",18=>"orden",19=>"limpieza");

    $statuscom=array(1=>"Pendiente",2=>"Postergado",3=>"Cumplido",4=>"No cumplido");
    $compro_detalle=array(1=>array(1=>"Reestructuración del comité"),
    	2=>array(2=>"Formalizar el comité ante el ayuntamiento"),
    	3=>array(3=>"Elaborar por escrito las políticas de trabajo del comité",4=>"Plan de trabajo (por lo menos para un periodo de seis meses)"),
    	4=>array(5=>"Calendario de reuniones del comité. (Se sugiere una cada 30 días)",6=>"Programa de reuniones vecinales (se sugiere una cada tres meses)"),
    	5=>array(7=>"Verificar el estatus legal del parque"),
    	6=>array(8=>"Elaborar la visión del espacio"),
    	62=>array(9=>"Gestionar el diseño arquitectónico"),
    	63=>array(10=>"Gestionar el proyecto ejecutivo"),
    	7=>array(11=>"Mantenimiento",12=>"Rehabilitación",13=>"Remodelación",14=>"Nueva adquisición"),
    	8=>array(14=>"Nueva adquisición"),
    	9=>array(15=>"Programa de pago vecinal para mantenimineto del parque",16=>"Organización cooperación vecinal pro rehabilitación del parque",17=>"Organización de cooperación vecinal pro - adquisición infraestructura",18=>"Gestión de recibos deducibles de impuestos",19=>"Torneos deportivos",20=>"Celebración de días festivos",21=>"Rifa",22=>"Evento cultural",23=>"Función de cine",24=>"Carrera pedestre","Noche bohemia"),
    	10=>array(25=>"Informe de ingresos y egresos",26=>"Generar recibos de ingresos",27=>"Archivar comprobante de gastos"),
    	11=>array(28=>"Abrir cuenta mancomunada"),
    	12=>array(84=>"Campañas",85=>"Fondos económicos",86=>"Tejido social"),
	    13=>array(35=>"Calendario anual de eventos",36=>"Expediente de evidencias fotográficas de eventos"),
	    14=>array(37=>"Gestionar árboles en Ayuntamiento y Parque Botánico",38=>"Gestionar plantas de ornanto en Ayuntamiento",39=>"Siembra de árboles",40=>"Colocación de cesped natural y/o sintético"),
	    15=>array(41=>"Protección para árboles pequeños",42=>"Campaña de limpieza",43=>"Ferlilizar árboles con componentes orgnánicos",44=>"Nomeclatura de la vegetación en el parque",45=>"Adquisición de herramientas de limpieza",46=>"Fumigación",47=>"Instalar sistema de riego",48=>"Adquisición de herramientas de jardinería",49=>"Poda de árboles y/o cesped"),
	    16=>array(50=>"Promotor deportivo",51=>"Clases y/o talleres deporivos",52=>"Futbol",53=>"Basquetbol",54=>"Zumba",55=>"Clases y/o talleres culturales",56=>"Pintura",57=>"Danza",58=>"Clubes con diversos objetivos para niños, adolescentes y adultos",59=>"Club de ciclismo",60=>"Campaña de 'invita a un vecino'",61=>"Torneos",62=>"Deportivo",63=>"Cultural",64=>"Artístico",65=>"Comité de niños",66=>"Invitación a Voluntariado",67=>"Curso de verano deportivo o cultural",68=>"Ciclo de pláticas y conferencias para Padres, Adolescentes y niños",69=>"Campañmentos",70=>"Murales"),
	    17=>array(71=>"Gestión de vigilancia para el parque",72=>"Delimitación de espacios",73=>"Contratar velador"),
	    18=>array(74=>"Creación de reglamento del parque",75=>"Instalación de reglamento de parque",76=>"Instalación de señalización",77=>"Botón de pánico",78=>"Instalación de Timer para control de recursos"),
	    19=>array(79=>"Jornada de limpieza",80=>"Contratar jardinero"));
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

    $roles_comite=array(1=>"Presidente",2=>"Secretario",3=>"Tesorero",4=>"Vocal",5=>"Comunicaci&oacute;n",6=>"Vecino");

    //if($_GET['ver']==1){

    	$organizacion_comite=array(1=>2,2=>2,3=>2,4=>2,5=>2,6=>2,7=>1,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1,15=>0);

    /*}else{

    	$organizacion_comite=array(1=>2,2=>2,3=>2,4=>2,5=>2,6=>2,7=>1,8=>1,9=>1,10=>1,11=>1,12=>1,13=>1,14=>1);

    }*/

    $sqlas="SELECT stat FROM asesores WHERE ID='".trim($user->ID)."'";

    $resas=mysql_query($sqlas);

    $rowas=mysql_fetch_array($resas);

    $stat=$rowas['stat'];

    //$asesores=array(13563=>1478, 14602=>1536, 24066=>1537, 26390=>1538, 29384=>1539, 32487=>1540, 47689=>1541, 48239=>1542, 50205=>1543, 51492=>1544, 51954=>1545,

    //                56838=>1546, 62493=>1547, 65093=>1548, 80139=>1549, 80859=>1550, 84375=>1551, 87396=>1552);

    //Para agregar un nuevo asesor se necesita el ID del usuario registrado en wordpress y se pone el indice de 5 numeros aleatorios.

    //Pendiente para el asesor que tome la cartera de Javier Villa 47689=>1512

    //$asesores=array(13563=>1478, 14602=>168, 24066=>38, 26390=>1225, 29384=>1232, 32487=>1438, 48239=>59, 50205=>1515, 51492=>11,56838=>1581, 62493=>1582, 65093=>1583, 80139=>1584, 80859=>1585, 84375=>1586, 87396=>1587,13728=>1824);

    // Se sustituye el arreglo por la tabla asesores.

    if($_POST['cmd']==99){

        $sql99="select key1.post_title as experiencia, key2.meta_value as fecha, key3.meta_value as video, key4.meta_value as tipo, key5.meta_value as proposito,

        key6.meta_value as comite, key7.meta_value as vecinos, key8.meta_value as actividades, key9.meta_value as asistentes, key10.meta_value as beneficios,

        key11.meta_value as impacto, key12.meta_value as cantidad, key13.meta_value as descripcion, key14.meta_value as descripcion2, key15.meta_value as llave,

        key16.meta_value as mejorar, key17.meta_value as contacto, key18.meta_value as costos, key19.meta_value as boletos, key20.meta_value as patrocinios from wp_posts key1

        LEFT JOIN wp_postmeta key2 ON key1.id = key2.post_id AND key2.meta_key = '_cmb_event_date'

        LEFT JOIN wp_postmeta key3 ON key1.id = key3.post_id AND key3.meta_key = '_cmb_video'

        LEFT JOIN wp_postmeta key4 ON key1.id = key4.post_id AND key4.meta_key = '_cmb_event_type'

        LEFT JOIN wp_postmeta key5 ON key1.id = key5.post_id AND key5.meta_key = '_cmb_event_proposito'

        LEFT JOIN wp_postmeta key6 ON key1.id = key6.post_id AND key6.meta_key = '_cmb_participants_comite'

        LEFT JOIN wp_postmeta key7 ON key1.id = key7.post_id AND key7.meta_key = '_cmb_participants_vecinos'

        LEFT JOIN wp_postmeta key8 ON key1.id = key8.post_id AND key8.meta_key = '_cmb_actividades'

        LEFT JOIN wp_postmeta key9 ON key1.id = key9.post_id AND key9.meta_key = '_cmb_asistentes'

        LEFT JOIN wp_postmeta key10 ON key1.id = key10.post_id AND key10.meta_key = '_cmb_benefits'

        LEFT JOIN wp_postmeta key11 ON key1.id = key11.post_id AND key11.meta_key = '_cmb_impacto'

        LEFT JOIN wp_postmeta key12 ON key1.id = key12.post_id AND key12.meta_key = '_cmb_cant_impacto'

        LEFT JOIN wp_postmeta key13 ON key1.id = key13.post_id AND key13.meta_key = '_cmb_desc_impacto'

        LEFT JOIN wp_postmeta key14 ON key1.id = key14.post_id AND key14.meta_key = '_cmb_desc_impacto2'

        LEFT JOIN wp_postmeta key15 ON key1.id = key15.post_id AND key15.meta_key = '_cmb_success_key'

        LEFT JOIN wp_postmeta key16 ON key1.id = key16.post_id AND key16.meta_key = '_cmb_mejorar'

        LEFT JOIN wp_postmeta key17 ON key1.id = key17.post_id AND key17.meta_key = '_cmb_contacto_exp'

        LEFT JOIN wp_postmeta key18 ON key1.id = key18.post_id AND key18.meta_key = '_cmb_costos'

        LEFT JOIN wp_postmeta key19 ON key1.id = key19.post_id AND key19.meta_key = '_cmb_boletos'

        LEFT JOIN wp_postmeta key20 ON key1.id = key20.post_id AND key20.meta_key = '_cmb_patrocinios' where id='".$_POST['experiencia']."'";

        $res99=mysql_query($sql99);

        $row99=mysql_fetch_array($res99);

        echo $row99['experiencia'].'|'.$row99['fecha'].'|'.$row99['video'].'|'.$row99['tipo'].'|'.$row99['proposito'].'|'.$row99['comite'].'|'.$row99['vecinos'].'|'.$row99['actividades'].'|'.$row99['asistentes'].'|'.$row99['beneficios'].'|'.$row99['impacto'].'|'.$row99['cantidad'].'|'.$row99['descripcion'].'|'.$row99['descripcion2'].'|'.$row99['llave'].'|'.$row99['mejorar'].'|'.$row99['contacto'].'|'.$row99['costos'].'|'.$row99['boletos'].'|'.$row99['patrocinios'];

        exit();

    }

    //if($stat>0){

        if($_POST['cmd']==88){

            $fecha=split("-",$_POST['fecha']);

            if($_POST['tipo_visita']=="seguimiento"){

                $sql88="select v.cve,v.cve_parque,v.fecha_visita,c.tipo_visita from wp_comites_parques v INNER JOIN wp_visitascom_parques c ON v.cve=c.cve_visita WHERE v.cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31' AND (c.tipo_visita=2 or c.tipo_visita=4)";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)>0){

                    $siono='nope|No puedes guardar más de una visita de seguimiento o después de una visita de prospectación en el mismo mes.';

                }

                else{

                    $sql89="select * from comite_parque cp INNER JOIN comite_miembro cm ON cp.ID=cm.cve_comite WHERE cp.cve_parque='".$_POST['parque']."' AND cm.contacto=1";

                    $res89=mysql_query($sql89);

                    if(mysql_num_rows($res89)>0){

                        $siono='ok';

                    }

                    else{

                        $siono='nope|No puedes guardar una visita de seguimiento sin un miembro de comite designado como contacto.';

                    }

                }

            }

            elseif($_POST['tipo_visita']=="reforzamiento"){

                $sql89="select * from comite_parque cp INNER JOIN comite_miembro cm ON cp.ID=cm.cve_comite WHERE cp.cve_parque='".$_POST['parque']."' AND cm.contacto=1";

                $res89=mysql_query($sql89);

                if(mysql_num_rows($res89)>0){

                    $siono='ok';

                }

                else{

                    $siono='nope|No puedes guardar una visita de reforzamiento sin un miembro de comite designado como contacto.';

                }

                /*$sql88="select id,cve_parque,fecha_visita from wp_visitas_reforzamiento WHERE cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31'";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)<2){

                    $siono='ok';

                }

                else{

                    $siono='nope|No puedes guardar más de dos visitas de reforzamiento en el mismo mes.';

                }*/

            }

            elseif($_POST['tipo_visita']=="standby"){

                $siono='ok';

            }

            else{

                $sql88="select v.cve,v.cve_parque,v.fecha_visita,c.tipo_visita,v.opera from wp_comites_parques v INNER JOIN wp_visitascom_parques c ON v.cve=c.cve_visita WHERE v.cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31' AND (c.tipo_visita=2 or c.tipo_visita=4)";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)>0){

                    while($row88=mysql_fetch_array($res88)){

                        if($row88['tipo_visita']==4){

                            $siono='nope|No puedes guardar más de una visita de prospectación en el mismo mes.';

                        }

                        else{

                            if($row88['opera']!=0){

                                $siono='nope|No puedes guardar una visita de prospectación si el comite esta estructurado en la de seguimiento.';

                            }

                            else{

                                $siono='ok';

                            }

                        }

                    }

                }

                else{

                    $siono='ok';

                }

            }

            echo $siono;

            exit();

        }

    /*}

    else{

        if($_POST['cmd']==88){

            $fecha=split("-",$_POST['fecha']);

            if($_POST['tipo_visita']=="seguimiento"){

                $sql88="select v.cve,v.cve_parque,v.fecha_visita,c.tipo_visita from wp_comites_parques v INNER JOIN wp_visitascom_parques c ON v.cve=c.cve_visita WHERE v.cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31' AND (c.tipo_visita=2 or c.tipo_visita=4)";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)>0){

                    $siono='nope|No puedes guardar más de una visita de seguimiento o después de una visita de prospectación en el mismo mes.';

                }

                else{

                    $siono='ok';

                }

            }

            elseif($_POST['tipo_visita']=="reforzamiento"){

                $siono='ok';

                /*$sql88="select id,cve_parque,fecha_visita from wp_visitas_reforzamiento WHERE cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31'";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)<2){

                    $siono='ok';

                }

                else{

                    $siono='nope|No puedes guardar más de dos visitas de reforzamiento en el mismo mes.';

                }*/

    /*        }

            else{

                $sql88="select v.cve,v.cve_parque,v.fecha_visita,c.tipo_visita,v.opera from wp_comites_parques v INNER JOIN wp_visitascom_parques c ON v.cve=c.cve_visita WHERE v.cve_parque='".$_POST['parque']."' AND fecha_visita>='".$fecha[0]."-".$fecha[1]."-01' AND fecha_visita<='".$fecha[0]."-".$fecha[1]."-31' AND (c.tipo_visita=2 or c.tipo_visita=4)";

                $res88=mysql_query($sql88);

                if(mysql_num_rows($res88)>0){

                    while($row88=mysql_fetch_array($res88)){

                        if($row88['tipo_visita']==4){

                            $siono='nope|No puedes guardar más de una visita de prospectación en el mismo mes.';

                        }

                        else{

                            if($row88['opera']!=0){

                                $siono='nope|No puedes guardar una visita de prospectación si el comite esta estructurado en la de seguimiento.';

                            }

                            else{

                                $siono='ok';

                            }

                        }

                    }

                }

                else{

                    $siono='ok';

                }

            }

            echo $siono;

            exit();

        }

    }*/

    if($_POST['cmd']==101){

        $sql101="select * from checklist where cve_parque='".$_POST['parque']."' AND clasificacion='".$_POST['categoria']."' AND parametro='".$_POST['subcategoria']."' order by fecha DESC limit 1";

        $res101=mysql_query($sql101);

        if(mysql_num_rows($res101)>0){

            $row101=mysql_fetch_array($res101);

            $dat=explode(",",$row101['data']);

            if(count($dat)>2){

                echo trim($dat[2]);

            }

            else{

                echo 'no tiene';

            }

        }

        else{

            echo 'no tiene';

        }

        exit();

    }                                

    $i=0;

    $id_post=(int)$_POST["parque"];

    if($_POST['cmd']==4){

        if($id_post>0){

            update_post_meta($id_post, '_parque_vialidad_prin', $_POST['vialidadprin'] );

            update_post_meta($id_post, '_parque_vialidad1', $_POST['vialidad1'] );

            update_post_meta($id_post, '_parque_vialidad2', $_POST['vialidad2'] );

            update_post_meta($id_post, '_parque_vialidad_pos', $_POST['vialidadpos'] );

            update_post_meta($id_post, '_parque_tipoasentamiento', $_POST['tipoasentamiento'] );

            update_post_meta($id_post, '_parque_nomasentamiento', $_POST['nomasentamiento'] );

            update_post_meta($id_post, '_parque_desc_ubic', $_POST['descubic'] );

            update_post_meta($id_post, '_parque_sec', $_POST['sector'] );

            update_post_meta($id_post, '_parque_zona', $_POST['zona'] );

            update_post_meta($id_post, '_parque_nivel', $_POST['nivel'] );

            update_post_meta($id_post, '_parque_regimen', $_POST['regimen'] );

            update_post_meta($id_post, '_parque_legal', $_POST['legal'] );

            update_post_meta($id_post, '_parque_tipo', $_POST['tipo'] );

            update_post_meta($id_post, '_parque_estado', $_POST['state'] );

            update_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'] );

            update_post_meta($id_post, '_parque_localidad', $_POST['localidad'] );

            if($_POST['apoyado']==1){

                update_post_meta($id_post, '_parque_seg', 1);    

            }

            else{

                update_post_meta($id_post, '_parque_seg', 0);

            }

            update_post_meta($id_post, '_parque_obs', $_POST['obsgenerales'] );

            echo 'Parque guardado exitosamente';

        }

        else{

            $my_post = array('post_name' => $_POST['nom_parque'],

            'post_title' => $_POST['nom_parque'],

            'post_status' => 'publish',

            'post_author' => trim($user->ID),

            'post_type' => 'parque',

            'post_date' => date("Y-m-d").' 00:00:00'

            );

            $id_post = wp_insert_post( $my_post );

            if($id_post>0){

                /*add_post_meta($id_post, '_parque_ubic', $_POST['ubicacion'], true );

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

                */

                add_post_meta($id_post, '_parque_vialidad_prin', $_POST['vialidadprin'], true );

                add_post_meta($id_post, '_parque_vialidad1', $_POST['vialidad1'], true );

                add_post_meta($id_post, '_parque_vialidad2', $_POST['vialidad2'], true );

                add_post_meta($id_post, '_parque_vialidad_pos', $_POST['vialidadpos'], true );

                add_post_meta($id_post, '_parque_tipoasentamiento', $_POST['tipoasentamiento'], true );

                add_post_meta($id_post, '_parque_nomasentamiento', $_POST['nomasentamiento'], true );

                add_post_meta($id_post, '_parque_desc_ubic', $_POST['descubic'], true );

                add_post_meta($id_post, '_parque_sec', $_POST['sector'], true );

                add_post_meta($id_post, '_parque_zona', $_POST['zona'], true );

                add_post_meta($id_post, '_parque_nivel', $_POST['nivel'], true );

                add_post_meta($id_post, '_parque_regimen', $_POST['regimen'], true );

                add_post_meta($id_post, '_parque_legal', $_POST['legal'], true );

                add_post_meta($id_post, '_parque_tipo', $_POST['tipo'], true );

                add_post_meta($id_post, '_parque_estado', $_POST['state'], true );

                add_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'], true );

                add_post_meta($id_post, '_parque_localidad', $_POST['localidad'], true );

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

    }

    

    if ($id_post==0){

            echo '<html><head>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

            //if($_GET['ver']==1){

            	$v2=1;

            /*}

            else{

            	$v2=0;

            }

            if($_GET['ver']==1){*/

                echo '<meta http-equiv="cleartype" content="on">

                <meta name="MobileOptimized" content="320">

                <meta name="HandheldFriendly" content="True">

                <meta name="apple-mobile-web-app-capable" content="yes">

                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

                <title>Sistema Parques Alegres</title>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                <script>

                	function parque(p) {document.forma.parque.value=p;document.forma.submit();}

		            function cambiaraction(q){

		            	if(q==1){

		            		document.forma.action="repexcel.php";

		            		document.getElementsByName("cmd")[0].value="compromisos";

		                    document.forma.submit();

		                    document.forma.action="";

		            	}

		            	else{

		            		document.forma.action="solicitar.php";

		                    document.forma.submit();

		                    document.forma.action="";

		            	}

		            }

		            function camb(i){

		                if(i<0){

		                    $("#perfil").show();

		                    $("#lis_parques").hide();

		                    $("#compromisos").hide();

		                }

		                else{

		                    $("#perfil").hide();

		                    if(i==3){

		                        $("#compromisos").show();

		                    }

		                    else{

		                        $("#compromisos").hide();

		                        $("#lis_parques").show();

		                        if(i==1){

		                            $("#vis_parques").show();

		                            $("#tod_parques").hide();

		                            $("#mej_parques").hide();

		                            $("#med_parques").hide();

		                            $("#mal_parques").hide();

		                        }

		                        else if(i==2){

		                            $("#tod_parques").show();

		                            $("#vis_parques").hide();

		                            $("#mej_parques").hide();

		                            $("#med_parques").hide();

		                            $("#mal_parques").hide();

		                        }

		                        else if(i==4){

		                            $("#tod_parques").hide();

		                            $("#vis_parques").hide();

		                            $("#mej_parques").show();

		                            $("#med_parques").hide();

		                            $("#mal_parques").hide();

		                        }

		                        else if(i==5){

		                            $("#tod_parques").hide();

		                            $("#vis_parques").hide();

		                            $("#mej_parques").hide();

		                            $("#med_parques").show();

		                            $("#mal_parques").hide();

		                        }

		                        else if(i==6){

		                            $("#tod_parques").hide();

		                            $("#vis_parques").hide();

		                            $("#mej_parques").hide();

		                            $("#med_parques").hide();

		                            $("#mal_parques").show();

		                        }

		                        

		                    }

		                }

		            }

		            function swcomp(i){

		                if(i==1){

		                    $("#todos").show();

		                    $("#mes").hide();

		                }

		                else{

		                    $("#todos").hide();

		                    $("#mes").show();

		                }

		            }

		            function check(){

		                $.ajax({url: "notifica.php",

		                data: { cmd: 2, asesor: "'.trim($user->ID).'", fecha: "'.date("Y-m-d").'"},

		                dataType: "text",

		                type: "post",

		                success: function(result){

		                    if(result!="no"){

		                        var res=result.split("|");

		                        $("#message").html("");

		                        var len=res.length;

		                        len=len-1;

		                        for(var i=0;i<len;i++){

		                            var msg=res[i].split("><");

		                            $("#message").append("<p id=\"msg"+msg[0]+"\" class=\"mensaje\">"+msg[1]+"<span style=\"float:right;cursor:pointer;\" onclick=\"leer(\'"+msg[0]+"\');\">Cerrar [x]</span></p>");

		                        }

		                        $("#message").show("slow");

		                    }

		                    else{

		                        $("#message").html("");

		                    }

		                    setTimeout(function(){ check(); }, 5000);

		                }});

		            }

		            function leer(msg){

		                $.ajax({url: "notifica.php",

		                data: { cmd: 3, cve_msg: msg},

		                dataType: "text",

		                type: "post",

		                success: function(result){

		                    if(result!="no"){

		                        $("#msg"+msg).hide("slow");

		                    }

		                }});

		            }

		            $(function() {

		                check();

		                var calif=$("#calif").text();

		                $({someValue: 0}).animate({someValue: calif}, {

		                    duration: 2000,

		                    easing:"swing", // can be anything

		                    step: function() { // called on every step

		                        $("#calif").text(Math.round(this.someValue));

		                    }

		                });

		                var rendi=$("#rendi").text();

		                $({someValue: 0}).animate({someValue: rendi}, {

		                    duration: 2000,

		                    easing:"swing", // can be anything

		                    step: function() { // called on every step

		                        $("#rendi").text(Math.round(this.someValue));

		                    }

		                });

		                var visi=$("#visi").text();

		                $({someValue: 0}).animate({someValue: visi}, {

		                    duration: 2000,

		                    easing:"swing", // can be anything

		                    step: function() { // called on every step

		                        $("#visi").text(Math.round(this.someValue)+"%");

		                    }

		                });

		                var comi=$("#comi").text();

		                $({someValue: 0}).animate({someValue: comi}, {

		                    duration: 2000,

		                    easing:"swing", // can be anything

		                    step: function() { // called on every step

		                        $("#comi").text(Math.round(this.someValue));

		                    }

		                });

		            });

	            </script>

	            <style>

		        span{

	                font-family: georgia;

	                color: #727272;

	            }

	            ul{

	                margin-bottom:20px;

	                margin-left:20px;

	                margin-top:10px;

	                overflow:hidden;

	            }

	            li{

	                line-height:1.5em;

	                float:left;

	                display:inline;

	                width:100%;

	            }

	            .doble li{

	                width:50%;

	            }

	            .triple li{

	                width:33.3%;

	            }

	            a:link {

	                text-decoration:none;

	                color: #0074a2;

	            }

	            a:visited {

	                text-decoration:none;

	                color: #0074a2;

	            }

	            a:hover {

	                text-decoration:underline;

	                color: #FF704D;

	            }

	            a:active {

	                text-decoration:underline;

	                color: #FF704D;

	            }

	            body{

                    margin:0;

                }

                #message{

                    position:absolute;

                    left:6%;

                    z-index:1;

                }

                .mensaje{

                    -webkit-border-radius: 10px;

                    -moz-border-radius: 10px;

                    border-radius: 10px;

                    display:block;

                    margin-top:2px;

                    margin-bottom:3px;

                    background:white;

                    font-weight:bold;

                    font-size:14px;

                    padding-left:10px;

                    padding-top:2px;

                    color:#727272;

                    vertical-align:middle;

                    width:400px;

                    min-height:30px;

                    border: 1px solid gray;

                }

                .mensaje span{

                    font-size:12px;

                }

                .mensaje span:hover{

                    color: green;

                    text-decoration:underline;

                }

                #perfil{

                	margin-left: auto;

    				margin-right: auto;

                	max-width:1000px;

                    width:100%;

                    height:100%;

                }

                .mitad{

                    width:39%;

                    display:inline-block;

                    vertical-align:top;

                }

                .linarb{

                    width:50%;

                    height:15%;

                    float:left;

                }

                .compend{

                    line-height:25px;

                }

                .listpa{

                    line-height:15px;

                }

                .toppar{

                    font-size:15px;

                }

                .round1{

                    -webkit-border-radius: 50%;

                    -moz-border-radius: 50%;

                    border-radius: 50%;

                    width:130px;

                    height:130px;

                }

                .green{

                    border: 4px solid #b8df84;

                }

                .blue{

                    border: 4px solid #8fa9e4;

                }

                .yellow{

                    border: 4px solid #bd8e00;

                }

                .red{

                    border: 4px solid #99432a;

                }

                .big{

                    line-height:45px;

                    font-size:25px;

                }

                .small{

                    line-height:11px;

                    font-size:9px;

                }

                .CSSTableGenerator {

                    margin:0px;padding:0px;

                    width:99%;

                    box-shadow: 10px 10px 5px #888888;

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

                .CSSTableGenerator tr:first-child:hover td{

                        background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );

                        background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );

                        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

                

                        background-color:#5fbf00;

                }

                .CSSTableGenerator tr:first-child td:first-child{

                        border-width:0px 0px 1px 0px;

                }

                .CSSTableGenerator tr:first-child td:last-child{

                        border-width:0px 0px 1px 1px;

                }

                .bgtop{

                	display:none;

                	width:100%;

                }

                .bgbot{

                	display:none;

                }

                .button {

				    background-color: #9DC45F;

				    border-radius: 5px;

				    -webkit-border-radius: 5px;

				    -moz-border-border-radius: 5px;

				    border: none;

				    padding: 10px 25px 10px 25px;

				    color: #FFF;

				    text-shadow: 1px 1px 1px #949494;

				}

				.button:hover {

				    background-color:#80A24A;

				}

				.button:active {

				    position:relative;

				    top:1px;

				}

                @media screen and (max-width: 800px){

                    #perfil{

                        width:100%;

                    }

                    .bgtop{

	                	display:block;

	                }

                    .bgbot{

                    	display:block;

                    	position:absolute;

                    	bottom:0px;

                    	width:100%;

                    }

                }

                @media screen and (max-width: 500px){

                	.round1{

	                    width:90px;

	                    height:90px;

	                }

                    .bgtop{

                		display:block;

                	}

                	.bgbot{

                    	display:block;

                    	position:relative;

                    	bottom:0px;

                    	width:100%;

                    }

                    a{

                        font-size:10px;

                    }

                    .compend{

                        line-height:10px;

                    }

                    .listpa{

                        line-height:10px;

                    }

                    .toppar{

                        font-size:10px;

                    }

                    .green{

	                    border: 2px solid #b8df84;

	                }

	                .blue{

	                    border: 2px solid #8fa9e4;

	                }

	                .yellow{

	                    border: 2px solid #bd8e00;

	                }

	                .red{

	                    border: 2px solid #99432a;

	                }

                    .big{

                        line-height:22px;

                        font-size:18px;

                    }

                    .small{

                        line-height:6px;

                        font-size:5px;

                    }

                }

	            </style>

	            </head><body>

	            <div id="perfil">

	            	<img src="background-top.png" class="bgtop">

                    <img src="imagenes/campana.png" align="left" style="width:50px;"><div id="message" style="display:inline;"></div>

                    <img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" align="right" style="width:100px;">

                    <div style="clear:both;"></div>';

                    $sql="SELECT display_name FROM wp_users where id='".trim($user->ID)."'";

                    $res=mysql_query($sql);

                    $row=mysql_fetch_array($res);

                    $sql1="SELECT ID, post_title FROM wp_posts where post_author='".trim($user->ID)."' and post_type='parque' and post_status='publish'";

                    $res1=mysql_query($sql1);

                    $malo=0;

                    $medio=0;

                    $bueno=0;

                    $toppe1=$toppe2=$toppe3=100;

                    $topme1=$topme2=$topme3=0;

                    $first=0;

                    $parque1=$parque2=$parque3=$parque4=$parque5=$parque6="";

                    $id1=$id2=$id3=$id4=$id5=$id6="";

                    $parques_asesor=mysql_num_rows($res1);

                    $diasmes=date("t");

                    $diaactual=date('d');

                    $rendimiento=$parques_asesor/$diasmes;

                    $rend=$diaactual*$rendimiento;

                    $totcalif=0;

                    $cm=0;

                    $cf=0;

                    while($row1=mysql_fetch_array($res1)){

                        $sql3="select * from compromisos where cve_parque='".$row1['ID']."' AND estatus='1'";

                        $res3=mysql_query($sql3);

                        if(mysql_num_rows($res3)>0){

                            while($row3=mysql_fetch_array($res3)){

                                $cm++;

                            }

                        }

                        $sql2="select cve_parque, ";

                        foreach($param as $v){

                            $sql2.=$v."+";

                        }

                        $sql2 = substr($sql2, 0, -1);

                        $sql2.=" as calif,opera from wp_comites_parques where cve_parque='".$row1['ID']."' order by fecha_visita DESC, cve DESC limit 1";

                        $res2=mysql_query($sql2);

                        while($row2=mysql_fetch_array($res2)){

                            if($row2['opera']>=7){

                                $cf++;

                            }

                            if(($row2['calif']/7)<60){

                                $malo++;

                                $parquesmalos[$row1['ID']]=$row1['post_title'];

                            }

                            elseif(($row2['calif']/7)<80){

                                $medio++;

                                $parquesmedios[$row1['ID']]=$row1['post_title'];

                            }

                            else{

                                $bueno++;

                                $parquesbuenos[$row1['ID']]=$row1['post_title'];

                            }

                            if($first<1){

                                $topme1=round($row2['calif']/7);

                                $toppe1=round($row2['calif']/7);

                                $parque1=$row1['post_title'];

                                $id1=$row1['ID'];

                                $parque4=$row1['post_title'];

                                $id4=$row1['ID'];

                                $first=1;

                            }

                            else{

                                if($topme1<round($row2['calif']/7)){

                                    $parque3=$parque2;

                                    $parque2=$parque1;

                                    $parque1=$row1['post_title'];

                                    $id3=$id2;

                                    $id2=$id1;

                                    $id1=$row1['ID'];

                                    $topme3=$topme2;

                                    $topme2=$topme1;

                                    $topme1=round($row2['calif']/7);

                                }

                                else{

                                    if($topme2<round($row2['calif']/7)){

                                        $parque3=$parque2;

                                        $parque2=$row1['post_title'];

                                        $id3=$id2;

                                        $id2=$row1['ID'];

                                        $topme3=$topme2;

                                        $topme2=round($row2['calif']/7);

                                    }

                                    else{

                                        if($topme3<round($row2['calif']/7)){

                                            $parque3=$row1['post_title'];

                                            $id3=$row1['ID'];

                                            $topme3=round($row2['calif']/7);   

                                        }

                                    }

                                }

                                if($toppe1>=round($row2['calif']/7)){

                                    $parque6=$parque5;

                                    $parque5=$parque4;

                                    $parque4=$row1['post_title'];

                                    $id6=$id5;

                                    $id5=$id4;

                                    $id4=$row1['ID'];

                                    $toppe3=$toppe2;

                                    $toppe2=$toppe1;

                                    $toppe1=round($row2['calif']/7);

                                }

                                else{

                                    if($toppe2>=round($row2['calif']/7)){

                                        $parque6=$parque5;

                                        $parque5=$row1['post_title'];

                                        $id6=$id5;

                                        $id5=$row1['ID'];

                                        $toppe3=$toppe2;

                                        $toppe2=round($row2['calif']/7);

                                    }

                                    else{

                                        if($toppe3>=round($row2['calif']/7)){

                                            $parque6=$row1['post_title'];

                                            $id6=$row1['ID'];

                                            $toppe3=round($row2['calif']/7);

                                        }

                                    }

                                }

                            }

                            $totcalif=$totcalif+round($row2['calif']/7);

                        }

                    }

                    $totcalif=round($totcalif/$parques_asesor);

                    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

                    $res0=mysql_query($sql0);

                    $c=0;

                    while($row0=mysql_fetch_array($res0)){

                        $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

                        $res000=mysql_query($sql000);

                        if(mysql_num_rows($res000)>0){

                            $c++;

                        }

                    }

                    if(file_exists('imagenes/'.trim($user->ID).'.png')){

                        $foto_asesor=trim($user->ID).'.png';

                    }

                    else{

                        $foto_asesor='asesor.jpg';

                    }

                    echo '<div class="container">

	                    <div class="row">

	                        <div class="col-4 col-sm-3 offset-4 offset-sm-0" style="text-align:center;"><img src="imagenes/'.$foto_asesor.'" style="min-width:80px;width:100%;max-width:120px;"><br><span class="toppar">'.$row['display_name'].'</span>

	                        </div>

	                        <div class="col-12 col-sm-9">

	                        	<center><b>¡Mejores parques!</b></center>

	                        	<div class="row align-items-center">

	                        		<div class="col-3 text-center"><img src="best.png" style="min-width:50px;width:100%;max-width:120px;"></div>

	                    			<div class="col-9 toppar">

	                    				<span style="float:left;">1.- <a href="javascript:parque('.$id1.');">'.$parque1.'</a></span><span style="float:right;">'.$topme1.'</span><br>

                        				<span style="float:left;">2.- <a href="javascript:parque('.$id2.');">'.$parque2.'</a></span><span style="float:right;">'.$topme2.'</span><br>

                        				<span style="float:left;">3.- <a href="javascript:parque('.$id3.');">'.$parque3.'</a></span><span style="float:right;">'.$topme3.'</span>

                        			</div>

	                    		</div>

	                        </div>

	                    </div>

	                    <div class="row align-items-end">

	                        <div class="col-4 col-sm-3 order-2 order-sm-1 text-center">

                    			<img src="arboliwi.jpg" style="min-width:50px;width:85%;max-width:120px;"><br>

                    			<span class="toppar"><a href="#" onclick="camb(1);">Visitar Parques</a><br>

                    			<a href="#" onclick="camb(2);">Lista de Parques</a></span>

                    		</div>

                    		<div class="col-4 col-sm-3 order-3 orser-sm-3 text-center">

                    			<img src="compromisos.png" style="min-width:50px;width:85%;max-width:80px;"><br><span class="toppar"><a href="#" onclick="camb(3);">Compromisos Pendientes</a></span>

                    		</div>

                    		<div class="col-4 col-sm-3 order-4 order-sm-5 text-center">

                    			<img src="tech_support1.png" style="min-width:50px;width:85%;max-width:80px;"><br>

                    			<b><a href="javascript:void(0);" onclick="cambiaraction();">Solicitar una modificación</a></b>

                    		</div>

	                        <div class="col-12 col-sm-9 order-1 order-sm-2">

	                        	<center><b>Parques a mejorar</b></center>

	                        	<div class="row align-items-center">

	                        		<div class="col-3 text-center"><img src="improve.png" style="min-height:100px;max-width:80px;width:100%;max-height:140px;"></div>

	                    			<div class="col-9 toppar">				                        

				                        <span style="float:left;">'.($parques_asesor-2).'.- <a href="javascript:parque('.$id6.');">'.$parque6.'</a></span><span style="float:right;">'.$toppe3.'</span><br>

                        				<span style="float:left;">'.($parques_asesor-1).'.- <a href="javascript:parque('.$id5.');">'.$parque5.'</a></span><span style="float:right;">'.$toppe2.'</span><br>

                        				<span style="float:left;">'.$parques_asesor.'.- <a href="javascript:parque('.$id4.');">'.$parque4.'</a></span><span style="float:right;">'.$toppe1.'</span>

                        			</div>

	                    		</div>

	                    	</div>

                    		<div class="col-12 col-sm-9 order-6 order-sm-4">

                    			<div class="row align-items-end" style="margin-top:10px;">

                    			<br>

			                        <div class="col-6 col-sm-3 text-center">

			                            <center><div class="round1 green">

			                            	<span class="big" id="visi">'.$c.'</span><br><span class="toppar">Número de Parques visitados</span>

			                            </div></center>

			                        </div>

			                        <div class="col-6 col-sm-3 text-center">

			                            <center><div class="round1 blue">

			                            	<span class="big" id="comi">'.$cf.'</span><br><span class="toppar">Número de comités en la cartera</span>

			                            </div>

			                            </center>

			                        </div>

			                        <div class="col-6 col-sm-3 text-center">

			                            <center><div class="round1 yellow">

			                            	<span class="big" id="calif">'.$totcalif.'</span><br><span class="toppar">Calificación promedio de la cartera</span>

			                            </div>

			                            </center>

			                        </div>

			                        <div class="col-6 col-sm-3 text-center">    

			                            <center><div class="round1 red">

			                            	<span class="big" id="rendi">'.round($parques_asesor-$c).'</span><br><span class="toppar">Número de parques que faltan visitar</span>

			                            </div>

			                            </center>

			                        </div>

			                    </div>

	                        </div>

	                    </div>

                    </div>

                    <img src="background-bot.png" class="bgbot">

                </div>';

                echo '<div id="lis_parques" style="display:none;"><div><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" style="width:10%;vertical-align:middle"><span style="margin-left:15px;font-size:17px;"><b>Sistema de tablets</b></span></div><br>';

                echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.trim($user->ID).'"><input type="hidden" name="parque">';

                echo '<b><a href="javascript:parque(-1);">Registrar un nuevo Parque</a></b><br><br>';

                echo '<span>Parques registrados:</span><div id="tod_parques" style="display:none;">';

                $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

                $res0=mysql_query($sql0);

                $c=0;

                if(mysql_num_rows($res0)<=16){

                    echo '<ul>';

                }

                elseif(mysql_num_rows($res0)<=32){

                    echo '<ul class="doble">';

                }

                else{

                    echo '<ul class="triple">';

                }

                while($row0=mysql_fetch_array($res0)){

                    $parque[$row0["id"]]=$row0["post_title"];

                    $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

                    $res000=mysql_query($sql000);

                    echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a> ';

                    if(mysql_num_rows($res000)>0){

                        echo '<img src="bien.png" width="15px" height="15px">';

                    }

                    echo '</li>';

                }

                echo '</ul></div>

                <div id="vis_parques" style="display:none;">';

                $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

                $res0=mysql_query($sql0);

                $c=0;

                if(mysql_num_rows($res0)<=16){

                    echo '<ul>';

                }

                elseif(mysql_num_rows($res0)<=32){

                    echo '<ul class="doble">';

                }

                else{

                    echo '<ul class="triple">';

                }

                while($row0=mysql_fetch_array($res0)){

                    $parque[$row0["id"]]=$row0["post_title"];

                    $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

                    $res000=mysql_query($sql000);

                    if(mysql_num_rows($res000)>0){

                    }else{

                        echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a></li>';

                    }

                }

                echo '</ul></div>

                <div id="mej_parques" style="display:none;">';

                if(count($parquesbuenos)<=16){

                    echo '<ul>';

                }

                elseif(count($parquesbuenos)<=32){

                    echo '<ul class="doble">';

                }

                else{

                    echo '<ul class="triple">';

                }

                foreach($parquesbuenos as $k=>$v){

                    echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

                }

                echo '</ul></div>

                <div id="med_parques" style="display:none;">';

                if(count($parquesmedios)<=16){

                    echo '<ul>';

                }

                elseif(count($parquesmedios)<=32){

                    echo '<ul class="doble">';

                }

                else{

                    echo '<ul class="triple">';

                }

                foreach($parquesmedios as $k=>$v){

                    echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

                }

                echo '</ul></div>

                <div id="mal_parques" style="display:none;">';

                if(count($parquesmalos)<=16){

                    echo '<ul>';

                }

                elseif(count($parquesmalos)<=32){

                    echo '<ul class="doble">';

                }

                else{

                    echo '<ul class="triple">';

                }

                foreach($parquesmalos as $k=>$v){

                    echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

                }

                echo '</ul></div>';

                echo '<b><a href="javascript:void(0);" onclick="camb(-1);">Volver al perfil</a></b><br>';

                echo '</div>

                <div id="compromisos" style="display:none;">

                    <a href="#" onclick="swcomp(2);">Del mes</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" onclick="swcomp(1);">Todos</a>

                    <div class="compromisos" id="todos">

	                    <div class="CSSTableGenerator">

	                    <table><tr><td>Id Parque</td><td>Parque</td><td>Parámetro</td><td>Compromiso</td><td>Fecha del compromiso</td><td>Estatus</td></tr>';

	                    $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                    $res=mysql_query($sql);

	                    $totcomp=0;

	                    while($row=mysql_fetch_array($res)){

	                        $sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' AND c.estatus='1'";

	                        $res1=mysql_query($sql1);

	                        if(mysql_num_rows($res1)>0){

	                            $i=11;

	                            while($row1=mysql_fetch_array($res1)){

	                                echo '<tr>

	                                <td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$nomparametros[array_search($row1['parametro'], $inparametros)].'</td>

	                                    <td>';

	                                    if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){

	                                            $comp=explode(",",$row1['compromiso']);

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

	                                                    if($comp[1]==111){

	                                                            $namee="Instalaciones";

	                                                    }

	                                                    if($comp[1]==112){

	                                                            $namee="Deportiva";

	                                                    }

	                                                    if($comp[1]==113){

	                                                        $namee="Áreas de esparcimiento";

	                                                    }

	                                                    if($comp[1]==114){

	                                                        $namee="Áreas verdes";

	                                                    }    

	                                            }

	                                            echo $compromisos[$comp[0]].': '.$namee;

	                                    }

	                                    else{

	                                    	if(is_numeric($row1['compromiso'])) {

	                                            echo $compromisos[$row1['compromiso']];

	                                        }

	                                        else{

	                                        	echo $row1['compromiso'];

	                                        }

	                                    }

	                                    echo '</td><td>'.$row1['fecha_visita'].'</td><td>'.$statuscom[$row1['estatus']].'</td></tr>';

	                            }

	                            $totcomp=$totcomp+mysql_num_rows($res1);

	                        }

	                    }

	                    echo '<tr><td>Total:</td><td colspan="6">'.$totcomp.'</td></tr>';

	                    echo '</table></div>

                    </div><br>

                    <div class="compromisos" id="mes" style="display:none;">

	                    <div class="CSSTableGenerator">

	                    <table><tr><td>Id Parque</td><td>Parque</td><td>Parámetro</td><td>Compromiso</td><td>Fecha del compromiso</td><td>Estatus</td></tr>';

	                    $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                    $res=mysql_query($sql);

	                    $totcomp=0;

	                    while($row=mysql_fetch_array($res)){

	                    	//if($_GET['ver']==1){

	                    		$sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' AND c.estatus='1' AND v.fecha_visita>='".date("Y-m-01")."'";	

	                    	/*}

	                    	else{

	                    		$sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' AND c.estatus='1' AND c.fecha_cumplimiento>='".date("Y-m-01")."'";

	                    	}*/

	                        $res1=mysql_query($sql1);

	                        if(mysql_num_rows($res1)>0){

	                            $i=11;

	                            while($row1=mysql_fetch_array($res1)){

	                                echo '<tr>

	                                <td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td></td><td>'.$row1['compromiso'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['estatus'].'</td></tr>';

	                            }

	                            $totcomp=$totcomp+mysql_num_rows($res1);

	                        }

	                    }

	                    echo '<tr><td>Total:</td><td colspan="6">'.$totcomp.'</td></tr>';

	                    echo '</table></div>

                    </div><br>

                    <input type="hidden" name="cmd">

                    <input type="hidden" name="asesorcomp" value="'.trim($user->ID).'">

                    <input type="button" value="Exportar a excel" class="button" onClick="cambiaraction(1);"> &nbsp;&nbsp;

                    <b><a href="javascript:void(0);" onclick="camb(-1);">Volver al perfil</a></b><br>

                    

                </div></form>';

                echo '</body></html>';

                exit();

            /*}

            else{

	            echo '<title>Tablet Parques Alegres</title>

	            <script src="http://code.jquery.com/jquery-1.8.3.js"></script>

	            <script>function parque(p) {document.forma.parque.value=p;document.forma.submit();}

	            function cambiaraction(q){

	            	if(q==1){

	            		document.forma.action="repexcel.php";

	                    document.forma.submit();

	                    document.forma.action="";

	            	}

	            	else{

	            		document.forma.action="solicitar.php";

	                    document.forma.submit();

	                    document.forma.action="";

	            	}

	            }

	            function camb(i){

	                if(i<0){

	                    $("#perfil").show();

	                    $("#lis_parques").hide();

	                    $("#compromisos").hide();

	                }

	                else{

	                    $("#perfil").hide();

	                    if(i==3){

	                        $("#compromisos").show();

	                    }

	                    else{

	                        $("#compromisos").hide();

	                        $("#lis_parques").show();

	                        if(i==1){

	                            $("#vis_parques").show();

	                            $("#tod_parques").hide();

	                            $("#mej_parques").hide();

	                            $("#med_parques").hide();

	                            $("#mal_parques").hide();

	                        }

	                        else if(i==2){

	                            $("#tod_parques").show();

	                            $("#vis_parques").hide();

	                            $("#mej_parques").hide();

	                            $("#med_parques").hide();

	                            $("#mal_parques").hide();

	                        }

	                        else if(i==4){

	                            $("#tod_parques").hide();

	                            $("#vis_parques").hide();

	                            $("#mej_parques").show();

	                            $("#med_parques").hide();

	                            $("#mal_parques").hide();

	                        }

	                        else if(i==5){

	                            $("#tod_parques").hide();

	                            $("#vis_parques").hide();

	                            $("#mej_parques").hide();

	                            $("#med_parques").show();

	                            $("#mal_parques").hide();

	                        }

	                        else if(i==6){

	                            $("#tod_parques").hide();

	                            $("#vis_parques").hide();

	                            $("#mej_parques").hide();

	                            $("#med_parques").hide();

	                            $("#mal_parques").show();

	                        }

	                        

	                    }

	                }

	            }

	            function swcomp(i){

	                if(i==1){

	                    $("#todos").show();

	                    $("#mes").hide();

	                }

	                else{

	                    $("#todos").hide();

	                    $("#mes").show();

	                }

	            }

	            function check(){

	                $.ajax({url: "notifica.php",

	                data: { cmd: 2, asesor: "'.trim($user->ID).'", fecha: "'.date("Y-m-d").'"},

	                dataType: "text",

	                type: "post",

	                success: function(result){

	                    if(result!="no"){

	                        var res=result.split("|");

	                        $("#message").html("");

	                        var len=res.length;

	                        len=len-1;

	                        for(var i=0;i<len;i++){

	                            var msg=res[i].split("><");

	                            $("#message").append("<p id=\"msg"+msg[0]+"\" class=\"mensaje\">"+msg[1]+"<span style=\"float:right;cursor:pointer;\" onclick=\"leer(\'"+msg[0]+"\');\">Cerrar [x]</span></p>");

	                        }

	                        $("#message").show("slow");

	                    }

	                    else{

	                        $("#message").html("");

	                    }

	                    setTimeout(function(){ check(); }, 5000);

	                }});

	            }

	            function leer(msg){

	                $.ajax({url: "notifica.php",

	                data: { cmd: 3, cve_msg: msg},

	                dataType: "text",

	                type: "post",

	                success: function(result){

	                    if(result!="no"){

	                        $("#msg"+msg).hide("slow");

	                    }

	                }});

	            }

	            $(function() {

	                check();

	                var calif=$("#calif").text();

	                $({someValue: 0}).animate({someValue: calif}, {

	                    duration: 2000,

	                    easing:"swing", // can be anything

	                    step: function() { // called on every step

	                        $("#calif").text(Math.round(this.someValue));

	                    }

	                });

	                var rendi=$("#rendi").text();

	                $({someValue: 0}).animate({someValue: rendi}, {

	                    duration: 2000,

	                    easing:"swing", // can be anything

	                    step: function() { // called on every step

	                        $("#rendi").text(Math.round(this.someValue));

	                    }

	                });

	                var visi=$("#visi").text();

	                $({someValue: 0}).animate({someValue: visi}, {

	                    duration: 2000,

	                    easing:"swing", // can be anything

	                    step: function() { // called on every step

	                        $("#visi").text(Math.round(this.someValue)+"%");

	                    }

	                });

	                var comi=$("#comi").text();

	                $({someValue: 0}).animate({someValue: comi}, {

	                    duration: 2000,

	                    easing:"swing", // can be anything

	                    step: function() { // called on every step

	                        $("#comi").text(Math.round(this.someValue));

	                    }

	                });

	            });

	            </script>

	            <style>

	            span{

	                font-family: georgia;

	                color: #727272;

	            }

	            ul{

	                margin-bottom:20px;

	                margin-left:20px;

	                margin-top:10px;

	                overflow:hidden;

	            }

	            li{

	                line-height:1.5em;

	                float:left;

	                display:inline;

	                width:100%;

	            }

	            .doble li{

	                width:50%;

	            }

	            .triple li{

	                width:33.3%;

	            }

	            a:link {

	                text-decoration:none;

	                color: #0074a2;

	            }

	            a:visited {

	                text-decoration:none;

	                color: #0074a2;

	            }

	            a:hover {

	                text-decoration:underline;

	                color: #FF704D;

	            }

	            a:active {

	                text-decoration:underline;

	                color: #FF704D;

	            }

	            </style>';

	            echo '</head><body>';

	            /*<script>

	                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){

	                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

	                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

	                })(window,document,"script","https://www.google-analytics.com/analytics.js","ga");

	              

	                ga("create", "UA-2870347-29", "auto");

	                ga("send", "pageview");

	              

	            </script>';*/

	            //if($asesor==13563){

	                //if($_GET['qu']==10){

	        /*            echo '<style>

	                        body{

	                            margin:0;

	                        }

	                        #message{

	                            position:absolute;

	                            left:6%;

	                            z-index:1;

	                        }

	                        .mensaje{

	                            -webkit-border-radius: 10px;

	                            -moz-border-radius: 10px;

	                            border-radius: 10px;

	                            display:block;

	                            margin-top:2px;

	                            margin-bottom:3px;

	                            background:white;

	                            font-weight:bold;

	                            font-size:14px;

	                            padding-left:10px;

	                            padding-top:2px;

	                            color:#727272;

	                            vertical-align:middle;

	                            width:400px;

	                            min-height:30px;

	                            border: 1px solid gray;

	                        }

	                        .mensaje span{

	                            font-size:12px;

	                        }

	                        .mensaje span:hover{

	                            color: green;

	                            text-decoration:underline;

	                        }

	                        #perfil{

	                            width:600px;

	                            height:100%;

	                        }

	                        #back{

	                            width:600px;

	                            height:100%;

	                            position: absolute;

	                            left: 0px;

	                            top: 0px;

	                            z-index: -1;

	                        }

	                        .mitad{

	                            width:39%;

	                            display:inline-block;

	                            vertical-align:top;

	                        }

	                        .linarb{

	                            width:50%;

	                            height:15%;

	                            float:left;

	                        }

	                        .compend{

	                            line-height:25px;

	                        }

	                        .listpa{

	                            line-height:15px;

	                        }

	                        .toppar{

	                            font-size:15px;

	                        }

	                        .round1{

	                            -webkit-border-radius: 50%;

	                            -moz-border-radius: 50%;

	                            border-radius: 50%;

	                            width:100px;

	                            height:100px;

	                            border: 4px solid #b8df84;

	                        }

	                        .round2{

	                            -webkit-border-radius: 50%;

	                            -moz-border-radius: 50%;

	                            border-radius: 50%;

	                            width:90px;

	                            height:90px;

	                            border: 4px solid #8fa9e4;

	                        }

	                        .round3{

	                            -webkit-border-radius: 50%;

	                            -moz-border-radius: 50%;

	                            border-radius: 50%;

	                            width:80px;

	                            height:80px;

	                            border: 4px solid #bd8e00;

	                        }

	                        .round4{

	                            -webkit-border-radius: 50%;

	                            -moz-border-radius: 50%;

	                            border-radius: 50%;

	                            width:70px;

	                            height:70px;

	                            border: 4px solid #99432a;

	                        }

	                        .big{

	                            line-height:45px;

	                            font-size:25px;

	                        }

	                        .small{

	                            line-height:11px;

	                            font-size:9px;

	                        }

	                        .CSSTableGenerator {

	                            margin:0px;padding:0px;

	                            width:99%;

	                            box-shadow: 10px 10px 5px #888888;

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

	                        .CSSTableGenerator tr:first-child:hover td{

	                                background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );

	                                background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );

	                                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	                        

	                                background-color:#5fbf00;

	                        }

	                        .CSSTableGenerator tr:first-child td:first-child{

	                                border-width:0px 0px 1px 0px;

	                        }

	                        .CSSTableGenerator tr:first-child td:last-child{

	                                border-width:0px 0px 1px 1px;

	                        }

	                        @media screen and (max-width: 600px){

	                            #perfil{

	                                width:100%;

	                            }

	                            #back{

	                                width:100%;

	                            }

	                        }

	                        @media screen and (max-width: 500px){

	                            #perfil{

	                                width:100%;

	                            }

	                            #back{

	                                width:100%;

	                            }

	                            a{

	                                font-size:10px;

	                            }

	                            .compend{

	                                line-height:10px;

	                            }

	                            .listpa{

	                                line-height:10px;

	                            }

	                            .toppar{

	                                font-size:10px;

	                            }

	                            .round1{

	                                width:60px;

	                                height:60px;

	                                border: 2px solid #b8df84;

	                            }

	                            .round2{

	                                width:55px;

	                                height:55px;

	                                border: 2px solid #8fa9e4;

	                            }

	                            .round3{

	                                width:45px;

	                                height:45px;

	                                border: 2px solid #bd8e00;

	                            }

	                            .round4{

	                                width:40px;

	                                height:40px;

	                                border: 2px solid #99432a;

	                            }

	                            .big{

	                                line-height:22px;

	                                font-size:18px;

	                            }

	                            .small{

	                                line-height:6px;

	                                font-size:5px;

	                            }

	                        }

	                    </style>';

	                    echo '<div id="perfil">

	                        <img id="back" src="background.png" width="600" height="100%">

	                        <img src="imagenes/campana.png" align="left" style="width:6%;margin-top:3px;margin-left:3px;"><div id="message" style="display:inline;"></div>

	                        <img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" align="right" style="width:16%;margin-top:3px;margin-right:3px;">

	                        <div style="clear:both;"></div>';

	                        $sql="SELECT display_name FROM wp_users where id='".trim($user->ID)."'";

	                        $res=mysql_query($sql);

	                        $row=mysql_fetch_array($res);

	                        $sql1="SELECT ID, post_title FROM wp_posts where post_author='".trim($user->ID)."' and post_type='parque' and post_status='publish'";

	                        $res1=mysql_query($sql1);

	                        $malo=0;

	                        $medio=0;

	                        $bueno=0;

	                        $toppe1=$toppe2=$toppe3=100;

	                        $topme1=$topme2=$topme3=0;

	                        $first=0;

	                        $parque1=$parque2=$parque3=$parque4=$parque5=$parque6="";

	                        $id1=$id2=$id3=$id4=$id5=$id6="";

	                        $parques_asesor=mysql_num_rows($res1);

	                        $diasmes=date("t");

	                        $diaactual=date('d');

	                        $rendimiento=$parques_asesor/$diasmes;

	                        $rend=$diaactual*$rendimiento;

	                        $totcalif=0;

	                        $cm=0;

	                        $cf=0;

	                        while($row1=mysql_fetch_array($res1)){

	                            $sql3="select * from compromisos where cve_parque='".$row1['ID']."' AND estatus='1'";

	                            $res3=mysql_query($sql3);

	                            if(mysql_num_rows($res3)>0){

	                                while($row3=mysql_fetch_array($res3)){

	                                    $cm++;

	                                }

	                            }

	                            $sql2="select cve_parque, ";

	                            foreach($param as $v){

	                                $sql2.=$v."+";

	                            }

	                            $sql2 = substr($sql2, 0, -1);

	                            $sql2.=" as calif,opera from wp_comites_parques where cve_parque='".$row1['ID']."' order by fecha_visita DESC, cve DESC limit 1";

	                            $res2=mysql_query($sql2);

	                            while($row2=mysql_fetch_array($res2)){

	                                if($row2['opera']>=7){

	                                    $cf++;

	                                }

	                                if(($row2['calif']/7)<60){

	                                    $malo++;

	                                    $parquesmalos[$row1['ID']]=$row1['post_title'];

	                                }

	                                elseif(($row2['calif']/7)<80){

	                                    $medio++;

	                                    $parquesmedios[$row1['ID']]=$row1['post_title'];

	                                }

	                                else{

	                                    $bueno++;

	                                    $parquesbuenos[$row1['ID']]=$row1['post_title'];

	                                }

	                                if($first<1){

	                                    $topme1=round($row2['calif']/7);

	                                    $toppe1=round($row2['calif']/7);

	                                    $parque1=$row1['post_title'];

	                                    $id1=$row1['ID'];

	                                    $parque4=$row1['post_title'];

	                                    $id4=$row1['ID'];

	                                    $first=1;

	                                }

	                                else{

	                                    if($topme1<round($row2['calif']/7)){

	                                        $parque3=$parque2;

	                                        $parque2=$parque1;

	                                        $parque1=$row1['post_title'];

	                                        $id3=$id2;

	                                        $id2=$id1;

	                                        $id1=$row1['ID'];

	                                        $topme3=$topme2;

	                                        $topme2=$topme1;

	                                        $topme1=round($row2['calif']/7);

	                                    }

	                                    else{

	                                        if($topme2<round($row2['calif']/7)){

	                                            $parque3=$parque2;

	                                            $parque2=$row1['post_title'];

	                                            $id3=$id2;

	                                            $id2=$row1['ID'];

	                                            $topme3=$topme2;

	                                            $topme2=round($row2['calif']/7);

	                                        }

	                                        else{

	                                            if($topme3<round($row2['calif']/7)){

	                                                $parque3=$row1['post_title'];

	                                                $id3=$row1['ID'];

	                                                $topme3=round($row2['calif']/7);   

	                                            }

	                                        }

	                                    }

	                                    if($toppe1>=round($row2['calif']/7)){

	                                        $parque6=$parque5;

	                                        $parque5=$parque4;

	                                        $parque4=$row1['post_title'];

	                                        $id6=$id5;

	                                        $id5=$id4;

	                                        $id4=$row1['ID'];

	                                        $toppe3=$toppe2;

	                                        $toppe2=$toppe1;

	                                        $toppe1=round($row2['calif']/7);

	                                    }

	                                    else{

	                                        if($toppe2>=round($row2['calif']/7)){

	                                            $parque6=$parque5;

	                                            $parque5=$row1['post_title'];

	                                            $id6=$id5;

	                                            $id5=$row1['ID'];

	                                            $toppe3=$toppe2;

	                                            $toppe2=round($row2['calif']/7);

	                                        }

	                                        else{

	                                            if($toppe3>=round($row2['calif']/7)){

	                                                $parque6=$row1['post_title'];

	                                                $id6=$row1['ID'];

	                                                $toppe3=round($row2['calif']/7);

	                                            }

	                                        }

	                                    }

	                                }

	                                $totcalif=$totcalif+round($row2['calif']/7);

	                            }

	                        }

	                        $totcalif=round($totcalif/$parques_asesor);

	                        $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                        $res0=mysql_query($sql0);

	                        $c=0;

	                        while($row0=mysql_fetch_array($res0)){

	                            $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

	                            $res000=mysql_query($sql000);

	                            if(mysql_num_rows($res000)>0){

	                                $c++;

	                            }

	                        }

	                        echo '<div class="mitad"><center>';

	                            if(file_exists('imagenes/'.trim($user->ID).'.png')){

	                                $foto_asesor=trim($user->ID).'.png';

	                            }

	                            else{

	                                $foto_asesor='asesor.jpg';

	                            }

	                            echo '<img src="imagenes/'.$foto_asesor.'" width="45%"><br><span style="font-size:12px;">'.$row['display_name'].'</span><br><br>

	                            '; if($v2==0){ echo '<span style="font-size:15px;"><b>Mis parques</b></span><br><br><a href="#" onclick="camb(4);"><img src="happy_face.png" width="15%"></a>&nbsp;

	                            <a href="#" onclick="camb(5);"><img src="normal_face.png" width="15%"></a>&nbsp;

	                            <a href="#" onclick="camb(6);"><img src="sad_face.png" width="15%"></a><br>

	                            <div style="display:inline-block;width:15%;"><a href="#" onclick="camb(4);"><span style="font-size:15px;">'.$bueno.'</span></a></div>&nbsp;

	                            <div style="display:inline-block;width:15%;"><a href="#" onclick="camb(5);"><span style="font-size:15px;">'.$medio.'</span></a></div>&nbsp;

	                            <div style="display:inline-block;width:15%;"><a href="#" onclick="camb(6);"><span style="font-size:15px;">'.$malo.'</span></a></div><br><br>';}

	                            echo '<div class="linarb"><img src="arboliwi.jpg" style="margin-left:20%;" width="70%" height="100%"></div>

	                            <div class="listpa" style="width:45%;height:15%;float:right;margin-right:5%;"><br><a href="#" onclick="camb(1);">Visitar Parques</a><br><br><a href="#" onclick="camb(2);">Lista de Parques</a></div>

	                            <div style="clear:both"></div><br>

	                            <div style="display:inline-block;width:40%;"><div style="text-align:center;width:50px;height:50px;line-height:50px;background-image: url(pendientes.png);background-repeat:no-repeat;background-position:center;">'.$cm.'</div></div>

	                            <div class="compend" style="display:inline-block;width:40%;vertical-align:middle;"><a href="#" onclick="camb(3);">Compromisos Pendientes</a><br></div><br><br>

	                            <b><a href="javascript:void(0);" onclick="cambiaraction();">Solicitar una modificación</a></b><br>

	                            </center>

	                        </div>

	                        <div class="mitad" style="width:59%;"><center><b>Los mejores</b><br>

	                            <br><div style="float:left;width:20%;"><img src="best.png" width="100%"></div>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">1.- <a href="javascript:parque('.$id1.');">'.$parque1.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$topme1.'</div><br>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">2.- <a href="javascript:parque('.$id2.');">'.$parque2.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$topme2.'</div><br>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">3.- <a href="javascript:parque('.$id3.');">'.$parque3.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$topme3.'</div><br>

	                            <div style="clear:both;"></div><br><b>Parques a Mejorar</b><br>

	                            <div style="float:left;width:20%;"><img src="improve.png" width="60%"></div><br>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">'.($parques_asesor-2).'.- <a href="javascript:parque('.$id6.');">'.$parque6.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$toppe3.'</div><br>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">'.($parques_asesor-1).'.- <a href="javascript:parque('.$id5.');">'.$parque5.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$toppe2.'</div><br>

	                            <div class="toppar" style="display:inline-block;width:60%;text-align:left;">'.$parques_asesor.'.- <a href="javascript:parque('.$id4.');">'.$parque4.'</a></div><div class="toppar" style="display:inline-block;width:10%;text-align:center;">'.$toppe1.'</div><br>

	                            <div style="clear:both;"></div><div style="width:49%;display:inline-block;">

	                                <div class="round1"><span class="big" id="visi">'.round(($c*100)/$parques_asesor).'%</span><br><span class="small">Parques visitados</span></div><br>

	                                <div class="round2"><span class="big" id="comi">'.$cf.'</span><br><span class="small">Comités formados</span></div>

	                            </div>

	                            <div style="width:49%;display:inline-block;">

	                                <div class="round3"><span class="big" id="calif">'.$totcalif.'</span><br><span class="small">Calificación promedio de la cartera</span></div><br>

	                                <div class="round4"><span class="big" id="rendi">'.round($c-$rend).'</span><br><span class="small">Rendimiento en visitas</span></div>

	                            </div>

	                            </center>

	                        </div>

	                    </div>';

	                    echo '<div id="lis_parques" style="display:none;"><div><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" style="width:10%;vertical-align:middle"><span style="margin-left:15px;font-size:17px;"><b>Sistema de tablets</b></span></div><br>';

	                    echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.trim($user->ID).'"><input type="hidden" name="parque">';

	                    echo '<b><a href="javascript:parque(-1);">Registrar un nuevo Parque</a></b><br><br>';

	                    echo '<span>Parques registrados:</span><div id="tod_parques" style="display:none;">';

	                    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                    $res0=mysql_query($sql0);

	                    $c=0;

	                    if(mysql_num_rows($res0)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(mysql_num_rows($res0)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    while($row0=mysql_fetch_array($res0)){

	                        $parque[$row0["id"]]=$row0["post_title"];

	                        $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

	                        $res000=mysql_query($sql000);

	                        echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a> ';

	                        if(mysql_num_rows($res000)>0){

	                            echo '<img src="bien.png" width="15px" height="15px">';

	                        }

	                        echo '</li>';

	                    }

	                    echo '</ul></div>

	                    <div id="vis_parques" style="display:none;">';

	                    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                    $res0=mysql_query($sql0);

	                    $c=0;

	                    if(mysql_num_rows($res0)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(mysql_num_rows($res0)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    while($row0=mysql_fetch_array($res0)){

	                        $parque[$row0["id"]]=$row0["post_title"];

	                        $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

	                        $res000=mysql_query($sql000);

	                        if(mysql_num_rows($res000)>0){

	                        }else{

	                            echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a></li>';

	                        }

	                    }

	                    echo '</ul></div>

	                    <div id="mej_parques" style="display:none;">';

	                    if(count($parquesbuenos)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(count($parquesbuenos)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    foreach($parquesbuenos as $k=>$v){

	                        echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

	                    }

	                    echo '</ul></div>

	                    <div id="med_parques" style="display:none;">';

	                    if(count($parquesmedios)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(count($parquesmedios)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    foreach($parquesmedios as $k=>$v){

	                        echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

	                    }

	                    echo '</ul></div>

	                    <div id="mal_parques" style="display:none;">';

	                    if(count($parquesmalos)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(count($parquesmalos)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    foreach($parquesmalos as $k=>$v){

	                        echo '<li><a href="javascript:parque('.$k.');">'.$v.'</a></li>';

	                    }

	                    echo '</ul></div>';

	                    echo '<b><a href="javascript:void(0);" onclick="camb(-1);">Volver al perfil</a></b><br>';

	                    echo '</form></div>

	                    <div id="compromisos" style="display:none;">

	                        <a href="#" onclick="swcomp(2);">Del mes</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" onclick="swcomp(1);">Todos</a>

	                        <div class="compromisos" id="todos">

	                        <div class="CSSTableGenerator">

	                        <table><tr><td>Id Parque</td><td>Parque</td><td>Parámetro</td><td>Compromiso</td><td>Meta</td><td>Fecha del compromiso</td><td>Promesa de Cumplimiento</td></tr>';

	                        $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                        $res=mysql_query($sql);

	                        $totcomp=0;

	                        while($row=mysql_fetch_array($res)){

	                            $sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' AND c.estatus='1'";

	                            $res1=mysql_query($sql1);

	                            if(mysql_num_rows($res1)>0){

	                                $i=11;

	                                while($row1=mysql_fetch_array($res1)){

	                                    echo '<tr>

	                                    <td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$nomparametros[array_search($row1['parametro'], $inparametros)].'</td>

	                                    <td>';

	                                    if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){

	                                            $comp=explode(",",$row1['compromiso']);

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

	                                                    if($comp[1]==111){

	                                                            $namee="Instalaciones";

	                                                    }

	                                                    if($comp[1]==112){

	                                                            $namee="Deportiva";

	                                                    }

	                                                    if($comp[1]==113){

	                                                        $namee="Áreas de esparcimiento";

	                                                    }

	                                                    if($comp[1]==114){

	                                                        $namee="Áreas verdes";

	                                                    }    

	                                            }

	                                            echo $compromisos[$comp[0]].': '.$namee;

	                                    }

	                                    else{

	                                            echo $compromisos[$row1['compromiso']];

	                                    }

	                                    echo '</td>

	                                    <td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td></tr>';

	                                }

	                                $totcomp=$totcomp+mysql_num_rows($res1);

	                            }

	                        }

	                        echo '<tr><td>Total:</td><td colspan="8">'.$totcomp.'</td></tr>';

	                        echo '</table></div>

	                        </div><br>

	                        <div class="compromisos" id="mes" style="display:none;">

	                        <div class="CSSTableGenerator">

	                        <table><tr><td>Id Parque</td><td>Parque</td><td>Parámetro</td><td>Compromiso</td><td>Meta</td><td>Fecha del compromiso</td><td>Promesa de Cumplimiento</td></tr>';

	                        $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                        $res=mysql_query($sql);

	                        $totcomp=0;

	                        while($row=mysql_fetch_array($res)){

	                            $sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' AND c.estatus='1' AND c.fecha_cumplimiento>='".date("Y-m-01")."'";

	                            $res1=mysql_query($sql1);

	                            if(mysql_num_rows($res1)>0){

	                                $i=11;

	                                while($row1=mysql_fetch_array($res1)){

	                                    echo '<tr>

	                                    <td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$nomparametros[array_search($row1['parametro'], $inparametros)].'</td>

	                                    <td>';

	                                    if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){

	                                            $comp=explode(",",$row1['compromiso']);

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

	                                                    if($comp[1]==111){

	                                                            $namee="Instalaciones";

	                                                    }

	                                                    if($comp[1]==112){

	                                                            $namee="Deportiva";

	                                                    }

	                                                    if($comp[1]==113){

	                                                        $namee="Áreas de esparcimiento";

	                                                    }

	                                                    if($comp[1]==114){

	                                                        $namee="Áreas verdes";

	                                                    }    

	                                            }

	                                            echo $compromisos[$comp[0]].': '.$namee;

	                                    }

	                                    else{

	                                            echo $compromisos[$row1['compromiso']];

	                                    }

	                                    echo '</td>

	                                    <td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td></tr>';

	                                }

	                                $totcomp=$totcomp+mysql_num_rows($res1);

	                            }

	                        }

	                        echo '<tr><td>Total:</td><td colspan="8">'.$totcomp.'</td></tr>';

	                        echo '</table></div>

	                        </div><br>

	                        <b><a href="javascript:void(0);" onclick="camb(-1);">Volver al perfil</a></b><br>

	                    </div>';

	                    echo '</body></html>';

	                    exit();

	                /*}else{

	                    echo '<div id="perfil">

	                    <a href="#" onclick="camb();">Lista de parques</a>

	                    </div>';

	                    echo '<div id="lis_parques" style="display:none;"><div><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" style="width:10%;vertical-align:middle"><span style="margin-left:15px;font-size:17px;"><b>Sistema de tablets</b></span></div><br>';

	                    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                    $res0=mysql_query($sql0);

	                    $c=0;

	                    echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.trim($user->ID).'"><input type="hidden" name="parque">';

	                    echo '<b><a href="javascript:parque(-1);">Registrar un nuevo Parque</a></b><br><br>';

	                    echo '<span>Parques registrados:</span>';

	                    if(mysql_num_rows($res0)<=16){

	                        echo '<ul>';

	                    }

	                    elseif(mysql_num_rows($res0)<=32){

	                        echo '<ul class="doble">';

	                    }

	                    else{

	                        echo '<ul class="triple">';

	                    }

	                    while($row0=mysql_fetch_array($res0)){

	                        $parque[$row0["id"]]=$row0["post_title"];

	                        $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

	                        $res000=mysql_query($sql000);

	                        echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a> ';

	                        if(mysql_num_rows($res000)>0){

	                            echo '<img src="bien.png" width="15px" height="15px">';

	                        }

	                        echo '</li>';

	                    }

	                    echo '</ul>';

	                    echo '<b><a href="javascript:void(0);" onclick="cambiaraction();">Solicitar una modificación</a></b><br>';

	                    echo '</form></div>';

	                    echo '</body></html>';

	                    exit();

	                }*/

	            //}

	            /*else{

	                echo '<div><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" style="width:10%;vertical-align:middle"><span style="margin-left:15px;font-size:17px;"><b>Sistema de tablets</b></span></div><br>';

	                $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	                $res0=mysql_query($sql0);

	                $c=0;

	                echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.trim($user->ID).'"><input type="hidden" name="parque">';

	                echo '<b><a href="javascript:parque(-1);">Registrar un nuevo Parque</a></b><br><br>';

	                echo '<span>Parques registrados:</span>';

	                if(mysql_num_rows($res0)<=16){

	                    echo '<ul>';

	                }

	                elseif(mysql_num_rows($res0)<=32){

	                    echo '<ul class="doble">';

	                }

	                else{

	                    echo '<ul class="triple">';

	                }

	                while($row0=mysql_fetch_array($res0)){

	                    $parque[$row0["id"]]=$row0["post_title"];

	                    $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";

	                    $res000=mysql_query($sql000);

	                    echo '<li><a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a> ';

	                    if(mysql_num_rows($res000)>0){

	                        echo '<img src="bien.png" width="15px" height="15px">';

	                    }

	                    echo '</li>';

	                }

	                echo '</ul>';

	                echo '<b><a href="javascript:void(0);" onclick="cambiaraction();">Solicitar una modificación</a></b><br>';

	                echo '</form>';

	                echo '</body></html>';

	                exit();

	            }*/

	        /*}

	        else{

	            echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Tablet Parques Alegres</title>';

	            echo '<script>function parque(p) {document.forma.parque.value=p;document.forma.submit();}

	            function cambiaraction(){

	                    document.forma.action="solicitar.php";

	                    document.forma.submit();

	                    document.forma.action="";

	            }

	            </script>';

	            echo '</head><body>';

	            echo '<h3>Tablets Parques Alegres</h3>';

	            $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

	            $res0=mysql_query($sql0);

	            $c=0;

	            echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.trim($user->ID).'"><input type="hidden" name="parque">';

	            echo '<a href="javascript:parque(-1);">Nuevo Parque</a><br><br>';

	            echo '<table border=0 width=95% align="center"><tr><td valign="top">';

	            while($row0=mysql_fetch_array($res0)){

	                    $parque[$row0["id"]]=$row0["post_title"];

	                echo '<a href="javascript:parque('.$row0["id"].');">'.$row0["post_title"].'</a><br>';

	                    $c++;

	                    if ($c>20) {

	                            echo '</td><td valign="top">';

	                            $c=0;

	                    }

	            }

	            echo '</td></tr></table>';

	            echo '<br><br><a href="javascript:void(0);" onclick="cambiaraction();";>Solicitar una modificación</a><br><br>';

	            echo '</form>';

	            echo '</body></html>';

	            exit;

	        }*/

        //}

    }

    if($id_post>1){

        $_POST['parque']=$id_post;

    }

    $visita=array("reforzamiento"=>1,"seguimiento"=>2,"evento"=>3,"prospectacion"=>4,"formacion"=>5,"Stand by"=>6);

    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

    $res0=mysql_query($sql0);

    while($row0=mysql_fetch_array($res0)){

            $parque[$row0["id"]]=$row0["post_title"];

        //echo $row0["post_title"].'<br>';

    }

    if ($id_post>0){
    	$parquen=$parque[$id_post]; 
    	$screenvisita="style='display:inline;'";
    	$screenparque="style='display:none;'";
    }
    else {
    	$parquen="-- N U E V O --";
    	$screenvisita="style='display:none;'";
    	$screenparque="style='display:inline;'";
    }

    

    $sql00="select * from wp_postmeta where post_id='".$_POST['parque']."'";

    $res00=mysql_query($sql00);

    while($row00=mysql_fetch_array($res00)){

        $meta[$row00['meta_key']]=$row00['meta_value'];

    }

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

        if($_POST['parque']>0){

            $conti=0;

            $sSQL222="SELECT * from comite_parque where cve_parque='".$_POST['parque']."'";

            $res222=mysql_query($sSQL222);

            if(mysql_num_rows($res222)>0){

                $row222=mysql_fetch_array($res222);

                //$sSQL2="UPDATE comite_parque SET fecha_alta='".$_POST['fecha_comite']."', telefono='".$_POST['telefono'][0]."', celular='".$_POST['celular'][0]."', email='".$_POST['email'][0]."', facebook='".$_POST['facebook'][0]."', twitter='".$_POST['twitter'][0]."', instagram='".$_POST['instagram'][0]."', skype='".$_POST['skype']."',otro='".$_POST['otro']."' WHERE id='".$row222['id']."'";

                $sSQL2="UPDATE comite_parque SET fecha_alta='".$_POST['fecha_comite']."', email='".$_POST['email'][0]."', facebook='".$_POST['facebook'][0]."', twitter='".$_POST['twitter'][0]."', instagram='".$_POST['instagram'][0]."', skype='".$_POST['skype']."',otro='".$_POST['otro']."' WHERE id='".$row222['id']."'";

                //echo $sSQL2.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL2);

                $conti=1;

                $id_comite=$row222['id'];

            }

            else{

                //$sSQL2="INSERT INTO `comite_parque`(`cve_parque`, `fecha_reg`, `fecha_alta`, `telefono`,`celular`,`email`, `facebook`, `twitter`, `instagram`, `skype`,`otro`) VALUES ('$_POST[parque]','".date("Y-m-d H:i:s")."','".$_POST['fecha_comite']."','".$_POST['telefono'][0]."','".$_POST['celular'][0]."','".$_POST['email'][0]."','".$_POST['facebook'][0]."','".$_POST['twitter'][0]."','".$_POST['instagram'][0]."','$_POST[skype]','$_POST[otro]')";

                $sSQL2="INSERT INTO `comite_parque`(`cve_parque`, `fecha_reg`, `fecha_alta`, `email`, `facebook`, `twitter`, `instagram`, `skype`,`otro`) VALUES ('$_POST[parque]','".date("Y-m-d H:i:s")."','".$_POST['fecha_comite']."','".$_POST['email'][0]."','".$_POST['facebook'][0]."','".$_POST['twitter'][0]."','".$_POST['instagram'][0]."','$_POST[skype]','$_POST[otro]')";

                //echo $sSQL2.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL2);

                $id_comite=mysql_insert_id();

            }

            //echo $sSQL2.'<br>';

            $dmiembros=explode(",",$_POST['datos_miembros']);

            $nmiembros=explode(",",$_POST['nuevos_miembros']);

            foreach($dmiembros as $key=>$val){

                if($val!=""){

                    $val=explode("|",$val);

                    for($i=0;$i<count($val);$i++){

                        if($val[$i]=="undefined"){

                            $val[$i]=0;

                        }

                    }

                    $fecha_nac=$val[4].'-'.$val[3].'-'.$val[2];

                    $sSQL3="UPDATE `comite_miembro` SET nombre='".$val[1]."',fecha_nac='".$fecha_nac."',sexo='".$val[5]."', nivel='".$val[6]."', rol='".$val[7]."', telefono='".$val[8]."', celular='".$val[9]."',email='".$val[10]."', facebook='".$val[11]."', megusta='".$val[12]."',twitter='".$val[13]."', siguemet='".$val[14]."', instagram='".$val[15]."',siguemei='".$val[16]."', contacto='".$val[17]."' WHERE id='".$val[0]."'";

                    //echo $sSQL3.'<br>';

                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL3);

                }

            }

            foreach($nmiembros as $k=>$v){

                if($v!=""){

                    $v=explode("|",$v);

                    for($i=0;$i<count($v);$i++){

                        if($v[$i]=="undefined"){

                            $v[$i]=0;

                        }

                    }

                    $fecha_nac=$v[3].'-'.$v[2].'-'.$v[1];

                    $sSQL3="INSERT INTO `comite_miembro`(`cve_comite`, `nombre`,`fecha_nac`,`sexo`, `nivel`, `rol`, `telefono`, `celular`,`email`, `facebook`, `megusta`,`twitter`, `siguemet`, `instagram`,`siguemei`, `contacto`) VALUES ('$id_comite','".$v[0]."','$fecha_nac','".$v[4]."','".$v[5]."','".$v[6]."','".$v[7]."','".$v[8]."','".$v[9]."','".$v[10]."','".$v[11]."','".$v[12]."','".$v[13]."','".$v[14]."','".$v[15]."','".$v[16]."')";

                    //echo $sSQL3.'<br>';

                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL3);

                }

            }

            /*else{

                for($i=1;$i<=count($_POST['nombre']);$i++){

                $fecha_nac=$_POST['anio'][$i].'-'.$_POST['mes'][$i].'-'.$_POST['dia'][$i];

                $sSQL3="INSERT INTO `comite_miembro`(`cve_comite`, `nombre`,`fecha_nac`,`sexo`, `nivel`, `rol`, `telefono`, `celular`,`email`, `facebook`, `megusta`,`twitter`, `siguemet`, `instagram`,`siguemei`, `contacto`) VALUES ('$id_comite','".$_POST['nombre'][$i]."','$fecha_nac','".$_POST['sexo'][$i]."','".$_POST['educacion'][$i]."','".$_POST['rol'][$i]."','".$_POST['telefono'][$i]."','".$_POST['celular'][$i]."','".$_POST['email'][$i]."','".$_POST['facebook'][$i]."','".$_POST['megusta'][$i]."','".$_POST['twitter'][$i]."','".$_POST['siguemet'][$i]."','".$_POST['instagram'][$i]."','".$_POST['siguemei'][$i]."','".$_POST['contacto'][$i]."')";

                //echo $sSQL3.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL3);

                }

            }*/

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

                        $pdf->Cell(105,4,'C. Ignacio Tapia Romero',0,2,'C');

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

                    

                    //$to="gudart@gmail.com";

                    $to="";

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

                    if($to!=""){

                        mail($to, $subject, $body, $headers);

                    }

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

    if($_POST['cmd']==1){

        if($_POST['parque']>0){

            $fec=''.date("Y-m-d H:i:s").'';

            if($_POST['visita']=="reforzamiento"){

            	if($_POST['impacto_cal']==1){

            		$opera=0;

	                if($_POST['miem_comite']>0){

	                    $sum=0;

	                    $org="";

	                    if(count($_POST['organiza'])>0){

	                        foreach($organizacion_comite as $key=>$value){

	                            $entro=0;

	                            foreach($_POST['organiza'] as $k=>$v){

	                                if($v==$key){

	                                    $sum=$sum+$value;

	                                    $org.='1,';

	                                    $entro=1;

	                                }

	                            }

	                            if($entro!=1){

	                                $org.='0,';

	                            }

	                        }

	                    }

	                    else{

	                        foreach($organizacion_comite as $key=>$value){

	                            $org.='0,';

	                        }

	                    }

	                    $org=substr($org,0,-1);

	                    $sqlco="SElECT id FROM comite_parque WHERE cve_parque='".$_POST['parque']."'";

	                    $resco=mysql_query($sqlco);

	                    if(mysql_num_rows($resco)>0){

	                        $rowco=mysql_fetch_array($resco);

	                        $cve_comite=$rowco['id'];

	                        $sqlor="UPDATE comite_parque SET organizacion='".$org."' WHERE id='".$cve_comite."'";

	                        mysql_db_query("parquesa_ParquesAlegresWP",$sqlor);

	                    }

	                    $ren=0;

	                    //if($_GET['ver']==1){

	                    	if($_POST['nreuniones']!="" && $_POST['nreuniones']!=0){
	                    		$nombre_archivo = $_FILES['file_reuniones']['name']; 
				                $tipo_archivo = $_FILES['file_reuniones']['type']; 
				                $tamano_archivo = $_FILES['file_reuniones']['size']; 
				                //compruebo si las características del archivo son las que deseo 
				                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 
				                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
				                }else{*/ 
				                $uploads_dir = getcwd().'/reuniones';
				                if(count($_FILES['file_reuniones']['name'])){
				                    foreach ($_FILES["file_reuniones"]["error"] as $key => $error) {
				                        if ($error == UPLOAD_ERR_OK) {
				                            $tmp_name = $_FILES["file_reuniones"]["tmp_name"][$key];
				                            // basename() puede evitar ataques de denegación de sistema de ficheros;
				                            // podría ser apropiada más validación/saneamiento del nombre del fichero
				                            $name = basename($_FILES["file_reuniones"]["name"][$key]);
				                            $i=0;
				                            if(file_exists($uploads_dir."/".$name)){
				                                while(file_exists($uploads_dir."/".$name)){
				                                    $i++;
				                                    $ult=strrpos($name,".");
				                                    $nom=substr($name, 0 ,$ult);
				                                    $ext=substr($name, $ult);
				                                    $name=$nom.$i.$ext;
				                                }
				                            }
				                            if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){
				                                echo "El archivo de reunion ha sido cargado correctamente.";
				                                $archivos.=$name.',';
				                            }
				                            else{
				                                echo "Ocurrió algún error al subir el archivo de reunion. No pudo guardarse.";
				                            }
				                        }
				                    }
				                    $archivos = substr($archivos, 0, -1);
				                }
				                else{
				                    $i=0;
				                    if(file_exists($uploads_dir."/".$nombre_archivo)){
				                        while(file_exists($uploads_dir."/".$nombre_archivo)){
				                            $i++;
				                            $ult=strrpos($nombre_archivo,".");
				                            $nom=substr($nombre_archivo, 0 ,$ult);
				                            $ext=substr($nombre_archivo, $ult);
				                            $nombre_archivo=$nom.$i.$ext;
				                        }
				                    }
				                    if (move_uploaded_file($_FILES['file_reuniones']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 
				                        $archivos=$nombre_archivo;
				                        echo "El archivo de reunion ha sido cargado correctamente."; 
				                    }else{ 
				                        echo "Ocurrió algún error al subir el archivo de reunion. No pudo guardarse."; 
				                    }
				                }

	                    		$sqlre="INSERT INTO comite_reuniones(`cve_comite`,`cve_parque`,`fecha_registro`,`evidencia`,`archivo`) VALUES ('".$cve_comite."','".$_POST['parque']."','".date('Y-m-d')."','".$_POST['evidencia_reunion']."','".$archivos."')";

                            	mysql_db_query("parquesa_ParquesAlegresWP",$sqlre);

	                    	}

                            $ren=$_POST['nreuniones'];

	                    /*}

	                    else{

	                    	if(count($_POST['fecha_reunion'])>0){

		                        foreach($_POST['fecha_reunion'] as $k=>$v){

		                            if($v!=""){

		                                $sqlre="INSERT INTO comite_reuniones(`cve_comite`,`cve_parque`,`fecha_registro`,`fecha_reunion`,`asistentes`) VALUES ('".$cve_comite."','".$_POST['parque']."','".date('Y-m-d')."','".$v."','".$_POST['num_asistentes'][$k]."')";

		                                    mysql_db_query("parquesa_ParquesAlegresWP",$sqlre);

		                                    $ren++;

		                            }

		                        }

		                    }	

	                    }*/

	                    if($ren<1){

	                        $reuniones=0;

	                    }

	                    elseif($ren<2){

	                        $reuniones=10;

	                    }

	                    else{

	                        $reuniones=20;

	                    }

	                    $opera=7;

	                    if($_POST['miem_comite']>1){

	                        $opera=14;

	                        if($_POST['miem_comite']>2){

	                            $opera=20;

	                        }

	                    }

	                    $proyecto=$_POST['proyecto'];

	                    $organiza=$_POST['organizac'];

	                }

	                else{

	                    $proyecto=0;

	                    $reuniones=0;

	                    $opera=0;

	                    $organiza=0;

	                    foreach($organizacion_comite as $key=>$value){

	                        $org.='0,';

	                    }

	                    $org=substr($org,0,-1);

	                    $sqlco="SElECT id FROM comite_parque WHERE cve_parque='".$_POST['parque']."'";

	                    $resco=mysql_query($sqlco);

	                    if(mysql_num_rows($resco)>0){

	                        $rowco=mysql_fetch_array($resco);

	                        $cve_comite=$rowco['id'];

	                        $sqlor="UPDATE comite_parque SET organizacion='".$org."' WHERE id='".$cve_comite."'";

	                        mysql_db_query("parquesa_ParquesAlegresWP",$sqlor);

	                    }

	                }

	                if(count($_POST['respint'])>0){

	                	$ningunresp=0;

	                	//if($_GET['ver']==1){

	                		foreach ($_POST['respint'] as $k => $v) {

		                		if($v==10){

		                			$ningunresp=1;

		                			$resparray="Ninguno";

		                			$respint=40;

		                		}

		                	}

		                	if($ningunresp==0){

		                		$resparray=implode(',',$_POST[respint]); 

			                    $respint=20;

			                    if(count($_POST['respint'])>4){

			                        $respint=0;

			                    }

		                	}

	                	/*}

	                	else{

		                	$resparray=implode(',',$_POST[respint]); 

		                    $respint=20;

		                    if(count($_POST['respint'])>4){

		                        $respint=0;

		                    }	

	                	}*/

	                }

	                else{

	                    $respint=40;

	                }

                    $respint=$_POST['respinsta'];

	                $limp=30;

	                if(count($_POST['limpio'])>0){

	                	foreach ($_POST['limpio'] as $k => $v) {

	                		if($v!=1){

	                			$limp=$limp-4.28;

	                		}

	                		$mantienelimpio.=$v.',';

	                	}

	                	$mantienelimpio = substr($mantienelimpio, 0, -1);

	                    $limpieza=$limp;

	                }

	                else{

	                    $mantienelimpio = array(0,0,0,0,0,0,0,0);

	                    $limpieza=30;

	                }

	                $limpieza=$_POST['limpieza'];

	                /*	$limpieza=$_POST['limpieza'];

	                    $respint=$_POST['respint'];

	                    $proyecto=$_POST['proyecto'];

	                    $reuniones=$_POST['reunion'];

	                    $organiza=$_POST['organiza'];

	                    $opera=$_POST['opera'];

	                    $mantienelimpio = array(0,0,0,0,0,0,0,0);

	                    $resparray=0;

	                */

	                $result = count($_POST[averdes]);

	                if($result>0){

	                    $coma=implode(',',$_POST[averdes]);   

	                }

	                //echo$coma;

	                $averdes21= array(1,2);//árbol y césped

	                $averdes22= array(1,3);//árbol y jardín

	                $averdes23= array(2,3);//césped y jardín

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

	                //if($_GET['ver']==1){

	                	if($_POST[eventos]!=""){

	                		$eventos=$_POST[eventos];

	                		if($_POST[eventos]=="50"){
	                			$nombre_archivo = $_FILES['file_calendario']['name']; 
				                $tipo_archivo = $_FILES['file_calendario']['type']; 
				                $tamano_archivo = $_FILES['file_calendario']['size']; 
				                //compruebo si las características del archivo son las que deseo 
				                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 
				                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
				                }else{*/ 
				                $uploads_dir = getcwd().'/calendarios';
				                if(count($_FILES['file_calendario']['name'])){
				                    foreach ($_FILES["file_calendario"]["error"] as $key => $error) {
				                        if ($error == UPLOAD_ERR_OK) {
				                            $tmp_name = $_FILES["file_calendario"]["tmp_name"][$key];
				                            // basename() puede evitar ataques de denegación de sistema de ficheros;
				                            // podría ser apropiada más validación/saneamiento del nombre del fichero
				                            $name = basename($_FILES["file_calendario"]["name"][$key]);
				                            $i=0;
				                            if(file_exists($uploads_dir."/".$name)){
				                                while(file_exists($uploads_dir."/".$name)){
				                                    $i++;
				                                    $ult=strrpos($name,".");
				                                    $nom=substr($name, 0 ,$ult);
				                                    $ext=substr($name, $ult);
				                                    $name=$nom.$i.$ext;
				                                }
				                            }
				                            if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){
				                                echo "El archivo de calendario ha sido cargado correctamente.";
				                                $archivos.=$name.',';
				                            }
				                            else{
				                                echo "Ocurrió algún error al subir el archivo de calendario. No pudo guardarse.";
				                            }
				                        }
				                    }
				                    $archivos = substr($archivos, 0, -1);
				                }
				                else{
				                    $i=0;
				                    if(file_exists($uploads_dir."/".$nombre_archivo)){
				                        while(file_exists($uploads_dir."/".$nombre_archivo)){
				                            $i++;
				                            $ult=strrpos($nombre_archivo,".");
				                            $nom=substr($nombre_archivo, 0 ,$ult);
				                            $ext=substr($nombre_archivo, $ult);
				                            $nombre_archivo=$nom.$i.$ext;
				                        }
				                    }
				                    if (move_uploaded_file($_FILES['file_calendario']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 
				                        $archivos=$nombre_archivo;
				                        echo "El archivo de calendario ha sido cargado correctamente."; 
				                    }else{ 
				                        echo "Ocurrió algún error al subir el archivo de calendario. No pudo guardarse."; 
				                    }
				                }
	                			$query1="INSERT INTO `evidencia_eventos`(`cve_parque`,`fecha_registro`, `evidencia`, `archivo`,`inicio_calendario`, `fin_calendario`) VALUES ('".$_POST['parque']."','".date("Y-m-d")."','".$_POST['evidencia_calendario']."','".$archivos."','".$_POST['inicio_calendario']."','".$_POST['fin_calendario']."')";
	                			

	                            mysql_db_query("parquesa_ParquesAlegresWP",$query1);

	                		}

	                	}

	                	if($_POST[neventosfc]!=""){

		                    $eventosr=$_POST[neventosfc];

		                }	

	                /*}

	                else{

		                /*if($_POST[eventos] || $_POST[eventosr]){

		                    $eventos=$_POST[eventos];

		                    $eventosr=$_POST[eventosr];

		                }

		                else{*/

	                /*    $calen=0;

	                    $evenr=0;

	                    foreach($_POST as $k=>$v){

	                        if(substr($k, 0, 13)=="fecha_eventoc"){

	                            if($v!=""){

	                                if($_POST['id_eventoc'][substr($k, 13, 1)]){

	                                    $query1="UPDATE `eventos_parques` SET `cve_parque`='$_POST[parque]',`asesor`='".trim($user->ID)."',`calendario`='1',`nombre`='".$_POST['nom_eventoc'][substr($k, 13, 1)]."',`fecha_cambio`='$v',`tipo`='".$_POST['tipo_eventoc'][substr($k, 13, 1)]."',`responsable`='".$_POST['contacto_evento'][substr($k, 13, 1)]."',`correo`='".$_POST['correo_contacto'][substr($k, 13, 1)]."',`estatus`='".$_POST['status_even'][substr($k, 13, 1)]."',`motivo`='".$_POST['motivo'][substr($k, 13, 1)]."',`fecha_calendario`='".$_POST['inicio_calendario']."' WHERE ID='".$_POST['id_eventoc'][substr($k, 13, 1)]."'";

	                                    if($_POST['status_even'][substr($k, 13, 1)]==2){

	                                        if($evenr<4){

	                                            $evenr++;

	                                        }

	                                    }

	                                }

	                                else{

	                                    $query1="INSERT INTO `eventos_parques`(`cve_parque`,`asesor`, `calendario`,`nombre`,`fecha_reg`, `fecha`, `tipo`, `responsable`,`correo`, `estatus`,`motivo`,`fecha_calendario`) VALUES ('$_POST[parque]','".trim($user->ID)."','1','".$_POST['nom_eventoc'][substr($k, 13, 1)]."','".date("Y-m-d")."','$v','".$_POST['tipo_eventoc'][substr($k, 13, 1)]."','".$_POST['contacto_evento'][substr($k, 13, 1)]."','".$_POST['correo_contacto'][substr($k, 13, 1)]."','1','".$_POST['motivo'][substr($k, 13, 1)]."','".$_POST['inicio_calendario']."')";

	                                }

	                                mysql_db_query("parquesa_ParquesAlegresWP",$query1);

	                                $calen++;

	                            }

	                        }

	                        if(substr($k, 0, 12)=="status_evenf"){

	                            if($_POST['id_eventof'][substr($k, 13, 1)]){

	                                $query1="UPDATE `eventos_parques` SET `cve_parque`='$_POST[parque]',`asesor`='".trim($user->ID)."',`calendario`='0',`nombre`='".$_POST['nom_eventof'][substr($k, 13, 1)]."',`fecha_cambio`='".$_POST['fecha_eventof'.substr($k, 12, 1)]."',`tipo`='".$_POST['tipo_eventof'][substr($k, 12, 1)]."',`responsable`='".$_POST['contacto_eventof'][substr($k, 12, 1)]."',`correo`='".$_POST['correo_contactof'][substr($k, 12, 1)]."',`estatus`='$v',`motivo`='".$_POST['motivof'][substr($k, 12, 1)]."',`fecha_calendario`='".$_POST['inicio_calendario']."' WHERE ID='".$_POST['id_eventof'][substr($k, 13, 1)]."'";

	                            }

	                            else{

	                                $query1="INSERT INTO `eventos_parques`(`cve_parque`,`asesor`, `calendario`,`nombre`,`fecha_reg`, `fecha`, `tipo`, `responsable`,`correo`, `estatus`,`motivo`,`fecha_calendario`) VALUES ('$_POST[parque]','".trim($user->ID)."','0','".$_POST['nom_eventof'][substr($k, 12, 1)]."','".date("Y-m-d")."','".$_POST['fecha_eventof'.substr($k, 12, 1)]."','".$_POST['tipo_eventof'][substr($k, 12, 1)]."','".$_POST['contacto_eventof'][substr($k, 12, 1)]."','".$_POST['correo_contactof'][substr($k, 12, 1)]."','$v','".$_POST['motivof'][substr($k, 12, 1)]."','".$_POST['inicio_calendario']."')";

	                            }

	                            mysql_db_query("parquesa_ParquesAlegresWP",$query1);

	                            if($v==2){

	                                if($evenr<4){

	                                    $evenr++;

	                                }

	                            }

	                        }

	                    }

	                    if($calen>=4){

	                        $eventos=50;

	                    }

	                    else{

	                        $eventos=0;

	                    }

	                    if($evenr!=0){

	                        $eventosr=($evenr*50)/4;

	                    }

	                    else{

	                        $eventosr=0;

	                    }

	                }*/

	                $cal=$opera+$formal+$organiza+$reuniones+$proyecto+$disenio+$ejecutivo+$vespacio+$_POST[instalaciones]+$_POST[estado]+$_POST[ingresop]+$_POST[ingresadop]+$_POST[mancomunado]+$eventos+$eventosr+$averdes1+$_POST[estaver]+$_POST[gente]+$limpieza+$_POST[orden]+$respint;

	                $cal=$cal/7;

	                $sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`opera`, `formaliza`, `tipoformaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`,`vespacio`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `limpieza`, `mantienelimpio`, `orden`, `respint`, `respintdetalle`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$opera."','$formal','$_POST[formaliza]','".$organiza."','".$reuniones."','".$proyecto."','$disenio','$ejecutivo','$vespacio','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$eventos','$eventosr','$averdes1','$_POST[estaver]','$_POST[gente]','$limpieza','$mantienelimpio','$_POST[orden]','$respint','".$resparray."')";

	                //,'$_POST[semana]','$_POST[finsem]' `semana`, `finsem`,

	                //`riego`,'$riego',

	                //`gente`, `diario`,

	                //'$gente','$diario',

	                //echo $sSQL;

	                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);

	                $id_visita=mysql_insert_id();

	                if($_POST[long]!=""){

	                    $sSQL55="INSERT INTO `coordenadas_visita`(`cve_parque`, `longitud`,`latitud`,`cve_visita`) VALUES ('$_POST[parque]','$_POST[long]','$_POST[lati]','".$id_visita."')";

	                    //echo $sSQL55;

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL55);

	                }

	                $sSQL1="INSERT INTO `wp_visitascom_parques`(`cve_parque`, `cve_visita`,`tipo_visita`,clasvisita) VALUES ('$_POST[parque]','".$id_visita."','".$visita[$_POST['visita']]."','".$_POST['clasvisita']."')";

	                //echo $sSQL1;

	                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL1);

	                if($_POST['clasvisita']==18){

	                    $sSQL="INSERT INTO `wp_visitas_reforzamiento`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`motivo_visita`,`logro`,`otro`,`cve_parametros`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$_POST['clasvisita']."','".$_POST['logro']."','".$_POST['otroclas']."','".$id_visita."')";

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);

	                }

	                else{

	                    $sSQL="INSERT INTO `wp_visitas_reforzamiento`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`motivo_visita`,`logro`,`cve_parametros`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$_POST['clasvisita']."','".$_POST['logro']."','".$id_visita."')";

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);    

	                }

                    //if($stat>0){

                        if(count($_POST['asist'])>0){

                            foreach ($_POST['asist'] as $k => $v) {

                                $sSQL5="INSERT INTO `comite_asistencia`(`cve_comite`,`fecha`,`fecha_visita`,`miembro`) VALUES ('".$cve_comite."','".$fec."','".$_POST['fecha_visita']."','".$v."')";

                                //echo $sSQL5.'<br>';

                                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);

                            }

                        }

                    //}

	                echo'<p align="center">';

	                echo'Visita guardada';

	                echo'</p>';

	                $sql005="SELECT c.nombre, c.email, c.contacto FROM comite_miembro c INNER JOIN comite_parque c2 ON c.cve_comite = c2.id WHERE c2.cve_parque='".$_POST['parque']."' and c.contacto='1'";

	                $res005=mysql_query($sql005);

	                $row005=mysql_fetch_array($res005);

	                $to="";

	                if($row005['email']!=""){

	                    $to=$row005['email'];

	                    $nombre=$row005['nombre'];

	                }

	                /*else{

	                    $to="gudart@gmail.com";    

	                }*/

	                $link=get_permalink($_POST['parque']).'?utm_source=newsletter&utm_medium=email&utm_campaign=calificacion_visita';

	                $email="contacto@parquesalegres.org";

	                $headers = "From: " . $email . "\r\n";

	                $headers .= "MIME-Version: 1.0\r\n";

	                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 

	                $subject = "Calificación de tu parque ".$parque[$_POST['parque']]; 

	                $message = '<html><body><h2>¡Hola '.$nombre.'!</h2><p>La calificación de tu parque es: <b>'.round($cal).'</b>';

	                $message .= '<br><br>Entra a tu parque y ve todos los detalles: <a href="'.$link.'" target="_blank">'.get_permalink($_POST['parque']).'</a>';

	                $message .= "<br><br>Ayúdanos a mejorar, envía tus comentarios y sugerencias a: contacto@parquesalegres.org<br><br></p><center><h3>¡Gracias por tu gran labor para tener espacios más agradables para todos!</h3>";

	                $message .= "<br><br><img src='http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png'></center></body></html>";

	                if($to!=""){

	                    mail($to, $subject, $message, $headers);

	                }

	                if($_POST['needcom']=="si"){

		                $_POST['cmd']=3;

		            }

            	}

            	else{

            		if($_POST['clasvisita']==18){

	                    $sSQL="INSERT INTO `wp_visitas_reforzamiento`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`motivo_visita`,`logro`,`otro`,`cve_parametros`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$_POST['clasvisita']."','".$_POST['logro']."','".$_POST['otroclas']."','".$id_visita."')";

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);

	                }

	                else{

	                    $sSQL="INSERT INTO `wp_visitas_reforzamiento`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`motivo_visita`,`logro`,`cve_parametros`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$_POST['clasvisita']."','".$_POST['logro']."','".$id_visita."')";

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);    

	                }

	                $id_visita=mysql_insert_id();

	                if($_POST[long]!=""){

	                    $sSQL55="INSERT INTO `coordenadas_visita`(`cve_parque`, `longitud`,`latitud`,`cve_visita`) VALUES ('$_POST[parque]','$_POST[long]','$_POST[lati]','".$id_visita."')";

	                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL55);

	                }

                    //if($stat>0){

                        if(count($_POST['asist'])>0){

                            $csql="SELECT id FROM comite_parque where cve_parque='".$_POST['parque']."'";

                            $cres=mysql_query($csql);

                            if(mysql_num_rows($cres)>0){

                                $crow=mysql_fetch_array($cres);

                                $cve_comite=$crow['id'];

                            }

                            foreach ($_POST['asist'] as $k => $v) {

                                $sSQL5="INSERT INTO `comite_asistencia`(`cve_comite`,`fecha`,`fecha_visita`,`miembro`) VALUES ('".$cve_comite."','".$fec."','".$_POST['fecha_visita']."','".$v."')";

                                //echo $sSQL5.'<br>';

                                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);

                            }

                        }

                    //}

	                echo'<p align="center">';

	                echo'Visita guardada';

	                echo'</p>';

            	}

            }

            elseif($_POST['visita']=="standby"){

                $sSQL="INSERT INTO `wp_visitas_standby`(`cve_parque`,`asesor_captura`, `fecha_captura`,`fecha_visita`,`clasificacion`,`medio`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','".$_POST['fecha_visita']."','".$_POST['clasvisita']."','".$_POST['medio']."')";

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);

                echo'<p align="center">';

                echo'Visita guardada';

                echo'</p>';

            }

            else{

                $opera=0;

                if($_POST['miem_comite']>0){

                    $sum=0;

                    $org="";

                    if(count($_POST['organiza'])>0){

                        foreach($organizacion_comite as $key=>$value){

                            $entro=0;

                            foreach($_POST['organiza'] as $k=>$v){

                                if($v==$key){

                                    $sum=$sum+$value;

                                    $org.='1,';

                                    $entro=1;

                                }

                            }

                            if($entro!=1){

                                $org.='0,';

                            }

                        }

                    }

                    else{

                        foreach($organizacion_comite as $key=>$value){

                            $org.='0,';

                        }

                    }

                    $org=substr($org,0,-1);

                    $sqlco="SElECT id FROM comite_parque WHERE cve_parque='".$_POST['parque']."'";

                    $resco=mysql_query($sqlco);

                    if(mysql_num_rows($resco)>0){

                        $rowco=mysql_fetch_array($resco);

                        $cve_comite=$rowco['id'];

                        $sqlor="UPDATE comite_parque SET organizacion='".$org."' WHERE id='".$cve_comite."'";

                        mysql_db_query("parquesa_ParquesAlegresWP",$sqlor);

                    }

                    $ren=0;

                    //if($_GET['ver']==1){

                    	if($_POST['nreuniones']!="" && $_POST['nreuniones']!=0){
                    		$nombre_archivo = $_FILES['file_reuniones']['name']; 
			                $tipo_archivo = $_FILES['file_reuniones']['type']; 
			                $tamano_archivo = $_FILES['file_reuniones']['size']; 
			                //compruebo si las características del archivo son las que deseo 
			                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 
			                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
			                }else{*/ 
			                $uploads_dir = getcwd().'/reuniones';
			                if(count($_FILES['file_reuniones']['name'])){
			                    foreach ($_FILES["file_reuniones"]["error"] as $key => $error) {
			                        if ($error == UPLOAD_ERR_OK) {
			                            $tmp_name = $_FILES["file_reuniones"]["tmp_name"][$key];
			                            // basename() puede evitar ataques de denegación de sistema de ficheros;
			                            // podría ser apropiada más validación/saneamiento del nombre del fichero
			                            $name = basename($_FILES["file_reuniones"]["name"][$key]);
			                            $i=0;
			                            if(file_exists($uploads_dir."/".$name)){
			                                while(file_exists($uploads_dir."/".$name)){
			                                    $i++;
			                                    $ult=strrpos($name,".");
			                                    $nom=substr($name, 0 ,$ult);
			                                    $ext=substr($name, $ult);
			                                    $name=$nom.$i.$ext;
			                                }
			                            }
			                            if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){
			                                echo "El archivo de reunion ha sido cargado correctamente.";
			                                $archivos.=$name.',';
			                            }
			                            else{
			                                echo "Ocurrió algún error al subir el archivo de reunion. No pudo guardarse.";
			                            }
			                        }
			                    }
			                    $archivos = substr($archivos, 0, -1);
			                }
			                else{
			                    $i=0;
			                    if(file_exists($uploads_dir."/".$nombre_archivo)){
			                        while(file_exists($uploads_dir."/".$nombre_archivo)){
			                            $i++;
			                            $ult=strrpos($nombre_archivo,".");
			                            $nom=substr($nombre_archivo, 0 ,$ult);
			                            $ext=substr($nombre_archivo, $ult);
			                            $nombre_archivo=$nom.$i.$ext;
			                        }
			                    }
			                    if (move_uploaded_file($_FILES['file_reuniones']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 
			                        $archivos=$nombre_archivo;
			                        echo "El archivo de reunion ha sido cargado correctamente."; 
			                    }else{ 
			                        echo "Ocurrió algún error al subir el archivo de reunion. No pudo guardarse."; 
			                    }
			                }

                    		$sqlre="INSERT INTO comite_reuniones(`cve_comite`,`cve_parque`,`fecha_registro`,`evidencia`,`archivo`) VALUES ('".$cve_comite."','".$_POST['parque']."','".date('Y-m-d')."','".$_POST['evidencia_reunion']."','".$archivos."')";

                        	mysql_db_query("parquesa_ParquesAlegresWP",$sqlre);

                    	}

                        $ren=$_POST['nreuniones'];

                    /*}

                    else{

                    	if(count($_POST['fecha_reunion'])>0){

	                        foreach($_POST['fecha_reunion'] as $k=>$v){

	                            if($v!=""){

	                                $sqlre="INSERT INTO comite_reuniones(`cve_comite`,`cve_parque`,`fecha_registro`,`fecha_reunion`,`asistentes`) VALUES ('".$cve_comite."','".$_POST['parque']."','".date('Y-m-d')."','".$v."','".$_POST['num_asistentes'][$k]."')";

	                                    mysql_db_query("parquesa_ParquesAlegresWP",$sqlre);

	                                    $ren++;

	                            }

	                        }

	                    }	

                    }*/

                    if($ren<1){

                        $reuniones=0;

                    }

                    elseif($ren<2){

                        $reuniones=10;

                    }

                    else{

                        $reuniones=20;

                    }

                    $opera=7;

                    if($_POST['miem_comite']>1){

                        $opera=14;

                        if($_POST['miem_comite']>2){

                            $opera=20;

                        }

                    }

                    $proyecto=$_POST['proyecto'];

                    $organiza=$_POST['organizac'];

                }

                else{

                    $proyecto=0;

                    $reuniones=0;

                    $opera=0;

                    $organiza=0;

                    foreach($organizacion_comite as $key=>$value){

                        $org.='0,';

                    }

                    $org=substr($org,0,-1);

                    $sqlco="SElECT id FROM comite_parque WHERE cve_parque='".$_POST['parque']."'";

                    $resco=mysql_query($sqlco);

                    if(mysql_num_rows($resco)>0){

                        $rowco=mysql_fetch_array($resco);

                        $cve_comite=$rowco['id'];

                        $sqlor="UPDATE comite_parque SET organizacion='".$org."' WHERE id='".$cve_comite."'";

                        mysql_db_query("parquesa_ParquesAlegresWP",$sqlor);

                    }

                }

                if(count($_POST['respint'])>0){

                	$ningunresp=0;

                	//if($_GET['ver']==1){

                		foreach ($_POST['respint'] as $k => $v) {

	                		if($v==10){

	                			$ningunresp=1;

	                			$respint=40;

	                		}

	                	}

	                	if($ningunresp==0){

	                		$resparray=implode(',',$_POST[respint]); 

		                    $respint=20;

		                    if(count($_POST['respint'])>4){

		                        $respint=0;

		                    }

	                	}

                	/*}

                	else{

	                	$resparray=implode(',',$_POST[respint]); 

	                    $respint=20;

	                    if(count($_POST['respint'])>4){

	                        $respint=0;

	                    }	

                	}*/

                }

                else{

                    $respint=40;

                }

                $respint=$_POST['respinsta'];

                $limp=30;

                if(count($_POST['limpio'])>0){

                	foreach ($_POST['limpio'] as $k => $v) {

                		if($v!=1){

                			$limp=$limp-4.28;

                		}

                		$mantienelimpio.=$v.',';

                	}

                	$mantienelimpio = substr($mantienelimpio, 0, -1);

                    $limpieza=$limp;

                }

                else{

                    $mantienelimpio = array(0,0,0,0,0,0,0,0);

                    $limpieza=30;

                }

                $limpieza=$_POST['limpieza'];

                /*	$limpieza=$_POST['limpieza'];

                    $respint=$_POST['respint'];

                    $proyecto=$_POST['proyecto'];

                    $reuniones=$_POST['reunion'];

                    $organiza=$_POST['organiza'];

                    $opera=$_POST['opera'];

                    $mantienelimpio = array(0,0,0,0,0,0,0,0);

                    $resparray=0;

                */

                $result = count($_POST[averdes]);

                if($result>0){

                    $coma=implode(',',$_POST[averdes]);   

                }

                //echo$coma;

                $averdes21= array(1,2);//árbol y césped

                $averdes22= array(1,3);//árbol y jardín

                $averdes23= array(2,3);//césped y jardín

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

                //if($_GET['ver']==1){

                	if($_POST[eventos]!=""){

                		$eventos=$_POST[eventos];

                		if($_POST[eventos]=="50"){
                			$nombre_archivo = $_FILES['file_calendario']['name']; 
			                $tipo_archivo = $_FILES['file_calendario']['type']; 
			                $tamano_archivo = $_FILES['file_calendario']['size']; 
			                //compruebo si las características del archivo son las que deseo 
			                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 
			                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
			                }else{*/ 
			                $uploads_dir = getcwd().'/calendarios';
			                if(count($_FILES['file_calendario']['name'])){
			                    foreach ($_FILES["file_calendario"]["error"] as $key => $error) {
			                        if ($error == UPLOAD_ERR_OK) {
			                            $tmp_name = $_FILES["file_calendario"]["tmp_name"][$key];
			                            // basename() puede evitar ataques de denegación de sistema de ficheros;
			                            // podría ser apropiada más validación/saneamiento del nombre del fichero
			                            $name = basename($_FILES["file_calendario"]["name"][$key]);
			                            $i=0;
			                            if(file_exists($uploads_dir."/".$name)){
			                                while(file_exists($uploads_dir."/".$name)){
			                                    $i++;
			                                    $ult=strrpos($name,".");
			                                    $nom=substr($name, 0 ,$ult);
			                                    $ext=substr($name, $ult);
			                                    $name=$nom.$i.$ext;
			                                }
			                            }
			                            if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){
			                                echo "El archivo de calendario ha sido cargado correctamente.";
			                                $archivos.=$name.',';
			                            }
			                            else{
			                                echo "Ocurrió algún error al subir el archivo de calendario. No pudo guardarse.";
			                            }
			                        }
			                    }
			                    $archivos = substr($archivos, 0, -1);
			                }
			                else{
			                    $i=0;
			                    if(file_exists($uploads_dir."/".$nombre_archivo)){
			                        while(file_exists($uploads_dir."/".$nombre_archivo)){
			                            $i++;
			                            $ult=strrpos($nombre_archivo,".");
			                            $nom=substr($nombre_archivo, 0 ,$ult);
			                            $ext=substr($nombre_archivo, $ult);
			                            $nombre_archivo=$nom.$i.$ext;
			                        }
			                    }
			                    if (move_uploaded_file($_FILES['file_calendario']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 
			                        $archivos=$nombre_archivo;
			                        echo "El archivo de calendario ha sido cargado correctamente."; 
			                    }else{ 
			                        echo "Ocurrió algún error al subir el archivo de calendario. No pudo guardarse."; 
			                    }
			                }
                			$query1="INSERT INTO `evidencia_eventos`(`cve_parque`,`fecha_registro`, `evidencia`, `archivo`,`inicio_calendario`, `fin_calendario`) VALUES ('".$_POST['parque']."','".date("Y-m-d")."','".$_POST['evidencia_calendario']."','".$archivos."','".$_POST['inicio_calendario']."','".$_POST['fin_calendario']."')";
                			

                            mysql_db_query("parquesa_ParquesAlegresWP",$query1);

                		}

                	}

                	if($_POST[neventosfc]!=""){

	                    $eventosr=$_POST[neventosfc];

	                }	

                /*}

                else{

                /*if($_POST[eventos] || $_POST[eventosr]){

                    $eventos=$_POST[eventos];

                    $eventosr=$_POST[eventosr];

                }

                else{*/

                /*    $calen=0;

                    $evenr=0;

                    foreach($_POST as $k=>$v){

                        if(substr($k, 0, 13)=="fecha_eventoc"){

                            if($v!=""){

                                if($_POST['id_eventoc'][substr($k, 13, 1)]){

                                    $query1="UPDATE `eventos_parques` SET `cve_parque`='$_POST[parque]',`asesor`='".trim($user->ID)."',`calendario`='1',`nombre`='".$_POST['nom_eventoc'][substr($k, 13, 1)]."',`fecha_cambio`='$v',`tipo`='".$_POST['tipo_eventoc'][substr($k, 13, 1)]."',`responsable`='".$_POST['contacto_evento'][substr($k, 13, 1)]."',`correo`='".$_POST['correo_contacto'][substr($k, 13, 1)]."',`estatus`='".$_POST['status_even'][substr($k, 13, 1)]."',`motivo`='".$_POST['motivo'][substr($k, 13, 1)]."',`fecha_calendario`='".$_POST['inicio_calendario']."' WHERE ID='".$_POST['id_eventoc'][substr($k, 13, 1)]."'";

                                    if($_POST['status_even'][substr($k, 13, 1)]==2){

                                        if($evenr<4){

                                            $evenr++;

                                        }

                                    }

                                }

                                else{

                                    $query1="INSERT INTO `eventos_parques`(`cve_parque`,`asesor`, `calendario`,`nombre`,`fecha_reg`, `fecha`, `tipo`, `responsable`,`correo`, `estatus`,`motivo`,`fecha_calendario`) VALUES ('$_POST[parque]','".trim($user->ID)."','1','".$_POST['nom_eventoc'][substr($k, 13, 1)]."','".date("Y-m-d")."','$v','".$_POST['tipo_eventoc'][substr($k, 13, 1)]."','".$_POST['contacto_evento'][substr($k, 13, 1)]."','".$_POST['correo_contacto'][substr($k, 13, 1)]."','1','".$_POST['motivo'][substr($k, 13, 1)]."','".$_POST['inicio_calendario']."')";

                                }

                                mysql_db_query("parquesa_ParquesAlegresWP",$query1);

                                $calen++;

                            }

                        }

                        if(substr($k, 0, 12)=="status_evenf"){

                            if($_POST['id_eventof'][substr($k, 13, 1)]){

                                $query1="UPDATE `eventos_parques` SET `cve_parque`='$_POST[parque]',`asesor`='".trim($user->ID)."',`calendario`='0',`nombre`='".$_POST['nom_eventof'][substr($k, 13, 1)]."',`fecha_cambio`='".$_POST['fecha_eventof'.substr($k, 12, 1)]."',`tipo`='".$_POST['tipo_eventof'][substr($k, 12, 1)]."',`responsable`='".$_POST['contacto_eventof'][substr($k, 12, 1)]."',`correo`='".$_POST['correo_contactof'][substr($k, 12, 1)]."',`estatus`='$v',`motivo`='".$_POST['motivof'][substr($k, 12, 1)]."',`fecha_calendario`='".$_POST['inicio_calendario']."' WHERE ID='".$_POST['id_eventof'][substr($k, 13, 1)]."'";

                            }

                            else{

                                $query1="INSERT INTO `eventos_parques`(`cve_parque`,`asesor`, `calendario`,`nombre`,`fecha_reg`, `fecha`, `tipo`, `responsable`,`correo`, `estatus`,`motivo`,`fecha_calendario`) VALUES ('$_POST[parque]','".trim($user->ID)."','0','".$_POST['nom_eventof'][substr($k, 12, 1)]."','".date("Y-m-d")."','".$_POST['fecha_eventof'.substr($k, 12, 1)]."','".$_POST['tipo_eventof'][substr($k, 12, 1)]."','".$_POST['contacto_eventof'][substr($k, 12, 1)]."','".$_POST['correo_contactof'][substr($k, 12, 1)]."','$v','".$_POST['motivof'][substr($k, 12, 1)]."','".$_POST['inicio_calendario']."')";

                            }

                            mysql_db_query("parquesa_ParquesAlegresWP",$query1);

                            if($v==2){

                                if($evenr<4){

                                    $evenr++;

                                }

                            }

                        }

                    }

                    if($calen>=4){

                        $eventos=50;

                    }

                    else{

                        $eventos=0;

                    }

                    if($evenr!=0){

                        $eventosr=($evenr*50)/4;

                    }

                    else{

                        $eventosr=0;

                    }

                }*/

                $cal=$opera+$formal+$organiza+$reuniones+$proyecto+$disenio+$ejecutivo+$vespacio+$_POST[instalaciones]+$_POST[estado]+$_POST[ingresop]+$_POST[ingresadop]+$_POST[mancomunado]+$eventos+$eventosr+$averdes1+$_POST[estaver]+$_POST[gente]+$limpieza+$_POST[orden]+$respint;

                $cal=$cal/7;

                $sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`,`asesor_captura`, `fec`,`fecha_visita`,`opera`, `formaliza`, `tipoformaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`,`vespacio`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `limpieza`, `mantienelimpio`, `orden`, `respint`, `respintdetalle`) VALUES ('$_POST[parque]','".trim($user->ID)."','$fec','$_POST[fecha_visita]','".$opera."','$formal','$_POST[formaliza]','".$organiza."','".$reuniones."','".$proyecto."','$disenio','$ejecutivo','$vespacio','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$eventos','$eventosr','$averdes1','$_POST[estaver]','$_POST[gente]','$limpieza','$mantienelimpio','$_POST[orden]','$respint','".$resparray."')";

                //,'$_POST[semana]','$_POST[finsem]' `semana`, `finsem`,

                //`riego`,'$riego',

                //`gente`, `diario`,

                //'$gente','$diario',

                //echo $sSQL;

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);

                $id_visita=mysql_insert_id();

                if($_POST[long]!=""){

                    $sSQL55="INSERT INTO `coordenadas_visita`(`cve_parque`, `longitud`,`latitud`,`cve_visita`) VALUES ('$_POST[parque]','$_POST[long]','$_POST[lati]','".$id_visita."')";

                    //echo $sSQL55;

                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL55);

                }

                $sSQL1="INSERT INTO `wp_visitascom_parques`(`cve_parque`, `cve_visita`,`tipo_visita`,clasvisita) VALUES ('$_POST[parque]','".$id_visita."','".$visita[$_POST['visita']]."','".$_POST['clasvisita']."')";

                //echo $sSQL1;

                //if($stat>0){

                    if($_POST['visita']=="seguimiento"){

                        if(count($_POST['asist'])>0){

                            foreach ($_POST['asist'] as $k => $v) {

                                $sSQL5="INSERT INTO `comite_asistencia`(`cve_comite`,`fecha`,`fecha_visita`,`miembro`) VALUES ('".$cve_comite."','".$fec."','".$_POST['fecha_visita']."','".$v."')";

                                //echo $sSQL5.'<br>';

                                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);

                            }

                        }

                    }

                //}

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL1);

                echo'<p align="center">';

                echo'Visita guardada';

                echo'</p>';

                $sql005="SELECT c.nombre, c.email, c.contacto FROM comite_miembro c INNER JOIN comite_parque c2 ON c.cve_comite = c2.id WHERE c2.cve_parque='".$_POST['parque']."' and c.contacto='1'";

                $res005=mysql_query($sql005);

                $row005=mysql_fetch_array($res005);

                $to="";

                if($row005['email']!=""){

                    $to=$row005['email'];

                    $nombre=$row005['nombre'];

                }

                /*else{

                    $to="gudart@gmail.com";    

                }*/

                $link=get_permalink($_POST['parque']).'?utm_source=newsletter&utm_medium=email&utm_campaign=calificacion_visita';

                $email="contacto@parquesalegres.org";

                $headers = "From: " . $email . "\r\n";

                $headers .= "MIME-Version: 1.0\r\n";

                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 

                $subject = "Calificación de tu parque ".$parque[$_POST['parque']]; 

                $message = '<html><body><h2>¡Hola '.$nombre.'!</h2><p>La calificación de tu parque es: <b>'.round($cal).'</b>';

                $message .= '<br><br>Entra a tu parque y ve todos los detalles: <a href="'.$link.'" target="_blank">'.get_permalink($_POST['parque']).'</a>';

                $message .= "<br><br>Ayúdanos a mejorar, envía tus comentarios y sugerencias a: contacto@parquesalegres.org<br><br></p><center><h3>¡Gracias por tu gran labor para tener espacios más agradables para todos!</h3>";

                $message .= "<br><br><img src='http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png'></center></body></html>";

                if($to!=""){

                    mail($to, $subject, $message, $headers);

                }

                if($_POST['needcom']=="si"){

	                $_POST['cmd']=3;

	            }   

            }

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

    if($_POST['cmd']==3){

        if($_POST['parque']>0){

            $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";

            $ress=mysql_query($sqll);

            $rowz=mysql_fetch_array($ress);

            $sSQL8="UPDATE wp_visitascom_parques SET opera='$_POST[comopera]', formaliza='$_POST[comformaliza]', organiza='$_POST[comorganiza]', reunion='$_POST[comreunion]', proyecto='$_POST[comproyecto]', disenio='$_POST[comdisenio]', ejecutivo='$_POST[comejecutivo]', vespacio='$_POST[comvespacio]', instalaciones='$_POST[cominstalaciones]', estado='$_POST[comestado]', ingresop='$_POST[comingresop]', ingresadop='$_POST[comingresadop]', mancomunado='$_POST[commancomunado]', eventos='$_POST[comeventos]', eventosr='$_POST[comeventosr]', averdes='$_POST[comaverdes]', estaver='$_POST[comestaver]', gente='$_POST[comgente]', limpieza='$_POST[comlimpieza]', orden='$_POST[comorden]', respint='$_POST[comrespint]', genvisita='$_POST[comgenvisita]' WHERE cve_visita='".$rowz['cve']."'";

            //echo $sSQL8.'<br>';

            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL8);

            //if($_GET['ver']==1){
            	if($_POST['parametro_compromiso1']!=""){
            		if($_POST['compromiso_solidario1']==11 || $_POST['compromiso_solidario1']==12 || $_POST['compromiso_solidario1']==13 || $_POST['compromiso_solidario1']==14 || $_POST['compromiso_solidario1']==84 || $_POST['compromiso_solidario1']==85 || $_POST['compromiso_solidario1']==86){
            			$compromiso_final=$_POST['compromiso_solidario1'].','.$_POST['compest_solidario1'];
            		}
            		else{
            			$compromiso_final=$_POST['compromiso_solidario1'];
            		}
					$sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro ,compromiso, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".$_POST['parametro_compromiso1']."','".$compromiso_final."',1)";
					mysql_db_query("parquesa_ParquesAlegresWP",$sSQL9);
					$entro=1;
            	}
            	if($_POST['parametro_compromiso2']!=""){
            		if($_POST['compromiso_solidario2']==11 || $_POST['compromiso_solidario2']==12 || $_POST['compromiso_solidario2']==13 || $_POST['compromiso_solidario2']==14 || $_POST['compromiso_solidario2']==84 || $_POST['compromiso_solidario2']==85 || $_POST['compromiso_solidario2']==86){
            			$compromiso_final=$_POST['compromiso_solidario2'].','.$_POST['compest_solidario2'];
            		}
            		else{
            			$compromiso_final=$_POST['compromiso_solidario2'];
            		}
					$sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro ,compromiso, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".$_POST['parametro_compromiso2']."','".$compromiso_final."',1)";
					mysql_db_query("parquesa_ParquesAlegresWP",$sSQL9);
					$entro=1;
            	}
            	if($_POST['parametro_compromiso3']!=""){
            		if($_POST['compromiso_solidario3']==11 || $_POST['compromiso_solidario3']==12 || $_POST['compromiso_solidario3']==13 || $_POST['compromiso_solidario3']==14 || $_POST['compromiso_solidario3']==84 || $_POST['compromiso_solidario3']==85 || $_POST['compromiso_solidario3']==86){
            			$compromiso_final=$_POST['compromiso_solidario3'].','.$_POST['compest_solidario3'];
            		}
            		else{
            			$compromiso_final=$_POST['compromiso_solidario3'];
            		}
					$sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro ,compromiso, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".$_POST['parametro_compromiso3']."','".$compromiso_final."',1)";
					mysql_db_query("parquesa_ParquesAlegresWP",$sSQL9);
					$entro=1;
            	}

            /*}

            else{

	            foreach($_POST as $k=>$v){

	                if(substr($k, 0, 4)=="meta"){

	                    if($_POST['comp'.substr($k, 5)]!=""){

	                        if(substr($k, 5)=="instalaciones"){

	                            $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compinstal']."','".$v."','".$_POST['cumplimiento_'.substr($k, 5)]."',1)";

	                        }

	                        else if(substr($k, 5)=="estado"){

	                            $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compest']."','".$v."','".$_POST['cumplimiento_'.substr($k, 5)]."',1)";

	                        }

	                        else if(substr($k, 5)=="eventosr"){

	                            $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)].",".$_POST['compevent']."','".$v."','".$_POST['cumplimiento_'.substr($k, 5)]."',1)";

	                        }

	                        else{

	                            $sSQL9="INSERT INTO compromisos(cve_parque, cve_visita, parametro, compromiso, meta, fecha_cumplimiento, estatus) VALUES ('".$_POST['parque']."','".$rowz['cve']."','".substr($k, 5)."','".$_POST['comp'.substr($k, 5)]."','".$v."','".$_POST['cumplimiento_'.substr($k, 5)]."',1)";

	                        }

	                        $entro=1;

	                        //echo $sSQL9.'<br>';

	                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL9);

	                    }

	                }

	            }	

            }*/

            if($entro==1){

                class PDF extends FPDF{

                    // Page header

                    function Header(){

                        // Logo

                        $this->SetFont('Arial','',9);

                        // Title

                        $this->Image('logopa.png',150,8,30,20);

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

                $pdf->SetX(105);

                $pdf->Cell(50,5,'Culiacán, Sin. a____ de_____________ del_______.',0,1);

                $pdf->SetXY(135,30);

                $pdf->Cell(30,5,$dia,0,1);

                $pdf->SetXY(147,30);

                $pdf->Cell(29,5,$mes,0,1,'C');

                $pdf->SetXY(179,30);

                $pdf->Cell(29,5,$ano,0,1,'C');

                $pdf->Ln(30);

                $pdf->MultiCell(0,7,"Por medio del presente, el comité del parque ____________________________________________________ de la colonia ______________________________________________________, ubicado entre las calles __________________________________________________________, Nos comprometemos a realizar las actividades siguientes. ",0,'J');

                $pdf->MultiCell(0,7,"___________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________

        Dichos acuerdos para llevarlos a cabo a la fecha de ______________________, sabiendo lo importante que es el cumplimiento de estos compromisos solidarios para el desarrollo de nuestro espacio público. Con el cumplimiento de estos acuerdos nuestro espacio público aumentaría en puntaje de parámetros.


        Nota. Es importante cuidar los avances con los que ya contamos, para que nuestra calificación sea favorable en nuestra siguiente visita. 

            ",0,'J');

                $pdf->SetFont('Arial','BU',11);

                $pdf->Ln(10);

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

                            if($comp[1]==111){

                                $namee="Instalaciones";

                            }

                            if($comp[1]==112){

                                $namee="Deportiva";

                            }

                            if($comp[1]==113){

                                $namee="Áreas de esparcimiento";

                            }

                            if($comp[1]==114){

                                $namee="Áreas verdes";

                            }

                            

                        }

                        $cellwidth=$pdf->GetStringWidth($compromisos[$comp[0]].': '.$namee);

                        if($c+$cellwidth>=177){

                            $h=$h+7;

                            $c=0;

                        }

                        if($h<20){

                            $pdf->SetXY(13+$c,93+$h);

                            $pdf->Cell($cellwidth,5,' '.$compromisos[$comp[0]].': '.$namee.' ',0,0,'C');

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

                $pdf->SetXY(112,122);
                $fecha_cumpl=$rowz['fecha_visita'];
                $fecha_cumpl = date('Y-m-d', strtotime("+1 month", strtotime($fecha_cumpl)));
                $fecha_cum_fin=explode("-", $fecha_cumpl);
                $pdf->Cell(50,5,$fecha_cum_fin[2].' de '.$meses[$fecha_cum_fin[1]].' del '.$fecha_cum_fin[0],0,1,'C');

                $pdf->SetXY(145,129);

                //$pdf->Cell(9,5,$_POST['totalvis'],0,1,'C');

                $pdf->SetXY(162,129);

                //$pdf->Cell(9,5,$_POST['totalmeta'],0,1,'C');

                $sql005="SELECT c.email,c.contacto FROM comite_miembro c INNER JOIN comite_parque c2 ON c.cve_comite = c2.id WHERE c2.cve_parque='".$_POST['parque']."' and c.contacto='1'";

                $res005=mysql_query($sql005);

                $row005=mysql_fetch_array($res005);

                $to="";

                if($row005['email']!=""){

                    $to=$row005['email'];

                }

                /*else{

                    $to="gudart@gmail.com";    

                }*/

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

                if($to!=""){

                    mail($to, $subject, $body, $headers);

                }

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

    <title>PA:'.$parquen.'</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

    <link type="text/css" rel="stylesheet" href="qtip/jquery.qtip.min.css" />

    <link type="text/css" rel="stylesheet" href="slideout-0.1.9/index.css" />

    ';

    //if($_GET['ver']==1){ 

    	echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="slideout-0.1.9/dist/slideout.min.js"></script>	

    	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>';

	//}

	echo '<script src="http://code.jquery.com/jquery-1.8.3.js"></script>

	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

    <script type="text/javascript" src="qtip/jquery.qtip.min.js"></script>

    <link href="form_style.css" rel="stylesheet" type="text/css" />

    <style>

    	.hamburger{

    		width: 35px;

    		height: 5px;

    		background-color: #9DC45F;

    		border-radius:2px;

    		margin: 6px 0;

    	}

        .listeven{

            margin-left:0%;

        }

        .listeven label>span{

            width:100%;

            text-align:center;

        }

        .listeven label{

            display:inline-block;

            width:13%;

        }

        .listeven input[type="text"]{

            width:100%;

        }

        .listeven select{

            width:100%;

        }

        .listevenf{

            margin-left:0%;

        }

        .listevenf label>span{

            width:100%;

            text-align:center;

        }

        .listevenf label{

            display:inline-block;

            width:13%;

        }

        .listevenf input[type="text"]{

            width:100%;

        }

        .listevenf select{

            width:100%;

        }

        #comite_miem label>span{

            width:21%;

            text-align:center;

        }

        #comite_miem input[type="text"], #comite_miem select{

            width:24%;

            text-align:center;

        }

        .listorg label>span{

            width:75%;

        }

        .listorg label{

            display:inline-block;

            width:45%;

        }

        .listorg .sm{

            width:30%;

        }

        ';
        /*if($_GET['ver']!="1"){

        	echo '.listreun{

	            margin-left:25%;

	        }

	        .listreun label>span{

	            width:25%;

	            text-align:center;

	        }

	        .listreun label{

	            width:100%;

	        }

	        .listreun input[type="text"]{

	            width:25%;

	        }';

        }*/

        echo '



        </style>

    </head>';

    

    echo '<body>';

    //if($_GET['ver']==1){

    	echo '<nav id="menu" class="menu">

	    <ul class="menu-section-list">

	      <li><a href="javascript:void(0)" onclick="cambio(1)">Parámetro</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(3)">Compromisos</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(4)">Datos del Parque</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(2)">Datos del Comit&eacute</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(11)">Estatus compromisos</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(6)">Tangibles y Experiencias Exitosas</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(5)">Check list</a></li>

	      <li><a href="javascript:void(0)" onclick="cambio(10)">Nueva infraestructura</a></li>

	      </ul>

	    </nav>



	    <main id="panel" class="panel">

	      <header>

	        <div class="toggle-button" style="color:#9DC45F;cursor:pointer;font-size:25px;">

	        	<div style="display:inline-block;vertical-align:middle;margin-left:5px;">Menu &nbsp;</div><div style="display:inline-block;vertical-align:middle;"><div class="hamburger"></div><div class="hamburger"></div><div class="hamburger"></div>

	        	</div>

	        </div>

	      </header>';

    /*}

    else{

	    echo '<h3><label><span><a href="javascript:void(0)" onclick="cambio(1)">Visita</a></span>'; 

	    //if($stat<1){ echo '<span><a href="javascript:void(0)" onclick="cambio(8)">Asistencia</a></span>';} 

	    echo '<span><a href="javascript:void(0)" onclick="cambio(3)">Compromisos</a></span></label>

	    <label><span><a href="javascript:void(0)" onclick="cambio(4)">Datos del Parque</a></span><span><a href="javascript:void(0)" onclick="cambio(2)">Datos del Comit&eacute</a></span><span><a href="javascript:void(0)" onclick="cambio(11);">Estatus compromisos</a></span></label><div style="clear:both"></div>

	    <label><span><a href="javascript:void(0)" onclick="cambio(6)">Tangible</a></span><span><a href="javascript:void(0)" onclick="cambio(5)">Check list</a></span><span><a href="javascript:void(0)" onclick="cambio(10)">Nueva Infraestructura</a></span></label></h3>';	

    }*/

     $sqlpa="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";

     $respa=mysql_query($sqlpa);

     $lmpa=0;

     while($rowpa=mysql_fetch_array($respa)){

        $sqll="select * from wp_comites_parques where cve_parque='".$rowpa['id']."' order by fecha_visita DESC, cve DESC limit 1";

        $ress=mysql_query($sqll);

        $rowz=mysql_fetch_array($ress);

        if($rowz['opera']<14){

            $lmpa++;

        }

     }

     $sqlvs="select * from wp_visitas_standby WHERE cve_parque='".$_POST['parque']."' AND fecha_visita>='".date('Y-m-01')."' AND fecha_visita<='".date('Y-m-t')."'";

     $resvs=mysql_query($sqlvs);

     $rowvs=mysql_num_rows($resvs);

     $mesactual=date('m');

     if($mesactual<12){

        $limv=ceil($lmpa/(12-$mesactual))-$rowvs;

     }

     else{

        $limv=$lmpa-$rowvs;

     }

     $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";

        $ress=mysql_query($sqll);

        $rowz=mysql_fetch_array($ress);

        $sqlcv="select * from coordenadas_visita where cve_parque='".$_POST['parque']."' order by cve_visita DESC, id DESC limit 1";

        $rescv=mysql_query($sqlcv);

        $rowcv=mysql_fetch_array($rescv);

    echo '<div style="clear:both;"></div><form name="forma" method="post" class="white-envolve" enctype="multipart/form-data">

            <span>Parque:</span><input type="hidden" name="parque" value="'.$id_post.'">

                    <strong>'.$parquen.' </strong>'; if($id_post>0){ echo '&nbsp;<a href="'; echo get_permalink($id_post); echo '" target="_blank">Ver parque en el sitio web</a>'; } echo '<br><br>

    <div id="screen1" '.$screenvisita.'>

    <div class="white-half">';

    //if($_GET['ver']==1){ 
    	echo '<h1>Parámetros';
    /*} else{

    	echo '<h1>Visita';

    }*/

        echo '

            <span>Ingrese los parametros del parque</span>

        </h1>

        <label>

            <span>Capturar ubicación</span><input type="button" class="button"'; if($rowcv['longitud']!=""){echo ' disabled';}echo ' value="Guardar ubicación" onClick="cargarubicacion();">

            </label>

        <label>

            <span>Fecha de la visita: </span><input name="fecha_visita" type="text" readonly id="datepicker4" value="'.date("Y-m-d").'"><a href="javascript:void(0);" title="Indica la fecha en que se realizó la visita."><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Tipo de visita: </span><select name="visita" onchange="change_vis(this.value);"><option value="" selected> -- Seleccione --</option>

            <option value="prospectacion">Prospectacion</option>

            <option value="seguimiento">Seguimiento</option>

            <option value="reforzamiento">Reforzamiento</option>';

    		//if($_GET['ver']!=1){

    			//echo '<option value="standby">Stand by</option>';	

    		//}

        	echo '

            </select><a href="javascript:void(0);" title="Selecciona la opción:
Prospectación si la visita es a un parque sin comité.
Seguimiento: la visita es a un parques 1 vez al mes con comités activos.
Reforzamiento: La visita es a un parque con proyecto en proceso. "><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Clasificación de visita: </span><select name="clasvisita" id="clasvisita" onchange="change_clas(this.value);"><option value="" selected> -- Seleccione --</option>

            <option value="1">Repartir volantes</option>

            <option value="2">Formación del comité</option>

            <option value="3">Reestructuración del comité</option>

            <option value="4">Elaboración de la visión del espacio</option>

            <option value="5">Presentación de la visión del espacio a los vecinos</option>

            <option value="6">Reestructuración de la visión del espacios</option>

            <option value="7">Presentación del diseño del espacio a los vecinos</option>

            <option value="8">Eventos organizados por el comité</option>

            <option value="9">Eventos organizados por parques alegres</option>

            <option value="10">Talleres</option>

            <option value="11">Elaboración del calendario anual de actividades</option>

            <option value="12">Presentación de la planeación del calendario anual de actividades</option>

            <option value="13">Asesoría para realizar el reglamento de orden</option>

            <option value="14">Elaboración de carpetas para rifa</option>

            </select><a href="javascript:void(0);" title="Selecciona la actividad que se realizó durante la visita al parque."><img src="help.png" border="0"></a>

        </label>

        <label id="otroclaslabel" style="display:none;">

            <span>Otro: </span><input type="text" name="otroclas" id="otroclas">

        </label>

        <div id="logro_visita" style="display:none;">

            <label>

    	        <span>Se logró el objetivo:</span><select name="logro"><option value=""> -- Seleccione -- </option>

    	        <option value="Sí">Sí</option>

    	        <option value="No">No</option>

    	        </select>

            </label>

            <label>

            	<span>Impactó en la calificación:</span> <input type="radio" name="impacto_cal" id="impactosi" value="1" onclick="show_param(this.value);"> <label class="white-pinked" for="impactosi">Sí<a href="javascript:void(0);" title="Marca un aumento de calificación en 
 parámetros."><img src="help.png" border="0"></a></label><input type="radio" name="impacto_cal" id="impactono" value="2" checked onclick="show_param(this.value);"><label class="white-pinked" for="impactono">No<a href="javascript:void(0);" title="Seleccionar en caso de que no haya aumento de calificación en ningún parámetro "><img src="help.png" border="0"></a></label>

            </label>

        </div>

        <div id="medio_contacto" style="display:none;">

            <label>

                <span>Medio por el que se contacto:</span><select name="medio"><option value=""> -- Seleccione -- </option>

                <option value="1">Celular</option>

                <option value="2">Telefono</option>

                <option value="3">Whatsapp</option>

                <option value="4">Facebook</option>

                <option value="4">Correo electrónico</option>

                </select>

            </label>

            <label><span>Límite de visitas permitido: </span><span>'.$limv.'</span></label>

        </div>';

        //if($stat>0){

            echo'<div id="asistencia" style="display:none;">

                <label class="listorg">

                <span>Asistencia</span>

                <span>Nombre</span><span>Asisti&oacute;</span>

                </label><div style="clear:both;"></div>';

                $sqlmi="select cm.*,cp.organizacion from comite_miembro cm INNER JOIN comite_parque cp ON cp.id=cm.cve_comite where cp.cve_parque='".$_POST['parque']."' AND cm.estatus!=2";

                $resmi=mysql_query($sqlmi);

                $np=0;

                if(mysql_num_rows($resmi)>0){

                    $checked="";   

                    while($rowco=mysql_fetch_array($resmi)){

                        if($rowco['rol']!="" && $rowco['rol']!=0){

                            if($rowco['rol']!=7){

                                $np++;

                            }

                            echo '<label class="listorg">

                                <span style="margin-left:30%;">'.$rowco['nombre'].'</span><center><input type="checkbox" value="'.$rowco['id'].'" name="asist[]"><a href="javascript:void(0);" title="Tomar asistencia"><img src="help.png" border="0"></a></center>

                            </label>';

                        }

                    }

                }

                else{

                    $show='style="display:none;"';

                    $checked="checked disabled";

                }

                if($np==0){

                    $show='style="display:none;"';

                    $conpersonas='<span>No tiene comité</span></label>';

                }else{

                    $show="";

                    $conpersonas='<span>'.$np.' personas</span></label>'; 

                }

            echo '</div><br>';

        /*}

        else{

            $sqlmi="select cm.*,cp.organizacion from comite_miembro cm INNER JOIN comite_parque cp ON cp.id=cm.cve_comite where cp.cve_parque='".$_POST['parque']."' AND cm.estatus!=2 AND cm.rol!=7 AND cm.rol!=''";

            $resmi=mysql_query($sqlmi);

            if(mysql_num_rows($resmi)>0){

                $checked="";

                $show="";

                $conpersonas='<span>'.mysql_num_rows($resmi).' personas</span></label>';

                $rowco=mysql_fetch_array($resmi);

                $np=mysql_num_rows($resmi);

            }

            else{

                $conpersonas='<span>No tiene comité</span></label>';

                $show='style="display:none;"';

                $checked="checked disabled";

                $np=0;

            }

        }*/

        echo '<div id="normal">

        <h2><label class="white-pinkon">Comit&eacute;</label><label class="white-pinkon">Actual</label></h2>';

            echo '<label>

                <span>Integrado por: </span>'.$conpersonas; echo '<input type="button" class="button" value="Agregar personas" onClick="cambio(2);"><a href="javascript:void(0);" title="Agregar nuevas personas interesadas, vecino activo o nuevos miembros del comité, así mismo para hacer una modificación"><img src="help.png" border="0"></a>

                <div style="clear:both;"></div><input type="hidden" id="miem_comite" name="miem_comite" value="'.$np.'">

                <div id="comite_esp" '.$show.'>

                    <label>

                        <span>C&oacute;mo est&aacute; formalizado? </span><select name="formaliza">

                        <option value="interno"'; if($rowz['tipoformaliza']=="interno"){echo ' selected';} echo '>Solo comit&eacute interno</option>

                        <option value="ayuntamiento"'; if($rowz['formaliza']==20){if($rowz['tipoformaliza']=="ayuntamiento" || $rowz['tipoformaliza']==""){echo ' selected';}} echo '>Solo registro en Ayuntamiento</option>

                        <option value="AC"'; if($rowz['tipoformaliza']=="AC"){echo ' selected';} echo '>Solo es una AC</option>

                        <option value="AC_ayuntamiento"'; if($rowz['tipoformaliza']=="AC_ayuntamiento"){echo ' selected';} echo '>AC con registro en Ayuntamiento</option>

                        <option value=""'; if($rowz['formaliza']==0){echo ' selected';} echo '>Ninguna de las anteriores</option>

                        </select><a href="javascript:void(0);" title="Elige la opción que corresponda"><img src="help.png" border="0"></a>

                    </label>

                    <label>

                        <span>Cuenta con buena organizaci&oacute;n(con orden-formalidad): </span><select name="organizac">

                        <option value="" selected> -- Selecciona -- </option>

                        <option value=20'; if($rowz['organiza']==20){echo ' selected';} echo '>Buena</option>

                        <option value=10'; if($rowz['organiza']==10){echo ' selected';} echo '>Regular</option>

                        <option value=0'; if($rowz['organiza']==0 && $rowz['organiza']!=""){echo ' selected';} echo '>Sin organizaci&oacute;n</option>

                        </select><a href="javascript:void(0);" title="Elige la opción que corresponda"><img src="help.png" border="0"></a>

                    </label>';

                        $orgs=explode(",",$rowco['organizacion']);

                        echo '<label><span>Explicanos por qué:</span>

                        <span style="width:30%;">En el comité existe al menos una persona que se encarga de:</span><a href="javascript:void(0);" title="Selecciona una o varias de las actividades que se presentan, si estas son realizadas por uno o varios miembros del comité."><img src="help.png" border="0"></a>

                    </label>

                    <div style="clear:both"></div>

                    <div class="listorg">

                            <label class="sm"><span>Organización</span></label>

                            <label class="sm"><span>Invitar a los vecinos a las juntas.</span><input type="checkbox" name="organiza[]" '; if($orgs[0]==1){ echo 'checked ';} echo 'value="1"></label>

                            <label class="sm"><span>De moderar la participación de los asistentes a las juntas de comité</span><input type="checkbox" name="organiza[]" '; if($orgs[1]==1){ echo 'checked ';} echo 'value="2"></label>

                            <label class="sm" style="margin-left:30%;"><span>Elaborar las minutas de las juntas.</span><input type="checkbox" name="organiza[]" '; if($orgs[2]==1){ echo 'checked ';} echo 'value="3"></label>

                            <label class="sm"><span>Manejar un expediente con los documentos del comité</span><input type="checkbox" name="organiza[]" '; if($orgs[3]==1){ echo 'checked ';} echo 'value="4"></label>

                            <label class="sm" style="margin-left:30%;"><span>Lleva un control de los fondos del comité</span><input type="checkbox" name="organiza[]" '; if($orgs[4]==1){ echo 'checked ';} echo 'value="5"></label>

                            <label class="sm"><span>Presenta reportes de ingresos y egresos</span><input type="checkbox" name="organiza[]" '; if($orgs[5]==1){ echo 'checked ';} echo 'value="6"></label>

                            <label class="sm" style="margin-left:30%;"><span>El comité somete a votación las decisiones que toma</span><input type="checkbox" name="organiza[]" '; if($orgs[6]==1){ echo 'checked ';} echo 'value="7"></label>

                            <label class="sm"><span>Los miembros del comité se organizan en comisiones para realizar sus acciones</span><input type="checkbox" name="organiza[]" '; if($orgs[7]==1){ echo 'checked ';} echo 'value="8"></label>

                            <label class="sm"><span>Formalidad</span></label>

                            <label class="sm"><span>El comité cuenta con un sello</span><input type="checkbox" name="organiza[]" '; if($orgs[8]==1){ echo 'checked ';} echo 'value="9"></label>

                            <label class="sm"><span>El comité utiliza hojas membretadas</span><input type="checkbox" name="organiza[]" '; if($orgs[9]==1){ echo 'checked ';} echo 'value="10"></label>

                            <label class="sm" style="margin-left:30%;margin-right:35%;"><span>El comité utiliza uniforme</span><input type="checkbox" name="organiza[]" '; if($orgs[10]==1){ echo 'checked ';} echo 'value="11"></label>

                            <label class="sm"><span>Medios electrónicos</span></label>

                            <label class="sm"><span>El comité cuenta con Facebook</span><input type="checkbox" name="organiza[]" '; if($orgs[11]==1){ echo 'checked ';} echo 'value="12"></label>

                            <label class="sm"><span>El comité cuenta con correo electrónico</span><input type="checkbox" name="organiza[]" '; if($orgs[12]==1){ echo 'checked ';} echo 'value="13"></label>

                            <label class="sm" style="margin-left:30%;"><span>El comité cuenta con Whatsapp</span><input type="checkbox" name="organiza[]" '; if($orgs[13]==1){ echo 'checked ';} echo 'value="14"></label>';

                            //if($_GET['ver']==1){

                            	echo '<label class="sm"><span>Ninguna</span><input type="checkbox" id="ninorg" name="organiza[]" '; if(array_search('1', $orgs)==FALSE || $orgs[14]==1){ echo 'checked ';} echo 'value="15"></label>';

                            //}

                            echo '

                    </div>';

                    //if($_GET['ver']==1){

                    	$showr="display:none";

                    	echo '<label><span>El comité se reune en el mes</span><select name="nreuniones" onchange="add_reunion(this.value)">

                    	<option value="" selected> -- Seleccione -- </option>

                    	<option value="0"'; if($rowz['reunion']==0){ $showr="display:none;"; echo ' selected';} echo '>Nunca</option>

                    	<option value="10"'; if($rowz['reunion']==10){ $showr=""; echo ' selected';} echo '>Regularmente</option>

                    	<option value="20"'; if($rowz['reunion']==20){ $showr=""; echo ' selected';} echo '>Frecuentemente</option></select><a href="javascript:void(0);" title="Selecciona la frecuencia en la que el comité se reúne sin la presencia del asesor."><img src="help.png" border="0"></a></label>

	                    <div class="listreun" style="'.$showr.'">

	                        <label><span>Hay evidencia de reunion</span><select name="evidencia_reunion" id="evidencia_reunion">

	                        <option value="" selected> -- Seleccione --</option>

	                        <optgroup label="Sí">

	                        	<option value="1">Minuta</option>

	                        	<option value="2">Otros</option>

	                        </optgroup>

	                        <optgroup label="No">

	                        	<option value="0">No</option>

	                        </optgroup>

	                        </select><a href="javascript:void(0);" title="Selecciona la opción que describa la evidencia con la que cuenta el comité."><img src="help.png" border="0"></a></label>

	                    </div>';

                    /*}

                    else{

                    	echo '<label>

	                        <span>Núm de reuniones en el mes:</span><input type="text" name="nreuniones" onkeyup="add_reunion(this.value)" maxlength="2">

	                    </label>

	                    <div class="listreun" style="display:none;">

	                        <label><span>Fecha</span><span>No. de Asistentes</span><span id="resultreun" style="color:red;">Ninguna reunión</span></label>

	                        <div id="reun">

	                        </div>

	                    </div>';

                    }*/

                    echo '

                    <div style="clear:both;"></div>

                    <label>

                        <span>Tienen proyectos en proceso:</span>

                        <input type="radio" '; if($rowz['proyecto']==20){echo ' checked';} echo ' value=20 id="proyectos" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyectos">S&iacute</label>

                        <input type="radio" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){echo ' checked';} echo ' value=0 id="proyecton" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyecton">No</label><a href="javascript:void(0);" title="Selecciona si cuenta con proyecto en proceso (Evento, rehabilitación o actividad en curso)"><img src="help.png" border="0"></a>

                    </label>

                    ';/*<div id="datosproy" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){ echo 'style="display:none;"';} echo '>';

                    if($rowz['proyecto']==20){

                        $sqlproy="SELECT * FROM comite_proyectos WHERE cve_parque='".$_POST['parque']."' AND estatus=1";

                        $resproy=mysql_query($sqlproy);

                        $p=0;

                        $proys="";

                        if(mysql_num_rows($resproy)>0){

                            while($rowproy=mysql_fetch_array($resproy)){

                                $p++;

                                $proys.='<label><span>Datos del Proyecto:</span>';

                                $proys.='<label><span>Nombre:</span><input type="hidden" name="id_proy['.$p.']" value="'.$rowproy['id'].'"><input type="text" name="nombre_proy['.$p.']" value="'.$rowproy['nombre'].'"></label>';

                                $proys.='<label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="fecha_proy'.$p.']" name="fecha_proy['.$p.']" value="'.$rowproy['fecha_proyecto'].'"></label>';

                                $proys.='<label style="margin-left:35%;"><span>Tipo:</span>';

                                $proys.='<select name="tipo_proy['.$p.']"><option value="" selected> -- Seleccione -- </option><option value="1"';

                                if($rowproy['tipo']==1){ $proys.= " selected";}

                                $proys.='>Tejido Social</option><option value="2"'; if($rowproy['tipo']==2){ $proys.= ' selected';} $proys.= '>Generación de Ingresos</option><option value="3"'; if($rowproy['tipo']==3){ $proys.= ' selected';} $proys.= '>Gestión</option></select></label>';

                                $proys.='<label style="margin-left:35%;"><span>Estatus:</span>';

                                $proys.='<select name="estatus_proy['.$p.']"><option value="" selected> -- Seleccione -- </option><option value="1"'; if($rowproy['estatus']==1){ $proys.= ' selected';} $proys.= '>En proceso</option><option value="2"'; if($rowproy['estatus']==2){ $proys.= ' selected';} $proys.= '>Terminado</option><option value="3"'; if($rowproy['estatus']==3){ $proys.= ' selected';} $proys.= '>Cancelado</option></select></label>';

                            }

                            echo $proys.'<input type="hidden" id="num_proy" name="num_proy" value='.$p.'>';

                        }

                    }

                    else{

                        echo '<label><span>Datos del Proyecto:</span>

                        <label><span>Nombre:</span><input type="text" name="nombre_proy[1]"></label>

                        <label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="fecha_proy1" name="fecha_proy[1]"></label>

                        <label style="margin-left:35%;"><span>Tipo:</span><select name="tipo_proy[1]">

                            <option value="" selected> -- Seleccione -- </option>

                            <option value="1">Tejido Social</option>

                            <option value="2">Generación de Ingresos</option>

                            <option value="3">Gestión</option>

                        </select></label>

                        <label style="margin-left:35%;"><span>Estatus:</span><select name="estatus_proy[1]"><option value="" selected> -- Seleccione -- </option><option value="1">En proceso</option><option value="2">Terminado</option><option value="3">Cancelado</option></select></label>

                        <input type="hidden" id="num_proy" name="num_proy" value=1>';

                    }

                        echo '<div id="nproy"></div>

                            <label style="margin-left:35%;"><input type="button" class="button" value="Agregar proyecto" onclick="add_proy();"></label>

                        </label>

                    </div>*/

                    echo '

                </div>';

        /*

            echo '<label>

                <span>El comit&eacute; opera con: </span><select name="opera">

                <option value="" selected> -- Selecciona --</option>

                <option value=20'; if($rowz['opera']==20){echo ' selected';} echo '>Tres o m&aacute;s personas</option>

                <option value=14'; if($rowz['opera']==14){echo ' selected';} echo '>Dos personas</option>

                <option value=7'; if($rowz['opera']==7){echo ' selected';} echo '>Una persona</option>

                <option value=0'; if($rowz['opera']==0 && $rowz['opera']!=""){echo ' selected';} echo '>No hay comit&eacute;</option>

                </select>

            </label>

            <label>

                <span>C&oacute;mo est&aacute; formalizado? </span><select name="formaliza">

                <option value="interno"'; if($rowz['tipoformaliza']=="interno"){echo ' selected';} echo '>Solo comit&eacute interno</option>

                <option value="ayuntamiento"'; if($rowz['formaliza']==20){if($rowz['tipoformaliza']=="ayuntamiento" || $rowz['tipoformaliza']==""){echo ' selected';}} echo '>Solo registro en Ayuntamiento</option>

                <option value="AC"'; if($rowz['tipoformaliza']=="AC"){echo ' selected';} echo '>Solo es una AC</option>

                <option value="AC_ayuntamiento"'; if($rowz['tipoformaliza']=="AC_ayuntamiento"){echo ' selected';} echo '>AC con registro en Ayuntamiento</option>

                <option value=""'; if($rowz['formaliza']==0){echo ' selected';} echo '>Ninguna de las anteriores</option>

                </select>

            </label>

            <label>

                <span>Cuenta con buena organizaci&oacute;n(con orden-formalidad): </span><select name="organiza">

                <option value="" selected> -- Selecciona -- </option>

                <option value=20'; if($rowz['organiza']==20){echo ' selected';} echo '>Buena</option>

                <option value=10'; if($rowz['organiza']==10){echo ' selected';} echo '>Regular</option>

                <option value=0'; if($rowz['organiza']==0 && $rowz['organiza']!=""){echo ' selected';} echo '>Sin organizaci&oacute;n</option>

                </select>

            </label><br>

            <label>

                <span>Existen reuniones:</span><select name="reunion">

                <option value="" selected> -- Selecciona -- </option>

                <option value=20'; if($rowz['reunion']==20){echo ' selected';} echo '>Frecuentemente</option>

                <option value=10'; if($rowz['reunion']==10){echo ' selected';} echo '>Regularmente</option>

                <option value=0'; if($rowz['reunion']==0 && $rowz['reunion']!=""){echo ' selected';} echo '>No hay reuniones</option>

                </select>

            </label>

            <label>

                <span>Tienen proyectos en proceso:</span>

                <input type="radio" '; if($rowz['proyecto']==20){echo ' checked';} echo ' value=20 id="proyectos" name="proyecto" ><label class="white-pinked" for="proyectos">S&iacute</label>

                <input type="radio" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){echo ' checked';} echo ' value=0 id="proyecton" name="proyecto" ><label class="white-pinked" for="proyecton">No</label>

            </label>';

        */

        echo '

        <h2>Instalaciones</h2>

        <label>

            <span>Cuenta con Proyecto:</span><select name="tipo_proyecto">

            <option value="" selected> -- Selecciona -- </option>

            <option value="vespacio"'; if($rowz['vespacio']==40){echo ' selected';} echo '>Visi&oacute;n de espacio</option>

            <option value="disenio"'; if($rowz['disenio']==40){echo ' selected';} echo '>Dise&ntilde;o</option>

            <option value="ejecutivo"'; if($rowz['ejecutivo']==40){echo ' selected';} echo '>Ejecutivo</option>

            <option value=0'; if($rowz['ejecutivo']==0 && $rowz['disenio']==0 && $rowz['vespacio']==0 && $rowz['ejecutivo']!="" && $rowz['disenio']!="" && $rowz['vespacio']!=""){echo' selected';}echo'>No</option>

            </select><a href="javascript:void(0);" title="Selecciona la opción que corresponde."><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Estado actual de las instalaciones:</span><select name="estado">

            <option value="" selected> -- Selecciona -- </option>

            <option value=30'; if($rowz['estado']==30){echo ' selected';} echo '>Excelente</option>

            <option value=25'; if($rowz['estado']==25){echo ' selected';} echo '>Muy bueno</option>

            <option value=20'; if($rowz['estado']==20){echo ' selected';} echo '>Bueno</option>

            <option value=15'; if($rowz['estado']==15){echo ' selected';} echo '>Regular</option>

            <option value=10'; if($rowz['estado']==10){echo ' selected';} echo '>Malo</option>

            <option value=5'; if($rowz['estado']==5){echo ' selected';} echo '>Muy malo</option>

            <option value=0'; if($rowz['estado']==0 && $rowz['estado']!=""){echo ' selected';} echo '>P&eacute;simo</option>

            </select><a href="javascript:void(0);" title="Selecciona la condición en la que se encuentren las instalaciones"><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Hay instalaciones en la mayoria del espacio, cancha, andador, banquetas, etc:</span><select name="instalaciones">

            <option value="" selected> -- Selecciona -- </option>

            <option value=30'; if($rowz['instalaciones']==30){echo ' selected';} echo '>100%</option>

            <option value=25'; if($rowz['instalaciones']==25){echo ' selected';} echo '>80%</option>

            <option value=20'; if($rowz['instalaciones']==20){echo ' selected';} echo '>64%</option>

            <option value=15'; if($rowz['instalaciones']==15){echo ' selected';} echo '>48%</option>

            <option value=10'; if($rowz['instalaciones']==10){echo ' selected';} echo '>32%</option>

            <option value=5'; if($rowz['instalaciones']==5){echo ' selected';} echo '>16%</option>

            <option value=0'; if($rowz['instalaciones']==0 && $rowz['instalaciones']!=""){echo ' selected';} echo '>0%</option>

            </select><a href="javascript:void(0);" title="De acuerdo con tu opinión, indica el porcentaje de las instalaciones con las que cuenta el parque."><img src="help.png" border="0"></a>

        </label><div style="clear:both;"></div>

        <h2>Ingresos</h2>

        <label>

            <span>Tienen fuente de ingresos permanentes:</span>

            <input type="radio" value=30'; if($rowz['ingresop']==30){echo ' checked';} echo ' id="ingresops" name="ingresop"><label class="white-pinked" for="ingresops">S&iacute</label>

            <input type="radio" value=0'; if($rowz['ingresop']==0 && $rowz['ingresop']!=""){echo ' checked';} echo ' id="ingresopn" name="ingresop"><label class="white-pinked" for="ingresopn">No</label><a href="javascript:void(0);" title="Selecciona la opción que corresponde"><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Es suficiente lo ingresado para operar bien:</span><select name="ingresadop">

            <option value="" selected> -- Seleccione -- </option>

            <option value=40'; if($rowz['ingresadop']==40){echo ' selected';} echo '>S&iacute;</option>

            <option value=20'; if($rowz['ingresadop']==20){echo ' selected';} echo '>Regular</option>

            <option value=0'; if($rowz['ingresadop']==0 && $rowz['ingresadop']!=""){echo ' selected';} echo '>No</option>

            </select><a href="javascript:void(0);" title="Selecciona la opción que corresponde"><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Tienen cuenta mancomunada:</span>

            <input type="radio" value=30'; if($rowz['mancomunado']==30){echo ' checked';} echo ' id="mancomunados" name="mancomunado"><label class="white-pinked" for="mancomunados">S&iacute</label>

            <input type="radio" value=0'; if($rowz['mancomunado']==0 && $rowz['mancomunado']!=""){echo ' checked';} echo ' id="mancomunadon" name="mancomunado"><label class="white-pinked" for="mancomunadon">No</label><a href="javascript:void(0);" title="Selecciona la opción que corresponde"><img src="help.png" border="0"></a>

        </label>

        <h2>Eventos</h2>';

            //if($asesor==13563 && $_GET['p']==1){

                //if($stat>0){

                    

                    //if($_GET['ver']==1){

                    	$sqlec="select * from evidencia_eventos where cve_parque='".$_POST['parque']."' ORDER BY fecha_registro DESC limit 1";

                		$resec=mysql_query($sqlec);

		                if(mysql_num_rows($resec)>0){

		                    $rowec=mysql_fetch_array($resec);

		                }

                    	$showc="style='display:none'";

                    	echo '<label>

	                        <span>Cuentan con un calendario anual de actividades:</span>

	                        <input type="radio" value=50'; if($rowz['eventos']==50){ $showc=""; echo ' checked';} echo ' id="eventoss" name="eventos" onclick="agregar_e(1);"><label class="white-pinked" for="eventoss">S&iacute</label>

	                        <input type="radio" value=0'; if($rowz['eventos']==0 && $rowz['eventos']!=""){ $showc="style='display:none'"; echo ' checked';} echo ' id="eventosn" name="eventos" onclick="agregar_e(-1);"><label class="white-pinked" for="eventosn">No</label><a href="javascript:void(0);" title="Selecciona la opción que corresponde"><img src="help.png" border="0"></a>

	                    </label>

	                    <div id="evidencia_cal" '.$showc.'>

	                    	<label><span>¿Cuentan con evidencia?</span><select name="evidencia_calendario" id="evidencia_calendario">

	                    	<option value=""> -- Seleccione -- </option>

	                    	<optgroup label="Sí">

	                    		<option value="1"'; if($rowec['evidencia']==1){ echo 'selected'; } echo '>Fotos</option>

	                    	</optgroup>

	                    	<optgroup label="No">

	                    		<option value="0"'; if($rowec['evidencia']==0 && $rowec['evidencia']!=""){ echo 'selected'; } echo '>No</option>

	                    	</optgroup>

	                    	</select><a href="javascript:void(0);" title="Selecciona el tipo de evidencia con la que cuenta el comité."><img src="help.png" border="0"></a></label>

	                    </div>

	                    <label>
	                        <span>Vigencia del calendario:</span><span style="width:auto;float:none;">Fecha inicial</span><input type="text" style="width:auto;" id="datepickereic" name="inicio_calendario" value="'.$rowec['inicio_calendario'].'"/>
	                        <span style="width:auto;float:none;">Fecha final</span><input type="text" id="datepickerefc" style="width:auto;" name="fin_calendario" value="'.$rowec['fin_calendario'].'"/>
	                    </label><a href="javascript:void(0);" title="Selecciona la fecha en que da inicio el calendario de actividades."><img src="help.png" border="0"></a></a>';

                    /*}

                    else{

						echo '<label>

	                        <span>Cuentan con un calendario anual de actividades:</span>

	                        <input type="radio" value=50'; if($rowz['eventos']==50){echo ' checked';} echo ' id="eventoss" name="eventos" onclick="agregar_e(4,1,1);"><label class="white-pinked" for="eventoss">S&iacute</label>

	                        <input type="radio" value=0'; if($rowz['eventos']==0 && $rowz['eventos']!=""){echo ' checked';} echo ' id="eventosn" name="eventos" onclick="agregar_e(-1);"><label class="white-pinked" for="eventosn">No</label>

	                    </label>

	                    <label>

	                        <span id="num_events">Agregar núm de eventos:</span><input type="text" name="neventos" onkeyup="agregar_e(this.value,1)" maxlength="2">

	                    </label>

	                    <label>

	                        <span>Fecha de inicio del calendario:</span><input type="text" id="datepickereic" name="inicio_calendario" onchange="newmaxdate(this.value);"/>

	                    </label>';

                    }*/

                    echo '

                    ';

                /*}

                else{

                    echo '<label>

                    <span>Calendario de Eventos</span><span id="num_events">Agregar núm de eventos:</span><input type="text" name="neventos" style="width:10%;" onkeyup="agregar_e(this.value,1)" maxlength="2">

                </label>';}*/

                /*if($_GET['ver']!="1"){

                	echo '<div class="listeven">

	                    <label><span>Fecha:</span></label><label><span>Tipo:</span></label><label><span>Subtipo:</span></label><label><span>Responsable:</span></label><label><span>Correo:</span></label><label><span>Estatus:</span></label><label><span>Motivo:</span></label>

	                    <div id="even">';

	                    $sql="SELECT MIN(fecha) as fecha, MAX(fecha_calendario) as fecal, cve_parque FROM eventos_parques WHERE fecha!='0000-00-00' AND cve_parque='".$_POST['parque']."'";

	                    $res=mysql_query($sql);

	                    $row=mysql_fetch_array($res);

	                    if($row['fecal']!="" && $row['fecal']!="0000-00-00"){

	                        $fecha_ini=$row['fecal'];

	                        $fecha_min=explode('-', $row['fecal']);

	                        $aniof=$fecha_min[0]+1;

	                        $fecha_lim=$aniof.'-'.$fecha_min[1].'-'.$fecha_min[2];

	                        $fecha_fin=date('Y-m-d', strtotime($fecha_lim. ' - 1 days'));

	                    }

	                    else{

	                        if(trim($user->ID)==1906){

	                            $fecha_eve='2016-01-01';

	                        }

	                        else{

	                            if(is_null($row['fecha'])){

	                                $fecha_eve=date("Y-m-d");

	                            }

	                            else{

	                                $fecha_eve=$row['fecha'];

	                            }

	                        }

	                        $fecha_min=explode('-', $fecha_eve);

	                        $fecha_actual=date("Y/m/d");

	                        $anio=explode('/', $fecha_actual);

	                        $fecha_ini=$anio[0].'/'.$fecha_min[1].'/'.$fecha_min[2];

	                        $anioi=$anio[0];

	                        if($fecha_ini>$fecha_actual){

	                            if($anio[0]!=$fecha_min[0]){

	                                $anioi=$anio[0]-1;

	                            }

	                        }

	                        $aniof=$anioi+1;

	                        $fecha_ini=$anioi.'-'.$fecha_min[1].'-'.$fecha_min[2];

	                        $fecha_lim=$aniof.'-'.$fecha_min[1].'-'.$fecha_min[2];

	                        $fecha_fin=date('Y-m-d', strtotime($fecha_lim. ' - 1 days'));

	                    }

	                        $fecha_inicial_para_calendario=$fecha_ini;

	                        $fecha_final_para_calendario=$fecha_fin;

	                        $u=1;

	                        if($rowz['eventos']==50){

	                            $sqlca="select * from eventos_parques where cve_parque='".$_POST['parque']."' AND calendario='1' AND fecha BETWEEN '".$fecha_ini."' AND '".$fecha_fin."'";

	                            $resca=mysql_query($sqlca);

	                            while($rowca=mysql_fetch_array($resca)){

	                                if($rowca['estatus']==2 || $rowca['estatus']==4){

	                                    echo '<input type="hidden" name="id_eventoc['.$u.']" value="'.$rowca['ID'].'">

	                                    <input type="hidden" id="datepickere'.$u.'" name="fecha_eventoc'.$u.'" value="'.$rowca['fecha'].'"/>

	                                    <input type="hidden" id="tipo_eventoc'.$u.'" name="tipo_eventoc['.$u.']" value="'.$rowca['tipo'].'>

	                                    <input type="hidden" id="nom_eventoc'.$u.'" name="nom_eventoc['.$u.']" value="'.$rowca['nombre'].'>

	                                    <input type="hidden" name="contacto_evento['.$u.']" value="'.$rowca['responsable'].'"/>

	                                    <input type="hidden" name="correo_contacto['.$u.']" value="'.$rowca['correo'].'"/>

	                                    <input type="hidden" id="status_even'.$u.'" name="status_even['.$u.']" value="'.$rowca['estatus'].'">

	                                    <input type="hidden" name="motivo['.$u.']" value="'.$rowca['motivo'].'">';

	                                    echo '<label><input type="text" value="'.$rowca['fecha'].'" disabled/></label>

	                                    <label><select disabled>

	                                    <option value=""> -- Seleccione -- </option>';

	                                    foreach($tipoevento as $k=>$v){

	                                        echo '<option value="'.$k.'"'; if($rowca['tipo']==$k){ echo ' selected'; }echo '>'.$v.'</option>';

	                                    }

	                                    echo '</select></label>

	                                    <label><select disabled>';

	                                    foreach($subtipo as $k=>$v){

	                                        if($k==$rowca['tipo']){

	                                            foreach($v as $key=>$value){

	                                                echo '<option value="'.$key.'"'; if($rowca['nombre']==$key){ echo ' selected'; }echo '>'.$value.'</option>';

	                                            }

	                                        }   

	                                    }

	                                    echo '</select></label>

	                                    <label><input type="text" value="'.$rowca['responsable'].'" disabled/></label>

	                                    <label><input type="text" value="'.$rowca['correo'].'" disabled/></label>

	                                    <label><select disabled><option value=""> -- Seleccione -- </option>

	                                    <option value="1"'; if($rowca['estatus']==1){ echo ' selected';} echo '>En espera</option>

	                                    <option value="2"'; if($rowca['estatus']==2){ echo ' selected';} echo '>Realizado</option>

	                                    <option value="3"'; if($rowca['estatus']==3){ echo ' selected';} echo '>Postergado</option>

	                                    <option value="4"'; if($rowca['estatus']==4){ echo ' selected';} echo '>Cancelado</option></select></label>

	                                    <label><input type="text" value="'.$rowca['motivo'].'" disabled></label>';

	                                    $u++;

	                                }

	                                else{

	                                    echo '<label><input type="hidden" name="id_eventoc['.$u.']" value="'.$rowca['ID'].'"><input type="text" id="datepickere'.$u.'" name="fecha_eventoc'.$u.'" value="'.$rowca['fecha'].'"/></label>

	                                    <label><select id="tipo_eventoc'.$u.'" name="tipo_eventoc['.$u.']" onchange="cambiarsub(this.id);">

	                                    <option value=""> -- Seleccione -- </option>';

	                                    foreach($tipoevento as $k=>$v){

	                                        echo '<option value="'.$k.'"'; if($rowca['tipo']==$k){ echo ' selected'; }echo '>'.$v.'</option>';

	                                    }

	                                    echo '</select></label>

	                                    <label><select id="nom_eventoc'.$u.'" name="nom_eventoc['.$u.']">';

	                                    foreach($subtipo as $k=>$v){

	                                        if($k==$rowca['tipo']){

	                                            foreach($v as $key=>$value){

	                                                echo '<option value="'.$key.'"'; if($rowca['nombre']==$key){ echo ' selected'; }echo '>'.$value.'</option>';

	                                            }

	                                        }   

	                                    }

	                                    echo '</select></label>

	                                    <label><input type="text" name="contacto_evento['.$u.']" value="'.$rowca['responsable'].'"/></label>

	                                    <label><input type="text" name="correo_contacto['.$u.']" value="'.$rowca['correo'].'"/></label>

	                                    <label><select id="status_even'.$u.'" name="status_even['.$u.']"><option value=""> -- Seleccione -- </option>

	                                    <option value="1"'; if($rowca['estatus']==1){ echo ' selected';} echo '>En espera</option>

	                                    <option value="2"'; if($rowca['estatus']==2){ echo ' selected';} echo '>Realizado</option>

	                                    <option value="3"'; if($rowca['estatus']==3){ echo ' selected';} echo '>Postergado</option>

	                                    <option value="4"'; if($rowca['estatus']==4){ echo ' selected';} echo '>Cancelado</option></select></label>

	                                    <label><input type="text" name="motivo['.$u.']" value="'.$rowca['motivo'].'"></label>';

	                                    $u++;

	                                }

	                            }

	                        }

	                    echo '</div><input type="hidden" value="'.$u.'" name="evenbd" id="evenbd">

	                </div>';

                }*/

                echo '<div style="clear:both;"></div><br>';

                //if($_GET['ver']==1){

                	echo '<label><span>Núm de eventos realizados al año:</span><select name="neventosfc">
                	<option value=""> -- Seleccione -- </option>
                	<option value="0"'; if($rowz['eventosr']=="0"){echo ' selected';} echo '>Ninguno</option>
                	<option value="13"'; if($rowz['eventosr']=="13"){echo ' selected';} echo '>Uno</option>
                	<option value="25"'; if($rowz['eventosr']=="25"){echo ' selected';} echo '>Dos</option>
                	<option value="38"'; if($rowz['eventosr']=="38"){echo ' selected';} echo '>Tres</option>
                	<option value="50"'; if($rowz['eventosr']=="50"){echo ' selected';} echo '>Cuatro</option>
                	</select>
                	<a href="javascript:void(0);" title="Selecciona la cantidad de eventos realizados en el año.">
                	<img src="help.png" border="0"></a>
                	</label>';
                /*}

                else{

                	echo '<label><span>Núm de eventos realizados al año:</span><span id="num_events">Agregar núm de eventos fuera del calendario:</span><input type="text" name="neventosfc" style="width:10%;" onkeyup="agregar_e(this.value,2)" maxlength="2"></label>

                	<div class="listevenf">

	                    <label><span>Fecha:</span></label><label><span>Tipo:</span></label><label><span>Subtipo:</span></label><label><span>Responsable:</span></label><label><span>Correo:</span></label><label><span>Estatus:</span></label><label><span>Motivo:</span></label>

	                    <div id="evenf">';

	                        $sqlca="select * from eventos_parques where cve_parque='".$_POST['parque']."' AND calendario='0' AND fecha BETWEEN '".$fecha_ini."' AND '".$fecha_fin."'";

	                        $resca=mysql_query($sqlca);

	                        $u=1;

	                        while($rowca=mysql_fetch_array($resca)){

	                            if($rowca['estatus']==2 || $rowca['estatus']==4){

	                                echo '<input type="hidden" name="id_eventof['.$u.']" value="'.$rowca['ID'].'">

	                                <input type="hidden" id="datepickeref'.$u.'" name="fecha_eventof'.$u.'" value="'.$rowca['fecha'].'"/>

	                                <input type="hidden" id="tipo_eventof'.$u.'" name="tipo_eventof['.$u.']" value="'.$rowca['tipo'].'>

	                                <input type="hidden" id="nom_eventof'.$u.'" name="nom_eventof['.$u.']" value="'.$rowca['nombre'].'>

	                                <input type="hidden" name="contacto_eventof['.$u.']" value="'.$rowca['responsable'].'"/>

	                                <input type="hidden" name="correo_contactof['.$u.']" value="'.$rowca['correo'].'"/>

	                                <input type="hidden" id="status_evenf'.$u.'" name="status_evenf'.$u.'" value="'.$rowca['estatus'].'">

	                                <input type="hidden" name="motivof['.$u.']" value="'.$rowca['motivo'].'">';

	                                echo '<label><input type="text" value="'.$rowca['fecha'].'" disabled/></label>

	                                <label><select disabled>

	                                <option value=""> -- Seleccione -- </option>';

	                                foreach($tipoevento as $k=>$v){

	                                    echo '<option value="'.$k.'"'; if($rowca['tipo']==$k){ echo ' selected'; }echo '>'.$v.'</option>';

	                                }

	                                echo '</select></label>

	                                <label><select disabled>';

	                                foreach($subtipo as $k=>$v){

	                                    if($k==$rowca['tipo']){

	                                        foreach($v as $key=>$value){

	                                            echo '<option value="'.$key.'"'; if($rowca['nombre']==$key){ echo ' selected'; }echo '>'.$value.'</option>';

	                                        }

	                                    }   

	                                } echo '</select></label>

	                                <label><input type="text" value="'.$rowca['responsable'].'" disabled/></label>

	                                <label><input type="text" value="'.$rowca['correo'].'" disabled/></label>

	                                <label><select disabled><option value=""> -- Seleccione -- </option>

	                                <option value="1"'; if($rowca['estatus']==1){ echo ' selected';} echo '>En espera</option>

	                                <option value="2"'; if($rowca['estatus']==2){ echo ' selected';} echo '>Realizado</option>

	                                <option value="3"'; if($rowca['estatus']==3){ echo ' selected';} echo '>Postergado</option>

	                                <option value="4"'; if($rowca['estatus']==4){ echo ' selected';} echo '>Cancelado</option></select></label>

	                                <label><input type="text" value="'.$rowca['motivo'].'" disabled></label>';

	                                $u++;

	                            }

	                            else{

	                                echo '<label><input type="hidden" name="id_eventof['.$u.']" value="'.$rowca['ID'].'"><input type="text" id="datepickeref'.$u.'" name="fecha_eventof'.$u.'" value="'.$rowca['fecha'].'"/></label>

	                                <label><select id="tipo_eventof'.$u.'" name="tipo_eventof['.$u.']" onchange="cambiarsubf(this.id);">

	                                <option value=""> -- Seleccione -- </option>';

	                                foreach($tipoevento as $k=>$v){

	                                    echo '<option value="'.$k.'"'; if($rowca['tipo']==$k){ echo ' selected'; }echo '>'.$v.'</option>';

	                                }

	                                echo '</select></label>

	                                <label><select id="nom_eventof'.$u.'" name="nom_eventof['.$u.']">';

	                                foreach($subtipo as $k=>$v){

	                                    if($k==$rowca['tipo']){

	                                        foreach($v as $key=>$value){

	                                            echo '<option value="'.$key.'"'; if($rowca['nombre']==$key){ echo ' selected'; }echo '>'.$value.'</option>';

	                                        }

	                                    }   

	                                } echo '</select></label>

	                                <label><input type="text" name="contacto_eventof['.$u.']" value="'.$rowca['responsable'].'"/></label>

	                                <label><input type="text" name="correo_contactof['.$u.']" value="'.$rowca['correo'].'"/></label>

	                                <label><select id="status_evenf'.$u.'" name="status_evenf'.$u.'"><option value=""> -- Seleccione -- </option>

	                                <option value="1"'; if($rowca['estatus']==1){ echo ' selected';} echo '>En espera</option>

	                                <option value="2"'; if($rowca['estatus']==2){ echo ' selected';} echo '>Realizado</option>

	                                <option value="3"'; if($rowca['estatus']==3){ echo ' selected';} echo '>Postergado</option>

	                                <option value="4"'; if($rowca['estatus']==4){ echo ' selected';} echo '>Cancelado</option></select></label>

	                                <label><input type="text" name="motivof['.$u.']" value="'.$rowca['motivo'].'"></label>';

	                                $u++;

	                            }

	                        }

	                    echo '<input type="hidden" value="'.$u.'" name="evenfbd" id="evenfbd">

	                    </div>

	                </div>';

            	}*/

            	echo '

                <div style="clear:both;"></div>';

            /*}

            else{

                echo '<label>

                    <span>Hay eventos con regularidad:</span><select name="eventosr">

                    <option value="" selected> -- Seleccione -- </option>

                    <option value=50'; if($rowz['eventosr']==50){echo ' selected';} echo '>4 al a&ntilde;o o 1 cada 3 meses</option>

                    <option value=25'; if($rowz['eventosr']==25){echo ' selected';} echo '>Menos de 4 al a&ntilde;o</option>

                    <option value=0'; if($rowz['eventosr']==0 && $rowz['eventosr']!=""){echo ' selected';} echo '>Ninguno</option>

                    </select>

                </label>

                <label>

                    <span>Cuentan con un calendario anual de actividades:</span>

                    <input type="radio" value=50'; if($rowz['eventos']==50){echo ' checked';} echo ' id="eventoss" name="eventos"><label class="white-pinked" for="eventoss">S&iacute</label>

                    <input type="radio" value=0'; if($rowz['eventos']==0 && $rowz['eventos']!=""){echo ' checked';} echo ' id="eventosn" name="eventos"><label class="white-pinked" for="eventosn">No</label>

                </label>';

            }*/

            if($stat>0){

                echo '<h2>&Aacute;reas verdes</h2>

                <div style="display:none;">

                    <label>

                        <span>¿Cuántos tienen color de copa uniforme:</span><input type="text" name="copa">

                    </label>

                    <label>

                        <span>¿Cuántos tienen sistema de riego?</span><input type="text" name="riego">

                    </label>

                    <label>

                        <span>¿Cuántos con lesiones en el tronco?</span><input type="text" name="tronco">

                    </label>

                    <label>

                        <span>¿Cuántos no están fijados al suelo?</span><input type="text" name="suelo">

                    </label>

                </div>

                <div style="display:none;">

                    <label>

                        <span>Sistema de riego:</span><select id="riegop" name="riego"><option value=""> -- Seleccione -- </option>

                        <option value="1">Sí</option>

                        <option value="2">No</option>

                        </select>

                    </label>

                    <label>

                        <span>Frecuencia de poda:</span><select id="podap" name="poda"><option value=""> -- Seleccione -- </option>

                        <option value="1">Nunca</option>

                        <option value="2">Cada 3 meses</option>

                        <option value="3">Cada 2 meses</option>

                        <option value="4">Mensual</option>

                        </select>

                    </label>

                    <label>

                        <span>Color:</span></label><div id="colorpasto">';

                        $directoriop = 'colores_pasto';

                        $ficherosp  = scandir($directoriop);

                        foreach($ficherosp as $k=>$v){

                            if(substr($v,0,1)!== '.'){

                                echo '<label style="display:inline-block;width:25%;"><input type="radio" name="colorpasto" value="'.$v.'"><img src="colores_pasto/'.$v.'" width="100" height="100"></label>';

                            }

                        }

                    echo '</label>

                </div></div>';

            }

            else{

        echo '<h2>&Aacute;reas verdes</h2>

        <label>

            <span>Cuenta con:</span>

            <input type="checkbox" id="arboles" name="averdes[]" value="1"'; if($rowz['averdes']==50 || $rowz['averdes']==34 || $rowz['averdes']==35){ echo ' checked';} echo '><label class="white-pinky" for="arboles" >&aacute;rboles</label>

            <input type="checkbox" id="cesped" name="averdes[]" value="2"'; if($rowz['averdes']==50 || $rowz['averdes']==34 || $rowz['averdes']==36){ echo ' checked';} echo '><label class="white-pinky" for="cesped" >c&eacute;sped</label>

            <input type="checkbox" id="jardin" name="averdes[]" value="3"'; if($rowz['averdes']==50 || $rowz['averdes']==35 || $rowz['averdes']==36){ echo ' checked';} echo '><label class="white-pinky" for="jardin" >jard&iacute;n</label><a href="javascript:void(0);" title="Selecciona la opción que corresponde."><img src="help.png" border="0"></a>

        </label>

        <label>

            <span>Se encuentra en buen estado:</span><select name="estaver">

            <option value="" selected> -- Selecciona -- </option>

            <option value=50'; if($rowz['estaver']==50){echo ' selected';} echo '>Excelente</option>

            <option value=40'; if($rowz['estaver']==40){echo ' selected';} echo '>Muy bueno</option>

            <option value=32'; if($rowz['estaver']==32){echo ' selected';} echo '>Bueno</option>

            <option value=24'; if($rowz['estaver']==24){echo ' selected';} echo '>Regular</option>

            <option value=16'; if($rowz['estaver']==16){echo ' selected';} echo '>Malo</option>

            <option value=8'; if($rowz['estaver']==8){echo ' selected';} echo '>Muy malo</option>

            <option value=0'; if($rowz['estaver']==0 && $rowz['estaver']!=""){echo ' selected';} echo '>P&eacute;simo</option>

            </select><a href="javascript:void(0);" title="De acuerdo a tu opinión, selecciona la condición en la que se encuentra el área verde del parque"><img src="help.png" border="0"></a>

        </label>';

            }

        echo '<h2>Afluencia</h2>

        <label>

            <span>Porcentaje de afluencia sobre lo existente:</span><select name="gente">

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

            </select><a href="javascript:void(0);" title="Selecciona el porcentaje de afluencia con la que cuenta el parque."><img src="help.png" border="0"></a>

        </label>

        ';

        

            echo '<h2>Orden</h2>';

            	if($rowz['respintdetalle']==0 || $rowz['respintdetalle']=="Ninguno" || $rowz['respintdetalle']==""){
            		$detres=array(0,0,0,10);
		        	$resultado='<span id="resultres" style="color:green;">Sí</span>';
			    }
			    else{
            		$detres=explode(',', $rowz['respintdetalle']);
		            if(count($detres)>0){
		            	$resultado='<span id="resultres" style="color:orange;">Regular</span>';
		            }
		            elseif(count($detres)>4){
		                $resultado='<span id="resultres" style="color:red;">No</span>';
		            }
		            else{
		            	$resultado='<span id="resultres" style="color:green;">Sí</span>';
		            }
		        }
                echo '

            <label>

                <span>Las instalaciones se respetan:</span><select name="respinsta">

                    <option value="" selected> -- Seleccione -- </option>

                    <option value=40'; if($rowz['respint']==40){echo ' selected';} echo '>S&iacute;</option>

                    <option value=20'; if($rowz['respint']==20){echo ' selected';} echo '>Regular</option>

                    <option value=0'; if($rowz['respint']==0 && $rowz['respint']!=""){echo ' selected';} echo '>No</option>

                </select><a href="javascript:void(0);" title="De acuerdo con tu opinión selecciona la opción que corresponde."><img src="help.png" border="0"></a>

            </label>

            <div style="clear:both;"></div>

            <div class="listorg">

                <label><span>Explicanos por qué:</span><a href="javascript:void(0);" title="En caso de haber contestado que las instalaciones no se respetan, selecciona una o varias razones de las que se presentan en esta lista."><img src="help.png" border="0"></a></label>

                <div style="clear:both;"></div>

            	<label><span>Los usuarios no atienden a las indicaciones de letreros, señalizaciones y reglamento. No aplica si en el parque no hay letreros, señalizaciones y reglamento instalados.</span><input type="checkbox" name="respint[]" value="1"'; foreach($detres as $k=>$v){ 

                		if($v==1){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>En las instalaciones existen evidencias de maltrato ocasionado de manera deliverada por los usuarios.</span><input type="checkbox" name="respint[]" value="2"'; foreach($detres as $k=>$v){ 

                		if($v==2){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Circulan personas por áreas que no son para uso peatonal.</span><input type="checkbox" name="respint[]" value="3"'; foreach($detres as $k=>$v){ 

                		if($v==3){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Circulan bicicletas por áreas de uso peatonal y/o por áreas verdes.</span><input type="checkbox" name="respint[]" value="4"'; foreach($detres as $k=>$v){ 

                		if($v==4){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Se estacionan automoviles dentro del espacio público</span><input type="checkbox" name="respint[]" value="5"'; foreach($detres as $k=>$v){ 

                		if($v==5){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Circulan motocicletas dentro del espacio público.</span><input type="checkbox" name="respint[]" value="6"'; foreach($detres as $k=>$v){ 

                		if($v==6){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Existen puestos de venta dentro del espacio público</span><input type="checkbox" name="respint[]" value="7"'; foreach($detres as $k=>$v){ 

                		if($v==7){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Existen construcciones hechas por particulares dentro del espacio público</span><input type="checkbox" name="respint[]" value="8"'; foreach($detres as $k=>$v){ 

                		if($v==8){ echo ' checked'; }

                	}

                	echo '></label>';

                	//if($_GET['ver']==1){

                		echo '<label><span>Otro</span><input type="checkbox" name="respint[]" value="9"'; foreach($detres as $k=>$v){ 

		                		if($v==9){ echo ' checked'; }

		                	}

		                	echo '></label>

		                <label><span>Ninguno</span><input type="checkbox" id="ninresp" name="respint[]" value="10"'; foreach($detres as $k=>$v){ 

		                		if($v==10 || $resultado=='<span id="resultres" style="color:green;">Sí</span>'){ echo ' checked'; }

		                	}

		                	echo '></label>';

                	//}

                	echo '

            </div>

            <div style="clear:both;"></div>

            <label>

                <span>Se cuenta con un reglamento de orden: </span><select id="reglamento" name="orden">

                    <option value="" selected> -- Selecciona --</option>

                    <option value=0'; if($rowz['orden']==0){echo ' selected';} echo '>No</option>

                    <option value=15'; if($rowz['orden']==15){echo ' selected';} echo '>Sólo compartido por escrito</option>

                    <option value=30'; if($rowz['orden']==30){echo ' selected';} echo '>Instalado en el parque</option>

                </select><a href="javascript:void(0);" title="Selecciona la opción que corresponde."><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Se mantiene limpio:</span><select name="limpieza">

                    <option value="" selected> -- Selecciona -- </option>

                    <option value=30'; if($rowz['limpieza']==30){echo ' selected';} echo '>Excelente</option>

                    <option value=25'; if($rowz['limpieza']==25){echo ' selected';} echo '>Muy bueno</option>

                    <option value=20'; if($rowz['limpieza']==20){echo ' selected';} echo '>Bueno</option>

                    <option value=15'; if($rowz['limpieza']==15){echo ' selected';} echo '>Regular</option>

                    <option value=10'; if($rowz['limpieza']==10){echo ' selected';} echo '>Malo</option>

                    <option value=5'; if($rowz['limpieza']==5){echo ' selected';} echo '>Muy malo</option>

                    <option value=0'; if($rowz['limpieza']==0 && $rowz['limpieza']!=""){echo ' selected';} echo '>P&eacute;simo</option>

                </select><a href="javascript:void(0);" title="Selecciona la condición en la que se encuentra el parque."><img src="help.png" border="0"></a>

            </label>';

            	if($rowz['mantienelimpio']!=0){

            		$detlimp=explode(',', $rowz['mantienelimpio']);

            	}

            	else{

            		$detlimp=array(0,0,0,0,0,0,0,0);

            	}

                echo '

            <div style="clear:both;"></div>

            <div class="listorg">

                <label><span>Explicanos por qué:</span><a href="javascript:void(0);" title="Selecciona al menos una de estas opciones, en caso de que la condición del parque sea regular, malo,muy malo o pésimo."><img src="help.png" border="0"></a></label>

                <div style="clear:both;"></div>

                <label><span>Hojas y residuos producido por la vegetación del lugar.</span><input type="checkbox" name="limpio[]" value="1"'; foreach($detlimp as $k=>$v){ 

                		if($v==1){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Tierra acumulada en exceso.</span><input type="checkbox" name="limpio[]" value="2"'; foreach($detlimp as $k=>$v){ 

                		if($v==2){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Basura generada por los usuarios del parque.</span><input type="checkbox" name="limpio[]" value="3"'; foreach($detlimp as $k=>$v){ 

                		if($v==3){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Restos de excremento de animales.</span><input type="checkbox" name="limpio[]" value="4"'; foreach($detlimp as $k=>$v){ 

                		if($v==4){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Basura doméstica.</span><input type="checkbox" name="limpio[]" value="5"'; foreach($detlimp as $k=>$v){ 

                		if($v==5){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Escombro.</span><input type="checkbox" name="limpio[]" value="6"'; foreach($detlimp as $k=>$v){ 

                		if($v==6){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Muebles abandonados.</span><input type="checkbox" name="limpio[]" value="7"'; foreach($detlimp as $k=>$v){ 

                		if($v==7){ echo ' checked'; }

                	}

                	echo '></label>

                <label><span>Carros abandonados</span><input type="checkbox" name="limpio[]" value="8"'; foreach($detlimp as $k=>$v){ 

                		if($v==8){ echo ' checked'; }

                	}

                	echo '></label>

            </div>';

        /*

            echo '<h2>Orden</h2>

            <label>

                <span>Las instalaciones se respetan:</span><select name="respint">

                <option value="" selected> -- Seleccione -- </option>

                <option value=40'; if($rowz['respint']==40){echo ' selected';} echo '>S&iacute;</option>

                <option value=20'; if($rowz['respint']==20){echo ' selected';} echo '>Regular</option>

                <option value=0'; if($rowz['respint']==0 && $rowz['respint']!=""){echo ' selected';} echo '>No</option>

                </select>

            </label>

            <label>

                <span>Se cuenta con un reglamento de orden:</span><select name="orden">

                <option value="" selected> -- Seleccione -- </option>

                <option value=30'; if($rowz['orden']==30){echo ' selected';} echo '>Instalado en el parque</option>

                <option value=15'; if($rowz['orden']==15){echo ' selected';} echo '>Solo compatido por escrito</option>

                <option value=0'; if($rowz['orden']==0 && $rowz['orden']!=""){echo ' selected';} echo '>No</option>

                </select>

            </label>

            <label>

                <span>Se mantiene limpio:</span><select name="limpieza">

                <option value="" selected> -- Selecciona -- </option>

                <option value=30'; if($rowz['limpieza']==30){echo ' selected';} echo '>Excelente</option>

                <option value=25'; if($rowz['limpieza']==25){echo ' selected';} echo '>Muy bueno</option>

                <option value=20'; if($rowz['limpieza']==20){echo ' selected';} echo '>Bueno</option>

                <option value=15'; if($rowz['limpieza']==15){echo ' selected';} echo '>Regular</option>

                <option value=10'; if($rowz['limpieza']==10){echo ' selected';} echo '>Malo</option>

                <option value=5'; if($rowz['limpieza']==5){echo ' selected';} echo '>Muy malo</option>

                <option value=0'; if($rowz['limpieza']==0 && $rowz['limpieza']!=""){echo ' selected';} echo '>P&eacute;simo</option>

                </select>

            </label>';

        */

        echo '<label>

            <span id="promedio">Promedio: </span><span id="total"></span>

        </label>

        </div>';

        $total=0;

        if(is_array($rowz)){

            foreach($rowz as $k=>$v){

                if(!is_int($k)){

                    if($k!="asesor_captura" && $k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){

                        $total=$total+$v;

                    }

                }

            }

        }

        $total=$total/7;

        echo '<div align="center"><input class="button" type="button" value="Calcular Promedio" id="boton_calcular" name="boton_calcular" onclick="calcular();">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="button" value="Guardar Par&aacute;mentros" name="boton_enviar" id="boton_enviar" onclick="validar(1,this.id);"></div>

    '; echo '<input type="hidden" name="long" id="long">

    <input type="hidden" name="lati" id="lati">

    <input type="hidden" name="cmd"><input type="hidden" id="calant" name="calant" value="'.round($total).'"><input type="hidden" id="needcom" name="needcom"><input type="hidden" id="sinvisitas" name="sinvisitas"'; if(mysql_num_rows($ress)<1){ echo ' value="1"';} echo '><input type="hidden" id="diferencias" name="diferencias">

    <input type=hidden name="pods_meta__cmb_parque"><input type=hidden name="buscarvisita" value="0">'; echo '

    </div>

    </div>';

    $sqlc="SELECT * FROM comite_parque WHERE cve_parque='".$_POST['parque']."'";

    $resc=mysql_query($sqlc);

    $rowc=mysql_fetch_array($resc);

    $fecha_comite=date("Y-m-d");

    if($rowc['fecha_alta']){

        $fecha_comite=$rowc['fecha_alta'];   

    }

    echo '<div id="screen2"><div class="white-pink">

    <h1>Comit&eacute; de Parque</h1>

        <label>

            <span>Fecha de creación del Comité:</span><input type="text" readonly id="datepicker5" name="fecha_comite" value="'.$fecha_comite.'"/>

        </label>';

        /*<label>

            <span>Teléfono:</span><input type="text" name="telefono[0]" value="'.$rowc['telefono'].'">

        </label>

        <label>

            <span>Celular:</span><input type="text" name="celular[0]" value="'.$rowc['celular'].'">

        </label>*/

        echo '<label>

            <span>Correo electr&oacute;nico:</span><input type="text" name="email[0]" value="'.$rowc['email'].'">

        </label>

    <h2>Redes sociales</h2>

        <label>

            <span>Facebook (del comité):</span><input type="text" name="facebook[0]" value="'.$rowc['facebook'].'">

        </label>

        <label>

            <span>Twitter (del comité):</span><input type="text" name="twitter[0]" value="'.$rowc['twitter'].'">

        </label>

        <label>

            <span>Instagram (del comité):</span><input type="text" name="instagram[0]" value="'.$rowc['instagram'].'">

        </label>

        <label>

            <span>Skype (del comité):</span><input type="text" name="skype" value="'.$rowc['skype'].'">

        </label>

        <label>

            <span>Otro (del comité):</span><input type="text" name="otro" value="'.$rowc['otro'].'">

        </label>

        <label>

            <span>Enviar correo:</span><input type="checkbox" class="megusta" value="1" name="enviacorreo"'; if(mysql_num_rows($resc)>0){ echo 'disabled="disabled"';} echo '>

        </label>

        <h2>Miembros</h2>';

        if(mysql_num_rows($resc)>0){

            $sqlm="SELECT * FROM comite_miembro WHERE cve_comite='".$rowc['id']."' AND estatus!=2";

            $resm=mysql_query($sqlm);

            if(mysql_num_rows($resm)>0){

                while($rowm=mysql_fetch_array($resm)){

                    $nacim=explode("-",$rowm['fecha_nac']);

                    $miembros[$rowm['id']]=array($rowm['nombre'],$nacim[0],$nacim[1],$nacim[2],$rowm['sexo'],$rowm['nivel'],$rowm['rol'],$rowm['telefono'],$rowm['celular'],$rowm['email'],$rowm['facebook'],$rowm['megusta'],$rowm['twitter'],$rowm['siguemet'],$rowm['instagram'],$rowm['siguemei'],$rowm['contacto'],$rowm['fecha_nac']);

                    echo '<label><span>'.$rowm['nombre'].'</span><input type="button" class="button" value="Editar" name="boton_editar" id="boton_editar" onclick="editar(\''.$rowm["id"].'\');"></label>';

                }

            }

        }

        echo '<div align="center"><input type="button" class="button" value="Agregar miembro" name="agregar_miembro" onclick="editar(\'0\');"></div>';

        echo '<div id="editmi" style="display:none;">

            <label>

                <span>Nombre Completo:</span><input type="text" id="nombre1" name="nombre[1]" size="50"/>

            </label>

            <label>

                <span>Fecha de nacimiento:</span><label class="white-pinkt" for="dia[1]">D&iacute;a</label>&nbsp;<select class="pinked" id="dia1" name="dia[1]">';

                for($i=0;$i<=31;$i++){

                    if($i==0){

                        echo '<option value="" selected> -- </option>';

                    }

                    else{

                        echo '<option value="'.$i.'">'.$i.'</option>';

                    }

                }

                echo '</select>&nbsp<label class="white-pinkt" for="mes[1]">Mes</label>&nbsp;<select class="pinked" id="mes1" name="mes[1]">';

                for($i=0;$i<=12;$i++){

                    if($i==0){

                        echo '<option value="" selected> -- </option>';

                    }

                    else{

                        echo '<option value="'.$i.'">'.$i.'</option>';

                    }

                }

                echo '</select>&nbsp<label class="white-pinkt" for="anio1">A&ntildeo</label>&nbsp<select class="pinked" id="anio1" name="anio[1]">';

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

                <span>Sexo:</span><input type="radio" id="masculino1" name="sexo[1]" value="Masculino"><label class="white-pinked" for="masculino1">Masculino</label><input type="radio" id="femenino1" name="sexo[1]" value="Femenino"><label class="white-pinked" for="femenino1">Femenino</label>

            </label>

            <label>

                <span>Nivel Educativo:</span><select id="educacion1" name="educacion[1]">

                <option value="" selected> -- Seleccione -- </option>

                <option value="primaria">Primaria</option>

                <option value="secundaria">Secundaria</option>

                <option value="preparatoria">Preparatoria</option>

                <option value="profesional">Carrera Profesional</option>

                <option value="tecnicos">Estudios T&eacute;cnicos</option>

                </select>

            </label>

            <label>

                <span>Rol en el comit&eacute;:</span><select id="rol1" name="rol[1]">

                <option value="" selected> -- Seleccione -- </option>

                <option value="1">Presidente</option>

                <option value="2">Secretario</option>

                <option value="3">Tesorero</option>

                <option value="4">Vocal</option>

                <option value="5">Comunicaci&oacute;n</option>

                <option value="6">Vecino activo</option>

                <option value="7">Vecino interesado</option>

                </select><a href="javascript:void(0);" title="Selecciona el rol asignado a la persona dentro del comité: Presidente, Secretario, Tesorero o vocal.
Vecino Activo: Persona que participa ocasionalmente con el comité o directamente en el parque.
Vecino Interesado: Persona que participa activamente y no forma parte del un comité.
"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Tel&eacute;fono:</span><input type="text" id="telefono1" name="telefono[1]">

            </label>

            <label>

                <span>Celular:</span><input type="text" id="celular1" name="celular[1]">

            </label>

            <label>

                <span>Tiene Facebook?</span>Sí <input type="radio" class="megusta" name="facebook[1]" id="siface1" value="1"> No <input type="radio" class="megusta" id="noface1" name="facebook[1]" value="2">

            </label>

            <label>

                <span>"Me gusta" a Parques Alegres en Facebook?</span><input type="checkbox" class="megusta" id="megusta1" name="megusta[1]" value="1">

            </label>

            <label>

                <span>Tiene Twitter?</span>Sí <input type="radio" class="megusta" id="sitwitter1" name="twitter[1]" value="1"> No <input type="radio" class="megusta" id="notwitter1" name="twitter[1]" value="2">

            </label>

            <label>

                <span>"Sigue" a Parques Alegres en Twitter?</span><input type="checkbox" class="megusta" id="siguemet1" name="siguemet[1]" value="1">

            </label>

            <label>

                <span>Tiene Instagram?</span>Sí <input type="radio" class="megusta" id="siinsta1" name="instagram[1]" value="1"> No <input type="radio" class="megusta" id="noinsta1" name="instagram[1]" value="2">

            </label>

            <label>

                <span>"Sigue" a Parques Alegres en Instagram?</span><input type="checkbox" class="megusta" id="siguemei1" name="siguemei[1]" value="1">

            </label>

            <label>

                <span>Correo electr&oacute;nico:</span><input type="text" id="email1" name="email[1]">

            </label>

            <label>

                <span>Contacto:</span><input type="radio" value="1" id="sicont1" name="contacto[1]"><label class="white-pinked" for="sicont1">S&iacute;</label><input type="radio" value="2" id="nocont1" name="contacto[1]"><label class="white-pinked" for="nocont1">No</label>

            </label>

            <input type="hidden" name="num_miembro" id="num_miembro" value="0">

            <div align="center"><input type="button" class="button" value="Cerrar" name="boton_cerrar" id="boton_cerrar" onclick="cerrar();"></div>

        </div><br>

        <input type="hidden" name="datos_miembros">

        <input type="hidden" name="nuevos_miembros">

    <div align="center"><input type="button" class="button" value="Guardar" name="boton_guardar" id="boton_guardar" onclick="validar(2,this.id);"></div>

    </div>

    </div>';

    /*else{

        echo '<div id="screen2"><div class="white-pink">

        <h1>Comit&eacute; de Parque</h1>

            <label>

                <span>Fecha de creación del Comité:</span><input type="text" readonly id="datepicker5" value="'.date("Y-m-d").'" name="fecha_comite"/>

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

                <span>Tiene Facebook?</span>Sí <input type="radio" class="megusta" name="facebook[1]" value="1"> No <input type="radio" class="megusta" name="facebook[1]" value="2">

            </label>

            <label>

                <span>"Me gusta" a Parques Alegres en Facebook?</span><input type="checkbox" class="megusta" name="megusta[1]" value="1">

            </label>

            <label>

                <span>Tiene Twitter?</span>Sí <input type="radio" class="megusta" name="twitter[1]" value="1"> No <input type="radio" class="megusta" name="twitter[1]" value="2">

            </label>

            <label>

                <span>"Sigue" a Parques Alegres en Twitter?</span><input type="checkbox" class="megusta" name="siguemet[1]" value="1">

            </label>

            <label>

                <span>Tiene Instagram?</span>Sí <input type="radio" class="megusta" name="instagram[1]" value="1"> No <input type="radio" class="megusta" name="instagram[1]" value="2">

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

        <div align="center"><input type="button" class="button" value="Guardar" name="boton_guardar" id="boton_guardar" onclick="validar(2,this.id);"></div>

        <input type="hidden" name="num_miembro" id="num_miembro" value=1>

        </div>

        </div>';

    }*/

        $sqll="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1,1";

        $ress=mysql_query($sqll);

        $roww=mysql_fetch_array($ress);

        $totala=0;

        if(is_array($roww)){

            foreach($roww as $k=>$v){

                if(!is_int($k)){

                    if($k!="asesor_captura" && $k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){

                        $totala=$totala+$v;

                    }

                }

            }

        }

        $total=0;

        $totala=$totala/7;

        if(is_array($rowz)){

            foreach($rowz as $k=>$v){

                if(!is_int($k)){

                    if($k!="asesor_captura" && $k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){

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

    echo '

    <div id="screen11">

    <div class="compromisos">';

    //if($_GET['ver']==1){

    	echo '<div class="CSSTableGenerator"><table><tr><td>Parámetro</td><td>Compromiso</td><td>Fecha del compromiso</td><td>Estatus</td></tr>';

            $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' and id='".$_POST['parque']."' order by post_title ASC";

            $res=mysql_query($sql);

            $totcomp=0;

            while($row=mysql_fetch_array($res)){

                    $sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."'";

                    $res1=mysql_query($sql1);

                    if(mysql_num_rows($res1)>0){

                        $i=11;

                            while($row1=mysql_fetch_array($res1)){

                                    echo '<tr>

                                    <td>'.$nomparametros[array_search($row1['parametro'], $inparametros)].'</td>

                                    <td>';

                                    if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){

                                            $comp=explode(",",$row1['compromiso']);

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

                                                    if($comp[1]==111){

                                                            $namee="Instalaciones";

                                                    }

                                                    if($comp[1]==112){

                                                            $namee="Deportiva";

                                                    }

                                                    if($comp[1]==113){

                                                        $namee="Áreas de esparcimiento";

                                                    }

                                                    if($comp[1]==114){

                                                        $namee="Áreas verdes";

                                                    }    

                                            }

                                            echo $compromisos[$comp[0]].': '.$namee;

                                    }

                                    else{

                                    	if(is_numeric($row1['compromiso'])) {

                                            echo $compromisos[$row1['compromiso']];

                                        }

                                        else{

                                        	echo $row1['compromiso'];

                                        }

                                    }

                                    echo '</td>

                                    <td>'.$row1['fecha_visita'].'</td><td><select name="estatuscomp'.$row1['cve'].'" onchange="new_fecha(this.name);"';

                                    if($row1['estatus']!=1 && $row1['estatus']!=2){

                                        echo ' disabled';    

                                    }

                                    echo '>';

                                    foreach($statuscom as $k=>$v){

                                        echo '<option value="'.$k.'"';

                                        if($row1['estatus']==$k){

                                            echo ' selected';

                                        }

                                        echo '>'.$v.'</option>';

                                    }

                                    echo '</select><input type="date" style="display:none;" value="'.date("Y-m-d").'" id="nueva_fecha'.$row1['cve'].'" name="nueva_fecha'.$row1['cve'].'"/></td></tr>';

                            }

                            $totcomp=$totcomp+mysql_num_rows($res1);

                    }

                    else{

                            echo '<tr><td colspan="4">No tiene compromisos</td></tr>';

                    }

            }

            echo '<tr><td>Total:</td><td colspan="3">'.$totcomp.'</td></tr>';

    		echo '</table></div><br><br>

    		<input type="hidden" name="parquecomp" value="'.$_POST['parque'].'">

    		<input type="button" class="button" value="Exportar a excel" onClick="exportar();">';

    /*}

    else{

    	echo '<div class="CSSTableGenerator"><table><tr><td>Parámetro</td><td>Compromiso</td><td>Meta</td><td>Fecha del compromiso</td><td>Promesa de Cumplimiento</td><td>Estatus</td></tr>';

            $sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' and id='".$_POST['parque']."' order by post_title ASC";

            $res=mysql_query($sql);

            $totcomp=0;

            while($row=mysql_fetch_array($res)){

                    $sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."'";

                    $res1=mysql_query($sql1);

                    if(mysql_num_rows($res1)>0){

                        $i=11;

                            while($row1=mysql_fetch_array($res1)){

                                    echo '<tr>

                                    <td>'.$nomparametros[array_search($row1['parametro'], $inparametros)].'</td>

                                    <td>';

                                    if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){

                                            $comp=explode(",",$row1['compromiso']);

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

                                                    if($comp[1]==111){

                                                            $namee="Instalaciones";

                                                    }

                                                    if($comp[1]==112){

                                                            $namee="Deportiva";

                                                    }

                                                    if($comp[1]==113){

                                                        $namee="Áreas de esparcimiento";

                                                    }

                                                    if($comp[1]==114){

                                                        $namee="Áreas verdes";

                                                    }    

                                            }

                                            echo $compromisos[$comp[0]].': '.$namee;

                                    }

                                    else{

                                            echo $compromisos[$row1['compromiso']];

                                    }

                                    echo '</td>

                                    <td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td><td><select name="estatuscomp'.$row1['cve'].'" onchange="new_fecha(this.name);"';

                                    if($row1['estatus']!=1 && $row1['estatus']!=2){

                                        echo ' disabled';    

                                    }

                                    echo '>';

                                    foreach($statuscom as $k=>$v){

                                        echo '<option value="'.$k.'"';

                                        if($row1['estatus']==$k){

                                            echo ' selected';

                                        }

                                        echo '>'.$v.'</option>';

                                    }

                                    echo '</select><input type="date" style="display:none;" value="'.date("Y-m-d").'" id="nueva_fecha'.$row1['cve'].'" name="nueva_fecha'.$row1['cve'].'"/></td></tr>';

                            }

                            $totcomp=$totcomp+mysql_num_rows($res1);

                    }

                    else{

                            echo '<tr><td colspan="8">No tiene compromisos</td></tr>';

                    }

            }

            echo '<tr><td>Total:</td><td colspan="7">'.$totcomp.'</td></tr>';

    		echo '</table></div><br><br>';

    }*/

    echo '

    <input type="button" id="guardar_compromisos" class="button" value="Guardar" name="guardar_compromisos" onclick="validar(11,this.id);">

    </div>

    </div>

    <div id="screen12">
	    <div class="white-half">
		    <h1>Evidencias Parámetros
			    <span>Adjunte la evidencia de los parámetros</span>
			</h1>
		    <label id="con_evireu" style="display:none;">
		    	<span>Evidencia Reuniones</span><input type="file" id="file_reuniones" name="file_reuniones[]" accept="image/x-png,image/gif,image/jpeg" multiple><a href="javascript:void(0);" title="El nombre del archivo debe ser menor a 100 caracteres, con tamaño no mayor a 2MB y del tipo jpg, png o gif "><img src="help.png" border="0"></a>
		    </label>
			<label id="con_evical" style="display:none;">
		    	<span>Evidencia Calendario</span><input type="file" id="file_calendario" name="file_calendario[]" accept="image/x-png,image/gif,image/jpeg" multiple><a href="javascript:void(0);" title="El nombre del archivo debe ser menor a 100 caracteres, con tamaño no mayor a 2MB y del tipo jpg, png o gif "><img src="help.png" border="0"></a>
		    </label>
		    <input id="boton_evidencias" type="button" class="button" value="Guardar" onClick="validar(12,this.id);">
	    </div>
	</div>

    <div id="screen3">

    <div class="white-coment">

    <input type="hidden" name="asesorpa" value="'.trim($user->ID).'">

        '; 
        //if($_GET['ver']==1){

        	echo '

	        <table border="0" width="940px" style="table-layout:fixed;">

	        <tr><th width="33%">Comit&eacute;</th><th width="11%">Visita anterior</th><th width="11%">Visita</th><th width="33%">Comentarios<a href="javascript:void(0);" title="Agrega un comentario si hubo algún cambio de calificación entre la visita anterior y la actual. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a></th><th></th width="11%"></tr>

	        <tr>

	            <td>Opera con 3 personas o m&aacute;s:</td>

	            <td align="center" id="operaant">'.$roww['opera'].'</td>

	            <td align="center" id="operaact">'.$rowz['opera'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comopera"></textarea></td><td id="needopera"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>C&oacute;mo est&aacute; formalizado?:</td>

	            <td align="center" id="formalizaant">'.$roww['formaliza'].'</td>

	            <td align="center" id="formalizaact">'.$rowz['formaliza'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comformaliza"></textarea></td><td id="needformaliza"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Cuenta con buena organizaci&oacute;n:</td>

	            <td align="center" id="organizaant">'.$roww['organiza'].'</td>

	            <td align="center" id="organizaact">'.$rowz['organiza'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comorganiza"></textarea></td><td id="needorganiza"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Existen reuniones con regularidad:</td>

	            <td align="center" id="reunionant">'.$roww['reunion'].'</td>

	            <td align="center" id="reunionact">'.$rowz['reunion'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comreunion"></textarea></td><td id="needreunion"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Tienen proyectos en proceso:</td>

	            <td align="center" id="proyectoant">'.$roww['proyecto'].'</td>

	            <td align="center" id="proyectoact">'.$rowz['proyecto'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comproyecto"></textarea></td><td id="needproyecto"><img src="alert.png"></td>

	        </tr>

	        <tr><th>Instalaciones</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Cuenta con Visi&oacute;n del espacio:</td>

	            <td align="center" id="vespacioant">'.$roww['vespacio'].'</td>

	            <td align="center" id="vespacioact">'.$rowz['vespacio'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comvespacio"></textarea></td><td id="needvespacio"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Cuenta con Proyecto de dise&ntilde;o:</td>

	            <td align="center" id="disenioant">'.$roww['disenio'].'</td>

	            <td align="center" id="disenioact">'.$rowz['disenio'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comdisenio"></textarea></td><td id="needdisenio"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Cuenta con Proyecto ejecutivo:</td>

	            <td align="center" id="ejecutivoant">'.$roww['ejecutivo'].'</td>

	            <td align="center" id="ejecutivoact">'.$rowz['ejecutivo'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comejecutivo"></textarea></td><td id="needejecutivo"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Esta en buen estado lo que existe:</td>

	            <td align="center" id="estadoant">'.$roww['estado'].'</td>

	            <td align="center" id="estadoact">'.$rowz['estado'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comestado"></textarea></td><td id="needestado"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td style="word-wrap:break-word;">Hay instalaciones en la mayoria del espacio cancha, &aacute;reas verdes, banquetas:</td>

	            <td align="center" id="instalacionesant">'.$roww['instalaciones'].'</td>

	            <td align="center" id="instalacionesact">'.$rowz['instalaciones'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="cominstalaciones"></textarea></td><td id="needinstalaciones"><img src="alert.png"></td>

	        </tr>

	        <tr><th>Ingresos</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Tienen fuente de ingresos permanentes:</td>

	            <td align="center" id="ingresopant">'.$roww['ingresop'].'</td>

	            <td align="center" id="ingresopact">'.$rowz['ingresop'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comingresop"></textarea></td><td id="needingresop"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Es suficiente lo ingresado para operar bien:</td>

	            <td align="center" id="ingresadopant">'.$roww['ingresadop'].'</td>

	            <td align="center" id="ingresadopact">'.$rowz['ingresadop'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comingresadop"></textarea></td><td id="needingresadop"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Tienen cuenta mancomunada:</td>

	            <td align="center" id="mancomunadoant">'.$roww['mancomunado'].'</td>

	            <td align="center" id="mancomunadoact">'.$rowz['mancomunado'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="commancomunado"></textarea></td><td id="needmancomunado"><img src="alert.png"></td>

	        </tr>

	        <tr><th>Eventos</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Hay eventos con regularidad:</td>

	            <td align="center" id="eventosrant">'.$roww['eventosr'].'</td>

	            <td align="center" id="eventosract">'.$rowz['eventosr'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comeventosr"></textarea></td><td id="needeventosr"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Cuentan con un calendario anual de actividades:</td>

	            <td align="center" id="eventosant">'.$roww['eventos'].'</td>

	            <td align="center" id="eventosact">'.$rowz['eventos'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comeventos"></textarea></td><td id="needeventos"><img src="alert.png"></td>

	        </tr>

	        <tr><th>&Aacute;reas verdes</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Cuenta con &aacute;reas verdes, c&eacute;sped y jard&iacute;n etc:</td>

	            <td align="center" id="averdesant">'.$roww['averdes'].'</td>

	            <td align="center" id="averdesact">'.$rowz['averdes'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comaverdes"></textarea></td><td id="needaverdes"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Se encuentra en buen estado:</td>

	            <td align="center" id="estaverant">'.$roww['estaver'].'</td>

	            <td align="center" id="estaveract">'.$rowz['estaver'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comestaver"></textarea></td><td id="needestaver"><img src="alert.png"></td>

	        </tr>

	        <tr><th>Afluencia</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Porcentaje de afluencia sobre lo existente:</td>

	            <td align="center" id="genteant">'.$roww['gente'].'</td>

	            <td align="center" id="genteact">'.$rowz['gente'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comgente"></textarea></td><td id="needgente"><img src="alert.png"></td>

	        </tr>

	        <tr><th>Orden</th><th>Visita anterior</th><th>Visita</th><th>Comentarios</th></tr>

	        <tr>

	            <td>Las instalaciones se respetan:</td>

	            <td align="center" id="respintant">'.$roww['respint'].'</td>

	            <td align="center" id="respintact">'.$rowz['respint'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comrespint"></textarea></td><td id="needrespint"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Se cuenta con un reglamento de orden:</td>

	            <td align="center" id="ordenant">'.$roww['orden'].'</td>

	            <td align="center" id="ordenact">'.$rowz['orden'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comorden"></textarea></td><td id="needorden"><img src="alert.png"></td>

	        </tr>

	        <tr>

	            <td>Se mantiene limpio:</td>

	            <td align="center" id="limpiezaant">'.$roww['limpieza'].'</td>

	            <td align="center" id="limpiezaact">'.$rowz['limpieza'].'</td>

	            <td><textarea style="width:100%;height:90px;" name="comlimpieza"></textarea></td><td id="needlimpieza"><img src="alert.png"></td>

	        </tr>

	        <tr><th colspan="5">Visita</th></tr><tr><td>Comentarios generales de la visita:<a href="javascript:void(0);" title="Agrega un comentario general de la visita. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a></td><td align="center">'; if($totala>0){echo round($totala);} echo '</td><td align="center">'; if($total>0){echo '<input type="hidden" name="totalvis">'; echo round($total);} echo '</td>

	            <td align="right"><textarea style="width:100%;height:90px;" name="comgenvisita"></textarea></td><td id="needgenvisita"><img src="alert.png"></td></tr>

            <tr><td rowspan="3">Compromisos solidarios de la visita:<a href="javascript:void(0);" title="Indica los compromisos solidarios que el comité estableció en la visita."><img src="help.png" border="0"></a></td><td align="center" colspan="2">
            	<select id="parametro_compromiso1" name="parametro_compromiso1" onchange="sel_compromiso(1);">
            		<option value="" selected> -- Seleccione -- </option>'; 
		        	foreach ($inparametros as $key => $value) {
		        		if($value=="opera"){
		        			echo '<optgroup label="Comité">';
		        		}
		        		if($value=="vespacio"){
		        			echo '</optgroup><optgroup label="Instalaciones">';
		        		}
		        		if($value=="ingresop"){
		        			echo '</optgroup><optgroup label="Ingresos">';
		        		}
		        		if($value=="eventosr"){
		        			echo '</optgroup><optgroup label="Eventos">';
		        		}
		        		if($value=="averdes"){
		        			echo '</optgroup><optgroup label="Áreas verdes">';
		        		}
		        		if($value=="gente"){
		        			echo '</optgroup><optgroup label="Afluencia">';
		        		}
		        		if($value=="respint"){
		        			echo '</optgroup><optgroup label="Orden">';
		        		}
		        		echo '<option value="'.$value.'">'.$nomparametros[array_search($value, $inparametros)].'</option>';
		        	}
		        	echo '</select>
		        </td><td><select id="compromiso_solidario1" name="compromiso_solidario1" onchange="addsel_comp(1);"><option value="" selected> -- Seleccione -- </option></select><select style="display:none;" id="compest_solidario1" name="compest_solidario1"><option value=""> -- Seleccione -- </option></select></td>
		    </tr>
        	<tr><td align="center" colspan="2">
        		<select id="parametro_compromiso2" name="parametro_compromiso2" onchange="sel_compromiso(2);"><option value="" selected> -- Seleccione -- </option>'; 
	        	foreach ($inparametros as $key => $value) {
	        		if($value=="opera"){
		        			echo '<optgroup label="Comité">';
		        		}
		        		if($value=="vespacio"){
		        			echo '</optgroup><optgroup label="Instalaciones">';
		        		}
		        		if($value=="ingresop"){
		        			echo '</optgroup><optgroup label="Ingresos">';
		        		}
		        		if($value=="eventosr"){
		        			echo '</optgroup><optgroup label="Eventos">';
		        		}
		        		if($value=="averdes"){
		        			echo '</optgroup><optgroup label="Áreas verdes">';
		        		}
		        		if($value=="gente"){
		        			echo '</optgroup><optgroup label="Afluencia">';
		        		}
		        		if($value=="respint"){
		        			echo '</optgroup><optgroup label="Orden">';
		        		}
	        		echo '<option value="'.$value.'">'.$nomparametros[array_search($value, $inparametros)].'</option>';
	        	}
	        	echo '</select>
	        	</td><td><select id="compromiso_solidario2" name="compromiso_solidario2" onchange="addsel_comp(2);"><option value="" selected> -- Seleccione -- </option></select><select style="display:none;" id="compest_solidario2" name="compest_solidario2"><option value=""> -- Seleccione -- </option></select></td>
	        </tr>
        	<tr><td colspan="2" align="center">
        		<select id="parametro_compromiso3" name="parametro_compromiso3" onchange="sel_compromiso(3);"><option value="" selected> -- Seleccione -- </option>'; 
	        	foreach ($inparametros as $key => $value) {
	        		if($value=="opera"){
		        			echo '<optgroup label="Comité">';
		        		}
		        		if($value=="vespacio"){
		        			echo '</optgroup><optgroup label="Instalaciones">';
		        		}
		        		if($value=="ingresop"){
		        			echo '</optgroup><optgroup label="Ingresos">';
		        		}
		        		if($value=="eventosr"){
		        			echo '</optgroup><optgroup label="Eventos">';
		        		}
		        		if($value=="averdes"){
		        			echo '</optgroup><optgroup label="Áreas verdes">';
		        		}
		        		if($value=="gente"){
		        			echo '</optgroup><optgroup label="Afluencia">';
		        		}
		        		if($value=="respint"){
		        			echo '</optgroup><optgroup label="Orden">';
		        		}
	        		echo '<option value="'.$value.'">'.$nomparametros[array_search($value, $inparametros)].'</option>';
	        	}
	        	echo '</select>
	        	</td><td><select id="compromiso_solidario3" name="compromiso_solidario3" onchange="addsel_comp(3);"><option value="" selected> -- Seleccione -- </option></select><select style="display:none;" id="compest_solidario3" name="compest_solidario3"><option value=""> -- Seleccione -- </option></select></td>
	        </tr>
	        </table>';

        /*}

        else{

        	echo '

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

	            echo '<td><select name="compopera"><option value="" selected> -- Seleccione --</option><option value="1">'.$compromisos[1].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento1" value="'.date("Y-m-d").'" name="cumplimiento_opera" onchange="filldates(this.value);"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comopera"></textarea></td><td id="needopera"><img src="alert.png"></td>

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

	            echo '<td><select name="compformaliza"><option value="" selected> -- Seleccione --</option><option value="2">'.$compromisos[2].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento2" value="'.date("Y-m-d").'" name="cumplimiento_formaliza"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comformaliza"></textarea></td><td id="needformaliza"><img src="alert.png"></td>

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

	           echo '<td><select name="comporganiza"><option value="" selected> -- Seleccione --</option><option value="3">'.$compromisos[3].'</option><option value="4">'.$compromisos[4].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento3" value="'.date("Y-m-d").'" name="cumplimiento_organiza"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comorganiza"></textarea></td><td id="needorganiza"><img src="alert.png"></td>

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

	            echo '<td><select name="compreunion"><option value="" selected> -- Seleccione --</option><option value="5">'.$compromisos[5].'</option><option value="6">'.$compromisos[6].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento4" value="'.date("Y-m-d").'" name="cumplimiento_reunion"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comreunion"></textarea></td><td id="needreunion"><img src="alert.png"></td>

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

	            echo '<td><select name="compproyecto"><option value="" selected> -- Seleccione --</option><option value="7">'.$compromisos[7].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento5" value="'.date("Y-m-d").'" name="cumplimiento_proyecto"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comproyecto"></textarea></td><td id="needproyecto"><img src="alert.png"></td>

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

	            echo '<td><select name="compvespacio"><option value="" selected> -- Seleccione --</option><option value="8">'.$compromisos[8].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento6" value="'.date("Y-m-d").'" name="cumplimiento_vespacio"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comvespacio"></textarea></td><td id="needvespacio"><img src="alert.png"></td>

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

	            echo '<td><select name="compdisenio"><option value="" selected> -- Seleccione --</option><option value="9">'.$compromisos[9].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento7" value="'.date("Y-m-d").'" name="cumplimiento_disenio"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comdisenio"></textarea></td><td id="needdisenio"><img src="alert.png"></td>

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

	            echo '<td><select name="compejecutivo"><option value="" selected> -- Seleccione --</option><option value="10">'.$compromisos[10].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento8" value="'.date("Y-m-d").'" name="cumplimiento_ejecutivo"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comejecutivo"></textarea></td><td id="needejecutivo"><img src="alert.png"></td>

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

	            echo '</select><br>

	            <input type="text" readonly id="fcumplimiento9" value="'.date("Y-m-d").'" name="cumplimiento_estado"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comestado"></textarea></td><td id="needestado"><img src="alert.png"></td>

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

	            echo '</select><br>

	            <input type="text" readonly id="fcumplimiento10" value="'.date("Y-m-d").'" name="cumplimiento_instalaciones"/></td>

	            <td><textarea style="width:200px;height:90px;" name="cominstalaciones"></textarea></td><td id="needinstalaciones"><img src="alert.png"></td>

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

	            echo '</select><br>

	            <input type="text" readonly id="fcumplimiento11" value="'.date("Y-m-d").'" name="cumplimiento_ingresop"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comingresop"></textarea></td><td id="needingresop"><img src="alert.png"></td>

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

	            <option value="28">'.$compromisos[28].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento12" value="'.date("Y-m-d").'" name="cumplimiento_ingresadop"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comingresadop"></textarea></td><td id="needingresadop"><img src="alert.png"></td>

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

	            echo '<td><select name="compmancomunado"><option value="" selected> -- Seleccione --</option><option value="29">'.$compromisos[29].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento13" value="'.date("Y-m-d").'" name="cumplimiento_mancomunado"/></td>

	            <td><textarea style="width:200px;height:90px;" name="commancomunado"></textarea></td><td id="needmancomunado"><img src="alert.png"></td>

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

	            <select name="compevent" id="compevent"><option value="" selected> -- Seleccione --</select><br>

	            <input type="text" readonly id="fcumplimiento14" value="'.date("Y-m-d").'" name="cumplimiento_eventosr"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comeventosr"></textarea></td><td id="needeventosr"><img src="alert.png"></td>

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

	            echo '<td><select name="compeventos"><option value="" selected> -- Seleccione --</option><option value="36">'.$compromisos[36].'</option><option value="37">'.$compromisos[37].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento15" value="'.date("Y-m-d").'" name="cumplimiento_eventos"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comeventos"></textarea></td><td id="needeventos"><img src="alert.png"></td>

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

	            <option value="40">'.$compromisos[40].'</option><option value="41">'.$compromisos[41].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento16" value="'.date("Y-m-d").'" name="cumplimiento_averdes"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comaverdes"></textarea></td><td id="needaverdes"><img src="alert.png"></td>

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

	            echo '</select><br>

	            <input type="text" readonly id="fcumplimiento17" value="'.date("Y-m-d").'" name="cumplimiento_estaver"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comestaver"></textarea></td><td id="needestaver"><img src="alert.png"></td>

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

	            echo '</select><br>

	            <input type="text" readonly id="fcumplimiento18" value="'.date("Y-m-d").'" name="cumplimiento_gente"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comgente"></textarea></td><td id="needgente"><img src="alert.png"></td>

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

	            <option value="74">'.$compromisos[74].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento19" value="'.date("Y-m-d").'" name="cumplimiento_respint"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comrespint"></textarea></td><td id="needrespint"><img src="alert.png"></td>

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

	            <option value="77">'.$compromisos[77].'</option><option value="78">'.$compromisos[78].'</option><option value="79">'.$compromisos[79].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento20" value="'.date("Y-m-d").'" name="cumplimiento_orden"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comorden"></textarea></td><td id="needorden"><img src="alert.png"></td>

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

	            echo '<td><select name="complimpieza"><option value="" selected> -- Seleccione --</option><option value="80">'.$compromisos[80].'</option><option value="81">'.$compromisos[81].'</option></select><br>

	            <input type="text" readonly id="fcumplimiento21" value="'.date("Y-m-d").'" name="cumplimiento_limpieza"/></td>

	            <td><textarea style="width:200px;height:90px;" name="comlimpieza"></textarea></td><td id="needlimpieza"><img src="alert.png"></td>

	        </tr>

	        <tr><th colspan="6">Visita</th></tr><tr><td>Comentarios generales de la visita:</td><td align="center">'; if($totala>0){echo round($totala);} echo '</td><td align="center">'; if($total>0){echo '<input type="hidden" name="totalvis">'; echo round($total);} echo '</td>

	            <td align="center"><span id="totalm"></span><input type="hidden" name="totalmeta"></td><td align="right" colspan="2"><textarea style="width:400px;height:90px;" name="comgenvisita"></textarea></td><td id="needgenvisita"><img src="alert.png"></td></tr>

	        </table>';

	    }*/

	    echo '

    <div><input type="button" class="button" value="Guardar" name="boton_compromisos" id="boton_compromisos" onclick="validar(3,this.id);"></div>

    </div></div>';

    if ($id_post>0) {

        $sqlp="select key1.post_title as parque, key2.meta_value as vialidadprin, key3.meta_value as vialidad1, key4.meta_value as vialidad2, key5.meta_value as vialidadpos,

        key6.meta_value as tipoa, key7.meta_value as noma, key8.meta_value as descubic, key9.meta_value as sector, key10.meta_value as zona, key11.meta_value as nivel,

        key12.meta_value as regimen, key13.meta_value as legal, key14.meta_value as tipo, key15.meta_value as estado, key16.meta_value as ciudad, key17.meta_value as localidad,

        key18.meta_value as apoyado, key19.meta_value as observaciones from wp_posts key1

        LEFT JOIN wp_postmeta key2 ON key1.id = key2.post_id AND key2.meta_key = '_parque_vialidad_prin'

        LEFT JOIN wp_postmeta key3 ON key1.id = key3.post_id AND key3.meta_key = '_parque_vialidad1'

        LEFT JOIN wp_postmeta key4 ON key1.id = key4.post_id AND key4.meta_key = '_parque_vialidad2'

        LEFT JOIN wp_postmeta key5 ON key1.id = key5.post_id AND key5.meta_key = '_parque_vialidad_pos'

        LEFT JOIN wp_postmeta key6 ON key1.id = key6.post_id AND key6.meta_key = '_parque_tipoasentamiento'

        LEFT JOIN wp_postmeta key7 ON key1.id = key7.post_id AND key7.meta_key = '_parque_nomasentamiento'

        LEFT JOIN wp_postmeta key8 ON key1.id = key8.post_id AND key8.meta_key = '_parque_desc_ubic'

        LEFT JOIN wp_postmeta key9 ON key1.id = key9.post_id AND key9.meta_key = '_parque_sec'

        LEFT JOIN wp_postmeta key10 ON key1.id = key10.post_id AND key10.meta_key = '_parque_zona'

        LEFT JOIN wp_postmeta key11 ON key1.id = key11.post_id AND key11.meta_key = '_parque_nivel'

        LEFT JOIN wp_postmeta key12 ON key1.id = key12.post_id AND key12.meta_key = '_parque_regimen'

        LEFT JOIN wp_postmeta key13 ON key1.id = key13.post_id AND key13.meta_key = '_parque_legal'

        LEFT JOIN wp_postmeta key14 ON key1.id = key14.post_id AND key14.meta_key = '_parque_tipo'

        LEFT JOIN wp_postmeta key15 ON key1.id = key15.post_id AND key15.meta_key = '_parque_estado'

        LEFT JOIN wp_postmeta key16 ON key1.id = key16.post_id AND key16.meta_key = '_parque_ciudad'

        LEFT JOIN wp_postmeta key17 ON key1.id = key17.post_id AND key17.meta_key = '_parque_localidad'

        LEFT JOIN wp_postmeta key18 ON key1.id = key18.post_id AND key18.meta_key = '_parque_seg'

        LEFT JOIN wp_postmeta key19 ON key1.id = key19.post_id AND key19.meta_key = '_parque_obs' where id='".$_POST['parque']."'";

        $resp=mysql_query($sqlp);

        $rowp=mysql_fetch_array($resp);

    }

    echo '<div id="screen4" '.$screenparque.'><div class="white-pink">

        <h1>Parque

            <span>Ingrese los datos del parque</span>

        </h1>

        <label>

            <span>Nombre del Parque:</span>

            <input type="text" name="nom_parque" value="'.$rowp['parque'].'"'; if($rowp['parque']!=""){ echo 'disabled'; } echo '/>

        </label>

        ';

        /*<label>

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

        */

        echo '

        <label>

            <span>Vialidad Principal: </span><input name="vialidadprin" type="text" value="'.$rowp['vialidadprin'].'"'; if($rowp['vialidadprin']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Vialidad 1: </span><input name="vialidad1" type="text" value="'.$rowp['vialidad1'].'"'; if($rowp['vialidad1']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Vialidad 2: </span><input name="vialidad2" type="text" value="'.$rowp['vialidad2'].'"'; if($rowp['vialidad2']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Vialidad Posterior: </span><input name="vialidadpos" type="text" value="'.$rowp['vialidadpos'].'"'; if($rowp['vialidadpos']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Tipo asentamiento: </span><select name="tipoasentamiento"'; if($rowp['tipoa']!=""){ echo 'disabled'; } echo '>

                <option value="" selected> -- Seleccione -- </option>

                <option value="1"'; if($rowp['tipoa']=="1"){ echo ' selected'; } echo '>Aeropuerto</option>

                <option value="2"'; if($rowp['tipoa']=="2"){ echo ' selected'; } echo '>Ampliación</option>

                <option value="3"'; if($rowp['tipoa']=="3"){ echo ' selected'; } echo '>Barrio</option>

                <option value="4"'; if($rowp['tipoa']=="4"){ echo ' selected'; } echo '>Cantón</option>

                <option value="5"'; if($rowp['tipoa']=="5"){ echo ' selected'; } echo '>Ciudad</option>

                <option value="6"'; if($rowp['tipoa']=="6"){ echo ' selected'; } echo '>Ciudad industrial</option>

                <option value="7"'; if($rowp['tipoa']=="7"){ echo ' selected'; } echo '>Colonia</option>

                <option value="8"'; if($rowp['tipoa']=="8"){ echo ' selected'; } echo '>Condominio</option>

                <option value="9"'; if($rowp['tipoa']=="9"){ echo ' selected'; } echo '>Conjunto habitacional</option>

                <option value="10"'; if($rowp['tipoa']=="10"){ echo ' selected'; } echo '>Corredor industrial</option>

                <option value="11"'; if($rowp['tipoa']=="11"){ echo ' selected'; } echo '>Coto</option>

                <option value="12"'; if($rowp['tipoa']=="12"){ echo ' selected'; } echo '>Cuartel</option>

                <option value="13"'; if($rowp['tipoa']=="13"){ echo ' selected'; } echo '>Ejido</option>

                <option value="14"'; if($rowp['tipoa']=="14"){ echo ' selected'; } echo '>Exhacienda</option>

                <option value="15"'; if($rowp['tipoa']=="15"){ echo ' selected'; } echo '>Fracción</option>

                <option value="16"'; if($rowp['tipoa']=="16"){ echo ' selected'; } echo '>Fraccionamiento</option>

                <option value="17"'; if($rowp['tipoa']=="17"){ echo ' selected'; } echo '>Granja</option>

                <option value="18"'; if($rowp['tipoa']=="18"){ echo ' selected'; } echo '>Hacienda</option>

                <option value="19"'; if($rowp['tipoa']=="19"){ echo ' selected'; } echo '>Ingenio</option>

                <option value="20"'; if($rowp['tipoa']=="20"){ echo ' selected'; } echo '>Manzana</option>

                <option value="21"'; if($rowp['tipoa']=="21"){ echo ' selected'; } echo '>Paraje</option>

                <option value="22"'; if($rowp['tipoa']=="22"){ echo ' selected'; } echo '>Parque Industrial</option>

                <option value="23"'; if($rowp['tipoa']=="23"){ echo ' selected'; } echo '>Privada</option>

                <option value="24"'; if($rowp['tipoa']=="24"){ echo ' selected'; } echo '>Prolongación</option>

                <option value="25"'; if($rowp['tipoa']=="25"){ echo ' selected'; } echo '>Pueblo</option>

                <option value="26"'; if($rowp['tipoa']=="26"){ echo ' selected'; } echo '>Puerto</option>

                <option value="27"'; if($rowp['tipoa']=="27"){ echo ' selected'; } echo '>Ranchería</option>

                <option value="28"'; if($rowp['tipoa']=="28"){ echo ' selected'; } echo '>Rancho</option>

                <option value="29"'; if($rowp['tipoa']=="29"){ echo ' selected'; } echo '>Región</option>

                <option value="30"'; if($rowp['tipoa']=="30"){ echo ' selected'; } echo '>Residencial</option>

                <option value="31"'; if($rowp['tipoa']=="31"){ echo ' selected'; } echo '>Rinconada</option>

                <option value="32"'; if($rowp['tipoa']=="32"){ echo ' selected'; } echo '>Sección</option>

                <option value="33"'; if($rowp['tipoa']=="33"){ echo ' selected'; } echo '>Sector</option>

                <option value="34"'; if($rowp['tipoa']=="34"){ echo ' selected'; } echo '>Supermanzana</option>

                <option value="35"'; if($rowp['tipoa']=="35"){ echo ' selected'; } echo '>Unidad</option>

                <option value="36"'; if($rowp['tipoa']=="36"){ echo ' selected'; } echo '>Unidad Habitacional</option>

                <option value="37"'; if($rowp['tipoa']=="37"){ echo ' selected'; } echo '>Villa</option>

                <option value="38"'; if($rowp['tipoa']=="38"){ echo ' selected'; } echo '>Zona Federal</option>

                <option value="39"'; if($rowp['tipoa']=="39"){ echo ' selected'; } echo '>Zona Industrial</option>

                <option value="40"'; if($rowp['tipoa']=="40"){ echo ' selected'; } echo '>Zona Militar</option>

                <option value="41"'; if($rowp['tipoa']=="41"){ echo ' selected'; } echo '>Zona Naval</option>

                </select>

        </label>

        <label>

            <span>Nombre asentamiento: </span><input name="nomasentamiento" type="text" value="'.$rowp['noma'].'"'; if($rowp['noma']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Descripción de ubicación: </span><textarea name="descubic"'; if($rowp['descubic']!=""){ echo 'readonly'; } echo '>'.$rowp['descubic'].'</textarea>

        </label>

        <label>

            <span>Zona: </span><select name="zona"'; if($rowp['zona']!=""){ echo 'disabled'; } echo '>

                <option value="" selected> -- Seleccione -- </option>

                <option value="1"'; if($rowp['zona']=="1"){ echo ' selected'; } echo '>Noreste (NE)</option>

                <option value="2"'; if($rowp['zona']=="2"){ echo ' selected'; } echo '>Noroeste (NO)</option>

                <option value="3"'; if($rowp['zona']=="3"){ echo ' selected'; } echo '>Sureste (SE)</option>

                <option value="4"'; if($rowp['zona']=="4"){ echo ' selected'; } echo '>Suroeste (SO)</option>

                </select>

        </label>

        <label>

            <span>Sector: </span><input name="sector" type="text" value="'.$rowp['sector'].'"'; if($rowp['sector']!=""){ echo 'readonly'; } echo '>

        </label>

        <label>

            <span>Estado: </span><select name="state" id="state" onchange="addsel(5);"'; if($rowp['estado']!=""){ echo 'disabled'; } echo '>

                <option value=""> -- Seleccione -- </option>

                <option value="1"'; if($rowp['estado']=="1"){ echo ' selected'; } echo '>Aguascalientes</option>

                <option value="2"'; if($rowp['estado']=="2"){ echo ' selected'; } echo '>Baja California</option>

                <option value="3"'; if($rowp['estado']=="3"){ echo ' selected'; } echo '>Baja California Sur</option>

                <option value="4"'; if($rowp['estado']=="4"){ echo ' selected'; } echo '>Campeche</option>

                <option value="5"'; if($rowp['estado']=="5"){ echo ' selected'; } echo '>Coahuila de Zaragoza</option>

                <option value="6"'; if($rowp['estado']=="6"){ echo ' selected'; } echo '>Colima</option>

                <option value="7"'; if($rowp['estado']=="7"){ echo ' selected'; } echo '>Chiapas</option>

                <option value="8"'; if($rowp['estado']=="8"){ echo ' selected'; } echo '>Chihuahua</option>

                <option value="9"'; if($rowp['estado']=="9"){ echo ' selected'; } echo '>Distrito Federal</option>

                <option value="10"'; if($rowp['estado']=="10"){ echo ' selected'; } echo '>Durango</option>

                <option value="11"'; if($rowp['estado']=="11"){ echo ' selected'; } echo '>Guanajuato</option>

                <option value="12"'; if($rowp['estado']=="12"){ echo ' selected'; } echo '>Guerrero</option>

                <option value="13"'; if($rowp['estado']=="13"){ echo ' selected'; } echo '>Hidalgo</option>

                <option value="14"'; if($rowp['estado']=="14"){ echo ' selected'; } echo '>Jalisco</option>

                <option value="15"'; if($rowp['estado']=="15"){ echo ' selected'; } echo '>México</option>

                <option value="16"'; if($rowp['estado']=="16"){ echo ' selected'; } echo '>Michoacán de Ocampo</option>

                <option value="17"'; if($rowp['estado']=="17"){ echo ' selected'; } echo '>Morelos</option>

                <option value="18"'; if($rowp['estado']=="18"){ echo ' selected'; } echo '>Nayarit</option>

                <option value="19"'; if($rowp['estado']=="19"){ echo ' selected'; } echo '>Nuevo León</option>

                <option value="20"'; if($rowp['estado']=="20"){ echo ' selected'; } echo '>Oaxaca</option>

                <option value="21"'; if($rowp['estado']=="21"){ echo ' selected'; } echo '>Puebla</option>

                <option value="22"'; if($rowp['estado']=="22"){ echo ' selected'; } echo '>Querétaro</option>

                <option value="23"'; if($rowp['estado']=="23"){ echo ' selected'; } echo '>Quintana Roo</option>

                <option value="24"'; if($rowp['estado']=="24"){ echo ' selected'; } echo '>San Luis Potosí</option>

                <option value="25"'; if($rowp['estado']=="25"){ echo ' selected'; } echo '>Sinaloa</option>

                <option value="26"'; if($rowp['estado']=="26"){ echo ' selected'; } echo '>Sonora</option>

                <option value="27"'; if($rowp['estado']=="27"){ echo ' selected'; } echo '>Tabasco</option>

                <option value="28"'; if($rowp['estado']=="28"){ echo ' selected'; } echo '>Tamaulipas</option>

                <option value="29"'; if($rowp['estado']=="29"){ echo ' selected'; } echo '>Tlaxcala</option>

                <option value="30"'; if($rowp['estado']=="30"){ echo ' selected'; } echo '>Veracruz de Ignacio de la Llave</option>

                <option value="31"'; if($rowp['estado']=="31"){ echo ' selected'; } echo '>Yucatán</option>

                <option value="32"'; if($rowp['estado']=="32"){ echo ' selected'; } echo '>Zacatecas</option>

                </select>

        </label>

        <label>

            <span>Municipio: </span><select name="ciudad" id="ciudad" onchange=addsel(6)'; if($rowp['ciudad']!=""){ echo 'disabled'; } echo '>

                <option value=""> -- Seleccione -- </option>';

                if($rowp['estado']=="25"){

                    echo '<option value="Culiacán"'; if($rowp['ciudad']=="Culiacán"){ echo ' selected'; } echo ' selected>Culiacán</option>

                    <option value="Navolato"'; if($rowp['ciudad']=="Navolato"){ echo ' selected'; } echo '>Navolato</option>';    

                }

                elseif($rowp['estado']==3){

                    echo '<option value="Comondú"'; if($rowp['ciudad']=="Comondú"){ echo ' selected'; } echo ' selected>Comondú</option>

                    <option value="Mulegé"'; if($rowp['ciudad']=="Mulegé"){ echo ' selected'; } echo '>Mulegé</option>

                    <option value="La Paz"'; if($rowp['ciudad']=="La Paz"){ echo ' selected'; } echo '>La Paz</option>

                    <option value="Los Cabos"'; if($rowp['ciudad']=="Los Cabos"){ echo ' selected'; } echo '>Los Cabos</option>

                    <option value="Loreto"'; if($rowp['ciudad']=="Loreto"){ echo ' selected'; } echo '>Loreto</option>';  

                }

                echo '</select>

        </label>

        <label>

            <span>Localidad: </span><select name="localidad" id="localidad"'; if($rowp['localidad']!=""){ echo 'disabled'; } echo '>

                <option value=""> -- Seleccione -- </option>

                </select>

        </label>

            <span>Nivel socioecon&oacute;mico de la zona:</span><select name="nivel"'; if($rowp['nivel']!=""){ echo 'disabled'; } echo '>

                <option value="" selected> -- Seleccione -- </option>

                <option value="1"'; if($rowp['nivel']=="1"){ echo ' selected'; } echo '>Alto (AB)</option>

                <option value="2"'; if($rowp['nivel']=="2"){ echo ' selected'; } echo '>Medio alto (C+)</option>

                <option value="3"'; if($rowp['nivel']=="3"){ echo ' selected'; } echo '>Medio ( C )</option>

                <option value="4"'; if($rowp['nivel']=="4"){ echo ' selected'; } echo '>medio bajo (D+)</option>

                <option value="5"'; if($rowp['nivel']=="5"){ echo ' selected'; } echo '>Bajo (D)</option>

                <option value="6"'; if($rowp['nivel']=="6"){ echo ' selected'; } echo '>Pobreza extrema (E)</option>

                </select>

        </label>

        <label>

            <span>R&eacute;gimen del parque: </span><select name="regimen"'; if($rowp['regimen']!=""){ echo 'disabled'; } echo '>

                <option value="" selected> -- Seleccione -- </option>

                <option value="1"'; if($rowp['regimen']=="1"){ echo ' selected'; } echo '>P&uacute;blico</option>

                <option value="2"'; if($rowp['regimen']=="2"){ echo ' selected'; } echo '>Condominal</option>

                <option value="3"'; if($rowp['regimen']=="3"){ echo ' selected'; } echo '>Concesionado</option>

                </select>

        </label>

        <label>

            <span>Situaci&oacute;n legal del parque: </span><select name="legal"'; if($rowp['legal']!=""){ echo 'disabled'; } echo '>

                <option value="" selected> -- Seleccione -- </option>

                <option value="1"'; if($rowp['legal']=="1"){ echo ' selected'; } echo '>Propiedad Gobierno Federal</option>

                <option value="2"'; if($rowp['legal']=="2"){ echo ' selected'; } echo '>Gobierno del Estado</option>

                <option value="3"'; if($rowp['legal']=="3"){ echo ' selected'; } echo '>Gobierno Municipal</option>

                <option value="4"'; if($rowp['legal']=="4"){ echo ' selected'; } echo '>Propiedad Ejidal</option>

                <option value="5"'; if($rowp['legal']=="5"){ echo ' selected'; } echo '>Propiedad Fraccionadora</option>

                </select>

        </label>

        <label>

            <span>Tipo de parque: </span><select name="tipo"'; if($rowp['tipo']!=""){ echo 'disabled'; } echo '>

                <option value="" selected=> -- Seleccione -- </option>

                <option value="1"'; if($rowp['tipo']=="1"){ echo ' selected'; } echo '>&Aacute;rea verde</option>

                <option value="2"'; if($rowp['tipo']=="2"){ echo ' selected'; } echo '>Centro barrio</option>

                <option value="3"'; if($rowp['tipo']=="3"){ echo ' selected'; } echo '>De bolsillo</option>

                <option value="4"'; if($rowp['tipo']=="4"){ echo ' selected'; } echo '>Lineal</option>

                <option value="5"'; if($rowp['tipo']=="5"){ echo ' selected'; } echo '>Mixto</option>

                <option value="6"'; if($rowp['tipo']=="6"){ echo ' selected'; } echo '>Parque urbano</option>

                <option value="7"'; if($rowp['tipo']=="7"){ echo ' selected'; } echo '>Plazuela</option>

                <option value="8"'; if($rowp['tipo']=="8"){ echo ' selected'; } echo '>Unidad deportiva</option>

                </select>

        </label>

        <label>

            <span>Apoyado por Parques Alegres: </span><input type="checkbox" class="megusta" value="1" name="apoyado"'; if($rowp['apoyado']=="1"){ echo 'checked disabled'; } echo '>

        </label>

        <label>

            <span>Observaciones generales: </span><textarea name="obsgenerales"'; if($rowp['observaciones']!=""){ echo 'readonly'; } echo '>'.$rowp['observaciones'].'</textarea>

        </label>

        <div align="center"><input class="button" type="button" value="Guardar Parque" name="guardar_parque" id="guardar_parque" onclick="validar(4,this.id)"></div>

    </div></div>

    <div id="screen5"><div class="white-check">';

    $sqlfc="select MAX(fecha) as fecha from checklist where cve_parque='".$_POST['parque']."'";

    $resfc=mysql_query($sqlfc);

    $rowfc=mysql_fetch_array($resfc);

    if($rowfc['fecha']!=""){

    	$fecha_checklist=$rowfc['fecha'];

    	$stylec='style="font-weight:bold;"';

    }

    else{

    	$fecha_checklist='No tiene';

    	$stylec='style="color:red;font-weight:bold;"';

    }

    $sqlch="select * from checklist where cve_parque='".$_POST['parque']."'";

    $resch=mysql_query($sqlch);

    while($rowch=mysql_fetch_array($resch)){

    	$parametro[$rowch['parametro'].'-'.$rowch['clasificacion']]=$rowch['data'];

    }

    echo 'Última modificación: <span '.$stylec.'>'.$fecha_checklist.'</span><br>

    <h2>Instalaciones</h2>

    <label>

    <span>&nbsp;</span><span class="titu">Cantidad</span><span class="titu">Bueno</span><span class="titu">Regular</span><span class="titu">Malo</span><span class="titu">&nbsp;Faltante</span></label><div style="clear:both;"></div>';

    $instalaciones= array("Bancas","Cerca","Alumbrado","Ba&ntilde;os","Fuentes","Botes de basura","Banqueta","Acceso para capacidades diferentes","Anclaje para bicicletas",

                          "Cajones de estacionamiento","Canasta de reciclaje");

    $esparcimiento= array("Techumbres","&Aacute;rea de adoqu&iacute;n","Bordillo de concreto","Pi&ntilde;ateros","Comedores",

                          "Asadores","Juegos infantiles","Palapa","Alberca","Camastros","Regaderas");

    $deportiva= array("Cancha de usos m&uacute;ltiples","Cancha de voleibol","Cancha de soccer","Cancha de Basquetbol","Cancha de beisbol","Cancha de softbol",

                      "Mesa de ping pong","Back stop","Andadores","Gradas","Ejercitadores","Ciclov&iacute;a","Gimnasio","Promotor deportivo","Porter&iacute;as",

                      "Tableros","Aros","Losa","Pintura");

    $acentos=array("&Aacute;","&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;");

    $sinacentos=array("A","a","e","i","o","u","n");

    $conacentos=array("Á","á","é","í","ó","ú","ñ");

        

    foreach ($instalaciones as $k=>$v) {

        $b=explode(' ',$v);

        $a=strtolower($b[0]);

        $a=str_replace($acentos, $sinacentos, $a);

        if($v=="Cajones de estacionamiento"){

        	$val=explode(',',$parametro['cajones-1']);

            echo '<label><span>'.$v.'</span>Cantidad: <input type="text" name="ccajones" value="'.$val[0].'">Faltante: <input type="text" name="fcajones" value="'.$val[1].'"></label>';

        }

        elseif($v=="Canasta de reciclaje"){

        	$val=$parametro['canasta-1'];

            echo '<label><span>'.$v.'</span><input type="radio" name="canasta" id="canasta" value="1"'; if($val==1){ echo ' checked';} echo'><label class="white-pinked" for="canasta">S&iacute;</label><input type="radio" id="canastan" name="canasta" value="2"'; if($val==2){ echo ' checked';} echo'><label class="white-pinked" for="canastan">No</label></label>';

        }

        else{

        	$val=explode(',',$parametro[$a.'-1']);

            echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'" value="'.$val[0].'"><input type="radio" name="'.$a.'" value="1"'; if($val[1]==1){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="2"'; if($val[1]==2){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="3"'; if($val[1]==3){ echo ' checked';} echo '><input type="text" name="f'.$a.'" value="'.$val[2].'"></label>';

        }

    }

    echo '<h2>&Aacute;rea esparcimiento</h2>';

    foreach ($esparcimiento as $k=>$v) {

        $b=explode(' ',$v);

        $a=strtolower($b[0]);

        $a=str_replace($acentos, $sinacentos, $a);

        $val=explode(',',$parametro[$a.'-2']);

        echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'" value="'.$val[0].'"><input type="radio" name="'.$a.'" value="1"'; if($val[1]==1){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="2"'; if($val[1]==2){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="3"'; if($val[1]==3){ echo ' checked';} echo '><input type="text" name="f'.$a.'" value="'.$val[2].'"></label>';

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

            echo '<label><span>'.$v.'</span><input type="radio" name="gimnasio" id="gimnasio" value="1"'; if($parametro['gimnasio-3']==1){ echo ' checked';} echo'><label class="white-pinked" for="gimnasio">S&iacute;</label><input type="radio" id="gimnasion" name="gimnasio" value="2"'; if($parametro['gimnasio-3']==2){ echo ' checked';} echo'><label class="white-pinked" for="gimnasion">No</label></label>';

        }

        elseif($v=="Promotor deportivo"){

            echo '<label><span>'.$v.'</span>Cu&aacute;ntos Promotores: <input type="text" name="promotores" value="'.$parametro['promotores-3'].'">Cu&aacute;ntos deportes: <input type="text" name="deportes" value="'.$parametro['deportes-3'].'"></label>';

        }

        else{

        	$val=explode(',',$parametro[$a.'-3']);

            echo '<label><span>'.$v.'</span><input type="text" name="c'.$a.'" value="'.$val[0].'"><input type="radio" name="'.$a.'" value="1"'; if($val[1]==1){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="2"'; if($val[1]==2){ echo ' checked';} echo '><input type="radio" name="'.$a.'" value="3"'; if($val[1]==3){ echo ' checked';} echo '><input type="text" name="f'.$a.'" value="'.$val[2].'"></label>';

        }

    }

            $val=explode(',',$parametro['cesped area verde-4']);

            $val2=explode(',',$parametro['cesped area deportiva-4']);

            $val3=explode(',',$parametro['cesped area recreativa-4']);

            $val4=explode(',',$parametro['arboles-4']);

            $val5=explode(',',$parametro['arbusto-4']);

            $val6=explode(',',$parametro['riego-4']);

    if($stat>0){

        echo '<h2>&Aacute;reas verdes</h2>

        <label>

            <span>Cuenta con:</span>

            <input type="checkbox" id="arboles" name="averdes[]" value="arboles" onClick="show_averdes(this.id);"><label class="white-pinky" for="arboles" >&aacute;rboles</label>

            <input type="checkbox" id="cesped" name="averdes[]" value="cesped" onClick="show_averdes(this.id);"><label class="white-pinky" for="cesped" >c&eacute;sped</label>

            <!--<input type="checkbox" id="jardin" name="averdes[]" value="jardin"><label class="white-pinky" for="jardin" >jard&iacute;n</label>-->

        </label>

        <div style="display:none;" id="paramarboles">

            <label>

                <span>Árboles:</span><input class="button" type="button" value="Agregar especie" onclick="agregar_av();">

            </label>

            <div id="esparboles" style="display:none;">

                <label>

                    <span>Endémico:</span>Sí<input type="radio" id="endemicos" onclick="images_arb(this.id);" name="endemico" value="1">No<input type="radio" id="endemicon" onclick="images_arb(this.id);" name="endemico" value="2">

                </label>

                <label>

                    <span>Escoge un árbol:</span>

                </label>

                    <div id="imgarbolend" style="display:none;">';

                    $directorio = 'endemico';

                    $ficheros1  = scandir($directorio);

                    foreach($ficheros1 as $k=>$v){

                        if(substr($v,0,1)!== '.'){

                            echo '<div style="display:inline-block;width:25%;"><div style="float:left;width:7%;"><input type="radio" name="arbolend" value="'.$v.'" style="width:20px;margin:0 0 0 0;"></div><div style="float:right;width:92%;"><center><img src="endemico/'.$v.'" width="100" height="100"><br>"Nombre"</center></div></div>';

                        }

                    }

                    echo '</div>

                    <div id="imgarbol" style="display:none;">';

                    $directorion = 'no_endemico';

                    $ficheros2  = scandir($directorion);

                    foreach($ficheros2 as $k=>$v){

                        if(substr($v,0,1)!== '.'){

                            echo '<div style="display:inline-block;width:25%;"><div style="float:left;width:7%;"><input type="radio" name="arbolno" value="'.$v.'" style="width:20px;margin:0 0 0 0;"></div><div style="float:right;width:92%;"><center><img src="no_endemico/'.$v.'" width="100" height="100"><br>"Nombre"</center></div></div>';

                        }

                    }

                    echo '</div>

                <div style="clear:both;"></div>

                <label>

                    <span>¿Cuántos arboles tienen altura de 1 a 5 metros?</span><input type="text" id="cantarbolesc" name="cantarbolesc">

                </label>

                <label>

                    <span>¿Cuántos arboles tienen altura de 5.01 a 10 metros?</span><input type="text" id="cantarbolesm" name="cantarbolesm">

                </label>

                <label>

                    <span>¿Cuántos arboles tienen altura de 10.01 metros en adelante?</span><input type="text" id="cantarbolesg" name="cantarbolesg">

                </label>

                <label>

                    <span>Promedio del ancho de los árboles</span><input type="text" id="promancho" name="promancho">

                </label>

                <label>

                    <span>¿Cuántos arboles están en el interior del parque?</span><input type="text" id="arbolesparque" name="arbolesparque">

                </label>

                <label>

                    <span>¿Cuántos arboles están en banqueta?</span><input type="text" id="arbolesbanqueta" name="arbolesbanqueta">

                </label>

                <label>

                    <span>¿Cuántos arboles dañan la banqueta?</span><input type="text" id="arbolesvsban" name="arbolesvsban">

                </label>

                <label>

                    <span>¿Cuántos arboles bajo la red electrica?</span><input type="text" id="arbolesred" name="arbolesred">

                </label>

                <label>

                    <span>¿Cuántos arboles tocan los cables?</span><input type="text" id="arbolescables" name="arbolescables">

                </label>

                <div align="center"><input type="button" class="button" value="Cerrar" onclick="cerrar_arb();"></div>

            </div>

        </div>

        <div style="display:none;" id="paramcesped">

            <label>

                <span>Pasto:</span><input class="button" type="button" value="Agregar area de pasto" onclick="agregar_pasto();">

            </label>

            <div id="esppasto" style="display:none;">

                <label>

                    <span>Tipo:</span>Silvestre<input type="radio" id="silvestre" name="tipopasto" value="silvestre">Comercial<input type="radio" id="comercial" name="tipopasto" value="comercial">

                </label>

                <label>

                    <span>Extension m2:</span><input type="text" id="extension" name="extension">

                </label>

                <div align="center"><input type="button" class="button" value="Cerrar" onclick="cerrar_pasto();"></div>

            </div>

        </div>';

    }

    else{

        echo '<h2>&Aacute;rea Verde</h2>

        <label>

            <span>C&eacute;sped(Área Verde): </span><input type="text" name="ccespedv" value="'.$val[0].'"><input type="radio" name="cespedv" value="1"'; if($val[1]==1){ echo ' checked';} echo '><input type="radio" name="cespedv" value="2"'; if($val[1]==2){ echo ' checked';} echo '><input type="radio" name="cespedv" value="3"'; if($val[1]==3){ echo ' checked';} echo '><input type="text" name="fcespedv" value="'.$val[2].'"><select name="tcespedv"><option value=""> -- Seleccione -- </option><option value="1"'; if($val[3]==1){ echo ' selected';} echo '>Sintético</option><option value="2"'; if($val[3]==2){ echo ' selected';} echo '>Natural</option></select>

        </label>

        <label>

            <span>C&eacute;sped(Área Deportiva): </span><input type="text" name="ccespedd" value="'.$val2[0].'"><input type="radio" name="cespedd" value="1"'; if($val2[1]==1){ echo ' checked';} echo '><input type="radio" name="cespedd" value="2"'; if($val2[1]==2){ echo ' checked';} echo '><input type="radio" name="cespedd" value="3"'; if($val2[1]==3){ echo ' checked';} echo '><input type="text" name="fcespedd" value="'.$val2[2].'"><select name="tcespedd"><option value=""> -- Seleccione -- </option><option value="1"'; if($val2[3]==1){ echo ' selected';} echo '>Sintético</option><option value="2"'; if($val2[3]==2){ echo ' selected';} echo '>Natural</option></select>

        </label>

        <label>

            <span>C&eacute;sped(Área Recreativa): </span><input type="text" name="ccespedr" value="'.$val3[0].'"><input type="radio" name="cespedr" value="1"'; if($val3[1]==1){ echo ' checked';} echo '><input type="radio" name="cespedr" value="2"'; if($val3[1]==2){ echo ' checked';} echo '><input type="radio" name="cespedr" value="3"'; if($val3[1]==3){ echo ' checked';} echo '><input type="text" name="fcespedr" value="'.$val3[2].'"><select name="tcespedr"><option value=""> -- Seleccione -- </option><option value="1"'; if($val3[3]==1){ echo ' selected';} echo '>Sintético</option><option value="2"'; if($val3[3]==2){ echo ' selected';} echo '>Natural</option></select>

        </label>

        <label class="chico">

            <span>Arboles: </span><input type="text" name="carboles" placeholder="Cant" value="'.$val4[0].'"><input type="radio" name="arboles" id="arbolesc" value="1"'; if($val4[1]==1){ echo ' checked';} echo '><label class="white-pinky" for="arbolesc">Chico</label><input type="radio" id="arbolesm" name="arboles" value="2"'; if($val4[1]==2){ echo ' checked';} echo '><label class="white-pinky" for="arbolesm">Mediano</label><input type="radio" id="arbolesg" name="arboles" value="3"'; if($val4[1]==3){ echo ' checked';} echo '><label class="white-pinky" for="arbolesg">Grande</label><input type="text" name="farboles" placeholder="Falta" value="'.$val4[2].'">

        </label>

        <label>

            <span>Arbusto: </span><input type="text" name="carbusto" value="'.$val5[0].'"><input type="radio" name="arbusto" value="1"'; if($val5[1]==1){ echo ' checked';} echo '><input type="radio" name="arbusto" value="2"'; if($val5[1]==2){ echo ' checked';} echo '><input type="radio" name="arbusto" value="3"'; if($val5[1]==3){ echo ' checked';} echo '><input type="text" name="farbusto" value="'.$val5[2].'"><select name="tarbusto"><option value=""> -- Seleccione -- </option><option value="1"'; if($val5[3]==1){ echo ' selected';} echo '>Chico</option><option value="2"'; if($val5[3]==2){ echo ' selected';} echo '>Grande</option></select></label>

        </label>

        <label>

            <span>Sistema de riego: </span><input type="text" name="criego" value="'.$val6[0].'"><input type="radio" name="riego" value="1"'; if($val6[1]==1){ echo ' checked';} echo '><input type="radio" name="riego" value="2"'; if($val6[1]==2){ echo ' checked';} echo '><input type="radio" name="riego" value="3"'; if($val6[1]==3){ echo ' checked';} echo '><input type="text" name="friego" value="'.$val6[2].'"><select name="triego"><option value=""> -- Seleccione -- </option><option value="1"'; if($val6[3]==1){ echo ' selected';} echo '>Por goteo</option><option value="2"'; if($val6[3]==2){ echo ' selected';} echo '>Automatizado</option></select>

        </label>

        ';/*

        <label class="chico">

            <span>C&eacute;sped: </span><input type="radio" name="cesped" id="cespeda" value="1"><label class="white-pinky" for="cespeda">&Aacute;rea verde</label><input type="radio" id="cespeds" name="cesped" value="2"><label class="white-pinky" for="cespeds">Sint&eacute;tico</label><input type="radio" id="cespedd" name="cesped" value="3"><label class="white-pinky" for="cespedd">Deportivo</label>

        </label>

        <label class="chico">

            <span>Arboles: </span><input type="text" name="carboles" placeholder="Cant" ><input type="radio" name="arboles" id="arbolesc" value="1"><label class="white-pinky" for="arbolesc">Chico</label><input type="radio" id="arbolesm" name="arboles" value="2"><label class="white-pinky" for="arbolesm">Mediano</label><input type="radio" id="arbolesg" name="arboles" value="3"><label class="white-pinky" for="arbolesg">Grande</label><input type="text" name="farboles" placeholder="Falta" >

        </label>

        <label>

            <span>Arbusto: </span><input type="radio" name="arbusto" id="arbustoc" value="1"><label class="white-pinky" for="arbustoc">Chico</label><input type="radio" id="arbustog" name="arbusto" value="2"><label class="white-pinky" for="arbustog">Grande</label>

        </label>

        <label>

            <span>Sistema de riego: </span><input type="radio" name="riego" id="riegog" value="1"><label class="white-pinky" for="riegog">Por goteo</label><input type="radio" id="riegoa" name="riego" value="2"><label class="white-pinky" for="riegoa">Automatizado</label> 

        </label>*/

    }

    echo '<div align="center"><input class="button" type="button" value="Guardar" name="guardar_check" id="guardar_check" onclick="validar(5,this.id);"></div>

    </div></div>';

        echo '<div id="screen6"><div class="white-pink">';

        //if($_GET['ver']==1){

        	echo '<label><span>Nombre de tangible</span><input type="text" name="nombre_tangible"></label>

            <label><span>Fecha</span><input type="text" id="datepicker2" name="fecha_ini_tangible" value="'.date("Y-m-d").'" readOnly><a href="javascript:void(0);" title="Indica la fecha en que se realizó el tangible"><img src="help.png" border="0"></a></label>

            <label><span>Propósito</span><select name="proposito_tangible" id="proposito_tangible" onchange="sel_desc(this.value);">';

                /*<option value="" selected> -- Seleccione -- </option>

                <option value="1" > Gestión con Empresa</option>

                <option value="2" > Gestión con H. Ayuntamiento</option>

                <option value="3" > Infraestructura y mobiliario </option>

                <option value="4" > Ingresos</option>

                <option value="5" > Tejido social </option>

                <option value="6" > Organización </option>*/

                echo '<option value="" selected> -- Seleccione -- </option>

                <option value="50">Áreas verdes</option>

                <option value="51">Infraestructura y mobiliario</option>

                <option value="52">Ingresos</option>

                <option value="53">Tejido social</option>

                <option value="54">Organización</option></select><a href="javascript:void(0);" title="Señala el propósito del tangible según la relación"><img src="help.png" border="0"></a></label>

        	<label><span>Tipo</span><select id="tipo_tangible" name="tipo_tangible" onchange="sel_exp(this.value);"><option value=""> -- Seleccione -- </option></select><a href="javascript:void(0);" title="Señala el tipo de tangible según la relación"><img src="help.png" border="0"></a></label>

            <label>

                <span>N. de participantes del comité</span><input type="number" name="involucrados_comite"><a href="javascript:void(0);" title="Indique el No. de personas que participaron del evento"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>N. de vecinos participantes: </span><input type="number" name="involucrados_vecinos"><a href="javascript:void(0);" title="Responda sólo con número la cantidad de vecinos participantes"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>N. de asistentes:</span><input type="number" name="asistentes"><a href="javascript:void(0);" title="Responda sólo con número la cantidad de asistentes"><img src="help.png" border="0"></a>

            </label>

            <label>

                <h5 style="display:inline-block;width:30%;text-align:center;"">Ingresos</h5><h5 style="display:inline-block;width:60%;text-align:center;">Cantidad estimada</h5>

            </label>

            <div style="clear:both;"></div>
			<label>

                <span>Monto total del ingreso:</span><input type="number" name="ingresos"><a href="javascript:void(0);" title="Responda sólo con número la cantidad del monto del ingreso"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Venta:</span><input type="number" name="boletos"><a href="javascript:void(0);" title="Responda sólo con número los ingresos por venta"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Cooperación vecinal:</span><input type="number" name="cooperacion"><a href="javascript:void(0);" title="Responda sólo con número los ingresos por cooperación de los vecinos"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Patrocinios:</span><input type="number" name="patrocinios"><a href="javascript:void(0);" title="Indica el costo estimado del beneficio obtenido de una gestión con empresas"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Gestión:</span><input type="number" name="gestiones"><a href="javascript:void(0);" title="Indica el costo estimado del beneficio obtenido de una gestión con gobierno"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Costo estimado del beneficio a obtener:</span><input type="number" name="costos"><a href="javascript:void(0);" title="Responda sólo con número la cantidad estimada que costó el beneficio obtenido"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>¿Qué empresa apoyó?</span><input type="text" name="empresa"><a href="javascript:void(0);" title="Indica el nombre de las empresas que apoyaron para hacer posible el logro. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a>

            </label>

            <label>

                <h5 style="text-align:center;">Beneficios obtenidos con el ingreso</h5>

            </label>

            <label>

                <span>Área del parque beneficiada:</span><select name="impacto" id="impacto" onchange="addsel(2);">

                <option value=""> -- Seleccione --</option>

                <option value="1">Servicios p&uacute;blicos</option>

                <option value="2">Mobiliarios de parques</option>

                <option value="3">Canchas deportivas</option>

                <option value="4">Espacios de convivencia social</option>

                <option value="5">Elementos urbanos</option>

                </select><a href="javascript:void(0);" title="Indique el área del parque que se vió beneficiada"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Concepto:</span><select name="descimpacto" id="descimpacto"">

                <option value=""> -- Seleccione --</option>

                </select><a href="javascript:void(0);" title="Selecciona el objeto que se obtuvo o se mejoró"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Cantidad:</span><input type="number" name="cantidad_imp"><a href="javascript:void(0);" title="Responda sólo con número la cantidad de conceptos"><img src="help.png" border="0"></a>

            </label>

            <label><span>Evidencias del tangible</span><input type="file" name="file_tangible[]" accept="image/x-png,image/gif,image/jpeg" multiple><a href="javascript:void(0);" title="El nombre del archivo debe ser menor a 100 caracteres, con tamaño no mayor a 2MB y del tipo jpg, png o gif "><img src="help.png" border="0"></a></label>

            <label><span>Notas del tangible</span><input type="text" name="notas_tangible"><a href="javascript:void(0);" title="No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a></label>

            <div style="clear:both;"></div>

        	<h5 style="text-align:center;">Experiencia exitosa</h5>

            <label>

                <span>Descripción de la actividad:</span><textarea name="actividades"></textarea><a href="javascript:void(0);" title="Ejemplo: El día lunes 05 de febrero los miembros del comité del parque Los Huertos llevaron cabo una rodada familiar en la que pudieron participar cerca de 20 personas entre niños y papás, disfrutando de una actividad diferente y deportiva. La cita fue programada a las 6:00 de la mañana, en donde todos los asistentes acudieron con sus bicicletas y ropa deportiva, con el apoyo de un padre de familia quien iba custodiando por medio de su vehículo, iniciaron el recorrido el cual concluyó en un río cerca de su sector en donde pudieron merendar y algunos hasta disfrutar de un rico baño. Estas actividades son muy enriquecedoras para la comunidad y se espera que se sigan replicando de manera más constante. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Aspectos a mejorar:</span><textarea name="mejorar"></textarea><a href="javascript:void(0);" title="Indique las áreas de oportunidad de la actividad o evento. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a>

            </label>

            <label>

                <span>Contacto del comité(e-mail):</span><input type="text" name="contacto_exp"><a href="javascript:void(0);" title="Responda colocando el correo electrónico de una persona que haya sido parte de la actividad o evento. No uses caracteres especiales como: !\#&quot;$%&\'()*+/;<>[\]^`{|}~"><img src="help.png" border="0"></a>

            </label>

        	<center><input class="button" type="button" value="Guardar" name="guardar_experiencia" id="guardar_experiencia" onclick="validar(6,this.id);"></center>';

        	echo '</div></div>';

        /*}

        else{

	        echo '<div id="editar">';

	            //<center><label><input type="button" class="button" onclick="mostrar(1);" value="Editar experiencia exitosa"></label></center><div style="clear:both;"></div>

	            echo '<label><span>Nombre del evento que se reporta como tangible</span><input type="text" name="nombre_tangible"></label>

	            <label><span>Fecha</span><input type="text" id="datepicker2" name="fecha_ini_tangible" value="'.date("Y-m-d").'" readOnly></label>

	            <label><span>Propósito</span><select name="proposito_tangible" id="proposito_tangible" onchange="sel_desc(this.value);">';

	                /*<option value="" selected> -- Seleccione -- </option>

	                <option value="1" > Gestión con Empresa</option>

	                <option value="2" > Gestión con H. Ayuntamiento</option>

	                <option value="3" > Infraestructura y mobiliario </option>

	                <option value="4" > Ingresos</option>

	                <option value="5" > Tejido social </option>

	                <option value="6" > Organización </option>*/

	    /*            echo '<option value="" selected> -- Seleccione -- </option>

	                <option value="50">Áreas verdes</option>

	                <option value="51">Infraestructura y mobiliario</option>

	                <option value="52">Ingresos</option>

	                <option value="53">Tejido social</option>

	                <option value="54">Organización</option></select></label>

	            <label><span>Tipo</span><select id="tipo_tangible" name="tipo_tangible" onchange="sel_exp(this.value);"><option value=""> -- Seleccione -- </option></select></label>

	            <label><span>Notas del tangible</span><input type="text" name="notas_tangible"></label>

	            <label><span>Evidencias del tangible</span><input type="file" name="file_tangible[]" accept="image/x-png,image/gif,image/jpeg" multiple></label>

	            <div style="clear:both;"></div><label><span>Experiencia Exitosa</span><input type="radio" value="si" disabled id="experiencia_si" name="experiencia_exi"><label class="white-pinked" for="experiencia_si">S&iacute</label>

	            <input type="radio" value="no" disabled id="experiencia_no" name="experiencia_exi"><label class="white-pinked" for="experiencia_no">No</label>

	        </div>

	        <div id="volver" style="display:none;"><center><label><input type="button" class="button" onclick="mostrar(2);" value="Volver"></label></center><div style="clear:both;"></div>

	        <label><span>Experiencia exitosa:</span><select id="experiencias_exi" name="experiencias_exi" onchange="editexp(this.value);"><option value=""> -- Seleccione -- </option>';

	        $sqle="select p.post_title, m.* from wp_postmeta m INNER JOIN wp_posts p on p.id=m.post_id WHERE meta_key='_cmb_parque' AND meta_value='".$_POST['parque']."'";

	        $rese=mysql_query($sqle);

	        if(mysql_num_rows($rese)>0){

	            while($rowe=mysql_fetch_array($rese)){

	                echo '<option value="'.$rowe['post_id'].'">'.$rowe['post_title'].'</option>';

	            }

	        }

	        echo '</select></label></div>

	        <div id="experiencia_show" style="display:none;">

	            <label>

	                <span>Fotos del evento: </span><input type="file" name="file_experiencia[]" multiple>&nbsp;<br>Incluir evidencia de tangible<input type="checkbox" name="incluir" value="1">

	            </label>

	            <label>

	                <span>URL del video: </span><input type="text" name="video"/>

	            </label>

	            <label>

	                <span>Personas del comité que organizaron el evento: </span><input type="text" name="involucrados_comite">

	            </label>

	            <label>

	                <span>Vecinos que organizaron el evento: </span><input type="text" name="involucrados_vecinos">

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

	                <span>Cantidad:</span><input type="text" name="cantidad_imp">

	            </label>

	            <label>

	                <span>Concepto:</span><select name="descimpacto" id="descimpacto"">

	                <option value=""> -- Seleccione --</option>

	                </select>

	            </label>

	            <label>

	                <span>Descripción de área de impacto:</span><textarea name="descimpacto2"></textarea>

	            </label>

	            <label>

	                <span>Clave de &eacute;xito:</span><textarea name="clave"></textarea>

	            </label>

	            <label>

	                <span>Aspectos a mejorar:</span><textarea name="mejorar"></textarea>

	            </label>

	            <label>

	                <span>Contacto del comité(e-mail):</span><input type="text" name="contacto_exp">

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

	        </div>

	        <center><input class="button" type="button" value="Guardar" name="guardar_experiencia" id="guardar_experiencia" onclick="validar(6,this.id);"></center>';

	        echo '

	        </div></div>';

	    }*/

    /*

        echo '<div id="screen6"><div class="white-pink">';

        echo '<label><span>Experiencia exitosa:</span><select id="experiencias_exi" name="experiencias_exi" onchange="editexp(this.value);"><option value=""> -- Seleccione -- </option>';

        $sqle="select p.post_title, m.* from wp_postmeta m INNER JOIN wp_posts p on p.id=m.post_id WHERE meta_key='_cmb_parque' AND meta_value='".$_POST['parque']."'";

        $rese=mysql_query($sqle);

        if(mysql_num_rows($rese)>0){

            while($rowe=mysql_fetch_array($rese)){

                echo '<option value="'.$rowe['post_id'].'">'.$rowe['post_title'].'</option>';

            }

        }

        echo '</select></label><div style="clear:both;"><center><input class="button" type="button" onclick="editexp(0);" value="Agregar nueva"><center></div><br>';

        echo '<label>

            <span>Nombre del evento: </span><input type="text" name="nom_evento"/>

        </label>

        <label>

            <span>Fecha del evento: </span><input type="text" readonly id="datepicker" value="'.date("Y-m-d").'" name="fecha_evento"/>

        </label>

        <label>

            <span>URL del video: </span><input type="text" name="video"/>

        </label>

        <label>

            <span>Propósito: </span><select name="proposito" id="proposito" onchange="addsel(1);">

            <option value="" selected> -- Seleccione --</option>

            <option value="4">Generar ingresos y tejido social</option>

            <option value="5">Crear y mantener áreas verdes</option>

            <option value="6">Organización</option>

            <option value="7">Gestión</option>

            <option value="8">Orden</option>

            </select>

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

            <span>Cantidad:</span><input type="text" name="cantidad_imp">

        </label>

        <label>

            <span>Concepto:</span><select name="descimpacto" id="descimpacto"">

            <option value=""> -- Seleccione --</option>

            </select>

        </label>

        <label>

            <span>Descripción de área de impacto:</span><textarea name="descimpacto2"></textarea>

        </label>

        <label>

            <span>Clave de &eacute;xito:</span><textarea name="clave"></textarea>

        </label>

        <label>

            <span>Aspectos a mejorar:</span><textarea name="mejorar"></textarea>

        </label>

        <label>

            <span>Contacto del comité(e-mail):</span><input type="text" name="contacto_exp">

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

        <div align="center"><input class="button" type="button" value="Guardar" name="guardar_experiencia" id="guardar_experiencia" onclick="validar(6,this.id);"></div>

        </div></div>';

    */

        if($stat<1){

    echo '<div id="screen8"><div class="white-pink">

    <label>

        <span>Fecha visita: </span><input type="text" readonly id="datepicker1" value="'.date("Y-m-d").'" name="fecha_asistencia"/>

    </label>

    <label>

        <span class="asists">Nombre</span><span class="asists" style="text-align:left;">Asisti&oacute;</span><span class="asists">&nbsp;</span>

    </label>';

    $sql01="select id from comite_parque where cve_parque='".$_POST['parque']."'";

    $res01=mysql_query($sql01);

    if(mysql_num_rows($res01)>0){

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

    }

    echo '<div align="center"><input class="button" type="button" value="Guardar" name="guardar_asistencia" id="guardar_asistencia" onclick="validar(7,this.id);"></div>

    </div></div>';} echo '

    <div id="screen10"><div class="white-pink">

    <label>

        <span>Fecha: </span><input type="text" readonly id="datepicker10" value="'.date("Y-m-d").'" name="fecha_infra"/>

    </label>

    <label>

        <span>Categoría: </span><select name="categoria" id="categoria" onchange="addsel(9);">

            <option value=""> -- Seleccione -- </option>

            <option value="1">Instalaciones</option>

            <option value="2">Área esparcimiento</option>

            <option value="3">Área de deportiva</option>

            <option value="4">Área Verde</option>

        </select>

    </label>

    <label>

        <span>Subcategoría: </span><select name="subcategoria" id="subcategoria" onchange="falta();">

            <option value=""> -- Seleccione -- </option>

        </select>

    </label>

    <label>

        <span>Cantidad: </span><input type="text" name="cantidad" id="cantidad" onkeyup="restar(this.value);">

    </label>

    <label>

        <span>Origen del recurso</span><select name="recurso">

        <option value="" selected> -- Seleccione -- </option>

        <option value="1">Público</option>

        <option value="2">Privado</option>

        <option value="3">Recursos propios</option>

        </select>

    </label>

    <label>

        <span>Faltante: </span><input type="text" name="faltante" id="faltante">

    </label>

    <label>

        <span>Codiciones de la infraestructura: </span><select name="condiciones_infra">

        <option value=""> -- Seleccione -- </option>

        <option value="1">Bueno</option>

        <option value="2">Regular</option>

        <option value="3">Malo</option>

        </select>

    </label>

    <label>

        <span>Comentarios: </span><textarea name="coment_infra"></textarea>

    </label>

    <div align="center"><input class="button" type="button" value="Guardar" name="guardar_infraestructura" id="guardar_infraestructura" onclick="validar(10,this.id);"></div>

    </div></div>

    </form>';

    $parquesito=$_POST['parque'];

    //if($asesor==13563){

    echo '<!-- Se determina y escribe la localizacion -->

    <div id="ubicacion"></div>

    <script type="text/javascript">

    var slideout = new Slideout({

		"panel": document.getElementById("panel"),

		"menu": document.getElementById("menu"),

		"padding": 256,

		"tolerance": 70

    });

    document.querySelector(".toggle-button").addEventListener("click", function() {

		slideout.toggle();

    });

    function cargarubicacion(){

        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(mostrarUbicacion);

        }

        else {

            alert("¡Error! Este navegador no soporta la Geolocalización.");

        }

    }

    function mostrarUbicacion(position) {

        var times = position.timestamp;

        var latitud = position.coords.latitude;

        document.getElementById("lati").value=position.coords.latitude;

        var longitud = position.coords.longitude;

        document.getElementById("long").value=position.coords.longitude;

        var altitud = position.coords.altitude; 

        var exactitud = position.coords.accuracy;   

        var div = document.getElementById("ubicacion");

        alert("Ubicación guardada temporalmente, graba la visita para terminar el proceso. "+document.getElementById("lati").value+document.getElementById("long").value);

    }

    function refrescarUbicacion() {	

            navigator.geolocation.watchPosition(mostrarUbicacion);}	

    </script>

    

    <!-- Se escribe un mapa con la localizacion anterior-->

    <div id="demo"></div>

    <div id="mapholder"></div>

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">

    var x=document.getElementById("demo");

    function cargarmap(){

    navigator.geolocation.getCurrentPosition(showPosition,showError);

    function showPosition(position)

      {

      latitu=22.7714812;

      longit=-105.4389527;

      lat=position.coords.latitude;

      lon=position.coords.longitude;

      latlon=new google.maps.LatLng(lat, lon)

      latilong=new google.maps.LatLng(latitu, longit)

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

      var marker2=new google.maps.Marker({position:latilong,map:map,title:"estas aqui!"});

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

    //}

    

    echo '

    <script>

    $(function() {

        $("td[id^=need]").hide();

        $("[title]").qtip({

            show: "click",

            hide: "click"

        });

        $( "#datepicker" ).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker1" ).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker2" ).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker4" ).datepicker({ minDate: "'.date('Y-m-d', strtotime(date('Y-m-d'). ' - 7 days')).'",maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker5" ).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepicker10" ).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        $( "#datepickereic" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepickerefc" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        for(var f=1;f<22;f++){

            $( "#fcumplimiento"+f ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        }

        var w=$("#evenfbd").val();

        for(var f=1;f<=w;f++){

            $("#datepickeref"+f).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        }

        var x=$("#evenbd").val();

        for(var g=1;g<=x;g++){

            $("#datepickere"+g).datepicker({ minDate: "'.$fecha_inicial_para_calendario.'", maxDate: "'.$fecha_final_para_calendario.'", dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        }

        var p=$("#num_proy").val();

        for(var h=1;h<=p;h++){

            $("#fecha_proy"+h).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        }

        $("input[name=\"respint[]\"]").change(function(){

        	'; 
        	//if($_GET['ver']==1){

        		echo 'if($(this).val()==10){

		    		$.each($("input[name=\"respint[]\"]"), function(){

			            if($(this).val()!=10){

			            	$(this).prop("checked", false);

			            }

		        	});

		    	}

		    	else{

		    		$("#ninresp").prop("checked",false);

		    	}';

        	//}

        	echo 'recalculate2();

        });

        $("input[name=\"limpio[]\"]").change(function(){

            recalculate3();

        });

      });

      '; 

      //if($_GET['ver']==1){

      	echo 'function exportar(){

                document.forma.action="repexcel.php";

                document.getElementsByName("cmd")[0].value="compromisos";

                document.forma.submit();

                document.forma.action="";

      	}';

      //}

      echo '

      function recalculate2(){

            var sum = 0;

            $.each($("input[name=\"respint[]\"]:checked"), function(){

            	'; 

            	//if($_GET['ver']==1){ 

            		echo 'if($(this).val()!=10){';

            	//}

            	echo 'sum += 5;';

            	//if($_GET['ver']==1){ 

            		echo '}';

            	//}

            	echo '            

            });

            if(sum<1){

                $("#resultres").text("Sí").css("color", "green");

            }

            else if(sum<25){

                $("#resultres").text("Regular").css("color", "orange");

            }

            else{

                $("#resultres").text("No").css("color", "red");   

            }

        }

        function recalculate3(){

            var sum = 30;

            $.each($("input[name=\"limpio[]\"]:checked"), function(){           

                if(parseInt($(this).val())!=1){

                    sum -= 4.28;    

                }

            });

        }

      function add_miembro(){

                $("input[name=\'sin_comite\']").val(0);

                var q=parseInt($("#miem_comite").val());

                q=q+1;

                $("#sin_comite").attr("disabled", false);

                $("#sin_comite").attr("checked", false);

                $("#comite_esp").show();

                $("#comite_miem").show();

                var nmiembro = \'<label><input type="text" name="nom_miembro[\'+ q + \']"><input type="text" name="cel_miembro[\'+ q + \']"><select name="rol_miembro[\'+ q + \']">\';';

                foreach($roles_comite as $k=>$v){

                    echo 'nmiembro += \'<option value="'.$k.'">'.$v.'</option>\';';

                }

                echo 'nmiembro += \'</select><input type="checkbox" name="estatus_miembro[\'+ q + \']" value="2"></label>\';

                $("#comite_miem").append(nmiembro);

                $("#miem_comite").val(parseInt(q));

        }

        function hid_comite(){

                $("input[name=\'sin_comite\']").val(1);

                var q=parseInt($("#miem_comite").val());

                if(q>0){

                    var aceptar;

                    var r = confirm("Esta acción desintegra el comite! ¿Estás seguro?");

                    if (r == true) {

                        aceptar = 1;

                    } else {

                        aceptar = 0;

                        $("#sin_comite").attr("checked", false);

                    }

                    if(aceptar==1){

                        $("#comite_miem").hide();

                        $("#comite_esp").hide();

                        $("#comite_miem").html("<label><span>Nombre</span><span>Celular</span><span>Rol</span><span>Activo</span></label>");

                        $("#miem_comite").val(0);

                        $("#sin_comite").attr("disabled", true);

                    }

                }

                else{

                    $("#comite_miem").hide();

                    $("#comite_esp").hide();

                    $("#comite_miem").html("<label><span>Nombre</span><span>Celular</span><span>Rol</span><span>Activo</span></label>");

                }

        }

        function sel_exp(t){

            if($("#proposito_tangible").val()==50){

                if(t==3 || t==5 || t==10 || t==11 || t==12){

                    $("#experiencia_si").attr("checked", true);

                    $("#experiencia_show").show();

                }

                else{

                    $("#experiencia_no").attr("checked", true);

                    $("#experiencia_show").hide();

                }

            }

            else if($("#proposito_tangible").val()==51){

                if(t==4 || t==5 || t==6 || t==10 || t==13 || t==17){

                    $("#experiencia_si").attr("checked", true);

                    $("#experiencia_show").show();

                }

                else{

                    $("#experiencia_no").attr("checked", true);

                    $("#experiencia_show").hide();

                }

            }

            else if($("#proposito_tangible").val()==52){

                if(t==3 || t==4 || t==5 || t==7 || t==8 || t==9 || t==10 || t==11 || t==12 || t==13 || t==14 || t==15){

                    $("#experiencia_si").attr("checked", true);

                    $("#experiencia_show").show();

                }

                else{

                    $("#experiencia_no").attr("checked", true);

                    $("#experiencia_show").hide();

                }

            }

            else if($("#proposito_tangible").val()==53){

                if(t==1 || t==2 || t==7 || t==8 || t==9 || t==10 || t==11 || t==12 || t==15){

                    $("#experiencia_si").attr("checked", true);

                    $("#experiencia_show").show();

                }

                else{

                    $("#experiencia_no").attr("checked", true);

                    $("#experiencia_show").hide();

                }

            }

            else if($("#proposito_tangible").val()==54){

                if(t==21 || t==25){

                    $("#experiencia_si").attr("checked", true);

                    $("#experiencia_show").show();

                }

                else{

                    $("#experiencia_no").attr("checked", true);

                    $("#experiencia_show").hide();

                }

            }

        }

        function sel_desc(t){

            if(t==1){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Alumbrado",

                "2": "Arborización",

                "3": "Diseño de sistema de riego",

                "4": "Donación de PET",

                "5": "Murales",

                "6": "Pintura",

                "7": "Proyecto arquitectónico",

                "8": "Proyecto ejecutivo",

                "9": "Proyecto EVA",

                "10": "Voluntariado"

                };

            }

            else if(t==2){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Alumbrado",

                "2": "Arborización",

                "3": "Denuncia ciudadana formal",

                "4": "Jornada de limpieza",

                "5": "Pintura",

                "6": "Proyecto arquitectónico",

                "7": "Toma de agua",

                "8": "Visita a cabildo abierto"

                };

            }

            else if(t==3){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Arborización",

                "2": "Mesa de ping pong",

                "3": "Fertilización",

                "4": "Fumigación",

                "5": "Instalación de infraestructura",

                "6": "Limpieza del parque",

                "7": "Poda",

                "8": "Reglamento de orden",

                "9": "Riego"

                };

            }

            else if(t==4){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Activación por empresas y/o instituciones",

                "2": "Actividad para generar ingresos",

                "3": "Carrera pedestre",

                "4": "Cooperación vecinal",

                "5": "Días festivos",

                "6": "Función de cine",

                "7": "Kermesse",

                "8": "Kermesse cultural",

                "9": "Noche bohemia",

                "10": "Programa de reciclaje Ecoce o programa externo",

                "11": "Rifa",

                "12": "Tianguis",

                "13": "Torneos"

                };

            }

            else if(t==5){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Actividades deportivas",

                "2": "Asistencia a juego de Dorados (tendrá que ir en comunidad, sólo un tangible por comité)",

                "3": "Campamentos",

                "4": "Carrera pedestre",

                "5": "Cooperación vecinal",

                "6": "Cursos y talleres",

                "7": "Días festivos",

                "8": "Función de cine",

                "9": "Kermesse",

                "10": "Kermesse cultural",

                "11": "Muestra gastronómica",

                "12": "Noche bohemia",

                "13": "Pláticas",

                "14": "Rifa",

                "15": "Tianguis",

                "16": "Torneos",

                "17": "Visita Jardín Botánico de Culiacán",

                "18": "Visita MIA"

                };

            }

            else if(t==6){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Asistencia a cursos P.A (será un tangible por parque)",

                "2": "Calendario de actividades",

                "3": "Club guardianes del parque",

                "4": "Comité de ninos",

                "5": "Contratación del jardinero",

                "6": "Correo electrónico formal",

                "7": "Creación de comité",

                "8": "Creación de logo del parque",

                "9": "Cuenta de Facebook",

                "10": "Cuenta de Whatsapp",

                "11": "Cuenta mancomunada",

                "12": "Difusión de medios",

                "13": "Elaborar expedientes de evidencia",

                "14": "Formalización de comité ante H. Ayuntamiento",

                "15": "Hojas membretadas",

                "16": "Plan de mantenimiento del parque",

                "17": "Recibos de dinero institucional",

                "18": "Reestructuración de comité",

                "19": "Rendición de cuentas general (sólo 1 vez por semestre)",

                "20": "Sello del parque",

                "21": "Uniforme",

                "22": "Visión del espacio"

                };

            }

            else if(t==50){
            	';
            	//if($_GET['ver']==1){
            		echo 'var newOptions = {"0": "-- Seleccione --",

                "3": "Arborización",

                "4": "Poda",

                "6": "Jornada de limpieza",

                "7": "Fumigación",

                "8": "Fertilización",

                "9": "Proyecto EVA",

                "10": "Instalación de Jardín",

                "11": "Huerto",

                };';
            	/*}
            	else{
            		echo '
	                var newOptions = {"0": "-- Seleccione --",

	                "1": "Proyecto arquitectónico",

	                "2": "Plantas de ornato",

	                "3": "Arborización",

	                "4": "Poda",

	                "5": "Cursos, plática y talleres",

	                "6": "Jornada de limpieza",

	                "7": "Fumigación",

	                "8": "Fertilización",

	                "9": "Proyecto EVA",

	                "10": "Instalación de Jardín",

	                "11": "Huerto",

	                "12": "Voluntariado",

	                };';
            	}*/
            	echo '

            }

            else if(t==51){
            	';
            	//if($_GET['ver']==1){
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Proyecto arquitectónico",

	                "3": "Mantenimiento de infraestructura",

	                "5": "Toma de agua",

	                "6": "Alumbrado",

	                "7": "Instalación de reglamento de orden",

	                "8": "Mesa de ping pong",

	                "9": "Instalación de infraestructura",

	                "10": "Murales",

	                "11": "Proyecto ejecutivo",

	                "15": "Nivelación del terreno",

	                "17": "Voluntariado",

	                "18": "Reparación de alumbrado"

	                };';
            	/*}
            	else{
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Proyecto arquitectónico",

	                "2": "Jornada de limpieza",

	                "3": "Mantenimiento de infraestructura",

	                "4": "Pintura",

	                "5": "Toma de agua",

	                "6": "Alumbrado",

	                "7": "Instalación de reglamento de orden",

	                "8": "Mesa de ping pong",

	                "9": "Instalación de infraestructura",

	                "10": "Murales",

	                "11": "Proyecto ejecutivo",

	                "12": "Proyecto EVA",

	                "13": "Sistema de riego",

	                "15": "Nivelación del terreno",

	                "16": "Donación de PET",

	                "17": "Voluntariado",

	                "18": "Reparación de alumbrado"

	                };';
            	}*/
            	echo '

            }

            else if(t==52){
            	';
            	//if($_GET['ver']==1){
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Programa de reciclaje Ecoce o programa externo",

	                "2": "Actividad para generar ingresos",

	                "4": "Activación por empresas y/o instituciones",

	                "5": "Carrera pedestre",

	                "6": "Cooperación vecinal",

	                "7": "Días festivos",

	                "8": "Función de cine",

	                "9": "Kermesse",

	                "10": "Kermesse cultural",

	                "11": "Noche bohemia",

	                "12": "Rifa",

	                "13": "Tianguis",

	                "14": "Torneos",

	                "15": "Productos elaborados por el comité"

	                };';
            	/*}
            	else{
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Programa de reciclaje Ecoce o programa externo",

	                "2": "Actividad para generar ingresos",

	                "3": "Cursos, plática y talleres",

	                "4": "Activación por empresas y/o instituciones",

	                "5": "Carrera pedestre",

	                "6": "Cooperación vecinal",

	                "7": "Días festivos",

	                "8": "Función de cine",

	                "9": "Kermesse",

	                "10": "Kermesse cultural",

	                "11": "Noche bohemia",

	                "12": "Rifa",

	                "13": "Tianguis",

	                "14": "Torneos",

	                "15": "Productos elaborados por el comité"

	                };';
            	}*/
            	echo '

            }

            else if(t==53){
            	';
            	//if($_GET['ver']==1){
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Campamentos",

	                "2": "Cursos, plática y talleres",

	                "3": "Muestra gastronómica",

	                "4": "Visita MIA",

	                "5": "Visita Jardín Botánico de Culiacán",

	                "7": "Carrera pedestre",

	                "8": "Días festivos",

	                "9": "Función de cine",

	                "10": "Kermesse",

	                "11": "Kermesse cultural",

	                "12": "Noche bohemia",

	                "15": "Torneos"

	                };';
            	/*}
            	else{
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "1": "Campamentos",

	                "2": "Cursos, plática y talleres",

	                "3": "Muestra gastronómica",

	                "4": "Visita MIA",

	                "5": "Visita Jardín Botánico de Culiacán",

	                "6": "Asistencia a juego de Dorados (tendrá que ir en comunidad, sólo un tangible por comité)",

	                "7": "Carrera pedestre",

	                "8": "Días festivos",

	                "9": "Función de cine",

	                "10": "Kermesse",

	                "11": "Kermesse cultural",

	                "12": "Noche bohemia",

	                "15": "Torneos"

	                };';
            	}*/
            	echo '

            }

            else if(t==54){
            	';
            	//if($_GET['ver']==1){
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "2": "Denuncia ciudadana formal",

	                "3": "Creación de comité",

	                "4": "Visita a cabildo abierto",

	                "5": "Formalización de comité ante H. Ayuntamiento",

	                "6": "Reestructuración de comité",

	                "7": "Cuenta de Facebook",

	                "8": "Calendario de actividades",

	                "9": "Plan de mantenimiento del parque",

	                "10": "Diseño participativo",

	                "11": "Contratación del jardinero",

	                "12": "Cuenta de Whatsapp",

	                "13": "Creación de logo del parque",

	                "14": "Uniforme",

	                "15": "Rendición de cuentas general (sólo 1 vez por semestre)",

	                "16": "Sello del parque",

	                "17": "Correo electrónico formal",

	                "18": "Recibos de dinero institucional",

	                "19": "Cuenta mancomunada",

	                "20": "Elaborar expedientes de evidencia",

	                "21": "Comité de niños",

	                "23": "Hojas membretadas",

	                "24": "Difusión de medios ",

	                "25": "Elaboración de reglamento",

	                "26": "Entrega de reconocimiento del parque"

	                };';
            	/*}
            	else{
            		echo 'var newOptions = {"0": "-- Seleccione --",

	                "2": "Denuncia ciudadana formal",

	                "3": "Creación de comité",

	                "4": "Visita a cabildo abierto",

	                "5": "Formalización de comité ante H. Ayuntamiento",

	                "6": "Reestructuración de comité",

	                "7": "Cuenta de Facebook",

	                "8": "Calendario de actividades",

	                "9": "Plan de mantenimiento del parque",

	                "10": "Diseño participativo",

	                "11": "Contratación del jardinero",

	                "12": "Cuenta de Whatsapp",

	                "13": "Creación de logo del parque",

	                "14": "Uniforme",

	                "15": "Rendición de cuentas general (sólo 1 vez por semestre)",

	                "16": "Sello del parque",

	                "17": "Correo electrónico formal",

	                "18": "Recibos de dinero institucional",

	                "19": "Cuenta mancomunada",

	                "20": "Elaborar expedientes de evidencia",

	                "21": "Comité de niños",

	                "22": "Asistencia a cursos P.A (será un tangible por parque)",

	                "23": "Hojas membretadas",

	                "24": "Difusión de medios ",

	                "25": "Elaboración de reglamento",

	                "26": "Entrega de reconocimiento del parque"

	                };';
            	}*/
            	echo '

            }

            var $el = $("#tipo_tangible");

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

            $("#experiencia_no").attr("checked", true);

        }

        function mostrar(mv){

            if(mv==1){

                $("#editar").hide();

                $("#volver").show();

            }

            else{

                $("#editar").show();

                $("#volver").hide();                

            }

        }

      function editexp(e){

        if(e==0){

            $("#experiencias_exi").val(0);

            document.getElementsByName("nom_evento")[0].value="";

            document.getElementsByName("fecha_evento")[0].value="";

            document.getElementsByName("video")[0].value="";

            document.getElementsByName("tipo_evento")[0].value="";

            document.getElementsByName("proposito")[0].value="";

            document.getElementsByName("involucrados_comite")[0].value="";

            document.getElementsByName("involucrados_vecinos")[0].value="";

            document.getElementsByName("actividades")[0].value="";

            document.getElementsByName("asistentes")[0].value="";

            document.getElementsByName("beneficios")[0].value="";

            document.getElementsByName("impacto")[0].value="";

            document.getElementsByName("cantidad_imp")[0].value="";

            document.getElementsByName("descimpacto")[0].value="";

            document.getElementsByName("descimpacto2")[0].value="";

            document.getElementsByName("clave")[0].value="";

            document.getElementsByName("mejorar")[0].value="";

            document.getElementsByName("contact_exp")[0].value="";

            document.getElementsByName("costos")[0].value="";

            document.getElementsByName("boletos")[0].value="";

            document.getElementsByName("patrocinios")[0].value="";

        }

        else{

            $.ajax({url: "sistema.php",

            data: { cmd: 99, parque: '.$_POST['parque'].', experiencia: $("#experiencias_exi").val()},

            dataType: "text",

            type: "post",

            success: function(result){

                var res=result.split("|");

                document.getElementsByName("nom_evento")[0].value=res[0];

                document.getElementsByName("fecha_evento")[0].value=res[1];

                document.getElementsByName("video")[0].value=res[2];

                document.getElementsByName("proposito")[0].value=res[4];

                addsel(1);

                document.getElementsByName("tipo_evento")[0].value=res[3];

                document.getElementsByName("involucrados_comite")[0].value=res[5];

                document.getElementsByName("involucrados_vecinos")[0].value=res[6];

                document.getElementsByName("actividades")[0].value=res[7];

                document.getElementsByName("asistentes")[0].value=res[8];

                document.getElementsByName("beneficios")[0].value=res[9];

                document.getElementsByName("impacto")[0].value=res[10];

                addsel(2);

                document.getElementsByName("cantidad_imp")[0].value=res[11];

                document.getElementsByName("descimpacto")[0].value=res[12];

                document.getElementsByName("descimpacto2")[0].value=res[13];

                document.getElementsByName("clave")[0].value=res[14];

                document.getElementsByName("mejorar")[0].value=res[15];

                document.getElementsByName("contact_exp")[0].value=res[16];

                document.getElementsByName("costos")[0].value=res[17];

                document.getElementsByName("boletos")[0].value=res[18];

                document.getElementsByName("patrocinios")[0].value=res[19];

            }});

        }

      }

      function newmaxdate(fc){

        agregar_e(-1);

        agregar_e(4,1,1);

      }

      function agregar_e(num,f,ir){

      	';
      	//if($_GET['ver']==1){

      		echo 'if(num==1){

      			$("#evidencia_cal").show();

      		}

      		else{

      			$("#evidencia_cal").hide();

      		}';

      	/*}

      	else{

      		echo 'if(num>0){

                if(f==1){

                    var continua=1

                    if(ir==1){

                        if(parseInt($("#evenbd").val())>3){

                            continua=0;

                        }

                    }

                    if(continua==1){

                        num=parseInt(num)+parseInt($("#evenbd").val());

                        var q=$("#evenbd").val();

                        var fc="'.$fecha_inicial_para_calendario.'";

                        var fmc="'.$fecha_final_para_calendario.'";

                        for(var e=q;e<num;e++){

                            var evento = \'<label><input type="text" id="datepickere\'+ e + \'" name="fecha_eventoc\'+ e + \'"/></label><label><select id="tipo_eventoc\'+ e + \'" name="tipo_eventoc[\'+ e + \']" onchange="cambiarsub(this.id);"><option value=""> -- Seleccione -- </option>'; foreach($tipoevento as $k=>$v){ echo '<option value="'.$k.'">'.$v.'</option>';} echo '</select></label><label><select id="nom_eventoc\'+ e + \'" name="nom_eventoc[\'+ e + \']"></select></label><label><input type="text" name="contacto_evento[\'+ e + \']"/></label><label><input type="text" name="correo_contacto[\'+ e + \']"/></label><label><select id="status_even\'+ e + \'" name="status_even[\'+ e + \']" disabled><option value=""> -- Seleccione -- </option><option value="1" selected>En espera</option><option value="2">Realizado</option><option value="3">Postergado</option><option value="4">Cancelado</option></select></label><label><input type="text" name="motivo[\'+e+\']"></label>\';

                            $("#even").append(evento);

                            if($("#datepickereic").val()!=""){

                                fc = $("#datepickereic").val();

                                fmc = new Date($("#datepickereic").val());

                                fmc.setFullYear(fmc.getFullYear() +1);

                            }

                            $("#datepickere"+e).datepicker({ minDate: fc, maxDate: fmc,dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

                        }

                        $("#evenbd").val(parseInt(num));

                    }

                }

                else{

                    num=parseInt(num)+parseInt($("#evenfbd").val());

                    var q=$("#evenfbd").val();

                    for(var e=q;e<num;e++){

                        var evento = \'<label><input type="text" id="datepickeref\'+ e + \'" name="fecha_eventof\'+ e + \'"/></label><label><select id="tipo_eventof\'+ e + \'" name="tipo_eventof[\'+ e + \']" onchange="cambiarsubf(this.id);"><option value=""> -- Seleccione -- </option>'; foreach($tipoevento as $k=>$v){ echo '<option value="'.$k.'">'.$v.'</option>';} echo '</select></label><label><select id="nom_eventof\'+ e + \'" name="nom_eventof[\'+ e + \']"></select></label><label><input type="text" name="contacto_eventof[\'+ e + \']"/></label><label><input type="text" name="correo_contactof[\'+ e + \']"/></label><label><select id="status_evenf\'+ e + \'" name="status_evenf\'+ e + \'"><option value=""> -- Seleccione -- </option><option value="1" selected>En espera</option><option value="2">Realizado</option><option value="3">Postergado</option><option value="4">Cancelado</option></select></label><label><input type="text" name="motivof[\'+e+\']"></label>\';

                        $("#evenf").append(evento);

                        $("#datepickeref"+e).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

                    }

                    $("#evenfbd").val(parseInt(num));

                }

            }

            else if(num<0){

                $("#even").html("");

                $("#evenbd").val(0);

            }';

      	}*/

            echo '

        }

      function filldates(da){

        for(var f=1;f<22;f++){

            $( "#fcumplimiento"+f ).val(da);

        }

      }

    function actioncompromisos(){

        document.forma.action="compromisos.php";

        document.forma.target = "_blank";

        document.forma.submit();

        document.forma.target = "";

        document.forma.action="";

    }

    function cambiarsub(t){

        var largo = t.length;

        var res = t.substring(11);

        if($("#tipo_evento"+res).val()==1){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==1){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==2){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==2){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==3){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==3){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==4){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==4){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==5){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==5){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

    }

    function cambiarsubf(t){

        var largo = t.length;

        var res = t.substring(11);

        if($("#tipo_evento"+res).val()==1){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==1){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==2){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==2){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==3){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==3){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==4){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==4){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        if($("#tipo_evento"+res).val()==5){';

            $arrjs="";

            foreach($subtipo as $k=>$v){

                if($k==5){

                    foreach($v as $key=>$value){

                        $arrjs.='"'.$key.'": "'.$value.'",';

                    }

                }

            }

            $arrjs=substr($arrjs, 0, -1);

            echo '

            var newOptions = {"0": "-- Seleccione --",

            '.$arrjs.'

            };

            var $el = $("#nom_evento"+res);

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

    }

    function sel_compromiso(j){
    	';
	    foreach ($inparametros as $key => $value) {
	    	echo '
	    	if($("#parametro_compromiso"+j).val()=="'.$value.'"){';
	    		$arrjs="";
	            foreach($compro_detalle[$key] as $k=>$v){
	                $arrjs.='"'.$k.'": "'.$v.'",';
	            }
	            $arrjs=substr($arrjs, 0, -1);
	            echo '
	            var newOptions = {"0": "-- Seleccione --",
	            '.$arrjs.'
	            };
	            var $el = $("#compromiso_solidario"+j);
	            $el.empty();
	            $.each(newOptions, function(value,key) {
	                $el.append($("<option></option>").attr("value", value).text(key));
	            });
	    	}';
	    }
		echo '
    }
    function addsel_comp(t){
    	if($("#compromiso_solidario"+t).val()==84){
            var newOptions = {"0": "-- Seleccione --",
            "1": "Limpieza",
            "2": "Árboles"
            };
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
            $el.empty();
            $.each(newOptions, function(value,key) {
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
        else if($("#compromiso_solidario"+t).val()==85){
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
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
            $el.empty();
            $.each(newOptions, function(value,key) {
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
        else if($("#compromiso_solidario"+t).val()==86){
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
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
            $el.empty();
            $.each(newOptions, function(value,key) {
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
    	else if($("#compromiso_solidario"+t).val()==13){';
            $arrjs="";
            foreach($compespecial as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
            $el.empty();
            $.each(newOptions, function(value,key) {
                $el.append($("<option></option>").attr("value", value).text(key));
            });
        }
        else if($("#compromiso_solidario"+t).val()==11){';
            $arrjs="";
            foreach($compesp as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
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
        else if($("#compromiso_solidario"+t).val()==12){';
            $arrjs="";
            foreach($compesp as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
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
        else if($("#compromiso_solidario"+t).val()==14){';
            $arrjs="";
            foreach($compesp as $k=>$v){
                $arrjs.='"'.$k.'": "'.$v.'",';
            }
            $arrjs=substr($arrjs, 0, -1);
            echo '
            var newOptions = {"0": "-- Seleccione --",
            '.$arrjs.'
            };
            $("#compest_solidario"+t).show();
            var $el = $("#compest_solidario"+t);
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
    function addsel(t){

        if(t==1){

            if($("#proposito").val()==4){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Torneos",

                "2": "Tianguis",

                "3": "Días Festivos",

                "4": "Cooperación vecinal",

                "5": "Rifa",

                "6": "Kermesse cultural",

                "7": "Función de cine",

                "8": "Carrera pedestre",

                "9": "Noche bohemia",

                "10": "Kermesse"

                };

            }

            else if($("#proposito").val()==5){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Arborización y Fertilización",

                "2": "Jornadas de limpieza",

                "3": "Riego",

                "4": "Fumigación",

                "5": "Poda"

                };

            }

            else if($("#proposito").val()==6){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Clínica de verano de fútbol infantil",

                "2": "Torneos",

                "3": "Campamentos",

                "4": "Eventos en días festivos",

                "5": "Club guardianes del parque",

                "6": "Convivios recreativos",

                "7": "Pintura",

                "8": "Alumbrado",

                "9": "Murales",

                "10": "Reciclaje",

                "11": "Agua"

                };

            }

            else if($("#proposito").val()==7){

                var newOptions = {"0": "-- Seleccione --",

                "1": "Honorable Ayuntamiento",

                "2": "Empresa"

                };

            }

            else{

                var newOptions = {"0": "-- Seleccione --",

                "1": "Orden"

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

        else if(t==5){

            if($("#state").val()==25){

                var newOptions = {"0": "-- Seleccione --",

                "Culiacán": "Culiacán",

                "Navolato": "Navolato"

                };

            }

            else if($("#state").val()==3){

                var newOptions = {"0": "-- Seleccione --",

                "Comondú": "Comondú",

                "Mulegé": "Mulegé",

                "La Paz": "La Paz",

                "Los Cabos": "Los Cabos",

                "Loreto": "Loreto"

                };

            }

            else{

                var newOptions = {"0": "-- Seleccione --"

                };

            }

            var $el = $("#ciudad");

            $el.empty();

            $("#localidad").empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        else if(t==6){

            if($("#ciudad").val()=="Comondú"){

                var newOptions = {"0": "-- Seleccione --",

                "Ciudad Constitución": "Ciudad Constitución",

                };

            }

            else if($("#ciudad").val()=="Mulegé"){

                var newOptions = {"0": "-- Seleccione --",

                "Santa Rosalía": "Santa Rosalía",

                };

            }

            else if($("#ciudad").val()=="La Paz"){

                var newOptions = {"0": "-- Seleccione --",

                "La Paz": "La Paz",

                };

            }

            else if($("#ciudad").val()=="Los Cabos"){

                var newOptions = {"0": "-- Seleccione --",

                "San José del Cabo": "San José del Cabo",

                };

            }

            else if($("#ciudad").val()=="Loreto"){

                var newOptions = {"0": "-- Seleccione --",

                "Loreto": "Loreto",

                };

            }

            else if($("#ciudad").val()=="Culiacán"){

                var newOptions = {"0": "-- Seleccione --",

                "Costa Rica": "Costa Rica",

                "El Quemadito":"El Quemadito",

                };

            }

            else if($("#ciudad").val()=="Navolato"){

                var newOptions = {"0": "-- Seleccione --",

                "Aguapepito":"Aguapepito",

                "El Castillo 1":"El Castillo 1",

                "El Castillo 2":"El Castillo 2",

                "El Molino":"El Molino",

                "El Potrero":"El Potrero",

                "El Realito 1":"El Realito 1",

                "El Realito 2":"El Realito 2",

                "El Sanjon":"El Sanjon",

                "Iraguato":"Iraguato",

                "Laco":"Laco",

                "La Boca":"La Boca",

                "La Pipima":"La Pipima",

                "Las Puentes":"Las Puentes",

                "Margarita":"Margarita",

                "Praderas del Sol":"Praderas del Sol",

                "Rosa Morada 1":"Rosa Morada 1",

                "Rosa Morada 2":"Rosa Morada 2",

                "Sataya":"Sataya",

                "Sataya 1 Plazuela":"Sataya 1 Plazuela",

                "Sataya 2":"Sataya 2",

                "Villa Juárez":"Villa Juárez",

                "Villamoros":"Villamoros",

                };

            }

            var $el = $("#localidad");

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

        else{

            if($("#categoria").val()==1){';

                $arrjs="";

                foreach($instalaciones as $k=>$v){

                    $k=str_replace($acentos, $conacentos, $k);

                    $v=str_replace($acentos, $conacentos, $v);

                    $b=explode(' ',$v);

                    $a=strtolower($b[0]);

                    $a=str_replace($acentos, $sinacentos, $a);

                    $arrjs.='"'.$a.'": "'.$v.'",';

                }

                $arrjs=substr($arrjs, 0, -1);

                echo '

                var newOptions = {"0": "-- Seleccione --",

                '.$arrjs.'

                };

            }

            else if($("#categoria").val()==2){';

                $arrjs="";

                foreach($esparcimiento as $k=>$v){

                    $k=str_replace($acentos, $conacentos, $k);

                    $v=str_replace($acentos, $conacentos, $v);

                    $b=explode(' ',$v);

                    $a=strtolower($b[0]);

                    $a=str_replace($acentos, $sinacentos, $a);

                    $arrjs.='"'.$a.'": "'.$v.'",';

                }

                $arrjs=substr($arrjs, 0, -1);

                echo '

                var newOptions = {"0": "-- Seleccione --",

                '.$arrjs.'

                };

            }

            else if($("#categoria").val()==3){';

                $arrjs="";

                foreach($deportiva as $k=>$v){

                    $k=str_replace($acentos, $conacentos, $k);

                    $v=str_replace($acentos, $conacentos, $v);

                    $b=explode(' ',$v);

                    $a=strtolower($b[0]);

                    $a=str_replace($acentos, $sinacentos, $a);

                    if($b[0]=="Cancha"){

                        $a=strtolower($b[2]);

                    }

                    else{

                       $a=strtolower($b[0]); 

                    }

                    $arrjs.='"'.$a.'": "'.$v.'",';

                }

                $arrjs=substr($arrjs, 0, -1);

                echo '

                var newOptions = {"0": "-- Seleccione --",

                '.$arrjs.'

                };

            }

            else if($("#categoria").val()==4){

                var newOptions = {"0": "-- Seleccione --",

                "cesped":"Césped",

                "arboles":"Árboles",

                "arbusto":"Arbusto",

                "riego":"Sistema de riego"

                };

            }

            var $el = $("#subcategoria");

            $el.empty();

            $.each(newOptions, function(value,key) {

                $el.append($("<option></option>").attr("value", value).text(key));

            });

        }

    }

    function cortatexto(){

        $("#compoera option:selected").text("hola");

    }

    function validar(n,y){

        var txtval=document.getElementById(y).value;

        document.getElementById(y).value = "Enviando...";

        document.getElementById(y).disabled = true;

        document.getElementsByName("cmd")[0].value=n;

        if(n==1){

            document.getElementsByName("buscarvisita")[0].value=1;

            if(document.getElementsByName("visita")[0].value==""){

                alert("Por favor especifica el tipo de visita");

                document.getElementById(y).value = txtval;

                document.getElementById(y).disabled = false;

                return false;

            }

            else{';

            //if($stat>0){

                echo 'var paseok=0;

                if(document.getElementsByName("visita")[0].value=="reforzamiento" || document.getElementsByName("visita")[0].value=="seguimiento"){

                    $.each($("input[name=\"asist[]\"]:checked"), function(){

                        paseok=1;

                    });

                }

                else{

                    paseok=1;

                }';

            /*}

            else{

                echo 'var paseok=1;';

            }*/

            echo 'if(paseok==0){

                    alert("Asegurate de tomar asistencia.");

                    document.getElementById(y).value = txtval;

                    document.getElementById(y).disabled = false;

                    return false;

                }

                else{';

                //if($stat>0){

                    echo 'if(document.getElementsByName("visita")[0].value=="standby"){

                        var limitestand='.$limv.';

                        if(limitestand<1){

                            alert("Haz llegado al límite de visitas permitidas en stand by, no puedes guardar mas.");

                            document.getElementById(y).value = txtval;

                            document.getElementById(y).disabled = false;

                            return false;

                        }

                    }';

                    /*if($_GET['ver']!=1){

                    	echo 'var sum=0;

	                    if($("#eventoss").is(":checked")){

	                        $.each($("input[name^=\"fecha_eventoc\"]"), function(index, value){

	                            if($(this).val()!=""){

	                                sum++;

	                            }

	                        });

	                        if(sum<4){

	                            alert("El calendario debe tener al menos 4 eventos planeados");

	                            document.getElementById(y).value = txtval;

	                            document.getElementById(y).disabled = false;

	                            return false;

	                        }    

	                    }';	

                    }*/

                //}

                echo '

                    $.ajax({url: "sistema.php",

                    data: { cmd: 88, parque: '.$_POST['parque'].', fecha: $("#datepicker4").val(), tipo_visita: document.getElementsByName("visita")[0].value},

                    dataType: "text",

                    type: "post",

                    success: function(result){

                        var res=result.split("|");

                        if(res[0]=="nope"){

                            alert(res[1]);

                            document.getElementById(y).value = txtval;

                            document.getElementById(y).disabled = false;

                            return false;

                        }

                        else{

                            if(document.getElementsByName("sinvisitas")[0].value!="1"){

                                if(document.getElementsByName("visita")[0].value=="reforzamiento"){

                                    if($("input[name=\'impacto_cal\']:checked").val()=="1"){

                                        calcular(1);

                                    }

                                    else{

                                        document.forma.submit();

                                    }

                                }

                                else if(document.getElementsByName("visita")[0].value=="standby"){

                                    document.forma.submit();

                                }

                                else{

                                    calcular(1);

                                }

                            }

                            else{

                                document.forma.submit();

                            }

                        }

                    }});

                }

            }

        }

        else if(n==2){

            document.getElementsByName("datos_miembros")[0].value=miem;

            document.getElementsByName("nuevos_miembros")[0].value=nmiem;

            document.forma.submit();

        }

        else if(n==3){

            var sipi=1;

            if(document.getElementById("needcom").value=="si"){

                $("td[id^=need]").each(function(){

                    if($(this).is(":visible")){

                        var namee=this.id.substr(4);

                        if(document.getElementsByName("com"+namee)[0].value==""){

                            sipi=0;

                        }

                    }

                });

                

                if(sipi==1){

                    document.getElementsByName("cmd")[0].value=1;

                    document.forma.submit();

                }

                else{

                    alert("Por favor llena todos los comentarios marcados.");

                    document.getElementById(y).value = txtval;

                    document.getElementById(y).disabled = false;

                    return false;

                }

            }

            else{

                document.forma.submit();

            }

        }

        else if(n==4){

            $("input, select").attr("disabled", false);

            document.forma.submit();

        }

        else if(n==6){

            document.getElementsByName("pods_meta__cmb_parque")[0].value=document.getElementsByName("parque")[0].value;';

            /*if($_GET['ver']!=1){

            	echo '$("#experiencia_si").attr("disabled", false);

            	$("#experiencia_no").attr("disabled", false);';

            }*/

            echo 'document.forma.submit();

        }
        else if(n==12){
        	var elem = $("#con_evireu");
        	var isVisible = elem.is(":visible"); 
			if (isVisible === true) {
   				if (document.getElementById("file_reuniones").files.length == 0 ) {
					alert("Debes seleccionar la evidencia");
					document.getElementById(y).value = txtval;
                    document.getElementById(y).disabled = false;
				    return false;
				}
			}
			elem = $("#con_evical");
        	isVisible = elem.is(":visible"); 
			if (isVisible === true) {
   				if (document.getElementById("file_calendario").files.length == 0 ) {
					alert("Debes seleccionar la evidencia");
					document.getElementById(y).value = txtval;
                    document.getElementById(y).disabled = false;
				    return false;
				}
			}
			cambio(3);
        }

        else{

            document.forma.submit();

        }   

    }

    function falta(){

        $.ajax({url: "sistema.php",

            data: { cmd: 101, parque: '.$_POST['parque'].', categoria: $("#categoria").val(), subcategoria: $("#subcategoria").val()},

            dataType: "text",

            type: "post",

            success: function(result){

                if(result!="no tiene"){

                    $("#faltante").val(result);

                }

            }

        });

    }

    function restar(){

        var falta = $("#faltante").val();

        var tiene = $("#cantidad").val();

        if(falta!=""){

            var ress=falta-tiene;

            $("#faltante").val(ress);

        }

    }

    function show_param(a){

    	if(a==1){

    		$("#normal").show();

    		$("#boton_calcular").show();

    	}

    	else{

    		$("#normal").hide();

    		$("#boton_calcular").hide();

    	}

    }

    function images_arb(j){

        if(j=="endemicos"){

            $("#imgarbolend").show();

            $("#imgarbol").hide();

        }

        else{

            $("#imgarbol").show();

            $("#imgarbolend").hide();

        }

    }

    function agregar_av(){

        $("#esparboles").show();

        $("#esparboles input:text").each(function() {

            this.value = "";

        });

        $("#imgarbolend").hide();

        $("#imgarbol").hide();

        $("#endemicos").attr("checked", false);

        $("#endemicon").attr("checked", false);

    }

    function agregar_pasto(){

        $("#esppasto").show();

        $("#silvestre").attr("checked", false);

        $("#comercial").attr("checked", false);

        $("#extension").attr("checked", false);

        $("#riegop").val("");

        $("#podap").val("");

        $("#esppasto input:text").each(function() {

            this.value = "";

        });

    }

    function show_averdes(a){

        if(a=="arboles"){

            $("#paramarboles").toggle();

        }

        else{

            $("#paramcesped").toggle();

        }

    }

    function change_vis(vis){

        if(vis=="reforzamiento"){

            var newOptions = {"0": "-- Seleccione --",

                "15": "Organización de Eventos",

                "16": "Proyecto en Proceso",

                "17": "Ingresos - Egresos",

                "18": "Otros"

            };

            $("#normal").hide();

            $("#logro_visita").show();

            $("#asistencia").show();

            $("#medio_contacto").hide();

            $("#boton_calcular").hide();

        }

        else if(vis=="standby"){

            var newOptions = {"0": "-- Seleccione --",

                "19": "Graduado",

                "20": "Parque sin interés"

            };

            $("#normal").hide();

            $("#logro_visita").hide();

            $("#asistencia").hide();

            $("#medio_contacto").show();

            $("#boton_calcular").hide();

        }

        else{

            if(vis=="prospectacion"){

                var newOptions = {"0": "-- Seleccione --",

                    "1": "Repartir volantes",

                    "2": "Formación del comité",

                    "3": "Reestructuración del comité"

                };

                $("#asistencia").hide();

            }

            else{

                var newOptions = {"0": "-- Seleccione --",

                    "1": "Repartir volantes",

                    "2": "Formación del comité",

                    "3": "Reestructuración del comité",

                    "4": "Elaboración de la visión del espacio",

                    "5": "Presentación de la visión del espacio a los vecinos",

                    "6": "Reestructuración de la visión del espacios",

                    "7": "Presentación del diseño del espacio a los vecinos",

                    "8": "Eventos organizados por el comité",

                    "9": "Eventos rganizados por parques alegres",

                    "10": "Talleres",

                    "11": "Elaboración del calendario anual de actividades",

                    "12": "Presentación de la planeación del calendario anual de actividades",

                    "13": "Asesoría para realizar el reglamento de orden",

                    "14": "Elaboración de carpetas para rifa"

                };

                $("#asistencia").show();

            }

            $("#normal").show();

            $("#logro_visita").hide();

            $("#medio_contacto").hide();

            $("#boton_calcular").show();

        }

        var $el = $("#clasvisita");

        $el.empty();

        $.each(newOptions, function(value,key) {

            $el.append($("<option></option>").attr("value", value).text(key));

        });

    }

    function change_clas(clas){

        if(clas=="18"){

            $("#otroclaslabel").show();

        }

        else{

            $("#otroclaslabel").hide();

        }

    }

    function cambio(s){

        for(m=0;m<13;m++){

            if(s==4){

                $("#parque").hide("slow");

            }

            else{

                $("#parque").show("slow");

            }

            if(m==s){

                $("#screen"+m).show("slow").css("display", "inline");

            }

            else{

                $("#screen"+m).hide("slow");

            }

        }

    }

    ';

    /*if($_GET['ver']!=1){

    	echo 'var totalm=0;

	    $("input[name^=\'meta_\']").each(function(){

	        if($(this).val()>0){

	            totalm=parseInt(totalm)+parseInt($(this).val());

	        }

	    });

	    $("#totalm").text(Math.round(totalm/7));

	    document.getElementsByName("totalmeta")[0].value=Math.round(totalm/7);

	    $("input[name^=\'meta_\']").each(function(){

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

	    });';

    }*/

    if($total!=""){

        echo 'document.getElementsByName("totalvis")[0].value='.round($total).';';

    }

    echo '

    $("input[name=\"organiza[]\"]").change(function(){

    	'; 
    	//if($_GET['ver']==1){

    		echo 'if($(this).val()==15){

    		$.each($("input[name=\"organiza[]\"]"), function(){

	            if($(this).val()!=15){

	            	$(this).prop("checked", false);

	            }

        	});

    	}

    	else{

    		$("#ninorg").prop("checked",false);

    	}

    	';
    	//}
    	echo '

        recalculate();

    });

    function add_reunion(num){

    	';

    	//if($_GET['ver']==1){

    		echo 'if(num>0){

	            $(".listreun").show();

	        }

	        else{

	        	$(".listreun").hide();

	        }';

    	/*}

    	else{

    		echo 'if(num>0){

	            $(".listreun").show();

	        }

	        else{

	            $(".listreun").hide();

	        }

	        $("#reun").html("");

	        for(var e=1;e<=num;e++){

	            var reunion = \'<label><input type="text" id="datepickerr\'+ e + \'" name="fecha_reunion[\'+ e + \']" onchange="recalc();"/><input type="text" name="num_asistentes[\'+ e + \']" onkeyup="recalc();"/>\';

	            $("#reun").append(reunion);

	            $("#datepickerr"+e).datepicker({ minDate: "'.date('Y-m-d', strtotime('-1 month')).'",maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

	        }

	        recalc();';

    	}*/

    	echo '

    }

    function sh_proy(pr){

        if(pr<20){

            $("#datosproy").hide();

        }

        else{

            $("#datosproy").show();

        }

    }

    function add_proy(){

        document.getElementById(\'num_proy\').value++;

        var i = document.getElementById(\'num_proy\').value;

        var proyecto = \'<label style="margin-left:35%;"><span>Nombre:</span><input type="text" name="nombre_proy[\'+ document.getElementById(\'num_proy\').value + \']"></label>\';

        proyecto += \'<label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="fecha_proy\'+ document.getElementById(\'num_proy\').value + \'" name="fecha_proy[\'+ document.getElementById(\'num_proy\').value + \']"></label>\';

        proyecto += \'<label style="margin-left:35%;"><span>Tipo:</span><select name="tipo_proy[\'+ document.getElementById(\'num_proy\').value + \']"><option value="" selected> -- Seleccione -- </option><option value="1">Tejido Social</option><option value="2">Generación de Ingresos</option><option value="3">Gestión</option></select></label>\';

        proyecto += \'<label style="margin-left:35%;"><span>Estatus:</span><select name="estatus_proy[\'+ document.getElementById(\'num_proy\').value + \']"><option value="" selected> -- Seleccione -- </option><option value="1">En proceso</option><option value="2">Terminado</option><option value="3">Cancelado</option></select></label>\';

        $("#nproy").append(proyecto);

        for(var e=1;e<=i;e++){

            $("#fecha_proy"+e).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});

        }

    }

    function recalc(){

        var sum = 0;

        $.each($("input[name^=\"fecha_reunion\"]"), function(){            

            if($(this).val()!=""){

                sum++;

            }

        });

        if(sum<1){

            $("#resultreun").text("Ninguna reunión").css("color", "red");

        }

        else if(sum<2){

            $("#resultreun").text("El comité se reune con regularidad").css("color", "orange");

        }

        else{

            $("#resultreun").text("El comité se reune con frecuencia").css("color", "green");   

        }

    }

    function recalculate(){

        var sum = 0;

        $.each($("input[name=\"organiza[]\"]:checked"), function(){

        '; foreach($organizacion_comite as $k=>$v){

            echo 'if($(this).val()=='.$k.'){

                sum += '.$v.';

            }';

        }

        echo '});

        if(sum<1){

            $("#resultorg").text("Sin organización").css("color", "red");

        }

        else if(sum<15){

            $("#resultorg").text("Regular").css("color", "orange");

        }

        else{

            $("#resultorg").text("Buena organización").css("color", "green");   

        }

    }

    function calcular(g){

        var chk_arr =  document.getElementsByName("averdes[]");

        var chklength = chk_arr.length;             

        var c=0;

        var valores = new Array();

        var areasverdes=0;

        var total=0;

        var sum=0;

        var sume=0;

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

        if($("input[name=\'ingresop\']:checked").val()!=undefined){

            total = total+parseInt($("input[name=\'ingresop\']:checked").val());

        }

        if($("input[name=\'mancomunado\']:checked").val()!=undefined){

            total = total+parseInt($("input[name=\'mancomunado\']:checked").val());

        }';

        //if($asesor==13563 && $_GET['p']==1){

        //if($_GET['ver']==1){

        	echo 'var calend=0;

        	if($("input[name=\'eventos\']:checked").val()!=undefined){

        		calend=parseInt($("input[name=\'eventos\']:checked").val());

            }

            total = total+calend;

            var eventosr=0;

            if(document.getElementsByName("neventosfc")[0].value!=""){

        		eventosr=parseInt(document.getElementsByName("neventosfc")[0].value);

            }

            total = total+eventosr;

            var nombres = ["estado","instalaciones","ingresadop","estaver","gente"];';

        /*}

        else{

            echo '$.each($("input[name^=\"fecha_eventoc\"]"), function(index, value){

                se=index+1;

                if($("#status_even"+se).val()==2){

                

                    if(sume<4){

                        sume++;

                    }

                }

                if($(this).val()!=""){

                    sum++;

                }

            });

            for (ind = 1; ind <= $("input[name=\"evenfbd\"]").val(); ++ind) {

                if($("#status_evenf"+ind).val()==2){

                    if(sume<4){

                        sume++;

                    }

                }

            }

            var calend=0;

            var eventosr=0;

            if(sum>=4){

                calend=50;

                total = total+50;

            }

            if(sume>0){

                eventosr=(sume*50)/4;

                total = total + ((sume*50)/4);

            }

            var nombres = ["estado","instalaciones","ingresadop","estaver","gente"];

            ';

        }*/

        /*}

        else{

            echo 'var nombres = ["opera","organiza","reunion","estado","instalaciones","ingresadop","eventosr","estaver","gente","respint","orden","limpieza"];

            if($("input[name=\'eventos\']:checked").val()!=undefined){

                total = total+parseInt($("input[name=\'eventos\']:checked").val());

            }';

        }*/

        echo 'if(document.getElementsByName("tipo_proyecto")[0].value!=""){

            if(document.getElementsByName("tipo_proyecto")[0].value!="0"){

                total= total+40;

            }

        }

        var formal=0;

        if(document.getElementsByName("formaliza")[0].value!=""){

            if(document.getElementsByName("formaliza")[0].value=="interno"){

                total= total+10;

                formal=10

            }

            else{

                total=total+20;

                formal=20;

            }

        }';

        

            echo 'var opera=0;

            if($("#miem_comite").val()>0){

                opera=7;

                if($("#miem_comite").val()>1){

                    opera=14;

                    if($("#miem_comite").val()>2){

                        opera=20;

                    }

                }

            }

            total=total + opera;

            if(document.getElementsByName("organizac")[0].value!=""){

                total= total + parseInt(document.getElementsByName("organizac")[0].value);

            }

            '; 
            //if($_GET['ver']==1){ 
            	echo '

            	reuniones=0;

            	if(document.getElementsByName("nreuniones")[0].value!=""){

                	reuniones=parseInt(document.getElementsByName("nreuniones")[0].value);

            	}

            	total=total+reuniones;';

            /*}

            else{

            	echo 'if($("#resultreun").text()=="El comité se reune con frecuencia"){

	                reuniones=20;

	            }

	            else if($("#resultreun").text()=="El comité se reune con regularidad"){

	                reuniones=10;

	            }

	            else{

	                reuniones=0;

	            }

	            total=total+reuniones;';

            }*/

            echo '

            if($("input[name=\'proyecto\']:checked").val()!=undefined){

                total = total+parseInt($("input[name=\'proyecto\']:checked").val());

            }

            if(document.getElementsByName("orden")[0].value!=""){

                total= total + parseInt(document.getElementsByName("orden")[0].value);

            }

            var respint=0;

            if($("#resultres").text()=="No"){

                respint=0;

            }

            else if($("#resultres").text()=="Regular"){

                respint=20;

            }

            else{

                respint=40;

            }

            if(document.getElementsByName("respinsta")[0].value!=""){

                respint=parseInt(document.getElementsByName("respinsta")[0].value);

            }

            else{

                respint=0

            }

            total=total+respint;

            var suml = 30;

            $.each($("input[name=\"limpio[]\"]:checked"), function(){            

                if(parseInt($(this).val())!=1){

                    suml -= 4.28;    

                }

            });

            var limpieza=suml;

            if(document.getElementsByName("limpieza")[0].value!=""){

                limpieza=parseInt(document.getElementsByName("limpieza")[0].value);

            }

            else{

                limpieza=0;

            }

            total=total+limpieza;

            ';/*

            var proyecto=0;

            if($("input[name^=\'nombre_proy\']").length > 0){

                $("input[name^=\'nombre_proy\']").each(function(){

                    var name_proy = $(this).attr("name");

                    var last3_proy = name_proy.substr(name_proy.length - 2,1);

                    if($(this).val()!="" && $("select[name=\'estatus_proy["+last3_proy+"]\']").val()=="1"){

                        proyecto=20;

                    }

                });

            }

            total=total+proyecto;

            ';*/

        /*    

            echo '

            if(document.getElementsByName("opera")[0].value!=""){

                total= total + parseInt(document.getElementsByName("opera")[0].value);

            }

            if(document.getElementsByName("organiza")[0].value!=""){

                total= total + parseInt(document.getElementsByName("organiza")[0].value);

            }

            if(document.getElementsByName("reunion")[0].value!=""){

                total= total + parseInt(document.getElementsByName("reunion")[0].value);

            }

            if(document.getElementsByName("orden")[0].value!=""){

                total= total + parseInt(document.getElementsByName("orden")[0].value);

            }

            if(document.getElementsByName("respint")[0].value!=""){

                total= total + parseInt(document.getElementsByName("respint")[0].value);

            }

            if(document.getElementsByName("limpieza")[0].value!=""){

                total= total + parseInt(document.getElementsByName("limpieza")[0].value);

            }';

        */

        echo '

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

        var diferencias = [];';

        

            echo 'if($("input[name=\'proyecto\']:checked").val()!="'.$rowz["proyecto"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#proyectoant").text('.$rowz["proyecto"].');
            		$("#proyectoact").text($("input[name=\'proyecto\']:checked").val());';
            	//}
            	echo '

                diferencias.push("proyecto");

            }

            if(reuniones!="'.$rowz["reunion"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#reunionant").text('.$rowz["reunion"].');
            		$("#reunionact").text(reuniones);';
            	//}
            	echo '

                diferencias.push("reunion");

            }

            if(document.getElementsByName("organizac")[0].value!="'.$rowz["organiza"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#organizaant").text('.$rowz["organiza"].');
            		$("#organizaact").text(document.getElementsByName("organizac")[0].value);';
            	//}
            	echo '
                diferencias.push("organiza");

            }

            if(opera!="'.$rowz["opera"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#operaant").text('.$rowz["opera"].');
            		$("#operaact").text(opera);';
            	//}
            	echo '
                diferencias.push("opera");

            }

            if(document.getElementsByName("orden")[0].value!="'.$rowz["orden"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#ordenant").text('.$rowz["orden"].');
            		$("#ordenact").text(document.getElementsByName("orden")[0].value);';
            	//}
            	echo '

                diferencias.push("orden");

            }

            if(limpieza!="'.$rowz["limpieza"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#limpiezaant").text('.$rowz["limpieza"].');
            		$("#limpiezaact").text(limpieza);';
            	//}
            	echo '
                diferencias.push("limpieza");

            }

            if(respint!="'.$rowz["respint"].'"){
            	'; 
            	//if($_GET['ver']==1){
            		echo '$("#respintant").text('.$rowz["respint"].');
            		$("#respintact").text(respint);';
            	//}
            	echo '
                diferencias.push("respint");

            }';

        /*

            echo '

            if(document.getElementsByName("opera")[0].value!="'.$rowz["opera"].'"){

                diferencias.push("opera");

            }

            if(document.getElementsByName("organiza")[0].value!="'.$rowz["organiza"].'"){

                diferencias.push("organiza");

            }

            if(document.getElementsByName("reunion")[0].value!="'.$rowz["reunion"].'"){

                diferencias.push("reunion");

            }

            if($("input[name=\'proyecto\']:checked").val()!="'.$rowz["proyecto"].'"){

                diferencias.push("proyecto");

            }

            ';

        */

        echo '

        if(formal!="'.$rowz["formaliza"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#formalizaant").text('.$rowz["formaliza"].');
            		$("#formalizaact").text(formal);';
            	//}
            	echo '
            diferencias.push("formaliza");

        }

        if($("input[name=\'ingresop\']:checked").val()!="'.$rowz["ingresop"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#ingresopant").text('.$rowz["ingresop"].');
            		$("#ingresopact").text($("input[name=\'ingresop\']:checked").val());';
            	//}
            	echo '
            diferencias.push("ingresop");

        }

        if($("input[name=\'mancomunado\']:checked").val()!="'.$rowz["mancomunado"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#mancomunadoant").text('.$rowz["mancomunado"].');
            		$("#mancomunadoact").text($("input[name=\'mancomunado\']:checked").val());';
            	//}
            	echo '

            diferencias.push("mancomunado");

        }

        if(calend!="'.$rowz["eventos"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#eventosant").text('.$rowz["eventos"].');
            		$("#eventosact").text(calend);';
            	//}
            	echo '
                diferencias.push("eventos");

        }';

        if($rowz['vespacio']==40){

            $tipoproyecto='vespacio';

        }

        if($rowz['disenio']==40){

            $tipoproyecto='disenio';

        }

        if($rowz['ejecutivo']==40){

            $tipoproyecto='ejecutivo';

        }

        echo 'if(document.getElementsByName("tipo_proyecto")[0].value!="'.$tipoproyecto.'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#'.$tipoproyecto.'ant").text('.$rowz[$tipoproyecto].');
            		$("#'.$tipoproyecto.'act").text(document.getElementsByName("tipo_proyecto")[0].value);';
            	//}
            	echo '
            diferencias.push("'.$tipoproyecto.'");

        }

        if(document.getElementsByName("estado")[0].value!="'.$rowz["estado"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#estadoant").text('.$rowz['estado'].');
            		$("#estadoact").text(document.getElementsByName("estado")[0].value);';
            	//}
            	echo '
            diferencias.push("estado");

        }

        if(document.getElementsByName("instalaciones")[0].value!="'.$rowz["instalaciones"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#instalacionesant").text('.$rowz['instalaciones'].');
            		$("#instalacionesact").text(document.getElementsByName("instalaciones")[0].value);';
            	//}
            	echo '
            diferencias.push("instalaciones");

        }

        if(document.getElementsByName("ingresadop")[0].value!="'.$rowz["ingresadop"].'"){
'; 
            	//if($_GET['ver']==1){
            		echo '$("#ingresadopant").text('.$rowz['ingresadop'].');
            		$("#ingresadopact").text(document.getElementsByName("ingresadop")[0].value);';
            	//}
            	echo '
            diferencias.push("ingresadop");

        }

        if(eventosr!="'.$rowz["eventosr"].'"){
'; 
            	//if($_GET['ver']==1){
            		echo '$("#eventosrant").text('.$rowz['eventosr'].');
            		$("#eventosract").text(eventosr);';
            	//}
            	echo '
                diferencias.push("eventosr");

        }

        if(areasverdes!="'.$rowz["averdes"].'"){
        	'; 
            	//if($_GET['ver']==1){
            		echo '$("#averdesant").text('.$rowz['averdes'].');
            		$("#averdesact").text(areasverdes);';
            	//}
            	echo '
            diferencias.push("averdes");

        }

        if(document.getElementsByName("estaver")[0].value!="'.$rowz["estaver"].'"){
'; 
            	//if($_GET['ver']==1){
            		echo '$("#estaverant").text('.$rowz['estaver'].');
            		$("#estaveract").text(document.getElementsByName("estaver")[0].value);';
            	//}
            	echo '
            diferencias.push("estaver");

        }

        if(document.getElementsByName("gente")[0].value!="'.$rowz["gente"].'"){
'; 
            	//if($_GET['ver']==1){
            		echo '$("#genteant").text('.$rowz['gente'].');
            		$("#genteact").text(document.getElementsByName("gente")[0].value);';
            	//}
            	echo '
            diferencias.push("gente");

        }

        if(g==1){

            if(Math.round(total)!=document.getElementById("calant").value){

                    document.getElementById("needcom").value="si";

                    document.getElementById("diferencias").value=diferencias;

                    for(r=0;r<diferencias.length;r++){

                        $("#need"+diferencias[r]).show();

                    }
                    '; 
                    //if($_GET['ver']==1){
						echo '
						var evi=0;
						if(parseInt($("#evidencia_reunion").val())>0){
							$("#con_evireu").show();
		                	evi=1;
		                }
		                if(parseInt($("#evidencia_calendario").val())>0){
		                	$("#con_evical").show();
		                	evi=1;
		                }
		                if(evi==1){
		                	cambio(12);
		                }
		                else{
		                	cambio(3);
		                }';
					/*}
					else{
						echo 'cambio(3);';
					} */  
					echo '

            }

            else{

                document.getElementById("needcom").value="si";

                $("#needgenvisita").show();
				'; 
				//if($_GET['ver']==1){
					echo '
					var evi=0;
					if(parseInt($("#evidencia_reunion").val())>0){
						$("#con_evireu").show();
	                	evi=1;
	                }
	                if(parseInt($("#evidencia_calendario").val())>0){
	                	$("#con_evical").show();
	                	evi=1;
	                }
	                if(evi==1){
	                	cambio(12);
	                }
	                else{
	                	cambio(3);
	                }';
				/*}
				else{
					echo 'cambio(3);';
				} */  
				echo '
            }

        }

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

            miembro += \'<label><span>Tiene Facebook?</span>Sí <input type="radio" class="megusta" name="facebook[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"> No <input type="radio" class="megusta" name="facebook[\'+ document.getElementById(\'num_miembro\').value + \']" value="2"></label>\';

            miembro += \'<label><span>"Me gusta" a Parques Alegres en Facebook?</span><input type="checkbox" class="megusta" name="megusta[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';

            miembro += \'<label><span>Tiene Twitter?</span>Sí <input type="radio" class="megusta" name="twitter[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"> No <input type="radio" class="megusta" name="twitter[\'+ document.getElementById(\'num_miembro\').value + \']" value="2"></label>\';

            miembro += \'<label><span>"Sigue" a Parques Alegres en Twitter?</span><input type="checkbox" class="megusta" name="siguemet[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';

            miembro += \'<label><span>Tiene Instagram?</span>Sí <input type="radio" class="megusta" name="instagram[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"> No <input type="radio" class="megusta" name="instagram[\'+ document.getElementById(\'num_miembro\').value + \']" value="2"></label>\';

            miembro += \'<label><span>"Sigue" a Parques Alegres en Instagram?</span><input type="checkbox" class="megusta" name="siguemei[\'+ document.getElementById(\'num_miembro\').value + \']" value="1"></label>\';

            miembro += \'<label><span>Correo electr&oacute;nico:</span><input type="text" name="email[\'+ document.getElementById(\'num_miembro\').value + \']"></label>\';

            miembro += \'<label><span>Contacto:</span><input type="radio" value="1" id="cont_a[\'+ document.getElementById(\'num_miembro\').value + \']" name="contacto[\'+ document.getElementById(\'num_miembro\').value + \']" onclick="contacto(\'+ document.getElementById(\'num_miembro\').value + \');"><label class="white-pinked" for="cont_a[\'+ document.getElementById(\'num_miembro\').value + \']">S&iacute;</label><input type="radio" value="0" id="cont_b[\'+ document.getElementById(\'num_miembro\').value + \']" name="contacto[\'+ document.getElementById(\'num_miembro\').value + \']"><label class="white-pinked" for="cont_b[\'+ document.getElementById(\'num_miembro\').value + \']">No</label></label>\';

            $("#miembros").append(miembro);

        }

        function new_fecha(nom){

            var inpfecha = nom.substr(11);

            if(document.getElementsByName(nom)[0].value==1){        

                $("#nueva_fecha"+inpfecha).hide();

            }

            else{

                $("#nueva_fecha"+inpfecha).show();

            }

        }

        var me=0;

        function editar(cve){

            $("#boton_guardar").attr("disabled", true).removeClass("button").addClass("disa");

            if(cve>0){

                var miembro=[];';

                if(is_array($miembros)){

                    foreach($miembros as $k=>$v){

                        echo 'miembro["'.$k.'"]=["'.$v[0].'","'.$v[1].'","'.$v[2].'","'.$v[3].'","'.$v[4].'","'.$v[5].'","'.$v[6].'","'.$v[7].'","'.$v[8].'","'.$v[9].'","'.$v[10].'","'.$v[11].'","'.$v[12].'","'.$v[13].'","'.$v[14].'","'.$v[15].'","'.$v[16].'","'.$v[17].'"];';

                    }

                }

                echo '

                if (miembro[cve][17]!="") {

                    var fecha_mi = miembro[cve][17].split("-");

                }

                else{

                    var fecha_mi = [0000,00,00];

                }

                $("#nombre1").val(miembro[cve][0]);

                $("#dia1").val(parseInt(fecha_mi[2]));

                $("#mes1").val(parseInt(fecha_mi[1]));

                $("#anio1").val(fecha_mi[0]);

                if(miembro[cve][4]=="Masculino"){

                    $("#masculino1").attr("checked", "checked");

                }

                else if(miembro[cve][4]=="Femenino"){

                    $("#femenino1").attr("checked", "checked");

                }

                else{

                    $("#femenino1").attr("checked", false);

                    $("#masculino1").attr("checked", false);

                }

                $("#educacion1").val(miembro[cve][5]);

                $("#rol1").val(miembro[cve][6]);

                $("#telefono1").val(miembro[cve][7]);

                $("#celular1").val(miembro[cve][8]);

                $("#email1").val(miembro[cve][9]);

                if(miembro[cve][10]=="1"){

                    $("#siface1").attr("checked", "checked");

                }

                else if(miembro[cve][10]=="2"){

                    $("#noface1").attr("checked", "checked");

                }

                else{

                    $("#noface1").attr("checked", false);

                    $("#siface1").attr("checked", false);

                }

                if(miembro[cve][11]=="1"){

                    $("#megusta1").prop("checked", true);

                }

                else{

                    $("#megusta1").prop("checked", false);

                }

                if(miembro[cve][12]=="1"){

                    $("#sitwitter1").attr("checked", "checked");

                }else if(miembro[cve][12]=="2"){

                    $("#notwitter1").attr("checked", "checked");

                }

                else{

                    $("#sitwitter1").attr("checked", false);

                    $("#notwitter1").attr("checked", false);

                }

                if(miembro[cve][13]=="1"){

                    $("#siguemet1").prop("checked", true);

                }

                else{

                    $("#siguemet1").prop("checked", false);

                }

                if(miembro[cve][14]=="1"){

                    $("#siinsta1").attr("checked", "checked");

                }else if(miembro[cve][14]=="2"){

                    $("#noinsta1").attr("checked", "checked");

                }

                else{

                    $("#siinsta1").attr("checked", false);

                    $("#noinsta1").attr("checked", false);

                }

                if(miembro[cve][15]=="1"){

                    $("#siguemei1").prop("checked", true);

                }

                else{

                    $("#siguemei1").prop("checked", false);

                }

                if(miembro[cve][16]=="1"){

                    $("#sicont1").attr("checked", "checked");

                }else if(miembro[cve][16]=="2"){

                    $("#nocont1").attr("checked", "checked");

                }

                else{

                    $("#sicont1").attr("checked", false);

                    $("#nocont1").attr("checked", false);

                }

                $("#num_miembro").val(cve);

            }

            else{

                $("#editmi :input").each(function() {

                    this.value = "";

                });

                $("#boton_cerrar").val("Cerrar");

                $("#femenino1").attr("checked", false);

                $("#masculino1").attr("checked", false);

                $("#noface1").attr("checked", false);

                $("#siface1").attr("checked", false);

                $("#megusta1").prop("checked", false);

                $("#sitwitter1").attr("checked", false);

                $("#notwitter1").attr("checked", false);

                $("#siguemet1").prop("checked", false);

                $("#siinsta1").attr("checked", false);

                $("#noinsta1").attr("checked", false);

                $("#siguemei1").prop("checked", false);

                $("#sicont1").attr("checked", false);

                $("#nocont1").attr("checked", false);

                me++;

                $("#num_miembro").val("a"+me);

            }

            $("#editmi").show();

        }

        var miem = [];

        var nmiem = [];

        var nm=0;

        function cerrar(){

            nm++;

            var megusta=0;

            var siguet=0;

            var siguei=0;

            var facebook=0;

            var twitter=0;

            var insta=0;

            var cont=0;

            var sexo="";

            if($("#megusta1").is(":checked")){

                megusta=1;

            }

            if($("#siguemet1").is(":checked")){

                siguet=1;

            }

            if($("#siguemei1").is(":checked")){

                siguei=1;

            }

            if($("#masculino1").is(":checked")){

                sexo="Masculino";

            }

            if($("#femenino1").is(":checked")){

                sexo="Femenino";

            }

            if($("#siface1").is(":checked")){

                facebook="1";

            }

            if($("#noface1").is(":checked")){

                facebook="2";

            }

            if($("#sitwitter1").is(":checked")){

                twitter="1";

            }

            if($("#notwitter1").is(":checked")){

                twitter="2";

            }

            if($("#siinsta1").is(":checked")){

                insta="1";

            }

            if($("#noinsta1").is(":checked")){

                insta="2";

            }

            if($("#sicont1").is(":checked")){

                cont="1";

            }

            if($("#nocont1").is(":checked")){

                cont="2";

            }

            if($("#num_miembro").val().substr(0, 1)=="a"){

                nmiem[$("#num_miembro").val().substr(1)] = $("#nombre1").val()+"|"+$("#dia1").val()+"|"+$("#mes1").val()+"|"+$("#anio1").val()+"|"+sexo+"|"+$("#educacion1").val()+"|"+$("#rol1").val()+"|"+$("#telefono1").val()+"|"+$("#celular1").val()+"|"+$("#email1").val()+"|"+facebook+"|"+megusta+"|"+twitter+"|"+siguet+"|"+insta+"|"+siguei+"|"+cont;

            }

            else{

                miem[nm] = $("#num_miembro").val()+"|"+$("#nombre1").val()+"|"+$("#dia1").val()+"|"+$("#mes1").val()+"|"+$("#anio1").val()+"|"+$("input[name=\"sexo[1]\"]:checked").val()+"|"+$("#educacion1").val()+"|"+$("#rol1").val()+"|"+$("#telefono1").val()+"|"+$("#celular1").val()+"|"+$("#email1").val()+"|"+$("input[name=\"facebook[1]\"]:checked").val()+"|"+megusta+"|"+$("input[name=\"twitter[1]\"]:checked").val()+"|"+siguet+"|"+$("input[name=\"instagram[1]\"]:checked").val()+"|"+siguei+"|"+$("input[name=\"contacto[1]\"]:checked").val();

            }

            $("#editmi").hide();

            $("#boton_guardar").attr("disabled", false).removeClass("disa").addClass("button");;

        }

        function cerrar_arb(){

            $("#esparboles").hide();

        }

        function cerrar_pasto(){

            $("#esppasto").hide();

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

    

    </script>';

    

    if($_POST['cmd']==5){

        if($_POST['parque']>0){

            foreach ($instalaciones as $k=>$v) {

                $b=explode(' ',$v);

                $a=strtolower($b[0]);

                $a=str_replace($acentos, $sinacentos, $a);

                if($v=="Cajones de estacionamiento"){

                    if($_POST['ccajones']!="" || $_POST['fcajones']=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',1,'cajones','".$_POST['ccajones'].", ".$_POST['fcajones']."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                }

                elseif($v=="Canasta de reciclaje"){

                    if($_POST['canasta']!=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',1,'canasta','".$_POST['canasta']."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                }

                else{

                    if($_POST['c'.$a]!="" || $_POST[$a]!="" || $_POST['f'.$a]!=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',1,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";

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

                    $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',2,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";

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

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',3,'gimnasio','".$_POST['gimnasio']."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                }

                elseif($v=="Promotor deportivo"){

                    if($_POST['promotores']!=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',3,'promotores','".$_POST['promotores']."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                    if($_POST['deportes']!=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',3,'deportes','".$_POST['deportes']."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                }

                else{

                    if($_POST['c'.$a]!="" || $_POST[$a]!="" || $_POST['f'.$a]!=""){

                        $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',3,'".$a."','".$_POST['c'.$a].", ".$_POST[$a].", ".$_POST['f'.$a]."')";

                        //echo $sSQL4.'<br>';

                        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

                    }

                }

            }

            if($_POST['cespedv']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'cesped area verde','".$_POST['ccespedv'].",".$_POST['tcespedv'].",".$_POST['fcespedv'].",".$_POST['cespedv']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

            if($_POST['cespedd']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'cesped area deportiva','".$_POST['ccespedd'].",".$_POST['tcespedd'].",".$_POST['fcespedd'].",".$_POST['cespedd']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

            if($_POST['cespedr']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'cesped area recreativa','".$_POST['ccespedr'].",".$_POST['tcespedr'].",".$_POST['fcespedr'].",".$_POST['cespedr']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

            if($_POST['arboles']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'arboles','".$_POST['carboles'].",".$_POST['arboles'].",".$_POST['farboles']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

            if($_POST['arbusto']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'arbusto','".$_POST['carbusto'].",".$_POST['tarbusto'].",".$_POST['farbusto'].",".$_POST['arbusto']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

            if($_POST['riego']!=""){

                $sSQL4="INSERT INTO checklist(cve_parque,fecha,clasificacion,parametro,data) VALUES ('".$_POST['parque']."','".date("Y-m-d")."',4,'riego','".$_POST['criego'].",".$_POST['triego'].",".$_POST['friego'].",".$_POST['riego']."')";

                //echo $sSQL4.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);

            }

        }

        else{

            echo 'No ha seleccionado ningun parque';

        }

    }

    if($_POST['cmd']==6){

        if($_POST['parque']>0){

        	//if($_GET['ver']==1){

                $nombre_archivo = $_FILES['file_tangible']['name']; 

                $tipo_archivo = $_FILES['file_tangible']['type']; 

                $tamano_archivo = $_FILES['file_tangible']['size']; 

                //compruebo si las características del archivo son las que deseo 

                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 

                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 

                }else{*/ 

                $uploads_dir = getcwd().'/tangibles';

                if(count($_FILES['file_tangible']['name'])){

                    foreach ($_FILES["file_tangible"]["error"] as $key => $error) {

                        if ($error == UPLOAD_ERR_OK) {

                            $tmp_name = $_FILES["file_tangible"]["tmp_name"][$key];

                            // basename() puede evitar ataques de denegación de sistema de ficheros;

                            // podría ser apropiada más validación/saneamiento del nombre del fichero

                            $name = basename($_FILES["file_tangible"]["name"][$key]);

                            $i=0;

                            if(file_exists($uploads_dir."/".$name)){

                                while(file_exists($uploads_dir."/".$name)){

                                    $i++;

                                    $ult=strrpos($name,".");

                                    $nom=substr($name, 0 ,$ult);

                                    $ext=substr($name, $ult);

                                    $name=$nom.$i.$ext;

                                }

                            }

                            if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){

                                echo "El archivo de tangible ha sido cargado correctamente.";

                                $archivos.=$name.',';

                            }

                            else{

                                echo "Ocurrió algún error al subir el archivo de tangible. No pudo guardarse.";

                            }

                        }

                    }

                    $archivos = substr($archivos, 0, -1);

                }

                else{

                    $i=0;

                    if(file_exists($uploads_dir."/".$nombre_archivo)){

                        while(file_exists($uploads_dir."/".$nombre_archivo)){

                            $i++;

                            $ult=strrpos($nombre_archivo,".");

                            $nom=substr($nombre_archivo, 0 ,$ult);

                            $ext=substr($nombre_archivo, $ult);

                            $nombre_archivo=$nom.$i.$ext;

                        }

                    }

                    if (move_uploaded_file($_FILES['file_tangible']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 

                        $archivos=$nombre_archivo;

                        echo "El archivo de tangible ha sido cargado correctamente."; 

                    }else{ 

                        echo "Ocurrió algún error al subir el archivo de tangible. No pudo guardarse."; 

                    }

                }

            //} 

                $fotos_exp=$archivos."|";

                $nombre_archivo = $_FILES['file_experiencia']['name']; 

                $tipo_archivo = $_FILES['file_experiencia']['type']; 

                $tamano_archivo = $_FILES['file_experiencia']['size']; 

                    

                $mypost = array('post_name' => $_POST['nombre_tangible'],

                'post_title' => $_POST['nombre_tangible'],

                'post_status' => 'draft',

                'post_author' => trim($user->ID),

                'post_type' => 'experiencia_exitosa',

                'post_date' => date("Y-m-d H:i:s")

                );

                $idpost = wp_insert_post( $mypost , true);

                $sql05="INSERT INTO `tangibles`(`nombre`,`cve_parque`,`fecha_reg`,`fecha_tangible`,`proposito`,`tipo`,`experiencia_exitosa`,`evidencias`,`notas`) VALUES ('".$_POST['nombre_tangible']."','".$_POST['parque']."','".date("Y-m-d H:i:s")."','".$_POST['fecha_ini_tangible']."','".$_POST['proposito_tangible']."','".$_POST['tipo_tangible']."','".$idpost."','".$archivos."','".$_POST['notas_tangible']."')";

                //echo $sSQL5.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sql05);

        

                if($idpost>0){

                    add_post_meta($idpost, '_cmb_parque', $_POST['parque'], true );

                    add_post_meta($idpost, '_cmb_event_date', $_POST['fecha_ini_tangible'], true );

                    add_post_meta($idpost, '_cmb_event_type', $_POST['tipo_tangible'], true );

                    add_post_meta($idpost, '_cmb_event_proposito', $_POST['proposito_tangible'], true );

                    add_post_meta($idpost, '_cmb_participants_comite', $_POST['involucrados_comite'], true );

                    add_post_meta($idpost, '_cmb_participants_vecinos', $_POST['involucrados_vecinos'], true );

                    add_post_meta($idpost, '_cmb_asistentes', $_POST['asistentes'], true );

                    add_post_meta($idpost, '_cmb_boletos', $_POST['boletos'], true );

                    add_post_meta($idpost, '_cmb_cooperacion', $_POST['cooperacion'], true );

                    add_post_meta($idpost, '_cmb_patrocinios', $_POST['patrocinios'], true );

                    add_post_meta($idpost, '_cmb_gestiones', $_POST['gestiones'], true );

                    add_post_meta($idpost, '_cmb_empresa', $_POST['empresa'], true );

                    add_post_meta($idpost, '_cmb_costos', $_POST['costos'], true );

                    add_post_meta($idpost, '_cmb_ingresos', $_POST['ingresos'], true );

                    add_post_meta($idpost, '_cmb_impacto', $_POST['impacto'], true );

                    add_post_meta($idpost, '_cmb_desc_impacto', $_POST['descimpacto'], true );

                    add_post_meta($idpost, '_cmb_cant_impacto', $_POST['cantidad_imp'], true );

                    add_post_meta($idpost, '_cmb_actividades', $_POST['actividades'], true );

                    add_post_meta($idpost, '_cmb_mejorar', $_POST['mejorar'], true );

                    add_post_meta($idpost, '_cmb_contacto_exp', $_POST['contacto_exp'], true );

                    add_post_meta($idpost, '_cmb_imagenes', $fotos_exp, true );

                    echo 'Experiencia exitosa guardada exitosamente';

                }

                else{

                    echo 'Error';

                }

        	/*}

        	else{

	            if($_POST['experiencias_exi']!=0){

	                $sql="UPDATE `wp_posts` SET `post_title`='".$_POST['nom_evento']."' WHERE ID='".$_POST['experiencias_exi']."'";

	                mysql_db_query("parquesa_ParquesAlegresWP",$sql);

	                update_post_meta($_POST['experiencias_exi'], '_cmb_event_date', $_POST['fecha_evento'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_video', $_POST['video'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_event_type', $_POST['tipo_evento'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_event_proposito', $_POST['proposito'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_participants_comite', $_POST['involucrados_comite'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_participants_vecinos', $_POST['involucrados_vecinos'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_actividades', $_POST['actividades'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_asistentes', $_POST['asistentes'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_benefits', $_POST['beneficios'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_impacto', $_POST['impacto'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_cant_impacto', $_POST['cantidad_imp'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_desc_impacto', $_POST['descimpacto'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_desc_impacto2', $_POST['descimpacto2'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_success_key', $_POST['clave'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_mejorar', $_POST['mejorar'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_contacto_exp', $_POST['contacto_exp'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_costos', $_POST['costos'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_boletos', $_POST['boletos'], true );

	                update_post_meta($_POST['experiencias_exi'], '_cmb_patrocinios', $_POST['patrocinios'], true );

	                echo 'Experiencia exitosa guardada exitosamente';

	            }

	            else{

	                $nombre_archivo = $_FILES['file_tangible']['name']; 

	                $tipo_archivo = $_FILES['file_tangible']['type']; 

	                $tamano_archivo = $_FILES['file_tangible']['size']; 

	                //compruebo si las características del archivo son las que deseo 

	                /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 

	                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 

	                }else{*/ 

	        /*            $uploads_dir = getcwd().'/tangibles';

	                    if(count($_FILES['file_tangible']['name'])){

	                        foreach ($_FILES["file_tangible"]["error"] as $key => $error) {

	                            if ($error == UPLOAD_ERR_OK) {

	                                $tmp_name = $_FILES["file_tangible"]["tmp_name"][$key];

	                                // basename() puede evitar ataques de denegación de sistema de ficheros;

	                                // podría ser apropiada más validación/saneamiento del nombre del fichero

	                                $name = basename($_FILES["file_tangible"]["name"][$key]);

	                                $i=0;

	                                if(file_exists($uploads_dir."/".$name)){

	                                    while(file_exists($uploads_dir."/".$name)){

	                                        $i++;

	                                        $ult=strrpos($name,".");

	                                        $nom=substr($name, 0 ,$ult);

	                                        $ext=substr($name, $ult);

	                                        $name=$nom.$i.$ext;

	                                    }

	                                }

	                                if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){

	                                    echo "El archivo de tangible ha sido cargado correctamente.";

	                                    $archivos.=$name.',';

	                                }

	                                else{

	                                    echo "Ocurrió algún error al subir el archivo de tangible. No pudo guardarse.";

	                                }

	                            }

	                        }

	                        $archivos = substr($archivos, 0, -1);

	                    }

	                    else{

	                        $i=0;

	                        if(file_exists($uploads_dir."/".$nombre_archivo)){

	                            while(file_exists($uploads_dir."/".$nombre_archivo)){

	                                $i++;

	                                $ult=strrpos($nombre_archivo,".");

	                                $nom=substr($nombre_archivo, 0 ,$ult);

	                                $ext=substr($nombre_archivo, $ult);

	                                $nombre_archivo=$nom.$i.$ext;

	                            }

	                        }

	                        if (move_uploaded_file($_FILES['file_tangible']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 

	                            $archivos=$nombre_archivo;

	                            echo "El archivo de tangible ha sido cargado correctamente."; 

	                        }else{ 

	                            echo "Ocurrió algún error al subir el archivo de tangible. No pudo guardarse."; 

	                        }

	                    }

	                //} 

	                $sql05="INSERT INTO `tangibles`(`nombre`,`cve_parque`,`fecha_reg`,`fecha_tangible`,`proposito`,`tipo`,`notas`,`experiencia_exitosa`,`evidencias`) VALUES ('".$_POST['nombre_tangible']."','".$_POST['parque']."','".date("Y-m-d H:i:s")."','".$_POST['fecha_ini_tangible']."','".$_POST['proposito_tangible']."','".$_POST['tipo_tangible']."','".$_POST['notas_tangible']."','".$_POST['experiencia_exi']."','".$archivos."')";

	                //echo $sSQL5.'<br>';

	                mysql_db_query("parquesa_ParquesAlegresWP",$sql05);

	                if($_POST['experiencia_exi']=="si"){

	                    if($_POST['incluir']==1){

	                        $fotos_exp=$archivos."|";

	                    }

	                    else{

	                        $fotos_exp="";

	                    }

	                    $nombre_archivo = $_FILES['file_experiencia']['name']; 

	                    $tipo_archivo = $_FILES['file_experiencia']['type']; 

	                    $tamano_archivo = $_FILES['file_experiencia']['size']; 

	                    //compruebo si las características del archivo son las que deseo 

	                    /*if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 100000))) { 

	                        echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .png o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 

	                    }else{*/ 

	        /*                $uploads_dir = getcwd().'/experiencias_exitosas';

	                        $ie=0;

	                        if(count($_FILES['file_experiencia']['name'])){

	                            foreach ($_FILES["file_experiencia"]["error"] as $key => $error) {

	                                if ($error == UPLOAD_ERR_OK) {

	                                    $tmp_name = $_FILES["file_experiencia"]["tmp_name"][$key];

	                                    // basename() puede evitar ataques de denegación de sistema de ficheros;

	                                    // podría ser apropiada más validación/saneamiento del nombre del fichero

	                                    $name = basename($_FILES["file_experiencia"]["name"][$key]);

	                                    $i=0;

	                                    if(file_exists($uploads_dir."/".$name)){

	                                        while(file_exists($uploads_dir."/".$name)){

	                                            $i++;

	                                            $ult=strrpos($name,".");

	                                            $nom=substr($name, 0 ,$ult);

	                                            $ext=substr($name, $ult);

	                                            $name=$nom.$i.$ext;

	                                        }

	                                    }

	                                    if(move_uploaded_file($tmp_name, "$uploads_dir/$name")){

	                                        echo "El archivo ha sido cargado correctamente.";

	                                        $fotos_exp.=$name.',';

	                                        $ie=1;

	                                    }

	                                    else{

	                                        echo "Ocurrió algún error al subir el archivo. No pudo guardarse.";

	                                    }

	                                }

	                            }

	                            if($ie==1){

	                                $fotos_exp = substr($fotos_exp, 0, -1);

	                            }

	                        }

	                        else{

	                            $i=0;

	                            if(file_exists($uploads_dir."/".$nombre_archivo)){

	                                while(file_exists($uploads_dir."/".$nombre_archivo)){

	                                    $i++;

	                                    $ult=strrpos($nombre_archivo,".");

	                                    $nom=substr($nombre_archivo, 0 ,$ult);

	                                    $ext=substr($nombre_archivo, $ult);

	                                    $nombre_archivo=$nom.$i.$ext;

	                                }

	                            }

	                            if (move_uploaded_file($_FILES['file_experiencia']['tmp_name'], "$uploads_dir/$nombre_archivo")){ 

	                                $fotos_exp.=$nombre_archivo;

	                                echo "El archivo ha sido cargado correctamente."; 

	                            }else{ 

	                                echo "Ocurrió algún error al subir el archivo. No pudo guardarse."; 

	                            }

	                        }

	                    $mypost = array('post_name' => $_POST['nombre_tangible'],

	                    'post_title' => $_POST['nombre_tangible'],

	                    'post_status' => 'draft',

	                    'post_author' => trim($user->ID),

	                    'post_type' => 'experiencia_exitosa',

	                    'post_date' => date("Y-m-d H:i:s")

	                    );

	                    $idpost = wp_insert_post( $mypost , true);

	                    //echo $idpost;

	                    if($idpost>0){

	                        add_post_meta($idpost, '_cmb_parque', $_POST['parque'], true );

	                        add_post_meta($idpost, '_cmb_event_date', $_POST['fecha_ini_tangible'], true );

	                        add_post_meta($idpost, '_cmb_video', $_POST['video'], true );

	                        add_post_meta($idpost, '_cmb_event_type', $_POST['tipo_tangible'], true );

	                        add_post_meta($idpost, '_cmb_event_proposito', $_POST['proposito_tangible'], true );

	                        add_post_meta($idpost, '_cmb_participants_comite', $_POST['involucrados_comite'], true );

	                        add_post_meta($idpost, '_cmb_participants_vecinos', $_POST['involucrados_vecinos'], true );

	                        add_post_meta($idpost, '_cmb_actividades', $_POST['actividades'], true );

	                        add_post_meta($idpost, '_cmb_asistentes', $_POST['asistentes'], true );

	                        add_post_meta($idpost, '_cmb_benefits', $_POST['beneficios'], true );

	                        add_post_meta($idpost, '_cmb_impacto', $_POST['impacto'], true );

	                        add_post_meta($idpost, '_cmb_cant_impacto', $_POST['cantidad_imp'], true );

	                        add_post_meta($idpost, '_cmb_desc_impacto', $_POST['descimpacto'], true );

	                        add_post_meta($idpost, '_cmb_desc_impacto2', $_POST['descimpacto2'], true );

	                        add_post_meta($idpost, '_cmb_success_key', $_POST['clave'], true );

	                        add_post_meta($idpost, '_cmb_mejorar', $_POST['mejorar'], true );

	                        add_post_meta($idpost, '_cmb_contacto_exp', $_POST['contacto_exp'], true );

	                        add_post_meta($idpost, '_cmb_costos', $_POST['costos'], true );

	                        add_post_meta($idpost, '_cmb_boletos', $_POST['boletos'], true );

	                        add_post_meta($idpost, '_cmb_patrocinios', $_POST['patrocinios'], true );

	                        add_post_meta($idpost, '_cmb_imagenes', $fotos_exp, true );

	                        echo 'Experiencia exitosa guardada exitosamente';

	                    }

	                    else{

	                        echo 'Error';

	                    }

	                }

	            }

	        }*/

        }

        else{

            echo 'No ha seleccionado ningun parque';

        }

    }

    if($_POST['cmd']==7){

        if($_POST['parque']>0){

            for($i=1;$i<=count($_POST['asist']);$i++){

                $sSQL5="INSERT INTO `comite_asistencia`(`cve_comite`,`fecha`,`fecha_visita`,`miembro`) VALUES ('".$row01['id']."','".date("Y-m-d")."','".$_POST['fecha_asistencia']."','".$_POST['asist'][$i]."')";

                //echo $sSQL5.'<br>';

                mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);

            }

        }

        else{

            echo 'No ha seleccionado ningun parque';

        }

    }

    if($_POST['cmd']==10){

        if($_POST['parque']>0){

            $sSQL5="INSERT INTO `infraestructura`(`cve_parque`, `fecha`, `tipo_infra`, `infraestructura` ,`condiciones_infra`, `cantidad`, `faltante`,`origen`, `comentarios`) VALUES ('".$_POST['parque']."','".$_POST['fecha_infra']."','".$_POST['categoria']."','".$_POST['subcategoria']."','".$_POST['condiciones_infra']."','".$_POST['cantidad']."','".$_POST['faltante']."','".$_POST['recurso']."','".$_POST['coment_infra']."')";

            mysql_db_query("parquesa_ParquesAlegresWP",$sSQL5);

        }

        else{

            echo 'No ha seleccionado ningun parque';

        }

    }

    if($_POST['cmd']==11){

        if($_POST['parque']>0){

            foreach($_POST as $k=>$v){

                if(substr($k, 0, 11)=="estatuscomp"){

                    if($v==1){

                        $sSQL2="UPDATE compromisos SET estatus='".$v."' WHERE cve='".substr($k,11)."'";

                    }

                    else{

                        $sSQL2="UPDATE compromisos SET estatus='".$v."',fecha_status='".$_POST['nueva_fecha'.substr($k, 11)]."' WHERE cve='".substr($k,11)."'";    

                    }

                    //echo $sSQL2;

                    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL2);

                }

            }

            echo 'Compromisos actualizados correctamente';

        }

        else{

            echo 'No ha seleccionado ningun parque';

        }

    }

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

            <title>Sistema PA</title>

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