<?php
	$Objeto = json_encode($_REQUEST);
	$Post = json_decode($Objeto, false);
	$InicioDeAnio = "InicioDeAnio";
	$Fecha = "Fecha";
	use Config\Elementos as Elementos;
	
?>


<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Tablero.css">

<script>
	
</script>
<style>
	#ModalDatos ::-webkit-scrollbar {
	width: 16px;
	}
	#ModalDatos ::-webkit-scrollbar-track {
	background: #00F0F0; 
	}
	#ModalDatos ::-webkit-scrollbar-thumb {
	background: #00B0B0;
	}
	#ModalDatos ::-webkit-scrollbar-thumb:hover {
	background: #00A0A0; 
	}
	.form-control:focus {
		box-sizing: border-box;
		box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25) !important;
	}
	.card-header {
		color: #fff;
		background-color: #292d57;
		border-bottom: 1px solid #292d57;
		padding: .75rem 1.25rem;
	}
</style>

<style>
	ul.pagination li a.active{
		background: #CDDC39;
	}
	#ParaTabla{
		overflow-x: scroll !important;
		margin: 0 auto;
		white-space: nowrap;
	}
</style>

<style>
	.btn-secondary {
		color: #fff !important;
		background-color: #6c757d;
		border-color: #6c757d;
	}
</style>

<style>
	.control-label.Active{
		background: none;
	}
	#TablaDeResultados{
		display: contents;
	}
	.CajaDeGrupos{
		border: 1px solid rgba(0, 0, 0, .2);
	}
	#TableroDeGestiones{
		//zoom: 70%;
	}
</style>

<div id="ConsultaSinRetorno" class="number" hidden></div>
<div id="TableroDeGestiones" style="background: aliceblue;">
	<div class="CajaDeGrupos">
		<?php
			//Titulo
			Elementos::CrearTitulo("Test De Tabla Con Filtro");
			Elementos::CrearImputDeFecha("datetimepicker1","FechaDesde","Fecha Inicial De Busqueda","6");
			Elementos::CrearImputDeFecha("datetimepicker2","FechaHasta","Fecha Final De Busqueda","6");
			Elementos::CrearBoton("Buscar();","4","Buscar","");//Para Banco Macro
			echo('<hr class="size1 hideline">');
			Elementos::Creardashboard("","ElementoDashboard","Datos Encontrados","12","Uncolor","SizableElementoDashboard");
			Elementos::CrearTabladashboard("ElementoDashboard","3","Piezas En Stock");
			echo('<hr class="size1 hideline">');
		?>
	</div>
	
	<hr class="size2 hideline">
	
	<?php
	?>
</div>







