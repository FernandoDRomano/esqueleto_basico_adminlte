<?php
	$Objeto = json_encode($_REQUEST);
	$Post = json_decode($Objeto, false);
	$InicioDeAnio = "InicioDeAnio";
	$Fecha = "Fecha";
	use Config\Elementos as Elementos;
	
?>

<div class="row pt-3 pb-xl-5 mb-xl-5">
	<div class="col-12">
		<img class="img-fluid w-100 h-100" src="<?php if(SUBDOMINIO != ""){echo ("/" . SUBDOMINIO. "/");}else{echo ("/");} ?>Styles/IMAGENES/portada.jpg" alt="Imagen de bienvenida al sistema">
	</div>
</div>





