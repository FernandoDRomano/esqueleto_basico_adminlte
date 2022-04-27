<?php
	/*
	print_r($_REQUEST);
	print_r($_POST);
	print_r($_GET);
	exit;
	*/
	//echo("Suses");
	//exit;
	//
	//echo password_hash("Ruben", PASSWORD_DEFAULT)."<br>";
	//$opciones = [
	//	'cost' => 13,
	//];//'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	
	//echo password_hash("Ruben", PASSWORD_BCRYPT, $opciones)."<br>";
	//echo(password_verify("spiderman2015","$2y$13$4wg3SQHg/QW3G5FDFcNVb.3h3YZMyGbLnawU80tgrXM1L31.raWhS"));
	//exit;
	
	require('../FuncionesGenerales.php');
	InluirPHP('../clases/ClaseMaster.php','1');//Tendria Que Entrar Por Config.php
	require('../config.php');
	require('../authenticate.php');
	if(!$ClaseMaster->db){
		header("Location: ../ErrorSql.php");
		exit;
	}
	require('../FuncionesHorarias.php');
	$horaPasada = date("Y-m-d H:i:s", strtotime('2020-02-25 00:00:00'));
	$HoraBusqueda = date('Y-m-d H:i:s', strtotime($horaPasada. $DiferenciaHoraria));
	//echo("<br>horaPasada:" . $horaPasada . "<br> HoraBusqueda:". $HoraBusqueda . "<br> DiferenciaHoraria:" . $DiferenciaHoraria . "<br> DiferenciaSQL:". $DiferenciaSQL . "<br>");
	
	/*
	$Columnas = array("Hora");
	$Consulta= "
		SELECT DATE_ADD('$HoraBusqueda', INTERVAL '$DiferenciaSQL' HOUR_MINUTE) as 'Hora'
	";
	//echo($Consulta);
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	if($Resultado){
		//echo($ClaseMaster->ArraydResultados[0][0]);
	}
	*/
	/*
	$FechaI = issetornull('FechaI');
	$FechaI = str_replace('/', '-', $FechaI).':00';
	$FechaI = substr($FechaI,6, 4).'-'.substr($FechaI,3, 2).'-'.substr($FechaI,0, 2).substr($FechaI,10);
	*/
	//echo("En Mantenimiento");
	//exit;
	$IdUsuario = issetornull('IdUsuario');
	$ComprobantesDeIngreso = issetornull('ComprobantesDeIngreso');
	$Columnas = array("Pieza Id","Barcode","CI","Sucursal","Fecha De Creacion De CI","Estado","Fecha De Estado");
	$Consulta= "
		SELECT fp.id as 'Pieza Id',fp.barcode_externo as 'Barcode', ci.numero as 'CI', suc.nombre as 'Sucursal', ci.create as 'Fecha De Creacion De CI'
		, e.NombreDeEstado as 'Estado'
		, pe.Fecha as 'Fecha De Estado'
		FROM sispoc5_gestionpostal.flash_comprobantes_ingresos as ci
		inner join sispoc5_gestionpostal.flash_sucursales as suc on ci.sucursal_id = suc.id
		inner join sispoc5_gestionpostal.flash_piezas as fp on fp.comprobante_ingreso_id = ci.id
		inner join (
			select concat('CF',bmp.Tarjeta) as 'TarjetaCF', bmp.* from sispoc5_Banco.Piezas as bmp
			
		) as bmp on fp.barcode_externo =  bmp.TarjetaCF
		inner join sispoc5_Banco.PiezasEstados as pe on fp.barcode_externo = pe.Barcode
		inner join (
			select max.Barcode, max(max.Fecha) as 'Fecha'
			from sispoc5_Banco.PiezasEstados as max 
			group by max.Barcode
		) as max on max.Barcode = pe.Barcode and max.Fecha = pe.Fecha
		inner join sispoc5_Banco.Estados as e on pe.idEstados = e.Id
		where ci.id = '$ComprobantesDeIngreso'
		group by fp.id, pe.Fecha
		order by fp.id desc
	";
	
	
	
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	//echo('1|' . $Consulta);
	if($Resultado){
		for($cont=0;$cont< count($Columnas) ;$cont++){
			if($cont>0){echo("|");}
			echo($Columnas[$cont]);
		}
		echo(";");
		for($cont=0;$cont< count($ClaseMaster->ArraydResultados) ;$cont++){
			if($cont>0){echo(";");}
			for($cont2=0;$cont2< count($Columnas) ;$cont2++){
				if($cont2==0){
					//if($cont2==0){echo(($cont+1)."|");}
					if($ClaseMaster->ArraydResultados[$cont][$cont2]==null and $ClaseMaster->ArraydResultados[$cont][$cont2]!='0'){
						echo("");
					}else{
						if ($ClaseMaster->ArraydResultados[$cont][$cont2] instanceof DateTime) {
							$resultado = $ClaseMaster->ArraydResultados[$cont][$cont2]->format('Y/m-d H:i:s');
							echo("".$resultado);
						}else{
							if($Columnas[0]=="PieceNumber"){
								echo(BCFOROCASA($ClaseMaster->ArraydResultados[$cont][$cont2]));
							}else{
								echo($ClaseMaster->ArraydResultados[$cont][$cont2]);
							}
						}
					}
				}else{
					if($ClaseMaster->ArraydResultados[$cont][$cont2]==null and $ClaseMaster->ArraydResultados[$cont][$cont2]!='0'){
						echo("|"."");
					}else{
						if ($ClaseMaster->ArraydResultados[$cont][$cont2] instanceof DateTime) {
							$resultado = $ClaseMaster->ArraydResultados[$cont][$cont2]->format('Y-m-d H:i:s');
							echo("|".$resultado);
						}else{
							echo("|".$ClaseMaster->ArraydResultados[$cont][$cont2]);
						}
					}
					
				}
			}
		}
	}
?>













