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
$sql = "SELECT * FROM cliente ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$Nom_Cliente .= $fila['Nombre_Cliente'];
}  
    
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Informe Moreno Fecha Desde - Hasta</title>
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
        <h3 class="title">Informe Moreno Fecha Desde - Hasta</h3>
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
			<td>Fecha Desde : </td>
			<td><input placeholder="20160501" id="buscar1" name="buscar1" type="search"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Fecha Hasta </td>
			<td><input placeholder="20160501" id="buscar2" name="buscar2" type="search"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
		</tr>
	</tbody>	
 </table>
</form>	
<form method="post"> 
<div id="dvData">   
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData" >
	<tbody>
		<tr>
			<td><font color="red">Fecha Inicial: 
			<?php 
				if($_POST){ 
				?> 
				<?php echo $busqueda1; ?>
			<?php 
				}
			?> 
			<font></td>	
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><font color="red">Fecha Final: 
			<?php 
				if($_POST){ 
				?> 
				<?php echo $busqueda2; ?>
			<?php 
				}
			?> 
			<font></td>				
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>	
		</tbody>	
   </table>
 <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData" >
	<tbody>		
		<tr>
			<td><P ALIGN=center><u><b>Fecha</b></u></P></td>
			<td><P ALIGN=center><u><b>EIRL</b></u></P></td>
			<td><P ALIGN=center><u><b>Guía Manual</b></u></P></td>
			<td><P ALIGN=center><u><b>Guía Prov</b></u></P></td>
			<td><P ALIGN=center><u><b>Proveedor</b></u></P></td>
			<td><P ALIGN=center><u><b>Cliente</b></u></P></td>
			<td><P ALIGN=center><u><b>Destino</b></u></P></td>
			<td><P ALIGN=center><u><b>Producto</b></u></P></td>	
			<td><P ALIGN=center><u><b>MT3</b></u></P></td>
			<td><P ALIGN=center><u><b>Transporte</b></u></P></td>
			<td><P ALIGN=center><u><b>Patente</b></u></P></td>			
			<td><P ALIGN=center><u><b>Chofer</b></u></P></td>
			<td><P ALIGN=center><u><b>Tarifa</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor</b></u></P></td>
			<td><P ALIGN=center><u><b>Arido</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor</b></u></P></td>
			<td><P ALIGN=center><u><b>Comisión</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor</b></u></P></td>
			<td><P ALIGN=center><u><b>Venta Final</b></u></P></td>
			<td><P ALIGN=center><u><b>Valor</b></u></P></td>
			<td><P ALIGN=center><u><b>Total</b></u></P></td>
			<td><P ALIGN=center><u><b>Porcentaje</b></u></P></td>
				
		</tr>			
		<?php 
		if($_POST){ 
		
		$busqueda1 = $_POST['buscar1'];  
		$busqueda2 = $_POST['buscar2']; 
		  
		$num_fact = "";  
		$FechaCreacion = ""; 
		$num_guia = ""; 
		$Proveedor = "Pendiente";
		$destino = ""; 
		$detalle = "";
		$cantidad = "";
		$transporte = "";
		$patente = "";
		$chofer = "";

		conectar(); mysql_set_charset('utf8'); 
		$sql = "SELECT * FROM Guia WHERE Fecha_Guia  >=  '" .$busqueda1. "' and Fecha_Guia  <=  '" .$busqueda2. "'  and Status <> 'Anulada' order by iguia ASC";  
		$resultado = mysql_query($sql); 		
		while($fila = mysql_fetch_assoc($resultado))
		{  
		 
		$FechaCreacion = ""; 
		$num_guia = ""; 
		$MT3 = "";
		$transporte = "";
		$patente = "";
		$chofer = "";
		$destino = ""; 
		$Prod = "";
		$Proveedor = "";
		$cliente = "";
		$Comision = "";
		$VFinal = "";
		
		$FechaCreacion = $fila['Fecha_Guia']; 
		$num_guia = $fila['Num_Guia'];
		$guiamanual = $fila['guia_manual'];
		$guiaprov = $fila['guia_prov'];
		$Proveedor = $fila['Proveedor']; 
		$cliente = $fila['idCliente']; 
		$destino = $fila['idobra']; 
		$Prod = $fila['idAridos'];
		$MT3 = $fila['Cantidad'];
		$transporte = $fila['Transp_Guia'];
		$patente = $fila['Patente_Guia'];
		$chofer = $fila['Chofer_Guia'];		
		$Cubo = $fila['Cubo'];
		$KM = $fila['Km'];
		$VArido = $fila['ValorArido'];
		$Comision = $fila['Comision'];
		$VFinal = $fila['VentaFinal'];
		
		$sql4 = "SELECT * FROM aridos WHERE idAridos  =  '" .$Prod. "'";  
		$resultado4 = mysql_query($sql4); 		
		while($fila4 = mysql_fetch_assoc($resultado4))
		{  
		$Nom_aridos = "";
		$Nom_aridos .= $fila4['glosa'];
		}
		
		$sql5 = "SELECT * FROM proveedores WHERE IdProveedor  =  '" .$Proveedor. "'";  
		$resultado5 = mysql_query($sql5); 		
		while($fila5 = mysql_fetch_assoc($resultado5))
		{  
		$Nom_Prov = "";
		$Nom_Prov .= $fila5['Proveedor'];
		}
		
		$sql6 = "SELECT * FROM cliente WHERE idCliente  =  '" .$cliente. "'";  
		$resultado6 = mysql_query($sql6); 		
		while($fila6 = mysql_fetch_assoc($resultado6))
		{  
		$Nom_Clie = "";
		$Nom_Clie .= $fila6['Nombre_Cliente'];
		}
		 
		$sql7 = "SELECT * FROM clienteobras WHERE idobra =  '" .$destino. "'";  
		$resultado7 = mysql_query($sql7); 		
		while($fila7 = mysql_fetch_assoc($resultado7))
		{  
		$Nom_obra = "";
		$Nom_obra .= $fila7['nombreobra'];
		} 
		 
		 
		$valor_trans = 0;
		$valor_trans = $Cubo * $KM ;
			
			
			IF ($transporte == "EUGENIO ROJAS QUEZADA"){			
				$Cubo = 0;
				$Cubo = 120;
				$valor_trans = 0;
				$valor_trans = $Cubo * $KM ;				
			}
			
			IF ($cliente == 58 or $cliente == 50 and $destino == 47){
				$Cubo = 0;
				$valor_trans = 0;
				$valor_trans = 2500 ;
			}
			
			IF ($cliente == 58 or $cliente == 50 and $destino == 69){
				$Cubo = 0;
				$valor_trans = 0;
				$valor_trans = 2000 ;
			}
			
			IF ($cliente == 58 or $cliente == 50 and $Prod == 70) 
				{
					$Cubo = 0;
					$valor_trans = 0;
				}   
				
		$total_tarifa = 0;
		$total_tarifa = $valor_trans * $MT3;
		$total_Arido = 0;
		$total_Arido = $VArido * $MT3;
		$total_Comi = 0;
		$total_Comi = $Comision * $MT3;
		$total_VF = 0;
		$total_VF = $VFinal * $MT3;
		$Total = 0;
		$Total = ($total_tarifa + $total_Arido + $total_Comi);
		$Total1 = 0;
		$Total1 = $total_VF - $Total;
		$porcetaje = 0;
		$porcetaje = round(($Total1 * 100)/ $total_VF);
		$porcetaje2 = "";
		$porcetaje2 = $porcetaje ."%";
		
		?> 
		<tr>
			<td><P ALIGN=center><?php echo $FechaCreacion; ?></P></td>
			<td><P ALIGN=center><?php echo $num_guia; ?></P></td>
			<td><P ALIGN=center><?php echo $guiamanual; ?></P></td>
			<td><P ALIGN=center><?php echo $guiaprov; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_Prov; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_Clie; ?></P></td>
			<td><P ALIGN=center><?php echo $Nom_obra; ?></P></td>		
			<td><P ALIGN=center><?php echo $Nom_aridos; ?></P></td>
			<td><P ALIGN=center><?php echo $MT3; ?></P></td>
			<td><P ALIGN=center><?php echo $transporte; ?></P></td>
			<td><P ALIGN=center><?php echo $patente; ?></P></td>
			<td><P ALIGN=center><?php echo $chofer; ?></P></td>
			<td><P ALIGN=center><?php echo $valor_trans; ?></P></td>
			<td><P ALIGN=center><?php echo $total_tarifa; ?></P></td>
			<td><P ALIGN=center><?php echo $VArido; ?></P></td>
			<td><P ALIGN=center><?php echo $total_Arido; ?></P></td>
			<td><P ALIGN=center><?php echo $Comision; ?></P></td>
			<td><P ALIGN=center><?php echo $total_Comi; ?></P></td>
			<td><P ALIGN=center><?php echo $VFinal; ?></P></td>
			<td><P ALIGN=center><?php echo $total_VF; ?></P></td>
			<td><P ALIGN=center><?php echo $Total1; ?></P></td>
			<td><P ALIGN=center><?php echo $porcetaje2; ?></P></td>
			
			
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