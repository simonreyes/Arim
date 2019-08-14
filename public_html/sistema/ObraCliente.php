<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Mantenedor Cliente</title>
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
alert ("Cliente Ingresado Correctamente!");
}
</SCRIPT>
	</head>
	<body>
		<div id="header">
		<div id ="block"></div>		
		<div class="container">
		<br>
		<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Nueva Obra Cliente</h3>
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
<form action="GrabaObraCliente.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1050px;" >
	<tbody>
		<tr>
			<td>Cliente :</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM cliente';
				$result = $conexion->query($query);
				?>
				<select name="cliente" id="cliente">
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
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1050px;" >
	<tbody>
		<tr>
			<td>N°</td>
			<td>Nombre de la Obra</td>
			<td>Dirección de la Obra</td>
			<td>Nombre Contacto</td>
			<td>Telefono</td>
			<td>Email</td>
		</tr>
		<tr>
			<td>1</td>
			<td><input name="obra1" type="text" /></td>
			<td><input name="dir1" type="text" /></td>
			<td><input name="cont1" type="text" /></td>
			<td><input name="fono1" type="text" /></td>
			<td><input name="email1" type="text" /></td>
		</tr>
		<tr>
			<td>2</td>
			<td><input name="obra2" type="text" /></td>
			<td><input name="dir2" type="text" /></td>
			<td><input name="cont2" type="text" /></td>
			<td><input name="fono2" type="text" /></td>
			<td><input name="email2" type="text" /></td>
			
		</tr>
		<tr>
			<td>3</td>
			<td><input name="obra3" type="text" /></td>
			<td><input name="dir3" type="text" /></td>
			<td><input name="cont3" type="text" /></td>
			<td><input name="fono3" type="text" /></td>
			<td><input name="email3" type="text" /></td>
		</tr>
		<tr>
			<td>4</td>
			<td><input name="obra4" type="text" /></td>
			<td><input name="dir4" type="text" /></td>
			<td><input name="cont4" type="text" /></td>
			<td><input name="fono4" type="text" /></td>
			<td><input name="email4" type="text" /></td>
		</tr>
		<tr>
			<td>5</td>
			<td><input name="obra5" type="text" /></td>
			<td><input name="dir5" type="text" /></td>
			<td><input name="cont5" type="text" /></td>
			<td><input name="fono5" type="text" /></td>
			<td><input name="email5" type="text" /></td>
		</tr>
		<tr>
			<td>6</td>
			<td><input name="obra6" type="text" /></td>
			<td><input name="dir6" type="text" /></td>
			<td><input name="cont6" type="text" /></td>
			<td><input name="fono6" type="text" /></td>
			<td><input name="email6" type="text" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		<tr>
			<td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</td>	
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input align="center" type="submit" value=" Guardar "/></td>	
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
			<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;</td>	
			<td>&nbsp;</td>
		<tr>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
	</tbody>
	</table>
	</form>			
	</div>
	</body>

</html>