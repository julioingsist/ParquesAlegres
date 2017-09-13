<?php
if($_GET['d']==1){
    echo '<!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="cleartype" content="on">
            <meta name="MobileOptimized" content="320">
            <meta name="HandheldFriendly" content="True">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <link href="form_style.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
            <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
            <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
            <title>Sistema PA</title>
            <style>
            .disa {
                background-color: #8D8D8D;
               border-radius: 5px;
               -webkit-border-radius: 5px;
               -moz-border-border-radius: 5px;
               border: none;
               padding: 10px 25px 10px 25px;
               color: #FFF;
               text-shadow: 1px 1px 1px #949494;
            }
            #contenedor {
                    width: 480px;
            }
            .menu {
                list-style: none outside none;
                padding: 0;
            }
            .menu li {
                float: left;
                position: relative;
            }
            .menu a {
                color: black;
                float: left;
                font: bold 12px Arial,Helvetica;
                padding: 12px 30px;
                text-decoration: none;
                text-transform: uppercase;
                border-right: 1px solid #222222;
                    box-shadow: 1px 0 0 #444444;
            }
            
            .menu a:hover {
                color: #FAFAFA;
                background-color: gray;
            }
            
            .menu li:first-child a {
                border-radius: 5px 0 0 5px;
            }
            
            .menu li:last-child a {
                    border-radius: 0 5px 5px 0;
                    border-right: 0;
                    box-shadow: none;
            }
            
            .menu .burbuja {
                    width: 8px;
                    height: 15px;
                    text-align: center;
                background: none repeat scroll 0 0 #E02424;
                border-radius: 3px 3px 3px 3px;
                color: #FFFFFF;
                font: bold 0.9em Tahoma,Arial,Helvetica;
                padding: 2px 6px;
                position: absolute;
                right: 5px;
                top: -5px;
                -webkit-transition: all 0.5s ease-out;
                   -moz-transition: all 0.5s ease-out;
                    -ms-transition: all 0.5s ease-out;
                     -o-transition: all 0.5s ease-out;
                        transition: all 0.5s ease-out;
            }
            
            .burbuja.agrandar {
                    width: 15px;
                    height: 20px;
                    padding-top: 5px;
            }
            
            button {
                    background-color: #BEE5FF;
                    border:1px solid #BDCAE0;
                    height: 40px;
                    width: 200px;
                    border-radius: 5px;
                    color: black;
                    text-transform: uppercase;
                    font-weight: bold;
                    cursor: pointer;
                    margin-top: 10px;
            }
            
            button:hover {
                    background-color: #4176FF;
                    color: white;
            }
            
            #nebaris{
                    background-color: #333;
                    color: white;
                    padding: 15px;
                    text-align: center;
                    margin-top: 120px;
                    font-family: helvetica;
                    width: 650px;
                    margin: 100px auto;
            }
            
            #nebaris a{
                    color:rgb(178, 255, 178);
            }
            
            #nebaris a:hover{
                    color:white;
            }
            .listorg label>span{
                width:75%;
            }
            .listorg label{
                display:inline-block;
                width:45%;
            }
            .listorg .sm{
                width:30%;
            }
            .listeven{
                margin-left:5%;
            }
            .listeven label>span{
                width:15%;
                text-align:center;
            }
            .listeven label{
                width:100%;
            }
            .listeven input[type="text"]{
                width:15%;
            }
            .listeven select{
                width:15%;
            }
            .listevenf{
                margin-left:0%;
            }
            .listevenf label>span{
                width:12%;
                text-align:center;
            }
            .listevenf label{
                width:100%;
            }
            .listevenf input[type="text"]{
                width:12%;
            }
            .listevenf select{
                width:12%;
            }
            .listreun{
                margin-left:25%;
            }
            .listreun label>span{
                width:25%;
                text-align:center;
            }
            .listreun label{
                width:100%;
            }
            .listreun input[type="text"]{
                width:25%;
            }
            .tareas label>span{
                    width:50%;
            }
            </style>
            <script>
                $(function() {
                    $("#datepicker1").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    $("#datepicker2").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    $("#datepicker3").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    // obtenemos el valor actual de la burbuja
                    var valor = parseInt($(".burbuja").html());
                    var $burbuja = $(".burbuja");
            
                    // al presionar algún botón del div "botones"
                    $("#guardar_visita").on("click",function(event){
            
                            // almacenamos el valor que tenía la burbuja antes del click
                            var valorPrevio = valor;
            
                            if($("#opera").val()>0){
                                $("#tareas").append("<label><span>Registrar miembros del comité en la base de datos</span><input class=\"button\" type=\"button\" id=\"res_miembros\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#formaliza").val()!=""){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Formalización</span><input class=\"button\" type=\"button\" id=\"res_formal\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#resultorg").text()!="Sin organización"){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Nivel de Organización</span><input class=\"button\" type=\"button\" id=\"res_organiza\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#resulteven").text()!="Ninguno"){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Eventos</span><input class=\"button\" type=\"button\" id=\"res_evento\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                $("#tareas").append("<label><span>Llenar el formato de experiencias exitosas por cada Evento</span><input class=\"button\" type=\"button\" id=\"res_experiencia\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                                valor++;
                            }
                            if($("#reglamento").val()==30){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Reglamento de Orden</span><input class=\"button\" type=\"button\" id=\"res_reglamento\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#sijornada").is(":checked")){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Jornada de Limpieza</span><input class=\"button\" type=\"button\" id=\"res_jornada\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                $("#tareas").append("<label><span>Llenar el formato de experiencias exitosas de Jornada de Limpieza</span><input class=\"button\" type=\"button\" id=\"res_jorexp\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                                valor++;
                            }
                            // si hubo un cambio en el valor
                            if (valor != valorPrevio) {
                                    $("html, body").animate({ scrollTop: 0 }, 300);
                                    agrandar($burbuja);			
                            }
                    });
                    // función que pasado un tiempo, quita la clase "agrandar" del elemento
                    function removeAnimation(){
                            setTimeout(function() {
                                    $burbuja.removeClass("agrandar")
                            }, 500);
                    }
            
                    // función que modifica el valor de la burbuja y la agranda
                    function agrandar ($elemento) {
                            $elemento.html(valor).addClass("agrandar");
                            removeAnimation();
                    }
                    $("input[name=\"organiza\"]").change(function(){
                        recalculate();
                    });
                    $("input[name=\"respint\"]").change(function(){
                        recalculate2();
                    });
                    $("input[name=\"limpio\"]").change(function(){
                        recalculate3();
                    });
                });
                function resolver(boton){
                    if(boton=="res_miembros"){
                        var s=4;
                    }
                    else if(boton=="res_experiencia"){
                        var s=6;
                    }
                    else if(boton=="res_jorexp"){
                        var s=6;
                    }
                    else{
                        var s=2;
                    }
                    for(var i=1;i<5;i++){
                        if(i==s){
                            $("#screen"+i).show();
                        }
                        else{
                            $("#screen"+i).hide();
                        }
                    }
                }
                function cambio(s){
                    for(var i=1;i<5;i++){
                        if(i==s){
                            $("#screen"+i).show();
                        }
                        else{
                            $("#screen"+i).hide();
                        }
                    }
                }
                function sh_proy(pr){
                    if(pr<20){
                        $("#datosproy").hide();
                    }
                    else{
                        $("#datosproy").show();
                    }
                }
                function add_proy(){
                    document.getElementById(\'num_proy\').value++;
                    var i = document.getElementById(\'num_proy\').value;
                    var proyecto = \'<label style="margin-left:35%;"><span>Nombre:</span><input type="text" name="nombre_proy\'+ document.getElementById(\'num_proy\').value + \'"></label>\';
                    proyecto += \'<label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="fecha_proy\'+ document.getElementById(\'num_proy\').value + \'" name="fecha_proy\'+ document.getElementById(\'num_proy\').value + \'"></label>\';
                    proyecto += \'<label style="margin-left:35%;"><span>Tipo:</span><select name="tipo_proy\'+ document.getElementById(\'num_proy\').value + \'"><option value="" selected> -- Seleccione -- </option><option value="1">Tejido Social</option><option value="2">Generación de Ingresos</option><option value="3">Gestión</option></select></label>\';
                    $("#nproy").append(proyecto);
                    for(var e=1;e<=i;e++){
                        $("#fecha_proy"+e).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    }
                }
                function agregar(num){
                    $("#reun").html("");
                    for(var e=1;e<=num;e++){
                        var reunion = \'<label><input type="text" id="datepickerr\'+ e + \'" name="fecha_reunion[\'+ e + \']" onchange="recalc();"/><input type="text" name="num_asistentes[\'+ e + \']" onkeyup="recalc();"/>\';
                        $("#reun").append(reunion);
                        $("#datepickerr"+e).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    }
                    recalc();
                }
                function agregar_av(){
                    $("#esparboles").show();
                    $("#esparboles input:text").each(function() {
                        this.value = "";
                    });
                    $("#imgarbolend").hide();
                    $("#imgarbol").hide();
                    $("#endemicos").attr("checked", false);
                    $("#endemicon").attr("checked", false);
                    $("#interior").attr("checked", false);
                    $("#banqueta").attr("checked", false);
                    $("#cabless").attr("checked", false);
                    $("#cablesn").prop("checked", false);
                    $("#reds").attr("checked", false);
                    $("#redn").attr("checked", false);
                    $("#danas").prop("checked", false);
                    $("#danan").attr("checked", false);
                    $("#riegop").attr("checked", false);
                    $("#podap").attr("checked", false);
                    $("#enc_podac").attr("checked", false);
                    $("#enc_podam").attr("checked", false);
                    $("#enc_podae").attr("checked", false);
                    $("#lesioness").attr("checked", false);
                    $("#lesionesn").attr("checked", false);
                    $("#fijados").attr("checked", false);
                    $("#fijadon").attr("checked", false);
                    $("#poda").val("");
                    $("#riego").val("");
                }
                function agregar_pasto(){
                    $("#esppasto").show();
                    $("#silvestre").attr("checked", false);
                    $("#comercial").attr("checked", false);
                    $("#uso_pasto").val("");
                    $("#extension").attr("checked", false);
                    $("#malezas").attr("checked", false);
                    $("#malezan").attr("checked", false);
                    $("#enc_podapc").attr("checked", false);
                    $("#enc_podapm").attr("checked", false);
                    $("#enc_podape").attr("checked", false);
                    $("#topon").attr("checked", false);
                    $("#topos").attr("checked", false);
                    $("#riegop").val("");
                    $("#podap").val("");
                    $("#esppasto input:text").each(function() {
                        this.value = "";
                    });
                }
                function datos_ubic(ub){
                        $("#espbanqueta").hide();
                        $("#espinterior").hide();
                        $("#esp"+ub).show();
                }
                function agregar_e(num,f){
                    if(f==1){
                        ';
                        if($_GET['p']!=1){
                            echo '$("#even").html("");';
                        }
                        else{
                            echo '$("#even").html("<label><span>Evento 1</span><span>2016-01-01</span><span>Tejido social</span><span>Responsable 1</span><span>test@test.com</span><select id=\"status_even\" name=\"status_even\" onchange=\"recalc2(this.id);\"><option value=\"1\" selected>En espera</option><option value=\"2\">Realizado</option><option value=\"3\">Postergado</option><option value=\"4\">Cancelado</option></select></label>");';
                        }
                        echo 'for(var e=1;e<=num;e++){
                            var evento = \'<label><input type="text" name="nom_evento[\'+ e + \']"/><input type="text" id="datepickere\'+ e + \'" name="fecha_evento[\'+ e + \']"/><select name="tipo_evento[\'+ e + \']"><option value=""> -- Seleccione -- </option><option value="1">Tejido social</option><option value="2">Generar ingresos</option><option value="3">Gestión</option></select><input type="text" name="contacto_evento[\'+ e + \']"/><input type="text" name="correo_contacto[\'+ e + \']"/><select name="status_even" disabled><option value=""> -- Seleccione -- </option><option value="1" selected>En espera</option><option value="2">Realizado</option><option value="3">Postergado</option><option value="4">Cancelado</option></select>\';
                            $("#even").append(evento);
                            $("#datepickere"+e).datepicker({ minDate: new Date, maxDate: "2016-12-31", dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                        }
                    }
                    else{
                        $("#evenf").html("");
                        for(var e=1;e<=num;e++){
                            var evento = \'<label><input type="text" name="nom_eventof[\'+ e + \']"/><input type="text" id="datepickeref\'+ e + \'" name="fecha_eventof[\'+ e + \']"/><select name="tipo_eventof[\'+ e + \']"><option value=""> -- Seleccione -- </option><option value="1">Tejido social</option><option value="2">Generar ingresos</option><option value="3">Gestión</option></select><input type="text" name="contacto_eventof[\'+ e + \']"/><input type="text" name="correo_contactof[\'+ e + \']"/><select id="status_evenf\'+ e + \'" name="status_evenf\'+ e + \'" onchange="recalc2(this.id);"><option value=""> -- Seleccione -- </option><option value="1" selected>En espera</option><option value="2">Realizado</option><option value="3">Postergado</option><option value="4">Cancelado</option></select><input type="text" name="motivo[\'+e+\']">\';
                            $("#evenf").append(evento);
                            $("#datepickeref"+e).datepicker({ maxDate: "2016-12-31", dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                        }
                    }
                }
                var sum = 0;
                var agregados="";
                function recalc2(but){
                    ids=agregados.split(",");
                    var falso=0;
                    for(var e=0;e<ids.length;e++){
                        if(ids[e]==but){
                            falso=1;
                        }
                    }
                    if(falso!=1){
                        if($("#"+but).val()==2){
                            agregados+=but+",";
                            sum++;   
                        }
                    }
                    else{
                        if($("#"+but).val()!=2){
                            agregados=agregados.replace(RegExp(but, "g"),"");
                            sum--;
                        }
                    }
                    if(sum<1){
                        $("#resulteven").text("Ninguno").css("color", "red");
                    }
                    else if(sum<4){
                        $("#resulteven").text(sum).css("color", "orange");
                    }
                    else{
                        $("#resulteven").text(sum).css("color", "green");   
                    }
                }
                function recalc(){
                    var sum = 0;
                    $.each($("input[name^=\"fecha_reunion\"]"), function(){            
                        if($(this).val()!=""){
                            sum++;
                        }
                    });
                    if(sum<1){
                        $("#resultreun").text("Ninguna reunión").css("color", "red");
                    }
                    else if(sum<2){
                        $("#resultreun").text("El comité se reune con regularidad").css("color", "orange");
                    }
                    else{
                        $("#resultreun").text("El comité se reune con frecuencia").css("color", "green");   
                    }
                }
                function recalculate(){
                    var sum = 0;
                    $.each($("input[name=\"organiza\"]:checked"), function(){            
                        sum += parseInt($(this).val());
                    });
                    if(sum<1){
                        $("#resultorg").text("Sin organización").css("color", "red");
                    }
                    else if(sum<15){
                        $("#resultorg").text("Regular").css("color", "orange");
                    }
                    else{
                        $("#resultorg").text("Buena organización").css("color", "green");   
                    }
                }
                function recalculate2(){
                    var sum = 0;
                    $.each($("input[name=\"respint\"]:checked"), function(){            
                        sum += parseInt($(this).val());
                    });
                    if(sum<1){
                        $("#resultres").text("Sí").css("color", "green");
                    }
                    else if(sum<5){
                        $("#resultres").text("Regular").css("color", "orange");
                    }
                    else{
                        $("#resultres").text("No").css("color", "red");   
                    }
                }
                function recalculate3(){
                    var sum = 0;
                    $.each($("input[name=\"limpio\"]:checked"), function(){            
                        sum += parseInt($(this).val());
                    });
                    if(sum<1){
                        $("#resultlimp").text("Muy limpio").css("color", "green");
                    }
                    else if(sum<3){
                        $("#resultlimp").text("Limpio").css("color", "green");
                    }
                    else if(sum<9){
                        $("#resultlimp").text("Regular").css("color", "orange");
                    }
                    else if(sum<27){
                        $("#resultlimp").text("Sucio").css("color", "red");
                    }
                    else{
                        $("#resultlimp").text("Muy sucio").css("color", "red");   
                    }
                }
                function sel_exp(t){
                    if($("#proposito_tangible").val()==1){
                        if(t==1){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==2){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==4){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==5){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==7){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                    else if($("#proposito_tangible").val()==2){
                        if(t==1){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==2){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==5){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==6){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                    else if($("#proposito_tangible").val()==3){
                        if(t==1){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==3){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==4){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==6){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==8){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==7){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==9){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                    else if($("#proposito_tangible").val()==4){
                        if(t==3){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==4){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==5){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==6){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==7){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==8){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==9){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==11){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==12){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==13){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                    else if($("#proposito_tangible").val()==5){
                        if(t==3){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==4){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==5){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==7){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==8){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==9){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==10){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==12){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==14){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==15){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else if(t==16){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                    else if($("#proposito_tangible").val()==6){
                        if(t==3){
                            $("#experiencia_si").attr("checked", true);
                            $("#experiencia_show").show();
                        }
                        else{
                            $("#experiencia_no").attr("checked", true);
                            $("#experiencia_show").hide();
                        }
                    }
                }
                function sel_desc(t){
                    if(t==1){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Alumbrado",
                        "2": "Arborización",
                        "3": "Diseño de sistema de riego",
                        "4": "Donación de PET",
                        "5": "Murales",
                        "6": "Pintura",
                        "7": "Proyecto arquitectónico",
                        "8": "Proyecto ejecutivo",
                        "9": "Proyecto EVA",
                        "10": "Voluntariado"
                        };
                    }
                    else if(t==2){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Alumbrado",
                        "2": "Arborización",
                        "3": "Denuncia ciudadana formal",
                        "4": "Jornada de limpieza",
                        "5": "Pintura",
                        "6": "Proyecto arquitectónico",
                        "7": "Toma de agua",
                        "8": "Visita a cabildo abierto"
                        };
                    }
                    else if(t==3){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Arborización",
                        "2": "Mesa de ping pong",
                        "3": "Fertilización",
                        "4": "Fumigación",
                        "5": "Instalación de infraestructura",
                        "6": "Limpieza del parque",
                        "7": "Poda",
                        "8": "Reglamento de orden",
                        "9": "Riego"
                        };
                    }
                    else if(t==4){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Activación por empresas y/o instituciones",
                        "2": "Actividad para generar ingresos",
                        "3": "Carrera pedestre",
                        "4": "Cooperación vecinal",
                        "5": "Días festivos",
                        "6": "Función de cine",
                        "7": "Kermesse",
                        "8": "Kermesse cultural",
                        "9": "Noche bohemia",
                        "10": "Programa de reciclaje Ecoce o programa externo",
                        "11": "Rifa",
                        "12": "Tianguis",
                        "13": "Torneos"
                        };
                    }
                    else if(t==5){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Actividades deportivas",
                        "2": "Asistencia a juego de Dorados (tendrá que ir en comunidad, sólo un tangible por comité)",
                        "3": "Campamentos",
                        "4": "Carrera pedestre",
                        "5": "Cooperación vecinal",
                        "6": "Cursos y talleres",
                        "7": "Días festivos",
                        "8": "Función de cine",
                        "9": "Kermesse",
                        "10": "Kermesse cultural",
                        "11": "Muestra gastronómica",
                        "12": "Noche bohemia",
                        "13": "Pláticas",
                        "14": "Rifa",
                        "15": "Tianguis",
                        "16": "Torneos",
                        "17": "Visita Jardín Botánico de Culiacán",
                        "18": "Visita MIA"
                        };
                    }
                    else if(t==6){
                        var newOptions = {"0": "-- Seleccione --",
                        "1": "Asistencia a cursos P.A (será un tangible por parque)",
                        "2": "Calendario de actividades",
                        "3": "Club guardianes del parque",
                        "4": "Comité de ninos",
                        "5": "Contratación del jardinero",
                        "6": "Correo electrónico formal",
                        "7": "Creación de comité",
                        "8": "Creación de logo del parque",
                        "9": "Cuenta de Facebook",
                        "10": "Cuenta de Whatsapp",
                        "11": "Cuenta mancomunada",
                        "12": "Difusión de medios",
                        "13": "Elaborar expedientes de evidencia",
                        "14": "Formalización de comité ante H. Ayuntamiento",
                        "15": "Hojas membretadas",
                        "16": "Plan de mantenimiento del parque",
                        "17": "Recibos de dinero institucional",
                        "18": "Reestructuración de comité",
                        "19": "Rendición de cuentas general (sólo 1 vez por semestre)",
                        "20": "Sello del parque",
                        "21": "Uniforme",
                        "22": "Visión del espacio"
                        };
                    }
                    var $el = $("#tipo_tangible");
                    $el.empty();
                    $.each(newOptions, function(value,key) {
                        $el.append($("<option></option>").attr("value", value).text(key));
                    });
                    $("#experiencia_no").attr("checked", true);
                }
                function quien_poda(u){
                    if(u>1){
                        $("#quien").show();
                    }
                    else{
                        $("#quien").hide();
                    }
                }
                function images_arb(j){
                    if(j=="endemicos"){
                        $("#imgarbolend").show();
                        $("#imgarbol").hide();
                    }
                    else{
                        $("#imgarbol").show();
                        $("#imgarbolend").hide();
                    }
                }
                function quien_podap(u){
                    if(u>1){
                        $("#quienp").show();
                    }
                    else{
                        $("#quienp").hide();
                    }
                }
            </script>
        </head>
        <body>
        ';
/*
DELETE FROM `wp_posts` WHERE ID='21971'
DELETE FROM `wp_posts` WHERE ID='22285'
DELETE FROM `wp_posts` WHERE ID='22286'
DELETE FROM `wp_posts` WHERE ID='22287'
DELETE FROM `wp_posts` WHERE ID='23889'
DELETE FROM `wp_posts` WHERE ID='21756'
DELETE FROM `wp_posts` WHERE ID='21153'
DELETE FROM `wp_posts` WHERE ID='22218'
DELETE FROM `wp_posts` WHERE ID='22710'
DELETE FROM `wp_posts` WHERE ID='22711'
DELETE FROM `wp_posts` WHERE ID='22712'
DELETE FROM `wp_posts` WHERE ID='18934'
DELETE FROM `wp_posts` WHERE ID='16223'
DELETE FROM `wp_posts` WHERE ID='16188'
DELETE FROM `wp_posts` WHERE ID='16144'
DELETE FROM `wp_posts` WHERE ID='15927'
DELETE FROM `wp_posts` WHERE ID='15930'
DELETE FROM `wp_posts` WHERE ID='16117'
DELETE FROM `wp_posts` WHERE ID='16152'
DELETE FROM `wp_posts` WHERE ID='16170'
DELETE FROM `wp_posts` WHERE ID='15156'
DELETE FROM `wp_posts` WHERE ID='15157'
DELETE FROM `wp_posts` WHERE ID='15136'
DELETE FROM `wp_posts` WHERE ID='15927'
DELETE FROM `wp_posts` WHERE ID='15930'
DELETE FROM `wp_posts` WHERE ID='16019'
DELETE FROM `wp_posts` WHERE ID='15121'
DELETE FROM `wp_posts` WHERE ID='16753'
DELETE FROM `wp_posts` WHERE ID='14923'
DELETE FROM `wp_posts` WHERE ID='15066'
DELETE FROM `wp_posts` WHERE ID='18364'
DELETE FROM `wp_posts` WHERE ID='18368'
DELETE FROM `wp_posts` WHERE ID='18912'
DELETE FROM `wp_posts` WHERE ID='19881'
DELETE FROM `wp_posts` WHERE ID='14641'
DELETE FROM `wp_posts` WHERE ID='14814'
DELETE FROM `wp_posts` WHERE ID='14820'
DELETE FROM `wp_posts` WHERE ID='15060'
DELETE FROM `wp_posts` WHERE ID='14628'
DELETE FROM `wp_posts` WHERE ID='15879'
*/
        echo '
            <div id="contenedor">
                    <ul class="menu">
                        <li><a href="#" onclick="cambio(1);">Visita</a></li>
                        <li><a href="#" onclick="cambio(2);">Tangibles</a></li>
                        <li>
                            <a href="#" onclick="cambio(3);">
                                    Tareas
                                    <span class="burbuja">0</span>
                            </a>
                        </li>
                    </ul>	
            </div><br><br><br>
            <div id="screen1">
                <div class="white-half">
                    <h1>Visita
                        <span>Ingrese los parámetros del parque</span>
                    </h1>
                    <label>
                        <span>Fecha de la visita: </span><input name="fecha_visita" type="text" readonly id="datepicker4" value="'.date("Y-m-d").'">
                    </label>
                    <label>
                        <span>Tipo de visita: </span><select name="visita">
                            <option value="" selected> -- Seleccione --</option>
                        </select>
                    </label>
                    <label>
                        <span>Clasificación de visita: </span><select name="clasvisita">
                            <option value="" selected> -- Seleccione --</option>
                        </select>
                    </label>
                    <h2><label class="white-pinkon">Comit&eacute;</label></h2>
                    <label>
                        <span>Número de personas que operan en el comité: </span><select id="opera" name="opera">
                            <option value="" selected> -- Selecciona --</option>
                            <option value=0>No hay comité</option>
                            <option value=7>Una persona</option>
                            <option value=14>Dos personas</option>
                           
                        </select>
                    </label>
                    <label>
                        <span>Formalización del comité</span>
                        <select id="formaliza" name="formaliza">
                            <option value="interno">Solo comit&eacute interno</option>
                            <option value="ayuntamiento">Solo registro en Ayuntamiento</option>
                            <option value="AC">Solo es una AC</option>
                            <option value="AC_ayuntamiento">AC con registro en Ayuntamiento</option>
                            <option value="" selected>Ninguna de las anteriores</option>
                        </select>
                    </label>
                    <label>
                        <span>Nivel de organización del comité:</span>
                        <span style="width:30%;">En el comité existe al menos una persona que se encarga de:</span>
                        <span id="resultorg" style="color:red;width:30%;margin-bottom:20px;">Sin organización</span>
                    </label>
                    <div style="clear:both"></div>
                    <div class="listorg">
                        <label class="sm"><span>Organización</span></label>
                        <label class="sm"><span>Invitar a los vecinos a las juntas.</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm"><span>De moderar la participación de los asistentes a las juntas de comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm" style="margin-left:30%;"><span>Elaborar las minutas de las juntas.</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm"><span>Manejar un expediente con los documentos del comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm" style="margin-left:30%;"><span>Lleva un control de los fondos del comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm"><span>Presenta reportes de ingresos y egresos</span><input type="checkbox" name="organiza" value="2"></label>
                        <label class="sm" style="margin-left:30%;"><span>El comité somete a votación las decisiones que toma</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm"><span>Los miembros del comité se organizan en comisiones para realizar sus acciones</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm"><span>Formalidad</span></label>
                        <label class="sm"><span>El comité cuenta con un sello</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm"><span>El comité utiliza hojas membretadas</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm" style="margin-left:30%;margin-right:35%;"><span>El comité utiliza uniforme</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm"><span>Medios electrónicos</span></label>
                        <label class="sm"><span>El comité cuenta con Facebook</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm"><span>El comité cuenta con correo electrónico</span><input type="checkbox" name="organiza" value="1"></label>
                        <label class="sm" style="margin-left:30%;"><span>El comité cuenta con Whatsapp</span><input type="checkbox" name="organiza" value="1"></label>
                    </div>
                    <label>
                        <span>Núm de reuniones en el mes:</span><input type="text" name="nreuniones" onkeyup="agregar(this.value)" maxlength="2">
                    </label>
                    <div class="listreun">
                        <label><span>Fecha</span><span>No. de Asistentes</span><span id="resultreun" style="color:red;">Ninguna reunión</span></label>
                        <div id="reun">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <label>
                        <span>Tienen proyectos en proceso:</span>
                        <input type="radio" '; if($rowz['proyecto']==20){echo ' checked';} echo ' value=20 id="proyectos" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyectos">S&iacute</label>
                        <input type="radio" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){echo ' checked';} echo ' value=0 id="proyecton" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyecton">No</label>
                    </label>
                    <div id="datosproy" style="display:none;">
                        <label><span>Datos del Proyecto:</span>
                            <label><span>Nombre:</span><input type="text" name="nombre_proy1"></label>
                            <label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="fecha_proy1" name="fecha_proy1"></label>
                            <label style="margin-left:35%;"><span>Tipo:</span><select name="tipo_proy1">
                                <option value="" selected> -- Seleccione -- </option>
                                <option value="1">Tejido Social</option>
                                <option value="2">Generación de Ingresos</option>
                                <option value="3">Gestión</option>
                            </select></label>
                            <div id="nproy"></div>
                            <label style="margin-left:35%;"><input type="button" class="button" value="Agregar proyecto" onclick="add_proy();"></label>
                        </label>
                    </div>
                    <h2>Eventos</h2>
                    <label>
                        <span>Calendario de Eventos</span><span id="num_events">Agregar núm de eventos:</span><input type="text" name="neventos" style="width:10%;" onkeyup="agregar_e(this.value,1)" maxlength="2">
                    </label>';
                    if($_GET['p']==1){
                        echo '<div class="listeven">
                            <label><span>Nombre:</span><span>Fecha:</span><span>Tipo:</span><span>Responsable:</span><span>Correo:</span><span>Estatus:</span></label><div style="clear:both;"></div>
                            <div id="even">
                                <label><span>Evento 1</span><span>2016-01-01</span><span>Tejido social</span><span>Responsable 1</span><span>test@test.com</span><select id="status_even" name="status_even" onchange="recalc2(this.id,1);"><option value="1" selected>En espera</option><option value="2">Realizado</option><option value="3">Postergado</option><option value="4">Cancelado</option></select></label>
                            </div>
                        </div>';
                    }
                    else{
                        echo '<div class="listeven">
                            <label><span>Nombre:</span><span>Fecha:</span><span>Tipo:</span><span>Responsable:</span><span>Correo:</span><span>Estatus:</span></label>
                            <div id="even">
                            </div>
                        </div>';
                    }
                    echo '<div style="clear:both;"></div>
                    <label>
                    <span>Núm de eventos realizados al año:</span><span id="num_events">Agregar núm de eventos fuera del calendario:</span><input type="text" name="neventosfc" style="width:10%;" onkeyup="agregar_e(this.value,2)" maxlength="2"><span id="resulteven" style="color:red;float:right;">Ninguno</span>
                    </label>
                    <div class="listevenf">
                        <label><span>Nombre:</span><span>Fecha:</span><span>Tipo:</span><span>Responsable:</span><span>Correo:</span><span>Estatus:</span><span>Motivo:</span></label>
                        <div id="evenf">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <h2>Orden</h2>
                    <label>
                        <span>Las instalaciones se respetan:</span><span id="resultres" style="color:green;">Sí</span>
                    </label>
                    <div style="clear:both;"></div>
                    <div class="listorg">
                        <label><span>Los usuarios no atienden a las indicaciones de letreros, señalizaciones y reglamento. No aplica si en el parque no hay letreros, señalizaciones y reglamento instalados.</span><input type="checkbox" name="respint" value="1"></label>
                        <label><span>En las instalaciones existen evidencias de maltrato ocasionado de manera deliverada por los usuarios.</span><input type="checkbox" name="respint" value="1"></label>
                        <label><span>Circulan personas por áreas que no son para uso peatonal.</span><input type="checkbox" name="respint" value="1"></label>
                        <label><span>Circulan bicicletas por áreas de uso peatonal y/o por áreas verdes.</span><input type="checkbox" name="respint" value="1"></label>
                        <label><span>Se estacionan automoviles dentro del espacio público</span><input type="checkbox" name="respint" value="4"></label>
                        <label><span>Circulan motocicletas dentro del espacio público.</span><input type="checkbox" name="respint" value="4"></label>
                        <label><span>Existen puestos de venta dentro del espacio público</span><input type="checkbox" name="respint" value="4"></label>
                        <label><span>Existen construcciones hechas por particulares dentro del espacio público</span><input type="checkbox" name="respint" value="4"></label>
                    </div>
                    <div style="clear:both;"></div>
                    <label>
                        <span>Se cuenta con un reglamento de orden: </span><select id="reglamento" name="reglamento">
                            <option value="" selected> -- Selecciona --</option>
                            <option value=0>No</option>
                            <option value=15>Sólo compartido por escrito</option>
                            <option value=30>Instalado en el parque</option>
                        </select>
                    </label>
                    <label>
                        <span>Se mantiene limpio:</span><span id="resultlimp" style="color:green;">Muy limpio</span>
                    </label>
                    <div style="clear:both;"></div>
                    <div class="listorg">
                        <label><span>Hojas y residuos producido por la vegetación del lugar.</span><input type="checkbox" name="limpio" value="1"></label>
                        <label><span>Tierra acumulada en exceso.</span><input type="checkbox" name="limpio" value="1"></label>
                        <label><span>Basura generada por los usuarios del parque.</span><input type="checkbox" name="limpio" value="3"></label>
                        <label><span>Restos de excremento de animales.</span><input type="checkbox" name="limpio" value="3"></label>
                        <label><span>Basura doméstica.</span><input type="checkbox" name="limpio" value="6"></label>
                        <label><span>Escombro.</span><input type="checkbox" name="limpio" value="6"></label>
                        <label><span>Muebles abandonados.</span><input type="checkbox" name="limpio" value="6"></label>
                        <label><span>Carros abandonados</span><input type="checkbox" name="limpio" value="6"></label>
                    </div>
                    <label>
                        <span>Se generó jornada de limpieza:</span>Sí<input type="radio" id="sijornada" name="jornada" value="1">No<input type="radio" name="jornada" value="2">
                    </label>';
                    echo '<h2>Áreas Verdes</h2>
                    <label>
                        <span>Árboles:</span><input class="button" type="button" value="Agregar especie" onclick="agregar_av();">
                    </label>
                    <div id="esparboles" style="display:none;">
                        <label>
                            <span>Endémico:</span>Sí<input type="radio" id="endemicos" onclick="images_arb(this.id);" name="endemico" value="1">No<input type="radio" id="endemicon" onclick="images_arb(this.id);" name="endemico" value="2">
                        </label>
                        <label>
                            <span>Escoge un árbol:</span></label>
                            <div id="imgarbolend" style="display:none;">';
                            $directorio = 'endemico';
                            $ficheros1  = scandir($directorio);
                            foreach($ficheros1 as $k=>$v){
                                if(substr($v,0,1)!== '.'){
                                    echo '<label style="display:inline-block;width:25%;"><input type="radio" name="arbolend" value="'.$v.'"><img src="endemico/'.$v.'" width="100" height="100"></label>';
                                }
                            }
                            echo '</div>
                            <div id="imgarbol" style="display:none;">';
                            $directorion = 'no_endemico';
                            $ficheros2  = scandir($directorion);
                            foreach($ficheros2 as $k=>$v){
                                if(substr($v,0,1)!== '.'){
                                    echo '<label style="display:inline-block;width:25%;"><input type="radio" name="arbolno" value="'.$v.'"><img src="no_endemico/'.$v.'" width="100" height="100"></label>';
                                }
                            }
                            echo '</div>
                        <div style="clear:both;"></div>
                        <label>
                            <span>¿Cuántos arboles tienen altura de 1 a 5 metros?</span><input type="text" id="cantarbolesc" name="cantarbolesc">
                        </label>
                        <label>
                            <span>¿Cuántos arboles tienen altura de 5.01 a 10 metros?</span><input type="text" id="cantarbolesm" name="cantarbolesm">
                        </label>
                        <label>
                            <span>¿Cuántos arboles tienen altura de 10.01 a 20 metros?</span><input type="text" id="cantarbolesg" name="cantarbolesg">
                        </label>
                        <label>
                            <span>Promedio del ancho de los árboles</span><input type="text" id="promancho" name="promancho">
                        </label>
                        <label>
                            <span>¿Cuántos arboles tienen altura de 10.01 a 20 metros?</span><input type="text" id="cantarbolesg" name="cantarbolesg">
                        </label>
                        <label>
                            <span>¿Cuántos arboles tienen altura de 10.01 a 20 metros?</span><input type="text" id="cantarbolesg" name="cantarbolesg">
                        </label>
                        <label>
                            <span>Ubicación:</span>Banqueta<input type="radio" id="banqueta" value="banqueta" name="ubicacion" onclick="datos_ubic(this.value);">Interior<input type="radio" id="interior" name="ubicacion" value="interior" onclick="datos_ubic(this.value);">
                        </label>
                        <div id="espbanqueta" style="display:none;">
                            <label>
                                <span>La daña?:</span>Sí<input type="radio" id="danas" name="dana" value="1">No<input type="radio" id="danan" name="dana" value="0">
                            </label>
                        </div>
                        <div id="espinterior" style="display:none;">
                            <label>
                                <span>Area:</span><select name="area"><option value=""> -- Seleccione -- </option>
                                <option value="1">Deportiva</option>
                                <option value="2">Esparcimiento</option>
                                <option value="3">De juego</option>
                                </select>
                            </label>
                        </div>
                        <label>
                            <span>Esta bajo red electrica?:</span>Sí<input type="radio" id="reds" name="red" value="1">No<input type="radio" id="redn" name="red" value="0">
                        </label>
                        <label>
                            <span>Toca los cables?:</span>Sí<input type="radio" id="cabless" name="cables" value="1">No<input type="radio" id="cablesn" name="cables" value="0">
                        </label>
                        <label>
                            <span>Color de copa uniforme:</span><input type="text" name="copa">
                        </label>
                        <label>
                            <span>Sistema de riego:</span><select name="riego" id="riego"><option value=""> -- Seleccione -- </option>
                            <option value="1">Automatico</option>
                            <option value="2">Manual</option>
                            <option value="3">Por goteo</option>
                            </select>
                        </label>
                        <label>
                            <span>Frecuencia de poda:</span><select name="poda" id="poda" onchange="quien_poda(this.value);"><option value=""> -- Seleccione -- </option>
                            <option value="1">Nunca</option>
                            <option value="2">Cada 3 meses</option>
                            <option value="3">Cada 2 meses</option>
                            <option value="4">Mensual</option>
                            </select>
                        </label>
                        <div id="quien" style="display:none;">
                            <label>
                                <span>Quién:</span>Comité<input type="radio" id="enc_podac" name="enc_poda" value="comite">Municipio<input type="radio" id="enc_podam" name="enc_poda" value="municipio">Empresa Privada<input type="radio" id="enc_podae" name="pcomite" value="empresa">
                            </label>
                        </div>
                        <label>
                            <span>Lesiones en tronco:</span>Sí<input type="radio" id="lesioness" name="lesiones" value="1">No<input type="radio" id="lesionesn" name="lesiones" value="2">
                        </label>
                        <label>
                            <span>Fijado al suelo:</span>Sí<input type="radio" id="fijados" name="fijado" value="1">No<input type="radio" id="fijadon" name="fijado" value="2">
                        </label>
                    </div>
                    <label>
                        <span>Pasto:</span><input class="button" type="button" value="Agregar area de pasto" onclick="agregar_pasto();">
                    </label>
                    <div id="esppasto" style="display:none;">
                        <label>
                            <span>Tipo:</span>Silvestre<input type="radio" id="silvestre" name="tipopasto" value="silvestre">Comercial<input type="radio" id="comercial" name="tipopasto" value="comercial">
                        </label>
                        <label>
                            <span>Uso:</span><select name="uso_pasto" id="uso_pasto"><option value=""> -- Seleccione -- </option>
                            <option value="1">Area de juego</option>
                            <option value="2">Area deportiva</option>
                            <option value="3">Area de estar</option>
                            <option value="4">Otros</option>
                            </select>
                        </label>
                        <label>
                            <span>Extension m2:</span><input type="text" id="extension" name="extension">
                        </label>
                        <label>
                            <span>Maleza:</span>Sí<input type="radio" id="malezas" value="1" name="maleza">No<input type="radio" id="malezan" name="maleza" value="2">
                        </label>
                        <label>
                            <span>Sistema de riego:</span><select id="riegop" name="riego"><option value=""> -- Seleccione -- </option>
                            <option value="1">Automatico</option>
                            <option value="2">Manual</option>
                            <option value="3">Por goteo</option>
                            </select>
                        </label>
                        <label>
                            <span>Frecuencia de poda:</span><select id="podap" name="poda" onchange="quien_podap(this.value);"><option value=""> -- Seleccione -- </option>
                            <option value="1">Nunca</option>
                            <option value="2">Cada 3 meses</option>
                            <option value="3">Cada 2 meses</option>
                            <option value="4">Mensual</option>
                            </select>
                        </label>
                        <div id="quienp" style="display:none;">
                            <label>
                                <span>Quién:</span>Comité<input type="radio" id="enc_podapc" name="enc_poda" value="comite">Municipio<input type="radio" id="enc_podapm" name="enc_poda" value="municipio">Empresa Privada<input type="radio" id="enc_podape" name="pcomite" value="empresa">
                            </label>
                        </div>
                        <label>
                            <span>Rastro de topos:</span>Sí<input type="radio" id="topos" name="topo" value="1">No<input type="radio" id="topon" name="topo" value="2">
                        </label>
                        <label>
                            <span>Color:</span></label><div id="colorpasto">';
                            $directoriop = 'colores_pasto';
                            $ficherosp  = scandir($directoriop);
                            foreach($ficherosp as $k=>$v){
                                if(substr($v,0,1)!== '.'){
                                    echo '<label style="display:inline-block;width:25%;"><input type="radio" name="colorpasto" value="'.$v.'"><img src="colores_pasto/'.$v.'" width="100" height="100"></label>';
                                }
                            }
                            echo '</div>
                    </div>';
                    echo '<center><input type="button" id="guardar_visita" class="button" value="Guardar"></center>
                    <input type="hidden" id="num_proy" name="num_proy" value=1>
                    <input type="hidden" id="narb" name="narb" value=1>
                </div>
            </div>
            <div id="screen2">
                <div class="white-half">
                    <h1>Tangibles</h1>
                    <label><span>Nombre del evento que se reporta como tangible</span><input type="text" name="nombre_tangible"></label>
                    <label><span>Fecha</span><input type="text" id="datepicker2" name="fecha_ini_tangible"></label>
                    <label><span>Propósito</span><select name="proposito_tangible" id="proposito_tangible" onchange="sel_desc(this.value);">
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1" > Gestión con Empresa</option>
                        <option value="2" > Gestión con H. Ayuntamiento</option>
                        <option value="3" > Infraestructura y mobiliario </option>
                        <option value="4" > Ingresos</option>
                        <option value="5" > Tejido social </option>
                        <option value="6" > Organización </option></select></label>
                    <label><span>Tipo</span><select id="tipo_tangible" name="tipo_tangible" onchange="sel_exp(this.value);"><option value=""> -- Seleccione -- </option></select></label>
                    <label><span>Notas del tangible</span><input type="text" name="notas_tangible"></label>
                    <label><span>Evidencias del tangible</span><input type="file" name="file_tangible" multiple></label>
                    <div style="clear:both;"></div><label><span>Experiencia Exitosa</span><input type="radio" value="si" disabled id="experiencia_si" name="experiencia_exi"><label class="white-pinked" for="experiencia_si">S&iacute</label>
                    <input type="radio" value="no" disabled id="experiencia_no" name="experiencia_exi"><label class="white-pinked" for="experiencia_no">No</label>                    
                    <div id="experiencia_show" style="display:none;">
                        <label>
                            <span>Fotos del evento: </span><input type="file" name="file_experiencia" multiple>&nbsp;<input type="button" class="button" name="incluir" value="Incluir evidencia de tangible">
                        </label>
                        <label>
                            <span>URL del video: </span><input type="text" name="video"/>
                        </label>
                        <label>
                            <span>Personas involucradas(comite): </span><input type="text" name="involucrados_comite">
                        </label>
                        <label>
                            <span>Personas involucradas(vecinos): </span><input type="text" name="involucrados_vecinos">
                        </label>
                        <label>
                            <span>Descripcion de actividades:</span><textarea name="actividades"></textarea>
                        </label>
                        <label>
                            <span>N&uacute;mero de asistentes:</span><input type="text" name="asistentes">
                        </label>
                        <label>
                            <span>Beneficios obtenidos:</span><textarea name="beneficios"></textarea>
                        </label>
                        <label>
                            <span>&Aacute;rea de impacto:</span><select name="impacto" id="impacto" onchange="addsel(2);">
                            <option value=""> -- Seleccione --</option>
                            <option value="1">Servicios p&uacute;blicos</option>
                            <option value="2">Mobiliarios de parques</option>
                            <option value="3">Canchas deportivas</option>
                            <option value="4">Espacios de convivencia social</option>
                            <option value="5">Elementos urbanos</option>
                            </select>
                        </label>
                        <label>
                            <span>Cantidad:</span><input type="text" name="cantidad_imp">
                        </label>
                        <label>
                            <span>Concepto:</span><select name="descimpacto" id="descimpacto"">
                            <option value=""> -- Seleccione --</option>
                            </select>
                        </label>
                        <label>
                            <span>Descripción de área de impacto:</span><textarea name="descimpacto2"></textarea>
                        </label>
                        <label>
                            <span>Clave de &eacute;xito:</span><textarea name="clave"></textarea>
                        </label>
                        <label>
                            <span>Aspectos a mejorar:</span><textarea name="mejorar"></textarea>
                        </label>
                        <label>
                            <span>Contacto del comité(e-mail):</span><input type="text" name="contacto_exp">
                        </label>
                        <h2>Inversi&oacute;n</h2>
                        <label>
                            <span>Costo de los recursos y materiales utilizados:</span><input type="text" name="costos">
                        </label>
                        <label>
                            <span>Ingresos obtenidos por venta de boletos:</span><input type="text" name="boletos">
                        </label>
                        <label>
                            <span>Ingresos obtenidos por patrocinios:</span><input type="text" name="patrocinios">
                        </label>
                    </div>
                    <center><input type="button" class="button" value="Guardar"></center>
                </div>
            </div>
            <div id="screen3">
                <div class="white-half">
                    <h1>Tareas</h1>
                    <div id="tareas" class="tareas"></div>
                </div>
            </div>
        </body>
    </html>';
    exit();
}
else{
    echo '<!doctype html>
    <html lang="es">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <link href="form_style.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
            <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
            <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
            <title>Sistema PA</title>
            <style>
            #contenedor {
                    width: 480px;
            }
            .menu {
                list-style: none outside none;
                padding: 0;
            }
            .menu li {
                float: left;
                position: relative;
            }
            .menu a {
                color: black;
                float: left;
                font: bold 12px Arial,Helvetica;
                padding: 12px 30px;
                text-decoration: none;
                text-transform: uppercase;
                border-right: 1px solid #222222;
                    box-shadow: 1px 0 0 #444444;
            }
            
            .menu a:hover {
                color: #FAFAFA;
                background-color: gray;
            }
            
            .menu li:first-child a {
                border-radius: 5px 0 0 5px;
            }
            
            .menu li:last-child a {
                    border-radius: 0 5px 5px 0;
                    border-right: 0;
                    box-shadow: none;
            }
            
            .menu .burbuja {
                    width: 8px;
                    height: 15px;
                    text-align: center;
                background: none repeat scroll 0 0 #E02424;
                border-radius: 3px 3px 3px 3px;
                color: #FFFFFF;
                font: bold 0.9em Tahoma,Arial,Helvetica;
                padding: 2px 6px;
                position: absolute;
                right: 5px;
                top: -5px;
                -webkit-transition: all 0.5s ease-out;
                   -moz-transition: all 0.5s ease-out;
                    -ms-transition: all 0.5s ease-out;
                     -o-transition: all 0.5s ease-out;
                        transition: all 0.5s ease-out;
            }
            
            .burbuja.agrandar {
                    width: 15px;
                    height: 20px;
                    padding-top: 5px;
            }
            
            button {
                    background-color: #BEE5FF;
                    border:1px solid #BDCAE0;
                    height: 40px;
                    width: 200px;
                    border-radius: 5px;
                    color: black;
                    text-transform: uppercase;
                    font-weight: bold;
                    cursor: pointer;
                    margin-top: 10px;
            }
            
            button:hover {
                    background-color: #4176FF;
                    color: white;
            }
            
            #nebaris{
                    background-color: #333;
                    color: white;
                    padding: 15px;
                    text-align: center;
                    margin-top: 120px;
                    font-family: helvetica;
                    width: 650px;
                    margin: 100px auto;
            }
            
            #nebaris a{
                    color:rgb(178, 255, 178);
            }
            
            #nebaris a:hover{
                    color:white;
            }
            .listorg{
                margin-left:25%;
            }
            .listorg label>span{
                width:75%;
            }
            .listorg label{
                display:inline-block;
                width:45%;
            }
            .listreun{
                margin-left:25%;
            }
            .listreun label>span{
                width:25%;
                text-align:center;
            }
            .listreun label{
                width:100%;
            }
            .listreun input[type="text"]{
                width:25%;
            }
            .tareas label>span{
                    width:50%;
            }
            </style>
            <script>
                $(function() {
                    $("#datepicker1").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    $("#datepicker2").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    $("#datepicker3").datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    // obtenemos el valor actual de la burbuja
                    var valor = parseInt($(".burbuja").html());
                    var $burbuja = $(".burbuja");
            
                    // al presionar algún botón del div "botones"
                    $("#guardar_visita").on("click",function(event){
            
                            // almacenamos el valor que tenía la burbuja antes del click
                            var valorPrevio = valor;
            
                            if($("#opera").val()>0){
                                $("#tareas").append("<label><span>Registrar miembros del comité en la base de datos</span><input class=\"button\" type=\"button\" id=\"res_miembros\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#formaliza").val()!=""){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Formalización</span><input class=\"button\" type=\"button\" id=\"res_formal\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            if($("#resultorg").text()!="Sin organización"){
                                $("#tareas").append("<label><span>Llenar el formato tangible de Nivel de Organización</span><input class=\"button\" type=\"button\" id=\"res_organiza\" value=\"Resolver\" onclick=\"resolver(this.id);\"></label><br>");
                                valor++;
                            }
                            // si hubo un cambio en el valor
                            if (valor != valorPrevio) {
                                    agrandar($burbuja);			
                            }
                    });
                    // función que pasado un tiempo, quita la clase "agrandar" del elemento
                    function removeAnimation(){
                            setTimeout(function() {
                                    $burbuja.removeClass("agrandar")
                            }, 1000);
                    }
            
                    // función que modifica el valor de la burbuja y la agranda
                    function agrandar ($elemento) {
                            $elemento.html(valor).addClass("agrandar");
                            removeAnimation();
                    }
                    $("input[name=\"organiza\"]").change(function(){
                        recalculate();
                    });
                });
                function resolver(boton){
                    if(boton=="res_miembros"){
                        var s=4;
                    }
                    else{
                        var s=2;
                    }
                    for(var i=1;i<5;i++){
                        if(i==s){
                            $("#screen"+i).show();
                        }
                        else{
                            $("#screen"+i).hide();
                        }
                    }
                }
                function cambio(s){
                    for(var i=1;i<5;i++){
                        if(i==s){
                            $("#screen"+i).show();
                        }
                        else{
                            $("#screen"+i).hide();
                        }
                    }
                }
                function sh_proy(pr){
                    if(pr<20){
                        $("#datosproy").hide();
                    }
                    else{
                        $("#datosproy").show();
                    }
                }
                function agregar(num){
                    $("#reun").html("");
                    for(var e=1;e<=num;e++){
                        var reunion = \'<label><input type="text" id="datepickerr\'+ e + \'" name="fecha_reunion[\'+ e + \']" onchange="recalc();"/><input type="text" name="num_asistentes[\'+ e + \']" onkeyup="recalc();"/>\';
                        $("#reun").append(reunion);
                        $("#datepickerr"+e).datepicker({ maxDate: new Date, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
                    }
                }
                function recalc(){
                    var sum = 0;
                    $.each($("input[name^=\"fecha_reunion\"]"), function(){            
                        if($(this).val()!=""){
                            sum++;
                        }
                    });
                    if(sum<1){
                        $("#resultreun").text("Ninguna reunión").css("color", "red");
                    }
                    else if(sum<4){
                        $("#resultreun").text("El comité se reune con regularidad").css("color", "orange");
                    }
                    else{
                        $("#resultreun").text("El comité se reune con frecuencia").css("color", "green");   
                    }
                }
                function recalculate(){
                    var sum = 0;
                    $.each($("input[name=\"organiza\"]:checked"), function(){            
                        sum += parseInt($(this).val());
                    });
                    if(sum<1){
                        $("#resultorg").text("Sin organización").css("color", "red");
                    }
                    else if(sum<15){
                        $("#resultorg").text("Regular").css("color", "orange");
                    }
                    else{
                        $("#resultorg").text("Buena organización").css("color", "green");   
                    }
                }
            </script>
        </head>
        <body>
            <div id="contenedor">
                    <ul class="menu">
                        <li><a href="#" onclick="cambio(1);">Visita</a></li>
                        <li><a href="#" onclick="cambio(2);">Tangibles</a></li>
                        <li>
                            <a href="#" onclick="cambio(3);">
                                    Tareas
                                    <span class="burbuja">0</span>
                            </a>
                        </li>
                    </ul>	
            </div><br><br><br>
            <div id="screen1">
                <div class="white-half">
                    <h1>Visita
                        <span>Ingrese los parámetros del parque</span>
                    </h1>
                    <label>
                        <span>Fecha de la visita: </span><input name="fecha_visita" type="text" readonly id="datepicker4" value="'.date("Y-m-d").'">
                    </label>
                    <label>
                        <span>Tipo de visita: </span><select name="visita">
                            <option value="" selected> -- Seleccione --</option>
                        </select>
                    </label>
                    <label>
                        <span>Clasificación de visita: </span><select name="clasvisita">
                            <option value="" selected> -- Seleccione --</option>
                        </select>
                    </label>
                    <h2><label class="white-pinkon">Comit&eacute;</label></h2>
                    <label>
                        <span>Número de personas que operan en el comité: </span><select id="opera" name="opera">
                            <option value="" selected> -- Selecciona --</option>
                            <option value=0>No hay comité</option>
                            <option value=7>Una persona</option>
                            <option value=14>Dos personas</option>
                            <optgroup label="Tres o más personas">
                                <option value=20>Tres personas</option>
                                <option value=20>Cuatro personas</option>
                                <option value=20>Cinco personas</option>
                                <option value=20>Seis personas</option>
                            </optgroup>
                        </select>
                    </label>
                    <label>
                        <span>Formalización del comité</span>
                        <select id="formaliza" name="formaliza">
                            <option value="interno">Solo comit&eacute interno</option>
                            <option value="ayuntamiento">Solo registro en Ayuntamiento</option>
                            <option value="AC">Solo es una AC</option>
                            <option value="AC_ayuntamiento">AC con registro en Ayuntamiento</option>
                            <option value="" selected>Ninguna de las anteriores</option>
                        </select>
                    </label>
                    <label>
                        <span>Nivel de organización del comité:</span>
                        <span style="width:30%;">En el comité existe al menos una persona que se encarga de:</span>
                        <span id="resultorg" style="color:red;width:30%;margin-bottom:20px;">Sin organización</span>
                    </label>
                    <div style="clear:both"></div>
                    <div class="listorg">
                        <label><span>Invitar a los vecinos a las juntas.</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>De moderar la participación de los asistentes a las juntas de comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>Elaborar las minutas de las juntas.</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>Manejar un expediente con los documentos del comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>Lleva un control de los fondos del comité</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>Presenta reportes de ingresos y egresos</span><input type="checkbox" name="organiza" value="2"></label>
                        <label><span>El comité somete a votación las decisiones que toma</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>Los miembros del comité se organizan en comisiones para realizar sus acciones</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité cuenta con un sello</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité utiliza hojas membretadas</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité utiliza uniforme</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité cuenta con Facebook</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité cuenta con correo electrónico</span><input type="checkbox" name="organiza" value="1"></label>
                        <label><span>El comité cuenta con Whatsapp</span><input type="checkbox" name="organiza" value="1"></label>
                    </div>
                    <label>
                        <span>Núm de reuniones en el mes:</span><input type="text" name="nreuniones" onkeyup="agregar(this.value)" maxlength="2">
                    </label>
                    <div class="listreun">
                        <label><span>Fecha</span><span>No. de Asistentes</span><span id="resultreun" style="color:red;">Ninguna reunión</span></label>
                        <div id="reun">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <label>
                        <span>Tienen proyectos en proceso:</span>
                        <input type="radio" '; if($rowz['proyecto']==20){echo ' checked';} echo ' value=20 id="proyectos" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyectos">S&iacute</label>
                        <input type="radio" '; if($rowz['proyecto']==0 && $rowz['proyecto']!=""){echo ' checked';} echo ' value=0 id="proyecton" name="proyecto" onclick="sh_proy(this.value);"><label class="white-pinked" for="proyecton">No</label>
                    </label>
                    <div id="datosproy" style="display:none;">
                        <label><span>Datos del Proyecto:</span>
                            <label><span>Nombre:</span><input type="text" name="nombre_proy"></label>
                            <label style="margin-left:35%;"><span>Fecha:</span><input type="text" id="datepicker1" name="fecha_proy"></label>
                            <label style="margin-left:35%;"><span>Tipo:</span><select name="tipo_proy">
                                <option value="" selected> -- Seleccione -- </option>
                                <option value="1">Tejido Social</option>
                                <option value="2">Generación de Ingresos</option>
                                <option value="3">Gestión</option>
                            </select></label>
                        </label>
                    </div>
                    <center><input type="button" id="guardar_visita" class="button" value="Guardar"></center>
                </div>
            </div>
            <div id="screen2">
                <div class="white-half">
                    <h1>Tangibles</h1>
                    <label><span>Nombre del evento que se reporta como tangible</span><input type="text" name="nombre_tangible"></label>
                    <label><span>Fecha de inicio del evento.</span><input type="text" id="datepicker2" name="fecha_ini_tangible"></label>
                    <label><span>Fecha de finalización del evento.</span><input type="text" id="datepicker3" name="fecha_fin_tangible"></label>
                    <label><span>Tipo de tangible</span><select name="tipo_tangible">
                        <option value="" selected> -- Seleccione -- </option>
                        <option value="1" > Organización</option>
                        <option value="2" > Tejido Social</option>
                        <option value="3" > Gestión </option>
                        <option value="4" > Infraestructura y mobiliario </option>
                        <option value="5" > Otros </option></select></label>
                    <label><span>Descripción del tangible</span><textarea name="descripcion_tangible"></textarea></label>
                    <label><span>Evidencias del tangible</span><input type="file" name="file_tangible"></label>
                    <center><input type="button" class="button" value="Guardar tangible"></center>
                </div>
            </div>
            <div id="screen3">
                <div class="white-half">
                    <h1>Tareas</h1>
                    <div id="tareas" class="tareas"></div>
                </div>
            </div>
        </body>
    </html>';
}
?>