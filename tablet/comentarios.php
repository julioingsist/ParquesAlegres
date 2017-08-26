<?php
require_once('../wp-config.php');
echo '<form name="forma" method="post">
Parque:
<table border="1">
<tr><th colspan="1">Comit&eacute;</th><th colspan="1">Visita anterior</th><th colspan="1">Visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Opera con 3 personas o m&aacute;s:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="opera"></textarea></td></tr>
<tr><td>Esta formalizado con el H. Ayuntamiento:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="formaliza"></textarea></td></tr>
<tr><td>Cuenta con buena organizaci&oacute;n:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="organiza"></textarea></td></tr>
<tr><td>Existen reuniones con regularidad:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="reunion"></textarea></td></tr>
<tr><td>Tienen proyectos en proceso:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="proyecto"></textarea></td></tr>
<tr><th colspan="1">Instalaciones</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Cuenta con Proyecto de dise&ntilde;o:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="disenio"></textarea></td></tr>
<td>Cuenta con Proyecto ejecutivo:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="ejecutivo"></textarea></td></tr>
</tr><td>Cuenta con Visi&oacute;n del espacio:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="ejecutivo"></textarea></td></tr>
<tr><td>Esta en buen estado lo que existe:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="estado"></textarea></td></tr>
<tr><td>Hay instalaciones en la mayoria del espacio cancha, &aacute;reas verdes, banquetas:</td>
<td align="center"></td><td align="center"></td><td><textarea style="width:300px;height:100px;" name="instalaciones"></textarea></td></tr>
<tr><th colspan="1">Ingresos</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Tienen fuente de ingresos permanentes:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="ingresop"></textarea></td></tr>
<tr><td>Es suficiente lo ingresado para operar bien:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="ingresadop"></textarea></td></tr>
<tr><td>Tienen cuenta mancomunada:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="mancomunado"></textarea></td></tr>
<tr><th colspan="1">Eventos</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Hay eventos con regularidad:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="eventosr"></textarea></td></tr>
<tr><td>Cuentan con un calendario anual de actividades:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="eventos"></textarea></td></tr>
<tr><th colspan="1">&Aacute;reas verdes</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Cuenta con &aacute;reas verdes, c&eacute;sped y jard&iacute;n etc:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="averdes"></textarea></td></tr>
<tr><td>Se encuentra en buen estado:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="estaver"></textarea></td></tr>
<tr><th colspan="1">Afluencia</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Porcentaje de afluencia sobre lo existente:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="gente"></textarea></td></tr>
<tr><th colspan="1">Orden</th><th colspan="1">visita anterior</th><th colspan="1">visita</th><th colspan="1">Comentarios</th></tr>
<tr><td>Las instalaciones se respetan:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="respint"></textarea></td></tr>
<tr><td>Se cuenta con un reglamento de orden:</td><td align="center"></td>
<td align="center"></td><td><textarea style="width:300px;height:100px;" name="orden"></textarea></td></tr>
<tr><td>Se mantiene limpio:</td><td align="center"></td><td align="center"></td>
<td><textarea style="width:300px;height:100px;" name="limpieza"></textarea></td></tr>
<tr><th colspan="4">Visita</th></tr><tr><td>Comentarios generales de la visita:</td>
<td align="center" colspan="2"></td><td><textarea style="width:300px;height:100px;" name="genvisita"></textarea></td></tr>
</table>
<div><input type="submit" value="Guardar Comentarios" name="boton_enviar"></div>
<input type=hidden name="cmd" value="1"><input type=hidden name="parque" value="19392">
<input type=hidden name="visita" value="3801"><input type=hidden name="cve_visita" value="">
</form>';
?>