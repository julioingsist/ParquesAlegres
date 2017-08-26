<?php
/*
Template Name: Listado Proveedores
*/
?>

<?php get_header();
$estados = array(1=>"Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Distrito Federal", "Durango", "Guanajuato",
"Guerrero", "Hidalgo", "Jalisco", "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", 
"Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
?>
<style>
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
.foto4{
	display:none;
}
.button {
    text-decoration: none;
    color: white;
    font-size:17px;
    background: #9DC45F;
    border: none;
    margin-bottom:10px;
    width:280px;
    height:40px;
    padding: 5px 20px 5px 20px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;
}
.button:hover {
    background: #80A24A;
}
.logo-preview{
    overflow:hidden;
    display:inline-block;
    width:160px;
    height:160px;
    border:solid 1px #D8D8D8;
    line-height:180px;
    margin-right:6px;
    margin-bottom:6px;
}
.logo-preview:hover{
    width:162px;
    height:162px;
    border:solid 1px gray;
}
#categorias a{
    border-radius: 5px;
    color: black;
    font-size:16px;
    display:block;
    width:200px;
    padding: 10px;
    background: #D8D8D8;
}
#categorias a:hover{
    text-decoration: none;
    background: #ABB2B9;
}
#preview a{
    border-radius: 0px;
    color: green;
    font-size:25px;
    display:inline;
    width:100%;
    padding: 0px;
    background: transparent;
}
#preview a:hover{
    text-decoration: underline;
    background: transparent;
}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="../jBox-0.3.2/Source/jBox.min.js"></script>
<link href="../jBox-0.3.2/Source/jBox.css" rel="stylesheet">
<script type="text/javascript">  
$(document).ready(function(){  
    $('.tooltip2').jBox('Tooltip');
    var tiempo_inicio_anim = 200;  
    var tiempo_entre_img = 4000;  
    var tiempo_fade = 1000;
  
    function animacion_simple() {  
  
        // Mostramos la foto 1  
        $(".foto1").fadeIn(tiempo_fade);  
  
        // Cuando pasen otros 4000 milisegundos, ocultamos la foto 1 y mostramos la foto 2  
        setTimeout(function() {  
            // Ocultamos la foto 1  
            $(".foto1").fadeOut(tiempo_fade);  
            setTimeout(function() {// Mostramos la foto 2  
            	$(".foto2").fadeIn(tiempo_fade);
	    },1100);
        }, tiempo_entre_img);  
  	
        // Cuando pasen otros 4000 milisegundos, ocultamos la foto 2 y mostramos la foto 3  
        setTimeout(function() {  
            // Ocultamos la foto 2
            $(".foto2").fadeOut(tiempo_fade);  
            setTimeout(function() {// Mostramos la foto 3
            	$(".foto3").fadeIn(tiempo_fade);
	    },1100);  
        }, 9000);
        // Cuando pasen otros 4000 milisegundos, ocultamos la foto 3 y volvemos a iniciar la animación  
        setTimeout(function() {  
            // Ocultamos la foto 4
            $(".foto3").fadeOut(tiempo_fade);  
            setTimeout(function() {
		animacion_simple();
	    },1100);  
        }, 14000);
    }  
  
    //Empezamos la animación a los 200 milisegundos  
    setTimeout(function() {  
        animacion_simple();  
    }, tiempo_inicio_anim);  
    $("#categorias a").click(function(e) { 
        if ($(window).width() > 540) {
            e.preventDefault();
            var link = $(this).attr('href');
            var cate = link.split("/");
            var n=cate.length-2;
            $("#preview").load("http://parquesalegres.org/proceso.php", {cat: cate[n], cmd: 22});
        }
    });
});
function cambio(i){
        if(i==1){
            $("#categorias").hide();
            $("#proveedores").show();
        }
        else{
            $("#proveedores").hide();
            $("#categorias").show();
        }
    }
</script>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span></span>
        </h1>

       <div>
            <h2 align="center">Productos destacados</h2>
            <?php do_action('slideshow_deploy', '22337');
            ?>
        </div>
        <br>
    <center><input type="button" class="button" onclick="cambio(1);" value="Proveedores">&nbsp;&nbsp;
    <input type="button" onclick="cambio(2);" class="button" value="Categorías"></center>
    <br><br>
    <div id="proveedores">
		<?php 
        $args = array( 'post_status' => 'publish', 'post_type' => 'proveedor', 'posts_per_page' => -1);
        $loop = get_posts( $args );
        if($loop){
            foreach ($loop as $k => $v) {
                if ( get_post_meta( $v->ID, '_provider_logo', true )){
                    $images = get_post_meta( $v->ID, '_provider_logo' );
                    echo '<a href="'; echo get_permalink($v->ID); echo '" target="_blank"><div class="logo-preview"><center>'.pods_image( $images[0],'','','style=width:75%;height:75%;').'<center></div></a>';
                }
            }
        }
		?>
    </div> 
    <div id="categorias" style="display:none;">
        <?php 
        $args = array('taxonomy'=>'categoria_proveedores','orderby'=>'name','show_count'=>true,'hierarchical'=>true,'style'=>'','echo'=>0);
        $categories = wp_list_categories($args);
        $categories = str_replace('</a>', '', $categories);
        $categories = str_replace(')', ')</a>', $categories);
        echo '<div style="display:inline-block;margin-right:25px;">'.$categories.'</div>' ?>
        <div id="preview" style="display: inline-block;vertical-align: top;"></div>
    </div>      
        <div class="estilo4" style="width: 100%; margin-top: 20px; background-color: #10B9B9;-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;box-shadow: 3px 3px 2px #888888;">
            <h3 style="text-align: center; color: #ffffff;">Amigos de Parques Alegres</h3>
        </div>
       <div class="animacion_img" style="width:100%">
<img src="../images/logos_empresas/transparent.png" height="110px"/>
<!--<img src="../images/logos_empresas/3r.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/arteverde.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/canal3.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/chata.png" class="foto1" width="12%"/>-->
<img src="../images/logos_empresas/clickbalance.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/culiacanparticipa.png" class="foto1" width="12%"/>
<!--<img src="../images/logos_empresas/deacero.png" class="foto2" width="12%"/>-->
<img src="../images/logos_empresas/dorados.png" class="foto1" width="12%"/>
<!--<img src="../images/logos_empresas/elcarrusel.png" class="foto2" width="12%"/>-->
<img src="../images/logos_empresas/europatios.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/farmaciasmoderna.png" class="foto1" width="12%"/>
<img src="../images/logos_empresas/fetasa.png" class="foto2" width="12%"/>
<img src="../images/logos_empresas/impulsa.png" class="foto2" width="12%"/>
<img src="../images/logos_empresas/jaztea.png" class="foto2" width="12%"/>
<img src="../images/logos_empresas/manjarrez.png" class="foto2" width="12%"/>
<img src="../images/logos_empresas/pypco.png" class="foto2" width="12%"/>
<img src="../images/logos_empresas/santaana.png" class="foto3" width="12%"/>
<img src="../images/logos_empresas/suma.png" class="foto3" width="12%"/>
<img src="../images/logos_empresas/tomaco.png" class="foto3" width="12%"/>
<img src="../images/logos_empresas/logo_caballeros.png" class="foto3" width="12%"/>
</div>
            </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>