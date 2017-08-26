<?php
/*
Template Name Posts: single-parque
*/
 get_header(); ?>
<style>
.tab>.labelfocus:after,.tabs,.chart-search,.mission,.provide,.providers{position:relative}
.tabs:before,.chart-search:before,.mission:before,.provide:before,.providers:before,.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{content:"";position:absolute;border-collapse:separate}
.tabs:before,.chart-search:before,.mission:before,.provide:before,.providers:before{border:11.5px solid transparent}
.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{border:10.5px solid transparent}
.tabs:before,.chart-search:before,.mission:before,.provide:before,.providers:before,.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{top:100%}
.tabs:before,.chart-search:before,.mission:before,.provide:before,.providers:before,.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{left:50%;margin-left:-11.5px}
.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{margin-left:-10.5px}
.push--bottom,.projects-tabs{margin-bottom:23px !important}
.tab>.labelfocus:after,.tabs,.chart-search,.mission,.provide,.providers{z-index:5}
.tabs:before,.chart-search:before,.mission:before,.provide:before,.providers:before{border-top-color:#e5e5e5 !important}
.tab>.labelfocus:after,.tabs:after,.chart-search:after,.mission:after,.provide:after,.providers:after{border-top-color:#f7f4ed !important}
.tabs,.chart-search{padding:20px 0}.tab>label{text-align:center}
.tab>.labelfocus{position:relative}
.tabs-content,.chart-container{background:#FFF;border-top:1px solid #e5e5e5;padding:30px;overflow:scroll;}
.tabs-content:before,.chart-container:before,.tabs-content:after,.chart-container:after{content:"";background:#FFF;top:0;bottom:0;width:9999px;border-top:1px solid #e5e5e5}
.tabs-content:before,.chart-container:before{right:100%}
.tabs-content:after,.chart-container:after{left:100%}
.detalle-tabs li,.detalle-tabs2 li{text-align:center}
.detalle-tabs li label,.detalle-tabs2 li label{font-size:18px;font-weight:bold}
.detalle-tabs li.active,.detalle-tabs2 li.active{background-color:#19b8ab}
.detalle-tabs li.active label,.detalle-tabs2 li.active label{color:#fff}
.clasetabla1 tr td{padding:3px 3px}
.clasetabla1 tr:not(:first-of-type):nth-child(even)>td:first-of-type{background-color:rgba(25,184,171,0.1)}
.clasetabla1 tr:not(:first-of-type) td:first-of-type{font-weight:bold}
.clasetabla1 tr:not(:first-of-type) td:not(:first-of-type){text-align:center;border:1px solid silver}
#table{text-align:center;margin-top:40px}#table>div{display:inline-block}
.tabs-content.graficas>div,.graficas.chart-container>div{text-align:center}
.tabs-content.graficas>div>div,.graficas.chart-container>div>div{display:inline-block}
#tabbed_box_1{margin-left:-40px;width:700px}
.tabbed_box h4{color:#fff;letter-spacing:-1px;margin-bottom:10px}
.tabbed_box h4 small{color:#e3e9ec;font-weight:normal;font-family:Verdana,Arial,Helvetica,sans-serif;text-transform:uppercase;position:relative;top:-4px;left:6px;letter-spacing:0}
.tabbed_area{padding:8px}
ul.mytabs{list-style-type:none;text-align:center;width:760px;margin-left:-60px;padding:0;margin-top:5px;margin-bottom:6px}
ul.mytabs li{list-style:none;display:inline;text-align:center;margin:0 10px 0 0}
ul.mytabs li a{background-color:#cede53;font-weight:bold;padding:8px 14px 8px 14px;text-decoration:none}
ul.mytabs li a.active{border:1px solid #464c54}
.ul{margin:20px;margin-left:-70px}
.ul li{list-style:none;border-bottom:1px solid #d6dde0;padding-top:15px;padding-bottom:15px}
.ul li:last-child{border-bottom:0}
.ul li a{text-decoration:none;color:#3e4346}
.ul li a small{color:#8b959c;text-transform:uppercase;font-family:Verdana,Arial,Helvetica,sans-serif;position:relative;left:4px;top:0}
.seven-cols>li{width:14.285%}.main-header{position:relative}
.seven-cols>li label{cursor:pointer;}
.google-visualization-table-table{border:none !important;font-family:"Lato",sans-serif !important}
.google-visualization-table-tr-head .gradient,.google-visualization-table-tr-head-nonstrict .gradient,.google-visualization-table-div-page .gradient{background:none !important}
.google-visualization-table-th{border:none !important;border-right:1px solid #c6c4c2 !important;padding:30px 10px 10px !important}
.google-visualization-table-tr-even,.google-visualization-table-tr-even td,.google-visualization-table-tr-even-nonstrict{background-color:#f7f7f7}
.google-visualization-table-tr-odd,.google-visualization-table-tr-odd td,.google-visualization-table-tr-odd-nonstrict{background:0}.google-visualization-table-td{border:none !important;border-right:1px solid #c6c4c2 !important}
.block-list,.matrix,.block-list>li,.matrix>li{border:0 solid #e0dedc}
.block-list,.matrix{list-style:none;margin-left:0;border-top-width:1px}
.block-list>li,.matrix>li{border-bottom-width:1px;padding:11.5px}
.block-list__link,.matrix__link{display:block;padding:11.5px;margin:-11.5px}
.matrix{border-left-width:1px}
.matrix>li{float:left;border-right-width:1px}
.matrix>.all-cols,.multi-list>.all-cols,.testimonial-list>.all-cols{width:100%}
.cf:after,.nav:after,.media:after,.consultant-step:after,.providers-container:after,.matrix:after,.multi-list:after,.testimonial-list:after,.section--listing__head .split:after,.main-header:after,.educative-platform:after,.slides:after,.researching-popup:after{content:"";display:table;clear:both}
input[type="radio"]{box-sizing:border-box;padding:0}
.text-input:active+.extra-help,.text-input:focus+.extra-help{visibility:visible}
.accessibility,.visuallyhidden,.tab-content input:not(:checked) ~ *,.chart input:not(:checked) ~ *,.providers-listing input:not(:checked) ~ div,.filter-popup:not(:target){border:0 !important;clip:rect(0 0 0 0) !important;height:1px !important;margin:-1px !important;overflow:hidden !important;padding:0 !important;position:absolute !important;width:1px !important}
.tab-content input,.chart input{display:none;visibility:hidden}
.tab-content input ~ *,.chart input ~ *{-webkit-transition:opacity .5s ease-in;-moz-transition:opacity .5s ease-in;-ms-transition:opacity .5s ease-in;-o-transition:opacity .5s ease-in;transition:opacity .5s ease-in}
.tab-content input:not(:checked) ~ *,.chart input:not(:checked) ~ *{opacity:0}
.tab-content input:checked ~ *,.chart input:checked ~ *{opacity:1}
#project-slider,#project-carousel{position:relative}
#project-carousel{padding:0 40px;margin:20px 0}
#project-carousel img{cursor:pointer;opacity:.5;-webkit-transition:opacity .3s ease;-moz-transition:opacity .3s ease;-ms-transition:opacity .3s ease;-o-transition:opacity .3s ease;transition:opacity .3s ease}
#project-carousel img:hover{opacity:1}
#project-carousel .flex-active-slide img{opacity:1;cursor:normal}
.slides{margin:0}
.flex-direction-nav{list-style:none}
.flex-direction-nav a{font-size:0;position:absolute;top:40%;background-image:url("img/video-gallery-icons.png");background-repeat:no-repeat;width:16px;height:21px}
.flex-direction-nav .flex-prev{background-position:0 0;left:0}
.flex-direction-nav .flex-next{right:0;background-position:0 -21px}
</style>
<div class="main" role="main">
    <div class="top improve"></div>
    <div id="content" class="container">

    <header class="article-header">
      <h1 class="title-section"><span><?php the_title(); ?></span></h1>
    </header> <!-- end article header -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../../jquery.bxslider/jquery.bxslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../jquery.bxslider/jquery.bxslider.css">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="/commenttooltip/js/excanvas/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/commenttooltip/js/spinners/spinners.min.js"></script> <!-- optional -->
    <script type="text/javascript" src="/commenttooltip/js/tipped/tipped.js"></script>

    <link rel="stylesheet" type="text/css" href="/commenttooltip/css/tipped/tipped.css" />
    <script type="text/javascript">
    //By creating tooltips after DOM load we make sure that referenced elements are available.
    jQuery(document).ready(function($) {
        /*
         * Demonstrations: Skins
         */
        Tipped.create("#demo_skins_dark");
        Tipped.create("#demo_skins_black", { skin: "black" });
        Tipped.create("#demo_skins_light", { skin: "light" });
  
        Tipped.create("#demo_skins_white", { skin: "white" });
        Tipped.create("#demo_skins_yellow", { skin: "yellow" });
        Tipped.create("#demo_skins_gray", { skin: "gray" });
  
        Tipped.create("#demo_skins_blue", "Skins are optimized to look good on any background", { skin: "blue" });
        Tipped.create("#demo_skins_red", "Great for error messages", { skin: "red" });
        Tipped.create("#demo_skins_green", "A nice green skin", { skin: "green" });
  
        Tipped.create("#demo_skins_tiny", "Small black tooltips are always useful", { skin: "tiny" });
        var slider = $('#bxslider').bxSlider({
	    adaptiveHeight: true,
	    auto: true,
            pause: 3000,
	    autoHover: true,
	    minSlides: 1,
	    maxSlides: 1,
	    slideMargin: 10,
	    slideWidth: 600,
	    pager: false
	});
        var slider2 = $('#bxslider3').bxSlider({
	    adaptiveHeight: true,
	    auto: true,
	    autoHover: true,
	    slideWidth: 300,
	    pager: false,
	});
        $(".bx-controls-direction").click(function () {        
            slider.stopAuto();
            slider.startAuto();
        });
    });
    </script>

    <link rel="stylesheet" type="text/css" href="commenttooltip/css/style.css" />

    <section id="voluntariado" class="volunteering">
      <div class="section section--box">
        <table border="0"  style="margin-left:-10px;">
        <?php
        $parque = get_the_ID();
        $mypodparque = pods( 'parque', $parque );
        $b = html_entity_decode(get_post_meta($parque, "_parque_maps", true));
        $opera=array(20=>"3 o más personas",14=>"Dos personas",7=>"Una persona");
        $formaliza=array(0=>"No",10=>"Interno",20=>"Sí");
        $organiza=array(0=>"No",10=>"Regular",20=>"Buena");
        $reunion=array(0=>"No",10=>"Regular",20=>"Frecuente");
        $proyecto=array(20=>"Sí",0=>"No");
        $ejecutivo=array(0=>"No",40=>"Sí");
        $disenio=array(0=>"No",40=>"Sí");
        $espacio=array(0=>"No",40=>"Sí");
        $estadoc=array(0=>"Pésimo",5=>"Muy Malo",10=>"Malo",15=>"Regular",20=>"Bueno",25=>"Muy bueno",30=>"Excelente");
        $instalaciones=array(0=>"0%",5=>"16%",10=>"32%",15=>"48%",20=>"64%",25=>"80%",30=>"100%");
        $ingreso=array(0=>"No",30=>"Sí");
        $ingresado=array(0=>"No",20=>"Regular",40=>"Sí");
        $mancomunado=array(0=>"No",30=>"Sí");
        $eventos=array(0=>"No",50=>"Sí");
        $eventosr=array(0=>"Ninguno",25=>"Menos de 4 al año",50=>"4 al año");
        $areasv=array(17=>"17",34=>"árboles y cesped",35=>"árboles y jardín",36=>"cesped y jardín",50=>"árboles, cesped y jardín");
        $estadover=array(0=>"Pésimo",8=>"Muy Malo",16=>"Malo",24=>"Regular",32=>"Bueno",40=>"Muy bueno",50=>"Excelente");
        $respeto=array(0=>"No",20=>"Regular",40=>"Sí");
        $orden=array(0=>"No",15=>"Compartido solo por escrito",30=>"Instalado en el parque");
        $limpieza=array(0=>"Pésimo",5=>"Muy Malo",10=>"Malo",15=>"Regular",21=>"Bueno",20=>"Bueno",25=>"Muy bueno",30=>"Excelente");
        //$b = get_post_meta($post->ID, "_parque_maps", true);

        //while ( $mypodparque->fetch() ) { 
            //echo '<p>' . $mypodparque->display( '_parque_ubic' ) . '</p>'; 
        //}
        if ( get_post_meta( $post->ID, '_parque_gallery', true )){
            echo '<h2 class="subtitle-project">Galería</h2><center><div id="bxslider" style="display:inline-block;width:100%;">';
            $images = get_post_meta( $post->ID, '_parque_gallery' );
            foreach ( $images as $image ) {
                echo pods_image( $image,array(500,500));
            }
            echo '</div></center>';
            echo '<br>';
        }
        echo'<table><tr><th>Nombre de parque:</th><th align="center">'.$post->post_title.'</th></tr>';
        if ( get_post_meta( $post->ID, '_parque_clave_catastral', true )){
            echo '<tr><th>Clave catastral:</th><th align="center">'.$mypodparque->display( "_parque_clave_catastral" ).'</th></tr>';
        }
        $sql12="SELECT k1.meta_value as vialidad_prin, k2.meta_value as vialidad1, k3.meta_value as vialidad2, k4.meta_value as vialidad_pos FROM `wp_posts` p
        LEFT JOIN wp_postmeta k1 ON p.ID=k1.post_id AND k1.meta_key='_parque_vialidad_prin' LEFT JOIN wp_postmeta k2 ON p.ID=k2.post_id AND k2.meta_key='_parque_vialidad1'
        LEFT JOIN wp_postmeta k3 ON p.ID=k3.post_id AND k3.meta_key='_parque_vialidad2' LEFT JOIN wp_postmeta k4 ON p.ID=k4.post_id AND k4.meta_key='_parque_vialidad_pos' WHERE p.post_status='publish' AND p.post_type='parque' AND p.ID='$parque'";
        $res12=mysql_query($sql12);
        while($row12=mysql_fetch_array($res12)){
            $principal=$row12['vialidad_prin'];
            $vialidad1=$row12['vialidad1'];
            $vialidad2=$row12['vialidad2'];
            $posterior=$row12['vialidad_pos'];
        }
        if($principal!="" || $vialidad1!="" || $vialidad2!="" || $posterior!=""){
             echo '<tr><th>Dirección</th><td>';
             if($principal!=""){
                echo $principal.'<br>';
             }
             if($vialidad1!="" && $vialidad2!=""){
                echo 'Entre '.$vialidad1.' y '.$vialidad2.'<br>';
             }
             else{
                if($vialidad1!=""){
                    echo 'Referencia '.$vialidad1.'<br>';
                }
                if($vialidad2!=""){
                    echo 'Referencia '.$vialidad2.'<br>';
                }
             }
             if($posterior!=""){
                echo 'Calle posterior '.$posterior;
             }
             echo '</td></tr>';
        }
        /*if($principal!=""){
            if($vialidad1!="" && $vialidad2!=""){
                if($posterior!=""){
                    echo '<tr><th>Dirección</th><td>'.$principal.'<br>Entre '.$vialidad1.' y '.$vialidad2.'<br>Calle posterior: '.$posterior.'</td></tr>';    
                }
                else{
                    echo '<tr><th>Dirección</th><td>'.$principal.'<br>Entre '.$vialidad1.' y '.$vialidad2.'.';
                }
            }
            else{
                if($posterior!=""){
                    echo '<tr><th>Dirección</th><td>'.$principal.'<br>Calle posterior: '.$posterior.'</td></tr>';    
                }
                else{
                    echo '<tr><th>Dirección</th><td>'.$principal.'</td></tr>';
                }
            }
        }*/
        $asentamiento=array("","Aeropuerto","Ampliación","Barrio","Cantón","Ciudad","Ciudad industrial","Colonia","Condominio","Conjunto habitacional",
            "Corredor industrial","Coto","Cuartel","Ejido","Exhacienda","Fracción","Fraccionamiento","Granja","Hacienda","Ingenio","Manzana","Paraje","Parque Industrial",
            "Privada","Prolongación","Pueblo","Puerto","Ranchería","Rancho","Región","Residencial","Rinconada","Sección","Sector","Supermanzana","Unidad",
            "Unidad Habitacional","Villa","Zona Federal","Zona Industrial","Zona Militar","Zona Naval");
        $sql222="SELECT * FROM `wp_postmeta` WHERE post_id=$parque AND meta_key='_parque_tipoasentamiento'";
        $res222=mysql_query($sql222);
        while($row222=mysql_fetch_array($res222)){
            $ase=$asentamiento[$row222['meta_value']];
        }
        $sql221="SELECT * FROM `wp_postmeta` WHERE post_id=$parque AND meta_key='_parque_regimen'";
        $res221=mysql_query($sql221);
        while($row221=mysql_fetch_array($res221)){
            if($row221['meta_value']==1){
                $regimen="Público";
            }
            if($row221['meta_value']==2){
                $regimen="Condominal";
            }
            if($row221['meta_value']==3){
                $regimen="Concesionado";
            }
        }
        $sql220="SELECT * FROM `wp_postmeta` WHERE post_id=$parque AND meta_key='_parque_tipo'";
        $res220=mysql_query($sql220);
        while($row220=mysql_fetch_array($res220)){
            $tipoparque=$row220['meta_value'];
        }
        $sql33="SELECT cm.nombre FROM `comite_parque` cp INNER JOIN comite_miembro cm ON cm.cve_comite=cp.id WHERE cp.cve_parque=$parque AND cm.contacto=1 order by cm.id desc limit 1";
        $res33=mysql_query($sql33);
        while($row33=mysql_fetch_array($res33)){
            $contacto=$row33['nombre'];
        }
        if($ase!=""){
            echo '<tr><th>Tipo Asentamiento</th><td>' . $ase . '</td></tr>';
        }
        if ( get_post_meta( $post->ID, '_parque_nomasentamiento', true )){
            echo '<tr><th>Nombre asentamiento</th><td>' . $mypodparque->display( "_parque_nomasentamiento" ) . '</td></tr>';
        }
        $superficie = str_replace(".", ",",$mypodparque->display( "_parque_sup" ));
        if($superficie!="" && $superficie!=0){
            echo '<tr><th>Superficie</th><td>' . $superficie . ' m&#178;</td></tr>';   
        }
        if ( get_post_meta( $post->ID, '_parque_maps', true )){
            echo '<tr><th>Mapa</th><td>' . $mypodparque->display( "_parque_maps" ) . '</td></tr>';
        }
	$zona=array(1 => 'Noreste (NE)', 2 => 'Noroeste (NO)', 3 => 'Sureste (SE)', 4 => 'Suroeste (SO)');
        //echo $sector[get_post_meta($post->ID, "_parque_sec", true)];
        if ( get_post_meta( $post->ID, '_parque_zona', true )){
            echo '<tr><th>Zona</th><td>' . $zona[$mypodparque->display( "_parque_zona" )] . '</td></tr>';
        }
	$tipo=array(1=>"Área verde",2=>"Centro barrio",3=>"De bolsillo",4=>"Lineal",5=>"Mixto",6=>"Parque urbano",7=>"Plazuela",8=>"Unidad deportiva");
        if($tipo[$tipoparque]!=""){
            echo'<tr><th>Tipo</th><td>' . $tipo[$tipoparque].'</td></tr>';   
        }
        //echo $tipo[get_post_meta($post->ID, "_parque_tipo", true)];
        //'.get_post_meta($post->ID, "_parque_tipo", true).'
        if($regimen!=""){
            echo '<tr><th>Régimen</th><td>' . $regimen . '</td></tr>';    
        }
	if($contacto!=""){
            echo '<tr><th>Contacto de comit&eacute;</th><td>' . $contacto . '</td></tr>';    
        }
        if ( get_post_meta( $post->ID, '_parque_ciudad', true )){
            echo '<tr><th>Ciudad</th><td>' . $mypodparque->display( "_parque_ciudad" ) . '</td></tr>';
        }
	$estado=array(1=> 'Aguascalientes',2=> 'Baja California',3=> 'Baja California Sur',4=> 'Campeche',5=> 'Coahuila de Zaragoza',6=> 'Colima',7=> 'Chiapas',8=> 'Chihuahua',9=> 'Distrito Federal',10=> 'Durango',11=> 'Guanajuato',12=> 'Guerrero',13=> 'Hidalgo',14=> 'Jalisco',15=> 'México',16=> 'Michoacán de Ocampo',17=> 'Morelos',18=> 'Nayarit',19=> 'Nuevo León',20=> 'Oaxaca',21=> 'Puebla',22=> 'Querétaro',23=> 'Quintana Roo', 24=> 'San Luis Potosí',25=> 'Sinaloa',26=> 'Sonora',27=> 'Tabasco',28=> 'Tamaulipas',29=> 'Tlaxcala',30=> 'Veracruz de Ignacio de la Llave',31=> 'Yucatán',32=> 'Zacatecas');
        if ( get_post_meta( $post->ID, '_parque_estado', true )){
            echo'<tr><th>Estado</th><td>' . $mypodparque->display( "_parque_estado" ).'</td></tr>';
        }
        $tipoeventos=array(1=>"Generar ingresos y tejido social",2=>"Crear y mantener áreas verdes", 3=>"Organización", 4=>"Gestión", 5=>"Orden");
        $subtipoeventos=array(1=>array(1=>"Torneos",2=>"Tianguis",3=>"Kermesse",4=>"Días Festivos",5=>"Cooperación vecinal",6=>"Rifa",7=>"Kermesse cultural",8=>"Función de cine",9=>"Carrera pedestre",10=>"Noche bohemia",11=>"Visita al MIA",12=>"Visita a Jardín Botánico",13=>"Activación Santa Ana",14=>"Activación Trizalet"),2=>array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda"),3=>array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua"),4=>array(1=>"Honorable Ayuntamiento",2=>"Empresa"),5=>array(1=>"Orden"));
        $sql51="SELECT * FROM `eventos_parques` WHERE cve_parque=$parque AND fecha>'".date('Y-m-d')."' AND (estatus='1' OR estatus='3')";
        $res51=mysql_query($sql51);
        if(mysql_num_rows($res51)>0){
            $infoeventos='<tr><th>Próximos eventos</th><td><table border=1 class="table table-striped"><tr><th>Evento</th><th>Tipo de Evento</th><th>Fecha</th><th>Contacto</th></tr>';
            while($row51=mysql_fetch_array($res51)){
                if($subtipoeventos[$row51['tipo']][$row51['nombre']]){
                    if($row51['fecha_cambio']!="0000-00-00"){
                        $fechaevento=$row51['fecha_cambio'];
                    }
                    else{
                        $fechaevento=$row51['fecha'];
                    }
                    $infoeventos.='<tr><td>'.$subtipoeventos[$row51['tipo']][$row51['nombre']].'</td><td>'.$tipoeventos[$row51['tipo']].'</td><td>'.$fechaevento.'</td><td>'.$row51['responsable'].'</td></tr>';
                    $sieventos=1;
                }
            }
            $infoeventos.='</table><br><span style="color:red">*</span>Las fechas o lugares publicados están sujetos a cambios sin previo aviso.</td></tr>';
        }
        if($sieventos==1){
            echo $infoeventos;
        }
	//'.get_post_meta($post->ID, "_parque_estado", true).'
	// echo $estado[get_post_meta($post->ID, "_parque_estado", true)];
        $sql221="SELECT pm.* FROM `wp_postmeta` pm INNER JOIN wp_posts p ON p.ID=pm.post_id WHERE pm.meta_value=$parque AND pm.meta_key='_cmb_parque' AND p.post_status='publish'";
        $res221=mysql_query($sql221);
        if(mysql_num_rows($res221)>0){
            echo '<tr><th>Experiencias Exitosas</th><td>';
            while($row221=mysql_fetch_array($res221)){
                if ( get_post_meta( $row221['post_id'], '_cmb_gallery', true ) && $first!=2){	
                    if($first==0){
                        echo '<center><div id="bxslider3" style="display:inline-block;width:100%;">';
                        $first=1;
                    }
                    echo '<li>
                        <a href="'.get_permalink($row221['post_id']).'">';
                        $images = get_post_meta( $row221['post_id'], '_cmb_gallery' );
                        $c=0;
                        foreach ( $images as $image ) {
                            if($c<1){
                                echo pods_image( $image,array(200,200));
                                echo get_the_title($row221['post_id']).'<br>&nbsp;';
                            }
                            $c++;
                        }
                        echo '</a>
                    </li>';
                }
                else{
                    if($first!=1){
                        $pje=95/mysql_num_rows($res221);
                        echo '<div style="display:inline-block;min-width:15%;width:'.$pje.'%;margin-right:5px;"><a href="'.get_permalink($row221['post_id']).'">';
                        echo get_the_title($row221['post_id']);
                        echo '</a></div>';
                        $first=2;
                    }
                }
            }
            echo '</center></td></tr>';
        }
        /*if ( get_post_meta( $post->ID, '_parque_expexitosa', true )){
            echo '<tr><th>Experiencias Exitosas</th><td>'.get_post_meta($post->ID, "_parque_expexitosa", true).'</td></tr>';
        }*/
        echo '</table>';
	//-----------------------Comienza Galerias
	/*
	if ( get_post_meta($parque, '_parque_gallery', true) ) : ?>
        <?php $attachments = get_post_meta($post->ID, "_parque_gallery", true); ?>
        <h2 class="subtitle-project">Galería</h2>
        <div class="project-gallery">
        <div id="project-slider" class="flexslider">
            <ul class="slides">
                <?php if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>

                    <li><img src="<?php echo $attachment; ?>"  style="height: 300px;" alt=""></li>

                <?php } } ?>
            </ul>
        </div>
            <!---<div id="project-carousel" class="flexslider">
            <ul class="slides">-->
                <?php //if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>
                    <?php //echo $image; ?>
                    <!--- <li><img src="<?php echo $attachment; ?>" style="height: 60px;"  alt=""></li>-->
                <?php } } */?>
            <!-- </ul>
            </div>
        </div>-->
        <?php
        //-------galerias de pod
        //if ( get_post_meta( $post->ID, '_parque_gallery' ) ) :
        //echo'<img src="';
        //echo $mypodparque->display( "_parque_gallery" );
        //echo'>';
        //$images = get_post_meta( $post->ID, '_parque_gallery' );
        //get_post_meta( $post->ID, '_parque_gallery' );
         /*echo'<h2 class="subtitle-project">Galería</h2>
            <div class="project-gallery">
                <div id="project-slider" class="flexslider">
                    <ul class="slides">';
                        foreach ( $images as $image ) {
                            echo'<li>';
                            echo pods_image( $image );
                            echo'</li>';
                        }
                    echo' </ul>
                </div>';*/
                /*<div id="project-carousel" class="flexslider">
                    <ul class="slides">';
                        foreach ( $images as $image ) {
                            echo'<li>';
                            echo pods_image( $image, 'thumbnail' );
                            echo'</li>';
                        }
                    echo' </ul>
                </div>*/
           //echo' </div>';
        //--------------
        ?>
        <?php //endif;
        if ( get_post_meta($parque, '_parque_plano', true) ) : ?>
            <?php $attachments1 = get_post_meta($post->ID, "_parque_plano", true); ?>
            <h2 class="subtitle-project">Galería plano</h2>
            <div class="project-gallery">
                <div id="project-slider" class="flexslider"> 
                    <?php if ( $attachments1 ) { foreach ( $attachments1 as $attachment1 ) { ?>
                        <a href="<?php echo $attachment1; ?>" target="_blank"><img src="<?php echo $attachment1; ?>"  style="height: 60px;" alt=""></a>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        <?php endif;
        $pun22=0;
        $pun222=0;
        $pun322=0;
        $pun422=0;
        $pun522=0;
        $pun622=0;
        $pun722=0;
        $averdes=0;
        $sql22="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
        $res22=mysql_query($sql22);
        while($row22=mysql_fetch_array($res22)){
            $pun22=$pun22+$row22['opera']+$row22['formaliza']+$row22['organiza']+$row22['reunion']+$row22['proyecto'];
            $pun222=$pun222+$row22['instalaciones']+$row22['estado']+$row22['disenio']+$row22['ejecutivo']+$row22['vespacio'];
            $pun322=$pun322+$row22['ingresop']+$row22['ingresadop']+$row22['mancomunado'];//+$row22['mancomunado']
            $pun422=$pun422+$row22['eventos']+$row22['eventosr'];
            
	    //if($row22['averdes']>=34){
		// $averdes=34;
            //}
	    if($row22['averdes']==17){
                $averdes=0;
		$averdes=$averdes+$row22['averdes'];
			//echo'entra';
	    }else{
		if(($row22['averdes']>30) && ($row22['averdes']<40)){
		// if($row22['averdes']<50){
                    $averdes=0;
                    $averdes=$averdes+34;
                }else{
		    $averdes=0;
		$averdes=$averdes+$row22['averdes'];
		}
	    }
	     
	   
            $pun522=$pun522+$averdes+$row22['estaver'];
	    //echo$pun522;
	    //echo'<br>';
            $pun622=$pun622+$row22['gente'];
            //+$row22['diario']
            $pun722=$pun722+$row22['limpieza']+$row22['orden']+$row22['respint'];
        }
        //---------
        $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
        $resa=mysql_query($sqla);
	$rowa=mysql_fetch_array($resa);
        $sqla1="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque ORDER BY cve DESC";
        $resa1=mysql_query($sqla1);
	$rowa1=mysql_fetch_array($resa1);
        //--------- sacar el promedio por total de visitas----------------//<----------------aqui me quede
        if($rowa['totalvisitas']<1){
            $promea=0;
        }else{
	    $sqla11="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque ORDER BY cve DESC";
            $resa11=mysql_query($sqla11);
	    $total_visitas=$rowa['totalvisitas'];
            $prima=0;
            while($rowa11=mysql_fetch_array($resa11)){
                $puna=0;
		$punb=0;
                $punc=0;
                $pund=0;
                $pune=0;
                $punf=0;
                $pung=0;
                $proma=0;
                $promeaa=0;
                //-----------------------------------
                //----------------------------------
                
                $puna=$puna+$rowa11['opera']+$rowa11['formaliza']+$rowa11['organiza']+$rowa11['reunion']+$rowa11['proyecto'];
		$punb=$punb+$rowa11['instalaciones']+$rowa11['estado']+$rowa11['disenio']+$rowa11['ejecutivo']+$rowa11['vespacio'];
		$punc=$punc+$rowa11['ingresop']+$rowa11['ingresadop']+$rowa11['mancomunado'];//+$rowa11['mancomunado']
		$pund=$pund+$rowa11['eventos']+$rowa11['eventosr'];
                if($rowa11['averdes']==17){
                    $averdes=0;
                    $averdes=$averdes+$rowa11['averdes'];
                    //echo'entra';
                }else{
                    if(($rowa11['averdes']>30) && ($rowa11['averdes']<40)){
                        $averdes=0;
                        $averdes=$averdes+34;
                    }else{
			$averdes=0;
                        $averdes=$averdes+$rowa11['averdes'];
                    }
                }
		$pune=$pune+$averdes+$rowa11['estaver'];
		$punf=$punf+$rowa11['gente'];
		$pung=$pung+$rowa11['limpieza']+$rowa11['orden']+$rowa11['respint'];
                $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                $prima=$prima+$proma;
                $prima2=round($prima)/$rowa['totalvisitas'];
                $prom22d=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/($total_visitas*7);
                $promeaa=$promeaaa/$rowa['totalvisitas'];
                $promea=round($prima2);
                //echo'<br>';
                //echo$prima;
	    }
        } ?>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Tipped.create('.create-tooltip', {
                    skin: 'light',
                    maxWidth: 200
                });
            });
        </script>

        <?php echo'<b>Historial del Parque</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promedio del parque: <b>'.$promea.'</b>';
        $sqla11g="SELECT * FROM  `wp_comites_parques` WHERE cve_parque=$parque ORDER BY cve DESC limit 0,1";
        $resa11g=mysql_query($sqla11g);
	$total_visitas=$rowa['totalvisitas'];
	//while($rowa11=mysql_fetch_array($resa11)){
        $rowa11g=mysql_fetch_array($resa11g);	
	$punag=0;
        $punbg=0;
        $puncg=0;
        $pundg=0;
        $puneg=0;
        $punfg=0;
        $pungg=0;
        $promeaag=0;
        $punag=$punag+$rowa11g['opera']+$rowa11g['formaliza']+$rowa11g['organiza']+$rowa11g['reunion']+$rowa11g['proyecto'];
        $punbg=$punbg+$rowa11g['instalaciones']+$rowa11g['estado']+$rowa11g['disenio']+$rowa11g['ejecutivo']+$rowa11g['vespacio'];
        $puncg=$puncg+$rowa11g['ingresop']+$rowa11g['ingresadop']+$rowa11g['mancomunado'];//+$rowa11g['mancomunado']
        $pundg=$pundg+$rowa11g['eventos']+$rowa11g['eventosr'];
        if($rowa11g['averdes']==17){
	    $averdes=0;
	    $averdes=$averdes+$rowa11g['averdes'];
	    //echo'entra';
	}else{
	    if(($rowa11g['averdes']>30) && ($rowa11g['averdes']<40)){
		$averdes=0;
		$averdes=$averdes+34;
	    }else{
		$averdes=0;
		$averdes=$averdes+$rowa11g['averdes'];
	    }
        }
	$puneg=$puneg+$averdes+$rowa11g['estaver'];
	$punfg=$punfg+$rowa11g['gente'];
        //+$rowa11['diario']
	$pungg=$pungg+$rowa11g['limpieza']+$rowa11g['orden']+$rowa11g['respint'];
        $promag=($punag+$punbg+$puncg+$pundg+$puneg+$punfg+$pungg)/7;
        //$promeaaa=$proma+$promeaaa;
	//$promeaa=$promeaaa/$rowa['totalvisitas'];
	//$promea=round($promeaa);
	if($rowa['totalvisitas']<1){
             $promeag=0;
        }else{
              $promeag=round($promag);
	}
        echo'<script type="text/javascript" src="//www.google.com/jsapi"></script>
	<script type="text/javascript">
            google.load("visualization", "1", {packages:["gauge"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Label", "Value"],
                    [" ", '.$promeag.']
                ]);
                var options = {
                    width: 300, height: 150,
                    redFrom: 0, redTo: 59,
                    yellowFrom:60, yellowTo: 80,
                    greenFrom:81, greenTo: 100,
                    minorTicks: 5
                };
                var chartgauge = new google.visualization.Gauge(document.getElementById("chart_div_gauge"));
                chartgauge.draw(data, options);
            }
        </script>
        <table>
        <tr>
            <td><b> &Uacute;ltima Calificaci&oacute;n</b></td>
            <td><div id="chart_div_gauge" style="width: 180px; height: 150px;"></div></td>
        </tr>
        </table>';
        //tipo_visita=2
         //consulta de visitas de seguimiento---->
         echo'<div class="chart-search">
    <!-- Búsqueda -->
    <form name="forma" action="" method="post">
    <ul class="form-fields">
      <li>
        <label>Selecciona el tipo de visita </label>
        <select name="fil">';
	echo '<option value="">---Todos los tipos de visita---';
	//echo '<option value="1">Visita de reforzamiento</option>';
	echo '<option value="2">Visita de seguimiento</option>';
        //echo '<option value="3">Visita de evento</option>';
        //echo '<option value="4">Visita de prospecto</option>';
	echo '</select>
      </li>
      <li><input class="btn" type="submit" value="Mostrar"></li>
    </ul>
     </form>
</div>';
$filtro='1';
//echo$_POST['fil'];
if ($_POST['fil']!='') {
  $filtro.=" and b.tipo_visita='".$_POST['fil']."' ";
//echo$filtro;
$sql2="SELECT a . * , b.tipo_visita FROM  `wp_comites_parques` AS a, wp_visitascom_parques AS b where $filtro and a.cve_parque =$parque and b.cve_parque = a.cve_parque AND a.cve=b.cve_visita ORDER BY  `a`.`cve` DESC";
}else{
$sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve desc";
  }
                      //echo$sql2;
 ?>
	  	  
	 
        <span class="icon-box icon-box--info">&nbsp;</span>
      </div>
    </section>
    <div class="tabs">
      <ul class="matrix seven-cols detalle-tabs">
        <li><label for="seccion1">Comité</label></li>
        <li><label for="seccion2">Instalaciones</label></li>
        <li><label for="seccion3">Ingresos</label></li>
        <li><label for="seccion4">Eventos</label></li>
        <li><label for="seccion5">Áreas verdes</label></li>
        <li><label for="seccion6">Afluencia</label></li>
        <li><label for="seccion7">Orden</label></li>
        <li><label for="seccion8">Puntaje</label></li>
      </ul>
    </div>

    <?php
    $tipos_visita = array("---Selecciona Tipo---","Visita de reforzamiento","Visita de seguimiento","Visita de evento","Visita de prospecto");
//tipo_visita=2
    // EMPIEZA TABLA DE COMITE
    echo'<div class="tabs-content">';
    echo'<div class="tab-content"><input id="seccion1" type="radio" name="tab-group-2" checked />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion1">Comit&eacute;</a></th></tr><tr><td>VISITA</td>';
    $res2=mysql_query($sql2);
    $c=mysql_num_rows($res2);
    while($row2=mysql_fetch_array($res2)){
      $visita=$row2['cve'];
      $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
      $res3=mysql_query($sql3);
      $row3=mysql_fetch_array($res3);
        if($row3['tipo_visita']){
          echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
        }else{
          echo'<td>'.$c.'</td>';
        }
        $c--;
    }
    echo'</tr>';
//tipo=2
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';

    echo' <tr><td>OPERA CON 3 PERSONAS O MAS</td>';
    $res2=mysql_query($sql2);
    $uno=0;
    $dos=0;
    while($row2=mysql_fetch_array($res2)){
      $visita=$row2['cve'];
      $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
      $res3=mysql_query($sql3);
      $row3=mysql_fetch_array($res3);
      echo' <td>';
      //-------------------------------------------------------------------------------para los colores
      if($uno>$row2['opera']){
          $color='style="color:#FF0000;"';
      }
      elseif(($dos!=0) && ($uno<$row2['opera'])){
          $color='style="color:#00611C;"';
      }
      $uno=$row2['opera'];
      $dos++;
      //---------------------------------------
      if($row3['opera']){
         echo' <div class="create-tooltip" title="'.$row3['opera'].'" ><font '.$color.'>'.$opera[$row2['opera']].'</font></div>';
      }else{
         echo$opera[$row2['opera']];
      }
      echo'</td>';
      //-------------------------aqui
      }
      echo'</tr>';
      echo' <tr><td>ESTA FORMALIZADO COMO A.C. / OFICIO AYUNTAMIENTO</td>';
      $res2=mysql_query($sql2);
      while($row2=mysql_fetch_array($res2)){
      $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['formaliza']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['formaliza'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['formaliza'];
            $dos++;
            //---------------------------------------
            if($row3['formaliza']){
               echo' <div class="create-tooltip" title="'.$row3['formaliza'].'" ><font '.$color.'>'.$formaliza[$row2['formaliza']].'</font></div>';
            }else{
               echo$formaliza[$row2['formaliza']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
        echo'<tr><td>CUENTA CON BUENA ORGANIZACION (CON ORDEN - FORMALIDAD)</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['organiza']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['organiza'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['organiza'];
            $dos++;
            //---------------------------------------
            if($row3['organiza']){
               echo' <div class="create-tooltip" title="'.$row3['organiza'].'" ><font '.$color.'>'.$organiza[$row2['organiza']].'</font></div>';
            }else{
               echo$organiza[$row2['organiza']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
        echo'<tr><td>EXISTEN REUNIONES CON REGULARIDAD</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['reunion']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['reunion'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['reunion'];
            $dos++;
            //---------------------------------------
            if($row3['reunion']){
               echo' <div class="create-tooltip" title="'.$row3['reunion'].'" ><font '.$color.'>'.$reunion[$row2['reunion']].'</font></div>';
            }else{
               echo$reunion[$row2['reunion']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
        echo'<tr><td>TIENEN PROYECTOS EN PROCESO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['proyecto']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['proyecto'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['proyecto'];
            $dos++;
            //---------------------------------------
            if($row3['proyecto']){
               echo' <div class="create-tooltip" title="'.$row3['proyecto'].'" ><font '.$color.'>'.$proyecto[$row2['proyecto']].'</font></div>';
            }else{
               echo$proyecto[$row2['proyecto']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun=0;
                $pun=$pun+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
      echo'<td>'.$pun.'</td>';
       }
        echo'</tr></table>';
    echo'</div>';

    // TERMINA TABLA DE COMITE
    // EMPIEZA TABLA INSTALACIONES

    echo'<div class="tab-content"><input id="seccion2" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion2">Instalaciones </a></th></tr> ';
        echo'<td>VISITA</td>';
          $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
            echo'<tr><td>CUENTA CON PROYECTO DE DISE&Ntilde;O</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['disenio']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['disenio'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['disenio'];
            $dos++;
            //---------------------------------------
            if($row3['disenio']){
               echo' <div class="create-tooltip" title="'.$row3['disenio'].'" ><font '.$color.'>'.$disenio[$row2['disenio']].'</font></div>';
            }else{
               echo$disenio[$row2['disenio']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
             echo'<tr><td>CUENTA CON PROYECTO EJECUTIVO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['ejecutivo']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['ejecutivo'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['ejecutivo'];
            $dos++;
            //---------------------------------------
            if($row3['ejecutivo']){
               echo' <div class="create-tooltip" title="'.$row3['ejecutivo'].'" ><font '.$color.'>'.$ejecutivo[$row2['ejecutivo']].'</font></div>';
            }else{
               echo$ejecutivo[$row2['ejecutivo']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
	//     -----------------------------------------------------
	
	 echo'<tr><td>CUENTA CON VISI&Oacute;N DEL ESPACIO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['vespacio']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['vespacio'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['vespacio'];
            $dos++;
            //---------------------------------------
            if($row3['vespacio']){
               echo' <div class="create-tooltip" title="'.$row3['vespacio'].'" ><font '.$color.'>'.$espacio[$row2['vespacio']].'</font></div>';
            }else{
               echo$espacio[$row2['vespacio']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
	
	//     -----------------------------------------------------
             echo'<tr><td>ESTAN EN BUEN ESTADO LO QUE EXISTE</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['estado']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['estado'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['estado'];
            $dos++;
            //---------------------------------------
            if($row3['estado']){
               echo' <div class="create-tooltip" title="'.$row3['estado'].'" ><font '.$color.'>'.$estadoc[$row2['estado']].'</font></div>';
            }else{
               echo$estadoc[$row2['estado']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
        echo'<tr><td>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, ANDADOR, BANQUETAS,ETC</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['instalaciones']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['instalaciones'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['instalaciones'];
            $dos++;
            //---------------------------------------
            if($row3['instalaciones']){
               echo' <div class="create-tooltip" title="'.$row3['instalaciones'].'" ><font '.$color.'>'.$instalaciones[$row2['instalaciones']].'</font></div>';
            }else{
               echo$instalaciones[$row2['instalaciones']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';

        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun2=0;
                $pun2=$pun2+$row2['instalaciones']+$row2['estado']+$row2['disenio']+$row2['ejecutivo']+$row2['vespacio'];
      echo' <td>'.$pun2.'</td>';
       }
        echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE INSTALACIONES
    // EMPIEZA TABLA INGRESOS

    echo'<div class="tab-content"><input id="seccion3" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion3">Ingresos</a> </th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>TIENEN FUENTES DE INGRESOS PERMANENTES</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['ingresop']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['ingresop'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['ingresop'];
            $dos++;
            //---------------------------------------
            if($row3['ingresop']){
               echo' <div class="create-tooltip" title="'.$row3['ingresop'].'" ><font '.$color.'>'.$ingreso[$row2['ingresop']].'</font></div>';
            }else{
               echo$ingreso[$row2['ingresop']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
        echo'<td>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['ingresadop']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['ingresadop'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['ingresadop'];
            $dos++;
            //---------------------------------------
            if($row3['ingresadop']){
               echo' <div class="create-tooltip" title="'.$row3['ingresadop'].'" ><font '.$color.'>'.$ingresado[$row2['ingresadop']].'</font></div>';
            }else{
               echo$ingresado[$row2['ingresadop']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
             echo'<tr><td>TIENEN CUENTA MANCOMUNADA</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['mancomunado']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['mancomunado'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['mancomunado'];
            $dos++;
            //---------------------------------------
            if($row3['mancomunado']){
               echo' <div class="create-tooltip" title="'.$row3['mancomunado'].'" ><font '.$color.'>'.$mancomunado[$row2['mancomunado']].'</font></div>';
            }else{
               echo$mancomunado[$row2['mancomunado']];
            }
            echo'</td>';
            //-------------------------aqui
       }
       echo'</tr>';
       
             echo'<tr>';
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun3=0;
                $pun3=$pun3+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];//+$row2['mancomunado']
      echo'<td>'.$pun3.'</td>';
       }echo'</tr>';
      echo' </table>';


    echo'</div>';

    // TERMINA TABLA DE INGRESOS
    // EMPIEZA TABLA EVENTOS

    echo'<div class="tab-content"><input id="seccion4" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion4">Eventos </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>HAY EVENTOS CON REGULARIDAD</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['eventosr']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['eventosr'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['eventosr'];
            $dos++;
            //---------------------------------------
            if($row3['eventosr']){
               echo' <div class="create-tooltip" title="'.$row3['eventosr'].'" ><font '.$color.'>'.$eventosr[$row2['eventosr']].'</font></div>';
            }else{
               echo$eventosr[$row2['eventosr']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
        echo'<td> CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['eventos']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['eventos'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['eventos'];
            $dos++;
            //---------------------------------------
            if($row3['eventos']){
               echo' <div class="create-tooltip" title="'.$row3['eventos'].'" ><font '.$color.'>'.$eventos[$row2['eventos']].'</font></div>';
            }else{
               echo$eventos[$row2['eventos']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun4=0;
                $pun4=$pun4+$row2['eventos']+$row2['eventosr'];
      echo'<td>'.$pun4.'</td>';
       }echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE EVENTOS
    // EMPIEZA TABLA AREAS VERDES

    echo'<div class="tab-content"><input id="seccion5" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion5">&Aacute;reas verdes</a> </th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
        echo'<tr><td>CUENTA CON ARBOLES, CESPED Y JARDIN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($row2['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$row2['averdes'];
			//echo'entra';
	     }else{
		  if(($row2['averdes']>30) && ($row2['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$row2['averdes'];
		  }
	     }
            if($uno>$averdes){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$averdes)){
                $color='style="color:#00611C;"';
            }
            $uno=$averdes;
            $dos++;
            //---------------------------------------
            if($row3['averdes']){
               echo' <div class="create-tooltip" title="'.$row3['averdes'].'" ><font '.$color.'>'.$areasv[$averdes].'</font></div>';
            }else{
               echo$areasv[$averdes];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
        echo'<td>SE ENCUENTRA EN BUEN ESTADO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['estaver']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['estaver'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['estaver'];
            $dos++;
            //---------------------------------------
            if($row3['estaver']){
               echo' <div class="create-tooltip" title="'.$row3['estaver'].'" ><font '.$color.'>'.$estadover[$row2['estaver']].'</font></div>';
            }else{
               echo$estadover[$row2['estaver']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
      //  echo'<th>TIENEN RIEGO CONSTANTE</th>';
      //  $res2=mysql_query($sql2);
      // while($row2=mysql_fetch_array($res2)){
      //echo'<td>'.$row2['riego'].'</td>';
      // }echo'</tr>';
        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun5=0;
                //$pun5=$pun5+$row2['averdes']+$row2['estaver']+$row2['riego'];
                if($row2['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$row2['averdes'];
			//echo'entra';
	     }else{
		  if(($row2['averdes']>30) && ($row2['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$row2['averdes'];
		  }
	     }
                $pun5=$pun5+$averdes+$row2['estaver'];
      echo'<td>'.$pun5.'</td>';
       }echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE AREAS VERDES
    // EMPIEZA TABLA AFLUENCIA

    echo'<div class="tab-content"><input id="seccion6" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion6">Afluencia </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>PORCENTAJE DE AFLUENCIA SOBRE LO EXISTENTE</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['gente']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['gente'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['gente'];
            $dos++;
            //---------------------------------------
            if($row3['gente']){
               echo' <div class="create-tooltip" title="'.$row3['gente'].'" ><font '.$color.'>'.$row2['gente'].'%</font></div>';
            }else{
               echo$row2['gente'].'%';
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      /*echo' <td>PORCENTAJE DE AFLUENCIA CONTRA LO POSIBLE </td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['diario']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['diario'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['diario'];
            $dos++;
            //---------------------------------------
            if($row3['diario']){
               echo' <div class="create-tooltip" title="'.$row3['diario'].'" ><font '.$color.'>'.$row2['diario'].'</font></div>';
            }else{
               echo$row2['diario'];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';*/
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun6=0;
                $pun6=$pun6+$row2['gente'];
                //+$row2['diario']
      echo'<td>'.$pun6.'</td>';
       }echo'</tr>';
        echo'</table>';


    echo'</div>';

    // TERMINA TABLA DE AFLUENCIA
    // EMPIEZA TABLA DE ORDEN

    echo'<div class="tab-content"><input id="seccion7" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion7">Orden </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo'<tr><td>LAS INSTALACIONES SE RESPETAN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['respint']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['respint'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['respint'];
            $dos++;
            //---------------------------------------
            if($row3['respint']){
               echo' <div class="create-tooltip" title="'.$row3['respint'].'" ><font '.$color.'>'.$respeto[$row2['respint']].'</font></div>';
            }else{
               echo$respeto[$row2['respint']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
             echo'<tr><td>SE CUENTA CON REGLAMENTO DE ORDEN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['orden']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['orden'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['orden'];
            $dos++;
            //---------------------------------------
            if($row3['orden']){
               echo' <div class="create-tooltip" title="'.$row3['orden'].'" ><font '.$color.'>'.$orden[$row2['orden']].'</font></div>';
            }else{
               echo$orden[$row2['orden']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>SE MANTIENE LIMPIO</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if($uno>$row2['limpieza']){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$row2['limpieza'])){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['limpieza'];
            $dos++;
            //---------------------------------------
            if($row3['limpieza']){
               echo' <div class="create-tooltip" title="'.$row3['limpieza'].'" ><font '.$color.'>'.$limpieza[$row2['limpieza']].'</font></div>';
            }else{
               echo$limpieza[$row2['limpieza']];
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';


        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun7=0;
                $pun7=$pun7+$row2['limpieza']+$row2['orden']+$row2['respint'];
      echo'<td>'.$pun7.'</td>';
       }echo'</tr>';
        echo'</tr>
        ';
        echo'</table>';
    echo'</div>';
    // TERMINA TABLA DE ORDEN
    // EMPIEZA TABLA DE PUNTAJE

    echo'<div class="tab-content"><input id="seccion8" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion8">Puntaje </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
            $c--;
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo'<tr><td>COMITÉ</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalcomite=$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
            if($uno>$totalcomite){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalcomite)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalcomite;
            $dos++;
            //---------------------------------------
            echo $totalcomite;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';
             echo'<tr><td>INSTALACIONES</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalinst=$row2['disenio']+$row2['ejecutivo']+$row2['vespacio']+$row2['instalaciones']+$row2['estado'];
            if($uno>$totalinst){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalinst)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalinst;
            $dos++;
            //---------------------------------------
            echo $totalinst;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>INGRESOS</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalingresos=$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];
            if($uno>$totalingresos){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalingresos)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalingresos;
            $dos++;
            //---------------------------------------
            echo $totalingresos;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>EVENTOS</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totaleven=$row2['eventos']+$row2['eventosr'];
            if($uno>$totaleven){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totaleven)){
                $color='style="color:#00611C;"';
            }
            $uno=$totaleven;
            $dos++;
            //---------------------------------------
            echo $totaleven;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>ÁREAS VERDES</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalaverdes=$row2['averdes']+$row2['estaver'];
            if($uno>$totalaverdes){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalaverdes)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalaverdes;
            $dos++;
            //---------------------------------------
            echo $totalaverdes;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>AFLUENCIA</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalgente=$row2['gente'];
            if($uno>$totalgente){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalgente)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalgente;
            $dos++;
            //---------------------------------------
            echo $totalgente;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
      echo' <td>ORDEN</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            $totalorden=$row2['limpieza']+$row2['orden']+$row2['respint'];
            if($uno>$totalorden){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$totalorden)){
                $color='style="color:#00611C;"';
            }
            $uno=$totalorden;
            $dos++;
            //---------------------------------------
            echo $totalorden;
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr>';


        echo'<tr><td>PROMEDIO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun7=0;
                $pun7=$pun7+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto']+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado']+$row2['disenio']+$row2['ejecutivo']+$row2['vespacio']+$row2['instalaciones']+$row2['estado']+$row2['eventos']+$row2['eventosr']+$row2['averdes']+$row2['estaver']+$row2['gente']+$row2['limpieza']+$row2['orden']+$row2['respint'];
      echo'<td>'.round($pun7/7).'</td>';
       }echo'</tr>';
        echo'</tr>
        ';
        echo'</table>';
    echo'</div>';
    // TERMINA TABLA DE ORDEN
    echo'</div>';
   ?>

    <!-- comienza divs de graficas -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
      $(document).ready(function(){
        $("a").click(function () {
          var divname= this.name;
          $("#"+divname).show("slow").siblings().hide("slow");
        });
      });
    </script>
    <div class="tabs">
      <p align="center"><b>Grafíca de parámetros</b>
      <ul class="matrix seven-cols detalle-tabs2">
        <li><label for="grafica1">Comité</label></li>
        <li><label for="grafica2">Instalaciones</label></li>
        <li><label for="grafica3">Ingresos</label></li>
        <li><label for="grafica4">Eventos</label></li>
        <li><label for="grafica5">Áreas verdes</label></li>
        <li><label for="grafica6">Afluencia</label></li>
        <li><label for="grafica7">Orden</label></li>
	<li><label for="grafica8">General</label></li>
      </ul>
    </div>

    <div>

    <div class="tabs-content graficas">
    <div class="tab-content"><input id="grafica1" type="radio" name="tab-group-3" checked />
    <div id="div1"><a name="graficacomite">&nbsp;</a>
    <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Comit\u00E9 "],
    <?php
    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
    $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$puna.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div1"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div1" style="width: 500px; height: 200px;"></div></div></div>';

    //----------------------------------------------------------------------------termina


    echo'<div class="tab-content"><input id="grafica2" type="radio" name="tab-group-3" /><div id="div2"><a name="graficainstalaciones">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita",  "Instalaciones "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
    $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$punb.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div2"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div2" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica3" type="radio" name="tab-group-3" /><div id="div3"><a name="graficaingresos">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Ingresos"],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
     $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$punc.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div3"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div3" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica4" type="radio" name="tab-group-3" /><div id="div4"><a name="graficaeventos">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita" ,"Eventos "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
     $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.','.$pund.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div4"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div4" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica5" type="radio" name="tab-group-3" /><div id="div5"><a name="graficaareasverdes">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "\u00C1reas verdes "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
     $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$pune.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div5"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div5" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica6" type="radio" name="tab-group-3" /><div id="div6"><a name="grafiafluencia">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Afluencia "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
     $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$punf.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div6"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div6" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica7" type="radio" name="tab-group-3" /><div id="div7"><a name="graficaorden">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Orden "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
    $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
    $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
    $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
    $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
    if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
    $pune=$pune+$averdes+$rowa1['estaver'];
    $punf=$punf+$rowa1['gente'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
    $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
    $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$pung.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div7"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div7" style="width: 400px; height: 200px;"></div>';
         //---------------------------------------------------------comienza grafica de promedio por visita
      echo'</div></div><div class="tab-content"><input id="grafica8" type="radio" name="tab-group-3" /><div id="div8"><a name="graficageneral">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Calificaci\u00F3n por visita "],';

    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
    while($row=mysql_fetch_array($res)){
        $d=$c+1;
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
            //---------
            if($rowa['totalvisitas']<1){
               $promea=0;
            }else{
                $puna=0;
    $punb=0;
    $punc=0;
    $pund=0;
    $pune=0;
    $punf=0;
    $pung=0;
    $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
    $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
    $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
    $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
    if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa1['averdes']>30) && ($rowa1['averdes']<40)){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
    $pune=$pune+$averdes+$rowa1['estaver'];
    $punf=$punf+$rowa1['gente'];
    $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
    $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
    $promea=round($proma);
            }
    //--------------termina calculo de promedio
    echo'['.$d.', '.$promea.']';
    if($d<$total_reg){
      echo',';
    }else{
      echo']);';
    }

        $c++;


    }
    $tot_reg=mysql_num_rows($res);
    $total=$tot_reg/3;

     echo'var options = {
              title: "Calificaci\u00F3n Parque",
              hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
            };
      options["allowHtml"] = "true";

            var chart = new google.visualization.ColumnChart(document.getElementById("chart_div8"));
            chart.draw(data, options);
          }
        </script>';
     echo'<div id="chart_div8" style="width: 400px; height: 200px;"></div>';
     ?>
    <!-- termina grafica de promedio por visita -->
<?php
    //----------------------------------------------------------------------------termina
    echo'</div></div></div></div>';
    //---------------------------------------------------------termina divs de graficas
    //-------------------------------------COMENTARIOS GENERALES

    ?>
    

    
    
    <?php
    //clasetabla2
    echo'<table class="class="clasetabla1 table"" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2">Comentarios generales </th></tr>
        <th>VISITA</th>';
        echo'<th>Comentarios</th></tr>';
        $res2=mysql_query($sql2);
       $c=mysql_num_rows($res2);
       while($row2=mysql_fetch_array($res2)){
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      echo' <td>';
        if($row3['genvisita']){
            echo$row3['genvisita'];
        }else{
            echo'Sin comentarios';
        }
        echo'</td></tr>';
        $c--;
       }


        echo'</table>';
        if($prome==0){
        echo'<a href="/agendar-visita/"><h3>Click aqu&iacute; para agendar visita</h3></a>';
        }
	  ?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	    	<?php get_template_part( 'partials/loop', 'parque' ); ?>

	    <?php endwhile; else : ?>

	   		<?php get_template_part( 'partials/content', 'missing' ); ?>

	    <?php endif; ?>

	</div>
	<!-- end #inner-content -->

</div> <!-- end #content -->
	<script type="text/javascript">
    $('.detalle-tabs > li:first').addClass('active');
    $('.detalle-tabs > li').click(function(){
        $('.detalle-tabs > li').removeClass('active');
        $(this).addClass("active");
    });
    $('.detalle-tabs2 > li:first').addClass('active');
    $('.detalle-tabs2 > li').click(function(){
        $('.detalle-tabs2 > li').removeClass('active');
        $(this).addClass("active");
    });
  </script>
    <?php comments_template(); ?> 

<?php get_footer(); ?>

<?php //} ?>