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

$Nom_Cliente = "";
$RutClie = "";
$idcliente= ""; 

$NombreCli = "";


if($_POST){ 

$busqueda = trim($_POST['buscar']); 
$busqueda2 = trim($_POST['buscar2']);  
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados'; 
}
else { 

// Select Trae Datos Cotización

// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cliente WHERE rut  =  '" .$busqueda. "'";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$idcliente .= $fila['idCliente'];
$Nom_Cliente .= $fila['Nombre_Cliente'];
}  
    
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Reporte Vale</title>
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
		<script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
		<script language="javascript">   </script>
	</head>
<body>

<div id="header">
	<ul class="nav">
	</ul>	
		
<div id ="block"></div>
   <div class="container">
   <p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Reporte Vales</h3>
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
			<td>Fecha Desde  :<input id="buscar" name="buscar" type="search">
			<td>Fecha Hasta  : <input id="buscar2" name="buscar2" type="search">			
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>
		</tr>
	</tbody>	
 </table>
</form>	
<form method="post"> 
  <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
		<?php 
		if($_POST)
		{ 
			?> 
			<td><P ALIGN=center><font color="red">Fecha Desde:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $busqueda; ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Fecha Hasta:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $busqueda2; ?></font></P></td>
			<?php 		
		 }  		
		?>
		</tr>
		</tbody>	
   </table>   
    <div id="dvData">
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData">
	<tbody>
		<tr>
			<td><P ALIGN=center><u><b>IdVale</b></u></P></td>
			<td><P ALIGN=center><u><b>Nombre</b></u></P></td>
			<td><P ALIGN=center><u><b>Rango Desde</b></u></P></td>
			<td><P ALIGN=center><u><b>Rango Hasta</b></u></P></td>
			<td><P ALIGN=center><u><b>Giro</b></u></P></td>
			<td><P ALIGN=center><u><b>Rut</b></u></P></td>
			<td><P ALIGN=center><u><b>Dirección</b></u></P></td>
			<td><P ALIGN=center><u><b>Folio Desde</b></u></P></td>
			<td><P ALIGN=center><u><b>Folio Hasta</b></u></P></td>
			<td><P ALIGN=center><u><b>Cantidad</b></u></P></td>
			<td><P ALIGN=center><u><b>Detalle</b></u></P></td>	
			<td><P ALIGN=center><u><b>Transporte</b></u></P></td>
			<td><P ALIGN=center><u><b>Patente</b></u></P></td>
			<td><P ALIGN=center><u><b>Chofer</b></u></P></td>
			<td><P ALIGN=center><u><b>N° Cotizacion</b></u></P></td>
		</tr>			
		<?php 
		if($_POST){ 
		  
		conectar(); mysql_set_charset('utf8'); 
		$sqlp = "SELECT * FROM vale order by idvale ASC ";  
		$resultadop = mysql_query($sqlp); 		
		while($filap = mysql_fetch_assoc($resultadop))
		{  
	
		$Idvale = ""; 
		$nombre = "";
		$rfecha1 = "";  
		$rfecha2 = "";  
		$giro = "";
		$rut = ""; 
		$direccion = "";
		$rangovale1 = "";
		$rangovale2 = "";
		$cantidad = "";
		$detalle = "";
		$transporte = "";
		$Patente = "";  
		$Chofer = ""; 
		$cotizacion = ""; 
			
		$idvale = $filap["idvale"]; 
		$nombre = $filap["nombre"]; 
		$rfecha12 = $filap['rfecha1'];
		$phpdate = strtotime( $rfecha12 );
		$rfecha1 = date( 'Y-m-d', $phpdate );
		$rfecha23 = $filap['rfecha2'];
		$phpdate = strtotime( $rfecha23 );
		$rfecha2 = date( 'Y-m-d', $phpdate );   
		$giro = $filap["giro"]; 
		$rut = $filap["rut"];  
		$direccion = $filap["direccion"]; 
		$rangovale1 = $filap["rangovale1"]; 
		$rangovale2 = $filap["rangovale2"]; 
		$cantidad = $filap["cantidad"]; 
		$detalle = $filap["detalle"]; 
		$transporte = $filap["transporte"]; 
		$patente = $filap["patente"];   
		$chofer = $filap["chofer"];  
		$cotizacion = $filap["cotizacion"]; 
		
		// Select valida transportista
		conectar(); mysql_set_charset('utf8'); 
		$sqlt = "SELECT nombre FROM transporte WHERE idnombre = '" .$transporte. "'";  
		$idtrans = mysql_query($sqlt, $conexion);
		$transportef = "";
		while($filaa = mysql_fetch_assoc($idtrans))
		{
		$transportef .= $filaa['nombre'];
		}					
		?> 
					
		<tr>
			<td><P ALIGN=center><?php echo $idvale; ?></P></td>
			<td><P ALIGN=center><?php echo $nombre; ?></P></td>
			<td><P ALIGN=center><?php echo $rfecha1; ?></P></td>
			<td><P ALIGN=center><?php echo $rfecha2; ?></P></td>
			<td><P ALIGN=center><?php echo $giro; ?></P></td>
			<td><P ALIGN=center><?php echo $rut; ?></P></td>
			<td><P ALIGN=center><?php echo $direccion; ?></P></td>
			<td><P ALIGN=center><?php echo $rangovale1; ?></P></td>
			<td><P ALIGN=center><?php echo $rangovale2; ?></P></td>
			<td><P ALIGN=center><?php echo $cantidad; ?>&nbsp MT3</P></td>
			<td><P ALIGN=center><?php echo $detalle; ?></P></td>	
			<td><P ALIGN=center><?php echo $transportef; ?></P></td>
			<td><P ALIGN=center><?php echo $patente; ?></P></td>				
			<td><P ALIGN=center><?php echo $chofer; ?></P></td>	
			<td><P ALIGN=center><?php echo $cotizacion; ?></P></td>	
		</tr>
		<?php	
		}
		}
		?>		
	</tbody>	
   </table>
 <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:950px;" >
	<tr>
		<td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;</td>	
		<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btnExport" value=" Export Excel " />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
		
				<script>
			$("#btnExport").click(function(e) {
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
			e.preventDefault();
			});
		</script>
   </tr>
   </table>
  <br/>
  
  
</form>	   
</div>
</body>
</html>