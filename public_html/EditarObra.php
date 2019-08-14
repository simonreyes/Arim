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

$busqueda = "";
$busqueda2 = "";

if($_POST){  
$busqueda = trim($_POST['pais']);  
$busqueda2 = trim($_POST['estado']); 

conectar(); mysql_set_charset('utf8'); 
$sql = "SELECT * FROM cliente WHERE idCliente = '" .$busqueda. "'";  
$resultado = mysql_query($sql); 

	if (mysql_num_rows($resultado) > 0){ 
		$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado) . ' registros </p>'; 
			while($fila = mysql_fetch_assoc($resultado))
			{  
				$NombreCli = trim($fila['Nombre_Cliente']);
				$Id = $fila['idCliente'];
				
				conectar(); mysql_set_charset('utf8'); 
				$sql2 = "SELECT * FROM clienteobras WHERE nombrecliente = '" .$busqueda. "' and nombreobra = '" .$busqueda2. "'";  
				$resultado2 = mysql_query($sql2); 
				if (mysql_num_rows($resultado2) > 0){ 
					$registros = '<p>HEMOS ENCONTRADO ' . mysql_num_rows($resultado2) . ' registros </p>'; 
					while($fila2 = mysql_fetch_assoc($resultado2))
					{  
						$dirobra = trim($fila2['dirobra']);
						$contacto = $fila2['contacto'];
						$fono = trim($fila2['fono']);
						$email = $fila2['email'];
					}  
				}
					
			}  
	}else{
	echo "3";	
		$texto = "NO HAY RESULTADOS EN LA BBDD";	 
		} 
		mysql_close($conexion); 
} 

?> 

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<title>Mantenedor Obras</title>
<script type="text/javascript">
$(document).ready(function(){
	cargar_paises();
	$("#pais").change(function(){dependencia_estado();});
	$("#estado").attr("disabled",true);

});

function cargar_paises()
{
	$.get("scripts6/cargar-paises.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#pais').append(resultado);			
		}
	});	
}
function dependencia_estado()
{
	var code = $("#pais").val();
	$.get("scripts6/dependencia-estado.php", { code: code },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#estado").attr("disabled",false);
				document.getElementById("estado").options.length=1;
				$('#estado').append(resultado);			
			}
		}

	);
}


</script>
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
        <h3 class="title">Editar Obra Cliente</h3>
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
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:900px;" >
	<tbody>
	    <tr>
			<td>Cliente</td> 
			<td></td>
		    <td>Obra</td>
			<td></td>
		   	<td></td>					
		</tr>
		 <tr>
			<td>
			<select id="pais" name="pais">
				<option value="0">Seleccione Cliente...</option>
			</select>
			</td> 
			<td></td>
			<td> 
			<select id="estado" name="estado">
				<option value="0">Seleccione Obra...</option>
			</select>
			</td>
			<td></td>
			<td><input type="submit" name="buscador" class="boton peque aceptar" value="Buscar"></td>
		</tr>
	</tbody>

</table>
</form>	
<form action="Editarobrafinal.php" method="post">	
<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:900px;" >
	<tbody>
		<tr style="display:none">
			<td width="20%">idobra</td>
			<td width="30%"><input size="30" name="idobra" type="text" value="<?php echo $idobra; ?>" /></td>
			<td width="10%">&nbsp;</td>
			<td width="20%">idcliente</td>
			<td width="30%"><input size="30" name="id" type="text" value="<?php echo $Id; ?>" /></td>
		</tr>
		<tr>
			<td>Nombre Cliente :</td>
			<td><input size="30" name="nombre" type="text" value="<?php echo $NombreCli; ?>" /></td>
			<td>&nbsp;</td>
			<td>Obra :</td>
			<td><input size="30" name="obra" type="text" value="<?php echo $busqueda2; ?>" /></td>
		</tr>
		<tr>
			<td>Dirección :</td>
			<td><input size="30" name="dirobra" type="text" value="<?php echo $dirobra; ?>" /></td>
			<td>&nbsp;</td>
			<td>Contacto :</td>
			<td><input size="30" name="contacto" type="text" value="<?php echo $contacto; ?>" /></td>
		</tr>
		<tr>
			<td>Fono :</td>
			<td><input size="30" name="fono" type="text"  value="<?php echo $fono; ?>"/></td>
			<td>&nbsp;</td>
			<td>Email :</td>
			<td><input size="30" name="email" type="text" value="<?php echo $email; ?>"/></td>
		</tr>
		
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input align="center" type="submit" value=" Eliminar "/></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input align="center" type="submit" value=" Actualizar "/></td>		
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" name="Cancelar" value=" Cancelar " onClick="location.href='VistaGral.php'"></td>	
			<td>&nbsp;</td>
			
		</tr>
	</tbody>
	</table>
	</form>			
	</div>
	</body>

</html>