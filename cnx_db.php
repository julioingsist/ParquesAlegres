<?php
import_request_variables('gp');
//Conexion con la base



	if (!$MySQL=@mysql_pconnect('localhost', 'parquesa_wrdp1', 'skYYoung73#')) {
		$t=time();
		while (time()<$t+5) {}
		if (!$MySQL=@mysql_pconnect('localhost', 'parquesa_wrdp1', 'skYYoung73#')) {
			$t=time();
			while (time()<$t+10) {}
			if (!$MySQL=@mysql_pconnect('localhost', 'parquesa_wrdp1', 'skYYoung73#')) {
			mysql_pconnect('localhost', 'parquesa_wrdp1', 'skYYoung73#') or trigger_error(mysql_error(),E_USER_ERROR);
			echo '<br><br><br><h3 align=center">Base de Datos en Mantenimiento</h3>';
			echo '<h4>Por favor intente mas tarde.-</h4>';
			exit;
			}
		}
	}
?>