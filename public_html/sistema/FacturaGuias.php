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

	if($_POST){ 
	
		$busqueda = trim($_POST['nomemp']); 
		$busqueda1 = trim($_POST['factura']);  
		
		conectar(); mysql_set_charset('utf8'); 
		$sql = "SELECT * FROM facturas WHERE nombre_emp = '" .$busqueda. "' and num_fact  =  '" .$busqueda1. "'";  
		$resultado = mysql_query($sql); 
		$Cont = 0;
			if (mysql_num_rows($resultado) > 0){	$Cont = 1;  
				$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
				while($fila = mysql_fetch_assoc($resultado))
			{  
			$nombre_emp .= $fila['nombre_emp'];
			$descuento .= $fila['descuento'];
			$tipo_emp .= $fila['tipo_emp'];
			$fecha_recep .= $fila['fecha_recep'];
			$num_fact .= $fila['num_fact'];
			$monto_total .= $fila['monto_total'];
			$fecha_pago .= $fila['fecha_pago'];
			$num_cheque .= $fila['num_cheque'];
			$nombre_banco .= $fila['nombre_banco'];
			$fecha_cheque .= $fila['fecha_cheque'];
			$estado_fact .= $fila['estado_fact'];
			$observacion .= $fila['observacion'];
			}  
		}	
	}
?> 


<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Factura Recibida</title>
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
alert ("Factura Ingresada Correctamente!");
}
</SCRIPT>
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
 <br>
	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Factura v/s Guías</h3>
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
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>Nombre Empresa</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM proveedores';
				$result = $conexion->query($query);
			?>
				<select name="nomemp" id="nomemp">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['Proveedor'] ?> " >
				<?php echo $row['Proveedor']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			</td>	
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input name="factura"  id="factura" type="text" /></td>
			
			<td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
		</tr>
</table>
</form>	
<form action="GrabaFactReci.php" method="post"> 
<?php 
 IF($_POST){ 
	 IF ($Cont == 0) 
	  {
	    ?>
	<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >	
		<tr>
			<td>&nbsp;</td>
			<td width="30%"  align="right"><font color="red">Factura No Existe</font></td>
			<td>&nbsp;</td>
			
			<td width="30%"  align="right"><font color="red">Puede Continuar</font></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Nombre Emp.</td>
			<td><input readonly="readonly" name="nomemp" id="nomemp" type="text"  value="<?php echo $busqueda; ?>"/></td>
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input readonly="readonly" name="factura" id="factura" type="text"  value="<?php echo $busqueda1; ?>"/></td>
		</tr>
		<tr>
			<td>Tipo Empresa</td>
			<td>			
				<select name="tf" >
				<option value="Transporte">Transporte</option>
				<option value="Aridos">Aridos</option>
				<option value="otros">Otros</option>
				</select></td>
			<td>&nbsp;</td>
			<td>Fecha Recepción</td>
			<td><input name="fechaRecep" type="text" placeholder="20160501"/></td>
		</tr>
		<tr>
			<td>Descuento 3%</td>
			<td><input name="descuento" type="text" /></td>
			<td>&nbsp;</td>
			<td>Monto Total</td>
			<td><input name="monto" type="text" /></td>
		</tr>
		<tr>
		    <td>Fecha Pago</td>
			<td><input name="fechapago" type="text" placeholder="20160501"/></td>
			<td>&nbsp;</td>
			<td>Numero de Cheque</td>
			<td><input name="numcheque" type="text" /></td>
		</tr>
		<tr>
			<td>Nombre Banco</td>
			<td><input name="banco" type="text" /></td>
			<td>&nbsp;</td>			
			<td>Fecha Cheque</td>
			<td><input name="fechacheque" type="text" placeholder="20160501"/></td>			
		</tr>
		<tr>
			<td>Estado Factura</td>
			<td>			
				<select name="estado" >
				<option value="Pagada">Pagada</option>
				<option value="En proceso">En proceso</option>
				<option value="Recepcionada">Recepcionada</option>
				<option value="Pago 50%">Pago 50%</option>
				</select></td>
			<td>&nbsp;</td>
			<td>Observacion</td>
			<td><input size="50" name="obs" type="text"/></td>		   
		</tr>
		<tr>
		  <td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		   <td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
</table>
<a href="addfacguia.php?Vid=<?php echo $busqueda; ?>">Insertar Item</a><br/><br/> 
<table style="width:950px;" border=0>
 		<tr>
            <th>PROVEEDOR</th>
			<th>SUCURSAL</th>
            <th>ARIDO</th>
			<th>VALOR MT3</th>
			<th>CANTIDAD</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
	<?php 
	while($row = mysql_fetch_array($res)) { 		
		echo "<tr>";
		$idGuia = $row['id_user'];
		$folio = $row['Folio'];
		$VentaFinal = $row['VentaFinal'];
		$Cantidad = $row['Cantidad'];
		echo "<td>".$row['Proveedor']."</td>";
		echo "<td>".$row['sucursal']."</td>";	
		echo "<td>".$row['glosa'];
		echo "<td>".$row['VentaFinal']."</td>";
		echo "<td>".$row['Cantidad']."</td>";	
		
		echo "<td><a href=\"InsertarItemG.php?id=$idGuia&folio=$folio&VentaFinal=$VentaFinal&Cantidad=$Cantidad\">Editar</a>";
		echo "<td><a href=\"EliminarItemInserG.php?id=$idGuia&folio=$folio\" onClick=\"return confirm('Seguro de Eliminar Item?')\">Eliminar</a></td>";		
	}
	?>
</table>    
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<input align="center" name="guardar" value=" Guardar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
</table>







<?php
	}
 }
?> 
<?php 
	IF($_POST){ 
	 IF ($Cont == 1) 
	  {
	?>	
	<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >	
		<tr>
			<td>&nbsp;</td>
			<td width="30%"  align="right"><font color="red">Factura Encontrada:</font>
			<font color="red" align="left"><?php echo $busqueda1; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="30%"  align="right"><font color="red">Debe Actualizar o Eliminar</font></td>
		</tr>
		<tr>
			<td>Nombre Emp.</td>
			<td><input readonly="readonly" name="Nombreemp" id="Nombreemp" type="text"  value="<?php echo $busqueda; ?>"/></td>
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input readonly="readonly" name="NFactura" id="NFactura" type="text"  value="<?php echo $busqueda1; ?>"/></td>
		</tr>		
		
		
		
		<tr>
			<td>Tipo Empresa</td>
			<td><input readonly="readonly" name="tipoempresa" id="tipoempresa" type="text"  value="<?php echo $tipo_emp; ?>"/></td>				
			<td>&nbsp;</td>
			<td>Fecha Recepción</td>
			<td><input readonly="readonly" name="fechaRecep" type="text" value="<?php echo $fecha_recep; ?>"/></td>
		</tr>
		<tr>
			<td>Descuento 3%</td>
			<td><input readonly="readonly" name="descuento" type="text" value="<?php echo $descuento; ?>"/></td>
			<td>&nbsp;</td>
			<td>Monto Total</td>
			<td><input readonly="readonly" name="monto" type="text" value="<?php echo $monto_total; ?>"/></td>
		</tr>
		<tr>
		    <td>Fecha Pago</td>
			<td><input readonly="readonly" name="fechapago" type="text" value="<?php echo $fecha_pago; ?>"/></td>
			<td>&nbsp;</td>
			<td>Numero de Cheque</td>
			<td><input readonly="readonly" name="numcheque" type="text" value="<?php echo $num_cheque; ?>"/></td>
		</tr>
		<tr>
			<td>Nombre Banco</td>
			<td><input readonly="readonly" name="banco" type="text" value="<?php echo $nombre_banco; ?>"/></td>
			<td>&nbsp;</td>			
			<td>Fecha Cheque</td>
			<td><input readonly="readonly" name="fechacheque" type="text" value="<?php echo $fecha_cheque; ?>"/></td>			
		</tr>
		<tr>
			<td>Estado Factura</td>
			<td><input readonly="readonly" name="estado" type="text" value="<?php echo $estado_fact; ?>"/></td>
			<td>&nbsp;</td>
			<td>Observacion</td>
			<td><input readonly="readonly" name="obs" type="text" value="<?php echo $observacion; ?>" /></td>		   
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
</table>
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<td>&nbsp;</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
</table>
<?php
	}}
?> 

</form>			
</div>
</body>

</html>