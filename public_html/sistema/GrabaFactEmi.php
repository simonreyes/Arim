<?php
{

$nomemp = trim($_POST['nomemp']);
	$factura = $_POST['factura'];
    $fechafact = $_POST['fechafact'];
    $monto = $_POST['monto'];
	$fechapago = $_POST['fechapago'];
	$estado = $_POST['estado'];
    $banco = $_POST['banco'];
	$numcheque = $_POST['numcheque'];
    $tipopago = $_POST['tipopago'];
	$obs = trim($_POST['obs']);
	



define('HOST_DB', 'localhost'); 
define('USER_DB', 'aridosem_tems'); 
define('PASS_DB', 'aritrans2020'); 
define('NAME_DB', 'aridosem_bd'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

	conectar(); mysql_set_charset('utf8'); 
	$sql = "SELECT * FROM factura_emitidas WHERE nomemp = '" .$nomemp. "' and numfact  =  '" .$factura. "'";  
	$resultado = mysql_query($sql); 
	$Cont = 0;
	if (mysql_num_rows($resultado) > 0){	
	    $Cont = 1;  
	    $registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
		while($fila = mysql_fetch_assoc($resultado))
		{  
			$nombre_emp .= $fila['nomemp'];
			$num_fact .= $fila['numfact'];
			$fecha_fact .= $fila['fechafact'];
			$monto_total .= $fila['montofact'];
			$fecha_pago .= $fila['fechapago'];
			$estado_fact .= $fila['estado'];
			$nombre_banco .= $fila['banco'];
			$num_cheque .= $fila['numerocheque'];
			$tipo_pago .= $fila['tipopago'];
			$observacion .= $fila['obs'];
		}  
	  }	
	  
	  
   if ($Cont == 0){ 


	$host = "localhost";
    $user = "aridosem_tems";
    $pass = "aritrans2020";
    $bd = "aridosem_bd";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
    
	
	mysql_query("insert into factura_emitidas(NOMEMP, NUMFACT, FECHAFACT, MONTOFACT, FECHAPAGO, ESTADO, BANCO, NUMEROCHEQUE, TIPOPAGO, OBS)
	VALUES ( '$nomemp', '$factura', '$fechafact', '$monto', '$fechapago','$estado', '$banco', '$numcheque', '$tipopago', '$obs')", $conexion);

	
	foreach($_POST['multiple'] as $valor)
		{
		$NumGuia = trim($valor);
	
		
		$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
     	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	    $incLCM = 'UPDATE Guia SET  factura = "'.$factura.'" WHERE Num_Guia = "'.$NumGuia.'" ';
	    $resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
		

		}
	
	}
	

	 if ($Cont == 1){ 
	
	foreach($_POST['multiple'] as $valor)
		{
		$NumGuia = trim($valor);
	
		
		$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
     	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	    $incLCM = 'UPDATE Guia SET  factura = "'.$factura.'" WHERE Num_Guia = "'.$NumGuia.'" ';
	    $resultincLCM = mysql_query($incLCM) or die('Consulta fallida: ' . mysql_error());
		

		}
	
	}
	
	header ("Location: VistaGral.php");				
	 
	 }
?>	