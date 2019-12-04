<?php
$VIdCoti = $_GET['id'];
$Vfolio = $_GET['folio'];
$VIdCliente = $_GET['cliente'];



	$link = mysql_connect('localhost', 'aridosem_tems', 'aritrans2020') or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('aridosem_bd') or die('No se pudo seleccionar la base de datos');		
	
	$queryDATOS3 = "SELECT * FROM cotizacion c
					inner join proveedores p on c.Proveedor = IdProveedor
					inner join aridos a on c.idAridos = a.idAridos
					Where id_user = '" .$VIdCoti. "'";
	$resultDATOS3 = mysql_query($queryDATOS3) or die('Consulta fallida: ' . mysql_error());
	while ($row3 = mysql_fetch_array($resultDATOS3, MYSQL_ASSOC)) 
	{  
	$km = $row3['Km'];
	$cubo = $row3['Cubo'];
	$peaje = $row3['Peaje'];
	$comision = $row3['Comision'];
	$ventafinal = $row3['VentaFinal'];
	$cantidad = $row3['Cantidad'];
	$valorarido = $row3['ValorArido'];
	$proveedor = $row3['Proveedor'];
	$arido = $row3['glosa'];
	$sucursal = $row3['sucursal'];
	} 


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
<h2>Ingresar Item</h2>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="resources/screen.css" />
    <!-- incluyo mis estilos css -->
    <link rel="stylesheet" type="text/css" href="resources/style.css" />
<form name ="client" id="client" method="POST" action="GrabaAddCoti.php">

  <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px;" >
	<tbody>
		<tr>
			<td>PROVEEDOR :</td>
			<td><input type="text" name="km" id="km" value="<?php echo $proveedor; ?>" DISABLED></td>
			<td>&nbsp;</td>
			<td>SUCURSAL :</td>
			<td><input type="text" name="cubo" id="cubo" value="<?php echo $sucursal; ?>" DISABLED></td>
		</tr>
		<tr>
			<td>ARIDO :</td>
			<td><input type="text" name="km" id="km" value="<?php echo $arido; ?>" DISABLED></td>
			<td>&nbsp;</td>
			<td>VALOR ARIDO :</td>
			<td><input type="text" name="cubo" id="cubo" value="<?php echo $valorarido; ?>" DISABLED></td>
		</tr>
		<tr>
			<td>KM :</td>
			<td><input type="text" name="km" id="km" value="<?php echo $km; ?>"></td>
			<td>&nbsp;</td>
			<td>CUBO / KM :</td>
			<td><input type="text" name="cubo" id="cubo" value="<?php echo $cubo; ?>"></td>
		</tr>
		<tr>
			<td>PEAJE :</td>
			<td><input type="text" name="peaje" id="peaje" value="<?php echo $peaje; ?>"></td>
			<td>&nbsp;</td>
			<td>COMISIÓN :</td>
			<td><input type="text" name="cantidad" id="cantidad" value="<?php echo $comision; ?>"></td>
		</tr>
		<tr>
			<td>VENTA FINAL :</td>
			<td><input type="text" name="ventaf" id="ventaf" value="<?php echo $ventafinal; ?>"></td>
			<td>&nbsp;</td>
			<td>CANTIDAD :</td>
			<td><input type="text" name="cantidad2" id="cantidad2" value="<?php echo $cantidad; ?>"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="tarifa" id="tarifa"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="hidden" name="ganancia" id="ganancia" >
			</td>
		</tr>
		<tr>
			<td>
			<input type="hidden" name="valor" id="valor" >
			</td>
			<td><input type="hidden" name="valorarido" id="valorarido" value="<?php echo $valorarido; ?>"></td>
			<td><input type="hidden" name="folio" id="folio" value="<?php echo $Vfolio; ?>"></td>
			<td><input type="hidden" name="idcoti" id="idcoti" value="<?php echo $VIdCoti; ?>"></td>
			<td><input type="hidden" name="cliente" id="cliente" value="<?php echo $VIdCliente; ?>"></td>
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
			<td><input id="cancel" type="button" value ="  Cancelar  " onClick="location.href='Cotizacion.php'" /></td>
			<td>&nbsp;</td>
			<td><input id="submit" type="submit" name="submit" value ="  Guardar  " /></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>
