<?php

/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */
/** Error reporting */
error_reporting(E_ALL);

ini_set('display_errors', TRUE);

ini_set('display_startup_errors', TRUE);

date_default_timezone_set("America/Mazatlan");

if (PHP_SAPI == 'cli')


	die('This excel should only be run from a Web Browser');


/** Include PHPExcel */

require_once 'Classes/PHPExcel.php';

header('Content-Type: text/html; charset=utf-8');

/*if($_GET['datoscomite']==1){

    ini_set('memory_limit', '1024M'); 

    require_once('../wp-config.php');
    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



                 'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



        // Create new PHPExcel object



        $objPHPExcel = new PHPExcel();



        // Set document properties



        $objPHPExcel->getProperties()->setCreator("Parques Alegres")



            ->setLastModifiedBy("Parques Alegres")



            ->setTitle("Base de datos de comites en H. Ayuntamiento")



            ->setSubject("Base de datos de comites en H. Ayuntamiento")



            ->setDescription("Base de datos de comites en H. Ayuntamiento")



            ->setKeywords("")



            ->setCategory("");



        $objWorkSheet = $objPHPExcel->createSheet(0);



        $objPHPExcel->setActiveSheetIndex(0);



        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



        $objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getFont()->setBold(true);



        $objPHPExcel->setActiveSheetIndex(0)



            ->setCellValue('A1', 'Parque')



            ->setCellValue('B1', 'Nombre')



            ->setCellValue('C1', 'Rol')



            ->setCellValue('D1', 'Telefono')



            ->setCellValue('E1', 'Celular')



            ->setCellValue('F1', 'Correo electrónico');



        $parques=array(14656,14755,14756,14824,14855,15055,15059,15064,15076,15160,16285,16949,17903,18370,18372,18916,18924,19326,19328,19349,19569,19573,19616,19620,19624,21257,21259,21260,21261,21262,21352,21353,21145,21146,21147,21149,21152,21154,21166,21253,21276,21297,21355,21649,21687,21688,22000,22007,20665,20667,20679,20683,20705,20712,21096,21198,21208,21281,21283,21291,21305,21306,21309,21310,21312,21515,21516,21639,21747,22217,23665,23667,14664,14807,14808,14809,14815,14819,14875,14922,14937,14938,15008,15009,15010,15011,15012,15013,15032,15053,15056,15111,15278,15283,15293,15295,15805,15806,15811,19899,22684,22707,23938,14695,14696,14804,14805,14821,14826,14827,14881,14886,14892,14912,14930,15050,15161,15203,16224,19010,14831,14848,14962,14983,15038,15041,17116,21301,21303,23940,24890,14831,14848,14962,14983,15038,15041,17116,21301,21303,23940,24890,14606,14640,14770,14771,14803,14999,15001,15015,15025,15027,15089,15130,15131,15132,15158,15159,15663,15671,15672,15675,17143,20593,20599,20602,20605,22708,22713,22718,23671,23672,23673,23674,23827,24026,20668,20669,20680,20686,20687,20713,20723,21089,21133,21134,21140,21170,21172,21351,21448,21636,21745,21964,23640,23642,23645,23649,14748,14792,14945,14993,15165,15827,15836,16046,24387,14602,14611,14614,14774,15092,15099,15100,15117,15120,15125,15139,15152,15153,14745,14801,14838,14891,14916,14917,14961,15666,15668,14603,14604,14608,14623,14693,14709,14782,14870,14890,15126,20291,21751,21755,14707,14764,14861,14934,15080,15087,15213,15862,16197,20367,22293,22294,24028,14796,14834,14949,15138,15163,15812,17544,18963,14766,14767,14769,14976,15033,15048,15049,14730,14877,14878,14879,14880,15022,15023,15118,15135,15154,15823,15824,15831,15834,15835,15838,15840,15841,15914,15926,15936,15938,15943,16051,16055,16063,16161,16166,16214,16220,16233,16235,16249,22232);



        $i=2;



        foreach ($parques as $k => $v) {



            $sql="SELECT p.post_title,cm.nombre,cm.rol,cm.telefono,cm.email,cm.celular FROM comite_miembro cm INNER JOIN comite_parque cp ON cm.cve_comite=cp.ID INNER JOIN wp_posts p ON p.ID=cp.cve_parque WHERE cp.cve_parque='".$v."' AND cm.rol<5";



            $res=mysql_query($sql);



            while($row=mysql_fetch_array($res)){



                if($row['rol']==1){



                    $rol='Presidente';



                }



                if($row['rol']==2){



                    $rol='Secretario';



                }



                if($row['rol']==3){



                    $rol='Tesorero';



                }



                if($row['rol']==4){



                    $rol='Vocal';



                }



                $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row['post_title'])



                ->setCellValue('B'.$i, $row['nombre'])



                ->setCellValue('C'.$i, $rol)



                ->setCellValue('D'.$i, $row['telefono'])



                ->setCellValue('E'.$i, $row['celular'])



                ->setCellValue('F'.$i, $row['email']);



                $i++;



            }



        }



        // Redirect output to a client’s web browser (Excel5)



        header('Content-Type: application/vnd.ms-excel');



        header('Content-Disposition: attachment;filename="Base de datos de comites ante H. Ayuntamiento"');



        header('Cache-Control: max-age=0');



        // If you're serving to IE 9, then the following may be needed



        header('Cache-Control: max-age=1');



    



        // If you're serving to IE over SSL, then the following may be needed



        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



        header ('Pragma: public'); // HTTP/1.0







        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



        $objWriter->save('php://output');



        exit();



}*/

if ($_POST['cmd'] == "repreuniones") {
    ini_set('memory_limit', '1024M'); 
    require_once('../wp-config.php');
    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Parques Alegres")
        ->setLastModifiedBy("Parques Alegres")
        ->setTitle("Reporte de Reuniones")
        ->setSubject("Reporte de Reuniones")
        ->setDescription("Reporte de Reuniones")
        ->setKeywords("")
        ->setCategory("");
    $objWorkSheet = $objPHPExcel->createSheet(0);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
    $objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Asesor')
        ->setCellValue('B1', 'ID Parque')
        ->setCellValue('C1', 'Nombre Parque')
        ->setCellValue('D1', 'Fecha Registro')
        ->setCellValue('E1', 'El comité se reúne')
        ->setCellValue('F1', 'Cuenta con evidencia')
        ->setCellValue('G1', 'Evidencias');

    $asesores = $_POST['asesor'];
    $cve_parque = $_POST['cve_parque'];
    $nom_parque = $_POST['nombre_parque'];
    $fecha_registro = $_POST['fecha_registro'];
    $comite_reune = $_POST['comite_reune'];
    $tiene_evidencia = $_POST['tiene_evidencia'];
    $evidencias = $_POST['evidencias'];

    $i = 2;
    if (count($asesores) > 0) {
        foreach ($asesores as $key => $asesor) {
            if ($evidencias[$key] != "") {
                $evidencia = explode(",", $evidencias[$key]);
                $fotos = count($evidencia);
            } else {
                $fotos = 0;
            }
            
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $asesor)
                        ->setCellValue('B'.$i, $cve_parque[$key])
                        ->setCellValue('C'.$i, $nom_parque[$key])
                        ->setCellValue('D'.$i, $fecha_registro[$key])
                        ->setCellValue('E'.$i, $comite_reune[$key])
                        ->setCellValue('F'.$i, $tiene_evidencia[$key])
                        ->setCellValue('G'.$i, $fotos);
            $i++;
        }
    } else {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, 'No hay reuniones registradas bajo el criterio de búsqueda.');
    }


    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de Reuniones.xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit();
}

if ($_POST['cmd'] == "repcalendarios") {
    ini_set('memory_limit', '1024M'); 
    require_once('../wp-config.php');
    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Parques Alegres")
        ->setLastModifiedBy("Parques Alegres")
        ->setTitle("Reporte de Calendarios")
        ->setSubject("Reporte de Calendarios")
        ->setDescription("Reporte de Calendarios")
        ->setKeywords("")
        ->setCategory("");
    $objWorkSheet = $objPHPExcel->createSheet(0);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
    $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Fecha Registro')
        ->setCellValue('B1', 'Asesor')
        ->setCellValue('C1', 'ID Parque')
        ->setCellValue('D1', 'Nombre')
        ->setCellValue('E1', 'Cuenta con calendario')
        ->setCellValue('F1', 'Fecha de inicio del calendario')
        ->setCellValue('G1', 'Fecha de fin del calendario')
        ->setCellValue('H1', 'Cuenta con evidencia')
        ->setCellValue('I1', 'Evidencias');

    $registros = $_POST['fecha_registro'];
    $asesor = $_POST['asesor'];
    $cve_parque = $_POST['cve_parque'];
    $nom_parque = $_POST['nom_parque'];
    $tiene_calendario = $_POST['tiene_calendario'];
    $inicio_calendario = $_POST['inicio_calendario'];
    $fin_calendario = $_POST['fin_calendario'];
    $tiene_evidencia = $_POST['tiene_evidencia'];
    $evidencias = $_POST['evidencias'];

    $i = 2;
    if (count($registros) > 0) {
        foreach ($registros as $key => $fecha_registro) {
            if ($evidencias[$key] != "") {
                $evidencia = explode(",", $evidencias[$key]);
                $fotos = count($evidencia);
            } else {
                $fotos = 0;
            }
            
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $fecha_registro)
                        ->setCellValue('B'.$i, $asesor[$key])
                        ->setCellValue('C'.$i, $cve_parque[$key])
                        ->setCellValue('D'.$i, $nom_parque[$key])
                        ->setCellValue('E'.$i, $tiene_calendario[$key])
                        ->setCellValue('F'.$i, $inicio_calendario[$key])
                        ->setCellValue('G'.$i, $fin_calendario[$key])
                        ->setCellValue('H'.$i, $tiene_evidencia[$key])
                        ->setCellValue('I'.$i, $fotos);
            $i++;
        }
    } else {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, 'No hay calendarios registrados bajo el criterio de búsqueda.');
    } 
    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de Calendarios del '.$_POST['fecha_inicial'].' al '.$_POST['fecha_fin'].'.xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit();
}

if($_POST['cmd']=="repcomites") {
    require_once('../wp-config.php');
    $meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
    $param = array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");
    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Parques Alegres")
                 ->setLastModifiedBy("Parques Alegres")
                 ->setTitle("Reporte de comites con parametros")
                 ->setSubject("Reporte de comites con parametros")
                 ->setDescription("Reporte de comites con parametros")
                 ->setKeywords("")
                 ->setCategory("");
    $objWorkSheet = $objPHPExcel->createSheet(0);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
    $objPHPExcel->getActiveSheet()->getStyle("A1:X1")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Nombre')
                ->setCellValue('C1', 'No de personas en el comite')
                ->setCellValue('D1', 'El comité opera con')
                ->setCellValue('E1', '¿Cómo está formalizado?')
                ->setCellValue('F1', 'Cuenta con buena organización')
                ->setCellValue('G1', 'Existen reuniones')
                ->setCellValue('H1', 'Tienen proyectos en proceso')
                ->setCellValue('I1', 'Cuenta con Visión de Espacio')
                ->setCellValue('J1', 'Cuenta con Proyecto de Diseño')
                ->setCellValue('K1', 'Cuenta con Proyecto Ejecutivo')
                ->setCellValue('L1', 'Estado actual de las instalaciones')
                ->setCellValue('M1', 'Hay instalaciones en la mayoria del espacio')
                ->setCellValue('N1', 'Tienen fuente de ingresos permanentes')
                ->setCellValue('O1', 'Es suficiente lo ingresado para operar bien')
                ->setCellValue('P1', 'Tienen cuenta mancomunada')
                ->setCellValue('Q1', 'Hay eventos con regularidad')
                ->setCellValue('R1', 'Cuentan con un calendario anual de actividades')
                ->setCellValue('S1', 'Cuenta con áreas verdes')
                ->setCellValue('T1', '<th>Se encuentra en buen estado')
                ->setCellValue('U1', 'Porcentaje de afluencia sobre lo existente')
                ->setCellValue('V1', 'Las instalaciones se respetan')
                ->setCellValue('W1', 'Se cuenta con un reglamento de orden')
                ->setCellValue('X1', 'Se mantiene limpio');
    
$sql1="select id,post_title from wp_posts where post_status='publish' and post_type='parque'";
    $res1=mysql_query($sql1);
    $i=2;
    while($row1=mysql_fetch_array($res1)){
        $sql3="select COUNT(cm.id) as miembros from comite_miembro cm INNER JOIN comite_parque cp ON cm.cve_comite=cp.id WHERE cp.cve_parque='".$row1['id']."'";
        $res3=mysql_query($sql3);
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $row1['id'])
                ->setCellValue('B'.$i, $row1['post_title']);
        if(mysql_num_rows($res3)>0){
            $row3=mysql_fetch_array($res3);
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C'.$i, $row3['miembros']);
        }
        else{
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('C'.$i, 'No tiene miembros');
        }
        $sql2="select opera,formaliza,organiza,reunion,proyecto,disenio,ejecutivo,vespacio,instalaciones,estado,ingresop,ingresadop,mancomunado,eventos,eventosr,averdes,estaver,riego,gente,limpieza,orden,respint from wp_comites_parques WHERE cve_parque='".$row1['id']."' order by fecha_visita DESC, cve DESC limit 1,1";
        $res2=mysql_query($sql2);
        if(mysql_num_rows($res2)>0){
            $row2=mysql_fetch_array($res2);
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('D'.$i, $row2['opera'])
                ->setCellValue('E'.$i, $row2['formaliza'])
                ->setCellValue('F'.$i, $row2['organiza'])
                ->setCellValue('G'.$i, $row2['reunion'])
                ->setCellValue('H'.$i, $row2['proyecto'])
                ->setCellValue('I'.$i, $row2['vespacio'])
                ->setCellValue('J'.$i, $row2['disenio'])
                ->setCellValue('K'.$i, $row2['ejecutivo'])
                ->setCellValue('L'.$i, $row2['estado'])
                ->setCellValue('M'.$i, $row2['instalaciones'])
                ->setCellValue('N'.$i, $row2['ingresop'])
                ->setCellValue('O'.$i, $row2['ingresadop'])
                ->setCellValue('P'.$i, $row2['mancomunado'])
                ->setCellValue('Q'.$i, $row2['eventosr'])
                ->setCellValue('R'.$i, $row2['eventos'])
                ->setCellValue('S'.$i, $row2['averdes'])
                ->setCellValue('T'.$i, $row2['estaver'])
                ->setCellValue('U'.$i, $row2['gente'])
                ->setCellValue('V'.$i, $row2['respint'])
                ->setCellValue('W'.$i, $row2['orden'])
                ->setCellValue('X'.$i, $row2['limpieza']);
        }
        else{
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('D'.$i, 'No tiene parametros aún');
        }
        $i++;
    }
    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de comites con parametros .xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit();
}
if($_POST['cmd']=="datosparques"){



    ini_set('memory_limit', '1024M'); 



    require_once('../wp-config.php');



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    $sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";



    $res2=mysql_query($sql2);



    while($row2=mysql_fetch_array($res2)) {



        $parques[$row2['ID']]=$row2['post_title'];



    }   



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



        ->setLastModifiedBy("Parques Alegres")



        ->setTitle("Reporte de Datos en parques")



        ->setSubject("Reporte de Datos en parques")



        ->setDescription("Reporte de Datos en parques")



        ->setKeywords("")



        ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:T1")->getFont()->setBold(true);



    $objPHPExcel->setActiveSheetIndex(0)



        ->setCellValue('A1', 'Asesor')



        ->setCellValue('B1', 'ID')



        ->setCellValue('C1', 'Parque')



        ->setCellValue('D1', 'Clave catastral')



        ->setCellValue('E1', 'Estado')



        ->setCellValue('F1', 'Ciudad')



        ->setCellValue('G1', 'Zona')



        ->setCellValue('H1', 'Colonia')



        ->setCellValue('I1', 'Vialidad principal')



        ->setCellValue('J1', 'Vialidad 1')



        ->setCellValue('K1', 'Vialidad 2')



        ->setCellValue('L1', 'Vialidad posterior')



        ->setCellValue('M1', 'Superficie')



        ->setCellValue('N1', 'Tipo')



        ->setCellValue('O1', 'Regimen')



        ->setCellValue('P1', 'Situación legal')



        ->setCellValue('Q1', 'Nivel socioeconomico')



        ->setCellValue('R1', 'Contacto')



        ->setCellValue('S1', 'Latitud')



        ->setCellValue('T1', 'Longitud');



    $filtro="";



    if($_POST['asesor']){



        $filtro.=" AND k2.post_author='".$_POST['asesor']."'";



    }



    if($_POST['parque']){



        $filtro.=" AND k2.ID='".$_POST['parque']."'";



    }



    $i=2;



    $estado=array(1=> 'Aguascalientes',2=> 'Baja California',3=> 'Baja California Sur',4=> 'Campeche',5=> 'Coahuila de Zaragoza',6=> 'Colima',7=> 'Chiapas',8=> 'Chihuahua',9=> 'Distrito Federal',10=> 'Durango',11=> 'Guanajuato',12=> 'Guerrero',13=> 'Hidalgo',14=> 'Jalisco',15=> 'México',16=> 'Michoacán de Ocampo',17=> 'Morelos',18=> 'Nayarit',19=> 'Nuevo León',20=> 'Oaxaca',21=> 'Puebla',22=> 'Querétaro',23=> 'Quintana Roo', 24=> 'San Luis Potosí',25=> 'Sinaloa',26=> 'Sonora',27=> 'Tabasco',28=> 'Tamaulipas',29=> 'Tlaxcala',30=> 'Veracruz de Ignacio de la Llave',31=> 'Yucatán',32=> 'Zacatecas');



    $zona=array(1 => 'Noreste (NE)', 2 => 'Noroeste (NO)', 3 => 'Sureste (SE)', 4 => 'Suroeste (SO)');



    $tipo=array(1=>"Área verde",2=>"Centro barrio",3=>"De bolsillo",4=>"Lineal",5=>"Mixto",6=>"Parque urbano",7=>"Plazuela",8=>"Unidad deportiva");



    $regimen=array(1=>"Público",2=>"Condominal",3=>"Concesionado");



    $legal=array(1=>"Propiedad Gobierno Federal",2=>"Gobierno del Estado",3=>"Gobierno Municipal",4=>"Propiedad Ejidal",5=>"Propiedad Fraccionadora");



    $nivel=array(1=>"Alto (AB)",2=>"Medio alto (C+)",3=>"Medio ( C )",4=>"medio bajo (D+)",5=>"Bajo (D)",6=>"Pobreza extrema (E)");



    $sql="select k1.display_name as asesor, k2.ID as ID, k2.post_title as parque, k3.meta_value as 'clave_catastral', k4.meta_value as estado, k5.meta_value as ciudad, k7.meta_value as zona, k8.meta_value as 'colonia', k9.meta_value as 'vialidad_principal', k10.meta_value as 'vialidad1', k11.meta_value as 'vialidad2', k12.meta_value as 'vialidad_posterior', k13.meta_value as superficie, k14.meta_value as tipo, k15.meta_value as regimen, k16.meta_value as 'situacion_legal', k6.meta_value as 'nivel_socioeconomico', k17.nombre as contacto, k18.latitud as latitud, k18.longitud as longitud from wp_posts k2 LEFT JOIN wp_users k1 ON k1.ID=k2.post_author LEFT JOIN wp_postmeta k3 ON k2.ID=k3.post_id AND k3.meta_key='_parque_clave_catastral' LEFT JOIN wp_postmeta k4 ON k2.ID=k4.post_id AND k4.meta_key='_parque_estado' LEFT JOIN wp_postmeta k5 ON k2.ID=k5.post_id AND k5.meta_key='_parque_ciudad' LEFT JOIN wp_postmeta k7 ON k2.ID=k7.post_id AND k7.meta_key='_parque_zona' LEFT JOIN wp_postmeta k8 ON k2.ID=k8.post_id AND k8.meta_key='_parque_nomasentamiento' LEFT JOIN wp_postmeta k9 ON k2.ID=k9.post_id AND k9.meta_key='_parque_vialidad_prin' LEFT JOIN wp_postmeta k10 ON k2.ID=k10.post_id AND k10.meta_key='_parque_vialidad1' LEFT JOIN wp_postmeta k11 ON k2.ID=k11.post_id AND k11.meta_key='_parque_vialidad2' LEFT JOIN wp_postmeta k12 ON k2.ID=k12.post_id AND k12.meta_key='_parque_vialidad_pos' LEFT JOIN wp_postmeta k13 ON k2.ID=k13.post_id AND k13.meta_key='_parque_sup' LEFT JOIN wp_postmeta k14 ON k2.ID=k14.post_id AND k14.meta_key='_parque_tipo' LEFT JOIN wp_postmeta k15 ON k2.ID=k15.post_id AND k15.meta_key='_parque_regimen' LEFT JOIN wp_postmeta k16 ON k2.ID=k16.post_id AND k16.meta_key='_parque_legal' LEFT JOIN wp_postmeta k6 ON k2.ID=k6.post_id AND k6.meta_key='_parque_nivel' LEFT JOIN comite_parque k20 ON k2.ID=k20.cve_parque LEFT JOIN comite_miembro k17 ON k20.ID=k17.cve_comite AND k17.contacto='1' LEFT JOIN coordenadas_visita k18 ON k2.ID=k18.cve_parque WHERE k2.post_type='parque' and k2.post_status='publish' ".$filtro." group BY k2.ID";



    $res=mysql_query($sql);



    if(mysql_num_rows($res)>0){



        while($row=mysql_fetch_array($res)){



            $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row['asesor'])



                ->setCellValue('B'.$i, $row['ID'])



                ->setCellValue('C'.$i, $row['parque'])



                ->setCellValue('D'.$i, $row['clave_catastral'])



                ->setCellValue('E'.$i, $estado[$row['estado']])



                ->setCellValue('F'.$i, $row['ciudad'])



                ->setCellValue('G'.$i, $zona[$row['zona']])



                ->setCellValue('H'.$i, $row['colonia'])



                ->setCellValue('I'.$i, $row['vialidad_principal'])



                ->setCellValue('J'.$i, $row['vialidad1'])



                ->setCellValue('K'.$i, $row['vialidad2'])



                ->setCellValue('L'.$i, $row['vialidad_posterior'])



                ->setCellValue('M'.$i, $row['superficie'])



                ->setCellValue('N'.$i, $tipo[$row['tipo']])



                ->setCellValue('O'.$i, $regimen[$row['regimen']])



                ->setCellValue('P'.$i, $legal[$row['situacion_legal']])



                ->setCellValue('Q'.$i, $nivel[$row['nivel_socioeconomico']])



                ->setCellValue('R'.$i, $row['contacto'])



                ->setCellValue('S'.$i, $row['latitud'])



                ->setCellValue('T'.$i, $row['longitud']);



            $i++;



        }             



    }       



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de datos en parques.xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');







    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}



if($_POST['cmd']=="limpieza"){



    ini_set('memory_limit', '1024M'); 



    require_once('../wp-config.php');



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    $sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";



    $res2=mysql_query($sql2);



    while($row2=mysql_fetch_array($res2)) {



        $parques[$row2['ID']]=$row2['post_title'];



    }



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



        ->setLastModifiedBy("Parques Alegres")



        ->setTitle("Reporte de Limpieza en parques")



        ->setSubject("Reporte de Limpieza en parques")



        ->setDescription("Reporte de Limpieza en parques")



        ->setKeywords("")



        ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->getFont()->setBold(true);



    $objPHPExcel->setActiveSheetIndex(0)



        ->setCellValue('A1', 'Asesor')



        ->setCellValue('B1', 'ID')



        ->setCellValue('C1', 'Parque')



        ->setCellValue('D1', 'Hojas y residuos producido por la vegetación del lugar')



        ->setCellValue('E1', 'Tierra acumulada en exceso')



        ->setCellValue('F1', 'Basura generada por los usuarios del parque')



        ->setCellValue('G1', 'Restos de excremento de animales')



        ->setCellValue('H1', 'Basura doméstica')



        ->setCellValue('I1', 'Escombro')



        ->setCellValue('J1', 'Muebles abandonados')



        ->setCellValue('K1', 'Carros abandonados');



    $filtro="";



    if($_POST['asesor']){



        $filtro.=" AND u.ID='".$_POST['asesor']."'";



    }



    if($_POST['parque']){



        $parques=array($_POST['parque'] => 0, );



    }



    $i=2;



    foreach ($parques as $key => $value) {



        $sql="select p.ID, p.post_title as parque, u.display_name as nomasesor, mantienelimpio from wp_comites_parques cp INNER JOIN wp_posts p on cp.cve_parque=p.ID INNER JOIN wp_users u on u.ID=p.post_author where cve_parque='".$key."' $filtro order by cp.fecha_visita DESC, cp.cve DESC limit 1,1";



        $res=mysql_query($sql);



        if(mysql_num_rows($res)>0){



            while($row=mysql_fetch_array($res)){



                $orgv="";



                if($row['mantienelimpio']!=""){



                    $l=3;



                    $organizacion=explode(",",$row['mantienelimpio']);



                    for($o=1;$o<9;$o++){



                        if(in_array($o, $organizacion)){



                            $objPHPExcel->setActiveSheetIndex(0)



                            ->setCellValue($letra[$l].$i, "1");



                            $l++;



                        }



                        else{



                            $objPHPExcel->setActiveSheetIndex(0)



                            ->setCellValue($letra[$l].$i, "0");



                            $l++;



                        }



                    }



                }



                else{



                    for($o=3;$o<11;$o++){



                        $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue($letra[$o].$i, "Sin capturar");



                    }



                }



                $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row['nomasesor'])



                ->setCellValue('B'.$i, $row['ID'])



                ->setCellValue('C'.$i, $row['parque']);



                



            }



            $i++;     



        }



    }       



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de limpieza en parques.xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');







    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}



if($_POST['cmd']=="respeto"){



    ini_set('memory_limit', '1024M'); 



    require_once('../wp-config.php');



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    $sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";



    $res2=mysql_query($sql2);



    while($row2=mysql_fetch_array($res2)) {



        $parques[$row2['ID']]=$row2['post_title'];



    }



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



        ->setLastModifiedBy("Parques Alegres")



        ->setTitle("Reporte de Respeto en parques")



        ->setSubject("Reporte de Respeto en parques")



        ->setDescription("Reporte de Respeto en parques")



        ->setKeywords("")



        ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getFont()->setBold(true);



    $objPHPExcel->setActiveSheetIndex(0)



        ->setCellValue('A1', 'Asesor')



        ->setCellValue('B1', 'ID')



        ->setCellValue('C1', 'Parque')



        ->setCellValue('D1', 'Los usuarios no atienden a las indicaciones de letreros, señalizaciones y reglamento. No aplica si en el parque no hay letreros, señalizaciones y reglamento instalados')



        ->setCellValue('E1', 'En las instalaciones existen evidencias de maltrato ocasionado de manera deliverada por los usuarios')



        ->setCellValue('F1', 'Circulan personas por áreas que no son para uso peatonal')



        ->setCellValue('G1', 'Circulan bicicletas por áreas de uso peatonal y/o por áreas verdes')



        ->setCellValue('H1', 'Se estacionan automoviles dentro del espacio público')



        ->setCellValue('I1', 'Circulan motocicletas dentro del espacio público')



        ->setCellValue('J1', 'Existen puestos de venta dentro del espacio público')



        ->setCellValue('K1', 'Existen construcciones hechas por particulares dentro del espacio público')
        ->setCellValue('L1', 'Otro')
        ->setCellValue('M1', 'Ninguno');



    $filtro="";



    if($_POST['asesor']){



        $filtro.=" AND u.ID='".$_POST['asesor']."'";



    }



    if($_POST['parque']){



        $parques=array($_POST['parque'] => 0, );



    }



    $i=2;



    foreach ($parques as $key => $value) {



        $sql="select p.ID, p.post_title as parque, u.display_name as nomasesor, respintdetalle from wp_comites_parques cp INNER JOIN wp_posts p on cp.cve_parque=p.ID INNER JOIN wp_users u on u.ID=p.post_author where cve_parque='".$key."' $filtro order by cp.fecha_visita DESC, cp.cve DESC limit 1,1";



        $res=mysql_query($sql);



        if(mysql_num_rows($res)>0){



            while($row=mysql_fetch_array($res)){



                $orgv="";



                if($row['respintdetalle']!=""){



                    $l=3;



                    $organizacion=explode(",",$row['respintdetalle']);



                    for($o=1;$o<11;$o++){



                        if(in_array($o, $organizacion)){



                            $objPHPExcel->setActiveSheetIndex(0)



                            ->setCellValue($letra[$l].$i, "1");



                            $l++;



                        }



                        else{



                            $objPHPExcel->setActiveSheetIndex(0)



                            ->setCellValue($letra[$l].$i, "0");



                            $l++;



                        }



                    }



                }



                else{



                    for($o=3;$o<13;$o++){



                        $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue($letra[$o].$i, "Sin capturar");



                    }



                }



                $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row['nomasesor'])



                ->setCellValue('B'.$i, $row['ID'])



                ->setCellValue('C'.$i, $row['parque']);



            }   



            $i++;  



        }



    }       



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de respeto en parques.xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');







    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}



if($_POST['cmd']=="organizacion"){



    ini_set('memory_limit', '1024M'); 



    require_once('../wp-config.php');



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



        ->setLastModifiedBy("Parques Alegres")



        ->setTitle("Reporte de Organización de comités")



        ->setSubject("Reporte de Organización de comités")



        ->setDescription("Reporte de Organización de comités")



        ->setKeywords("")



        ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:Q1")->getFont()->setBold(true);



    $objPHPExcel->setActiveSheetIndex(0)



        ->setCellValue('A1', 'Asesor')



        ->setCellValue('B1', 'ID')



        ->setCellValue('C1', 'Parque')



        ->setCellValue('D1', 'Invitar a los vecinos a las juntas')



        ->setCellValue('E1', 'De moderar la participación de los asistentes a las juntas de comité')



        ->setCellValue('F1', 'Elaborar las minutas de las juntas')



        ->setCellValue('G1', 'Manejar un expediente con los documentos del comité')



        ->setCellValue('H1', 'Lleva un control de los fondos del comité')



        ->setCellValue('I1', 'Presenta reportes de ingresos y egresos')



        ->setCellValue('J1', 'El comité somete a votación las decisiones que toma')



        ->setCellValue('K1', 'Los miembros del comité se organizan en comisiones para realizar sus acciones')



        ->setCellValue('L1', 'El comité cuenta con un sello')



        ->setCellValue('M1', 'El comité utiliza hojas membretadas')



        ->setCellValue('N1', 'El comité utiliza uniforme')



        ->setCellValue('O1', 'El comité cuenta con Facebook')



        ->setCellValue('P1', 'El comité cuenta con correo electrónico')



        ->setCellValue('Q1', 'El comité cuenta con Whatsapp')
        ->setCellValue('R1', 'Ninguno');



    $filtro="";



    if($_POST['asesor']){



        $filtro.=" AND u.ID='".$_POST['asesor']."'";



    }



    if($_POST['parque']){



        $filtro.=" AND cve_parque='".$_POST['parque']."'";



    }



    $sql="select p.ID, p.post_title as parque, u.display_name as nomasesor,organizacion from wp_posts p LEFT JOIN comite_parque cp ON cp.cve_parque=p.ID INNER JOIN wp_users u ON u.ID=p.post_author INNER JOIN asesores a ON a.ID=u.ID WHERE p.post_status='publish' AND p.post_type='parque' AND a.stat<1 $filtro order by nomasesor, p.ID DESC";



    $res=mysql_query($sql);



    if(mysql_num_rows($res)>0){



        $i=2;



        while($row=mysql_fetch_array($res)){



            $orgv="";



            if($row['organizacion']!=""){



                $organizacion=explode(",",$row['organizacion']);



                $l=3;



                foreach($organizacion as $k=>$v){



                    $objPHPExcel->setActiveSheetIndex(0)



                    ->setCellValue($letra[$l].$i, $v);



                    $l++;



                }



            }



            else{



                $objPHPExcel->setActiveSheetIndex(0)



                    ->setCellValue('D'.$i, 'Sin capturar')



                    ->setCellValue('E'.$i, 'Sin capturar')



                    ->setCellValue('F'.$i, 'Sin capturar')



                    ->setCellValue('G'.$i, 'Sin capturar')



                    ->setCellValue('H'.$i, 'Sin capturar')



                    ->setCellValue('I'.$i, 'Sin capturar')



                    ->setCellValue('J'.$i, 'Sin capturar')



                    ->setCellValue('K'.$i, 'Sin capturar')



                    ->setCellValue('L'.$i, 'Sin capturar')



                    ->setCellValue('M'.$i, 'Sin capturar')



                    ->setCellValue('N'.$i, 'Sin capturar')



                    ->setCellValue('O'.$i, 'Sin capturar')



                    ->setCellValue('P'.$i, 'Sin capturar')



                    ->setCellValue('Q'.$i, 'Sin capturar')
                    ->setCellValue('R'.$i, 'Sin capturar');



            }



            $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row['nomasesor'])



                ->setCellValue('B'.$i, $row['ID'])



                ->setCellValue('C'.$i, $row['parque']);



            $i++;



        }    



    }



    else{



        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, 'No hay resultados registrados bajo el criterio de búsqueda.');



    }       



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de organizacion en comites.xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');







    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}

if ($_POST['cmd'] == "tangibles") {
    ini_set('memory_limit', '1024M'); 
    require_once('../wp-config.php');

    // Create new PHPExcel object
    $objPHPExcel = new PHPExcel();
    // Set document properties
    $objPHPExcel->getProperties()->setCreator("Parques Alegres")
        ->setLastModifiedBy("Parques Alegres")
        ->setTitle("Reporte de Tangibles")
        ->setSubject("Reporte de Tangibles")
        ->setDescription("Reporte de Tangibles")
        ->setKeywords("")
        ->setCategory("");
    $objWorkSheet = $objPHPExcel->createSheet(0);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
    $objPHPExcel->getActiveSheet()->getStyle("A1:X2")->getFont()->setBold(true);
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Datos del tangible');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Ingresos');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('V1', 'Datos de la experiencia exitosa');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:K1');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('L1:U1');
    $objPHPExcel->setActiveSheetIndex(0)->mergeCells('V1:X1');
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A2', 'Asesor')
        ->setCellValue('B2', 'ID Parque')
        ->setCellValue('C2', 'Nombre Parque')
        ->setCellValue('D2', 'Fecha')
        ->setCellValue('E2', 'Propósito')
        ->setCellValue('F2', 'Tipo')
        ->setCellValue('G2', 'Notas')
        ->setCellValue('H2', 'No. de participantes del comité')
        ->setCellValue('I2', 'No. de vecinos participantes')
        ->setCellValue('J2', 'No. de asistentes')
        ->setCellValue('K2', 'Evidencias')
        ->setCellValue('L2', 'Total ingreso')
        ->setCellValue('M2', 'Venta')
        ->setCellValue('N2', 'Cooperación Vecinal')
        ->setCellValue('O2', 'Patrocinios')
        ->setCellValue('P2', 'Gestión')
        ->setCellValue('Q2', 'Costo estimado')
        ->setCellValue('R2', 'Empresa(s) que apoyo(aron)')
        ->setCellValue('S2', 'Área beneficiada')
        ->setCellValue('T2', 'Concepto')
        ->setCellValue('U2', 'Cantidad')
        ->setCellValue('V2', 'Descripción de la actividad')
        ->setCellValue('W2', 'Aspectos a mejorar')
        ->setCellValue('X2', 'Contacto del comité');

    $asesores = $_POST['asesor'];
    $evidencias = $_POST['evidencias'];
    $id_parque = $_POST['id_parque'];
    $parque = $_POST['parque'];
    $fecha_tangible = $_POST['fecha_tangible'];
    $proposito = $_POST['proposito'];
    $tipo = $_POST['tipo'];
    $notas = $_POST['notas'];
    $num_participantes_comite = $_POST['num_participantes_comite'];
    $num_vecinos = $_POST['num_vecinos'];
    $num_asistentes = $_POST['num_asistentes'];
    $total_ingreso = $_POST['total_ingreso'];
    $venta = $_POST['venta'];
    $cooperacion = $_POST['cooperacion'];
    $patrocinios = $_POST['patrocinios'];
    $gestiones = $_POST['gestiones'];
    $costo_estimado = $_POST['costo_estimado'];
    $empresas = $_POST['empresas'];
    $area_beneficiada = $_POST['area_beneficiada'];
    $concepto = $_POST['concepto'];
    $cantidad = $_POST['cantidad'];
    $descripcion_actividad = $_POST['descripcion_actividad'];
    $aspectos_mejorar = $_POST['aspectos_mejorar'];
    $contacto = $_POST['contacto'];

    $i = 3;
    if (count($asesores) > 0) {
        foreach ($asesores as $key => $asesor) {
            if ($evidencias[$key] != "") {
                $evidencia = explode(",", $evidencias[$key]);
                $fotos = count($evidencia);
            } else {
                $fotos = 0;
            }
            
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $asesor)
                        ->setCellValue('B'.$i, $id_parque[$key])
                        ->setCellValue('C'.$i, $parque[$key])
                        ->setCellValue('D'.$i, $fecha_tangible[$key])
                        ->setCellValue('E'.$i, $proposito[$key])
                        ->setCellValue('F'.$i, $tipo[$key])
                        ->setCellValue('G'.$i, $notas[$key])
                        ->setCellValue('H'.$i, $num_participantes_comite[$key])
                        ->setCellValue('I'.$i, $num_vecinos[$key])
                        ->setCellValue('J'.$i, $num_asistentes[$key])
                        ->setCellValue('K'.$i, $fotos)
                        ->setCellValue('L'.$i, $total_ingreso[$key])
                        ->setCellValue('M'.$i, $venta[$key])
                        ->setCellValue('N'.$i, $cooperacion[$key])
                        ->setCellValue('O'.$i, $patrocinios[$key])
                        ->setCellValue('P'.$i, $gestiones[$key])
                        ->setCellValue('Q'.$i, $costo_estimado[$key])
                        ->setCellValue('R'.$i, $empresas[$key])
                        ->setCellValue('S'.$i, $area_beneficiada[$key])
                        ->setCellValue('T'.$i, $concepto[$key])
                        ->setCellValue('U'.$i, $cantidad[$key])
                        ->setCellValue('V'.$i, $descripcion_actividad[$key])
                        ->setCellValue('W'.$i, $aspectos_mejorar[$key])
                        ->setCellValue('X'.$i, $contacto[$key]);
            $i++;
        }
    } else {
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, 'No hay tangibles registrados bajo el criterio de búsqueda.');
    }       
    // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Reporte de Tangibles del '.$_POST['fecha_inicial'].' al '.$_POST['fecha_fin'].' .xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit();
}



if($_POST['cmd']=="parametros"){



    ini_set('memory_limit', '1024M'); 



    require_once('../wp-config.php');



    if($_POST['ult_visita']==1){



        $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



                 'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



        // Create new PHPExcel object



        $objPHPExcel = new PHPExcel();



        // Set document properties



        $objPHPExcel->getProperties()->setCreator("Parques Alegres")



            ->setLastModifiedBy("Parques Alegres")



            ->setTitle("Reporte de Parámetros de última calificación")



            ->setSubject("Reporte de Parámetros de última calificación")



            ->setDescription("Reporte de Parámetros de última calificación")



            ->setKeywords("")



            ->setCategory("");



        $objWorkSheet = $objPHPExcel->createSheet(0);



        $objPHPExcel->setActiveSheetIndex(0);



        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



        $objPHPExcel->getActiveSheet()->getStyle("A1:AI1")->getFont()->setBold(true);



        $objPHPExcel->setActiveSheetIndex(0)



            ->setCellValue('A1', 'Asesor')



            ->setCellValue('B1', 'ID')



            ->setCellValue('C1', 'Parque')



            ->setCellValue('D1', 'Opera')



            ->setCellValue('E1', 'Formalizado')



            ->setCellValue('F1', 'Organización')



            ->setCellValue('G1', 'Reuniones')



            ->setCellValue('H1', 'Proyectos')



            ->setCellValue('I1', 'Total comité')



            ->setCellValue('J1', 'Instalaciones')



            ->setCellValue('K1', 'En buen estado')



            ->setCellValue('L1', 'Proyecto de diseño')



            ->setCellValue('M1', 'Proyecto ejecutivo')



            ->setCellValue('N1', 'Visión del espacio')



            ->setCellValue('O1', 'Total instalaciones')



            ->setCellValue('P1', 'Ingresos permanentes')



            ->setCellValue('Q1', 'Es suficiente?')



            ->setCellValue('R1', 'Cuenta mancomunada')



            ->setCellValue('S1', 'Total ingresos')



            ->setCellValue('T1', 'Calendario anual')



            ->setCellValue('U1', 'Regularidad de eventos')



            ->setCellValue('V1', 'Total eventos')



            ->setCellValue('W1', 'Árboles, cesped y jardín')



            ->setCellValue('X1', 'En buen estado')



            ->setCellValue('Y1', 'Total areas verdes')



            ->setCellValue('Z1', 'Afluencia')



            ->setCellValue('AA1', 'Total Afluencia')



            ->setCellValue('AB1', 'Limpio')



            ->setCellValue('AC1', 'Reglamento de orden')



            ->setCellValue('AD1', 'Se respetan las instalaciones?')



            ->setCellValue('AE1', 'Total orden')



            ->setCellValue('AF1', 'Total calificación')



            ->setCellValue('AG1', 'Fecha de captura')



            ->setCellValue('AH1', 'Fecha de visita');



        $sql="SELECT u.display_name,p.post_title, b.cve_parque, b.fec ,b.fecha_visita, b.opera,b.formaliza,b.organiza,b.reunion,b.proyecto,



        ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto)) as 'TOTAL COMITE',b.instalaciones,b.estado,b.disenio,b.ejecutivo,b.vespacio,



        ROUND((b.instalaciones+b.estado+b.disenio+b.ejecutivo+b.vespacio)) as 'TOTAL INSTALACIONES',b.ingresop,b.ingresadop,b.mancomunado,



        ROUND((b.ingresop+b.ingresadop+b.mancomunado)) as 'TOTAL INGRESOS',b.eventos,b.eventosr,ROUND((b.eventos+b.eventosr)) as 'TOTAL EVENTOS',



        b.averdes,b.estaver,ROUND((b.averdes+b.estaver)) as 'TOTAL AREAS VERDES', b.gente, b.gente as 'TOTAL AFLUENCIA',b.limpieza,b.orden,b.respint,



        ROUND((b.limpieza+b.orden+b.respint)) as 'TOTAL ORDEN',ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto+b.disenio+b.ejecutivo+b.vespacio+b.estado+b.instalaciones+b.ingresop+b.ingresadop+b.mancomunado+b.eventosr+b.eventos+b.averdes+b.estaver+b.gente+b.respint+b.orden+b.limpieza)/7) as 'Total Calificación'



        FROM wp_comites_parques AS b INNER JOIN wp_posts p ON p.ID=b.cve_parque INNER JOIN wp_users u ON p.post_author=u.ID, (SELECT MAX(cve) AS maxcve, MAX(fecha_visita) AS maxfecha FROM wp_comites_parques GROUP BY cve_parque) AS v2 WHERE v2.maxcve=b.cve AND p.post_type='parque' AND p.post_status='publish'";



        $res=mysql_query($sql);



        $i=2;



        while($row1=mysql_fetch_array($res)){



            $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row1['display_name'])



                ->setCellValue('B'.$i, $row1['cve_parque'])



                ->setCellValue('C'.$i, $row1['post_title'])



                ->setCellValue('D'.$i, $row1['opera'])



                ->setCellValue('E'.$i, $row1['formaliza'])



                ->setCellValue('F'.$i, $row1['organiza'])



                ->setCellValue('G'.$i, $row1['reunion'])



                ->setCellValue('H'.$i, $row1['proyecto'])



                ->setCellValue('I'.$i, $row1['TOTAL COMITE'])



                ->setCellValue('J'.$i, $row1['instalaciones'])



                ->setCellValue('K'.$i, $row1['estado'])



                ->setCellValue('L'.$i, $row1['disenio'])



                ->setCellValue('M'.$i, $row1['ejecutivo'])



                ->setCellValue('N'.$i, $row1['vespacio'])



                ->setCellValue('O'.$i, $row1['TOTAL INSTALACIONES'])



                ->setCellValue('P'.$i, $row1['ingresop'])



                ->setCellValue('Q'.$i, $row1['ingresadop'])



                ->setCellValue('R'.$i, $row1['mancomunado'])



                ->setCellValue('S'.$i, $row1['TOTAL INGRESOS'])



                ->setCellValue('T'.$i, $row1['eventos'])



                ->setCellValue('U'.$i, $row1['eventosr'])



                ->setCellValue('V'.$i, $row1['TOTAL EVENTOS'])



                ->setCellValue('W'.$i, $row1['averdes'])



                ->setCellValue('X'.$i, $row1['estaver'])



                ->setCellValue('Y'.$i, $row1['TOTAL AREAS VERDES'])



                ->setCellValue('Z'.$i, $row1['gente'])



                ->setCellValue('AA'.$i, $row1['TOTAL AFLUENCIA'])



                ->setCellValue('AB'.$i, $row1['limpieza'])



                ->setCellValue('AC'.$i, $row1['orden'])



                ->setCellValue('AD'.$i, $row1['respint'])



                ->setCellValue('AE'.$i, $row1['TOTAL ORDEN'])



                ->setCellValue('AF'.$i, $row1['Total Calificación'])



                ->setCellValue('AG'.$i, $row1['fec'])



                ->setCellValue('AH'.$i, $row1['fecha_visita']);



            $i++;



        }       



        // Redirect output to a client’s web browser (Excel5)



        header('Content-Type: application/vnd.ms-excel');



        header('Content-Disposition: attachment;filename="Reporte de Parámetros de última calificación al '.date('Y-m-d').' .xls"');



        header('Cache-Control: max-age=0');



        // If you're serving to IE 9, then the following may be needed



        header('Cache-Control: max-age=1');



    



        // If you're serving to IE over SSL, then the following may be needed



        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



        header ('Pragma: public'); // HTTP/1.0







        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



        $objWriter->save('php://output');



    }



    else{



        $sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";



        $res=mysql_query($sql);



        while($row=mysql_fetch_array($res)) {



                $asesores[$row['display_name']]=$row['ID'];



        }



        $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



                 'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



        // Create new PHPExcel object



        $objPHPExcel = new PHPExcel();



        // Set document properties



        $objPHPExcel->getProperties()->setCreator("Parques Alegres")



                                                                 ->setLastModifiedBy("Parques Alegres")



                                                                 ->setTitle("Reporte de Parámetros con calificación")



                                                                 ->setSubject("Reporte de Parámetros con calificación")



                                                                 ->setDescription("Reporte de Parámetros con calificación")



                                                                 ->setKeywords("")



                                                                 ->setCategory("");



        $objWorkSheet = $objPHPExcel->createSheet(0);



        $objPHPExcel->setActiveSheetIndex(0);



        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



        $objPHPExcel->getActiveSheet()->getStyle("A1:AI1")->getFont()->setBold(true);



        $objPHPExcel->setActiveSheetIndex(0)



                    ->setCellValue('A1', 'Capturado por:')



                    ->setCellValue('B1', 'Asesor asignado:')



                    ->setCellValue('C1', 'ID')



                    ->setCellValue('D1', 'Parque')



                    ->setCellValue('E1', 'Opera')



                    ->setCellValue('F1', 'Formalizado')



                    ->setCellValue('G1', 'Organización')



                    ->setCellValue('H1', 'Reuniones')



                    ->setCellValue('I1', 'Proyectos')



                    ->setCellValue('J1', 'Total comité')



                    ->setCellValue('K1', 'Instalaciones')



                    ->setCellValue('L1', 'En buen estado')



                    ->setCellValue('M1', 'Proyecto de diseño')



                    ->setCellValue('N1', 'Proyecto ejecutivo')



                    ->setCellValue('O1', 'Visión del espacio')



                    ->setCellValue('P1', 'Total instalaciones')



                    ->setCellValue('Q1', 'Ingresos permanentes')



                    ->setCellValue('R1', 'Es suficiente?')



                    ->setCellValue('S1', 'Cuenta mancomunada')



                    ->setCellValue('T1', 'Total ingresos')



                    ->setCellValue('U1', 'Calendario anual')



                    ->setCellValue('V1', 'Regularidad de eventos')



                    ->setCellValue('W1', 'Total eventos')



                    ->setCellValue('X1', 'Árboles, cesped y jardín')



                    ->setCellValue('Y1', 'En buen estado')



                    ->setCellValue('Z1', 'Total areas verdes')



                    ->setCellValue('AA1', 'Afluencia')



                    ->setCellValue('AB1', 'Total Afluencia')



                    ->setCellValue('AC1', 'Limpio')



                    ->setCellValue('AD1', 'Reglamento de orden')



                    ->setCellValue('AE1', 'Se respetan las instalaciones?')



                    ->setCellValue('AF1', 'Total orden')



                    ->setCellValue('AG1', 'Total calificación')



                    ->setCellValue('AH1', 'Fecha de captura')



                    ->setCellValue('AI1', 'Fecha de visita')



                    ->setCellValue('AJ1', 'Tipo de visita');



            $filtro="";



            if($_POST['sin_fecha_cap']!=1){



                if($_POST['fecha_ini_cap']!=""){



                    $filtro.=" AND b.fec>='".$_POST['fecha_ini_cap']."'";



                }



                if($_POST['fecha_fin_cap']!=""){



                        $filtro.=" AND b.fec<='".$_POST['fecha_fin_cap']."'";



                }



            }



            if($_POST['sin_fecha_vis']!=1){



                if($_POST['fecha_inicial']!=""){



                    $filtro.=" AND b.fecha_visita>='".$_POST['fecha_inicial']."'";



                }



                if($_POST['fecha_fin']!=""){



                        $filtro.=" AND b.fecha_visita<='".$_POST['fecha_fin']."'";



                }



            }



            if($_POST['asesor']){



                    $filtro.=" AND us.id='".$_POST['asesor']."'";



            }



            if($_POST['tipo']){



                    $filtro.=" AND c.tipo_visita='".$_POST['tipo']."'";



            }



            if($_POST['parque']){



                    $filtro.=" AND a.ID='".$_POST['parque']."'";



            }



            if($_POST['capturado']){



                    $filtro.=" AND u.id='".$_POST['capturado']."'";



            }



            $sql1="SELECT a.ID, a.post_title,us.display_name as asesor,u.display_name,b.opera,b.formaliza,b.organiza,b.reunion,b.proyecto,



            ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto)) as 'TOTAL COMITE',b.instalaciones,b.estado,b.disenio,b.ejecutivo,b.vespacio,



            ROUND((b.instalaciones+b.estado+b.disenio+b.ejecutivo+b.vespacio)) as 'TOTAL INSTALACIONES',b.ingresop,b.ingresadop,b.mancomunado,



            ROUND((b.ingresop+b.ingresadop+b.mancomunado)) as 'TOTAL INGRESOS',b.eventos,b.eventosr,ROUND((b.eventos+b.eventosr)) as 'TOTAL EVENTOS',



            b.averdes,b.estaver,ROUND((b.averdes+b.estaver)) as 'TOTAL AREAS VERDES', b.gente, b.gente as 'TOTAL AFLUENCIA',b.limpieza,b.orden,b.respint,



            ROUND((b.limpieza+b.orden+b.respint)) as 'TOTAL ORDEN',ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto+b.disenio+b.ejecutivo+b.vespacio+b.estado+b.instalaciones+b.ingresop+b.ingresadop+b.mancomunado+b.eventosr+b.eventos+b.averdes+b.estaver+b.gente+b.respint+b.orden+b.limpieza)/7) as 'Total Calificación',



            b.fec, b.fecha_visita, CASE c.tipo_visita WHEN 1 THEN 'reforzamiento' WHEN 2 THEN 'seguimiento' WHEN 3 THEN 'evento' WHEN 4 THEN 'prospectacion' WHEN 5 THEN 'formacion' ELSE 'NULL' END as 'tipo_visita'



            FROM wp_posts as a INNER JOIN wp_users us ON us.id=a.post_author, wp_comites_parques as b LEFT JOIN wp_visitascom_parques as c ON b.cve=c.cve_visita LEFT JOIN wp_users u ON u.id=b.asesor_captura WHERE a.ID=b.cve_parque and post_type = 'parque' AND post_status = 'publish' $filtro";



        $res1=mysql_query($sql1);



        $i=2;



        while($row1=mysql_fetch_array($res1)){



            $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $row1['display_name'])



                ->setCellValue('B'.$i, $row1['asesor'])



                ->setCellValue('C'.$i, $row1['ID'])



                ->setCellValue('D'.$i, $row1['post_title'])



                ->setCellValue('E'.$i, $row1['opera'])



                ->setCellValue('F'.$i, $row1['formaliza'])



                ->setCellValue('G'.$i, $row1['organiza'])



                ->setCellValue('H'.$i, $row1['reunion'])



                ->setCellValue('I'.$i, $row1['proyecto'])



                ->setCellValue('J'.$i, $row1['TOTAL COMITE'])



                ->setCellValue('K'.$i, $row1['instalaciones'])



                ->setCellValue('L'.$i, $row1['estado'])



                ->setCellValue('M'.$i, $row1['disenio'])



                ->setCellValue('N'.$i, $row1['ejecutivo'])



                ->setCellValue('O'.$i, $row1['vespacio'])



                ->setCellValue('P'.$i, $row1['TOTAL INSTALACIONES'])



                ->setCellValue('Q'.$i, $row1['ingresop'])



                ->setCellValue('R'.$i, $row1['ingresadop'])



                ->setCellValue('S'.$i, $row1['mancomunado'])



                ->setCellValue('T'.$i, $row1['TOTAL INGRESOS'])



                ->setCellValue('U'.$i, $row1['eventos'])



                ->setCellValue('V'.$i, $row1['eventosr'])



                ->setCellValue('W'.$i, $row1['TOTAL EVENTOS'])



                ->setCellValue('X'.$i, $row1['averdes'])



                ->setCellValue('Y'.$i, $row1['estaver'])



                ->setCellValue('Z'.$i, $row1['TOTAL AREAS VERDES'])



                ->setCellValue('AA'.$i, $row1['gente'])



                ->setCellValue('AB'.$i, $row1['TOTAL AFLUENCIA'])



                ->setCellValue('AC'.$i, $row1['limpieza'])



                ->setCellValue('AD'.$i, $row1['orden'])



                ->setCellValue('AE'.$i, $row1['respint'])



                ->setCellValue('AF'.$i, $row1['TOTAL ORDEN'])



                ->setCellValue('AG'.$i, $row1['Total Calificación'])



                ->setCellValue('AH'.$i, $row1['fec'])



                ->setCellValue('AI'.$i, $row1['fecha_visita'])



                ->setCellValue('AJ'.$i, $row1['tipo_visita']);



            $i++;



        }       



        // Redirect output to a client’s web browser (Excel5)



        header('Content-Type: application/vnd.ms-excel');



        



        if($_POST['sin_fecha_vis']!=1){



            header('Content-Disposition: attachment;filename="Reporte de parametros del '.$_POST['fecha_inicial'].' al '.$_POST['fecha_fin'].' .xls"');



        }



        else{



            header('Content-Disposition: attachment;filename="Reporte de parametros con calificación al '.date('Y-m-d').' .xls"');



        }



        header('Cache-Control: max-age=0');



        // If you're serving to IE 9, then the following may be needed



        header('Cache-Control: max-age=1');



        



        // If you're serving to IE over SSL, then the following may be needed



        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



        header ('Pragma: public'); // HTTP/1.0



    



        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



        $objWriter->save('php://output');



    }



    exit();



}



if($_POST['cmd']=="promcom"){



    require_once('../wp-config.php');



    $sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";



    $res=mysql_query($sql);



    while($row=mysql_fetch_array($res)) {



            $asesores[$row['display_name']]=$row['ID'];



    }



    $personas=array(0=>0,7=>1,14=>2,20=>3);



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



             'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



                                                             ->setLastModifiedBy("Parques Alegres")



                                                             ->setTitle("Reporte de promedios de comite")



                                                             ->setSubject("Reporte de promedios de comite")



                                                             ->setDescription("Reporte de promedios de comite")



                                                             ->setKeywords("")



                                                             ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true);



    $objPHPExcel->getActiveSheet()->setTitle('Por asesor');



    $objWorkSheet = $objPHPExcel->createSheet(1);



    $objPHPExcel->setActiveSheetIndex(1);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);



    $objPHPExcel->getActiveSheet()->setTitle('Por parque');



    $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A1', 'Asesor')



                ->setCellValue('B1', 'Inicio 2014')



                ->setCellValue('C1', 'Fin 2014')



                ->setCellValue('D1', 'Inicio 2015')



                ->setCellValue('E1', 'Fin 2015')



                ->setCellValue('F1', 'Fecha seleccionada');



    $objPHPExcel->setActiveSheetIndex(1)



                ->setCellValue('A1', 'Asesor')



                ->setCellValue('B1', 'ID')



                ->setCellValue('C1', 'Parque')



                ->setCellValue('D1', 'Inicio 2014')



                ->setCellValue('E1', 'Fin 2014')



                ->setCellValue('F1', 'Inicio 2015')



                ->setCellValue('G1', 'Fin 2015')



                ->setCellValue('H1', 'Fecha seleccionada');



    $opera=0;



    $opera2=0;



    $opera3=0;



    $opera4=0;



    $opera5=0;



    $i=2;



    $j=2;



    foreach($asesores as $k=>$v){



        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i,$k);



        $sql1="select id, post_title from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";



        $res1=mysql_query($sql1);



        $pera1=0;



        $pera2=0;



        $pera3=0;



        $pera4=0;



        $pera5=0;



        $fila="";



        while($row1=mysql_fetch_array($res1)){



            $per1=0;



            $per2=0;



            $per3=0;



            $per4=0;



            $per5=0;



            $parque[$row1['id']]=$row1['post_title'];



            $sql5="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='2014-01-01' order by fecha_visita DESC, cve DESC limit 1";



            $res5=mysql_query($sql5);



            if(mysql_num_rows($res5)>0){



                while($row5=mysql_fetch_array($res5)){



                    $opera+=$personas[$row5['opera']];



                    $pera1+=$personas[$row5['opera']];



                    $per1=$personas[$row5['opera']];



                }



            }



            $sql4="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>'2014-01-01' and fecha_visita<='2014-12-31' order by fecha_visita DESC, cve DESC limit 1";



            $res4=mysql_query($sql4);



            if(mysql_num_rows($res4)>0){



                while($row4=mysql_fetch_array($res4)){



                    $opera2+=$personas[$row4['opera']];



                    $pera2+=$personas[$row4['opera']];



                    $per2=$personas[$row4['opera']];



                }



            }



            $sql6="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='2015-01-01' order by fecha_visita DESC, cve DESC limit 1";



            $res6=mysql_query($sql6);



            if(mysql_num_rows($res6)>0){



                while($row6=mysql_fetch_array($res6)){



                    $opera3+=$personas[$row6['opera']];



                    $pera3+=$personas[$row6['opera']];



                    $per3=$personas[$row6['opera']];



                }



            }



            $sql7="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>'2015-01-01' and fecha_visita<='2015-12-31' order by fecha_visita DESC, cve DESC limit 1";



            $res7=mysql_query($sql7);



            if(mysql_num_rows($res7)>0){



                while($row7=mysql_fetch_array($res7)){



                    $opera4+=$personas[$row7['opera']];



                    $pera4+=$personas[$row7['opera']];



                    $per4=$personas[$row7['opera']];



                }



            }



            $sql8="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$_POST['fecha']."' order by fecha_visita DESC, cve DESC limit 1";



            $res8=mysql_query($sql8);



            if(mysql_num_rows($res8)>0){



                while($row8=mysql_fetch_array($res8)){



                    $opera5+=$personas[$row8['opera']];



                    $pera5+=$personas[$row8['opera']];



                    $per5=$personas[$row8['opera']];



                }



            }



            $objPHPExcel->setActiveSheetIndex(1)



                ->setCellValue('A'.$j,$k)



                ->setCellValue('B'.$j,$row1['id'])



                ->setCellValue('C'.$j,$row1['post_title'])



                ->setCellValue('D'.$j,$per1)



                ->setCellValue('E'.$j,$per2)



                ->setCellValue('F'.$j,$per3)



                ->setCellValue('G'.$j,$per4)



                ->setCellValue('H'.$j,$per5);



                $j++;



        }



        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('B'.$i,$pera1)



                ->setCellValue('C'.$i,$pera2)



                ->setCellValue('D'.$i,$pera3)



                ->setCellValue('E'.$i,$pera4)



                ->setCellValue('F'.$i,$pera5);



                $i++;



    }



    $prom2014=round(($opera+$opera2)/2);



    $prom2015=round(($opera3+$opera4)/2);



    $f=$i+1;



    $g=$j+1;



    $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i,"Total")



                ->setCellValue('B'.$i,$opera)



                ->setCellValue('C'.$i,$opera2)



                ->setCellValue('D'.$i,$opera3)



                ->setCellValue('E'.$i,$opera4)



                ->setCellValue('F'.$i,$opera5)



                ->setCellValue('A'.$f,"Promedio")



                ->setCellValue('B'.$f,$prom2014)



                ->setCellValue('C'.$f,"")



                ->setCellValue('D'.$f,$prom2015)



                ->setCellValue('E'.$f,"")



                ->setCellValue('F'.$f,$opera5);



    $objPHPExcel->setActiveSheetIndex(1)



                ->setCellValue('A'.$j,"Total")



                ->setCellValue('B'.$j,"")



                ->setCellValue('C'.$j,"")



                ->setCellValue('D'.$j,$opera)



                ->setCellValue('E'.$j,$opera2)



                ->setCellValue('F'.$j,$opera3)



                ->setCellValue('G'.$j,$opera4)



                ->setCellValue('H'.$j,$opera5)



                ->setCellValue('A'.$g,"Promedio")



                ->setCellValue('B'.$g,"")



                ->setCellValue('C'.$g,"")



                ->setCellValue('D'.$g,$prom2014)



                ->setCellValue('E'.$g,"")



                ->setCellValue('F'.$g,$prom2015)



                ->setCellValue('G'.$g,"")



                ->setCellValue('H'.$g,$opera5);



                



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de promedios de comite de '.$_POST['fecha'].' .xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');



    



    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}



if($_POST['cmd']=="eventos"){



    require_once('../wp-config.php');



    $meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",



             "11"=>"Noviembre","12"=>"Diciembre");



    $calen=array(0=>"No",1=>"Sí");



    $tipo=array(1=>"Generar ingresos y tejido social",2=>"Crear y mantener áreas verdes", 3=>"Organización", 4=>"Gestión", 5=>"Orden");



    $subtipo=array(1=>array(1=>"Torneos",2=>"Tianguis",3=>"Kermesse",4=>"Días Festivos",5=>"Cooperación vecinal",6=>"Rifa",7=>"Kermesse cultural",8=>"Función de cine",9=>"Carrera pedestre",10=>"Noche bohemia",11=>"Visita al MIA",12=>"Visita a Jardín Botánico",13=>"Activación Santa Ana",14=>"Activación Trizalet"),2=>array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda"),3=>array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua"),4=>array(1=>"Honorable Ayuntamiento",2=>"Empresa"),5=>array(1=>"Orden"));



    $estatus=array(1=>"En espera",2=>"Realizado",3=>"Postergado",4=>"Cancelado");



    $sql1="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by display_name ASC";



    $res1=mysql_query($sql1);



    while($row1=mysql_fetch_array($res1)) {



            $asesores[$row1['ID']]=$row1['display_name'];



    }



    $asesores[1478]="Usuario de pruebas";



    $sql2="select ID, post_title from wp_posts where post_status='publish' AND post_type='parque' order by post_title ASC";



    $res2=mysql_query($sql2);



    while($row2=mysql_fetch_array($res2)) {



            $parques[$row2['ID']]=$row2['post_title'];



    }



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



             'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



                                                             ->setLastModifiedBy("Parques Alegres")



                                                             ->setTitle("Reporte de eventos")



                                                             ->setSubject("Reporte de eventos")



                                                             ->setDescription("Reporte de eventos")



                                                             ->setKeywords("")



                                                             ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getFont()->setBold(true);



    $objPHPExcel->getActiveSheet()->setTitle('Reporte de eventos');



    $filtro=" WHERE 1";



    if($_POST['fecha_inicial']){



        $filtro.=" AND fecha>='".$_POST['fecha_inicial']."'";



    }



    if($_POST['fecha_fin']){



        $filtro.=" AND fecha<='".$_POST['fecha_fin']."'";



    }



    if($_POST['asesor']){



        $filtro.=" AND asesor='".$_POST['asesor']."'";



    }



    if($_POST['parque']){



        $filtro.=" AND cve_parque='".$_POST['parque']."'";



    }



    if($_POST['status']){



        $filtro.="AND estatus='".$_POST['status']."'";



    }



    if($_POST['calendario']){



        $filtro.="AND calendario='".$_POST['calendario']."'";



    }



    if($_POST['tipo']){



        $filtro.="AND tipo='".$_POST['tipo']."'";



    }



    if($_POST['subtipo']){



        $filtro.="AND nombre='".$_POST['subtipo']."'";



    }



    $sql="select p.ID, p.post_title as parque, u.display_name as nomasesor,e.* from eventos_parques e INNER JOIN wp_posts p on e.cve_parque=p.ID INNER JOIN wp_users u on u.ID=e.asesor $filtro order by asesor, cve_parque DESC";



    $res=mysql_query($sql);



    if(mysql_num_rows($res)>0){



        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A1', 'Asesor')



                ->setCellValue('B1', 'ID')



                ->setCellValue('C1', 'Parque')



                ->setCellValue('D1', 'Calendario')



                ->setCellValue('E1', 'Tipo de Evento')



                ->setCellValue('F1', 'Subtipo')



                ->setCellValue('G1', 'Fecha en que se capturo')



                ->setCellValue('H1', 'Fecha del evento')



                ->setCellValue('I1', 'Responsable')



                ->setCellValue('J1', 'Correo')



                ->setCellValue('K1', 'Estatus')



                ->setCellValue('L1', 'Fecha del cambio')



                ->setCellValue('M1', 'Motivo');



                $i=2;



        while($row=mysql_fetch_array($res)){



            if($row['fecha_cambio']!="0000-00-00"){



                $fecha_cambio=$row['fecha_cambio'];



            }



            $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue('A'.$i,$row['nomasesor'])



                        ->setCellValue('B'.$i,$row['ID'])



                        ->setCellValue('C'.$i,$row['parque'])



                        ->setCellValue('D'.$i,$calen[$row['calendario']])



                        ->setCellValue('E'.$i,$tipo[$row['tipo']])



                        ->setCellValue('F'.$i,$subtipo[$row['tipo']][$row['nombre']])



                        ->setCellValue('G'.$i,$row['fecha_reg'])



                        ->setCellValue('H'.$i,$row['fecha'])



                        ->setCellValue('I'.$i,$row['responsable'])



                        ->setCellValue('J'.$i,$row['correo'])



                        ->setCellValue('K'.$i,$estatus[$row['estatus']])



                        ->setCellValue('L'.$i,$fecha_cambio)



                        ->setCellValue('M'.$i,$row['motivo']);



                        $i++;



        }



        $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue('A'.$i,"Total")



                        ->setCellValue('B'.$i,mysql_num_rows($res));



                        $i++; 



    }



    else{



        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A1', 'No hay eventos bajo el criterio de busqueda');



    }



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->setTitle('Eventos');



    



    



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de eventos de '.$_POST['fecha_inicial'].' .xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');



    



    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}



if($_POST['cmd']==1){



    require_once('../wp-config.php');



    $meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",



                 "11"=>"Noviembre","12"=>"Diciembre");



    $param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",



                      11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");



    $tipoasent=array(1=>"Aeropuerto",2=>"Ampliación",3=>"Barrio",4=>"Cantón",5=>"Ciudad",6=>"Ciudad industrial",7=>"Colonia",8=>"Condominio",9=>"Conjunto habitacional",



                     10=>"Corredor industrial",11=>"Coto",12=>"Cuartel",13=>"Ejido",14=>"Exhacienda",15=>"Fracción",16=>"Fraccionamiento",17=>"Granja",18=>"Hacienda",



                     19=>"Ingenio",20=>"Manzana",21=>"Paraje",22=>"Parque Industrial",23=>"Privada",24=>"Prolongación",25=>"Pueblo",26=>"Puerto",27=>"Ranchería",28=>"Rancho",



                     29=>"Región",30=>"Residencial",31=>"Rinconada",32=>"Sección",33=>"Sector",34=>"Supermanzana",35=>"Unidad",36=>"Unidad Habitacional",37=>"Villa",



                     38=>"Zona Federal",39=>"Zona Industrial",40=>"Zona Militar",41=>"Zona Naval");



    $sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";



    $res=mysql_query($sql);



    while($row=mysql_fetch_array($res)) {



            $asesores[$row['display_name']]=$row['ID'];



    }



    if($_POST['fecha_inicial']){



        $fechainicio=$_POST['fecha_inicial'];



        $fechafin=$_POST['fecha_final'];



    }



    else{



        //Se checa si no es el ultimo mes del año



        if(date('m')<12){



            $mes=date('m')+1;



            $anio=date('Y');



        }



        else{



            //Si lo es entonces aumentamos un año y definimos al primer mes



            $mes='01';



            $anio=date('Y')+1;



        }



        //checamos cual es el ultimo dia del mes en el que estamos



        $fecha = date('Y-m-d', strtotime(date(''.$anio.'-'.$mes.'-01'). ' - 1 days'));



        $dia = substr($fecha, -2);



        //Si el dia es diferente al dia actual entonces retrocedemos un mes



        if($dia!=date('d')){



            if($mes<=2){



                if($mes<=1){



                    $mes=11;



                }



                else{



                    $mes=12;



                }



            }



            else{



                $mes=$mes-2;



            }



            if($mes==12){



                $mes1=01;



            }



            else{



                $mes1=$mes+1;



            }



            if($mes<10){



                $mes='0'.$mes;



            }



            $fechainicio=date('Y-'.$mes.'-01');



            $fechafin=date('Y-m-d', strtotime(date('Y-'.$mes1.'-01'). ' - 1 days'));



        }



        else{



            //sino dejamos el mismo mes



            $fechainicio=date('Y-m-01');



            $fechafin=date('Y-m-d', strtotime(date('Y-'.$mes.'-01'). ' - 1 days'));



        }



    }



    $mesact=substr($fechainicio, -5,2);



    $anioact=substr($fechainicio, 0,4);



    if($mesact>1){



        $mesant=$mesact-1;



        if($mesant<10){



            $mesant='0'.$mesant;



        }



        $mesantini=date($anioact.'-'.$mesant.'-01');



        $mesantfin=date($anioact.'-'.$mesant.'-31');   



    }



    else{



        $anioant=$anioact-1;



        $mesantini=date(''.$anioant.'-12-01');



        $mesantfin=date(''.$anioant.'-12-31'); 



    }



    $mes2fin=date('Y-m-d', strtotime(date($mesantini). ' - 1 days'));



    $mes2ini=substr($mes2fin, 0,4).'-'.substr($mes2fin, -5,2).'-01';



    $mes3fin=date('Y-m-d', strtotime(date($mes2ini). ' - 1 days'));



    $mes3ini=substr($mes3fin, 0,4).'-'.substr($mes3fin, -5,2).'-01';



    $letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



             'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



                                                             ->setLastModifiedBy("Parques Alegres")



                                                             ->setTitle("Reporte 4 meses")



                                                             ->setSubject("Reporte 4 meses")



                                                             ->setDescription("Reporte 4 meses")



                                                             ->setKeywords("")



                                                             ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);



    $objPHPExcel->getActiveSheet()->getStyle("A1:R1")->getFont()->setBold(true);



    $objPHPExcel->getActiveSheet()->setTitle('Reporte 4 meses');



    $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A1', 'ID')



                ->setCellValue('B1', 'Parque')



                ->setCellValue('C1', 'Colonia')



                ->setCellValue('D1', 'Asentamiento')



                ->setCellValue('E1', 'Tipo de asentamiento')



                ->setCellValue('F1', 'Superficie')



                ->setCellValue('G1', 'Ubicación')



                ->setCellValue('H1', 'Vialidad principal')



                ->setCellValue('I1', 'Vialidad 1')



                ->setCellValue('J1', 'Vialidad 2')



                ->setCellValue('K1', 'Vialidad posterior')



                ->setCellValue('L1', 'Con comité')



                ->setCellValue('M1', 'Personas en el comité')



                ->setCellValue('N1', 'Visión del espacio')



                ->setCellValue('O1', 'Calificación 3 meses atras')



                ->setCellValue('P1', 'Calificación 2 meses atras')



                ->setCellValue('Q1', 'Calificación anterior')



                ->setCellValue('R1', 'Calificación actual');



    



    $i=2;



    foreach($asesores as $k=>$v){



        $sql1="select p.id,p.post_title, k8.meta_value as colonia, k9.meta_value as ubicacion, k1.meta_value as asentamiento,k2.meta_value as tasentamiento,k3.meta_value as superficie,k4.meta_value as pvialiadad, k5.meta_value as vialidad1,k6.meta_value as vialidad2, k7.meta_value as posvialiadad from wp_posts p LEFT JOIN wp_postmeta k8 ON p.id = k8.post_id AND k8.meta_key = '_parque_col' LEFT JOIN wp_postmeta k9 ON p.id = k9.post_id AND k9.meta_key = '_parque_ubic' LEFT JOIN wp_postmeta k1 ON p.id = k1.post_id AND k1.meta_key = '_parque_nomasentamiento' LEFT JOIN wp_postmeta k2 ON p.id = k2.post_id AND k2.meta_key = '_parque_tipoasentamiento' LEFT JOIN wp_postmeta k3 ON p.id = k3.post_id AND k3.meta_key = '_parque_sup' LEFT JOIN wp_postmeta k4 ON p.id = k4.post_id AND k4.meta_key = '_parque_vialidad_prin' LEFT JOIN wp_postmeta k5 ON p.id = k5.post_id AND k5.meta_key = '_parque_vialidad1' LEFT JOIN wp_postmeta k6 ON p.id = k6.post_id AND k6.meta_key = '_parque_vialidad2' LEFT JOIN wp_postmeta k7 ON p.id = k7.post_id AND k7.meta_key = '_parque_vialidad_pos' where p.post_status='publish' and p.post_type='parque' and p.post_author='".$v."' group by p.id";



        $res1=mysql_query($sql1);



        while($row1=mysql_fetch_array($res1)){



            $parque[$row1['id']]=$row1['post_title'];



            $sql5="select cve_parque, ";



            foreach($param as $v){



                $sql5.=$v."+";



            }



            $sql5 = substr($sql5, 0, -1);



            $sql5.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mes3ini."' and fecha_visita<='".$mes3fin."'";



            $res5=mysql_query($sql5);



            $suma3=0;



            $calif3=0;



            if(mysql_num_rows($res5)>0){



                while($row5=mysql_fetch_array($res5)){



                    $suma3=$suma3+($row5['calif']/7);



                }



                $calif3=round($suma3/mysql_num_rows($res5));



            }



            $sql4="select cve_parque, ";



            foreach($param as $v){



                $sql4.=$v."+";



            }



            $sql4 = substr($sql4, 0, -1);



            $sql4.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mes2ini."' and fecha_visita<='".$mes2fin."'";



            $res4=mysql_query($sql4);



            $suma2=0;



            $calif2=0;



            if(mysql_num_rows($res4)>0){



                while($row4=mysql_fetch_array($res4)){



                    $suma2=$suma2+($row4['calif']/7);



                }



                $calif2=round($suma2/mysql_num_rows($res4));



            }



            $sql3="select cve_parque, ";



            foreach($param as $v){



                $sql3.=$v."+";



            }



            $sql3 = substr($sql3, 0, -1);



            $sql3.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mesantini."' and fecha_visita<='".$mesantfin."'";



            $res3=mysql_query($sql3);



            $sumaant=0;



            $califant=0;



            if(mysql_num_rows($res3)>0){



                while($row3=mysql_fetch_array($res3)){



                    $sumaant=$sumaant+($row3['calif']/7);



                }



                $califant=round($sumaant/mysql_num_rows($res3));



            }



            $sql2="select cve_parque, ";



            foreach($param as $v){



                $sql2.=$v."+";



            }



            $sql2 = substr($sql2, 0, -1);



            $sql2.=" as calif, opera, vespacio from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$fechainicio."' and fecha_visita<='".$fechafin."'";



            $res2=mysql_query($sql2);



            $suma=0;



            $calif=0;



            if(mysql_num_rows($res2)>0){



                while($row2=mysql_fetch_array($res2)){



                    if($row2['opera']>=7){



                            $comite="Sí";



                            if($row2['vespacio']>=40){



                                    $vespacio="Sí";



                            }



                            else{



                                    $vespacio="No";



                            }



                            if($row2['opera']>=14){



                                if($row2['opera']>=20){



                                    $opera="Con 3 o más personas";



                                }



                                else{



                                    $opera="Con 2 personas";



                                }



                            }



                            else{



                                $opera="Con 1 persona";



                            }



                    }	



                    else{



                        $comite="No";



                        $opera="No tiene";



                    }



                    $suma=$suma+($row2['calif']/7);



                }



                $calif=round($suma/mysql_num_rows($res2));



            }



            else{



                    $comite="No";



                    $opera="No tiene";



                    $vespacio="No";



            }



            $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue('A'.$i, $row1['id'])



                        ->setCellValue('B'.$i,$row1['post_title'])



                        ->setCellValue('C'.$i,$row1['colonia'])



                        ->setCellValue('D'.$i,$row1['asentamiento'])



                        ->setCellValue('E'.$i,$tipoasent[$row1['tasentamiento']])



                        ->setCellValue('F'.$i,$row1['superficie'])



                        ->setCellValue('G'.$i,$row1['ubicacion'])



                        ->setCellValue('H'.$i,$row1['pvialidad'])



                        ->setCellValue('I'.$i,$row1['vialidad1'])



                        ->setCellValue('J'.$i,$row1['vialidad2'])



                        ->setCellValue('K'.$i,$row1['posvialidad'])



                        ->setCellValue('L'.$i,$comite)



                        ->setCellValue('M'.$i,$opera)



                        ->setCellValue('N'.$i,$vespacio)



                        ->setCellValue('O'.$i,$calif3)



                        ->setCellValue('P'.$i,$calif2)



                        ->setCellValue('Q'.$i,$califant)



                        ->setCellValue('R'.$i,$calif);



            $i++;



        }



    }



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->setTitle('4 meses');



    



    



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte 4 meses de '.$_POST['fecha_inicial'].' .xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');



    



    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}





if($_POST['cmd']=="compromisos") {

    require_once('../wp-config.php');

    $nomparametros=array(1=>"El comité opera con",2=>"¿Cómo está formalizado?",3=>"Cuenta con buena organización",4=>"Existen reuniones",5=>"Tienen proyectos en proceso",

                         6=>"Cuenta con Visión de Espacio",6.2=>"Cuenta con Proyecto de Diseño",6.3=>"Cuenta con Proyecto Ejecutivo",7=>"Estado actual de las instalaciones",8=>"Hay instalaciones en la mayoria del espacio",

                         9=>"Tienen fuente de ingresos permanentes",10=>"Es suficiente lo ingresado para operar bien",11=>"Tienen cuenta mancomunada",

                         12=>"Hay eventos con regularidad",13=>"Cuentan con un calendario anual de actividades",14=>"Cuenta con",15=>"Se encuentra en buen estado",

                         16=>"Porcentaje de afluencia sobre lo existente",17=>"Las instalaciones se respetan",18=>"Se cuenta con un reglamento de orden",19=>"Se mantiene limpio");

    $inparametros=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"vespacio",6.2=>"disenio",6.3=>"ejecutivo",7=>"estado",8=>"instalaciones",9=>"ingresop",10=>"ingresadop",

                      11=>"mancomunado",12=>"eventosr",13=>"eventos",14=>"averdes",15=>"estaver",16=>"gente",17=>"respint",18=>"orden",19=>"limpieza");

    $statuscom=array(1=>"Pendiente",2=>"Postergado",3=>"Cumplido",4=>"No cumplido");

    $compromisos=array(1=>"Reestructuración del comité","Formalizar el comité ante el ayuntamiento","Elaborar por escrito las políticas de trabajo del comité",

                       "Plan de trabajo (por lo menos para un periodo de seis meses)","Calendario de reuniones del comité. (Se sugiere una cada 30 días)",

                       "Programa de reuniones vecinales (se sugiere una cada tres meses)","Verificar el estatus legal del parque","Elaborar la visión del espacio",

                       "Gestionar el diseño arquitectónico","Gestionar el proyecto ejecutivo","Mantenimiento","Rehabilitación","Remodelación","Nueva adquisición",

                       "Programa de pago vecinal para mantenimineto del parque","Organización cooperación vecinal pro rehabilitación del parque",

                       "Organización de cooperación vecinal pro - adquisición infraestructura","Gestión de recibos deducibles de impuestos","Torneos deportivos",

                       "Celebración de días festivos","Rifa","Evento cultural","Función de cine","Carrera pedestre","Noche bohemia","Informe de ingresos y egresos",

                       "Generar recibos de ingresos","Archivar comprobante de gastos","Abrir cuenta mancomunada",

                       "Participación activa en la organización de eventos (tener asignado un rol y una responsabilidad)","Particpación activa en la promoción de los eventos",

                       "Función de cine","Carrera pedestre","Noche bohemia","Convivio recreativo","Calendario anual de eventos",

                       "Expediente de evidencias fotográficas de eventos","Gestionar árboles en Ayuntamiento y Parque Botánico","Gestionar plantas de ornanto en Ayuntamiento",

                       "Siembra de árboles","Colocación de cesped natural y/o sintético","Protección para árboles pequeños","Campaña de limpieza",

                       "Ferlilizar árboles con componentes orgnánicos","Nomeclatura de la vegetación en el parque","Adquisición de herramientas de limpieza","Fumigación",

                       "Instalar sistema de riego","Adquisición de herramientas de jardinería","Poda de árboles y/o cesped","Promotor deportivo","Clases y/o talleres deporivos",

                       "Futbol","Basquetbol","Zumba","Clases y/o talleres culturales","Pintura","Danza","Clubes con diversos objetivos para niños, adolescentes y adultos",

                       "Club de ciclismo",'Campaña de "invita a un vecino"',"Torneos","Deportivo","Cultural","Artístico","Comité de niños","Invitación a Voluntariado",

                       "Curso de verano deportivo o cultural","Ciclo de pláticas y conferencias para Padres, Adolescentes y niños","Campañmentos","Murales",

                       "Gestión de vigilancia para el parque","Delimitación de espacios","Contratar velador","Creación de reglamento del parque",

                       "Instalación de reglamento de parque","Instalación de señalización","Botón de pánico","Instalación de Timer para control de recursos",

                       "Jornada de limpieza","Contratar jardinero",84=>"Campañas",85=>"Fondos económicos",86=>"Tejido social");

    $compesp=array(1=>"Bancas","Cerca","Alumbrado","Baños","Fuentes","Botes de basura","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas",

                   "Cajones de estacionamiento","Canasta de reciclaje","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol",

                   "Cancha de beisbol","Cancha de softbol","Mesa de ping pong","Back Stop","Porterias","Tableros","Aros","Losa","Pintura","Andadores","Gradas","Ejercitadores",

                   "Ciclovía","Gimnasio","Techumbre","Área de adoquín","Bordillo de concreto","Piñateros","Comedores","Asadores","Juegos infantiles","Palapa","Alberca",

                   "Camastros","Regaderas","Césped","Árboles","Arbustos","Toma de agua","Sistema de riego");

    $compespecial=array(1=>"Instalaciones","Baños","Fuentes","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas","Cajones de estacionamiento",

                        "Deportiva","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol","Cancha de beisbol","Cancha de softbol",

                        "Porterias","Losa","Andadores","Gradas","Ciclovía","Gimnasio","Areas de esparcimiento","Techumbre","Área de adoquín","Comedores");

    $compesp2=array(1=>"Limpieza","Árboles");

    $compesp3=array(1=>"Torneos","Tianguis","Kermes","Dias festivos","Rifa","Evento cultural","Funcion de cine","Carrera pedestre","Noche bohemia");

    $meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");

    $param = array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");

    // Create new PHPExcel object

    $objPHPExcel = new PHPExcel();

    // Set document properties

    $objPHPExcel->getProperties()->setCreator("Parques Alegres")

             ->setLastModifiedBy("Parques Alegres")

             ->setTitle("Reporte de Compromisos")

             ->setSubject("Reporte de Compromisos")

             ->setDescription("Reporte de Compromisos")

             ->setKeywords("")

             ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);

    $objPHPExcel->setActiveSheetIndex(0);

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);

    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);

    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);

    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);

    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

    $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->setBold(true);

    $objPHPExcel->getActiveSheet()->setTitle('Reporte de Compromisos');

    $objPHPExcel->setActiveSheetIndex(0)

                ->setCellValue('A1', 'ID parque')

                ->setCellValue('B1', 'Nombre parque')

                ->setCellValue('C1', 'Parametro')

                ->setCellValue('D1', 'Compromiso')

                ->setCellValue('E1', 'Fecha del compromiso')

                ->setCellValue('F1', 'Estatus');



    $sql2="select p.ID as cve_parque, p.post_title, u.display_name, u.ID as asesor from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author INNER JOIN wp_users u ON u.ID=a.ID where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";

    $res2=mysql_query($sql2);

    while($row2=mysql_fetch_array($res2)) {

        $parques[$row2['cve_parque']]=$row2['post_title'];

        $asesor[$row2['asesor']]=$row2['display_name'];

    }  

    if($_POST['asesorcomp']!=""){

        $sql1 = "select ID from wp_posts where post_author='".$_POST['asesorcomp']."' AND post_type='parque' AND post_status='publish'";

        $res1 = mysql_query($sql1);

        $i=2;

        $total=0;

        while($row1=mysql_fetch_array($res1)){

            $sql = "select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row1['ID']."' ORDER by fecha_visita DESC";

            $res = mysql_query($sql);

            if(mysql_num_rows($res)>0){

                while($row=mysql_fetch_array($res)) {

                    if($row['parametro']=="instalaciones" || $row['parametro']=="estado" || $row['parametro']=="eventosr"){

                        $comp=explode(",",$row['compromiso']);

                        if($comp[0]==13){

                            $namee=$compespecial[$comp[1]];

                        }

                        elseif($comp[0]==84){

                                $namee=$compesp2[$comp[1]];

                        }

                        elseif($comp[0]==85 || $comp[0]==86){

                                $namee=$compesp3[$comp[1]];

                        }

                        else{

                            $namee=$compesp[$comp[1]];

                            if($comp[1]==111){

                                $namee="Instalaciones";

                            }

                            if($comp[1]==112){

                                $namee="Deportiva";

                            }

                            if($comp[1]==113){

                                $namee="Áreas de esparcimiento";

                            }

                            if($comp[1]==114){

                                $namee="Áreas verdes";

                            }    

                        }

                        $compromisotexto=$compromisos[$comp[0]].': '.$namee;

                    }

                    else{

                        if(is_numeric($row['compromiso'])) {

                            $compromisotexto=$compromisos[$row['compromiso']];

                        }

                        else{

                            $compromisotexto=$row['compromiso'];

                        }

                    }



                    $objPHPExcel->setActiveSheetIndex(0)

                        ->setCellValue('A'.$i, $row['cve_parque'])

                        ->setCellValue('B'.$i, $parques[$row['cve_parque']])

                        ->setCellValue('C'.$i, $nomparametros[array_search($row['parametro'], $inparametros)])

                        ->setCellValue('D'.$i, $compromisotexto)

                        ->setCellValue('E'.$i, $row['fecha_visita'])

                        ->setCellValue('F'.$i, $statuscom[$row['estatus']]);

                    $i++;

                }

                $total=$total+mysql_num_rows($res);

            }

        }

        if($total==0){

            $i=2;

                    $objPHPExcel->setActiveSheetIndex(0)

                            ->setCellValue('A'.$i, 'No tiene compromisos');

                    $i++;

        }

        $objPHPExcel->setActiveSheetIndex(0)

                        ->setCellValue('A'.$i, 'Total:')

                        ->setCellValue('B'.$i, $total);

    }

    else{

        $sql = "select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$_POST['parquecomp']."' ORDER by fecha_visita DESC";

        $res = mysql_query($sql);

        $compromisos = array();

        if(mysql_num_rows($res)>0){

            while($row=mysql_fetch_array($res)) {

                $i=2;

                if($row['parametro']=="instalaciones" || $row['parametro']=="estado" || $row['parametro']=="eventosr"){

                    $comp=explode(",",$row['compromiso']);

                    if($comp[0]==13){

                        $namee=$compespecial[$comp[1]];

                    }

                    elseif($comp[0]==84){

                            $namee=$compesp2[$comp[1]];

                    }

                    elseif($comp[0]==85 || $comp[0]==86){

                            $namee=$compesp3[$comp[1]];

                    }

                    else{

                        $namee=$compesp[$comp[1]];

                        if($comp[1]==111){

                            $namee="Instalaciones";

                        }

                        if($comp[1]==112){

                            $namee="Deportiva";

                        }

                        if($comp[1]==113){

                            $namee="Áreas de esparcimiento";

                        }

                        if($comp[1]==114){

                            $namee="Áreas verdes";

                        }    

                    }

                    $compromisotexto=$compromisos[$comp[0]].': '.$namee;

                }

                else{

                    if(is_numeric($row['compromiso'])) {

                        $compromisotexto=$compromisos[$row['compromiso']];

                    }

                    else{

                        $compromisotexto=$row['compromiso'];

                    }

                }



                $objPHPExcel->setActiveSheetIndex(0)

                        ->setCellValue('A'.$i, $row['cve_parque'])

                        ->setCellValue('B'.$i, $parques[$row['cve_parque']])

                        ->setCellValue('C'.$i, $nomparametros[array_search($row['parametro'], $inparametros)])

                        ->setCellValue('D'.$i, $compromisotexto)

                        ->setCellValue('E'.$i, $row['fecha_visita'])

                        ->setCellValue('F'.$i, $statuscom[$row['estatus']]);

                $i++;

            }

            $total=mysql_num_rows($res);

        }

        else{

            $i=2;

                $objPHPExcel->setActiveSheetIndex(0)

                        ->setCellValue('A'.$i, 'No tiene compromisos');

                $i++;

        }

        $objPHPExcel->setActiveSheetIndex(0)

                    ->setCellValue('A'.$i, 'Total:')

                    ->setCellValue('B'.$i, $total);

    }



    // Redirect output to a client’s web browser (Excel5)

    header('Content-Type: application/vnd.ms-excel');

    header('Content-Disposition: attachment;filename="Reporte de compromisos.xls"');

    header('Cache-Control: max-age=0');

    // If you're serving to IE 9, then the following may be needed

    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed

    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past

    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified

    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1

    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    $objWriter->save('php://output');

    exit();

}



if($_POST['cmd']=="repmensual") {



    require_once('../wp-config.php');







    $meses = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",



             "11"=>"Noviembre","12"=>"Diciembre");



    $param = array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",



                  11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");







    $fechaInicio = $_POST['fecha_inicial'];



    $fechaFin = $_POST['fecha_final'];



    // Create new PHPExcel object



    $objPHPExcel = new PHPExcel();



    // Set document properties



    $objPHPExcel->getProperties()->setCreator("Parques Alegres")



                                                             ->setLastModifiedBy("Parques Alegres")



                                                             ->setTitle("Reporte Mensual de Visitas")



                                                             ->setSubject("Reporte Mensual de Visitas")



                                                             ->setDescription("Reporte Mensual de Visitas")



                                                             ->setKeywords("")



                                                             ->setCategory("");



    $objWorkSheet = $objPHPExcel->createSheet(0);



    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);



    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);



    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);



    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);



    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);



    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);



    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);



    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);



    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);



    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);



    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);



    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);



    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);



    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);



    $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setBold(true);



    $objPHPExcel->getActiveSheet()->setTitle('Reporte Mensual de Visitas');



    $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A1', 'Asesor')



                ->setCellValue('B1', 'Calificación del mes anterior')



                ->setCellValue('C1', 'Calificación del mes actual')



                ->setCellValue('D1', 'Diferencia')



                ->setCellValue('E1', 'Visitas del mes actual')



                ->setCellValue('F1', 'Visitas del mes anterior')



                ->setCellValue('G1', 'Visitas de Seguimiento')



                ->setCellValue('H1', 'Visitas de Prospectación')



                ->setCellValue('I1', 'Visitas de Reforzamiento con parametros')



                ->setCellValue('J1', 'Visitas de Reforzamiento')



                ->setCellValue('K1', 'Visitas de Stand-by')



                ->setCellValue('L1', 'Visitas de Reforzamiento Acumuladas')



                ->setCellValue('M1', 'Nuevos comites')



                ->setCellValue('N1', 'Promedio del Parque')



                ->setCellValue('O1', 'Visitas Acumuladas del Parque');



    



    $mesact = substr($fechaInicio, -5,2);



    $anioact = substr($fechaInicio, 0,4);



    if ($mesact > 1) {



        $mesant = $mesact-1;



        if ($mesant < 10) {



            $mesant = '0'.$mesant;



        }



        $mesantini = date($anioact.'-'.$mesant.'-01');



        $mesantfin = date($anioact.'-'.$mesant.'-31');   



    } else {



        $anioant = $anioact-1;



        $mesantini = date(''.$anioant.'-12-01');



        $mesantfin = date(''.$anioant.'-12-31'); 



    }



    



    $sql = "select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";



    $res = mysql_query($sql);



    $asesores = array();



    while($row=mysql_fetch_array($res)) {



        $asesor = array();



        $asesor['id'] = $row['ID'];



        $asesor['nombre'] = $row['display_name'];



        $asesores[] = $asesor;



    }   



    $i=2;







    foreach ($asesores as $asesor) {



        $sumcalifant =0;



        $sumcomites = 0;



        $sumcalif = 0;



        $sumvis = 0;



        $sumvisa = 0;



        $sumviss = 0;



        $sumvisp = 0;



        $sumvisr = 0;



        $sumvisst = 0;



        $sumvisr1 = 0;



        $sumvisra = 0;



        $sumcaliftot = 0;



        $sumvistot =0;



        $parquesa = 0;



        $parquesn = 0;



        



        $sql1 = "select id,post_title,guid from wp_posts where post_status='publish' and post_type='parque' and post_author='{$asesor['id']}'";



        $res1 = mysql_query($sql1);



        



        while ($row1=mysql_fetch_array($res1)) {







            $parque[$row1['id']]=$row1['post_title'];



            



            $sql4 ="select cve_parque, ";



            foreach ($param as $v) {



                $sql4.=$v."+";



            }







            $sql4 = substr($sql4, 0, -1);



            $sql4.=" as calif from wp_comites_parques where cve_parque='{$row1['id']}' and fecha_visita<='{$fechaFin}'";



            $res4 = mysql_query($sql4);



            $sumatot = 0;



            $califtot = 0;



            if (mysql_num_rows($res4)>0) {



                while ($row4=mysql_fetch_array($res4)) {



                    $sumatot=$sumatot+($row4['calif']/7);



                }



                $califtot=round($sumatot/mysql_num_rows($res4));



            }







            $sql3="select cve_parque, ";



            foreach ($param as $v) {



                $sql3.=$v."+";



            }



            $sql3 = substr($sql3, 0, -1);



            $sql3.=" as calif,opera from wp_comites_parques where cve_parque='{$row1['id']}' and fecha_visita>='{$mesantini}' and fecha_visita<='{$mesantfin}' order by fecha_visita ASC, cve ASC";



            $res3=mysql_query($sql3);



            



            $sumaant=0;



            $califant=0;



            $opera=-1;



            $ncomites=0;



            



            if(mysql_num_rows($res3)>0){



                while($row3=mysql_fetch_array($res3)){



                    $opera=$row3['opera'];



                    $califant=round($row3['calif']/7);



                }



                $parquesa++;



            }







            $sql2="select v.cve_parque, ";



            foreach($param as $v){



                $sql2.='v.'.$v."+";



            }



            $sql2 = substr($sql2, 0, -1);



            $sql2.=" as calif,v.opera,c.tipo_visita from wp_comites_parques v LEFT JOIN wp_visitascom_parques c ON v.cve=c.cve_visita where v.cve_parque='{$row1['id']}' and v.fecha_visita>='{$fechaInicio}' and v.fecha_visita<='{$fechaFin}' order by v.fecha_visita ASC, v.cve ASC";



            $res2=mysql_query($sql2);



            



            $suma=0;



            $calif=0;



            $visits=0;



            $visitp=0;



            $visitr=0;



            $nopera=-1;







            if (mysql_num_rows($res2)>0) {



                while ($row2=mysql_fetch_array($res2)) {



                    if ($row2['tipo_visita'] == 2) {



                        $visits++;



                    }



                    elseif ($row2['tipo_visita'] == 4) {



                        $visitp++;



                    }



                    else {



                        $visitr++;



                    }



                    $nopera = $row2['opera'];



                    $calif = round($row2['calif']/7);



                }



                $parquesn++;



            }



            if($opera == 0 && $nopera >= 7){



                $ncomites = 1;



            }







            $sql8 = "SELECT ID from wp_visitas_reforzamiento where cve_parque='{$row1['id']}' and fecha_visita<='{$fechaFin}' and fecha_visita>='{$fechaInicio}' AND cve_parametros=0";



            $res8 = mysql_query($sql8);



            



            $sql9 = "SELECT ID from wp_visitas_reforzamiento where cve_parque='{$row1['id']}' and fecha_visita<='{$fechaFin}' AND cve_parametros=0";



            $res9 = mysql_query($sql9);



       



            $sql11 = "SELECT ID from wp_visitas_standby where cve_parque='{$row1['id']}' and fecha_visita<='{$fechaFin}' and fecha_visita>='{$fechaInicio}'";



            $res11 = mysql_query($sql11);







            $dif = $calif-$califant;



            



            $sumcomites = $sumcomites + $ncomites;



            $sumcalifant = $sumcalifant + $califant;



            $sumcalif = $sumcalif + $calif;



            $sumvis = $sumvis + mysql_num_rows($res2);



            $sumvisa = $sumvisa + mysql_num_rows($res3);



            $sumviss = $sumviss + $visits;



            $sumvisr1 = $sumvisr1 + $visitr;



            $sumvisp = $sumvisp + $visitp;



            $sumvisr = $sumvisr + mysql_num_rows($res8);



            $sumvisst = $sumvisst + mysql_num_rows($res11);



            $sumvisra = $sumvisra + mysql_num_rows($res9);



            $sumcaliftot = $sumcaliftot + ($califtot*mysql_num_rows($res4));



            $sumvistot = $sumvistot + mysql_num_rows($res4);



        }







        if ($parquesa!=0 && $parquesn!=0) {



            $diftotal = round($sumcalif/$parquesn)-round($sumcalifant/$parquesa);



            $ascalifant = round($sumcalifant/$parquesa);



            $ascalif = round($sumcalif/$parquesn);



        } else {



            if ($parquesa != 0) {



                $diftotal = 0-round($sumcalifant/$parquesa);



                $ascalifant = round($sumcalifant/$parquesa);



                $ascalif = 0;



            } else if ($parquesn!=0) {



                $diftotal = round($sumcalif/$parquesn);



                $ascalif = round($sumcalif/$parquesn);



                $ascalifant = 0;



            } else {



                $diftotal = 0;



                $ascalifant = 0;



                $ascalif = 0;



            }



        }



        



        $promedioParque = ($sumcaliftot>0) ? round($sumcaliftot/$sumvistot) : 0;







        $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, $asesor['nombre'])



                ->setCellValue('B'.$i, $ascalifant)



                ->setCellValue('C'.$i, $ascalif)



                ->setCellValue('D'.$i, $diftotal)



                ->setCellValue('E'.$i, $sumvis)



                ->setCellValue('F'.$i, $sumvisa)



                ->setCellValue('G'.$i, $sumviss)



                ->setCellValue('H'.$i, $sumvisp)



                ->setCellValue('I'.$i, $sumvisr1)



                ->setCellValue('J'.$i, $sumvisr)



                ->setCellValue('K'.$i, $sumvisst)



                ->setCellValue('L'.$i, $sumvisra)



                ->setCellValue('M'.$i, $sumcomites)



                ->setCellValue('N'.$i, $promedioParque)



                ->setCellValue('O'.$i, $sumvistot);



        $i++;







        $totcomites = $totcomites + $sumcomites;



        $totparques = $totparques + mysql_num_rows($res1);



        $totcalifant = $totcalifant + $ascalifant;



        $totcalif = $totcalif + $ascalif;



        $totvis = $totvis + $sumvis;



        $totvisa = $totvisa + $sumvisa;



        $totvisr1 = $totvisr1 + $sumvisr1;



        $totvisst = $totvisst + $sumvisst;



        $totvisr = $totvisr + $sumvisr;



        $totvisra = $totvisra + $sumvisra;



        $totviss = $totviss + $sumviss;



        $totvisp = $totvisp + $sumvisp;



        $totvistot = $totvistot + $sumvistot;



        $totcaltot = $totcaltot + $sumcaliftot;



    }



    $totdiftotal = round($totcalif/count($asesores))-round($totcalifant/count($asesores));



   



    $objPHPExcel->setActiveSheetIndex(0)



                ->setCellValue('A'.$i, 'Total de Parques Alegres')



                ->setCellValue('B'.$i, round($totcalifant/count($asesores)))



                ->setCellValue('C'.$i, round($totcalif/count($asesores)))



                ->setCellValue('D'.$i, $totdiftotal )



                ->setCellValue('E'.$i, $totvis)



                ->setCellValue('F'.$i, $totvisa)



                ->setCellValue('G'.$i, $totviss)



                ->setCellValue('H'.$i, $totvisp)



                ->setCellValue('I'.$i, $totvisr1)



                ->setCellValue('J'.$i, $totvisr)



                ->setCellValue('K'.$i, $totvisra)



                ->setCellValue('L'.$i, $totcomites)



                ->setCellValue('M'.$i, round($totcaltot/$totvistot))



                ->setCellValue('N'.$i, $totvistot)



                ->setCellValue('O'.$i, '');



               



    // Redirect output to a client’s web browser (Excel5)



    header('Content-Type: application/vnd.ms-excel');



    header('Content-Disposition: attachment;filename="Reporte de visitas del '.$_POST['fecha_inicial'].' al '.$_POST['fecha_final'].' .xls"');



    header('Cache-Control: max-age=0');



    // If you're serving to IE 9, then the following may be needed



    header('Cache-Control: max-age=1');







    // If you're serving to IE over SSL, then the following may be needed



    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



    header ('Pragma: public'); // HTTP/1.0







    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



    $objWriter->save('php://output');



    exit();



}







$str_var=$_POST['valores'];



$array_var = unserialize(base64_decode($str_var));



$str_evi=$_POST['evidencias'];



$array_evi = unserialize(base64_decode($str_evi));



$letra=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ',



             'AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO');







// Create new PHPExcel object



$objPHPExcel = new PHPExcel();







// Set document properties



$objPHPExcel->getProperties()->setCreator("Parques Alegres")



							 ->setLastModifiedBy("Parques Alegres")



							 ->setTitle("Reporte semanal por asesores")



							 ->setSubject("Reporte semanal")



							 ->setDescription("Reporte semanal por asesores")



							 ->setKeywords("")



							 ->setCategory("");



$e=0;



$a=1;



$r=2;



$z=3;



$c=0;



/*echo '<pre>';



print_r($array_var);



echo '</pre>';



*/



foreach($array_var as $k=>$v){



    if($k!="general"){



        $numfilas=0;



        if(is_array($array_evi[$k])){



            foreach($array_evi[$k] as $key=>$val){



                $evid=explode('|',$val);



                $i=0;



                $t=0;



                foreach($evid as $llave=>$valor){



                    $i++;



                }



                if($numfilas<$i){



                    $numfilas=$i;



                }



            }



        }



        $azul[$k]=$numfilas;



    }



}



$style = array(



        'alignment' => array(



            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,



        )



    );



$styleArray = array(



      'borders' => array(



          'allborders' => array(



              'style' => PHPExcel_Style_Border::BORDER_THIN



          )



      )



  );



//$objPHPExcel->getActiveSheet()->getDefaultStyle()->applyFromArray($styleArray);



$objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(13);



$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(19);



$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(7);



$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(9);



$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(7);



$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(17);



$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(14);



$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(8);



$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(9);



$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(9);



$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(9);



$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(9);



$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(32);



$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);



$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);



$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);



$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);



$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(27);



$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(27);



$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(27);



$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(27);



$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(11);



$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(11);



foreach($array_var as $k=>$v){



    $valores=explode(',',$v);



    if($k=="general"){



        $e=1;



        $objWorkSheet = $objPHPExcel->createSheet(1);



        $objPHPExcel->setActiveSheetIndex(1);



        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(35);



        for($f=0;$f<count($valores);$f++){



            $valorsito=explode(':',$valores[$f]);



            if($valorsito[1]=="negritas"){



                $objPHPExcel->getActiveSheet()->getStyle("A".$e)->getFont()->setBold(true);



            }



            else{



                        $objPHPExcel->setActiveSheetIndex(1)->setCellValue("B".$e, trim($valorsito[1]));    



            }



            $objPHPExcel->setActiveSheetIndex(1)



                        ->setCellValue("A".$e, trim($valorsito[0]));



            $e++;    



            $objPHPExcel->getActiveSheet()->setTitle('Reporte General');



        }



    }



    else{



        $col=1;



        if($e==0){



            $e=1;



        }



        $e=$e+3;



        $b=$e+1;



        $objPHPExcel->setActiveSheetIndex(0)



                    ->setCellValue('A'.$a, 'Asesor:')



                    ->setCellValue('B'.$a, trim($valores[0]))



                    ->mergeCells('B'.$a.':E'.$a)



                    ->setCellValue('A'.$r, 'Cartera:')



                    ->setCellValue('A'.$z, 'Reporte de evidencias')



                    ->setCellValue('A'.$e, 'Datos generales de la visita')



                    ->setCellValue('H'.$e, 'Evaluación del parque')



                    ->setCellValue('L'.$e, 'Observaciones por subparámetro')



                    ->mergeCells('A'.$e.':G'.$e)



                    ->mergeCells('H'.$e.':K'.$e)



                    ->mergeCells('L'.$e.':R'.$e)



                    ->setCellValue('A'.$b, '#')



                    ->setCellValue('B'.$b, 'Día')



                    ->setCellValue('C'.$b, 'Mes')



                    ->setCellValue('D'.$b, 'Año')



                    ->setCellValue('E'.$b, 'Nombre del Parque')



                    ->setCellValue('F'.$b, 'Tipo de visita')



                    ->setCellValue('G'.$b, 'Ingresos')



                    ->setCellValue('H'.$b, 'Calificación anterior')



                    ->setCellValue('I'.$b, 'Calificación actual')



                    ->setCellValue('J'.$b, 'Diferencia')



                    ->setCellValue('K'.$b, 'Número de visitas')



                    ->setCellValue('L'.$b, 'Comité')



                    ->setCellValue('M'.$b, 'Instalaciones')



                    ->setCellValue('N'.$b, 'Ingresos')



                    ->setCellValue('O'.$b, 'Eventos')



                    ->setCellValue('P'.$b, 'Áreas verdes')



                    ->setCellValue('Q'.$b, 'Afluencia')



                    ->setCellValue('R'.$b, 'Orden');



                    //->setCellValue('S'.$e, 'Compromisos establecidos en la semana')



                    $objPHPExcel->getActiveSheet()->getStyle("A".$a.":R".$e)->getFont()->setBold(true);



                    $objPHPExcel->getActiveSheet()->getStyle("A".$e.":AZ".$b)->applyFromArray($style);



                    $objPHPExcel->getActiveSheet()->getStyle("A".$e.":AZ".$b)->getAlignment()->setWrapText(true);



        //echo $v;



        //echo 'Asesor: '.$valores[0].'<br>';



        //echo 'Cartera:<br>';



        //echo 'Reporte de evidencias<br>';



        $cc=$e;



        $dd=$e+1;



        $e=$e+2;



        $c=0;



        if(is_array($array_evi[$k])){



            foreach($array_evi[$k] as $key=>$val){



                $evid=explode('|',$val);



                $i=0;



                $t=0;



                $fantasma=1;



                $fant=0;



                for($nm=0;$nm<count($evid);$nm++){



                    $objPHPExcel->getActiveSheet()->getRowDimension($e)->setRowHeight(35);



                    $objPHPExcel->getActiveSheet()->getStyle($letra[$i].$e)->getAlignment()->setWrapText(true);



                    $objPHPExcel->getActiveSheet()->getStyle($letra[$i].$e)->applyFromArray($styleArray);



                    /*if(substr($evid[$nm],0,1)=="'"){



                        if(count($evid)<$azul[$k]){



                            if($fantasma==1){



                                $fantasma=$azul[$k]-count($evid);



                                $objPHPExcel->getActiveSheet()->getStyle($letra[$i].$e.':'.$letra[$i+$fantasma].$e)->applyFromArray($styleArray);



                                $i=$i+$fantasma;



                                $fant=1;



                            }



                        }



                        $valor=substr($evid[$nm],1);



                        $valor=substr($valor,0,-1);



                        $compro=explode("'",$valor);



                        //echo 'Compromiso: '.$letra[$i].$e.' - '.$compro[0].'<br>';



                        $objPHPExcel->setActiveSheetIndex(0)



                                    ->setCellValue($letra[$i].$e, trim($compro[0]));



                        if($compro[0]=="" && $fant==0){



                            $objPHPExcel->getActiveSheet()->getStyle($letra[$i].$e.':'.$letra[$i+1].$e)->applyFromArray($styleArray);



                            $i++;



                            $fant=1;



                        }



                        $t++;



                        $fant=1;



                    }



                    else{



                    */



                        //echo $letra[$i].$e.' - '.$evid[$nm].'<br>';



                        $objPHPExcel->setActiveSheetIndex(0)



                                    ->setCellValue($letra[$i].$e, trim($evid[$nm]));



                        //echo $valor.' - ';



                    //}



                    $i++;



                }



                //echo '<br>';



                /*foreach($evid as $llave=>$valor){



                    if(substr($valor,0,1)=="'"){



                        $valor=substr($valor,1);



                        $valor=substr($valor,0,-1);



                        $compro=explode("'",$valor);



                        $objPHPExcel->setActiveSheetIndex(0)



                                    ->setCellValue($letra[$i].$e, $compro[0]);



                        $t++;



                    }



                    else{



                        $objPHPExcel->setActiveSheetIndex(0)



                                    ->setCellValue($letra[$i].$e, $valor);



                        //echo $valor.' - ';



                    }



                    $i++;



                }*/



                //echo '<br>';



                if($col<$t){



                    $col=$t;



                }



                $e++;



                $c++;



            }



        }



        $colum=$letra[$col+19].$cc;



        $objPHPExcel->getActiveSheet()->getStyle('A'.$e)->getFont()->setBold(true);



        $objPHPExcel->getActiveSheet()->getStyle($letra[$col+17].$cc.':'.$letra[$col+24].$cc)->getFont()->setBold(true);



        $objPHPExcel->setActiveSheetIndex(0)



                    ->setCellValue('A'.$e, 'Reporte Semanal')



                    ->mergeCells('S'.$cc.':'.$colum)



                    ->setCellValue($letra[$col+17].$cc, 'Compromisos en número')



                    ->mergeCells($letra[$col+17].$cc.':'.$letra[$col+19].$cc)



                    ->setCellValue($letra[$col+20].$cc, 'Experiencias exitosas')



                    ->mergeCells($letra[$col+20].$cc.':'.$letra[$col+24].$cc)



                    ->setCellValue($letra[$col+17].$dd, 'No. de compromisos acumulados')



                    ->setCellValue($letra[$col+18].$dd, 'No. de compromisos cumplidos acumulados')



                    ->setCellValue($letra[$col+19].$dd, 'Porcentaje de cumplimiento')



                    ->setCellValue($letra[$col+20].$dd, 'Link del parque')



                    ->setCellValue($letra[$col+21].$dd, 'Experiencia exitosa')



                    ->setCellValue($letra[$col+22].$dd, 'Link experiencia exitosa')



                    ->setCellValue($letra[$col+23].$dd, 'Experiencias exitosas replicadas')



                    ->setCellValue($letra[$col+24].$dd, 'Link experiencia exitosa replicada');



                    /*->setCellValue('S'.$dd, 'Compromiso 1')



                    ->setCellValue($letra[$col+18].$cc, 'Compromisos en seguimiento')



                    ->setCellValue($letra[$col+19].$cc, 'Compromisos cumplidos')



                    ->setCellValue($letra[$col+18].$dd, 'Compromiso 1')



                    ->setCellValue($letra[$col+19].$dd, 'Compromiso 1')



                    ->setCellValue($letra[$col+20].$dd, 'No. Compromisos en la semana')



                    ->setCellValue($letra[$col+21].$dd, 'No. Compromisos en seguimiento')



                    ->setCellValue($letra[$col+22].$dd, 'No. de compromisos cumplidos en la semana')



                    ->setCellValue($letra[$col+23].$dd, 'No. de compromisos no cumplidos')*/



                    $objPHPExcel->getActiveSheet()->getStyle($letra[0].$cc.':'.$letra[$col+24].$dd)->applyFromArray($styleArray);



                    $objPHPExcel->getActiveSheet()->getStyle($letra[0].$cc.':'.$letra[$col+24].$dd)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);



        /*for($num=1;$num<$col;$num++){



            $fila=$letra[$num+18].$dd;



            $cn=$num+1;



            $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue($fila, 'Compromiso'. $cn);



        }*/



        $e++;



        for($f=1;$f<count($valores);$f++){



            $valorsito=explode(':',$valores[$f]);



            if($valorsito[1]=="negritas"){



                $objPHPExcel->getActiveSheet()->getStyle($letra[0].$e)->getFont()->setBold(true);



            }



            else{



                        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra[3].$e, trim($valorsito[1]));    



            }



            $objPHPExcel->setActiveSheetIndex(0)



                        ->setCellValue($letra[0].$e, trim($valorsito[0]))



                        ->mergeCells($letra[0].$e.':'.$letra[2].$e);



            //echo $valores[$i].'-';



            $e++;



        }



        $e++;



        $a=$a+6+$c+count($valores);



        $r=$r+6+$c+count($valores);



        $z=$z+6+$c+count($valores);



        //echo '<br>';



        //echo '<br>';



    }



}











//exit();



//exit();



// Add some data



/*$objPHPExcel->setActiveSheetIndex(0)



            ->setCellValue('A1', 'Hello')



            ->setCellValue('B2', 'world!')



            ->setCellValue('C1', 'Hello')



            ->setCellValue('D2', 'world!');







// Miscellaneous glyphs, UTF-8



$objPHPExcel->setActiveSheetIndex(0)



            ->setCellValue('A4', 'Miscellaneous glyphs')



            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');



*/



// Rename worksheet











// Set active sheet index to the first sheet, so Excel opens this as the first sheet



$objPHPExcel->setActiveSheetIndex(0);



$objPHPExcel->getActiveSheet()->setTitle('Por Asesores');











// Redirect output to a client’s web browser (Excel5)



header('Content-Type: application/vnd.ms-excel');



header('Content-Disposition: attachment;filename="Reporte semanal '.$_POST['fecha_inicial'].' .xls"');



header('Cache-Control: max-age=0');



// If you're serving to IE 9, then the following may be needed



header('Cache-Control: max-age=1');







// If you're serving to IE over SSL, then the following may be needed



header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past



header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified



header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1



header ('Pragma: public'); // HTTP/1.0







$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');



$objWriter->save('php://output');



exit;