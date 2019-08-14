<?php

$VIdGuia = $_GET['id'];
$VNum_Guia = $_GET['Num_Guia'];
$VVentaFinal = $_GET['VentaFinal'];
$VCantidad = $_GET['Cantidad'];

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
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
</head>
<body>
<h2>Modificar Item</h2>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
<form name ="client" id="client" method="POST" action="Graba3.php">

  <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px;" >
	<tbody>
		<tr>
			<td>Valor MT3 :</td>
			<td><input readonly="readonly" type="text" name="ventaf" id="ventaf" value="<?php echo $VVentaFinal; ?>"></td>
			<td>&nbsp;</td>
			<td>Nueva Cantidad:</td>
			<td><input type="text" name="cantidad" id="cantidad" value="<?php echo $VCantidad; ?>"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="num_guia" id="num_guia" value="<?php echo $VNum_Guia; ?>"></td>
			<td><input type="hidden" name="idguia" id="idguia" value="<?php echo $VIdGuia; ?>"></td>
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
		<tr class="buttonsBar">
			<td>&nbsp;</td>
			<td><input id="cancel" type="button" value ="  Cancelar  " onClick="location.href='VistaGral.php'" /></td>
			<td>&nbsp;</td>
			<td><input id="submit" type="submit" name="submit" value ="  Guardar  " /></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>
