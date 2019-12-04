<?php 
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
}
else { 

// Select Trae Datos Cotización

// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM Guia WHERE Num_Guia = '" .$busqueda. "'";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
		$iguia = "";
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
		
		$iguia = $fila['iguia'];
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
		$status = $fila['Status'];		
		$folio = $fila['Folio'];
		$idcliente = $fila['idCliente'];
		$comision = $fila['Comision'];
		$ventafinal = $fila['VentaFinal'];
		$Formapago = $fila['FormaPago'];
		$cantidad = $fila['Cantidad'];
		$IdObra = $fila['idobra'];
		$sucursal = $fila['sucursal'];
		$FechaGuia = $fila['Fecha_Guia'];
		
		$Transporte = $fila['Transp_Guia'];
		$Patente = $fila['Patente_Guia'];
		$Chofer = $fila['Chofer_Guia'];
		
		
conectar(); mysql_set_charset('utf8'); 
$sqla = "SELECT * FROM clienteobras WHERE idobra  =  '" .$IdObra. "'";  
$resultadoa = mysql_query($sqla); 
while($filaa = mysql_fetch_assoc($resultadoa))
{ 
$Cnombreobra = "";
$Ccontacto = "";
$Cfono = "";
$Cemail = "";
 
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
$Nom_Cli = $fila2['Nombre_Cliente'];
$DireccionClie = $fila2['Direccion'];
$RutClie = $fila2['Rut'];  
$Giro = $fila2['Giro']; 
$ContactoClie = $fila2['Contacto']; 
$CorreoClie = $fila2['Correo'];
$FonoClie = $fila2['Fono'];
}  
}
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 
} 
mysql_close($conexion); } 
}
?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Editar Guía de Despacho</title>
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
	$.get("scripts5/cargar-paises.php", function(resultado){
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
	$.get("scripts5/dependencia-estado.php", { code: code },
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
	var code = $("#estado").val();
	$.get("scripts5/dependencia-ciudades.php?", { code: code }, function(resultado){
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
        <h3 class="title">Editar Guía de Despacho&nbsp;</h3>
	    <div id="popupbox"></div>
        <div id="content"></div>
    </div>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- incluyo la libreria jQuery -->
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <!-- incluyo el archivo que tiene mis funciones javascript -->
    <script type="text/javascript" src="resources/functions.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="resources/css/all.css">
    <!-- incluyo el framework css , blueprint. -->
    <link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
		
<form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"> 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
		<tr>
			<td>Ingrese N° Guía : <input id="buscar" name="buscar" type="search">
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar">
			</td>
			<td width="30%"  align="right"><font color="red">Guía Encontrada :</font>
			
			<?php 
		if($_POST){ 
		$busqueda = trim($_POST['buscar']);  
		?> 
		<font color="red" align="left"><?php echo $busqueda; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
		<td><font color="red" align="left">&nbsp;</font></td>
		<?php 		
		 }  		
		?>		
		</tr>
	</tbody>	
 </table>
</form>	
 <br/>
<form action="EditarGuiaDespacho2.php" method="post" target="_blank" > 
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
			<td align="right"><font color="red">Guía Despacho:</font></td> 
			<td> <?php if($_POST){ $busqueda = trim($_POST['buscar']);  ?> 
			<input readonly="readonly" name="busqueda" type="text"  value="<?php echo $busqueda; ?>"/></td>
			<td>&nbsp;</td>
			<td><i class="fas fa-calendar-alt"></i><label> Fecha:</label></td>
			<td><input readonly="readonly" name="FechaGuia" id="FechaGuia" type="text"
				value="<?php echo date("d/m/Y", strtotime($FechaGuia)) ?>"></td> 		
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
			<td>Obra:</td>
			<td><input readonly="readonly" size="30" name="Destino" id="Destino" type="text" value="<?php echo $Cnombreobra;?>" /></td>
			<td>&nbsp;</td>
			<td>Nombre Contacto:</td>
			<td><input readonly="readonly" size="30" name="contacto" id= "contacto" type="text" value="<?php echo $Ccontacto;?>"/> </td>
		</tr>
		<tr>
			<td>Fono Contacto:</td>
			<td><input readonly="readonly" size="30" type="text" name="fonocontacto" id= "fonocontacto" value="<?php echo $Cfono;?>"/> </td>
			<td>&nbsp;</td>
			<td>Email Contacto:</td>
			<td><input readonly="readonly" size="30" type="text" name="cemail" id= "cemail" value="<?php echo $Cemail;?>"/> </td>
		</tr>
		<tr>
			<td>Forma de Pago:</td>
			<td><input readonly="readonly" name="Formapago" id="Formapago" type="text" value="<?php echo $Formapago; ?>"/></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
    </tbody>
  </table>
 <br/>
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
	    <tr>
			<td><i class="fas fa-truck"></i>Transporte</td> 
			<td></td>
		    <td>Patente</td>
			<td></td>
			<td>Chofer</td>	
			<td></td>					
		</tr>
		 <tr>
			<<td><input readonly="readonly" name="Transporte" id="Transporte" type="text" value="<?php echo $Transporte; ?>"/></td>
			<td></td>
		    <td><input readonly="readonly" name="Patente" id="Patente" type="text" value="<?php echo $Patente; ?>"/></td>
			<td></td>
			<td><input readonly="readonly" name="Chofer" id="Chofer" type="text" value="<?php echo $Chofer; ?>"/></td>	
			<td></td>
		</tr>
	</tbody>
  </table>
 <br/>
 <?php 		
		 }  		
		?>	
 <br/>
 <?php
 if($_POST){ 
 
		$busqueda = trim($_POST['buscar']);  
		
 mysql_connect("localhost", "aridosem_tems", "aritrans2020") or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
	mysql_select_db("aridosem_bd") or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 

	$result="	SELECT *
				from Guia c
				inner join aridos a on c.idaridos = a.idaridos
				inner join proveedores p on c.proveedor = p.idproveedor
				where Num_Guia = '" .$busqueda. "'";
	$res=mysql_query($result);
 
	?>
<table style="width:950px;" border=0>
 		<tr>
            <th>PROVEEDOR</th>
			<th>SUCURSAL</th>
            <th>ARIDO</th>
			<th>VALOR MT3</th>
			<th>CANTIDAD</th>
        </tr>
	<?php 
	while($row = mysql_fetch_array($res)) { 		
		echo "<tr>";
		$iGuia = $row['iguia'];
		$Num_Guia = $row['Num_Guia'];
		$VentaFinal = $row['VentaFinal'];
		$Cantidad = $row['Cantidad'];
		echo "<td>".$row['Proveedor']."</td>";
		echo "<td>".$row['sucursal']."</td>";	
		echo "<td>".$row['glosa'];
		echo "<td>".$row['VentaFinal']."</td>";
		echo "<td>".$row['Cantidad']."</td>";	
			
	}
 }
	?>
</table>    
   
<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:950px;" >
 <tr>
    <td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;</td>	
   	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="siguiente" value=" Editar "></td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
	<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	
   <tr>
   </table>
  <br/>
  <br/>
</form>	
  
   
</div>
</body>
</html>
