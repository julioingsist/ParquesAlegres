<?php
ini_set('display_errors',1);
ini_set('error_reporting',E_ERROR);
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
if (is_user_logged_in()){
    $user = wp_get_current_user();
    ?>
    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>S.E.S.P.</title>
      <meta name="description" content="">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="cleartype" content="on">
      <meta name="MobileOptimized" content="320">
      <meta name="HandheldFriendly" content="True">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/bootstrap-theme.min.css">
      <link rel="stylesheet" href="css/main.css">
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
      <!--[if lt IE 8]>
	<p class="browserupgrade">Si estas usando un navegador <strong>desactualizado</strong>. Por favor <a href="http://browsehappy.com/">actualizalo</a> para mejorar tu experiencia.</p>
      <![endif]-->
      <div style="float:left;">
	<?php
	  if(file_exists('../tablet/imagenes/'.trim($user->ID).'.png')){
	    $foto_asesor=trim($user->ID).'.png';
	  }
	  else{
	    $foto_asesor='asesor.jpg';
	  }
	  echo '<img src="../tablet/imagenes/'.$foto_asesor.'" width="45px">&nbsp;<span>Hola, '.$user->display_name.'</span>';
	?>
      </div>
      <div style="float:right;margin-right: 5px;margin-top:3px;">
	<span class="glyphicon glyphicon-bell"></span>
      </div>
      <div style="clear: both;"></div>
      <div class="container">
	<h1>SISTEMA DE EVALUACION Y<br>SEGUIMIENTO A PARQUES</h1>
	<div class="row">
	  <div class="col-xs-2 col-sm-1">
            <div class="round color1">
	      <span class="big" id="visi"><?php echo '50'; ?>%</span>
	    </div>
	  </div>
	  <div class="col-xs-4 col-sm-5">
	    <span class="lin">Parques visitados</span>
	  </div>
	</div>
	<div class="row">
	  <div class="col-xs-2 col-sm-1">
	    <div class="round color2">
	      <span class="big" id="comi"><?php echo $cf; ?></span>
	    </div>
	  </div>
	  <div class="col-xs-4 col-sm-5">
	    <span class="lin">Comités formados</span>
	  </div>
	</div>
	<div class="row">
	  <div class="col-xs-2 col-sm-1">
	    <div class="round color3">
	      <span class="big" id="calif"><?php echo $totcalif; ?></span>
	    </div>
	  </div>
	  <div class="col-xs-4 col-sm-5">
	    <span class="lin2">Calificación promedio de la cartera</span>
	  </div>
	</div>
	<div class="row">
	  <div class="col-xs-2 col-sm-1">
	    <div class="round color4">
	      <span class="big" id="rendi"><?php echo round($c-$rend); ?></span>
	    </div>
	  </div>
	  <div class="col-xs-4 col-sm-5">
	    <span class="lin2">Rendimiento en visitas</span>
	  </div>
	</div>
	  <div class="clearfix visible-xs"></div>
	</div>
      </div>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
      <script src="js/vendor/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
    </body>
  </html>
  <?php
}
else {
    ?>
    <!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="cleartype" content="on">
            <meta name="MobileOptimized" content="320">
            <meta name="HandheldFriendly" content="True">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="http://parquesalegres.org/wp-admin/css/login.min.css?ver=4.4.2" rel="stylesheet" type="text/css" />
            <title>S.E.S.P</title>
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
        <body class="login login-action-login wp-core-ui  locale-es-es">
            <div id="login"><center><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png"></center>
            <?php
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