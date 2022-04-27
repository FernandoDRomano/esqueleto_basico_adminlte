<?php namespace Views;
	use Config\Elementos as Elementos;
	$template = new Template();
	//require (__ROOT__.'/PHPMailer/Exception.php');
	if (file_exists('Config/Elementos.php')){
		require_once('Config/Elementos.php');
		//echo('Config/Elementos.php Existe');
	}else{
		
		echo('Config/Elementos.php No Existe');
	}
	
	//require_once (__ROOT__.'Config/Elementos.php');
	class Template{
	public function __construct(){
?>

<?php

	function JScookieCompletar($nombre,$Valor){
		if(! ($nombre==="" || $Valor ==="") ){
			echo "<script> setCookie('$nombre','$Valor'); </script>"; 
		}
	}
	function issetornull($name){
		if(isset($_REQUEST[$name])){
			return ($_REQUEST[$name]);
		}else{
			return("");
		}
	}
	function issetsessionornull($name){
		if(isset($_SESSION[$name])){
			return ($_SESSION[$name]);
		}else{
			return("");
		}
	}
	
	$MesActual = date("Y-m-01", time()); 
	$year = substr($MesActual, 0, 4);
	$month = substr($MesActual, 5, 2);
	$MesActual = date("Y-m-01", mktime(0,0,0, $month+1, 0, $year));
	$MesSiguiente = date("Y-m-01", mktime(0,0,0, $month+2, 0, $year));
	$time = time();
	$NoMemory = strtotime(date("Ymdhis"));
	
	/*
	session_start([
		'cookie_lifetime' => 86400,
		'read_and_close'  => true,
	]);
	if(issetsessionornull('UserId')==''){
		header('Location: http://sispo.com.ar/consultas/logueo.php');
		echo("Main MSJ 38");
		exit;
	}
	$UserId = issetsessionornull('UserId');
	if(issetsessionornull('UserId')=='1'){
	}
	*/
	if(isset($_SESSION['idusuario'])){
		$UserId = $_SESSION['idusuario'];
		//$IdUsuarioSpp = $_SESSION['idusuario'];
	}else{
		//echo('<script>window.location.replace(URLJS);</script>');exit;exit;
	}
	$Usuario = "" ;
	if(isset($_SESSION['ClienteId'])){
		$Usuario = $_SESSION['ClienteId'] ;
		//$IdClienteSpp = $_SESSION['ClienteId'];
		//echo('<script>window.location.replace(URLJS);</script>');exit;exit;
	}else{
		$Usuario = "Correoflash" ;
	}
	//echo($Usuario);
	
	$PermisosFicherosDeMenues = $_SESSION['UsuarioURL'];
	//echo($UserId);
	
	
	//print_r($_SESSION);
?>
<script>
	var UserId = <?php echo(json_encode($UserId));?>;
</script>

<style>
	.list-group-item list-group-item-action .sidebar .text-light{
		background-color: #0068a9;
	}
	
	
	@media (min-width: 768px)
	.sidebar .nav-item .collapse, .sidebar .nav-item .collapsing {
		margin: 0 1rem;
		font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	}
	
	.collapse, .sidebar .nav-item .collapsing, .colleapsing {
		font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
	}
	
	.collapse-header {
		margin: 0 1rem;
		white-space: nowrap;
		padding: .5rem 1.5rem;
		text-transform: uppercase;
		font-weight: 800;
		font-size: .65rem;
		color: #b7b9cc;
		heigth: 0px;
	}
	.collapse-item {
		padding: .5rem 1rem;
		margin: 0 1rem;
		display: block;
		color: #3a3b45;
		text-decoration: none;
		border-radius: .35rem;
		white-space: nowrap;
		font-size: .85rem;
	}
	.ElementosDeSubMenu {
		background-color: #0068a9!important;	
	}
</style>
<!DOCTYPE html>
<html lang="es" class="translated-ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Correoflash</title>

		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/ImputUploads.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/SubaDeImagenes.css">
		
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Mouse.css" rel="stylesheet">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/select2.min.css" rel="stylesheet">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/loading.css" type="text/css">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/table.css" type="text/css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Menu.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/bootstrap.min.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/csstips.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Form.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Map.css">
		
		<!-- Inicio Css De PAnel De Control De MisEnvios -->
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/assets/global/plugins/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/assets/global/css/componentsARG.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/assets/global/css/DivsBolivia.css">
		<!-- Fin Css De PAnel De Control De MisEnvios -->
		
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/XLSX.css">
		
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/fileUpload.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Francisco.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/css.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/TablaYColapsable.css">

		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/FranciscoMenu.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/FranciscoFontawesome.css">
		<link href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/bancomacro.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
		<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Ruben.css">
		
		<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jquery.min.js"></script>
		
		<!--
		
		-->
		<script>
			var time=<?php echo json_encode($time); ?>;
			var NoMemory = <?php echo json_encode($NoMemory); ?>;
			var UserId = <?php echo json_encode($UserId); ?>;
		</script>

	</head>
	<div id="loading" name="loading" style="display:none">
		<b id="loadingText" style="color: white;text-shadow: 4px 4px 8px #000000;"></b>
	</div>
	<body class="">
		<div class="d-flex" id="wrapper">
			<div class="sidebar border-right" id="sidebar-wrapper">
				<div class="list-group list-group-flush">
					<p style="text-align:center;">
						<img src="http://sispo.com.ar/BancoMacro/images/logoAZUL.png" width="200" onclick="location.href='http://correoflash.com'" style="cursor:pointer;">
					</p>
					<p>&nbsp;</p>
					<?php
						//print_r($PermisosFicherosDeMenues);
						
						$Menu = "principal";
						if(array_search($Menu, $PermisosFicherosDeMenues) !== false){
							Elementos::CrearMenu("Inicio","principal/inicio","fas fa-home",$PermisosFicherosDeMenues);
						}
						
						$TituloSubMenues = ["Carta Documento","Carta Documento Masivo"];
						$URLSubMenues = ["pedidodeenvio/cartadocumento","pedidodeenvio/cartadocumentomasivo"];
						Elementos::CrearMainMenu("SolicitudDeEnvio","Solicitud De Envio","fa fa-th-large",$TituloSubMenues,$URLSubMenues,$PermisosFicherosDeMenues);
						
						$TituloSubMenues = ["Piezas Y Estados De Piezas"];
						$URLSubMenues = ["clientepiezassolicitadas/estados"];
						Elementos::CrearMainMenu("PiezasSolicitadas","Piezas Solicitadas","fa fa-th-large",$TituloSubMenues,$URLSubMenues,$PermisosFicherosDeMenues);
						
						
					?>
				</div>
			</div>
			<div id="page-content-wrapper">
				<nav class="navbar navbar-expand-lg btn-outline-secondary border-bottom mr-auto">
					<button class="btn mx-1 my-1 px-1 py-1 align-middle" id="menu-toggle" style="color: yellow;">
						<i class="fas fa-exchange-alt"></i>
						<b id="VerMenu" style="font-size: small;color: yellow;" hidden>Ver Menu</b>
						<b id="OcultarMenu" style="font-size: small;color: yellow;">Ocultar Menu</b>
						<!--<i class="fas fa-ellipsis-v text-light"></i>-->
					</button>
					<div class="text-light font-weight-bold h3">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">
							</font>
						</font>
					</div>
					<div class="ml-auto text-light">
						<font style="vertical-align: inherit;">
							<font style="vertical-align: inherit;">
								<?php global $NombreDeUsuario; echo($NombreDeUsuario); ?>
							</font>
						</font>
						<a href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");}?>" class="btn mx-1 my-1 px-1 py-1 align-middle" style="color: yellow;"> <!-- onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" -->
							<b style="font-size: small;color: yellow;">Salir</b>
							<i class="fas fa-sign-out-alt"></i>
						</a>    
					</div>
				</nav>
				<div id="ForInner" class="container-fluid">
					<!-- Aqui Se Escribira La Pagina Cargada Desde El Enrutador-->
				</div>
			</div>
					
		</div>
	</body>
</html>
<?php }}?>
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		if($("#wrapper")[0].className.indexOf('toggled') !== -1){
			$("#VerMenu").show();
			$("#OcultarMenu").hide();
		}else{
			$("#VerMenu").hide();
			$("#OcultarMenu").show();
		}
	});
</script>



<!--
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
-->
<script lang="javascript" src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Rugedit.js"></script>
<script lang="javascript" src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/dist/xlsx.full.min.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jquery.min.js"></script>
<!--
<script src="<?php echo URL; ?>Js/JsRu.js"></script>
-->
<style>
	.select-css,
	.btn.btn-large.btn-block.btn-tertiary
	{
		//padding: 10px;
		text-align: center;
		border-radius: 160px!important;
	}
	label.SubaDeImagenes, .SubaDeImagenes button {
		border-radius: 16px!important;
		text-align: center;
	}
</style>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameBase.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameSelect.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameGracicaHighcharts.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameTablero.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameElementosGenericos.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameTabla.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameGrowlMSJ.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameMultipleEnvio.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameDescargas.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameUploadFormFile.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameImputDeImagen.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameCajaDeGrupos.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameSQLObtenerValores.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameValoresAElementos.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameCustomSelect.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlamePostsBoveda.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameApiSend.js"></script>

<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/JsRu.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/bootstrap.min.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Moment.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ResizeSensor.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ElementQueries.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Habla.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Menu.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Growl.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Main.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptMap.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptForzadoOcasa.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptEditarSpp.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptEditarOcasa.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptCero.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptLoadXLS.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptTerceros.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptConsultaGlobalTuenti.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptConsultaTuentiGPS.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/FechaHDR.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptPing.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/ScriptFiles.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/RuScriptFiles.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/select2.min.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/dist/xlsx.full.min.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/html2canvas.js"></script>

<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameCargas.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Flame/FlameImputUpload.js"></script>

<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Tablas.js"></script>
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/highcharts.js"></script>

<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/Barcode.js"></script>
<!--
<script src="< ?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ? >Js/BarcodePre.js"></script>
-->
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/JsBarcode.code39.min.js"></script>
<!-- <script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jspdf.js"></script> -->
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jspdf.debug.js"></script>
<!-- <script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jspdf.min.js"></script> -->
<script src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Js/jspdf.plugin.autotable.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/canvg/1.5/canvg.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>



