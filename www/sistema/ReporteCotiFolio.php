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
$entero = 0;  

if (empty($busqueda))
{
$texto = 'Búsqueda sin resultados'; 
}
else { 

// Select Trae Datos Cotización

// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cliente WHERE idCliente  =  '" .$busqueda. "'";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$idcliente .= $fila['idCliente'];
$Nom_Cliente .= $fila['Nombre_Cliente'];
$Rut_Cliente .= $fila['Rut'];
}  
    
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Reporte Cotización</title>
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
		<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
		<script language="javascript">
		$(document).ready(function() {
			$(".botonExcel").click(function(event) {
				$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
				$("#FormularioExportacion").submit();
		});
		});
		</script>
	</head>
<body>

<div id="header">
	<ul class="nav">
	</ul>	
		
<div id ="block"></div>
   <div class="container">
   <br>
		<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Reporte Cotización</h3>
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
			<td>Ingrese Cliente :</td>
			<td><?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM cliente';
				$result = $conexion->query($query);
				?>
				<select name="buscar" id="buscar">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['idCliente'] ?> " >
				<?php echo $row['Nombre_Cliente']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>	
 </table>
</form>	
<form method="post"> 
  <div id="dvData">
  <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
		<?php 
		if($_POST){ 
			?> 
			<td><P ALIGN=center><font color="red">Nombre Cliente:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Nom_Cliente; ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			RUT Cliente:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $Rut_Cliente; ?></font></P></td>
			<?php 		
		 }  
		
		?>
		</tr>
		</tbody>	
   </table>   
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData">
	<tbody>
		<tr>
			
			<td><P ALIGN=center><u><b>Fecha Creacion</b></u></P></td>
			<td><P ALIGN=center><u><b>N Folio</b></u></P></td>
			<td><P ALIGN=center><u><b>Obra</b></u></P></td>
			<td><P ALIGN=center><u><b>Proveedor</b></u></P></td>
			<td><P ALIGN=center><u><b>Sucursal</b></u></P></td>
			<td><P ALIGN=center><u><b>Aridos</b></u></P></td>				
			<td><P ALIGN=center><u><b>KM</b></u></P></td>		
		</tr>			
		<?php 
		if($_POST){ 
		  
		$Num_Guia = "";  
		$FechaCreacion = ""; 
		$Num_OC = ""; 
		$Num_Cot = ""; 
		$MontoTotal = "";

		conectar(); mysql_set_charset('utf8'); 
		$sql = "SELECT * FROM cotizacion WHERE idCliente  =  '" .$idcliente. "' and  Status <> 'Anulada'";  
		$resultado = mysql_query($sql); 		
		while($fila = mysql_fetch_assoc($resultado))
		{  
	
			$Folio = "";
			$Fecha = ""; 		
			$Proveedor = "";
			$Cantidad = "";
			$Km = "";
			$Arido = "";
			$Sucursal = "";
			$NombreA = "";
			$idobra = "";
			
			$Folio .= $fila['Folio'];
			$Fecha .= $fila['Fecha']; 
			$Proveedor .= $fila['Proveedor'];
			$Cantidad .= $fila['Cantidad']; 
			$Km .= $fila['Km']; 	
			$Arido .= $fila['idAridos']; 
			$Sucursal .= $fila['sucursal']; 
			$idobra .= $fila['idobra'];

		
				$queryDATOS3 = 'SELECT * FROM aridos Where idAridos = "'.$Arido.'"';
				$resultDATOS3 = mysql_query($queryDATOS3) or die('Consulta fallida: ' . mysql_error());

				while ($row3 = mysql_fetch_array($resultDATOS3, MYSQL_ASSOC)) {
					$NombreA = "";
					$NombreA = $row3['glosa'];
					} 
		
				$queryDATOS4 = 'SELECT * FROM proveedores Where IdProveedor = "'.$Proveedor.'"';
				$resultDATOS4 = mysql_query($queryDATOS4) or die('Consulta fallida: ' . mysql_error());

				while ($row4 = mysql_fetch_array($resultDATOS4, MYSQL_ASSOC)) {
					$NombreP = "";
					$NombreP = $row4['Proveedor'];
				} 
		
				$sqlddd= "SELECT * FROM clienteobras WHERE idobra  =  '".$idobra."'";  
				$resultadoddd = mysql_query($sqlddd); 		
				while($filaddd = mysql_fetch_assoc($resultadoddd))
				{  
					$Nom_Destino = "";
					$Nom_Destino = $filaddd['nombreobra'];
				}
		?> 
		<tr>
		<td><P ALIGN=center><?php echo $Fecha; ?></P></td>
	    <td><P ALIGN=center><?php echo $Folio; ?></P></td>
		<td><P ALIGN=center><?php echo $Nom_Destino; ?></P></td>
		<td><P ALIGN=center><?php echo $NombreP; ?></P></td>
		<td><P ALIGN=center><?php echo $Sucursal; ?></P></td>
		<td><P ALIGN=center><?php echo $NombreA; ?></P></td>
		<td><P ALIGN=center><?php echo $Km; ?></P></td>
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
  
   
</div>
</body>
</html>