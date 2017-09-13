<?php
$themename = "VividTW";  
$shortname = "vividtw";

$options = array (

array( "name" => $themename." Opciones",
	"type" => "title"),

//General Options
	array(	"name" => "Opciones Generales",
			"desc" => "Aqu&iacute; hay algunas configuraciones generales del Theme que debes llenar o escoger :-)",
			"type" => "section"),
	array( "type" => "open"),  

	array(	"name" => "Estilo del Theme",
			"desc" => "Escoge el Estilo del theme.<Br />Style1 = Estilo Azul. Style2 = Estilo Morado. Style3 = Estilo Rojo. Style4 = Estilo Verde.",
			"id" => $shortname."_theme_style",
			"std" => "style1",
			"type" => "select",
			"options" => array("style1", "style2", "style3", "style4")
		),

array( "name" => "Twitter",
	"desc" => "Nombre de usuario en Twitter. Ejemplo: trazosweb",
	"id" => $shortname."_twitter_account",
	"type" => "text",
	"std" => ""),
array( "name" => "Suscripci&oacute;n por Email",
	"desc" => "Ingresa la direcci&oacute;n de suscripci&oacute;n por email.<Br />Ejemplo: http://feedburner.google.com/fb/a/mailverify?uri=TrazosWeb&loc=es_ES",
	"id" => $shortname."_email_subscription",
	"type" => "text",
	"std" => ""),
array( "name" => "C&oacute;digo de Google Analytics",
	"desc" => "Ingresa el c&oacute;digo de Google Analytics u otro sistema de estad&iacute;sticas.",
	"id" => $shortname."_analytics",
	"type" => "textarea",
	"std" => ""),	
array( "name" => "Favicon",
	"desc" => "Ingresa la URL del favicon que deseas usar.",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('stylesheet_directory') ."/img/favicon.ico"),	

array( "name" => "Cuenta de Feedburner",
	"desc" => "Si tienes una cuenta de Feedburner para gestionar las estad&iacute;sticas de tu Feed, ingresa la URL completa.<Br />Ejemplo: http://feedproxy.google.com/TrazosWeb",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => get_bloginfo('rss2_url')),

array( "type" => "close"),
//Search Engine Optimization (SEO)
	array(	"name" => "Optimizaci&oacute;n para Motores de B&uacute;squeda (SEO)",
			"desc" => "Al usar esta plantilla, tu blog ya estar&aacute; optimizado para los buscadores, pero aqu&iacute; tienes la oportunidad de controlar estos datos. Si ya has instalado un plugin de SEO en tu sitio, simplemente deja estas opciones vacias y no ser&aacute;n usadas. ",
			"type" => "section"),
	array( "type" => "open"),
	array(	"name" => "Meta Description de la P&aacute;gina de Inicio",
			"desc" => "Ingresa una peque&ntilde;a descripci&oacute;n de tu sitio para los buscadores.",
			"id" => $shortname."_home_description",
			"std" => "",
			"type" => "textarea"),
			
	array(	"name" => "Meta Keywords de la P&aacute;gina de Inicio",
			"desc" => "Ingresa las palabras clave m&aacute;s importantes de tu sitio. Separa estas palabras con comas.<Br />Ejemplo: palabra clave 1, palabra clave 2, palabra clave 3",
			"id" => $shortname."_home_keywords",
			"std" => "",
			"type" => "textarea"),
			
	array(  "name" => "Art&iacute;culos y P&aacute;ginas",
    		"desc" => "Si seleccionas esto, aparecer&aacute; un &aacute;rea para escribir los meta keywords y meta description para cada p&aacute;gina o art&iacute;culo que est&eacute;s escribiendo.",
            "id" => $shortname."_seo_meta",
            "std" => "false",
            "type" => "checkbox"),
            
	array(	"type" => "close"),
	
//Anuncios Sidebar 125x125
array(	"name" => "Banners 125x125",
		"desc" => "Aqu&iacute; puedes configurar los banners que quieres que aparezcan en la barra lateral",
		"type" => "section"),
array( "type" => "open"),
		
array(	"name" => "&iquest;Quieres mostrar los banners?",
		"desc" => "Deselecciona esto si quieres que no se muestren los banners.",
		"id" => $shortname."_ads125",
		"std" => "true",
		"type" => "checkbox"),

array(	"name" => "&iquest;Cuantos banners quieres mostrar?",
			"desc" => "Indica el n&oacute;mero de banners que deseas mostrar (1-6)",
			"id" => $shortname."_ads_number",
			"std" => "",
			"type" => "select",
			"options" => array("1", "2", "3", "4", "5", "6")
		),

array(	"name" => "&iquest;Quieres que los banners roten?",
					"desc" => "Selecciona esto para que los banners roten aleatoriamente.",
					"id" => $shortname."_ads_rotate",
					"std" => "false",
					"type" => "checkbox"),
array(	"name" => "Banner #1 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_1",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/trazosweb-125.jpg",
					"type" => "text"),
array(	"name" => "Banner #1 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_1",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #1 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_1",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
array(	"name" => "Banner #2 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_2",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/banner125x125.png",
					"type" => "text"),
array(	"name" => "Banner #2 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_2",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #2 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_2",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
array(	"name" => "Banner #3 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_3",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/banner125x125.png",
					"type" => "text"),
array(	"name" => "Banner #3 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_3",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #3 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_3",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
array(	"name" => "Banner #4 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_4",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/trazosweb-125.jpg",
					"type" => "text"),
array(	"name" => "Banner #4 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_4",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #4 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_4",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
array(	"name" => "Banner #5 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_5",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/trazosweb-125.jpg",
					"type" => "text"),
array(	"name" => "Banner #5 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_5",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #5 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_5",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
array(	"name" => "Banner #6 - Im&aacute;gen del banner",
					"desc" => "Ingresa la URL de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_image_6",
					"std" => "http://www.trazos-web.com/wp-content/uploads/publicidad/banner125x125.png",
					"type" => "text"),
array(	"name" => "Banner #6 - Etiqueta ALT de la Im&aacute;gen",
					"desc" => "Ingresa la etiqueta ALT de la im&aacute;gen de este banner.",
					"id" => $shortname."_ad_alt_6",
					"std" => "",
					"type" => "text"),
array(	"name" => "Banner #6 - Enlace del banner",
					"desc" => "Ingresa la URL de donde quieres que este banner se enlace.",
					"id" => $shortname."_ad_url_6",
					"std" => "http://www.trazos-web.com",
					"type" => "text"),
		
array(	"type" => "close")

);

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=theme-options.php&saved=true");
die;

}
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=theme-options.php&reset=true");
die;

}
}

add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin', get_bloginfo('template_url'). '/functions/img/tw-icon.png');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");
}

function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' opciones guardadas.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' opciones reiniciadas.</strong></p></div>';

?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Configuraci&oacute;n</h2>

<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>

<?php break;

case "close":
?>

</div>
</div>
<br />

<?php break;

case "title":
?>
<p>Panel de administraci&oacute;n para el theme <?php echo $themename;?>.</p>

<?php break;

case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>
<?php
break;

case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>

<?php
break;

case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;

case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;

case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Guardar cambios" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

<?php break;

}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reiniciar" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div style="margin-bottom:10px;"><small><a href="#wphead">&uarr; Volver arriba</a>. <strong>Dise&ntilde;ado por <a title="Blogging y Dise&ntilde;o Web" href="http://www.trazos-web.com/">Trazos Web</a></strong><br />
Mini Iconos por <a href="http://splashyfish.com/icons/">SplashyFish</a>. Mini Iconos Sociales por <a href="http://icondock.com/free/vector-social-media-icons">IconDock</a></small>
</div>
 </div> 

<?php
}

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>