<?php

class selects extends MySQL
{
	var $code = "";
	
	function cargarEstados()
	{
		$consulta = parent::consulta("SELECT Num_Guia FROM Guia WHERE idCliente = '".$this->code."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$estados = array();
			while($estado = parent::fetch_assoc($consulta))
			{
				$code = $estado["Num_Guia"];
				$name = $estado["Num_Guia"];				
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
}
?>