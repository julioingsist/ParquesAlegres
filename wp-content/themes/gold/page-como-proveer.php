<?php
/*
Template Name: Como Proveer
*/
?>

<?php get_header();
/*echo '<!-- Se determina y escribe la localizacion -->
<div id="ubicacion"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var estados = ["Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Distrito Federal", "Durango", "Guanajuato",
"Guerrero", "Hidalgo", "Jalisco", "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", 
"Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas"];
if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(mostrarUbicacion);
} else {alert("¡Error! Este navegador no soporta la Geolocalización.");}
function mostrarUbicacion(position) {
    var times = position.timestamp;
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;
    var altitud = position.coords.altitude;	
    var exactitud = position.coords.accuracy;
    var geocoder = new google.maps.Geocoder;
    var latlng = {lat: latitud, lng: longitud};
    geocoder.geocode({"location": latlng}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                var estado=results[6].formatted_address.split(",");
                var est=estados.indexOf(estado[0]);
                document.getElementById("origen").value=est+1;
            } else {
                window.alert("No results found");
            }
        } else {
            window.alert("Geocoder failed due to: " + status);
        }
    });
}
</script>
';
*/?>
<style>
.estilo {
    border: 3px solid #10B9B9;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-right: 20px;
    margin-left: 20px;
    float: left;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
}
.estilo2 {
    border: 3px solid black;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-right: 20px;
    margin-left: 20px;
    float: right;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
}
.estilo3s {
    margin-top: 20px;
    margin-bottom: 20px;
    margin-right: 20px;
    margin-left: 20px;
    float: right;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
}
.estilo4 {
    border: 3px solid #319FBD;
    background-color: #FFFFFF;
}
input#origen{
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
input#cobertura{
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
input#categoria{
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
input#producto{
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555555;
    vertical-align: middle;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
.botoncitos{
	border: 1px solid #DADADA;
	color: #888;
	height: 30px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 20%;
	font-size: 12px;
	line-height:15px;
	box-shadow: inset 0px 1px 4px #ECECEC;
	-moz-box-shadow: inset 0px 1px 4px #ECECEC;
	-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
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
.foto4{
	display:none;
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
});
function provider(estado){
  $.ajax({url: "http://parquesalegres.org/proceso.php",
    data: { cmd: 3, estado: estado},
    dataType: "text",
    type: "post",
    success: function(result){
      var $el = $("#prod");
      $el.empty();
      var res=result.split(",");
      $el.append($("<option></option>").attr("value", "").text(" -- Seleccione -- "));
      $.each(res, function(value,key) {
          var valorsito = key.split(":");
          if(valorsito[1]){
            $el.append($("<option></option>").attr("value", valorsito[0]).text(valorsito[1]));
          }
      });
    }});
}
</script>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span></span>
        </h1>
        <div class="estilo" style="width: 50%;-webkit-border-radius: 30px;-moz-border-radius: 30px;border-radius: 30px;">
            <p><h3>Estimado Usuario:</h3> Uno de los objetivos principales de Parques Alegres I.A.P. es promover la participación de empresas y organizaciones que puedan brindarte servicios accesibles para la mejora de tu espacio. 
     En esta sección podrás encontrar productos y servicios de organismos nacionales e internacionales  que están interesados en contribuir a la mejora de tu parque.</p>
        </div>
       <div style="width: 40%;margin-top: 20px;margin-bottom: 20px;margin-right: 20px;margin-left: 20px;float: left;">
            <?php do_action('slideshow_deploy', '22337');
            $estados = array(1=>"Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Coahuila", "Colima", "Chiapas", "Chihuahua", "Distrito Federal", "Durango", "Guanajuato",
"Guerrero", "Hidalgo", "Jalisco", "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", 
"Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
            ?>
        </div>
                  <div style="clear:both;"></div>
                 
    <div style="width: 100%;">
            <span class="input-group-btn">
	<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/buscar-proveedor/' ) ); ?>" method="post">
        Estado donde se encuentra el proveedor: <select name="origen" class="botoncitos" id="origen" onchange="provider(this.value);">
        <optgroup label="Con proveedor">
        <option value=""> -- Seleccione -- </option>
        <option value="-1">Nacional</option>
        <?php
        $sql="select DISTINCT(m.meta_value) as valor from wp_posts p INNER JOIN wp_postmeta m ON m.post_id=p.id WHERE p.post_type='proveedor' AND p.post_status='publish' AND m.meta_key='_provider_origen'";
        $res=mysql_query($sql);
        while($row=mysql_fetch_array($res)){
          $habilitados[$row['valor']]=$estados[$row['valor']];
          if($row['valor']!=""){
            echo '<option value="'.$row['valor'].'">'.$estados[$row['valor']].'</option>';
          }
        }
        echo '</optgroup>
        <optgroup label="Sin proveedor">';
        foreach($estados as $k=>$v){
          $si=0;
          foreach($habilitados as $key=>$value){
            if($k==$key){
              $si=1;
            }
          }
          if($si!=1){
            echo '<option value="'.$k.'" disabled>'.$v.'</option>';
          }
        }
        echo '</optgroup></select>';
            /*<img src="/tablet/help.png" border="0" class="tooltip2" title="Indica la cobertura que deseas que tenga la empresa para conocer la sucursal más cercana."><select name="cobertura" class="botoncitos" id="cobertura">  <option value=""> -- Cobertura -- </option>
            <option value="1">Local</option>
            <option value="2">Estatal</option>
            <option value="3">Nacional</option>
            </select>*/
            echo '<img src="/tablet/help.png" border="0" class="tooltip2" title="Indica el tipo de producto o servicio que deseas adquirir">';
            echo 'Producto o servicio: <select class="botoncitos" name="proveedores" id="prod"><option value=""> -- Seleccione -- </option></select>';
            /*Producto o servicio
		<?php wp_dropdown_categories( 'taxonomy=categoria_proveedores&class=botoncitos&name=proveedores&hierarchical=1&show_option_none=-- Producto o servicio --&option_none_value=' ); ?>*/
		?><input class="btn btn-primary" type="submit" value="Buscar" />
         </form>
        </span>
        </div>
    <h3 style="text-align: center;">Productos para parques</h3>
       <div class="animacion_img" style="width: 100%; margin-top: 20px; background-color: #10B9B9;-webkit-border-radius: 7px;-moz-border-radius: 7px;border-radius: 7px;box-shadow: 3px 3px 2px #888888;">
<?php do_action('slideshow_deploy', '22406'); ?>
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