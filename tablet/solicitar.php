<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$solicitud=array(1=>"Cambio de fecha",2=>"Cambio de calificación",3=>"Borrar visita",4=>"Borrar contacto",100=>"Otro");
$parametros=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"vespacio",6.2=>"disenio",6.3=>"ejecutivo",7=>"estado",8=>"instalaciones",9=>"ingresop",10=>"ingresadop",
                  11=>"mancomunado",12=>"eventosr",13=>"eventos",14=>"averdes",15=>"estaver",16=>"gente",17=>"respint",18=>"orden",19=>"limpieza");
$nomparametros=array(1=>"El comité opera con",2=>"¿Cómo está formalizado?",3=>"Cuenta con buena organización",4=>"Existen reuniones",5=>"Tienen proyectos en proceso",
                     6=>"Cuenta con Proyecto",7=>"Estado actual de las instalaciones",8=>"Hay instalaciones en la mayoria del espacio",
                     9=>"Tienen fuente de ingresos permanentes",10=>"Es suficiente lo ingresado para operar bien",11=>"Tienen cuenta mancomunada",
                     12=>"Hay eventos con regularidad",13=>"Cuentan con un calendario anual de actividades",14=>"Cuenta con",15=>"Se encuentra en buen estado",
                     16=>"Porcentaje de afluencia sobre lo existente",17=>"Las instalaciones se respetan",18=>"Se cuenta con un reglamento de orden",19=>"Se mantiene limpio");
function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
/*if($_GET['x']!=""){
    $sql="select codigo from solicitudes where codigo='".$_GET['x']."'";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        $sSQL8="UPDATE solicitudes SET status=1 WHERE codigo='".$_GET['x']."' AND status=0";
        mysql_db_query("parquesa_ParquesAlegresWP",$sSQL8);
        echo 'Cambio realizado, gracias.';
    }
    else{
        echo 'Esta solicitud ya no existe o ya ha sido autorizada, si este no es el caso por favor contacte al area de sistemas. Gracias';
    }
    exit();
}
*/
//AND a.stat<1
$sql1="select a.ID, b.display_name from asesores as a, wp_users as b where a.ID=b.ID order by b.display_name";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)){
    $asesores[$row1['ID']]=$row1['display_name'];
}
if($_POST['cmnd']==2){
    $codigo = RandomString(15,TRUE,TRUE,FALSE);
    $campo="";
    $valoractual="";
    $valornuevo="";
    $cve=$_POST['visita'];
    if($_POST['solicitud']==1){
        $campo="fecha_visita";
        $valoractual=$_POST['fecha_actual'];
        $valornuevo=$_POST['fecha_nueva'];
    }
    if($_POST['solicitud']==2){
        $campo=$parametros[$_POST['parametro']];
        $valoractual=$_POST['valor_actual'];
        $valornuevo=$_POST['valor_nuevo'];
    }
    if($_POST['solicitud']==3){
        $campo="visita";
    }
    if($_POST['solicitud']==4){
        $campo="contacto";
        $cve=$_POST['contacto'];
    }
    if($_POST['solicitud']==100){
        $campo="otro";
    }
    $sSQL4="INSERT INTO solicitudes(cve_parque,cve_visita,fecha,solicitud,asesor,motivo,campo,valori,valorf,codigo,status) VALUES ('".$_POST['parque']."','".$cve."','".date('Y-m-d')."','".$_POST['solicitud']."','".array_search($_POST['asesor'], $asesores)."','".$_POST['motivo']."','".$campo."','".$valoractual."','".$valornuevo."','".$codigo."',0)";
    mysql_db_query("parquesa_ParquesAlegresWP",$sSQL4);
    /*$link = "http://parquesalegres.org/tablet/solicitudes.php";
    //$link .= $codigo;
    $email="contacto@parquesalegres.org";
    $copia="";
    $cambio= "Cambio de fecha";
    $subject = "Solicitud de cambio"; 
    $message = "<html><body>";
    $message .= "<h1>Solicitud de ".$solicitud[$_POST['solicitud']]."</h1><br><p>El asesor ".$_POST['asesor']." solicitó ".$solicitud[$_POST['solicitud']];
    if($_POST['solicitud']!=3){
        $message .= " de ".$valoractual." a ".$valornuevo;
    }
    if($_POST['solicitud']==2){
        if($_POST['parametro']<6){
            $param="Comité";
        }
        elseif($_POST['parametro']<9){
            $param="Instalaciones";
        }
        elseif($_POST['parametro']<12){
            $param="Ingresos";
        }
        elseif($_POST['parametro']<14){
            $param="Eventos";
        }
        elseif($_POST['parametro']<16){
            $param="Áreas Verdes";
        }
        elseif($_POST['parametro']<17){
            $param="Afluencia";
        }
        else{
            $param="Orden";
        }
        $message.=" para el subpáramtro \"".$nomparametros[$_POST['parametro']]."\" del párametro ".$param;
    }
    $sql00="select cve from wp_comites_parques where cve_parque='".$_POST['parque']."'";
    $res00=mysql_query($sql00);
    $c=1;
    $numvisita="";
    while($row00=mysql_fetch_array($res00)){
        if($row00['cve']==$_POST['visita']){
            $numvisita=$c;
        }
        $c++;
    }
    if($_POST['solicitud']!=3){
        $message .= " para la visita";
    }
    $message .=" #".$numvisita." del parque ".$_POST['nomparque']." asociado a su cartera, con motivo de: ".$_POST['motivo'].".<br>";
    $message .="<br>Para ver y/o autorizar solicitudes, visite el siguiente enlace:<br> $link</p>";
    $sql="select status from solicitudes where status=0";
    $res=mysql_query($sql);
    $message .="Actualmente tiene: <b>".mysql_num_rows($res)."</b> Solicitudes pendientes.";
    $message .= "</body></html>";
    $cabeceras = "From: Parques Alegres " . $email . "\r\n";
    //$cabeceras .= "CC: otracasilladeemail@yahoo.com\r\n";
    $cabeceras .= "MIME-Version: 1.0\r\n";
    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
    $to="contacto@parquesalegres.org";
    mail($to, $subject, $message, $cabeceras);
    */
    echo 'Solicitud enviada. Gracias<br>';
}
if($_POST['cmd']==1){
    $sql="select cve,fecha_visita from wp_comites_parques where cve_parque='".$_POST['parque']."' order by fecha_visita DESC, cve DESC limit 1";
    $res=mysql_query($sql);
    $c=1;
    if(mysql_num_rows($res)>0){
        while($row=mysql_fetch_array($res)){
            echo $row['cve'].'|'.$row['fecha_visita'].',';
            $c++;
        }
    }
    else{
        echo 'nope';
    }
    exit();
}
if($_POST['cmd']==2){
    $sql="select cm.id, cm.nombre from comite_miembro cm INNER JOIN comite_parque cp ON cm.cve_comite=cp.id where cp.cve_parque='".$_POST['parque']."' order by cm.id DESC";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        while($row=mysql_fetch_array($res)){
            echo $row['id'].'|'.$row['nombre'].',';
        }
    }
    else{
        echo 'nope';
    }
    exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de solicitudes de Parques Alegres</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<style>
label {
    display: block;
    margin: 0px;
}
label>span {
    float: left;
    width: 20%;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    color: #888;
}
input[type="text"], input[type="email"], textarea, select {
	border: 1px solid #DADADA;
	color: #888;
	height: 30px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 3px 3px 3px 5px;
	width: 70%;
	font-size: 12px;
	line-height:15px;
	box-shadow: inset 0px 1px 4px #ECECEC;
	-moz-box-shadow: inset 0px 1px 4px #ECECEC;
	-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}
textarea{
	padding: 5px 3px 3px 5px;
        height:100px;
}
select {
    background: #FFF url("down-arrow.png") no-repeat right;
    background: #FFF url("down-arrow.png") no-repeat right);
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: "";
    width: 70%;
    height: 35px;
	line-height: 25px;
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
.sol{
    max-width:500px;
}
#calif{
    display:none;
}
#contacto{
    display:none;
}
</style>
</head>';
echo '<body>';
echo '<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker1" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    });
    function cambio(q){
        document.getElementById("forma").reset();
        $("#solicitud").val(q);
        if(q==1){
            $("#fechas").show();
            $("#calif").hide();
            $("#hvis").show();
            $("#contacto").hide();
            $("#sol").val(1);
        }
        if(q==2){
            $("#fechas").hide();
            $("#calif").show();
            $("#hvis").show();
            $("#contacto").hide();
            $("#sol").val(1);
        }
        if(q==3){
            $("#fechas").hide();
            $("#calif").hide();
            $("#hvis").show();
            $("#contacto").hide();
            $("#sol").val(1);
        }
        if(q==4){
            $("#fechas").hide();
            $("#calif").hide();
            $("#hvis").hide();
            $("#contacto").show();
            $("#sol").val(2);
        }
        if(q==100){
            $("#fechas").hide();
            $("#calif").hide();
            $("#hvis").hide();
            $("#contacto").hide();
            $("#sol").val(1);
        }
    }
    function llenar(){
        if($("#sol").val()==1){
            $.ajax({url: "solicitar.php",
            data: { cmd: 1, parque: $("#parque").val()},
            dataType: "text",
            type: "post",
            success: function(result){
                $("#visita").empty();
                $("#visita").append($("<option></option>").attr("value", "").text(" -- Seleccione --"));
                if(result!="nope"){
                    var res=result.substring(0, result.length-1);
                    res=res.split(",");
                    $.each(res, function(key,value) {
                        var valor=value.split("|");
                        $("#visita").append($("<option></option>").attr("value", valor[0]).text(valor[1]));
                    });
                }
            }});
            $("#nomparque").val($("#parque option:selected").text());
        }
        else{
            $.ajax({url: "solicitar.php",
            data: { cmd: 2, parque: $("#parque").val()},
            dataType: "text",
            type: "post",
            success: function(result){
                $("#nomcontacto").empty();
                $("#nomcontacto").append($("<option></option>").attr("value", "").text(" -- Seleccione --"));
                if(result!="nope"){
                    var res=result.substring(0, result.length-1);
                    res=res.split(",");
                    $.each(res, function(key,value) {
                        var valor=value.split("|");
                        $("#nomcontacto").append($("<option></option>").attr("value", valor[0]).text(valor[1]));
                    });
                }
            }});
            $("#nomparque").val($("#parque option:selected").text());
        }
    }
    function llenar2(){
        var fechav=$("#visita option:selected").text();
        $("#datepicker").val(fechav);
    }
</script>';
echo '<form name="forma" id="forma" method="post" class="sol">
    <label>
        <span>Asesor: </span><input type="text" name="asesor" value="'.$asesores[$_POST['asesorpa']].'" readonly>
    </label>
    <label>
        <span>Solicitud: </span><select name="solicitud" id="solicitud" onchange="cambio(this.value);">
            <option value="1" selected>Cambiar fecha</option>
            <option value="2">Cambiar calificación</option>
            <option value="3">Borrar visita</option>
            <option value="4">Borrar contacto</option>
            <option value="100">Otro</option>
        </select>
    </label>
    <label>
        <span>Parque: </span><select name="parque" id="parque" onchange="llenar();">
            <option value=""> -- Seleccione -- </option>';
            $sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$_POST['asesorpa']."' order by post_title ASC";
            $res0=mysql_query($sql0);
            while($row0=mysql_fetch_array($res0)){
		echo '<option value="'.$row0["id"].'">'.$row0["post_title"].'</option>';
            }
            echo '</select>
    </label>
    <div id="hvis">
    <label>
        <span>Visita: </span><select name="visita" id="visita" onchange="llenar2();">
            <option value=""> -- Seleccione -- </option>
            </select>
    </label>
    </div>
    <div id="fechas">
    <label>
        <span>Fecha actual: </span><input name="fecha_actual" type="text" readonly id="datepicker" value="">
    </label>
    <label>
        <span>Nueva fecha: </span><input name="fecha_nueva" type="text" readonly id="datepicker1" value="">
    </label>
    </div>
    <div id="calif">
    <label>
        <span>Parámetro: </span><select name="parametro">
            <option value=""> -- Seleccione -- </option>
            <optgroup label="Comité">
            <option value="1">El comité opera con</option>
            <option value="2">¿Cómo está formalizado?</option>
            <option value="3">Cuenta con buena organización</option>
            <option value="4">Existen reuniones</option>
            <option value="5">Tienen proyectos en proceso</option>
            </optgroup>
            <optgroup label="Instalaciones">
            <option value="6">Cuenta con Proyecto(Visión del espacio)</option>
            <option value="6.2">Cuenta con Proyecto(Diseño)</option>
            <option value="6.3">Cuenta con Proyecto(Ejecutivo)</option>
            <option value="7">Estado actual de las instalaciones</option>
            <option value="8">Hay instalaciones en la mayoria del espacio</option>
            </optgroup>
            <optgroup label="Ingresos">
            <option value="9">Tienen fuente de ingresos permanentes</option>
            <option value="10">Es suficiente lo ingresado para operar bien</option>
            <option value="11">Tienen cuenta mancomunada</option>
            </optgroup>
            <optgroup label="Eventos">
            <option value="12">Hay eventos con regularidad</option>
            <option value="13">Cuentan con un calendario anual de actividades</option>
            </optgroup>
            <optgroup label="Áreas verdes">
            <option value="14">Cuenta con</option>
            <option value="15">Se encuentra en buen estado</option>
            </optgroup>
            <optgroup label="Afluencia">
            <option value="16">Porcentaje de afluencia sobre lo existente</option>
            </optgroup>
            <optgroup label="Orden">
            <option value="17">Las instalaciones se respetan</option>
            <option value="18">Se cuenta con un reglamento de orden</option>
            <option value="19">Se mantiene limpio</option>
            </optgroup>
            </select>
    </label>
    <label>
        <span>Valor actual: </span><input name="valor_actual" type="text">
    </label>
    <label>
        <span>Valor nuevo: </span><input name="valor_nuevo" type="text">
    </label>
    </div>
    <div id="contacto">
    <label>
        <span>Contacto: </span><select name="contacto" id="nomcontacto">
            <option value=""> -- Seleccione -- </option>
            </select>
    </label>
    </div>
    <label>
        <span>Razón del cambio: </span><textarea name="motivo"></textarea>
    </label>
    <center><input class="button" type="submit" value="Enviar solicitud"></center>
    <input type="hidden" name="cmnd" value=2>
    <input type="hidden" name="sol" id="sol" value=1>
    <input type="hidden" name="nomparque" id="nomparque">
    <input type="hidden" name="asesorpa" value="'.$_POST['asesorpa'].'">
</form>
<div id="div1"></div>';
echo '</body>
</html>';
?>