<?php
{
	$host = "localhost";
    $user = "nikovald";
    $pass = "arimoreno2016";
    $bd = "nikovald_aridos";		

    $conexion = mysql_connect($host,$user,$pass) or die ("problemas al conectar el host");
    mysql_select_db($bd, $conexion) or die ("problemas al conectar la bd"); 
   
      $Nombre = $_POST['nombre'];
	  $Forma = $_POST['forma'];
      $Factura = $_POST['factura'];
	  $Documento = $_POST['documento'];
      $Contacto = $_POST['contacto'];
	  $Fono = $_POST['fono'];
	  $Correo = $_POST['correo'];
	  $Sucursal = $_POST['sucursal'];
	 
	 
	 mysql_query("insert into proveedores (	Proveedor, 
										FormaPago, 
										GlosaFactura, 
										GlosaDocumento,
										Sucursal)
	 VALUES ( 	'$Nombre',
				'$Forma',
				'$Factura',
				'$Documento',
				'$Sucursal')", $conexion);

		// Realizar una consulta MySQL
		$queryDATOS = 'SELECT max(IdProveedor) as IdProveedor from proveedores';
		$resultDATOS = mysql_query($queryDATOS) or die('Consulta fallida: ' . mysql_error());

		while ($row = mysql_fetch_array($resultDATOS, MYSQL_ASSOC)) {
		$idproveedor = $row['IdProveedor'];
		}			

		mysql_query("insert into proveedorcontacto (idProveedor, 
									nombreContacto, 
									fono, 
									correo)
		VALUES ( '$idproveedor',
			'$Contacto',
			'$Fono',
			'$Correo')", $conexion);
			
	header ("Location: http://www.aridosmoreno.cl/sistema/VistaGral.php");		
	
	 }
?>	