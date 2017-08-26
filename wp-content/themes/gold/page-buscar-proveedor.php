<?php
/*
Template Name: Buscar Proveedor
*/
?>

<?php get_header(); ?>
<style>
.prov li{
    font-size:18px;
    margin:6px 6px 6px 6px;
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
<script src="https://code.jquery.com/jquery-1.7.2.js"></script>
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
        <?php
        $titulo="";
        $origen=array(1=>"Aguascalientes",2=>"Baja California",3=>"Baja California Sur",4=>"Campeche",5=>"Coahuila",6=>"Colima",7=>"Chiapas",8=>"Chihuahua",9=>"Distrito Federal",
                      10=>"Durango",11=>"Guanajuato",12=>"Guerrero",13=>"Hidalgo",14=>"Jalisco",15=>"México",16=>"Michoacán",17=>"Morelos",18=>"Nayarit",19=>"Nuevo León",
                      20=>"Oaxaca",21=>"Puebla",22=>"Querétaro",23=>"Quintana Roo",24=>"San Luis Potosí",25=>"Sinaloa",26=>"Sonora",27=>"Tabasco",28=>"Tamaulipas",29=>"Tlaxcala",
                      30=>"Veracruz",31=>"Yucatán",32=>"Zacatecas");
        $cobertura=array(1=>"Local",2=>"Estatal",3=>"Nacional");
        $args_cat=array('taxonomy'=>'categoria_proveedores',);
        $categories = get_categories( $args_cat );
        foreach ($categories as $category) {
            if($category->term_id==$_POST['proveedores']){
                $name_cat=$category->name;
            }
        }
        $args = array( 
       'post_type' => 'proveedor', 
       'tax_query'=> array(
            array(
                'taxonomy' => 'categoria_proveedores',
                'terms' => array($_POST['proveedores']),
                'field' => 'term_id',
                ),
            ),
        );
        if($_POST['origen']!="" && $_POST['origen']!="-1"){
            $titulo.="en ".$origen[$_POST['origen']]." ";
            if($_POST['cobertura']!=""){
                $titulo.="con cobertura ".$cobertura[$_POST['cobertura']]." ";
                $args['meta_query']=array(
		'relation' => 'AND',
		array(
			'key'     => '_provider_origen',
			'value'   => $_POST['origen'],
			'compare' => '=',
		),
		array(
			'key'     => '_provider_cobertura',
			'value'   => $_POST['cobertura'],
			'compare' => '=',
		));
            }
            else{
                $args['meta_query']=array(
		array(
			'key'     => '_provider_origen',
			'value'   => $_POST['origen'],
			'compare' => '=',
		));
            }
        }
        else{
            if($_POST['cobertura']!=""){
                $titulo.="con cobertura ".$cobertura[$_POST['cobertura']]." ";
                $args['meta_query']=array(
                    array(
                            'key'     => '_provider_cobertura',
                            'value'   => $_POST['cobertura'],
                            'compare' => '=',
                    ));
            }
        }
        if($_POST['proveedores']!=""){
            $titulo.="que ofrecen productos o servicios de: <u>".$name_cat."</u>";
        }
        echo '<h1 class="title-section"><span>Empresas '.$titulo.'</span></h1>';
        $the_query = new WP_Query( $args );
        // The Loop
        if ( $the_query->have_posts() ) {
            echo '<ul class="prov">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<li><a href="'.get_the_permalink().'">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
        }
        echo '<div style="float:right;"><input class="btn btn-primary" type="button" value="volver" onclick="window.location.href=\'/proveedor/\'"></div>
        <div style="clear:both;"></div>';
        /*echo '<pre>';
        print_r($args);
        echo '</pre>';
        */
        ?>
        <div class="estilo4" style="width: 100%; margin-top: 20px; background-color: #10B9B9;-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;box-shadow: 3px 3px 2px #888888;">
            <h3 style="text-align: center; color: #ffffff;">Somos Amigos</h3>
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
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>