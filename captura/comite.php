<?php
require_once('../wp-config.php');
echo '<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>';
echo '<form name="forma" method="post">';
echo'<table border=1>';
echo'<tr>';
echo'<th colspan="2">Comit&eacute; de Parque';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Miembros';
echo'</th>';
echo'<tr><td colspan="2" id="miembros"><table border=1><tr>';
echo'<th colspan="2">Miembro 1';
echo'</th></tr>';
echo '<tr><td>Nombre Completo:</td><td><input type="text" id="nombre" name="nombre" size="50"/></td></tr>';
echo'</tr>';
echo '<tr><td>Fecha de nacimiento:</td><td><label for="dia">D&iacute;a</label>&nbsp;<select name="dia">';
for($i=0;$i<=31;$i++){
    if($i==0){
        echo '<option value="" selected> -- </option>';
    }
    else{
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
}
echo '</select>&nbsp<label for="mes">Mes</label>&nbsp;<select name="mes">';
for($i=0;$i<=12;$i++){
    if($i==0){
        echo '<option value="" selected> -- </option>';
    }
    else{
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
}
echo '</select>&nbsp<label for="anio">A&ntildeo</label>&nbsp<select name="anio">';
for($i=1909;$i<=1998;$i++){
    if($i==1909){
        echo '<option value="" selected> ---- </option>';
    }
    else{
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
}
echo '</select>&nbsp&nbsp</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Sexo:';
echo'</td>';
echo'<td><input type="radio" name="sexo" value="Masculino">&nbsp;Masculino &nbsp;&nbsp;<input type="radio" name="sexo" value="Femenino">&nbsp;Femenino';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Nivel Educativo:';
echo'</td>';
echo'<td><select name="educacion">
<option value="" selected> -- Seleccione -- </option>
<option value="primaria">Primaria</option>
<option value="secundaria">Secundaria</option>
<option value="preparatoria">Preparatoria</option>
<option value="profesional">Carrera Profesional</option>
<option value="tecnicos">Estudios T&eacute;cnicos</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Rol en el comit&eacute;:';
echo'</td>';
echo'<td><select name="rol">
<option value="" selected> -- Seleccione -- </option>
<option value="presidente">Presidente</option>
<option value="secretario">Secretario</option>
<option value="tesorero">Tesorero</option>
<option value="vocal">Vocal</option>
<option value="comunicacion">Comunicaci&oacute;n</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tel&eacute;fono:';
echo'</td>';
echo'<td><input type="text" name="telefono1">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Correo electr&oacute;nico:</td>';
echo'<td><input type="text" name="email1">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Contacto:';
echo'</td>';
echo'<td><input type="radio" value="1" id="cont_a1" name="contacto1" onclick="contacto(1);">S&iacute; &nbsp;&nbsp;<input type="radio" value="0" id="cont_b1" name="contacto1">No';
echo'</td>';
echo'</tr></table></td>';
echo '</tr>';
echo'<tr>';
echo'<td colspan="2"><center><input type="button" value="Agregar miembro" name="agregar_miembro" onclick="agregar(document.getElementById(\'num_miembro\').value);"></center>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Comit&eacute;';
echo'</td>';
echo '</tr>
<tr>';
echo'<td>Parque:';
echo'</td>';
echo'<td><select name="parque"><option value="" selected> -- Seleccione -- </select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tel&eacute;fono:';
echo'</td>';
echo'<td><input type="text" name="telefono">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Correo electr&oacute;nico:</td>';
echo'<td><input type="text" name="email">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Redes sociales';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Facebook:</td>';
echo'<td><input type="text" name="facebook">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Twitter:</td>';
echo'<td><input type="text" name="twitter">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Skype:</td>';
echo'<td><input type="text" name="skype">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo '<td>Otro:</td>';
echo'<td><input type="text" name="otro">';
echo'</td>';
echo'</tr>';

echo'</table>';

echo '<div id="hola"></div>';

echo'<div><input type="button" value="Guardar" name="boton_guardar" onclick="form.submit();"></div>
<input type="hidden" name="num_miembro" id="num_miembro" value=1>';
echo '</form>';
echo '<script>
function agregar(num){
    document.getElementById(\'num_miembro\').value++;
    var i = document.getElementById(\'num_miembro\').value;
    var miembro = \'<table border=1><tr><th colspan="2">Miembro \'+ document.getElementById(\'num_miembro\').value + \'</th>\';
    miembro += \'<tr><td>Nombre Completo:</td><td><input type="text" id="nombre" name="nombre" size="50"/></td></tr></tr>\'
    miembro += \'<tr><td>Fecha de nacimiento:</td><td><label for="dia">D&iacute;a</label>&nbsp;<select name="dia">\';
    for(var e=0;e<=31;e++){
        if(e==0){
            miembro += \'<option value="" selected> -- </option>\';
        }
        else{
            miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
        }
    }
    miembro += \'</select>&nbsp<label for="mes">Mes</label>&nbsp;<select name="mes">\';
    for(var e=0;e<=12;e++){
        if(e==0){
            miembro += \'<option value="" selected> -- </option>\';
        }
        else{
            miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
        }
    }
    miembro += \'</select>&nbsp<label for="anio">A&ntildeo</label>&nbsp<select name="anio">\';
    for(var e=1909;e<=1998;e++){
        if(e==1909){
            miembro += \'<option value="" selected> -- </option>\';
        }
        else{
            miembro += \'<option value="\'+e+\'">\'+e+\'</option>\';
        }
    }
    miembro += \'</select>&nbsp&nbsp</td></tr><tr><td>Sexo:</td><td><input type="radio" name="sexo" value="Masculino">&nbsp;Masculino &nbsp;&nbsp;<input type="radio" name="sexo" value="Femenino">&nbsp;Femenino</td></tr>\';
    miembro += \'<tr><td>Nivel Educativo:</td><td><select name="educacion"><option value="" selected> -- Seleccione -- </option><option value="primaria">Primaria</option><option value="secundaria">Secundaria</option><option value="preparatoria">Preparatoria</option><option value="profesional">Carrera Profesional</option><option value="tecnicos">Estudios T&eacute;cnicos</option></select></td></tr>\';
    miembro += \'<tr><td>Rol en el comit&eacute;:</td><td><select name="rol"><option value="" selected> -- Seleccione -- </option><option value="presidente">Presidente</option><option value="secretario">Secretario</option><option value="tesorero">Tesorero</option><option value="vocal">Vocal</option><option value="comunicacion">Comunicaci&oacute;n</option></select></td></tr>\';
    miembro += \'<tr><td>Tel&eacute;fono:</td><td><input type="text" name="telefono\'+i+\'"></td></tr><tr><td>Correo electr&oacute;nico:</td><td><input type="text" name="email\'+i+\'"></td></tr>\';
    miembro += \'<tr><td>Contacto:</td><td><input type="radio" value="1" id="cont_a\'+i+\'" name="contacto\'+i+\'" onclick="contacto(\'+i+\');">S&iacute; &nbsp;&nbsp;<input type="radio" value="0" id="cont_b\'+i+\'" name="contacto\'+i+\'">No</td></tr></table>\';
    $("#miembros").append(miembro);
    
    }
    function contacto(i){
        for(var e=1;e<=document.getElementById(\'num_miembro\').value;e++){
            if(e!=i){
                $("#cont_b"+e).attr(\'checked\', \'checked\');   
            }        
        }
        document.getElementsByName("telefono")[0].value=document.getElementsByName("telefono"+i)[0].value;
        document.getElementsByName("email")[0].value=document.getElementsByName("email"+i)[0].value;
    }
</script>';
?>