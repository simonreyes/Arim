<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'root'); 
define('PASS_DB', ''); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  


if($_POST){ 
$busqueda = trim($_POST['buscar']);  
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados';
$foliov = "";
}
else { 

//Consulta trae datos desde vale
conectar(); mysql_set_charset('utf8'); 
$sqlval = "SELECT * FROM vale WHERE rangovale1  =  '" .$busqueda. "'";  
$resultadov = mysql_query($sqlval) or die (mysql_error());
//echo $resultadoa + "resultad";
$nombrev = "";
$rfecha1 = "";
$rfecha2 = "";
$girov = "";
$rutv = "";
$direccionv = "";
$rangovale1 = "";
$rangovale2 = "";
$cantidadv = "";
$detallev = "";
$transportev="";
$choferv = "";
$patentev = "";
$cotizacionv = "";          
while($filav = mysql_fetch_assoc($resultadov))
{
$nombrev = $filav['nombre'];
$rfecha12 = $filav['rfecha1'];
$phpdate = strtotime( $rfecha12 );
$rfecha1 = date( 'Y-m-d', $phpdate );
$rfecha23 = $filav['rfecha2'];
$phpdate = strtotime( $rfecha23 );
$rfecha2 = date( 'Y-m-d', $phpdate );
$girov = $filav['giro'];
$rutv = $filav['rut'];
$direccionv = $filav['direccion'];
$rangovale1 = $filav['rangovale1'];
$rangovale2 = $filav['rangovale2'];
$cantidadv = $filav['cantidad'];
$detallev = $filav['detalle'];
$transportev = $filav['transporte'];
$patentev = $filav['patente'];
$choferv = $filav['chofer'];
$cotizacionv = $filav['cotizacion'];
}  

// Select valida transportista
conectar(); mysql_set_charset('utf8'); 
$sqlt = "SELECT nombre FROM transporte WHERE idnombre = '" .$transportev. "'";  
$idtrans = mysql_query($sqlt, $conexion);
$transportef = "";
while($filaa = mysql_fetch_assoc($idtrans))
{
$transportef .= $filaa['nombre'];
}

// Select Trae Datos de idvale
conectar(); mysql_set_charset('utf8'); 
$sqlv = "SELECT MAX(idvale) as maximo FROM vale";  
$idval = mysql_query($sqlv, $conexion);
$resultadov = mysql_fetch_assoc($idval);
$idvale = $resultadov["maximo"]+ "1"; 
// Insertamos cero a la izquierda...
$valeCeros = str_pad($idvale, 3, "0", STR_PAD_LEFT);

// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cotizacion WHERE folio = '" .$busqueda. "'";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
        $idguia = "";
		$proveedor = "";
		$km = "";
		$cubo = "";
		$tarifa = "";
		$valorarido = "";
		$ganancia = "";
		$idaridos = "";
		$valor = "";
		$peaje = "";
		$venta = "";
		$status = "";		
		$folio = "";
		$idcliente = "";
		$comision = "";
		$ventafinal = "";
		$Formapago = "";
		$cantidad = "";
		$IdObra = "";
		$sucursal = "";

	    $idguia = $fila['id_user'];
		$proveedor = $fila['Proveedor'];
		$km = $fila['Km'];
		$cubo = $fila['Cubo'];
		$tarifa = $fila['Tarifa'];
		$valorarido = $fila['ValorArido'];
		$ganancia = $fila['Ganancia'];
		$idaridos = $fila['idAridos'];
		$valor = $fila['Valor'];
		$peaje = $fila['Peaje'];
		$venta = $fila['Venta'];
		$status .= $fila['Status'];		
		$folio = $fila['Folio'];
		$idcliente = $fila['idCliente'];
		$comision = $fila['Comision'];
		$ventafinal = $fila['VentaFinal'];
		$Formapago .= $fila['FormaPago'];
		$cantidad = '0';
		$IdObra = $fila['idobra'];
		$sucursal = $fila['sucursal'];
		
		
	mysql_query("insert into Guia_temp( id_user, Proveedor, Km, Cubo, Tarifa, ValorArido, Ganancia, idAridos, Valor, Peaje, Venta, Status, Folio, 
	                               Fecha, IdCliente, Comision, VentaFinal, FormaPago, Cantidad, idobra, sucursal)
						VALUES('".$idguia."', '".$proveedor."', '".$km."', '".$cubo."', '".$tarifa."', '".$valorarido."', '".$ganancia."', '".$idaridos."',
								'".$valor."', '".$peaje."', '".$venta."', 'Creada', '".$folio."', '0', '".$idcliente."', '".$comision."', '".$ventafinal."',
								'".$Formapago."', '".$cantidad."', '".$IdObra."', '".$sucursal."')") 
	/*or die (mysql_error() . "insert into Guia_temp( id_user, Proveedor, Km, Cubo, Tarifa, ValorArido, Ganancia, idAridos, Valor, Peaje, Venta, Status, Folio, 
	                               Fecha, IdCliente, Comision, VentaFinal, FormaPago, Cantidad, idobra, sucursal)
						VALUES('".$idguia."', '".$proveedor."', '".$km."', '".$cubo."', '".$tarifa."', '".$valorarido."', '".$ganancia."', '".$idaridos."',
								'".$valor."', '".$peaje."', '".$venta."', 'Creada', '".$folio."', '0', '".$idcliente."', '".$comision."', '".$ventafinal."',
								'".$Formapago."', '".$cantidad."', '".$IdObra."', '".$sucursal."')")*/; 
								}  

conectar(); mysql_set_charset('utf8'); 
$sqla = "SELECT * FROM clienteobras WHERE idobra  =  '" .$IdObra. "'";  
$resultadoa = mysql_query($sqla) or die (mysql_error());
//echo $resultadoa + "resultad";
$Cnombreobra = "";
$Ccontacto = "";
$Cfono = "";
$Cemail = ""; 
while($filaa = mysql_fetch_assoc($resultadoa))
{
$Cnombreobra .= $filaa['nombreobra'];
$Ccontacto .= $filaa['contacto'];
$Cfono .= $filaa['fono'];
$Cemail .= $filaa['email'];
}

// Select Trae Datos Cliente

conectar(); mysql_set_charset('utf8'); 
$sql2 = "SELECT * FROM cliente WHERE idCliente = '" .$idcliente. "'";  
$resultado2 = mysql_query($sql2); 
while($fila2 = mysql_fetch_assoc($resultado2))
{  
$Nom_Cli .= $fila2['Nombre_Cliente'];
$DireccionClie .= $fila2['Direccion'];
$RutClie .= $fila2['Rut'];  
$Giro .= $fila2['Giro']; 
$ContactoClie .= $fila2['Contacto']; 
$CorreoClie .= $fila2['Correo'];
$FonoClie .= $fila2['Fono'];
}  

conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM folios WHERE letra  =  'GD00'";  
$resultado = mysql_query($sql); 
while($fila2 = mysql_fetch_assoc($resultado))
{  
$FolioGuia .= "GD00" . $fila2['numero'];
}
$Disponoble = "Guía :" . "  " . $status ;
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 
       $Disponoble = "Guía No Disponible";
	   } 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Elimina Vale</title>
		<style type="text/css">			
			* {
				margin:0px;
				padding:0px;
			}			
			#header {
				margin:auto;
				width:900px;
				font-family:Arial, Helvetica, sans-serif;
			}			
			ul, ol {
				list-style:none;
			}
		    .nav > li {
				float:left;
			}
			.nav li a {
				background-color:#999;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			.nav li a:hover {
				background-color:#404CF2;
			}
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			.nav li:hover > ul {
				display:block;
			}
			.nav li ul li {
				position:relative;
			}
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);
});

function cargar_paises()
{
	$.get("scriptsGD/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("scriptsGD/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}

function dependencia_ciudad()
{
	var code = $("#pais").val();
	$.get("scriptsGD/dependencia-ciudades.php?", { code: code }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#ciudad").attr("disabled",false);
			document.getElementById("ciudad").options.length=1;
			$('#ciudad').append(resultado);			
		}
	});		
}
</script>
<style type="text/css">
dt{font-size:200%;}
dd{font-size:150%;}
</style>

	</head>
<body>
<div id="header">
	<ul class="nav">
	</ul>			
<div id ="block"></div>
   <div class="container">
    <br>
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Eliminar Vale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
	    <div id="popupbox"></div>
        <div id="content"></div>
    </div>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- incluyo la libreria jQuery -->
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js"></script>
    <!-- incluyo el framework css , blueprint. -->
    <link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
		
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
		<tr>
			<td>Ingrese Rango de Vale : <input id="buscar" name="buscar" type="search">
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>			
		</tr>
	</tbody>	
 </table>
</form>	
 <br/>
<form action="Deletevale.php" method="post" target="_blank" > 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
	    	<input name="rangoeliminar" type="hidden"  value="<?php echo $busqueda; ?>"/>
			<td align="right"><font color="red">Cotización N°:</font>
			</td> 
			<td> 
			<input readonly="readonly" name="busqueda" type="text"  value="<?php echo $cotizacionv; ?>"/>	
        	</td>
        	<td>Rango Fecha :</td>
        	<td><input readonly="readonly" name="rfecha1" id="rfecha1" type="text"  value="<?php echo $rfecha1; ?>"/></td>
			<td><input readonly="readonly" name="rfecha2" id="rfecha2" type="text"  value="<?php echo $rfecha2; ?>"/></td>
		</tr>
		<tr>
			<td>Nombre Cliente :</td>
			<td><input readonly="readonly" name="nombre" id="NombreCli" type="text"  value="<?php echo $nombrev; ?>"/></td>
			<td>&nbsp;</td>
			<td>Giro :</td>
			<td><input readonly="readonly" name="giro" type="text" size="30" value="<?php echo $girov; ?>"/></td>
		</tr>
		<tr>
			<td>Rut :</td>
			<td><input readonly="readonly" name="rut" type="text"  value="<?php echo $rutv; ?>"/></td>
			<td>&nbsp;</td>
			<td>Dirección :</td>
			<td><input readonly="readonly" name="direccion" type="text" size="30" value="<?php echo $direccionv; ?>"/></td>
		</tr>
		<tr>
			<td>Rango Vale :</td>
			<td><input  readonly="readonly" name="rangov1" type="text"  value="<?php echo $rangovale1; ?>"/></td>
			<td>&nbsp;</td>
			<td>Rango Vale :</td>
			<td><input  readonly="readonly" name="rangovale2" type="text"  value="<?php echo $rangovale2; ?>"/></td>			
		</tr>
		<tr>
			<td>Cantidad :</td>
			<td><input  readonly="readonly" name="cantidadv" type="text"  value="<?php echo $cantidadv; ?>"/></td>
			<td>&nbsp;</td>
			<td>Detalle :</td>
			<td><input  readonly="readonly" name="detalle" type="text"  value="<?php echo $detallev; ?>"/></td>			
		</tr>		
    </tbody>
  </table>
  <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
			<td>Transporte</td> 
			<td></td>
		    <td>Patente</td>
			<td></td>
			<td>Chofer</td>	
			<td></td>					
		</tr>
		<tr>
			<td><input  name="transporte" type="text"  value="<?php echo $transportef; ?>"/></td>
			<td>&nbsp;</td>
			<td><input  name="patente" type="text"  value="<?php echo $patentev; ?>"/></td>
			<td>&nbsp;</td>
			<td><input  name="chofer" type="text"  value="<?php echo $choferv; ?>"/></td>
		</tr>
	</tbody>
	  </table>
	 <br/> 
	</table>   
 	<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:950px;" >
 	<tr>
   	 <td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;</td>	
   		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
		<td><input type="submit" name="Guardarv" value=" Eliminar Vale "></td>
		<td><input type="submit" name="Cancelar" value=" Cancelar " onClick="location.href='vistaGral.php'"></td>	
		<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
   		<tr>
   	</table>
 	 <br/>
</form>  
</div>
</body>
</html>   