<?php
if($_POST['cmd']==22){
    require_once('wp-config.php');
    $cat=$_POST['cat'];
    $args=array('post_status'=>'publish','post_type'=>'proveedor','posts_per_page'=>-1,'tax_query'=>array(array('taxonomy'=>'categoria_proveedores','field'=>'slug','terms'=> $cat)));
    $loop = new WP_Query( $args );
    if($loop->have_posts()){
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $postid=get_the_ID();
            echo '<div style="height:100px;line-height:100px;">
                <a href="'; echo get_permalink(); echo '">'; 
                if ( get_post_meta( $postid, '_provider_logo', true )){
                    $images = get_post_meta( $postid, '_provider_logo' );
                    echo pods_image( $images[0],'','','style=width:100px;height:100%;float:left;');
                }
                echo the_title(); 
                echo'</a></div><div style="clear:both;"><br>';
            wp_reset_query(); ?>
        <?php endwhile;
    }
    else{
        echo 'No hay proveedores en la categoría seleccionada.';
    }
    exit();
}
if($_POST['cmd']==66){
    require_once('wp-config.php');
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
    if($_POST['limit']==1){
        $np=-1;
    }
    else{
        $np=6;
    }
    if(($_POST['proposito']!="") || ($_POST['tipo']!="" && $_POST['tipo']!="0") || ($_POST['parque']!="")){
        if($_POST['proposito']!=""){
            $filterpro=array('key'=>'_cmb_event_proposito','value'=>$_POST['proposito'],'compare'=>'=',);
        }
        if($_POST['tipo']!="" && $_POST['tipo']!="0"){
            $filtertip=array('key'=>'_cmb_event_type','value'=>$_POST['tipo'],'compare'=>'=',);
        }
        if($_POST['parque']!=""){
            $filterpar=array('key'=>'_cmb_parque','value'=>$_POST['parque'],'compare'=>'=',);
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => $np, 'meta_query'=>array(
            $filterpro,$filtertip,$filterpar));
    }else{
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => $np);
    }
    $loop = new WP_Query( $args );
    if($loop->have_posts()){
        $n=0;
        $n2=0;
        echo '<div class="row">';
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $postid=get_the_ID();
            echo '<div class="col-xs-12 col-sm-6 col-md-4">
                <a href="'; echo get_permalink(); echo '">'; echo the_title('<h4>','</h4>'); echo '<br>';
                $sqlig="SELECT p.guid FROM wp_postmeta pm INNER JOIN wp_posts p ON pm.meta_value=p.ID WHERE pm.meta_key='_cmb_gallery' AND pm.meta_value!='' AND pm.post_id='".$postid."'";
                $resig=mysql_query($sqlig);
                if (mysql_num_rows($resig)>0){
                    $rowig=mysql_fetch_array($resig);
                    echo '<center><img src="'.$rowig['guid'].'" style="max-width:260px;max-height:200px;"><br></center>';
                }
                else{
                    $sqli="select meta_value from wp_postmeta WHERE post_id='".$postid."' AND meta_key='_cmb_imagenes'";
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
                                    echo '<center><img src="http://parquesalegres.org/tablet/tangibles/'.$imgstang[0].'" style="max-width:260px;max-height:200px;"><br></center>';
                                }
                            }
                            else{
                                echo '<center><img src="http://parquesalegres.org/tablet/experiencias_exitosas/'.$imgs[0].'" style="max-width:260px;max-height:200px;"><br></center>'; 
                            }
                        }
                    }
                }
                echo '</a>';
                $sqle="select meta_value from wp_postmeta WHERE post_id='".$postid."' AND meta_key='_cmb_actividades'";
                $rese=mysql_query($sqle);
                if(mysql_num_rows($rese)>0){
                    $rowe=mysql_fetch_array($rese);
                    if($rowe['meta_value']!=""){
                        echo mytruncate($rowe['meta_value'],140);
                    }
                }
            echo '</div><div class="clearfix visible-xs"></div>';
            $n++;
            $n2++;
            if($n2==2){
                echo '<div class="clearfix visible-sm"></div>';
            }
            if($n==3){
                echo '<div class="clearfix visible-md"></div><div class="clearfix visible-lg"></div>';
                $n=0;
            }
            wp_reset_query(); ?>
        <?php endwhile;
        echo '</div><br><br>'; if($np>1){echo '<center><input type="button" class="button" value="Ver más" onclick="buscar(1);"></center>';}
    }
    else{
        echo 'No hay resultados con los criterio seleccionados, te recomendamos ampliar la búsqueda.';
    }
    exit();
}
if($_POST['cmd']==3){
    require_once('wp-config.php');
    $filtro="";
    if($_POST['estado']>0){
        $filtro=" AND m.meta_value='".$_POST['estado']."'";
    }
    $sql="select m.* from wp_posts p INNER JOIN wp_postmeta m ON m.post_id=p.id WHERE p.post_type='proveedor' AND p.post_status='publish' AND m.meta_key='_provider_origen' $filtro";
    $res=mysql_query($sql);
    //echo $sql;
    $catalma=array();
    while($row=mysql_fetch_array($res)){
        $cats=get_the_terms($row['post_id'],'categoria_proveedores');
        $cats=array_filter($cats);
        if(!empty($cats)){
            foreach($cats as $k=>$v){
                if($catalma[$v->term_id]==""){
                    $catalma[$v->term_id]=$v->name;
                }
            }
        }
    }
    $catalma=array_filter($catalma);
    foreach($catalma as $llave=>$valor){
        if($valor!=""){
            echo $llave.":".$valor.",";
        }
    }
    exit();
}
if($_POST['cmd']==1){
    //viene de experiencias exitosas
    // Guardar los datos recibidos en variables:
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $nexpe = $_POST['nexpe'];
    $link = $_POST['link'];
    // Definir el correo de destino:
    $dest = "armandogamezcaballero@gmail.com";  
    // Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
    $headers = "From: Parques Alegres <contacto@parquesalegres.org>\r\n"  .
    "CC: ".$_POST['asesor'].",".$_POST['contacto']."\r\n";  
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Aqui definimos el asunto y armamos el cuerpo del mensaje
    $asunto = "Solicitud de información - Experiencias exitosas";
    $cuerpo = "Nombre: ".$nombre."<br>";
    $cuerpo .= "Email: ".$email."<br>";
    $cuerpo .= "Telefono: ".$telefono."<br>";
    $cuerpo .= "Mensaje: ".$mensaje."<br>";
    $cuerpo .= "Nombre de la experiencia exitosa: <a href='".$link."' target='_blank'>".$nexpe."</a>";
}
if($_POST['cmd']==2){
    //viene de proveedores
    // Guardar los datos recibidos en variables:
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    // Definir el correo de destino:
    $dest = "armandogamezcaballero@gmail.com";  
    // Estas son cabeceras que se usan para evitar que el correo llegue a SPAM:
    $headers = "From: Parques Alegres <contacto@parquesalegres.org>\r\n"  .
    "CC: ".$_POST['emailproveedor']."\r\n"    .
    "BCC: gudart@parquesalegres.org\r\n";  
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Aqui definimos el asunto y armamos el cuerpo del mensaje
    $asunto = "Cotización para Proveedor ".$_POST['proveedor'];
    $cuerpo = "Nombre: ".$nombre."<br>";
    $cuerpo .= "Email: ".$email."<br>";
    $cuerpo .= "Telefono: ".$telefono."<br>";
    $cuerpo .= "Al proveedor: ".$_POST['proveedor']."<br>";
    $cuerpo .= "Mensaje: ".$mensaje;    
}
// Esta es una pequena validación, que solo envie el correo si todas las variables tiene algo de contenido:
if($nombre != '' && $email != '' && $telefono != '' && $mensaje != ''){
    mail($dest,$asunto,$cuerpo,$headers); //ENVIAR!
}
?>