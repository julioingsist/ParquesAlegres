<?php
/*
Template Name Posts: single-proveedor
*/
?>
<?php get_header(); ?>
<style>
#footerdivs {
    position: fixed;
    bottom: 0;
}
.estilo4 {
    border: 3px solid #319FBD;
    background-color: #FFFFFF;
}
.animacion_img {
	padding-right:10px;
	padding-left:10px;
}
.animacion_img img{
	margin-top:5px;
	margin-right:25px;
	margin-left:25px;
}
.foto1{
	margin-right:15px !important;
	margin-left:15px !important;
}
.foto2{
	display:none;
}
.foto3{
	display:none;
}
.msg_ok{
    color: #589D05;
}
.msg_error{
    color: red;
}
.cycle-slideshow img { max-width: 100%; min-width:300px; }
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../../jBox-0.3.2/Source/jBox.min.js"></script>
<link href="../../jBox-0.3.2/Source/jBox.css" rel="stylesheet">
<script src="../../jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.center.js"></script>
<script type="text/javascript">  
$(document).ready(function(){
    $("img").on("contextmenu",function(){
       return false;
    }); 
    $(".boton_envio").click(function() {
        var nombre = $(".nombre").val();
            email = $(".email").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            telefono = $(".telefono").val();
            mensaje = $(".mensaje").val();
	    emailproveedor = $("#emailproveedor").val();
	    proveedor = $("#proveedor").val();
 
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
	    var datos = "cmd=2&nombre="+ nombre + "&email=" + email + "&telefono=" + telefono + "&emailproveedor=" + emailproveedor + "&proveedor=" + proveedor + "&mensaje=" + mensaje;
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
	    getTitle: 'data-jbox-title',
	    trigger:'click',
	    attach: $('#cotizacion'),
	    content: $('#preview'),
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
  
    var tiempo_inicio_anim = 200;  
    var tiempo_entre_img = 3000;  
    var tiempo_fade = 1000;  
  
    function animacion_simple() {  
  
        // Mostramos la foto 1  
        $(".foto1").fadeIn(tiempo_fade);  
  
        // Cuando pasen otros 3000 milisegundos, ocultamos la foto 1 y mostramos la foto 2  
        setTimeout(function() {  
            // Ocultamos la foto 1  
            $(".foto1").fadeOut(tiempo_fade);  
            setTimeout(function() {// Mostramos la foto 2  
            	$(".foto2").fadeIn(tiempo_fade);
	    },1100);
        }, tiempo_entre_img);  
  	
        // Cuando pasen otros 3000 milisegundos, ocultamos la foto 2 y volvemos a iniciar la animación  
        setTimeout(function() {  
            // Ocultamos la foto 2
            $(".foto2").fadeOut(tiempo_fade);  
            setTimeout(function() {// Mostramos la foto 2  
            	$(".foto3").fadeIn(tiempo_fade);
	    },1100);  
        }, 7000);
        // Cuando pasen otros 3000 milisegundos, ocultamos la foto 2 y volvemos a iniciar la animación  
        setTimeout(function() {  
            // Ocultamos la foto 3
            $(".foto3").fadeOut(tiempo_fade);  
            setTimeout(function() {
		animacion_simple();
	    },1100);  
        }, 10000);
    }  
  
    //Empezamos la animación a los 200 milisegundos  
    setTimeout(function() {  
        animacion_simple();  
    }, tiempo_inicio_anim);  
  
});
</script>
<div class="main" id="content" role="main">
    <div class="top improve"></div>
    <div class="container" id="inner-content" >
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  
	<div class="project">

<!------------------------------------>
    <?php if ( get_post_meta( $post->ID, '_provider_logo' ) ) :
	$logos = get_post_meta( $post->ID, '_provider_logo' );
	foreach ( $logos as $logo ) {
	    echo '<img src="'.pods_image_url($logo,$size='medium').'" width="120" align="right">';
	}
    endif; ?>
    <h1 class="title-section">
      <span>Proveedor: <?php the_title(); ?></span>
  </h1><br>
     <?php
     if ( get_post_meta( $post->ID, '_provider_gallery' ) ) :
 $images = get_post_meta( $post->ID, '_provider_gallery' );
 echo '<div class="cycle-slideshow"
		data-cycle-fx=scrollHorz
		data-cycle-center-horz=true
		data-cycle-timeout="0"
		data-cycle-prev="#prev"
		data-cycle-next="#next">';
		foreach ( $images as $image ) {
		    echo pods_image( $image,array(700,700));
		}
    echo '</div>';
    echo '<div class="center">
		    <a href=# id="prev" style="margin-right:10px;">Anterior</a>&nbsp;<a href=# id="next">Siguiente</a>
		</div>';
//--------------
?>    
    
    <?php endif; ?>
     <?php if ( get_post_meta($post->ID, '_provider_business_role', true) ) : ?>
        <!---<p><h6 class="title-section"> ---><?php //echo get_post_meta($post->ID, "_provider_business_role", true); ?><!--</h6></p>-->
    <?php endif;?>
    <?php if ( get_post_meta($post->ID, '_provider_description', true) ) : ?>
        <br><p><h4 align="justify"> <?php echo get_post_meta($post->ID, "_provider_description", true); ?></h4></p>
    <?php endif;?>
     <div style="display:inline-block;width:32%;text-align:center;"><h3>Direcci&oacute;n:</h3>
    <?php if ( get_post_meta($post->ID, '_provider_address', true) ) : ?>
        <p> <h4 ><?php echo get_post_meta($post->ID, "_provider_address", true); ?></h4></p>
    <?php endif;?>
    </div>
    <div style="display:inline-block;width:32%;text-align:center;"><h3 class="text--center">Datos del contacto:</h3>
    <?php if ( get_post_meta($post->ID, '_provider_contact', true) ) : ?>
        <p> <h4><?php echo get_post_meta($post->ID, "_provider_contact", true); ?></h4></p>
    <?php endif;?>
    <?php if ( get_post_meta($post->ID, '_provider_phone', true) ) : ?>
        <p> <h4><?php echo get_post_meta($post->ID, "_provider_phone", true); ?></h4></p>
    <?php endif;?>
    <?php if ( get_post_meta($post->ID, '_provider_email', true) ) : ?>
        <p> <h4><?php echo get_post_meta($post->ID, "_provider_email", true); ?></h4></p>
    <?php endif;?>
    </div>
<!------------------------------------>
<!------------------------------------>
<div style="display:inline-block;width:32%;text-align:center;">
<?php 
$url=get_post_meta($post->ID, "_provider_verprod", true);
if(substr($url,0,4)!="http"){
    $url="http://".get_post_meta($post->ID, "_provider_verprod", true);
}
?>
    <p><input class="btn btn-primary" type="button" value="Ver m&aacute;s productos" onclick="window.open('<?php echo $url ?>','_blank');"/></p>
    <p><input class="btn btn-primary" id="cotizacion" type="button" value="Hacer mi cotizaci&oacute;n"/></p>
    <p><input class="btn btn-primary" type="button" value="volver" onclick="window.location.href='/proveedor/'" /></p>
     </div>
<div id="preview" style="display:none;">
     <form method="post" class="contacto">
        <fieldset>
            <div><label>Nombre:</label><input type="text" class="nombre" name="nombre" /></div>
            <div><label>E-mail:</label><input type="text" class="email" name="email" /></div>
            <div><label>Telefono:</label><input type="text" class="telefono" name="email" /></div>
            <div><label>Mensaje:</label><textarea cols="30" rows="5" class="mensaje" name="mensaje" ></textarea></div>
            <div class="ultimo">
                <div class="msg"></div>
                <button class="boton_envio">Enviar Mensaje</button>
            </div>
	    <input type="hidden" name="emailproveedor" id="emailproveedor" value="<?php echo get_post_meta($post->ID, "_provider_coti", true); ?>">
	    <input type="hidden" name="proveedor" id="proveedor" value="<?php the_title(); ?>">
        </fieldset>
     </form>
</div>

<!------------------------------------>
    <?php //if($post->post_content != "") : ?>
        <p><?php //the_content(); ?></p>
    <?php //endif;?>

	<?php //comments_template(); ?>
</article>
</div> <!-- end #inner-content -->
       <div class="estilo4" style="width: 100%; margin-top: 20px; background-color: #10B9B9;-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;box-shadow: 3px 3px 2px #888888;">
            <h3 style="text-align: center; color: #ffffff;">Somos Amigos</h3>
        </div>
       <div class="animacion_img" style="width:100%">
<img src="/images/logos_empresas/transparent.png" height="110px"/>
<img src="/images/logos_empresas/3r.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/arteverde.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/canal3.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/chata.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/clickbalance.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/culiacanparticipa.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/deacero.png" class="foto1" width="10%"/>
<img src="/images/logos_empresas/dorados.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/elcarrusel.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/europatios.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/farmaciasmoderna.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/fetasa.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/impulsa.png" class="foto2" width="10%"/>
<img src="/images/logos_empresas/jaztea.png" class="foto3" width="10%"/>
<img src="/images/logos_empresas/manjarrez.png" class="foto3" width="10%"/>
<img src="/images/logos_empresas/pypco.png" class="foto3" width="10%"/>
<img src="/images/logos_empresas/santaana.png" class="foto3" width="10%"/>
<img src="/images/logos_empresas/suma.png" class="foto3" width="10%"/>
<img src="/images/logos_empresas/tomaco.png" class="foto3" width="10%"/>
</div>
            </div>
</div> <!-- end #content -->

<?php get_footer(); ?>