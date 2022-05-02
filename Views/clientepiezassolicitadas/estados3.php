<?php
	$Objeto = json_encode($_REQUEST);
	$Post = json_decode($Objeto, false);
	$InicioDeAnio = "InicioDeAnio";
	$Fecha = "Fecha";
	use Config\Elementos as Elementos;
	
?>

<!-- 
<p>Este Panel Mostrara Los Pedidos Del Cliente Por Medio De Plataformas APPI, Las Piezas Creadas Por Medio De API Contienen El UsuarioId 2</p>
-->

<?php 
    echo('<div class="row justify-content-center mt-3">
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

        </div>
      </div>
    </div>
</div>')
?>

<!-- TABLA -->
<?php
    Elementos::CrearTabla("Solicitudes","12","","display:block",false,10,"display:none","display:none",false,"display:block");
?>
<!-- END TABLA -->

        
		
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
    /*$(document).ready(function() {
        
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
    } );*/

  </script>

