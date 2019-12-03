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
		<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Inserta Cliente</h3>
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
<form action="GrabaCliente.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1050px;" >
	<tbody>
		<tr>
			<td>Nombre Cliente :</td>
			<td><input name="nombre" type="text" /></td>
			<td>&nbsp;</td>
			<td>Rut :</td>
			<td><input name="rut" type="text" /></td>
			
		</tr>
		<tr>
			<td>Dirección :</td>
			<td><input name="direccion" type="text" /></td>
			<td>&nbsp;</td>
			<td>Ciudad :</td>
			<td><input name="ciudad" type="text" /></td>
		</tr>
		<tr>
			<td>Fono :</td>
			<td><input name="fono" type="text" /></td>
			<td>&nbsp;</td>
			<td>Contacto :</td>
			<td><input name="contacto" type="text" /></td>
		</tr>
		<tr>
			<td>Correo Electronico:</td>
			<td><input name="correo" type="text" /></td>
			<td>&nbsp;</td>
			<td>Giro :</td>
			<td><input name="giro" type="text" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</td>	
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input align="center" type="submit" value=" Ingresar"/></td>	
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