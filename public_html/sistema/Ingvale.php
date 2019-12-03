<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'nikovald'); 
define('PASS_DB', 'arimoreno2016'); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$DireccionClie = "";
$RutClie = "";
$Giro= ""; 
$Obra = "";
$ContactoClie = "";
$CorreoClie= "";
$FonoClie = "";
$FolioGuia = "";
$Destino = "";
$Nom_Cli = "";
$Formapago = "";
$Transporte = "";
$Patente = "";
$Chofer = "";
$Fonochofer = "";
$Disponoble = "";
$ciudadvale = "";

$NombreCli = "";
$Cubo = "";  
$Tarifa = ""; 
$Arido = ""; 
$Valor = ""; 
$Venta = "";
$fonocontacto="";

if($_POST){ 
$busqueda = trim($_POST['buscar']);  
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados';
$foliov = "";
}
else { 

// Select Trae Datos de idvale
conectar(); mysql_set_charset('utf8'); 
$sqlv = "SELECT MAX(idvale) as maximo FROM vale";  
$idval = mysql_query($sqlv, $conexion);
$resultadov = mysql_fetch_assoc($idval);
$idvale = $resultadov["maximo"]+ "1"; 
// Validar vale si resultado menor que...
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
		<title>Crear Vale</title>
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
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="resources/Bootstrap-3.4.1/css/bootstrap.min.css">
		<!-- Bootstrap Datepicker CSS -->
		<link rel="stylesheet" href="resources/Datepicker/css/bootstrap-datepicker.min.css">
		<!-- JQuery 3.4.1 -->
		<!--<script type="text/javascript" src="resources/js/jquery-3.4.1.min.js"></script>-->
		<!-- Bootstrap JS -->
		<script type="text/javascript" src="resources/Bootstrap-3.4.1/js/bootstrap.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script type="text/javascript" src="resources/Datepicker/bootstrap-datepicker.min.js" defer></script>
		<script type="text/javascript" src="resources/Datepicker/bootstrap-datepicker.es.min.js" defer charset="UTF-8"></script>

<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").change(function(){dependencia_ciudad();});
	$("#estado").attr("disabled",true);
	$("#ciudad").attr("disabled",true);

		$("#FechaInicial").datepicker({
			format: "dd-mm-yyyy",
			weekStart: 1,
			language: "es"
		});
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
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Crear Vale&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
 <br/>
<form action="Grabavale.php" method="post" target="_blank" > 
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
			<td>
			<select id="pais" name="transporte" required>
				<option value="">Seleccione Transporte...</option>
			</select></td> 
			<td></td>
		    <td> 
			<select id="estado" name="patente" required>
				<option value="">Seleccione Patente...</option>
			</select></td>
			<td></td>
			<td>  
			<select id="ciudad" name="chofer" required>
				<option value="">Seleccione Chofer...</option>
			</select></td>	
			<td></td>
		</tr>
	</tbody>
  </table>
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
		<tr>
			<td>Folio :</td>
			<td><input name="folio" type="text"  value="" required /></td>
			<td>&nbsp;</td>
			<td>Fecha :</td>
			<td><input name="fecha" id="FechaInicial" type="text" value="<?php echo date("d/m/Y") ?>"/></td>
		</tr>
		<tr>
			<td>Cantidad :</td>
			<td><input  name="cantidadv" type="text"  value="" required/></td>
			<td>&nbsp;</td>
			<td>Detalle :</td>
			<td><input  name="detalle" type="text"  value="" required/></td>			
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
		<td><input type="submit" name="Guardarv" value=" Guardar "></td>
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