<?php
	$Objeto = json_encode($_REQUEST);
	$Post = json_decode($Objeto, false);
	$InicioDeAnio = "InicioDeAnio";
	$Fecha = "Fecha";
	use Config\Elementos as Elementos;
	
?>

<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Tablero.css">
	<div class="col-md-12">
		<div class="form-group">
			<div id="ModalDatos" class="modal fade" style="background-color: #333333c2;">
				<div class="row" id="container" style="position: absolute;top: 10px;left: 10px;right: 10px;background-color: #ffffff;"> <!-- -->
					<div class="card mx-2 my-2 px-2 py-2">
						<div class="card-header text-uppercase font-weight-bold">Pieza <b id="DetalleDePiezaActual"></b></div>
						<?php
							echo('<hr class="size2 hideline">');
							//Elementos::CrearTitulo("Estados De Solicitud");
							
							Elementos::CrearIniRow("12");
							Elementos::CrearImput("EstadosDePiezasApellidoYNombre","text","Apellido y Nombre:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasDocumento","text","DNI/DU:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasDirecciónDeEntrega","text","Dirección de Entrega:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasCodigoExterno","text","Codigo Externo:","3","readonly",false,false);
							echo('<hr class="size1 hideline">');
							Elementos::CrearImput("EstadosDePiezasUltimoEstado","text","Ultimo estado:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasFechaUltimoEstado","text","Fecha último estado:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasRecibió","text","Recibió:","3","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasVínculo","text","Vínculo:","3","readonly",false,false);
							echo('<hr class="size1 hideline">');
							Elementos::CrearFinRow();
							
							
							/*
							Elementos::CrearImput("EstadosDePiezasComprobanteDeIngreso","text","Comprobante De Ingreso:","6","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasBarcodeExterno","text","Codigo De Barra:","6","readonly",false,false);
							echo('<hr class="size1 hideline">');
							//Elementos::CrearImput("EstadosDePiezasIdPieza","text","Pieza Id:","4","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasProvincia","text","Provincia:","4","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasLocalidad","text","Localidad:","4","readonly",false,false);
							Elementos::CrearImput("EstadosDePiezasCodigoPostal","text","Codigo Postal:","4","readonly",false,false);
							
							echo('<hr class="size1 hideline">');
							
							echo('<hr class="size1 hideline">');
							Elementos::CrearImput("EstadosDePiezasFechaDesdeDeCreacion","text","Fecha De Creacion:","6","readonly",false,false);
							echo('<hr class="size1 hideline">');
							echo('<hr class="size2 hideline">');
							*/
							
						?>
						<hr class="size2 hideline">
						<div class="col-md-3">
							<button type="button" class="btn btn-secondary" id="SalirDeModal">
							<i class="fas fa-undo"></i>Volver
							</button>
						</div>
						<hr class="size2 hideline">
						
						<?php
							Elementos::CrearIniRow("6");
							echo('<div class="card-header text-uppercase font-weight-bold">Movimientos</div>');
							//Elementos::CrearTabladashboard("EstadosDePiezas","12","","display:block",false,5,"display:none","display:none",false,"display:block");
							Elementos::CrearTabladashboard("EstadosDePiezas","12","","display:block",false,5000,"display:none","display:none",false,"display:block","display: none","display: none");
							Elementos::CrearFinRow();
							echo('<hr class="size2 hideline">');
							
							//Elementos::CrearDesplegableConTitulo("Estado De Pieza","2");
						?>
						<div class="form-group col-md-12">
							<div class="card-header text-uppercase font-weight-bold"><font><font style="vertical-align: inherit;">Acuse En Calle</font></font></div>
							<img id="FotoAndroid" src="" class="mx-auto d-block" style="width: -webkit-fill-available;max-width: 100%;">
						</div>
						
						<div class="col-md-3" style="display:none">
							<button type="button" class="btn btn-secondary" id="SalirDeModal2">
							<i class="fas fa-undo"></i>Volver
							</button>
						</div>
						
						<!--
						<div class="col-md-12" style="text-align: center;color: #333333;letter-spacing: 6px;text-transform: uppercase;text-decoration: underline;">
							<h1>!Importante<h1>
						</div>
						<div class="col-md-12">
							<p style="text-align: justify;text-shadow: 2px 2px 10px #bfbfbf;border-style: double;padding: inherit;border-color: #292d57;">Una vez confirmada la Carta Documento los datos contenidos en la misma no podrán modificarse. Controle antes de confirmar su envío ya que luego no se podrán hacer reclamos al correo por datos incorrectos o inexistentes</p>
						</div>
						
						<hr class="size1 hideline">
						<div class="col-md-">
							<button type="button"  class="btn btn-large btn-block btn-tertiary" id="SalirDeModal" onclick="EnviarCartaDoccumento(this)" style="width: 100%;">
								<font style="vertical-align: inherit;">
									<font style="vertical-align: inherit;">
										Confirmar Y Enviar Carta Documento
									</font>
								</font>
							</button>
						</div>
						<hr class="size2 hideline">
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
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
	/*
	.CajaDeGrupos{
		border: 1px solid rgba(0, 0, 0, .2);
	}
	*/
	#TableroDeGestiones{
		//zoom: 70%;
	}
</style>

<style>
	div#Parrafo p{
		margin-top: 0px;
		margin-bottom: 0px;
	}
	div#Parrafo blockquote{
		font-size: 12px;
		padding-top: 0px;
		padding-bottom: 0px;
		margin: 0 0 0 40px;
		border: none;
	}
	
	table th {
		background-color: #374a8e;
	}
	table tr td {
		color: #333333;
		border: 0px solid #ddd;
	}
	table tr:hover {
		background-color: #5bc0de;
	}
	table tr.Escaner:hover {
		background-color: #ffffff;
	}
	table#TablaEstadosDePiezas tr th,table#TablaEstadosDePiezas tr td {
		background-color: #ffffff;
		color: #000000;
		border: hidden;
	}
	table tr:nth-child(even) {
		background-color: #d9edf7;
	}
</style>


<!-- 
<p>Este Panel Mostrara Los Pedidos Del Cliente Por Medio De Plataformas APPI, Las Piezas Creadas Por Medio De API Contienen El UsuarioId 2</p>
-->
<img id="imgBase" src="../BasePDF.jpg" alt="Smiley face" height="auto" width="auto" hidden> 
		<?php
			//Titulo
			Elementos::CrearDesplegableConTitulo("Consulta de Piezas","1");//Tablero de Gestion
			Elementos::CerrarDesplegableConTitulo();
			echo('<hr class="size2 hideline">');
			
			Elementos::CrearIniRow("8");
			Elementos::CrearImput("Documento","text","DNI/DU:","6",false,false,false);
			Elementos::CrearImput("ApellidoYNombre","text","Apellido y Nombre:","6",false,false,false);
			echo('<hr class="size2 hideline">');
			Elementos::CrearImputDeFecha("datetimepicker1","FechaDesde","Fecha Ingreso Desde:","6");
			Elementos::CrearImputDeFecha("datetimepicker2","FechaHasta","Fecha Ingreso Hasta:","6");
			echo('<hr class="size2 hideline">');
			Elementos::CrearImput("BarcodeExterno","text","Numero De Pieza:","12",false,false,false);
			Elementos::CrearFinRow();
			
			/*
			Elementos::CrearImput("ComprobanteDeIngreso","text","Comprobante De Ingreso:","4",false,false,false);
			Elementos::CrearImput("IdPieza","number","Pieza Id:","4",false,false,false);
			echo('<hr class="size1 hideline">');
			echo('<hr class="size1 hideline">');
			echo('<hr class="size1 hideline">');
			*/
			
			Elementos::CrearIniRow("4");
				Elementos::CrearBotonFrancisco("search();","12","Buscar","","","fas fa-search","Se Incluye Un Boton En Tabla De Resultados Para Ver Detalles");
				//Elementos::CrearBotonFrancisco("Reporte();","12","Reporte","","","fas fa-scroll");
				Elementos::CrearBotonFrancisco("Reporte2();","12","Reporte","","","fas fa-scroll");
				//Elementos::CrearBotonFrancisco("Buscar();","12","Buscar Solicitudes","","","fas fa-hand-paper");
			Elementos::CrearFinRow();
			
			echo('<hr class="size2 hideline">');
			
			//Elementos::Creardashboard("divColor1","Solicitudes","Solicitudes","12","MaximixedTable","SizableSolicitudes");
			
			//Elementos::CrearTabladashboard("Solicitudes","12","Solicitudes");
			//Elementos::CrearTabladashboard("Solicitudes","12","","display:block",false,10,"display:none","display:none",false,"display:block");
			Elementos::CrearTabladashboard("Solicitudes","12","","display:block",false,10,"display:none","display:none",false,"display:block");
			//
			
			
			
			/*
			
			Elementos::CrearTitulo("Complete con datos para realizar busqueda");
			Elementos::CrearImput("ComprobanteDeIngreso","text","Comprobante De Ingreso:","6",false,true,false);
			Elementos::CrearImput("BarcodeExterno","text","Codigo De Barra De Pieza:","6",false,true,false);
			echo('<hr class="size2 hideline">');
			Elementos::CrearTitulo("Si la fecha inicial y final de busqueda son iguales la busqueda se realizara sin importar fecha");
			echo('<hr class="size1 hideline">');
			Elementos::CrearImputDeFecha("datetimepicker1","FechaDesde","Fecha Inicial De Busqueda","6");
			Elementos::CrearImputDeFecha("datetimepicker2","FechaHasta","Fecha Final De Busqueda","6");
			echo('<hr class="size2 hideline">');
			Elementos::CrearTitulo("");
			echo('
				<div class="col-md-6" style="">
					<div class="span9 btn-block">
						<p>Busque Los Estados De Las Solicitudes. Para Mantener Su Resguardo Como Empleado Y/O Empresa, Los Datos De Pedidos Que Sean Confidenciales Entre Ambas Partes O Entre Cliente Y Terceros, No Se Mostraran.</p>
					</div>
				</div>
			');
			Elementos::CrearBoton("Buscar();","6","Buscar Solicitudes","");
			Elementos::CrearLeftTitulo("Resultados De Busqueda");
			Elementos::Creardashboard("divColor1","Solicitudes","Solicitudes","12","MaximixedTable","SizableSolicitudes");
			Elementos::CrearTabladashboard("Solicitudes","12","Solicitudes");
			echo('<hr class="size1 hideline">');
			Elementos::CerrarDesplegableConTitulo();
			
			*/
		?>
		
		
        <!-- TESTING NUEVA TABLA-->
        
		<div id=test style="display: none;">
		    <br><br><br><br>
            <?php
            Elementos::CrearIniRow("4");
				Elementos::CrearBotonFrancisco("search();","12","Inspeccionar","","","fas fa-search","");
			Elementos::CrearFinRow();
            ?>		    
		</div>
		
		
		<div class="" id="DivDeImagenes" style="display:none"></div>
		<canvas id="canvas"  height="200px" width="auto" ></canvas>
		</div>
	</div>
</div>







