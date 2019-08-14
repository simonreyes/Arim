<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Mantenedor de Transporte</title>
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
	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>TRANSPORTES EDGARDO CRISTIAN MORENO SOLIS E.I.R.L </b></font></p>
        <h3 class="title">Ingreso de Transporte</h3>
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
<form action="GrabaTransporte.php" method="post">			
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
			<td>Nombre Dueño :</td>
			<td><input name="nombre" type="text" /></td>
			<td>&nbsp;</td>
			<td>Fono 1 :</td>
			<td><input name="fono1" type="text" /></td>
		</tr>
		<tr>
			<td>Fono 2 :</td>
			<td><input name="fono2" type="text" /></td>
			<td>&nbsp;</td>
			<td>Correo :</td>
			<td><input name="correo" type="text" /></td>
		</tr>
		<tr>
			<td>Dirección :</td>
			<td><input name="direccion" type="text" /></td>
			<td>&nbsp;</td>
			<td>Ciudad :</td>
			<td><input name="ciudad" type="text" /></td>
		</tr>
		<tr>
			<td>Banco :</td>
			<td><input name="banco" type="text" /></td>
			<td>&nbsp;</td>
			<td>Nombre Deposito :</td>
			<td><input name="deposito" type="text" /></td>
		</tr>
		<tr>
			<td>Cueta:</td>
			<td><input name="cuenta" type="text" /></td>
			<td>&nbsp;</td>
			<td>Observación :</td>
			<td><input name="obs" type="text" /></td>
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
	<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr>
			<td width="20%">MT3</td>
			<td width="20%">Patente</td>
			<td width="20%">Chofer</td>
			<td width="20%">Rut</td>
			<td width="20%">Fono</td>
		</tr>
		<tr>
			<td><input name="MT3" type="text" /></td>
			<td><input name="Patente" type="text" /></td>
			<td><input name="Chofer" type="text" /></td>
			<td><input name="Rut" type="text" /></td>
			<td><input name="fono" type="text" /></td>
		</tr>
		<tr>
			<td><input name="MT32" type="text" /></td>
			<td><input name="Patente2" type="text" /></td>
			<td><input name="Chofer2" type="text" /></td>
			<td><input name="Rut2" type="text" /></td>
			<td><input name="fono2" type="text" /></td>
		</tr>
		<tr>
			<td><input name="MT33" type="text" /></td>
			<td><input name="Patente3" type="text" /></td>
			<td><input name="Chofer3" type="text" /></td>
			<td><input name="Rut3" type="text" /></td>
			<td><input name="fono3" type="text" /></td>
		</tr>
		<tr>
			<td><input name="MT34" type="text" /></td>
			<td><input name="Patente4" type="text" /></td>
			<td><input name="Chofer4" type="text" /></td>
			<td><input name="Rut4" type="text" /></td>
			<td><input name="fono4" type="text" /></td>
		</tr>
		<tr>
			<td><input name="MT35" type="text" /></td>
			<td><input name="Patente5" type="text" /></td>
			<td><input name="Chofer5" type="text" /></td>
			<td><input name="Rut5" type="text" /></td>
			<td><input name="fono5" type="text" /></td>
		</tr>
		<tr>
			<td><input name="MT36" type="text" /></td>
			<td><input name="Patente6" type="text" /></td>
			<td><input name="Chofer6" type="text" /></td>
			<td><input name="Rut6" type="text" /></td>
			<td><input name="fono6" type="text" /></td>
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