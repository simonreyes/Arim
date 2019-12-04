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
alert ("Proveedor Ingresado Correctamente!");
}
</SCRIPT>
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Ingreso de Proveedor</h3>
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
<form action="GrabaProveedor.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
			<td width="25%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="15%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Nombre Proveedor : </td>
			<td><input name="nombre" type="text" /></td>
			<td>&nbsp;</td>
			<td>Forma de Pago :</td>
			<td><input name="forma" type="text" /></td>
		</tr>
		<tr>
			<td>Factura :</td>
			<td><input name="factura" type="text" /></td>
			<td>&nbsp;</td>
			<td>Documento :</td>
			<td><input name="documento" type="text" /></td>
		</tr>
		<tr>
			<td>Nombre de Contacto :</td>
			<td><input name="contacto" type="text" /></td>
			<td>&nbsp;</td>
			<td>Fono :</td>
			<td><input name="fono" type="text" /></td>
		</tr>
		<tr>
			<td>Correo :</td>
			<td><input name="correo" type="text" /></td>
			<td>&nbsp;</td>
			<td>Sucursal :</td>
			<td><input name="sucursal" type="text" /></td>
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
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input align="center" name="guardar" value=" Guardar " type="submit" onClick="mi_alerta()" /></td>
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