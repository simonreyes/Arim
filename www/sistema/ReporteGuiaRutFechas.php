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

$Nom_Cliente = "";
$RutClie = "";
$idcliente= ""; 

$NombreCli = "";


if($_POST){ 

$busqueda = trim($_POST['buscar']); 
$busqueda1 = trim($_POST['buscar1']);  
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
		<title>Reporte Guía por Rut y Fechas</title>
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
		<script language="javascript"></script>
	</head>
<body>

<div id="header">
	<ul class="nav">
	</ul>	
		
<div id ="block"></div>
   <div class="container">
   <p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Reporte Guía de Despacho Rut Cliente con Fecha Desde - Hasta</h3>
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
			<td>Rut Cliente  :<input id="buscar" name="buscar" type="search">
			<td>Fecha Desde  :<input id="buscar1" name="buscar1" type="search">
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
			<td><P ALIGN=center><font color="red">Rut Cliente:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $busqueda; ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Fecha Desde:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $busqueda1; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha Hasta:&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $busqueda2; ?></font></P></td>
			<?php 		
		 }  		
		?>
		</tr>
		</tbody>	
   </table> 
<div id="dvData">   
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData" >
	<tbody>
		<tr>
			<td><P ALIGN=center><u><b>N° Guia de Despacho</b></u></P></td>
			<td><P ALIGN=center><u><b>Fecha Creación</b></u></P></td>
			<td><P ALIGN=center><u><b>N° OC Cliente</b></u></P></td>
			<td><P ALIGN=center><u><b>N° Cotización</b></u></P></td>
			<td><P ALIGN=center><u><b>Monto Total Guía</b></u></P></td>		
		</tr>			
		<?php 
		if($_POST){ 
		  
		$Num_Guia = "";  
		$FechaCreacion = ""; 
		$Num_OC = ""; 
		$Num_Cot = ""; 
		$MontoTotal = "";

		conectar(); mysql_set_charset('utf8'); 
		$sql = "SELECT * FROM guiadespacho WHERE id_cliente  =  '" .$idcliente. "' and fechacreacion  >=  '" .$busqueda1. "' and fechacreacion  <=  '" .$busqueda2. "'";  
		$resultado = mysql_query($sql); 		
		while($fila = mysql_fetch_assoc($resultado))
		{  
		$Num_Guia = "";  
		$FechaCreacion = ""; 
		$Num_OC = ""; 
		$Num_Cot = ""; 
		$MontoTotal = "";
		$Num_Guia .= $fila['num_guia'];    
		$FechaCreacion .= $fila['fechacreacion']; 
		$Num_OC .= $fila['num_oc']; 
		$Num_Cot .= $fila['num_cot']; 
		$MontoTotal .= $fila['montototal']; 
		?> 
		<tr>
	    <td><P ALIGN=center><?php echo $Num_Guia; ?></P></td>
		<td><P ALIGN=center><?php echo $FechaCreacion; ?></P></td>
		<td><P ALIGN=center><?php echo $Num_OC; ?></P></td>
		<td><P ALIGN=center><?php echo $Num_Cot; ?></P></td>
		<td><P ALIGN=center><?php echo $MontoTotal; ?></P></td>
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