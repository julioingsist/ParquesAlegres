<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
if (is_user_logged_in()){
    $user = wp_get_current_user();
    $asesores=array();
    $sql="select ID,cod from asesores where cod>0 and stat<2";
    $res=mysql_query($sql);
    while($row=mysql_fetch_array($res)) {
            $asesores[$row['cod']]=$row['ID'];
    }
    $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".trim($user->ID)."' order by post_title ASC";
    $res0=mysql_query($sql0);
    while($row0=mysql_fetch_array($res0)){
            $parque[$row0["id"]]=$row0["post_title"];
        //echo $row0["post_title"].'<br>';
    }
    $tipoasentamiento=array(1=>"Aeropuerto",2=>"Ampliación",3=>"Barrio",4=>"Cantón",5=>"Ciudad",6=>"Ciudad industrial",7=>"Colonia",8=>"Condominio",9=>"Conjunto habitacional",
                            10=>"Corredor industrial",11=>"Coto",12=>"Cuartel",13=>"Ejido",14=>"Exhacienda",15=>"Fracción",16=>"Fraccionamiento",17=>"Granja",18=>"Hacienda",
                            19=>"Ingenio",20=>"Manzana",21=>"Paraje",22=>"Parque Industrial",23=>"Privada",24=>"Prolongación",25=>"Pueblo",26=>"Puerto",27=>"Ranchería",
                            28=>"Rancho",29=>"Región",30=>"Residencial",31=>"Rinconada",32=>"Sección",33=>"Sector",34=>"Supermanzana",35=>"Unidad",36=>"Unidad Habitacional",
                            37=>"Villa",38=>"Zona Federal",39=>"Zona Industrial",40=>"Zona Militar",41=>"Zona Naval");
    echo '<!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="cleartype" content="on">
            <meta name="MobileOptimized" content="320">
            <meta name="HandheldFriendly" content="True">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">';
    if($_POST['parque']){
        $parquen="-- N U E V O --";
        echo '<link href="form_style_mob2.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>';
        if($_POST['parque']>0){
            $parquen=$parque[$_POST['parque']];
        }
        echo '<title>PA:'.$parquen.'</title>
        <link type="text/css" rel="stylesheet" href="slideout-0.1.9/index.css" />
        <script src="slideout-0.1.9/dist/slideout.min.js"></script>
        <script src="validate.min.js"></script>
        <script>
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo es obligatorio."
        });
        </script>';
        echo '</head>
        <body>
        <nav id="menu" class="menu">
            <section class="menu-section">
                <h3 class="menu-section-title">Visita</h3>
                <ul class="menu-section-list">
                    <li><a href="javascript:void(0)" onclick="cambio(1)">Calificación</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(8)">Asistencia</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(3)">Compromisos</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(6)">Experiencia Exitosa</a></li>
                </ul>
            </section>
            <section class="menu-section">
                <h3 class="menu-section-title">Parque</h3>
                <ul class="menu-section-list">
                    <li><a href="javascript:void(0)" onclick="cambio(4)">Datos del Parque</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(5)">Check list</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(10)">Nueva Infraestructura</a></li>
                    <li><a href="javascript:void(0)" onclick="cambio(2)">Datos del Comité</a></li>
                </ul>
            </section>
        </nav>
        <main id="main" class="panel">
            <header>
                <span class="toggle-button" style="cursor:pointer;">☰ Menú</span>
            </header>
            <div id="partit"><span>Parque: </span><strong>'.$parquen.' </strong>&nbsp;<a href="'; echo get_permalink($_POST['parque']); echo '" target="_blank">Ver parque en el sitio web</a></div><br><br>';
            if($_POST['parque']>0){
                $sqlp="select key1.post_title as parque, key2.meta_value as vialidadprin, key3.meta_value as vialidad1, key4.meta_value as vialidad2, key5.meta_value as vialidadpos,
                key6.meta_value as tipoa, key7.meta_value as noma, key8.meta_value as descubic, key9.meta_value as sector, key10.meta_value as zona, key11.meta_value as nivel,
                key12.meta_value as regimen, key13.meta_value as legal, key14.meta_value as tipo, key15.meta_value as estado, key16.meta_value as ciudad, key17.meta_value as localidad,
                key18.meta_value as apoyado, key19.meta_value as observaciones from wp_posts key1
                LEFT JOIN wp_postmeta key2 ON key1.id = key2.post_id AND key2.meta_key = '_parque_vialidad_prin'
                LEFT JOIN wp_postmeta key3 ON key1.id = key3.post_id AND key3.meta_key = '_parque_vialidad1'
                LEFT JOIN wp_postmeta key4 ON key1.id = key4.post_id AND key4.meta_key = '_parque_vialidad2'
                LEFT JOIN wp_postmeta key5 ON key1.id = key5.post_id AND key5.meta_key = '_parque_vialidad_pos'
                LEFT JOIN wp_postmeta key6 ON key1.id = key6.post_id AND key6.meta_key = '_parque_tipoasentamiento'
                LEFT JOIN wp_postmeta key7 ON key1.id = key7.post_id AND key7.meta_key = '_parque_nomasentamiento'
                LEFT JOIN wp_postmeta key8 ON key1.id = key8.post_id AND key8.meta_key = '_parque_desc_ubic'
                LEFT JOIN wp_postmeta key9 ON key1.id = key9.post_id AND key9.meta_key = '_parque_sec'
                LEFT JOIN wp_postmeta key10 ON key1.id = key10.post_id AND key10.meta_key = '_parque_zona'
                LEFT JOIN wp_postmeta key11 ON key1.id = key11.post_id AND key11.meta_key = '_parque_nivel'
                LEFT JOIN wp_postmeta key12 ON key1.id = key12.post_id AND key12.meta_key = '_parque_regimen'
                LEFT JOIN wp_postmeta key13 ON key1.id = key13.post_id AND key13.meta_key = '_parque_legal'
                LEFT JOIN wp_postmeta key14 ON key1.id = key14.post_id AND key14.meta_key = '_parque_tipo'
                LEFT JOIN wp_postmeta key15 ON key1.id = key15.post_id AND key15.meta_key = '_parque_estado'
                LEFT JOIN wp_postmeta key16 ON key1.id = key16.post_id AND key16.meta_key = '_parque_ciudad'
                LEFT JOIN wp_postmeta key17 ON key1.id = key17.post_id AND key17.meta_key = '_parque_localidad'
                LEFT JOIN wp_postmeta key18 ON key1.id = key18.post_id AND key18.meta_key = '_parque_seg'
                LEFT JOIN wp_postmeta key19 ON key1.id = key19.post_id AND key19.meta_key = '_parque_obs' where id='".$_POST['parque']."'";
                $resp=mysql_query($sqlp);
                $rowp=mysql_fetch_array($resp);
                $sqlv="select * from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";
                $resv=mysql_query($sqlv);
                $rowv=mysql_fetch_array($resv);
                $total=0;
                if(mysql_num_rows($resv)>0){
                    foreach($rowv as $k=>$v){
                        if(!is_int($k)){
                            if($k!="asesor_captura" && $k!="cve" && $k!="fec" && $k!="fecha_visita" && $k!="cve_parque" && $k!="tipoformaliza" && $k!="riego" && $k!="diario" && $k!="semana" && $k!="finsem"){
                                $total=$total+$v;
                            }
                        }
                    }
                }
                $total=round($total/7);
                echo '<div id="screen1">
                    <form name="form_calif" id="form_calif" method="post">
                        <input type="hidden" name="parque" value="'.$_POST['parque'].'">
                        <h1>Evaluación
                            <span>Califique los parametros del parque</span>
                        </h1>
                        <label for="fecha_visita">Fecha de la visita: </label>
                        <input name="fecha_visita" type="date" id="fecha_visita" value="'.date("Y-m-d").'" max="'.date("Y-m-d").'">
                        <label for="visita">Tipo de visita: </label>
                        <select name="visita" onchange="change_vis(this.value);" class="required"><option value="" selected> -- Seleccione --</option>
                            <option value="prospectacion">Prospectacion</option>
                            <option value="seguimiento">Seguimiento</option>
                            <option value="reforzamiento">Reforzamiento</option>
                        </select>
                        <label for="clasvisita">Clasificación de visita: </label>
                        <select name="clasvisita" id="clasvisita" onchange="change_clas(this.value);" class="required"><option value="" selected> -- Seleccione --</option>
                            <option value="1">Repartir volantes</option>
                            <option value="2">Formación del comité</option>
                            <option value="3">Reestructuración del comité</option>
                            <option value="4">Elaboración de la visión del espacio</option>
                            <option value="5">Presentación de la visión del espacio a los vecinos</option>
                            <option value="6">Reestructuración de la visión del espacios</option>
                            <option value="7">Presentación del diseño del espacio a los vecinos</option>
                            <option value="8">Eventos organizados por el comité</option>
                            <option value="9">Eventos rganizados por parques alegres</option>
                            <option value="10">Talleres</option>
                            <option value="11">Elaboración del calendario anual de actividades</option>
                            <option value="12">Presentación de la planeación del calendario anual de actividades</option>
                            <option value="13">Asesoría para realizar el reglamento de orden</option>
                            <option value="14">Elaboración de carpetas para rifa</option>
                        </select>
                        <div id="otrolabel" style="display:none;">
                            <label for="otroclaslabel">Otro:</label>
                            <input type="text" name="otroclas" id="otroclas">
                        </div>
                        <div id="logro_visita" style="display:none;">
                            <label for="logro">Se logró el objetivo: </label>
                            <select id="logro" name="logro"><option value=""> -- Seleccione -- </option>
                                <option value="Sí">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div id="normal">
                        Calificación: <span ';
                        if($total>80){
                            echo 'style="color:green;"';
                        }
                        else if($total>59){
                            echo 'style="color:orange;"';
                        }
                        else{
                            echo 'style="color:red;"';
                        }
                        echo '><b>'.$total.'</b></span><br>
                        <h2>Comité</h2>
                        </div>
                        <div align="center"><div style="display:inline-block;">
                            <input type="hidden" name="cmd">
                            <input type="hidden" name="asesor" value="'.$user->ID.'">
                            <input class="button" type="submit" value="Guardar Calificación" name="guardar_calif" id="guardar_calif">
                        </div>
                        <div id="success_calif" style="display:inline-block;"></div></div>
                    </form>
                </div>';
            }
            echo '<div id="screen4">
                <form name="form_parque" id="form_parque" method="post">
                    <input type="hidden" name="parque" value="'.$_POST['parque'].'">
                    <h1>Datos del Parque</h1>
                    <div id="lparque"><label for="parque">Nombre del Parque:</label>
                    <input type="text" name="nom_parque" class="required" id="parque" value="'.$rowp['parque'].'"'; if($rowp['parque']!=""){ echo 'disabled'; } echo ' required/></div>
                    <label for="vialidadprin">Vialidad Principal:</label>
                    <input name="vialidadprin" id="vialidadprin" type="text" value="'.$rowp['vialidadprin'].'"'; if($rowp['vialidadprin']!=""){ echo 'readonly'; } echo '>
                    <label for="vialidad1">Vialidad 1:</label>
                    <input name="vialidad1" id="vialidad1" type="text" value="'.$rowp['vialidad1'].'"'; if($rowp['vialidad1']!=""){ echo 'readonly'; } echo '>
                    <label for="vialidad2">Vialidad 2:</label>
                    <input name="vialidad2" id="vialidad2" type="text" value="'.$rowp['vialidad2'].'"'; if($rowp['vialidad2']!=""){ echo 'readonly'; } echo '>
                    <label for="vialidadpos">Vialidad Posterior:</label>
                    <input name="vialidadpos" type="text" value="'.$rowp['vialidadpos'].'"'; if($rowp['vialidadpos']!=""){ echo 'readonly'; } echo '>
                    <label for="tipoasentamiento">Tipo asentamiento:</label>
                    <select name="tipoasentamiento" id="tipoasentamiento"'; if($rowp['tipoa']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected> -- Seleccione -- </option>';
                        foreach($tipoasentamiento as $k=>$v){
                            echo '<option value="'.$k.'"'; if($k==$rowp['tipoa']){ echo ' selected';} echo '>'.$v.'</option>';
                        }
                    echo '</select>
                    <label for="nomasentamiento">Nombre asentamiento:</label>
                    <input name="nomasentamiento" id="nomasentamiento" type="text" value="'.$rowp['noma'].'"'; if($rowp['noma']!=""){ echo 'readonly'; } echo '>
                    <label for="descubic">Descripción de ubicación:</label>
                    <textarea name="descubic" id="descubic"'; if($rowp['descubic']!=""){ echo 'readonly'; } echo '>'.$rowp['descubic'].'</textarea>
                    <label for="zona">Zona:</label>
                    <select name="zona" id="zona"'; if($rowp['zona']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1"'; if($rowp['zona']=="1"){ echo ' selected'; } echo '>Noreste (NE)</option>
                        <option value="2"'; if($rowp['zona']=="2"){ echo ' selected'; } echo '>Noroeste (NO)</option>
                        <option value="3"'; if($rowp['zona']=="3"){ echo ' selected'; } echo '>Sureste (SE)</option>
                        <option value="4"'; if($rowp['zona']=="4"){ echo ' selected'; } echo '>Suroeste (SO)</option>
                    </select>
                    <label for="sector">Sector:</label>
                    <input name="sector" id="sector" type="text" value="'.$rowp['sector'].'"'; if($rowp['sector']!=""){ echo 'readonly'; } echo '>
                    <label for="state">Estado:</label>
                    <select name="state" id="state" onchange="addsel(5);"'; if($rowp['estado']!=""){ echo 'disabled'; } echo '>
                    <option value=""> -- Seleccione -- </option>
                    <option value="1"'; if($rowp['estado']=="1"){ echo ' selected'; } echo '>Aguascalientes</option>
                    <option value="2"'; if($rowp['estado']=="2"){ echo ' selected'; } echo '>Baja California</option>
                    <option value="3"'; if($rowp['estado']=="3"){ echo ' selected'; } echo '>Baja California Sur</option>
                    <option value="4"'; if($rowp['estado']=="4"){ echo ' selected'; } echo '>Campeche</option>
                    <option value="5"'; if($rowp['estado']=="5"){ echo ' selected'; } echo '>Coahuila de Zaragoza</option>
                    <option value="6"'; if($rowp['estado']=="6"){ echo ' selected'; } echo '>Colima</option>
                    <option value="7"'; if($rowp['estado']=="7"){ echo ' selected'; } echo '>Chiapas</option>
                    <option value="8"'; if($rowp['estado']=="8"){ echo ' selected'; } echo '>Chihuahua</option>
                    <option value="9"'; if($rowp['estado']=="9"){ echo ' selected'; } echo '>Distrito Federal</option>
                    <option value="10"'; if($rowp['estado']=="10"){ echo ' selected'; } echo '>Durango</option>
                    <option value="11"'; if($rowp['estado']=="11"){ echo ' selected'; } echo '>Guanajuato</option>
                    <option value="12"'; if($rowp['estado']=="12"){ echo ' selected'; } echo '>Guerrero</option>
                    <option value="13"'; if($rowp['estado']=="13"){ echo ' selected'; } echo '>Hidalgo</option>
                    <option value="14"'; if($rowp['estado']=="14"){ echo ' selected'; } echo '>Jalisco</option>
                    <option value="15"'; if($rowp['estado']=="15"){ echo ' selected'; } echo '>México</option>
                    <option value="16"'; if($rowp['estado']=="16"){ echo ' selected'; } echo '>Michoacán de Ocampo</option>
                    <option value="17"'; if($rowp['estado']=="17"){ echo ' selected'; } echo '>Morelos</option>
                    <option value="18"'; if($rowp['estado']=="18"){ echo ' selected'; } echo '>Nayarit</option>
                    <option value="19"'; if($rowp['estado']=="19"){ echo ' selected'; } echo '>Nuevo León</option>
                    <option value="20"'; if($rowp['estado']=="20"){ echo ' selected'; } echo '>Oaxaca</option>
                    <option value="21"'; if($rowp['estado']=="21"){ echo ' selected'; } echo '>Puebla</option>
                    <option value="22"'; if($rowp['estado']=="22"){ echo ' selected'; } echo '>Querétaro</option>
                    <option value="23"'; if($rowp['estado']=="23"){ echo ' selected'; } echo '>Quintana Roo</option>
                    <option value="24"'; if($rowp['estado']=="24"){ echo ' selected'; } echo '>San Luis Potosí</option>
                    <option value="25"'; if($rowp['estado']=="25"){ echo ' selected'; } echo ' selected>Sinaloa</option>
                    <option value="26"'; if($rowp['estado']=="26"){ echo ' selected'; } echo '>Sonora</option>
                    <option value="27"'; if($rowp['estado']=="27"){ echo ' selected'; } echo '>Tabasco</option>
                    <option value="28"'; if($rowp['estado']=="28"){ echo ' selected'; } echo '>Tamaulipas</option>
                    <option value="29"'; if($rowp['estado']=="29"){ echo ' selected'; } echo '>Tlaxcala</option>
                    <option value="30"'; if($rowp['estado']=="30"){ echo ' selected'; } echo '>Veracruz de Ignacio de la Llave</option>
                    <option value="31"'; if($rowp['estado']=="31"){ echo ' selected'; } echo '>Yucatán</option>
                    <option value="32"'; if($rowp['estado']=="32"){ echo ' selected'; } echo '>Zacatecas</option>
                    </select>
                    <label for="ciudad">Municipio:</label>
                    <select name="ciudad" id="ciudad"'; if($rowp['ciudad']!=""){ echo 'disabled'; } echo '>
                        <option value=""> -- Seleccione -- </option>
                        <option value="Culiacán"'; if($rowp['ciudad']=="Culiacán"){ echo ' selected'; } echo ' selected>Culiacán</option>
                        <option value="Navolato"'; if($rowp['ciudad']=="Navolato"){ echo ' selected'; } echo '>Navolato</option>
                    </select>
                    <label for="localidad">Localidad: </label>
                    <select name="localidad" id="localidad"'; if($rowp['localidad']!=""){ echo 'disabled'; } echo '>
                        <option value=""> -- Seleccione -- </option>
                    </select>
                    <label for="nivel">Nivel socioecon&oacute;mico de la zona:</label>
                    <select name="nivel" id="nivel"'; if($rowp['nivel']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1"'; if($rowp['nivel']=="1"){ echo ' selected'; } echo '>Alto (AB)</option>
                        <option value="2"'; if($rowp['nivel']=="2"){ echo ' selected'; } echo '>Medio alto (C+)</option>
                        <option value="3"'; if($rowp['nivel']=="3"){ echo ' selected'; } echo '>Medio ( C )</option>
                        <option value="4"'; if($rowp['nivel']=="4"){ echo ' selected'; } echo '>medio bajo (D+)</option>
                        <option value="5"'; if($rowp['nivel']=="5"){ echo ' selected'; } echo '>Bajo (D)</option>
                        <option value="6"'; if($rowp['nivel']=="6"){ echo ' selected'; } echo '>Pobreza extrema (E)</option>
                    </select>
                    <label for="regimen">R&eacute;gimen del parque:</label>
                    <select name="regimen" id="regimen"'; if($rowp['regimen']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1"'; if($rowp['regimen']=="1"){ echo ' selected'; } echo '>P&uacute;blico</option>
                        <option value="2"'; if($rowp['regimen']=="2"){ echo ' selected'; } echo '>Condominal</option>
                        <option value="3"'; if($rowp['regimen']=="3"){ echo ' selected'; } echo '>Concesionado</option>
                    </select>
                    <label for="legal">Situaci&oacute;n legal del parque:</label>
                    <select name="legal" id="legal"'; if($rowp['legal']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1"'; if($rowp['legal']=="1"){ echo ' selected'; } echo '>Propiedad Gobierno Federal</option>
                        <option value="2"'; if($rowp['legal']=="2"){ echo ' selected'; } echo '>Gobierno del Estado</option>
                        <option value="3"'; if($rowp['legal']=="3"){ echo ' selected'; } echo '>Gobierno Municipal</option>
                        <option value="4"'; if($rowp['legal']=="4"){ echo ' selected'; } echo '>Propiedad Ejidal</option>
                        <option value="5"'; if($rowp['legal']=="5"){ echo ' selected'; } echo '>Propiedad Fraccionadora</option>
                    </select>
                    <label for="tipo">Tipo de parque:</label>
                    <select name="tipo" id="tipo"'; if($rowp['tipo']!=""){ echo 'disabled'; } echo '>
                        <option value="" selected=> -- Seleccione -- </option>
                        <option value="1"'; if($rowp['tipo']=="1"){ echo ' selected'; } echo '>&Aacute;rea verde</option>
                        <option value="2"'; if($rowp['tipo']=="2"){ echo ' selected'; } echo '>Centro barrio</option>
                        <option value="3"'; if($rowp['tipo']=="3"){ echo ' selected'; } echo '>De bolsillo</option>
                        <option value="4"'; if($rowp['tipo']=="4"){ echo ' selected'; } echo '>Lineal</option>
                        <option value="5"'; if($rowp['tipo']=="5"){ echo ' selected'; } echo '>Mixto</option>
                        <option value="6"'; if($rowp['tipo']=="6"){ echo ' selected'; } echo '>Parque urbano</option>
                        <option value="7"'; if($rowp['tipo']=="7"){ echo ' selected'; } echo '>Plazuela</option>
                        <option value="8"'; if($rowp['tipo']=="8"){ echo ' selected'; } echo '>Unidad deportiva</option>
                    </select>
                    <label for="apoyado" class="check">Apoyado por Parques Alegres:</label>
                    <input type="checkbox" class="megusta" value="1" name="apoyado" id="apoyado"'; if($rowp['apoyado']=="1"){ echo 'checked disabled'; } echo '>
                    <label for="obsgenerales">Observaciones generales:</label>
                    <textarea rows="4" name="obsgenerales" id="obsgenerales"'; if($rowp['observaciones']!=""){ echo 'readonly'; } echo '>'.$rowp['observaciones'].'</textarea>
                    <div align="center"><div style="display:inline-block;">
                        <input type="hidden" name="cmd">
                        <input type="hidden" name="asesor" value="'.$user->ID.'">
                        <input class="button" type="submit" value="Guardar Parque" name="guardar_parque" id="guardar_parque">
                    </div>
                    <div id="success_parque" style="display:inline-block;"></div></div>
                </form>
            </div>
        </main>';
        echo '<script>
            $(function() {
                $("#form_parque").validate({
                    errorPlacement: function (error, element) {
                        error.insertBefore(element);
                    },
                    submitHandler: function (form) {
                        $("#success_parque").html("<img src=\'cargando1.gif\'>");
                        var txtval=document.getElementById("guardar_parque").value;
                        document.getElementById("guardar_parque").value = "Enviando...";
                        document.getElementById("guardar_parque").disabled = true;
                        document.getElementsByName("cmd")[0].value=4;
                        $("input, select").attr("disabled", false);
                        $.ajax({url: "process.php",
                            data: $("#form_parque").serialize(),
                            dataType: "text",
                            type: "post",
                            success: function(result){
                                var res=result.split("|");
                                document.getElementById("guardar_parque").value = txtval;
                                document.getElementById("guardar_parque").disabled = false;
                                document.getElementById("success_parque").scrollIntoView();
                                if(res[0]=="Si"){';
                                    if($_POST['parque']>0){
                                        echo '$("#success_parque").html("<img src=\'bien.png\'> Guardado!");';
                                    }
                                    else{
                                        echo '$("#success_parque").html("<img src=\'bien.png\'> Guardado! <a href=\"javascript:void(0);\" onclick=\"irparque(\'"+res[1]+"\');\" >Ir al parque</a>");';
                                    }
                                    echo 'document.getElementById("form_parque").reset();
                                }
                                else{
                                    $("#success_parque").html("<span style=\'color:red\'>Error al guardar, reintente más tarde.</span>");
                                }
                            }});
                        return false;
                    }
                });';
                if($_POST['parque']<0){
                    echo '$("#partit").hide();
                    $(".toggle-button").hide();';
                }
                else{
                    echo '$("#screen4").hide();
                    var slideout = new Slideout({
                        "panel": document.getElementById("main"),
                        "menu": document.getElementById("menu"),
                        "padding": 256,
                        "tolerance": 70
                    });
                    document.querySelector(".toggle-button").addEventListener("click", function() {
                        slideout.toggle();
                    });
                    document.querySelector(".menu").addEventListener("click", function(eve) {
                        if (eve.target.nodeName === "A") { slideout.close(); }
                    });';
                }
                echo '
            });
            function irparque(p){
                document.getElementsByName("parque")[0].value=p;
                document.form_parque.submit();
            }
            function cambio(s){
                for(m=0;m<11;m++){
                    if(s==4){
                        $("#lparque").hide("slow");
                    }
                    else{
                        $("#lparque").show("slow");
                    }
                    if(m==s){
                        $("#screen"+m).show("slow");
                    }
                    else{
                        $("#screen"+m).hide("slow");
                    }
                }
            }
            function addsel(t){
                if(t==5){
                    if($("#state").val()==25){
                        var newOptions = {"0": "-- Seleccione --",
                        "Culiacán": "Culiacán",
                        "Navolato": "Navolato"
                        };
                    }
                    else{
                        var newOptions = {"0": "-- Seleccione --"
                        };
                    }
                    var $el = $("#ciudad");
                    $el.empty();
                    $.each(newOptions, function(value,key) {
                        $el.append($("<option></option>").attr("value", value).text(key));
                    });
                }
            }
        </script>
    </body>
    </html>';
    exit();
    }
    else{
        echo '<title>Tablet Parques Alegres</title>';
        echo '<script>
            function parque(p){
                document.forma.parque.value=p;
                document.forma.submit();
            }
            function cambiaraction(){
                    document.forma.action="solicitar.php";
                    document.forma.submit();
                    document.forma.action="";
            }
        </script>
        <style>
            span{
                font-family: georgia;
                color: #727272;
            }
            ul{
                margin-bottom:20px;
                margin-left:0px;
                padding-left:0px;
                margin-top:10px;
                overflow:hidden;
            }
            li{
                font-size:15px;
                line-height:1.1em;
                margin:0 0 13px 0;
                float:left;
                display:inline;
                width:100%;
            }
            .doble li{
                width:50%;
            }
            .triple li{
                width:33.3%;
            }
            a:link {
                text-decoration:none;
                color: #0074a2;
            }
            a:visited {
                text-decoration:none;
                color: #0074a2;
            }
            a:hover {
                text-decoration:underline;
                color: #FF704D;
            }
            a:active {
                text-decoration:underline;
                color: #FF704D;
            }
            @media screen and (min-width: 800px){
                li{
                    font-size:18px;
                }
            }
        </style>';
        echo '</head><body>';
        echo '<div><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png" style="width:126px;vertical-align:middle"><span style="margin-left:10px;font-size:18px;"><b>Hola, '.$user->display_name.'! Bienvenido al sistema de captura de Parques Alegres.</b></span></div>';
        $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$user->ID."' order by post_title ASC";
        $res0=mysql_query($sql0);
        $c=0;
        echo '<form name="forma" method="post" target="_blank"><input type="hidden" name="asesorpa" value="'.$user->ID.'"><input type="hidden" name="parque">';
        echo '<b><a href="javascript:parque(-1);"><p style="line-height:8px;">Registrar un nuevo Parque</a></b><br></p>';
        echo '<span>Parques registrados:</span>';
        if(mysql_num_rows($res0)<=16){
            echo '<ul>';
        }
        elseif(mysql_num_rows($res0)<=32){
            echo '<ul class="doble">';
        }
        else{
            echo '<ul class="triple">';
        }
        while($row0=mysql_fetch_array($res0)){
            $parque[$row0["id"]]=$row0["post_title"];
            $sql000="SELECT cve from wp_comites_parques WHERE cve_parque='".$row0['id']."' AND fecha_visita>='".date("Y-m-")."01'";
            $res000=mysql_query($sql000);
            echo '<li><a href="javascript:parque('.$row0["id"].');">';
            if(strlen($row0["post_title"])>23){
                $nummm=strlen($row0["post_title"])-23;
                $pos = strrpos($row0["post_title"], " ", -$nummm);
                if($pos === false){
                    echo $row0["post_title"].'</a>';
                }
                else{
                    $np = substr($row0["post_title"],0,$pos);
                    $np2= substr($row0["post_title"],$pos);
                    echo $np.'<br>'.$np2;
                }
            }
            else{
                echo $row0["post_title"].'</a> ';
            }
            if(mysql_num_rows($res000)>0){
                echo '<img src="bien.png" width="15px" height="15px">';
            }
            echo '</li>';
        }
        echo '</ul>';
        echo '<b><a href="javascript:void(0);" onclick="cambiaraction();";>Solicitar una modificación</a></b><br>';
        echo '</form>';
        echo '</body></html>';
        exit();
    }
}
else {
    echo '<!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="cleartype" content="on">
            <meta name="MobileOptimized" content="320">
            <meta name="HandheldFriendly" content="True">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="http://parquesalegres.org/wp-admin/css/login.min.css?ver=4.4.2" rel="stylesheet" type="text/css" />
            <title>Sistema PA</title>
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
            <body class="login login-action-login wp-core-ui  locale-es-es">';
    echo '<div id="login"><center><img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png"></center>';
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