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


$NombreCli = "";
$cantidad = "";  
$precio = ""; 
$detalle = ""; 
$total = ""; 
$fonocontacto="";

$NombreCli = "";
$num_guia = "";
$num_cot = "";
$num_oc = "";
$fono_cont = "";
$contacto = "";
$destino = "";

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
$sql = "SELECT * FROM Guia WHERE Num_Guia  =  '" .$busqueda. "' Group BY Num_Guia";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$NombreCli .= $fila['idCliente'];
$num_guia .= $fila['Num_Guia'];
$num_cot .= $fila['Folio'];
$num_oc .= $fila['OC_Guia'];
$idobra .= $fila['idobra'];
$factura .= $fila['factura'];
$guia_manual .= $fila['guia_manual'];
$guia_prov .= $fila['guia_prov'];

}  


conectar(); mysql_set_charset('utf8'); 
$sql2 = "SELECT * FROM cliente WHERE idCliente = '" .$NombreCli. "'";  
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
$sql3 = "SELECT * FROM clienteobras WHERE idobra = '" .$idobra. "'";  
$resultado3 = mysql_query($sql3); 
while($fila3 = mysql_fetch_assoc($resultado3))
{  
$nombreobra .= $fila3['nombreobra'];
$contactoobra .= $fila3['contacto'];
$fonoobra .= $fila3['fono'];  
$emailobra .= $fila3['email']; 
}  



}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Guía de Despacho</title>
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
		<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("Guía de Despacho Actualizada Correctamente");
}
</SCRIPT>
	</head>
<body>

<div id="header">
	<ul class="nav">
	</ul>	
		
<div id ="block"></div>
   <div class="container">
   <br>
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Guía de Despacho&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
			<td>Ingrese N° Guia : <input id="buscar" name="buscar" type="search">
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>
			
			
			<?php 
		if($_POST){ 
		$busqueda = trim($_POST['buscar']);  
		?> 
		<td width="30%"  align="right"><font color="red">Guía Encontrada:</font>
		<font color="red" align="left"><?php echo $num_guia; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
		<?php 		
		 }  		
		?>		
		</tr>
	</tbody>	
 </table>
</form>	
 <br/>
<form action="actualizaguia.php" method="post"> 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
			<td align="right"><font color="red">Guía Despacho:</font>
			</td> 
			<td> 
			<?php 
		if($_POST){ 
		$busqueda = trim($_POST['buscar']);  
		?> 
		<input readonly="readonly" name="busqueda" type="text"  value="<?php echo $busqueda; ?>"/>
		<?php 		
		 }  		
		?>	
        </td> 		
		</tr>
		<tr>
			<td>Nombre Cliente :</td>
			<td><input readonly="readonly" name="NombreCli" id="NombreCli" type="text"  value="<?php echo $Nom_Cli; ?>"/></td>
			<td>&nbsp;</td>
			<td>Dirección :</td>
			<td><input readonly="readonly" name="DireccionClie" type="text" size="30" value="<?php echo $DireccionClie; ?>"/></td>
		</tr>
		<tr>
			<td>Rut :</td>
			<td><input readonly="readonly" name="rut" type="text"  value="<?php echo $RutClie; ?>"/></td>
			<td>&nbsp;</td>
			<td>Giro :</td>
			<td><input readonly="readonly" name="giro" type="text" size="30" value="<?php echo $Giro; ?>"/></td>
		</tr>
		<tr>
			<td>Correo Electronico:</td>
			<td><input readonly="readonly" size="30" name="correo" type="text" value="<?php echo $CorreoClie; ?>"/></td>
			<td>&nbsp;</td>
			<td>Fono Cliente :</td>
			<td><input readonly="readonly" name="fono" type="text" value="<?php echo $FonoClie; ?>"/></td>
		</tr>
		<tr>
			<td>Destino:</td>
			<td><input size="30"  readonly="readonly" name="Destino" id="Destino" type="text" value="<?php echo $nombreobra; ?>"/></td>
			<td>&nbsp;</td>
			<td>Nombre Contacto:</td>
			<td><input size="30" readonly="readonly" name="contacto" id= "contacto" type="text" value="<?php echo $contactoobra; ?>"/></td>
		</tr>
		<tr>
			<td>Fono Contacto:</td>
			<td><input size="30"  readonly="readonly" type="text" name="fonocontacto" id= "fonocontacto" value="<?php echo $fonoobra; ?>" /> </td>
			<td>&nbsp;</td>
			<td>N° OC:</td>
			<td><input size="10"  readonly="readonly" name="ordencompra" id="ordencompra" type="text" value="<?php echo $num_oc; ?>" /></td>
		</tr>	
		<tr>
			<td>Cotización:</td>
			<td><input size="30"  readonly="readonly" type="text" name="cot" id= "cot" value="<?php echo $num_cot; ?>" /></td>
			<td>&nbsp;</td>
			<td>Factura Asociada</td>
			<td><input readonly="readonly" name="factura" id="factura" type="text" value="<?php echo $factura; ?>"/></td>
		</tr>	
		<tr>
			<td>N° Guía Manual</td>
			<td><input readonly="readonly" name="guiamanual" id="guiamanual" type="text" value="<?php echo $guia_manual; ?>"/></td>
			<td>&nbsp;</td>
			<td>N° Guía Prov.</td>
			<td><input readonly="readonly" name="guiaprov" id="guiaprov" type="text" value="<?php echo $guia_prov; ?>"/></td>
		</tr>				
    </tbody>
  </table>
 <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
			<td><P ALIGN=center><u><b>Cantidad</b></u></P></td>
			<td><P ALIGN=center><u><b>Detalle Producto</b></u></P></td>
			<td><P ALIGN=center><u><b>Precio Unitario</b></u></P></td>
			<td><P ALIGN=center><u><b>Total</b></u></P></td>		
		</tr>		
		<?php 
		if($_POST){ 
			$busqueda = trim($_POST['buscar']);  
			$cantidad = "";  
			$precio = ""; 
			$detalle = ""; 
			$total = ""; 
		
				conectar(); mysql_set_charset('utf8');
				$sqlw = "SELECT * FROM Guia WHERE Num_Guia  =  '" .$busqueda. "'";  
				$resultadow = mysql_query($sqlw); 
				while($filaw = mysql_fetch_assoc($resultadow))
					{  
						$cantidad = "";
						$detalle = "";
						$precio = "";
						$total = 0;
									
						$cantidad .= $filaw['Cantidad'];
						$detalle .= $filaw['idAridos'];
						$precio .= $filaw['VentaFinal'];						
						$total = $cantidad * $precio;
					 
					 
				conectar(); mysql_set_charset('utf8');
				$sqlww = "SELECT * FROM aridos WHERE idAridos  =  '" .$detalle. "'";  
				$resultadoww = mysql_query($sqlww); 
				while($filaww = mysql_fetch_assoc($resultadoww))
					{  
						$detalle2 = "";
						$detalle2 .= $filaww['glosa'];						
					}						
				
		?> 
		<tr>
	    <td><P ALIGN=center><input readonly="readonly" name="Cubo" type="text"  value="<?php echo $cantidad; ?>"/></P></td>
		<td><P ALIGN=center><input readonly="readonly" name="Arido" type="text"  value="<?php echo $detalle2; ?>"/></P></td>
		<td><P ALIGN=center><input readonly="readonly" name="Tarifa" type="text"  value="<?php echo $precio; ?>"/></P></td>
		<td><P ALIGN=center><input readonly="readonly" name="Valor" type="text"  value="<?php echo $total; ?>"/></P></td>
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
   	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
	<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
	<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
   <tr>
   </table>
  <br/>
</form>	
  
   
</div>
</body>
</html>
