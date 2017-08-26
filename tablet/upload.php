<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Importar comités</title>
    </head>
    <body>';
//if they DID upload a file...
$tipo=array(1=>"Generar ingresos y tejido social",2=>"Crear y mantener áreas verdes", 3=>"Organización", 4=>"Gestión", 5=>"Orden");
$subtipo=array(1=>array(1=>"Torneos",2=>"Tianguis",3=>"Kermesse",4=>"Días Festivos",5=>"Cooperación vecinal",6=>"Rifa",7=>"Kermesse cultural",8=>"Función de cine",9=>"Carrera pedestre",10=>"Noche bohemia"),2=>array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda"),3=>array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua"),4=>array(1=>"Honorable Ayuntamiento",2=>"Empresa"),5=>array(1=>"Orden"));
$estatus=array(1=>"En espera",2=>"Realizado",3=>"Postergado",4=>"Cancelado");
$tipo=array("Área verde"=>1,"Centro barrio"=>2,"Bolsillo"=>3,"Lineal"=>4,"Mixto"=>5,"Parque"=>6,"Plaza"=>7,"Deportivo"=>8);
$valid_file=true;
if($_FILES['excel']['name'])
{
	//if no errors...
	if(!$_FILES['excel']['error'])
	{
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['excel']['tmp_name']); //rename file
		if($_FILES['excel']['size'] > (1024000)) //can't be larger than 1 MB
		{
		    $valid_file = false;
		    $message = 'Oops!  Your file\'s size is to large.';
		}
		$info = pathinfo($_FILES['excel']['name']);
                if ($info["extension"] != "csv") {
                    $valid_file = false;
                }
		//if the file has passed the test
		if($valid_file)
		{
                    $message = 'Congratulations!  Your file was accepted.';
		    
			$row = 1;
			ini_set('auto_detect_line_endings',TRUE);
			if (($handle = fopen($_FILES['excel']['tmp_name'], 'r')) !== FALSE) {
				$linea=0;
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					if($linea>0){
						$num = count($data);
                        /*                        
                                                //importacion de eventos
                                                $pos = strpos($data[4], "-");
                                                if($data[1]!=""){
                                                    if($pos !== false){
                                                        $sql4="INSERT INTO eventos_parques (`asesor`,`calendario`,`cve_parque`,`nombre`,`fecha_reg`,`fecha`,`fecha_cambio`,`tipo`,`responsable`,`correo`,`estatus`,`motivo`) VALUES ('1581',";
                                                        if(ucfirst($data[0])=="Sí" || ucfirst($data[0])=="Si"){ 
                                                                $sql4.="'1',";
                                                        }
                                                        else{
                                                            $sql4.="'0',";
                                                        }
                                                        $sql4.="'".$data[1]."',";
                                                        $ban=0;
                                                        if(ucfirst($data[5])=="Generar ingresos" || ucfirst($data[5])=="Tejido social"){
                                                            foreach($subtipo as $key=>$value){
                                                                if($key==1){
                                                                    foreach($value as $llave=>$valor){
                                                                        if($valor==$data[3]){
                                                                            $sql4.="'".$llave."',";
                                                                            $ban=1;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        elseif(ucfirst($data[5])=="Gestión"){
                                                            foreach($subtipo as $key=>$value){
                                                                if($key==4){
                                                                    foreach($value as $llave=>$valor){
                                                                        if($valor==$data[3]){
                                                                            $sql4.="'".$llave."',";
                                                                            $ban=1;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            $sql4.="'',";
                                                            $ban=1;
                                                        }
                                                        if($ban==0){
                                                            $sql4.="'',";
                                                        }
                                                        $sql4.="'".date("Y-m-d")."',";
                                                        $sql4.="'".$data[4]."',";
                                                        if(ucfirst($data[8])=="Postergado" || ucfirst($data[8])=="Cancelado"){
                                                            $sql4.="'".$data[4]."',";
                                                        }
                                                        else{
                                                            $sql4.="'0000-00-00',";
                                                        }
                                                        if(ucfirst($data[5])=="Generar ingresos" || ucfirst($data[5])=="Tejido social"){
                                                            $sql4.="'1',";
                                                        }
                                                        elseif(ucfirst($data[5])=="Gestión"){
                                                            $sql4.="'4',";
                                                        }
                                                        else{
                                                            $sql4.="'',";
                                                        }
                                                        $sql4.="'".$data[6]."',";
                                                        $sql4.="'".$data[7]."',";
                                                        $si=0;
                                                        foreach($estatus as $k=>$v){
                                                            if($data[8]==$v){
                                                                $sql4.="'".$k."',";
                                                                $si=1;
                                                            }
                                                        }
                                                        if($si==0){
                                                            $sql4.="'',";
                                                        }
                                                        $sql4.="'".$data[9]."'";
                                                        $sql4.=")";
                                                        echo $sql4.'<br>';
                                                        $res4=mysql_query($sql4);
                                                    }
                                                }
                          */                      
                                                //importación de datos del parque el 23 de Mayo del 2017
                                                $cve_parque=(int)$data[0];
                                                $id=trim($cve_parque);
                                                echo 'Parque: '.$id.'<br>Zona: '.trim($data[2]).'<br>Clave catastral: '.trim($data[3]).'<br>';
                                                echo 'Ciudad: '.trim($data[4]).'<br>Nombre asentamiento: '.trim($data[5]).'<br>';
                                                echo 'Vialidad principal: '.trim($data[6]).'<br>Vialidad 1: '.trim($data[7]).'<br>';
                                                echo 'Vialidad 2: '.trim($data[8]).'<br>Vialidad posterior: '.trim($data[9]).'<br>';
                                                echo 'Superficie: '.trim($data[10]).'<br>Tipo: '.trim($data[11]).'<br>';
                                                echo '<br><br>';
                                                if(is_numeric(trim($data[2]))){
                                                    update_post_meta($id, '_parque_zona', trim($data[2]) );
                                                }
                                                update_post_meta($id, '_parque_clave_catastral', trim($data[3]) );
                                                update_post_meta($id, '_parque_ciudad', trim($data[4]) );
                                                update_post_meta($id, '_parque_tipoasentamiento', "7" );
                                                update_post_meta($id, '_parque_nomasentamiento', trim($data[5]) );
                                                update_post_meta($id, '_parque_vialidad_prin', trim($data[6]) );
                                                update_post_meta($id, '_parque_vialidad1', trim($data[7]) );
                                                update_post_meta($id, '_parque_vialidad2', trim($data[8]) );
                                                update_post_meta($id, '_parque_vialidad_pos', trim($data[9]) );
                                                //if(is_numeric(trim($data[10]))){
                                                	$superficie=trim($data[10]);
                                                	if($superficie!=""){
                                                		$superficie=round($superficie);
                                                	}
                                                    update_post_meta($id, '_parque_sup', $superficie);
                                                //}
                                                if(is_numeric(trim($data[11]))){
                                                    update_post_meta($id, '_parque_tipo', trim($data[11]) );
                                                }
                                                
                                                //importación de datos del parque
                                                /*$cve_parque=(int)$data[1];
                                                $id=trim($cve_parque);
                                                if(is_numeric(trim($data[3]))){
                                                    update_post_meta($id, '_parque_sup', trim($data[3]) );
                                                }
                                                if(is_numeric($tipo[trim($data[4])])){
                                                    update_post_meta($id, '_parque_tipo', $tipo[trim($data[4])] );
                                                }
                                                update_post_meta($id, '_parque_tipoasentamiento', "7" );
                                                update_post_meta($id, '_parque_nomasentamiento', trim($data[5]) );
                                                update_post_meta($id, '_parque_vialidad_prin', trim($data[6]) );
                                                update_post_meta($id, '_parque_vialidad1', trim($data[7]) );
                                                update_post_meta($id, '_parque_vialidad2', trim($data[8]) );
                                                update_post_meta($id, '_parque_vialidad_pos', trim($data[9]) );
                                                */
                                                //miembros
                                                /*
						$sql="SELECT * FROM comite_parque WHERE cve_parque='".$data[0]."'";
						$res=mysql_query($sql);
						//echo $sql.'<br>';
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_array($res);
							$sql3="SELECT * FROM comite_miembro WHERE `nombre` LIKE '%".$data[9]."%' AND cve_comite='".$row['id']."'";
							$res3=mysql_query($sql3);
							if(mysql_num_rows($res3)>0){
								//echo 'Ya existe el contacto<br>';
							}
							else{
								$sql4="INSERT INTO comite_miembro (`cve_comite`,`nombre`,`fecha_nac`,`sexo`,`nivel`,`rol`,`telefono`,`celular`,`email`,`facebook`,`megusta`,`twitter`,`siguemet`,`instagram`,`siguemei`,`contacto`) VALUES ('".$row['id']."',";
								for ($c=9; $c < $num; $c++) {
									if($data[$c]=="M"){
										$sql4.="'Masculino',";
									}
									elseif($data[$c]=="F"){
										$sql4.="'Femenino',";
									}
									elseif($data[$c]=="P1"){
										$sql4.="'primaria',";
									}
									elseif($data[$c]=="S"){
										$sql4.="'secundaria',";
									}
									elseif($data[$c]=="P2"){
										$sql4.="'preparatoria',";
									}
									elseif($data[$c]=="C"){
										$sql4.="'profesional',";
									}
									elseif($data[$c]=="E"){
										$sql4.="'tecnicos',";
									}
									elseif($data[$c]=="P"){
										$sql4.="'1',";
									}
									elseif($data[$c]=="Se"){
										$sql4.="'2',";
									}
									elseif($data[$c]=="T"){
										$sql4.="'3',";
									}
									elseif($data[$c]=="V1"){
										$sql4.="'4',";
									}
									elseif($data[$c]=="Co"){
										$sql4.="'5',";
									}
									elseif($data[$c]=="V2"){
										$sql4.="'6',";
									}
									else{
										$sql4.="'".$data[$c]."',";	
									}				
								}
								$sql4=substr($sql4, 0, -1);
								$sql4.=")";
								$res4=mysql_query($sql4);
                                                                //echo 'No existe '.$sql4.'<br>';
								//echo $sql4.'<br>';	
							}
						}
						else{
							$sql2="INSERT INTO comite_parque (`fecha_reg`,`cve_parque`,`fecha_alta`,`celular`,`telefono`,`email`,`facebook`,`twitter`,`instagram`,`otro`) VALUES ('".date('Y-m-d')."',";
							for ($c=0; $c < 9; $c++) {
								$sql2.="'".$data[$c]."',";
							}
							$sql2=substr($sql2, 0, -1);
							$sql2.=")";
							$res2=mysql_query($sql2);
                                                        //echo 'No existe el comité '.$sql2.'<br>';
							//echo $sql2.'<br>';
							$id=mysql_insert_id();
							$sql4="INSERT INTO comite_miembro (`cve_comite`,`nombre`,`fecha_nac`,`sexo`,`nivel`,`rol`,`telefono`,`celular`,`email`,`facebook`,`megusta`,`twitter`,`siguemet`,`instagram`,`siguemei`,`contacto`) VALUES ('".$id."',";
							for ($c=9; $c < $num; $c++) {
								if($data[$c]=="M"){
									$sql4.="'Masculino',";
								}
								elseif($data[$c]=="F"){
									$sql4.="'Femenino',";
								}
								elseif($data[$c]=="P1"){
									$sql4.="'primaria',";
								}
								elseif($data[$c]=="S"){
									$sql4.="'secundaria',";
								}
								elseif($data[$c]=="P2"){
									$sql4.="'preparatoria',";
								}
								elseif($data[$c]=="C"){
									$sql4.="'profesional',";
								}
								elseif($data[$c]=="E"){
									$sql4.="'tecnicos',";
								}
								elseif($data[$c]=="P"){
									$sql4.="'1',";
								}
								elseif($data[$c]=="Se"){
									$sql4.="'2',";
								}
								elseif($data[$c]=="T"){
									$sql4.="'3',";
								}
								elseif($data[$c]=="V1"){
									$sql4.="'4',";
								}
								elseif($data[$c]=="Co"){
									$sql4.="'5',";
								}
								elseif($data[$c]=="V2"){
									$sql4.="'6',";
								}
								else{
									$sql4.="'".$data[$c]."',";
								}
							}
							$sql4=substr($sql4, 0, -1);
							$sql4.=")";
							$res4=mysql_query($sql4);
							//echo $sql4.'<br>';
						}
                                                */
					}
					else{
						$linea++;
					}
				}
				fclose($handle);
                                echo 'Miembros importados correctamente.';
			}
		}
		else{
			echo 'Archivo inválido';
		}
	}
	//if there is an error...
	else
	{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['excel']['error'];
	}
	echo $message;
}
else{
	echo 'no?';
}
echo '</body></html>';
?>