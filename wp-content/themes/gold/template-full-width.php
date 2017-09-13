<?php
/*
* Template Name: Full Width Template
*/
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();
$arrayimg=array(21807,21811,21814,21817,21820,21823,21826,21829,21832);

?>
<style>
.imgBoxinc1 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/registratecomovoluntario.png) no-repeat; background-position: center; }
.imgBoxinc2 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaunasesor.png) no-repeat; background-position: center; }
.imgBoxinc3 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/donarecurrentemente.png) no-repeat; background-position: center; }
.imgBoxinc4 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/rehabilitaunparque.png) no-repeat; background-position: center; }
.imgBoxinc5 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apadrinaunparque.png) no-repeat; background-position: center; }
.imgBoxinc6 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/publicitateenunparque.png) no-repeat; background-position: center; }
.imgBoxinc7 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaequipodeportivo.png) no-repeat; background-position: center; }
.imgBoxinc8 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apoyaengastosadministrativosyoperativos.png) no-repeat; background-position: center; }
.imgBoxinc9 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/registratecomovoluntario.png) no-repeat; background-position: center; }
.imgBoxinc10 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaunasesor.png) no-repeat; background-position: center; }
.imgBoxinc11 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/donarecurrentemente.png) no-repeat; background-position: center; }
.imgBoxinc12 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apadrinaunparque.png) no-repeat; background-position: center; }
.imgBoxinc13 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaequipodeportivo.png) no-repeat; background-position: center; }
.imgBoxinc14 { float:left; width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apoyaengastosadministrativosyoperativos.png) no-repeat; background-position: center; }

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
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">  
$(document).ready(function(){  
  
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
  	
        // Cuando pasen otros 3000 milisegundos, ocultamos la foto 2 y volvemos a iniciar la animaci—n  
        setTimeout(function() {  
            // Ocultamos la foto 2
            $(".foto2").fadeOut(tiempo_fade);  
            setTimeout(function() {// Mostramos la foto 2  
            	$(".foto3").fadeIn(tiempo_fade);
	    },1100);  
        }, 7000);
        // Cuando pasen otros 3000 milisegundos, ocultamos la foto 2 y volvemos a iniciar la animaci—n  
        setTimeout(function() {  
            // Ocultamos la foto 3
            $(".foto3").fadeOut(tiempo_fade);  
            setTimeout(function() {
		animacion_simple();
	    },1100);  
        }, 10000);
    }  
  
    //Empezamos la animaci—n a los 200 milisegundos  
    setTimeout(function() {  
        animacion_simple();  
    }, tiempo_inicio_anim);  
  
});
</script>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <?php if(have_posts()): the_post();?>
    <div class="page-header">
      <h1><?php
	$c=0;
	foreach($arrayimg as $k=>$v){
		if (is_page($v)) {
			$c=$k+1;
			echo '<div class="imgBoxinc'.$c.'"></div>';
		}
	}?><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>  
    </div>
    <div class="post-content" style="clear:both"><?php if($c!=0){ echo '<br>';}?>
      <p class="justify">
      		<center>
            <?php 
        		  if ( has_post_thumbnail() ):
        		    the_post_thumbnail();
        		  endif;
        		?>
      		
      		</center>
		     <?php the_content();?>        
	    </p>
    </div>
    <?php endif;?>
  </div>
  <?php if ( is_page( 21807 ) || is_page( 21811 ) || is_page( 21814 ) || is_page( 21817 ) || is_page( 21820 ) || is_page( 21823 ) || is_page( 21826 ) || is_page( 21829 ) || is_page( 21832 )) {?>
      <div class="estilo4" style="width: 100%; margin-top: 20px; background-color: #10B9B9;-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;box-shadow: 3px 3px 2px #888888;">
            <h3 style="text-align: center; color: #ffffff;">Amigos de Parques Alegres</h3>
        </div>
       <div class="animacion_img" style="width:100%">
<img src="../images/logos_empresas/transparent.png" height="110px"/>
<img src="../images/logos_empresas/3r.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/arteverde.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/canal3.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/chata.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/clickbalance.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/culiacanparticipa.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/deacero.png" class="foto1" width="10%"/>
<img src="../images/logos_empresas/dorados.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/elcarrusel.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/europatios.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/farmaciasmoderna.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/fetasa.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/impulsa.png" class="foto2" width="10%"/>
<img src="../images/logos_empresas/jaztea.png" class="foto3" width="10%"/>
<img src="../images/logos_empresas/manjarrez.png" class="foto3" width="10%"/>
<img src="../images/logos_empresas/pypco.png" class="foto3" width="10%"/>
<img src="../images/logos_empresas/santaana.png" class="foto3" width="10%"/>
<img src="../images/logos_empresas/suma.png" class="foto3" width="10%"/>
<img src="../images/logos_empresas/tomaco.png" class="foto3" width="10%"/>
</div>
            </div>            
    <?php
	 }
    ?>
</div>
<?php get_footer(); ?>