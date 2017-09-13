<?php
/*
Template Name: Listado Experiencias
*/
?>
<!--<p style="text-align: justify;">Desempeñar la labor de Asesor de un Comité Ciudadano es una labor compleja, de reflexión, que requiere el manejo de una diversidad de conocimientos, entre los cuales mencionamos los componentes de un parque, las dificultades que este y sus usuarios pudieran enfrentar. De esta manera, la labor de asesoría consiste en orientar a los usuarios de un parque, sobre cómo participar en y con la comunidad en la búsqueda de solución a los problemas que en un momento dado pudiera presentar un parque, bajo el marco de sus derechos y responsabilidades ciudadanas.</p>
<p style="text-align: justify;">Considerando lo anterior, se visualiza la labor de un Asesor de Comité Ciudadano de un Parque Urbano, como una labor de liderazgo comunitario que implica el dominio de competencias de comunicación, negociación y mediación, manejo de grupos y de metodología básica de intervención social, como es el modelo de intervención ciudadana de Parques Alegres.</p>
<p style="text-align: justify;">Invitamos a que puedan conocer a fondo el programa de capacitación de asesores y así desarrollar aún más habilidades y destrezas que ayuden en nuestra labor como asesores y llegar a promover aún más el mejoramiento de la sociedad.</p>

<h2>Objetivo General del programa.</h2>
<p style="text-align: justify;">Los participantes aplicarán en su práctica de Asesor de Parques, las competencias de Liderazgo Social que requiere el Modelo de Intervención Ciudadana de Parques Alegres.</p>
El programa está organizado en dos etapas:
<ul>
  <li>Primera etapa: Competencias básicas de un asesor ciudadano</li>
  <li>Segunda Etapa: Fortalecimiento de las competencias de asesoría ciudadana.</li>
</ul>
A continuación se presentan las características generales del programa.
<ul>
  <li><a href="http://parquesalegres.org/areas-del-conocimiento-que-aborda-el-programa/">Áreas del conocimiento que aborda el programa</a>.</li>
  <li><a href="http://parquesalegres.org/primera-etapa-de-cursos-para-capacitacion-de-asesores-de-comites/">Cursos de la primera etapa</a>.</li>
  <li><a href="http://parquesalegres.org/segunda-etapa-de-cursos-para-capacitacion-de-asesores-de-comites/">Cursos segunda etapa</a>.</li>
  <li><a href="http://parquesalegres.org/acreditacion-de-los-cursos-para-capacitacion-de-asesores-de-comites/">Acreditación de los cursos</a>.</li>
</ul>
<h2>Manual de operación de Parques Alegres</h2>
-Manual operativo de Parques Alegres
<ul>
  <li> <a href="http://parquesalegres.org/wp-content/uploads/2015/09/ETAPA-I-manual.pdf">Etapa 1</a></li>
</ul>
-Procesos operativos de Parques Alegres
<ul>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-001-Activaciones.docx">PRO Activaciones</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-002-Atención-a-Solicitudes_.docx">PRO Atención a Solicitudes_</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-003-Documentación-de-Experiencias-Exitosas.docx">PRO Documentación de Experiencias Exitosas</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-004-Formación-de-Comités-1.docx">PRO Formación de Comités</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-005-Juntas-de-Comité.docx">PRO Juntas de Comité</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-006-Medición-de-Parámetros-de-Parques.docx">PRO Medición de Parámetros de Parques</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-007-Proyecto-de-Reciclaje.docx">PRO Proyecto de Reciclaje</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/05/PRO-PA-AAC-008-Voluntariado.docx">PRO Voluntariado</a></li>
</ul>
-Manual para comité ciudadano
<ul>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/11/Modulo-1.-Como-formar-un-comité-ciudadano.pdf">Módulo 1-¿Cómo formar un comité?</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/10/Modulo-2.-Comomanejarunajuntadecomité.pdf">Módulo 2-¿Cómo manejar una junta de comité?</a></li>
  <li><a href="http://parquesalegres.org/wp-content/uploads/2015/10/Módulo-3.-Identifica-las-áreas-de-oport-de-tu-parque.pdf">Módulo 3-Identificar las áreas de oportunidad de tu parque</a></li>
</ul>
&nbsp; -->
<?php 
get_header(); 
$prop=array(50=>"Áreas verdes",51=>"Infraestructura y mobiliario",52=>"Ingresos",53=>"Tejido social",54=>"Organización");
$proposito=array(1=>"Gestión con Empresa",2=>"Gestión con H. Ayuntamiento", 3=>"Infraestructura y mobiliario", 4=>"Ingresos", 5=>"Tejido social", 6=>"Organización",50=>"Áreas verdes",51=>"Infraestructura y mobiliario",52=>"Ingresos",53=>"Tejido social",54=>"Organización");
$subtipo=array(1=>array(1=>"Alumbrado",2=>"Arborización",3=>"Diseño de sistema de riego",4=>"Donación de PET",5=>"Murales",6=>"Pintura",7=>"Proyecto arquitectónico",8=>"Proyecto ejecutivo",9=>"Proyecto EVA",10=>"Voluntariado"),2=>array(1=>"Alumbrado",2=>"Arborización",3=>"Denuncia ciudadana formal",4=>"Jornada de limpieza",5=>"Pintura",6=>"Proyecto arquitectónico",7=>"Toma de agua",8=>"Visita a cabildo abierto"),3=>array(1=>"Arborización",2=>"Mesa de ping pong",3=>"Fertilización",4=>"Fumigación",5=>"Instalación de infraestructura",6=>"Limpieza del parque",7=>"Poda",8=>"Reglamento de orden",9=>"Riego"),4=>array(1=>"Activación por empresas y/o instituciones",2=>"Actividad para generar ingresos",3=>"Carrera pedestre",4=>"Cooperación vecinal",5=>"Días festivos",6=>"Función de cine",7=>"Kermesse",8=>"Kermesse cultural",9=>"Noche bohemia",10=>"Programa de reciclaje Ecoce o programa externo",11=>"Rifa",12=>"Tianguis",13=>"Torneos"),5=>array(1=>"Actividades deportivas",2=>"Asistencia a juego de Dorados",3=>"Campamentos",4=>"Carrera pedestre",5=>"Cooperación vecinal",6=>"Cursos y talleres",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Muestra gastronómica",12=>"Noche bohemia",13=>"Pláticas",14=>"Rifa",15=>"Tianguis",16=>"Torneos",17=>"Visita Jardín Botánico de Culiacán",18=>"Visita MIA"),6=>array(1=>"Asistencia a cursos P.A (será un tangible por parque)",2=>"Calendario de actividades",3=>"Club guardianes del parque",4=>"Comité de ninos",5=>"Contratación del jardinero",6=>"Correo electrónico formal",7=>"Creación de comité",8=>"Creación de logo del parque",9=>"Cuenta de Facebook",10=>"Cuenta de Whatsapp",11=>"Cuenta mancomunada",12=>"Difusión de medios",13=>"Elaborar expedientes de evidencia",14=>"Formalización de comité ante H. Ayuntamiento",15=>"Hojas membretadas",16=>"Plan de mantenimiento del parque",17=>"Recibos de dinero institucional",18=>"Reestructuración de comité",19=>"Rendición de cuentas general",20=>"Sello del parque",21=>"Uniforme",22=>"Visión del espacio"),50=>array(1=>"Proyecto arquitectónico",2=>"Plantas de ornato",3=>"Arborización",4=>"Poda",5=>"Cursos, plática y talleres",6=>"Jornada de limpieza",7=>"Fumigación",8=>"Fertilización",9=>"Proyecto EVA",10=>"Instalación de Jardín",11=>"Huerto",12=>"Voluntariado"),51=>array(1=>"Proyecto arquitectónico",2=>"Jornada de limpieza",3=>"Mantenimiento de infraestructura",4=>"Pintura",5=>"Toma de agua",6=>"Alumbrado",7=>"Reglamento de orden",8=>"Mesa de ping pong",9=>"Instalación de infraestructura",10=>"Murales",11=>"Proyecto ejecutivo",12=>"Proyecto EVA",13=>"Sistema de riego",14=>"Sistema de riego por goteo",15=>"Nivelación del terreno",16=>"Donación de PET",17=>"Voluntariado"),52=>array(1=>"Programa de reciclaje Ecoce o programa externo",2=>"Actividad para generar ingresos",3=>"Cursos, plática y talleres",4=>"Activación por empresas y/o instituciones",5=>"Carrera pedestre",6=>"Cooperación vecinal",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Noche bohemia",12=>"Rifa",13=>"Tianguis",14=>"Torneos",15=>"Productos elaborados por el comité"),53=>array(1=>"Campamentos",2=>"Cursos, plática y talleres",3=>"Muestra gastronómica",4=>"Visita MIA",5=>"Visita Jardín Botánico de Culiacán",6=>"Asistencia a juego de Dorados",7=>"Carrera pedestre",8=>"Días festivos",9=>"Función de cine",10=>"Kermesse",11=>"Kermesse cultural",12=>"Noche bohemia",13=>"Rifa",14=>"Tianguis",15=>"Torneos"),54=>array(1=>"Club guardianes del parque",2=>"Denuncia ciudadana formal",3=>"Creación de comité",4=>"Visita a cabildo abierto",5=>"Formalización de comité ante H. Ayuntamiento",6=>"Reestructuración de comité",7=>"Cuenta de Facebook",8=>"Calendario de actividades",9=>"Plan de mantenimiento del parque",10=>"Diseño participativo",11=>"Contratación del jardinero",12=>"Cuenta de Whatsapp",13=>"Creación de logo del parque",14=>"Uniforme",15=>"Rendición de cuentas general",16=>"Sello del parque",17=>"Correo electrónico formal",18=>"Recibos de dinero institucional",19=>"Cuenta mancomunada",20=>"Elaborar expedientes de evidencia",21=>"Comité de niños",22=>"Asistencia a cursos P.A (será un tangible por parque)",23=>"Hojas membretadas",24=>"Difusión de medios ",25=>"Elaboración de reglamento",26=>"Entrega de reconocimiento del parque"));
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
  $parques[$row2['ID']]=$row2['post_title'];
}
function myTruncate($string, $limit, $break=" ", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}
?>
<style>
  label {
      margin: 0px 0px 5px;
  }
  label>span {
      width: 100px;
      display: inline-block;
      text-align: right;
      padding-right: 10px;
      margin-top: 10px;
  }
  select {
      background: #FFF url("tablet/down-arrow.png") no-repeat right;
      background: #FFF url("tablet/down-arrow.png") no-repeat right);
      appearance:none;
      padding: 3px 3px 3px 5px;
      -webkit-appearance:none; 
      -moz-appearance: none;
      text-indent: 0.01px;
      text-overflow: "";
      width: 200px;
      height: 35px;
    line-height: 25px;
  }
  input[type="text"]{
      color: #555;
      padding: 3px 0px 3px 5px;
      margin-top: 2px;
      margin-right: 6px;
      margin-bottom: 16px;
      border: 1px solid #e5e5e5;
      background: #fbfbfb;
    height: 25px;
    line-height:15px;
      outline: 0;
      -webkit-box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
      box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
  }
  .button {
    background: #9DC45F;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;
  }
  .button:hover {
      background: #80A24A;
  }
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<?php
echo '<script>
  $(function() {
  });
  function buscar(i){
    $("#resultados").text("Cargando...");
    var parque = document.getElementsByName("parque")[0].value;
    var proposito = document.getElementsByName("proposito")[0].value;
    var tipo = document.getElementsByName("tipo")[0].value;
    $("#resultados").load("http://parquesalegres.org/proceso.php", {parque: parque, proposito: proposito, tipo: tipo, limit: i, cmd: 66});
  }
  function camb(i,v){
    if(i=="proposito"){
      var newOptions = {"": "-- Todos --",};
      var $el = $("#tipo");
      $el.empty();
      $.each(newOptions, function(value,key) {
          $el.append($("<option></option>").attr("value", value).text(key));
      });
      if(v==50){';
        $arrjs="";
        foreach($subtipo as $k=>$v){
          if($k==50){
            foreach($v as $key=>$value){
              $arrjs.='"'.$key.'": "'.$value.'",';
            }
          }
        }
        $arrjs=substr($arrjs, 0, -1);
        echo '
        var newOptions = {"0": "-- Todos --",
          '.$arrjs.'
        };
        var $el = $("#tipo");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        }); 
      }
      else if(v==51){';
        $arrjs="";
        foreach($subtipo as $k=>$v){
          if($k==51){
            foreach($v as $key=>$value){
              $arrjs.='"'.$key.'": "'.$value.'",';
            }
          }
        }
        $arrjs=substr($arrjs, 0, -1);
        echo '
        var newOptions = {"0": "-- Todos --",
          '.$arrjs.'
        };
        var $el = $("#tipo");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        }); 
      }
      else if(v==52){';
        $arrjs="";
        foreach($subtipo as $k=>$v){
          if($k==52){
            foreach($v as $key=>$value){
              $arrjs.='"'.$key.'": "'.$value.'",';
            }
          }
        }
        $arrjs=substr($arrjs, 0, -1);
        echo '
        var newOptions = {"0": "-- Todos --",
          '.$arrjs.'
        };
        var $el = $("#tipo");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        }); 
      }
      else if(v==53){';
        $arrjs="";
        foreach($subtipo as $k=>$v){
          if($k==53){
            foreach($v as $key=>$value){
              $arrjs.='"'.$key.'": "'.$value.'",';
            }
          }
        }
        $arrjs=substr($arrjs, 0, -1);
        echo '
        var newOptions = {"0": "-- Todos --",
          '.$arrjs.'
        };
        var $el = $("#tipo");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        }); 
      }
      else if(v==54){';
        $arrjs="";
        foreach($subtipo as $k=>$v){
          if($k==54){
            foreach($v as $key=>$value){
              $arrjs.='"'.$key.'": "'.$value.'",';
            }
          }
        }
        $arrjs=substr($arrjs, 0, -1);
        echo '
        var newOptions = {"0": "-- Todos --",
          '.$arrjs.'
        };
        var $el = $("#tipo");
        $el.empty();
        $.each(newOptions, function(value,key) {
            $el.append($("<option></option>").attr("value", value).text(key));
        }); 
      }
    }
  }
</script>';?>
<!-- MAIN CONTENT -->
<div class="main" role="main">
  <div class="top bg-provide"></div>
  <h1 class="title-section">
    <span><?php the_title(); ?></span>
  </h1>
  <div>
    <h2>¿Qué es una experiencia exitosa?</h2>
    <p>Es una actividad digna de replicar que los comités de parques han logrado con su esfuerzo y organización. Teniendo un impacto positivo en la comunidad.
    <strong>¡Tu quieres formar parte de una experiencia exitosa en tu parque!</strong><br><br>
    En este espacio mostramos algunas de las actividades que más éxito han tenido y te invitamos a que explores cada una para replicarlas en tu parque. 
    <i>Cada actividad se realiza con un propósito de mejora específico, nosotros las dividimos en cinco secciones: <strong>Áreas verdes, infraestructura y mobiliario, ingresos, tejido social y organización.</strong> Sigue su ejemplo y apoya a un parque.</i></p>
  </div>
  <div>
    <label>
      <span>Propósito: </span><select name="proposito" id="proposito" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>
        <?php foreach($prop as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }?>
      </select>
    </label>
    <label>
      <span>Tipo: </span><select name="tipo" id="tipo"><option value=""> -- Todos -- </option></select>
    </label>
    <label>
      <span>Parque:</span><select name="parque" id="parque"><option value=""> -- Todos -- </option>
      <?php foreach($parques as $k=>$v){
        echo '<option value="'.$k.'">'.$v.'</option>';    
      }?>
      </select>
    </label><br><br>
    <center><input type="button" class="button" value="Filtrar" onclick="buscar();"></center><br>
  </div>
  <div id="resultados">
    <h3 align="right">Más recientes</h3>
    <?php
    $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 6);
    $loop = get_posts( $args );
    if($loop){
      $n=0;
      $n2=0;
      echo '<div class="row">';
      foreach ($loop as $k => $v) {
        echo '<div class="col-xs-12 col-sm-6 col-md-4">
          <h4><a href="'; echo get_permalink($v->ID); echo '">'; echo get_the_title($v->ID); echo '</h4><br>';
          if ( get_post_meta( $v->ID, '_cmb_gallery', true )){
            $images = get_post_meta( $v->ID, '_cmb_gallery' );
            echo '<center>'.pods_image( $images[0],'','','style=max-width:260px;max-height:200px;').'</center><br>';
          }
          else{
            $sqli="select meta_value from wp_postmeta WHERE post_id='".$v->ID."' AND meta_key='_cmb_imagenes'";
            $resi=mysql_query($sqli);
            if(mysql_num_rows($resi)>0){
              $rowi=mysql_fetch_array($resi);
              if($rowi['meta_value']!=""){
                $uploads_dir = getcwd().'/experiencias_exitosas';
                $imgs=explode(",",$rowi['meta_value']);
                $sip=strpos($imgs[0], "|");
                if($sip!==false){
                  $imgstang=explode("|",$imgs[0]);
                  if($imgstang[0]!=""){
                    echo '<center><img src="http://parquesalegres.org/tablet/tangibles/'.$imgstang[0].'" style="max-width:260px;max-height:200px;"></center><br>';
                  }
                }
                else{
                  echo '<center><img src="http://parquesalegres.org/tablet/experiencias_exitosas/'.$imgs[0].'" style="max-width:260px;max-height:200px;"></center><br>'; 
                }
              }
            }
          }
          echo '</a>'.mytruncate(get_post_meta($v->ID, "_cmb_actividades", true),140);
        echo '</div><div class="clearfix visible-xs"></div>';
        $n++;
        $n2++;
        if($n2==2){
            echo '<div class="clearfix visible-sm"></div>';
            $n2=0;
        }
        if($n==3){
            echo '<div class="clearfix visible-md"></div><div class="clearfix visible-lg"></div>';
            $n=0;
        }
      }
      echo '</div><br><br><center><input type="button" class="button" value="Ver más" onclick="buscar(1);"></center>';
    }
    ?>
  </div>
</div>
<?php get_footer(); ?>