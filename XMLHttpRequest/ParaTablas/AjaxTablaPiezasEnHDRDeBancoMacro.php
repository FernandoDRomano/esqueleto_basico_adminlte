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
	
	$IdUsuario = issetornull('IdUsuario');
	$HDR = issetornull('HDR');
	$Columnas = array("Pieza Id","Barcode","Hoja De Ruta","Sucursal","Cartero","Fecha De Creacion De HDR","Estado","Fecha De Estado");
	$Consulta= "
		SELECT T1.PiezaId as 'Pieza Id',T1.Barcode as 'Barcode', T1.HojaDeRuta as 'Hoja De Ruta', T1.Sucursal as 'Sucursal', T1.Cartero as 'Cartero', T1.FechaDeCreacionDeHDR as 'Fecha De Creacion De HDR', T1.Estado as 'Estado', T1.FechaDeEstado as 'Fecha De Estado'
		from(
			SELECT T1.PiezaId as 'PiezaId',T1.Barcode as 'Barcode', T1.HojaDeRuta as 'HojaDeRuta', T1.Sucursal as 'Sucursal', T1.Cartero as 'Cartero', T1.FechaDeCreacionDeHDR as 'FechaDeCreacionDeHDR', T1.Estado as 'Estado', T1.FechaDeEstado as 'FechaDeEstado',T1.Estados as 'Estados'
			
			from(
				SELECT fp.id as 'PiezaId',fp.barcode_externo as 'Barcode', hdr.id as 'HojaDeRuta', suc.nombre as 'Sucursal', Cartero.apellido_nombre as 'Cartero', hdr.create as 'FechaDeCreacionDeHDR', eapp.NombreDeEstado as 'Estado', pe.Fecha as 'FechaDeEstado',pe.id as 'Estados'
				FROM sispoc5_gestionpostal.flash_hojas_rutas as hdr
				inner join sispoc5_gestionpostal.flash_sucursales as suc on hdr.id = '$HDR' and hdr.sucursal_id = suc.id and hdr.id = '$HDR'
				inner join sispoc5_gestionpostal.flash_sucursales_carteros as Cartero on hdr.cartero_id = Cartero.id
				inner join sispoc5_gestionpostal.flash_piezas as fp on fp.tipo_id = '2' and fp.hoja_ruta_id = hdr.id
				inner join sispoc5_gestionpostal.flash_comprobantes_ingresos as ci on fp.comprobante_ingreso_id = ci.id
				left join sispoc5_Banco.PiezasEstados as pe on fp.barcode_externo = pe.Barcode
				left join sispoc5_Banco.Estados as eapp on pe.idEstados = eapp.id
				where hdr.id = '$HDR'
				and ci.cliente_id = 30 and fp.tipo_id = '2' and pe.Activo = true
				order by pe.id desc
				limit 10000
			)as T1
			group by T1.PiezaId
		)as T1
		
	";
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	
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
							$resultado = $ClaseMaster->ArraydResultados[$cont][$cont2]->format('Y-m-d-H-i-s');
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
							$resultado = $ClaseMaster->ArraydResultados[$cont][$cont2]->format('Y-m-d-H-i-s');
							echo("|".$resultado);
						}else{
							echo("|".$ClaseMaster->ArraydResultados[$cont][$cont2]);
						}
					}
					
				}
			}
		}
	}else{
		print_r($Consulta);
	}
?>













