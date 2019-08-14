<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarPaises()
	{
		$consulta = parent::consulta("SELECT IdProveedor, Proveedor FROM proveedores ORDER BY Proveedor ASC");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$paises = array();
			while($pais = parent::fetch_assoc($consulta))
			{
				$code = $pais["IdProveedor"];
				$name = $pais["Proveedor"];				
				$paises[$code]=$name;
			}
			return $paises;
		}
		else
		{
			return false;
		}
	}
	function cargarEstados()
	{
		$consulta = parent::consulta("SELECT idProveedor, sucursal FROM aridos WHERE idProveedor = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$code = $estado["idProveedor"];
				$name = $estado["sucursal"];				
				$estados[$name]=$name;
			}
			return $estados;
		}
		else
		{
			return false;
		}
	}
		
	function cargarCiudades()
	{
		$consulta = parent::consulta("SELECT idAridos, glosa FROM aridos WHERE sucursal = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$ciudades = array();
			while($ciudad = parent::fetch_assoc($consulta))
			{
				$code = $ciudad["idAridos"];
				$name = $ciudad["glosa"];				
				$ciudades[$code]=$name;
			}
			return $ciudades;
		}
		else
		{
			return false;
		}
	}		
	
	function cargarSucursal()
	{
		$consulta = parent::consulta("SELECT valor FROM aridos WHERE idAridos = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$sucursales = array();
			while($sucursal = parent::fetch_assoc($consulta))
			{
				$name = $sucursal["valor"];				
				$sucursales[$name]=$name;
			}
			return $sucursales;
		}
		else
		{
			return false;
		}
	}	
	
}
?>