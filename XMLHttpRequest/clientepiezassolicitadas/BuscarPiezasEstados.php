<?php
 //	echo("Suses");
 //	exit;
 
    ini_set('memory_limit','9999M');
    
    function EstadosEnFilas($respuesta){
        //return $respuesta;
        $idGrupo = 0 ;
        $FilasEnGrupo = 0;
        $GropoDeEstadosDePieza=[];
        $PiezasConEstadosEnFila = [];
        $keys = array_keys($respuesta[0]);
        for($i=0; $i < count($respuesta); $i++){
            if($i>0){
                $FilaActual = $respuesta[$i];
                $FilaAnterior = $respuesta[$i-1];
                if($FilaActual[$keys[3]] == $FilaAnterior[$keys[3]] ){
                    $GropoDeEstadosDePieza[$idGrupo][$FilasEnGrupo] = $FilaActual;
                    $FilasEnGrupo++;
                }else{
                    $idGrupo++;
                    $FilasEnGrupo=0;
                    $GropoDeEstadosDePieza[$idGrupo][$FilasEnGrupo] = $FilaActual;
                    $FilasEnGrupo++;
                }
                
            }else{
                $GropoDeEstadosDePieza[$idGrupo][$FilasEnGrupo] = $respuesta[0];//8000000
                $FilasEnGrupo++;
            }
        }
        //return $GropoDeEstadosDePieza;
        
        $Respuesta = [];
        for($i=0; $i < count($GropoDeEstadosDePieza); $i++){
            $EstadosDePiezas = $GropoDeEstadosDePieza[$i];
            $PiezasConEstadosEnFila[0] = $EstadosDePiezas[0][3];
            $PiezasConEstadosEnFila[1] = $EstadosDePiezas[0][0];
            $PiezasConEstadosEnFila[2] = $EstadosDePiezas[0][9];
            $PiezasConEstadosEnFila[3] = utf8_encode($EstadosDePiezas[0][10]);
            $PiezasConEstadosEnFila[4] = utf8_encode($EstadosDePiezas[0][11]);
            $PiezasConEstadosEnFila[5] = $EstadosDePiezas[0][12];
            $PiezasConEstadosEnFila[6] = utf8_encode($EstadosDePiezas[0][13]);
            $PiezasConEstadosEnFila[7] = utf8_encode($EstadosDePiezas[0][8]);
            $PiezasConEstadosEnFila[8] = $EstadosDePiezas[0][7];
            
            $PiezasConEstadosEnFila[9] = 'NULL';
            
            $PiezasConEstadosEnFila[10] = 'NULL';
            $PiezasConEstadosEnFila[11] = 'NULL';
            $PiezasConEstadosEnFila[12] = 'NULL';
            $PiezasConEstadosEnFila[13] = 'NULL';
            $PiezasConEstadosEnFila[14] = 'NULL';
            $PiezasConEstadosEnFila[15] = 'NULL';
            $PiezasConEstadosEnFila[16] = 'NULL';
            $PiezasConEstadosEnFila[17] = 'NULL';
            $PiezasConEstadosEnFila[18] = 'NULL';
            $PiezasConEstadosEnFila[19] = 'NULL';
            $PiezasConEstadosEnFila[20] = 'NULL';
            $PiezasConEstadosEnFila[21] = 'NULL';
            $PiezasConEstadosEnFila[22] = 'NULL';
            $PiezasConEstadosEnFila[23] = 'NULL';
            $PiezasConEstadosEnFila[24] = 'NULL';
            $PiezasConEstadosEnFila[25] = 'NULL';
            $PiezasConEstadosEnFila[26] = 'NULL';
            $PiezasConEstadosEnFila[27] = 'NULL';
            $PiezasConEstadosEnFila[28] = 'NULL';
            $PiezasConEstadosEnFila[29] = 'NULL';
            $PiezasConEstadosEnFila[30] = 'NULL';
            $PiezasConEstadosEnFila[31] = utf8_encode($EstadosDePiezas[0][8]);
            $PiezasConEstadosEnFila[32] = $EstadosDePiezas[0][7];
            $PiezasConEstadosEnFila[33] = $EstadosDePiezas[0][14];
            $PiezasConEstadosEnFila[34] = 'NULL';
            $PiezasConEstadosEnFila[35] = 'NULL';
            $PiezasConEstadosEnFila[36] = '';
            /*
            $PiezasConEstadosEnFila[34] = $EstadosDePiezas[0][14];
            $PiezasConEstadosEnFila[35] = 'NULL';
            $PiezasConEstadosEnFila[36] = 'NULL';
            $PiezasConEstadosEnFila[37] = 'NULL';
            */
            
            
            //.....
            $EstadosDePiezas = $GropoDeEstadosDePieza[$i];
            $contadorDeEnvios=0;
            $contadorDeRecepcion=0;
            $contadorDedistribucion=0;
            for($j=0; $j< count($EstadosDePiezas) ; $j++){
                $estado = utf8_encode($EstadosDePiezas[$j][5]);
                
                if($EstadosDePiezas[$j][2] == 8 ){
                    $PiezasConEstadosEnFila[34] = $EstadosDePiezas[$j][15];
                    $PiezasConEstadosEnFila[35] = $EstadosDePiezas[$j][16];
                    $PiezasConEstadosEnFila[36] = $EstadosDePiezas[$j][17];
                    //$PiezasConEstadosEnFila[36] = $EstadosDePiezas[0][16];
                    //$PiezasConEstadosEnFila[37] = $EstadosDePiezas[0][17];
                }
                
                //Logico
                if($EstadosDePiezas[$j][2] == 48 ){
                    $PiezasConEstadosEnFila[10] = $estado;
                    $PiezasConEstadosEnFila[11] = $EstadosDePiezas[$j][1];
                }else{
                    //Fisico
                    if($EstadosDePiezas[$j][2] == 49 ){
                        $PiezasConEstadosEnFila[12] = $estado;
                        $PiezasConEstadosEnFila[13] = $EstadosDePiezas[$j][1];
                    }else{
                        //Enviado A
                        if($EstadosDePiezas[$j][2] >= 22 and $EstadosDePiezas[$j][2] <= 33 and $contadorDeEnvios == 0){
                            $PiezasConEstadosEnFila[14] = $estado;
                            $PiezasConEstadosEnFila[15] = $EstadosDePiezas[$j][1];
                            $contadorDeEnvios++;
                        }else{
                            //En
                            if($EstadosDePiezas[$j][2] >= 34 and $EstadosDePiezas[$j][2] <= 45  and $contadorDeRecepcion == 0){
                                $PiezasConEstadosEnFila[16] = $estado;
                                $PiezasConEstadosEnFila[17] = $EstadosDePiezas[$j][1];
                                $contadorDeRecepcion++;
                            }else{
                                //Enviado A
                                if($EstadosDePiezas[$j][2] >= 22 and $EstadosDePiezas[$j][2] <= 33 and $contadorDeEnvios >= 1){
                                    $PiezasConEstadosEnFila[18] = $estado;
                                    $PiezasConEstadosEnFila[19] = $EstadosDePiezas[$j][1];
                                }else{
                                    //En
                                    if($EstadosDePiezas[$j][2] >= 34 and $EstadosDePiezas[$j][2] <= 45 and $contadorDeRecepcion >= 1){
                                        $PiezasConEstadosEnFila[20] = $estado;
                                        $PiezasConEstadosEnFila[21] = $EstadosDePiezas[$j][1];
                                        $contadorDeRecepcion++;
                                        break;
                                    }else{
                                        
                                        
                                        //Distri 1 
                                        if($EstadosDePiezas[$j][2] == 46 and $contadorDedistribucion == 0){
                                            $PiezasConEstadosEnFila[22] = $EstadosDePiezas[$j][1];
                                            $contadorDedistribucion ++;
                                        }else{
                                            //Distri 2 
                                            if($EstadosDePiezas[$j][2] == 46 and $contadorDedistribucion == 1){
                                                $PiezasConEstadosEnFila[25] = $EstadosDePiezas[$j][1];
                                                    $contadorDedistribucion ++;
                                            }
                                            else{
                                                //Distri 3 
                                                if($EstadosDePiezas[$j][2] == 46  and $contadorDedistribucion >= 2){
                                                    $PiezasConEstadosEnFila[28] = $EstadosDePiezas[$j][1];
                                                    $contadorDedistribucion ++;
                                                }
                                                else{
                                                    //Resultado 1
                                                    if($EstadosDePiezas[$j][2] != 46 and $contadorDedistribucion == 1){
                                                        $PiezasConEstadosEnFila[23] = $estado;
                                                        $PiezasConEstadosEnFila[24] = $EstadosDePiezas[$j][1];
                                                    }
                                                    else{
                                                        //Resultado 2
                                                        if($EstadosDePiezas[$j][2] != 46 and $contadorDedistribucion == 2){
                                                            $PiezasConEstadosEnFila[26] = $estado;
                                                            $PiezasConEstadosEnFila[27] = $EstadosDePiezas[$j][1];
                                                        }
                                                        else{
                                                            //Resultado3
                                                            if($EstadosDePiezas[$j][2] != 46 and $contadorDedistribucion == 3){
                                                                if($PiezasConEstadosEnFila[29] == 'NULL'){
                                                                    $PiezasConEstadosEnFila[29] = $estado;
                                                                    $PiezasConEstadosEnFila[30] = $EstadosDePiezas[$j][1];   
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $PiezasConEstadosEnFila[9] = $contadorDedistribucion;
            $Respuesta[] = $PiezasConEstadosEnFila;
        }
        return $Respuesta;

        //return $respuesta;
    }
 
 
	function ToASCIITilde($str) { 
		$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ'); 
		//$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o'); 
		$b = array('a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'd', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'd', 'd', 'd', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'g', 'h', 'h', 'h', 'h', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'i', 'ij', 'ij', 'j', 'j', 'k', 'k', 'l', 'l', ' Lv', 'l', 'l', 'l', 'l', 'l', 'l', 'l', 'n', 'n', 'n', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'oe', 'oe', 'r', 'r', 'r', 'r', 'r', 'r', 's', 's', 's', 's', 's', 's', 's', 's', 't', 't', 't', 't', 't', 't', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'w', 'w', 'y', 'y', 'y', 'z', 'z', 'z', 'z', 'z', 'z', 's', 'f', 'o', 'o', 'u', 'u', 'a', 'a', 'i', 'i', 'o', 'o', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'a', 'a', 'ae', 'ae', 'o', 'o');
		return str_replace($a, $b, $str); 
	}
	
	function StringSize($str,$size,$modo,$Relleno,$LugarDeRelleno,$FinalDeLinea){
		$strT ;
		if(mb_detect_encoding($str, "auto") === "UTF-8"){
			//$strT = mb_substr( str_pad($str,$size,$Relleno,$LugarDeRelleno),0,$size,"ASCII");
			$str = ToASCIITilde($str);
			$strT = mb_substr( str_pad($str,$size,$Relleno,$LugarDeRelleno),0,$size,"UTF-8") . $FinalDeLinea ;
		}else{
			$strT = mb_substr( str_pad($str,$size,$Relleno,$LugarDeRelleno),0,$size,$modo) . $FinalDeLinea ;
		}
		//$strT = $strT . "(".mb_detect_encoding($str, "auto").")";
		return $strT;
	}
	
	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ){
		$datetime1 = date_create($date_1);
		$datetime2 = date_create($date_2);
		$interval = date_diff($datetime1, $datetime2);
		return $interval->format($differenceFormat);
	}
	
	//echo("<p>" .date_default_timezone_get() . "</p>");
	$default_timezone = date_default_timezone_get();
	$HoraInicial = date("Y-m-d H:i:s", time());
	//echo($HoraInicial);
	//exit;
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	//echo("<p>" .date_default_timezone_get() . "</p>");
	$HoraFinal = date("Y-m-d H:i:s", time());
	//echo($HoraInicial);
	//echo($HoraFinal);
	$file_ticket = 'UploadConfirmed.ticket.txt';
	if(!function_exists ('InluirPHP')){
		function InluirPHP($PHPFILE,$FILEID){
			if (file_exists($PHPFILE)){
				require_once($PHPFILE);
			}
		}
	}
	
	function StrToHTML($str) { 
		$a = array('&quot;');
		$b = array(' ');
		//$str = htmlentities($str);
		$str = html_entity_decode($str);
		return str_replace($a, $b, $str); 
	}
	
	
	function SQLServerScape($str){ 
		$a = array('[','!','"','#','$','%','&','/','(',')','=',',','.',';',':','_','-','{','}','´','\'');
		$b = array('[[]','[!]','["]','[#]','[$]','[%]','[&]','[/]','[(]','[)]','[=]','[,]','[.]','[;]','[:]','[_]','[-]','[{]','[}]','[´]',"''");
		$str = str_replace($a, $b, $str);
		return $str;
	}
	
	
	function BCFOROCASA($str){ 
		$a = array('\'');
		$b = array('-');
		$str = str_replace($a, $b, $str);
		return $str;
	}
	
	InluirPHP('../clases/ClaseMaster.php','1');//Tendria Que Entrar Por Config.php
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$Fecha = date("Y-m-d H:i:s", time()); 
	$Date = date('Y-m-d H:i:s', strtotime($Fecha . ' - 5 minutes'));
	$time = '0';
	

	$_SESSION['logged_in'] = TRUE;
	$iptocheck = $_SERVER['REMOTE_ADDR'];
	require('../config.php');
	require('../authenticate.php');
	if(!$ClaseMaster->db){
		header("Location: ../ErrorSql.php");
		exit;
	}
	
	function issetornull($name){
		if(isset($_REQUEST[$name])){
			return ($_REQUEST[$name]);
		}else{
			return("");
		}
	}
	
	
	$FechaIFPN = issetornull('FechaI');
	$FechaFFPN = issetornull('FechaF');
	
	$FechaI = issetornull('FechaI');
	$FechaI = str_replace('/', '-', $FechaI).':00';
	$FechaI = substr($FechaI,6, 4).'-'.substr($FechaI,3, 2).'-'.substr($FechaI,0, 2).substr($FechaI,10);
	$FechaF = issetornull('FechaF');
	$FechaF = str_replace('/', '-', $FechaF).':00';
	$FechaF = substr($FechaF,6, 4).'-'.substr($FechaF,3, 2).'-'.substr($FechaF,0, 2).substr($FechaF,10);
	$DiaYMes = '-' . substr($FechaF,8, 2) . '-' . substr($FechaF,5, 2);
	
	$Columnas = array("Hora");
	$Consulta= "
		SELECT CURRENT_TIMESTAMP() as 'Hora'
	";
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	if($Resultado){
		$HoraInicial = $ClaseMaster->ArraydResultados[0][0];
		
	}else{
		exit;
	}
	
	$HoraInicial = date('Y-m-d H:i:s', strtotime($HoraInicial . ' - 5 minutes'));
	$DiferenciaHoraria = dateDifference($HoraInicial,$HoraFinal,"%h");
	date_default_timezone_set($default_timezone);
	
	$FechaISpp = date('Y-m-d H:i:s', strtotime($FechaI));
	$FechaFSpp = date('Y-m-d H:i:s', strtotime($FechaF));
	
	$FechaI = date('Y-m-d H:i:s', strtotime($FechaI . ' - ' . $DiferenciaHoraria . ' hour') );
	$FechaF = date('Y-m-d H:i:s', strtotime($FechaF . ' - ' . $DiferenciaHoraria . ' hour') );
	
	
	
	$FechaI = issetornull('FechaI');
	$FechaI = str_replace('/', '-', $FechaI).':00';
	$FechaI = substr($FechaI,6, 4).'-'.substr($FechaI,3, 2).'-'.substr($FechaI,0, 2).substr($FechaI,10);
	$FechaF = issetornull('FechaF');
	$FechaF = str_replace('/', '-', $FechaF).':00';
	$FechaF = substr($FechaF,6, 4).'-'.substr($FechaF,3, 2).'-'.substr($FechaF,0, 2).substr($FechaF,10);

	$FechaIServer = date('Y-m-d H:i:s', strtotime($FechaI . ' - ' . $DiferenciaHoraria . ' hour') );
	$FechaFServer = date('Y-m-d H:i:s', strtotime($FechaF . ' - ' . $DiferenciaHoraria . ' hour') );
	
	$Desde = $FechaI;
	$Hasta = $FechaF;
	
	$ComprobanteDeIngreso = issetornull('ComprobanteDeIngreso');
	$UserId = issetornull('UserId');
	$BarcodeExterno = issetornull('BarcodeExterno');
	$Documento = issetornull('Documento');
	$ApellidoYNombre = issetornull('ApellidoYNombre');
	$IdPieza = issetornull('IdPieza');
	
	
	$RealDesde = issetornull('FechaI');
	if($RealDesde != ''){
		$RealDesde = str_replace('/', '-', $RealDesde).':00';
		$RealDesde = date('Y-m-d H:i:s', strtotime($RealDesde . '') );
		//$Desde = date('Y-m-d', strtotime($Desde ) );
	}
	$RealHasta = issetornull('FechaF');
	if($RealHasta != ''){
		$RealHasta = str_replace('/', '-', $RealHasta).':00';
		$RealHasta = date('Y-m-d H:i:s', strtotime($RealHasta . '') );
		//$Hasta = date('Y-m-d', strtotime($Hasta ) );
	}
	$Destinatario = $ApellidoYNombre;
	$DNIBusqueda = $Documento;
	$NumeroDePieza = $BarcodeExterno;
	
	$Columnas = array("ClienteId");
	$Consulta = "
		SELECT cfc.SispoId as 'ClienteId'
		from sispoc5_correoflash.cliente  as cfc
		where cfc.Id = '$UserId'
    ";
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	if($Resultado){
		$UserId = $ClaseMaster->ArraydResultados[0][0];
	}else{
		exit;
	}
	
	$Columnas = array("Barcode","FechaDeEstado","idEstado","idPieza","id"
	,"NombreDeEstado","UltimoEstado","FechaDeUltimoEstado","NombreDeUltimoEstado","Sucursal"
	,"Destinatario","Direccion de entrega","Cp","Localidad",'documento'
	,'recibio','Vinculo','FotoDeAcuse'
	);
	
	/*
	$Columnas2 = array('Id pieza','Barcod externo','Sucursal','Destinatario','Direccion de entrega'
                    ,'Cp','Localidad','Estado actual','Fecha del estado actual','Cantidad De Gestiones','Ingreso Logico'
                    ,'Fecha','Ingreso Fisico','Fecha');	
    */
/*	*/
	
	$Consulta = "SELECT 
            pe.BarcodeExterno as 'Barcode'
            , pe.Fecha as 'FechaDeEstado'
            , pe.idEstados as 'idEstado'
            , pe.idPieza as 'idPieza'
            , fp.id
            , eeApp.NombreApp as 'NombreDeEstado'
            , ue.idEstados as 'UltimoEstado'
            , ue.Fecha as 'FechaDeUltimoEstado'
            , ueeApp.NombreApp as 'NombreDeUltimoEstado'
            , fs.nombre as 'Sucursal'
            , RTRIM(fp.destinatario) as 'Destinatario'
            , RTRIM(fp.domicilio) as 'Direccion de entrega'
            , fp.codigo_postal as 'Cp'
            , fp.localidad as 'Localidad'
            
            , fp.documento as 'documento'
            , pe.ApellidoNombreRecibio as 'recibio'
            , vd.Nombre as 'Vinculo'
            , pe.FotoDeAcuse as 'FotoDeAcuse'
            
        FROM sispoc5_Ocasa.Piezas_Estados as pe
        inner join (
        	SELECT 
        	pe.idPieza as 'idPieza'
            FROM sispoc5_Ocasa.Piezas_Estados as pe
            inner join(
            	SELECT pe.idPieza as 'idPieza', min(pe.Fecha) as 'Fecha'
                FROM sispoc5_Ocasa.Piezas_Estados as pe
                where pe.BarcodeExterno not like ''
                group by pe.idPieza
            ) as EstadoMinimo on pe.idPieza = EstadoMinimo.idPieza and pe.Fecha = EstadoMinimo.Fecha
            WHERE 
            pe.BarcodeExterno not like ''
            and
            (
                pe.Fecha >= '$Desde'
            	AND 
                pe.Fecha <= '$Hasta'
            )
            
        	and pe.BarcodeExterno not like ''
        	group by pe.idPieza
        ) as pef on pef.idPieza = pe.idPieza
        inner join (
            select pe.idPieza as 'idPieza',pe.Fecha as 'Fecha', pe.idEstados as 'idEstados'
            from sispoc5_Ocasa.Piezas_Estados as pe
            inner join (
                select pe.idPieza as 'idPieza', max(pe.Fecha) as 'Fecha'
                from sispoc5_Ocasa.Piezas_Estados as pe
                inner join (
                    SELECT 
                    pe.idPieza as 'idPieza'
                    FROM sispoc5_Ocasa.Piezas_Estados as pe
                    inner join(
                        SELECT 
                        pe.idPieza as 'idPieza', min(pe.Fecha) as 'Fecha'
                        FROM sispoc5_Ocasa.Piezas_Estados as pe
                        where pe.BarcodeExterno not like ''
                        group by pe.idPieza
                    )as EstadoMinimo on pe.idPieza = EstadoMinimo.idPieza and EstadoMinimo.Fecha = pe.Fecha
                    WHERE 
                    pe.BarcodeExterno not like ''
                    and
                    (
                        pe.Fecha >= '$Desde'
                    	AND 
                   		pe.Fecha <= '$Hasta'
                    )
                    and pe.BarcodeExterno not like ''
                    group by pe.idPieza
                ) as pef on pef.idPieza = pe.idPieza
                group by pe.idPieza
            )as pef on pef.idPieza = pe.idPieza and pef.Fecha = pe.Fecha
        ) as ue on ue.idPieza = pe.idPieza
        inner join sispoc5_gestionpostal.flash_piezas as fp on fp.id = pe.idPieza
        inner join sispoc5_gestionpostal.flash_comprobantes_ingresos as fci on fci.id = fp.comprobante_ingreso_id
        inner join sispoc5_gestionpostal.flash_comprobantes_ingresos_servicios as fcis on fcis.id = fp.servicio_id
        inner join sispoc5_Ocasa.EstadoEntregaApp as eeApp on eeApp.id = pe.idEstados
        inner join sispoc5_Ocasa.EstadoEntregaApp as ueeApp on ueeApp.id = ue.idEstados
        left join sispoc5_gestionpostal.flash_sucursales as fs on fs.id = fp.sucursal_id
        left join sispoc5_Ocasa.VinculoDestinatario as vd on pe.idVinculo = vd.id
        WHERE 1
        and pe.BarcodeExterno not like ''
        and fci.cliente_id = '$UserId'
        and (fp.documento = '$DNIBusqueda' or '' = '$DNIBusqueda')
        and (fp.destinatario LIKE '%$Destinatario%' or '' = '$Destinatario')
        and (pe.BarcodeExterno = '$NumeroDePieza' or '' = '$NumeroDePieza')
        order by pe.BarcodeExterno ,fp.id, pe.Fecha ASC
        #limit 10000
        ";
	$Resultado = $ClaseMaster->SQL_Master($Consulta,$Columnas,$time,true);
	
	$respuesta = $ClaseMaster->ArraydResultados;
	$registros = count($respuesta);
	
	$respuesta = EstadosEnFilas($respuesta);
	
	$Columnas = array('Id pieza','Barcod externo','Sucursal','Destinatario','Direccion de entrega'
                    ,'Cp','Localidad','Estado actual','Fecha del estado actual','Cantidad De Gestiones'
                    ,'Ingreso Logico','Fecha','Ingreso Fisico','Fecha','Enviado a (1)'
                    ,'Fecha','Recibido en (1)','Fecha','Enviado a (2)','Fecha'
                    ,'Recibido en (2)','Fecha','Fecha 1ra Dist.','Resultado','Fecha'
                    ,'Fecha 2da Dist.','Resultado','Fecha','Fecha 3ra Dist.','Resultado'
                    ,'Fecha','Ultima Novedad','Fecha','Documento','Recibio','Vinculo','FotoDeAcuse');
	$ClaseMaster->ArraydResultados = $respuesta;
	
	if($Resultado){
		for($cont=0;$cont< count($Columnas) ;$cont++){
			if($cont>0){
			    echo("(|)");
			}
			echo($Columnas[$cont]);
		}
		echo("(;)"); 
		/*
		*/
		for($cont=0; $cont< count($ClaseMaster->ArraydResultados); $cont++){
		    if($cont>0){
		        echo("(;)");
		    }
		    for($cont2=0; $cont2 < count($Columnas);$cont2++){
		        if($cont2==0){
		            if($ClaseMaster->ArraydResultados[$cont][$cont2]==null and $ClaseMaster->ArraydResultados[$cont][$cont2]!='0'){
						echo("");
					}
					else{
					    echo($ClaseMaster->ArraydResultados[$cont][$cont2]);
					}
		        }
		        else{
		            if($ClaseMaster->ArraydResultados[$cont][$cont2]==null and $ClaseMaster->ArraydResultados[$cont][$cont2]!='0'){
						echo("(|)"."");
					}
					else{
					    echo("(|)".StrToHTML($ClaseMaster->ArraydResultados[$cont][$cont2]));
					}
		        }
		    }
		}
	}else{
		//print_r($Consulta);
	}
	

	
//	$mivariable = 1;
//	Echo("Dato(;)");
//	echo($ClaseMaster);
    
    
?>













