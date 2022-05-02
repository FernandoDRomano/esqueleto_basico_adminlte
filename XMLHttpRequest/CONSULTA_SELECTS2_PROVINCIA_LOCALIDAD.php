<script>
    $(document).ready(function() {
		$('.select-2').select2();
		$('#DestinatarioProvincia').change(function(){
			if($('#DestinatarioProvincia').val() != "0"){
				filtro=["IdUsuario","User","time"];
				filtroX=[UserId,"","0"];
				var Parametros = ArraydsAJson(filtro,filtroX);
				Parametros = JSON.stringify(Parametros);// Manda Como Texto
				
				var Indices=["Id"];
				var Objetos = ["DestinatarioProvincia"];
				var ValoresDirectos = ArraydsAJson(Indices,Objetos);//Manda Como Objeto En SelectDesdeConsulta Se Transforma En Terxto
				
				var Config = JSON.parse(`
				{
					"SelectId":"DestinatarioLocalidad",
					"DataAjax":` + Parametros + `,
					"ValoresDirectos":` + ValoresDirectos + `,
					"MensajeEnFail":"true",
					"TextoEnFail":"No Se Encontraron Resultados Para Seleccionar",
					"Ajax":"` + URLJS + `XMLHttpRequest/ParaSelects/AjaxLocalidades.php"
				}`);
				//"ValoresDirectos":null,
				//"ValoresDirectos":` + ValoresDirectos + `,
				SelectDesdeConsulta(Config);
			}else{
				$("#DestinatarioLocalidad").attr("readonly", true);
				//$("#DestinatarioLocalidad").empty().append('<option value="0">Seleccione</option>');
				$("#DestinatarioLocalidad").empty();
			}
		});
		
		
		$('#RemitenteProvincia').change(function(){
			if($('#RemitenteProvincia').val() != "0"){
				filtro=["IdUsuario","User","time"];
				filtroX=[UserId,"","0"];
				var Parametros = ArraydsAJson(filtro,filtroX);
				Parametros = JSON.stringify(Parametros);// Manda Como Texto
				
				var Indices=["Id"];
				var Objetos = ["RemitenteProvincia"];
				var ValoresDirectos = ArraydsAJson(Indices,Objetos);//Manda Como Objeto En SelectDesdeConsulta Se Transforma En Terxto
				
				var Config = JSON.parse(`
				{
					"SelectId":"RemitenteLocalidad",
					"DataAjax":` + Parametros + `,
					"ValoresDirectos":` + ValoresDirectos + `,
					"MensajeEnFail":"true",
					"TextoEnFail":"No Se Encontraron Resultados Para Seleccionar",
					"Ajax":"` + URLJS + `XMLHttpRequest/ParaSelects/AjaxLocalidades.php"
				}`);
				//"ValoresDirectos":null,
				//"ValoresDirectos":` + ValoresDirectos + `,
				SelectDesdeConsulta(Config);
			}else{
				$("#RemitenteLocalidad").attr("readonly", true);
				//$("#DestinatarioLocalidad").empty().append('<option value="0">Seleccione</option>');
				$("#RemitenteLocalidad").empty();
			}
		});
		
	});
</script>