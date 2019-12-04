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

	if($_POST){ 
	
		$busqueda = trim($_POST['nomemp']); 
		$busqueda1 = trim($_POST['factura']);  
		
		
	conectar(); mysql_set_charset('utf8'); 
	$sql = "SELECT * FROM factura_emitidas WHERE nomemp = '" .$busqueda. "' and numfact  =  '" .$busqueda1. "'";  
	$resultado = mysql_query($sql); 
	$Cont = 0;
	if (mysql_num_rows($resultado) > 0){	$Cont = 1;  
	$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
		while($fila = mysql_fetch_assoc($resultado))
		{  
			$nombre_emp .= $fila['nomemp'];
			$num_fact .= $fila['numfact'];
			$fecha_fact .= $fila['fechafact'];
			$monto_total .= $fila['montofact'];
			$fecha_pago .= $fila['fechapago'];
			$estado_fact .= $fila['estado'];
			$nombre_banco .= $fila['banco'];
			$num_cheque .= $fila['numerocheque'];
			$tipo_pago .= $fila['tipopago'];
			$observacion .= $fila['obs'];
		}  
	  }	
	  
	  
	  conectar(); mysql_set_charset('utf8'); 
      $sql = "SELECT * FROM cliente WHERE Nombre_Cliente = '" .$busqueda. "'";    
      $resultado = mysql_query($sql); 

      if (mysql_num_rows($resultado) > 0){  
      $registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
			// Se almacenan las cadenas de resultado 
			while($fila2 = mysql_fetch_assoc($resultado))
		{  
		$texto .= $fila2['Rut'];
		$NombreCli .= trim($fila2['Nombre_Cliente']);
		$Dire .= $fila2['Direccion']; 
		$Giro .= $fila2['Giro'];  
		$Obra .= $fila2['Obra']; 
		$Contacto .= $fila2['Contacto']; 
		$Correo .= $fila2['Correo']; 
		$Fono .= $fila2['Fono']; 
		$Rut .= $fila2['Rut'];
		$Id .= $fila2['idCliente'];
		}  
	}
}

IF($busqueda == 'MELON ARIDOS LTDA.'){
$Id = '50';
}

?> 

<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Factura Emitida</title>
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
        <h3 class="title">Factura Emitida</h3>
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
			<td>Nombre Cliente</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM cliente';
				$result = $conexion->query($query);
			?>
				<select name="nomemp" id="nomemp">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option style="height:170"  value=" <?php echo $row['Nombre_Cliente'] ?> " >
				<?php echo $row['Nombre_Cliente']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			</td>	
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input name="factura" type="text" /></td>
			
			<td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
		</tr>
</table>
</form>	
	
<form action="GrabaFactEmi.php" method="post">	
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
			<td>Nombre Cliente</td>
			<td><input readonly="readonly" name="nomemp" id="nomemp" type="text"  value="<?php echo $busqueda; ?>"/></td>
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input readonly="readonly" name="factura" id="factura" type="text"  value="<?php echo $busqueda1; ?>"/></td>
		</tr>
		<tr>
			<td>Fecha Factura</td>
			<td><input name="fechafact" type="text" placeholder="20160501"/></td>
			<td>&nbsp;</td>
			<td>Monto Total</td>
			<td><input name="monto" type="text" /></td>			
		</tr>
		<tr>
		    <td>Fecha Pago</td>
			<td><input name="fechapago" type="text" placeholder="20160501"/></td>
			<td>&nbsp;</td>
			<td>Tipo de Pago</td>
			<td>			
				<select name="tipopago" >
				<option value="Efectivo">Efectivo</option>
				<option value="Transferencia">Transferencia</option>
				<option value="Cheque">Cheque</option>
				<option value="Deposito">Deposito</option>
				</select></td>
		</tr>
		<tr>
			<td>Banco Receptor</td>
			<td><input name="banco" type="text" /></td>
			<td>&nbsp;</td>			
			<td>Número de Cheque/Trans/Deposito</td>
			<td><input name="numcheque" type="text" /></td>	
		</tr>
		<tr>
			<td>Estado Factura</td>
			<td>			
				<select name="estado" >
				<option value="Pagada">Pagada</option>
				<option value="En proceso">En proceso</option>
				<option value="Recepcionada">Recepcionada</option>
				</select></td>
			<td>&nbsp;</td>
			<td>Observación</td>
			<td><input size="50" name="obs" type="text"/></td>		   
		</tr>
		<tr>
			<td>Asociar Guías</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = "SELECT * FROM Guia where idCliente = '" .$Id. "' and factura = ' ' ";
				$result = $conexion->query($query);
			?>
				 <select name="multiple[]" multiple>
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['Num_Guia'] ?> " >
								<?php echo $row['Num_Guia']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			</td>	
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
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
			<td>Nombre Cliente</td>
			<td><input readonly="readonly" name="nomemp" id="nomemp" type="text"  value="<?php echo $busqueda; ?>"/></td>
			<td>&nbsp;</td>
			<td>N° Factura</td>
			<td><input readonly="readonly" name="factura" id="factura" type="text"  value="<?php echo $busqueda1; ?>"/></td>
		</tr>
		<tr>
			<td>Fecha Factura</td>
			<td><input readonly="readonly"  name="fechafact" type="text" value="<?php echo $fecha_fact; ?>"/></td>
			<td>&nbsp;</td>
			<td>Monto Total</td>
			<td><input readonly="readonly"  name="monto" type="text" value="<?php echo $monto_total; ?>" /></td>			
		</tr>
		<tr>
		    <td>Fecha Pago</td>
			<td><input readonly="readonly" name="fechapago" type="text" value="<?php echo $fecha_pago; ?>"/></td>
			<td>&nbsp;</td>
			<td>Tipo de Pago</td>
			<td><input readonly="readonly" name="tipopago" type="text" value="<?php echo $tipo_pago; ?>"/></td>
		</tr>
		<tr>
			<td>Banco Receptor</td>
			<td><input readonly="readonly"  name="banco" type="text" value="<?php echo $nombre_banco; ?>" /></td>
			<td>&nbsp;</td>			
			<td>Número de Cheque/Trans/Deposito</td>
			<td><input readonly="readonly"  name="numcheque" type="text" value="<?php echo $num_cheque; ?>" /></td>	
		</tr>
		<tr>
			<td>Estado Factura</td>
			<td><input readonly="readonly"  name="estado" type="text" value="<?php echo $estado_fact; ?>" /></td>	
			<td>&nbsp;</td>
			<td>Observación</td>
			<td><input readonly="readonly"  name="obs" type="text" value="<?php echo $observacion; ?>"/></td>		   
		</tr>
		<tr>
			<td>Asociar Guías</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = "SELECT * FROM Guia where idCliente = '" .$Id. "' and factura = ' '";
				$result = $conexion->query($query);
			?>
				 <select name="multiple[]" multiple style="width:120px">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['Num_Guia'] ?> " >
								<?php echo $row['Num_Guia']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			</td>	
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
</table>

<?php
	}
 }
?> 
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



</form>			
</div>
</body>

</html>