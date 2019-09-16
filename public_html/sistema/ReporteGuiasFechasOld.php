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
		<title>Reporte Guía por Fechas</title>
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
        <h3 class="title">Reporte Guía de Despacho Fecha Desde - Hasta</h3>
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
			<td><P ALIGN=center><u><b>Fecha Creación</b></u></P></td>
			<td><P ALIGN=center><u><b>EIRL</b></u></P></td>
			<td><P ALIGN=center><u><b>N° G Manual</b></u></P></td>
			<td><P ALIGN=center><u><b>N° G Prov</b></u></P></td>
			<td><P ALIGN=center><u><b>Proveedor</b></u></P></td>
			<td><P ALIGN=center><u><b>Sucursal</b></u></P></td>
			<td><P ALIGN=center><u><b>Cliente</b></u></P></td>
			<td><P ALIGN=center><u><b>Destino</b></u></P></td>
			<td><P ALIGN=center><u><b>Producto</b></u></P></td>
			<td><P ALIGN=center><u><b>MT3</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor MT3</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor Total</b></u></P></td>
			<td><P ALIGN=center><u><b>Transporte</b></u></P></td>
			<td><P ALIGN=center><u><b>Patente</b></u></P></td>
			<td><P ALIGN=center><u><b>Chofer</b></u></P></td>	
		</tr>			
		<?php 
		if($_POST){ 
		  
		$Fecha_C = ""; 
		$EIRL = "";
		$Prov = "";  
		$Suc = "";  
		$Cliente = "";  
		$Destino = "";  
		$Prod = ""; 
		$MT3 = "";  
		$Valor_MT3 = ""; 
		$Valor_Total = "";
		$Transp = "";
		$Patente = "";  
		$Chofer = "";  
		
		conectar(); mysql_set_charset('utf8'); 
		$sqlp = "SELECT * FROM Guia WHERE Fecha_Guia  >=  '" .$busqueda. "' and Fecha_Guia  <=  '" .$busqueda2. "'  and Status <> 'Anulada' order by iguia ASC ";  
		$resultadop = mysql_query($sqlp); 		
		while($filap = mysql_fetch_assoc($resultadop))
		{  
		$Fecha_C = ""; 
		$EIRL = "";
		$Prov = "";  
		$Suc = "";  
		$Cliente = "";  
		$Destino = "";  
		$Prod = ""; 
		$MT3 = "";  
		$Valor_MT3 = ""; 
		$Valor_Total = "";
		$Transp = "";
		$Patente = "";  
		$Chofer = "";  
		
		
		$Fecha_C = $filap['Fecha_Guia']; 
		$EIRL = $filap['Num_Guia'];
		$guiamanual = $filap['guia_manual'];
		$guiaprov = $filap['guia_prov'];
		$Prov = $filap['Proveedor'];
		$Suc = $filap['sucursal'];
		$Cliente = $filap['idCliente'];
		$Destino = $filap['idobra'];
		$Prod = $filap['idAridos'];
		$MT3 = $filap['Cantidad'];
		$Valor_MT3 = $filap['VentaFinal'];
		$Transp = $filap['Transp_Guia'];
		$Patente = $filap['Patente_Guia'];
		$Chofer = $filap['Chofer_Guia'];
		$guiamanual = $filap['guia_manual'];
		$guiaprov = $filap['guia_prov'];
		
			
			conectar(); mysql_set_charset('utf8'); 
			$sqld = "SELECT * FROM proveedores WHERE IdProveedor  =  '" .$Prov. "'";  
			$resultadod = mysql_query($sqld); 		
			while($filad = mysql_fetch_assoc($resultadod))
			{  
				$Nom_Prov = "";
				$Nom_Prov = $filad['Proveedor'];
			}
			
			conectar(); mysql_set_charset('utf8'); 
			$sqldd = "SELECT * FROM cliente WHERE idCliente  =  '" .$Cliente. "'";  
			$resultadodd = mysql_query($sqldd); 		
			while($filadd = mysql_fetch_assoc($resultadodd))
			{  
				$Nom_Cliente = "";
				$Nom_Cliente = $filadd['Nombre_Cliente'];
			}
		
			conectar(); mysql_set_charset('utf8'); 
			$sqlddd= "SELECT * FROM clienteobras WHERE idobra  =  '".$Destino."'";  
			$resultadoddd = mysql_query($sqlddd); 		
			while($filaddd = mysql_fetch_assoc($resultadoddd))
			{  
				$Nom_Destino = "";
				$Nom_Destino = $filaddd['nombreobra'];
			}
			
			conectar(); mysql_set_charset('utf8'); 
			$sqldddd = "SELECT * FROM aridos WHERE idAridos  =  '" .$Prod. "'";  
			$resultadodddd = mysql_query($sqldddd); 		
			while($filadddd = mysql_fetch_assoc($resultadodddd))
			{  
				$Nom_arido = "";
				$Nom_arido = $filadddd['glosa'];
			}
			
			$Valor_total = 0;
			$Valor_total = $MT3 * $Valor_MT3;
		?> 
			
		<tr>
			<td><P ALIGN=center><?php echo $Fecha_C; ?></P></td>
			<td><P ALIGN=center><?php echo $EIRL; ?></P></td>
			<td><P ALIGN=center><?php echo $guiamanual; ?></P></td>
			<td><P ALIGN=center><?php echo $guiaprov; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_Prov; ?></P></td>
			<td><P ALIGN=center><?php echo $Suc; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_Cliente; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_Destino; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_arido; ?></P></td>
			<td><P ALIGN=center><?php echo $MT3; ?></P></td>
			<td><P ALIGN=center><?php echo $Valor_MT3; ?></P></td>
			<td><P ALIGN=center><?php echo $Valor_total; ?></P></td>
			<td><P ALIGN=center><?php echo $Transp; ?></P></td>
			<td><P ALIGN=center><?php echo $Patente; ?></P></td>
			<td><P ALIGN=center><?php echo $Chofer; ?></P></td>
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