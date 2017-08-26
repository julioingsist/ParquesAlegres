<?php
/*
Template Name Posts: single-experiencia_exitosa
*/
?>

<?php get_header(); ?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--<script src="../../jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.center.js"></script>-->
<script src="../../jquery.bxslider/jquery.bxslider.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../jquery.bxslider/jquery.bxslider.css">
<script src="../../jBox-0.3.2/Source/jBox.min.js"></script>
<link href="../../jBox-0.3.2/Source/jBox.css" rel="stylesheet">
<script type="text/javascript">
    function muestra(c){
	if(c==1){
	    $('#actividades').slideDown({
		duration:400,
		start:$('#datos').hide()
	    });
	}
	else{
	    $('#datos').slideDown({
		duration:400,
		start:$('#actividades').hide()
	    });
	}
    }
    function mmuestra(c){
	for (i=1;i<10;i++){
	    $('#texto'+i).hide();
	}
	$('#texto'+c).slideDown();
    }
    function signext(){
	var vis="";
	for (i=1;i<10;i++){
	    if ($('#texto'+i).is(':visible')){
		vis=i;
	    }
	    $('#texto'+i).hide();
	}
	var shi=1;
	$(".cfondo4").each( function(index, element){  
	    idf=$( this ).attr('id');
	    if(idf.substr(1,1)>vis){
		$('#texto'+idf.substr(1,1)).slideDown();
		shi=1;
		return false;
	    }
	    else{
		shi=0;
	    }
	});
	if(shi==0){
	    var idc=$('.cfondo4:first').attr('id');
	    $("#texto"+idc.substr(1, 1)).slideDown();
	}
    }
    function abrir(cod){
	var options = {
	    trigger:'click',
	    attach: $('#'+cod),
	    content: $('#txt'+cod),
	    adjustPosition: true,
	    adjustTracker: true,
	    pointer: 'left',
	    width:'400px',
	    height:'300px',
	    closeButton:'box',
	    closeOnClick:'body',
	    autoClose:0
	};
	var modalform = new jBox('Modal',options);
    }
    $(document).ready(function() {
	$(".boton_envio").click(function() {
	    var nombre = $(".nombre").val();
		email = $(".email").val();
		validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		telefono = $(".telefono").val();
		mensaje = $(".mensaje").val();
		asesor = $("#asesor").val();
		contacto = $("#contacto").val();
		nexpe = $("#nexpe").val();
		cmd = 1;
		link = $("#link").val();
     
	    if (nombre == "") {
		$(".nombre").focus();
		$('.msg').text('Ingresa tu nombre por favor!').addClass('msg_error'); 
		return false;
	    }else if(email == "" || !validacion_email.test(email)){
		$(".email").focus();
		$('.msg').text('Ingresa tu e-mail por favor!').addClass('msg_error'); 
		return false;
	    }else if(telefono == ""){
		$(".telefono").focus();
		$('.msg').text('Ingresa tu teléfono por favor!').addClass('msg_error'); 
		return false;
	    }else if(mensaje == ""){
		$(".mensaje").focus();
		$('.msg').text('Ingresa tu mensaje por favor!').addClass('msg_error'); 
		return false;
	    }else{
		var datos = "cmd="+ cmd + "&nombre="+ nombre + "&email=" + email + "&telefono=" + telefono + "&asesor=" + asesor + "&contacto=" + contacto + "&nexpe=" + nexpe + "&link=" + link + "&mensaje=" + mensaje;
		$.ajax({
		    type: "POST",
		    url: "http://parquesalegres.org/proceso.php",
		    data: datos,
		    success: function(result) {
			$('.msg').removeClass('msg_error');
			$('.msg').text('Mensaje enviado!'+result).addClass('msg_ok');  
		    },
		    error: function() {
			$('.msg').removeClass('msg_ok');
			$('.msg').text('Hubo un error!').addClass('msg_error');                 
		    }
		});
		return false;
	    }
	});
	var options = {
	    trigger:'click',
	    attach: $('#contact'),
	    content: $('#formu'),
	    adjustPosition: true,
	    adjustTracker: true,
	    pointer: 'left',
	    width:'600px',
	    height:'400px',
	    closeButton:'box',
	    closeOnClick:'body',
	    autoClose:0
	};
	var modalform = new jBox('Modal',options);
	var idc=$('.cfondo4:first').attr('id');
	$("#texto"+idc.substr(1, 1)).show();
	for(d=0;d<10;d++){
	    $("#m"+d).hover(function() {
		$(this).stop(true, true).animate({
		    top: '-=30px',
		},1000);
	    },function(){
		$(this).stop(true, true).animate({top:'+=30px'},500);
	    });
	}
	$('#bxslider').bxSlider({
	    adaptiveHeight: true,
	    auto: ($('#bxslider').children().length < 3) ? false : true,
	    autoHover: true,
	    minSlides: 2,
	    maxSlides: 2,
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
	var slider = $('#bxslider2').bxSlider({
	    auto: ($('#bxslider2').children().length < 2) ? false : true,
	    autoHover: true,
	    slideWidth: 600,
	    pager: false
	});
	$(".bx-controls-direction").click(function () {        
            slider.stopAuto();
            slider.startAuto();
        });
	//var element = document.getElementById('beneficios');
	//if (element.offsetHeight < element.scrollHeight){
	//    $("#beneficios").css('overflow','scroll');
	//    var stexto=$('#stexto').text();
	//    $('#stexto').text('Leer');
	//    $("#beneficios").mouseenter(function() {
	//	$(this).animate({opacity:0},500,function(){
	//	    $(this).html(stexto).animate({opacity:1},500)
	//	})
	//    })
	//    .mouseleave(function() {
	//	$(this).animate({opacity:0},500,function(){
	//	    $(this).html('<img src="../../arbolito.png">Beneficios:<br><span id="stexto">Leer</span>').animate({opacity:1},500)
	//	})
	//    })
	//}
	//var element = document.getElementById('clave');
	//if (element.offsetHeight < element.scrollHeight){
	//    var ctexto=$('#ctexto').text();
	//    $('#ctexto').text('Leer');
	//    $("#clave").css('overflow','scroll');
	//    $("#clave").mouseenter(function() {
	//	$(this).animate({opacity:0},500,function(){
	//	    $(this).html(ctexto).animate({opacity:1},500)
	//	})
	//    })
	//    .mouseleave(function() {
	//	$(this).animate({opacity:0},500,function(){
	//	    $(this).html('<img src="../../llave.jpg">Beneficios:<br><span id="ctexto">Leer</span>').animate({opacity:1},500)
	//	})
	//    })
	//}
    });
</script>
<!--
<style>
.estilo {
    border: 3px solid #10B9B9;
    margin-top: 5px;
    margin-bottom: 5px;
    margin-right: 10px;
    margin-left: 10px;
    float: left;
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
}
-->
<style>
h4{
    margin-top:5px;
    margin-bottom:5px;
}
.bx-wrapper{
    margin: 0 0 60px 0 !important;
    vertical-align:top;
    display:inline-block;
    width:50%;
}
.num .bx-wrapper{
    width:100%;
    margin: 0 0 0 0 !important;
}
.num .bx-wrapper .bx-viewport{
    width:100%;
    margin: 0 0 0 0 !important;
    height:180px !important;
}
.expe::-webkit-scrollbar{
  width: 15px;
  background: #dbe8ec;
}
::-webkit-scrollbar-button:start:decrement,
::-webkit-scrollbar-button:end:increment {
  height: 16px;
  width: 15px;
  display: block;
  background: #FFC481;
  background-repeat: no-repeat;
}
::-webkit-scrollbar-button:vertical:decrement {
  background-image: url(http://parquesalegres.org/images/arrow-up.png);
  background-position: center;
}
::-webkit-scrollbar-button:vertical:increment {
  background-image: url(http://parquesalegres.org/images/arrow-down.png);
  background-position: center;
}
::-webkit-scrollbar-button:vertical:decrement:active {
  background-image: url(http://parquesalegres.org/images/arrow-up.png);
}

::-webkit-scrollbar-button:vertical:increment:active {
  background-image: url(http://parquesalegres.org/images/arrow-down.png);
}

.expe::-webkit-scrollbar-track{
  background:#957D61;
  border:thin solid #1a1f25;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  -webkit-border-radius: 10px;
  border-radius: 10px;
}
.expe::-webkit-scrollbar-thumb{
  background: -webkit-linear-gradient(top, orange, #FFC481);
  -webkit-box-shadow:   inset 0 1px 0 rgba(255,255,225,.5),
                inset 1px 0 0 rgba(255,255,255,.4),
                inset 0 1px 2px rgba(255,255,255,.3);
 
  border:thin solid #3A3426;
  border-radius: 10px;
  -webkit-border-radius: 10px;
}
.expe::-webkit-scrollbar-thumb:hover{
    background: -webkit-linear-gradient(top, #FFC481, orange);
}
/* Pseudo-clase */
.expe::-webkit-scrollbar-thumb:window-inactive{
  background: rgba(77,161,112,.6);
}
#descact{
    text-align:justify;
    overflow-y:auto;
    height:320px;
}
#datos{
    text-align:center;
}
#actividades{
    min-height:100px;
    max-height:320px;
}
.expe{
    background-color:white;
    position:relative;
    border:5px dashed orange;
    width:100%;
    height:320px;
    font-size:18px;
    font-weight:bold;
    text-align:center;
}
.expe div{
    margin-top:10px;
    margin-bottom:10px;
    position:absolute;
    width:98%;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    -webkit-transform: translate(-50%, -50%);
}
.tex{
    display:none;
}
.cols{
    cursor:pointer;
    margin:0 auto;
    margin-right:3%;
    display:inline-block;
    width:100px;
    height:200px;
    font-size:17px;
    font-weight:bold;
    text-align:center;
    vertical-align: top;
    position:relative;
}
.cols img{
    width:100%;
    height:100px;
}
.cols p{
    font-size:15px;
    color:black;
}
.cfondo{
    width:200px;
    height:100px;
    text-align:center;
    line-height:100px;
    color:white;
    font-weight:bold;
}
.cfondo3{
    display:inline-block;
    margin:0 10px 0 10px;
    vertical-align:top;
    width:160px;
    height:70px;
    text-align:center;
    line-height:80px;
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
}
.cfondo2{
    cursor:pointer;
    display:inline-block;
    margin:10px 0px 0 0px;
    vertical-align:top;
    width:130px;
    height:60px;
    text-align:center;
    line-height:70px;
    color:white;
    font-size:18px;
    font-weight:bold;
}
.cfondo4{
    position:relative;
    display:inline-block;
    margin:0 10px -30px 10px;
    vertical-align:top;
    width:80px;
    height:80px;
    text-align:center;
    line-height:80px;
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
}
#footerdivs {
    position: fixed;
    bottom: 0;

}
.chic{
    display:inline-block;
}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <h1 class="title-section">
      <span>Experiencia exitosa: <?php the_title(); ?></span>
  </h1>
  <!--<h4 class="text--center"></h4>-->
	<div class="project">
	<?php
	//-------galerias de pod
	/*if ( get_post_meta( $post->ID, '_cmb_gallery', true )){
	    if(get_post_meta($post->ID, "_cmb_video", true)){
		echo '<div id="bxslider" style="display:inline-block;width:50%;">';
		$images = get_post_meta( $post->ID, '_cmb_gallery' );
		foreach ( $images as $image ) {
		    echo pods_image( $image,array(500,500));
		    echo '<iframe width="100%" height="315" src="'.get_post_meta($post->ID, "_cmb_video", true).'" frameborder="0" allowfullscreen></iframe>';
		}
		echo '</div>';
	    }
	    else{
		echo '<div id="bxslider2" style="display:inline-block;width:100%;">';
		$images = get_post_meta( $post->ID, '_cmb_gallery' );
		foreach ( $images as $image ) {
		    echo pods_image( $image,array(500,500));
		}
		echo '</div>';
	    }
	    echo '<br>';
	}*/
	if ( get_post_meta( $post->ID, '_cmb_gallery', true )){
	    if(get_post_meta($post->ID, "_cmb_video", true)){
			if(substr(get_post_meta($post->ID, "_cmb_video", true),0,4)=="http"){
			    echo '<div id="bxslider2">';
			    $images = get_post_meta( $post->ID, '_cmb_gallery' );
			    foreach ( $images as $image ) {
					echo pods_image( $image,array(500,500));
			    }
			    echo '</div>';
			    echo '<div style="display:inline-block;width:50%;">
			    <iframe width="100%" height="315" src="'.get_post_meta($post->ID, "_cmb_video", true).'" frameborder="0" allowfullscreen></iframe>
			    </div>';    
			}
			else{
			    echo '<center><div id="bxslider2" style="display:inline-block;width:100%;">';
			    $images = get_post_meta( $post->ID, '_cmb_gallery' );
			    foreach ( $images as $image ) {
					echo pods_image( $image,array(500,500));
			    }
			    echo '</div></center>';
			}
	    }
	    else{
			echo '<center><div id="bxslider2" style="display:inline-block;width:100%;">';
			$images = get_post_meta( $post->ID, '_cmb_gallery' );
			foreach ( $images as $image ) {
			    echo pods_image( $image,array(500,500));
			}
			echo '</div></center>';
	    }
	    echo '<br>';
	}
	else{
		$sqli="select meta_value from wp_postmeta WHERE post_id='".$post->ID."' AND meta_key='_cmb_imagenes'";
	    $resi=mysql_query($sqli);
	    if(mysql_num_rows($resi)>0){
			$rowi=mysql_fetch_array($resi);
			if($rowi['meta_value']!=""){
				$uploads_dir = getcwd().'/experiencias_exitosas';
				echo '<center><div id="bxslider2" style="display:inline-block;width:100%;">';
				$sip=strpos($rowi['meta_value'], "|");
		    	if($sip!==false){
		    		$imgstang=explode("|",$rowi['meta_value']);
		    		$imgst=explode(",",$imgstang[0]);
		    		foreach ($imgst as $k => $v) {
		    			if($v!=""){
		    				echo '<img src="http://parquesalegres.org/tablet/tangibles/'.$v.'">';
		    			}
		    		}
		    		$imgse=explode(",",$imgstang[1]);
		    		foreach ($imgse as $key => $value) {
		    			if($value!=""){
		    				echo '<img src="http://parquesalegres.org/tablet/experiencias_exitosas/'.$value.'">';
		    			}
		    		}	
		    	}
		    	else{
		    		$imgse=explode(",",$rowi['meta_value']);
		    		foreach ($imgse as $key => $value) {
		    			if($value!=""){
		    				echo '<img src="http://parquesalegres.org/tablet/experiencias_exitosas/'.$value.'">';
		    			}
		    		}
		    	}
			    echo '</div></center><br>';
			}
	    }
	}
	 /*if ( get_post_meta( $post->ID, '_cmb_gallery', true ) ) : 
	    if ( get_post_meta( $post->ID, '_cmb_gallery' ) ) :
		$images = get_post_meta( $post->ID, '_cmb_gallery' );
		echo '<div class="cycle-slideshow"
		data-cycle-fx=scrollHorz
		data-cycle-center-horz=true
		data-cycle-timeout=0
		data-cycle-carousel-fluid=true
	        data-cycle-pager="#adv-custom-pager"
	        data-cycle-pager-template="&nbsp;<a href=\'#\'><img src=\'{{src}}\' style=\'margin-left:3px;\' width=50 height=50></a>">';
		foreach ( $images as $image ) {
		    echo pods_image( $image,array(500,500));
		}
		echo '</div>
		<!-- empty element for pager links -->
		<br><div id=adv-custom-pager class="center external"></div>';
	//--------------
	?>
	    <?php endif; ?>
	</div>
	<?php endif; */?>
    <!-- -------------------------- -->
   <?php
   $meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
		"11"=>"Noviembre","12"=>"Diciembre");
   $proposito=array(1=>"Gestión con Empresa",2=>"Gestión con H. Ayuntamiento", 3=>"Infraestructura y mobiliario", 4=>"Ingresos", 5=>"Tejido social", 6=>"Organización",50=>"Áreas verdes",51=>"Infraestructura y mobiliario",52=>"Ingresos",53=>"Tejido social",54=>"Organización");
   $subtipo=array(1=>array(1=>"Alumbrado",2=>"Arborización",3=>"Diseño de sistema de riego",4=>"Donación de PET",5=>"Murales",6=>"Pintura",7=>"Proyecto arquitectónico",8=>"Proyecto ejecutivo",9=>"Proyecto EVA",10=>"Voluntariado"),2=>array(1=>"Alumbrado",2=>"Arborización",3=>"Denuncia ciudadana formal",4=>"Jornada de limpieza",5=>"Pintura",6=>"Proyecto arquitectónico",7=>"Toma de agua",8=>"Visita a cabildo abierto"),3=>array(1=>"Arborización",2=>"Mesa de ping pong",3=>"Fertilización",4=>"Fumigación",5=>"Instalación de infraestructura",6=>"Limpieza del parque",7=>"Poda",8=>"Reglamento de orden",9=>"Riego"),4=>array(1=>"Activación por empresas y/o instituciones",2=>"Actividad para generar ingresos",3=>"Carrera pedestre",4=>"Cooperación vecinal",5=>"Días festivos",6=>"Función de cine",7=>"Kermesse",8=>"Kermesse cultural",9=>"Noche bohemia",10=>"Programa de reciclaje Ecoce o programa externo",11=>"Rifa",12=>"Tianguis",13=>"Torneos"),5=>array(1=>"Actividades deportivas",2=>"Asistencia a juego de Dorados",3=>"Campamentos",4=>"Carrera pedestre",5=>"Cooperación vecinal",6=>"Cursos y talleres",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Muestra gastronómica",12=>"Noche bohemia",13=>"Pláticas",14=>"Rifa",15=>"Tianguis",16=>"Torneos",17=>"Visita Jardín Botánico de Culiacán",18=>"Visita MIA"),6=>array(1=>"Asistencia a cursos P.A (será un tangible por parque)",2=>"Calendario de actividades",3=>"Club guardianes del parque",4=>"Comité de ninos",5=>"Contratación del jardinero",6=>"Correo electrónico formal",7=>"Creación de comité",8=>"Creación de logo del parque",9=>"Cuenta de Facebook",10=>"Cuenta de Whatsapp",11=>"Cuenta mancomunada",12=>"Difusión de medios",13=>"Elaborar expedientes de evidencia",14=>"Formalización de comité ante H. Ayuntamiento",15=>"Hojas membretadas",16=>"Plan de mantenimiento del parque",17=>"Recibos de dinero institucional",18=>"Reestructuración de comité",19=>"Rendición de cuentas general",20=>"Sello del parque",21=>"Uniforme",22=>"Visión del espacio"),50=>array(1=>"Proyecto arquitectónico",2=>"Plantas de ornato",3=>"Arborización",4=>"Poda",5=>"Cursos, plática y talleres",6=>"Jornada de limpieza",7=>"Fumigación",8=>"Fertilización",9=>"Proyecto EVA",10=>"Instalación de Jardín",11=>"Huerto",12=>"Voluntariado"),51=>array(1=>"Proyecto arquitectónico",2=>"Jornada de limpieza",3=>"Mantenimiento de infraestructura",4=>"Pintura",5=>"Toma de agua",6=>"Alumbrado",7=>"Reglamento de orden",8=>"Mesa de ping pong",9=>"Instalación de infraestructura",10=>"Murales",11=>"Proyecto ejecutivo",12=>"Proyecto EVA",13=>"Sistema de riego",14=>"Sistema de riego por goteo",15=>"Nivelación del terreno",16=>"Donación de PET",17=>"Voluntariado"),52=>array(1=>"Programa de reciclaje Ecoce o programa externo",2=>"Actividad para generar ingresos",3=>"Cursos, plática y talleres",4=>"Activación por empresas y/o instituciones",5=>"Carrera pedestre",6=>"Cooperación vecinal",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Noche bohemia",12=>"Rifa",13=>"Tianguis",14=>"Torneos",15=>"Productos elaborados por el comité"),53=>array(1=>"Campamentos",2=>"Cursos, plática y talleres",3=>"Muestra gastronómica",4=>"Visita MIA",5=>"Visita Jardín Botánico de Culiacán",6=>"Asistencia a juego de Dorados",7=>"Carrera pedestre",8=>"Días festivos",9=>"Función de cine",10=>"Kermesse",11=>"Kermesse cultural",12=>"Noche bohemia",13=>"Rifa",14=>"Tianguis",15=>"Torneos"),54=>array(1=>"Club guardianes del parque",2=>"Denuncia ciudadana formal",3=>"Creación de comité",4=>"Visita a cabildo abierto",5=>"Formalización de comité ante H. Ayuntamiento",6=>"Reestructuración de comité",7=>"Cuenta de Facebook",8=>"Calendario de actividades",9=>"Plan de mantenimiento del parque",10=>"Diseño participativo",11=>"Contratación del jardinero",12=>"Cuenta de Whatsapp",13=>"Creación de logo del parque",14=>"Uniforme",15=>"Rendición de cuentas general",16=>"Sello del parque",17=>"Correo electrónico formal",18=>"Recibos de dinero institucional",19=>"Cuenta mancomunada",20=>"Elaborar expedientes de evidencia",21=>"Comité de niños",22=>"Asistencia a cursos P.A (será un tangible por parque)",23=>"Hojas membretadas",24=>"Difusión de medios ",25=>"Elaboración de reglamento",26=>"Entrega de reconocimiento del parque"));
   //$proposito=array(4=>"Generar ingresos y tejido social",5=>"Crear y mantener áreas verdes",6=>"Organización",7=>"Gestión",8=>"Orden");
   /*if(get_post_meta($post->ID, "_cmb_event_proposito", true)==4){
        $tevento=array(1=>"Torneos",2=>"Tianguis",3=>"Días Festivos",4=>"Cooperación vecinal",5=>"Rifa",6=>"Kermesse cultural",7=>"Función de cine",
			   8=>"Carrera pedestre",9=>"Noche bohemia",10=>"Kermesse");
    }
    else if(get_post_meta($post->ID, "_cmb_event_proposito", true)==5){
        $tevento=array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda");
    }
    else if(get_post_meta($post->ID, "_cmb_event_proposito", true)==6){
        $tevento=array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",
		       6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua");
    }
    else if(get_post_meta($post->ID, "_cmb_event_proposito", true)==7){
        $tevento=array(1=>"Honorable Ayuntamiento",2=>"Empresa");
    }
    else if(get_post_meta($post->ID, "_cmb_event_proposito", true)==8){
        $tevento=array(1=>"Orden");
    }*/
   $impacto=array(1=>"Servicios públicos",2=>"Mobiliarios de parques",3=>"Canchas deportivas",4=>"Espacios de convivencia social",5=>"Elementos urbanos");
   if(get_post_meta($post->ID, "_cmb_impacto", true)==1){
        $descimpacto=array(1=>"Agua",2=>"Electricidad");
    }
    else if(get_post_meta($post->ID, "_cmb_impacto", true)==2){
        $descimpacto=array(1=>"Bancas",2=>"Jardineras",3=>"Juegos infantiles");
    }
    else if(get_post_meta($post->ID, "_cmb_impacto", true)==3){
        $descimpacto=array(1=>"Futbol",2=>"Béisbol",3=>"Volibol",4=>"Otro");
    }
    else if(get_post_meta($post->ID, "_cmb_impacto", true)==4){
        $descimpacto=array(1=>"Palapa",2=>"Área de usos múltiples",3=>"Asadores",4=>"Piñateros");
    }
    else if(get_post_meta($post->ID, "_cmb_impacto", true)==5){
        $descimpacto=array(1=>"Estacionamiento",2=>"Rampas",3=>"Topes en calles aledañas",4=>"Pavimentación de calles aledañas",5=>"Nivelación de terreno");
    }
    /*if(get_post_meta($post->ID, "_cmb_video", true)){
        echo '<iframe width="560" height="315" src="'.get_post_meta($post->ID, "_cmb_video", true).'" frameborder="0" allowfullscreen></iframe>';
    }*/
    $fechaev=explode("/",get_post_meta($post->ID, "_cmb_event_date", true));
    echo '<div class="cfondo3" onclick="muestra(1);" style="background:url(http://parquesalegres.org/images/desc.png) no-repeat;background-position:center;"><span>Descripción</span></div>
    <div class="cfondo2" onclick="muestra(2);" style="background:url(http://parquesalegres.org/images/datos.png) no-repeat;background-position:center;"><span>Datos</span></div>
    <div class="expe" id="descact"><div id="actividades">'.get_post_meta($post->ID, "_cmb_actividades", true).'</div>
    <div id="datos" style="display:none;"><b>El evento se realizó el día </b>'.$fechaev[0].' de '.$meses[$fechaev[1]].' del '.$fechaev[2].'<br>';
    $id=get_post_meta($post->ID, "_cmb_parque", true);
    $propos=get_post_meta($post->ID, "_cmb_event_proposito", true);
    echo '<b>En el parque: </b>'.$id['post_title'].'<br>
    <b>Con la intención de </b>'.$proposito[$propos].'<br>
    <b>Tipo de evento: </b>';
    $eventype=get_post_meta($post->ID, "_cmb_event_type", true);
    echo $subtipo[$propos][$eventype];
    echo '</div></div>
    <br><br>';
    if(get_post_meta($post->ID, "_cmb_costos", true) || get_post_meta($post->ID, "_cmb_boletos", true) || get_post_meta($post->ID, "_cmb_patrocinios", true)){
	echo '<div class="cfondo4" id="m1" onclick="mmuestra(1);" style="background:url(http://parquesalegres.org/dinero.png) no-repeat;background-position:center top;"></div>';
    }
    if(get_post_meta($post->ID, "_cmb_participants_comite", true) || get_post_meta($post->ID, "_cmb_participants_vecinos", true)){
	echo '<div class="cfondo4" id="m2" onclick="mmuestra(2);" style="background:url(http://parquesalegres.org/personas.jpg) no-repeat;background-position:center top;"></div>';
    }
    if(get_post_meta($post->ID, "_cmb_benefits", true)){
	echo '<div class="cfondo4" id="m3" onclick="mmuestra(3);" style="background:url(http://parquesalegres.org/beneficios.jpg) no-repeat;background-position:center top;"></div>';
    }
    if(get_post_meta($post->ID, "_cmb_asistentes", true)){
	echo '<div class="cfondo4" id="m4" onclick="mmuestra(4);" style="background:url(http://parquesalegres.org/asistentes.jpg) no-repeat;background-position:center top;"></div>';
    }
    if(get_post_meta($post->ID, "_cmb_impacto", true) || get_post_meta($post->ID, "_cmb_desc_impacto", true)){
	echo '<div class="cfondo4" id="m6" onclick="mmuestra(6);" style="background:url(http://parquesalegres.org/descripcion.jpg) no-repeat;background-position:center top;"></div>';
    }
    if(get_post_meta($post->ID, "_cmb_success_key", true)){
	echo '<div class="cfondo4" id="m7" onclick="mmuestra(7);" style="background:url(http://parquesalegres.org/exito.jpg) no-repeat;background-position:center top;"></div>';
    }
    echo '<div class="expe" style="border:5px dashed green;">
    <div class="tex" id="texto1">
	Inversión<br><br>
	Costo del evento: '.get_post_meta($post->ID, "_cmb_costos", true).'<br>
	Ingresos: '.get_post_meta($post->ID, "_cmb_boletos", true).'<br>
	Patrocinios: '.get_post_meta($post->ID, "_cmb_patrocinios", true).'<br></div>
    <div class="tex" id="texto2">
	Organizadores<br><br>
	Comités: '.get_post_meta($post->ID, "_cmb_participants_comite", true).'<br>
	Vecinos: '.get_post_meta($post->ID, "_cmb_participants_vecinos", true).'
    </div>
    <div class="tex" id="texto3">
	Beneficios para la comunidad<br><br>
	'.get_post_meta($post->ID, "_cmb_benefits", true).'
    </div>
    <div class="tex" id="texto4">
	Cuantas personas disfrutaron del evento<br><br>
	'.get_post_meta($post->ID, "_cmb_asistentes", true).'
    </div>
    <div class="tex" id="texto6">
	Qué area del parque se mejoró<br><br>
	'.$impacto[get_post_meta($post->ID, "_cmb_impacto", true)].'<br><br>';
	if(get_post_meta($post->ID, "_cmb_desc_impacto2", true)){
	    echo 'Descripción de las mejoras del parque<br><br>
	    '.get_post_meta($post->ID, "_cmb_desc_impacto2", true);
	}
	echo '
    </div>
    <div class="tex" id="texto7">
	Clave del éxito<br><br>
	'.get_post_meta($post->ID, "_cmb_success_key", true).'
    </div>
	<div style="width:130px;height:75px;top:290px;left:85%;transform(0%,0%);cursor:pointer;" onclick="signext();">Siguiente <img src="http://parquesalegres.org/next.png"></div>
    </div>
    <br><br>';
    if(get_post_meta($post->ID, "_cmb_mejorar", true)){
	echo '<p style="font-size:18px;font-weight:bold;">Si deseas replicar esta experiencia, te sugerimos...</p>
	<div class="expe" style="display:inline-block;width:70%;" style="border:5px dashed red;">';
	    echo '<div>'.get_post_meta($post->ID, "_cmb_mejorar", true).'</div>
	</div>';
    }
    $sql="select p.id,u.display_name,u.user_email from wp_posts p INNER JOIN wp_users u ON p.post_author=u.id WHERE p.id='".get_post_meta($post->ID, "_cmb_parque", true)['ID']."'";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
	$row=mysql_fetch_array($res);
    }
    echo '<div style="text-align:center;vertical-align:top;width:30%;display:inline-block;">
    <div id="contact" style="cursor:pointer;">
    <img src="http://parquesalegres.org/contact.png" align="left"><h3>¿Te gustaría saber más?<br>Contáctanos</h3></div>';
    $posttags = get_the_tags($post->ID);
    $count=0;
    $tagrel="";
    if ($posttags) {
      foreach($posttags as $tag) {
	$count++;
	if (1 == $count) {
	  $tagrel=$tag->slug;
	}
      }
    }
    $idexp=$post->ID;
    if($tagrel!=""){
	$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => $tagrel );
	$loop = new WP_Query( $args );
	if(have_posts()){
	    $first=0;
	    while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<?php if($post->ID!=$idexp){
		    if ( get_post_meta( $post->ID, '_cmb_gallery', true )){	
			if($first==0){
			    echo '<div class="num" style="text-align:center;vertical-align:top;width:97%;display:inline-block;"><h4>Otros casos de éxito</h4>
			    <center><div id="bxslider3" style="display:inline-block;width:100%;">';
			    $first=1;
			}
			echo '<li>
			    <a href="'.get_permalink().'">';
			    $images = get_post_meta( $post->ID, '_cmb_gallery' );
			    $c=0;
			    foreach ( $images as $image ) {
				if($c<1){
				    echo pods_image( $image,array(200,200));
				    echo the_title();
				}
				$c++;
			    }
			    echo '</a>
			</li>';
		    }
		}
	    wp_reset_query(); ?>
	    <?php endwhile;
	    echo '</div></center>';
	}
    }
    echo '</div>';
    /*
    if(have_posts()){
        echo '<ul class="testimonial-list" style="list-style: circle;">';
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <li>
                <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            </li>
        <?php wp_reset_query(); ?>
        <?php endwhile;
        echo '</ul>
        <br>
        <br><a href="http://parquesalegres.org/list-experiencias/?tag=empresa">Ver más</a>';
    }
    echo'</div>';
    */
    echo '</div>
    <div id="formu" style="display:none;">
    <form method="post" class="contacto">
        <fieldset>
            <div><label>Nombre:</label><input type="text" class="nombre form-control" name="nombre"></div>
            <div><label>E-mail:</label><input type="text" class="email form-control" name="email"></div>
            <div><label>Telefono:</label><input type="text" class="telefono form-control" name="email"></div>
            <div><label>Mensaje:</label><textarea cols="30" rows="5" class="mensaje form-control" name="mensaje"></textarea></div>
            <div class="ultimo">
                <div class="msg"></div>
                <button class="boton_envio btn btn-primary">Enviar Mensaje</button>
            </div>
	    <input type="hidden" name="asesor" id="asesor" value="'.$row['user_email'].'">
	    <input type="hidden" name="contacto" id="contacto" value="'; echo get_post_meta($post->ID, "_cmb_contacto_exp", true); echo '">
	    <input type="hidden" name="nexpe" id="nexpe" value="'; echo the_title(); echo '">
	    <input type="hidden" name="link" id="link" value="'; echo get_permalink($post->ID); echo '">
        </fieldset>
    </form></div>
    <div style="clear:both;"></div>';
    //<div style="width:100%;">
    //<div class="cfondo3" style="background:url(http://parquesalegres.org/images/mejorar.png) no-repeat;background-position:center;"><span>ASPECTOS A MEJORAR</span></div>';
    //echo get_post_meta($post->ID, "_cmb_mejorar", true);
    //echo '<div>';
    //
    /*
    if($post->post_content != "") : ?> 
    <div class="estilo">
    <?php if ( get_post_meta($post->ID, '_cmb_event_date', true) ) : ?>

    <p><h3 class="text--center"><?php _e( 'Fecha:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_event_date", true); ?></p>

    <?php endif; 
    if($post->post_content != "") : ?>

    <p><h3><?php _e( 'Descripción de Actividades:', 'ParquesAlegres' ); ?></h3><br> <?php the_content(); ?></p>
    <?php endif; ?>  
    </div>
    <?php endif; ?>  
	<!------------------------------------>
	<?php if ( get_post_meta($post->ID, '_cmb_email', true) ) : ?>
<div class="estilo" >
    <p><h3>Contacto</h3> <?php echo get_post_meta($post->ID, "_cmb_contacto", true); ?></p>
    <p><h3>Nombre</h3> <?php echo get_post_meta($post->ID, "_cmb_nombre", true); ?></p>
    <p><h3>Email</h3> <?php echo get_post_meta($post->ID, "_cmb_email", true); ?></p>
  </div>
<?php endif; ?>
<!------------------------------------>
<?php if ( get_post_meta($post->ID, '_cmb_investment', true) ) : ?>
<div class="estilo" >
    <p><h3>Inversi&oacute;n en la actividad:</h3></p>
    <p>Inversi&oacute;n: <?php echo get_post_meta($post->ID, "_cmb_investment", true); ?></p>
    <p>Venta de boletos: <?php //echo get_post_meta($post->ID, "_cmb_investment", true); ?></p>
    <p>Kermesse: <?php //echo get_post_meta($post->ID, "_cmb_investment", true); ?></p>
    <p>Donativos: <?php //echo get_post_meta($post->ID, "_cmb_investment", true); ?></p>
  </div>
<?php endif; ?>
<!------------------------------------>
<?php if ( get_post_meta($post->ID, '_cmb_participants', true) ) : ?>
<div class="estilo">
    <p><h3><?php _e( 'Personas involucradas:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_participants", true); ?></p>
</div>
<?php endif;?>
    <!-------------------------------->
<?php if ( get_post_meta($post->ID, '_cmb_event_type', true) ) : ?>
<div class="estilo">
    <p><h3><?php _e( 'Tipo de Evento:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_event_type", true); ?></p>
    <p><h3>Objetivo</h3> <?php //echo get_post_meta($post->ID, "_cmb_event_type", true); ?></p>
  </div>
<?php endif;?>
<!------------------------------------>
 <?php if ( get_post_meta($post->ID, '_cmb_benefits', true) ) : ?>
<div class="estilo">
    <p><h3><?php _e( 'Beneficios obtenidos:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_benefits", true); ?></p>
  </div>
  <?php endif;?>
<!----------------------------------------------->
<?php
/*    //-------galerias de pod
 if ( get_post_meta( $post->ID, '_cmb_gallery', true ) ) : ?>
<div class="estilo">
<h3 class="subtitle-project">Im&aacute;genes del evento</h3>

<?php
    //-------galerias de pod
 if ( get_post_meta( $post->ID, '_cmb_gallery' ) ) :

 $images = get_post_meta( $post->ID, '_cmb_gallery' );
 echo' <div class="project-gallery">
        <div id="project-slider" class="flexslider">
            ';
               foreach ( $images as $image ) {
	    echo'<div style="float:left;">';
            echo pods_image( $image );
	    echo'</div>';
        }
           echo' 
        </div>';
   echo' </div>';
//--------------
?>
    <?php endif; ?>

</div>
<?php endif; */
?>
<!----------------------------------------------->
   <?php
   
   
   
   
   
   
   
   
   
   /*
   if ( get_post_meta($post->ID, '_cmb_impact', true) ) : ?>
<div class="estilo">
  
   <?php if ( get_post_meta($post->ID, '_cmb_impact', true) ) : ?>

    <p><h3><?php _e( 'Impacto y número de asistentes:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_impact", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_success_key', true) ) : ?>

    <p><h3><?php _e( 'Clave para el éxito:', 'ParquesAlegres' ); ?></h3> <?php echo get_post_meta($post->ID, "_cmb_success_key", true); ?></p>

    <?php endif; ?>
</div>
 <?php endif; */?>
    <div style="clear:both;"></div>
    </div>
    <br>



<!----------------------------------------------->
  
   
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53b6de9d5456b9e7"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->



    <?php //get_sharing_icons(); ?>
	</div>
<div class="addthis_native_toolbox"></div>
	<?php comments_template(); ?>
</article>

<?php get_footer(); ?>