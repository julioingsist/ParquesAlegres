<?php
/*
Template Name: Como ayudar
*/
?>

<?php get_header(); ?>

<style>
    .testimonial-list {
  list-style: none;
  margin-left: 0;
}
.testimonial-lists {
  list-style: none;
  margin-left: 0;
}
.testimonial-list p {
  font-size: 13px;
  padding: 0;
  margin-bottom: 5px;
}

.testimonial-list > li {
  float: left;
  width: 33%;
  margin-left: 0px;
  margin-top: 30px;
}
.testimonial-lists > li {
  float: left;
    width: auto;
    height:150px;
}
.testimonial-lists p {
  font-size: 13px;
  padding: 0;
  margin-bottom: 5px;
  text-align: center;
}
.imgBoxinc1 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/registratecomovoluntario.png) no-repeat; background-position: center; }
.imgBoxinc2 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaunasesor.png) no-repeat; background-position: center; }
.imgBoxinc3 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/donarecurrentemente.png) no-repeat; background-position: center; }
.imgBoxinc4 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/rehabilitaunparque.png) no-repeat; background-position: center; }
.imgBoxinc5 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apadrinaunparque.png) no-repeat; background-position: center; }
.imgBoxinc6 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/publicitateenunparque.png) no-repeat; background-position: center; }
.imgBoxinc7 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaequipodeportivo.png) no-repeat; background-position: center; }
.imgBoxinc8 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apoyaengastosadministrativosyoperativos.png) no-repeat; background-position: center; }
.imgBoxinc9 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/registratecomovoluntario.png) no-repeat; background-position: center; }
.imgBoxinc10 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaunasesor.png) no-repeat; background-position: center; }
.imgBoxinc11 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/donarecurrentemente.png) no-repeat; background-position: center; }
.imgBoxinc12 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apadrinaunparque.png) no-repeat; background-position: center; }
.imgBoxinc13 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/patrocinaequipodeportivo.png) no-repeat; background-position: center; }
.imgBoxinc14 { width: 130px; height: 85px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ayuda/apoyaengastosadministrativosyoperativos.png) no-repeat; background-position: center; }

.grid {
  margin-left: -23px;
  list-style: none;
  margin-bottom: 0;
}
.tabs-content{
    padding: 200px;
    margin-left: -260px;
    margin-bottom: -200px;
}
.tabs-content2{
  padding: 200px;
   margin-left: -160px;
}
.bg {
  position: relative;
  margin-left: -100px;
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
    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span><?php the_title(); ?></span>
        </h1>
        <div>
            <p>Parques Alegres se sostiene por medio de donativos de mano de obra, en efectivo y en especie de personas y organizaciones que est&aacute;n interesadas en rescatar estos espacios p&uacute;blicos y quieran colaborar con nosotros. ¿Te gustar&iacute;a apoyar este proyecto?. Estas son algunas formas en las que puedes colaborar:
</p>
        </div>
         <h2>Empresas y organizaciones
        </h2>
        <?php
		echo'<div class="grid">';
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv1" href="http://parquesalegres.org/organiza-un-voluntariado-empresarial/"><div class="imgBoxinc1"></div><p>Organiza un <br>Voluntariado <br>empresarial</p></a></li>
<li><a class="button" id="showdiv2" href="http://parquesalegres.org/patrocina-a-un-asesor/"><div class="imgBoxinc2"></div><p>Patrocina <br>un Asesor</p></a></li>
<li><a class="button" id="showdiv3" href="http://parquesalegres.org/donante-recurrente/"><div class="imgBoxinc3"></div><p>Dona <br>Recurrentemente</p></a></li>
<li><a class="button" id="showdiv4" href="http://parquesalegres.org/rehabilitacion-de-un-parque/"><div class="imgBoxinc4"></div><p>Rehabilita <br>un parque</p></a></li>
<li><a class="button" id="showdiv5" href="http://parquesalegres.org/apadrina-un-parque/"><div class="imgBoxinc5"></div><p>Apadrina <br>un parque</p></a></li>
<li><a class="button" id="showdiv6" href="http://parquesalegres.org/publicidad-en-parques/"><div class="imgBoxinc6"></div><p>Public&iacute;tate en <br>un parque</p></a></li>
<li><a class="button" id="showdiv7" href="http://parquesalegres.org/patrocina-equipo-deportivo/"><div class="imgBoxinc7"></div><p>Patrocina <br>equipo <br>deportivo</p></a></li>
<li><a class="button" id="showdiv8" href="http://parquesalegres.org/apoyo-en-gastos-administrativos-y-operativos/"><div class="imgBoxinc8"></div><p>Apoya en<br> gastos<br> administrativos <br>y operativos</p></a></li>
</ul>
</div>';
?>
    </div>
    <!-------------------------------------------------Div-------------------------------------------------------------->
    <div class="tabs-content"></div>
     <div style="clear:both;">
            <h2>Personas f&iacute;sicas</h2>
        </div>
        <?php
		
		echo'<div class="grid">';
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv11" href="http://parquesalegres.org/registrate-como-voluntario/"><div class="imgBoxinc9"></div><p>Reg&iacute;strate <br>como <br>Voluntario</p></a></li>
<li><a class="button" id="showdiv12" href="http://parquesalegres.org/patrocina-a-un-asesor/"><div class="imgBoxinc10"></div><p>Patrocina <br>un Asesor</p></a></li>
<li><a class="button" id="showdiv13" href="http://parquesalegres.org/donante-recurrente/"><div class="imgBoxinc11"></div><p>Dona <br>Recurrentemente</p></a></li>
<li><a class="button" id="showdiv14" href="http://parquesalegres.org/apadrina-un-parque/"><div class="imgBoxinc12"></div><p>Apadrina <br>un parque</p></a></li>
<li><a class="button" id="showdiv15" href="http://parquesalegres.org/patrocina-equipo-deportivo/"><div class="imgBoxinc13"></div><p>Patrocina <br>equipo <br>deportivo</p></a></li>
<li><a class="button" id="showdiv16" href="http://parquesalegres.org/apoyo-en-gastos-administrativos-y-operativos/"><div class="imgBoxinc14"></div><p>Apoya en <br>gastos administrativos <br>y operativos</p></a></li>
</ul>
</div>';

?>
    <!-------------------------------------------------fin de div de areas verdes------------------------------------------------------->
    <div style="clear:both;">***Para todos los donativos en especie o efectivo contamos con recibos deducibles de impuestos.</div>
                 
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
            </div>
    
    </div>
    <!-- //MAIN CONTENT// -->

<?php get_footer(); ?>