<?php
	$Objeto = json_encode($_REQUEST);
	$Post = json_decode($Objeto, false);
	$InicioDeAnio = "InicioDeAnio";
	$Fecha = "Fecha";
	use Config\Elementos as Elementos;
?>

<p>Este Panel Mostrara Los Pedidos Del Cliente Por Medio De Plataformas APPI, Las Piezas Creadas Por Medio De API Contienen El UsuarioId 2</p>


<link rel="stylesheet" href="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/Styles/Tablero.css">
	
  <div class="col-md-12">
		<div class="form-group">
			<div id="ModalDatos" class="modal fade" style="background-color: #333333c2;">
				<div class="row" id="container" style="position: absolute;top: 10px;left: 10px;right: 10px;background-color: #ffffff;"> 
					<div class="card col-12 mx-2 my-2 px-2 py-2">
						
            <div class="card-header bg-principal text-uppercase font-weight-bold">Pieza <b id="DetalleDePiezaActual"></b></div>
						<div class="card-body">
              <div class="row">
                
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasApellidoYNombre">Apellido y Nombre</label>
                    <input class="form-control" type="text" name="EstadosDePiezasApellidoYNombre" id="EstadosDePiezasApellidoYNombre" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasDocumento">DNI/DU</label>
                    <input class="form-control" type="text" name="EstadosDePiezasDocumento" id="EstadosDePiezasDocumento" readonly>
                  </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasDirecciónDeEntrega">Dirección de Entrega</label>
                    <input class="form-control" type="text" name="EstadosDePiezasDirecciónDeEntrega" id="EstadosDePiezasDirecciónDeEntrega" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasCodigoExterno">Codigo Externo</label>
                    <input class="form-control" type="text" name="EstadosDePiezasCodigoExterno" id="EstadosDePiezasCodigoExterno" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasUltimoEstado">Ultimo estado</label>
                    <input class="form-control" type="text" name="EstadosDePiezasUltimoEstado" id="EstadosDePiezasUltimoEstado" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasFechaUltimoEstado">Fecha último estado</label>
                    <input class="form-control" type="text" name="EstadosDePiezasFechaUltimoEstado" id="EstadosDePiezasFechaUltimoEstado" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasRecibió">Recibió</label>
                    <input class="form-control" type="text" name="EstadosDePiezasRecibió" id="EstadosDePiezasRecibió" readonly>
                  </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <div class="form-group">
                    <label for="EstadosDePiezasVínculo">Vínculo</label>
                    <input class="form-control" type="text" name="EstadosDePiezasVínculo" id="EstadosDePiezasVínculo" readonly>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 col-md-3">
                  <button type="button" class="btn btn-secondary" id="SalirDeModal">
                  <i class="fas fa-undo"></i>Volver
                  </button>
                </div>
              </div>

              <div class="row">
                <div class="col-12 mb-4">
                  <?php 
                    Elementos::CrearTabladashboard("EstadosDePiezas","12","","display:block",false,5000,"display:none","display:none",false,"display:block","display: none","display: none");
                  ?>
                </div>
              </div>

              <div class="row">
                
              <div class="form-group col-12">
                  <div class="card-header text-uppercase font-weight-bold"><font><font style="vertical-align: inherit;">Acuse En Calle</font></font></div>
                  <img id="FotoAndroid" src="" class="mx-auto d-block" style="width: -webkit-fill-available;max-width: 100%;">
                </div>
                
                <div class="col-md-3" style="display:none">
                  <button type="button" class="btn btn-secondary" id="SalirDeModal2">
                  <i class="fas fa-undo"></i>Volver
                  </button>
                </div>

              </div>

            </div>
						
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

<!-- CARD CON FORMULARIO -->
<div class="row justify-content-center mt-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-principal text-white">
                <p class="mb-0 text-center text-lg">Consulta de Piezas</p>
              </div>
              <div class="card-body">
                
                <div>
                  
                  <div class="form-group">
                    <label for="Documento">DNI/DU:</label>
                    <input type="text" name="Documento" id="Documento" placeholder="Ingrese su DNI/DU" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label for="ApellidoYNombre">Apellido y nombre:</label>
                    <input type="text" name="ApellidoYNombre" id="ApellidoYNombre" placeholder="Ingrese su apellido y nombre" class="form-control">
                  </div>
                  
                  <div class="form-row">
                    
                    <div class="form-group col-md-6" id="datetimepicker1">
                      <label for="FechaDesde">Fecha ingreso desde:</label>
                      <div class="input-group">
                        <input type="date" name="FechaDesde" id="FechaDesde" class="datepicker form-control" placeholder="Ingrese la fecha desde">
                        <label class="input-group-append mb-0" for="FechaDesde">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </label>
                      </div>
                    </div>
  
                    <div class="form-group col-md-6" id="datetimepicker2">
                      <label for="FechaHasta">Fecha ingreso hasta:</label>
                      <div class="input-group">
                        <input type="date" name="FechaHasta" id="FechaHasta" class="datepicker form-control" placeholder="Ingrese la fecha hasta">
                        <label class="input-group-append mb-0" for="FechaHasta">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </label>
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="BarcodeExterno">Número de pieza:</label>
                    <input type="text" name="BarcodeExterno" id="BarcodeExterno" placeholder="Ingrese su número de pieza" class="form-control">
                  </div>
                 
                  <div class="form-group d-flex justify-content-around justify-content-md-center justify-content-lg-end">
                    <button class="btn bg-blue mx-md-1 mx-lg-0 mr-lg-1" onclick="search()"><i class="fas fa-search"></i> Buscar</button>
                    <button class="btn bg-green mx-md-1 mx-lg-0 ml-lg-1" onclick="Reporte2()"><i class="fas fa-file-excel mr-1"></i>Reporte</button>
                  </div>
                
                </div>
                
                <!-- TABLA -->
                <?php
                    Elementos::CrearTabla("Solicitudes","12","","display:block",false,10,"display:none","display:none",false,"display:block");
                ?>
                <!-- END TABLA -->

              </div>
            </div>
          </div>
</div>

<script>

    /* PICKADATE */
    $('.datepicker').pickadate({
      // Strings and translations
      monthsFull: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
      monthsShort: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
      weekdaysFull: ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
      weekdaysShort: ["dom","lun","mar","mié","jue","vie","sáb"],

      // Buttons
      today:"Hoy",
      clear:"Borrar",
      close:"Cerrar",

      // Accessibility labels
      //selectMonths: true,
      //selectYears: true,
      labelMonthNext: 'Siguiente Mes',
      labelMonthPrev: 'Previo Mes',
      labelMonthSelect: 'Seleccione un Mes',
      labelYearSelect: 'Selecciones un Año',

      // Format
      firstDay:1,
      //format:"dddd d !de mmmm !de yyyy",
      format: "dd/mm/yyyy",
      formatSubmit:"yyyy/mm/dd",

      // Close on a user action
      closeOnSelect: true,
      closeOnClear: true,

    })

    //DATATABLE
    
    $(document).ready(function() {
        
        // Setup - add a text input to each footer cell
        $('#TablaSolicitudes tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
        } );


        $("#TablaSolicitudes").DataTable({
          "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "loadingRecords": "Cargando ...",
            "processing": "Procesando ...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            }
          },
          "scrollX": true,
          
          initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( "input", this.footer() ).on( "keyup change clear", function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
          } 
          
        });
    } );
    
  </script>
