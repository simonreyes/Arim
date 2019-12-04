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
	
		$busqueda = trim($_POST['buscar']); 
		$busqueda1 = trim($_POST['buscar1']);  
		$busqueda2 = trim($_POST['buscar2']);
	}
    
		  

?> 
<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Informe Facturas Recibidas por Proveedor</title>
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
		<script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
		<script language="javascript"></script>
	</head>
<body>

<div id="header">
	<ul class="nav">
	</ul>	
		
<div id ="block"></div>
   <div class="container">
   <p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Informe Facturas Recibidas por Proveedor</h3>
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
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	 <tbody>
		<tr>
			<td>Proveedor </td>
			<td>Fecha Desde </td>
			<td>Fecha Hasta </td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td><?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM proveedores';
				$result = $conexion->query($query);
				?>
				<select name="buscar" id="buscar">
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
			<td><input placeholder="20160501" id="buscar1" name="buscar1" type="search"></td>
			<td><input placeholder="20160501" id="buscar2" name="buscar2" type="search"></td>
			<td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</tbody>	
 </table>
</form>	
<form method="post"> 
<div id="dvData">   
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData" >
	<tbody>
		<tr>
			<td> Proveedor : 
			<?php 
				if($_POST){ 
				     $busqueda = trim($_POST['buscar']); 
						$busqueda1 = trim($_POST['buscar1']);  
						$busqueda2 = trim($_POST['buscar2']);
				?> 
				<?php echo $busqueda; ?>
			<?php 
				}
			?> 
			</td>			
				
		</tr>	
		</tbody>	
   </table>
 <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" id="dvData" >
	<tbody>		
		<tr>
			<td><P ALIGN=center><u><b>N° Factura</b></u></P></td>
			<td><P ALIGN=center><u><b>Fecha Factura</b></u></P></td>
			<td><P ALIGN=center><u><b>Estado</b></u></P></td>	
			<td><P ALIGN=center><u><b>Monto</b></u></P></td>
		</tr>			
		<?php 
		if($_POST){ 
		
		$busqueda = trim($_POST['buscar']); 
		$busqueda1 = trim($_POST['buscar1']);  
		$busqueda2 = trim($_POST['buscar2']); 
		$Total = 0;
		conectar(); mysql_set_charset('utf8'); 
		$sql = "SELECT * FROM facturas WHERE nombre_emp  =  '" .$busqueda. "' 
		                                      and fecha_recep  >=  '" .$busqueda1. "' and fecha_recep  <=  '" .$busqueda2. "'";  
		$resultado = mysql_query($sql); 		
		while($fila = mysql_fetch_assoc($resultado))
		{  
		$num_fact = "";  
		$fecha_recep = ""; 
		$monto_total = ""; 
		$estado_fact = "";
		
		$num_fact .= $fila['num_fact'];    
		$fecha_recep .= $fila['fecha_recep']; 
		$monto_total .= $fila['monto_total']; 
		$estado_fact .= $fila['estado_fact']; 
	
		$Total = $Total + $monto_total;
		
		
		?> 
		<tr>
	    <td><P ALIGN=center><?php echo $num_fact; ?></P></td>
		<td><P ALIGN=center><?php echo $fecha_recep; ?></P></td>
		<td><P ALIGN=center><?php echo $estado_fact; ?></P></td>	
        <td><P ALIGN=center><?php echo $monto_total; ?></P></td>		
		</tr>
		<?php 		
		 }  
		}
		?>	
		<tr>
	    <td></td>
		<td></td>
		<td></td>
		<td></td>		
		</tr>		
		<tr>
	    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total : </td>
		<td><?php echo $Total; ?></td>		
		</tr>		
	</tbody>	
   </table>
     
   <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:950px;" >
	<tr>
		<td size="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;</td>	
		<td size="40"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" id="btnExport" value=" Export Excel " />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
		
				<script>
			$("#btnExport").click(function(e) {
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#dvData').html()));
			e.preventDefault();
			});
		</script>
   </tr>
   </table>
  <br/>  
</form>  
</div>
</body>
</html>