<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Nuevo Transporte</title>
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
alert ("Transporte Ingresado Correctamente!");
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
        <h3 class="title">Nuevo Transporte</h3>
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
<form action="GrabaNuevoTransporte.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
		<tr>
			<td>Nombre Empresa</td>
			<td>
			<?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM transporte';
				$result = $conexion->query($query);
			?>
				<select name="nombre" id="nombre">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['idnombre'] ?> " >
				<?php echo $row['nombre']; ?>
				</option>
				<?php
				}    
				?>
				</select></td>		
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
		<tr>
			<td>MT3</td>
			<td><input name="mt3" type="text" /></td>
			<td>&nbsp;</td>
			<td>Patente</td>
			<td><input name="Patente" type="text" /></td>
			
		</tr>
		<tr>
			<td>Chofer</td>
			<td><input name="Chofer" type="text" /></td>
			<td>&nbsp;</td>
			<td width="20%">Rut</td>
			<td><input name="Rut" type="text" /></td>
		</tr>
		<tr>
			<td>Fono</td>
			<td><input name="fono" type="text" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input align="center" name="guardar" value=" Guardar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;</td>
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>
			<td>&nbsp;</td>
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
	</form>			
	</div>
	</body>

</html>