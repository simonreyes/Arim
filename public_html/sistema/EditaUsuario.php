<?php 
define('HOST_DB', 'localhost'); 
define('USER_DB', 'nikovald'); 
define('PASS_DB', 'arimoreno2016'); 
define('NAME_DB', 'nikovald_aridos'); 
function conectar()
{ global $conexion; 
//Definición global para poder utilizar en todo el contexto 
$conexion = mysql_connect(HOST_DB, USER_DB, PASS_DB) or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS'); 
mysql_select_db(NAME_DB) or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB); 
} function desconectar(){ global $conexion; mysql_close($conexion); }  

$Usuario = "";
$Contrasena = "";
$Nombre = "";
$Rut = "";
$Fecha = "";
$Perfil = "";
$Id = "";
	
if($_POST){  $busqueda = trim($_POST['buscar']);  
$entero = 0;  
if (empty($busqueda)){ 
$texto = 'Búsqueda sin resultados'; 
}else{ 
// Si hay información para buscar, abrimos la conexión
conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM usuario WHERE idUser = '".$busqueda."' ";  
$resultado = mysql_query($sql); 
if (mysql_num_rows($resultado) > 0){  
$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
// Se almacenan las cadenas de resultado 
while($fila = mysql_fetch_assoc($resultado))
{  
$Usuario .= $fila['usuario'];
$Contrasena .= $fila['contrasena'];
$Nombre .= $fila['nombre']; 
$Rut .= $fila['rut'];  
$Fecha .= $fila['fecha']; 
$Perfil .= $fila['perfil']; 
$Id .= $fila['idUser'];
}  
}else{ $texto = "NO HAY RESULTADOS EN LA BBDD";	 } 
mysql_close($conexion); } }
 

?> 

<html>
	<head>
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
		<title>Edita Usuario</title>
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
		<script>function formulario(f) { 
		if (f.nombre.value   == '') 
		{ alert ('El nombre del Cliente esta vacío');  
		f.nombre.focus(); 
		return false; } 
		if (f.direccion.value  == '') 
		{ alert ('Debe ingresar Direccion'); 
		f.direccion.focus(); 
		return false; } 
		return true; } 
		</script>
<SCRIPT LANGUAGE="JavaScript">
function mi_alerta () {
alert ("Usuario Actualizado Correctamente!");
}
</SCRIPT>		
	</head>
	<body>
		<div id="header">
<div id ="block"></div>		
<div class="container">
<br>
   	<p style="font-size:28px;font-family:Arial, Helvetica, sans-serif;"><font color="Blue"><b>ARIDOS Y TRANSPORTES EMS SPA </b></font></p>
        <h3 class="title">Edita Usuario</h3>
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
			<td width="15%">&nbsp;</td>
			<td width="30%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
		</tr>
		<tr>
			<td>Seleccione Usuario :</td>
			<td><?php
				include 'conexion_mysqli.php';
				$query = 'SELECT * FROM usuario';
				$result = $conexion->query($query);
				?>
				<select name="buscar" id="buscar">
				<?php    
				while ( $row = $result->fetch_array() )    
				{
				?>
				<option value=" <?php echo $row['idUser'] ?> " >
				<?php echo $row['nombre']; ?>
				</option>
				<?php
				}    
				?>
				</select>
			
			<input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		
	</tbody>
</table> 
</form>
 
<form action="UpdateUsuario.php" method="post">
		
<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:950px;" >
	<tbody>
		<tr style="display:none">
			<td width="20%">id</td>
			<td width="30%"><input size="30" name="id" type="text" value="<?php echo $Id; ?>" /></td>
			<td width="10%">&nbsp;</td>
			<td width="10%">&nbsp;</td>
			<td width="30%">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Nombre Usuario :</td>
			<td><input size="30" name="nombre" type="text" value="<?php echo $Nombre; ?>" /></td>
			<td>&nbsp;</td>
			<td>Rut :</td>
			<td><input size="30" name="rut" type="text" value="<?php echo $Rut; ?>" /></td>
		</tr>
		<tr>
			<td>Usuario :</td>
			<td><input size="30" name="usuario" type="text"  value="<?php echo $Usuario; ?>"/></td>
			<td>&nbsp;</td>
			<td>Contraseña :</td>
			<td><input size="30" name="contrasena" type="text" value="<?php echo $Contrasena; ?>"/></td>
		</tr>
		<tr>
			<td>Perfil :</td>
			<td><SELECT NAME="perfil"> 
			<OPTION value="<?php echo $Perfil; ?>">Perfil 1</OPTION> 
			<OPTION value="<?php echo $Perfil; ?>">Perfil 2</OPTION> 
			<OPTION value="<?php echo $Perfil; ?>">Perfil 3</OPTION> 
			</SELECT></td>
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
			<td><input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VIstaMante.php'"></td>
			<td>&nbsp;</td>
			<td><input align="center" name="guardar" value=" Guardar " type="submit" onClick="mi_alerta()" /></td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
	</table>
	</form>			
	</div>
	</body>
</html>